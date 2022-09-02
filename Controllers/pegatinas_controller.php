<?php

/**
 * 
 * Descripción: Controlador para la entidad Pegatinas
 * @author Alfonso López Velasco <alopez@gruporuiz.com>
 * @date: 25-02-2017
 * @version 1.0
 * 
 */
class PegatinasController
{

    public function __construct()
    {
    }

    public function index()
    {
        if (isset($_SESSION['logged'])) {
            require_once 'Views/Pegatinas/index.php';
        } else {
            require_once 'Views/Usuario/login.php';
        }
    }

    public function formulario()
    {
        if (isset($_SESSION['logged'])) {
            $vehiculo = strtoupper($_POST['vehiculo']);

            $resultado = Pegatinas::getInfoVehiculo($vehiculo);

            if ($resultado == false || $resultado['id'] == '1478') {
                $_SESSION['vehiculoIncorrecto'] = 'true';
                require_once 'Views/Pegatinas/index.php';
            } else {
                // $rampas = Pegatinas::getRampasVehiculo($vehiculo);
                $revisionEF = Pegatinas::obtenerUltimaRevisionEF();
                $revisionET = Pegatinas::obtenerUltimaRevisionET();
                $revisionELD = Pegatinas::obtenerUltimaRevisionELD();
                $revisionELI = Pegatinas::obtenerUltimaRevisionELI();
                $revisionELuna = Pegatinas::obtenerUltimaRevisionELuna();
                $revisionIC = Pegatinas::obtenerUltimaRevisionIC();
                $revisionID = Pegatinas::obtenerUltimaRevisionID();
                $revisionILI = Pegatinas::obtenerUltimaRevisionILI();
                $revisionILD = Pegatinas::obtenerUltimaRevisionILD();
                $revisionIT = Pegatinas::obtenerUltimaRevisionIT();
                $revisionMI = Pegatinas::obtenerUltimaRevisionMI();
                $revisionILuna = Pegatinas::obtenerUltimaRevisionILuna();

                //  var_dump($revisionILD); exit;
                
                $revision = $revisionEF && $revisionET && $revisionELD && $revisionELI && $revisionELuna 
                && $revisionIC && $revisionID && $revisionILI && $revisionILD && $revisionIT && $revisionMI && $revisionILuna;
                
                $fechaActual = date('Y-m-d');
                
                if ($revision) {
                    $fechaUltimaRevision = $revision ? $revisionEF['FECHA'] : false;
                    
                    $revisionCorrectaEF = Pegatinas::comprobarRevisionEF($revisionEF['ID']);
                    $revisionCorrectaET = Pegatinas::comprobarRevisionET($revisionET['ID']);
                    $revisionCorrectaELD = Pegatinas::comprobarRevisionELD($revisionELD['ID']);
                    $revisionCorrectaELI = Pegatinas::comprobarRevisionELI($revisionELI['ID']);
                    $revisionCorrectaELuna = Pegatinas::comprobarRevisionELuna($revisionELuna['ID']);
                    $revisionCorrectaIC = Pegatinas::comprobarRevisionIC($revisionIC['ID']);
                    $revisionCorrectaID = Pegatinas::comprobarRevisionID($revisionID['ID']);
                    $revisionCorrectaILI = Pegatinas::comprobarRevisionILI($revisionILI['ID']);
                    $revisionCorrectaILD = Pegatinas::comprobarRevisionILD($revisionILD['ID']);
                    $revisionCorrectaIT = Pegatinas::comprobarRevisionIT($revisionIT['ID']);
                    $revisionCorrectaMI = Pegatinas::comprobarRevisionMI($revisionMI['ID']);
                    $revisionCorrectaILuna = Pegatinas::comprobarRevisionILuna($revisionILuna['ID']);
                    
                    
                    $revisionCorrecta = $revisionCorrectaEF && $revisionCorrectaET && $revisionCorrectaELD && $revisionCorrectaELI && $revisionCorrectaELuna 
                    && $revisionCorrectaIC && $revisionCorrectaID && $revisionCorrectaILI && $revisionCorrectaILD && $revisionCorrectaIT && $revisionCorrectaMI 
                    && $revisionCorrectaILuna;
                    // var_dump($revisionCorrecta); exit;

                    if ($fechaActual == $fechaUltimaRevision) {
                        require_once 'Views/Pegatinas/revision.php';
                    } else {
                        require_once 'Views/Pegatinas/formulario.php';
                    }
                } else {
                    require_once 'Views/Pegatinas/formulario.php';
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

            $resultadoPegatinas = Pegatinas::insertDatos($datos);

            if ($resultadoPegatinas) {
                Usuario::registroLogin($_SESSION['user'], 'Realizada revision de pegatinas al coche ' . $datos['IDVEHICULO']);
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

            $resultadoPegatinas = Pegatinas::actualizarDatos($datos);

            if ($resultadoPegatinas) {
                Usuario::registroLogin($_SESSION['user'], 'Realizada revision de pegatinas al coche ' . $datos['IDVEHICULO']);
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
