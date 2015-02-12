<?php

class CotizacionController extends BaseController{
    
    
    public function nuevoCotizacion(){
        $productos= Producto::all();
    	$data=array("subtitulo"=>"Registrar Cotización","productos"=>$productos);
	   	return View::make('cotizacion.crear',$data);
    

    }
    
    
    public function listaCotizacion(){
        $cotizacion= Cotizacion::all();
        $data=array("cotizacion"=>$cotizacion);
        return View::make('cotizacion.listaCotizacion',$data);
        
    }
    public function crearCotizacion(){
       
        //print_r(Input::All());
//         [codigo] => sdvdsv [ruc] => sdvdsv [nombre] => [contacto] => [direccion] => [telefono] => 
//        [pago] => 1 [dirdespacho] => [cantidad] => Array ( [0] => [1] => [2] => [3] => ) [preciobruto] => [igv] => [precioneto] => )
        
       // $codigo     =   Input::get('codigo');
        $ruc        =   Input::get('ruc');
        $nombre     =   Input::get('nombre');
        $contacto   =   Input::get('contacto');
        $direccion  =   Input::get('direccion');
        $telefono   =   Input::get('telefono');
        $pago       =   Input::get('pago');
        $dirdespacho=   Input::get('dirdespacho');
        $idprod   =   Input::get('idprod');
        $cantidad   =   Input::get('cantidad');
        $preciot    =   Input::get('preciot');
        $preciobruto        =   Input::get('preciobruto');
        $igv       =   Input::get('igv');
        $precioneto        =   Input::get('precioneto');
        // DB::query('select * from users where name = ?', array('test'));
        
        $cant=count($idprod);
        
        for($x=0;$x<$cant;$x++){

           DB::select("call sp_registrar_cotizacion('{$idprod[$x]}','{$ruc}','{$nombre}','{$contacto}','{$direccion}','{$telefono}','{$pago}','{$dirdespacho}','{$cantidad[$x]}','{$preciot[$x]}','{$preciobruto}','{$igv}','{$precioneto}',{$x})");
           
           return Redirect::to('cotizacion')->with(array('confirm' => 'Cotizacion Registrada Correctamente'));
       }
      
    }
}