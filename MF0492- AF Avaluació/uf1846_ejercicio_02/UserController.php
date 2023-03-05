<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function consultaUsuario($id){     
        return "detalle del usuario con id $id"; 
    }

}
