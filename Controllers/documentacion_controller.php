<?php

/**
 * 
 * Descripción: Controlador para la entidad Documentacion
 * @author Alfonso López Velasco <alopez@gruporuiz.com>
 * @date: 25-02-2017
 * @version 1.0
 * 
 */
class DocumentacionController
{

    public function __construct()
    {
    }

    public function index()
    {
        if (isset($_SESSION['logged'])) {
            require_once 'Views/Documentacion/index.php';
        } else {
            require_once 'Views/Usuario/login.php';
        }
    }

    public function formulario()
    {
        if (isset($_SESSION['logged'])) {
            $vehiculo = strtoupper($_POST['vehiculo']);

            $resultado = Documentacion::getInfoVehiculo($vehiculo);

            if ($resultado == false || $resultado['id'] == '1478') {
                $_SESSION['vehiculoIncorrecto'] = 'true';
                require_once 'Views/Documentacion/index.php';
            } else {
                $rampas = Documentacion::getRampasVehiculo($vehiculo);
                require_once 'Views/Documentacion/formulario.php';
            }
        } else {
            require_once 'Views/Usuario/login.php';
        }
    }

    public function procesarFormulario()
    {
        if (isset($_SESSION['logged'])) {

            $datos = $_POST;

            $datos['USUARIO'] = $_SESSION['user'];

            $resultadoFlota = Documentacion::insertDatos($datos);

            if ($resultadoFlota) {
                Usuario::registroLogin($_SESSION['user'], 'Realizada revision de documentacion al coche ' . $datos['IDVEHICULO']);
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