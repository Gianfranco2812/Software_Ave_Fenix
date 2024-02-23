
@extends('layouts.plantilla')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Herramienta</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card table-responsive">
                        <div class="card-body">
{{--  -------------------------------------------------------------------------------------------------------------------------------------------   -  --}}
{{-- CONTENIDO --}}

<div class="title-ar">
    <h1>Editar Registro de Herramienta</h1>
</div>
 <div class="title-center">
 
 <form method="POST" action="{{ route("Herramienta.update",$herramienta->idherramienta)}}">
@method('put') 
 @csrf

   
 <div class="form-group">
    <label for="">Código</label>
    <input style="margin-left: 55px" type="text" class="formcontrol" id="id" name="id" value="{{ $herramienta->idherramienta }}" disabled>
</div>



<div class="form-group" >
    <label for="">Descripción: </label>
    <div class="input-group" >
    <input  style="padding-bottom:10px;width:200px" type="text" class="formcontrol @error('descripcion') is-invalid @enderror" name="descripcion" id="descripcion" value="{{ $herramienta->descripcion }}">
    @error('descripcion')
    <span class="invalid-feedback" role="alert">
    <strong>{{$message}}</strong>
    </span>
    @enderror
    </div>    
</div>


<div class="form-group" >
    <label for="">Cantidad: </label>
    <div class="input-group" >
    <input  style="padding-bottom:10px;width:200px" type="number" step="any" class="formcontrol @error('cantidad') is-invalid @enderror" name="cantidad" id="cantidad" value="{{ $herramienta->cantidad }}">
    @error('cantidad')
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
<a style="margin-top: 20px"  href="{{ route('cancelarh')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</button></a>
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