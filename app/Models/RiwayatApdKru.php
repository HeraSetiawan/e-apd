<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatApdKru extends Model
{
    use HasFactory;
    protected $table = 'riwayat_apd_kru';
    protected $guarded = ['id']; 


    function karyawan() {
        return $this->belongsTo(Karyawan::class);
    }
}
