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
        

       <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="widget">
                    <div class="widget-header bordered-top bordered-palegreen">
                        <span class="widget-caption">Nivel de Cumplimiento de Despacho</span>
                    </div>
                    <div class="widget-body">
                        <div class="collapse in">
                            
                            <div class="form-group ">
                                {{ Form::open(array('url' => 'reportes/reportenivelcumplimientoajax',"id"=>"form",'class'=>"form-inline",'role'=>'form','method' => 'post'))}}    
                                                <div class="row">
                                                <div class="form-group">
                                                    <label>Desde :</label>
                                                    <input type="text" class="form-control" id="desde" name="desde" placeholder="Fecha Inicio" required="">
                                                </div>
                                                </div>
                                                <div class="row">
                                                <div class="form-group">
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
        
        
@stop
