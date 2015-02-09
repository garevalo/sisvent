<?php

class ProductosController extends BaseController{
    
    
    public function listarProductos(){
       $productos = Producto::paginate(8);
       //$productos= Producto::all();  
       $data=array("subtitulo"=>"Lista de Productos","productos"=>$productos); 
       return View::make('productos.lista-cliente',$data);
    }
    

    public function nuevoProductos(){
        //$productos = Producto::paginate(10);
       // $productos= Producto::all();
        $categorias= Categoria::all();
    	$data=array("subtitulo"=>"Registrar Producto",'categorias'=>$categorias); 
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

        public function getDatatable()
        {
            return Datatable::collection(Producto::all(array('idproducto','nombre_producto','precio_producto','img_producto')))
            ->showColumns('idproducto', 'nombre_producto','precio_producto')
            ->addColumn('img_producto',function($model){
                return '<img src="'.asset('img/foto_producto')."/".$model->img_producto.'" width="50" />';
            })        
            ->searchColumns('idproducto','nombre_producto')
            ->orderColumns('idproducto','nombre_producto')
            ->make();
        }
        
        public function getDatatableModal()
        {
            $url=url('productos/modal', $parameters = array(), null);
            str_replace("/", ".",  url('productos/modalget', $parameters = array(), null));
            return Datatable::collection(Producto::all(array('idproducto','nombre_producto','precio_producto','img_producto','idproducto as id')))
            ->showColumns('idproducto', 'nombre_producto','precio_producto')
            ->addColumn('img_producto',function($model){
                return '<img src="'.asset('img/foto_producto')."/".$model->img_producto.'" width="50" />';
            }) 
            ->addColumn('id',function($model){
                return '<a href="javascript:void(0);" onclick=agregar_producto("'.url('productos/modalget', $parameters = array(), null).'",'.$model->id.');><small  class="glyphicon glyphicon-plus-sign" style="font-size:25px;"></small></a>';
            })        
            ->searchColumns('idproducto','nombre_producto')
            ->orderColumns('idproducto','nombre_producto')
            ->make();
        }
        
        public function getProducto(){
           $id      = Input::get("id");
           $filas   = Input::get("filas");
          $producto= Producto::find( $id );
          $tabla="<tr>";
            $tabla.="<td>".$filas."</td>";
            $tabla.="<td>".$producto->nombre_producto."</td>";
            $tabla.="<td>".$producto->precio_producto."</td>";
            $tabla.="<td><input type='hidden' name='idprod[]' id='idprod' value='".$producto->idproducto."'><input type='number' name='cantidad[]' id='cantidad'></td>";
            $tabla.="<td><input type='number' name='preciot[]' id='preciot'></td>";
            $tabla.="<td><a class='eliminar'><span class='glyphicon glyphicon-trash'></span></a></td>";
          $tabla.="</tr>";
          return $tabla;
        }
        
        
        public function modalProductos(){
            
            return View::make('productos.frmproducto_modal');
        }
}



