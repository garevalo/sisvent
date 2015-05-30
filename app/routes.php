<?php

    Route::get('/', function()
    {
         if(isset(Auth::user()->usuario)){
             
             //return Redirect::to('dashboard');
             return View::make('dashboard');
         }else{
             return View::make('login.login');
         }
    	 
    });

    Route::post('login', function(){
     
        // la función attempt se encarga automáticamente se hacer la encriptación de la clave para ser comparada con la que esta en la base de datos. 
        if (Auth::attempt( array('usuario' => Input::get('usuario'), 'password' => Input::get('contrasena'),'idestado'=>'1' ), true )){
            
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('/')->with('mensaje_login', 'Ingreso invalido');
        }
     
    });

    Route::get('logout',  function ()
    {
            Auth::logout();
            return Redirect::to('/')->with('mensaje','¡Has cerrado sesión correctamente!.');
    });
    
    Route::get('productos', array('uses' => 'ProductosController@listarProductos'));
    Route::get('api/productos', array('as'=>'api.productos','uses'=>'ProductosController@getDatatable'));
    
    Route::get('api/usuarios', array('as'=>'api.usuarios','uses'=>'UsuariosController@getDatatable'));
    Route::get('api/cotizacion', array('as'=>'api.cotizacion','uses'=>'CotizacionController@getDatatable'));
    
    Route::get('api/productosmodal', array('as'=>'api.productosmodal','uses'=>'ProductosController@getDatatableModal'));
    Route::get('productos/modal', array('uses' => 'ProductosController@modalProductos'));
    Route::post('productos/modalget', array('uses' => 'ProductosController@getProducto'));
    /*Cotizacion*/
    Route::get('cotizacion/nuevo', array('uses' => 'CotizacionController@nuevoCotizacion'));
    Route::post('cotizacion/crear', array('uses' => 'CotizacionController@crearCotizacion'));
    Route::get('cotizacion', array('uses' => 'CotizacionController@listaCotizacion'));
    Route::get('cotizacion/reporte/{id}', array('uses' => 'CotizacionController@reporteCotizacion'));
    
    
    /***ornden compra**/
    Route::post('clientes/getbyruc', array('uses' => 'ClientesController@getClienteRuc'));
   


    Route::group(array('before' => 'auth'), function()
    {
        
        /**** Usuarios ****/
        Route::get('dashboard', function()
        {
            $data=array("subtitulo"=>"Bienvenido al Menú Principal Del Sistema de Ventas");
            return View::make('dashboard',$data);
        });

        Route::controller('users', 'UserController');

        Route::get('usuarios', array('uses' => 'UsuariosController@mostrarUsuarios'));

        Route::get('usuarios/nuevo', array('uses' => 'UsuariosController@nuevoUsuario'));
        
        Route::get('usuarios/nuevo', array('uses' => 'UsuariosController@nuevoUsuario')); 
        Route::post('usuarios/crear', array('uses' => 'UsuariosController@crearUsuario'));
        Route::post('usuarios/editar', array('uses' => 'UsuariosController@editarUsuario'));
        Route::get('usuarios/getusuario', array('uses'=>'UsuariosController@getUsuariojson'));
        /*** Fin Usuarios ****/

        /*Productos*/

        Route::get('productos/nuevo',  array('uses' => 'ProductosController@nuevoProductos'));
        Route::post('productos/crear', array('uses' => 'ProductosController@crearProductos'));
        Route::post('productos/editar', array('uses' => 'ProductosController@editarProductos'));
        Route::get('productos/getproducto',  array('uses' => 'ProductosController@getProductojson'));
        
        
        /****** Fin Productos *****/
        
        
        /****** Orden de Compra *****/
        
        Route::get('ordencompra/nuevo/{id?}', 'OrdenController@nuevaOrden');
        Route::post('ordencompra/crear', array('uses' => 'OrdenController@registrarOrden'));
        Route::get('api/ordencompra', array('as'=>'api.ordencompra','uses'=>'OrdenController@getDatatable'));
        Route::get('ordencompra', array('uses' => 'OrdenController@listaOrdenCompra'));
        Route::post('ordencompra/solicitaproducto', array('uses' => 'OrdenController@solicitaProducto'));
        Route::get('ordencompra/ver/{id?}', array('uses' => 'OrdenController@verOrdenCompra'));
        Route::get('ordencompra/cantidadrutas', array('uses' => 'OrdenController@getCantidadRutas'));
        Route::get('ordencompra/despacho', array('uses' => 'OrdenController@registrarDespacho'));

        Route::get('factura/crear/{id?}', array('uses' => 'OrdenController@generarFactura'));
        Route::get('guia/crear/{id?}', array('uses' => 'OrdenController@generarGuia'));
        Route::get('ordencompra/modalruta', array('uses' => 'OrdenController@modalRuta'));
        Route::get('api/getruta', array('as'=>'api.getruta','uses'=>'OrdenController@getRutasDatatable'));


        Route::get('despacho', array('uses' => 'OrdenController@listaDespacho'));
        Route::get('api/despacho', array('as'=>'api.despacho','uses'=>'OrdenController@getDatatableDespacho'));
        /****REPORTES***/
        Route::get('reportes/reporte', array('uses' => 'OrdenController@reporte'));
        Route::post('reportes/ajaxreporte1', array('uses' => 'OrdenController@reporteAjax1'));
        Route::get('reportes/reporteocxdia', array('uses' => 'OrdenController@reportePorDiaOC'));
        Route::post('reportes/ajaxreporteocxdia', array('uses' => 'OrdenController@reportePorDiaOCajax'));

        Route::get('reportes/reportendxdia', array('uses' => 'OrdenController@reportePorDiaND'));
        Route::post('reportes/ajaxreportendxdia', array('uses' => 'OrdenController@reportePorDiaNDajax'));

        Route::get('reportes/reportezonasmes', array('uses' => 'OrdenController@reporte_zonas_mes'));
        Route::post('reportes/reportezonasmesajax', array('uses' => 'OrdenController@reporte_zonas_mes_ajax'));

        Route::get('reportes/reportenivelcumplimiento', array('uses' => 'OrdenController@reporteNivelCumplimiento'));
        Route::post('reportes/reportenivelcumplimientoajax', array('uses' => 'OrdenController@reporteNivelCumplimientoAjax'));

        Route::get('reportes/reporteniveleficacia', array('uses' => 'OrdenController@reporteNivelEficacia'));
        Route::post('reportes/reporteniveleficaciaajax', array('uses' => 'OrdenController@reporteNivelEficaciaAjax'));


         //Acreditacion
        Route::get('ordencompra/modal', array('uses' => 'OrdenController@modalAcreditacion'));
        Route::get('api/getclientesacreditacion', array('as'=>'api.clientesacreditacion','uses'=>'ClientesController@getClientesAcreditacion'));

        Route::group(array('before' => 'acceso_acreditacion'), function()
        {
            Route::post('acreditacion/enviar', array('uses' => 'AcreditacionController@enviarParaAcreditacion'));
            Route::get('acreditacion/lista', array('uses' => 'AcreditacionController@listaClientesAcreditacion'));
            Route::get('acreditacion/registrar', array('uses' => 'AcreditacionController@registrarAcreditacion'));
        });
        /**CLientes***/

        /*Almacen*/
        Route::get('api/getpedido', array('as'=>'api.pedido','uses'=>'AlmacenController@getlistaPedidosProductos'));
        Route::get('almacen/pedido', array('uses' => 'AlmacenController@listaPedidosProductos'));
        Route::get('almacen/ingreso', array('uses' => 'AlmacenController@ingresoProductos'));
        Route::post('almacen/registrar', array('uses' => 'AlmacenController@registrarProductos'));
        Route::post('almacen/atenderpedido', array('uses' => 'AlmacenController@atenderPedido'));
        Route::get('api/getingresos', array('as'=>'api.getingresos','uses'=>'AlmacenController@getListaIngresos'));
        


        /*Distrito*/
        Route::get('distrito/nuevo', array('uses' => 'DistritoController@nuevoDistrito'));
        Route::post('distrito/crear', array('uses' => 'DistritoController@crearDistrito'));
        Route::post('distrito/editar', array('uses' => 'DistritoController@editarDistrito'));
        Route::get('api/getdistritos', array('as'=>'api.getdistritos','uses'=>'DistritoController@getListaDistrito'));
        Route::post('distrito/getdistrito', array('uses' => 'DistritoController@getDistritoJson'));


        /*Categorias*/
        Route::get('categoria/nuevo', array('uses' => 'CategoriaController@nuevoCategoria'));
        Route::post('categoria/crear', array('uses' => 'CategoriaController@crearCategoria'));
        Route::post('categoria/editar', array('uses' => 'CategoriaController@editarCategoria'));
        Route::get('api/getcategoria', array('as'=>'api.getcategorias','uses'=>'CategoriaController@getListaCategoria'));
        Route::post('categoria/getcategoria', array('uses' => 'CategoriaController@getCategoriaJson'));    
            
        

        /*DESPACHO*/

        
    });
