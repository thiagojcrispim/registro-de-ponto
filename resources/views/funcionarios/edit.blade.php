@extends('layouts.app')

@section('title', 'Editar funcionário')

@section('content')
<div class="container-fluid">
  <div class="row page-titles">
    <div class="col-md-5 align-self-center">
      <h4 class="text-themecolor">Editar funcionário</h4>
    </div>
  </div>

  @include('funcionarios.form', [
      'funcionario' => $funcionario,
      'formAction' => route('funcionarios.update', $funcionario),
      'formMethod' => 'PUT'
  ])
@endsection


