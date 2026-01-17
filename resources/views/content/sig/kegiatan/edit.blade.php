@extends('layouts/content_navbar_layout')

@section('title', 'Edit Kegiatan - SIG GMIM')

@section('content')
  <div class="card">
    <div class="card-header">
      <h5 class="mb-0">Edit Kegiatan</h5>
    </div>
    <div class="card-body">
      <form action="{{ route('kegiatan.update', $kegiatan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Kegiatan <span class="text-danger">*</span></label>
          <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
            value="{{ old('nama', $kegiatan->nama) }}" required>
          @error('nama')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
              <label for="tanggal" class="form-label">Tanggal <span class="text-danger">*</span></label>
              <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                name="tanggal" value="{{ old('tanggal', $kegiatan->tanggal->format('Y-m-d')) }}" required>
              @error('tanggal')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label for="waktu" class="form-label">Waktu</label>
              <input type="time" class="form-control" id="waktu" name="waktu"
                value="{{ old('waktu', $kegiatan->waktu ? \Carbon\Carbon::parse($kegiatan->waktu)->format('H:i') : '') }}">
            </div>
          </div>
        </div>
        <div class="mb-3">
          <label for="tempat" class="form-label">Tempat <span class="text-danger">*</span></label>
          <input type="text" class="form-control @error('tempat') is-invalid @enderror" id="tempat" name="tempat"
            value="{{ old('tempat', $kegiatan->tempat) }}" required>
          @error('tempat')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="deskripsi" class="form-label">Deskripsi</label>
          <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi', $kegiatan->deskripsi) }}</textarea>
        </div>
        <div class="d-flex gap-2">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="{{ route('kegiatan.index') }}" class="btn btn-secondary">Batal</a>
        </div>
      </form>
    </div>
  </div>
@endsection
