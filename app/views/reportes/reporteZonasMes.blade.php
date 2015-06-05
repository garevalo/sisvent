@extends('layouts.master')

@section('css')
    @parent
    {{ HTML::style('js/jquery.ui/jquery-ui.css')}}    
@stop

@section('title')
   Reportes de Zonas Despachadas Por Mes
@stop



@section('content')
   
        
                    
    <div class="row well">
        

       <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="widget">
                    <div class="widget-header bordered-top bordered-palegreen">
                        <span class="widget-caption">Reportes de Zonas Despachadas Por Mes</span>
                    </div>
                    <div class="widget-body">
                        <div class="collapse in">
                            
                            <div class="form-group ">
                                {{ Form::open(array('url' => 'reportes/reportezonasmesajax',"id"=>"form",'class'=>"form-inline",'role'=>'form','method' => 'post'))}}    
                                                <div class="form-group">
                                                    <label  >Seleccione Año :</label>
                                                    <select class="form-control" name="anio">
                                                    	<option value="0">Año</option>
                                                    	
                                                    	<?php for($x=2015; $x>=2000; $x--) { ?>
                                                    	<option value="<?= $x?>"><?= $x?></option>
                                                    	<?php } ?>

                                                    </select>
                                                                                                   </div>
                                                <button type="submit" class="btn btn-blue" onclick="generar_reporte('form','reporte')">Ver</button>
                                {{ Form::close() }}
                        

                            </div>
                             
                        </div>


                    </div>
                                      
                    </div>
        </div>

        <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">

        	<div class="widget">
                                        <div class="widget-header bordered-left bordered-blueberry">
                                            <span class="widget-caption">Reporte</span>
                                        </div><!--Widget Header-->
                                        <div class="widget-body bordered-left bordered-blue">
                                            <div class="" id="reporte"> </div> 
                                        </div><!--Widget Body-->
            </div>

        </div>



    
      
    </div>


@stop


@section('js')
    @parent

        {{ HTML::script('js/funciones.js')  }}
        {{ HTML::script('js/reportes.js')  }}
        {{ HTML::script('js/charts/highcharts/js/highcharts.js')  }}
        {{ HTML::script('js/charts/highcharts/js/highcharts-3d.js')  }}
        {{ HTML::script('js/charts/highcharts/js/modules/exporting.js')  }}
        
@stop
