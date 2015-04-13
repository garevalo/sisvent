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
            'producto'      => 'required|min:2|max:100|unique:productos,nombre_producto',
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



        public function editarProductos(){

          
            $file = Input::file("imagen");
            $idproducto = Input::get("idproducto");
            $dataUpload = array(
                
                "producto"      =>    Input::get("producto"),
                "descripcion"   =>    Input::get("descripcion"),
                "precio"        =>    Input::get("precio"),
                "imagen"        =>    $file,//campo foto para validar
                "categoria"     =>    Input::get("categoria"),
                "estado"        =>    Input::get("idestado")
            );

            $rules = array(
                'producto'      => 'required|min:2|max:100',
                'descripcion'   => 'required|min:2|max:100',
                'precio'        => 'required|numeric',
                'imagen'        => 'mimes:jpeg,bmp,png|max:2000',
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
                return json_encode(array( "error" => $validation->messages() ));
            }
            
            else{
                    

                if(empty($file)){
                   $producto = Producto::find($idproducto);
                    $producto->nombre_producto = Input::get("producto");
                    $producto->descripcion_producto = Input::get("descripcion");
                    $producto->precio_producto = Input::get("precio");
                    $producto->idcategoria = Input::get("categoria"); 
                    $producto->estado_producto=Input::get("idestado");
                   $producto->save();
                   return json_encode(array('dir' => url("productos/nuevo"),'mensaje'=> 'Producto moficado Correctamente ') );
                    
                }
                else{

                    $producto = Producto::find($idproducto);
                    $producto->nombre_producto = Input::get("producto");
                    $producto->descripcion_producto = Input::get("descripcion");
                    $producto->precio_producto = Input::get("precio");
                    $producto->idcategoria = Input::get("categoria");
                    $producto->img_producto = str_replace(" ", "_", strtolower(Input::get("producto")));
                    $producto->estado_producto=Input::get("idestado");
                    if($producto->save()){
                        
                       // File::delete(public_path().$id.'archivo.txt');
                        $file->move("img/foto_producto",str_replace(" ", "_", strtolower(Input::get("producto"))));
                                              
                    }

                    return json_encode(array('dir' => url("productos/nuevo"),'mensaje'=> 'Producto moficado Correctamente ') ); 
                }
                
            }
        }






        public function getDatatable()
        {
            return Datatable::collection(Producto::all(array('idproducto','nombre_producto','precio_producto','img_producto','idproducto as id','estado_producto')))
            ->showColumns('idproducto', 'nombre_producto','precio_producto')
            ->addColumn('img_producto',function($model){
                return '<img src="'.asset('img/foto_producto')."/".$model->img_producto.'" width="50" />';
            })
            ->addColumn('estado_producto',function($model){
                if($model->estado_producto==1){$estado="Activo"; $label="label-success";}
                else{$estado="Inactivo"; $label="label-warning";}
                return '<span class="label '.$label.'">'.$estado.'</span>';
            }) 
            ->addColumn('id',function($model){
                return '<button class="btn btn-primary btn-sm" onclick=editar_producto("'.url('productos/getproducto').'",'.$model->id.');><small  class="glyphicon glyphicon-edit"></small> Editar</button>';
            })        
            ->searchColumns('idproducto','nombre_producto')
            ->orderColumns('idproducto','nombre_producto')
            ->make();
        }
        
        public function getDatatableModal()
        {
            
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
          $tabla="<tr class='".$id."'>";
            $tabla.="<td>".$filas."</td>";
            $tabla.="<td>".$producto->nombre_producto."</td>";
            $tabla.="<td><input type='hidden' name='precio' class='precio' value='".$producto->precio_producto."'>".$producto->precio_producto."</td>";
            $tabla.="<td><input type='hidden' name='idprod[]' id='idprod' value='".$producto->idproducto."'><input type='text' name='cantidad[]' id='cantidad' class='cantidad input-sm' required='' pattern='[0-9]+' title='Inrese solo números'></td>";
            $tabla.="<td><input type='text' name='preciot[]' id='preciot' class='preciot input-sm' readonly=''></td>";
            $tabla.="<td><a class='eliminar'><span class='glyphicon glyphicon-trash'></span></a></td>";
          $tabla.="</tr>";
          return $tabla;
        }

        public function getProductojson(){
            $id      = Input::get("id");
            $producto= Producto::find($id)->toJson();
            return $producto;
        }
        
        
        public function modalProductos(){
            
            return View::make('productos.frmproducto_modal');
        }
}



