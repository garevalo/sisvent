
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
            border-width: 2px 1px 2px 1px;
            border-color: #333;
            text-align: center;
            font-family: times;
            font-size: 40px;
        }

        .subtabla{
            
            text-align: left;
            font-family: times;
            font-size: 35px;
            width: 100px;
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

    <h2  align="center">Nivel de Eficacia Para Cierre de Ventas</h2>
    
    <table class="tabla" border="" cellpadding="0" cellspacing="0">
        <tr>
            <td colspan="2">
            </td>
            <td colspan="2"> <strong>Fórmula:</strong> NE=((OCA/OCR)*100)</td>

            
        </tr>
        <tr class="" style="background-color:#328aa4 ;color:#fff; font-size: 45px;">
            
            <td style="font:100% Arial, Helvetica, sans-serif"> Día</td>
            <td style="font:100% Arial, Helvetica, sans-serif"> OCR</td>
            <td style="font:100% Arial, Helvetica, sans-serif"> OCA</td>
            <td style="font:100% Arial, Helvetica, sans-serif"> NE%</td>
        </tr>
        <?php  
        $tot_ocr=0;
        $tot_oca=0;
        foreach ($orden as $key => $value) { $tot_ocr+=$value->total_oc; $tot_oca+=$value->despachado;?>
           <tr>
                <td><?= $value->fecha_creacion ?></td>
                <td><?= $value->total_oc ?></td>
                <td><?= $value->despachado ?></td>
                <td><?= ($value->despachado / $value->total_oc)*100; ?> %</td>
           </tr>
       <?php } ?>
        <tr class="" style="background-color:#328aa4 ;color:#fff; font-size: 45px;">
            
            <td> TOTAL</td>
            <td> <?= $tot_ocr?></td>
            <td> <?= $tot_oca?></td>
            <td> <?=  number_format(($tot_oca/$tot_ocr)*100,2) ?> %</td>
        </tr>
    </table>
    <br><br>
    <div class="subtabla">
        
        <strong>NE: </strong>Nivel de Eficacia<br>
        <strong>OCA: </strong>Órdenes de Compra Atendidas<br>
        <strong>OCR: </strong>Órdenes de Compra Recibidas
             
    </div>
    
    


