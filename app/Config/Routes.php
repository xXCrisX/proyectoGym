<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 $routes->get('/', 'Home::index');
/**CRUD de usuario */
$routes->get('/usuario', 'Usuario::ver');
$routes->get('/usuario/agregar','Usuario::agregar');
$routes->post('/usuario/insertar','Usuario::insertar');

$routes->get('/usuario/editar/(:num)','Usuario::editar/$1');
$routes->post('/usuario/actualizar','Usuario::actualizar');

$routes->get('/usuario/eliminar/(:num)','Usuario::eliminar/$1');
/**LOGIN de usuario */
$routes->get('/login','Usuario::inicio');
$routes->get('/salir','Usuario::salir');
$routes->post('/acceder','Usuario::acceder');

/**CRUD de socio */
$routes->get('/socio', 'Socio::ver');
$routes->get('/socio/agregar','Socio::agregar');
$routes->post('/socio/insertar','Socio::insertar');
$routes->get('/socio/editar/(:num)','Socio::editar/$1');
$routes->post('/socio/actualizar','Socio::actualizar');
$routes->get('/socio/eliminar/(:num)','Socio::eliminar/$1');
/**LOGIN de socio */
$routes->get('/loginSocio','Socio::loginSocio');
$routes->post('/accederSocio','socio::accederSocio');
$routes->get('/salirSocio','Socio::salirSocio');

/**CRUD de entrenador */
$routes->get('/entrenador/editar/(:num)','Entrenador::editar/$1');
$routes->post('/entrenador/actualizar','Entrenador::actualizar');
$routes->get('/entrenador/eliminar/(:num)','Entrenador::eliminar/$1');

/**CRUD de pago */
$routes->get('/pago', 'Pago::ver');
$routes->get('/pago/agregar','Pago::agregar');
$routes->post('/pago/insertar','Pago::insertar');

/**CRUD de Actividad */
$routes->get('/actividad', 'Actividad::ver');
$routes->get('/actividad/agregar','Actividad::agregar');
$routes->post('/actividad/insertar','Actividad::insertar');
$routes->get('/actividad/editar/(:num)','Actividad::editar/$1');
$routes->post('/actividad/actualizar','Actividad::actualizar');
$routes->get('/actividad/eliminar/(:num)','Actividad::eliminar/$1');

/**CRUD de Rutinas */
$routes->get('/rutinas', 'Rutina::ver');
$routes->get('/rutinas/agregar','Rutina::agregar');
$routes->post('/rutinas/insertar','Rutina::insertar');
$routes->get('/rutinas/editar/(:num)','Rutina::editar/$1');
$routes->post('/rutinas/actualizar','Rutina::actualizar');
$routes->get('/rutinas/eliminar/(:num)','Rutina::eliminar/$1');

/**CRUD de equipo */
$routes->get('/equipos', 'Equipo::ver');
$routes->get('/equipos/agregar','Equipo::agregar');
$routes->post('/equipos/insertar','Equipo::insertar');
$routes->get('/equipos/editar/(:num)','Equipo::editar/$1');
$routes->post('/equipos/actualizar','Equipo::actualizar');
$routes->get('/equipos/eliminar/(:num)','Equipo::eliminar/$1');

/**CRUD de dietas */
$routes->get('/dietas', 'Dieta::ver');
$routes->get('/dietas/agregar','Dieta::agregar');
$routes->post('/dietas/insertar','Dieta::insertar');
$routes->get('/dietas/editar/(:num)','Dieta::editar/$1');
$routes->post('/dietas/actualizar','Dieta::actualizar');
$routes->get('/dietas/eliminar/(:num)','Dieta::eliminar/$1');

/**CRUD de asistencais  */
$routes->get('/asistencias', 'Asistencia::ver');
$routes->get('/asistencias/registrar','Asistencia::registrar');
$routes->post('/asistencias/insertar','Asistencia::insertar');
$routes->get('/asistencias/editar/(:num)','Asistencia::editar/$1');
$routes->post('/asistencias/actualizar','Asistencia::actualizar');

/**Inicio */
$routes->get('/inicio','Pagina::ver');


