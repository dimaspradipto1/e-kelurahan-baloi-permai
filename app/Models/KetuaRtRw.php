<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KetuaRtRw extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function rt()
    {
        return $this->hasOne(Rt::class);
    }

    public function rw()
    {
        return $this->hasOne(Rw::class);
    }

    public function warga()
    {
        return $this->hasOne(Warga::class);
    }
    
}
