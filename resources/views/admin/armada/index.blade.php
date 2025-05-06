@extends('layouts.app-admin')

@section('title', 'Data Armada')

@section('content')
    <h1 class="h3 mb-3"><strong>Data</strong> Armada</h1>

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

    <div class="container-fluid mt-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="{{ route('admin.armada.create') }}" class="btn btn-primary btn-sm">
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
                                <th>Tahun</th>
                                <th>Jenis</th>
                                <th style="width: 70px">Foto</th>
                                <th style="width: 120px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($armada as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->nomor_polisi }}</td>
                                    <td>{{ $item->tahun_kendaraan }}</td>
                                    <td>{{ $item->jenis }}</td>
                                    <td class="text-center">
                                        <img src="{{ $item->foto ? asset('storage/' . $item->foto) : asset('assets/img/photos/truk.jpg') }}" 
                                             width="40" height="40" 
                                             style="object-fit: cover;" 
                                             class="rounded-circle">
                                    </td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <a href="{{ route('admin.armada.edit', $item->id) }}" class="btn btn-sm btn-warning px-2">
                                                <i data-feather="edit"></i>
                                            </a>
                                            <form action="{{ route('admin.armada.destroy', $item->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger px-2">
                                                    <i data-feather="trash-2"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Belum ada data.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-3">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-end">
                    @if(method_exists($armada, 'links'))
                        {{ $armada->links() }}
                    @endif
                </ul>
            </nav>
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
                    setTimeout(() => alert.remove(), 150); // Remove after fade animation
                }, 500); 
            });
        });
    </script>
@endsection