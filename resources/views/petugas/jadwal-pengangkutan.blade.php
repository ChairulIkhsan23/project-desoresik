@extends('layouts.app-admin')

@section('title', 'Jadwal pengangkutan')

@section('content')
<h1 class="h3 mb-3"><strong>Jadwal</strong> Pengangkutan</h1>

{{-- Pencarian --}}
<div class="search-container d-flex align-items-center gap-3 mb-4" style="gap: 1rem;">
    <div class="btn-group">
        <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Pencarian
        </button>
        <ul class="dropdown-menu dropdown-menu-end p-3" style="min-width: 300px;">
            <li>
                <form>
                    <div class="mb-3">
                        <input type="text" class="form-control form-control-sm" placeholder="Cari...">
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary w-100">Cari</button>
                </form>
            </li>
        </ul>
    </div>

    {{-- Kalender --}}
    <div class="btn-group">
        <button type="button" class="btn btn-outline-primary btn-sm" id="calendarButton">
            <i data-feather="calendar"></i> Kalender
        </button>
        <div id="calendar" class="d-none" style="position: absolute; z-index: 100; border: 1px solid #ddd; background-color: #fff; padding: 10px;"></div>
    </div>
</div>

{{-- Tabel Jadwal Pengangkutan --}}
<div class="card mb-4">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle mb-0">
                <thead class="table-success">
                    <tr>
                        <th style="width: 50px">No</th>
                        <th>Nama TPS</th>
                        <th>Petugas</th>
                        <th>No Kendaraan</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Status</th>
                        <th style="width: 120px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>TPS Pasar Baru</td>
                        <td>Rina Kusuma</td>
                        <td>E 2016 UC</td>
                        <td>2025-04-15</td>
                        <td>08:00</td>
                        <td><span class="badge bg-warning text-dark">Diproses</span></td>
                        <td>
                            <div class="d-flex gap-1">
                                <button class="btn btn-sm btn-primary px-3" data-bs-toggle="modal" data-bs-target="#laporanModal">
                                    <i data-feather="archive"></i> Laporan
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Modal Form Laporan --}}
<div class="modal fade" id="laporanModal" tabindex="-1" aria-labelledby="laporanModalLabel" aria-hidden="true" data-bs-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header custom-bg py-2">
                <strong><h5 class="modal-title fs-6" id="laporanModalLabel">Form Laporan Pengangkutan</h5></strong>
                <button type="button" class="btn-close btn-close-black" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-3">
                <form id="formLaporan">
                    <div class="row g-2">
                        <div class="col-12 mb-2">
                            <label for="noLaporan" class="form-label small">No</label>
                            <input type="text" class="form-control form-control-sm" id="noLaporan" required>
                        </div>
                        <div class="col-12 mb-2">
                            <label for="status" class="form-label small">Status Laporan</label>
                            <select class="form-select form-select-sm" id="status" required>
                                <option value="">Pilih Status</option>
                                <option value="selesai">Selesai</option>
                                <option value="ditunda">Ditunda</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="foto" class="form-label small">Foto</label>
                        <input type="file" class="form-control form-control-sm" id="foto" accept="image/*" required>
                    </div>
                    <div class="mb-2">
                        <label for="catatan" class="form-label small">Catatan</label>
                        <textarea class="form-control form-control-sm" id="catatan" rows="2"></textarea>
                    </div>
                    <div class="row g-2">
                        <div class="col-md-6 mb-2">
                            <label for="timbulanSampah" class="form-label small">Timbulan Sampah (Ton)</label>
                            <input type="number" step="0.01" class="form-control form-control-sm" id="timbulanSampah" required>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="waktuLapor" class="form-label small">Waktu Lapor</label>
                            <input type="datetime-local" class="form-control form-control-sm" id="waktuLapor" required>
                        </div>
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
            <li class="page-item"><a class="page-link btn btn-primary btn-sm me-1" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link btn btn-outline-primary btn-sm me-1" href="#">1</a></li>
            <li class="page-item active"><a class="page-link btn btn-primary btn-sm me-1" href="#">2</a></li>
            <li class="page-item"><a class="page-link btn btn-outline-primary btn-sm me-1" href="#">3</a></li>
            <li class="page-item"><a class="page-link btn btn-primary btn-sm" href="#">Next</a></li>
        </ul>
    </nav>
</div>

{{-- History Pengangkutan --}}
<h2 class="h5 mb-3"><strong>History Pengangkutan</strong></h2>

<div class="btn-group h3 mb-3">
    <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        Filter
    </button>
    <ul class="dropdown-menu dropdown-menu-end p-3" style="min-width: 300px;">
        <li class="mb-2">
            <label class="form-label mb-1">Hari</label>
            <select class="form-select form-select-sm">
                <option selected>Pilih Hari</option>
                <option>Minggu</option>
                <option>Senin</option>
                <option>Selasa</option>
                <option>Rabu</option>
                <option>Kamis</option>
                <option>Jumat</option>
                <option>Sabtu</option>
            </select>
        </li>
        <li class="mb-2">
            <label class="form-label mb-1">Bulan</label>
            <select class="form-select form-select-sm">
                <option selected>Pilih Bulan</option>
                @for($i = 1; $i <= 12; $i++)
                    <option>{{ DateTime::createFromFormat('!m', $i)->format('F') }}</option>
                @endfor
            </select>
        </li>
        <li>
            <label class="form-label mb-1">Tahun</label>
            <select class="form-select form-select-sm">
                <option selected>Pilih Tahun</option>
                @for($year = 2023; $year <= now()->year + 1; $year++)
                    <option>{{ $year }}</option>
                @endfor
            </select>
        </li>
        <li class="mt-3 d-grid">
            <button class="btn btn-primary btn-sm">Terapkan</button>
        </li>
    </ul>
</div>

{{-- Kalender Script --}}
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const calendarButton = document.getElementById('calendarButton');
        const calendar = document.getElementById('calendar');

        calendarButton.addEventListener('click', function () {
            calendar.classList.toggle('d-none');
            if (!calendar.classList.contains('d-none')) {
                displayCalendar(); // Tampilkan kalender jika tombol diklik
            }
        });

        function displayCalendar() {
            const today = new Date();
            const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
            const month = today.getMonth();
            const year = today.getFullYear();
            const firstDay = new Date(year, month, 1);
            const lastDay = new Date(year, month + 1, 0);
            const numDays = lastDay.getDate();

            let calendarHtml = `<h4>${monthNames[month]} ${year}</h4>`;
            calendarHtml += '<div class="calendar-grid" style="display: grid; grid-template-columns: repeat(7, 1fr); gap: 5px;">';
            
            // Menambahkan hari-hari dalam minggu
            const weekdays = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
            weekdays.forEach(day => {
                calendarHtml += `<div class="calendar-day header" style="text-align: center; font-weight: bold;">${day}</div>`;
            });

            // Mengisi tanggal
            for (let i = 1; i <= numDays; i++) {
                const date = new Date(year, month, i);
                const dayOfWeek = date.getDay();
                calendarHtml += `<div class="calendar-day" style="text-align: center;">${i}</div>`;
            }

            calendarHtml += '</div>';
            calendar.innerHTML = calendarHtml;
        }
    });
</script>
@endpush
@endsection
