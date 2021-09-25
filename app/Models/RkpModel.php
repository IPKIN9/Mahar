<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RkpModel extends Model
{
    use HasFactory;
    protected $table = "rkp";
    protected $fillable = [
        'id',
        'id_bidang',
        'sub_bidang',
        'jenis_kegiatan',
        'id_lokasi',
        'perkiraan_volume',
        'sasaran',
        'pelaksanaan',
        'biaya',
        'sumber',
        'swa_kelola',
        'kerja_sama',
        'pihak_ketiga',
        'rencana_pelaksanaan',
        'created_at',
        'updated_at'
    ];
}
