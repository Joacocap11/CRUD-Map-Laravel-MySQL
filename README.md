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

1. Instala Dependencias Composer de Laravel:
   (Ejecutar dentro de la misma carpeta del proyecto)
    ```bash
   composer install


### 🔧 Cómo crear la base de datos
2. Correr las migraciones de Laravel:
   (Ejecutar dentro de la misma carpeta del proyecto)
    ```bash
   php artisan migrate


