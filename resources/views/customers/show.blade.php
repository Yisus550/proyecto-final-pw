<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Detalles de Cliente</title>
    </head>
    <body>
        <h2>Detalles de Cliente</h2>

        <div>
            <strong>Nombre:</strong> {{ $customer->first_name }}
        </div>
        <div>
            <strong>Apellido:</strong> {{ $customer->last_name }}
        </div>
        <div>
            <strong>Email:</strong> {{ $customer->email }}
        </div>
        <div>
            <strong>Teléfono:</strong> {{ $customer->phone_number }}
        </div>
        <div>
            <strong>Activo:</strong> {{ $customer->is_active ? 'Sí' : 'No' }}
        </div>

        <a href="{{ route('customers.edit', $customer->id) }}">Editar Cliente</a>
        <a href="{{ route('customers.index') }}">Volver a la Lista de Clientes</a>
    </body>
</html>
