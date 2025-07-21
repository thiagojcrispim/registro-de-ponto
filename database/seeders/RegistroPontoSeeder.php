<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RegistroPonto;
use App\Models\User;
use Carbon\Carbon;

class RegistroPontoSeeder extends Seeder
{
    public function run(): void
    {

        $funcionarios = User::whereNotNull('gestor_id')->get();

        foreach ($funcionarios as $funcionario) {
            for ($i = 1; $i <= 5; $i++) {
                RegistroPonto::create([
                    'user_id'    => $funcionario->id,
                    'created_at' => Carbon::now()->subDays(rand(0, 10))->setTime(rand(8, 10), rand(0, 59), 0),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
