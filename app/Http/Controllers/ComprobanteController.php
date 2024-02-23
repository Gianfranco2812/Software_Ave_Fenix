<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comprobante;
use App\Models\Tarifa;
use App\Models\Promocion;

class ComprobanteController extends Controller
{
    public function index() {
        $comprobantes = Comprobante::all();
        $tarifas = Tarifa::all();
        $promociones = Promocion::all();
        return view('comprobantes.index', ['comprobantes' => $comprobantes, 'tarifas' => $tarifas, 'promociones' => $promociones]);
    }

    public function create() {
        $tarifas = Tarifa::all();
        $promociones = Promocion::all();
        return view('comprobantes.create', ['tarifas' => $tarifas, 'promociones' => $promociones]);
    }

    public function store(Request $request) {
        $data = $request->validate([
            'Fecha' => 'required',
            'Monto' => 'required|numeric',
            'Numero' => 'required|max:10',
            'Observaciones' => 'required|max:100',
            'TarifaID' => 'required',
            'PromociónID' => 'required',
        ]);

        $newComprobante = Comprobante::create($data);
        return redirect(route('comprobantes.index'));
    }

    public function edit(Comprobante $comprobante) {
        $tarifas = Tarifa::all();
        $promociones = Promocion::all();
        return view('comprobantes.edit', ['comprobante' => $comprobante, 'tarifas' => $tarifas, 'promociones' => $promociones]);
    }

    public function update(Comprobante $comprobante, Request $request) {
        $data = $request->validate([
            'Fecha' => 'required',
            'Monto' => 'required|numeric',
            'Numero' => 'required|max:10',
            'Observaciones' => 'required|max:100',
            'TarifaID' => 'required',
            'PromociónID' => 'required',
        ]);

        $comprobante->update($data);
        return redirect(route('comprobantes.index'))->with('success', 'Comprobante actualizado');
    }

    public function destroy(Comprobante $comprobante) {
        $comprobante->delete();
        return redirect(route('comprobantes.index'))->with('success', 'Comprobante eliminado');
    }
}
