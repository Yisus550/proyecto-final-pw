<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Agregar un Nuevo Empleado</title>
    </head>
    <body>
        <h2>Agregar un Nuevo Empleado</h2>

        <form action="{{ route('employees.store') }}" method="POST">
            @csrf
            <div>
                <label for="first_name">Nombre:</label>
                <input type="text" id="first_name" name="first_name" required>
            </div>

            <div>
                <label for="last_name">Apellido:</label>
                <input type="text" id="last_name" name="last_name" required>
            </div>

            <div>
                <label for="role">Role:</label>
                <input type="text" id="role" name="role" required>
            </div>

            <div>
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <button type="submit">Guardar Empleado</button>
        </form>

        <a href="{{ route('employees.index') }}">Volver a la Lista de Empleados</a>
    </body>
</html>
