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

2. Correr las migraciones de Laravel Base de datos MYSQL:
   (Ejecutar dentro de la misma carpeta del proyecto)
    ```bash
   php artisan migrate

3. Copiar .env.example a env y editar agregando la base da datos
   (Ejecutar dentro de la misma carpeta del proyecto)
    ```bash
    cp .env.example .env
Luego de esto editar las lineas (23 - 28) con los datos de la BD MySQL

4. Generar Key de Laravel en .env:
   (Ejecutar dentro de la misma carpeta del proyecto)
    ```bash
   php artisan key:generate


