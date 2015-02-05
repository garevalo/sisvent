<?php

class CotizacionController extends BaseController{
    
    
    public function nuevoCotizacion(){
        $productos= Producto::all();
    	$data=array("subtitulo"=>"Registrar Cotización","productos"=>$productos);
	   	return View::make('cotizacion.crear',$data);
    

    }
}