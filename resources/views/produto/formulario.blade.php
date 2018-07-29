@extends('layout.app')

@section('title')
Adicionar novo produto
@endsection

@section('content')
@if(count($errors) > 0)
    <div class="alert alert-danger fade show" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="/produtos/adiciona" method="POST">
    @csrf

    <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" class="form-control" id="nome" name="nome" required value="{{ old('nome') }}">
    </div>
    <div class="form-group">
        <label for="quantidade">Quantidade:</label>
        <input type="number" class="form-control" id="quantidade" name="quantidade" required value="{{ old('quantidade') }}">
    </div>
    <div class="form-group">
        <label for="tamanho">Tamanho:</label>
        <input type="text" class="form-control" id="tamanho" name="tamanho" required value="{{ old('tamanho') }}">
    </div>
    <div class="form-group">
        <label for="valor">Valor:</label>
        <input type="text" class="form-control" id="valor" name="valor" required value="{{ old('valor') }}">
    </div>
    <div class="form-group">
        <label for="descricao">Descrição:</label>
        <textarea class="form-control" id="descricao" name="descricao" required>{{ old('descricao') }}</textarea>
    </div>
    <input type="submit" class="btn btn-primary">
</form>
@endsection