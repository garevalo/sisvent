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
               		
    <div class="row well">
        
       <div class="col-lg-4 col-sm-5 col-md-6 col-xs-12">
                <div class="widget">
                                        <div class="widget-header bordered-top bordered-palegreen">
                                            <span class="widget-caption">Registro de Nuevos Productos</span>
                                        </div>
                                        <div class="widget-body">
                                            <div class="collapse in">
                                                


                                                    {{ Form::open(array('url' => 'productos/crear','class'=>"","role"=>"form",'files' => true, 'method' => 'post'))}}
                                                            <div class="form-group">

                                                                <label id="producto">Nombre Producto:</label>
                                                                <input type="text" name="producto" id="producto" class="form-control input-sm">
                                                               @if($errors->has('producto'))
                                                               <small class="text-danger">* <?php echo $errors->first('producto') ?></small>
                                                               @endif

                                                            </div>
                                                            <div class="form-group">

                                                                <label id="descripcion">Descripción:</label>
                                                                <textarea class="form-control input-sm" name="descripcion" id="descripcion" ></textarea>
                                                                @if($errors->has('descripcion'))
                                                               <small class="text-danger">* <?php echo $errors->first('descripcion') ?></small>
                                                               @endif

                                                            </div>
                                                            <div class="form-group">

                                                                <label  id="precio">Precio:</label>
                                                                <input type="text" name="precio" id="precio" class="form-control input-sm">
                                                                @if($errors->has('precio'))
                                                               <small class="text-danger">* <?php echo $errors->first('precio') ?></small>
                                                               @endif

                                                            </div>

                                                            <div class="form-group">

                                                                <label id="precio">Imagen:</label>
                                                                <input type="file" name="imagen" id="imagen" class="form-control input-sm">
                                                                @if($errors->has('imagen'))
                                                                <small class="text-danger">* <?php echo $errors->first('imagen') ?></small>
                                                                @endif

                                                            </div>

                                                            <div class="form-group">
                                                                <input type="submit" value="Guardar" class="btn btn-primary">
                                                            </div>

                                                    {{ Form::close() }}



                                            </div>
                                        </div>
                                        
                    </div>
        </div>

        <div class="col-lg-8 col-sm-7 col-md-6 col-xs-12">
                <div class="widget">
                        <div class="widget-header bordered-top bordered-palegreen">
                            <span class="widget-caption">Lista de Productos Registrados</span>
                        </div>
                        <div class="widget-body">
                            <div class="collapse in">
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
                            
                            <br>
                            <div class=""><?php echo $productos->links(); ?> </div> 
                        </div>
                </div>
        </div>


      
    </div>



@stop


@section('js')
	@parent

@stop
