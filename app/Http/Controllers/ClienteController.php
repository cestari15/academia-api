<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteFormRequest;
use App\Models\ClienteModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function store(ClienteFormRequest $request){

        $Cliente = ClienteModel::create([
            'nome'=>$request->nome,
            'cpf'=>$request->cpf,
            'celular'=>$request->celular,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        return response()->json([
            "success"=>true,
            "message"=>"Cliente cadastrado com sucesso",
            "data" =>$Cliente
        ],200);
    }
}
