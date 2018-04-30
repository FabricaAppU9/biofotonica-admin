<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoencaRequestForm extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'cid'           =>  'required',
            'nome_doenca'   =>  'required',
        ];
    }

    public function messages() {
        return [
            'cid.required'      =>  "O campo 'C.I.D' não pode estar vazio.",
            'nome_doenca'       =>  "O campo 'Nome da Doença' não pode estar vazio",
        ];
    }

}
