<?php 


class Distrito extends Eloquent {
	
    protected $table = 'distrito';
    protected $primaryKey = 'iddistrito';
    protected $fillable = array('nombre_distrito');


}