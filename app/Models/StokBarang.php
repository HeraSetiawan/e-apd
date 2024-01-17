<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class StokBarang extends Model
{
    use HasFactory;
    protected $table = 'stok_barang';
    protected $guarded = ['id'];

    public function getRouteKeyName() : String
    {
        return 'slug';
    }

    public function getFormatTanggalMasukAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_masuk'])->isoFormat('dddd, D MMMM Y');
    }

    public function BarangPermintaan() {
        return $this->hasOne(StokBarang::class);
    }

}
