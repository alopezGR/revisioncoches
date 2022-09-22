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
                // $rampas = Accesibilidad::getRampasVehiculo($vehiculo);
                $revision = Seguridad::obtenerUltimaRevision($resultado['id']);
                $fechaActual = date('Y-m-d');
                $fechaUltimaRevision = $revision['FECHA'];
                
                if($revision && $fechaActual == $fechaUltimaRevision){
                    $revisionCorrecta = Seguridad::comprobarRevision($revision['ID']);
                    require_once 'Views/Seguridad/revision.php';
                } else {
                    require_once 'Views/Seguridad/formulario.php';
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

            $resultadoFlota = Seguridad::insertDatos($datos);

            if ($resultadoFlota) {
                Usuario::registroLogin($_SESSION['user'], 'Realizada revision  de seguridad al coche ' . $datos['IDVEHICULO']);
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

            $resultadoFlota = Seguridad::actualizarDatos($datos, $datos['IDREVISION']);

            if ($resultadoFlota) {
                Usuario::registroLogin($_SESSION['user'], 'Realizada revision  de seguridad al coche ' . $datos['IDVEHICULO']);
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
