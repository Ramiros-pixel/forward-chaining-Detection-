@extends('layouts.auth')
@section('title', 'Daftar Akun KidsCare')

@section('content')
<div class="auth-card">
    <div class="auth-card-icon">
        <svg viewBox="0 0 24 24"><path d="M15 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm-9-2V7H4v3H1v2h3v3h2v-3h3v-2H6zm9 4c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
    </div>

    <h1 class="auth-title">Daftar Akun</h1>
    <p class="auth-subtitle">Buat akun untuk melacak riwayat diagnosa balita Anda</p>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="form-group">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}"
                   class="form-input {{ $errors->has('name') ? 'is-invalid' : '' }}"
                   placeholder="Contoh: Budi Santoso" required autofocus autocomplete="name">
            @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <!-- Email Address -->
        <div class="form-group">
            <label for="email" class="form-label">Alamat Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}"
                   class="form-input {{ $errors->has('email') ? 'is-invalid' : '' }}"
                   placeholder="contoh@email.com" required autocomplete="username">
            @error('email')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <input id="password" type="password" name="password"
                   class="form-input {{ $errors->has('password') ? 'is-invalid' : '' }}"
                   placeholder="Minimal 8 karakter" required autocomplete="new-password">
            @error('password')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="form-group" style="margin-bottom: 24px;">
            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation"
                   class="form-input {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                   placeholder="Ulangi password Anda" required autocomplete="new-password">
            @error('password_confirmation')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn-auth">
            <svg viewBox="0 0 24 24"><path d="M15 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm-9-2V7H4v3H1v2h3v3h2v-3h3v-2H6zm9 4c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
            Daftar Sekarang
        </button>
    </form>

    <p class="auth-footer-text">
        Sudah memiliki akun?
        <a href="{{ route('login') }}" class="auth-link">Masuk di sini</a>
    </p>
</div>
@endsection
