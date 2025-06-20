<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

/* Ruta default */
$routes->get('/', 'Home::armarPagina/inicio'); 

/* Ruta de Formulario */
$routes->post('/enviar-form','usuario_controller::formValidation');

/* Rutas del login */
$routes->post('/enviar-login','login_controller::auth');
$routes->get('/panel', 'panel_controller::index', ['filter' => 'Auth']);
$routes->get('/logout', 'login_controller::logout', ['filter' => 'Auth']);

/* Rutas de Productos*/
$routes->get('/crear', 'producto_controller::index', ['filter' => 'Auth']);
$routes->get('/produ-form', 'producto_controller::creaproducto', ['filter' => 'Auth']);
$routes->post('/enviar-prod', 'producto_controller::store', ['filter' => 'Auth']);
$routes->get('/editar/(:num)', 'producto_controller::singleProducto/$1', ['filter' => 'Auth']);
$routes->post('/modifica/(:num)', 'producto_controller::modifica/$1', ['filter' => 'Auth']);
/* Ruta de armado de página Home */
$routes->get('/(:any)', 'Home::armarPagina/$1');
