<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

<p>Base de datos</p>

<span>En la carpeta bd se encuentra la base de datos junto con la nueva tabla 'pedidos', aun falta hacer la logica de dicha tabla, ademas, podran darse cuenta que ya hay data precargada en las tablas perfiles, materiales, ubicaciones, etc</span>

<p>Pasos</p>
Una vez descargado el proyecto se debe seguir ciertos pasos:<br>

1- crear un archivo .env en la raiz del proyecto "agropatria". <br>
2- copiar todo lo que hay en el archivo .env.example al nuevo archivo .env ya creado, si abren el archivo veran cerca de la linea 10,11,12 la configuracion basica para conectar a la base de datos <br>

DB_DATABASE=agropatria
DB_USERNAME=root
DB_PASSWORD=

<br>

estos son el nombre de la bd, el nombre del acceso al servidor de bd "root", y la clave por defecto es vacia

<br>

3- luego de haber copiado y configurado el nuevo archivo .env , se procede a crear generar una llave llamada "key" para poder acceder al sistema o a la configuracion del framework.... esto se hace abriendo la terminal o cmd en el caso de windws, ubicarce en tu proyecto(ruta C:/xampp/htdocs/nombre-de-mi-proyecto) y luego de esto generar la key con el comando "php artisan key:generate" sin las comillas.

<br>

4- una vez generada la key se procede a generar las migraciones o base de datos, no sin antes haber creado en phpmyadmin una base de datos llamada "agropatria" sin las comillas.
<br>
usamos el comando "php artisan migrate --seed" sin las comillas... y esto generara las tablas en dicha base de datos
luego de esto ya podemos usar nuestro proyecto.