<?php

class CotizacionController extends BaseController{
    
    
    public function nuevoCotizacion(){
        $productos= Producto::all();
    	$data=array("subtitulo"=>"Registrar Cotización","productos"=>$productos);
	   	return View::make('cotizacion.crear',$data);
    

    }
    
    public function crearCotizacion(){
       
        //print_r(Input::All());
//         [codigo] => sdvdsv [ruc] => sdvdsv [nombre] => [contacto] => [direccion] => [telefono] => 
//        [pago] => 1 [dirdespacho] => [cantidad] => Array ( [0] => [1] => [2] => [3] => ) [preciobruto] => [igv] => [precioneto] => )
        
        $codigo     =   Input::get('codigo');
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
        
        $cant=count($cantidad);
        
        for($x=0;$x<$cant;$x++){
           
          $sql="call sp_registra_asigmateriales({$data["idproducto"]},'{$data["proyeccion"]}','{$data["fecha"]}',{$idarticulo[$x]},{$cantidad[$x]},$x)";
          $this->db->query($sql);
           //DB::select("call sp_prueba('{$codigo}','{$ruc}')");
       }
      
    }
}