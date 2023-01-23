<?php

/**
 * 
 * Descripción: Controlador para la entidad Accesibilidad
 * @author Alfonso López Velasco <alopez@gruporuiz.com>
 * @date: 25-02-2017
 * @version 1.0
 * 
 */
class AccesibilidadController
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
            $empresa = $_POST['EMPRESA'];

            $resultado = Accesibilidad::getInfoVehiculo($vehiculo, $empresa);

            if ($resultado == false || $resultado['id'] == '1478') {
                $_SESSION['vehiculoIncorrecto'] = 'true';
                require_once 'Views/Accesibilidad/index.php';
            } else {
                // $rampas = Accesibilidad::getRampasVehiculo($vehiculo);
                $revision = Accesibilidad::obtenerUltimaRevision($resultado['id']);
                $fechaActual = date('Y-m-d');
                $fechaUltimaRevision = $revision['fecha'];

                if ($revision && $fechaActual == $fechaUltimaRevision) {
                    $revisionCorrecta = Accesibilidad::comprobarRevision($revision['id']);
                    require_once 'Views/Accesibilidad/revision.php';
                } else {
                    require_once 'Views/Accesibilidad/formulario.php';
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

            $resultadoFlota = Accesibilidad::insertDatos($datos);

            if ($resultadoFlota) {
                Usuario::registroLogin($_SESSION['user'], 'Realizada revision de accesibilidad al coche ' . $datos['IDVEHICULO']);
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

            $resultadoFlota = Accesibilidad::actualizarDatos($datos, $datos['IDREVISION']);

            if ($resultadoFlota) {
                Usuario::registroLogin($_SESSION['user'], 'Realizada actualización de revision de accesibilidad al coche ' . $datos['IDVEHICULO']);
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
