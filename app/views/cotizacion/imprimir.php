
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
                                56734  <br>
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
            <td>73849504567</td><td></td><td><?= date("H-m-s")?></td>
        </tr>
        <tr>
            <td><b>Nombre:</b></td><td>CLientes SAC</td>
        </tr>
        <tr>
            <td><b>Dirección:</b></td><td> Los olivos </td>
        </tr>
        <tr>
            <td><b>Correo:</b></td><td>correo@hotmail.com</td>
        </tr>
        <tr>
            <td><b>Tipo de Pago:</b></td><td>Credito</td>
        </tr>
        <tr>
            <td><b>Dirección de Despacho:</b></td><td>Direccion de despacho</td>
        </tr>
    </table>
    <br>
    <br>
    <h2>Cotización Electrónica</h2>
    <table border="1" cellpadding="0" cellspacing="0" class="second">
        <tr class="cabecera">
            <td align="center" colspan="2">Producto</td>
            <td align="center">Precio</td>
            <td align="center">Cantidad</td>
            <td align="center">PrecioTotal</td>
        </tr>
    <tr>
    <td colspan="2"></td>
    <td></td>
    <td></td>
    <td></td>
    </tr>
    <tr>
    <td colspan="2"></td>
    <td></td>
    <td></td>
    <td></td>
    </tr>
    

    <tr>
    <td colspan="2"></td>
    <td></td>
    <td></td>
    <td></td>
    </tr>
    <tr>
    <td colspan="2">TOTAL</td>
    <td></td>
    <td></td>
    <td></td>
    </tr>    
    </table>