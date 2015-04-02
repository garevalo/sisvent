<?php

class OrdenController extends BaseController{
    
    
    public function nuevaOrden($id){
        
       $cotizacion= DB::table('cotizacion')
            ->join('detalle_cotizacion', 'cotizacion.idcotizacion', '=', 'detalle_cotizacion.idcotizacion')
            ->join('productos', 'productos.idproducto', '=', 'detalle_cotizacion.idproducto')
            ->join('clientes', 'clientes.idclientes', '=', 'cotizacion.idclientes')
            ->select('cotizacion.idcotizacion', 'cotizacion.contacto', 'cotizacion.tipo_pago','cotizacion.precio as precio_neto','cotizacion.igv','cotizacion.preciototal',
                    'cotizacion.direccion_despacho','clientes.acreditacion','clientes.idclientes',
                    'clientes.ruc','clientes.nombre_cliente','clientes.direccion_cliente','clientes.telefono_cliente','clientes.correo',
                    'detalle_cotizacion.cantidad','detalle_cotizacion.precio','detalle_cotizacion.pedido','productos.nombre_producto','productos.idproducto',
                    'productos.precio_producto','productos.stock')
            ->where('cotizacion.idcotizacion', '=', $id)
            ->get();
       $distrito=Distrito::all();
       $idorden=  DB::select("select idorden_compra  from orden_compra order by idorden_compra desc limit 1");
       if(count($idorden)>0){$id = ($idorden[0]->idorden_compra)+1;}else{$id="00000001";}
        //return $id;
        return View::make('ordencompra.nuevoOrden',array("subtitulo"=>"Registrar Orden de Compra","idorden"=>$id,'cotizacion'=>$cotizacion,'distritos'=>$distrito)); 
       // print_r($cotizacion);
    }
    
     public function modalAcreditacion(){
            
            return View::make('acreditacion.modalAcreditacion');
     }
     
     public function registrarOrden(){
         
         $motivo = Input::get("motivo");
         $codigocotizacion = Input::get("codigocotizacion");
         $distrito = Input::get("distrito");
    //     print_r(Input::all());
         
         DB::table('orden_compra')->insert(
             array('idcotizacion'=>$codigocotizacion,'motivo_no_despacho' => $motivo,'iddistrito'=>$distrito,
                   'fecha_no_cotizacion' => time(),'created_at'=>  time()));
         
         DB::table('cotizacion')
            ->where('idcotizacion', $codigocotizacion)
            ->update(array('estado' => 2));
         
         return json_encode( array("dir"=>url("cotizacion"),"mensaje"=>"La Orden de compra se ha registrado correctamente y se ha enviado un correo al cliente por no realizarse el despacho"));
     }
     
     public function getDatatable()
    {
         $query=DB::table('orden_compra')
        ->join('cotizacion','orden_compra.idcotizacion','=','cotizacion.idcotizacion')
        ->join('clientes', 'cotizacion.idclientes', '=', 'clientes.idclientes')
        ->select('idorden_compra','cotizacion.idcotizacion','clientes.nombre_cliente', 'clientes.ruc','cotizacion.preciototal','cotizacion.estado','idorden_compra as id');

        return Datatable::query($query)
        ->showColumns('idorden_compra','idcotizacion', 'nombre_cliente','ruc','preciototal')                    
        ->addColumn('id',function($model){
            if($model->id ==''){$estado="";}
            else {$estado="";}
            return '<a href="'.url("ordencompra/nuevo/".$model->id).'" '.$estado.' class="btn btn-sm btn-primary"><i class="fa fa-edit fa-lg"></i> Ver Orden Compra</a>';
        })
        ->make();

    }
    
    public function listaOrdenCompra(){
        
        return View::make('ordencompra.listaOrdenCompra',array('subtitulo' => "Lista de pedidos" ));
    }

    public function solicitaProducto(){

      //  print_r($_POST);

        DB::table('detalle_cotizacion')
            ->where('idproducto', Input::get('idproducto'))
            ->where('idcotizacion',Input::get('idcotizacion'))
            ->update(array('pedido' => 1,'estado_pedido'=>1));
            echo Input::get('idproducto').'-'.Input::get('idcotizacion');

    }

}