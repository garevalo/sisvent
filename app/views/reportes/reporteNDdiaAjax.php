
    <style>
        table.first{
            border-style: solid;
            border-color: #000;
            border-width: 3px 3px 3px 3px;
            color:#D81A1A; 
            font-size: 40px;           
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
        h2 {
                color: navy;
                font-family: times;
                font-size: 18pt;
                text-decoration: underline;
            }

        th{

            background-color: #ccffcc;
        }   
        table.tabla td{
            border-width: 2px 2px 2px 2px;
            border-color: #333;
            text-align: center;
            font-family: times;
            font-size: 35px;
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
                            </div>
                        </td>
                    </tr>
                </table>
                
            </td>
        </tr>
    </table>
    
    <br><br>
    <h2  align="center">Reporte de Ordenes de Compra No Despachadas por día</h2>
    
    <table class="tabla" border="" cellpadding="8" cellspacing="0">
        <tr class="" style="background-color:#5cb85c ;color:#fff; font-size: 45px;">
            
            <td> Nro.Orden</td>
            <td> Empresa</td>
            <td> Productos</td>
            <td width="10%"> Prec.Uni</td>
            <td width="10%"> Cantidad</td>
            <td width="10%"> Precio</td>
            <td width="10%"> T.Pago</td>
            <td> Motivo No Despacho</td>
        </tr>
        <?php $i=0; foreach ($ordencompra as $key=> $value) { ?>
        <tr style="background-color:#fcf8e3;">
           
            <td><?=  str_pad($value->idorden_compra, 10, "0", STR_PAD_LEFT)  ?></td>
            <td><?= $value->nombre_cliente?></td>
            <td><?= $value->nombre_producto?></td>
            <td><?= $value->precio / $value->cantidad?></td>
            <td><?= $value->cantidad?></td>
            <td><?= $value->precio?></td>
            <td><?= $value->pago?></td>
            <td><?= $value->motivo_no_despacho?></td>
        </tr>
        <?php  $i++;} ?>
    </table>
    <br> <br> <br>
    


