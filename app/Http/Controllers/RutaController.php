<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruta;
use App\Models\Rutadetalle;
use App\Models\Agencia;

class RutaController extends Controller
{
    public function index() {
        $rutas = Ruta::all();
        $detalles = Rutadetalle::all();
        $agencias = Agencia::all();
        return view('rutas.index', ['rutas' => $rutas, 'detalles' => $detalles, 'agencias' => $agencias]);
    }

    public function create() {
        $agencias = Agencia::all();
        return view('rutas.create', ['agencias' => $agencias]);
    }

    public function store(Request $request) {
        $ruta = new Ruta();
        $ruta->Duracionaprox = $request->Duracionaprox;
        $ruta->save();

        $rutaId = $ruta->RutaID;

        $rutaOrigen = new Rutadetalle();
        $rutaOrigen->RutaID = $rutaId;
        $rutaOrigen->AgenciaID = $request->idOrigen;
        $rutaOrigen->Categoria = "Origen";
        $rutaOrigen->save();

        $rutaDestino = new Rutadetalle();
        $rutaDestino->RutaID = $rutaId;
        $rutaDestino->AgenciaID = $request->idDestino;
        $rutaDestino->Categoria = "Destino";
        $rutaDestino->save();

        return redirect(route('rutas.index'));
    }

    public function edit(Ruta $ruta) {

        $rutaId = $ruta->RutaID;
        $detalles = Rutadetalle::where('RutaID', $rutaId)->get();
        foreach ($detalles as $detalle) {
            if ($detalle->Categoria == 'Origen') {
                $origen = $detalle;
            }
            if ($detalle->Categoria == 'Destino') {
                $destino = $detalle;
            }
        }
        $agencias = Agencia::all();

        return view('rutas.edit', ['ruta' => $ruta, 'origen' => $origen, 'destino' => $destino, 'agencias' => $agencias]);
    }

    public function update(Ruta $ruta, Request $request) {
        $rutaId = $ruta->RutaID;
        $detalles = Rutadetalle::where('RutaID', $rutaId)->get();
        foreach ($detalles as $detalle) {
            if ($detalle->Categoria == 'Origen') {
                $origen = $detalle;
            }
            if ($detalle->Categoria == 'Destino') {
                $destino = $detalle;
            }
        }

        $origen->AgenciaID = $request->idOrigen;
        $origen->save();

        $destino->AgenciaID = $request->idDestino;
        $destino->save();

        $ruta->Duracionaprox = $request->Duracionaprox;
        $ruta->save();

        return redirect(route('rutas.index'))->with('success', 'Ruta actualizada');
    }

    public function destroy(Ruta $ruta) {
        $ruta->delete();
        return redirect(route('rutas.index'))->with('success', 'Ruta eliminada');
    }
}
