
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
    <h1>Editar Registro del Postulante - {{ $postulante->id_postulantes }}</h1>
</div>
 <div class="title-center">
 
 <form method="POST" action="{{ route("Postulante.update",$postulante->id_postulantes)}}" class="row g-3">
@method('put') 
 @csrf

 <div class="col-md-2" >
    <label for="" style="color: steelblue;">DNI: </label>
    <div class="input-group" >
    <input  class="form-control"  style="padding-bottom:10px;width:200px;border-color:dimgray;" type="text" name="dni" id="dni" value="{{ $postulante->dni}}">
    </div>
</div>

<div class="col-md-5" >
    <label for="" style="color: steelblue;">Nombre: </label>
    <div class="input-group" >
    <input class="form-control"  style="padding-bottom:10px;width:200px;border-color:dimgray;" type="text" name="nombre" id="nombre" value="{{ $postulante->nombre }}">
    </div>
</div>

<div class="col-md-5" >
    <label for="" style="color: steelblue;">Apellidos: </label>
    <div class="input-group" >
    <input class="form-control"  style="padding-bottom:10px;width:200px;border-color:dimgray;" type="text" name="apellidos" id="apellidos" value="{{ $postulante->apellidos }}">
    </div>
</div>



<div class="col-md-2" >
    <label for="" style="color: steelblue;">Edad: </label>
    <div class="input-group" >
    <input class="form-control"  style="padding:5px 0px;width:200px;border-color:dimgray;" type="number" class="formcontrol" name="edad" id="edad" value="{{ $postulante->edad }}">
    </div>
</div>



<div class="col-md-10" >
    <label for="" style="color: steelblue;">Dirección: </label>
    <div class="input-group" >
    <input class="form-control"  style="padding-bottom:10px;width:200px;border-color:dimgray;" type="text" name="direccion" id="direccion" value="{{ $postulante->direccion }}">
    </div>
</div>


<div class="col-md-4" >
    <label for="" style="color: steelblue;">Teléfono: </label>
    <div class="input-group" >
    <input class="form-control"  style="padding-bottom:10px;width:200px;border-color:dimgray;" type="text" name="telefono" id="telefono"  value="{{ $postulante->telefono }}">
    </div>
</div>

<div class="col-md-4" >
    <label for="" style="color: steelblue;">Email: </label>
    <div class="input-group" >
    <input class="form-control"  style="padding-bottom:10px;width:200px;border-color:dimgray;" type="email" name="email" id="email"  value="{{ $postulante->correo }}">
    </div>
</div>

<div class="col-md-4" >

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