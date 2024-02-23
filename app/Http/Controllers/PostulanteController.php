<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postulante;

class PostulanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PAGINATION=10;
    public function index(Request $request)
    {
        //
        $buscarpor=$request->get('buscarpor');
        $postulante=Postulante::where('control','=','1')->where('nombre','like',$buscarpor.'%')->paginate($this::PAGINATION); ; 
        
        return view('Postulante.index',compact('postulante','buscarpor')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        

        $postulante=Postulante::where('control','=','1')->get();
        return view('Postulante.create',compact('postulante'));
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


            'dni'=>'required|max:8',
            'nombre'=>'required|max:30',
            'apellidos'=>'required|max:60',
            'edad'=>'required|max:2',


    
            ],
            [
            'dni.required'=>'Ingrese un número de DNI',
            'dni.max'=>'No exceder de 8 caracteres',

            'nombre.required'=>'Ingrese un nombre',
            'nombre.max'=>'No exceder de 30 caracteres',

            'apellidos.required'=>'Ingrese los apellidos',
            'apellidos.max'=>'No exceder de 60 caracteres',

            'edad.required'=>'Ingrese un valor para la edad',
            'edad.max'=>'Fuera del rango permitido',


           
            ]);


            $postulante=new Postulante();
            $postulante->dni=$request->dni;
            $postulante->nombre=$request->nombre;
            $postulante->apellidos=$request->apellidos;
            $postulante->edad=$request->edad;
            $postulante->direccion=$request->direccion;
            $postulante->telefono=$request->telefono; 
            $postulante->correo=$request->email;
            


  
            $postulante->control='1';
            $postulante->id_personal='0';/*revisar base de datos de personal*/
            $postulante->estado="0"; /*0=registrado, 1=aceptado, 2=rechazado*/
            $postulante->save();
   
            return redirect()->route('Postulante.index')->with('datos','Registro Nuevo Guardado...!');
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
        $postulante=Postulante::findOrFail($id);

    
        return view('Postulante.edit',compact('postulante'));
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

            'dni'=>'required|max:8',
            'nombre'=>'required|max:30',
            'apellidos'=>'required|max:60',
            'edad'=>'required|max:2',
        
  
    
            ],
            [
            'dni.required'=>'Ingrese un número de DNI',
            'dni.max'=>'No exceder de 8 caracteres',

            'nombre.required'=>'Ingrese un nombre',
            'nombre.max'=>'No exceder de 30 caracteres',

            'apellidos.required'=>'Ingrese los apellidos',
            'apellidos.max'=>'No exceder de 60 caracteres',


          

           
            ]);
            $postulante=Postulante::findOrFail($id);
            $postulante->dni=$request->dni;
            $postulante->nombre=$request->nombre;
            $postulante->apellidos=$request->apellidos;
            $postulante->edad=$request->edad;
            $postulante->estado=$request->estado;
            $postulante->direccion=$request->direccion;
            $postulante->telefono=$request->telefono; 
            $postulante->correo=$request->email;
            $postulante->save();
   
              return redirect()->route('Postulante.index')->with('datos','Registro Nuevo Guardado...!');
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
        $postulante=Postulante::findOrFail($id);
        $postulante->control='0';
        $postulante->save();
        return redirect()->route('Postulante.index')->with('datos','Registro Eliminado...!');
    }
}
