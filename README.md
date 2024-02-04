# Installation

-   `docker compose up -d`: For installation of docker images. Port of phpmyadmin: 8080. You can change it in `docker-compose.yml` file.
-   `php artisan migrate`: For migration databases.

## DDD with Laravel

1. Infrastructure
    - Interaction with third parties
    - Drivers
    - Repositories
    - Routes
      -Services
2. Applications
    - Use cases
3. Domain
    - Contracts
    - Exceptions
    - Entity - Relates to a table in the Database
    - Entity: We can relate it to a group of tables that fulfill a function
    - Value objects (DDD): It is related to a column in our Database
    - Value objects: It can be related to a group of columns that fulfill a function.

## Changes

**The necessary configurations would be created for a project called Example and Task and User domains. Configurations are similar for other domains**

1. First the folders and subfolders of the `src` directory are created:

```
src/
  Example/ <--- Example case
   Task/
    Application/
     UseCase/
    Domain/
     ValueObject/
     Exceptions/
    Infrastructure/
     Controllers/
     Routes/
     Services/
   User/
    Application/
     Find/ <-- For this example it would be Find the Use Case
    Domain/
     ValueObject/
     Exceptions/
    Infrastructure/
     Controllers/
     Routes/
     Services/
```

2. The `composer.json` is modified. The _src_ folder is added to the automatic file upload so that Laravel recognizes it:

```json
{
     "autoload": {
         "psr-4": {
             //...
             "Src\\": "src/"
         }
     }
}
```

**Please note that when modifying composer.json you must run `composer dump-autoload` afterwards for composer to detect the changes**

3. The directories `src/Example/Task/Infrastructure/Routes/api.php` and `src/Example/Task/Infrastructure/Services/TaskRouteServiceProvider.php` are created, also for User. 4. The _providers_ are modified in `config/app.php`:

```php
'providers' => ServiceProvider::defaultProviders()->merge([
         ...
         /*
          * Example Service Providers...
          */
         Src\Example\Task\Infrastructure\Services\TaskRouteServiceProvider::class,

     ])->toArray(),
```

**Then run `php artisan config:cache`**

4. The controllers are created in the path `src/Example/User/Infrastructure/Controllers/`. For example: for the controller `UserFindAllController` it is created in the file `src/Example/User/Infrastructure/Controllers/UserFindAllController.php`

5. The Use Case files are created in the path `src/Example/User/Application/`. For example, for the _Find_ use case where a _FindAll_ file is required, the file would be: `src/Example/User/Application/Find/UserFindAllUseCase.php`

6. The Value Object files are created in the path `src/Example/User/Domain/ValueObject`. For example, for the value object _UserUserName_, the file would be: `src/Example/User/Domain/ValueObject/UserUserName.php`

# Instalación

-   `docker compose up -d`: Para la instalación de las imágenes de Docker. Puerto de phpmyadmin: 8080. Puedes cambiarlo en el archivo: `docker-compose.yml`.
-   `php artisan migrate`: Para la migración de las bases de datos.

## DDD con Laravel

1. Infraestructura
    - Interacción con terceros
    - Controladores
    - Repositorios
    - Rutas
    - Servicios
2. Aplicaciones
    - Casos de uso
3. Dominio
    - Contratos
    - Excepciones
    - Entidad - Se relaciona con una tabla en la Base de Datos
    - Entidad: Podemos relacionarlo con una agrupación de tablas que cumplen una función
    - Value Objects (DDD): Se relaciona con una columna de nuestra Base de Datos
    - Value Objects: Se puede relacionar con una agrupación de columnas que cumplen con una función.

## Cambios

**Se estarían creando las configuraciones necesarias para un proyecto llamado Example y dominios Task y User. Las configuraciones son similares para otros dominios**

1. Primero se crean las carpetas y subcarpetas del directorio `src`:

```
src/
 Example/ <--- Caso de ejemplo
  Task/
   Application/
    UseCase/
   Domain/
    ValueObject/
    Exceptions/
   Infrastructure/
    Controllers/
    Routes/
    Services/
  User/
   Application/
    Find/ <-- Para este ejemplo sería Find el Caso de Uso
   Domain/
    ValueObject/
    Exceptions/
   Infrastructure/
    Controllers/
    Routes/
    Services/
```

2. Se modifica el `composer.json`. Se agrega la carpeta _src_ a la carga automática de archivos para que Laravel la reconozca:

```json
{
    "autoload": {
        "psr-4": {
            // ...
            "Src\\": "src/"
        }
    }
}
```

**Ten en cuenta que al modificar el composer.json se debe ejecutar `composer dump-autoload` posteriormente para que composer detecte los cambios** 

3. Se crean los directorios `src/Example/Task/Infrastructure/Routes/api.php` y `src/Example/Task/Infrastructure/Services/TaskRouteServiceProvider.php`, también para User. 4. Se modifican los _providers_ en `config/app.php`:

```php
'providers' => ServiceProvider::defaultProviders()->merge([
        ...
        /*
         * Example Service Providers...
         */
        Src\Example\Task\Infrastructure\Services\TaskRouteServiceProvider::class,

    ])->toArray(),
```

**Ejecuta posteriormente `php artisan config:cache`**

4. Se crea los controladores en la ruta `src/Example/User/Infrastructure/Controllers/`. Por ejemplo: para el controlador `UserFindAllController` se crea en el fichero `src/Example/User/Infrastructure/Controllers/UserFindAllController.php`

5. Se crean los ficheros de Casos de Uso en la ruta `src/Example/User/Application/`. Por ejemplo, para el caso de uso _Find_ donde se requiere un fichero _FindAll_, el fichero sería:  `src/Example/User/Application/Find/UserFindAllUseCase.php`

6. Se crean los ficheros de Value Object en la ruta `src/Example/User/Domain/ValueObject`. Por ejemplo, para el value object _UserUserName_, el fichero sería:  `src/Example/User/Domain/ValueObject/UserUserName.php`