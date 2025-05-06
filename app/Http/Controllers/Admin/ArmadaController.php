<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Armada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ArmadaController extends Controller
{
    public function index()
    {
        $armada = Armada::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.armada.index', compact('armada'));
    }

    public function create()
    {
        return view('admin.armada.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'nomor_polisi' => [
                'required',
                'string',
                'max:20',
                'regex:/^[A-Za-z]{1,2}\s?\d{1,4}\s?[A-Za-z]{1,3}$/',
                Rule::unique('armada')
            ],
            'tahun_kendaraan' => 'required|digits:4|integer|min:2000|max:'.(date('Y')+1),
            'jenis' => 'required|string|in:Truk',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'nomor_polisi.regex' => 'Format nomor polisi tidak valid. Contoh: B 1234 ABC',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $validator->validated();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('armada', 'public');
        }

        Armada::create($data);

        return redirect()->route('admin.armada.index')
            ->with('success', 'Data armada berhasil ditambahkan!');
    }

    public function edit(Armada $armada)
    {
        return view('admin.armada.edit', compact('armada'));
    }

    public function update(Request $request, Armada $armada)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'nomor_polisi' => [
                'required',
                'string',
                'max:20',
                'regex:/^[A-Za-z]{1,2}\s?\d{1,4}\s?[A-Za-z]{1,3}$/',
                Rule::unique('armada')->ignore($armada->id) // Tanpa whereNull('deleted_at')
            ],
            'tahun_kendaraan' => 'required|digits:4|integer|min:2000|max:'.(date('Y')+1),
            'jenis' => 'required|string|in:Truk',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'nomor_polisi.regex' => 'Format nomor polisi tidak valid. Contoh: B 1234 ABC',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $validator->validated();

        if ($request->hasFile('foto')) {
            // Delete old photo if exists
            if ($armada->foto && Storage::disk('public')->exists($armada->foto)) {
                Storage::disk('public')->delete($armada->foto);
            }
            $data['foto'] = $request->file('foto')->store('armada', 'public');
        }

        $armada->update($data);

        return redirect()->route('admin.armada.index')
            ->with('success', 'Data armada berhasil update!');
    }

    public function destroy(Armada $armada)
    {
        try {
            // Delete photo if exists
            if ($armada->foto && Storage::disk('public')->exists($armada->foto)) {
                Storage::disk('public')->delete($armada->foto);
            }

            $armada->forceDelete();

            return redirect()->route('admin.armada.index')
                ->with('success', 'Data armada berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menghapus data armada: '.$e->getMessage());
        }
    }
}