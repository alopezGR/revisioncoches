<?php

/**
 * 
 * Descripción: Controlador para la entidad Accesibilidad
 * @author Alfonso López Velasco <alopez@gruporuiz.com>
 * @date: 25-02-2017
 * @version 1.0
 * 
 */
class LimpiezaController
{

    public function __construct()
    {
    }

    public function index()
    {
        if (isset($_SESSION['logged'])) {
            require_once 'Views/Accesibilidad/index.php';
        } else {
            require_once 'Views/Usuario/login.php';
        }
    }

    public function formulario()
    {
        if (isset($_SESSION['logged'])) {
            $vehiculo = strtoupper($_POST['vehiculo']);

            $resultado = Accesibilidad::getInfoVehiculo($vehiculo);

            if ($resultado == false || $resultado['id'] == '1478') {
                $_SESSION['vehiculoIncorrecto'] = 'true';
                require_once 'Views/Accesibilidad/index.php';
            } else {
                $rampas = Accesibilidad::getRampasVehiculo($vehiculo);
                require_once 'Views/Accesibilidad/formulario.php';
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

            $resultadoFlota = Accesibilidad::insertDatos($datos);

            $resultadoRampa = true;

            foreach ($datos as $key => $value) {
                if (strpos($key, "r-") !== false) {
                    $resultadoRampa &= Accesibilidad::insertarRampa($datos, substr($key, 2));
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
