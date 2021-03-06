<?php

class AcreditacionController extends BaseController{
    
    
    
    public function enviarParaAcreditacion(){
        
       $idcliente = Input::get('idcliente');
       $idcotizacion= Input::get('idcotizacion');
       
       DB::update('UPDATE clientes SET acreditacion = ? WHERE idclientes = ? ', array( '2', $idcliente));
       return json_encode(array( "mensaje"=>"Acreditacion Enviada"));
    }
    
    public function registrarAcreditacion(){
        
       $idcliente = Input::get('idcliente');
              
       DB::update('UPDATE clientes SET acreditacion = ? WHERE idclientes = ? ', array( '3', $idcliente));

       DB::table('notificaciones')->insert(array('idtipo' => 2,'idestado'=>1,'desde'=>4,'detalle_notificacion'=>"Cliente Acreditado:".$idcliente,'created_at'=>  date("Y-m-d H:i:s") ));
       return json_encode(array( "dir" =>  url("acreditacion/lista"),"mensaje"=>"Cliente Acreditado Correctamente"));
    }
    
    
     public function listaClientesAcreditacion(){
        
        return View::make('acreditacion.listaAcreditacion');
    }
}
    
    