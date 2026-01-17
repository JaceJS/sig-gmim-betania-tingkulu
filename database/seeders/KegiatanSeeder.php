<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KegiatanSeeder extends Seeder
{
  public function run(): void
  {
    $kegiatan = [
      [
        'nama' => 'Ibadah Minggu',
        'tanggal' => Carbon::parse('next Sunday'),
        'waktu' => '09:00:00',
        'tempat' => 'Gereja GMIM Betania',
        'deskripsi' => 'Ibadah Raya Minggu pagi.',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'nama' => 'Ibadah Pemuda',
        'tanggal' => Carbon::parse('next Friday'),
        'waktu' => '19:00:00',
        'tempat' => 'Gedung Serbaguna',
        'deskripsi' => 'Ibadah rutin pemuda dan remaja.',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'nama' => 'Kerja Bakti',
        'tanggal' => Carbon::parse('next Saturday'),
        'waktu' => '07:00:00',
        'tempat' => 'Halaman Gereja',
        'deskripsi' => 'Membersihkan lingkungan gereja.',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'nama' => 'Rapat Majelis',
        'tanggal' => Carbon::parse('next month first monday'),
        'waktu' => '18:00:00',
        'tempat' => 'Ruang Rapat',
        'deskripsi' => 'Evaluasi program pelayanan.',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'nama' => 'Latihan Paduan Suara',
        'tanggal' => Carbon::parse('next Thursday'),
        'waktu' => '17:00:00',
        'tempat' => 'Gereja',
        'deskripsi' => 'Persiapan untuk ibadah minggu.',
        'created_at' => now(),
        'updated_at' => now(),
      ],
    ];

    DB::table('kegiatan')->insert($kegiatan);
  }
}
