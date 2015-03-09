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
                    'detalle_cotizacion.cantidad','detalle_cotizacion.precio','productos.nombre_producto',
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
                   'fecha_no_cotizacion' => "now()",'created_at'=>"now()"));
         
         DB::table('cotizacion')
            ->where('idcotizacion', $codigocotizacion)
            ->update(array('estado' => 2));
         
         return json_encode( array("dir"=>url("cotizacion"),"mensaje"=>"La Orden de compra se ha registrado correctamente"));
     }
     
     public function getDatatable()
    {
         $query=DB::table('orden_compra')
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
}