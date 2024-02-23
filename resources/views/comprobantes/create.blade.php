@extends('layouts.plantilla')
@section('title', 'Comprobantes') {{-- Edita "Ejemplo" por el nombre que corresponda, esto aparece en la pestaña del
navegador --}}

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">COMPROBANTES</h3>
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
                Crear Comprobante
            </div>
            <form class="container" method="post" action="{{route('comprobantes.store')}}">
                @csrf
                @method('post')

                <div class="row">
                    <label for="">Numero</label>
                    <input class="border p-3 rounded ml-6" type="text" name="Numero" placeholder="Numero">
                </div>
                <div class="row mt-4">
                    <label for="">Monto</label>
                    <input class="border p-3 rounded ml-6" type="number" name="Monto" placeholder="Monto">
                </div>
                <div class="row mt-4">
                    <label for="">Tarifa</label>
                    <select class="form-control" id="TarifaID" onchange="validarInputs()" name="TarifaID">
                        <option value="0" selected>- Seleccione Tarifa -</option>
                        @foreach($tarifas as $tarifa) 
                            <option value="{{ $tarifa->TarifaID }}">{{ $tarifa->Descripcion }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row mt-4">
                    <label for="">Promoción</label>
                    <select class="form-control" id="PromocionID" onchange="validarInputs()" name="PromociónID">
                        <option value="0" selected>- Seleccione Promocion -</option>
                        @foreach($promociones as $promocion) 
                            <option value="{{ $promocion->PromociónID }}">{{ $promocion->Nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row mt-4">
                    <label for="">Fecha</label>
                    <input class="border p-3 rounded ml-6" type="date" name="Fecha" placeholder="Fecha">
                </div>
                <div class="row mt-4">
                    <label for="">Observaciones</label>
                    <input class="border p-3 rounded ml-6" type="text" name="Observaciones" placeholder="Observaciones">
                </div>
                <div class="mt-4">
                    <input class="btn btn-success" type="submit" disabled id="submitButton" value="Guardar">
                    <a href="{{route('comprobantes.index')}}" class="btn btn-danger">Cancelar</a>
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

    function validarInputs() {
        var x = document.getElementById('TarifaID');
        var y = document.getElementById('PromocionID');
        var z = document.getElementById('submitButton');
        if (x.value == 0 || y.value == 0) {
            z.disabled = true;
        } else {
            z.disabled = false;
        }
    }

@endsection