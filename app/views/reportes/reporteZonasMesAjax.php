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
    });
});
</script>
<div id="container" style="height: 400px"></div>