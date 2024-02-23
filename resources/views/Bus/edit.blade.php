
@extends('layouts.plantilla')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Buses</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card table-responsive">
                        <div class="card-body">

<div class="title-ar">
    <h1>Editar Registro de Buses</h1>
</div>
 <div class="title-center">
 
 <form method="POST" action="{{ route("Bus.update",$bus->idbus)}}">
@method('put') 
 @csrf


        <div class="form-group">
        <label for="">Código</label>
        <input style="margin-left: 55px" type="text" class="formcontrol" id="id" name="id" value="{{ $bus->idbus }}" disabled>
        </div>

        <div class="form-group" >
            <label for=""> Código Institucional: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" class="formcontrol" name="cod_institucional" id="cod_institucional" value="{{ $bus->cod_institucional }}"{{-- readonly="readonly" --}}>
            </div>
        </div>

        <div class="form-group" >
            <label for=""> Año de fabricación: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" class="formcontrol" name="anio_fabricacion" id="anio_fabricacion" value="{{ $bus->anio_fabricacion }}"{{-- readonly="readonly" --}}>
            </div>
        </div>

        <div class="form-group" >
            <label for=""> Peso toneladas: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" class="formcontrol" name="peso_toneladas" id="peso_toneladas" value="{{ $bus->peso_toneladas }}"{{-- readonly="readonly" --}}>
            </div>
        </div>


        <div class="form-group" >
            <label for=""> Número de cilindros: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" class="formcontrol" name="num_cilindros" id="num_cilindros" value="{{ $bus->num_cilindros }}"{{-- readonly="readonly" --}}>
            </div>
        </div>

        <div class="form-group" >
            <label for=""> Número de ocupantes: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" class="formcontrol" name="num_ocupantes" id="num_ocupantes" value="{{ $bus->num_ocupantes }}"{{-- readonly="readonly" --}}>
            </div>
        </div>


        <div class="form-group" >
            <label for=""> Tipo de transmision: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" class="formcontrol" name="tipo_transmision" id="tipo_transmision" value="{{ $bus->tipo_transmision }}"{{-- readonly="readonly" --}}>
            </div>
        </div>

        <div class="form-group" >
            <label for=""> Número de ejes: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" class="formcontrol" name="num_ejes" id="num_ejes" value="{{ $bus->num_ejes }}"{{-- readonly="readonly" --}}>
            </div>
        </div>

        <div class="form-group" >
            <label for="">Número de ruedas: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" class="formcontrol" name="num_ruedas" id="num_ruedas" value="{{ $bus->num_ruedas }}"{{-- readonly="readonly" --}}>
            </div>
        </div>

        <div class="form-group" >
            <label for="">Código de neumáticos: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" class="formcontrol" name="cod_neumaticos" id="cod_neumaticos" value="{{ $bus->cod_neumaticos }}"{{-- readonly="readonly" --}}>
            </div>
        </div>

        <div class="form-group" >
            <label for=""> modelo: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" class="formcontrol" name="modelo" id="modelo" value="{{ $bus->modelo }}"{{-- readonly="readonly" --}}>
            </div>
        </div>

        <div class="form-group" >
            <label for="">Potencia: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" class="formcontrol" name="potencia" id="potencia" value="{{ $bus->potencia }}"{{-- readonly="readonly" --}}>
            </div>
        </div>

        <div class="form-group" >
            <label for="">Torque: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" class="formcontrol" name="torque" id="torque" value="{{ $bus->torque }}"{{-- readonly="readonly" --}}>
            </div>
        </div>


        <div class="form-group" >
            <label for="">Ancho: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" class="formcontrol" name="ancho" id="ancho" value="{{ $bus->ancho }}"{{-- readonly="readonly" --}}>
            </div>
        </div>


        <div class="form-group" >
            <label for=""> largo: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" class="formcontrol" name="largo" id="largo" value="{{ $bus->largo }}"{{-- readonly="readonly" --}}>
            </div>
        </div>

        <div class="form-group" >
            <label for=""> alto: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" class="formcontrol" name="alto" id="alto" value="{{ $bus->alto }}"{{-- readonly="readonly" --}}>
            </div>
        </div>

        <div class="form-group" >
            <label for=""> placa: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" class="formcontrol" name="placa" id="placa" value="{{ $bus->placa }}"{{-- readonly="readonly" --}}>
            </div>
        </div>

        <div class="form-group" >
            <label for=""> num_motor: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" class="formcontrol" name="num_motor" id="num_motor" value="{{ $bus->num_motor }}"{{-- readonly="readonly" --}}>
            </div>
        </div>

        <div class="form-group" >
            <label for=""> num_chasis: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" class="formcontrol" name="num_chasis" id="num_chasis" value="{{ $bus->num_chasis }}"{{-- readonly="readonly" --}}>
            </div>
        </div>


        <div class="form-group" >
            <label for=""> combustible: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" class="formcontrol" name="combustible" id="combustible" value="{{ $bus->combustible }}"{{-- readonly="readonly" --}}>
            </div>
        </div>


        <div class="form-group" >
            <label for=""> estado_actual: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" class="formcontrol" name="estado_actual" id="estado_actual" value="{{ $bus->estado_actual }}"{{-- readonly="readonly" --}}>
            </div>
        </div>



        <div class="form-group" >
            <label for=""> valor: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" class="formcontrol" name="valor" id="valor" value="{{ $bus->valor }}"{{-- readonly="readonly" --}}>
            </div>
        </div>


        <div class="form-group" >
        <label for="idpersonal"><font style="verticalalign: inherit;">Personal Responsable:</font></label>
        <select style="padding-bottom:10px;width:200px" class="form-control select2 select2-hiddenaccessible selectpicker" data-select2-
        id="1" tabindex="-1" ariahidden="true" id="idpersonal" name="idpersonal" data-livesearch="true">

        @foreach($personal as $itempersonal) <option value="{{ $itempersonal->idpersonal }}" selected>{{ $itempersonal->nombre." ".$itempersonal->apellidos}}</option>
        @endforeach
 
        </select>
        </div>




     
    


           


<!-- {{-- <button style="margin-left: 300px;margin-top:40px;margin-right:10px"type="submit" class="btn btn-primary"><i class="fas fasave"></i> Grabar</button>
<a style="margin-top:40px" href="{{ route('cancelare')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</button></a>
 --}} -->
<button style="margin-left: 60px;margin-top: 20px"  type="submit" class="btn btn-primary"><i class="fas fasave"></i> Grabar</button>
<a style="margin-top: 20px"  href="{{ route('cancelarb')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</button></a>
</form>
</div>




                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection