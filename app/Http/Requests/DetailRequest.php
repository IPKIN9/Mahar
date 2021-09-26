<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetailRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        return [
            'kode_detail' => 'required',
            'volume' => 'required',
            'harga_satuan' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Field ini tidak boleh kosong'
        ];
    }
}
