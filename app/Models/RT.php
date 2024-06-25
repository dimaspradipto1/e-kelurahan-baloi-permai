<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RT extends Model
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
    
    public function pendatang()
    {
        return $this->hasMany(Pendatang::class);
    }

    public function kematian()
    {
        return $this->hasMany(Kematian::class);
    }

    public function fasum()
    {
        return $this->hasMany(Fasum::class);
    }

    public function panti_asuhan()
    {
        return $this->hasMany(PantiAsuhan::class);
    }

    public function PindahWilayah()
    {
        return $this->hasMany(PindahWilayah::class, 'rt_id', 'id');
    }
    
}
