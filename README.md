## 📂 Estructura de la Base de Datos

La aplicación usa una base de datos MySQL con la siguiente tabla:

| Campo              | Tipo           | Descripción |
|--------------------|---------------|-------------|
| `id`              | INT (PK)       | Identificador único |
| `nombre`          | VARCHAR(255)   | Nombre del cliente |
| `direccion`       | VARCHAR(255)   | Dirección (opcional) |
| `intercomunicadores` | TEXT       | Lista de intercomunicadores (como texto) |
| `lat`             | DECIMAL(10,8)  | Latitud del cliente |
| `lng`             | DECIMAL(11,8)  | Longitud del cliente |
| `created_at`      | TIMESTAMP      | Fecha de creación |
| `updated_at`      | TIMESTAMP      | Última actualización |

### 🔧 Cómo crear la base de datos
1. Correr las migraciones de Laravel:
   ```bash
   php artisan migrate


