<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GraficoController extends Controller
{
    //

    public function index ()
    {
        $pasajes=DB::select('CALL pasajes_vendidos();');
        $puntos=[];
        foreach ($pasajes as $p) {
            // Verifica si el valor de 'total' es mayor que cero o no es nulo
            if ($p->total > 0) {
                $puntos[] = [
                    'name' => $p->Nomciudad, //Nombre de ciudad
                    'y' => floatval($p->total), //cantidad de pasajes
                    'monto_total' => floatval($p->monto_total) //Monto total de pasajes vendidos

                ];
            }
        }

        $cancelados=DB::select('CALL pasajes_cancelados();');
        $vector=[];
        foreach ($cancelados as $c) {
            // Verifica si el valor de 'total' es mayor que cero o no es nulo
            if ($c->total_cancelados > 0) {
                $vector[] = [
                    'name' => $c->Nomciudad, 
                    'y' => floatval($c->total_cancelados)

                ];
            }
        }
        //return view('graficos.index',['dato' => json_encode($vector)],);
        //return $vector;
        return view('graficos.index')->with('data', json_encode($puntos))->with('dato', json_encode($vector));
        //return $puntos;
    }

}
