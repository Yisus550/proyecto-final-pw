<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Details</title>
</head>

<body>
    <h2>Details</h2>
    <div>
        <strong>ID:</strong>
        {{ $category->id }}
    </div>
    <div>
        <strong>Name:</strong>
        {{ $category->name }}
    </div>
    <div>
        <strong>Description:</strong>
        {{ $category->description }}
    </div>
</body>

</html>
