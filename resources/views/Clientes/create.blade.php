<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cliente</title>
</head>
<body>
    <h1>Crear Cliente</h1>
    <form action="{{ route('clientes.store') }}" method="POST">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="{{ old('nombre') }}">

        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" value="{{ old('direccion') }}">

        <label for="intercomunicadores">Intercomunicadores:</label>
        <input type="text" name="intercomunicadores" value="{{ old('intercomunicadores') }}">

        <label for="lat">Latitud:</label>
        <input type="number" name="lat" value="{{ old('lat') }}">

        <label for="lng">Longitud:</label>
        <input type="number" name="lng" value="{{ old('lng') }}">

        <button type="submit">Guardar</button>
</form>

</body>
</html>
