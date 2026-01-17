@extends('layouts/public_layout')

@section('title', 'Kegiatan Gereja - SIG GMIM Betania Tingkulu')

@section('content')
  <div class="container">
    <h4 class="mb-4"><i class="bx bx-calendar-event me-2"></i>Kegiatan Gereja</h4>

    <div class="row g-4">
      @forelse($kegiatan as $item)
        <div class="col-md-6 col-lg-4">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body">
              <div class="d-flex align-items-center mb-3">
                <div class="bg-primary text-white rounded p-2 me-3 text-center" style="min-width: 60px;">
                  <div class="fw-bold" style="font-size: 1.5rem;">{{ $item->tanggal->format('d') }}</div>
                  <small>{{ $item->tanggal->format('M') }}</small>
                </div>
                <div>
                  <h5 class="mb-1">{{ $item->nama }}</h5>
                  <small class="text-muted">
                    <i
                      class="bx bx-time-five me-1"></i>{{ $item->waktu ? \Carbon\Carbon::parse($item->waktu)->format('H:i') : 'TBA' }}
                  </small>
                </div>
              </div>
              <p class="mb-2"><i class="bx bx-map me-1 text-muted"></i>{{ $item->tempat }}</p>
              @if ($item->deskripsi)
                <p class="text-muted small mb-0">{{ Str::limit($item->deskripsi, 100) }}</p>
              @endif
            </div>
          </div>
        </div>
      @empty
        <div class="col-12">
          <div class="alert alert-info">
            <i class="bx bx-info-circle me-2"></i>Belum ada kegiatan yang dijadwalkan.
          </div>
        </div>
      @endforelse
    </div>
  </div>
@endsection
