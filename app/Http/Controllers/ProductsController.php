<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Exception;
use App\Models\Products;

class ProductsController extends Controller
{
    //* MOSTRAR TODOS OS PRODUTOS
    public function showAll()
    {
        $products = new Products();
        return $products = $products->orderBy('nome')->get();
    }

    //* MOSTRAR UM ÚNICO PRODUTO
    public function showById($id)
    {
        return Products::findOrFail($id);
    }

    //* CRIAR PRODUTO
    public function create(Request $request)
    {
        try {
            DB::beginTransaction();

            $tipo = $request->tipo ? $request->tipo : null;
            $marca = $request->marca ? $request->marca : null;
            $nome = $request->nome ? $request->nome : null;
            $tamanho = $request->tamanho ? $request->tamanho : null;
            $genero = $request->genero ? $request->genero : null;
            $sku = $request->sku ? $request->sku : null;
            $quantidade_atual = $request->quantidade_atual ? $request->quantidade_atual : null;
            $quantidade_antiga = $quantidade_atual;

            if( (empty($tipo)) || (empty($marca)) || (empty($nome)) || (empty($tamanho)) || (empty($genero)) || (empty($sku)) || (empty($quantidade_atual)) || (empty($quantidade_antiga)) ) {
                return Response::json([
                    'sucesso'=> false,
                    'mensagem'=> 'Ops! Preencha todos os campos obrigatórios!',
                ], 200);
            } else {
                Products::create([
                    'tipo' => $tipo,
                    'marca' => $marca,
                    'nome' => $nome,
                    'tamanho' => $tamanho,
                    'genero' => $genero,
                    'sku' => $sku,
                    'quantidade_atual' => $quantidade_atual,
                    'quantidade_antiga' => $quantidade_antiga,
                ]);
                
                DB::commit();
                return Response::json([
                    'sucesso'=> true,
                    'mensagem'=> 'Produto criado com sucesso!',
                ], 200);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return Response::json([
                'sucesso'=> false,
                'mensagem'=> 'Ops! Não foi possivel realizar esta ação!',
                'dados'=> $e->getMessage(),
            ], 400);
        }
    }

    //* ATUALIZAR PRODUTO
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $products = Products::findOrFail($id);
    
            $dados = ([
                'tipo' => $request->tipo ? $request->tipo : null,
                'marca' => $request->marca ? $request->marca : null,
                'nome' => $request->nome ? $request->nome : null,
                'tamanho' => $request->tamanho ? $request->tamanho : null,
                'genero' => $request->genero ? $request->genero : null,
                'sku' => $request->sku ? $request->sku : null,
                'quantidade_antiga' => $products->quantidade_atual,
                'quantidade_atual' => $request->quantidade_atual ? $request->quantidade_atual : null,
            ]);
    
            $products->tipo = $dados['tipo'];
            $products->marca = $dados['marca'];
            $products->nome = $dados['nome'];
            $products->tamanho = $dados['tamanho'];
            $products->genero = $dados['genero'];
            $products->sku = $dados['sku'];
            $products->quantidade_antiga = $dados['quantidade_antiga'];
            $products->quantidade_atual = $dados['quantidade_atual'];
    
            $products->save();

            DB::commit();
            return Response::json([
                'sucesso'=> true,
                'mensagem'=> 'Produto atualizado com sucesso!',
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return Response::json([
                'sucesso'=> false,
                'mensagem'=> 'Ops! Não foi possivel realizar esta ação!',
                'dados'=> $e->getMessage(),
            ], 400);
        }
    }

    //* DELETAR PRODUTO
    public function delete($id)
    {
        try {
            DB::beginTransaction();

            $products = Products::findOrFail($id);
            $products->delete();

            DB::commit();

            return Response::json([
                'sucesso'=> true,
                'mensagem'=> 'Produto removido com sucesso!',
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();

            return Response::json([
                'sucesso'=> false,
                'mensagem'=> 'Ops! Não foi possivel realizar esta ação!',
                'dados'=> $e->getMessage(),
            ], 400);
        }
    }

    public function history()
    {
        try {
            $products = new Products();
            $products = $products->orderBy('nome')->get();
    
            foreach ($products as $key => $product) {
                $product->criado_em = date('d/m/Y H:i:s', strtotime($product->created_at));
                $product->atualizado_em = date('d/m/Y H:i:s', strtotime($product->updated_at));
                
                $dados[$key] = ([
                    'sku' => $product->sku ? $product->sku : null,
                    'quantidade_atual' => $product->quantidade_atual ? $product->quantidade_atual : null,
                    'quantidade_antiga' => $product->quantidade_antiga ? $product->quantidade_antiga : null,
                    'criado_em' => $product->criado_em ? $product->criado_em : null,
                    'atualizado_em' => $product->atualizado_em ? $product->atualizado_em : null,
                ]);
            }
    
            return Response::json([
                'sucesso'=> true,
                'dados' => $dados
            ], 200);
        } catch (\Exception $e) {
            return Response::json([
                'sucesso'=> false,
                'mensagem'=> 'Ops! Não foi possivel realizar esta ação!',
                'dados'=> $e->getMessage(),
            ], 400);
        }
    }
}