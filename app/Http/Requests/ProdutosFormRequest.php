<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProdutosFormRequest extends FormRequest
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
            'produto'=>'required|max:200|min:2',
            'marca'=>'required|max:50|min:2',
            'quantidade'=>'required|min:100',
            'valor'=>'required|min:2'
        ];
    }

    public function failedValidator(Validator $validator){
        throw new HttpResponseException(
            response()->json([
                'success'=>false,
                'error'=> $validator->errors()
            ])
            );
    }

    public function messages(){
        return [
            'produto.required' => 'preencha o campo',
            'produto.max' => 'o nome deve conter no máximo 200 caracteris',
            'produto.min' => 'o nome deve conter no minimo 2 caracteris',
            'marca.required' => 'preencha o campo',
            'marca.max' => 'o campo deve conter no máximo 50 caracteris',
            'marca.min' => 'o campo deve no minimo 1 caracteris',
            'quantidade.required' => 'preencha o campo',
            'quantidade.min' => 'o campo deve conter no minimo 2 ',
            'valor.required' => 'preencha o campo',
            'valor.min' => 'o campo deve conter no minimo 2 ',
        ];
    }
}
