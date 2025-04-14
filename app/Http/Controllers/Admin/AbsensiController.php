<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        $hadir = 10;
        $izin = 2;
        $sakit = 1;

        $absensiList = [
            (object)[
                'petugas' => 'Rina Kusuma',
                'tanggal' => '2025-04-13',
                'jam_masuk' => '08:00',
                'jam_keluar' => '16:00',
                'status' => 'Hadir',
                'catatan' => 'Tepat waktu'
            ],
            (object)[
                'petugas' => 'Budi Hartono',
                'tanggal' => '2025-04-13',
                'jam_masuk' => null,
                'jam_keluar' => null,
                'status' => 'Izin',
                'catatan' => 'Izin karena urusan keluarga'
            ],
            (object)[
                'petugas' => 'Siti Aminah',
                'tanggal' => '2025-04-13',
                'jam_masuk' => null,
                'jam_keluar' => null,
                'status' => 'Sakit',
                'catatan' => 'Demam tinggi'
            ],
            (object)[
                'petugas' => 'Agus Salim',
                'tanggal' => '2025-04-13',
                'jam_masuk' => '08:05',
                'jam_keluar' => '16:00',
                'status' => 'Hadir',
                'catatan' => 'Datang sedikit terlambat'
            ],
        ];

        return view('admin.absensi', compact('hadir', 'izin', 'sakit', 'absensiList'));
    }
}
