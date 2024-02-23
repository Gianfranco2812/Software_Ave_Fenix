
@extends('layouts.plantilla')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Permisos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card table-responsive">
                        <div class="card-body">
{{--  -------------------------------------------------------------------------------------------------------------------------------------------   -  --}}
{{-- CONTENIDO --}}
<br><br>
<h1 class="card-title"><strong><h3 style="color: steelblue;">Vacaciones</h3></strong></h1>  

<div class="container">
    <a href="{{route('vacaciones.create')}}" class="btn btn-primary" style="margin:20px 50px"><i class="fas faplus"></i> Nuevo Registro</a>
    
    
      <nav class="navbar navbar-light float-right">
        <form class="form-inline my-2 my-lg-0" method="GET">
          <input name="buscarpor" class="form-control mr-sm2" type="search" placeholder="Busqueda por nombre" arialabel="Search" value="">
          <button class="btn btn-success my-2 my-sm0" type="submit">Buscar</button>
        </form>
      </nav>
    
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
                  <th scope="col">Fecha de Inicio</th>
                  <th scope="col">Fecha de fin</th>
                  <th scope="col">Tipo</th>

                  <th scope="col">Opciones</th>
            
                </tr>
              </thead>
              <tbody>
                  @if(count($vacaciones)<=0)
                  <tr>
                  <td coldpan="3">No hay registro</td>
                  </tr>
                  @else
                @foreach($vacaciones as $itemvac)
                <tr>
                 
                  <th >{{$itemvac->id_vacaciones}}</th>
                  <th >{{$itemvac->dni}}</th>
                  <th >{{$itemvac->nombre}}</th>
                  <th >{{$itemvac->apellidos}}</th>
                  <th >{{$itemvac->fecha_ini}}</th>
                  <th >{{$itemvac->fecha_fin}}</th>
                  <th >{{$itemvac-> tipo_vac}}</th>
                
               
                  <td>
                    <div class="row">
                      <div class="col-6">
                        <a href="{{route('vacaciones.edit',$itemvac->id_vacaciones)}}" class="btn btn-info btn-sm" ><i class="fas fa-edit"></i>Editar</a>
                        <a href="{{route('vacaciones.destroy',$itemvac->id_vacaciones)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Eliminar</a>
                      </div>
                    </div>
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