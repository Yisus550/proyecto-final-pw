<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Detalles de Empleado</title>
    </head>
    <body>
        <h2>Detalles de Empleado</h2>

        <p><strong>Nombre:</strong> {{ $employee->first_name }}</p>
        <p><strong>Apellido:</strong> {{ $employee->last_name }}</p>
        <p><strong>Role:</strong> {{ $employee->role }}</p>
        <p><strong>Correo Electrónico:</strong> {{ $employee->email }}</p>

        <a href="{{ route('employees.edit', $employee->id) }}">Editar Empleado</a>
        <a href="{{ route('employees.index') }}">Volver a la Lista de Empleados</a>
    </body>
</html>
