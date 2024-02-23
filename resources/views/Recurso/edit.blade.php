
@extends('layouts.plantilla')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Recurso</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card table-responsive">
                        <div class="card-body">
{{--  -------------------------------------------------------------------------------------------------------------------------------------------   -  --}}
{{-- CONTENIDO --}}

<div class="title-ar">
    <h1>Editar Registro de Recurso</h1>
</div>
 <div class="title-center">
 
 <form method="POST" action="{{ route("Recurso.update",$recurso->idrecurso)}}">
@method('put') 
 @csrf

   
 <div class="form-group">
    <label for="">Código</label>
    <input style="margin-left: 55px" type="text" class="formcontrol" id="id" name="id" value="{{ $recurso->idrecurso }}" disabled>
</div>


<div class="form-group" >
    <label for="">Denominación: </label>
    <div class="input-group" >
    <input  style="padding-bottom:10px;width:200px" type="text" class="formcontrol @error('denominacion') is-invalid @enderror" name="denominacion" id="denominacion" value="{{ $recurso->denominacion }}">
    @error('denominacion')
    <span class="invalid-feedback" role="alert">
    <strong>{{$message}}</strong>
    </span>
    @enderror
    </div>    
</div>

 
<div class="form-group" >
    <label for="">costo: </label>
    <div class="input-group" >
    <input  style="padding-bottom:10px;width:200px" type="numbre" step="any" class="formcontrol @error('costo') is-invalid @enderror" name="costo" id="costo" value="{{ $recurso->costo }}">
    @error('costo')
    <span class="invalid-feedback" role="alert">
    <strong>{{$message}}</strong>
    </span>
    @enderror
    </div>    
</div>


<div class="form-group" >
    <label for="">Stock: </label>
    <div class="input-group" >
    <input  style="padding-bottom:10px;width:200px" type="text" class="formcontrol @error('stock') is-invalid @enderror" name="stock" id="stock" value="{{ $recurso->stock }}">
    @error('stock')
    <span class="invalid-feedback" role="alert">
    <strong>{{$message}}</strong>
    </span>
    @enderror
    </div>    
</div>


<div class="form-group" >
    <label for="">Tipo: </label>
    <br>
    <select class="formcontrol" style="padding:10px 0px;width:200px" name="tipo" id="tipo" > 
        <option value="{{ $recurso->tipo }}"selected>{{ $recurso->tipo }}</option>
        <option value="Material automotriz">Material automotriz</option>
        <option value="Repuesto">Repuesto</option>

    </select>
</div>




<div class="form-group" >
    <label for="">Medida: </label>
    <div class="input-group" >
    <input  style="padding-bottom:10px;width:200px" type="medida" class="formcontrol @error('medida') is-invalid @enderror" name="medida" id="medida" value="{{ $recurso->medida }}">
    @error('medida')
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
<a style="margin-top: 20px"  href="{{ route('cancelarr')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</button></a>
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