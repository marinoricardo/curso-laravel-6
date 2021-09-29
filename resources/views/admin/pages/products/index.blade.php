@extends('admin.layouts.app')

@section('title', 'Gestão de Produtos')

@section('content')
<h1>Exibindo os Produtos</h1>
<hr>
<a href="{{ route('products.create') }}" class="btn btn-danger">Cadastrar</a>
<hr>

<table border="1" class="table table-striped">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Preço</th>
            <th width="100">Acções</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <a href="">Detalhes</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{!! $products->links() !!}
@endsection