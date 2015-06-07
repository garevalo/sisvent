
	<?php $cant=count($notificaciones); ?>							
    <a class="<?= ($cant > 0 )? 'wave in dropdown-toggle' : '' ?> "  <?=  ($cant > 0 )? 'data-toggle="dropdown"' : '' ?>  title="Notificaciones" href="javascript:void(0)">
        <i class="icon fa fa-warning"></i>
        <span class="badge"><?= $cant ?></span>
    </a>
    <!--Messages Dropdown-->
    <ul class="pull-right dropdown-menu dropdown-arrow dropdown-notifications slim" >
        
    	<?php 
    		if($cant>0){  
    		foreach ($notificaciones as $key => $value) {
    			
    	?>
        <li >
            <a href="#">
                <div class="clearfix">
                    <div class="notification-icon">
                        <i class="fa fa-shopping-cart bg-warning white"></i>
                    </div>
                    <div class="notification-body">
                        <span class="title"><?= $value->detalle_notificacion ?></span>
                        <span class="description">
                            <?php 
                                if($value->desde==1){
                                    echo "cotizacion";
                                }
                                elseif($value->desde==3){
                                    echo "almacen";
                                }
                                elseif($value->desde==4){
                                    echo "acreditación";
                                }
                            ?>
                        </span> 
                    </div>
                    <div class="notification-extra">
                        <i class="fa fa-clock-o themeprimary"></i>
                        <span class="description"><?= $value->created_at ?></span>
                    </div>
                </div>
            </a>
        </li>
        <?php } ?>
        <li class="dropdown-footer ">
            <span>
                Hoy, <?= strftime("%A %d de %B del %Y"); ?>
            </span>
           <!-- <span class="pull-right">
                10°c
               <i class="wi wi-cloudy"></i>
            </span> -->

        </li>
        <?php } ?>

        <?php /*
        <li>
            <a href="#">
                <div class="clearfix">
                    <div class="notification-icon">
                        <i class="fa fa-check bg-darkorange white"></i>
                    </div>
                    <div class="notification-body">
                        <span class="title">Uncharted break</span>
                        <span class="description">03:30 pm - 05:15 pm</span>
                    </div>
                    <div class="notification-extra">
                        <i class="fa fa-clock-o darkorange"></i>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <a href="#">
                <div class="clearfix">
                    <div class="notification-icon">
                        <i class="fa fa-gift bg-warning white"></i>
                    </div>
                    <div class="notification-body">
                        <span class="title">Kate birthday party</span>
                        <span class="description">08:30 pm</span>
                    </div>
                    <div class="notification-extra">
                        <i class="fa fa-calendar warning"></i>
                        <i class="fa fa-clock-o warning"></i>
                        <span class="description">at home</span>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <a href="#">
                <div class="clearfix">
                    <div class="notification-icon">
                        <i class="fa fa-glass bg-success white"></i>
                    </div>
                    <div class="notification-body">
                        <span class="title">Dinner with friends</span>
                        <span class="description">10:30 pm</span>
                    </div>
                </div>
            </a>
        </li>
		*/ ?>

        

    </ul>