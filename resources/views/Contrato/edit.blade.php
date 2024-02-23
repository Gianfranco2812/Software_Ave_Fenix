
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
    <h1>Editar Permiso de {{$nombre}} {{$apellidos}} </h1>
</div>
 
 <form method="POST" action="{{ route("permiso.update",$permiso->id_permiso)}}">
@method('put') 
 @csrf

 <div class="form-group" >
    <label for="">DNI: </label>
    <div class="input-group" >
    <input  style="padding-bottom:10px;width:200px" type="text" class="formcontrol" name="dni" id="dni" value="{{ $dni }}" readonly>
    </div>
</div>
<div class="form-group" >
    <label for="">Fecha de Inicio: </label>
    <div class="input-group" >
    <input  style="padding-bottom:10px;width:200px" type="date" class="formcontrol" name="fecha_ini" id="fecha_ini" value="{{ $permiso->fecha_ini }}">
    </div>
</div>
<div class="form-group" >
    <label for="">Fecha de Fin: </label>
    <div class="input-group" >
    <input  style="padding-bottom:10px;width:200px" type="date" class="formcontrol" name="fecha_fin" id="fecha_fin" value="{{ $permiso->fecha_fin }}">
    </div>
</div>

<div class="form-group" >
    <label for="">Motivo: </label>
    <div class="input-group" >
    <input  style="padding-bottom:10px;width:200px" type="text" name="motivo" id="motivo" value="{{ $motivo }}">
    </div>
</div>

<!-- {{-- <button style="margin-left: 300px;margin-top:40px;margin-right:10px"type="submit" class="btn btn-primary"><i class="fas fasave"></i> Grabar</button>
<a style="margin-top:40px" href="{{ route('cancelare')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</button></a>
 --}} -->
<button style="margin-left: 60px;margin-top: 20px"  type="submit" class="btn btn-primary"><i class="fas fasave"></i> Grabar</button>
<a style="margin-top: 20px"  href="{{ route('cancelarper')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</button></a>
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