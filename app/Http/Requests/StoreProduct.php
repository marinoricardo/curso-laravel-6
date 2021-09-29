<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'nome' => 'required | min:3 | max:250',
            'descricao' => 'required | min:3 | max:250',
            'photo' => 'required | image',
        ];
    }

    public function messages(){
        return [
            'nome.required' => 'Nome deve ser obrigatorio',
            'nome.min' => 'Ops, precisa de 3 caracteres no minimo'
        ];
    }
}
