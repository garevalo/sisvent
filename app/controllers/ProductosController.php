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
    	$dataUpload = array(
	        "producto"    	=>    Input::get("producto"),
	        "descripcion"  =>    Input::get("descripcion"),
	        "precio"    	=>    Input::get("precio"),
	        "imagen"        	=>    $file//campo foto para validar
    	);

        $rules = array(
            'producto'  => 'required|min:6|max:100',
            'descripcion'     => 'required|min:6|max:100|unique:productos,nombre_producto',
            'precio'  => 'required|numeric',
            'imagen'     => 'required'
        );

        $messages = array(
            'required'  => 'El campo :attribute es obligatorio.',
            'min'       => 'El campo :attribute no puede tener menos de :min carácteres.',
            'email'     => 'El campo :attribute debe ser un email válido.',
            'max'       => 'El campo :attribute no puede tener más de :min carácteres.',
            'unique'    => 'El email ingresado ya está registrado en el blog',
            'confirmed' => 'Los passwords no coinciden'
        );

        $validation = Validator::make($dataUpload, $rules, $messages);
             //si la validación falla redirigimos al formulario de registro con los errores
            //y con los campos que nos habia llenado el usuario    
        if ($validation->fails())
        {
            return Redirect::to('productos/nuevo')->withErrors($validation)->withInput();
        }
        
        else{
        
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
}



