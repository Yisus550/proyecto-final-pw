<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Orden</title>
</head>

<body>
    <h2>Editar Orden</h2>

    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="employee_id">Empleado:</label>
            <select name="employee_id" id="employee_id" required>
                @foreach ($employees as $id => $employee)
                    <option value="{{ $id }}" @selected($order->employee_id == $id)>
                        {{ $employee }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="customer_id">Cliente:</label>
            <select name="customer_id" id="customer_id" required>
                @foreach ($customers as $id => $customer)
                    <option value="{{ $id }}" @selected($order->customer_id == $id)>
                        {{ $customer }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="order_date">Fecha de la Orden:</label>
            <input type="date" name="order_date" id="order_date" value="{{ $order->order_date }}" required>
        </div>
        <div>
            <label for="total_amount">Monto Total:</label>
            <input type="number" step="0.01" name="total_amount" id="total_amount"
                value="{{ $order->total_amount }}" required>
        </div>
        <div>
            <label for="payment_method">Metodo de Pago:</label>
            <select name="payment_method" id="payment_method" required>
                <option value="Efectivo" @selected($order->payment_method == 'Efectivo')>Efectivo</option>
                <option value="Tarjeta de Crédito" @selected($order->payment_method == 'Tarjeta de Crédito')>Tarjeta de
                    Crédito</option>
                <option value="Tarjeta de Débito" @selected($order->payment_method == 'Tarjeta de Débito')>Tarjeta de
                    Débito</option>
            </select>
        </div>
        <button type="submit">Actualizar Orden</button>
    </form>

    <a href="{{ route('orders.index') }}">Volver a la Lista de Ordenes</a>
</body>

</html>
