<div class="panel-group accordion" id="accordions">
	<?php foreach ($datos as $key => $value) { ?>
    <div class="panel panel-primary ">
        <div class="panel-heading ">
            <h4 class="panel-title ">
                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordions" href="#collapse<?= $value->sector?>" aria-expanded="false">
                   <i class="fa-fw fa fa-check"></i> <span class="text-primary">Sector:</span> <?= $value->sector_nombre?> | 
                   <span class="text-primary">Monto: </span><?= $value->monto?>
                </a>
            </h4>
        </div>
        <div id="collapse<?= $value->sector?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
            <div class="panel-body border-red">
                <table class="table table-bordered table-striped table-condensed table-hover flip-content">
				
					<thead class="">
						<tr>
							<th>Distrito</th>
							<th>Precio</th>
							<th>Fecha</th>
						</tr>

					</thead>

					<tbody>
						<?php  foreach ($datos2 as $value2) { 
							if($value2->sector==$value->sector){
						?>
						<tr class="warning">
							<td><?= $value2->nombre_distrito ?></td>
							<td><?= $value2->precio ?> </td>
							<td><?= $value2->fecha_creacion ?></td>
						</tr>
						<?php } } ?>
					</tbody>

				</table>
            </div>
        </div>
    </div>
    <?php } ?>
</div>									


