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
         
        Route::post('usuarios/crear', array('uses' => 'UsuariosController@crearUsuario'));
       
        Route::get('usuarios/{id}', array('uses'=>'UsuariosController@verUsuario'));
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
        
         //Acreditacion
        Route::get('ordencompra/modal', array('uses' => 'OrdenController@modalAcreditacion'));
        Route::post('acreditacion/enviar', array('uses' => 'AcreditacionController@enviarParaAcreditacion'));
        Route::get('api/getclientesacreditacion', array('as'=>'api.clientesacreditacion','uses'=>'ClientesController@getClientesAcreditacion'));
        Route::get('acreditacion/lista', array('uses' => 'AcreditacionController@listaClientesAcreditacion'));
        Route::get('acreditacion/registrar', array('uses' => 'AcreditacionController@registrarAcreditacion'));
        /**CLientes***/
        
        
        
    });