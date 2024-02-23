<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sucursal;

class SucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sucursales = Sucursal::where('control', 1)->get();
        return view('sucursal.index')->with(compact('sucursales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sucursal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {



        $sucursal = new Sucursal();
        $sucursal->sucursal=$request->Sucursal;
        $sucursal->control='1';
        $sucursal->save();
        return redirect()->route('sucursal.index');
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
             $sucursal=Sucursal::findOrFail($id);

    
             return view('sucursal.edit',compact('sucursal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $sucursal=Sucursal::findOrFail($id);
        $sucursal->sucursal=$request->Sucursal;
        $sucursal->save();
        return redirect()->route('sucursal.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $sucursal=Sucursal::findOrFail($id);
        $sucursal->control='0';
        $sucursal->save();
        return redirect()->route('sucursal.index')->with('datos','Registro Eliminado...!');
    }
}
