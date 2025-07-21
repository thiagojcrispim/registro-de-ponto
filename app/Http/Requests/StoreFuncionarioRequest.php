<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreFuncionarioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $userId = $this->route('funcionario')?->id;

        return [
            'name'             => ['required', 'string', 'max:255'],
            'cpf'              => [
                'required',
                'string',
                function ($attribute, $value, $fail) use ($userId) {
                    $cpf = preg_replace('/\D/', '', $value);

                    if (strlen($cpf) !== 11) {
                        return $fail('O CPF deve conter 11 dígitos numéricos.');
                    }

                    if (!self::validaCpf($cpf)) {
                        return $fail('O CPF informado é inválido.');
                    }

                    $query = \App\Models\User::where('cpf', $cpf);
                    if ($userId) {
                        $query->where('id', '!=', $userId);
                    }

                    if ($query->exists()) {
                        return $fail('O CPF já está cadastrado.');
                    }

                    $this->merge(['cpf' => $cpf]);
                }
            ],
            'email'            => ['required', 'email', Rule::unique('users', 'email')->ignore($userId)],
            'password'         => [$userId ? 'nullable' : 'required', 'string', 'min:6'],
            'cargo'            => ['required', 'string', 'max:255'],
            'data_nascimento'  => ['required', 'date'],
            'cep'              => ['required', 'string'],
            'endereco'         => ['nullable', 'string'],
        ];
    }

    private static function validaCpf(string $cpf): bool
    {
        if (preg_match('/(\d)\1{10}/', $cpf)) return false;

        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) return false;
        }

        return true;
    }
}
