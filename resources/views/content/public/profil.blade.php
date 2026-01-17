@extends('layouts/public_layout')

@section('title', 'Profil Gereja - SIG GMIM Betania Tingkulu')

@section('page-style')
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
  <style>
    #map {
      height: 300px;
      border-radius: 8px;
    }
  </style>
@endsection

@section('content')
  <div class="container">
    <h4 class="mb-4"><i class="bx bx-church me-2"></i>Profil Gereja</h4>

    <div class="row g-4">
      <div class="col-lg-6">
        <div class="card border-0 shadow-sm h-100">
          <div class="card-body">
            <h3 class="text-primary">{{ $pengaturan['nama_gereja'] ?? 'GMIM Betania Tingkulu' }}</h3>
            <hr>
            <p><i class="bx bx-map me-2 text-muted"></i><strong>Alamat:</strong><br>
              {{ $pengaturan['alamat_gereja'] ?? 'Tingkulu, Manado' }}
            </p>
            <p><i class="bx bx-phone me-2 text-muted"></i><strong>Telepon:</strong><br>
              {{ $pengaturan['telepon_gereja'] ?? '-' }}
            </p>
            <hr>
            <h6>Statistik Jemaat</h6>
            <ul class="list-unstyled">
              <li><i class="bx bx-map-alt text-primary me-2"></i>{{ $stats['total_wilayah'] }} Wilayah Pelayanan</li>
              <li><i class="bx bx-group text-success me-2"></i>{{ $stats['total_jemaat'] }} Kepala Keluarga</li>
              <li><i class="bx bx-user text-info me-2"></i>{{ $stats['total_anggota'] }} Total Jemaat</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card border-0 shadow-sm h-100">
          <div class="card-body">
            <h5 class="mb-3">Lokasi Gereja</h5>
            <div id="map"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('page-script')
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
  <script>
    var lat = {{ $pengaturan['latitude_gereja'] ?? 1.4748 }};
    var lng = {{ $pengaturan['longitude_gereja'] ?? 124.8421 }};
    var map = L.map('map').setView([lat, lng], 16);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '© OpenStreetMap'
    }).addTo(map);

    L.marker([lat, lng]).addTo(map)
      .bindPopup('{{ $pengaturan['nama_gereja'] ?? 'GMIM Betania Tingkulu' }}')
      .openPopup();
  </script>
@endsection
