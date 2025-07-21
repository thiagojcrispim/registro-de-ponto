<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistroPonto;
use Illuminate\Support\Facades\Auth;
use App\Services\RegistroPontoService;
use App\Models\User;
use App\Http\Requests\RegistroPontoFilterRequest;


class RegistroPontoController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();

        RegistroPonto::create([
            'user_id'   => $user->id,
            'data_hora' => now(),
        ]);

        return redirect()->route('dashboard')->with('success', 'Ponto registrado com sucesso.');
    }


    public function index()
    {
        $user = Auth::user();

        if ($user->cargo === 'Administrador') {
            $funcionarios = User::whereNotNull('gestor_id')->get();
        } elseif ($user->cargo === 'Gerente') {
            $funcionarios = User::where('gestor_id', $user->id)->get();
        } else {
             $funcionarios = collect([$user]);
        }

        return view('registro-ponto.index', compact('funcionarios'));
    }

    public function datatable(RegistroPontoFilterRequest $request, RegistroPontoService $service)
    {
        $user = Auth::user();

        $filtros = $request->filtros();

        $query = $service->getRegistrosParaDataTable($user, $filtros);

        return datatables()->of($query)->toJson();
    }


    public function relatorio(Request $request, RegistroPontoService $service)
    {
        $filtros = $request->only(['data_inicio', 'data_fim']);

        $registros = $service->getRelatorioCompleto($filtros);

        return view('registro-ponto.relatorio', compact('registros', 'filtros'));
    }

}
