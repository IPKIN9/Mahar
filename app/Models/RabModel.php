<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RabModel extends Model
{
    use HasFactory;
    protected $table = "rab";
    protected $fillable = [
        'id',
        'id_bidang',
        'nama_pengeluaran',
        'jumlah',
        'created_at',
        'updated_at'
    ];

    public function bidang_role()
    {
    return $this->belongsTo(BidangModel::class);
    }
  
}
