<?php

namespace estoque\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;
use Validator;
use estoque\Produto;
use estoque\Http\Requests\ProdutosRequest;

class ProdutoController extends Controller {
	
	public function lista()
	{
		$produtos = Produto::all();
		
		return view('produto.listagem')
		->withProdutos($produtos);
	}
	
	public function mostra()
	{
		$id = Request::route('id', '1');
		$produto = Produto::find($id);
		return view('produto.detalhes')->with('produto', $produto);
	}
	
	public function novo()
	{
		return view('produto.formulario');
	}
	
	public function adiciona(ProdutosRequest $request)
	{

		Produto::create($request->all());

		return redirect()
		->action('ProdutoController@lista')
		->withInput($request->only('nome'));
	}
	
	public function listaJson()
	{
		$produtos = Produto::all();
		return response()->json($produtos);
	}

	public function remove($id)
	{
		// $id = Request::route('id');

		$produto = Produto::find($id);
		$produto->delete();

		// return redirect('/produtos');
		return redirect()->action('ProdutoController@lista');
	}
}