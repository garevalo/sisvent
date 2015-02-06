
@if(isset($confirm))
<script type="text/javascript">
    
    $(function(){

        $( window ).load(function() {
          $('#modal-success').modal('show');
        });
        
    });


</script>
<div id="modal-success" class="modal modal-message modal-success" style="" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <i class="glyphicon glyphicon-check"></i>
                </div>
                <div class="modal-title">Success</div>

                <div class="modal-body">You have done great!</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
                </div>
            </div> <!-- / .modal-content -->
        </div> <!-- / .modal-dialog -->
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
               		
    <div class="row well">
        
       <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <div class="widget">
                                        <div class="widget-header bordered-top bordered-palegreen">
                                            <span class="widget-caption">Registrar Nueva Cotizacion</span>
                                        </div>
                                        <div class="widget-body">
                                            <div class="collapse in">
                                                


                                                    {{ Form::open(array('url' => 'productos/crear','class'=>"","role"=>"form",'files' => true, 'method' => 'post'))}}
                                                            <div class="row">
                                                                <div class="form-group has-info has-feedback">
                                                                    <div class="col-lg-2 col-sm-3 col-md-3 col-xs-12">
                                                                        <label id="producto">Código:</label>
                                                                        <input type="text" name="producto" id="producto" class="form-control ">
                                                                       @if($errors->has('producto'))
                                                                       <small class="text-danger">* <?php echo $errors->first('producto') ?></small>
                                                                       @endif
                                                                    </div>
                                                                    <div class="col-lg-2 col-sm-3 col-md-3 col-xs-12">
                                                                        <label id="descripcion">Ruc:</label>
                                                                        <input type="text" class="form-control" name="descripcion" id="descripcion" >
                                                                        @if($errors->has('descripcion'))
                                                                       <small class="text-danger">* <?php echo $errors->first('descripcion') ?></small>
                                                                       @endif
                                                                    </div>

                                                                 </div>
                                                             </div>
                                                             <div class="row">
                                                                <div class="form-group has-info has-feedback">
                                                                    <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
                                                                        <label  id="precio">Nombre:</label>
                                                                        <input type="text" name="precio" id="precio" class="form-control">
                                                                        @if($errors->has('precio'))
                                                                       <small class="text-danger">* <?php echo $errors->first('precio') ?></small>
                                                                       @endif
                                                                    </div>
                                                                    <div class="col-lg-4 col-sm-5 col-md-5 col-xs-12">
                                                                        <label  id="precio">Dirección:</label>
                                                                        <input type="text" name="precio" id="precio" class="form-control">
                                                                        @if($errors->has('precio'))
                                                                        <small class="text-danger">* <?php echo $errors->first('precio') ?></small>
                                                                        @endif

                                                                    </div>

                                                                   

                                                                </div>

                                                             </div>
                                                            
                                                            <div class="row">
                                                                <div class="form-group has-info has-feedback">
                                                                     <div class="col-lg-2 col-sm-3 col-md-3 col-xs-12">
                                                                        <label  id="precio">Teléfono:</label>
                                                                        <input type="text" name="precio" id="precio" class="form-control">
                                                                        @if($errors->has('precio'))
                                                                        <small class="text-danger">* <?php echo $errors->first('precio') ?></small>
                                                                        @endif

                                                                    </div>

                                                                    <div class="col-lg-4 col-sm-5 col-md-5 col-xs-12">
                                                                        <label  id="precio">Dirección de Despacho:</label>
                                                                        <input type="text" name="precio" id="precio" class="form-control">
                                                                        @if($errors->has('precio'))
                                                                       <small class="text-danger">* <?php echo $errors->first('precio') ?></small>
                                                                       @endif
                                                                    </div>
    
                                                                </div>

                                                            </div>
                                                            
                                                            <br>
                                                            <div class="row">
                                                                <div class="col-lg-2 col-sm-4 col-md-3 col-xs-12">

                                                                    <input type="submit" value="Buscar" class="btn btn-success btn-block">    
                                                                </div>
                                                                
                                                            </div>

                                                    {{ Form::close() }}

                                                    <hr>
                                                    <table class="table table-condensed table-striped table-bordered">
                                                        <thead>
                                                            <th>Id</th>
                                                            <th>Producto</th>
                                                            <th>Precio</th>
                                                            <th>Foto</th>
                                                            <th>Editar</th>
                                                            <th>Eliminar</th>

                                                        </thead>
                                                        <tbody>
                                                            @foreach($productos as $key=> $producto)
                                                            <tr>
                                                                <td>{{$key +1 }}</td>
                                                                <td>{{$producto->nombre_producto}}</td>
                                                                <td>{{$producto->precio_producto}}</td>
                                                                <td><img src="{{ asset('img/foto_producto').'/'.$producto->img_producto;}}" width="50" heigth="50"> </td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>

                                            </div>

                                        </div>
                                        
                    </div>
        </div>

      
    </div>


@stop


@section('js')
	@parent

@stop
