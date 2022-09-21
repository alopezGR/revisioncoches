<?php

/**
 * 
 * Descripción: Controlador para la entidad Limpieza
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
            require_once 'Views/Limpieza/index.php';
        } else {
            require_once 'Views/Usuario/login.php';
        }
    }

    public function formulario()
    {
        if (isset($_SESSION['logged'])) {
            $vehiculo = strtoupper($_POST['vehiculo']);

            $resultado = Limpieza::getInfoVehiculo($vehiculo);

            if ($resultado == false || $resultado['id'] == '1478') {
                $_SESSION['vehiculoIncorrecto'] = 'true';
                require_once 'Views/Limpieza/index.php';
            } else {
                // $rampas = Accesibilidad::getRampasVehiculo($vehiculo);
                $revisionLI = Limpieza::obtenerUltimaRevisionLI();
                $revisionLE = Limpieza::obtenerUltimaRevisionLE();
                $revisionCI = Limpieza::obtenerUltimaRevisionCI();
                $revisionCE = Limpieza::obtenerUltimaRevisionCE();

                // var_dump($revisionLI); exit;

                $revision = $revisionCE && $revisionCI && $revisionLI && $revisionLE;

                $fechaActual = date('Y-m-d');

                if ($revision) {
                    $fechaUltimaRevision = $revision ? $revisionLI['FECHA'] : false;

                    $revisionCorrectaLI = Limpieza::comprobarRevisionLI($revisionLI['ID']);
                    $revisionCorrectaLE = Limpieza::comprobarRevisionLE($revisionLE['ID']);
                    $revisionCorrectaCI = Limpieza::comprobarRevisionCI($revisionCI['ID']);
                    $revisionCorrectaCE = Limpieza::comprobarRevisionCE($revisionCE['ID']);

                    $revisionCorrecta = $revisionCorrectaLI && $revisionCorrectaLE && $revisionCorrectaCI && $revisionCorrectaCE;

                    if ($fechaActual == $fechaUltimaRevision) {
                        require_once 'Views/Limpieza/revision.php';
                    } else {
                        require_once 'Views/Limpieza/formulario.php';
                    }
                } else {
                    require_once 'Views/Limpieza/formulario.php';
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

            $resultadoFlota = Limpieza::insertDatos($datos);

            if ($resultadoFlota) {
                Usuario::registroLogin($_SESSION['user'], 'Realizada revision de limpieza al coche ' . $datos['IDVEHICULO']);
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


            $resultadoFlota = Limpieza::actualizarDatos($datos);

            if ($resultadoFlota) {
                Usuario::registroLogin($_SESSION['user'], 'Realizada revision de limpieza al coche ' . $datos['IDVEHICULO']);
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
