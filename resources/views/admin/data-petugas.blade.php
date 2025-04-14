@extends('layouts.app-admin')

@section('title', 'Data Petugas')

@section('content')
    <h1 class="h3 mb-3"><strong>Data</strong> Petugas</h1>

    <div class="container-fluid mt-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="#" class="btn btn-primary btn-sm">
                <i data-feather="plus"></i> Tambah Petugas
            </a>
        </div>

        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle mb-0">
                        <thead class="table-success">
                            <tr>
                                <th style="width: 50px">No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th>Role</th>
                                <th style="width: 70px">Foto</th>
                                <th style="width: 100px">Status</th>
                                <th style="width: 120px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data Dummy -->
                            <tr>
                                <td>1</td>
                                <td>Rina Kusuma</td>
                                <td>rina@mail.com</td>
                                <td>081234567890</td>
                                <td>Petugas</td>
                                <td class="text-center">
                                    <img src="{{ asset('assets/img/icons/profil-petugas.png') }}" width="40" height="40" style="object-fit: cover;" class="rounded-circle">
                                </td>
                                <td><span class="badge bg-success">Aktif</span></td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a href="#" class="btn btn-sm btn-warning px-2"><i data-feather="edit"></i></a>
                                        <a href="#" class="btn btn-sm btn-danger px-2"><i data-feather="trash-2"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Ahmad Fauzi</td>
                                <td>fauzi@mail.com</td>
                                <td>082345678901</td>
                                <td>Petugas</td>
                                <td class="text-center">
                                    <img src="{{ asset('assets/img/icons/profil-petugas.png') }}" width="40" height="40" style="object-fit: cover;" class="rounded-circle">
                                </td>
                                <td><span class="badge bg-danger">Nonaktif</span></td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a href="#" class="btn btn-sm btn-warning px-2"><i data-feather="edit"></i></a>
                                        <a href="#" class="btn btn-sm btn-danger px-2"><i data-feather="trash-2"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Siti Aminah</td>
                                <td>siti@mail.com</td>
                                <td>089912345678</td>
                                <td>Petugas</td>
                                <td class="text-center">
                                    <img src="{{ asset('assets/img/icons/profil-petugas.png') }}" width="40" height="40" style="object-fit: cover;" class="rounded-circle">
                                </td>
                                <td><span class="badge bg-success">Aktif</span></td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a href="#" class="btn btn-sm btn-warning px-2"><i data-feather="edit"></i></a>
                                        <a href="#" class="btn btn-sm btn-danger px-2"><i data-feather="trash-2"></i></a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-3">
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
    </div>
@endsection

@section('scripts')
    <script>
        feather.replace();
    </script>
@endsection