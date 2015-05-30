<?php
class CategoriaController extends BaseController{


	public function nuevoCategoria(){


		return View::make('categoria.categoria');

	}


	public function crearCategoria(){

		$categoria = Input::get("categoria");
        
        

        $data = array(
                
                "categoria"    =>   $categoria
            );

            $rules = array(
                'categoria'      => 'required|unique:categoria,nombre_categoria'
            );

            $messages = array(
                'required'  => 'El campo :attribute es obligatorio.',
                'unique'	=> 'El campo :attribute ya existe'

            );

            $validation = Validator::make($data, $rules, $messages);
      
            if ($validation->fails())
            {
                return json_encode(array( "error" => $validation->messages() ));
            }
            else{

                DB::table('categoria')->insert(
                array('nombre_categoria'=>$categoria));
             
                $datos=array("dir"=>url("categoria/nuevo"),"mensaje"=>"Se registro categoria correctamente");
                
                return json_encode($datos);
            }


	}



public function editarCategoria(){

		$categoria = Input::get("categoria");
        $sector = Input::get("sector");
        $id = Input::get("idcategoria");

        $data = array(
                
                "categoria"    =>   $categoria
            );

            $rules = array(
                'categoria'      => 'required'
            );

            $messages = array(
                'required'  => 'El campo :attribute es obligatorio.',
                'unique'	=> 'El campo :attribute ya existe'

            );

            $validation = Validator::make($data, $rules, $messages);
      
            if ($validation->fails())
            {
                return json_encode(array( "error" => $validation->messages() ));
            }
            else{
                
                DB::table('categoria')
                	->where("idcategoria",$id)
                	->update(array('nombre_categoria'=>$categoria));
             
                $datos=array("dir"=>url("categoria/nuevo"),"mensaje"=>"Registro editado correctamente");
                
                return json_encode($datos);
            }


	}


	public function getListaCategoria(){

		$query=DB::table("categoria")
			   ->orderBy("idcategoria","desc")
			   ->select();
			   

        return Datatable::query($query)
        ->showColumns('idcategoria','nombre_categoria')
        ->searchColumns('nombre_categoria')
        ->addColumn('accion',function($model){
                
            return "<a id='btn-editar-categoria' class='btn btn-primary btn-small' onclick=editar_categoria(".$model->idcategoria.",'".url("categoria/getcategoria")."')>Editar</a>";
        }) 
        ->make();

	}


	public function getCategoriaJson(){


		$id      = Input::get("id");
        $categoria= DB::table("categoria")->where("idcategoria",$id)
        ->get();
        return json_encode($categoria);


	}
	





}

?>