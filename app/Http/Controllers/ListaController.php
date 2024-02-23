<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ciudad;
use App\Models\Cliente;
use App\Models\Servicios;
use App\Models\Estado;
use App\Models\DetalleVenta;
use Illuminate\Support\Facades\DB;

class ListaController extends Controller
{
    //
    public function index()
    {
        //
        $ciudad=Ciudad::all();
        $cliente=Cliente::all();
        $servicios=Servicios::all();
        $estado=Estado::all();
        //return $ciudad;
        return view('ventas.lista', compact('ciudad','cliente','servicios','estado'));
    }
}
