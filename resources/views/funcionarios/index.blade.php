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
      <h4 class="text-themecolor">Funcionários</h4>
    </div>
    <div class="col-md-7 text-end">
      <a href="{{ route('funcionarios.create') }}" class="btn btn-info text-white">
        <i class="fa fa-plus-circle"></i> Novo Funcionário
      </a>
    </div>
  </div>

  <!-- Filtro -->
  <div class="card">
    <div class="card-body">
      <form id="filtroForm" class="row g-3">
        <div class="col-md-3">
          <label>CPF</label>
          <input type="text" name="cpf" class="form-control cpf-inputmask" maxlength="14">
        </div>
        <div class="col-md-3">
          <label>Nome</label>
          <input type="text" name="name" class="form-control">
        </div>
        <div class="col-md-3">
          <label>Cargo</label>
          <input type="text" name="cargo" class="form-control">
        </div>
        <div class="col-md-12 text-end">
          <button type="submit" class="btn btn-primary">Pesquisar</button>
          <button type="reset" class="btn btn-secondary">Limpar</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Tabela -->
  <div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <table id="funcionarios-table" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Ações</th>
              <th>Nome</th>
              <th>CPF</th>
              <th>Email</th>
              <th>Cargo</th>
              <th>Data Nasc.</th>
              <th>Gestor</th>
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
$(document).ready(function () {
    $(".cpf-inputmask").inputmask("999.999.999-99");

    const table = $('#funcionarios-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '{{ route('funcionarios.list') }}',
            data: function(d) {
                const formData = $('#filtroForm').serializeArray();
                formData.forEach(item => d[item.name] = item.value);
            }
        },
        columns: [
            {
                data: 'id',
                render: data => `
                    <a href="/funcionarios/${data}/edit" class="btn btn-success btn-sm me-1">Editar</a>
                    <button class="btn btn-danger btn-sm btn-delete" data-id="${data}">Excluir</button>
                `,
                orderable: false,
                searchable: false
            },
            { data: 'name' },
            { data: 'cpf' },
            { data: 'email' },
            { data: 'cargo' },
            { data: 'data_nascimento' },
            { data: 'gestor' }
        ]
    });

    $('#filtroForm').on('submit', function (e) {
        e.preventDefault();
        table.ajax.reload();
    });

    $(document).on('click', '.btn-delete', function () {
        if (confirm('Deseja realmente excluir este funcionário?')) {
            const id = $(this).data('id');
            $.ajax({
                url: `/funcionarios/${id}`,
                method: 'DELETE',
                success: function () {
                    table.ajax.reload();
                    alert('Funcionário excluído com sucesso!');
                },
                error: function () {
                    alert('Erro ao excluir funcionário.');
                }
            });
        }
    });
});
</script>
@endpush
