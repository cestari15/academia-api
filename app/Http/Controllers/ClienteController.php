<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteFormRequest;
use App\Models\ClienteModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function store(ClienteFormRequest $request){

        $cliente = ClienteModel::create([
            'nome'=>$request->nome,
            'cpf'=>$request->cpf,
            'celular'=>$request->celular,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        return response()->json([
            "success"=>true,
            "message"=>"Cliente cadastrado com sucesso",
            "data" =>$cliente
        ],200);
    }

    public function pesquisarPorNome(Request $request){
        $cliente = ClienteModel::where('nome','like', '%'. $request->nome .'%' )->get();

        if(count($cliente) > 0){
            return response()->json([
                'status'=>true,
                'data'=>$cliente
            ]);
    
        }
    }
}
