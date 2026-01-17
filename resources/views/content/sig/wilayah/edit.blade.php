@extends('layouts/content_navbar_layout')

@section('title', 'Edit Wilayah - SIG GMIM')

@section('content')
  <div class="card">
    <div class="card-header">
      <h5 class="mb-0">Edit Wilayah</h5>
    </div>
    <div class="card-body">
      <form action="{{ route('wilayah.update', $wilayah->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Wilayah <span class="text-danger">*</span></label>
          <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
            value="{{ old('nama', $wilayah->nama) }}" required>
          @error('nama')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="keterangan" class="form-label">Keterangan</label>
          <textarea class="form-control" id="keterangan" name="keterangan" rows="3">{{ old('keterangan', $wilayah->keterangan) }}</textarea>
        </div>
        <div class="d-flex gap-2">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="{{ route('wilayah.index') }}" class="btn btn-secondary">Batal</a>
        </div>
      </form>
    </div>
  </div>
@endsection
