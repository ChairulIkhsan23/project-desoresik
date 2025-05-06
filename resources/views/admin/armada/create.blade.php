@extends('layouts.app-admin')

@section('title', 'Tambah Armada')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="h3 mb-0"><strong>Tambah</strong> Armada</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.armada.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama Armada</label>
                                        <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" 
                                               value="{{ old('nama') }}" required autofocus>
                                        @error('nama')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="nomor_polisi" class="form-label">Nomor Polisi</label>
                                        <input type="text" name="nomor_polisi" id="nomor_polisi" 
                                               class="form-control @error('nomor_polisi') is-invalid @enderror" 
                                               value="{{ old('nomor_polisi') }}" required>
                                        @error('nomor_polisi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="tahun_kendaraan" class="form-label">Tahun Kendaraan</label>
                                        <input type="number" name="tahun_kendaraan" id="tahun_kendaraan" 
                                               class="form-control @error('tahun_kendaraan') is-invalid @enderror"
                                               value="{{ old('tahun_kendaraan') }}" required 
                                               min="2000" max="{{ date('Y') + 1 }}"
                                               placeholder="Masukkan tahun pembuatan">
                                        @error('tahun_kendaraan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="jenis" class="form-label">Jenis Armada</label>
                                        <select name="jenis" id="jenis" class="form-select @error('jenis') is-invalid @enderror" required>
                                            <option value="">Pilih Jenis Armada</option>
                                            <option value="Truk" {{ old('jenis') == 'Truk' ? 'selected' : '' }}>Truk</option>
                                        </select>
                                        @error('jenis')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto Armada</label>
                                <input type="file" name="foto" id="foto" 
                                       class="form-control @error('foto') is-invalid @enderror" 
                                       accept="image/jpeg,image/png,image/jpg">
                                <div class="form-text">Format: JPG, PNG, JPEG. Maksimal 2MB.</div>
                                @error('foto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('admin.petugas.index') }}" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection