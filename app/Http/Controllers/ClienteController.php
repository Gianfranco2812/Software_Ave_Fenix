<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Ciudad;
use Illuminate\Http\Request;


class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PAGINATION=5;
    public function index(Request $request)
    {
        $buscarpor=trim($request->get('buscarpor'));
        $cliente=Cliente::where('nombre','LIKE','%'.$buscarpor.'%')
        ->paginate($this::PAGINATION);;
        //return $cliente;
        return view('clientes.index', compact('cliente'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'nombre' => 'required|regex:/^[a-zA-ZÑñ\s]+$/u',
                'direccion' => 'required',
                'celular' => 'required|numeric|min:111111111|max:999999999',
                'ciudad' => 'required|alpha',
                'dni' => 'required|numeric|min:11111111|max:99999999',
            ],[
                'nombre.required' => 'El nombre es requerido.',
                'direccion.required' => 'Debe ingresar una direccion',
                'celular.required' => 'Debe ingresar un número de celular',
                'ciudad.required' => 'Debe ingresar una ciudad',
                'ciudad.alpha'=> 'Este campo no acepta dígitos',
                'dni.required' => 'Debe ingresar un Dni',
                'dni.numeric' => 'Debe ingresar solo números',
                'dni.min' => 'El número de Dni debe ser mínimo 8 dígitos',
                'dni.max' => 'El número de Dni debe ser máximo 8 dígitos',
                'celular.required' => 'Debe ingresar un celular',
                'celular.numeric' => 'Debe ingresar solo dígitos',
                'celular.min' => 'El número de celular debe ser mínimo 9 dígitos',
                'celular.max' => 'El número de celular debe ser máximo 9 dígitos',
            ]
        );
        $cliente=Cliente::create($request->all());
        return redirect()->route('cliente.index')->with('datos','Se ha registrado un nuevo cliente exitosamente');

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
    public function edit(Cliente $cliente)
    {
        //
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
        $request->validate(
            [
                'nombre' => 'required|regex:/^[a-zA-ZÑñ\s]+$/u',
                'direccion' => 'required',
                'celular' => 'required|numeric|min:111111111|max:999999999',
                'ciudad' => 'required|alpha',
                'dni' => 'required|numeric|min:11111111|max:99999999',
            ],[
                'nombre.required' => 'El nombre es requerido.',
                'direccion.required' => 'Debe ingresar una direccion',
                'celular.required' => 'Debe ingresar un número de celular',
                'ciudad.required' => 'Debe ingresar una ciudad',
                'ciudad.alpha'=> 'Este campo no acepta dígitos',
                'dni.required' => 'Debe ingresar un Dni',
                'dni.numeric' => 'Debe ingresar solo números',
                'dni.min' => 'El número de Dni debe ser mínimo 8 dígitos',
                'dni.max' => 'El número de Dni debe ser máximo 8 dígitos',
                'celular.required' => 'Debe ingresar un celular',
                'celular.numeric' => 'Debe ingresar solo dígitos',
                'celular.min' => 'El número de celular debe ser mínimo 9 dígitos',
                'celular.max' => 'El número de celular debe ser máximo 9 dígitos',
            ]
        );
        $cliente->nombre=$request->nombre;
        $cliente->direccion=$request->direccion;
        $cliente->celular=$request->celular;
        $cliente->ciudad=$request->ciudad;
        $cliente->dni=$request->dni;
        $cliente->save();
        return redirect()->route('cliente.index')->with('datos','Se ha Actualizado los datos de cliente exitosamente');
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        //
        $cliente->delete();
        return redirect('clientes')->with('datos','Se Eliminado el registro con éxito');
    }
}
