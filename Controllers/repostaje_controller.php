<?php

/**
 * 
 * Descripción: Controlador para la entidad Accesibilidad
 * @author Alfonso López Velasco <alopez@gruporuiz.com>
 * @date: 25-02-2017
 * @version 1.0
 * 
 */
class RepostajeController
{

    public function __construct()
    {
    }

    public function index()
    {
        if (isset($_SESSION['logged'])) {
            require_once 'Views/Repostaje/index.php';
        } else {
            require_once 'Views/Usuario/login.php';
        }
    }

    public function formulario()
    {
        if (isset($_SESSION['logged'])) {
            $vehiculo = strtoupper($_POST['vehiculo']);

            $resultado = Repostaje::getInfoVehiculo($vehiculo);

            if ($resultado == false || $resultado['id'] == '1478') {
                $_SESSION['vehiculoIncorrecto'] = 'true';
                require_once 'Views/Repostaje/index.php';
            } else {
                // $rampas = Accesibilidad::getRampasVehiculo($vehiculo);
                $revision = Repostaje::obtenerUltimaRevision($resultado['id']);
                $fechaActual = date('Y-m-d');
                $fechaUltimaRevision = $revision['fecha'];
                
                if ($revision && $fechaActual == $fechaUltimaRevision) {
                    require_once 'Views/Repostaje/revision.php';
                } else {
                    require_once 'Views/Repostaje/formulario.php';
                }
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

            $resultadoFlota = Repostaje::insertDatos($datos);

            if ($resultadoFlota) {
                Usuario::registroLogin($_SESSION['user'], 'Realizada introducción de datos de repostaje al coche ' . $datos['IDVEHICULO']);
                $_SESSION['exito'] = "true";
            } else {
                $_SESSION['error'] = "true";
            }

            header("Location: index.php");
        } else {
            require_once 'Views/Usuario/login.php';
        }
    }

    public function actualizarFormulario()
    {
        if (isset($_SESSION['logged'])) {

            $datos = $_POST;

            $datos['USUARIO'] = $_SESSION['user'];

            $resultadoFlota = Repostaje::actualizarDatos($datos, $datos['IDREVISION']);

            if ($resultadoFlota) {
                Usuario::registroLogin($_SESSION['user'], 'Realizada actualización de datos de repostaje al coche ' . $datos['IDVEHICULO']);
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
