# Reglas de programación

En este documento se presentan las reglas de programación para el proyecto, se específica cuales son las reglas para los controladores, modelos, vistas, rutas, etc. 

Todo desarrollador debe cumplir con estos requisitos.

## Tabla de contenidos
* [Controladores](#controladores)
* [Modelos](#modelos)
* [Vistas](#vistas)
* [Documentos de estilo](#documentos-de-estilo)
* [Rutas](#rutas)

## Controladores

### Estructura

```php
<?php

    namespace App\Http\Controllers\NameController;

    class NameController extends Controller {
        // Funciones del controlador
    }
?>
```

### Reglas

1) Los controladores deben ubicarse en la ruta ```App/Http/Controllers```.
2) **NUNCA** haga un ```echo``` en un controlador.
3) Si va a realizar las validaciones en el controlador asegúrese de que esto no implicará tener código repetido en un futuro. Se recomienda realizarlas en los modelos para evitar esto.

## Modelos

### Estructura

```php
<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class ModelName extends Model {

        // Atributos <atributos del modelo>
        protected $fillable = [...];

        // getters y setters del modelo
    }
?>
```

### Reglas

1) Los modelos deben ubicarse en la ruta ```App```.
2) Se debe incluir un comentario de atributos donde se especifique cuales son los elementos del modelo.
3) **Todos** los atributos deben tener sus funciones get y set.
4) Para evitar repetición de código se recomienda realizar la validación de datos ingresados por el usuario en el modelo de la siguiente manera:

    ```php
    <?php

        namespace App;

        use Illuminate\Database\Eloquent\Model;
        use Iluminate\Http\Request;

        class ModelName extends Model {

            // Atributos <atributos del modelo>
            protected $fillable = ["name", "price"];

            public static function validate(Request $request) {
                $request->validate([
                    "name" => "required",
                    "price" => "required|numeric|gt:0"
                ]);
            }

            // getters y setters del modelo
        }
    ?>
    ```

## Vistas

### Estructura

```php
@extends('layouts.master')

@section('content')
    // Código HTML
@endsection
```

### Reglas

1) Las vistas deben ubicarse en la ruta ```resources/views```.
2) Cada vista debe ubicarse al interior de un directorio que ayude a determinar a que controlador está asociado.
3) Todas las vistas deben extender del ```layout master```.
4) Todas las vistas deben ser ```Blade```.
5) **NUNCA** utilice código php al interior de las vistas.
6) El nombramiento de las vistas debe seguir la estructura ```nombreVista.blade.php``` 

## Documentos de estilo

### Reglas

1) El estilo de las vistas se realizará por medio de archivos ```.css```.
2) Los archivos ```.csv``` deben ubicarse en ```public/css```

## Rutas

### Estructura

```php
Route::get('/index', 'Controller@index')->name("controller.index");
```

### Reglas

1) Las rutas deben ubicarse en el archivo ```routes/web.php```
2) **Toda** ruta debe estar asociada a un controlador.
3) A cada ruta se le debe asociar un nombre por el que podrá ser accedida.
4) Está **prohibido** establecer funciones al interior de una ruta. Estas deben ser manejadas por el controlador.