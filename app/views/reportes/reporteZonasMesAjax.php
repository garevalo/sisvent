<script type="text/javascript">
	$(function () {
    $('#container').highcharts({
        title: {
            text: 'Reporte por Zonas Despachadas',
            x: -20 //center
        },
        subtitle: {
            text: '',
            x: -20
        },
        xAxis: {
            categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
                'Jul', 'Ago', 'Set', 'Oct', 'Nov', 'Dic']
        },
        yAxis: {
            title: {
                text: 'Cantidad'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ' Despachos'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },

        series: [
        <?php foreach ($sector as $key => $value) { 

        		 $cantidades = DB::select( DB::raw("select month(fecha_despacho) mes,d.sector,count(*) cantidad FROM orden_compra o 
                                        inner join cotizacion c on o.idcotizacion=c.idcotizacion
                                        inner join distrito d on d.iddistrito=c.iddistrito
                                        where year(o.fecha_despacho)=2015 and d.sector=".$value->sector."
                                        group by month(fecha_despacho) order by month(fecha_despacho) asc") ); 

        	?>
        	
            {name: '<?= $value->sector_nombre?>',
            data: [
            <?php $array_canti=array(); $count=count($cantidades);
            	foreach($cantidades as $k=>$canti){
            		if($value->sector==$canti->sector) {
            			/*for($i=0;$i<=$count;$i++){


            			}*/

            			$array_canti[$canti->mes]=$canti->cantidad;
	
            		} 
            	} 
            	for($x=1;$x<=12;$x++){
            				if(isset($array_canti[$x]) && !empty($array_canti[$x]) ){
            					echo $array_canti[$x];	
            				}else{echo "0";}
            				if($x<12){
            					echo ",";
            				}
            				else{"";}
            			} 
            	?>
            
            
        	]}

        <?php 
        	if($key+1==count($sector)){	echo ""	;}else{ echo ",";}		
    		} 
    	?>
        ]
        /*
        series: [{
            name: 'Tokyo',
            data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
        }, {
            name: 'New York',
            data: [5, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
        }, {
            name: 'Berlin',
            data: [3, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
        }, {
            name: 'London',
            data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
        }]*/
    });
});
</script>
<div id="container" style="height: 400px"></div>