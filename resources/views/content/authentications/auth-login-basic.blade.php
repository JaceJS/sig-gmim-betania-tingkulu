@extends('layouts/blank_layout')

@section('title', 'Login - SIG GMIM')

@section('page-style')
  @vite(['resources/assets/vendor/scss/pages/page-auth.scss'])
@endsection

@section('content')
  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <div class="card px-sm-6 px-0">
          <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center mb-4">
              <span class="app-brand-text text-heading fw-bold fs-3">SIG GMIM</span>
            </div>
            <!-- /Logo -->
            <h4 class="mb-1">Selamat Datang! 👋</h4>
            <p class="mb-6">Silakan masuk untuk mengelola data jemaat</p>

            @if ($errors->any())
              <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                  <div>{{ $error }}</div>
                @endforeach
              </div>
            @endif

            <form id="formAuthentication" class="mb-6" action="{{ route('login') }}" method="POST">
              @csrf
              <div class="mb-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email anda"
                  value="{{ old('email') }}" autofocus required />
              </div>
              <div class="mb-6 form-password-toggle">
                <label class="form-label" for="password">Kata Sandi</label>
                <div class="input-group input-group-merge">
                  <input type="password" id="password" class="form-control" name="password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password" required />
                  <span class="input-group-text cursor-pointer"><i class="icon-base bx bx-hide"></i></span>
                </div>
              </div>
              <div class="mb-8">
                <div class="form-check mb-0">
                  <input class="form-check-input" type="checkbox" id="remember" name="remember" />
                  <label class="form-check-label" for="remember">Ingat Saya</label>
                </div>
              </div>
              <div class="mb-6">
                <button class="btn btn-primary d-grid w-100" type="submit">Masuk</button>
              </div>
            </form>

            <p class="text-center text-muted">
              <small>Sistem Informasi Geografis Jemaat<br>GMIM Betania Tingkulu</small>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
