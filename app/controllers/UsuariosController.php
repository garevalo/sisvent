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
        $contrasena = Input::get('contrasena');
        $tipo       = Input::get('tipo');
        $nombre     = Input::get('nombre');
        $apepaterno = Input::get('apepaterno');
        $apematerno = Input::get('apematerno');
        $telefono   = Input::get('telefono');
        $dni        = Input::get('dni');
        $correo     = Input::get('correo');

        $data = array(
                
                "usuario"    =>    $usuario,
                "contrasena" =>    $contrasena,
                "nombre"     =>    $nombre,
                "apepaterno" =>    $apepaterno,
                "apematerno" =>    $apematerno,
                "telefono"   =>    $telefono,
                "dni"        =>    $dni,
                "correo"     =>    $correo,
                "tipo"       =>    $tipo
            );

            $rules = array(
                'usuario'       => 'required|min:2|max:100|unique:usuarios,usuario',
                'contrasena'    => 'min:6|max:100',
                'nombre'        => 'required|alpha',
                'apepaterno'    => 'required|alpha',
                'apematerno'    => 'required|alpha',
                'telefono'      => 'required|digits_between:7,9|integer',
                'dni'           => 'required|digits:8|numeric',
                'correo'        => 'required|email|min:8|max:100',
                'tipo'          => 'required'
            );

            $messages = array(
                'required'  => 'El campo :attribute es obligatorio.',
                'min'       => 'El campo :attribute no puede tener menos de :min caracteres.',
                'email'     => 'El campo :attribute debe ser un email válido.',
                'max'       => 'El campo :attribute no puede tener mas de :max caracteres.',
                'unique'    => ':attribute ya está registrado',
                'numeric'   => 'El campo :attribute debe ser un número',
                'integer'   => 'El campo :attribute debe ser un número',
                "digits_between" => "El campo :attribute debe terner entre :min y :max dígitos.",
                "digits"         => "El campo :attribute debe ser de :digits dígitos.",
            );

            $validation = Validator::make($data, $rules, $messages);
      
            if ($validation->fails())
            {
                return json_encode(array( "error" => $validation->messages() ));
            }

            else{

                DB::select("call sp_registrar_usuario('{$nombre}','{$apepaterno}','{$apematerno}','{$dni}','{$telefono}','{$correo}','{$usuario}','{$contrasena}','{$tipo}')");
                
                $datos=array("dir"=>url("usuarios/nuevo"),"mensaje"=>"Usuario registrado correctamente");
                
                return json_encode($datos);

            }
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
                return '<a href="javascript:void(0);" onclick=get_usuario("'.url("usuarios/getusuario").'",'.$model->id.') class="btn btn-sm btn-primary">Editar <i class="fa fa-edit fa-lg"></i></a>';
            })
            ->make();
  
        }

    public function getUsuariojson(){

           $id=Input::get("id"); 
           $query=DB::table('usuarios')
            ->join('personas', 'usuarios.idpersonas', '=', 'personas.idpersonas')
            ->select('usuarios.id','usuarios.usuario','usuarios.idestado','usuarios.idtipo','personas.nombres','personas.dni',
                     'personas.apellido_paterno','personas.apellido_materno','personas.direccion_persona','personas.telefono',
                     'personas.correo')
            ->where('usuarios.id', '=', $id)
            ->get(); 

            return json_encode($query);

    }    
 
}
