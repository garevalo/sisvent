<?php 
class UserController extends BaseController {

    public function getIndex()
    {
        return View::make('login.login');
        //return View::make('layouts.nav');
    }

    public function getProfile($id=null)
    {

       return 'profile'.' '.$id;
    }

    public function postLogin()
    {
        
       print_r($_POST);
    }

/*
    public function anyLogin()
    {
       return 'anyLogin';
    }
*/
}