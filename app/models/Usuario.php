<?php 
// se debe indicar en donde esta la interfaz a implementar
 use Illuminate\Auth\UserInterface;

class Usuario extends Eloquent implements UserInterface{
	 //Todos los modelos deben extender la clase Eloquent
    protected $table = 'usuarios';
    protected $fillable = array('usuario', 'password','idestado');

     // este metodo se debe implementar por la interfaz
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }
    
    //este metodo se debe implementar por la interfaz
    // y sirve para obtener la clave al momento de validar el inicio de sesión 
    public function getAuthPassword()
    {
        return $this->password;
    }
    
    
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

}