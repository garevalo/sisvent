<?php

class ProductosController extends BaseController{
    
    
    public function listarProductos(){
        
       $data=array("subtitulo"=>"Lista de Productos"); 
       return View::make('productos.lista',$data);
    }
    
}

