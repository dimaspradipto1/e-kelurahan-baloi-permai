<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wksbm extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function rt()
    {
        return $this->belongsTo(rt::class);
    }

    public function rw()
    {
        return $this->belongsTo(rw::class);
    }
}
