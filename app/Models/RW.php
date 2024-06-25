<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RW extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function warga()
    {
        return $this->hasMany(Warga::class);
    }

    public function pindah()
    {
        return $this->hasMany(Pindah::class);
    }

    public function kematian()
    {
        return $this->hasMany(Kematian::class);
    }

    public function pendatang()
    {
        return $this->hasMany(Pendatang::class);
    }

    public function PindahWilayah()
    {
        return $this->hasMany(PindahWilayah::class);
    }
}
