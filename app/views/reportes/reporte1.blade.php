@extends('layouts.master')

@section('css')
    @parent
        
@stop

@section('title')
   Lista de Cotizaciones
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
                          
                        </div>


                    </div>
                                        
                    </div>
        </div>

      
    </div>


@stop


@section('js')
    @parent
        {{ HTML::script('js/funciones.js')  }}  
@stop
