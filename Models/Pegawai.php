<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'nik',
        'nama',
        'tgl_lahir',      
        'jk',
        'no_hp',           
        'email', 
        'password',  
        'alamat',
        'kd_dinas',
        'bidang',
        'thn_masuk', 
        'bln_masuk',
        'pend_terakhir',
        'foto',
        'level'

    ];

    protected $table = 'pegawai';
}
