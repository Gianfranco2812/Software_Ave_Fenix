@extends('layouts.plantilla')
@section('title','Página Principal')
@section('content')
<div class="container">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <div class="text-center">
        <h1 class="my-5">Venta de pasajes</h1>
    </div>
    <form action="{{route('ventas.store')}}" method="POST">
        @csrf
        <div class="row">

            <div class="mb-3 col-sm-12 col-md-4">
                <label for="idcliente" class="form-label">Cliente: </label>
                <select name="idcliente" id="idcliente" class="form-control"> 
                    {{-- Id : JS | name: Controlador --}}
                    @foreach ($cliente as $c)
                        <option value="{{$c->idcliente}}">{{$c->nombre}}</option>
                    @endforeach
                </select>
            </div>
    
            <div class="mb-3 col-sm-12 col-md-4">
                <label for="a" class="form-label">Fecha de Ida:</label>
                <input type="text" id="fechaIda" class="form-control" name="fechaIda" value="" placeholder="Seleccione una fecha">
            </div>
    
            <div class="mb-3 col-sm-12 col-md-4">
                <label for="a" class="form-label">Fecha de Retorno:</label>
                <input type="text" id="fechaRetorno" class="form-control" disabled="true" name="fechaRetorno" value="" placeholder="Seleccione una fecha">
            </div>

            <div class="mb-3 col-sm-12 col-md-2">
                <label for="idestado" class="form-label">Estado: </label>
                <select name="idestado" id="idestado" class="form-control">
                    @foreach ($estado as $e)
                        @if ($e->idestado == 1 || $e->idestado == 2)
                        <option value="{{$e->idestado}}">{{$e->NomEstado}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3 col-sm-12 col-md-2">
                <label for="idformapago" class="form-label">Forma de Pago: </label>
                <select name="idformapago" id="idformapago" class="form-control">
                    @foreach ($formapago as $fo)
                        <option value="{{$fo->idformapago}}">{{$fo->NombrePago}}</option>
                    @endforeach
                </select>
            </div>


            <div class="mb-3 col-sm-12 col-md-4">
                <label for="iditinerario" class="form-label">Ciudad-Servicio: </label>
                <select name="iditinerario" id="iditinerario" class="form-control js-example-basic-single" onchange="agregar()">
                    @foreach($itinerarios as $iti)
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
                        <th>Accion</th>
                        <th>Ciudad</th>
                        <th>Servicio</th>
                        <th>Hora de Ida</th>
                        <th>Hora de llegada</th>
                        <th>Precio</th>
                        <th>Cantidad Pasajes</th>
                        <th>Totales</th>
                        
                        </tr>
                    </thead>
                </table>
            </div>
    
            <div class="col mt-3">
                <div class="text-right">
                    <label for="">Sub-Total: &nbsp;&nbsp;&nbsp;&nbsp; <span id="sub-total"></span></label><br>
                    <label for="">Igv: &nbsp;&nbsp;&nbsp;&nbsp; <span id="igv"></span></label><br>
                    <label for="">TOTAL: &nbsp;&nbsp;&nbsp;&nbsp; <span id="total"></span></label><br>
                </div>
            </div>
    
            
    
        </div>
        <div class="text-center mb-5">
            <input class="btn btn-primary" id="idagregar" type="submit" value="Relizar venta" disabled="">
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
            validarFechas();
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
            validarFechas();    
        }
    });

    function validarFechas() {
        var fechaIda = new Date(document.getElementById('fechaIda').value);
        var fechaRetorno = new Date(document.getElementById('fechaRetorno').value);

        if (fechaIda >= fechaRetorno) {
            document.getElementById('fechaIda').value = "";
            document.getElementById('fechaRetorno').value = "";
            fechaInputRetorno.disabled = true;
        }
    }


</script> 


<script>
    var indice=0;
	var i=0;
	let vector=[]; 
    var total=0;
    var totales=0;
	var sum=0;
    var igv=0;
    var sub_total=0;

	function agregar()
	{
        vector = [];
		var cantidad=parseInt(prompt('Ingrese Cantidad de Pasajes'));
        $('#iditinerario').prop('disabled', true);
        if(cantidad>0){
            datosciudad=document.getElementById('iditinerario').value.split('_');
            var dato=datosciudad[0];
            if (compara(dato,vector)){
                alert('Ya ha seleccionado esa Ciudad');
            }else{
                
                vector[i] = dato;	

                totales=parseFloat(datosciudad[2])*cantidad;
                sub_total=parseFloat(sub_total+totales);
                igv=sub_total*0.18;
                total=igv+sub_total;

                fila = '<tr id="fila' + indice + '" class="text-center"><td><a href="#" class="btn btn-danger btn-sm" onclick="quitar(' + indice + ',' + totales + ',' + datosciudad[0] + ')">Quitar</a></td><td><input type="hidden" name="iditinerarios[]" value="' + datosciudad[0] + '">' + datosciudad[1] + '</td><td>' + datosciudad[3] + '</td><td>' + datosciudad[5] + '</td><td>' + datosciudad[6] + '</td> <td>' + datosciudad[2] + '</td><td><input type="hidden" name="cantidad[]" value="' + cantidad + '">' + cantidad + '</td><td>' + parseFloat(totales).toFixed(2) + '</td></tr>';

                $('#detalle').append(fila);	                    

                actualizarValores();

                /* alert('vector'+vector);	 */	
                indice++;
                i++;
                 
		    }
        }else{
            alert('Debe ingresar una cantidad mayor a 0')
            cancelarAgregar();// Llamamos a la función cancelarAgregar cuando se cancela el ingreso de cantidad
        }
		
	}

    function cancelarAgregar() {
        $('#iditinerario').prop('disabled', false); // Habilitamos el select option nuevamente
    }

    function actualizarValores() {
        document.getElementById('sub-total').innerHTML = parseFloat(sub_total).toFixed(2);
        document.getElementById('igv').innerHTML = parseFloat(igv).toFixed(2);
        document.getElementById('total').innerHTML = parseFloat(total).toFixed(2);
        document.getElementById('idagregar').disabled = false;
    }
    
    function compara(producto,vector){
		for(let i=0; i<vector.length; i++){
			if(producto==vector[i]){
				return true;
			}
		}
		return false;
	}

	function borrar(producto, vector) {
        for (let i = 0; i < vector.length; i++) {
            if (producto == vector[i]) {
                vector[i] = -1;
            }
        }
    }

    function quitar(item, valor, id) {
        borrar(id, vector);
        $('#fila' + item).remove();
        sub_total = parseFloat(sub_total) - parseFloat(valor);
        igv = parseFloat(sub_total) * 0.18;
        total = parseFloat(sub_total) + parseFloat(igv);
        actualizarValores();
        indice--;
        if (indice == 0) {
            document.getElementById('idagregar').disabled = true;
            $('#iditinerario').prop('disabled', false);
        } else {
            cancelarAgregar(); // Llamamos a la función cancelarAgregar cuando se quita un elemento de la tabla
        }
    }

</script>




@endsection