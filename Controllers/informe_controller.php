<?php

/**
 * Descripción: Controlador para la entidad fichero
 * @author Alfonso López Velasco <alopez@gruporuiz.com>
 * @date: 25-02-2017
 * @version 1.0
 */
class InformeController {

    public function __construct() {
        
    }
    
    public function index(){
        require_once 'Views/Informe/index.php';
    }
    
    public function formulario(){
        $vehiculo = strtoupper($_POST['vehiculo']);
        
        $resultado = Informe::getInfoVehiculo($vehiculo);
        
        if($resultado == false || $resultado['id'] == '1478'){
            $_SESSION['vehiculoIncorrecto'] = 'true';
            require_once 'Views/Informe/index.php';
        } else {
            $rampas = Informe::getRampasVehiculo($vehiculo);
            require_once 'Views/Informe/formulario.php';
        }
    }
    
    public function procesarFormulario() {
        
        $datos = $_POST;
        
        $resultadoFlota = Informe::insertDatos($datos);
		
		$resultadoRampa = true;
        
        foreach ($datos as $key => $value) {
            if(strpos($key, "r-") !== false){
               $resultadoRampa &= Informe::insertarRampa($datos, substr($key, 2));
            }
        }
        
        if($resultadoFlota && $resultadoRampa){        
            $_SESSION['exito'] = "true";
        } else {
            $_SESSION['error'] = "true";
        }
        
        header("Location: index.php");
        
        
        
        
        
    }
}
?>