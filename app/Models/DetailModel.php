<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailModel extends Model
{
    use HasFactory;
    protected $table = "detail";
    protected $fillable = [
        'id',
        'uraian',
        'kode_detail',
        'volume',
        'harga_satuan',
        'jumlah',
        'created_at',
        'updated_at'
    ];
}
