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
                                            <div class="form-group has-success has-feedback">
                                                <div class="col-lg-2 col-sm-3 col-md-3 col-xs-12">
                                                    <label id="producto">Código Cotización:</label>
                                                    <input type="text" name="codigo" id="codigo" class="form-control " value="{{$cotizacion[0]->idcotizacion}}" disabled="" style="font-size: 20px; color: red;">
                                                   @if($errors->has('producto'))
                                                   <small class="text-danger">* <?php echo $errors->first('producto') ?></small>
                                                   @endif
                                                </div>
                                                
                                                <div class="col-lg-2 col-sm-3 col-md-3 col-xs-12">
                                                    <label id="producto">Número Orden:</label>
                                                    <input type="hidden" name="idcliente" id="idcliente" value="{{$cotizacion[0]->idclientes}}">
                                                    <input type="text" name="codigo" id="codigo" class="form-control " value="{{$idorden}}" disabled="">
                                                   @if($errors->has('producto'))
                                                   <small class="text-danger">* <?php echo $errors->first('producto') ?></small>
                                                   @endif
                                                </div>
                                                
                                                <div class="col-lg-2 col-sm-3 col-md-3 col-xs-12">
                                                    <label id="descripcion">Ruc:</label>
                                                    <input type="text" class="form-control" name="ruc" id="ruc" value="{{$cotizacion[0]->ruc}}" disabled="">
                                                    @if($errors->has('descripcion'))
                                                   <small class="text-danger">* <?php echo $errors->first('descripcion') ?></small>
                                                   @endif
                                                </div>
                                                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                                                    <label  id="precio">Nombre:</label>
                                                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{$cotizacion[0]->nombre_cliente}}" disabled="">
                                                    @if($errors->has('precio'))
                                                   <small class="text-danger">* <?php echo $errors->first('precio') ?></small>
                                                   @endif
                                                </div>
                                                
                                             </div>
                                         </div>
                                         <div class="row">
                                            <div class="form-group has-success has-feedback">
                                                
                                                <div class="col-lg-2 col-sm-3 col-md-3 col-xs-12">
                                                    <label  id="precio">Contacto A:</label>
                                                    <input type="text" name="contacto" id="contacto" class="form-control" value="{{$cotizacion[0]->contacto}}" disabled="">
                                                    @if($errors->has('precio'))
                                                   <small class="text-danger">* <?php echo $errors->first('precio') ?></small>
                                                   @endif
                                                </div>
                                                <div class="col-lg-4 col-sm-4 col-md-3 col-xs-12">
                                                    <label  id="precio">Dirección:</label>
                                                    <input type="text" name="direccion" id="direccion" class="form-control" value="{{$cotizacion[0]->direccion_cliente}}" disabled="">
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
                                            <div class="form-group has-success has-feedback">
                                                 <div class="col-lg-2 col-sm-3 col-md-3 col-xs-12">
                                                    <label  id="precio">Teléfono:</label>
                                                    <input type="text" name="telefono" id="telefono" class="form-control" value="{{$cotizacion[0]->telefono_cliente}}" disabled="">
                                                    @if($errors->has('precio'))
                                                    <small class="text-danger">* <?php echo $errors->first('precio') ?></small>
                                                    @endif

                                                </div>
                                                <div class="col-lg-2 col-sm-4 col-md-4 col-xs-12">
                                                    <label  id="precio">Tipo de Pago:</label>
                                                    <select name="pago" id="pago" class="form-control" disabled="">
                                                        <?php if($cotizacion[0]->tipo_pago==1){$tp='Crédito';} else{$tp='Contado';}?>
                                                        <option value="{{$cotizacion[0]->tipo_pago}}">{{$tp}}</option>
                                                        

                                                    </select>
                                                    @if($errors->has('precio'))
                                                    <small class="text-danger">* <?php echo $errors->first('precio') ?></small>
                                                    @endif

                                                </div>
                                                <div class="col-lg-3 col-sm-3 col-md-4 col-xs-12">
                                                    <label  id="precio">Dirección de Despacho:</label>
                                                    <input type="text" name="dirdespacho" id="dirdespacho" class="form-control" value="{{$cotizacion[0]->direccion_despacho}}" disabled="">
                                                    @if($errors->has('precio'))
                                                   <small class="text-danger">* <?php echo $errors->first('precio') ?></small>
                                                   @endif
                                                </div>
                                                <div class="col-lg-3 col-sm-3 col-md-4 col-xs-12">
                                                    <label  id="precio">Motivo no despacho:</label>
                                                    <input type="text" name="motivo" id="motivo" class="form-control">
                                                    @if($errors->has('precio'))
                                                   <small class="text-danger">* <?php echo $errors->first('precio') ?></small>
                                                   @endif
                                                </div>

                                            </div>

                                        </div>


                                <hr>
                                <div class="row">
                                   <div class="col-lg-10 col-sm-12 col-md-10 col-xs-12 ">
                                       <div style="height:200px;" class="well"> 
                                        <table  class="table table-condensed table-striped table-bordered table-responsive">
                                             <thead>
                                                 <th>Id</th>
                                                 <th>Producto</th>
                                                 <th>Precio</th>
                                                 <th>Cantidad Solicitada</th>
                                                 <th>Stock</th>
                                                 <th>Precio Total</th>
                                                 <th>Solicitar</th>

                                             </thead>
                                             <tbody id="table-body" >
                                                 @foreach($cotizacion as $key=>$value)
                                                 <tr>
                                                     <td>{{$key+1}}</td>
                                                     <td>{{$value->nombre_producto}}</td>
                                                     <td>{{$value->precio_producto}}</td>
                                                     <td><span></span>{{$value->cantidad}}</td>
                                                     <td>{{$value->stock}}</td>
                                                     <td>{{$value->precio}}</td>
                                                     <td width="5%">
                                                     <?php $contaNoStock=""; if($value->cantidad > $value->stock){ $contaNoStock++; $disable="";} else{$disable="disabled=''";}?>
                                                         <button type="button" onclick="solicitar_productos({{$cotizacion[0]->idclientes}});" class="btn btn-success btn-sm" {{$disable}}><i class="glyphicon glyphicon-share"></i></button>
                                                     </td>
                                                 </tr>
                                                 
                                                 @endforeach
                                             </tbody>
                                         </table>
                                       </div>
                                   </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-2 col-sm-3 col-md-2 col-xs-12">
                                       <div class="form-group has-warning">
                                           <div class="row">
                                               <div class="col-md-12">
                                                   @if($cotizacion[0]->acreditacion==1)
                                                    <div class="alert alert-warning">Cliente No Acreditado</div>
                                                   @elseif($cotizacion[0]->acreditacion==2)
                                                    <div class="alert alert-info">En proceso de Acreditación</div>
                                                   @elseif($cotizacion[0]->acreditacion==3)
                                                    <div class="alert alert-success">Cliente Acreditado</div>
                                                   @endif
                                               </div>
                                               
                                           </div> 
                                           
                                            <div class="row">
                                                <?php if($cotizacion[0]->acreditacion==1){$btndisabled="";}
                                                      elseif($cotizacion[0]->acreditacion==2){$btndisabled="disabled=''";}
                                                      elseif($cotizacion[0]->acreditacion==3){$btndisabled="disabled=''";}
                                                ?>
                                                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                                    
                                                    <button type="button" class="btn btn-success btn-sm btn-block shiny " {{$btndisabled}} onclick="form_modal_acreditacion('Registrar Acreditación','{{url("ordencompra/modal")}}')">
                                                        <i class="glyphicon glyphicon-road"></i> Acreditación</button>
                                                </div>

                                            </div>
                                       </div>
                                      
                                    </div>
                                    <div class="col-lg-2 col-sm-4 col-md-4 col-xs-12 ">

                                        <div class="form-group has-success has-feedback">
                                                                                        
                                            <div class="row">
                                                <label class="col-md-6">Precio Bruto:</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="preciobruto" name="preciobruto" class="input-sm form-control" value="{{$cotizacion[0]->precio_neto}}" disabled="">
                                                </div>

                                            </div>

                                        </div>


                                        <div class="form-group has-success has-feedback">
                                                <div class="row">
                                                <label class="col-md-6">IGV:</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="igv" name="igv" class="input-sm form-control" value="{{$cotizacion[0]->igv}}" disabled="">
                                                </div>

                                            </div>

                                        </div>


                                        <div class="form-group has-success has-feedback">
                                            <div class="row">
                                            <label class="col-md-6">Precio Neto:</label>
                                            <div class="col-md-6">
                                                <input type="text" id="precioneto" name="precioneto" class="input-sm form-control" value="{{$cotizacion[0]->preciototal}}" disabled="">
                                            </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-2 col-sm-3 col-md-4 col-xs-12">
                                        
                                        <div class="form-group">
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <button  type="button" class="btn btn-darkorange btn-block" onclick="bootbox.alert('Se guardo correctamente')"><i class="glyphicon glyphicon-save"></i> Guardar</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <?php if($contaNoStock>0 || $cotizacion[0]->acreditacion==1 || $cotizacion[0]->acreditacion==2){$btndespacho="disabled=''";} else{$btndespacho="";} ?>
                                                    <button {{$btndespacho}} type="button" class="btn btn-sky btn-block" onclick="bootbox.alert('Se envio a despacho')"><span class="glyphicon glyphicon-send" ></span> Despacho</button>
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
