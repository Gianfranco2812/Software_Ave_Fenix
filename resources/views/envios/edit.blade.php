@extends('layouts.plantilla')
@section('title', 'Envíos') {{-- Edita "Ejemplo" por el nombre que corresponda, esto aparece en la pestaña del
navegador --}}

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">ENVÍOS</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        {{--
        -------------------------------------------------------------------------------------------------------------------------------------------
        - --}}
        {{-- INICIO DE CONTENIDO --}}

        <div>
            <div class="text-center fs-2">
                Editar Envío
            </div>
            <form class="space-y-4" method="post" action="{{route('envios.update', ['envio' => $envio])}}">
                @csrf
                @method('put')

                <div class="row">
                    <label for="">Cliente</label>
                    <select class="form-control" id="ClienteID" onchange="validarInputs()" name="ClienteID">
                        <option value="0" selected>- Seleccione Cliente -</option>
                        @foreach($clientes as $cliente) 
                            @if ($envio->ClienteID == $cliente->idcliente)
                                <option selected value="{{ $cliente->idcliente }}">{{ $cliente->nombre }}</option>
                            @else
                                <option value="{{ $cliente->idcliente }}">{{ $cliente->nombre }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="row mt-4">
                    <label for="">Destinatario</label>
                    <input class="border p-3 rounded ml-6" type="text" name="Destinatario" placeholder="Destinatario" value="{{$envio->Destinatario}}">
                </div>
                <div class="row mt-4">
                    <label for="">Fecha</label>
                    <input class="border p-3 rounded ml-6" type="date" name="Fecha" placeholder="Fecha" value="{{$envio->Fecha}}">
                </div>
                <div class="row mt-4">
                    <label for="">Clave</label>
                    <input class="border p-3 rounded ml-6" type="text" name="Clave" placeholder="Clave" value="{{$envio->Clave}}">
                </div>
                <div class="row mt-4">
                    <label for="">Comprobante</label>
                    <select class="form-control" id="ComprobanteID" onchange="validarInputs()" name="ComprobanteID">
                        <option value="0" selected>- Seleccione Comprobante -</option>
                        @foreach($comprobantes as $comprobante) 
                            @if ($envio->ComprobanteID == $comprobante->ComprobanteID)
                                <option selected value="{{ $comprobante->ComprobanteID }}">{{ $comprobante->Numero }}</option>
                            @else
                                <option value="{{ $comprobante->ComprobanteID }}">{{ $comprobante->Numero }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="row mt-4">
                    <label for="">Ruta</label>
                    <select class="form-control" id="RutaID" onchange="validarInputs()" name="RutaID">
                        <option value="0" selected>- Seleccione Ruta -</option>
                        @foreach($rutas as $ruta) 
                            @foreach ($detalles as $detalleOrigen)
                                @if ($ruta->RutaID == $detalleOrigen->RutaID && $detalleOrigen->Categoria == 'Origen')
                                    @foreach ($detalles as $detalleDestino)
                                        @if ($ruta->RutaID == $detalleDestino->RutaID && $detalleDestino->Categoria == 'Destino')
                                            @foreach ($agencias as $agenciaOrigen)
                                                @if ($agenciaOrigen->AgenciaID == $detalleOrigen->AgenciaID && $detalleOrigen->Categoria == 'Origen')
                                                    @foreach ($agencias as $agenciaDestino)
                                                        @if ($agenciaDestino->AgenciaID == $detalleDestino->AgenciaID && $detalleDestino->Categoria == 'Destino')
                                                            @if ($envio->RutaID == $ruta->RutaID)
                                                                <option selected value="{{ $ruta->RutaID }}">{{$agenciaOrigen->Ciudad.' - '.$agenciaDestino->Ciudad}}</option>
                                                            @else
                                                                <option value="{{ $ruta->RutaID }}">{{$agenciaOrigen->Ciudad.' - '.$agenciaDestino->Ciudad}}</option>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        @endforeach
                    </select>
                </div>
                <div class="row mt-4">
                    <label for="">Transporte</label>
                    <select class="form-control" id="TransporteID" onchange="validarInputs()" name="TransporteID">
                        <option value="0" selected>- Seleccione Transporte -</option>
                        @foreach($transportes as $transporte) 
                            @if ($envio->TransporteID == $transporte->TransporteID)
                                <option selected value="{{ $transporte->TransporteID }}">{{ $transporte->TransporteID.' - '.$transporte->Modelo }}</option>
                            @else
                                <option value="{{ $transporte->TransporteID }}">{{ $transporte->TransporteID.' - '.$transporte->Modelo }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="mt-4">
                    <input class="btn btn-success" type="submit" id="submitButton" value="Update">
                    <a href="{{route('envios.index')}}" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>


        {{--
        -------------------------------------------------------------------------------------------------------------------------------------------
        - --}}
        {{-- FIN DE CONTENIDO --}}
    </div>
</div>

@endsection

@section('script')

    function validarInputs() {
        var a = document.getElementById('ClienteID');
        var b = document.getElementById('ComprobanteID');
        var c = document.getElementById('RutaID');
        var d = document.getElementById('TransporteID');
        var z = document.getElementById('submitButton');
        if (a.value == 0 || b.value == 0 || c.value == 0 || d.value == 0) {
            z.disabled = true;
        } else {
            z.disabled = false;
        }
    }

@endsection