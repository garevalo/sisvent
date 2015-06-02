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
        labels: {
            items: [{
                html: 'Total',
                style: {
                    left: '50px',
                    top: '18px',
                    color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
                }
            }]
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
        }, {
            type: 'pie',
            name: 'Total',
            data: [{
                name: 'NohayRutas',
                y: 13,
                color: Highcharts.getOptions().colors[0] // Jane's color
            }, {
                name: 'ClienteNoAcreditado',
                y: 23,
                color: Highcharts.getOptions().colors[1] // John's color
            }, {
                name: 'No hay Stock',
                y: 19,
                color: Highcharts.getOptions().colors[2] // Joe's color
            }, {
                name: 'Hora fuera Despacho',
                y: 19,
                color: Highcharts.getOptions().colors[3] // Joe's color
            }],
            center: [100, 80],
            size: 100,
            showInLegend: false,
            dataLabels: {
                enabled: false
            }
        }]
    });
});


		</script>
<div id="container" style="height: 400px" width="100%"></div>