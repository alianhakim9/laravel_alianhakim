<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/dashboard.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <aside class="d-flex align-items-start sidebar">
        <div class="sidebar-link">
            <ul class="nav">
                <li class="nav-item">
                    <a href="/dashboard/rumahsakit" class="nav-link">CRUD Rumah Sakit</a>
                </li>
                <li class="nav-item">
                    <a href="/dashboard/pasien" class="nav-link">CRUD Pasien</a>
                </li>
            </ul>
        </div>
        @auth
            <form method="POST" action="{{ route('logout') }}" class="ps-4">
                @csrf
                <button type="submit" class="btn btn-sm btn-warning ps-4 pe-4">Logout</button>
            </form>
        @endauth
    </aside>

    <main class="content">
        @yield('content')
    </main>
</body>

</html>
