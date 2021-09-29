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
        $id = $this->segment(2);
        return [
            //
            'name' => "required | min:3 | max:250 | unique:products,name,{$id},id",
            'description' => 'required | min:3 | max:250',
            'price' => 'required',
            'image' => 'nullable | image',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Nome deve ser obrigatorio',
            'name.min' => 'Ops, precisa de 3 caracteres no minimo'
        ];
    }
}
