<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RkpRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_bidang' => 'required|integer',
            'sub_bidang' => 'required|max:255',
            'jenis_kegiatan' => 'required|max:255',
            'id_lokasi' => 'required|integer',
            'perkiraan_volume' => 'required|numeric',
            'sasaran' => 'required|max:255',
            'pelaksanaan' => 'required|max:255',
            'biaya' => 'required|numeric',
            'sumber' => 'required|max:255',
            'swa_kelola' => 'required|boolean',
            'kerja_sama' => 'required|boolean',
            'pihak_ketiga' => 'required|boolean',
            'rencana_pelaksanaan' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Field ini tidak boleh kosong',
            'integer' => 'Tipe data tidak support',
            'numeric' => 'Masukan tipe data angka',
            'boolean' => 'Tipe data tidak support',
            'date' => 'Tipe data tidak support',
        ];
    }
}
