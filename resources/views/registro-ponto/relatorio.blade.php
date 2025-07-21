@extends('layouts.app')

@section('title', 'Relatório de Registros de Ponto')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css') }}">
@endpush

@section('content')

<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Relatório de Registros</h4>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="GET" class="row mb-4">
                <div class="col-md-3">
                    <label>Data Início</label>
                    <input type="date" name="data_inicio" class="form-control" value="{{ $filtros['data_inicio'] ?? '' }}">
                </div>
                <div class="col-md-3">
                    <label>Data Fim</label>
                    <input type="date" name="data_fim" class="form-control" value="{{ $filtros['data_fim'] ?? '' }}">
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Funcionário</th>
                            <th>Cargo</th>
                            <th>Idade</th>
                            <th>Gestor</th>
                            <th>Data e Hora</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($registros as $r)
                            <tr>
                                <td>{{ $r->id }}</td>
                                <td>{{ $r->nome_funcionario }}</td>
                                <td>{{ $r->cargo }}</td>
                                <td>{{ $r->idade }}</td>
                                <td>{{ $r->nome_gestor }}</td>
                                <td>{{ $r->data_hora }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Nenhum registro encontrado.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection


