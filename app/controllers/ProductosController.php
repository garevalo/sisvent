<?php

class ProductosController extends BaseController{
    
    
    public function listarProductos(){
        
       $data=array("subtitulo"=>"Lista de Productos"); 
       return View::make('productos.lista-cliente',$data);
    }
    

    public function nuevoProductos(){

    	$data=array("subtitulo"=>"Registrar Producto"); 
    	return View::make('productos.frmproducto',$data);
    }
}

