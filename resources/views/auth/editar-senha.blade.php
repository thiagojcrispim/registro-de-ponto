@extends('layouts.app')

@section('title', 'Alterar Senha')

@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 align-self-center">
            <h4 class="text-themecolor">Alterar Senha</h4>
        </div>
    </div>

    @if (session('status') === 'password-updated')
        <div class="alert alert-success">
            Senha atualizada com sucesso!
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('senha.atualizar') }}">
                @csrf

                <div class="form-group">
                    <label>Senha Atual</label>
                    <input type="password" name="current_password" class="form-control @error('current_password', 'updatePassword') is-invalid @enderror" required>
                    @error('current_password', 'updatePassword')
                        <span class="invalid-feedback d-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Nova Senha</label>
                    <input type="password" name="password" class="form-control @error('password', 'updatePassword') is-invalid @enderror" required>
                    @error('password', 'updatePassword')
                        <span class="invalid-feedback d-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Confirme a Nova Senha</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>

                <button class="btn btn-primary">Atualizar Senha</button>
            </form>
        </div>
    </div>
</div>
@endsection
