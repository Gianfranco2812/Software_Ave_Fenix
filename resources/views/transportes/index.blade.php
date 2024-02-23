@extends('layouts.plantilla')
@section('title', 'Transportes') {{-- Edita "Ejemplo" por el nombre que corresponda, esto aparece en la pestaña del
navegador --}}

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">TRANSPORTES</h3>
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

        <div class="space-y-10">
            <div>
                <a class="btn btn-primary" href="{{route('transportes.create')}}">Registrar transporte</a>
            </div>
            <table class="table mt-4">
                <tr class="table-dark">
                    <th>ID</th>
                    <th>Modelo</th>
                    <th>Marca</th>
                    <th>Año</th>
                    <th>Descripcion</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </tr>
                @foreach($transportes as $transporte)
                    <tr>
                        <td class="align-middle">{{$transporte->TransporteID}}</td>
                        <td class="align-middle">{{$transporte->Modelo}}</td>
                        <td class="align-middle">{{$transporte->Marca}}</td>
                        <td class="align-middle">{{$transporte->Año}}</td>
                        <td class="align-middle">{{$transporte->Descripcion}}</td>
                        <td class="align-middle">{{$transporte->Estado}}</td>
                        <td class="d-flex">
                            <a class="btn btn-primary mr-2" href="{{route('transportes.edit', ['transporte' => $transporte])}}">Editar</a>
                            <form method="post" action="{{route('transportes.destroy', ['transporte' => $transporte])}}">
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