<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Editar Empleado</title>
    </head>
    <body>
        <h2>Editar Empleado</h2>

        <form action="{{ route('employees.update', $employee->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="first_name">Nombre:</label>
            <input type="text" id="first_name" name="first_name" value="{{ $employee->first_name }}" required>
            <br>

            <label for="last_name">Apellido:</label>
            <input type="text" id="last_name" name="last_name" value="{{ $employee->last_name }}" required>
            <br>

            <label for="role">Role:</label>
            <input type="text" id="role" name="role" value="{{ $employee->role }}" required>
            <br>

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" value="{{ $employee->email }}" required>
            <br>

            <button type="submit">Actualizar Empleado</button>
        </form>

        <a href="{{ route('employees.index') }}">Volver a la Lista de Empleados</a>
    </body>
</html>
