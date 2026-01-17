@extends('layouts/contentNavbarLayout')

@section('title', 'Data Wilayah - SIG GMIM')

@section('content')
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Data Wilayah</h5>
      <a href="{{ route('wilayah.create') }}" class="btn btn-primary">
        <i class="bx bx-plus me-1"></i> Tambah Wilayah
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
              <th>Nama Wilayah</th>
              <th>Keterangan</th>
              <th>Jumlah Jemaat</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse($wilayah as $index => $item)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->keterangan ?? '-' }}</td>
                <td><span class="badge bg-primary">{{ $item->jemaat_count }}</span></td>
                <td>
                  <a href="{{ route('wilayah.edit', $item->id) }}" class="btn btn-sm btn-warning">
                    <i class="bx bx-edit"></i>
                  </a>
                  <form action="{{ route('wilayah.destroy', $item->id) }}" method="POST" class="d-inline"
                    onsubmit="return confirm('Yakin ingin menghapus wilayah ini?')">
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
                <td colspan="5" class="text-center">Belum ada data wilayah</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
