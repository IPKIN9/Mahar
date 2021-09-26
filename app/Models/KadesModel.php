<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KadesModel extends Model
{
    use HasFactory;
    protected $table = "kades";
    protected $fillable = [
        'id',
        'nip',
        'nama',
        'created_at',
        'updated_at'
    ];
}
