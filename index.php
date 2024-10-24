<?php

  require_once "vendor/autoload.php";

  //Para la creación de las rutas utilizo la librería simple router de frederick
  //https://github.com/FrederickMontiel/SimpleRouter-php/

use App\Controller\ContactoController;
use EasyProjects\SimpleRouter\Router as Router;
use App\Controller\HomeController;
use App\Model\ContactoModel;

  $router = new Router;

  //Creo las diferentes rutas de contacto
  $router->get('/',[ContactoController::class, 'index']);
  $router->get('/contacto/crear', [ContactoController::class, 'crear']);
  $router->post('/contacto', [ContactoController::class, 'guardar']);
  $router->delete('/contacto/{id}', [ContactoController::class, 'eliminar']);
  $router->get('/contacto/{id}/editar', [ContactoController::class,'editarView']);
  $router->put('/contacto/{id}',[ContactoController::class,'editar']);

  //rutas de telefonos
  $router->delete('/contacto/detalles/{id}/eliminar-telefono', [HomeController::class,'eliminarTelefono']);
  $router->delete('/contacto/detalles/{id}/eliminar-email', [HomeController::class,'eliminarEmail']);
  $router->get('/contacto/{id}/detalles', [HomeController::class,'detallesView']);
  //rutas de emails

  $router->start();



?>