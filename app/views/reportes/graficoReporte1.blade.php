<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: 'Ordenes de Compra Despachadas vs No Despachadas,del día :<?= $fecha_format?>'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Despachados vs No Despachados',
            data: [
                ['No Despachados (<?= $nodespachados[0]->cantidad ?>)',   <?= $nodespachados[0]->cantidad ?>],
                {
                    name: 'Despachados (<?= $despachados[0]->cantidad ?>)',
                    y: <?= $despachados[0]->cantidad ?>,
                    sliced: true,
                    selected: true
                }
            ]
        }]
    });
});
        </script>


<div id="container" style="height: 400px"></div>
