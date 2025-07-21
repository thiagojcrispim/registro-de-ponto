@extends('layouts.app')

@section('title', 'Cadastro de Funcionário')

@section('content')
<div class="container-fluid">
  <div class="row page-titles">
    <div class="col-md-5 align-self-center">
      <h4 class="text-themecolor">Cadastro de funcionário</h4>
    </div>
  </div>

  @include('funcionarios.form', [
      'funcionario' => null,
      'formAction' => route('funcionarios.store'),
      'formMethod' => 'POST'
  ])
@endsection



