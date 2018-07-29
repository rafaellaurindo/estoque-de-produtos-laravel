@extends('layout.app')

@section('title')
Listagem de produtos
@endsection

@section('content')

@if(count($produtos) <= 0)
<div class="alert alert-danger">
    Você não tem nenhum produto cadastrado.
</div>
@else
<table class="table table-hover">
    @if(old('nome'))
    <div class="alert alert-success fade show" role="alert">
        Produto <strong>{{old('nome')}}</strong> adicionado com sucesso!
    </div>
    @endif
    <thead>
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Tamanho</th>
            <th>Valor</th>
            <th>Quantidade</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        @foreach($produtos as $prod)
        <tr class="table-{{ $prod->quantidade <= 1 ? 'danger' : 'success' }}">
            <td>{{ $prod->nome }}</td>
            <td>{{ $prod->descricao }}</td>
            <td>{{ $prod->tamanho }}</td>
            <td>{{ $prod->valor }}</td>
            <td>{{ $prod->quantidade }}</td>
            <td>
                <a href="{{ action('ProdutoController@mostra', $prod->id) }}">
                    <i class="fa fa-search"></i>
                </a>

                <a href="{{ action('ProdutoController@remove', $prod->id) }}">
                    <i class="fa fa-trash text-danger"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<p>
    <span class="bg-danger text-white p-1 pull-right">
        Um ou menos itens no estoque
    </span>
</p>
@endif
@endsection