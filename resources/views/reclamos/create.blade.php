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
            <div class="text-center fs-2">
                Crear Reclamo
            </div>
            <form class="container" method="post" action="{{route('reclamos.store')}}">
                @csrf
                @method('post')

                <div class="row">
                    <label for="">Codigo</label>
                    <input class="border p-3 rounded ml-6" type="text" name="Codigo" placeholder="Codigo">
                </div>
                <div class="row mt-4">
                    <label for="">Cliente</label>
                    <select class="form-control" id="idCliente" onchange="validarCliente()" name="ClienteID">
                        <option value="0" selected>- Seleccione Cliente -</option>
                        @foreach($clientes as $cliente) 
                            <option value="{{ $cliente->idcliente }}">{{ $cliente->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row mt-4">
                    <label for="">Descripcion</label>
                    <input class="border p-3 rounded ml-6" type="text" name="Descripcion" placeholder="Descripcion">
                </div>
                <div class="row mt-4">
                    <label for="">Estado</label>
                    <select class="form-control" id="Estado" onchange="validarCliente()" name="Estado">
                        <option value="0" selected>- Seleccione Cliente -</option>
                        <option value="En proceso">En proceso</option>
                        <option value="Archivado">Archivado</option>
                        <option value="Atendido">Atendido</option>
                    </select>
                </div>
                <div class="mt-4">
                    <input class="btn btn-success" type="submit" disabled id="submitButton" value="Guardar">
                    <a href="{{route('reclamos.index')}}" class="btn btn-danger">Cancelar</a>
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

    function validarCliente() {
        var x = document.getElementById('idCliente');
        var y = document.getElementById('Estado');
        var z = document.getElementById('submitButton');
        if (x.value == 0 || y.value == 0) {
            z.disabled = true;
        } else {
            z.disabled = false;
        }
    }

@endsection