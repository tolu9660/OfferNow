<?php
require_once __DIR__.'/aplicacion.php';
// Varios defines para los parámetros de configuración de acceso a la BD y la URL desde la que se sirve la aplicación
define('BD_HOST', 'localhost');
define('BD_NAME', 'aw_p2');
define('BD_USER', 'root');
define('BD_PASS', '');
define('RUTA_APP', '/proyecto/practica3');					//Ruta de Luis
//define('RUTA_APP', '/AW/OfferNow/proyecto/practica3');	//Ruta de Pablo
define('RUTA_IMGS', RUTA_APP.'/imagenes');
define('RUTA_CSS', RUTA_APP.'/css');
define('COMUN', RUTA_APP.'/includes/comun');
define('USUARIO',RUTA_APP.'/includes/usuario'); //ruta global para usuarios
define('PRODUCTOS',RUTA_APP.'/productos'); //ruta global para usuarios
define('SESION',RUTA_APP.'/includes/login'); //ruta global para usuarios
define('POSTEAR',RUTA_APP.'/postear'); //ruta global para usuarios


define('INSTALADA', true );


if (! INSTALADA) {
    echo "La aplicación no está configurada";
    exit();
  }


/* */
/* Configuración de Codificación */
/* */

ini_set('default_charset', 'UTF-8');
setLocale(LC_ALL, 'es_ES.UTF.8');

/* */
/* Funciones de gestión de la conexión a la BD */
/* */

$APP =Aplicacion::getSingleton();
$APP->init(array('host'=>BD_HOST, 'bd'=>BD_NAME, 'user'=>BD_USER, 'pass'=>BD_PASS));
register_shutdown_function(array($APP, 'shutdown'));

//session_start();