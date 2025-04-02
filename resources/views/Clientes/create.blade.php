<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">
    <h1 class="text-center mb-4">Crear Cliente</h1>
    
    <div class="card p-4 mb-4">
        <h2>Agregar Cliente</h2>
        <form action="{{ route('clientes.store') }}" method="POST" class="row g-3">
            @csrf
            <div class="col-md-6">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" required>
            </div>
            <div class="col-md-6">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Dirección" required>
            </div>
            <div class="col-md-6">
                <label for="intercomunicadores" class="form-label">Intercomunicadores</label>
                <input type="text" name="intercomunicadores" id="intercomunicadores" class="form-control" placeholder="Intercomunicadores">
            </div>
            <div class="col-md-3">
                <label for="lat" class="form-label">Latitud</label>
                <input type="text" name="lat" id="lat" class="form-control" placeholder="Latitud" required>
            </div>
            <div class="col-md-3">
                <label for="lng" class="form-label">Longitud</label>
                <input type="text" name="lng" id="lng" class="form-control" placeholder="Longitud" required>
            </div>
            <div class="col-12 d-flex justify-content-between">
                <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Volver</a>
                <button type="submit" class="btn btn-primary">Agregar Cliente</button>
            </div>
        </form>
    </div>
</body>
</html>