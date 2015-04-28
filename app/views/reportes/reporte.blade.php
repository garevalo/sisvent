@extends('layouts.master')

@section('css')
    @parent
    {{ HTML::style('js/jquery.ui/jquery-ui.css')}}    
@stop

@section('title')
   Reporte Ordenes Despachadas vs Ordenes No Despachadas
@stop



@section('content')
   
        
                    
    <div class="row well">
        

       <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <div class="widget">
                    <div class="widget-header bordered-top bordered-palegreen">
                        <span class="widget-caption">Ordenes Despachadas vs No Despachadas</span>
                    </div>
                    <div class="widget-body">
                        <div class="collapse in">
                            
                            <div class="form-group">
                                {{ Form::open(array('url' => 'reportes/ajaxreporte1',"id"=>"form",'class'=>"form-inline",'role'=>'form','method' => 'post'))}}    
                                                <div class="form-group">
                                                    <label>Generar Reporte por día :</label>
                                                    <input type="text" class="form-control date" id="fecha" name="fecha" placeholder="Fecha" required="">
                                                </div>
                                                <button type="submit" class="btn btn-blue" onclick="generar_reporte('form','reporte')">Ver</button>
                                {{ Form::close() }}
                        

                            </div>
                            
                            
                            <hr>
                            <div class="row" id="reporte">
                                
                            </div>
    
                        </div>


                    </div>
                                        
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
        
@stop
