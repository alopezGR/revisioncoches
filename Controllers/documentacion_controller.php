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
            $empresa = $_POST['EMPRESA'];

            $resultado = Documentacion::getInfoVehiculo($vehiculo, $empresa);

            if ($resultado == false || $resultado['id'] == '1478') {
                $_SESSION['vehiculoIncorrecto'] = 'true';
                require_once 'Views/Documentacion/index.php';
            } else {
                // $rampas = Accesibilidad::getRampasVehiculo($vehiculo);
                $revision = Documentacion::obtenerUltimaRevision($resultado['id']);
                $fechaActual = date('Y-m-d');
                $fechaUltimaRevision = $revision['FECHA'];

                if ($revision && $fechaActual == $fechaUltimaRevision) {
                    $revisionCorrecta = Documentacion::comprobarRevision($revision['ID']);
                    require_once 'Views/Documentacion/revision.php';
                } else {
                    require_once 'Views/Documentacion/formulario.php';
                }
                $rampas = Documentacion::getRampasVehiculo($vehiculo);
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

    public function actualizarFormulario()
    {
        if (isset($_SESSION['logged'])) {

            $datos = $_POST;

            $datos['USUARIO'] = $_SESSION['user'];

            $resultadoFlota = Documentacion::actualizarDatos($datos, $datos['IDREVISION']);

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
