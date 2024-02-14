@extends('dashboard')

@section('content')
    <div class="filter-container">
        <select id="rumahSakitFilter">
            <option value="">Semua Rumah Sakit</option>
            <!-- Options will be added dynamically using Ajax -->
        </select>
    </div>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Rumah Sakit A</td>
                <td>Jalan A No. 1</td>
                <td>
                    <button>Edit</button>
                    <button>Delete</button>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
