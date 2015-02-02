@extends('layouts.master')

@section('css')
    @parent

        {{ HTML::style('css/plugins/morris/morris-0.4.3.min.css') }}
        {{ HTML::style('js/plugins/gritter/jquery.gritter.css') }}
        
 
@stop

@section('title')
   Crear Usuarios
@stop


@section('content')

    <div class=row>
    	<div class="col-lg-12">
    		<div class="ibox float-e-margins">
                 <div class="ibox-title">
                    <h5>Crear Usuarios </h5> || {{ HTML::link('usuarios', 'volver'); }}
                 </div>

                 <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">
                 		
                 			{{ Form::open(array('url' => 'usuarios/crear')) }}
    				            {{Form::label('nombre', 'Nombre')}}
    				            {{Form::text('nombre', '',$atributos=array("class"=>"form-control input-sm"))}}
    				            {{Form::label('apellido', 'Apellido')}}
    				            {{Form::text('apellido', '',$atributos=array("class"=>"form-control input-sm"))}}
    				            {{Form::submit('Guardar',$atributos=array("class"=>"btn btn-primary btn-small"))}}
    				        {{ Form::close() }}

                        </div>
                    </div>
                 </div>	
       	
            </div>        
    		
    	</div>
    </div>
@stop


@section('js')
	@parent

@stop
