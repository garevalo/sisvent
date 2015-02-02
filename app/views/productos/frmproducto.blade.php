@extends('layouts.master')

@section('css')
    @parent
        
 
@stop

@section('title')
   Registrar Producto
@stop


@section('content')
               		
    <div class="row">

    	<div class="col-md-12 well">
    		{{ Form::open(array('url' => 'login','class'=>"m-t","role"=>"form"))}}
    		<div class="row">

    			<label class="col-md-1" id="producto">Nombre Producto:</label>
    			<div class="col-md-2">
    				<input type="text" name="producto" id="producto" class="input-sm form-group">
    			</div>

    		</div>
    		<div class="row">

    			<label class="col-md-1" id="producto">Nombre Producto:</label>
    			<div class="col-md-2">
    				<input type="text" name="producto" id="producto" class="input-sm form-group">
    			</div>

    		</div>

 			{{ Form::close() }}
    	</div>

      
    </div>



@stop


@section('js')
	@parent

@stop
