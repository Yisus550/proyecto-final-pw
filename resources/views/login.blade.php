<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>POS Login</title>
</head>

<body>
    <div>
        <h2>Iniciar Sesión en POS</h1>
            @error('email')
                <div style="color: red;">
                    {{ $message }}
                </div>
            @enderror

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div>
                    <label for="email">Correo electrónico:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div>
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <!-- <div>
                    <label for="remember">
                        <input type="checkbox" id="remember" name="remember">
                        Recuérdame
                    </label>
                </div> -->
                <div>
                    <button type="submit">Iniciar Sesión</button>
                </div>
            </form>
    </div>
</body>

</html>
