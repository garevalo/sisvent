<?php 


class Categoria extends Eloquent {
	
    protected $table = 'categoria';
    protected $primaryKey = 'idcategoria';
    protected $fillable = array('nombre_categoria', 'descripcion_categoria');


}