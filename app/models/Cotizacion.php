<?php
class Cotizacion extends Eloquent {
	
    protected $table = 'cotizacion';
    protected $primaryKey = 'idcotizacion';
    protected $fillable = array('contacto', 'idpago','idclientes');


}