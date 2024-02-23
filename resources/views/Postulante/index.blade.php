
@extends('layouts.plantilla')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Postulantes</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card table-responsive">
                        <div class="card-body">
{{--  -------------------------------------------------------------------------------------------------------------------------------------------   -  --}}
{{-- CONTENIDO --}}

<div class="container">
    
    <a href="{{route('Postulante.create')}}" class="btn btn-primary" style="margin:20px 50px"><i class="fas faplus"></i> Nuevo Registro</a>
    
    
      <nav class="navbar navbar-light float-right">
        <form class="form-inline my-2 my-lg-0" method="GET">
        <input name="buscarpor" class="form-control mr-sm2" type="search" placeholder="Busqueda por nombre" arialabel="Search" value="{{$buscarpor}}">
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
          <th scope="col">Direccion</th>
          <th scope="col">Teléfono</th>
          <th scope="col">Email</th>

          <th scope="col">Opciones</th>
    
        </tr>
      </thead>
      <tbody>
          @if(count($postulante)<=0)
          <tr>
          <td coldpan="3">No hay registro</td>
          </tr>
          @else
         @foreach($postulante as $itempostulante)
        
        <tr>
          <th >{{$itempostulante->id_postulantes}}</th>
          <th >{{$itempostulante->dni}}</th>
          <th >{{$itempostulante->nombre}}</th>
          <th >{{$itempostulante->apellidos}}</th>
          <th >{{$itempostulante->direccion}}</th>
          <th >{{$itempostulante->telefono}}</th>
          <th >{{$itempostulante->correo}}</th>

        
          <td>
            <a href="{{route('Personal.pos',$itempostulante->id_postulantes)}}" class="btn btn-success btn-sm" ><i class="fas fa-edit"></i>Contratar</a>

               <a href="{{route('Postulante.edit',$itempostulante->id_postulantes)}}" class="btn btn-info btn-sm" style="margin:5px 0px"><i class="fas fa-edit"></i>Editar</a>
               <a href="{{route('Postulante.destroy',$itempostulante->id_postulantes)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Eliminar</a>
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