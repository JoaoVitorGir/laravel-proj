{{-- os @yield vão se preenchidos pela view --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>@yield('titulo')</title>
</head>
<body>
    {{-- padrão em todas as paginas  --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light topbar-padrao">
        <div class="container">
            <a class="navbar-brand font-topbar-title" href="{{url('/home')}}">WEB PAGE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link font-topbar" aria-current="page" href="{{url('/home')}}">Home</a>
                    <a class="nav-link font-topbar" href="#">Features</a>
                    <a class="nav-link font-topbar" href="#">Pricing</a>
                    <a class="nav-link font-topbar">Disabled</a>
                </div>
            </div>
        </div>
    </nav>
    {{-- aqui vai qual quer coisa e vai ficar a baixo sempre da barra de titulo --}}
    @yield('corpo')
        

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>