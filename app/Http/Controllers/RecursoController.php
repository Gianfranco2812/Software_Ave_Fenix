<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recurso;

class RecursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PAGINATION=10;
    public function index(Request $request)
    {
        //
        $buscarpor=$request->get('buscarpor');
        $recurso=Recurso::where('control','=','1')->where('denominacion','like',$buscarpor.'%')->paginate($this::PAGINATION); ; 
        
         return view('Recurso.index',compact('recurso','buscarpor')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $recurso=Recurso::where('control','=','1')->get();
        return view('Recurso.create',compact('recurso'));
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

            'denominacion'=>'required|max:60',
            'costo'=>'required',
            'stock'=>'required',
            'tipo'=>'required|max:60',
            'medida'=>'required|max:15',       
  
    
            ],
            [
            'denominacion.required'=>'Ingrese la denominación del recurso',
            'denominacion.max'=>'Límite de caracteres excedido',

            'costo.required'=>'Ingrese el costo',
            'costo.max'=>'Límite de caracteres excedido',

            'stock.required'=>'Ingrese el stock',
            'stock.max'=>'Límite de caracteres excedido',


            'tipo.required'=>'Ingrese el tipo de recurso',
            'tipo.max'=>'Límite de caracteres excedido',

            'medida.required'=>'Ingrese una medida para el recurso',
            'medida.max'=>'Límite de caracteres excedido',

            ]);

    
            $recurso=new Recurso();
            $recurso->denominacion=$request->denominacion;
            $recurso->costo=$request->costo;
            $recurso->stock=$request->stock;
            $recurso->tipo=$request->tipo;
            $recurso->medida=$request->medida;


            $recurso->control='1';
            $recurso->save();
   
            return redirect()->route('Recurso.index')->with('datos','Registro Nuevo Guardado...!');
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
        $recurso=Recurso::findOrFail($id);
        return view('Recurso.edit',compact('recurso'));
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

            'denominacion'=>'required|max:60',
            'costo'=>'required',
            'stock'=>'required',
            'tipo'=>'required|max:60',
            'medida'=>'required|max:15',       
  
    
            ],
            [
            'denominacion.required'=>'Ingrese la denominación del recurso',
            'denominacion.max'=>'Límite de caracteres excedido',

            'costo.required'=>'Ingrese el costo',
            'costo.max'=>'Límite de caracteres excedido',

            'stock.required'=>'Ingrese el stock',
            'stock.max'=>'Límite de caracteres excedido',


            'tipo.required'=>'Ingrese el tipo de recurso',
            'tipo.max'=>'Límite de caracteres excedido',

            'medida.required'=>'Ingrese una medida para el recurso',
            'medida.max'=>'Límite de caracteres excedido',

            ]);
        
            $recurso=Recurso::findOrFail($id);
            $recurso->denominacion=$request->denominacion;
            $recurso->costo=$request->costo;
            $recurso->stock=$request->stock;
            $recurso->tipo=$request->tipo;
            $recurso->medida=$request->medida;
    
            $recurso->save();
   
              return redirect()->route('Recurso.index')->with('datos','Registro Nuevo Guardado...!');
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
        $recurso=Recurso::findOrFail($id);
        $recurso->control='0';
        $recurso->save();
        return redirect()->route('Recurso.index')->with('datos','Registro Eliminado...!');
    }
}