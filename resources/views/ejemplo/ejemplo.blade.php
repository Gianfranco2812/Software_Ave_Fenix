@extends('layouts.plantilla')
@section('title', 'Ejemplo') {{-- Edita "Ejemplo" por el nombre que corresponda, esto aparece en la pestaña del navegador --}}

@section('css')
{{-- agregar links de estilos css --}}
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">COLOCA TU TÍTULO</h3>
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




<p>Este es un párrafo para mi contenido</p>





{{--  -------------------------------------------------------------------------------------------------------------------------------------------   -  --}}
{{-- FIN DE CONTENIDO --}}
        </div>
    </div>

@endsection

@section('script')

{{-- Aquí va el contenido del js si hubiera --}}

@endsection