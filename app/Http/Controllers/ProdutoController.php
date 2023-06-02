<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProdutoRequest;
use App\Http\Requests\UpdateProdutoRequest;
use App\Models\CategoriaProduto;
use App\Models\Produto;
use DateTime;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(
            Produto::all()
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProdutoRequest $request)
    {
        $categoria = CategoriaProduto::find($request['id_categoria_produto']);
        $produto = new Produto();
        $produto->data_cadastro = new DateTime();
        $produto->nome_produto = $request['nome_produto'];
        $produto->valor_produto = $request['valor_produto'];
        $categoria->produtos()->save($produto);

        return response()->json(
            $produto,
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(
            Produto::findOrFail($id)
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdutoRequest $request, string $id)
    {
        $produto = Produto::findOrFail($id);

        if ($request->has('id_categoria_produto') && $produto->id_categoria_produto != $request['id_categoria_produto']) {
            $produto->id_categoria_produto = $request['id_categoria_produto'];
        }

        if ($request->has('nome_produto') && $produto->nome_produto != $request['nome_produto']) {
            $produto->nome_produto = $request['nome_produto'];
        }

        if ($request->has('valor_produto') && $produto->valor_produto != $request['valor_produto']) {
            $produto->valor_produto = $request['valor_produto'];
        }

        $produto->save();

        return response()->json(
            $produto,
            201
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produto = Produto::findOrFail($id);

        $produto->delete();

        return response()->json(
            [],
            204
        );
    }
}
