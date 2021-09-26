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
        'id_detail',
        'jumlah',
        'created_at',
        'updated_at'
    ];

    public function bidang_role()
    {
        return $this->belongsTo(BidangModel::class, 'id_bidang');
    }
    public function detail_role()
    {
        return $this->belongsTo(DetailModel::class, 'id_detail');
    }
}
