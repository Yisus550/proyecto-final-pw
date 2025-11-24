<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>POS Login</title>
</head>

<body>
    <main>
        <h2>Iniciar Sesión en POS</h2>
            @error('email')
                <div id="email-error" role="alert" aria-live="polite" style="color: red;">
                    {{ session('error') }}
                </div>
            @enderror

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div>
                    <label for="email">Correo electronico:</label>
                    <input type="email" id="email" name="email" required autofocus @error('email') aria-describedby="email-error" aria-invalid="true" @enderror>
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
    </main>
</body>

</html>
