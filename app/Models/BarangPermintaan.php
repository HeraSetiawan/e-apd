<?php

namespace App\Models;

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
}
