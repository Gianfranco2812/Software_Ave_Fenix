@extends('layouts.plantilla')
@section('title', 'Comprobantes') {{-- Edita "Ejemplo" por el nombre que corresponda, esto aparece en la pestaña del
navegador --}}

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">COMPROBANTES</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        {{--
        -------------------------------------------------------------------------------------------------------------------------------------------
        - --}}
        {{-- INICIO DE CONTENIDO --}}

        <div>
            <div>
                <a class="btn btn-primary" href="{{route('comprobantes.create')}}">Registrar comprobante</a>
            </div>
            <table class="table mt-4">
                <tr class="table-dark">
                    <th>ID</th>
                    <th>Numero</th>
                    <th>Monto</th>
                    <th>Tarifa</th>
                    <th>Promocion</th>
                    <th>Fecha</th>
                    <th>Observaciones</th>
                    <th>Opciones</th>
                </tr>
                @foreach($comprobantes as $comprobante)
                    <tr>
                        <td class="align-middle">{{$comprobante->ComprobanteID}}</td>
                        <td class="align-middle">{{$comprobante->Numero}}</td>
                        <td class="align-middle">{{$comprobante->Monto}}</td>
                        @foreach ($tarifas as $tarifa)
                            @if ($tarifa->TarifaID == $comprobante->TarifaID)
                                <td class="align-middle">{{$tarifa->Descripcion}}</td>
                            @endif
                        @endforeach
                        @foreach ($promociones as $promocion)
                            @if ($promocion->PromocionID == $comprobante->PromocionID)
                                <td class="align-middle">{{$promocion->Nombre}}</td>
                            @endif
                        @endforeach
                        <td class="align-middle">{{$comprobante->Fecha}}</td>
                        <td class="align-middle">{{$comprobante->Observaciones}}</td>
                        <td class="d-flex">
                            <a class="btn btn-primary mr-2" href="{{route('comprobantes.edit', ['comprobante' => $comprobante])}}">Editar</a>
                            <form method="post" action="{{route('comprobantes.destroy', ['comprobante' => $comprobante])}}">
                                @csrf
                                @method('delete')
                                <input class="btn btn-danger" type="submit" value="Eliminar">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>


        {{--
        -------------------------------------------------------------------------------------------------------------------------------------------
        - --}}
        {{-- FIN DE CONTENIDO --}}
    </div>
</div>

@endsection

@section('script')

{{-- Aquí va el contenido del js si hubiera --}}

@endsection