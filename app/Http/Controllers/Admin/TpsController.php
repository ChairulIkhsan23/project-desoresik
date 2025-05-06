<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tps;

class TpsController extends Controller
{
    public function index()
    {
        $tpsList = TPS::paginate(10);
        return view('admin.tps.index', compact('tpsList'));
    }

    public function create()
    {
        return view('admin.tps.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_tps' => 'required',
            'alamat' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        Tps::create($request->all());
        return redirect()->route('admin.tps.index')->with('success', 'TPS berhasil ditambahkan');
    }

    public function edit($id)
    {
        $tps = Tps::findOrFail($id);
        return view('admin.tps.edit', compact('tps'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_tps' => 'required',
            'alamat' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $tps = Tps::findOrFail($id);
        $tps->update($request->all());

        return redirect()->route('admin.tps.index')->with('success', 'TPS berhasil diupdate');
    }

    public function destroy($id)
    {
        $tps = Tps::findOrFail($id);
        $tps->delete();
        return redirect()->route('admin.tps.index')->with('success', 'TPS berhasil dihapus');
    }
}
