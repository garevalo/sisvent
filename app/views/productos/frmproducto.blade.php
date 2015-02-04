@if (Session::has('confirm'))

            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <i class="glyphicon glyphicon-check"></i>
                </div>
                <div class="modal-title">Success</div>

                <div class="modal-body">{{Session::has('confirm')}}</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
                </div>
            </div> <!-- / .modal-content -->
        </div>

              
@endif



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
    		{{ Form::open(array('url' => 'productos/crear','class'=>"","role"=>"form",'files' => true, 'method' => 'post'))}}
    		<div class="row form-group">

    			<label class="col-md-1" id="producto">Nombre Producto:</label>
    			<div class="col-md-2">
    				<input type="text" name="producto" id="producto" class="input-sm form-control ">
    			</div>

    		</div>
    		<div class="row form-group">

    			<label class="col-md-1" id="descripcion">Descripción:</label>
    			<div class="col-md-2">
    				<textarea class="input-sm form-control " name="descripcion" id="descripcion" ></textarea>
    				
    			</div>

    		</div>
    		<div class="row form-group">

    			<label class="col-md-1" id="precio">Precio:</label>
    			<div class="col-md-1">
    				<input type="text" name="precio" id="precio" class="input-sm form-control ">
    			</div>

    		</div>

    		<div class="row form-group">

    			<label class="col-md-1" id="precio">Imagen:</label>
    			<div class="col-md-2">
    				<input type="file" name="imagen" id="imagen" class="input-sm form-control ">
    			</div>

    		</div>

    		<div class="row form-group col-md-3">
    			<input type="submit" value="Guardar" class="btn btn-primary btn-block">
    		</div>

 			{{ Form::close() }}
                        
             @if($errors->has())
                <div class="bg-danger">           
                    <!--recorremos los errores en un loop y los mostramos-->
                    @foreach ($errors->all('<p>:message</p>') as $message)
                        {{ $message }}
                    @endforeach

                </div>
            @endif
    	</div>
        
       
      
    </div>



@stop


@section('js')
	@parent

@stop
