<?php

/**
 * 
 * Descripción: Controlador para la entidad Seguridad
 * @author Alfonso López Velasco <alopez@gruporuiz.com>
 * @date: 25-02-2017
 * @version 1.0
 * 
 */
class SeguridadController
{

    public function __construct()
    {
    }

    public function index()
    {
        if (isset($_SESSION['logged'])) {
            require_once 'Views/Seguridad/index.php';
        } else {
            require_once 'Views/Usuario/login.php';
        }
    }

    public function formulario()
    {
        if (isset($_SESSION['logged'])) {
            $vehiculo = strtoupper($_POST['vehiculo']);

            $resultado = Seguridad::getInfoVehiculo($vehiculo);

            if ($resultado == false || $resultado['id'] == '1478') {
                $_SESSION['vehiculoIncorrecto'] = 'true';
                require_once 'Views/Seguridad/index.php';
            } else {
                $rampas = Seguridad::getRampasVehiculo($vehiculo);
                require_once 'Views/Seguridad/formulario.php';
            }
        } else {
            require_once 'Views/Usuario/login.php';
        }
    }

    public function procesarFormulario()
    {
        if (isset($_SESSION['logged'])) {

            $datos = $_POST;

            $datos['usuario'] = $_SESSION['user'];

            $resultadoFlota = Seguridad::insertDatos($datos);

            $resultadoRampa = true;

            foreach ($datos as $key => $value) {
                if (strpos($key, "r-") !== false) {
                    $resultadoRampa &= Seguridad::insertarRampa($datos, substr($key, 2));
                }
            }

            if ($resultadoFlota && $resultadoRampa) {
                Usuario::registroLogin($_SESSION['user'], 'Realizada revision coche ' . $datos['idvehiculo']);
                $_SESSION['exito'] = "true";
            } else {
                $_SESSION['error'] = "true";
            }

            header("Location: index.php");
        } else {
            require_once 'Views/Usuario/login.php';
        }
    }
}
