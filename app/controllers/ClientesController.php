<?php 
class ClientesController extends BaseController {
    
    public function mostrarClientes()
    {
        $usuarios = Usuario::all(); 
        
        // Con el método all() le estamos pidiendo al modelo de Usuario
        // que busque todos los registros contenidos en esa tabla y los devuelva en un Array
        
        return View::make('usuarios.lista', array('usuarios' => $usuarios));
        
        // El método make de la clase View indica cual vista vamos a mostrar al usuario 
        //y también pasa como parámetro los datos que queramos pasar a la vista. 
        // En este caso le estamos pasando un array con todos los usuarios
    }
    
    public function getClienteRuc(){
        
        $ruc=  Input::get("ruc");
        $model = Cliente::where('ruc', '=', $ruc)->first()->toJson();
        return  $model;
    }

    public function getClientesAcreditacion(){
        
       $query = DB::table('clientes')->where('acreditacion', '2');
        return Datatable::query($query)
        ->showColumns('ruc', 'nombre_cliente','direccion_cliente','telefono_cliente','updated_at','idclientes','acreditacion')
        ->addColumn('idclientes',function($model){
                //if($model->acreditacion==3){$check='checked="checked"';}else{$check='';}
                return '<div class="checkbox"><label><input type="checkbox" onclick="acreditar('.$model->idclientes.')" id="chk'.$model->idclientes.'" class="colored-success" > <span class="text">Acreditar</span></label> </div>';
            })
        ->make();
 
    }
    
}
