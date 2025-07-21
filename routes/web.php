<?php

use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\RegistroPontoController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\PasswordController;



use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');

    Route::get('/alterar-senha', [UserController::class, 'editarSenha'])->name('senha.editar');
    Route::post('/atualizar-senha', [PasswordController::class, 'update'])->name('senha.atualizar');


    Route::get('/funcionarios/list', [FuncionarioController::class, 'list'])->name('funcionarios.list');
    Route::resource('funcionarios', FuncionarioController::class);

    Route::post('/registro-ponto', [RegistroPontoController::class, 'store'])->name('registro-ponto.store');
    Route::get('/registro-ponto', [RegistroPontoController::class, 'index'])->name('registro-ponto.index');
    Route::post('/registro-ponto/datatable', [RegistroPontoController::class, 'datatable'])->name('registro-ponto.datatable');

    Route::get('/relatorio-ponto', [RegistroPontoController::class, 'relatorio'])->name('registro-ponto.relatorio');


});




Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
require __DIR__.'/auth.php';
