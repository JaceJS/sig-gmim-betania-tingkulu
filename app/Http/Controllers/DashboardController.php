<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jemaat;
use App\Models\Wilayah;
use App\Models\Kegiatan;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_jemaat' => Jemaat::count(),
            'total_wilayah' => Wilayah::count(),
            'total_anggota' => Jemaat::sum('jumlah_anggota'),
            'total_kegiatan' => Kegiatan::count(),
        ];

        return view('content.sig.dashboard', compact('stats'));
    }
}
