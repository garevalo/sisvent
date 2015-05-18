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
                    'productos.precio_producto','productos.stock','orden_compra.idorden_compra','orden_compra.despacho')
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


     public function getDatatableDespacho()
        {
             $query=DB::table('orden_compra')
            ->join('cotizacion','orden_compra.idcotizacion','=','cotizacion.idcotizacion')
            ->join('clientes', 'cotizacion.idclientes', '=', 'clientes.idclientes')
            ->where("orden_compra.despacho","2")
            ->orderBy("orden_compra.idorden_compra","desc")
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
                return '<a href="'.url("factura/crear/".$model->id).'" target="_blanck" class="btn btn-sm btn-danger"><i class="fa fa-file-text fa-lg"></i> Factura</a>
                        <a href="'.url("guia/crear/".$model->id).'" target="_blanck" class="btn btn-sm btn-danger"><i class="fa fa-file-text fa-lg"></i> Guia de Remisión</a>';
            })
            
            ->make();

        }


    
    public function listaOrdenCompra(){
        
        
        return View::make('ordencompra.listaOrdenCompra',array('subtitulo' => "Lista de pedidos" ));
    }
    

    public function listaDespacho(){
        
        
        return View::make('ordencompra.listaDespacho',array('subtitulo' => "Lista de pedidos" ));
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
            
            $query=DB::table('ruta')
        ->join('distrito','distrito.iddistrito','=','ruta.iddistrito')
        ->select(DB::raw("sum(ruta.precio) monto, ruta.idorden_compra,distrito.nombre_distrito,ruta.precio,ruta.fecha_creacion,distrito.sector, 
                    case distrito.sector when 1 then 'Lima Centro'
                                when 2 then 'Lima Moderna'
                                when 3 then 'Lima Norte'
                                when 4 then 'Lima Sur'
                                when 5 then 'Lima Este'
                                when 6 then 'Callao'
                                else '-' end sector_nombre"))
        ->groupBy('distrito.sector')
        ->orderBy('monto', 'desc')
        ->where('ruta.estado','=',2)
        ->take(15)->get();


           $query2=DB::table('ruta')
        ->join('distrito','distrito.iddistrito','=','ruta.iddistrito')
        ->select(DB::raw("ruta.idorden_compra,distrito.nombre_distrito,ruta.precio,ruta.fecha_creacion,distrito.sector,
                    case distrito.sector when 1 then 'Lima Centro'
                                when 2 then 'Lima Moderna'
                                when 3 then 'Lima Norte'
                                when 4 then 'Lima Sur'
                                when 5 then 'Lima Este'
                                when 6 then 'Callao'
                                else '-' end sector_nombre"))
        ->orderBy('ruta.precio', 'desc')
        ->orderBy('ruta.fecha_creacion', 'asc')
        ->orderBy('ruta.iddistrito', 'desc')
        ->where('ruta.estado','=',2)
        ->take(15)->get();   




            return View::make('rutas.verRutaModal',array('datos'=>$query,'datos2'=>$query2));
     }
    
    public function getRutasDatatable(){
        
        
         $query=DB::table('ruta')
        ->join('distrito','distrito.iddistrito','=','ruta.iddistrito')
        ->select(DB::raw("ruta.idorden_compra,distrito.nombre_distrito,ruta.precio,ruta.fecha_creacion, 
                    case distrito.sector when 1 then 'Lima Centro'
                                when 2 then 'Lima Moderna'
                                when 3 then 'Lima Norte'
                                when 4 then 'Lima Sur'
                                when 5 then 'Lima Este'
                                when 6 then 'Callao'
                                else '-' end sector"))
        ->orderBy('distrito.sector', 'asc')
        ->orderBy('ruta.precio', 'desc')
        ->orderBy('ruta.fecha_creacion', 'asc')
        ->orderBy('ruta.iddistrito', 'desc')
        ->where('ruta.estado','=',2)
        ->take(15);

        return Datatable::query($query)
        ->showColumns('idorden_compra','nombre_distrito', 'precio','sector','fecha_creacion')                    
        ->make();

        return View::make("rutas.verRutaModal",array("datos"=>$query));
        
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

        $hora=date("H");    
        if($hora<13){
            if($cantrutas<=15){
                
                //DB::statement("call sp_registrar_despacho({$idoc});");
                
                return json_encode(array("ok"=>"Se Despachó Correctamente  <p>Se envió una notificación al siguiente correo <string>".$correo."</string></p>","dir"=>url("ordencompra")));
            }
            else{
                return json_encode(array("error"=>"No hay rutas disponibles"));
            }
        }else{
            return json_encode(array("error"=>"No se puede realizar despacho después de la <strong>1 p.m</strong>"));
        }
    }

    function pdf(){

        PDF::SetCreator(PDF_CREATOR);
        PDF::SetAuthor('Cotizacion');
        PDF::SetTitle('NCH PERU');
        PDF::SetSubject('NCH PERU');
        PDF::SetKeywords('TCPDF, PDF, Cotizacion');

       
        PDF::setPrintHeader(false);
        PDF::setPrintFooter(true);

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
                    'productos.precio_producto','productos.stock','orden_compra.idorden_compra','orden_compra.motivo_no_despacho','orden_compra.fecha_despacho')
            ->where('orden_compra.idorden_compra', '=', $idoc)
            ->get();   

      
        // set document information
        PDF::SetCreator(PDF_CREATOR);
        PDF::SetAuthor('Cotizacion');
        PDF::SetTitle('NCH PERU');
        PDF::SetSubject('NCH PERU');
        PDF::SetKeywords('TCPDF, PDF, Cotizacion');

       
        PDF::setPrintHeader(false);
        PDF::setPrintFooter(true);

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

        PDF::Output('Factura.pdf', 'I');
    }

    public function generarGuia($idoc){


        

        $cotizacion= DB::table('cotizacion')
            ->join('detalle_cotizacion', 'cotizacion.idcotizacion', '=', 'detalle_cotizacion.idcotizacion')
            ->join('productos', 'productos.idproducto', '=', 'detalle_cotizacion.idproducto')
            ->join('clientes', 'clientes.idclientes', '=', 'cotizacion.idclientes')
            ->leftJoin('orden_compra', 'orden_compra.idcotizacion', '=', 'cotizacion.idcotizacion')   
            ->select('cotizacion.idcotizacion', 'cotizacion.contacto', 'cotizacion.tipo_pago','cotizacion.precio as precio_neto','cotizacion.igv','cotizacion.preciototal',
                    'cotizacion.iddistrito','cotizacion.direccion_despacho','clientes.acreditacion','clientes.idclientes',
                    'clientes.ruc','clientes.nombre_cliente','clientes.direccion_cliente','clientes.telefono_cliente','clientes.correo',
                    'detalle_cotizacion.cantidad','detalle_cotizacion.precio','detalle_cotizacion.pedido','detalle_cotizacion.estado_pedido','productos.nombre_producto','productos.idproducto',
                    'productos.precio_producto','productos.stock','orden_compra.idorden_compra','orden_compra.motivo_no_despacho','orden_compra.fecha_despacho')
            ->where('orden_compra.idorden_compra', '=', $idoc)
            ->get();   

      
        // set document information
        PDF::SetCreator(PDF_CREATOR);
        PDF::SetAuthor('Cotizacion');
        PDF::SetTitle('NCH PERU');
        PDF::SetSubject('NCH PERU');
        PDF::SetKeywords('TCPDF, PDF, Cotizacion');

       
        PDF::setPrintHeader(false);
        PDF::setPrintFooter(true);

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
        $html = View::make('ordencompra.guiaRemision',$datos);

        PDF::writeHTML($html, true, false, true, false, '');

        PDF::Output('Guia.pdf', 'I');
    }


    public function reporte(){

       return View::make('reportes.reporte');
    }

    public function reporteAjax1(){

        $fecha= $this->convertir_fecha(Input::get('fecha'));




       $despachados = DB::select('select count(*) cantidad from orden_compra where date(fecha_despacho) = ?', array($fecha));

       $nodespachados = DB::select( DB::raw("select count(*) cantidad from orden_compra where date(fecha_no_cotizacion) = '".$fecha."' and (date(fecha_no_cotizacion)!=date(fecha_despacho) or isnull(fecha_despacho))"));
      
        return View::make('reportes.graficoReporte1',array("fecha"=>$fecha,"despachados"=>$despachados,"nodespachados"=>$nodespachados,"fecha_format"=>Input::get('fecha')));

    }


    public function reportePorDiaOC(){

        return View::make('reportes.reporteOCdia');

    }

    public function reportePorDiaOCajax(){

        $fecha= $this->convertir_fecha(Input::get('fecha'));
   
        
        $ordencompra = DB::select( DB::raw("select o.idorden_compra,cl.nombre_cliente,c.idcotizacion,c.precio,case c.tipo_pago when 1 then 'Crédito' else 'Contado' end pago, case dis.sector when 1 then 'Lima Centro'
                                                                        when 2 then 'Lima Moderna'
                                                                        when 3 then 'Lima Norte'
                                                                        when 4 then 'Lima Sur'
                                                                        when 5 then 'Lima Este'
                                                                        when 6 then 'Callao'
                                                                        else '-' end sector_nombre  
                                            from orden_compra o
                                            inner join cotizacion c on o.idcotizacion=c.idcotizacion
                                            inner join clientes cl on cl.idclientes=c.idclientes
                                            inner join distrito dis on dis.iddistrito=c.iddistrito
                                            where  o.despacho=2 and date(o.fecha_despacho)='$fecha' ") ); 


        $productos = DB::select( DB::raw("select pr.nombre_producto,dc.precio, dc.cantidad,c.idcotizacion from orden_compra o
                                        inner join cotizacion c on o.idcotizacion=c.idcotizacion
                                        inner join clientes cl on cl.idclientes=c.idclientes
                                        inner join detalle_cotizacion dc on dc.idcotizacion=c.idcotizacion
                                        inner join productos pr on pr.idproducto = dc.idproducto
                                        inner join distrito dis on dis.iddistrito=c.iddistrito
                                        where  o.despacho=2 and date(o.fecha_despacho)='$fecha'") ); 
      
      
        // set document information
        $this->pdf();

        $datos=array("ordencompra"=>$ordencompra,"productos"=>$productos);   
        $html = View::make('reportes.reporteOCdiaAjax',$datos);

        PDF::writeHTML($html, true, false, true, false, '');

        PDF::Output(public_path().'/data.pdf', 'F');
     
       //echo '<iframe src="'.asset('data.pdf').'.&embedded=true" style="width:500px; height:375px;" frameborder="1"></iframe>';
      echo '<object width="1000" height="600" type="application/pdf" data="'.asset('data.pdf').'"><p>N o PDF available</p></object>';
    }



    /******************/

     public function reportePorDiaND(){

        return View::make('reportes.reporteNDdia');

    }

    public function reportePorDiaNDajax(){

        $fecha= $this->convertir_fecha(Input::get('fecha'));

        $ordencompra = DB::select( DB::raw("select o.idorden_compra,cl.nombre_cliente,c.idcotizacion,c.precio,case c.tipo_pago when 1 then 'Crédito' else 'Contado' end pago, o.motivo_no_despacho  
                                            from orden_compra o
                                            inner join cotizacion c on o.idcotizacion=c.idcotizacion
                                            inner join clientes cl on cl.idclientes=c.idclientes
                                            inner join distrito dis on dis.iddistrito=c.iddistrito
                                            where  date(o.fecha_no_cotizacion)='$fecha' and (date(o.fecha_no_cotizacion)!= date(o.fecha_despacho) or isnull(fecha_despacho))") ); 


        $productos = DB::select( DB::raw("select pr.nombre_producto,dc.precio, dc.cantidad,c.idcotizacion from orden_compra o
                                        inner join cotizacion c on o.idcotizacion=c.idcotizacion
                                        inner join clientes cl on cl.idclientes=c.idclientes
                                        inner join detalle_cotizacion dc on dc.idcotizacion=c.idcotizacion
                                        inner join productos pr on pr.idproducto = dc.idproducto
                                        inner join distrito dis on dis.iddistrito=c.iddistrito
                                        where  date(o.fecha_no_cotizacion)='$fecha' and (date(o.fecha_no_cotizacion)!= date(o.fecha_despacho) or isnull(fecha_despacho))") ); 
      
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
        PDF::SetHeaderMargin(5);
        PDF::SetFooterMargin(5);

        // set auto page breaks
        PDF::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        PDF::setImageScale(PDF_IMAGE_SCALE_RATIO);

        PDF::SetFont('helvetica', '', 10);

        PDF::AddPage();

        $datos=array("ordencompra"=>$ordencompra,"productos"=>$productos);   
        $html = View::make('reportes.reporteNDdiaAjax',$datos);

        PDF::writeHTML($html, true, false, true, false, '');

        PDF::Output(public_path().'/data.pdf', 'F');
        
        return '<object width="1000" height="600" type="application/pdf" data="'.asset('data.pdf').'"><p>N o PDF available</p></object>';
    }

    /*****************/


    function convertir_fecha($fecha){
        
        $date   =   explode('/',$fecha);
        $dia   =   $date[0];
        $mes    =   $date[1];
        $anio    =   $date[2];
        
        return $anio.'-'.$mes.'-'.$dia; 
        
    }

    function reporte_zonas_mes(){

        return View::make('reportes.reporteZonasMes');

    }

    function reporte_zonas_mes_ajax(){

        $anio= Input::get('anio');
        $sector = DB::select( DB::raw("select d.sector,case d.sector when 1 then 'Lima Centro'
                                                                        when 2 then 'Lima Moderna'
                                                                        when 3 then 'Lima Norte'
                                                                        when 4 then 'Lima Sur'
                                                                        when 5 then 'Lima Este'
                                                                        when 6 then 'Callao'
                                                                        else '-' end sector_nombre FROM orden_compra o 
                                        inner join cotizacion c on o.idcotizacion=c.idcotizacion
                                        inner join distrito d on d.iddistrito=c.iddistrito
                                        where year(o.fecha_despacho)=".$anio."
                                        group by d.sector") ); 

        return View::make('reportes.reporteZonasMesAjax',array("sector"=>$sector));

    }


    /********/


    public function reporteNivelCumplimiento(){

        return View::make('reportes.reporteNivelCumplimiento');

    }

    public function reporteNivelCumplimientoAjax(){

        //$fecha= $this->convertir_fecha(Input::get('fecha'));
   
        
        /*$ordencompra = DB::select( DB::raw("select o.idorden_compra,cl.nombre_cliente,c.idcotizacion,c.precio,case c.tipo_pago when 1 then 'Crédito' else 'Contado' end pago, case dis.sector when 1 then 'Lima Centro'
                                                                        when 2 then 'Lima Moderna'
                                                                        when 3 then 'Lima Norte'
                                                                        when 4 then 'Lima Sur'
                                                                        when 5 then 'Lima Este'
                                                                        when 6 then 'Callao'
                                                                        else '-' end sector_nombre  
                                            from orden_compra o
                                            inner join cotizacion c on o.idcotizacion=c.idcotizacion
                                            inner join clientes cl on cl.idclientes=c.idclientes
                                            inner join distrito dis on dis.iddistrito=c.iddistrito
                                            where  o.despacho=2 and date(o.fecha_despacho)='$fecha' ") ); */


      
        // set document information
        $this->pdf();

        $datos=array();   
        $html = View::make('reportes.reporteNivelCumplimientoAjax',$datos);

        PDF::writeHTML($html, true, false, true, false, '');

        PDF::Output(public_path().'/data.pdf', 'F');
     
       //echo '<iframe src="'.asset('data.pdf').'.&embedded=true" style="width:500px; height:375px;" frameborder="1"></iframe>';
      echo '<object width="1000" height="600" type="application/pdf" data="'.asset('data.pdf').'"><p>N o PDF available</p></object>';
    }

}