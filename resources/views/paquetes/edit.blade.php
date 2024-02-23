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
            <div class="text-center fs-2">
                Editar Paquete
            </div>
            <form class="space-y-4" method="post" action="{{route('paquetes.update', ['paquete' => $paquete])}}">
                @csrf
                @method('put')

                <div class="row">
                    <label for="">Peso</label>
                    <input class="border p-3 rounded ml-6" type="text" name="Peso" placeholder="Peso" value="{{$paquete->Peso}}">
                </div>
                <div class="row mt-4">
                    <label for="">Envío ID</label>
                    <select class="form-control" id="EnvioID" onchange="validarInput()" name="EnvíoID">
                        <option value="0" selected>- Seleccione Envío -</option>
                        @foreach($envios as $envio) 
                            @if ($envio->EnvíoID == $paquete->EnvíoID)
                                <option selected value="{{ $envio->EnvíoID }}">{{ $envio->EnvíoID }}</option>
                            @else
                                <option value="{{ $envio->EnvíoID }}">{{ $envio->EnvíoID }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="row mt-4">
                    <label for="">Descripción</label>
                    <input class="border p-3 rounded ml-6" type="text" name="Descripcion" placeholder="Descripcion" value="{{$paquete->Descripcion}}">
                </div>
                <div class="mt-4">
                    <input class="btn btn-success" type="submit" id="submitButton" value="Update">
                    <a href="{{route('paquetes.index')}}" class="btn btn-danger">Cancelar</a>
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