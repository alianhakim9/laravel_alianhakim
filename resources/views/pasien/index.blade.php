@extends('dashboard')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <select name="id_rumah_sakit" id="id_rumah_sakit" class="form-select mt-2 w-50">
            <option value="">Filter berdasarkan nama rumah sakit</option>
            @foreach ($rumahsakit as $item)
                <option value="{{ $item->id }}">{{ $item->nama }}</option>
            @endforeach
        </select>
        <a href="{{ route('pasien.add') }}" class="btn btn-sm btn-primary">Tambah Pasien</a>
    </div>
    <table class="table table-bordered" id="pasien-list">
        <thead>
            <tr>
                <th>Nama Pasien</th>
                <th>Alamat</th>
                <th>Rumah Sakit</th>
                <th>Telepon</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->rumahsakit->nama }}</td>
                    <td>{{ $item->telepon }}</td>
                    <td>
                        <a href="{{ route('pasien.edit', $item->id) }}" class="btn btn-info btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm btn-delete" data-id="{{ $item->id }}">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        $(document).on('click', '.btn-delete', function() {
            let pasienId = $(this).data('id');
            if (confirm('Apakah Anda yakin ingin menghapus pasien ini?')) {
                $.ajax({
                    url: '/dashboard/pasien/hapus/' + pasienId,
                    type: 'DELETE',
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    dataType: 'json',
                    success: function(data) {
                        alert(data.message);
                        // Refresh halaman setelah berhasil menghapus
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        alert('Terjadi kesalahan: ' + xhr.responseText);
                    }
                });
            }
        });

        $(document).ready(function() {
            $('#id_rumah_sakit').change(function() {
                let rumahSakitId = $(this).val();
                $.ajax({
                    url: '/dashboard/pasien/filter',
                    type: 'GET',
                    data: {
                        id_rumah_sakit: rumahSakitId
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#pasien-list').empty();
                        $("#pasien-list").append(`
                        <thead>
                            <tr>
                                <th>Nama Pasien</th>
                                <th>Alamat</th>
                                <th>Rumah Sakit</th>
                                <th>Telepon</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        `)
                        $.each(data, function(index, item) {
                            $('#pasien-list').append(`
                            <tbody>
                                    <tr>
                                        <td>${item.nama}</td>
                                        <td>${item.alamat}</td>
                                        <td>${item.rumahsakit.nama}</td>
                                        <td>${item.telepon}</td>
                                        <td>
                                            <a href="/dashboard/pasien/edit/${item.id}"  class="btn btn-info btn-sm">Edit</a>
                                            <button class="btn btn-danger btn-sm btn-delete" data-id="${item.id}">Delete</button>
                                        </td>
                                    /tr>
                                <tbody>
                            `);
                        });
                    },
                    error: function(xhr, status, error) {
                        alert('Terjadi kesalahan: ' + xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
