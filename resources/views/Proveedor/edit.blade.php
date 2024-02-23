
@extends('layouts.plantilla')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Proveedor</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card table-responsive">
                        <div class="card-body">
{{--  -------------------------------------------------------------------------------------------------------------------------------------------   -  --}}
{{-- CONTENIDO --}}

<div class="title-ar">
    <h1>Editar Registro de Proveedor</h1>
</div>
 <div class="title-center">
 
 <form method="POST" action="{{ route("Proveedor.update",$proveedor->idproveedor)}}">
@method('put') 
 @csrf




 
   
 <div class="form-group">
    <label for="">Código</label>
    <input style="margin-left: 55px" type="text" class="formcontrol" id="id" name="id" value="{{ $proveedor->idproveedor }}" disabled>
</div>


<div class="form-group" >
    <label for="">RUC: </label>
    <div class="input-group" >
    <input  style="padding-bottom:10px;width:200px" type="text" class="formcontrol @error('ruc') is-invalid @enderror" name="ruc" id="ruc" value="{{ $proveedor->ruc }}">
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
    <input  style="padding-bottom:10px;width:200px" type="text" class="formcontrol @error('razon_social') is-invalid @enderror" name="razon_social" id="razon_social" value="{{ $proveedor->razon_social }}">
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
    <input  style="padding-bottom:10px;width:200px" type="text" class="formcontrol @error('direccion') is-invalid @enderror" name="direccion" id="direccion" value="{{ $proveedor->direccion }}">
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
    <input  style="padding-bottom:10px;width:200px" type="text" class="formcontrol @error('telefono') is-invalid @enderror" name="telefono" id="telefono" value="{{ $proveedor->telefono }}">
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
    <input  style="padding-bottom:10px;width:200px" type="email" class="formcontrol @error('email') is-invalid @enderror" name="email" id="email" value="{{ $proveedor->email }}">
    @error('email')
    <span class="invalid-feedback" role="alert">
    <strong>{{$message}}</strong>
    </span>
    @enderror
    </div>    
</div>



           


<!-- {{-- <button style="margin-left: 300px;margin-top:40px;margin-right:10px"type="submit" class="btn btn-primary"><i class="fas fasave"></i> Grabar</button>
<a style="margin-top:40px" href="{{ route('cancelare')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</button></a>
 --}} -->
<button style="margin-left: 60px;margin-top: 20px"  type="submit" class="btn btn-primary"><i class="fas fasave"></i> Grabar</button>
<a style="margin-top: 20px"  href="{{ route('cancelarpr')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</button></a>
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