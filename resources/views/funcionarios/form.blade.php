@php use Carbon\Carbon; @endphp
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <form id="clienteForm" action="{{ $formAction }}" method="POST">
            @csrf
            @if($formMethod === 'PUT')
                @method('PUT')
            @endif
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nome completo</label>
                        <input type="text" name="name"  class="form-control" value="{{ old('name', $funcionario->name ?? '') }}" required>
                        @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>CPF</label>
                        <input type="text" name="cpf"  class="form-control cpf-inputmask" value="{{ old('cpf', $funcionario->cpf ?? '') }}" required maxlength="14">
                        @error('cpf')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $funcionario->email ?? '') }}">
                        @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="password">Senha {{ isset($funcionario) ? '(deixe em branco para não alterar)' : '' }}</label>
                        <input type="password" name="password" class="form-control" {{ isset($funcionario) ? '' : 'required' }}>
                        @error('password')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                </div>


            </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Data de Nascimento</label>
                        <input type="date" name="data_nascimento" class="form-control date-inputmask" value="{{ old('data_nascimento', optional($funcionario->data_nascimento ?? null)->format('Y-m-d')) }}">
                        @error('data_nascimento')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="cargo">Cargo</label>
                        <input type="text" name="cargo" class="form-control" value="{{ old('cargo', $funcionario->cargo ?? '') }}" required>
                        @error('cargo')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                </div>
                <div class="col-md-2">
                    <label>CEP</label>
                    <input type="text" name="cep" id="cep" class="form-control" value="{{ old('cep', $funcionario->cep ?? '') }}" required>
                    @error('cep')<small class="text-danger">{{ $message }}</small>@enderror
                </div>
                <div class="col-md-6">
                    <label>Endereço</label>
                    <input type="text" name="endereco" id="endereco" class="form-control" value="{{ old('endereco', $funcionario->endereco ?? '') }}" readonly>
                    @error('endereco')<small class="text-danger">{{ $message }}</small>@enderror
                </div>
                <div class="col-12 text-end mt-3">
                    <button type="submit" class="btn btn-primary text-white">Salvar</button>
                    <button type="reset" class="btn btn-secondary">Limpar</button>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@push('scripts')
<script>

$(function () {
    $("#cep").blur(function(){
        let cep = this.value.replace(/\D/g, '');
        if (cep.length === 8) {
            fetch(`https://viacep.com.br/ws/${cep}/json/`)
                .then(res => res.json())
                .then(data => {
                    if (!data.erro) {
                        document.getElementById('endereco').value =
                            `${data.logradouro}, ${data.bairro}, ${data.localidade} - ${data.uf}`;
                    }
                });
        }
    });

    $(".cpf-inputmask").inputmask("999.999.999-99");
    $(".date-inputmask").inputmask("datetime", {
        inputFormat: "dd/mm/yyyy",
        placeholder: "dd/mm/aaaa",
        showMaskOnHover: false
    });
    $('.select2').select2({ width: '100%' });
});


</script>
@endpush
