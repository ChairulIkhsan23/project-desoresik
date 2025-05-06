@extends('layouts.guest')

@section('title', 'Login - ' . config('app.name'))

@section('content')
<div style="background-color: #6F906F; min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 20px;">
    <div style="background: white; border-radius: 10px; overflow: hidden; width: 100%; max-width: 400px; box-shadow: 0 4px 20px rgba(0,0,0,0.1);">
        <!-- Header with Logos -->
        <div style="background: #5A825A; padding: 20px; text-align: center;">
            <div style="display: flex; justify-content: center; align-items: center; gap: 15px; margin-bottom: 10px;">
                <img src="{{ asset('assets/img/icons/logo-desoresik.png') }}" alt="Deso Resik Logo" style="height: 40px;">
                <img src="{{ asset('assets/img/icons/logo-indramayu.png') }}" alt="Indramayu Logo" style="height: 45px;">
                <img src="{{ asset('assets/img/photos/dlh.jpg') }}" alt="Indramayu Logo" style="height: 45px; width: 45px; border-radius: 50px; object-fit: cover;">
            </div>
            <h1 style="font-size: 20px; color: white; font-weight: 600; margin: 0;">DESO RESIK</h1>
            <p style="color: rgba(255,255,255,0.8); font-size: 14px; margin-top: 5px;">Sistem Monitoring Pengangkutan Sampah di UPTD Kecamatan Indramayu</p>
        </div>

        <!-- Login Form -->
        <div style="padding: 30px;">
            @if(session('error'))
                <div style="background: #ffebee; color: #c62828; padding: 10px; border-radius: 4px; margin-bottom: 20px;">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="#">
                @csrf

                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 8px; color: #555; font-weight: 500;">Username or email</label>
                    <input type="text" name="email" required style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px;">
                    @error('email')
                        <span style="color: #c62828; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</span>
                    @enderror
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 8px; color: #555; font-weight: 500;">Password</label>
                    <div style="display: flex; align-items: center; border: 1px solid #ddd; border-radius: 6px;">
                        <input type="password" id="password" name="password" required style="width: 100%; padding: 12px; border: none; font-size: 14px;">
                        <button type="button" onclick="togglePassword()" style="background: none; border: none; padding: 0 10px; cursor: pointer;">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                    @error('password')
                        <span style="color: #c62828; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</span>
                    @enderror
                </div>

                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
                    <div style="display: flex; align-items: center;">
                        <input type="checkbox" id="remember" name="remember" style="margin-right: 8px;">
                        <label for="remember" style="color: #555; font-size: 14px;">Remember me</label>
                    </div>
                    <a href="#" style="color: #5A825A; font-size: 14px; text-decoration: none;">Forget password?</a>
                </div>

                <button type="submit" style="width: 100%; padding: 12px; background: #5A825A; color: white; border: none; border-radius: 6px; font-size: 16px; font-weight: 500; cursor: pointer; margin-bottom: 10px;">
                    Login
                </button>
            </form>

            <div style="text-align: center; margin-top: 20px; font-size: 12px; color: #888;">
                Dinas Lingkungan Hidup Kabupaten Indramayu
            </div>
        </div>
    </div>
</div>

<script>
    // Toggle password visibility
    function togglePassword() {
        const password = document.getElementById('password');
        const icon = document.querySelector('#password + button i');
        if (password.type === 'password') {
            password.type = 'text';
            icon.classList.remove('bi-eye');
            icon.classList.add('bi-eye-slash');
        } else {
            password.type = 'password';
            icon.classList.remove('bi-eye-slash');
            icon.classList.add('bi-eye');
        }
    }
</script>

<style>
    .bi {
        display: inline-block;
        width: 1em;
        height: 1em;
        vertical-align: -0.125em;
        fill: currentColor;
    }
</style>
@endsection