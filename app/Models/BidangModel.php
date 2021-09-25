<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidangModel extends Model
{
    use HasFactory;
    protected $table = "bidang";
    protected $fillable = [
        'id',
        'nama_bidang',
        'created_at',
        'updated_at'
    ];
}
