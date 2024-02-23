@extends('layouts.plantilla')
@section('title', 'Promociones') {{-- Edita "Ejemplo" por el nombre que corresponda, esto aparece en la pestaña del
navegador --}}

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">PROMOCIONES</h3>
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
                <a class="btn btn-primary" href="{{route('promociones.create')}}">Registrar promocion</a>
            </div>
            <table class="table mt-4">
                <tr class="table-dark">
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Codigo</th>
                    <th>Descuento</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </tr>
                @foreach($promociones as $promocion)
                    <tr>
                        <td class="align-middle">{{$promocion->PromociónID}}</td>
                        <td class="align-middle">{{$promocion->Nombre}}</td>
                        <td class="align-middle">{{$promocion->Codigo}}</td>
                        <td class="align-middle">{{$promocion->Descuento}}</td>
                        <td class="align-middle">{{$promocion->Estado}}</td>
                        <td class="d-flex">
                            <a class="btn btn-primary mr-2" href="{{route('promociones.edit', ['promocione' => $promocion])}}">Editar</a>
                            <form method="post" action="{{route('promociones.destroy', ['promocione' => $promocion])}}">
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