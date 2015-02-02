<?php



Route::get('/', function()
{
	 return View::make('login.login');
});


/*Route::get('user/{id?}', function($id=null)
{
    return 'User '.$id;
});
*/
/*
Route::get('login', function()
{
    return View::make('login.login');
});

*/



###########################33

// esta ruta servirá para iniciar la sesión por medio del correo y la clave 
// para esto utilizamos la función estática attemp de la clase Auth
// esta función recibe como parámetro un arreglo con el correo y la clave
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

 
// Por ultimo crearemos un grupo con el filtro auth. 
// Para todas estas rutas el usuario debe haber iniciado sesión. 
// En caso de que se intente entrar y el usuario haya iniciado session 
// entonces sera redirigido a la ruta login
Route::group(array('before' => 'auth'), function()
{
    
    Route::get('dashboard', function()
    {
        //return View::make('hello');
         return View::make('dashboard');
    });

    Route::controller('users', 'UserController');

    Route::get('usuarios', array('uses' => 'UsuariosController@mostrarUsuarios'));

    Route::get('usuarios/nuevo', array('uses' => 'UsuariosController@nuevoUsuario'));
     
    Route::post('usuarios/crear', array('uses' => 'UsuariosController@crearUsuario'));
    // esta ruta es a la cual apunta el formulario donde se introduce la información del usuario 
    // como podemos observar es para recibir peticiones POST 
     
    Route::get('usuarios/{id}', array('uses'=>'UsuariosController@verUsuario'));
});