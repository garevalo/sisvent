<?php

class AcreditacionController extends BaseController{
    
    
    
    public function enviarParaAcreditacion(){
        
       $idcliente = Input::get('idcliente');
       $idcotizacion= Input::get('idcotizacion');
       
       DB::update('UPDATE clientes SET acreditacion = ? WHERE idclientes = ? ', array( '2', $idcliente));
       return json_encode(array( "dir" =>  url("ordencompra/nuevo/".$idcotizacion),"mensaje"=>"Acreditacion Enviada"));
    }
    
}
    
    