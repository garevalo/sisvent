<?php

class CotizacionController extends BaseController{
    
    
    public function nuevoCotizacion(){

        $idcotizacion=  DB::select("select idcotizacion  from cotizacion order by idcotizacion desc limit 1");
        if(count($idcotizacion)>0){$id = ($idcotizacion[0]->idcotizacion)+1;}else{$id="00000001";}
    	
        $data=array("subtitulo"=>"Registrar Cotización","idcotizacion"=>$id);
	return View::make('cotizacion.crear',$data);

    }
    
    
    public function listaCotizacion(){
        $cotizacion= Cotizacion::all();
        $data=array("cotizacion"=>$cotizacion);
        return View::make('cotizacion.listaCotizacion',$data);
        
    }

    
    public function getDatatable()
        {
             $query=DB::table('cotizacion')
            ->join('clientes', 'cotizacion.idclientes', '=', 'clientes.idclientes')
            ->select('idcotizacion','clientes.nombre_cliente', 'clientes.ruc','cotizacion.preciototal','cotizacion.created_at','cotizacion.estado','idcotizacion as id');
        
            return Datatable::query($query)
            ->showColumns('idcotizacion', 'nombre_cliente','ruc','preciototal','created_at')
            ->addColumn('estado',function($model){
                    if($model->estado =='1'){$estado="<span class='label label-danger'>Activo</span>";}  
                    else {$estado="<span class='label label-primary'>Cerrado</span>";}
                return $estado;
            })                    
            ->addColumn('id',function($model){
                return '<a href="'.url("ordencompra/nuevo/".$model->id).'"  class="btn btn-sm btn-primary"><i class="fa fa-edit fa-lg"></i> Crear Orden Compra</a>';
            })
            ->make();
  
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
    
    
    public function reporteCotizacion(){
        
        PDF::SetTitle('Hello World');

        PDF::AddPage();

        PDF::Write(0, 'Hello World');

        PDF::Output('hello_world.pdf');
    }
}