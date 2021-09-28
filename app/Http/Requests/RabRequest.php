<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RabRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_bidang' => 'required|integer',
            'nama_pengeluaran' => 'required|max:255',
            'jumlah' => 'required|numeric',
            'uraian' => 'required',
            'volume' => 'required|numeric',
            'harga_satuan' => 'required|numeric',
            'detail-jumlah' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Field ini tidak boleh kosong',
            'integer' => 'Tipe data tidak valid',
            'max' => 'Data terlalu panjang',
            'numeric' => 'Tipe data tidak valid',
        ];
    }
}
