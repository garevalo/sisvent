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

        $usuario    = Input::get('usuario');
        $contrasena = Hash::make(Input::get('contrasena'));
        $tipo       = Input::get('tipo');
        $nombre     = Input::get('nombre');
        $apepaterno = Input::get('apepaterno');
        $apematerno = Input::get('apematerno');
        $telefono   = Input::get('telefono');
        $dni        = Input::get('dni');
        $correo     = Input::get('correo');

        DB::select("call sp_registrar_usuario('{$nombre}','{$apepaterno}','{$apematerno}','{$dni}','{$telefono}','{$correo}','{$usuario}','{$contrasena}','{$tipo}')");
        
        $datos=array("dir"=>url("usuarios/nuevo"),"mensaje"=>"Usuario registrado correctamente");
        
        return json_encode($datos);

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
    
    public function getDatatable()
        {
             $query=DB::table('usuarios')
            ->join('personas', 'usuarios.idpersonas', '=', 'personas.idpersonas')
            ->select('usuarios.id','usuarios.usuario', 'personas.nombres','personas.apellido_paterno','personas.apellido_materno','usuarios.idestado','usuarios.idtipo');
        
            return Datatable::query($query)
            ->showColumns('id', 'usuario','nombres','apellido_paterno','id')
            ->addColumn('img_producto',function($model){
                return '<a href="javascript:void(0);" onclick="'.$model->id.'" class="btn btn-sm btn-success">Editar <i class="fa fa-edit fa-lg"></i></a>';
            })
            ->make();
  
        }
 
}
