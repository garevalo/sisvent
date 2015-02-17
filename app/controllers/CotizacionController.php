<?php

class CotizacionController extends BaseController{
    
    
    public function nuevoCotizacion(){
        $productos= Producto::all();
       //select ifnull(idcotizacion,0) from cotizacion order by idcotizacion desc limit 1;
//        Order By, Group By, And Having
//
//$users = DB::table('users')
//                    ->orderBy('name', 'desc')
//                    ->groupBy('count')
//                    ->having('count', '>', 100)
//                    ->get();
//Offset & Limit
//
//$users = DB::table('users')->skip(10)->take(5)->get();


        $idcotizacion=  DB::select("select idcotizacion  from cotizacion order by idcotizacion desc limit 1");
       if(count($idcotizacion)>0){$id = ($idcotizacion[0]->idcotizacion)+1;}else{$id="00000001";}
    	
        $data=array("subtitulo"=>"Registrar Cotización","productos"=>$productos,"idcotizacion"=>$id);
	return View::make('cotizacion.crear',$data);
//       $idcotizacion->idcotizacion;
//      print_r($idcotizacion);
//      echo $idcotizacion[0]->idcotizacion;

    }
    
    
    public function listaCotizacion(){
        $cotizacion= Cotizacion::all();
        $data=array("cotizacion"=>$cotizacion);
        return View::make('cotizacion.listaCotizacion',$data);
        
    }
    public function crearCotizacion(){

        $ruc        =   Input::get('ruc');
        $nombre     =   Input::get('nombre');
        $contacto   =   Input::get('contacto');
        $direccion  =   Input::get('direccion');
        $telefono   =   Input::get('telefono');
        $pago       =   Input::get('pago');
        $dirdespacho=   Input::get('dirdespacho');
        $idprod     =   Input::get('idprod');
        $cantidad   =   Input::get('cantidad');
        $preciot    =   Input::get('preciot');
        $preciobruto        =   Input::get('preciobruto');
        $igv       =   Input::get('igv');
        $precioneto        =   Input::get('precioneto');
        // DB::query('select * from users where name = ?', array('test'));
        
        $cant=count($idprod);
        
       for($x=0;$x<$cant;$x++){

           DB::statement("call sp_registrar_cotizacion('{$idprod[$x]}','{$ruc}','{$nombre}','{$contacto}','{$direccion}','{$telefono}','{$pago}','{$dirdespacho}','{$cantidad[$x]}','{$preciot[$x]}','{$preciobruto}','{$igv}','{$precioneto}','{$x}');");
           
           
       }
       
      // DB::statement("call sp_prueba('{$nombre}','{$ruc}')");      
      return Redirect::to('productos')->with('confirm' , 'Cotizacion Registrada Correctamente');
    }
}