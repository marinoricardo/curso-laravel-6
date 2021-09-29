@extends('admin.layouts.app')

@section('title', "Detalhes do Produto {$product->name}")

@section('content')
<h1>Produto - {{ $product->name }}</h1>

<ul>
    <li><strong>Nome: </strong>{{ $product->name }}</li>
    <li><strong>Preco: </strong>{{ $product->price }}</li>
    <li><strong>Descricao: </strong>{{ $product->description }}</li>
</ul>

<form action="{{ route('products.destroy', $product->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Deletar o Produto {{ $product->name }}</button>
</form>

@endsection