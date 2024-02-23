
@extends('layouts.plantilla')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Taller</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card table-responsive">
                        <div class="card-body">

 <div class="container">
<div class="title-tr">
    <h1>Registrando Nuevo Taller</h1>
</div>



 <div class="title-center">
 
 <form method="POST" action="{{ route('Taller.store')}}" enctype="multipart/form-data">
 @csrf


 <div class="form-group" >
    <label for="">RUC: </label>
    <div class="input-group" >
    <input  style="padding-bottom:10px;width:200px" type="text" class="formcontrol @error('ruc') is-invalid @enderror" name="ruc" id="ruc">
    @error('ruc')
    <span class="invalid-feedback" role="alert">
    <strong>{{$message}}</strong>
    </span>
    @enderror
    </div>    
</div>

<div class="form-group" >
    <label for="">Razón social: </label>
    <div class="input-group" >
    <input  style="padding-bottom:10px;width:200px" type="text" class="formcontrol @error('razon_social') is-invalid @enderror" name="razon_social" id="razon_social">
    @error('razon_social')
    <span class="invalid-feedback" role="alert">
    <strong>{{$message}}</strong>
    </span>
    @enderror
    </div>    
</div>


<div class="form-group" >
    <label for="">Dirección: </label>
    <div class="input-group" >
    <input  style="padding-bottom:10px;width:200px" type="text" class="formcontrol @error('direccion') is-invalid @enderror" name="direccion" id="direccion">
    @error('direccion')
    <span class="invalid-feedback" role="alert">
    <strong>{{$message}}</strong>
    </span>
    @enderror
    </div>    
</div>

<div class="form-group" >
    <label for="">Teléfono: </label>
    <div class="input-group" >
    <input  style="padding-bottom:10px;width:200px" type="text" class="formcontrol @error('telefono') is-invalid @enderror" name="telefono" id="telefono">
    @error('telefono')
    <span class="invalid-feedback" role="alert">
    <strong>{{$message}}</strong>
    </span>
    @enderror
    </div>    
</div>

<div class="form-group" >
    <label for="">Email: </label>
    <div class="input-group" >
    <input  style="padding-bottom:10px;width:200px" type="email" class="formcontrol @error('email') is-invalid @enderror" name="email" id="email">
    @error('email')
    <span class="invalid-feedback" role="alert">
    <strong>{{$message}}</strong>
    </span>
    @enderror
    </div>    
</div>

        
 
      
<button style="margin-left: 60px;margin-top: 20px"  type="submit" class="btn btn-primary"><i class="fas fasave"></i> Grabar</button>
<a style="margin-top: 20px"  href="{{ route('cancelart')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</button></a>
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