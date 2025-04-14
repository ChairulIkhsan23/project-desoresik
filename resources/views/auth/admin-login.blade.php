@extends('layouts.guest')

@section('title', 'Login - ' . config('app.name'))

@section('content')
<div class="container login-container min-vh-100 d-flex align-items-center">
    <div class="login-wrapper">
        <!-- System Information Section -->
        <div class="system-info">
            <div class="system-logo">
                <img src="{{ asset('images/desoresik-logo.png') }}" alt="DesoResik Logo">
                <div>
                    <h1 class="system-title">DesoResik</h1>
                    <p class="system-subtitle">Sistem Manajemen Kebersihan Desa</p>
                </div>
            </div>
            
            <div class="system-description">
                <p>Sistem terintegrasi untuk mengelola program kebersihan desa, pemantauan sampah, dan partisipasi warga dalam menjaga lingkungan.</p>
            </div>
            
            <ul class="feature-list">
                <li>
                    <div class="feature-icon">
                        <i class="bi bi-trash"></i>
                    </div>
                    Manajemen pengelolaan sampah
                </li>
                <li>
                    <div class="feature-icon">
                        <i class="bi bi-people"></i>
                    </div>
                    Partisipasi masyarakat
                </li>
                <li>
                    <div class="feature-icon">
                        <i class="bi bi-graph-up"></i>
                    </div>
                    Laporan real-time
                </li>
            </ul>
            
            <div class="government-logo">
                <img src="{{ asset('images/pemda-logo.png') }}" alt="Logo Pemerintah">
                <span>Dinas Kebersihan Kabupaten</span>
            </div>
        </div>
        
        <!-- Login Form Section -->
        <div class="login-form">
            <div class="login-card">
                <h2 class="login-title">Login Admin</h2>
                
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                
                <form method="POST" action="#">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autofocus>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                            <button class="btn btn-outline-secondary toggle-password" type="button">
                                <i class="bi bi-eye"></i>
                            </button>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Ingat Saya</label>
                    </div>
                    
                    <button type="submit" class="btn btn-login mb-3">
                        <i class="bi bi-box-arrow-in-right"></i> Masuk
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Toggle password visibility
        const togglePassword = document.querySelector('.toggle-password');
        const password = document.querySelector('#password');
        
        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.querySelector('i').classList.toggle('bi-eye');
            this.querySelector('i').classList.toggle('bi-eye-slash');
        });
    });
</script>
@endpush
@endsection