<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Envio;
use App\Models\Cliente;
use App\Models\Comprobante;
use App\Models\Transporte;
use App\Models\Ruta;
use App\Models\Rutadetalle;
use App\Models\Agencia;

class EnvioController extends Controller
{
    public function index() {
        $envios = Envio::all();
        $clientes = Cliente::all();
        $comprobantes = Comprobante::all();
        $transportes = Transporte::all();
        $rutas = Ruta::all();
        $detalles = Rutadetalle::all();
        $agencias = Agencia::all();
        return view('envios.index', ['envios' => $envios, 'clientes' => $clientes, 'comprobantes' => $comprobantes, 'transportes' => $transportes, 'rutas' => $rutas, 'detalles' => $detalles, 'agencias' => $agencias]);
    }

    public function create() {
        $clientes = Cliente::all();
        $comprobantes = Comprobante::all();
        $transportes = Transporte::all();
        $rutas = Ruta::all();
        $detalles = Rutadetalle::all();
        $agencias = Agencia::all();
        return view('envios.create', ['clientes' => $clientes, 'comprobantes' => $comprobantes, 'transportes' => $transportes, 'rutas' => $rutas, 'detalles' => $detalles, 'agencias' => $agencias]);
    }

    public function store(Request $request) {
        $data = $request->validate([
            'Fecha' => 'required',
            'Clave' => 'required|max:6',
            'Destinatario' => 'required|max:30',
            'ClienteID' => 'required',
            'ComprobanteID' => 'required',
            'TransporteID' => 'required',
            'RutaID' => 'required',
        ]);

        $newEnvio = Envio::create($data);
        return redirect(route('envios.index'));
    }

    public function edit(Envio $envio) {
        $clientes = Cliente::all();
        $comprobantes = Comprobante::all();
        $transportes = Transporte::all();
        $rutas = Ruta::all();
        $detalles = Rutadetalle::all();
        $agencias = Agencia::all();
        return view('envios.edit', ['envio' => $envio, 'clientes' => $clientes, 'comprobantes' => $comprobantes, 'transportes' => $transportes, 'rutas' => $rutas, 'detalles' => $detalles, 'agencias' => $agencias]);
    }

    public function update(Envio $envio, Request $request) {
        $data = $request->validate([
            'Fecha' => 'required',
            'Clave' => 'required|max:6',
            'Destinatario' => 'required|max:30',
            'ClienteID' => 'required',
            'ComprobanteID' => 'required',
            'TransporteID' => 'required',
            'RutaID' => 'required',
        ]);

        $envio->update($data);
        return redirect(route('envios.index'))->with('success', 'Envío actualizado');
    }

    public function destroy(Envio $envio) {
        $envio->delete();
        return redirect(route('envios.index'))->with('success', 'Envío eliminado');
    }
}
