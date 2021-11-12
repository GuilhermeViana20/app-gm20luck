<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Products;

class ProductsController extends Controller
{
    //* MOSTRAR TODOS OS PRODUTOS
    public function showAll()
    {
        return Products::all();
    }

    //* MOSTRAR UM ÚNICO PRODUTO
    public function showById($id)
    {
        return Products::findOrFail($id);
    }

    //* CRIAR PRODUTO
    public function create(Request $request)
    {
        Products::create($request->all());
    }

    //* ATUALIZAR PRODUTO
    public function update(Request $request, $id)
    {
        $products = Products::findOrFail($id);
        $products->update($request->all());
    }

    //* DELETAR PRODUTO
    public function delete($id)
    {
        $products = Products::findOrFail($id);
        $products->delete();
    }
}