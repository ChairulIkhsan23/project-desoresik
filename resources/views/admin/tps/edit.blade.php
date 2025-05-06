@extends('layouts.app-admin')

@section('title', 'Edit TPS')

@section('content')
<div class="container py-4">
    <h2>Edit TPS</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.tps.update', $tps->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_tps" class="form-label">Nama TPS</label>
            <input type="text" name="nama_tps" class="form-control" id="nama_tps" value="{{ $tps->nama_tps }}" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" id="alamat" rows="2" required>{{ $tps->alamat }}</textarea>
        </div>
        <div class="mb-3">
            <label for="latitude" class="form-label">Latitude</label>
            <input type="text" name="latitude" class="form-control" id="latitude" value="{{ $tps->latitude }}" required>
        </div>
        <div class="mb-3">
            <label for="longitude" class="form-label">Longitude</label>
            <input type="text" name="longitude" class="form-control" id="longitude" value="{{ $tps->longitude }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.tps.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
