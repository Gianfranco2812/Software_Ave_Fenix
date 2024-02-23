@extends('layouts.plantilla')
@section('title','Página Principal')
@section('content')
<div class="container">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <div class="text-center">
        <h1 class="my-5">Venta de pasajes</h1>
    </div>
    <form action="{{route('ventas.update',$venta)}}" method="POST">
        @csrf
        @method('put')
        <div class="row">

            <div class="mb-3 col-sm-12 col-md-4">
                <label for="idcliente" class="form-label">Cliente: </label>
                <select name="idcliente" id="idcliente" class="form-control" disabled="true"> 
                    {{-- Id : JS | name: Controlador --}}
                    @foreach ($clientes as $c)
                        <option value="{{$c->idcliente}}" >{{$c->nombre}}</option>
                    @endforeach
                </select>
            </div>
    
            <div class="mb-3 col-sm-12 col-md-4">
                <label for="a" class="form-label">Fecha de Ida:</label>
                <input type="text" id="fechaIda" class="form-control" name="fechaIda" value="{{ $venta->fechaIda }}" placeholder="Seleccione una fecha" disabled="true">
            </div>
    
            <div class="mb-3 col-sm-12 col-md-4">
                <label for="a" class="form-label">Fecha de Retorno:</label>
                <input type="text" id="fechaRetorno" class="form-control" disabled="true" name="fechaRetorno" value="{{ $venta->fechaRetorno }}" placeholder="Seleccione una fecha" disabled="true">
            </div>

            <div class="mb-3 col-sm-12 col-md-2">
                <label for="idestado" class="form-label">Estado: </label>
                <select name="idestado" id="idestado" class="form-control">
                    @foreach ($estado as $e)
                        <option value="{{$e->idestado}}" @if ($venta->idestado == $e->idestado) selected @endif>{{$e->NomEstado}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3 col-sm-12 col-md-2">
                <label for="idformapago" class="form-label">Forma de Pago: </label>
                <select name="idformapago" id="idformapago" class="form-control" disabled="true">
                    @foreach ($formapago as $fo)
                        <option value="{{$fo->idformapago}}">{{$fo->NombrePago}}</option>
                    @endforeach
                </select>
            </div>


            <div class="mb-3 col-sm-12 col-md-4">
                <label for="iditinerario" class="form-label">Ciudad-Servicio: </label>
                <select name="iditinerario" id="iditinerario" class="form-control js-example-basic-single" onchange="agregar()" disabled="true">
                    @foreach($itinerario as $iti)
                        @php
                        $precio_total = $iti->PrecioCiud + $iti->PrecioServ;
                        @endphp
                        <option value="{{ $iti->iditinerario }}_{{ $iti->Nomciudad }}_{{ $precio_total }}_{{ $iti->NomServicio }}_{{ $iti->asientos }}_{{ $iti->horaida }}_{{ $iti->horallegada }}_{{ $iti->PrecioCiud }}_{{ $iti->PrecioServ }}">{{ $iti->Nomciudad }}--{{ $iti->NomServicio }}</option>
                    @endforeach
                </select>
            </div>
            
    
            <div class="table-responsive">
                <table id="detalle" class="table table-hover">
                    <thead class="table-dark text-center">
                        <tr>
                        <th>Ciudad</th>
                        <th>Servicio</th>
                        <th>Hora de Ida</th>
                        <th>Hora de llegada</th>
                        <th>Precio</th>
                        <th>Cantidad Pasajes</th>
                        <th>Totales</th>
                        
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @php
                            $totales=$precio_total*$iti->cantidad;
                        @endphp
                        <td>{{ $iti->Nomciudad }}</td>
                        <td>{{ $iti->NomServicio }}</td>
                        <td>{{ $iti->horaida }}</td>
                        <td>{{ $iti->horallegada }}</td>
                        <td>{{ $precio_total }}</td>
                        <td>{{ $iti->cantidad }}</td>
                        <td>{{ $totales }}</td>
                    </tbody>
                </table>
            </div>
    
            <div class="col mt-3">
                <div class="text-right">
                    @php
                        $igv=0.18*$totales;
                    @endphp
                    <label for="">Sub-Total: &nbsp;&nbsp;&nbsp;&nbsp; <span id="sub-total">{{ $totales }}</span></label><br>
                    <label for="">Igv: &nbsp;&nbsp;&nbsp;&nbsp; <span id="igv">{{ $igv }}</span></label><br>
                    <label for="">TOTAL: &nbsp;&nbsp;&nbsp;&nbsp; <span id="total">{{ $igv+$totales }}</span></label><br>
                </div>
            </div>
    
            
    
        </div>
        <div class="text-center mb-5">
            <input class="btn btn-primary" id="idagregar" type="submit" value="Guardar">
            <a class="btn btn-secondary" href="{{route('ventas.index')}}">Volver</a>
        </div>
    </form>
    
    
</div>

@endsection
@section('script')
<script>
    $(document).ready(function() {
    $('.js-example-basic-single').select2();

	});
</script>

<script>
    var fechaInputIda = document.getElementById("fechaIda");
    var fechaInputRetorno = document.getElementById("fechaRetorno");

    flatpickr(fechaInputIda, 
    {
        enableTime: false,
        dateFormat: "Y-m-d",
        
        onChange: function(selectedDates, dateStr) {
        // Obtener la fecha actual
        var fechaActual = new Date().toISOString().split('T')[0];
        
        if (dateStr < fechaActual ) {
            //Mensaje de error, permanece desahbilitado FechaRetorno
            alert("Elegir fecha válida");
            document.getElementById('fechaIda').value = ""; // Limpiar el valor del campo Fecha de Ida
        } else {
                // Cuando se selecciona una fecha de ida válida, la almacenamos en el campo oculto
                document.getElementById("fechaIda").value = dateStr;
                // Habilitar Fecha de Retorno y establecer la fecha mínima
                fechaInputRetorno.disabled = false;
            
        }
    }
    });


    flatpickr(fechaInputRetorno, 
    {
        enableTime: false,
        dateFormat: "Y-m-d",
        onChange: function(selectedDates, dateStr) {

            if (dateStr <=  document.getElementById('fechaIda').value) {
                alert("Elegir fecha válida");
                document.getElementById('fechaRetorno').value = "";
            }else{
                document.getElementById("fechaRetorno").value = dateStr;
            }
                // Cuando se selecciona una fecha de ida, la almacenamos en el campo oculto
                
        }
    });

</script> 




@endsection