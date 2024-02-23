@extends('layouts.plantilla')
@section('title', 'cargos') {{-- Edita "Ejemplo" por el nombre que corresponda, esto aparece en la pestaña del navegador --}}

@section('content')
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">CARGOS</h3>
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
<a href="{{route('cargo.create')}}" class="btn btn-success" style="margin-bottom:30px;">Registrar</a>
<br>
<div class="table-responsive">
    <table class="table">
        <thead class="table" style= "background-color: steelblue;">
            <tr style="color: #fff;">
                <th scope="col">#</th>
                <th scope="col">Cargo</th>
                <th scope="col">Descripción</th>
                <th scope="col">Area</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($cargos as $c)
            <tr class="">
                <td scope="row">{{$c->id_cargo}}</td>
                <td>{{$c -> cargo }}</td>
                <td>{{$c -> descripcion }}</td>
                <td>{{$c ->area }}</td>  

               
                <td>
                    <a href="{{route('cargo.edit', $c->id_cargo)}}" style="color:navy">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                      <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                    </svg>
                    </a>
                    <a href="{{route('cargo.destroy', $c->id_cargo)}}" style="color:crimson">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                  </svg>
                    </a>
                   {{--<a href="{{route('area.edit', $area->id_area)}}" class="btn btn-primary">Editar</a>
                    <a href="{{route('area.delete', $area->id_area)}}" class="btn btn-danger">Eliminar</a>--}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>




{{--  -------------------------------------------------------------------------------------------------------------------------------------------   -  --}}
{{-- FIN DE CONTENIDO --}}
        </div>
    </div>

@endsection

@section('script')

{{-- Aquí va el contenido del js si hubiera --}}

@endsection