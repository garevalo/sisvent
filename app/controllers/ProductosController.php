<?php

class ProductosController extends BaseController{
    
    
    public function listarProductos(){
       
       $productos= Producto::all();  
       $data=array("subtitulo"=>"Lista de Productos","productos"=>$productos); 
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
            "descripcion_producto"  =>    Input::get("descripcion"),
            "precio_producto"    	=>    Input::get("precio"),
            "img_producto"       	=>    Input::file("imagen")->getClientOriginalName()//nombre original de la foto
            
        ));
        if($producto->save()){
            //guardamos la imagen en public/imgs con el nombre original
            $file->move("img/foto_producto",$file->getClientOriginalName());
            //redirigimos con un mensaje flash
            return Redirect::to('productos/nuevo')->with(array('confirm' => 'Producto Registrado Correctamente'));
        } 

 	}
}



