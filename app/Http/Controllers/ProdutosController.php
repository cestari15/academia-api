<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutosFormRequest;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function store(ProdutosFormRequest $request){

        $produto = Produto::create([
            'produto'=>$request->produto,
            'marca'=>$request->marca,
            'quantidade'=>$request->quantidade,
            'valor'=>$request->valor,
            
        ]);

        return response()->json([
            "success"=>true,
            "message"=>"Cliente cadastrado com sucesso",
            "data" =>$produto
        ],200);

    }

    public function pesquisarPorNome(Request $request){
        $produto = Produto::where('produto','like', '%'. $request->produto .'%' )->get();

        if(count($produto) > 0){
            return response()->json([
                'status'=>true,
                'data'=>$produto
            ]);
    
        }
    }

    
}
