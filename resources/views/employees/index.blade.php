<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Lista de Empleados</title>
    </head>
    <body>
        <h2>Lista de Empleados</h2>

        <a href="{{ route('employees.create') }}">Agregar Nuevo Empleado</a>

        @if ($employees->isEmpty())
            <p>No hay empleados registrados.</p>
        @else
            <table border="1">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Role</th>
                        <th>Correo Electrónico</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $employee->first_name }}</td>
                            <td>{{ $employee->last_name }}</td>
                            <td>{{ $employee->role }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>
                                <a href="{{ route('employees.show', $employee->id) }}">Ver detalles</a>
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este empleado?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </body>
</html>
