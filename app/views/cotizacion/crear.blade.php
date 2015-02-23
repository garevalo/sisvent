@extends('layouts.master')

@section('css')
    @parent
        {{ HTML::style('js/jquery.datatables/bootstrap-adapter/css/datatables.css')}}
 
@stop

@section('title')
   Registrar Producto
@stop

@section('content')
		
    <div class="row well">
        <script type="text/javascript">
            
            function calcular(cantidad,precio){
       
                var multi = ( parseInt(cantidad) * parseFloat( precio));
                return parseFloat(multi.toFixed(2));
            }

            function calcular_precio_neto(precio_bruto){

                var precioneto,porcentaje;

                porcentaje=(precio_bruto * 0.18).toFixed(2);

                return precioneto=parseFloat(porcentaje)+parseFloat(precio_bruto);

            }   
    
            $(function() {
                
                $("body").on("keyup",".cantidad",function(){
                     var cantidad=$(this).val();
                     var precio  =$(this).parents("tr").find("input[name*='precio']").val();
                     
                     var res= calcular(cantidad,precio);
                     $(this).parents("tr").find("input[name*='preciot']").val(res);
                     

                    importe_total = 0
                    $(".preciot").each(
                        function(index, value) {
                            importe_total = importe_total + eval($(this).val());
                        }
                    ); 
                    
                    //alert(importe_total);           
                    $("#preciobruto").val(importe_total.toFixed(2));

                    precioneto=calcular_precio_neto( $("#preciobruto").val() );
                    $('#precioneto').val(precioneto);
                });
                
            });

            $(function(){
                $("body").on("click",".eliminar",function(){

                     $(this).parents("tr").remove();

                });
                
                
            });

      </script>
      
       <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <div class="widget">
                    <div class="widget-header bordered-top bordered-palegreen">
                        <span class="widget-caption">Registrar Nueva Cotizacion</span>
                    </div>
                    <div class="widget-body">
                        <div class="collapse in">

                                {{ Form::open(array('url' => 'cotizacion/crear','class'=>"","role"=>"form", 'method' => 'post','id'=>'frmcotizacion'))}}
                                        <div class="row">
                                            <div class="form-group has-info has-feedback">
                                                <div class="col-lg-2 col-sm-3 col-md-3 col-xs-12">
                                                    <label id="producto">Código:</label>
                                                    <?php if(isset($idcotizacion)){$id=$idcotizacion;}else{$id="";}?>
                                                    <input type="text" name="codigo" id="codigo" class="form-control " value="{{$id}}" readonly="">
                                                   @if($errors->has('producto'))
                                                   <small class="text-danger">* <?php echo $errors->first('producto') ?></small>
                                                   @endif
                                                </div>
                                                <div class="col-lg-2 col-sm-3 col-md-3 col-xs-12">
                                                    <label id="descripcion">Ruc:</label>
                                                    <input type="text" class="form-control" name="ruc" id="ruc" maxlength="11" required=""> 
                                                    <span id="reloadruc"></span>
                                                    
                                                     
                                                 
                                                </div>
                                                
                                                
                                             </div>
                                         </div>
                                         <div class="row">
                                            <div class="form-group has-info has-feedback">
                                                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                                                    <label  id="precio">Nombre:</label>
                                                    <input type="text" name="nombre" id="nombre" class="form-control" required="">
                                                   
                                                </div>
                                                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                                                    <label  id="precio">Contacto A:</label>
                                                    <input type="text" name="contacto" id="contacto" class="form-control" required="">
                                                    
                                                </div>
                                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                                    <label  id="precio">Dirección:</label>
                                                    <input type="text" name="direccion" id="direccion" class="form-control" required="">
                                                </div>



                                            </div>

                                         </div>

                                        <div class="row">
                                            <div class="form-group has-info has-feedback">
                                                 <div class="col-lg-2 col-sm-3 col-md-3 col-xs-12">
                                                    <label  id="precio">Teléfono:</label>
                                                    <input type="text" name="telefono" id="telefono" class="form-control" required="">
                                                  </div>
                                                <div class="col-lg-2 col-sm-3 col-md-3 col-xs-12">
                                                    <label  id="precio">Tipo de Pago:</label>
                                                    <select name="pago" id="pago" class="form-control" required="">

                                                        <option value="1">Crédito</option>
                                                        <option value="2">Contado</option>

                                                    </select>
                                                </div>
                                                <div class="col-lg-4 col-sm-5 col-md-5 col-xs-12">
                                                    <label  id="precio">Dirección de Despacho:</label>
                                                    <input type="text" name="dirdespacho" id="dirdespacho" class="form-control" required="">
                                                    @if($errors->has('precio'))
                                                   <small class="text-danger">* <?php echo $errors->first('precio') ?></small>
                                                   @endif
                                                </div>

                                            </div>

                                        </div>

                                        <br>
                                        <div class="row">
                                            <div class="col-lg-1 col-sm-4 col-md-3 col-xs-12">

                                                <button type="button" class="btn btn-success btn-xs btn-block" onclick="form_modal('Producto','{{url('productos/modal', $parameters = array(), $secure = null);}}');"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>   Buscar </button>
                                            </div>

                                        </div>

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
                                                    <input type="text" id="preciobruto" name="preciobruto" class="input-sm form-control" readonly="">
                                                </div>

                                            </div>

                                        </div>


                                        <div class="form-group">
                                                <div class="row">
                                                <label class="col-md-6">IGV:</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="igv" name="igv" class="input-sm form-control" value="18" readonly="">
                                                </div>

                                            </div>

                                        </div>


                                        <div class="form-group">
                                            <div class="row">
                                            <label class="col-md-6">Precio Neto:</label>
                                            <div class="col-md-6">
                                                <input type="text" id="precioneto" name="precioneto" class="input-sm form-control" readonly="">
                                            </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <button  type="submit" class="btn btn-primary btn-block" onclick="validar_productos('frmcotizacion',0)"><i class="glyphicon glyphicon-save"></i> Aceptar</button>
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

    <script type="text/javascript">
        function validar_productos(form,c){
//            $(".preciot").each(
//                function(index, value) {
//                    importe_total = importe_total + eval($(this).val());
//                }
//            );
                var filas=$("#table-body tr").length;
                if(filas==0){
                    $("#warning-title").text('Alerta');
                    $("#warning-body").text('Seleccion un producto, para continuar con la cotización');
                    $('#modal-warning').modal('show');
                }else{
                    //registrar_ajax(form,c);
                    
                }
        }
        
        $(function(){
           $("body").on("keypress","#ruc",function(){
               $("#reloadruc").html('<i class="fa fa-spinner fa-spin"></i>');
           });
           
           
           $("body").on("change","#ruc",function(){
             var ruc=$("#ruc").val(); 
             $("#reloadruc").html('');
             $("#nombre").val("");
                    $("#direccion").val("");
                    $("#telefono").val("");
             $.post('<?= url("clientes/getbyruc")?>',{"ruc":ruc},function(data){
                 
                 if(datos!=""){
                    var datos = jQuery.parseJSON(data);
                    $("#nombre").val(datos.nombre_cliente);
                    $("#direccion").val(datos.direccion_cliente);
                    $("#telefono").val(datos.telefono_cliente);
                 }
                 else{
                     $("#nombre").val("");
                    $("#direccion").val("");
                    $("#telefono").val("");
                 }
                 console.log(data);
             });
              
           });
           
        });


    </script>
@stop


@section('js')
	@parent
        {{ HTML::script('js/jquery.datatables/jquery.dataTables.js')  }}
        {{ HTML::script('js/jquery.datatables/dataTables.bootstrap.js')  }}
        {{ HTML::script('js/funciones.js')  }}  
@stop
