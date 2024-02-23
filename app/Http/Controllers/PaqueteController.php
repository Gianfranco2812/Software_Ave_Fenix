<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paquete;
use App\Models\Envio;

class PaqueteController extends Controller
{
    public function index() {
        $paquetes = Paquete::all();
        $envios = Envio::all();
        return view('paquetes.index', ['paquetes' => $paquetes, 'envios' => $envios]);
    }

    public function create() {
        $envios = Envio::all();
        return view('paquetes.create', ['envios' => $envios]);
    }

    public function store(Request $request) {
        $data = $request->validate([
            'Peso' => 'required|numeric',
            'Descripcion' => 'required|max:100',
            'EnvíoID' => 'required',
        ]);

        $newPaquete = Paquete::create($data);
        return redirect(route('paquetes.index'));
    }

    public function edit(Paquete $paquete) {
        $envios = Envio::all();
        return view('paquetes.edit', ['paquete' => $paquete, 'envios' => $envios]);
    }

    public function update(Paquete $paquete, Request $request) {
        $data = $request->validate([
            'Peso' => 'required|numeric',
            'Descripcion' => 'required|max:100',
            'EnvíoID' => 'required',
        ]);

        $paquete->update($data);
        return redirect(route('paquetes.index'))->with('success', 'Paquete actualizado');
    }

    public function destroy(Paquete $paquete) {
        $paquete->delete();
        return redirect(route('paquetes.index'))->with('success', 'Paquete eliminado');
    }
}
