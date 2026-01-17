@extends('layouts/contentNavbarLayout')

@section('title', 'Data Kegiatan - SIG GMIM')

@section('content')
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Data Kegiatan</h5>
      <a href="{{ route('kegiatan.create') }}" class="btn btn-primary">
        <i class="bx bx-plus me-1"></i> Tambah Kegiatan
      </a>
    </div>
    <div class="card-body">
      @if (session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Kegiatan</th>
              <th>Tanggal</th>
              <th>Waktu</th>
              <th>Tempat</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse($kegiatan as $index => $item)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->tanggal->format('d/m/Y') }}</td>
                <td>{{ $item->waktu ? \Carbon\Carbon::parse($item->waktu)->format('H:i') : '-' }}</td>
                <td>{{ $item->tempat }}</td>
                <td>
                  <a href="{{ route('kegiatan.edit', $item->id) }}" class="btn btn-sm btn-warning">
                    <i class="bx bx-edit"></i>
                  </a>
                  <form action="{{ route('kegiatan.destroy', $item->id) }}" method="POST" class="d-inline"
                    onsubmit="return confirm('Yakin ingin menghapus kegiatan ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">
                      <i class="bx bx-trash"></i>
                    </button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="6" class="text-center">Belum ada data kegiatan</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
