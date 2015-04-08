@extends('layouts.master')

@section('css')
    @parent
        {{ HTML::style('js/jquery.datatables/bootstrap-adapter/css/datatables.css')}}
 
@stop

@section('title')
   Registrar Ingreso de Productos
@stop

@section('content')

               		
    <div class="row well">

       <div class="col-lg-4 col-sm-5 col-md-4 col-xs-12">
                <div class="widget">
                    <div class="widget-header bordered-top bordered-palegreen">
                        <span class="widget-caption">Registrar Ingreso de Productos</span>
                    </div>
                    <div class="widget-body">
                        <div class="collapse in">
                           
                           {{ Form::open(array('url' => 'almacen/registrar','class'=>"","role"=>"form",'files' => true, 'method' => 'post','id'=>'frm'))}}
                            <div id="campo_idproducto">
                            </div>
                            <div class="form-group" >

                                <label >Nombre Producto:</label>
                                <select class="form-control input-sm" name="producto" id="producto">
                                    <option value="">Seleccione Producto</option>
                                    @foreach($productos as $producto)
                                    <option value="{{$producto->idproducto}}">{{$producto->nombre_producto}}</option>
                                    @endforeach
                                </select>
                               <div id="error-producto">
                               @if($errors->has('producto'))
                               <small class="text-danger">* <?php echo $errors->first('producto') ?></small>
                               @endif
                                </div>
                            </div>
                            <div class="form-group">

                                <label >Cantidad:</label>
                                <input type="text"  name="cantidad" id="cantidad" class="input-sm form-control">
                                <div id="error-descripcion">
                                    @if($errors->has('descripcion'))
                                   <small class="text-danger">* <?php echo $errors->first('descripcion') ?></small>
                                   @endif
                               </div>

                            </div>
                           <button class="btn btn-success" type="submit" name="guardar" id="guardar"><span class="glyphicon glyphicon-save"></span> Guardar </button>
                           {{Form::close()}}
                            
                        </div>
                    </div>
                                        
                    </div>
        </div>
        
        <div class="col-lg-8 col-sm-7 col-md-8 col-xs-12">
                <div class="widget">
                    <div class="widget-header bordered-top bordered-palegreen">
                        <span class="widget-caption">Lista de Productos</span>
                    </div>
                    <div class="widget-body">
                        <div class="collapse in">
                           
                            Ingresar Productos
                            
                        </div>


                    </div>
                                        
                    </div>
        </div>
      
    </div>


@stop


@section('js')
	@parent
        {{ HTML::script('js/jquery.datatables/jquery.dataTables.js')  }}
        {{ HTML::script('js/jquery.datatables/dataTables.bootstrap.js')  }}
        {{ HTML::script('js/almacen.js')  }}  
@stop
