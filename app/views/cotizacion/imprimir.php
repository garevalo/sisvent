
    <style>
        .first{
            border-style: solid;
            border-color: #000;
            border-width: 5px 5px 5px 5px;
            
        }
         .second{
            border-style: solid;
            border-color: #000;
            border-width: 1px 1px 1px 1px;
            padding: 15px 15px 15px 15px;
            
        }
        .third td{
            padding: 15px 15px 15px 15px;
        }
        .first .cuadro{
            background-color: wheat;

        }
        .cabecera{
            background-color: gray;
            color: white;
        }
    </style>

    <table >
        <tr>
            <td width="10%"></td>
            <td colspan="2" width="50%">
                <table>
                    <tr>
                        <td align="center">NCH PERÚ SAC</td>
                    </tr>
                     <tr>
                         <td align="center">Soluciones Integrales de mantenimiento industrial<br>
                            Av. Los Eucaliptos Mz.E Lte 7<br>
                            Urbanización Santa Genoveva-Lurín<br>
                            511 614-3500<br>
                            ventas@nchperu.com.pe
                        </td>
                    </tr>
                </table>
                
            </td>
            <td width="5%"></td>
            <td width="40%" >
                <table  class="first">
                    <tr>
                        <td align="center" >
                            <p style="font-size: 50px;">
                                <b >COTIZACION</b><br>
                                <?= $cotizacion[0]->idcotizacion ?>  <br>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td  align="center">
                            <img src="<?= asset('images/logo.png'); ?>" width="400">
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    
    <br><br><br>
    <table  border="0" class="second">
        <tr>
            <td width="550"><b>RUC:</b></td>
            <td width="820"><?= $cotizacion[0]->ruc ?></td><td><?= $cotizacion[0]->fechacotizacion ?></td>
        </tr>
        <tr>
            <td><b>Nombre:</b></td><td><?= $cotizacion[0]->nombre_cliente ?></td>
        </tr>
        <tr>
            <td><b>Dirección:</b></td><td> <?= $cotizacion[0]->direccion_cliente ?></td>
        </tr>
        <tr>
            <td><b>Correo:</b></td><td><?= $cotizacion[0]->nombre_cliente ?></td>
        </tr>
        <tr>
            <td><b>Tipo de Pago:</b></td><td><?= $cotizacion[0]->tipo_pago ?></td>
        </tr>
        <tr>
            <td><b>Dirección de Despacho:</b></td><td><?= $cotizacion[0]->direccion_despacho ?></td>
        </tr>
    </table>
   
    <h2>Cotización Electrónica</h2>
    <table border="1" cellpadding="2" cellspacing="0" class="third">
        <tr class="cabecera">
            <td align="center" width="580" >Producto</td>
            <td align="center">Precio</td>
            <td align="center">Cantidad</td>
            <td align="center">PrecioTotal</td>
        </tr>
        <?php  foreach ($cotizacion as $key => $value) { ?>
        <tr>
            <td ><?= $value->nombre_producto ?></td>
            <td align="center"><?= $value->precio_producto ?></td>
            <td align="center"><?= $value->cantidad ?></td>
            <td align="center"><?= $value->precio ?></td>
        </tr>
       <?php } ?>
       
       <?php 
        $cantidadfilas=25;
       if( count($cotizacion) < $cantidadfilas){  $completar= $cantidadfilas - count($cotizacion);

                for ($i=0; $i < $completar; $i++) { 
        ?>
           <tr>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
           </tr>
        <?php
                }

       }?> 
        
        <tr>
            <td colspan="3"></td>
            <td align="center"> <b><?= $value->precio_neto ?></b> </td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td align="center"> <b><?= $value->igv ?></b> </td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td align="center"> <b><?= $value->preciototal ?></b> </td>
        </tr>
    
    </table>

