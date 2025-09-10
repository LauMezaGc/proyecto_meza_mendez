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
$routes->get('/crear', 'producto_controller::index', ['filter' => 'AdminFilter']);
$routes->get('/produ-form', 'producto_controller::creaproducto', ['filter' => 'AdminFilter']);
$routes->post('/enviar-prod', 'producto_controller::store', ['filter' => 'AdminFilter']);
$routes->get('/editar/(:num)', 'producto_controller::singleProducto/$1', ['filter' => 'AdminFilter']);
$routes->post('/modifica/(:num)', 'producto_controller::modifica/$1', ['filter' => 'AdminFilter']);
$routes->get('/borrar/(:num)', 'producto_controller::borrarproducto/$1', ['filter' => 'AdminFilter']);
$routes->get('/eliminados', 'producto_controller::eliminados', ['filter' => 'AdminFilter']);
$routes->get('/activar_prod/(:num)', 'producto_controller::activarproducto/$1', ['filter' => 'AdminFilter']);

/* Rutas de Usuarios */
$routes->get('/usuarios', 'usuario_crud_controller::index', ['filter' => 'AdminFilter']);
$routes->get('/user-form', 'usuario_crud_controller::creausuario', ['filter' => 'AdminFilter']);
$routes->post('/crear-user', 'usuario_crud_controller::store', ['filter' => 'AdminFilter']);
$routes->get('/editar-user/(:num)', 'usuario_crud_controller::singleUser/$1', ['filter' => 'AdminFilter']);
$routes->post('/update/(:num)', 'usuario_crud_controller::update/$1', ['filter' => 'AdminFilter']);
$routes->get('/borrar-user/(:num)', 'usuario_crud_controller::deletelogico/$1', ['filter' => 'AdminFilter']);
$routes->get('activar-user/(:num)', 'usuario_crud_controller::activar/$1', ['filter' => 'AdminFilter']);

/* Rutas para el carrito */
// muestra todos los productos del catálogo
$routes->get('/todos_p', 'carrito_controller::catalogo');
// carga la vista carrito parte_parte_view
$routes->get('/muestro', 'carrito_controller::muestra', ['filter' => 'Auth']);
// actualiza los datos del carrito
$routes->get('/carrito_actualiza', 'carrito_controller::actualiza_carrito', ['filter' => 'Auth']);
// agrega los items seleccionados
$routes->post('/carrito_add', 'carrito_controller::add', ['filter' => 'Auth']);
// elimina un item del carrito
$routes->get('/carrito_elimina/(:any)', 'carrito_controller::remove/$1', ['filter' => 'Auth']);
// eliminar todo el carrito
$routes->get('/borrar', 'carrito_controller::borrar_carrito', ['filter' => 'Auth']);
// registrar la venta en las tablas
$routes->get('/carrito_comprar', 'ventas_controller::registrar_venta', ['filter' => 'Auth']);
// botones de sumar y restar en la vista del carrito
$routes->get('/carrito_suma/(:any)', 'carrito_controller::suma/$1');
$routes->get('/carrito_resta/(:any)', 'carrito_controller::resta/$1');

// Rutas de compra y detalle para cliente 
$routes->get('/vista_compras/(:num)', 'ventas_controller::ver_factura/$1', ['filter' => 'Auth']); 
$routes->get('ver_factura_usuario/(:num)', 'ventas_controller::ver_facturas_usuario/$1', ['filter' => 'Auth']);

// Vista de ventas del admin
$routes->get('/ventas', 'ventas_controller::ventas', ['filter' => 'AdminFilter']);

/* Contacto */
$routes->get('/contacto','contacto_controller::pagContacto');
$routes->get('/ver-consultas','contacto_controller::pagListado');
$routes->post('/enviar-contacto','contacto_controller::enviar_contacto');
$routes->post('/enviar-respuesta/(:num)','contacto_controller::responder_consulta/$1', ['filter' => 'Auth']);
$routes->post('/eliminar-consulta/(:num)','contacto_controller::eliminar_consulta/$1', ['filter' => 'Auth']);


/* Ruta de armado de página Home */
$routes->get('/(:any)', 'Home::armarPagina/$1');
