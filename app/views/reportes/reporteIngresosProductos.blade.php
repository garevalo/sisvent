@extends('layouts.master')

@section('css')
    @parent
    {{ HTML::style('js/jquery.ui/jquery-ui.css')}}    
@stop

@section('title')
   Reporte Ingresos de Productos
@stop



@section('content')
    <div class="row well">
        

       <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="widget">
                    <div class="widget-header bordered-top bordered-palegreen">
                        <span class="widget-caption">Reporte Ingresos de Productos</span>

                    </div>
                    <div class="widget-body">
                        <div class="collapse in">
                            
                            <div class="form-group ">
                                {{ Form::open(array('url' => 'reportes/reportemotivonodespachoajax',"id"=>"form",'class'=>"form-horizontal",'role'=>'form','method' => 'post'))}}    
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>Desde :</label>
                                        <input type="text" class="form-control" id="desde" name="desde" placeholder="Fecha Inicio" required="">
                                    </div>
                                    <div class="col-md-12">
                                        <label>Hasta :</label>
                                        <input type="text" class="form-control" id="hasta" name="hasta" placeholder="Fecha Fin" required="">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" onclick="generar_reporte('form','reporte')"><span class="fa fa-file-text"></span>Ver Reporte</button>
                                {{ Form::close() }}
                        

                            </div>
                             
                        </div>


                    </div>
                                      
                    </div>
        </div>

        <div class="col-lg-9 col-sm-6 col-xs-12">

            <div class="widget">
                <div class="widget-header bordered-left bordered-blueberry">
                    <span class="widget-caption">Reporte</span>
                    <div class="widget-buttons">
                        <a href="#" data-toggle="maximize">
                            <i class="fa fa-expand"></i>
                        </a>
                        <a href="#" data-toggle="collapse">
                            <i class="fa fa-minus"></i>
                        </a>
                        <a href="#" data-toggle="dispose">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div><!--Widget Header-->
                <div class="widget-body bordered-left bordered-blue">
                    <div class="" id="reporte" > </div> 
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