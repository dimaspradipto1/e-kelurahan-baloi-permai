<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BWBLP extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }

    public function rw()
    {
        return $this->belongsTo(RW::class);
    }

    public function rt()
    {
        return $this->belongsTo(RT::class);
    }
}
