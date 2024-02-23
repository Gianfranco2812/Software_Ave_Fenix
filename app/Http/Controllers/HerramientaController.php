<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Herramienta;

class HerramientaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PAGINATION=10;
    public function index(Request $request)
    {
        //
        $buscarpor=$request->get('buscarpor');
         $herramienta=Herramienta::where('control','=','1')->where('descripcion','like',$buscarpor.'%')->paginate($this::PAGINATION); ; 
        
         return view('Herramienta.index',compact('herramienta','buscarpor')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $herramienta=Herramienta::where('control','=','1')->get();
        return view('Herramienta.create',compact('herramienta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data=request()->validate([ 

            'descripcion'=>'required|max:60',
            'cantidad'=>'required',
     
  
    
            ],
            [
            'descripcion.required'=>'Ingrese una descripción para el nivel de intervención',
            'descripcion.max'=>'Límite de caracteres excedido',

            'cantidad.required'=>'Ingrese una abreviatura para el nivel de intervencion',
           

           
            ]);

        

            $herramienta=new Herramienta();
            $herramienta->descripcion=$request->descripcion;
            $herramienta->cantidad=$request->cantidad;


            $herramienta->control='1';
            $herramienta->save();
   
            return redirect()->route('Herramienta.index')->with('datos','Registro Nuevo Guardado...!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $herramienta=Herramienta::findOrFail($id);
        return view('Herramienta.edit',compact('herramienta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data=request()->validate([ 

            'descripcion'=>'required|max:60',
            'cantidad'=>'required',
     
  
    
            ],
            [
            'descripcion.required'=>'Ingrese una descripción para el nivel de intervención',
            'descripcion.max'=>'Límite de caracteres excedido',

            'cantidad.required'=>'Ingrese una abreviatura para el nivel de intervencion',
           

           
            ]);
        
            $herramienta=Herramienta::findOrFail($id);
            $herramienta->descripcion=$request->descripcion;
            $herramienta->cantidad=$request->cantidad;
    
            $herramienta->save();
   
              return redirect()->route('Herramienta.index')->with('datos','Registro Nuevo Guardado...!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $herramienta=Herramienta::findOrFail($id);
        $herramienta->control='0';
        $herramienta->save();
        return redirect()->route('Herramienta.index')->with('datos','Registro Eliminado...!');
    }
}
