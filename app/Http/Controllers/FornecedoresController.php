<?php

namespace App\Http\Controllers;

use App\Http\Requests\FornecedoresFormRequest;
use App\Models\Fornecedores;
use Illuminate\Http\Request;

class FornecedoresController extends Controller
{
    public function store(FornecedoresFormRequest $request){
        $fornecedor = Fornecedores::create([
            'marca'=>$request->marca,
            'produto'=>$request->produto,
            
        ]);

        return response()->json([
            "success"=>true,
            "message"=>"Fornecedor cadastrado com sucesso",
            "data" =>$fornecedor
        ],200);
    }

    public function pesquisarPorNome(Request $request){
        $fornecedor = Fornecedores::where('marca','like', '%'. $request->marca .'%' )->get();

        if(count($fornecedor) > 0){
            return response()->json([
                'status'=>true,
                'data'=>$fornecedor
            ]);
    
        }
    }
}
