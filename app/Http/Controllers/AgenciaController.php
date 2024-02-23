<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agencia;

class AgenciaController extends Controller
{
    public function index() {
        $agencias = Agencia::all();
        return view('agencias.index', ['agencias' => $agencias]);
    }

    public function create() {
        return view('agencias.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'Ciudad' => 'required|max:20',
            'Direccion' => 'required|max:100',
        ]);

        $newAgencia = Agencia::create($data);
        return redirect(route('agencias.index'));
    }

    public function edit(Agencia $agencia) {
        return view('agencias.edit', ['agencia' => $agencia]);
    }

    public function update(Agencia $agencia, Request $request) {
        $data = $request->validate([
            'Ciudad' => 'required|max:20',
            'Direccion' => 'required|max:100',
        ]);

        $agencia->update($data);
        return redirect(route('agencias.index'))->with('success', 'Agencia actualizada');
    }

    public function destroy(Agencia $agencia) {
        $agencia->delete();
        return redirect(route('agencias.index'))->with('success', 'Agencia eliminada');
    }
}
