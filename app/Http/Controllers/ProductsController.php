<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Products;

class ProductsController extends Controller
{
    //* MOSTRAR TODOS OS PRODUTOS
    public function index()
    {
        return Products::all();
    }

    //* CRIAR PRODUTO
    public function store(Request $request)
    {
        Products::create($request->all());
    }

    //* BUSCAR UM ÚNICO PRODUTO
    public function show($id)
    {
        return Products::findOrFail($id);
    }

    //* ATUALIZAR PRODUTO
    public function update(Request $request, $id)
    {
        $products = Products::findOrFail($id);
        $products->update($request->all());
    }

    //* DELETAR PRODUTO
    public function destroy($id)
    {
        $products = Products::findOrFail($id);
        $products->delete();
    }
}