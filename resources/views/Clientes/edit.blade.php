<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow p-4">
            <h1 class="mb-4 text-center">Editar Cliente</h1>
            <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" value="{{ $cliente->nombre }}" required>
                </div>
                
                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección:</label>
                    <input type="text" name="direccion" class="form-control" value="{{ old('direccion', $cliente->direccion ?? '') }}">
                </div>
                
                <div class="mb-3">
                    <label for="intercomunicadores" class="form-label">Intercomunicadores:</label>
                    <input type="text" name="intercomunicadores" class="form-control" value="{{ is_array($cliente->intercomunicadores) ? implode(',', $cliente->intercomunicadores) : $cliente->intercomunicadores }}">
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="lat" class="form-label">Latitud:</label>
                        <input type="number" id="lat" name="lat" class="form-control" value="{{ $cliente->lat }}" step="any" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lng" class="form-label">Longitud:</label>
                        <input type="number" id="lng" name="lng" class="form-control" value="{{ $cliente->lng }}" step="any" required>
                    </div>
                </div>
                
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
