@extends('layouts/content_navbar_layout')

@section('title', 'Edit Jemaat - SIG GMIM')

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
  <div class="card">
    <div class="card-header">
      <h5 class="mb-0">Edit Jemaat</h5>
    </div>
    <div class="card-body">
      <form action="{{ route('jemaat.update', $jemaat->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
              <label for="wilayah_id" class="form-label">Wilayah <span class="text-danger">*</span></label>
              <select class="form-select @error('wilayah_id') is-invalid @enderror" id="wilayah_id" name="wilayah_id"
                required>
                <option value="">Pilih Wilayah</option>
                @foreach ($wilayah as $w)
                  <option value="{{ $w->id }}"
                    {{ old('wilayah_id', $jemaat->wilayah_id) == $w->id ? 'selected' : '' }}>{{ $w->nama }}</option>
                @endforeach
              </select>
              @error('wilayah_id')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="nama_kepala_keluarga" class="form-label">Nama Kepala Keluarga <span
                  class="text-danger">*</span></label>
              <input type="text" class="form-control @error('nama_kepala_keluarga') is-invalid @enderror"
                id="nama_kepala_keluarga" name="nama_kepala_keluarga"
                value="{{ old('nama_kepala_keluarga', $jemaat->nama_kepala_keluarga) }}" required>
              @error('nama_kepala_keluarga')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
              <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="2"
                required>{{ old('alamat', $jemaat->alamat) }}</textarea>
              @error('alamat')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="no_telepon" class="form-label">No. Telepon</label>
                  <input type="text" class="form-control" id="no_telepon" name="no_telepon"
                    value="{{ old('no_telepon', $jemaat->no_telepon) }}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="jumlah_anggota" class="form-label">Jumlah Anggota <span class="text-danger">*</span></label>
                  <input type="number" class="form-control" id="jumlah_anggota" name="jumlah_anggota"
                    value="{{ old('jumlah_anggota', $jemaat->jumlah_anggota) }}" min="1" required>
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label for="keterangan" class="form-label">Keterangan</label>
              <textarea class="form-control" id="keterangan" name="keterangan" rows="2">{{ old('keterangan', $jemaat->keterangan) }}</textarea>
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label class="form-label">Lokasi (Klik peta untuk mengubah) <span class="text-danger">*</span></label>
              <div id="map"></div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="latitude" class="form-label">Latitude</label>
                  <input type="text" class="form-control" id="latitude" name="latitude"
                    value="{{ old('latitude', $jemaat->latitude) }}" readonly required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="longitude" class="form-label">Longitude</label>
                  <input type="text" class="form-control" id="longitude" name="longitude"
                    value="{{ old('longitude', $jemaat->longitude) }}" readonly required>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="d-flex gap-2">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="{{ route('jemaat.index') }}" class="btn btn-secondary">Batal</a>
        </div>
      </form>
    </div>
  </div>
@endsection

@section('page-script')
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
  <script>
    var lat = {{ $jemaat->latitude }};
    var lng = {{ $jemaat->longitude }};
    var map = L.map('map').setView([lat, lng], 15);
    var marker = L.marker([lat, lng]).addTo(map);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '© OpenStreetMap'
    }).addTo(map);

    map.on('click', function(e) {
      map.removeLayer(marker);
      marker = L.marker(e.latlng).addTo(map);
      document.getElementById('latitude').value = e.latlng.lat.toFixed(8);
      document.getElementById('longitude').value = e.latlng.lng.toFixed(8);
    });
  </script>
@endsection
