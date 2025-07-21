<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFuncionarioRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\FuncionarioService;
use Illuminate\Support\Facades\Hash;


class FuncionarioController extends Controller
{

    protected FuncionarioService $funcionarioService;

    public function __construct(FuncionarioService $funcionarioService)
    {
        if (auth()->check() && !auth()->user()->isGestor()) {
            abort(403, 'Acesso não autorizado.');
        }

        $this->funcionarioService = $funcionarioService;
    }

    public function index()
    {
        $funcionarios = User::whereNotNull('gestor_id')->with('gestor')->get();
        return view('funcionarios.index', compact('funcionarios'));
    }

    public function show(User $funcionario)
    {
        abort(404);
    }

    public function create()
    {
        return view('funcionarios.create');
    }

    public function store(StoreFuncionarioRequest $request)
    {
        $data = $request->validated();

        $data['password'] = Hash::make($data['password']);
        $data['gestor_id'] = auth()->id();

        User::create($data);

        return redirect()->route('funcionarios.index')->with('success', 'Funcionário cadastrado com sucesso.');
    }

    public function edit(User $funcionario)
    {
        return view('funcionarios.edit', compact('funcionario'));
    }

    public function update(StoreFuncionarioRequest $request, User $funcionario)
    {
        $data = $request->validated();

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        unset($data['gestor_id']);

        $funcionario->update($data);

        return redirect()->route('funcionarios.index')->with('success', 'Funcionário atualizado com sucesso.');
    }

    public function destroy(User $funcionario)
    {
        $funcionario->delete();
        return redirect()->route('funcionarios.index')->with('success', 'Funcionário removido com sucesso.');
    }



    public function list(Request $request)
    {
        $query = $this->funcionarioService->listarComFiltros($request);

        return datatables()->eloquent($query)
            ->editColumn('cpf', fn($f) => $f->cpf_formatado)
            ->editColumn('data_nascimento', fn($f) => $f->data_nascimento_formatada)
            ->addColumn('gestor', fn($f) => $f->gestor->name ?? '-')
            ->toJson();
    }

}
