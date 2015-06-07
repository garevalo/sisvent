<?php

class NotificacionController extends BaseController{


	public function notificacion(){
		setlocale(LC_ALL,"es_ES","esp");

		if( Input::get("tipo") =="1" ){ 

			$notificacion=DB::table('notificaciones')
			->where('notificaciones.idestado', '=', '1')
			->orderBy("notificaciones.idnotificaciones","desc")
	        ->get();

		} else{ 

			$id=Input::get("tipo"); 
			$notificacion=DB::table('notificaciones')
			->where('notificaciones.idtipo', '=', $id)
			->where('notificaciones.idestado', '=', '1')
			->orderBy("notificaciones.idnotificaciones","desc")
	        ->get();


		}

		

		

		return View::make('notificaciones.notificaciones',array("notificaciones"=>$notificacion));
	}


}