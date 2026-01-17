@extends('layouts/public_layout')

@section('title', 'Peta Jemaat - SIG GMIM Betania Tingkulu')

@section('page-style')
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
  <style>
    #map {
      height: 70vh;
      border-radius: 8px;
    }
  </style>
@endsection

@section('content')
  <div class="container-fluid px-4">
    <h4 class="mb-3"><i class="bx bx-map me-2"></i>Peta Sebaran Jemaat</h4>
    <div id="map"></div>
  </div>
@endsection

@section('page-script')
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
  <script>
    var lat = {{ $pengaturan['latitude_gereja'] ?? 1.4748 }};
    var lng = {{ $pengaturan['longitude_gereja'] ?? 124.8421 }};
    var map = L.map('map').setView([lat, lng], 14);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '© OpenStreetMap'
    }).addTo(map);

    // Marker Gereja
    var churchIcon = L.icon({
      iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-red.png',
      shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/images/marker-shadow.png',
      iconSize: [25, 41],
      iconAnchor: [12, 41],
      popupAnchor: [1, -34],
      shadowSize: [41, 41]
    });

    L.marker([lat, lng], {
        icon: churchIcon
      })
      .addTo(map)
      .bindPopup('<strong>{{ $pengaturan['nama_gereja'] ?? 'GMIM Betania Tingkulu' }}</strong>');

    // Load jemaat
    fetch('{{ route('peta.data') }}')
      .then(r => r.json())
      .then(data => {
        data.forEach(j => {
          L.marker([j.lat, j.lng]).addTo(map)
            .bindPopup('<strong>' + j.nama + '</strong><br><small>Wilayah: ' + j.wilayah + '</small>');
        });
      });
  </script>
@endsection
