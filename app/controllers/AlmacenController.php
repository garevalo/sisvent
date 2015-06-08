<?php

class AlmacenController extends BaseController{

	public function listaPedidosProductos(){
		
		return View::make('almacen.listapedidos');
	}

    public function getlistaPedidosProductos(){

         $query=DB::table('detalle_cotizacion')
        ->join('cotizacion','cotizacion.idcotizacion','=','detalle_cotizacion.idcotizacion')
        ->join('orden_compra','orden_compra.idcotizacion','=','cotizacion.idcotizacion')
        ->join('productos', 'productos.idproducto', '=', 'detalle_cotizacion.idproducto')
        ->select('orden_compra.idorden_compra','detalle_cotizacion.idcotizacion','detalle_cotizacion.iddetalle_cotizacion',
                'productos.idproducto','productos.nombre_producto','productos.stock','detalle_cotizacion.cantidad','detalle_cotizacion.estado_pedido')
        ->where('detalle_cotizacion.pedido',1);

        return Datatable::query($query)
        ->showColumns('idorden_compra','nombre_producto','cantidad','stock')                    
        ->addColumn('iddetalle_cotizacion',function($model){
            
            if($model->estado_pedido==2 || ($model->stock < $model->cantidad )){

                    $btndisabled="disabled=''";

            }
            else{ $btndisabled="";}

            return '<button '.$btndisabled.' id="atender'.$model->iddetalle_cotizacion.'" onclick=atender_pedido("'.url("almacen/atenderpedido").'",'.$model->iddetalle_cotizacion.','.$model->idproducto.') class="btn btn-sm btn-primary"><i class="fa fa-edit fa-lg"></i> Atender Pedido</button>';
        })
        ->searchColumns('nombre_producto', 'cantidad')
        ->make();

    }
    
    public function ingresoProductos(){
        
        $productos=Producto::all(array('idproducto','nombre_producto'));
        
        return View::make('almacen.ingreso',array("productos"=>$productos));
    }
    
    
    public function registrarProductos(){
        
        $idproducto = Input::get("producto");
        $cantidad = Input::get("cantidad");
        

        $data = array(
                
                "producto"    =>   $idproducto,
                "cantidad" =>    $cantidad
            );

            $rules = array(
                'producto'      => 'required',
                'cantidad'      => 'required|integer'
            );

            $messages = array(
                'required'  => 'El campo :attribute es obligatorio.',
                'integer'   => 'El campo :attribute debe ser un número'
            );

            $validation = Validator::make($data, $rules, $messages);
      
            if ($validation->fails())
            {
                return json_encode(array( "error" => $validation->messages() ));
            }
            else{

                DB::table('ingresos')->insert(
                array('idproducto' => $idproducto,'cantidad'=>$cantidad,'created_at'=>  date("Y-m-d H:i:s") ));
             
                $stockprod=DB::table('productos')->select('productos.stock')
                                                ->where('productos.idproducto','=',$idproducto)
                                                ->get();

                DB::table('productos')
                ->where('idproducto', $idproducto)
                ->update(array('stock' => $stockprod[0]->stock+$cantidad ));

                

                 $datos=array("dir"=>url("almacen/ingreso"),"mensaje"=>"Se registro correctamente");
                
                return json_encode($datos);
            }
        
    }

    public function getListaIngresos(){

        $query=DB::table('ingresos')
        ->join('productos','ingresos.idproducto','=','productos.idproducto')
        ->select('ingresos.idingresos','productos.nombre_producto','productos.stock','ingresos.created_at','ingresos.cantidad');

        return Datatable::query($query)
        ->showColumns('idingresos','nombre_producto','cantidad','created_at','stock')
        ->searchColumns('nombre_producto', 'cantidad')
        ->make();

    }

    public function atenderPedido(){

        $id=Input::get('id');
        $idprod=Input::get('idprod');


           DB::table('detalle_cotizacion')
            ->where('iddetalle_cotizacion', $id)
            ->where('idproducto', $idprod)
            ->update(array('estado_pedido' => 2 ));
        
            $ordencompra = DB::select( DB::raw("select o.idorden_compra from detalle_cotizacion dc
                                                inner join orden_compra o on dc.idcotizacion=o.idcotizacion
                                                where dc.iddetalle_cotizacion={$id}
                                                limit 1") ); 


            //print_r($ordencompra);        
            DB::table('notificaciones')->insert(array('idtipo' => 2,'idestado'=>1,'desde'=>3,'detalle_notificacion'=>"Producto Atendido:".$idprod."<br> Orden Compra:".$ordencompra[0]->idorden_compra,'created_at'=>  date("Y-m-d H:i:s") ));
            $datos=array("dir"=>url("almacen/pedido"),"mensaje"=>"Pedido se atendio correctamente");
               
            return json_encode($datos);

        

    }

}