<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Editar Cliente</title>
    </head>
    <body>
        <h2>Editar Cliente</h2>

        <form action="{{ route('customers.update', $customer->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="first_name">Nombre:</label>
                <input type="text" id="first_name" name="first_name" value="{{ $customer->first_name }}" required>
            </div>

            <div>
                <label for="last_name">Apellido:</label>
                <input type="text" id="last_name" name="last_name" value="{{ $customer->last_name }}" required>
            </div>

            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ $customer->email}}" required>
            </div>

            <div>
                <label for="phone_number">Teléfono:</label>
                <input type="text" id="phone_number" name="phone_number" value="{{ $customer->phone_number}}" required>
            </div>

            <div>
                <label for="is_active">Activo:</label>
                <input type="checkbox" id="is_active" name="is_active">
            </div>

            <button type="submit">Guardar Cliente</button>
        </form>

        <a href="{{ route('customers.index') }}">Volver a la Lista de Clientes</a>
    </body>
</html>
