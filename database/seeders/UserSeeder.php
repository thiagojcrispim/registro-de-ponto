<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::updateOrCreate(
            ['email' => 'admin@teste.com'],
            [
                'name'              => 'Administrador',
                'cpf'               => '87533348095',
                'password'          => Hash::make('senha123'),
                'cargo'             => 'Administrador',
                'data_nascimento'   => '1990-01-01',
                'cep'               => '00000000',
                'endereco'          => '---',
                'email_verified_at' => now(),
            ]
        );

        $gerente_rh = User::updateOrCreate(
            ['email' => 'gerenterh@teste.com'],
            [
                'name'              => 'Gerente de RH',
                'cpf'               => '00769342094',
                'password'          => Hash::make('senha123'),
                'cargo'             => 'Gerente',
                'data_nascimento'   => '1988-08-08',
                'cep'               => '13000000',
                'endereco'          => 'Rua Fictícia, 123 - Campinas/SP',
                'email_verified_at' => now(),
                'gestor_id'         => $admin->id,
            ]
        );

        User::updateOrCreate(
            ['email' => 'funcionario1@teste.com'],
            [
                'name'              => 'Funcionário 1',
                'cpf'               => '86146024058',
                'password'          => Hash::make('senha123'),
                'cargo'             => 'Funcionário',
                'data_nascimento'   => '1995-05-15',
                'cep'               => '13050000',
                'endereco'          => 'Rua A, 111 - Campinas/SP',
                'email_verified_at' => now(),
                'gestor_id'         => $gerente_rh->id,
            ]
        );

        User::updateOrCreate(
            ['email' => 'funcionario2@teste.com'],
            [
                'name'              => 'Funcionário 2',
                'cpf'               => '60287875075',
                'password'          => Hash::make('senha123'),
                'cargo'             => 'Funcionário',
                'data_nascimento'   => '1998-03-10',
                'cep'               => '13060000',
                'endereco'          => 'Rua B, 222 - Campinas/SP',
                'email_verified_at' => now(),
                'gestor_id'         => $gerente_rh->id,
            ]
        );

        $gerente_comercial = User::updateOrCreate(
            ['email' => 'gerentecomercial@teste.com'],
            [
                'name'              => 'Gerente comercial',
                'cpf'               => '15399584000',
                'password'          => Hash::make('senha123'),
                'cargo'             => 'Gerente',
                'data_nascimento'   => '1988-08-08',
                'cep'               => '13000000',
                'endereco'          => 'Rua Fictícia, 123 - Campinas/SP',
                'email_verified_at' => now(),
                'gestor_id'         => $admin->id,
            ]
        );

        User::updateOrCreate(
            ['email' => 'funcionario3@teste.com'],
            [
                'name'              => 'Funcionário 3',
                'cpf'               => '49959475077',
                'password'          => Hash::make('senha123'),
                'cargo'             => 'Funcionário',
                'data_nascimento'   => '1995-05-15',
                'cep'               => '13050000',
                'endereco'          => 'Rua A, 111 - Campinas/SP',
                'email_verified_at' => now(),
                'gestor_id'         => $gerente_comercial->id,
            ]
        );

        User::updateOrCreate(
            ['email' => 'funcionario4@teste.com'],
            [
                'name'              => 'Funcionário 4',
                'cpf'               => '36287348003',
                'password'          => Hash::make('senha123'),
                'cargo'             => 'Funcionário',
                'data_nascimento'   => '1998-03-10',
                'cep'               => '13060000',
                'endereco'          => 'Rua B, 222 - Campinas/SP',
                'email_verified_at' => now(),
                'gestor_id'         => $gerente_comercial->id,
            ]
        );
    }
}
