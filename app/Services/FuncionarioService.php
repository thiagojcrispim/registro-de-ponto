<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;

class FuncionarioService
{
    public function listarComFiltros(Request $request)
    {

        return User::whereNotNull('gestor_id')
            ->with('gestor')
            ->select('id', 'name', 'cpf', 'email', 'cargo', 'data_nascimento', 'gestor_id')
            ->when($request->filled('cpf'), function ($q) use ($request) {
                $cpf = preg_replace('/\D/', '', $request->cpf);
                return $q->where('cpf', 'like', '%' . $cpf . '%');
            })
            ->when($request->filled('name'), fn($q) => $q->where('name', 'like', '%' . $request->name . '%'))
            ->when($request->filled('cargo'), fn($q) => $q->where('cargo', 'like', '%' . $request->cargo . '%'));
    }
}
