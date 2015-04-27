@extends('layouts.master')

@section('css')
    @parent
        
@stop

@section('title')
   Lista de Cotizaciones
@stop



@section('content')
    <style type="text/css">
${demo.css}
        </style>
        <script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: 'Browser market shares at a specific website, 2014'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            data: [
                ['Firefox',   45.0],
                ['IE',       26.8],
                {
                    name: 'Chrome',
                    y: 12.8,
                    sliced: true,
                    selected: true
                },
                ['Safari',    8.5],
                ['Opera',     6.2],
                ['Others',   0.7]
            ]
        }]
    });
});
        </script>
                    
    <div class="row well">
        

       <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <div class="widget">
                    <div class="widget-header bordered-top bordered-palegreen">
                        <span class="widget-caption">Ordenes Despachadas vs No Despachadas</span>
                    </div>
                    <div class="widget-body">
                        <div class="collapse in">
                          
                                <div id="container" style="height: 400px"></div>


                        </div>


                    </div>
                                        
                    </div>
        </div>

      
    </div>


@stop


@section('js')
    @parent
        {{ HTML::script('js/funciones.js')  }}
        {{ HTML::script('js/charts/highcharts/js/highcharts.js')  }}
        {{ HTML::script('js/charts/highcharts/js/highcharts-3d.js')  }}
        {{ HTML::script('js/charts/highcharts/js/exporting.js')  }}  
@stop
