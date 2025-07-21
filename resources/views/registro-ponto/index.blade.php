@extends('layouts.app')

@section('title', 'Listagem de Funcionários')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css') }}">
@endpush

@section('content')

<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Registros de Ponto</h4>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form class="row mb-4" id="filtro-form">
                <div class="col-md-3">
                    <label>Data Início</label>
                    <input type="date" name="data_inicio" class="form-control">
                </div>
                <div class="col-md-3">
                    <label>Data Fim</label>
                    <input type="date" name="data_fim" class="form-control">
                </div>
                <div class="col-md-4">
                    <label>Funcionários</label>
                    <select name="funcionarios[]" class="form-control select2" multiple>
                        @foreach($funcionarios as $funcionario)
                            <option value="{{ $funcionario->id }}">{{ $funcionario->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">Filtrar</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table  class="table table-bordered table-striped" id="ponto-table">
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
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('assets/node_modules/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js') }}"></script>

<script>
$(function () {
    $('.select2').select2();

    const table = $('#ponto-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('registro-ponto.datatable') }}",
            type: "POST",
            data: function (d) {
                d._token = '{{ csrf_token() }}';
                d.data_inicio = $('input[name=data_inicio]').val();
                d.data_fim = $('input[name=data_fim]').val();
                d.funcionarios = $('select[name="funcionarios[]"]').val();
            }
        },
        columns: [
            { data: 'id' },
            { data: 'nome_funcionario' },
            { data: 'cargo' },
            { data: 'idade' },
            { data: 'nome_gestor' },
            { data: 'data_hora' }
        ]
    });

    $('#filtro-form').on('submit', function (e) {
        e.preventDefault();
        table.ajax.reload();
    });
});
</script>
@endpush

