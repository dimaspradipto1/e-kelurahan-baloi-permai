<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pindah extends Model
{
    use HasFactory;
    protected $guarded = [''];

    public function warga()
    {
      return $this->belongsTo(Warga::class);
    }

    public function kelurahan()
    {
      return $this->belongsTo(Kelurahan::class);
    }

    public function kecamatan()
    {
      return $this->belongsTo(Kecamatan::class);
    }
}
