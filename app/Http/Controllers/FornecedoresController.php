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
}
