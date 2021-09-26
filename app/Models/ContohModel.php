<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContohModel extends Model
{
    use HasFactory;
    protected $table = 'contoh';
    protected $fillable = [
        'id', 'contoh', 'created_at', 'updated_at'
    ];
}
