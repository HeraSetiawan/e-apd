<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permintaan extends Model
{
    use HasFactory;

    protected $table = 'permintaan';
    protected $guarded = ['id'];

    public function getFormatTanggalAttribute()
    {
        return Carbon::parse($this->attributes['tanggal'])->isoFormat('D-MM-YYYY');
    }

    function barang_permintaan() {
        return $this->hasMany(BarangPermintaan::class);
    }
}
