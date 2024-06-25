<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lk3 extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function rt()
    {
        return $this->belongsTo(RT::class);
    }

    public function rw()
    {
        return $this->belongsTo(RW::class);
    }
}
