@extends('layouts.master')


@section('title')
   Información de usuario
@stop


@section('css')
    @parent

    
		
 
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
                 		
                 			<h1>INICIO</h1>
						

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