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
        'kode',
        'id_bidang',
        'id_rkp',
        'nama_pengeluaran',
        'jumlah',
        'created_at',
        'updated_at'
    ];

    public function bidang_role()
    {
        return $this->belongsTo(BidangModel::class, 'id_bidang');
    }
    public function rkp_role()
    {
        return $this->belongsTo(RkpModel::class, 'id_rkp');
    }
}
