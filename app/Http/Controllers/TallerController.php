<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Taller;

class TallerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PAGINATION=10;
    public function index(Request $request)
    {
        //
        $buscarpor=$request->get('buscarpor');
         $taller=Taller::where('control','=','1')->where('razon_social','like',$buscarpor.'%')->paginate($this::PAGINATION); ; 
        
         return view('Taller.index',compact('taller','buscarpor')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $taller=Taller::where('control','=','1')->get();
        return view('Taller.create',compact('taller'));
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

            'ruc'=>'required|min:11|max:11',
            'razon_social'=>'required|max:100',
            'direccion'=>'required|max:60',
            'telefono'=>'required|max:15',
            'email'=>'required|max:60',
       
     
  
    
            ],
            [
            'ruc.required'=>'Ingrese el RUC del taller',
            'ruc.min'=>'Valor inválido',
            'ruc.max'=>'Valor inválido',

            'razon_social.required'=>'Ingrese la razón social del taller',
            'razon_social.max'=>'Límite de caracteres excedido',

            'direccion.required'=>'Ingrese la dirección del taller',
            'direccion.max'=>'Límite de caracteres excedido',

            'telefono.required'=>'Ingrese el teléfono del taller',
            'telefono.max'=>'Límite de caracteres excedido',

            'email.required'=>'Ingrese un correo electrónico',
            'email.max'=>'Límite de caracteres excedido',

           
            ]);

        

            $taller=new Taller();
            $taller->ruc=$request->ruc;
            $taller->razon_social=$request->razon_social;
            $taller->direccion=$request->direccion;
            $taller->telefono=$request->telefono;
            $taller->email=$request->email;


            $taller->control='1';
            $taller->save();
   
            return redirect()->route('Taller.index')->with('datos','Registro Nuevo Guardado...!');
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
        $taller=Taller::findOrFail($id);
        return view('Taller.edit',compact('taller'));
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

            'ruc'=>'required|min:11|max:11',
            'razon_social'=>'required|max:100',
            'direccion'=>'required|max:60',
            'telefono'=>'required|max:15',
            'email'=>'required|max:60',
       
     
  
    
            ],
            [
            'ruc.required'=>'Ingrese el RUC del taller',
            'ruc.min'=>'Valor inválido',
            'ruc.max'=>'Valor inválido',

            'razon_social.required'=>'Ingrese la razón social del taller',
            'razon_social.max'=>'Límite de caracteres excedido',

            'direccion.required'=>'Ingrese la dirección del taller',
            'direccion.max'=>'Límite de caracteres excedido',

            'telefono.required'=>'Ingrese el teléfono del taller',
            'telefono.max'=>'Límite de caracteres excedido',

            'email.required'=>'Ingrese un correo electrónico',
            'email.max'=>'Límite de caracteres excedido',

           
            ]);
        
            $taller=Taller::findOrFail($id);
            $taller->ruc=$request->ruc;
            $taller->razon_social=$request->razon_social;
            $taller->direccion=$request->direccion;
            $taller->telefono=$request->telefono;
            $taller->email=$request->email;
    
            $taller->save();
   
              return redirect()->route('Taller.index')->with('datos','Registro Nuevo Guardado...!');
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
        $taller=Taller::findOrFail($id);
        $taller->control='0';
        $taller->save();
        return redirect()->route('Taller.index')->with('datos','Registro Eliminado...!');
    }
}