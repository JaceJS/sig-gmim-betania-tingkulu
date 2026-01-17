@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - SIG GMIM')

@section('content')
  <div class="row">
    <!-- Statistik Cards -->
    <div class="col-lg-3 col-md-6 col-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between mb-4">
            <div class="avatar flex-shrink-0">
              <span class="avatar-initial rounded bg-label-primary">
                <i class="bx bx-group"></i>
              </span>
            </div>
          </div>
          <p class="mb-1">Total Jemaat</p>
          <h4 class="card-title mb-0">{{ $stats['total_jemaat'] }}</h4>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 col-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between mb-4">
            <div class="avatar flex-shrink-0">
              <span class="avatar-initial rounded bg-label-success">
                <i class="bx bx-map-alt"></i>
              </span>
            </div>
          </div>
          <p class="mb-1">Total Wilayah</p>
          <h4 class="card-title mb-0">{{ $stats['total_wilayah'] }}</h4>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 col-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between mb-4">
            <div class="avatar flex-shrink-0">
              <span class="avatar-initial rounded bg-label-info">
                <i class="bx bx-user"></i>
              </span>
            </div>
          </div>
          <p class="mb-1">Total Anggota</p>
          <h4 class="card-title mb-0">{{ $stats['total_anggota'] }}</h4>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 col-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between mb-4">
            <div class="avatar flex-shrink-0">
              <span class="avatar-initial rounded bg-label-warning">
                <i class="bx bx-calendar-event"></i>
              </span>
            </div>
          </div>
          <p class="mb-1">Total Kegiatan</p>
          <h4 class="card-title mb-0">{{ $stats['total_kegiatan'] }}</h4>
        </div>
      </div>
    </div>
  </div>

  <!-- Welcome Card -->
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title text-primary">Selamat Datang di SIG GMIM! 👋</h5>
          <p class="mb-4">Sistem Informasi Geografis Jemaat GMIM Betania Tingkulu</p>
          <p class="mb-0">Gunakan menu di sebelah kiri untuk mengelola data wilayah, jemaat, dan kegiatan gereja.</p>
        </div>
      </div>
    </div>
  </div>
@endsection
