@extends('dashboard')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('pasien') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ubah Data Pasien</li>
        </ol>
    </nav>
    <h4 class="fw-bold">Form Ubah Pasien</h4>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pasien.update', $pasien->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-floating mb-3">
            <input type="text" id="nama" name="nama" value="{{ old('nama', $pasien->nama) }}" required
                class="form-control">
            <label for="nama">Nama Pasien</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" id="alamat" name="alamat" value="{{ old('alamat', $pasien->alamat) }}" required
                class="form-control">
            <label for="alamat">Alamat</label>
        </div>
        <div class="form-floating mb-3">
            <input type="tel" id="telepon" name="telepon" pattern="[0-9]{10,13}"
                value="{{ old('telepon', $pasien->telepon) }}" required class="form-control">
            <small>Format: 10-13 digit angka</small>
            <label for="telepon">Telepon</label>
        </div>
        <label for="id_rumah_sakit">Pilih Rumah Sakit: </label>
        <select name="id_rumah_sakit" id="id_rumah_sakit" class="form-select mt-2">
            <option value="">Pilih Rumah Sakit</option>
            @foreach ($rumahsakit as $item)
                <option value="{{ $item->id }}" @if ($pasien->rumahsakit->id == $item->id) selected @endif>{{ $item->nama }}
                </option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary mt-4 btn-sm">Simpan Perubahan</button>
    </form>

@endsection
