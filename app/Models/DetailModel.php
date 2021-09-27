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
        'id_rab',
        'kode_detail',
        'volume',
        'harga_satuan',
        'created_at',
        'updated_at'
    ];
    public function rab_role()
    {
    return $this->belongsTo(RabModel::class, 'id_rab');
    }
}
