<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Informasi Akun Petugas</title>

    <style>
        .kop-surat {
            width: 100%;
            position: relative;
        }

        .logo-container {
            position: absolute;
            left: 20;
            top: 0;
            bottom: 5;
        }

        .logo {
            width: 130px;
            height: 100px;
            object-fit: contain;
        }

        .text-container {
            text-align: center;
            width: 100%;
            padding: 0 40px;
        }

        .instansi-name {
            font-size: 18px;
            margin: 0;
            line-height: 1.3;
        }

        .desa-name {
            font-size: 24px;
            font-weight: bold;
            margin: 0;
            line-height: 1.3;
        }

        .alamat {
            font-size: 14px;
            margin: 0;
            line-height: 1.3;
        }

        .double-line {
            margin-top: 10px;
            padding: 0;
            border: none;
        }
    </style>
</head>
<body style="font-family: 'Times New Roman', Times, serif; color: #000; padding: 40px; margin: 0;">

    @php
        $path = public_path('storage/email-assets/logo-klhk.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    @endphp

    <!-- Kop Surat -->
    <div class="kop-surat">
        <div class="logo-container">
            <img src="{{ $base64 }}" alt="Logo" class="logo">
        </div>
        <div class="text-container">
            <p class="instansi-name">PEMERINTAH KABUPATEN INDRAMAYU</p>
            <p class="instansi-name">DINAS LINGKUNGAN HIDUP</p>
            <p class="alamat">Jl. Mayor Dasuki, Penganjang, Kec. Sindang, Kabupaten Indramayu, Jawa Barat 45221</p>
        </div>
        <div class="double-line">
            <div class="line-thick"></div>
            <div class="line-thin"></div>
        </div>
    </div>

    <!-- Judul Surat -->
    <div style="text-align: center; font-weight: bold; text-decoration: underline; font-size: 14pt; margin-top: 20px; margin-bottom: 30px;">
        SURAT INFORMASI AKUN PETUGAS
    </div>

    <!-- Isi Surat -->
    <p style="margin: 0 0 10px 0;">Kepada Yth,</p>
    <p style="margin: 0 0 10px 0;"><strong>{{ $petugas->name }}</strong><br>Di Tempat</p>

    <p style="margin: 20px 0 10px 0;">Dengan hormat,</p>

    <p style="text-align: justify; margin: 0 0 15px 0;">
        Bersama surat ini, kami informasikan bahwa akun Anda sebagai petugas telah berhasil dibuat dalam sistem <strong>DesoResik</strong>. Berikut adalah rincian informasi akun yang dapat digunakan untuk login dan menjalankan tugas Anda:
    </p>

    <table style="margin-left: 20px; margin-bottom: 20px;">
        <tr>
            <td style="padding: 5px 10px;">Nama</td><td style="padding: 5px 10px;">:</td><td style="padding: 5px 10px;"><strong>{{ $petugas->name }}</strong></td>
        </tr>
        <tr>
            <td style="padding: 5px 10px;">Email</td><td style="padding: 5px 10px;">:</td><td style="padding: 5px 10px;">{{ $petugas->email }}</td>
        </tr>
        <tr>
            <td style="padding: 5px 10px;">No HP</td><td style="padding: 5px 10px;">:</td><td style="padding: 5px 10px;">{{ $petugas->no_hp }}</td>
        </tr>
        <tr>
            <td style="padding: 5px 10px;">Role</td><td style="padding: 5px 10px;">:</td><td style="padding: 5px 10px;">{{ $petugas->role }}</td>
        </tr>
        <tr>
            <td style="padding: 5px 10px;">Status</td><td style="padding: 5px 10px;">:</td><td style="padding: 5px 10px;">{{ $petugas->status }}</td>
        </tr>
        <tr>
            <td style="padding: 5px 10px;">Password</td><td style="padding: 5px 10px;">:</td>
            <td style="padding: 5px 10px;"><span style="background: #eee; padding: 3px 8px; border-radius: 4px; font-family: monospace;">{{ $password }}</span></td>
        </tr>
    </table>

    <p style="text-align: justify; margin: 0 0 15px 0;">
        Silakan gunakan informasi ini untuk login ke sistem melalui alamat berikut:<br>
        <a href="{{ url('/login') }}">{{ url('/login') }}</a>
    </p>

    <p style="margin: 20px 0 0 0;">Demikian surat ini kami sampaikan. Atas perhatian dan kerjasama Saudara, kami ucapkan terima kasih.</p>

    <!-- TTD -->
    <div style="width: 100%; text-align: right; margin-top: 50px;">
        <p style="margin: 0 0 10px 0;">Indramayu, {{ \Carbon\Carbon::now()->format('d F Y') }}</p>
        <p style="margin: 0 0 50px 0; font-weight: bold;">Kepala Dinas Lingkungan Hidup</p>
        <p style="margin: 0; font-weight: bold;">(........................................)</p>
    </div>

</body>
</html>
