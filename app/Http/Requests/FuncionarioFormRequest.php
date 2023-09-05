<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class FuncionarioFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|max:80|min:5',
            'cpf' => 'required|max:11|min:11|unique:clientes,cpf',
            'celular' => 'required|max:15|min:10',
            'email' => 'required|email|unique:clientes,email',
            'password' => 'required|'
        ];
    }

    public function failedValidator(Validator $validator){
        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'error' => $validator->errors()
            ])
            );
    }

    public function messages(){
        return [
            'nome.required' => 'preencha o campo',
            'nome.max' => 'o nome deve conter no máximo 80 caracteris',
            'nome.min' => 'o nome deve conter no minimo 5 caracteris',
            'cpf.required' => 'preencha o campo',
            'cpf.max' => 'o campo deve conter 11 caracteris',
            'cpf.min' => 'o campo deve no minimo 11 caracteris',
            'cpf.unique' => 'esse cpf já foi cadastrado no sisitema',
            'celular.required' => 'preencha o campo',
            'celular.max' => 'o campo deve conter no maximo 15',
            'celular.min' => 'o campo deve conter no minimo 10 ',
            'email.required' =>  'email obrigatório',
            'email.email' => 'formato inválido',
            'email.unique' => 'email já cadastrado no sistema',
            'password.required' => 'Senha obrigatória'
        ];
    }

}
