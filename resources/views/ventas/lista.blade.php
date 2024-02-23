@extends('layouts.plantilla')
@section('title','Página Principal')
@section('content')
<div class="container">
    
    <section class="section">
        <p></p>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card table-responsive">
                        <div class="card-body">
{{--  -------------------------------------------------------------------------------------------------------------------------------------------   -  --}}
{{-- CONTENIDO --}}

<div class="container">
    
    <div class="text-center">
        <h1 class="my-5">Lista de Ventas</h1>
    </div>

    <div class="row ml-auto col-md-4 mb-3">
        <form class="d-flex ml-auto" method="get" action="{{route('ventas.index')}}">
            <input class="form-control me-1" type="text" name="buscarpor" placeholder="Buscar por Nombre" aria-label="Search" value="">
            <button class="btn btn-success" type="submit">Search</button>
        </form>
    </div>

    @if (session('mensaje'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('mensaje') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif


    <div class="container">
        <table class="table table-hover">
            <thead class="table-dark ">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Estado</th>
                <th scope="col">Forma de pago</th>
                <th scope="col">Ciudad Destino</th>
                <th scope="col">Fecha</th>
                
                <th colspan="2" class="text-center">Accion</th>
                </tr>
            </thead>
            <tbody>
                @if (count($ventas)<=0)
                    <tr>
                    <td class="text-center" colspan="7">No hay Registros...</td>
                    </tr>
                @else
                    @foreach ($ventas as $ve)
                        <tr>
                            <td>{{$ve->idventas}}</td>
                            <td>{{$ve->nombre}}</td>

                            <td>@if ($ve->idestado == 1)
                                <button class="btn btn-info btn-sm" disabled>Reserva</button>
                            @elseif ($ve->idestado == 2)
                                <button class="btn btn-success btn-sm" disabled>Pagado</button>
                            @elseif ($ve->idestado == 3)
                                <button class="btn btn-danger btn-sm" disabled>Cancelado</button>
                            @endif</td>

                            <td>@if ($ve->idformapago == 1)
                                Efectivo
                            @elseif ($ve->idformapago == 2)
                                Tarjeta Crédito
                            @elseif ($ve->idformapago == 3)
                                Tarjeta Débido
                            @elseif ($ve->idformapago == 4)
                                Transferencia
                            @endif</td>
                            <td>{{$ve->Nomciudad}}</td>
                            <td>{{$ve->fecha}}</td>
                        
                            <td class="text-center">
                                <div class="row ">

                                    <div class="col-6 text-right">
                                        <form action="{{route('ventas.show',$ve->idventas)}}" method="GET">
                                            <button class="btn btn-success btn-sm" type="submit"><i class="fas fa-download"></i></button>  
                                        </form>
                                    </div>
                                    
                                    <div class="col-6 text-left">
                                        <form action="{{route('ventas.edit',$ve->idventas)}}" method="GET">
                                            <button class="btn btn btn-warning btn-sm" type="submit"><i class="fas fa-sticky-note"></i></button>  
                                        </form>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{-- Para mostrar formato  --}}
        <div class="float-right">
            {{$ventas->links()}}
        </div>
    
    
         <div class="table-responsive">  
            
        </div>
</div>




{{--  -------------------------------------------------------------------------------------------------------------------------------------------   -  --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

   
    </div>

    
    
    <div class="text-center mb-5">
        <a href="{{route('ventas.create')}}" class="btn btn-primary">Nueva Venta</a>
    </div>

</div>
@endsection

@section('script')
<script>

    setTimeout(function () {
        document.querySelector('#mensaje').remove();
    }, 3000);

</script>
@endsection
