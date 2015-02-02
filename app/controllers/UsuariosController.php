<?php 
class UsuariosController extends BaseController {
 
    public $restful = true;
 

    public function mostrarUsuarios()
    {
        $usuarios = Usuario::all(); 
        
        return View::make('usuarios.lista', array('usuarios' => $usuarios));

    }

    /**
     * Muestra formulario para crear Usuario
     */
    public function nuevoUsuario()
    {
        return View::make('usuarios.crear');
    }
 
 
    /**
     * Crear el usuario nuevo
     */
    public function crearUsuario()
    {
        
        $nombre   = Input::get('nombre');
        $apellido = Input::get('apellido');

        $input = array(
        'usuario' => $nombre,
        'password' =>  $apellido
        );

        $input['password'] = Hash::make($input['password']);
     
        Usuario::create($input);
     
        return Redirect::to('/')->with('mensaje_registro', 'Usuario Registrado');

    }
 
     /**
     * Ver usuario con id
     */
     
    public function verUsuario($id)
    {
    // en este método podemos observar como se recibe un parámetro llamado id
    // este es el id del usuario que se desea buscar y se debe declarar en la ruta como un parámetro 
    
        $usuario = Usuario::find($id);
        // para buscar al usuario utilizamos el metido find que nos proporciona Laravel 
        // este método devuelve un objete con toda la información que contiene un usuario
    
        return View::make('usuarios.ver', array('usuario' => $usuario));
    }


     public function get_logout()
    {
 
        Auth::logout();
        return Redirect::to('/')->with('mensaje','¡Has cerrado sesión correctamente!.');
 
    }
 
}