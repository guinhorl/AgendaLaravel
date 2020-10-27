<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'inputTitulo' => 'required',
            'inputPagina' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'inputTitulo.required' => 'Um título é obrigatório para cadastrar!!',
            'inputPagina.numeric' => 'Só texto numérico é obrigatório!!',
        ];
    }


}
