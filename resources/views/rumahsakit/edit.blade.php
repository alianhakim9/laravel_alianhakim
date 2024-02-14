@extends('dashboard')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('rumahsakit') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ubah Data Rumah Sakit</li>
        </ol>
    </nav>
    <h4 class="fw-bold">Form Ubah Rumah Sakit</h4>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('rumahsakit.update', $rumahSakit->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-floating mb-3">
            <input type="text" id="nama" name="nama" value="{{ old('nama', $rumahSakit->nama) }}" required
                class="form-control">
            <label for="nama">Nama Rumah Sakit</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" id="alamat" name="alamat" value="{{ old('alamat', $rumahSakit->alamat) }}" required
                class="form-control">
            <label for="alamat">Alamat</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" id="email" name="email" value="{{ old('email', $rumahSakit->email) }}" required
                class="form-control">
            <label for="email">Email</label>
        </div>
        <div class="form-floating mb-3">
            <input type="tel" id="telepon" name="telepon" pattern="[0-9]{10,13}"
                value="{{ old('telepon', $rumahSakit->telepon) }}" required class="form-control">
            <small>Format: 10-13 digit angka</small>
            <label for="telepon">Telepon</label>
        </div>
        <button type="submit" class="btn btn-primary mt-4 btn-sm">Simpan Perubahan</button>
    </form>

@endsection
