<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Karyawan extends Authenticatable
{
    use HasFactory;

    public $table = 'karyawan';
    public $guarded = ['id'];

    public function isSuperAdmin()
    {
        return $this->role === 'SA';
    }

    public function isAdmin()
    {
        return $this->role === 'SS';
    }

    public function isKru()
    {
        return $this->role === 'KRU';
    }

    public function isAsisten()
    {
        return $this->role === 'AS';
    }

}
