@extends('layouts.plantilla')
@section('title', 'registro|cargo') {{-- Edita "Ejemplo" por el nombre que corresponda, esto aparece en la pestaña del navegador --}}

@section('content')
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">REGISTRO DE CARGOS</h3>
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
<form action="{{route('cargo.store')}}" method="post">
  @csrf
  <div class="form-group" >
   
    <label for="">Cargo: </label>
    <div class="input-group" >
    <input  style="padding-bottom:10px;width:200px" type="text" name="Cargo" id="Cargo">
    </div>
  </div>
  <div class="form-group" >
    <label for="">descripcion: </label>
    <div class="input-group" >
    <input  style="padding-bottom:10px;width:200px" type="text" name="Descripcion" id="descripcion">
    </div>
  </div>
    <div class="form-group" >
      <label for="">Area:: </label>
      <div class="input-group" >
        <select name="Area" id="id_area" required>
          <option value="">Seleccionar Área</option>
          @foreach($areas as $area)
              <option value="{{ $area->id_area }}">{{ $area->area }}</option>
          @endforeach
      </select>
      </div>
    </div>
</div>
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