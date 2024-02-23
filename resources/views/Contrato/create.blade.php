
@extends('layouts.plantilla')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Permisos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card table-responsive">
                        <div class="card-body">
{{--  -------------------------------------------------------------------------------------------------------------------------------------------   -  --}}
{{-- CONTENIDO --}}

<div class="container">
  <form method="POST" action="{{ route('contrato.store')}} " enctype="multipart/form-data">
    @csrf
   <div class="row">
    <table class="table">
      <thead>
        <tr>
          <th>         
            <div class="col-3" >
            <label for="">DNI: </label>
            <div class="input-group" >
            <input  style="padding-bottom:10px;width:200px" type="text" name="dni" id="dni">
            </div>
            </div>
          </th>
          <th> 
            <div class="form-group" >
              <div class="input-group">
                <label for="id_area">Área:</label>
                <select name="id_area" id="id_area">
                    @foreach ($areas as $area)
                        <option value="{{ $area->id_area }}">{{ $area->area }}</option>
                    @endforeach
                </select>
            </div>
            </div>  
         </th>
          <th>          
            <div class="form-group" >
              <div class="input-group">
                <label for="id_area">Cargo:</label>
                <select name="Cargo" id="id_cargo">
                    @foreach ($cargos as $cargo)
                        <option value="{{ $cargo->id_cargo }}">{{ $cargo->cargo }}</option>
                    @endforeach
                </select>
            </div>
            </div>  
        </th>
          <th>
            <div class="form-group" >
              <label for="">Sucursal </label>
              <div class="input-group" >
                <select name="Sucursal" id="id_area" required>
                  <option value="">Seleccionar Sucursal</option>
                  @foreach($sucursales as $sucursal)
                      <option value="{{ $sucursal->id_sucursal }}">{{ $sucursal->sucursal }}</option>
                  @endforeach
              </select>
              </div>
            </div>
          </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td >
            <div class="col-3 >
              <label for=">Tipo de contrato: </label>
              <div class="input-group" >
              <input  style="padding-bottom:10px;width:200px" type="text" name="tipo_con" id="tipo_con">
              </div>
         </div>
          </td>
          <td>         
            <div class="col-3" >
              <label for="">Inicio: </label>
              <div class="input-group" >
              <input  style="padding-bottom:10px;width:200px" type="date" class="formcontrol" name="fecha_ini" id="fecha_ini" >
              </div>
            </div>
          </td>
          <td>          
            <div class="col-3" >
              <label for="">Fin: </label>
              <div class="input-group" >
              <input  style="padding-bottom:10px;width:200px" type="date" class="formcontrol" name="fecha_fin" id="fecha_fin" >
              </div>
              </div>
            </div>

          </td>
        </tr>
        <td>   <button style="margin-left: 60px;margin-top: 20px"  type="submit" class="btn btn-primary"><i class="fas fasave"></i> Grabar</button>
          <a style="margin-top: 20px"  href="{{ route('cancelarcon')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</button></a></td>
        <tr>
         
        </tr>
      </tbody>
    </table>
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

@section('script')
   <script>
   setTimeout(function(){
   document.querySelector('#mensaje').remove();
   },2000);
   </script>

</div>
@endsection