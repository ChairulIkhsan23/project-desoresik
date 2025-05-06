<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin & Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="{{ asset('img/icons/icon-48x48.png') }}" />

    <title>@yield('title', 'App Admin Blade')</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- AdminKit CSS -->
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom-admin.css') }}" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Map Box -->
    <script src='https://api.mapbox.com/mapbox-gl-js/v3.11.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v3.11.1/mapbox-gl.css' rel='stylesheet' />

    <!-- =============== FAVICON IMPLEMENTATION =============== -->
    <!-- Basic Favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon/favicon.ico') }}" type="image/x-icon">
    
    <!-- Apple Touch Icons -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-icon-180x180.png') }}">
    
    <!-- Android/Modern Browsers -->
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    
    <!-- Microsoft Tiles -->
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('favicon/ms-icon-144x144.png') }}">
    
    <!-- PWA Manifest -->
    <link rel="manifest" href="{{ asset('favicon/manifest.json') }}">
    
    <!-- Theme Color -->
    <meta name="theme-color" content="#ffffff">
    <!-- =============== END FAVICON IMPLEMENTATION =============== -->
    
    <!-- Loading Animation CSS -->
    <style>
        /* Loading Overlay Styles */
        .global-loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.9);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            opacity: 0;
            transition: opacity 0.3s ease;
            pointer-events: none;
        }
        
        .global-loading-overlay.active {
            opacity: 1;
            pointer-events: all;
        }
        
        /* Loading Spinner Styles */
        .loading-spinner {
            width: 60px;
            height: 60px;
            position: relative;
        }
        
        .loading-spinner::before {
            content: "";
            box-sizing: border-box;
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 5px solid transparent;
            border-top-color: #80B93C;
            animation: spin 1s linear infinite;
        }
        
        .loading-spinner::after {
            content: "";
            box-sizing: border-box;
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 5px solid transparent;
            border-top-color: #f3f3f3;
            animation: spin 0.5s linear infinite reverse;
            opacity: 0.7;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        /* Loading Text */
        .loading-text {
            margin-top: 20px;
            color: #3498db;
            font-weight: 600;
            text-align: center;
        }
    </style>
    
    @stack('styles')
</head>

<body>
    <!-- Loading Overlay -->
    <div class="global-loading-overlay" id="globalLoading">
        <div class="text-center">
            <div class="loading-spinner"></div>
        </div>
    </div>

    <div class="wrapper">
        @include('layouts.partials-admin.sidebar')

        <div class="main">
            @include('layouts.partials-admin.navbar')

            <main class="content">
                <div class="container-fluid p-0">
                    @yield('content')
                </div>
            </main>

            @include('layouts.partials-admin.footer')
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- App JS -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    
    <!-- Loading Animation Script -->
    <script>
        // Fungsi untuk mengontrol loading
        function showLoading() {
            const loader = document.getElementById('globalLoading');
            if (loader) {
                loader.classList.add('active');
            }
        }
        
        function hideLoading() {
            const loader = document.getElementById('globalLoading');
            if (loader) {
                loader.classList.remove('active');
            }
        }

        // Tampilkan loading saat halaman mulai load
        document.addEventListener('DOMContentLoaded', function() {
            showLoading();
            
            // Sembunyikan ketika semua konten selesai dimuat
            window.addEventListener('load', function() {
                setTimeout(hideLoading, 300); // Tambah delay kecil untuk efek lebih smooth
            });
        });

        // Handle AJAX loading jika menggunakan jQuery
        if (typeof jQuery !== 'undefined') {
            $(document).ajaxStart(function() {
                showLoading();
            }).ajaxStop(function() {
                hideLoading();
            });
        }

        // Feather Icons
        if (typeof feather !== 'undefined') {
            feather.replace();
        }

        // Auto-hide alerts
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.classList.remove('show');
                    alert.classList.add('fade');
                    setTimeout(() => alert.remove(), 150);
                }, 6000);
            });
        });
    </script>
    
    @stack('scripts')
</body>
</html>