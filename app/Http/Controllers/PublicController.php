<?php

namespace App\Http\Controllers;

use App\Models\Jemaat;
use App\Models\Wilayah;
use App\Models\Kegiatan;
use App\Models\Pengaturan;
use Illuminate\Http\Request;

class PublicController extends Controller
{
  private function getStats()
  {
    return [
      'total_jemaat' => Jemaat::count(),
      'total_wilayah' => Wilayah::count(),
      'total_anggota' => Jemaat::sum('jumlah_anggota'),
    ];
  }

  private function getPengaturan()
  {
    return Pengaturan::all()->pluck('value', 'key')->toArray();
  }

  public function home()
  {
    $stats = $this->getStats();
    return view('content.public.home', compact('stats'));
  }

  public function peta()
  {
    $pengaturan = $this->getPengaturan();
    return view('content.public.peta', compact('pengaturan'));
  }

  public function kegiatan()
  {
    $kegiatan = Kegiatan::orderBy('tanggal', 'desc')->get();
    return view('content.public.kegiatan', compact('kegiatan'));
  }

  public function profil()
  {
    $pengaturan = $this->getPengaturan();
    $stats = $this->getStats();
    return view('content.public.profil', compact('pengaturan', 'stats'));
  }
}
