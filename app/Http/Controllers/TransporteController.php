<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transporte;

class TransporteController extends Controller
{
    public function index() {
        $transportes = Transporte::all();
        return view('transportes.index', ['transportes' => $transportes]);
    }

    public function create() {
        return view('transportes.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'Año' => 'required|max:4',
            'Descripcion' => 'required|max:100',
            'Estado' => 'required|max:20',
            'Marca' => 'required|max:20',
            'Modelo' => 'required|max:30',
        ]);

        $newTransporte = Transporte::create($data);
        return redirect(route('transportes.index'));
    }

    public function edit(Transporte $transporte) {
        return view('transportes.edit', ['transporte' => $transporte]);
    }

    public function update(Transporte $transporte, Request $request) {
        $data = $request->validate([
            'Año' => 'required|max:4',
            'Descripcion' => 'required|max:100',
            'Estado' => 'required|max:20',
            'Marca' => 'required|max:20',
            'Modelo' => 'required|max:30',
        ]);

        $transporte->update($data);
        return redirect(route('transportes.index'))->with('success', 'Transporte actualizado');
    }

    public function destroy(Transporte $transporte) {
        $transporte->delete();
        return redirect(route('transportes.index'))->with('success', 'Transporte eliminado');
    }
}
