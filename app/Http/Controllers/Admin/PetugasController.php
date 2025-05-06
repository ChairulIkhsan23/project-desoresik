<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Mail\AkunPetugasMail;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;

class PetugasController extends Controller
{
    public function index()
    {
        $petugas = User::where('role', 'Petugas')
                     ->orderBy('created_at', 'desc')
                     ->paginate(10);
        
        return view('admin.petugas.index', compact('petugas'));
    }

    public function create()
    {
        return view('admin.petugas.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'email' => [
                'required',
                'email:rfc,dns',
                Rule::unique('users')
            ],
            'no_hp' => 'required|string|max:20|regex:/^[0-9]+$/',
            'role' => 'required|in:Petugas,Admin',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:Aktif,Nonaktif',
            'password' => 'required|string|min:6', // Tanpa confirmed
        ], [
            'email.unique' => 'Email sudah terdaftar di sistem',
            'no_hp.regex' => 'Nomor HP hanya boleh angka',
            'foto.max' => 'Ukuran foto maksimal 2MB',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                           ->withErrors($validator)
                           ->withInput();
        }

        $data = $validator->validated();
        
        $userData = [
            'name' => $data['nama'],
            'email' => $data['email'],
            'no_hp' => $data['no_hp'],
            'role' => $data['role'],
            'status' => $data['status'],
            'password' => bcrypt($data['password']),
        ];

        if ($request->hasFile('foto')) {
            $userData['foto'] = $request->file('foto')
                                      ->store('foto_petugas', 'public');
        }

        $petugas = User::create($userData);

        // Generate PDF
        $pdf = Pdf::loadView('pdf.info_akun_petugas', [
            'petugas' => $petugas,
            'password' => $data['password']
        ]);
        
        $pdfPath = storage_path('app/public/info_akun_'.$petugas->id.'.pdf');
        $pdf->save($pdfPath);

        // Send Email
        Mail::to($petugas->email)
           ->send(new AkunPetugasMail($petugas, $data['password'], $pdfPath));

        // Delete temporary PDF
        if (file_exists($pdfPath)) {
            unlink($pdfPath);
        }

        return redirect()->route('admin.petugas.index')
                       ->with('success', 'Petugas berhasil ditambahkan!');
    }

    public function edit(User $petugas)
    {
        return view('admin.petugas.edit', compact('petugas'));
    }

    public function update(Request $request, User $petugas)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'email' => [
                'required',
                'email:rfc,dns',
                Rule::unique('users')->ignore($petugas->id)
            ],
            'no_hp' => 'required|string|max:20|regex:/^[0-9]+$/',
            'role' => 'required|in:Petugas,Admin',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:Aktif,Nonaktif',
        ], [
            'email.unique' => 'Email sudah terdaftar di sistem',
            'no_hp.regex' => 'Nomor HP hanya boleh angka',
            'foto.max' => 'Ukuran foto maksimal 2MB',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                           ->withErrors($validator)
                           ->withInput();
        }

        $data = $validator->validated();
        
        $updateData = [
            'name' => $data['nama'],
            'email' => $data['email'],
            'no_hp' => $data['no_hp'],
            'role' => $data['role'],
            'status' => $data['status'],
        ];

        if ($request->hasFile('foto')) {
            // Delete old photo if exists
            if ($petugas->foto && Storage::disk('public')->exists($petugas->foto)) {
                Storage::disk('public')->delete($petugas->foto);
            }
            
            $updateData['foto'] = $request->file('foto')
                                        ->store('foto_petugas', 'public');
        }

        $petugas->update($updateData);

        return redirect()->route('admin.petugas.index')
                       ->with('success', 'Data petugas berhasil update!');
    }

    public function destroy(User $petugas)
    {
        try {
            // Delete photo if exists
            if ($petugas->foto && Storage::disk('public')->exists($petugas->foto)) {
                Storage::disk('public')->delete($petugas->foto);
            }

            $petugas->forceDelete();

            return redirect()->route('admin.petugas.index')
                           ->with('success', 'Petugas berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()
                           ->with('error', 'Gagal menghapus petugas: '.$e->getMessage());
        }
    }
}