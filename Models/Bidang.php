<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    use HasFactory;

    protected $fillable = [
        'kd_dinas',
        'kd_bidang',
        'bidang'

    ];

    protected $table = 'bidang';
}
