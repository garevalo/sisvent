<?php

class CotizacionController extends BaseController{
    
    
    public function nuevoCotizacion(){

        $idcotizacion=  DB::select("select idcotizacion  from cotizacion order by idcotizacion desc limit 1");
        if(count($idcotizacion)>0){$id = ($idcotizacion[0]->idcotizacion)+1;}else{$id="00000001";}
    	  
        $distrito=Distrito::all();
        $data=array("subtitulo"=>"Registrar Cotización","idcotizacion"=>$id,'distritos'=>$distrito);
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
        ->select('idcotizacion','clientes.nombre_cliente', 'clientes.ruc','cotizacion.preciototal','cotizacion.estado','idcotizacion as id');

        return Datatable::query($query)
        ->showColumns('idcotizacion', 'nombre_cliente','ruc','preciototal')
        ->addColumn('estado',function($model){
                if($model->estado =='1'){$estado="<span class='label label-danger'>Activo</span>";}
                elseif($model->estado =='2'){$estado="<span class='label label-success'>En proceso</span>";}
                else {$estado="<span class='label label-primary'>Cerrado</span>";}
            return $estado;
        })                    
        ->addColumn('id',function($model){
            if($model->estado =='1'){$estado="";}
            else {$estado="disabled='disabled'";}
            return '<a href="'.url("ordencompra/nuevo/".$model->id).'" '.$estado.' class="btn btn-sm btn-primary"><i class="fa fa-edit fa-lg"></i> Crear Orden Compra</a>';
        })
        ->make();

    }
    
    public function crearCotizacion(){

        $idcotizacion        =   Input::get('codigo');
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
        $preciobruto    =   Input::get('preciobruto');
        $igv            =   Input::get('igv');
        $precioneto     =   Input::get('precioneto');
        $correo         =   Input::get('correo');
        $validar        =   Input::get('validar');
        $distrito       =   Input::get('distrito');
        

       if( $validar=="si" ){
           
           if($pago==1){ $tp="Crédito";}else{ $tp="Contado"; }
            $verificar='<div class="form-group has-info has-feedback">
             <div class="row">

                         <label class="col-md-4">RUC:</label>
                         <div class="col-md-6"><div class="alert alert-warning">'.$ruc.'</div></div>
                      </div>
                      <div class="row">
                         <label class="col-md-4">Nombre:</label>
                         <div class="col-md-6"><div class="alert alert-warning">'.$nombre.'</div></div>
                      </div>
                      <div class="row">
                         <label class="col-md-4">Contacto:</label>
                         <div class="col-md-6"><div class="alert alert-warning">'.$contacto.'</div></div>
                      </div>
                      <div class="row">
                         <label class="col-md-4">Dirección:</label>
                         <div class="col-md-6"><div class="alert alert-warning">'.$direccion.'</div></div>
                      </div>
                      <div class="row">
                         <label class="col-md-4">Teléfono:</label>
                         <div class="col-md-6"><div class="alert alert-warning">'.$telefono.'</div></div>
                      </div>
                      <div class="row">
                         <label class="col-md-4">Pago:</label>
                         <div class="col-md-6"><div class="alert alert-warning">'.$tp.'</div></div>
                      </div>
                      <div class="row">
                         <label class="col-md-4">Dirección de despacho:</label>
                         <div class="col-md-6"><div class="alert alert-warning">'.$dirdespacho.'</div></div>
                      </div>
                      <div class="row">
                         <label class="col-md-4">Correo:</label>
                         <div class="col-md-6"><div class="alert alert-warning">'.$correo.'</div></div>
                      </div>
                      <div class="alert alert-info">Verifique si la información registrada es correcta. Toda esta información sera enviada al siguiente correo <strong>'.$correo.'</stron></div>
                      </div><button  type="button" class="btn btn-primary btn-block" id="finalizar"><i class="glyphicon glyphicon-ok-sign"></i> Continuar ...</button>';
            return array("verificar"=>$verificar);
           
       }
       else{
            $cant=count($idprod);
        
            for($x=0;$x<$cant;$x++){

                DB::statement("call sp_registrar_cotizacion('{$idprod[$x]}','{$ruc}','{$nombre}','{$contacto}','{$direccion}','{$correo}','{$telefono}','{$pago}','{$dirdespacho}','{$cantidad[$x]}','{$preciot[$x]}','{$preciobruto}','{$igv}','{$precioneto}','{$distrito}','{$x}');");
            } 
            return json_encode( array("dir"=>url("productos"),"mensaje"=>url("cotizacion/reporte/".$idcotizacion)));
       }
       
  
    }
    

    public function correo(){
      Mail::send('cotizacion.imprimir',  array('id' => 1 );, function ($message){

            $message->subject('Aquí va el mensaje del asunto del email ');

            $message->to('gbap0506@hotmail.com');

        });
    }
    
    public function reporteCotizacion($id){


        $cotizacion= DB::table('cotizacion')
            ->join('detalle_cotizacion', 'cotizacion.idcotizacion', '=', 'detalle_cotizacion.idcotizacion')
            ->join('productos', 'productos.idproducto', '=', 'detalle_cotizacion.idproducto')
            ->join('clientes', 'clientes.idclientes', '=', 'cotizacion.idclientes')
            ->select('cotizacion.idcotizacion', 'cotizacion.contacto', 'cotizacion.tipo_pago','cotizacion.precio as precio_neto','cotizacion.igv','cotizacion.preciototal',
                    'cotizacion.direccion_despacho','cotizacion.created_at as fechacotizacion','clientes.acreditacion','clientes.idclientes',
                    'clientes.ruc','clientes.nombre_cliente','clientes.direccion_cliente','clientes.telefono_cliente',
                    'detalle_cotizacion.cantidad','detalle_cotizacion.precio','productos.nombre_producto',
                    'productos.precio_producto','productos.stock')
            ->where('cotizacion.idcotizacion', '=', $id)
            ->get();

        // set document information
        PDF::SetCreator(PDF_CREATOR);
        PDF::SetAuthor('Cotizacion');
        PDF::SetTitle('NCH PERU');
        PDF::SetSubject('NCH PERU');
        PDF::SetKeywords('TCPDF, PDF, Cotizacion');

       
        PDF::setPrintHeader(false);
        PDF::setPrintFooter(false);

        PDF::SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        PDF::SetMargins(PDF_MARGIN_LEFT,10, PDF_MARGIN_RIGHT);
        PDF::SetHeaderMargin(PDF_MARGIN_HEADER);
        PDF::SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        PDF::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        PDF::setImageScale(PDF_IMAGE_SCALE_RATIO);

        PDF::SetFont('helvetica', '', 10);

        PDF::AddPage();

        $datos=array("cotizacion"=>$cotizacion);   
        $html = View::make('cotizacion.imprimir',$datos);

        PDF::writeHTML($html, true, false, true, false, '');

        PDF::Output('Cotizacion.pdf', 'I');
    }
}