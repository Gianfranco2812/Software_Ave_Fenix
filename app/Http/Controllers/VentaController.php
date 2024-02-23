<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Estado;
use App\Models\DetalleVenta;
use App\Models\Ventas;
use App\Models\Itinerario;
use App\Models\Formapago;
use Illuminate\Support\Facades\DB;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PAGINATION=7;
    public function index(Request $request)
    {
        $buscarpor=trim($request->get('buscarpor'));
        $ventas=DB::table('ventas as v')
        ->join('clientes as c','v.idcliente','=','c.idcliente')
        ->join('detalleventa as d', 'v.idventas', '=', 'd.idventas')
        ->join('itinerario as i', 'd.iditinerario', '=', 'i.iditinerario')
        ->select('v.idventas','c.nombre','v.idestado','v.idformapago','i.Nomciudad','v.fecha')
        ->orderBy('v.idventas', 'asc')
        ->where('c.nombre','LIKE','%'.$buscarpor.'%')
        ->paginate($this::PAGINATION);

        //return $ventas;
        return view('ventas.lista', compact('ventas')); // Pasar 'ventas' en lugar de 'ventas.lista'
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $cliente = Cliente::all();
        $estado = Estado::all();
        $formapago = Formapago::all();
        $itinerarios = Itinerario::all();

        //return $formapago;
        return view('ventas.create', compact('cliente', 'itinerarios','estado','formapago'));
        //return view('ventas.create', ['opciones' => $opciones],compact('cliente','ciudades','itinerario'));

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fechaIda' => [
                'required',
                'date',
                'after_or_equal:' . now()->format('Y-m-d'),
                'before_or_equal:' . now()->addYears(2)->format('Y-m-d'),
                
            ],

            'fechaRetorno' => [
                'required',
                'date',
                'after_or_equal:' . now()->format('Y-m-d'),
                'before_or_equal:' . now()->addYears(2)->format('Y-m-d'),
                
            ],
            
            // Otras reglas de validación para los demás campos
        ]);



        try{
            DB::beginTransaction();

            $ventas=new Ventas();
            $ventas->idcliente=$request->idcliente;
            $ventas->idestado=$request->idestado;
            $ventas->idformapago=$request->idformapago;
            $ventas->fecha=now();
            $ventas->fechaIda = $request->fechaIda;
            $ventas->fechaRetorno = $request->fechaRetorno;
            $ventas->save();
            $itinerarios=$request->iditinerarios;
            $i=0;
            $itinerarios = $request->iditinerarios;
            $cantidades = $request->cantidad;

            for ($i = 0; $i < count($itinerarios); $i++) {
                $itinerario_data = explode('_', $itinerarios[$i]);
                $detalle = new DetalleVenta();
                $detalle->idventas = $ventas->idventas;
                $detalle->iditinerario = $itinerario_data[0];
                $detalle->cantidad = $cantidades[$i];
                $detalle->save();

                $itinerario = Itinerario::find($itinerario_data[0]);
                $itinerario->asientos = $itinerario->asientos - $cantidades[$i];
                $itinerario->save();
            }

            DB::commit();
        }
        catch(\Exception $e)
        {
            dd($e);
            DB::rollback();
        }

            

        //return $detalle;
        return redirect()->route('ventas.index')->with('datos','La venta se ha creado correctamente');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $ventas=Ventas::find($id);
        $clientes=DB::table('clientes')->where('idcliente','=',$ventas->idcliente)->get();
        $formapago=DB::table('formapago')->where('idformapago','=',$ventas->idformapago)->get();
        $estado=DB::table('estado')->where('idestado','=',$ventas->idestado)->get();
        $itinerario=DB::table('detalleventa as d')->join('itinerario as i','d.iditinerario','=','i.iditinerario')->where('d.idventas','=',$ventas->idventas)->select('d.iditinerario','i.asientos','d.cantidad','i.Nomciudad','i.PrecioCiud','i.NomServicio','i.PrecioServ','i.horaida','i.horallegada')->get();
        //return $formapago;
        return view('ventas.show',compact('ventas','clientes','estado','itinerario','formapago'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ventas $venta)
    {
        //
        $clientes=DB::table('clientes')->where('idcliente','=',$venta->idcliente)->get();
        $estado=Estado::all();
        $formapago=DB::table('formapago')->where('idformapago','=',$venta->idformapago)->get();
        $itinerario=DB::table('detalleventa as d')->join('itinerario as i','d.iditinerario','=','i.iditinerario')->where('d.idventas','=',$venta->idventas)->select('d.iditinerario','i.asientos','d.cantidad','i.Nomciudad','i.PrecioCiud','i.NomServicio','i.PrecioServ','i.horaida','i.horallegada')->get();
        //return $clientes;
        return view('ventas.edit',compact('venta','clientes','estado','itinerario','formapago'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ventas $venta)
    {
        //
        $venta->idestado=$request->idestado;
        $venta->save();
        //return $venta;
        return redirect()->route('ventas.index')->with('datos','Se ha Actualizado los datos de cliente exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
