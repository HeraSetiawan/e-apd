<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangPermintaan extends Model
{
    use HasFactory;
    
    protected $table = 'barang_permintaan';
    protected $guarded = ['id'];

    function stokBarang() {
        return $this->belongsTo(StokBarang::class);
    }

    function permintaan() {
        return $this->belongsTo(Permintaan::class);
    }

    function scopeBulan(Builder $query, $keyword) {
        $query->whereMonth('barang_permintaan.created_at', $keyword);
    }
    
    function scopeTahun(Builder $query, $keyword) {
        $query->whereYear('barang_permintaan.created_at', $keyword);
    }
}
