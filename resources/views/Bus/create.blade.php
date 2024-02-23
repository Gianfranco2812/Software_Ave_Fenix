
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

 <div class="container">
<div class="title-tr">
    <h1>Registrando Nuevo Bus</h1>
</div>



 <div class="title-center">
 
 <form method="POST" action="{{ route('Bus.store')}} " enctype="multipart/form-data">
 @csrf


        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3">
            <div class="form-group" >
            <label for=""> Código Institucional: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" name="cod_institucional" id="cod_institucional" >
            </div>
            </div>

            </div>
            <div class="col-md-3">
            <div class="form-group" >
            <label for=""> Año de fabricación: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" name="anio_fabricacion" id="anio_fabricacion" >
            </div>
            </div>   
            </div>
            <div class="col-md-3"></div>
        </div>

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3">
            <div class="form-group" >
            <label for=""> Peso toneladas: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" name="peso_toneladas" id="peso_toneladas" >
            </div>
            </div>
            </div>
            <div class="col-md-3">
            <div class="form-group" >
            <label for=""> Número de cilindros: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" name="num_cilindros" id="num_cilindros" >
            </div>
            </div>
            </div>
            <div class="col-md-3"></div>
        </div>


        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3">
            <div class="form-group" >
            <label for=""> Número de ocupantes: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" name="num_ocupantes" id="num_ocupantes" >
            </div>
            </div>
            </div>
            <div class="col-md-3">
            <div class="form-group" >
            <label for=""> Tipo de transmision: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" name="tipo_transmision" id="tipo_transmision" >
            </div>
            </div>
            </div>
            <div class="col-md-3"></div>
        </div>

       

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3">
            <div class="form-group" >
            <label for=""> Número de ejes: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" name="num_ejes" id="num_ejes">
            </div>
            </div>
            </div>
            <div class="col-md-3">
            <div class="form-group" >
            <label for="">Número de ruedas: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" name="num_ruedas" id="num_ruedas" >
            </div>
            </div>
            </div>
            <div class="col-md-3"></div>
        </div>
     


        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3">
            <div class="form-group" >
            <label for="">Código de neumáticos: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" name="cod_neumaticos" id="cod_neumaticos" >
            </div>
            </div>
            </div>
            <div class="col-md-3">
            <div class="form-group" >
            <label for="">Modelo: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" name="modelo" id="modelo" >
            </div>
            </div>
            </div>
            </div>
            <div class="col-md-3"></div>
        </div>
 

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3">
            <div class="form-group" >
            <label for="">Potencia: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" name="potencia" id="potencia">
            </div>
            </div>
            </div>

            <div class="col-md-3">
            <div class="form-group" >
            <label for="">Torque: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" name="torque" id="torque" >
            </div>
            </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3">
            <div class="form-group" >
            <label for="">Ancho: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" name="ancho" id="ancho" >
            </div>
            </div>
          
            </div>
            <div class="col-md-3">
            <div class="form-group" >
            <label for=""> Largo: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" name="largo" id="largo" >
            </div>
            </div>
            </div>
            <div class="col-md-3"></div>
        </div>
      

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3">
            <div class="form-group" >
            <label for="">Alto: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" name="alto" id="alto">
            </div>
            </div>
          
            </div>
            <div class="col-md-3">
            <div class="form-group" >
            <label for="">Placa: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" name="placa" id="placa" >
            </div>
            </div>
            </div>
            <div class="col-md-3"></div>
        </div>
        

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3">
            <div class="form-group" >
            <label for="">Número de motor: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" name="num_motor" id="num_motor" >
            </div>
            </div>
          
            </div>
            <div class="col-md-3">
            <div class="form-group" >
            <label for="">Número de chasis: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" name="num_chasis" id="num_chasis" >
            </div>
            </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    


        <div class="row">
            <div class="col-md-3"></div>
            
            <div class="col-md-3">
            <div class="form-group" >
            <label for="">Combustible: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" name="combustible" id="combustible" >
            </div>
            </div>
            </div>
            <div class="col-md-3">
            <div class="form-group" >
            <label for="">Estado Actual: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" name="estado_actual" id="estado_actual" >
            </div>
            </div>
          
            </div>
            <div class="col-md-3"></div>

        </div>
   

        <div class="row">
            <div class="col-md-3"></div>        
            <div class="col-md-6">
                <div class="form-group" >
                <label for="">Valor: </label>
                <div class="input-group" >
                <input  style="padding-bottom:10px;width:200px" type="text" name="valor" id="valor" >
                </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
     

        <div class="row" >
            <div class="col-md-3"></div>


            <div class="col-md-3">
                <div class="form-group" >
                <label for="id_personal"><p style="verticalalign: inherit;">Personal Responsable:</p></label>
                <select style="padding-bottom:10px;width:200px" class="form-control select2 select2-hiddenaccessible selectpicker" data-select2-id="1" tabindex="-1" 
                ariahidden="true" id="id_personal" name="id_personal" data-livesearch="true">
                <option value="0" selected>- Seleccione Personal -</option>

                @foreach($personal as $itempersonal) <option value="{{ $itempersonal->id_personal }}">{{ $itempersonal->nombre." ".$itempersonal->apellidos}}</option>
                @endforeach
                </select>
                </div>
            </div>


            <div class="col-md-6"></div>
        </div>
        

        <div class="row" style="margin-top:20px">
            <div class="col-sm-4"></div>
            <div class="col-sm-2">
            <button style="margin:0px auto"  type="submit" class="btn btn-primary"><!-- <i class="fas fasave"></i> --> Grabar</button>

            </div>
            <div class="col-sm-2">
    
            <a style="margin:0px auto"  href="{{ route('cancelarb')}}" class="btn btn-danger"><!-- <i class="fas fa-ban"></i> --> Cancelar</button></a>
            </div>
            <div class="col-sm-4"></div>


        </div>
   

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