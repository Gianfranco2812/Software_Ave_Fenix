@extends('layouts.plantilla')
@section('title', 'registro|area') {{-- Edita "Ejemplo" por el nombre que corresponda, esto aparece en la pestaña del navegador --}}

@section('content')
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">REGISTRO DE SUCURSALES</h3>
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
{{--  -------------------------------------------------------------------------------------------------------------------------------------------   -  --}}
{{-- INICIO DE CONTENIDO --}}
<form action="{{route('sucursal.store')}}" method="post">
  @csrf
  <div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="Nombre de la nueva sucursal" aria-describedby="basic-addon2" name="Sucursal">

  </div>
  <br>
  <button class="btn btn-success" style="margin-bottom:30px;" type="submit">Registrar</button>

</form>

{{--  -------------------------------------------------------------------------------------------------------------------------------------------   -  --}}
{{-- FIN DE CONTENIDO --}}
        </div>
    </div>

@endsection

@section('script')

{{-- Aquí va el contenido del js si hubiera --}}

@endsection