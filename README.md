Desafío 1

SQL:

ELOQUEN:

$d1 = Invoice::join('product' , 'product.invoice_id', '=', 'invoice.id')
        ->sum('product.price');
$d2 = Invoice::join('product' , 'product.invoice_id', '=', 'invoice.id')
        ->where('product.quantity','>',100)->get('invoice_id');
$d3 =Product::where('price','>',1000000)->get('name');


Desafío 2

1 - Instalar y descargar composer (puede realizarlo desde la página principal https://getcomposer.org en la versión del sistema operativo de su selección.
2 - Una vez instalado composer Iniciar el terminal de su S.O y mediante el comando composer “create-project laravel/laravel nombre-app” (comando de el cual te permite crear un nuevo proyecto), se procederá a la creación e instalación de nuestro proyecto.
3 -Luego de terminar la creación e instalación de nuestro proyecto nos dirigiremos a la carpeta raíz del mismo mediante el comando: “cd nombre-app” (comando cd utilizado para movernos entre directorias a través del terminal).
4 - Ya en la carpeta del proyecto procederemos a lanzar el comando “php artisan serve” (comando de inicia nuestra app desde la raíz de nuestro proyecto de manera individual).
5 - Instalar librerias necesarias mediante el comando composer install (Este instalara las librerías requeridas que necesita el proyecto para trabajar)
Con todos los pasos realizados anteriormente tendremos nuestra app activa a la cual podremos entrar mediante la url http://localhost:8000


Desafío 3

Realizar prueba mediante la ruta /test

Desafío 4

Livewire: es un framework muy poderoso que funciona dentro de laravel. El cual nos ayuda a hacer temas de interactividad a nivel de vista de una forma muy sencilla sin dejar de lado la utilizad de laravel, por lo cual se crea un código php y este código se renderiza y el resultado final es el que genera nuestra interactividad, mediante una solicitud ajax a la base de datos y responde con código php renderizado.

Laravel Jetstream: es un nuevo sistema que nos permite crear un estructura inicial a la hora implementar, un inicio de sesión, registro de usuario, reinicio de contraseña y todo lo referente a esto.

Desafio 5

protecto git https://github.com/junior3635/prueba140322
