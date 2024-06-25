<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;
    protected $guarded =[''];

    public function pindah()
    {
      return $this->hasMany(Pindah::class);
    }

    public function pindahwilyaah()
    {
      return $this->hasMany(PindahWilayah::class);
    }

    public function pendatang()
    {
      return $this->hasMany(Pendatang::class, 'warga');
    }

    public function kematian()
    {
      return $this->hasMany(Kematian::class);
    }

    public function pernikahan()
    {
      return $this->hasMany(Pernikahan::class);
    }

    public function suratKeterangan()
    {
      return $this->hasMany(SuratKeterangan::class, 'warga');
    }

    public function ketuaRtRw()
    {
      return $this->hasMany(KetuaRtRw::class);
    }

    public function pekerjaSosial()
    {
      return $this->hasMany(PekerjaSosialMasyarakat::class);
    }

    public function wpks()
    {
      return $this->hasMany(Wpk::class);
    }

}
