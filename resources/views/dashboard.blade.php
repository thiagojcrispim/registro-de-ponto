@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-12">
            <h4 class="text-themecolor">Bem-vindo, {{ auth()->user()->name }}</h4>
        </div>
    </div>

    @if(auth()->user()->gestor_id)
        <div class="card">
            <div class="card-body text-center">
                <h5 class="card-title">Registro de Ponto</h5>

                <form action="{{ route('registro-ponto.store') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success btn-lg">
                        <i class="fa fa-clock"></i> Registrar Ponto Agora
                    </button>
                </form>

                @if(auth()->user()->registrosPonto()->latest('data_hora')->first())
                    <p class="mt-3 text-muted">
                        Último registro:
                        <strong>
                            {{ auth()->user()->registrosPonto()->latest('data_hora')->first()->data_hora->format('d/m/Y H:i:s') }}
                        </strong>
                    </p>
                @endif
            </div>
        </div>
    @endif
</div>
@endsection
