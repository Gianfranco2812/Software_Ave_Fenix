<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PAGINATION=10;
    public function index(Request $request)
    {
        //
        $buscarpor=$request->get('buscarpor');
         $proveedor=Proveedor::where('control','=','1')->where('razon_social','like',$buscarpor.'%')->paginate($this::PAGINATION); ; 
        
         return view('Proveedor.index',compact('proveedor','buscarpor')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $proveedor=Proveedor::where('control','=','1')->get();
        return view('Proveedor.create',compact('proveedor'));
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

        

            $proveedor=new Proveedor();
            $proveedor->ruc=$request->ruc;
            $proveedor->razon_social=$request->razon_social;
            $proveedor->direccion=$request->direccion;
            $proveedor->telefono=$request->telefono;
            $proveedor->email=$request->email;


            $proveedor->control='1';
            $proveedor->save();
   
            return redirect()->route('Proveedor.index')->with('datos','Registro Nuevo Guardado...!');
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
        $proveedor=Proveedor::findOrFail($id);
        return view('Proveedor.edit',compact('proveedor'));
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
        
            $proveedor=Proveedor::findOrFail($id);
            $proveedor->ruc=$request->ruc;
            $proveedor->razon_social=$request->razon_social;
            $proveedor->direccion=$request->direccion;
            $proveedor->telefono=$request->telefono;
            $proveedor->email=$request->email;
    
            $proveedor->save();
   
              return redirect()->route('Proveedor.index')->with('datos','Registro Nuevo Guardado...!');
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
        $proveedor=Proveedor::findOrFail($id);
        $proveedor->control='0';
        $proveedor->save();
        return redirect()->route('Proveedor.index')->with('datos','Registro Eliminado...!');
    }
}