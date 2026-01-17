@extends('layouts/content_navbar_layout')

@section('title', 'Pengaturan - SIG GMIM')

@section('page-style')
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
  <style>
    #map {
      height: 250px;
      border-radius: 8px;
    }
  </style>
@endsection

@section('content')
  <div class="card">
    <div class="card-header">
      <h5 class="mb-0">Pengaturan Gereja</h5>
    </div>
    <div class="card-body">
      @if (session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <form action="{{ route('pengaturan.update', 1) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
              <label for="nama_gereja" class="form-label">Nama Gereja</label>
              <input type="text" class="form-control" id="nama_gereja" name="nama_gereja"
                value="{{ $pengaturan['nama_gereja'] ?? 'GMIM Betania Tingkulu' }}">
            </div>
            <div class="mb-3">
              <label for="alamat_gereja" class="form-label">Alamat Gereja</label>
              <textarea class="form-control" id="alamat_gereja" name="alamat_gereja" rows="2">{{ $pengaturan['alamat_gereja'] ?? '' }}</textarea>
            </div>
            <div class="mb-3">
              <label for="telepon_gereja" class="form-label">Telepon</label>
              <input type="text" class="form-control" id="telepon_gereja" name="telepon_gereja"
                value="{{ $pengaturan['telepon_gereja'] ?? '' }}">
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label class="form-label">Lokasi Gereja (Klik peta)</label>
              <div id="map"></div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="latitude_gereja" class="form-label">Latitude</label>
                  <input type="text" class="form-control" id="latitude_gereja" name="latitude_gereja"
                    value="{{ $pengaturan['latitude_gereja'] ?? '1.4748' }}" readonly>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="longitude_gereja" class="form-label">Longitude</label>
                  <input type="text" class="form-control" id="longitude_gereja" name="longitude_gereja"
                    value="{{ $pengaturan['longitude_gereja'] ?? '124.8421' }}" readonly>
                </div>
              </div>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Pengaturan</button>
      </form>
    </div>
  </div>
@endsection

@section('page-script')
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
  <script>
    var lat = {{ $pengaturan['latitude_gereja'] ?? 1.4748 }};
    var lng = {{ $pengaturan['longitude_gereja'] ?? 124.8421 }};
    var map = L.map('map').setView([lat, lng], 15);
    var marker = L.marker([lat, lng]).addTo(map);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '© OpenStreetMap'
    }).addTo(map);

    map.on('click', function(e) {
      map.removeLayer(marker);
      marker = L.marker(e.latlng).addTo(map);
      document.getElementById('latitude_gereja').value = e.latlng.lat.toFixed(8);
      document.getElementById('longitude_gereja').value = e.latlng.lng.toFixed(8);
    });
  </script>
@endsection
