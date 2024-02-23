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
            <div>
                <a class="btn btn-primary" href="{{route('envios.create')}}">Registrar envío</a>
            </div>
            <table class="table mt-4">
                <tr class="table-dark">
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Destinatario</th>
                    <th>Fecha</th>
                    <th>Clave</th>
                    <th>Comprobante</th>
                    <th>Ruta</th>
                    <th>Transporte</th>
                    <th>Opciones</th>
                </tr>
                @foreach($envios as $envio)
                    <tr>
                        <td class="align-middle">{{$envio->EnvíoID}}</td>
                        @foreach ($clientes as $cliente)
                            @if ($cliente->idcliente == $envio->ClienteID)
                                <td class="align-middle">{{$cliente->nombre}}</td>
                            @endif
                        @endforeach
                        <td class="align-middle">{{$envio->Destinatario}}</td>
                        <td class="align-middle">{{$envio->Fecha}}</td>
                        <td class="align-middle">{{$envio->Clave}}</td>
                        @foreach ($comprobantes as $comprobante)
                            @if ($comprobante->ComprobanteID == $envio->ComprobanteID)
                                <td class="align-middle">{{$comprobante->Numero}}</td>
                            @endif
                        @endforeach

                        @foreach ($detalles as $detalleOrigen)
                            @if ($envio->RutaID == $detalleOrigen->RutaID && $detalleOrigen->Categoria == 'Origen')
                                @foreach ($detalles as $detalleDestino)
                                    @if ($envio->RutaID == $detalleDestino->RutaID && $detalleDestino->Categoria == 'Destino')
                                        @foreach ($agencias as $agenciaOrigen)
                                            @if ($agenciaOrigen->AgenciaID == $detalleOrigen->AgenciaID && $detalleOrigen->Categoria == 'Origen')
                                                @foreach ($agencias as $agenciaDestino)
                                                    @if ($agenciaDestino->AgenciaID == $detalleDestino->AgenciaID && $detalleDestino->Categoria == 'Destino')
                                                        <td class="align-middle">{{$agenciaOrigen->Ciudad.' - '.$agenciaDestino->Ciudad}}</td>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            @endif
                        @endforeach

                        @foreach ($transportes as $transporte)
                            @if ($transporte->TransporteID == $envio->TransporteID)
                                <td class="align-middle">{{$transporte->TransporteID.' - '.$transporte->Modelo}}</td>
                            @endif
                        @endforeach
                        <td class="d-flex">
                            <a class="btn btn-primary mr-2" href="{{route('envios.edit', ['envio' => $envio])}}">Editar</a>
                            <form method="post" action="{{route('envios.destroy', ['envio' => $envio])}}">
                                @csrf
                                @method('delete')
                                <input class="btn btn-danger" type="submit" value="Eliminar">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>


        {{--
        -------------------------------------------------------------------------------------------------------------------------------------------
        - --}}
        {{-- FIN DE CONTENIDO --}}
    </div>
</div>

@endsection

@section('script')

{{-- Aquí va el contenido del js si hubiera --}}

@endsection