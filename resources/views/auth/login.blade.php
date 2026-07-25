@extends('layout')

@section("content")
<div class="login-page">
    <div class="login-card">

        {{-- Logo & Brand --}}
        <div class="login-logo">
            <img src="{{ asset('/logo.png') }}" alt="John Bag Shop Logo">
            <div class="login-logo-name">John Bag Shop</div>
            <div class="login-logo-sub">Sistem Manajemen Toko</div>
        </div>

        <p class="login-form-title">Masuk ke akun Anda</p>

        <form action="/auth/signin" method="POST">
            @csrf

            <div class="form-group">
                <label class="form-label" for="email">Email</label>
                <input
                    type="text"
                    id="email"
                    name="email"
                    class="form-control"
                    placeholder="Masukkan email..."
                    value="{{ old('email') }}"
                    autocomplete="email"
                />
                @error('email')
                <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    class="form-control"
                    placeholder="Masukkan password..."
                    autocomplete="current-password"
                />
                @error('password')
                <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" id="submit" class="login-btn">
                Masuk
            </button>
        </form>

    </div>
</div>
@endsection