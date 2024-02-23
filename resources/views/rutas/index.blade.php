@extends('layouts.plantilla')
@section('title', 'Rutas') {{-- Edita "Ejemplo" por el nombre que corresponda, esto aparece en la pestaña del
navegador --}}

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">RUTAS</h3>
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
                <a class="btn btn-primary" href="{{route('rutas.create')}}">Registrar ruta</a>
            </div>
            <table class="table mt-4">
                <tr class="table-dark">
                    <th>ID</th>
                    <th>Origen</th>
                    <th>Destino</th>
                    <th>Duracion aproximada</th>
                    <th>Opciones</th>
                </tr>
                @foreach ($rutas as $ruta)
                    <tr>
                        <td class="align-middle">{{$ruta->RutaID}}</td>
                        @foreach ($detalles as $detalle)
                            @if ($ruta->RutaID == $detalle->RutaID && $detalle->Categoria == 'Origen')
                                @foreach ($agencias as $agencia)
                                    @if ($agencia->AgenciaID == $detalle->AgenciaID)
                                        <td class="align-middle">{{$agencia->Ciudad}}</td>
                                    @endif
                                @endforeach
                            @endif
                            @if ($ruta->RutaID == $detalle->RutaID && $detalle->Categoria == 'Destino')
                                @foreach ($agencias as $agencia)
                                    @if ($agencia->AgenciaID == $detalle->AgenciaID)
                                        <td class="align-middle">{{$agencia->Ciudad}}</td>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                        <td class="align-middle">{{$ruta->Duracionaprox}}</td>
                        <td class="d-flex">
                            <a class="btn btn-primary mr-2" href="{{route('rutas.edit', ['ruta' => $ruta])}}">Editar</a>
                            <form method="post" action="{{route('rutas.destroy', ['ruta' => $ruta])}}">
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