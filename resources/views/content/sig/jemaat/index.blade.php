@extends('layouts/contentNavbarLayout')

@section('title', 'Data Jemaat - SIG GMIM')

@section('content')
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Data Jemaat</h5>
      <a href="{{ route('jemaat.create') }}" class="btn btn-primary">
        <i class="bx bx-plus me-1"></i> Tambah Jemaat
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
              <th>Nama Kepala Keluarga</th>
              <th>Wilayah</th>
              <th>Alamat</th>
              <th>Anggota</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse($jemaat as $index => $item)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->nama_kepala_keluarga }}</td>
                <td><span class="badge bg-primary">{{ $item->wilayah->nama ?? '-' }}</span></td>
                <td>{{ Str::limit($item->alamat, 30) }}</td>
                <td>{{ $item->jumlah_anggota }}</td>
                <td>
                  <a href="{{ route('jemaat.edit', $item->id) }}" class="btn btn-sm btn-warning">
                    <i class="bx bx-edit"></i>
                  </a>
                  <form action="{{ route('jemaat.destroy', $item->id) }}" method="POST" class="d-inline"
                    onsubmit="return confirm('Yakin ingin menghapus data jemaat ini?')">
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
                <td colspan="6" class="text-center">Belum ada data jemaat</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
