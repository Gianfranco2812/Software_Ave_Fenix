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
            <div class="text-center fs-2">
                Editar Agencia
            </div>
            <form class="space-y-4" method="post" action="{{route('agencias.update', ['agencia' => $agencia])}}">
                @csrf
                @method('put')

                <div class="row">
                    <label for="">Ciudad</label>
                    <input class="border p-3 rounded ml-6" type="text" name="Ciudad" placeholder="Ciudad" value="{{$agencia->Ciudad}}">
                </div>
                <div class="row mt-4">
                    <label for="">Direccion</label>
                    <input class="border p-3 rounded ml-6" type="text" name="Direccion" placeholder="Direccion" value="{{$agencia->Direccion}}">
                </div>
                <div class="mt-4">
                    <input class="btn btn-success" type="submit" value="Update">
                    <a href="{{route('agencias.index')}}" class="btn btn-danger">Cancelar</a>
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

{{-- Aquí va el contenido del js si hubiera --}}

@endsection