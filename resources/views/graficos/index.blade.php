@extends('layouts.plantilla')
@section('title', 'Gráficos')
@section('content')
<div class="container">
    <div> <br></div>
    @if (!empty($data))
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>

        <div id="grafico"> 
            <script>
                //1er Gráfico
                Highcharts.chart('grafico', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'PASAJES VENDIDOS/CIUDAD',
                
                    },
                    subtitle: {
                        text: ''
                    },
                    accessibility: {
                        announceNewData: {
                            enabled: true
                        }
                    },
                    xAxis: {
                        type: 'category'
                    },
                    yAxis: {
                        title: {
                            text: '# Pasajes'
                        }
                
                    },
                    legend: {
                        enabled: false
                    },
                    plotOptions: {
                        series: {
                            borderWidth: 0,
                            dataLabels: {
                                enabled: true,
                                format: '{point.y:1f}'
                            }
                        }
                    },
                
                    tooltip: {
                        headerFormat: '<b><span style="font-size:13px">{series.name}</span></b><br>',
                        //Muestra Ciudad-Pasajes vendidos y Monto
                        pointFormat: '<span style="color:{point.color}">{point.name}</span>:{point.y:2f} pasajes<br/><b>Monto total:</b> S/. {point.monto_total:2f} <br/>'
                    },
                
                    series: [
                        {
                            name: "",
                            colorByPoint: true,
                            data: <?php echo $data?>
                        }
                    ],
                });
            </script>

        </div>
        <div> <br></div>
    @else
        <div class="text-center">
            <h3>No hay pasajes vendidos por ciudad</h3>
        </div>
    @endif

    <div id="graf">
        <script>
                
                //2do Gráfico
                Highcharts.chart('graf', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'PASAJES CANCELADOS/CIUDAD'
                    },
                    subtitle: {
                        text: ''
                    },
                    accessibility: {
                        announceNewData: {
                            enabled: true
                        }
                    },
                    xAxis: {
                        type: 'category'
                    },
                    yAxis: {
                        title: {
                            text: '# Pasajes'
                        }
                
                    },
                    legend: {
                        enabled: false
                    },
                    plotOptions: {
                        series: {
                            borderWidth: 0,
                            dataLabels: {
                                enabled: true,
                                format: '{point.y:1f}'
                            }
                        }
                    },
                
                    tooltip: {
                        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:2f}</b> pasajes<br/>'
                    },
                
                    series: [
                        {
                            name: "Browsers",
                            colorByPoint: true,
                            data: <?php echo $dato?>
                        }
                    ],
                });
            </script>            
    </div>
    
</div>

@endsection

