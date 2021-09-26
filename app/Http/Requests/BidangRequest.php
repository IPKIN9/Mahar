<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BidangRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama_bidang' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Field ini tidak boleh kosong'
        ];
    }
}
