
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
<h1 class="card-title"><strong><h3 style="color: steelblue;">Permisos Pendientes</h3></strong></h1>  

<div class="container">
    <a href="{{route('permiso.create')}}" class="btn btn-primary" style="margin:20px 50px"><i class="fas faplus"></i> Nuevo Registro</a>
    
    
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
                  <th scope="col">Motivo</th>

                  <th scope="col">Opciones</th>
            
                </tr>
              </thead>
              <tbody>
                  @if(count($permisosp)<=0)
                  <tr>
                  <td coldpan="3">No hay registro</td>
                  </tr>
                  @else
                @foreach($permisosp as $itempermiso)
                <tr>
                  <th >{{$itempermiso->id_permiso}}</th>
                  <th >{{$itempermiso->personal->dni}}</th>
                  <th >{{$itempermiso->personal->nombre}}</th>
                  <th >{{$itempermiso->personal->apellidos}}</th>
                  <th >{{$itempermiso->fecha_ini}}</th>
                  <th >{{$itempermiso->fecha_fin}}</th>
                  <th >{{$itempermiso->permiso->motivo}}</th>
                
                
                  <td>
                    <div class="row">
                      <div class="col-3">
                        <form action="{{ route('permiso.aceptar', ['id' => $itempermiso->id_permiso]) }}" method="POST">
                          @csrf
                          <button type="submit" class="btn btn-success" style="padding: 3px  5px;">Aceptar</button> 
                        </form>
                      </div>
                      <div class="col-3">
                        <form action="{{ route('permiso.rechazar', ['id' => $itempermiso->id_permiso]) }}" method="POST">
                          @csrf
                          <button type="submit" class="btn btn-warning " style="padding: 3px  5px;">Rechazar</button>
                        </form>
                      </div>
                      <div class="col-6">
                        <a href="{{route('permiso.edit',$itempermiso->id_permiso)}}" class="btn btn-info btn-sm" ><i class="fas fa-edit"></i>Editar</a>
                        <a href="{{route('permiso.destroy',$itempermiso->id_permiso)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Eliminar</a>

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

<br><br><br>
<h1 class="card-title"><strong><h3 style="color: steelblue;">Permisos Aceptados -----------------</h3></strong></h1>
<div class="container">
    <nav class="navbar navbar-light float-right">
      
      <form class="form-inline my-2 my-lg-0" method="GET">
      <input name="buscarpor" class="form-control mr-sm2" type="search" placeholder="Busqueda por nombre" arialabel="Search" value="">
      <button class="btn btn-success my-2 my-sm0" type="submit">Buscar</button>
      </form>
      </nav>
    </div>
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
        <th scope="col">Motivo</th>
  
      </tr>
    </thead>
    <tbody>
        @if(count($permisosa)<=0)
        <tr>
        <td coldpan="3">No hay registro</td>
        </tr>
        @else
      @foreach($permisosa as $itempermiso)
      
      <tr>
        <th >{{$itempermiso->id_permiso}}</th>
        <th >{{$itempermiso->personal->dni}}</th>
        <th >{{$itempermiso->personal->nombre}}</th>
        <th >{{$itempermiso->personal->apellidos}}</th>
        <th >{{$itempermiso->fecha_ini}}</th>
        <th >{{$itempermiso->fecha_fin}}</th>
        <th >{{$itempermiso->permiso->motivo}}</th>
      </tr>
      @endforeach
      @endif
    </tbody>
  </table>
</div>

<br><br><br>
<h1 class="card-title"><strong><h3 style="color: steelblue;">Permisos Rechazados -----------------</h3></strong></h1>
<div class="container" >
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
        <th scope="col">Motivo</th>

      </tr>
    </thead>
    <tbody>
        @if(count($permisosr)<=0)
        <tr>
        <td coldpan="3">No hay registro</td>
        </tr>
        @else
      @foreach($permisosr as $itempermiso)
      
      <tr>
        <th >{{$itempermiso->id_permiso}}</th>
        <th >{{$itempermiso->personal->dni}}</th>
        <th >{{$itempermiso->personal->nombre}}</th>
        <th >{{$itempermiso->personal->apellidos}}</th>
        <th >{{$itempermiso->fecha_ini}}</th>
        <th >{{$itempermiso->fecha_fin}}</th>
        <th >{{$itempermiso->permiso->motivo}}</th>
      </tr>
      @endforeach
      @endif
    </tbody>
  </table>
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