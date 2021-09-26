<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PemutakhiranRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'jenis_temuan' => 'required',
            'pagu_anggaran' => 'required',
            'ket' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Field ini tidak boleh kosong'
        ];
    }
}
