@extends('admin.layouts.app')

@section('title', 'Cadastrar Produto')

@section('content')
    <h1>Cadastrar novos Produto</h1>

    @include('admin.alerts.alerts')

    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data" class="form-control">
        @include('admin.pages.products.partials.form')

    </form>

@endsection