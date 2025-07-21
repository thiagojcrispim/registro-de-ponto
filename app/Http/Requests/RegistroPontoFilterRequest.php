<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistroPontoFilterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // ou implemente lógica de permissão se necessário
    }

    public function rules(): array
    {
        return [
            'data_inicio'   => ['nullable', 'date'],
            'data_fim'      => ['nullable', 'date', 'after_or_equal:data_inicio'],
            'funcionarios'  => ['nullable', 'array'],
            'funcionarios.*'=> ['integer', 'exists:users,id'],
        ];
    }

    public function filtros(): array
    {
        $dados = $this->validated();
        $dados['funcionarios'] = $this->input('funcionarios', []);
        return $dados;
    }
}
