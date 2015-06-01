@extends('layouts.master')

@section('css')
    @parent
    {{ HTML::style('js/jquery.ui/jquery-ui.css')}}    
@stop

@section('title')
   Reportes de Ordenes de Compra por día
@stop



@section('content')
   
        
                    
    <div class="row well">
        

       <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="widget">
                    <div class="widget-header bordered-top bordered-palegreen">
                        <span class="widget-caption">Reportes de Ordenes de Compra No Despachadas por día</span>
                    </div>
                    <div class="widget-body">
                        <div class="collapse in">
                            
                            <div class="form-group ">
                                {{ Form::open(array('url' => 'reportes/ajaxreportendxdia',"id"=>"form",'class'=>"form-inline",'role'=>'form','method' => 'post'))}}    
                                                <div class="form-group">
                                                    <label>Generar Reporte por día :</label>
                                                    <input type="text" class="form-control date" id="fecha" name="fecha" placeholder="Fecha" required="">
                                                </div>
                                                <button type="submit" class="btn btn-blue" onclick="generar_reporte('form','reporte')">Ver</button>
                                {{ Form::close() }}
                        

                            </div>
                             
                        </div>


                    </div>
                                      
                    </div>
        </div>

        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">

        	<div class="widget">
                                        <div class="widget-header bordered-left bordered-blueberry">
                                            <span class="widget-caption">Reporte</span>
                                        </div><!--Widget Header-->
                                        <div class="widget-body bordered-left bordered-blue">
                                            <div class="" id="reporte" style="height:700px;"> </div> 
                                        </div><!--Widget Body-->
            </div>

        </div>



    
      
    </div>


@stop


@section('js')
    @parent

        {{ HTML::script('js/funciones.js')  }}
        {{ HTML::script('js/reportes.js')  }}
        
@stop

