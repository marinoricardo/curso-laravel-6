@extends('admin.layouts.app')

@section('title', 'Cadastrar Produto')

@section('content')
    <h1>Editando Produto {{ $product->id }}</h1>

    <form action="{{ route('products.update',$product->id) }}" method="post" enctype="multipart/form-data" class="form-control">
        @method('PUT')

        @include('admin.pages.products.partials.form')

    </form>

@endsection