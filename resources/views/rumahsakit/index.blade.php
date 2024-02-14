@extends('dashboard')

@section('content')
    <div class="filter-container">
        <select id="rumahSakitFilter">
            <option value="">Semua Rumah Sakit</option>
        </select>
        <a href="{{ route('rumahsakit.add') }}">Tambah Rumah Sakit</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>Nama Rumah Sakit</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->telepon }}</td>
                    <td>
                        <a href="{{ route('rumahsakit.edit', $item->id) }}" class="btn btn-info btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm btn-delete" data-id="{{ $item->id }}">Delete</button>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <script>
        $(document).on('click', '.btn-delete', function() {
            let rumahSakitId = $(this).data('id');
            if (confirm('Apakah Anda yakin ingin menghapus rumah sakit ini?')) {
                $.ajax({
                    url: '/dashboard/rumahsakit/hapus/' + rumahSakitId,
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
    </script>
@endsection
