<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/global.css') }}">
</head>

<body>
    @guest
        <div class="login-container">
            <div class="login-content">
                <h1>Selamat Datang Di Aplikasi Manajemen Rumah Sakit</h1>
                <p>Silahkan login terlebih dahulu</p>
            </div>
            <form class="form-login" action="{{ route('login') }}" method="POST">
                @csrf
                <div>
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required autofocus>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="btn">Login</button>
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
