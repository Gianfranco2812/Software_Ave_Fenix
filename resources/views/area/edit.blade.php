@extends('layouts.plantilla')
@section('title', 'areas| edit') {{-- Edita "Ejemplo" por el nombre que corresponda, esto aparece en la pestaña del navegador --}}

@section('content')
    <div class="card">
        <div class="card-header">
          <h1 class="card-title"><strong><H1 style="color: steelblue;">EDITAR AREA</H1></strong></h1>
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
<form action="{{route('area.update',$areaa->id_area)}}" method="post">
    @method('PUT')
    @csrf
    <div class="input-group mb-3">
      <input type="text" class="form-control" value="{{$area->area}}" name="Area" placeholder="Nombre de la nueva Area" aria-describedby="basic-addon2" >
   
    </div>
    <br>
    <button class="btn btn-success" style="margin-bottom:30px;" type="submit">Editar</button>
  
  </form>
  

{{--  -------------------------------------------------------------------------------------------------------------------------------------------   -  --}}
{{-- FIN DE CONTENIDO --}}
        </div>
    </div>

@endsection

@section('script')

{{-- Aquí va el contenido del js si hubiera --}}

@endsection