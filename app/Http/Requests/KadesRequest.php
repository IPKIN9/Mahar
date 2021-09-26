<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KadesRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nip' => 'required',
            'nama' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Field ini tidak boleh kosong'
        ];
    }
}
