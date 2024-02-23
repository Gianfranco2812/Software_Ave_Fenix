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
            <div class="text-center fs-2">
                Editar Promocion
            </div>
            <form class="space-y-4" method="post" action="{{route('promociones.update', ['promocion' => $promocion])}}">
                @csrf
                @method('put')
        
                <div class="row">
                    <label for="">Nombre</label>
                    <input class="border p-3 rounded ml-6" type="text" name="Nombre" placeholder="Nombre" value="{{$promocion->Nombre}}">
                </div>
                <div class="row mt-4">
                    <label for="">Codigo</label>
                    <input class="border p-3 rounded ml-6" type="text" name="Codigo" placeholder="Codigo" value="{{$promocion->Codigo}}">
                </div>
                <div class="row mt-4">
                    <label for="">Descuento</label>
                    <input class="border p-3 rounded ml-6" type="number" name="Descuento" placeholder="Descuento" value="{{$promocion->Descuento}}">
                </div>
                <div class="row mt-4">
                    <label for="">Estado</label>
                    <input class="border p-3 rounded ml-6" type="text" name="Estado" placeholder="Estado" value="{{$promocion->Estado}}">
                </div>
                <div class="mt-4">
                    <input class="btn btn-success" type="submit" value="Update">
                    <a href="{{route('promociones.index')}}" class="btn btn-danger">Cancelar</a>
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