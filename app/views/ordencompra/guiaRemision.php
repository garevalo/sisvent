
    <style>
        table.first{
            border-style: solid;
            border-color: #000;
            border-width: 5px 5px 5px 5px;
            right: 10px;
            
        }
         table.second{
            border-style: solid;
            border-color: #000;
            border-width: 1px 1px 1px 1px;
            padding: 15px 15px 15px 15px;
            
        }

        td.borde{
            border-style: solid;
            border-color: #000;
            border-width: 0px 0px 2px 0px;
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
        .foot{
            background-color: #646060;
            color: white;
        }
    </style>

    <table >
        <tr>
            
            <td colspan="2" width="50%">
                <table>
                    
                     <tr>
                         <td align="">
                            <div align="left">
                                <img src="<?= asset('images/logo.png'); ?>" width="400"><br>
                            NCH PERÚ SAC<br>    
                            Soluciones Integrales de mantenimiento industrial<br>
                            Av. Los Eucaliptos Mz.E Lte 7<br>
                            Urbanización Santa Genoveva-Lurín<br>
                            511 614-3500<br>
                            ventas@nchperu.com.pe</div>
                        </td>
                    </tr>
                </table>
                
            </td>
            <td width="15%"></td>
            <td width="40%" >
                <table  class="first">
                    <tr>
                        <td align="center" >
                            <p style="font-size: 50px;">
                                <h2>R.U.C: 20388203111</h2>
                                <b >Guía De Remisón</b><br>
                                <b >Remitente</b><br>
                                <?=  str_pad($cotizacion[0]->idorden_compra, 10, "0", STR_PAD_LEFT)   ?>  <br>
                            </p>
                        </td>
                    </tr>
                    
                </table>
            </td>
        </tr>
    </table>
    
    <br><br><br>
    <table >
        <tr>
            <td width="60%"><b> Domicilio de partida:</b></td>
            <td width="10%"></td>
            <td width="30%">Pedido: <?= "PE - ".str_pad($cotizacion[0]->idcotizacion, 10, "0", STR_PAD_LEFT)?></td>
        </tr>
        <tr>
            <td width="60%">
                Av. Los Eucaliptos Mz.E Lte 7<br>
                Urbanización Santa Genoveva-Lurín<br>

            </td>
            <td width="10%"></td>
            <td width="30%">Motivo de Traslado: VENTA</td>
        </tr>
        <tr>
            <td  class="" colspan="" width="60%"><b> Dirección de despacho:</b></td>
            <td></td>
            <td>Referencia:</td>
        </tr>
        <tr>
            <td>
                <?= $cotizacion[0]->direccion_despacho?>
                
            </td>
            <td></td>
            <td>Inicio de Traslado:</td>
        </tr>        
        
    </table>
    <br><br><br>
    <table border="1">
        <tr class="cabecera">
            
            <td width="20%"> Cod.Cliente</td>
            <td width="20%"> Terminos</td>
            <td width="20%"> Orden Compra</td>
            <td width="20%"> Repr. Venta</td>
            <td width="20%"> Fecha Emisión</td>
            
        </tr>
        <tr>
            <td> <?= str_pad($cotizacion[0]->idclientes, 10, "0", STR_PAD_LEFT) ?></td>
            <td><?=  ($cotizacion[0]->tipo_pago==1)? "Crédito" :"Contado"  ?> </td>
            <td><?= str_pad($cotizacion[0]->idorden_compra, 10, "0", STR_PAD_LEFT) ?></td>
            <td> </td>
            <td> <?= date("d/m/Y", strtotime($cotizacion[0]->fecha_despacho))  ?></td>
        </tr>

    </table>
    <br> <br>
    <table border="1" cellpadding="2" cellspacing="0" class="third">
        <tr class="cabecera">
            <td align="center" width="40%" >Descripción</td>
            <td align="center" width="10%">Lote</td>
            <td align="center" width="20%">Serie</td>
            <td align="center" width="20%">Presentación</td>
            <td align="center" width="10%">Enviado</td>
        </tr>
        <?php  foreach ($cotizacion as $key => $value) { ?>
        <tr>
            <td ><?= $value->nombre_producto ?></td>
            <td align="center"></td>
            <td align="center"></td>
            <td align="center"></td>
            <td align="center"><?= $value->cantidad ?></td>
        </tr>
       <?php } ?>

    
    </table>
    <br><br>
    <table >
        
    </table>

    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <table>
        <tr>
            <td width="40%"> </td>
            <td width="10%"></td>
            <td width="40%">Nombre del Conductor:</td>
            
        </tr>
        <tr>
            <td width="40%"> </td>
            <td width="10%"></td>
            <td width="40%">Nro Licencia Conducir:</td>
            
        </tr>
        <tr>
            <td width="40%"></td>
            <td width="10%"></td>
            <td width="40%">Modelo Vehículo:</td>
            
        </tr>
        <tr>
            <td width="40%"></td>
            <td width="10%"></td>
            <td width="40%">Placa Vehículo:</td>
            
        </tr>
        
    </table>


