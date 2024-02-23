@extends('layouts.plantilla')
@section('title','Cliente Nuevo')
@section('content')
<div class="container">
    <div class="text-center">
        <h1 class="my-5">Clientes Nuevos</h1>
    </div>
    
    <form action="{{route('cliente.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="mb-3 col-sm-12 col-md-12">
                <label for="a" class="form-label">Nombre Completos: </label>
                <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" id="a" value="{{old('nombre')}}">
                @error('nombre')
                    <small style="color: red;">*{{$message}}</small>
                    <br>
                @enderror
            </div>
        
    
            <div class="mb-3 col-sm-12 col-md-12">
                <label for="a" class="form-label">Dirección</label>
                <input type="text" name="direccion" class="form-control @error('direccion') is-invalid @enderror" id="a" value="{{old('direccion')}}">
                @error('direccion')
                    <small style="color: red;">*{{$message}}</small>
                    <br>
                @enderror
            </div>
    
            <div class="mb-3 col-sm-12 col-md-4">
                <label for="a" class="form-label">DNI: </label>
                <input type="text" name="dni" class="form-control @error('dni') is-invalid @enderror" id="a" value="{{old('dni')}}">
                @error('dni')
                    <small style="color: red;">*{{$message}}</small>
                    <br>
                @enderror
            </div> 
            <div class="mb-3 col-sm-12 col-md-4">
                <label for="a" class="form-label">Celular: </label>
                <input type="text" name="celular" class="form-control @error('celular') is-invalid @enderror" id="a" value="{{old('celular')}}">
                @error('celular')
                    <small style="color: red;">*{{$message}}</small>
                    <br>
                @enderror
            </div> 
            <div class="mb-3 col-sm-12 col-md-4">
                <label for="a" class="form-label">Ciudad: </label>
                <input type="text" name="ciudad" class="form-control @error('ciudad') is-invalid @enderror" id="a" value="{{old('ciudad')}}">
                @error('ciudad')
                    <small style="color: red;">*{{$message}}</small>
                    <br>
                @enderror
            </div> 
        </div>

        <div class="text-center">
            <input class="btn btn-primary" type="submit" value="Agregar">
            <a class="btn btn-secondary" href="{{route('cliente.index')}}">Volver</a>
        </div>
    </form>

    
</div>
@endsection