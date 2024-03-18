<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])

    <title>Curso</title>
</head>

<body>

    <header class="p-3 text-bg-primary">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                        <use xlink:href="#bootstrap" />
                    </svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="{{ route('conta.index') }}" class="nav-link px-2 text-white">Home</a></li>
                    <li><a href="{{ route('conta.index') }}" class="nav-link px-2 text-white">Contas</a></li>
                </ul>

                <div class="text-end">
                    <a href="{{ route('login')}}" type="button" class="btn btn-warning">Login</a>
                </div>
            </div>
        </div>
    </header>

    <div class="container">

        @yield('content')

    </div>

</body>

</html>
