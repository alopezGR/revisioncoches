<?php

include 'vehiculo.php';
class Accesibilidad Extends Vehiculo{

    public static function insertDatos($datos) {
        $conn = Db::getConector();

        $datetime = date_create();

        $fecha = date_format($datetime, 'Y-m-d');
        $hora = date_format($datetime, 'H:i:s');

        $queryFlota = " INSERT INTO `estado_accesibilidad` (`id`, `idempresa`, `idvehiculo`, `idusuario`, `fecha`, `hora`, `kneeling`, 
        `cinturonespmr`, `barras`, `rampa`, rampaauto, `pulsadoresrampa`, `senlumrampa`, `acusticarampa`, `kneeling_obs`, 
        `cinturonespmr_obs`, `barras_obs`, `rampa_obs`, rampaauto_obs, `pulsadoresrampa_obs`, `senlumrampa_obs`, `acusticarampa_obs`, `traspasado`, usuario) 
        VALUES (NULL, :IDEMPRESA, :IDVEHICULO, :IDUSUARIO, :FECHA, :HORA, :KNEELING, :CINTURONESPMR, :BARRAS, :RAMPA, 
        :RAMPAAUTO, :PULSADORESRAMPA, :SENLUMRAMPA, :ACUSTICARAMPA, :KNEELING_OBS, :CINTURONESPMR_OBS, :BARRAS_OBS, :RAMPA_OBS, 
        :RAMPAAUTO_OBS, :PULSADORESRAMPA_OBS, :SENLUMRAMPA_OBS, :ACUSTICARAMPA_OBS, '0', :USUARIO)";

        $stFlota = $conn->prepare($queryFlota);

        $stFlota->bindParam(":IDEMPRESA", $datos['EMPRESA']);
        $stFlota->bindParam(":IDVEHICULO", $datos['IDVEHICULO']);
        $stFlota->bindValue(":IDUSUARIO", isset($datos['IDUSUARIO']) ? $datos['IDUSUARIO'] : 0);
        $stFlota->bindParam(":FECHA", $fecha);
        $stFlota->bindValue(":HORA", $hora);
        $stFlota->bindValue(":KNEELING", $datos['KNEELING']);
        $stFlota->bindValue(":CINTURONESPMR", $datos['CINTURONESPMR']);
        $stFlota->bindValue(":BARRAS", $datos['BARRAS']);
        $stFlota->bindValue(":RAMPA", $datos['RAMPA']);
        $stFlota->bindValue(":RAMPAAUTO", $datos['RAMPAAUTO']);
        $stFlota->bindValue(":PULSADORESRAMPA", $datos['PULSADORESRAMPA']);
        $stFlota->bindValue(":SENLUMRAMPA", $datos['SENLUMRAMPA']);
        $stFlota->bindValue(":ACUSTICARAMPA", !empty($datos['ACUSTICARAMPA']) ? $datos['ACUSTICARAMPA'] : NULL);
        $stFlota->bindValue(":KNEELING_OBS", !empty($datos['KNEELING_OBS']) ? $datos['KNEELING_OBS'] : NULL);
        $stFlota->bindValue(":CINTURONESPMR_OBS", !empty($datos['CINTURONESPMR_OBS']) ? $datos['CINTURONESPMR_OBS'] : NULL);
        $stFlota->bindValue(":BARRAS_OBS", !empty($datos['BARRAS_OBS']) ? $datos['BARRAS_OBS'] : NULL);
        $stFlota->bindValue(":RAMPA_OBS", !empty($datos['RAMPA_OBS']) ? $datos['RAMPA_OBS'] : NULL);
        $stFlota->bindValue(":RAMPAAUTO_OBS", !empty($datos['RAMPAAUTO_OBS']) ? $datos['RAMPAAUTO_OBS'] : NULL);
        $stFlota->bindValue(":PULSADORESRAMPA_OBS", !empty($datos['PULSADORESRAMPA_OBS']) ? $datos['PULSADORESRAMPA_OBS'] : NULL);
        $stFlota->bindValue(":SENLUMRAMPA_OBS", !empty($datos['SENLUMRAMPA_OBS']) ? $datos['SENLUMRAMPA_OBS'] : NULL);
        $stFlota->bindValue(":ACUSTICARAMPA_OBS", !empty($datos['ACUSTICARAMPA_OBS']) ? $datos['ACUSTICARAMPA_OBS'] : NULL);
        $stFlota->bindValue(":USUARIO", !empty($datos['USUARIO']) ? $datos['USUARIO'] : NULL);
        
        $stFlota->execute();
        
        if($stFlota){
            return true;
        } else {
            return false;
        }
    }
    
    // public static function insertarRampa($datos, $idRampa){
        
    //     $datetime = date_create();

    //     $fecha = date_format($datetime, 'Y-m-d');
    //     $hora = date_format($datetime, 'H:i:s');
        
    //     $conn = Db::getConector();
        
    //     $queryRampa = "INSERT INTO controlrampa (idempresa,idbus,idrampa,fecha,tipo,IDORDEN,hora,idusuario) 
    //                     values (:idempresa,:idbus,:idrampa,:fecha,:tipo,:idorden,:hora,:idusuario)";
        
    //     $stRampa = $conn->prepare($queryRampa);
        
    //     $stRampa->bindParam(":IDEMPRESA", $datos['EMPRESA']);
    //     $stRampa->bindParam(":IDBUS", $datos['IDVEHICULO']);
    //     $stRampa->bindParam(":IDRAMPA", $idRampa);
    //     $stRampa->bindParam(":FECHA", $fecha);
    //     $stRampa->bindParam(":TIPO", $datos["tipo-$idRampa"]);
    //     $stRampa->bindValue(":IDORDEN", $datos["r-$idRampa"]);
    //     $stRampa->bindParam(":HORA", $hora);
    //     $stRampa->bindValue(":IDUSUARIO", isset($datos['idusuario']) ? 1 : 0);
    //     $stRampa->bindParam(":IDEMPRESA_OBS", $datos['empresa']);
    //     $stRampa->bindParam(":IDBUS_OBS", $datos['idvehiculo']);
    //     $stRampa->bindParam(":IDRAMPA_OBS", $idRampa);
    //     $stRampa->bindParam(":FECHA_OBS", $fecha);
    //     $stRampa->bindParam(":TIPO_OBS", $datos["tipo-$idRampa"]);
    //     $stRampa->bindValue(":IDORDEN_OBS", $datos["r-$idRampa"]);
    //     $stRampa->bindParam(":HORA_OBS", $hora);
    //     $stRampa->bindValue(":IDUSUARIO_OBS", isset($datos['idusuario']) ? 1 : 0);
        
    //     $stRampa->execute();
        
    //     if($stRampa){
    //         return true;
    //     } else {
    //         return false;
    //     }
        
    // }

}
