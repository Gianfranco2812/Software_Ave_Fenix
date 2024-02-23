
@extends('layouts.plantilla')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Proveedores</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card table-responsive">
                        <div class="card-body">
{{--  -------------------------------------------------------------------------------------------------------------------------------------------   -  --}}
{{-- CONTENIDO --}}

<div class="container">
    @can('proveedor.create')  
    <a href="{{route('Proveedor.create')}}" class="btn btn-primary" style="margin:20px 50px"><i class="fas faplus"></i> Nuevo Registro</a>
    @endcan
    
    
      <nav class="navbar navbar-light float-right">
        <form class="form-inline my-2 my-lg-0" method="GET">
        <input name="buscarpor" class="form-control mr-sm2" type="search" placeholder="Busqueda por razon social" arialabel="Search" value="{{$buscarpor}}">
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
          <th scope="col">RUC</th>
          <th scope="col">Razón Social</th>
          <th scope="col">Dirección</th>
          <th scope="col">Teléfono</th>
          <th scope="col">Email</th>
          @can('proveedor.edit')  
          <th scope="col">Opciones</th>
          @endcan
    
        </tr>
      </thead>
      <tbody>
          @if(count($proveedor)<=0)
          <tr>
          <td coldpan="3">No hay registro</td>
          </tr>
          @else
         @foreach($proveedor as $itemproveedor)

        <tr>
          <th >{{$itemproveedor->idproveedor}}</th>
          <th >{{$itemproveedor->ruc}}</th>
          <th >{{$itemproveedor->razon_social}}</th>
          <th >{{$itemproveedor->direccion}}</th>
          <th >{{$itemproveedor->telefono}}</th>
          <th >{{$itemproveedor->email}}</th>
        
          <td>
              @can('proveedor.edit')  
               <a href="{{route('Proveedor.edit',$itemproveedor->idproveedor)}}" class="btn btn-info btn-sm" style="margin:5px 0px"><i class="fas fa-edit"></i>Editar</a>
              @endcan
              @can('proveedor.destroy')  
               <a href="{{route('Proveedor.destroy',$itemproveedor->idproveedor)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Eliminar</a>
               @endcan
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
@endsection