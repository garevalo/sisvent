<?php
class DistritoController extends BaseController{


	public function nuevoDistrito(){


		return View::make('distrito.distrito');

	}


	public function crearDistrito(){

		$distrito = Input::get("distrito");
        $sector = Input::get("sector");
        

        $data = array(
                
                "distrito"    =>   $distrito
            );

            $rules = array(
                'distrito'      => 'required|unique:distrito,nombre_distrito'
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

                DB::table('distrito')->insert(
                array('nombre_distrito'=>$distrito,'sector'=>  $sector ));
             
                $datos=array("dir"=>url("distrito/nuevo"),"mensaje"=>"Se registro distrito correctamente");
                
                return json_encode($datos);
            }


	}



public function editarDistrito(){

		$distrito = Input::get("distrito");
        $sector = Input::get("sector");
        $id = Input::get("iddistrito");

        $data = array(
                
                "distrito"    =>   $distrito
            );

            $rules = array(
                'distrito'      => 'required'
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
                
                DB::table('distrito')
                	->where("iddistrito",$id)
                	->update(array('nombre_distrito'=>$distrito,'sector'=>  $sector ));
             
                $datos=array("dir"=>url("distrito/nuevo"),"mensaje"=>"Registro editado correctamente");
                
                return json_encode($datos);
            }


	}


	public function getListaDistrito(){

		$query=DB::table("distrito")
			   ->select(DB::raw("iddistrito,nombre_distrito, 
					case sector when 1 then 'Lima Centro'
								when 2 then 'Lima Moderna'
								when 3 then 'Lima Norte'
								when 4 then 'Lima Sur'
								when 5 then 'Lima Este'
								when 6 then 'Callao'
								else '-' end sector"));

        return Datatable::query($query)
        ->showColumns('iddistrito','nombre_distrito','sector')
        ->searchColumns('nombre_distrito', 'sector')
        ->addColumn('accion',function($model){
                
            return "<a id='btn-editar-distrito' class='btn btn-primary btn-small' onclick=editar_distrito(".$model->iddistrito.",'".url("distrito/getdistrito")."')>Editar</a>";
        }) 
        ->make();

	}


	public function getDistritoJson(){


		$id      = Input::get("id");
        $producto= DB::table("distrito")->where("iddistrito",$id)
        ->get();
        return json_encode($producto);


	}
	





}

?>