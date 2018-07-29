@extends('layout.app')

@section('title')
    Descrição do produto {{ $produto->nome }}
@endsection

@section('content')
<ul>
    <li><strong>Nome:</strong> {{ $produto->nome }}</li>
    <li><strong>Descrição:</strong> {{ $produto->descricao or 'Sem descrição.' }}</li>
    <li><strong>Quantidade:</strong> {{ $produto->quantidade }}</li>
</ul>
@endsection