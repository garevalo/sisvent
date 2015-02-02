<?php 


class Producto extends Eloquent {
	
    protected $table = 'productos';
    protected $primaryKey = 'idproducto';
    protected $fillable = array('nombre_producto', 'descripcion_producto','img_producto','precio_producto');

    
}