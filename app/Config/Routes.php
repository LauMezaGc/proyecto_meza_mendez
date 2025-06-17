<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::armarPagina/inicio'); 

$routes->post('/enviar-form','usuario_controller::formValidation');

$routes->post('/enviar-login','login_controller::auth');
$routes->get('/panel', 'panel_controller::index', ['filter' => 'Auth']);
$routes->get('/logout', 'login_controller::logout', ['filter' => 'Auth']);

$routes->get('/(:any)', 'Home::armarPagina/$1');




