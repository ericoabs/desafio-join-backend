<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoriaProdutoRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use App\Models\CategoriaProduto;
use App\Models\Produto;
use Illuminate\Http\Request;

class CategoriaProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(
            CategoriaProduto::all()
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
    public function store(StoreCategoriaProdutoRequest $request)
    {
        $categoria = new CategoriaProduto();
        $categoria->nome_categoria = $request['nome_categoria'];
        $categoria->save();

        return response()->json(
            $categoria,
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(
            CategoriaProduto::findOrFail($id)
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
    public function update(UpdateCategoriaRequest $request, string $id)
    {
        $categoria = CategoriaProduto::findOrFail($id);

        if ($request->has('nome_categoria') && $categoria->nome_categoria != $request['nome_categoria']) {
            $categoria->nome_categoria = $request['nome_categoria'];
        }

        $categoria->save();

        return response()->json(
            $categoria,
            201
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria = CategoriaProduto::findOrFail($id);

        if ($categoria->produtos()->exists()) {
            return response()->json(
                ['Categoria possui produtos associados a ela'],
                422
            );
        }

        $categoria->delete();

        return response()->json(
            [],
            204
        );
    }
}
