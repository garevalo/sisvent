@extends('layouts.master')

@section('css')
    @parent
        {{ HTML::style('js/jquery.datatables/bootstrap-adapter/css/datatables.css')}}
 
@stop

@section('title')
   Nueva Orden De Compra
@stop

@section('content')


               		
    <div class="row well">
        <script type="text/javascript">
            $(function(){
                $("body").on("click",".eliminar",function(){

                     $(this).parents("tr").remove();

                });
                
                
            });
      </script>
       <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="row">
                
                <div class="col-md-2">
                    @if($cotizacion[0]->acreditacion==1)
                     <div class="alert alert-danger">Cliente No Acreditado <span class="fa fa-times"></span></div>
                    @elseif($cotizacion[0]->acreditacion==2)
                     <div class="alert alert-info">En proceso de Acreditación <span class="fa fa-check"></span></div>
                    @elseif($cotizacion[0]->acreditacion==3)
                     <div class="alert alert-success">Cliente Acreditado <span class="fa fa-check"></span></div>
                    @endif
                    
                </div>
                
            </div>
                <div class="widget">
                    <div class="widget-header bordered-top bordered-palegreen">
                        <span class="widget-caption">Registrar Orden de Compra</span>
                    </div>
                    <div class="widget-body">
                        <div class="collapse in">

                                {{ Form::open(array('url' => 'ordencompra/crear',"id"=>"formordencompra",'class'=>"","role"=>"form", 'method' => 'post'))}}
                                
                                <div class="row">
                                    <div class="col-lg-10 col-sm-10 col-md-10 col-xs-10">
                                        <div class="row">
                                           
                                            <div class="col-lg-12 col-md-12  col-sm-12  col-xs-12">
                                                                                    
                                                <div class="row">
                                                    <div class="form-group has-success has-feedback">
                                                        <div class="col-lg-2 col-sm-3 col-md-3 col-xs-12">
                                                            <label id="producto">Código Cotización:</label>
                                                            <input type="text" name="codigocotizacion" id="codigocotizacion" class="form-control " value="{{$cotizacion[0]->idcotizacion}}" readonly="" style="font-size: 20px; color: red;">
                                                        </div>

                                                        <div class="col-lg-2 col-sm-3 col-md-3 col-xs-12">
                                                            <label id="producto">Número Orden:</label>
                                                            <input type="hidden" name="idcliente" id="idcliente" value="{{$cotizacion[0]->idclientes}}">
                                                            <input type="text" name="codigo" id="codigo" class="form-control " value="{{$cotizacion[0]->idorden_compra}}" disabled="">
                                                        </div>

                                                        <div class="col-lg-2 col-sm-3 col-md-3 col-xs-12">
                                                            <label id="descripcion">Ruc:</label>
                                                            <input type="text" class="form-control" name="ruc" id="ruc" value="{{$cotizacion[0]->ruc}}" disabled="">
                                                        </div>
                                                        <div class="col-lg-2 col-sm-3 col-md-3 col-xs-12">
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
                                                        </div>
                                                        <div class="col-lg-3 col-sm-4 col-md-3 col-xs-12">
                                                            <label  id="precio">Dirección:</label>
                                                            <input type="text" name="direccion" id="direccion" class="form-control" value="{{$cotizacion[0]->direccion_cliente}}" disabled="">
                                                        </div>
                                                        <div class="col-lg-2 col-sm-4 col-md-3 col-xs-12">
                                                            <label  id="precio">Correo:</label>
                                                            <input type="text" name="correo" id="direccion" class="form-control" value="{{$cotizacion[0]->correo}}" disabled="">
                                                        </div>
                                                        <div class="col-lg-2 col-sm-3 col-md-4 col-xs-12 has-info has-feedback">
                                                            <label  id="precio">Distrito:</label>

                                                            <select name="distrito" id="distrito" class="form-control" required="" disabled="">
                                                                <option value="">Seleccione distrito</option>
                                                                @foreach($distritos as $dis)
                                                                <?php if($dis->iddistrito==$cotizacion[0]->iddistrito){$select='selected=""';}else{$select='';} ?>
                                                                <option value="{{$dis->iddistrito}}" {{$select}}>{{$dis->nombre_distrito}}</option>

                                                                @endforeach
                                                            </select>

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
                                                            <input value="" type="text" name="motivo" id="motivo" class="form-control" required="" title="ingrese el motivo por el cual no se realiza el despacho">
                                                            @if($errors->has('precio'))
                                                           <small class="text-danger">* <?php echo $errors->first('precio') ?></small>
                                                           @endif
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-10 col-md-10  col-sm-10  col-xs-10">
                                                <div class="widget">
                                                    <div class="widget-header bg-blue">
                                                        <i class="widget-icon fa fa-arrow-left"></i>
                                                        <span class="widget-caption">Productos Agregados a la Cotización</span>

                                                    </div><!--Widget Header-->
                                                    <div class="widget-body">
                                                        <table  class="table table-condensed table-striped table-bordered table-responsive">
                                                            <thead>
                                                                <th>Id</th>
                                                                <th>Producto</th>
                                                                <th>Precio</th>
                                                                <th width="15%">Cantidad Solicitada</th>
                                                                <th>Stock</th>
                                                                <th>Precio Total</th>
                                                                <th>Solicitar</th>

                                                            </thead>
                                                            <tbody id="table-body">
                                                                <?php $contaNoStock="";?>
                                                                @foreach($cotizacion as $key=>$value)
                                                                <tr>
                                                                    <td>{{$key+1}}</td>
                                                                    <td>{{$value->nombre_producto}}</td>
                                                                    <td>{{$value->precio_producto}}</td>
                                                                    <td><span></span>{{$value->cantidad}}</td>
                                                                    <td>{{$value->stock}}</td>
                                                                    <td>{{$value->precio}}</td>
                                                                    <td width="5%">
                                                                    <?php  if($value->cantidad > $value->stock ){ $contaNoStock++; $disable="";} else{$disable="disabled=''";}?>
                                                                    <?php  if($value->pedido==1){$disable="disabled=''";} ?>
                                                                        <button id="solicita-producto" type="button" onclick=solicitar_productos({{$cotizacion[0]->idcotizacion}},{{$value->idproducto}},"<?= url("ordencompra/solicitaproducto")?>") class="btn btn-success btn-sm" {{$disable}}><i class="glyphicon glyphicon-share"></i></button>
                                                                    </td>
                                                                </tr>

                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div><!--Widget Body-->
                                                </div><!--Widget-->
                                            </div>

                                            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12 ">

                                                <div class="form-group has-info has-feedback">

                                                    <div class="row">
                                                        <label class="col-md-6">Pr. Bruto:</label>
                                                        <div class="col-md-6">
                                                            <input type="text" id="preciobruto" name="preciobruto" class="input-sm" size="5" value="{{$cotizacion[0]->precio_neto}}" disabled="" >
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="form-group has-info has-feedback">
                                                    <div class="row">
                                                        <label class="col-md-6">IGV:</label>
                                                        <div class="col-md-6">
                                                            <input type="text" id="igv" name="igv" class="input-sm" size="5" value="{{$cotizacion[0]->igv}}" disabled="">
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="form-group has-info has-feedback">
                                                    <div class="row">
                                                    <label class="col-md-6">Precio Neto:</label>
                                                    <div class="col-md-6">
                                                        <input type="text" id="precioneto" name="precioneto" class="input-sm" size="5" value="{{$cotizacion[0]->preciototal}}" disabled="">
                                                    </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-2 col-sm-12 col-md-2 col-xs-12">
                                       
                                        <div class="well">
                                           <div class="form-group">
                                                <div class="row">
                                                    <?php if($cotizacion[0]->acreditacion==1){$btndisabled="";}
                                                          elseif($cotizacion[0]->acreditacion==2){$btndisabled="disabled=''";}
                                                          elseif($cotizacion[0]->acreditacion==3){$btndisabled="disabled=''";}
                                                    ?>
                                                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">

                                                        <button type="button" class="btn btn-sm btn-primary btn-block " {{$btndisabled}} onclick="form_modal_acreditacion('Registrar Acreditación','{{url("ordencompra/modal")}}')">
                                                            <i class="glyphicon glyphicon-bell"></i> Acreditación</button>
                                                    </div>

                                                </div>
                                           </div>
                                           <div class="form-group">
                                                <div class="row">
                                                     <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">

                                                         <button type="button" class="btn btn-primary btn-sm btn-block shiny "  onclick="form_modal_rutas('Rutas','{{url("ordencompra/modalruta")}}')">
                                                         <i class="glyphicon glyphicon-road"></i> Ver Rutas</button>
                                                     </div>

                                                 </div>
                                           </div>
                                           
                                           <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <button  type="submit" class="btn btn-danger btn-block btn-sm shiny" onclick="registrar_ajax('formordencompra', 0)"><i class="glyphicon glyphicon-save"></i> Guardar</button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <?php if($contaNoStock>0 || $cotizacion[0]->acreditacion==1 || $cotizacion[0]->acreditacion==2){$btndespacho="disabled=''";} else{$btndespacho="";} ?>
                                                    <button {{$btndespacho}} type="button" class="btn btn-block btn-sm btn-sky" onclick="bootbox.alert('Se envio a despacho')"><span class="glyphicon glyphicon-send" ></span> Despacho</button> 
                                                </div>
     
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
