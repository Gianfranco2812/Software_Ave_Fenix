@extends('layouts.plantilla')
@section('title', 'Paquetes') {{-- Edita "Ejemplo" por el nombre que corresponda, esto aparece en la pestaña del
navegador --}}

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">PAQUETES</h3>
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
                <a class="btn btn-primary" href="{{route('paquetes.create')}}">Registrar paquete</a>
            </div>
            <table class="table mt-4">
                <tr class="table-dark">
                    <th>ID</th>
                    <th>Envío ID</th>
                    <th>Peso</th>
                    <th>Descripción</th>
                    <th>Opciones</th>
                </tr>
                @foreach($paquetes as $paquete)
                    <tr>
                        <td class="align-middle">{{$paquete->PaqueteID}}</td>
                        @foreach ($envios as $envio)
                            @if ($envio->EnvíoID == $paquete->EnvíoID)
                                <td class="align-middle">{{$envio->EnvíoID}}</td>
                            @endif
                        @endforeach
                        <td class="align-middle">{{$paquete->Peso}}</td>
                        <td class="align-middle">{{$paquete->Descripcion}}</td>
                        <td class="d-flex">
                            <a class="btn btn-primary mr-2" href="{{route('paquetes.edit', ['paquete' => $paquete])}}">Editar</a>
                            <form method="post" action="{{route('paquetes.destroy', ['paquete' => $paquete])}}">
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