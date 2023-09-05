<?php

namespace App\Http\Controllers;

use App\Http\Requests\FuncionarioFormRequest;
use App\Models\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FuncionarioController extends Controller
{
    public function store(FuncionarioFormRequest $request){
        $funcionario = Funcionario::create([
            'nome'=>$request->nome,
            'cpf'=>$request->cpf,
            'celular'=>$request->celular,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
            
        ]);

        return response()->json([
            "success"=>true,
            "message"=>"Funcionário cadastrado com sucesso",
            "data" =>$funcionario
        ],200);
    }
}
