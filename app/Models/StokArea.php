<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokArea extends Model
{
    use HasFactory;

    protected $table = 'stok_area';
    protected $guarded = ['id'];
}
