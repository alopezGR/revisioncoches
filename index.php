<?php

session_start();
ini_set('display_errors', 'On');
ini_set('display_errors', 1);

ini_set('display_errors', 'On');

// Valor por defecto en PHP
// Muestra todos los errores menos las notificaciones
error_reporting(E_ALL ^ E_NOTICE);

// Muestro todos los errores
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
error_reporting(E_ALL);
error_reporting(-1);

// Muestro todos los errores, incluso los estrictos
error_reporting(E_ALL | E_STRICT);

// No muestra ningún error
//error_reporting(0);


// También se puede usar la función ini_set
ini_set('error_reporting', E_ALL);
require_once('connection.php');
$_SESSION['timestamp'] = time();
// la variable controller guarda el nombre del controlador y action guarda la acción por ejemplo registrar 
//si la variable controller y action son pasadas por la url desde layout.php entran en el if
if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action = $_GET['action'];
} else if (isset($_SESSION['logged']) && $_SESSION['logged']) {
    $controller = 'informe';
    $action = 'index';
} else {
    $controller = 'informe';
    $action = 'subir';
}

//carga la vista layout.php
require_once('Views/layout.php');
?>