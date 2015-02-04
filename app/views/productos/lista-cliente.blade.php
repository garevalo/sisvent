@extends('layouts.master')

@section('css')
    @parent
        
 
@stop

@section('title')
   Lista de Productos
@stop


@section('content')
    <div class="row">
      <div class="col-md-12">
        <div class="row">
            <div class="col-md-4 text-left">
              <button class="btn btn-success btn-block">Cotización</button>      
            </div>
          
        </div>
        
      </div>
      
    </div>
    <br>
    <div class="row well">

    @foreach($productos as $producto)
           
        <div class="col-md-3">
        <div class="thumbnail">
          <img src="{{ asset('img/foto_producto').'/'.$producto->img_producto;}}" data-holder-rendered="true" style="height: 200px; width: 100%; display: block;">
          <div class="caption">
            <h3>{{$producto->nombre_producto;}}</h3>
            <p>{{$producto->descripcion_producto;}}</p>
            <p><a href="#" class="btn btn-primary" role="button">Ver Detalle</a> <a href="#" class="btn btn-default" role="button">Seleccionar</a></p>
          </div>
        </div>
      </div>
    @endforeach 
     <div class="col-md-12">
        <div class="row">
            
              <center><?php echo $productos->links(); ?>     </center>
              
            
          
        </div>
        
      </div>
    </div>
    
   

@stop


@section('js')
	@parent

@stop
