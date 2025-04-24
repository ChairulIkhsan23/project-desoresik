@extends('layouts.app-petugas')

@section('title', 'Laporan Kendala')

@section('content')
    <h1 class="h3 mb-3"><strong>Laporan</strong> Kendala</h1>
    
    {{-- Tombol Tambah Jadwal --}}
    <div class="btn-group mb-3">
        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#laporanModal">
            <i data-feather="plus"></i> Buat Laporan
        </button>
    </div>
    
    <h2 class="h5 mb-3">History Kendala</h2>
    
    {{-- Tabel Laporan Kendala --}}
    <div class="card mb-4">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle mb-0">
                    <thead class="table-success">
                        <tr>
                            <th style="width: 50px">No</th>
                            <th>Petugas</th>
                            <th>Jadwal</th>
                            <th>Deskripsi</th>
                            <th>Foto</th>
                            <th>Waktu Lapor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Rina Kusuma</td>
                            <td>2025-04-15 08:00</td>
                            <td>Kendala pada pengangkutan di TPS Pasar Baru, truk rusak.</td>
                            <td class="text-center">
                                <img src="{{ asset('assets/img/photos/truk-rusak.jpg') }}" width="60" height="60" style="object-fit: cover;" class="rounded">
                            </td>
                            <td>2025-04-15 09:20</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Andi Prasetya</td>
                            <td>2025-04-16 07:30</td>
                            <td>Terjadi macet parah di jalan menuju TPS Jatinegara.</td>
                            <td class="text-center">
                                <img src="{{ asset('assets/img/photos/jalan-macet.jpg') }}" width="60" height="60" style="object-fit: cover;" class="rounded">
                            </td>
                            <td>2025-04-16 08:15</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Modal Form Laporan --}}
    <div class="modal fade" id="laporanModal" tabindex="-1" aria-labelledby="laporanModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
            <div class="modal-content" style="font-size: 0.85rem;">
                <div class="modal-header py-2" style="background-color: #d1f2eb;">
                    <h5 class="modal-title fs-6 fw-bold" id="laporanModalLabel">Form Laporan Kendala</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-2">
                    <form id="formLaporan">
                        <div class="mb-2">
                            <label for="foto" class="form-label" style="font-size: 0.75rem;">Foto</label>
                            <input type="file" class="form-control form-control-sm" id="foto" accept="image/*" required>
                        </div>
                        <div class="mb-2">
                            <label for="catatan" class="form-label" style="font-size: 0.75rem;">Deskripsi</label>
                            <textarea class="form-control form-control-sm" id="catatan" rows="2"></textarea>
                        </div>
                        <div class="mb-2">
                            <label for="waktuLapor" class="form-label" style="font-size: 0.75rem;">Waktu Lapor</label>
                            <input type="datetime-local" class="form-control form-control-sm" id="waktuLapor" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer py-2">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" form="formLaporan" class="btn btn-sm btn-primary">Simpan Laporan</button>
                </div>
            </div>
        </div>
    </div>
    

    {{-- Pagination --}}
    <div class="mt-3 mb-4">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-end">
                <li class="page-item">
                    <a class="page-link btn btn-primary btn-sm me-1" href="#">Previous</a>
                </li>
                <li class="page-item">
                    <a class="page-link btn btn-outline-primary btn-sm me-1" href="#">1</a>
                </li>
                <li class="page-item active">
                    <a class="page-link btn btn-primary btn-sm me-1" href="#">2</a>
                </li>
                <li class="page-item">
                    <a class="page-link btn btn-outline-primary btn-sm me-1" href="#">3</a>
                </li>
                <li class="page-item">
                    <a class="page-link btn btn-primary btn-sm" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi Feather Icons
            feather.replace();
            
            // Debug modal
            var modal = new bootstrap.Modal(document.getElementById('laporanModal'));
            console.log('Modal initialized:', modal);
            
            // Event listener untuk form submission
            document.getElementById('formLaporan').addEventListener('submit', function(e) {
                e.preventDefault();
                alert('Form berhasil disubmit!');
                modal.hide();
            });
        });
    </script>
@endsection