<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reclamo;
use App\Models\Cliente;

class ReclamoController extends Controller
{
    public function index() {
        $reclamos = Reclamo::all();
        $clientes = Cliente::all();
        return view('reclamos.index', ['reclamos' => $reclamos, 'clientes' => $clientes]);
    }

    public function create() {
        $clientes = Cliente::all();
        return view('reclamos.create', ['clientes' => $clientes]);
    }

    public function store(Request $request) {
        $data = $request->validate([
            'Codigo' => 'required|max:10',
            'Descripcion' => 'required|max:100',
            'ClienteID' => 'required',
            'Estado' => 'required|max:10',
        ]);

        $newReclamo = Reclamo::create($data);
        return redirect(route('reclamos.index'));
    }

    public function edit(Reclamo $reclamo) {
        $clientes = Cliente::all();
        return view('reclamos.edit', ['reclamo' => $reclamo, 'clientes' => $clientes]);
    }

    public function update(Reclamo $reclamo, Request $request) {
        $data = $request->validate([
            'Codigo' => 'required|max:10',
            'Descripcion' => 'required|max:100',
            'ClienteID' => 'required',
            'Estado' => 'required|max:10',
        ]);

        $reclamo->update($data);
        return redirect(route('reclamos.index'))->with('success', 'Reclamo actualizado');
    }

    public function destroy(Reclamo $reclamo) {
        $reclamo->delete();
        return redirect(route('reclamos.index'))->with('success', 'Reclamo eliminado');
    }
}
