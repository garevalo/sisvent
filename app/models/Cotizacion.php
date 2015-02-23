<?php
class Cotizacion extends Eloquent {
	
    protected $table = 'cotizacion';
    protected $primaryKey = 'idcotizacion';
    protected $fillable = array('contacto', 'tipo_pago','idclientes','precio','igv','preciototal','direccion_despacho');
    
    public function cliente(){
        
        return $this->belongsTo('clientes','idclientes');
    }

}