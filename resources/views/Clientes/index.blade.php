<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes en el Mapa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    
    <style>
        #map { height: 500px; width: 100%; margin-bottom: 20px; }
    </style>
</head>
<body class="container py-4">
    <h1 class="text-center mb-4">Clientes en el Mapa</h1>
 
    <div class="col-12">
    <a href="{{ route('clientes.create') }}" class="btn btn-secondary">
        Crear Cliente 
    </a>
    </div>
    <br>
    <!--
    <div class="card p-4 mb-4">
        <h2>Agregar Cliente</h2>
        <form action="{{ route('clientes.store') }}" method="POST" class="row g-3">
            @csrf
            <div class="col-md-6">
                <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
            </div>
            <div class="col-md-6">
                <input type="text" name="direccion" class="form-control" placeholder="Dirección" required>
            </div>
            <div class="col-md-6">
                <input type="text" name="intercomunicadores" class="form-control" placeholder="Intercomunicadores">
            </div>
            <div class="col-md-3">
                <input type="text" name="lat" class="form-control" placeholder="Latitud" required>
            </div>
            <div class="col-md-3">
                <input type="text" name="lng" class="form-control" placeholder="Longitud" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Agregar</button>
            </div>
        </form>
    </div>
    -->

    <div class="mb-3">
        <h2>Buscar Intercomunicadores / Nombre</h2>
        <input type="text" id="search" class="form-control" placeholder="Buscar" onkeyup="searchClients()">
    </div>
    
    <div id="map" class="border rounded"></div>

    <h2>Lista de Clientes</h2>
    <table class="table table-bordered table-striped" id="clientesTable">
        <thead class="table-dark">
            <tr>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Intercomunicadores</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->direccion }}</td>
                    <td>
                        @if($cliente->intercomunicadores)
                            @php $intercomunicadores = explode(',', $cliente->intercomunicadores); @endphp
                            <ul>
                                @foreach ($intercomunicadores as $intercomunicador)
                                    <li>{{ $intercomunicador }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p>No hay intercomunicadores asignados</p>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este cliente?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        var map = L.map('map').setView([-34.9011, -56.1645], 10); // Montevideo, Uruguay
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        var clientes = <?php echo json_encode($clientes); ?>;
        var markers = [];

        clientes.forEach(cliente => {
            var marker = L.marker([cliente.lat, cliente.lng])
                .addTo(map)
                .bindPopup(`<b>${cliente.nombre}</b><br>Dirección: ${cliente.direccion}<br>Lat: ${cliente.lat}, Lng: ${cliente.lng}`);
            markers.push({ marker: marker, cliente: cliente });
        });

        function searchClients() {
            var input = document.getElementById('search').value.toLowerCase();
            var table = document.getElementById('clientesTable');
            var tr = table.getElementsByTagName('tr');
            markers.forEach(m => m.marker._icon.style.display = "none");

            for (var i = 1; i < tr.length; i++) {
                var tdNombre = tr[i].getElementsByTagName('td')[0];
                var tdIntercomunicadores = tr[i].getElementsByTagName('td')[2];
                
                if (tdNombre && tdIntercomunicadores) {
                    var nombreText = tdNombre.textContent.toLowerCase();
                    var intercomunicadoresText = tdIntercomunicadores.textContent.toLowerCase();
                    
                    if (nombreText.includes(input) || intercomunicadoresText.includes(input)) {
                        tr[i].style.display = "";
                        markers[i - 1].marker._icon.style.display = "block";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</body>
</html>