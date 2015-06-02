<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        title: {
            text: 'Motivos de no Despacho'
        },
        xAxis: {
            categories: [
            <?php  
                foreach ($resultados as $key => $value) {
                   echo "'".$value->fecha_registro."'";

                   echo (count($resultados)==($key+1))? "":",";
                }
            ?>
            ]
        },
        series: [{
            type: 'column',
            name: 'No hay Rutas',
            data: [
                <?php  
                    foreach ($resultados as $key => $value) {
                        echo $value->NohayRutas;
                        echo (count($resultados)==($key+1))? "":",";
                    }
                ?>
            ]
        }, {
            type: 'column',
            name: 'Cliente No Acreditado',
            data: [<?php  
                    foreach ($resultados as $key => $value) {
                        echo $value->ClienteNoAcreditado;
                        echo (count($resultados)==($key+1))? "":",";
                    }
                ?>]
        }, {
            type: 'column',
            name: 'No hay Stock',
            data: [<?php  
                    foreach ($resultados as $key => $value) {
                        echo $value->Nohaystock;
                        echo (count($resultados)==($key+1))? "":",";
                    }
                ?>]
        }, {
            type: 'spline',
            name: 'Hora fuera Despacho',
            data: [<?php  
                    foreach ($resultados as $key => $value) {
                        echo $value->HorafueraDespacho;
                        echo (count($resultados)==($key+1))? "":",";
                    }
                ?>],
            marker: {
                lineWidth: 2,
                lineColor: Highcharts.getOptions().colors[3],
                fillColor: 'white'
            }
        }]
    });
});


		</script>
<div id="container" style="height: 400px" width="100%"></div>