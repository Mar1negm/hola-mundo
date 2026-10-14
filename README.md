# Hola Mundo

## Descripción

Este proyecto Laravel muestra un mensaje simple "Hola mundo" cuando se accede a la ruta `/hola`.

## Tecnologías utilizadas

- PHP 8.3
- Laravel 13.x
- Composer
- Blade (motor de plantillas)

## Estructura del proyecto

- **composer.json**: Define las dependencias del proyecto.
- **routes/web.php**: Contiene la definición de la ruta `/hola`.
- **app/Http/Controllers/HolaMundoController.php**: Controlador que devuelve la vista con el mensaje.
- **resources/views/hola.blade.php**: Vista Blade que muestra el mensaje.

## Controlador

### HolaMundoController

El controlador `HolaMundoController` se encuentra en `app/Http/Controllers/HolaMundoController.php`.

#### Método `index()`

El método `index()` devuelve la vista `hola` pasando un array con la clave `message` y el valor `Hola mundo`.

## Vista

La vista `resources/views/hola.blade.php` muestra el mensaje dentro de un encabezado `<h1>`.

## Ruta

Se define una ruta GET para `/hola` que invoca el método `index()` del `HolaMundoController`.

## Flujo de funcionamiento

```
Usuario
   ↓
/hola
   ↓
HolaMundoController@index
   ↓
hola.blade.php
   ↓
Hola mundo
```

## Ejecución

1. Instalar dependencias: `composer install`
2. Generar la clave de la aplicación: `php artisan key:generate`
3. Ejecutar el servidor de desarrollo: `php artisan serve`

## Prueba

Acceder a: <http://127.0.0.1:8000/hola>
