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
                Editar Reclamo
            </div>
            <form class="space-y-4" method="post" action="{{route('reclamos.update', ['reclamo' => $reclamo])}}">
                @csrf
                @method('put')

                <div class="row">
                    <label for="">Codigo</label>
                    <input class="border p-3 rounded ml-6" type="text" name="Codigo" placeholder="Codigo" value="{{$reclamo->Codigo}}">
                </div>
                <div class="row mt-4">
                    <label for="">Cliente</label>
                    <select class="form-control" id="idCliente" onchange="validarCliente()" name="ClienteID">
                        <option value="0">- Seleccione Cliente -</option>
                        @foreach($clientes as $cliente) 
                            @if ($cliente->idcliente == $reclamo->ClienteID)
                                <option selected value="{{ $cliente->idcliente }}">{{ $cliente->nombre}}</option>
                            @else
                                <option value="{{ $cliente->idcliente }}">{{ $cliente->nombre }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="row mt-4">
                    <label for="">Descripcion</label>
                    <input class="border p-3 rounded ml-6" type="text" name="Descripcion" placeholder="Descripcion" value="{{$reclamo->Descripcion}}">
                </div>
                <div class="row mt-4">
                    <label for="">Estado</label>
                    <select class="form-control" id="Estado" onchange="validarCliente()" name="Estado">
                        <option value="0" selected>- Seleccione Cliente -</option>
                        @if ($reclamo->Estado == 'En proceso')
                            <option selected value="En proceso">En proceso</option>
                        @else
                            <option value="En proceso">En proceso</option>
                        @endif
                        @if ($reclamo->Estado == 'Archivado')
                            <option selected value="Archivado">Archivado</option>
                        @else
                            <option value="Archivado">Archivado</option>
                        @endif
                        @if ($reclamo->Estado == 'Atendido')
                            <option selected value="Atendido">Atendido</option>
                        @else
                            <option value="Atendido">Atendido</option>
                        @endif
                    </select>
                </div>
                <div class="mt-4">
                    <input class="btn btn-success" type="submit" id="submitButton" value="Update">
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