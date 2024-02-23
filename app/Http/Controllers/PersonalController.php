<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal;
use App\Models\Postulante;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PAGINATION=10;
    public function index(Request $request)
    {
        //
        $buscarpor=$request->get('buscarpor');
        $personal=Personal::where('control','=','1')->where('nombre','like',$buscarpor.'%')->paginate($this::PAGINATION);  
        
        return view('Personal.index',compact('personal','buscarpor')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        

        $personal=Personal::where('control','=','1')->get();
        return view('Personal.create',compact('personal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data=request()->validate([ 


            'dni'=>'required|max:8',
            'nombre'=>'required|max:30',
            'apellidos'=>'required|max:60',
            'edad'=>'required|max:2',
            'genero'=>'required|max:20',

    
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

            'genero.required'=>'Ingrese el género',
            'genero.max'=>'No exceder de 20 caracteres',

           
            ]);


            $personal=new Personal();
            $personal->dni=$request->dni;
            $personal->nombre=$request->nombre;
            $personal->apellidos=$request->apellidos;
            $personal->edad=$request->edad;
            $personal->genero=$request->genero;
            $personal->estado_civil=$request->estado_civil;
            $personal->direccion=$request->direccion;
            $personal->telefono=$request->telefono; 
            $personal->email=$request->email;
            $personal->fecha_nac=$request->fecha_nac;
            $personal->num_licencia=$request->num_licencia;
            $personal->tip_licencia=$request->tip_licencia;


  
            $personal->control='1';
            $personal->save();
   
              return redirect()->route('Personal.index')->with('datos','Registro Nuevo Guardado...!');
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
        $personal=Personal::findOrFail($id);

    
        return view('Personal.edit',compact('personal'));
    }
    public function  pos($id)
    {
            //
            $postulante=Postulante::findOrFail($id);
            $postulante->control='0';
            $postulante->save();
    
        
            return view('Personal.pos',compact('postulante'));
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
            'genero'=>'required|max:20',
  
    
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

            'genero.required'=>'Ingrese el género',
            'genero.max'=>'No exceder de 20 caracteres',

           
            ]);
        
            $personal=Personal::findOrFail($id);
            $personal->dni=$request->dni;
            $personal->nombre=$request->nombre;
            $personal->apellidos=$request->apellidos;
            $personal->edad=$request->edad;
            $personal->genero=$request->genero;
            $personal->estado_civil=$request->estado_civil;
            $personal->direccion=$request->direccion;
            $personal->telefono=$request->telefono; 
            $personal->email=$request->email;
            $personal->fecha_nac=$request->fecha_nac;
            $personal->num_licencia=$request->num_licencia;
            $personal->tip_licencia=$request->tip_licencia;
            $personal->save();
   
              return redirect()->route('Personal.index')->with('datos','Registro Nuevo Guardado...!');
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
        $personal=Personal::findOrFail($id);
        $personal->control='0';
        $personal->save();
        return redirect()->route('Personal.index')->with('datos','Registro Eliminado...!');
    }
    
}
