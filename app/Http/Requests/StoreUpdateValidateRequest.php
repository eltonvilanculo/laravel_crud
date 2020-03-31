<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateValidateRequest extends FormRequest
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
//        products -> nome da tabela
//        Uma vez que o nome do produto eh unico , ele valida quando submetemos com o nome antigo , pra tal criamos uma excepcao : product_name',{$id} ,product_id
        $id =  $this->segment(2);
        return [
            'product_name' => "required|min:4|max:25|unique:products,product_name,{$id} ,product_id",
            'product_desc'=>'required|min:8|max:200'
        ];
    }
    //metodo subcrito
    public function messages()
    {
        return [
          'product_name.required'=>'O campo eh obrigatorio',
           'product_name.min'=>'o campo  deve ter mais caracteres',
            'product_name.unique' =>'O produto deve ter o nome unico , aumente a quantidade'

        ];
    }
}
