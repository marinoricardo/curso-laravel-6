@extends('admin.layouts.app')

@section('title', 'Cadastrar Produto')

@section('content')
    <h1>Editando Produto {{ $id }}</h1>

    <form action="{{ route('products.update', $id) }}" method="post">
        @csrf 
        {{-- <input type="hidden" name="_method" value="PUT"> --}}
        @method('PUT')
        <input type="text" name="nome" placeholder="Nome: ">
        <input type="text" name="descricao" placeholder="Descricao: ">
        <button type="submit">Enviar</button>

    </form>

@endsection