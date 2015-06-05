
    <style>
       
        td{

            vertical-align: middle;
        }
        h2 {
                color: navy;
                font-family: times;
                font-size: 15pt;
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

    <h2  align="center">Reporte de Ingreso de Productos en Almacén</h2>
    
    <table class="tabla" border="" cellpadding="0" cellspacing="0">
        <tr class="" style="background-color:#328aa4 ;color:#fff; font-size: 45px;">
            
            <td style="font:100% Arial, Helvetica, sans-serif"> Producto</td>
            <td style="font:100% Arial, Helvetica, sans-serif"> Cantidad</td>
            <td style="font:100% Arial, Helvetica, sans-serif"> Fecha de Registro</td>
            
        </tr>

        <?php  
        
        foreach ($productos as $key => $value) { ?>
           <tr>
                <td><?= $value->nombre_producto ?></td>
                <td><?= $value->cantidad ?></td>
                <td><?= $value->created_at ?></td>
           </tr>
       <?php }  ?>


    </table>
    
