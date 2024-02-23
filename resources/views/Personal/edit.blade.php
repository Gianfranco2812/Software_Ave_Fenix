
@extends('layouts.plantilla')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Marcas</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card table-responsive">
                        <div class="card-body">
{{--  -------------------------------------------------------------------------------------------------------------------------------------------   -  --}}
{{-- CONTENIDO --}}

<div class="title-ar">
    <h1>Editar Registro de Personal - {{ $personal->idpersonal }}</h1>
</div>
 <div class="title-center">
 
 <form method="POST" action="{{ route("Personal.update",$personal->id_personal)}}" class="row g-3">
@method('put') 
 @csrf




        <div class="col-md-12">
        <input style="margin-left: 55px; display:none;" type="text" class="form-control" id="id" name="id" value="{{ $personal->idpersonal }}" disabled>
        </div>



        <div class="col-md-2" >
            <label for="" style="color: steelblue;">DNI: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" class="form-control" name="dni" id="dni" value="{{ $personal->dni }}"{{-- readonly="readonly" --}}>
            </div>
        </div>

        <div class="col-md-5" >
            <label for="" style="color: steelblue;">Nombre: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" class="form-control" name="nombre" id="nombre" value="{{ $personal->nombre }}"{{-- readonly="readonly" --}}>
            </div>
        </div>

        <div class="col-md-5" >
            <label for="" style="color: steelblue;">Apellidos: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" class="form-control" name="apellidos" id="apellidos" value="{{ $personal->apellidos }}"{{-- readonly="readonly" --}}>
            </div>
        </div>


        
        <div class="col-md-2" >
            <label for="" style="color: steelblue;">Edad: </label>
            <div class="input-group" >
            <input  style="padding:5px 0px;width:200px" type="number" class="form-control" name="edad" id="edad" value="{{ $personal->edad }}"{{-- readonly="readonly" --}}>
            </div>
        </div>



        <div class="col-md-3" >
            <label for="" style="color: steelblue;">Género: </label>
            <br>
            <select class="form-control" style="padding:10px 0px;width:200px" name="genero" id="genero" value="{{ $personal->genero }}"> 
                <option value="{{ $personal->genero }}" selected>{{ $personal->genero }}</option>
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
                <option value="N">No definido</option>
            </select>
        </div>


        <div class="col-md-3" >
            <label for="" style="color: steelblue;">Estado Civil: </label>
            <br>
            <select class="form-control" style="padding:10px 0px;width:200px" name="estado_civil" id="estado_civil" > 
                <option value="{{ $personal->estado_civil }}"selected>{{ $personal->estado_civil }}</option>
                <option value="C">Casado</option>
                <option value="D">Divorciado</option>
                <option value="V">Viudo</option>
                <option value="S">Soltero</option>
                <option value="N">No definido</option>
            </select>
        </div>


    
        <div class="col-md-3" >
            <label for="" style="color: steelblue;">Teléfono: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" class="form-control" name="telefono" id="telefono" value="{{ $personal->telefono }}"{{-- readonly="readonly" --}}>
            </div>
        </div>

        <div class="col-md-8" >
            <label for="" style="color: steelblue;">Dirección: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" class="form-control" name="direccion" id="direccion" value="{{ $personal->direccion }}"{{-- readonly="readonly" --}}>
            </div>
        </div>



        <div class="col-md-3" >
            <label for="" style="color: steelblue;">Email: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" class="form-control" name="email" id="email" value="{{ $personal->email }}"{{-- readonly="readonly" --}}>
            </div>
        </div>

        <div class="col-md-3" >
            <label for="" style="color: steelblue;">Fecha de Nacimiento: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="date" class="form-control" name="fecha_nac" id="fecha_nac" value="{{ $personal->fecha_nac }}"{{-- readonly="readonly" --}}>
            </div>
        </div>

        <div class="col-md-4" >
            <label for="" style="color: steelblue;">Número de licencia: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" class="form-control" name="num_licencia" id="num_licencia" value="{{ $personal->num_licencia }}"{{-- readonly="readonly" --}}>
            </div>
        </div>

        <div class="col-md-4" >
            <label for="" style="color: steelblue;">Tipo de licencia: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" class="form-control" name="tip_licencia" id="tip_licencia" value="{{ $personal->tip_licencia }}"{{-- readonly="readonly" --}}>
            </div>
        </div>


        <div class="col-md-3" >
            <button style="margin-left: 60px;margin-top: 20px"  type="submit" class="btn btn-primary"><i class="fas fasave"></i> Grabar</button>
        </div>

        <div class="col-md-3" >
            <a style="margin-top: 20px"  href="{{ route('cancelarp')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</button></a>
        </div>


<!-- {{-- <button style="margin-left: 300px;margin-top:40px;margin-right:10px"type="submit" class="btn btn-primary"><i class="fas fasave"></i> Grabar</button>
<a style="margin-top:40px" href="{{ route('cancelare')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</button></a>
 --}} -->
</form>
</div>




{{--  -------------------------------------------------------------------------------------------------------------------------------------------   -  --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection