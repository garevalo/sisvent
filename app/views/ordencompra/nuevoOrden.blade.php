@extends('layouts.master')

@section('css')
    @parent
        {{ HTML::style('js/jquery.datatables/bootstrap-adapter/css/datatables.css')}}
 
@stop

@section('title')
   Nueva Orden De Compra
@stop



@section('content')

<!--    @if(isset($confirm))
    
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
                </div>  / .modal-content 
            </div>  / .modal-dialog 
    </div>
    @endif-->
               		
    <div class="row well">
        <script type="text/javascript">
            $(function(){
                $("body").on("click",".eliminar",function(){

                     $(this).parents("tr").remove();

                });
                
                
            });



      </script>
       <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <div class="widget">
                    <div class="widget-header bordered-top bordered-palegreen">
                        <span class="widget-caption">Registrar Orden de Compra</span>
                    </div>
                    <div class="widget-body">
                        <div class="collapse in">

                                {{ Form::open(array('url' => 'cotizacion/crear','class'=>"","role"=>"form", 'method' => 'post'))}}
                                        <div class="row">
                                            <div class="form-group has-info has-feedback">
                                                <div class="col-lg-2 col-sm-3 col-md-3 col-xs-12">
                                                    <label id="producto">Código:</label>
                                                    <input type="text" name="codigo" id="codigo" class="form-control ">
                                                   @if($errors->has('producto'))
                                                   <small class="text-danger">* <?php echo $errors->first('producto') ?></small>
                                                   @endif
                                                </div>
                                                <div class="col-lg-2 col-sm-3 col-md-3 col-xs-12">
                                                    <label id="descripcion">Ruc:</label>
                                                    <input type="text" class="form-control" name="ruc" id="ruc" >
                                                    @if($errors->has('descripcion'))
                                                   <small class="text-danger">* <?php echo $errors->first('descripcion') ?></small>
                                                   @endif
                                                </div>
                                                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                                                    <label  id="precio">Nombre:</label>
                                                    <input type="text" name="nombre" id="nombre" class="form-control">
                                                    @if($errors->has('precio'))
                                                   <small class="text-danger">* <?php echo $errors->first('precio') ?></small>
                                                   @endif
                                                </div>
                                                
                                             </div>
                                         </div>
                                         <div class="row">
                                            <div class="form-group has-info has-feedback">
                                                
                                                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                                                    <label  id="precio">Contacto A:</label>
                                                    <input type="text" name="contacto" id="contacto" class="form-control">
                                                    @if($errors->has('precio'))
                                                   <small class="text-danger">* <?php echo $errors->first('precio') ?></small>
                                                   @endif
                                                </div>
                                                <div class="col-lg-4 col-sm-4 col-md-3 col-xs-12">
                                                    <label  id="precio">Dirección:</label>
                                                    <input type="text" name="direccion" id="direccion" class="form-control">
                                                    @if($errors->has('precio'))
                                                    <small class="text-danger">* <?php echo $errors->first('precio') ?></small>
                                                    @endif

                                                </div>
                                                <div class="col-lg-2 col-sm-3 col-md-4 col-xs-12">
                                                    <label  id="precio">Distrito:</label>
                                                    
                                                    <select name="dirdespacho" id="dirdespacho" class="form-control">
                                                        <option>Lima</option>
                                                        <option>Comas</option>
                                                        <option>Miraflores</option>
                                                        <option>Comas</option>
                                                        <option>Los Olivos</option>
                                                    </select>
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
                                                    <input type="text" name="telefono" id="telefono" class="form-control">
                                                    @if($errors->has('precio'))
                                                    <small class="text-danger">* <?php echo $errors->first('precio') ?></small>
                                                    @endif

                                                </div>
                                                <div class="col-lg-2 col-sm-3 col-md-3 col-xs-12">
                                                    <label  id="precio">Tipo de Pago:</label>
                                                    <select name="pago" id="pago" class="form-control">

                                                        <option value="1">Crédito</option>
                                                        <option value="2">Contado</option>

                                                    </select>
                                                    @if($errors->has('precio'))
                                                    <small class="text-danger">* <?php echo $errors->first('precio') ?></small>
                                                    @endif

                                                </div>
                                                <div class="col-lg-4 col-sm-5 col-md-4 col-xs-12">
                                                    <label  id="precio">Dirección de Despacho:</label>
                                                    <input type="text" name="dirdespacho" id="dirdespacho" class="form-control">
                                                    @if($errors->has('precio'))
                                                   <small class="text-danger">* <?php echo $errors->first('precio') ?></small>
                                                   @endif
                                                </div>
                                                

                                            </div>

                                        </div>

                                        <br>
<!--                                        <div class="row">
                                            <div class="col-lg-1 col-sm-4 col-md-3 col-xs-12">

                                                <button type="button" class="btn btn-success btn-xs btn-block" onclick="form_modal('Producto','{{url('productos/modal', $parameters = array(), $secure = null);}}');"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>   Buscar </button>
                                            </div>

                                        </div>-->

                                <hr>
                                <div class="row">
                                   <div class="col-lg-10 col-sm-8 col-md-10 col-xs-8 ">
                                        <table class="table table-condensed table-striped table-bordered table-responsive">
                                            <thead>
                                                <th>Id</th>
                                                <th>Producto</th>
                                                <th>Precio</th>
                                                <th>Cantidad</th>
                                                <th>Precio Total</th>
                                                <th>Eliminar</th>

                                            </thead>
                                            <tbody id="table-body">
                                               
                                            </tbody>
                                        </table>
                                   </div>

                                    <div class="col-lg-2 col-sm-4 col-md-2 col-xs-4">

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-6">Precio Bruto:</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="preciobruto" name="preciobruto" class="input-sm form-control">
                                                </div>

                                            </div>

                                        </div>


                                        <div class="form-group">
                                                <div class="row">
                                                <label class="col-md-6">IGV:</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="igv" name="igv" class="input-sm form-control">
                                                </div>

                                            </div>

                                        </div>


                                        <div class="form-group">
                                            <div class="row">
                                            <label class="col-md-6">Precio Neto:</label>
                                            <div class="col-md-6">
                                                <input type="text" id="precioneto" name="precioneto" class="input-sm form-control">
                                            </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <button  type="submit" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-save"></i> Aceptar</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <button type="buttton" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-print"></span> Imprimir</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                 </div>

                                {{ Form::close() }}
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
        {{ HTML::script('js/funciones.js')  }}  
@stop
