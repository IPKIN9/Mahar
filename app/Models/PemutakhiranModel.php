<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemutakhiranModel extends Model
{
    use HasFactory;
    protected $table = "pemutakhiran";
    protected $fillable = [
        'id',
        'jenis_temuan',
        'pagu_anggaran',
        'ket',
        'created_at',
        'updated_at'
    ];
}
