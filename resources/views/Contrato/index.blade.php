
@extends('layouts.plantilla')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Personal - Contratos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card table-responsive">
                        <div class="card-body">
{{--  -------------------------------------------------------------------------------------------------------------------------------------------   -  --}}
{{-- CONTENIDO --}}

<div class="container">
    
    <a href="{{route('contrato.create')}}" class="btn btn-primary" style="margin:20px 50px"><i class="fas faplus"></i> Nuevo Registro</a>
    
    
 
    
        @if (session('datos'))
        <div id="mensaje">
         @if (session('datos'))
         <div class="alert alert-warning alert-dismissible fade show mt3" role="alert">
         {{ session('datos') }}
         <button type="button" class="close" data-dismiss="alert" arialabel="Close">
         <span aria-hidden="true">&times;</span>
         </button>
         </div>
         @endif
         </div>
         @endif
         <div class="table-responsive">  
          <table class="table">
            <thead class="thead-dark">
              <tr>
      
                <th scope="col">Código</th>
                <th scope="col">DNI</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Cargo</th>
                <th scope="col">Area</th>
                <th scope="col">Sucursal</th>
                <th scope="col">Fecha de inicio</th>
                <th scope="col">Fecha de fin</th>
      
                <th scope="col">Opciones</th>
          
              </tr>
            </thead>
            <tbody>
                @if(count($contratos)<=0)
                <tr>
                <td coldpan="3">No hay registro</td>
                </tr>
                @else
               @foreach($contratos  as $con)
              <tr>
                <td>{{ $con->id_contrato }}</td>
                <td>{{ $con->dni }}</td>
                <td>{{ $con->nombre }}</td>
                <td>{{ $con->apellidos }}</td>
                <td>{{ $con->cargo }}</td>
                <td>{{ $con->area }}</td>
                <td>{{ $con->sucursal }}</td>
                <td>{{ $con->fecha_ini }}</td>
                <td>{{ $con->fecha_fin }}</td>
      
              
                <td>
                  

                     <a href="{{route('contrato.destroy',$con->id_contrato)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Eliminar</a>
                </td>
              </tr>
              @endforeach
              @endif
            </tbody>
          </table>
        </div>
</div>




{{--  -------------------------------------------------------------------------------------------------------------------------------------------   -  --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

@section('script')
   <script>
   setTimeout(function(){
   document.querySelector('#mensaje').remove();
   },2000);
   </script>
</div>
@endsection