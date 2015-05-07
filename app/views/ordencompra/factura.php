
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
                                <b >FACTURA</b><br>
                                <?=  str_pad($cotizacion[0]->idorden_compra, 10, "0", STR_PAD_LEFT)   ?>  <br>
                            </p>
                        </td>
                    </tr>
                    
                </table>
            </td>
        </tr>
    </table>
    
    <br><br><br>
    <table   class="second">
        <tr>
            <td  class="borde" colspan="" width="70%"><b> Factura a:</b></td>
            
        </tr>
        <tr>
            <td>
                <?= $cotizacion[0]->ruc ?><br>
                <?= $cotizacion[0]->nombre_cliente ?><br>
                <?= $cotizacion[0]->direccion_cliente?>

            </td>
        </tr>
        
    </table>
    <br><br><br>
    <table border="1" cellpadding="2" cellspacing="0">
        <tr class="cabecera">
            <td> Fecha</td>
            <td> Cod.Cliente</td>
            <td> Repr.de Venta</td>
            <td> Forma de Pago</td>
            <td> Número de Orden</td>
            <td> Número de Guía</td>
        </tr>
        <tr>
            <td> <?= date("d/m/Y", strtotime($cotizacion[0]->fecha_despacho)) ?></td>
            <td> <?=  str_pad($cotizacion[0]->idclientes, 10, "0", STR_PAD_LEFT)  ?></td>
            <td></td>
            <td> <?=  ($cotizacion[0]->tipo_pago==1)? "Crédito" :"Contado"  ?></td>
            <td> <?= str_pad($cotizacion[0]->idorden_compra, 10, "0", STR_PAD_LEFT) ?></td>
            <td> </td>
        </tr>

    </table>
    <br> <br> <br>
    <table border="1" cellpadding="2" cellspacing="0" class="third">
        <tr class="cabecera">
            <td align="center" width="30%" >Producto</td>
            <td align="center" width="10%">Cantidad</td>
            <td align="center" width="10%">Presentación</td>
            <td align="center" width="10%">Precio Unitario</td>
            <td align="center" width="10%">Importe</td>
            <td align="center" width="10%">%IGV</td>
            <td align="center" width="10%">IGV</td>
            <td align="center" width="10%">Imp.Bruto</td>
        </tr>
        <?php  foreach ($cotizacion as $key => $value) { ?>
        <tr>
            <td ><?= $value->nombre_producto ?></td>
            <td align="center"><?= $value->cantidad ?></td>
            <td></td>
            <td align="center"><?= $value->precio / $value->cantidad ?></td>
            <td align="center"><?= $value->precio ?></td>
            <td align="center">18.0%</td>
            <td align="center"><?= $value->precio*0.18 ?></td>
            <td align="center"><?= $value->precio+($value->precio*0.18) ?></td>
            
        </tr>
       <?php } ?>

    
    </table>
    <br><br>
    <table >
        
    </table>
    <table >

        <tr>
            <td width="65%"></td>
            <td  width="50%">
                <table class="first">

                    <tr>
            
                        <td width="20%" align="center" >Sub Total</td>
                        <td align="center"> <b><?= $value->precio_neto ?></b> </td>
                    </tr>
                    <tr>
                        
                        <td align="center" class="">Total IGV</td>
                        <td align="center"> <b><?= $value->igv * $value->precio_neto ?></b> </td>
                    </tr>
                    <tr>
                        
                        <td align="center" class="">Total</td>
                        <td align="center"> <b><?= $value->preciototal ?></b> </td>
                    </tr>

                </table>    
            </td>
        </tr>


    </table>

    <br><br><br>
    <div><b>
        Favor de girar cheque NO NEGOCIABLE a nombre de :NCH PERU S.A<br>
        o abonar en CTA. CTE U$$ No 192-1405352-1-84 BCO. CREDITO DEL PERU<br>
        o abonar en CTA. CTE S/. No 192-1400611-0-85 CREDITO DEL PERU<br>
        NO PAGAR EN EFECTIVO AL VENDEDOR
</b>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br>
    <table>
        <tr>
            <td width="30%">
                <table class="first">
                    <tr>
                        <td  class="borde">Fecha de Vencimiento</td>
                    </tr>
                    <tr>
                        <td><br><br><br></td>
                    </tr>

                </table>
            </td>
            <td width="10%"></td>
            <td width="60%">

                <table class="first">
                    <tr>
                        <td class="borde">Orbservación</td>
                    </tr>
                    <tr>
                        <td><br><br><br></td>
                    </tr>

                </table>    


            </td>
        </tr>
        
    </table>


