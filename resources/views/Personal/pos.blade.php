
@extends('layouts.plantilla')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Personal</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card table-responsive">
                        <div class="card-body">

 <div class="container">
<div class="title-tr">
    <h1>Registrando Nuevo Personal</h1>
</div>



 <div class="title-center">
 
 <form method="POST" action="{{ route('Personal.store')}} " enctype="multipart/form-data">
 @csrf

       

     

        <div class="form-group" >
            <label for="">DNI: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" name="dni" id="dni" value="{{ $postulante->dni }}">
            </div>
        </div>

        <div class="form-group" >
            <label for="">Nombre: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" name="nombre" id="nombre" value="{{ $postulante->nombre }}">
            </div>
        </div>

        <div class="form-group" >
            <label for="">Apellidos: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" name="apellidos" id="apellidos" value="{{ $postulante->apellidos }}"> 
            </div>
        </div>


       
        <div class="form-group" >
            <label for="">Edad: </label>
            <div class="input-group" >
            <input  style="padding:5px 0px;width:200px" type="number" class="formcontrol" name="edad" id="edad" value="{{ $postulante->edad }}">
            </div>
        </div>



        <div class="form-group" >
            <label for="">Género: </label>
            <br>
            <select class="formcontrol" style="padding:5px 0px;width:200px" name="genero" id="genero"> 
                <option selected>Seleccionar Género</option>
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
                <option value="N">No definido</option>
            </select>
        </div>

        {{-- <div class="form-group" >
            <label for="">Estado Civil: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" name="estado_civil" id="estado_civil" >
            </div>
        </div> --}}

        <div class="form-group" >
            <label for="">Estado Civil: </label>
            <br>
            <select class="formcontrol" style="padding:5px 0px;width:200px" name="estado_civil" id="estado_civil"> 
                <option selected>Seleccionar Estado</option>
                <option value="C">Casado</option>
                <option value="D">Divorciado</option>
                <option value="V">Viudo</option>
                <option value="S">Soltero</option>
                <option value="N">No definido</option>
            </select>
        </div>

        <div class="form-group" >
            <label for="">Dirección: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" name="direccion" id="direccion" value="{{ $postulante->direccion }}">
            </div>
        </div>


        <div class="form-group" >
            <label for="">Teléfono: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" name="telefono" id="telefono" value="{{ $postulante->telefono }}">
            </div>
        </div>

        <div class="form-group" >
            <label for="">Email: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="email" name="email" id="email" value="{{ $postulante->correo }}">
            </div>
        </div>

        <div class="form-group" >
            <label for="">Fecha de Nacimiento: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="date" class="formcontrol" name="fecha_nac" id="fecha_nac" >
            </div>
        </div>

        <div class="form-group" >
            <label for="">Número de licencia: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" class="formcontrol" name="num_licencia" id="num_licencia" >
            </div>
        </div>

        <div class="form-group" >
            <label for="">Tipo de licencia: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" class="formcontrol" name="tip_licencia" id="tip_licencia" >
            </div>
        </div>

 
      
<button style="margin-left: 60px;margin-top: 20px"  type="submit" class="btn btn-primary"><i class="fas fasave"></i> Grabar</button>
<a style="margin-top: 20px"  href="{{ route('cancelarp')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</button></a>
</form>
</div>
</div>



                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection