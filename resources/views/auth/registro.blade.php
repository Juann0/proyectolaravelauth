<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Registro</title>
</head>

<body>
    <div class="login-container">
        <div class="logo-container vertical-center">
            <img src="https://i.ibb.co/D5t6vhf/LOGO-ERNESTO-01-1.png" alt="">
        </div>
        <div class=" vertical-center text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <form action="{{ route('registro') }}" method="POST">
                            @csrf
                            <img class="mb-4" src="https://i.ibb.co/D5t6vhf/LOGO-ERNESTO-01-1.png" width="200">
                            <h1 class="h3 mb-3 fw-normal">Registro de usuario</h1>

                            <div class="form-floating mb-2">
                                <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="floatingInput" name="nombre" placeholder="Nombre(s)">
                                <label for="floatingInput">Nombre(s)</label>
                                @error('nombre')
                                <div class="alert alert-danger mb-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control @error('apellido') is-invalid @enderror" id="floatingInput" name="apellido" placeholder="Nombre(s)">
                                <label for="floatingInput">Apellido(s)</label>
                                @error('apellido')
                                <div class="alert alert-danger mb-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating mb-2">
                                <input type="email" class="form-control @error('correo') is-invalid @enderror" id="floatingInput" name="correo" placeholder="name@example.com">
                                <label for="floatingInput">Correo electronico</label>
                                @error('correo')
                                <div class="alert alert-danger mb-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating mb-2">
                                <input type="password" class="form-control  @error('password') is-invalid @enderror" id="floatingPassword" name="password" placeholder="Password">
                                <label for="floatingPassword">Contraseña</label>
                                @error('password')
                                <div class="alert alert-danger mb-2">{{ $message }}</div>
                                @enderror
                            </div>

                            @if(session()->has('correcto'))
                            <div class="alert alert-success">
                                {{ session()->get('correcto') }}
                            </div>
                            @endif

                            <button class="w-100 btn btn-lg btn-primary" type="submit">Registrarse</button>
                            <p class="mt-5 mb-3 text-muted">
                                <a id="forgot-password" href="{{ url('/login') }}">Volver al login</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>