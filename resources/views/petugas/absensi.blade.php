@extends('layouts.app-petugas')

@section('title', 'Absensi')

@section('content')
    <!-- Presensi Harian -->
<div class="card border-0 shadow-sm mb-4">
    <div class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fas fa-calendar-check text-primary me-2"></i> Presensi Hari Ini</h5>
        <small id="currentDateTime" class="text-muted"></small>
    </div>
    <div class="card-body">
        <form id="formPresensi">
            <div class="mb-3">
                <label class="form-label">Status Kehadiran</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value="Hadir" id="hadirRadio" checked>
                    <label class="form-check-label" for="hadirRadio">Hadir</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value="Sakit" id="sakitRadio">
                    <label class="form-check-label" for="sakitRadio">Sakit</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value="Izin" id="izinRadio">
                    <label class="form-check-label" for="izinRadio">Izin</label>
                </div>
            </div>

            <div id="uploadSection" class="d-none">
                <div class="mb-3">
                    <label for="buktiDokumentasi" class="form-label">Upload Bukti (Foto)</label>
                    <input type="file" class="form-control" id="buktiDokumentasi" name="bukti">
                </div>
                <div class="mb-3">
                    <label for="catatan" class="form-label">Catatan</label>
                    <textarea class="form-control" id="catatan" name="catatan" rows="3" placeholder="Tulis alasan secara singkat..."></textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-success w-100 mt-3">Submit</button>
        </form>
    </div>
</div>

<!-- Riwayat Presensi -->
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-0 py-3">
        <h6 class="mb-0"><i class="fas fa-history me-2 text-secondary"></i> Riwayat Presensi</h6>
    </div>
    <div class="card-body">
        <ul class="list-group">
            <!-- Dummy data, ganti nanti dengan loop dari database -->
            <li class="list-group-item d-flex justify-content-between align-items-center">
                24 April 2025 - Hadir
                <span class="badge bg-success">08:01</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                23 April 2025 - Izin
                <span class="badge bg-warning text-dark">08:10</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                22 April 2025 - Sakit
                <span class="badge bg-danger">09:05</span>
            </li>
        </ul>
    </div>
</div>

<!-- Script -->
<script>
    // Tampilkan tanggal dan waktu sekarang
    function updateCurrentDateTime() {
        const now = new Date();
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        const time = now.toLocaleTimeString('id-ID');
        const date = now.toLocaleDateString('id-ID', options);
        document.getElementById('currentDateTime').textContent = `${date} - ${time}`;
    }

    updateCurrentDateTime();
    setInterval(updateCurrentDateTime, 1000); // perbarui tiap detik

    // Tampilkan form upload bila status Sakit/Izin
    document.querySelectorAll('input[name="status"]').forEach((radio) => {
        radio.addEventListener('change', function () {
            const uploadSection = document.getElementById('uploadSection');
            if (this.value === 'Sakit' || this.value === 'Izin') {
                uploadSection.classList.remove('d-none');
            } else {
                uploadSection.classList.add('d-none');
            }
        });
    });

    // Simulasi submit
    document.getElementById('formPresensi').addEventListener('submit', function (e) {
        e.preventDefault();
        alert('Presensi berhasil dicatat!');
        // Logika simpan ke backend bisa kamu tambahkan di sini.
    });
</script>

@endsection

@section('scripts')
    <script>
        feather.replace();
    </script>
@endsection