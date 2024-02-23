<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Cargo;
use App\Models\Sucursal;
use App\Models\Contrato;
use App\Models\Personal;



class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contratos = Contrato::with(['personal', 'sucursal','cargo'])
        ->join('personal', 'contrato.id_personal', '=', 'personal.id_personal')
        ->join('sucursal', 'contrato.id_sucursal', '=', 'sucursal.id_sucursal')
        ->join('cargo', 'contrato.id_cargo', '=', 'cargo.id_cargo')
        ->where('personal.control', 1)
        ->where('sucursal.control', 1)
        ->where('cargo.control',1)
        ->where('contrato.control',1)
        ->get();

        return view('contrato.index', compact('contratos'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $personales = Personal::where('control', 1)->get();
        $cargos = Cargo::where('control', 1)->get();
        $sucursales = Sucursal::where('control', 1)->get();
        $areas = Area::where('control', 1)->get();
     
        return view('contrato.create', compact('personales', 'cargos', 'sucursales','areas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {      
        $personal = Personal::where('dni', $request->dni)->first();

        if (!$personal) {
            // Si no se encontró el empleado con el DNI proporcionado, redireccionar con un mensaje de error.
            return redirect()->route('permiso.create')->with('error', 'Empleado no encontrado con el DNI proporcionado');
        }
        $contrato = new Contrato();
        $contrato->id_personal = $personal->id_personal;
        $contrato->id_cargo = $request->Cargo;
        $contrato->id_sucursal = $request->Sucursal;
        $contrato->fecha_ini = $request->fecha_ini;
        $contrato->fecha_fin = $request->fecha_fin;
        $contrato->control = '1';
        $contrato->save();

        return redirect()->route('contrato.index')->with('success', 'Contrato creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
             //
             $area=Area::findOrFail($id);

    
             return view('area.edit',compact('area'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $area=Area::findOrFail($id);
        $area->area=$request->Area;
        $area->save();
        return redirect()->route('contrato.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $contrato=Contrato::findOrFail($id);
        $contrato->control='0';
        $contrato->save();
        return redirect()->route('contrato.index')->with('datos','Registro Eliminado...!');
    }
}
