<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jemaat extends Model
{
    protected $table = 'jemaat';

    protected $fillable = [
        'wilayah_id',
        'nama_kepala_keluarga',
        'alamat',
        'latitude',
        'longitude',
        'no_telepon',
        'jumlah_anggota',
        'keterangan',
    ];

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class);
    }
}
