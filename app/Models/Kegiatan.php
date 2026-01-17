<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $table = 'kegiatan';

    protected $fillable = [
        'nama',
        'tanggal',
        'waktu',
        'tempat',
        'deskripsi',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'waktu' => 'datetime:H:i',
    ];
}
