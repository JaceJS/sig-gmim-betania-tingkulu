@isset($pageConfigs)
  {!! Helper::updatePageConfig($pageConfigs) !!}
@endisset

@extends('layouts/commonMaster')

@section('layoutContent')
  <div class="d-flex flex-column min-vh-100">
    <!-- Public Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
      <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
          <i class="bx bx-church me-2"></i>{{ config('variables.templateName') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#publicNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="publicNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->is('peta-jemaat') ? 'active' : '' }}" href="{{ url('/peta-jemaat') }}">Peta
                Jemaat</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->is('kegiatan-gereja') ? 'active' : '' }}"
                href="{{ url('/kegiatan-gereja') }}">Kegiatan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->is('profil') ? 'active' : '' }}" href="{{ url('/profil') }}">Profil
                Gereja</a>
            </li>
          </ul>
          @auth
            <a href="{{ url('/dashboard') }}" class="btn btn-light btn-sm ms-3">
              <i class="bx bx-cog me-1"></i>Admin
            </a>
          @else
            <a href="{{ url('/login') }}" class="btn btn-outline-light btn-sm ms-3">
              <i class="bx bx-log-in me-1"></i>Masuk
            </a>
          @endauth
        </div>
      </div>
    </nav>

    <!-- Content -->
    <main class="flex-grow-1 py-4">
      @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-primary text-white py-3 mt-auto" data-bs-theme="dark">
      <div class="container text-center">
        <p class="mb-1">{{ config('variables.templateName') }} - {{ config('variables.templateSuffix') }}</p>
        <small class="opacity-75">© {{ date('Y') }} {{ config('variables.creatorName') }}</small>
      </div>
    </footer>
  </div>
@endsection
