<?php

//función que llama al controlador y su respectiva acción, que son pasados como parámetros
function call($controller, $action)
{
    //importa el controlador desde la carpeta Controllers
    require_once('Controllers/' . $controller . '_controller.php');
    //crea el controlador
    switch ($controller) {
        case 'accesibilidad':
            require_once('Models/accesibilidad.php');
            require_once('Models/usuario.php');
            $controller = new AccesibilidadController();
            break;
        case 'documentacion':
            require_once('Models/documentacion.php');
            require_once('Models/usuario.php');
            $controller = new DocumentacionController();
            break;
        case 'limpieza':
            require_once('Models/limpieza.php');
            require_once('Models/usuario.php');
            $controller = new LimpiezaController();
            break;
        case 'pegatinas':
            require_once('Models/pegatinas.php');
            require_once('Models/usuario.php');
            $controller = new PegatinasController();
            break;
        case 'seguridad':
            require_once('Models/seguridad.php');
            require_once('Models/usuario.php');
            $controller = new SeguridadController();
            break;
        case 'usuario':
            require_once('Models/usuario.php');
            $controller = new UsuarioController();
            break;
        case 'exportar':
            require_once('Models/exportar.php');
            require_once('Models/accesibilidad.php');
            require_once('Models/documentacion.php');
            require_once('Models/pegatinas.php');
            require_once('Models/limpieza.php');
            require_once('Models/seguridad.php');
            $controller = new ExportarController();
            break;
        case 'menu':
            // require_once('Models/usuario.php');
            $controller = new MenuController();
            break;
        case 'error':
            $controller = new ErrorController();
            break;
    }
    //llama a la acción del controlador
    $controller->{$action}();
}

//array con los controladores y sus respectivas acciones
$controllers = array(
    'error' =>  ['error'],
    'menu' =>  ['index'],
    'accesibilidad' => ['index', 'formulario', 'procesarFormulario'],
    'documentacion' => ['index', 'formulario', 'procesarFormulario'],
    'limpieza' => ['index', 'formulario', 'procesarFormulario'],
    'pegatinas' => ['index', 'formulario', 'procesarFormulario'],
    'seguridad' => ['index', 'formulario', 'procesarFormulario'],
    'exportar' => ['index', 'exportarRevisiones'],
    'usuario' => ['login', 'checkLogin', 'salir', 'registroLogin', 'formularioCambioPassword', 'cambiarPassword']
);
//verifica que el controlador enviado desde index.php esté dentro del arreglo controllers
if (array_key_exists($controller, $controllers)) {
    //verifica que el arreglo controllers con la clave que es la variable controller del index exista la acción
    if (in_array($action, $controllers[$controller])) {
        //llama  la función call y le pasa el controlador a llamar y la acción (método) que está dentro del controlador
        call($controller, $action);
    } else {
        call('menu', 'index');
    }
} else { // le pasa el nombre del controlador y la pagina de error
    call('error', 'error');
}
