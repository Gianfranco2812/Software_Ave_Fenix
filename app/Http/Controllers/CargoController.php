<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cargo;
use App\Models\Area;

class CargoController extends Controller
{
    public function index()
    {
        $cargos = Cargo::with(['area'])
        ->join('area', 'area.id_area', '=', 'cargo.id_area')
        ->where('area.control', 1)
        ->get();
        return view('Cargo.index', compact('cargos'));
   
    }
    public function create()
    {

$areas = Area::where('control', 1)->get();
        return view('Cargo.create', compact('areas'));
    }

    public function store(Request $request)
    {

        $cargo = new Cargo();
        $cargo->cargo = $request->Cargo;
        $cargo->descripcion = $request->Descripcion;
        $cargo->control = '1';
        $cargo->id_area = $request->Area;
        $cargo->save();

        return redirect()->route('cargo.index')->with('success', 'Cargo creado correctamente');
    }

    public function edit($id)
    {
        $cargo = Cargo::find($id);
        $areas = Area::where('control', 1)->get();
        return view('cargo.edit', compact('cargo', 'areas'));
    }

    public function update(Request $request, $id)
    {

        $cargo = Cargo::find($id);
        $cargo->cargo = $request->Cargo;
        $cargo->descripcion = $request->Descripcion;
        $cargo->id_area = $request->Area;

        $cargo->save();

        return redirect()->route('cargo.index')->with('success', 'Cargo editado correctamente');
    }

public function destroy($id)
    {
        $cargo = Cargo::findOrFail($id);
        $cargo->control = 0;
        $cargo->save();

        return redirect()->route('cargo.index')->with('success', 'Cargo eliminado correctamente');
    }
}
