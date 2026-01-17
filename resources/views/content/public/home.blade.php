@extends('layouts/public_layout')

@section('title', 'Beranda - SIG GMIM Betania Tingkulu')

@section('content')
  <div class="container">
    <!-- Hero Section -->
    <div class="text-center py-5">
      <h1 class="display-5 fw-bold text-primary">Selamat Datang</h1>
      <p class="lead">Sistem Informasi Geografis Jemaat GMIM Betania Tingkulu</p>
      <hr class="my-4">
      <p>Temukan informasi tentang wilayah pelayanan, sebaran jemaat, dan kegiatan gereja kami.</p>
      <div class="d-flex gap-3 justify-content-center mt-4">
        <a href="{{ url('/peta-jemaat') }}" class="btn btn-primary btn-lg">
          <i class="bx bx-map me-2"></i>Lihat Peta Jemaat
        </a>
        <a href="{{ url('/kegiatan-gereja') }}" class="btn btn-outline-primary btn-lg">
          <i class="bx bx-calendar me-2"></i>Kegiatan
        </a>
      </div>
    </div>

    <!-- Stats -->
    <div class="row g-4 py-5">
      <div class="col-md-4">
        <div class="card text-center h-100 border-0 shadow-sm">
          <div class="card-body">
            <i class="bx bx-map-alt text-primary" style="font-size: 3rem;"></i>
            <h3 class="mt-3">{{ $stats['total_wilayah'] }}</h3>
            <p class="text-muted mb-0">Wilayah Pelayanan</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card text-center h-100 border-0 shadow-sm">
          <div class="card-body">
            <i class="bx bx-group text-success" style="font-size: 3rem;"></i>
            <h3 class="mt-3">{{ $stats['total_jemaat'] }}</h3>
            <p class="text-muted mb-0">Kepala Keluarga</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card text-center h-100 border-0 shadow-sm">
          <div class="card-body">
            <i class="bx bx-user text-info" style="font-size: 3rem;"></i>
            <h3 class="mt-3">{{ $stats['total_anggota'] }}</h3>
            <p class="text-muted mb-0">Total Jemaat</p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
