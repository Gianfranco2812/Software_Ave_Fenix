@extends('layouts.plantilla')
@section('title', 'Reclamos') {{-- Edita "Ejemplo" por el nombre que corresponda, esto aparece en la pestaña del
navegador --}}

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">RECLAMOS</h3>
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
                <a class="btn btn-primary" href="{{route('reclamos.create')}}">Registrar reclamo</a>
            </div>
            <table class="table mt-4">
                <tr class="table-dark">
                    <th>ID</th>
                    <th>Codigo</th>
                    <th>Cliente</th>
                    <th>Descripcion</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </tr>
                @foreach($reclamos as $reclamo)
                    <tr>
                        <td class="align-middle">{{$reclamo->ReclamoID}}</td>
                        <td class="align-middle">{{$reclamo->Codigo}}</td>
                        @foreach ($clientes as $cliente)
                            @if ($cliente->idcliente == $reclamo->ClienteID)
                                <td class="align-middle">{{$cliente->nombre}}</td>
                            @endif
                        @endforeach
                        <td class="align-middle">{{$reclamo->Descripcion}}</td>
                        <td class="align-middle">{{$reclamo->Estado}}</td>
                        <td class="d-flex">
                            <a class="btn btn-primary mr-2" href="{{route('reclamos.edit', ['reclamo' => $reclamo])}}">Editar</a>
                            <form method="post" action="{{route('reclamos.destroy', ['reclamo' => $reclamo])}}">
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