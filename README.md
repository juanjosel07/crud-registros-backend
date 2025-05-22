# 📦 Backend - Módulo Registro Usuarios(Themosis + Wordpress + Css)

Este proyecto es el backend y frontend con blade para la aplicación de **Módulo Registro Usuarios** utilizando el framework **Themosis**, especificamente **Themosis V3.0**.Proporciona una Api para la
gestión de registros de Usuarios junto con su frontend hecho en el gestor de plantillas de Themosis blade,
alli puedes ver los usuarios registrados, crear, editar y eliminar los mismos, usando Datatable para paginación e inputMask para validación de Rut.

## 🔧 Requisitos

Para ejecutar este proyecto, necesitas tener lo siguiente instalado:

- Wampserver o xampp, instalar (entornos)
- Composer 2.0+, con version PHP 8.1 (para manejar las dependencias)
- PHP 8.1
- MySQL 5.0 o superior

## 🚀 Instalación

1. **Clona el repositorio**:

   ```bash
   git clone https://github.com/juanjosel07/crud-registros-backend.git
   ```

2. **Instalar dependencias**:

   ```bash
   composer install
   ```

3. **Variables de entorno**

- Agrega el archivo .env y las variables de entorno correspondientes:

  ```bash
  	DB_PORT= Usar el puerto de tu servidor MySQL (XAMPP/WAMP/Laragon)
  	DATABASE_NAME= nombre base de datos
    DATABASE_USER=root
  	DATABASE_PASSWORD= dejar vacío
  	DATABASE_HOST=localhost:port (por defecto 3306, pero es el puerto de tu servidor servidor MySQL -> XAMPP/WAMP/Laragon )

  ```

- crea un archivo .env y copia del archivo .env.example y reemplaza por las variables tuyas.

  ```bash
    cp .env.example .env
    php artisan key:generate
  ```

3. **Inicia el servidor de desarrollo**

   ```bash
   php artisan server
   ```

## 📡 Rutas web

### Rutas de Ordenes (`/registros`)

- **Obtener todos los registros**  
  `GET /`  
  Devuelve la vista con el datatable de los registros existentes

- **Devuelve la vista para crear nuevo proyecto**  
  `GET /create`  
  Devuelve la vista para crear un nuevo registro

- **Crear un nuevo registro**  
  `POST /store`  
  Crea un nuevo registro.

- **Actualizar un registro existente**  
  `PUT /{formData}`  
  Actualiza un registro existente.

- **Devuelve la vista para editar un registro existente**  
  `GET /{formData}`  
  Devuelve la vista para editar un registro existente

- **Eliminar un registro**  
  `DELETE /{formData}`  
  Elimina un registro existe por id

# 🌐 Demo Online

Próximamente...

# Autor

- Juan Jose Leon

## 📄 Licencia

Este proyecto **no tiene licencia definida**. Puedes Clonarlo y estudiarlo.
