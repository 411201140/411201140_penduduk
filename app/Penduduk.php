<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $fillable = ['nik', 'nama', 'jenis_kelamin', 'tgl_lahir', 'umur_bulan', 'propinsi_id', 'kota_id', 'alamat_pasien', 'rt', 'rw'];
}
