<?php
namespace App\Controllers;

require_once('../app/models/User.php');
use \App\Models\User;

class UserController  
{
    public function __construct()
    {
        // echo "en UserController<br>";
    }

    public function index()
    {
        // echo "En método index<br>";

        //buscar la lista de usuarios
        $users = User::all(); //arriba pongo use ...
        // $users = \App\Models\User::all();
        // echo "<pre>";
        // print_r($users);
        //generar la vista
        include('../views/user/index.php');
    }
    
    public function show($arguments)
    {
        $id = $arguments[0];
        echo "Mostrar el usuario $id";        
        $user = User::find($id);
        //generar la vista
        include('../views/user/show.php');
    }
    
    public function delete($arguments)
    {
        $id = $arguments[0];
        echo "Borrar el usuario $id";        
    }
}