<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FonteRequestForm extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'nm_fonte' => 'required',
            'fabricante' => 'required',
            'modelo' => 'required',
        ];
    }

    public function messages() {
        return [
            'nm_fonte.required' => "O campo 'Nome da Fonte' não pode estar vázio.",
            'fabricante.required' => "O campo 'Nome do Fabricante' não pode estar vázio",
            'modelo.required' => "O campo 'Modelo' não pode estar vázio",
        ];
    }

}
