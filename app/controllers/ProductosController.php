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

    public function crearProductos(){

    	$file = Input::file("imagen");
/*    	$dataUpload = array(
	        "nombre_producto"    	=>    Input::get("producto"),
	        "descripcion_producto"  =>    Input::get("descripcion"),
	        "precio_producto"    	=>    Input::get("precio"),
	        "img_producto"        	=>    $file//campo foto para validar
    	);

*/
    	$producto= new Producto(array(
            "nombre_producto"    	=>    Input::get("producto"),
            "descripcion_producto"  =>    Input::get("email"),
            "precio_producto"    	=>    Input::get("password"),
            "img_producto"       	=>    Input::file("imagen")->getClientOriginalName()//nombre original de la foto
            
        ));
        if($producto->save()){
            //guardamos la imagen en public/imgs con el nombre original
            $file->move("img/foto_producto",$file->getClientOriginalName());
            //redirigimos con un mensaje flash
            return Redirect::to('upload')->with(array('confirm' => 'Te has registrado correctamente.'));
        } 

 	}
}



