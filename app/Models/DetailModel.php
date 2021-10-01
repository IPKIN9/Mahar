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
                'id_rab',
                'kode_detail',
                'detail_jumlah',
                'created_at',
                'updated_at'
        ];
        public function rab_role()
        {
                return $this->belongsTo(RabModel::class, 'id_rab');
        }
}
