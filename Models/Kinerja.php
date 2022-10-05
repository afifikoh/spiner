<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kinerja extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl',
        'foto',
        'doc',
        'hasil'
        'id_users',
        'angka',
        'status',
    ];
    protected $table = 'kinerja';
    
    public function nama_pgw()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
}
