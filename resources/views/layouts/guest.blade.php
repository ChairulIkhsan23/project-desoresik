<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('app.name', 'DesoResik'))</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Sementara tambahkan ini di head untuk memastikan cache tidak masalah -->
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="0">
    <style>
        /* Tambahkan semua style CSS Anda di sini */
        :root {
            --primary-color: #2c7be5;
            --secondary-color: #f8f9fa;
            --government-color: #1a3e72;
            --clean-color: #00a854;
        }
        
        body {
            background-color: var(--secondary-color);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        /* Tambahkan semua style lainnya dari kode Anda */
    </style>
    @stack('styles')
</head>
<body class="bg-light">
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>