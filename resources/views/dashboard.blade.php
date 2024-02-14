<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/dashboard.css') }}">
</head>

<body>

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-link">
            <a href="/dashboard/rumahsakit">CRUD Rumah Sakit</a>
            <a href="/dashboard/pasien">CRUD Pasien</a>
        </div>
        @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @endauth
    </aside>

    <main class="content">
        @yield('content')
    </main>
</body>

</html>
