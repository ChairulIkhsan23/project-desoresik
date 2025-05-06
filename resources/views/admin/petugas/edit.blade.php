@extends('layouts.app-admin')

@section('title', 'Edit Petugas')

@section('content')
    <h1 class="h3 mb-3"><strong>Edit</strong> Petugas</h1>

    <div class="container-fluid mt-3">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.petugas.update', $petugas->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $petugas->name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email Petugas</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $petugas->email) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No HP</label>
                        <input type="text" name="no_hp" id="no_hp" class="form-control" value="{{ old('no_hp', $petugas->no_hp) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" id="role" class="form-select" required>
                            <option value="Petugas" {{ $petugas->role == 'Petugas' ? 'selected' : '' }}>Petugas</option>
                            <option value="Admin" {{ $petugas->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select" required>
                            <option value="Aktif" {{ $petugas->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="Nonaktif" {{ $petugas->status == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label">Ganti Foto (Opsional)</label>
                        <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <a href="{{ route('admin.petugas.index') }}" class="btn btn-outline-secondary btn-sm">
                            <i data-feather="arrow-left"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i data-feather="save"></i> Update Petugas
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        feather.replace();
    </script>
@endsection
