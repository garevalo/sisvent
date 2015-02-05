<?php

class ProductosController extends BaseController{
    
    
    public function listarProductos(){
       $productos = Producto::paginate(8);
       //$productos= Producto::all();  
       $data=array("subtitulo"=>"Lista de Productos","productos"=>$productos); 
       return View::make('productos.lista-cliente',$data);
    }
    

    public function nuevoProductos(){
        $productos = Producto::paginate(10);
       // $productos= Producto::all();
        $categorias= Categoria::all();
    	$data=array("subtitulo"=>"Registrar Producto",'productos'=>$productos,'categorias'=>$categorias); 
    	return View::make('productos.frmproducto',$data);
    }

    public function crearProductos(){

          
    	$file = Input::file("imagen");
    	$dataUpload = array(
	        "producto"    	=>    Input::get("producto"),
	        "descripcion"   =>    Input::get("descripcion"),
	        "precio"    	=>    Input::get("precio"),
	        "imagen"        =>    $file,//campo foto para validar
            "categoria"     =>    Input::get("categoria")
    	);

        $rules = array(
            'producto'      => 'required|min:6|max:100|unique:productos,nombre_producto',
            'descripcion'   => 'required|min:6|max:100',
            'precio'        => 'required|numeric',
            'imagen'        => 'required|mimes:jpeg,bmp,png|max:20000',
            'categoria'     => 'required'
        );

        $messages = array(
            'required'  => 'El campo :attribute es obligatorio.',
            'min'       => 'El campo :attribute no puede tener menos de :min carácteres.',
            'email'     => 'El campo :attribute debe ser un email válido.',
            'max'       => 'El campo :attribute no puede tener más de :min carácteres.',
            'unique'    => 'El producto ingresado ya está registrado',
            'confirmed' => 'Los passwords no coinciden',
            'numeric'   => 'El campo :attribute debe ser un número',
            'mimes'     => 'El campo :attribute debe ser una imagen'
        );

        $validation = Validator::make($dataUpload, $rules, $messages);
  
        if ($validation->fails())
        {
            return Redirect::to('productos/nuevo')->withErrors($validation)->withInput();
        }
        
        else{

          
        
            $producto= new Producto(array(
                "nombre_producto"    	=>    Input::get("producto"),
                "descripcion_producto"  =>    Input::get("descripcion"),
                "precio_producto"    	=>    Input::get("precio"),
                "img_producto"       	=>   str_replace(" ", "_", strtolower(Input::get("producto"))) ,//Input::file("imagen")->getClientOriginalName(),//nombre original de la foto
                "idcategoria"             =>    Input::get("categoria")

            ));
            if($producto->save()){
  
                $file->move("img/foto_producto",str_replace(" ", "_", strtolower(Input::get("producto"))));
                //redirigimos con un mensaje flash
                return Redirect::to('productos/nuevo')->with(array('confirm' => 'Producto Registrado Correctamente'));
            } 

            }
        }
}



