@extends('layouts.master')


@section('title')
   Información de usuario
@stop


@section('css')
    @parent

    	{{ HTML::style('css/plugins/morris/morris-0.4.3.min.css') }}
		{{ HTML::style('js/plugins/gritter/jquery.gritter.css') }}
		
 
@stop

@section('content')

    <div class=row>
    	<div class="col-lg-12">
    		<div class="ibox float-e-margins">
                 <div class="ibox-title">
                    <h5>Información de usuario</h5> || {{ HTML::link('usuarios', 'volver'); }}
                 </div>

                 <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">
                 		
                 			<h1>Usuario {{$usuario->id}}</h1>
							{{ $usuario->usuario .' '.$usuario->password }}
							        
							<br />
							{{ $usuario->created_at}}

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
