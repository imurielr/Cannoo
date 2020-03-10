# Cannoo

## Ejecución

* Para ejecutar es necesario que tenga LAMP instalado. 

Inicialmente, debe descargar el repositorio

```bash
$ git clone https://github.com/imurielr/Cannoo.git
```

Diríjase a ```Cannoo/cannoo``` y modifique el archivo ```.env.example```:

```bash
$ mv .env.example .env
```

Modifique el archivo ```.env``` con el usuario y contraseña del usuario administrador de su base de datos local.

Descargue [composer](https://getcomposer.org/download/) para instalar las dependencias del proyecto, para esto ingrese al directorio ```Cannoo/cannoo``` y ejecute el siguiente comando:

```bash
$ composer install
```

Luego debe acceder ```http://localhost/phpmyadmin``` y crear una nueva base de datos llamada ```cannoodb``` o si lo va a hacer directamente con mysql:

```bash
$ mysql -u <usuario> -p

mysql> CREATE DATABASE cannoodb;
```

Tras crear la base de datos se puede pasar a migrar las tablas del proyecto, para esto ejecute en ```Cannoo/cannoo``` el comando:

```bash
$ php artisan migrate
```

Importe en sus respectivas tablas los archivos ```.sql``` que se encuentran en ```Cannoo/cannoo/sql_imports```.

Finalemente, ejecute el programa con

```bash
$ php artisan serve
```

y diríjase a ```http://localhost:8000/```

En caso de utilizar XAMPP o WAMPP ubique el repositorio en ```htdocs``` y diríjase a ```http://localhost/Cannoo/cannoo/public/```.
