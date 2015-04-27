<?php

class OrdenController extends BaseController{
    
    
    public function nuevaOrden($id){
       
        
        /*DB::table('orden_compra')->insert(
             array('idcotizacion'=>$id,'created_at'=>  date("Y-m-d H:m:s" ,time()) ));
                    
        DB::table('cotizacion')
           ->where('idcotizacion', $id)
           ->update(array('estado' => 2)); 
        
        */
        
       DB::statement("call sp_crear_orden_ruta({$id});");
        
       $cotizacion= DB::table('cotizacion')
            ->join('detalle_cotizacion', 'cotizacion.idcotizacion', '=', 'detalle_cotizacion.idcotizacion')
            ->join('productos', 'productos.idproducto', '=', 'detalle_cotizacion.idproducto')
            ->join('clientes', 'clientes.idclientes', '=', 'cotizacion.idclientes')
            ->leftJoin('orden_compra', 'orden_compra.idcotizacion', '=', 'cotizacion.idcotizacion')   
            ->select('cotizacion.idcotizacion', 'cotizacion.contacto', 'cotizacion.tipo_pago','cotizacion.precio as precio_neto','cotizacion.igv','cotizacion.preciototal',
                    'cotizacion.iddistrito','cotizacion.direccion_despacho','clientes.acreditacion','clientes.idclientes',
                    'clientes.ruc','clientes.nombre_cliente','clientes.direccion_cliente','clientes.telefono_cliente','clientes.correo',
                    'detalle_cotizacion.cantidad','detalle_cotizacion.precio','detalle_cotizacion.pedido','productos.nombre_producto','productos.idproducto',
                    'productos.precio_producto','productos.stock','orden_compra.idorden_compra')
            ->where('cotizacion.idcotizacion', '=', $id)
            ->get();
       $distrito=Distrito::all();
       $idorden=  DB::select("select idorden_compra  from orden_compra order by idorden_compra desc limit 1");
       if(count($idorden)>0){$id = ($idorden[0]->idorden_compra)+1;}else{$id="00000001";}
       
       
       
        //return $id;
        //return View::make('ordencompra.nuevoOrden',array("subtitulo"=>"Registrar Orden de Compra","idorden"=>$id,'cotizacion'=>$cotizacion,'distritos'=>$distrito));
        
        return View::make('ordencompra.nuevoOrden',array('subtitulo' => "Orden Compra",'cotizacion'=>$cotizacion,'distritos'=>$distrito ));
    }
    
     public function modalAcreditacion(){
            
            return View::make('acreditacion.modalAcreditacion');
     }
     
     public function registrarOrden(){
         
         $motivo = Input::get("motivo");
         $codigocotizacion = Input::get("codigocotizacion");
    //     $distrito = Input::get("distrito");
    //     print_r(Input::all());
         
         /*DB::table('orden_compra')->insert(
             array('idcotizacion'=>$codigocotizacion,'motivo_no_despacho' => $motivo,'iddistrito'=>$distrito,
                   'fecha_no_cotizacion' => time(),'created_at'=>  time()));
         */
         DB::table('orden_compra')
            ->where('idcotizacion', $codigocotizacion)
            ->update(array('motivo_no_despacho' => $motivo,'despacho'=>1,'fecha_no_cotizacion' => date("Y-m-d H:m:s" ,time())));
         
         return json_encode( array("dir"=>url("ordencompra"),"mensaje"=>"La Orden de compra se ha registrado correctamente y se ha enviado un correo al cliente por no realizarse el despacho"));
     }
     
     public function getDatatable()
    {
         $query=DB::table('orden_compra')
        ->join('cotizacion','orden_compra.idcotizacion','=','cotizacion.idcotizacion')
        ->join('clientes', 'cotizacion.idclientes', '=', 'clientes.idclientes')
        ->select('orden_compra.idorden_compra','cotizacion.idcotizacion','clientes.nombre_cliente', 'clientes.ruc','cotizacion.preciototal','orden_compra.despacho','orden_compra.idorden_compra as id');

        return Datatable::query($query)
        ->showColumns('idorden_compra','nombre_cliente','ruc','preciototal')   
        ->addColumn('despacho',function($model){
            if($model->despacho =='1'){$estado="<span class='label label-info'>No Despachado</span>";}
            elseif($model->despacho =='2'){$estado="<span class='label label-success'>Despachado</span>";}
            else{$estado="<span class='label label-info'>No Despachado</span>";}
            return $estado;
        })        
        ->addColumn('id',function($model){
            return '<a href="'.url("ordencompra/ver/".$model->id).'" class="btn btn-sm btn-primary"><i class="fa fa-edit fa-lg"></i> Ver Orden Compra</a>';
        })
        
        ->make();

    }
    
    public function listaOrdenCompra(){
        
        
        return View::make('ordencompra.listaOrdenCompra',array('subtitulo' => "Lista de pedidos" ));
    }
    
    public function verOrdenCompra($idoc){
        
        $cotizacion= DB::table('cotizacion')
            ->join('detalle_cotizacion', 'cotizacion.idcotizacion', '=', 'detalle_cotizacion.idcotizacion')
            ->join('productos', 'productos.idproducto', '=', 'detalle_cotizacion.idproducto')
            ->join('clientes', 'clientes.idclientes', '=', 'cotizacion.idclientes')
            ->leftJoin('orden_compra', 'orden_compra.idcotizacion', '=', 'cotizacion.idcotizacion')   
            ->select('cotizacion.idcotizacion', 'cotizacion.contacto', 'cotizacion.tipo_pago','cotizacion.precio as precio_neto','cotizacion.igv','cotizacion.preciototal',
                    'cotizacion.iddistrito','cotizacion.direccion_despacho','clientes.acreditacion','clientes.idclientes',
                    'clientes.ruc','clientes.nombre_cliente','clientes.direccion_cliente','clientes.telefono_cliente','clientes.correo',
                    'detalle_cotizacion.cantidad','detalle_cotizacion.precio','detalle_cotizacion.pedido','detalle_cotizacion.estado_pedido','productos.nombre_producto','productos.idproducto',
                    'productos.precio_producto','productos.stock','orden_compra.idorden_compra','orden_compra.motivo_no_despacho','orden_compra.despacho')
            ->where('orden_compra.idorden_compra', '=', $idoc)
            ->get();
       $distrito=Distrito::all();
       
       return View::make('ordencompra.verOrdenCompra',array('subtitulo' => "Orden Compra",'cotizacion'=>$cotizacion,'distritos'=>$distrito ));
        
    }

    public function solicitaProducto(){

      //  print_r($_POST);

        DB::table('detalle_cotizacion')
            ->where('idproducto', Input::get('idproducto'))
            ->where('idcotizacion',Input::get('idcotizacion'))
            ->update(array('pedido' => 1,'estado_pedido'=>1));
            echo Input::get('idproducto').'-'.Input::get('idcotizacion');

    }
    
    public function modalRuta(){
            
            return View::make('rutas.verRutaModal');
     }
    
    public function getRutasDatatable(){
        
        
         $query=DB::table('ruta')
        ->join('distrito','distrito.iddistrito','=','ruta.iddistrito')
        ->select('ruta.idorden_compra','distrito.nombre_distrito', 'ruta.precio','ruta.fecha_creacion')
        ->orderBy('ruta.precio', 'desc')
        ->orderBy('ruta.fecha_creacion', 'asc')
        ->orderBy('ruta.iddistrito', 'desc')
        ->where('ruta.estado','=',1)
        ->take(15);

        return Datatable::query($query)
        ->showColumns('idorden_compra','nombre_distrito', 'precio','fecha_creacion')                    
        ->make();
        
    }

    public function getCantidadRutas(){
        
        $cant=DB::table('ruta')
        ->join('distrito','distrito.iddistrito','=','ruta.iddistrito')
        ->select('ruta.idorden_compra','distrito.nombre_distrito', 'ruta.precio','ruta.fecha_creacion')
        ->orderBy('ruta.precio', 'desc')
        ->orderBy('ruta.fecha_creacion', 'asc')
        ->orderBy('ruta.iddistrito', 'desc')
        ->where('estado','=',1)
        ->take(15)                
        ->count();
        
        return $cant;

    }

    public function registrarDespacho(){
       $idoc = Input::get('idoc');
        
        $cantrutas=$this->getCantidadRutas();
        
        $correo= DB::table('cotizacion')
            ->Join('orden_compra', 'orden_compra.idcotizacion', '=', 'cotizacion.idcotizacion')
            ->join('clientes', 'clientes.idclientes', '=', 'cotizacion.idclientes')
            ->where('orden_compra.idorden_compra', '=', $idoc)
            ->pluck('clientes.correo');

        if($cantrutas<=15){
            
            DB::statement("call sp_registrar_despacho({$idoc});");
            
            return json_encode(array("ok"=>"Se Despachó Correctamente  <p>Se envió una notificación al siguiente correo <string>".$correo."</string></p>","dir"=>""));
        }
        else{
            return json_encode(array("error"=>"No hay rutas disponibles"));
        }
        
    }

    public function generarFactura($idoc){


        

        $cotizacion= DB::table('cotizacion')
            ->join('detalle_cotizacion', 'cotizacion.idcotizacion', '=', 'detalle_cotizacion.idcotizacion')
            ->join('productos', 'productos.idproducto', '=', 'detalle_cotizacion.idproducto')
            ->join('clientes', 'clientes.idclientes', '=', 'cotizacion.idclientes')
            ->leftJoin('orden_compra', 'orden_compra.idcotizacion', '=', 'cotizacion.idcotizacion')   
            ->select('cotizacion.idcotizacion', 'cotizacion.contacto', 'cotizacion.tipo_pago','cotizacion.precio as precio_neto','cotizacion.igv','cotizacion.preciototal',
                    'cotizacion.iddistrito','cotizacion.direccion_despacho','clientes.acreditacion','clientes.idclientes',
                    'clientes.ruc','clientes.nombre_cliente','clientes.direccion_cliente','clientes.telefono_cliente','clientes.correo',
                    'detalle_cotizacion.cantidad','detalle_cotizacion.precio','detalle_cotizacion.pedido','detalle_cotizacion.estado_pedido','productos.nombre_producto','productos.idproducto',
                    'productos.precio_producto','productos.stock','orden_compra.idorden_compra','orden_compra.motivo_no_despacho')
            ->where('orden_compra.idorden_compra', '=', $idoc)
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
        $html = View::make('ordencompra.factura',$datos);

        PDF::writeHTML($html, true, false, true, false, '');

        PDF::Output('Cotizacion.pdf', 'I');
    }

    public function reporte(){

       return View::make('reportes.reporte');
    }

}