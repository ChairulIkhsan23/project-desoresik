@extends('layouts.app-admin')

@section('title', 'Data Armada')

@section('content')
    <h1 class="h3 mb-3"><strong>Data</strong> Armada</h1>

    <div class="container-fluid mt-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="#" class="btn btn-primary btn-sm">
                <i data-feather="plus"></i> Tambah Armada
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
                                <th>No Polisi</th>
                                <th>Tahun Kendaraan</th>
                                <th>Jenis</th>
                                <th style="width: 70px">Foto</th>
                                <th style="width: 120px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data Dummy -->
                            <tr>
                                <td>1</td>
                                <td>Hino Dutro</td>
                                <td>E 2016 UC</td>
                                <td>2020</td>
                                <td>Truk</td>
                                <td class="text-center">
                                    <img src="{{ asset('assets/img/photos/truk.jpg') }}" width="40" height="40" style="object-fit: cover;">
                                </td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a href="#" class="btn btn-sm btn-warning px-2"><i data-feather="edit"></i></a>
                                        <a href="#" class="btn btn-sm btn-danger px-2"><i data-feather="trash-2"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Hino Dutro</td>
                                <td>E 5467 UD</td>
                                <td>2020</td>
                                <td>Truk</td>
                                <td class="text-center">
                                    <img src="{{ asset('assets/img/photos/truk.jpg') }}" width="40" height="40" style="object-fit: cover;">
                                </td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a href="#" class="btn btn-sm btn-warning px-2"><i data-feather="edit"></i></a>
                                        <a href="#" class="btn btn-sm btn-danger px-2"><i data-feather="trash-2"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Hino Dutro</td>
                                <td>E 4789 UE</td>
                                <td>2020</td>
                                <td>Truk</td>
                                <td class="text-center">
                                    <img src="{{ asset('assets/img/photos/truk.jpg') }}" width="40" height="40" style="object-fit: cover;">
                                </td>
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
