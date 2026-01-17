@extends('layouts/contentNavbarLayout')

@section('title', 'Peta Jemaat - SIG GMIM')

@section('page-style')
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
  <style>
    #map {
      height: 500px;
      border-radius: 8px;
    }

    .legend {
      padding: 10px;
      background: white;
      border-radius: 5px;
    }

    .legend h6 {
      margin: 0 0 10px 0;
    }

    .legend-item {
      display: flex;
      align-items: center;
      margin: 5px 0;
    }

    .legend-color {
      width: 20px;
      height: 20px;
      border-radius: 50%;
      margin-right: 8px;
    }
  </style>
@endsection

@section('content')
  <div class="card">
    <div class="card-header">
      <h5 class="mb-0">Peta Sebaran Jemaat</h5>
    </div>
    <div class="card-body">
      <div id="map"></div>
    </div>
  </div>
@endsection

@section('page-script')
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
  <script>
    // Default ke Manado / lokasi gereja
    var lat = {{ $pengaturan['latitude_gereja'] ?? 1.4748 }};
    var lng = {{ $pengaturan['longitude_gereja'] ?? 124.8421 }};
    var map = L.map('map').setView([lat, lng], 14);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '© OpenStreetMap'
    }).addTo(map);

    // Marker Gereja (beda warna)
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
      .bindPopup(
        '<strong>{{ $pengaturan['nama_gereja'] ?? 'GMIM Betania Tingkulu' }}</strong><br>{{ $pengaturan['alamat_gereja'] ?? '' }}'
        );

    // Load data jemaat
    fetch('{{ route('peta.data') }}')
      .then(response => response.json())
      .then(data => {
        data.forEach(function(jemaat) {
          L.marker([jemaat.lat, jemaat.lng])
            .addTo(map)
            .bindPopup(
              '<strong>' + jemaat.nama + '</strong><br>' +
              '<small>Wilayah: ' + jemaat.wilayah + '</small><br>' +
              '<small>Alamat: ' + jemaat.alamat + '</small><br>' +
              '<small>Anggota: ' + jemaat.jumlah_anggota + ' orang</small>'
            );
        });
      });
  </script>
@endsection
