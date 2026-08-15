@extends('layouts.auth')
@section('title', 'Masuk ke KidsCare')

@section('content')
<div class="auth-card">
    <!-- Icon -->
    <div class="auth-card-icon">
        <svg viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
    </div>

    <h1 class="auth-title">Selamat Datang</h1>
    <p class="auth-subtitle">Masuk ke akun KidsCare Anda untuk memulai diagnosa</p>

    <!-- Session Status -->
    @if (session('status'))
        <div class="alert-status">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="form-group">
            <label for="email" class="form-label">Alamat Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}"
                   class="form-input {{ $errors->has('email') ? 'is-invalid' : '' }}"
                   placeholder="contoh@email.com" required autofocus autocomplete="username">
            @error('email')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <input id="password" type="password" name="password"
                   class="form-input {{ $errors->has('password') ? 'is-invalid' : '' }}"
                   placeholder="Masukkan password Anda" required autocomplete="current-password">
            @error('password')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        @if (Route::has('password.request'))
            <div class="forgot-link-wrapper">
                <a href="{{ route('password.request') }}" class="auth-link">Lupa password?</a>
            </div>
        @endif

        <!-- Remember Me -->
        <div class="form-check">
            <input id="remember_me" type="checkbox" name="remember">
            <label for="remember_me">Ingat saya di perangkat ini</label>
        </div>

        <button type="submit" class="btn-auth">
            <svg viewBox="0 0 24 24"><path d="M11 7L9.6 8.4l2.6 2.6H2v2h10.2l-2.6 2.6L11 17l5-5-5-5zm9 12h-8v2h8c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2h-8v2h8v14z"/></svg>
            Masuk
        </button>
    </form>

    @if (Route::has('register'))
        <p class="auth-footer-text">
            Belum punya akun?
            <a href="{{ route('register') }}" class="auth-link">Daftar sekarang</a>
        </p>
    @endif
</div>
@endsection
