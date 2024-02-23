@extends('layouts.plantilla')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Roles</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card table-responsive">
                        <div class="card-body">

                        <div class="row ml-auto col-md-4 mb-3">
        <form class="d-flex ml-auto" method="get" action="{{route('roles.index')}}">
            <input class="form-control me-1" type="text" name="buscarpor" placeholder="Buscar por Nombre" aria-label="Search" value="">
            <button class="btn btn-success" type="submit">Search</button>
        </form>
    </div>
{{-- Definimos las directivas de laravel permission --}}
                                @can('role.create') 
                                <a class="btn btn-warning" href="{{route('roles.create')}}">Nuevo</a>
                                @endcan
                            
                            <table class="table table-striped mt-2">


                                    <thead class="thead-dark">
                                        <tr>
                                           <th style="color:#fff;">ID</th>
                                           <th style="color:#fff;">Rol</th>
                                           <th style="color:#fff;">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $role)
                                        <tr>
                                            <td>{{$role->id}}</td>
                                           <td>{{$role->name}}</td>
                                           <td>
                                               @can('editar-rol')
                                               @endcan
                                                    <a class="btn btn-info" href="{{ route('roles.edit',$role->id)}}">Editar</a>
                                               

                                               @can('borrar-rol')
                                               @endcan
                                                    {!! Form::open(['method'=>'DELETE', 'route'=>['roles.destroy', $role->id], 'style'=>'display:inline'])!!}
                                                        {!!Form::submit('Borrar', ['class'=> 'btn btn-danger'])!!}
                                                    {!! Form::close()!!}
                                               

                                           </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                            </table>
                            <div class="pagination justify-content-end" style="margin: 20px 0;">
                                {!! $roles->links() !!}
                            </div>
                            
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
        
    </section>
@endsection

