<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Estado;
use App\Models\DetalleVenta;
use App\Models\Ventas;
use App\Models\Itinerario;
use App\Models\Formapago;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

class PdfController extends Controller
{
    public function generaPdf(string $id){
        /*
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();
        */       
        $ventas=Ventas::find($id);
        $clientes=DB::table('clientes')->where('idcliente','=',$ventas->idcliente)->get();
        $formapago=DB::table('formapago')->where('idformapago','=',$ventas->idformapago)->get();
        $estado=DB::table('estado')->where('idestado','=',$ventas->idestado)->get();
        $itinerario=DB::table('detalleventa as d')->join('itinerario as i','d.iditinerario','=','i.iditinerario')->where('d.idventas','=',$ventas->idventas)->select('d.iditinerario','i.asientos','d.cantidad','i.Nomciudad','i.PrecioCiud','i.NomServicio','i.PrecioServ','i.horaida','i.horallegada')->get();
        $pdf = Pdf::loadView('pdf.show2',['ventas'=> $ventas,'clientes'=> $clientes,'estado'=> $estado,'itinerario'=> $itinerario,'formapago'=> $formapago]);
        return $pdf->download('Venta.pdf');
        
    }
}
