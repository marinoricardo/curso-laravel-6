@extends('admin.layouts.app')

@section('title', 'Gestão de Produtos')

@section('content')
<h1>Exibindo os Produtos</h1>
<hr>
<a href="{{ route('products.create') }}" class="btn btn-danger">Cadastrar</a>
<hr>

{{-- <form action="{{ route('products.search') }}" method="post" class="form form-inline">
    @csrf
    <input type="text" name="filter" placeholder="Filtrar por: " class="form-control">
    <button type="submit" class="btn btn-secondary">Pesquisar</button>
</form> --}}

<table border="1" class="table table-striped">
    <thead>
        <tr>
            <th>Imagem</th>
            <th>Nome</th>
            <th>Preço</th>
            <th width="100">Acções</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>
                    @if ($product->image)
                        <img src="{{ url("storage/{$product->image}") }}" alt="{{$product->image}}" style="max-width:100px">
                    @endif
                </td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}">Editar</a>
                    <a href="{{ route('products.show', $product->id) }}">Detalhes</a>
                </td>
            </tr>
        @endforeach
        
    </tbody>
</table>
{!! $products->links() !!}
@endsection