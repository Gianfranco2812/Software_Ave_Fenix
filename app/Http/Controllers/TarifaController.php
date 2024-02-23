<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarifa;

class TarifaController extends Controller
{
    public function index() {
        $tarifas = Tarifa::all();
        return view('tarifas.index', ['tarifas' => $tarifas]);
    }

    public function create() {
        return view('tarifas.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'Monto' => 'required|numeric',
            'Descripcion' => 'required|max:100',
            'Estado' => 'required|max:10',
        ]);

        $newTarifa = Tarifa::create($data);
        return redirect(route('tarifas.index'));
    }

    public function edit(Tarifa $tarifa) {
        return view('tarifas.edit', ['tarifa' => $tarifa]);
    }

    public function update(Tarifa $tarifa, Request $request) {
        $data = $request->validate([
            'Monto' => 'required|numeric',
            'Descripcion' => 'required|max:100',
            'Estado' => 'required|max:10',
        ]);

        $tarifa->update($data);
        return redirect(route('tarifas.index'))->with('success', 'Tarifa actualizada');
    }

    public function destroy(Tarifa $tarifa) {
        $tarifa->delete();
        return redirect(route('tarifas.index'))->with('success', 'Tarifa eliminada');
    }
}
