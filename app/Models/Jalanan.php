<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jalanan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function warga()
    {
        return $this->hasMany(Warga::class);
    }

    public function rt()
    {
        return $this->hasMany(Rt::class);
    }

    public function rw()
    {
        return $this->hasMany(Rw::class);
    }
}
