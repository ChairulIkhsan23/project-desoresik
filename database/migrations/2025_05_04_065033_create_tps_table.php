<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tps;
use Illuminate\Http\Request;

class TpsController extends Controller
{
    public function index()
    {
        $tpsList = Tps::all(); // ambil semua data TPS
        return view('admin.tps.index', compact('tpsList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_tps' => 'required|string|max:255',
            'alamat' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        Tps::create($request->all());

        return response()->json(['message' => 'TPS berhasil ditambahkan']);
    }
}
