
    <style>
       
        td{

            vertical-align: middle;
        }
        h2 {
                color: navy;
                font-family: times;
                font-size: 18pt;
            }
  
        table.tabla td{
            border-width: 2px 2px 2px 2px;
            border-color: #333;
            text-align: center;
            font-family: times;
            font-size: 35px;
        }

        table.subtabla td{
            border-width: 1px 1px 1px 1px;
            border-color: #333;
            text-align: center;
            font-family: times;
            font-size: 25px;
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

    <h2  align="center">Reporte de Ordenes de Compra No Despachadas por día</h2>
    
    <table class="tabla" border="" cellpadding="0" cellspacing="0">
        <tr class="" style="background-color:#328aa4 ;color:#fff; font-size: 45px;">
            
            <td style="font:100% Arial, Helvetica, sans-serif" width="10%"> Nro.Orden</td>
            <td style="font:100% Arial, Helvetica, sans-serif" width="13%"> Empresa</td>
            <td style="font:100% Arial, Helvetica, sans-serif" width="40%"> Productos</td>
            <td style="font:100% Arial, Helvetica, sans-serif" width="7%"> Monto</td>
            <td style="font:100% Arial, Helvetica, sans-serif" width="7%"> T.Pago</td>
            <td style="font:100% Arial, Helvetica, sans-serif" width="23%"> Motivo No Despacho</td>
        </tr>
        <?php $monto_total=0; $i=0; foreach ($ordencompra as $key=> $value) { $monto_total += $value->precio;?>
        <tr style="background-color:#fcf8e3;">
           
            <td><?=  str_pad($value->idorden_compra, 10, "0", STR_PAD_LEFT)  ?></td>
            <td><?= $value->nombre_cliente?></td>
            <td>
                <table class="subtabla"> 
                    <tr style="background-color:#f0ad4e ;color:#fff;">
                        <td>Nombre</td>
                        <td>Cantidad</td>
                        <td>P.Uni</td>
                        <td>Precio</td>
                    </tr>
                <?php foreach ($productos as $key => $prod) { if($value->idcotizacion == $prod->idcotizacion){?>
                  <tr style="background-color:#6f5499 ;color:#fff;">
                    <td><?= $prod->nombre_producto?></td>
                    <td><?= $prod->cantidad?></td>
                    <td><?= $prod->precio / $prod->cantidad?></td>
                    <td><?= $prod->precio ?></td>
                  </tr> 
                <?php }}?>
                </table>
            </td>
            <td><?= $value->precio?></td>
            <td><?= $value->pago?></td>
            <td>
                <?php 
                    if($value->motivo_no_despacho==1){echo "No hay rutas suficientes";}
                    elseif($value->motivo_no_despacho==2){
                        echo "Cliente no Acreditado";
                    }
                    elseif($value->motivo_no_despacho==3){
                        echo "No hay stock de productos";
                    }
                    elseif($value->motivo_no_despacho==4){
                        echo "Hora fuera de despacho";
                    }
                ?>
            </td>
        </tr>
        <?php  $i++;} ?>
    </table>

    <h3>Monto total del día: <?= $monto_total ?></h3>
    
    


