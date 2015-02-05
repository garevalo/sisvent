<?php

    Route::get('/', function()
    {
    	 return View::make('login.login');
    });

    Route::post('login', function(){
     
        // la función attempt se encarga automáticamente se hacer la encriptación de la clave para ser comparada con la que esta en la base de datos. 
        if (Auth::attempt( array('usuario' => Input::get('usuario'), 'password' => Input::get('contrasena') ), true )){
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

    /*Cotizacion*/
    Route::get('cotizacion/nuevo', array('uses' => 'CotizacionController@nuevoCotizacion'));


    Route::group(array('before' => 'auth'), function()
    {
        
        /**** Usuarios ****/
        Route::get('dashboard', function()
        {
            return View::make('dashboard');
        });

        Route::controller('users', 'UserController');

        Route::get('usuarios', array('uses' => 'UsuariosController@mostrarUsuarios'));

        Route::get('usuarios/nuevo', array('uses' => 'UsuariosController@nuevoUsuario'));
         
        Route::post('usuarios/crear', array('uses' => 'UsuariosController@crearUsuario'));
       
        Route::get('usuarios/{id}', array('uses'=>'UsuariosController@verUsuario'));
        /*** Fin Usuarios ****/

        /*Productos*/

        Route::get('productos/nuevo', array('uses' => 'ProductosController@nuevoProductos'));

        Route::post('productos/crear', array('uses' => 'ProductosController@crearProductos'));
        /****** Fin Productos *****/

        

    });