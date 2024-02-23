@extends('layouts.plantilla')
@section('title', 'Agencias') {{-- Edita "Ejemplo" por el nombre que corresponda, esto aparece en la pestaña del
navegador --}}

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">AGENCIAS</h3>
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
                <a class="btn btn-primary" href="{{route('agencias.create')}}">Registrar agencia</a>
            </div>
            <table class="table mt-4">
                <tr class="table-dark">
                    <th>ID</th>
                    <th>Ciudad</th>
                    <th>Direccion</th>
                    <th>Opciones</th>
                </tr>
                @foreach($agencias as $agencia)
                    <tr>
                        <td class="align-middle">{{$agencia->AgenciaID}}</td>
                        <td class="align-middle">{{$agencia->Ciudad}}</td>
                        <td class="align-middle">{{$agencia->Direccion}}</td>
                        <td class="d-flex">
                            <a class="btn btn-primary mr-2" href="{{route('agencias.edit', ['agencia' => $agencia])}}">Editar</a>
                            <form method="post" action="{{route('agencias.destroy', ['agencia' => $agencia])}}">
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