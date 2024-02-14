<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/global.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/dashboard.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</head>

<body>
    @guest
        <div class="login-container">
            <div class="login-content">
                <h1>Selamat Datang Di Aplikasi Manajemen Rumah Sakit</h1>
                <p>Silahkan login terlebih dahulu</p>
            </div>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group d-flex flex-column align-items-start">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required autofocus class="form-control">
                </div>
                <div class="form-group d-flex flex-column align-items-start">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required class="form-control">
                </div>
                <button type="submit" class="btn btn-primary w-full mt-4">Login</button>
            </form>
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    @endguest

    @auth
        <div>
            <p>Sudah login, silahkan akses halaman dashboard</p>
            <a href="/dashboard">Dashboard</a>
        </div>
    @endauth
</body>

</html>
