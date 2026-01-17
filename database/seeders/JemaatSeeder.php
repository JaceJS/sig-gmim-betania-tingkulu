<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class JemaatSeeder extends Seeder
{
  public function run(): void
  {
    $faker = Faker::create('id_ID');
    $wilayahIds = DB::table('wilayah')->pluck('id')->toArray();

    // Church location
    $baseLat = 1.4748;
    $baseLng = 124.8421;

    $jemaat = [];
    for ($i = 0; $i < 20; $i++) {
      // Generate random coordinate around church (approx 1-2km radius)
      $lat = $baseLat + ($faker->randomFloat(6, -0.01, 0.01));
      $lng = $baseLng + ($faker->randomFloat(6, -0.01, 0.01));

      $jemaat[] = [
        'wilayah_id' => $faker->randomElement($wilayahIds),
        'nama_kepala_keluarga' => $faker->name('male'),
        'alamat' => $faker->address,
        'no_telepon' => $faker->phoneNumber,
        'jumlah_anggota' => $faker->numberBetween(1, 6),
        'keterangan' => 'Jemaat Aktif',
        'latitude' => $lat,
        'longitude' => $lng,
        'created_at' => now(),
        'updated_at' => now(),
      ];
    }

    DB::table('jemaat')->insert($jemaat);
  }
}
