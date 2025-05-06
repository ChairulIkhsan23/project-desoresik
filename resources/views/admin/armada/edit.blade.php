@extends('layouts.app-admin')

@section('title', 'Edit Armada')

@section('content')
    <h1 class="h3 mb-3"><strong>Edit</strong> Armada</h1>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i data-feather="check-circle" class="me-1"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i data-feather="x-circle" class="me-1"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.armada.update', $armada->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Nama Armada</label>
                            <input type="text" name="nama" class="form-control" 
                                   value="{{ old('nama', $armada->nama) }}" required>
                            @error('nama')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nomor Polisi</label>
                            <input type="text" name="nomor_polisi" class="form-control" 
                                   value="{{ old('nomor_polisi', $armada->nomor_polisi) }}" required>
                            @error('nomor_polisi')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tahun Kendaraan</label>
                            <input type="number" name="tahun_kendaraan" class="form-control" 
                                   value="{{ old('tahun_kendaraan', $armada->tahun_kendaraan) }}" 
                                   min="2000" max="{{ date('Y') + 1 }}" required>
                            @error('tahun_kendaraan')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Jenis</label>
                            <select name="jenis" class="form-control" required>
                                <option value="Truk" {{ old('jenis', $armada->jenis) == 'Truk' ? 'selected' : '' }}>Truk</option>
                            </select>
                            @error('jenis')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Foto Armada</label>
                            <input type="file" name="foto" class="form-control" 
                                   accept="image/jpeg,image/png,image/jpg">
                            <div class="form-text">Format: JPG, PNG, JPEG. Maksimal 2MB</div>
                            @if($armada->foto)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $armada->foto) }}" 
                                         width="100" class="img-thumbnail">
                                </div>
                            @endif
                            @error('foto')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('admin.armada.index') }}" class="btn btn-outline-secondary btn-sm">
                            <i data-feather="arrow-left"></i> Kembali
                        </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        feather.replace();

        // Auto-hide alerts after 4 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert');
            
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.classList.remove('show');
                    alert.classList.add('fade');
                    setTimeout(() => alert.remove(), 150);
                }, 4000); 
            });
        });
    </script>
@endsection