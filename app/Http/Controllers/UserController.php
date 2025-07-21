<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function editarSenha()
    {
        return view('auth.editar-senha');
    }
}
