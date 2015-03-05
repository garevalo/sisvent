<?php
class Cliente extends Eloquent {
	
    protected $table = 'clientes';
    protected $primaryKey = 'idclientes';
    protected $fillable = array('ruc','nombre_cliente', 'direccion_cliente','telefono_cliente','acreditacion');

    public function cotizacion(){
        
        return $this->hasMany('cotizacion','idclientes');
    }

}