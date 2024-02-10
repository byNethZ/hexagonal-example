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

7. Exception files are created as follows:
     - The `HandlerException` is created in the directory: `src/Example/Shared/Infrastructure/Exceptions`.
     - The `CustomException` is created in the directory: `src/Example/Shared/Domain/Exceptions`, which will be used in the `HandlerException` created previously.
     - Added the `HandlerException` in the file: `bootstrap/app.php` in the exceptions area, removed the reference to the `HandlerException` from _Laravel_:
     ```php
     $app->singleton(
       Illuminate\Contracts\Debug\ExceptionHandler::class,
       // App\Exceptions\Handler::class, <--- This Handler is removed
       Src\Example\Shared\Infrastructure\Exceptions\HandlerException::class
     );
     ```
     **As the `bootstrap/app.php` file has been modified, `php artisan config:cache` must be run**
     - From now on, exceptions will be created in the `Domain/Exception` folder of the corresponding domains, for example, to create the exception `UserException` of the domain _User_, it will be created as follows: `src/Example/User /Domain/Exceptions/UserException.php`

8. The dependencies for the repositories are created:
     - The file `UserRepository.php` is created in the directory `src/Example/User/Infrastructure/Repositories/Eloquent`
     - The file `UserRepositoryContract.php` is created in the directory `src/Example/User/Domain/Contracts`
     - The `UserRepositoryContract` contract is injected into the use cases: for example `src/Example/User/Application/Find/UserFindAllUseCase.php`
     - The `DependencyServiceProvider` file is created in the `src/Example/User/Infrastructure/Services` directory
     - Modify the `config/app.php` file in the _providers_ section to add to the `DependencyServiceProvider`
9. Once the repositories part is configured, you can start creating the models:
     - The model is created, in this case `User` in the directory: `src/Example/User/Infrastructure/Repositories/Eloquent`
     - Later these models are used in the repositories, for the `User` example, it would be used in the file `src/Example/User/Infrastructure/Repositories/Eloquent/UserRepository.php`
10. For each action that you want to create for the model, create:
     - Case of use
     - Controller, remember that the controller will use the specific use case for that action.
     - Added use case in `DependencyServiceProvider.php`
     - Remember to update the contract so that it is taken into account to create the method in the `UserRepository`
11. The entity `User` is created in the directory `src/Example/User/Domain` which will use the _value objects_ created previously.
12. Custom _requests_ and _helpers_ can be created in the `src/Example/User/Infrastructure` directory in their respective folders.

***

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

7. Se crean los ficheros de excepciones de la siguiente forma:
    - Se crea el `HandlerException` en el directorio: `src/Example/Shared/Infrastructure/Exceptions`.
    - Se crea el `CustomException` en el directorio: `src/Example/Shared/Domain/Exceptions`, el cual se usará en el `HandlerException` creado anteriormente.
    - Se añade el `HandlerException` en el archivo: `bootstrap/app.php` en el área de las excepciones, se elimina la referencia al `HandlerException` de _Laravel_:
    ```php
    $app->singleton(
      Illuminate\Contracts\Debug\ExceptionHandler::class,
      // App\Exceptions\Handler::class, <--- Se elimina este Handler
      Src\Example\Shared\Infrastructure\Exceptions\HandlerException::class
    );
    ```
    **Como se ha modificado el archivo `bootstrap/app.php` se debe correr `php artisan config:cache`**
    - A partir de ahora, las excepciones se crearán en la carpeta `Domain/Exception` de los dominios correspondientes, por ejemplo, para crear la excepción `UserException` del dominio _User_, se creará de la siguiente forma: `src/Example/User/Domain/Exceptions/UserException.php`

8. Se crean las dependencias para los repositorios:
    - Se crea el archivo `UserRepository.php` en el directorio `src/Example/User/Infrastructure/Repositories/Eloquent`
    - Se crea el archivo `UserRepositoryContract.php` en el directorio `src/Example/User/Domain/Contracts`
    - Se inyecta el contrato `UserRepositoryContract` en los casos de uso: por ejemplo `src/Example/User/Application/Find/UserFindAllUseCase.php`
    - Se crea el archivo `DependencyServiceProvider` en el directorio `src/Example/User/Infrastructure/Services`
    - Se modifica el archivo `config/app.php` en la seccion de los _providers_ para agregar al `DependencyServiceProvider`
9. Una vez configurada la parte de los repositorios, se pueden empezar a crear los modelos:
    - Se crea el modelo, en este caso `User` en el directorio: `src/Example/User/Infrastructure/Repositories/Eloquent`
    - Posteriormente esos modelos se usan en los repositorios, para el ejemplo de `User`, se usaría en el archivo `src/Example/User/Infrastructure/Repositories/Eloquent/UserRepository.php`
10. Por cada acción que se desee crear para el modelo, se crea:
    - Caso de uso
    - Controlador, recuerda que el controlador usará el caso de uso específico para esa acción.
    - Se agrega el caso de uso en el `DependencyServiceProvider.php`
    - Recuerda actualizar el contrato para que se tenga en cuenta pueda crear el método en el `UserRepository`
11. Se crea la entidad `User` en el directorio `src/Example/User/Domain` la cual usará los _value objects_ creados anteriormente.
12. Los _request_ personalizados y los _helpers_ pueden ser creados en el directorio `src/Example/User/Infrastructure` en sus respectivas carpetas.