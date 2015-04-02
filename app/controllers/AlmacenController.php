<?php

class AlmacenController extends BaseController{

	public function listaPedidosProductos(){
		
		return View::make('almacen.listapedidos');
	}

    public function getlistaPedidosProductos(){

         $query=DB::table('detalle_cotizacion')
        ->join('cotizacion','cotizacion.idcotizacion','=','detalle_cotizacion.idcotizacion')
        ->join('productos', 'productos.idproducto', '=', 'detalle_cotizacion.idproducto')
        ->select('cotizacion.idcotizacion','detalle_cotizacion.iddetalle_cotizacion','productos.idproducto','productos.nombre_producto','detalle_cotizacion.cantidad')
        ->where('detalle_cotizacion.pedido',1);

        return Datatable::query($query)
        ->showColumns('idcotizacion','nombre_producto','cantidad')                    
        ->addColumn('iddetalle_cotizacion',function($model){
            
            return '<a href="'.url("ordencompra/nuevo/".$model->iddetalle_cotizacion).'" class="btn btn-sm btn-primary"><i class="fa fa-edit fa-lg"></i> Atender Pedido</a>';
        })
        ->make();

    }

}