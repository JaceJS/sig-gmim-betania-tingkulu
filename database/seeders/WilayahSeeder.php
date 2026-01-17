<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WilayahSeeder extends Seeder
{
  public function run(): void
  {
    $wilayahs = [];
    for ($i = 1; $i <= 5; $i++) {
      $wilayahs[] = [
        'nama' => 'Kolom ' . $i,
        'keterangan' => 'Wilayah Pelayanan Kolom ' . $i,
        'created_at' => now(),
        'updated_at' => now(),
      ];
    }

    DB::table('wilayah')->insert($wilayahs);
  }
}
