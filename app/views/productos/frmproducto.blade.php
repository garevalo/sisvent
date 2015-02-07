@extends('layouts.master')

@section('css')
    @parent
       {{ HTML::style('js/jquery.datatables/bootstrap-adapter/css/datatables.css')}} 
 
@stop

@section('title')
   Registrar Producto
@stop


@section('content')
    

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

                                                                <label id="categoria">Categoría:</label>
                                                                <select name="categoria" id="categoria" class="form-control input-sm">
                                                                    <option value="">Seleccione Categoría</option>
                                                                    @foreach($categorias as $categoria)
                                                                    <option value="{{$categoria->idcategoria}}">{{$categoria->nombre_categoria}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @if($errors->has('categoria'))
                                                                <small class="text-danger">* <?php echo $errors->first('categoria') ?></small>
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
                                
                               <!--  <table class="table table-condensed table-striped table-bordered" id="example">
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
                                        <tr>
                                            <td>dsc</td>
                                            <td>dscds</td>
                                            <td>ds</td>
                                            <td>sdc</td>
                                            <td>sdc</td>
                                            <td>sdcds</td>
                                        </tr>
                                        <tr>
                                            <td>dsc</td>
                                            <td>dscds</td>
                                            <td>ds</td>
                                            <td>sdc</td>
                                            <td>sdc</td>
                                            <td>sdcds</td>
                                        </tr>
                                    </tbody>
                                </table>-->
                                {{ Datatable::table()
                                ->addColumn('Id','Producto','Precio','Foto')       // these are the column headings to be shown
                                ->setUrl(route('api.productos'))   // this is the route where data will be retrieved
                                ->render() }}
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
        
        
         {{ HTML::script('js/jquery.datatables/jquery.dataTables.js')  }}
         {{ HTML::script('js/jquery.datatables/dataTables.bootstrap.js')  }}
     
@stop
