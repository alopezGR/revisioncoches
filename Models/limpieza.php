<?php

include 'vehiculo.php';
class Limpieza Extends Vehiculo{

    public static function insertDatos($datos) {
        $conn = Db::getConector();

        $datetime = date_create();

        $fecha = date_format($datetime, 'Y-m-d');
        $hora = date_format($datetime, 'H:i:s');

        $queryFlota = " INSERT INTO `estadoaccesibilidad` (`id`, `idempresa`, `idvehiculo`, `idusuario`, `fecha`, `hora`, `kneeling`, 
        `cinturonespmr`, `barras`, `rampa`, rampaauto, `pulsadoresrampa`, `senlumrampa`, `acusticarampa`, `traspasado`, usuario) 
        VALUES (NULL, :idempresa, :idvehiculo, :idusuario, :fecha, :hora, :kneeling, :cinturonespmr, :barras, :rampa, 
        :rampaauto, :pulsadoresrampa, :senlumrampa, :acusticarampa, '0', :usuario)";

        $stFlota = $conn->prepare($queryFlota);

        $stFlota->bindParam(":idempresa", $datos['empresa']);
        $stFlota->bindParam(":idvehiculo", $datos['idvehiculo']);
        $stFlota->bindValue(":idusuario", isset($datos['idusuario']) ? $datos['idusuario'] : 0);
        $stFlota->bindParam(":fecha", $fecha);
        $stFlota->bindValue(":hora", $hora);
        $stFlota->bindValue(":kneeling", $datos['kneeling']);
        $stFlota->bindValue(":cinturonespmr", $datos['cinturonespmr']);
        $stFlota->bindValue(":barras", $datos['barras']);
        $stFlota->bindValue(":rampa", $datos['rampa']);
        $stFlota->bindValue(":rampaauto", $datos['rampaauto']);
        $stFlota->bindValue(":pulsadoresrampa", $datos['pulsadoresrampa']);
        $stFlota->bindValue(":senlumrampa", $datos['senlumrampa']);
        $stFlota->bindValue(":acusticarampa", $datos['acusticarampa']);
        $stFlota->bindValue(":usuario", $datos['usuario']);
        
        $stFlota->execute();
        
        if($stFlota){
            return true;
        } else {
            return false;
        }
    }
    
    public static function insertarRampa($datos, $idRampa){
        
        $datetime = date_create();

        $fecha = date_format($datetime, 'Y-m-d');
        $hora = date_format($datetime, 'H:i:s');
        
        $conn = Db::getConector();
        
        $queryRampa = "INSERT INTO controlrampa (idempresa,idbus,idrampa,fecha,tipo,idorden,hora,idusuario) 
                        values (:idempresa,:idbus,:idrampa,:fecha,:tipo,:idorden,:hora,:idusuario)";
        
        $stRampa = $conn->prepare($queryRampa);
        
        $stRampa->bindParam(":idempresa", $datos['empresa']);
        $stRampa->bindParam(":idbus", $datos['idvehiculo']);
        $stRampa->bindParam(":idrampa", $idRampa);
        $stRampa->bindParam(":fecha", $fecha);
        $stRampa->bindParam(":tipo", $datos["tipo-$idRampa"]);
        $stRampa->bindValue(":idorden", $datos["r-$idRampa"]);
        $stRampa->bindParam(":hora", $hora);
        $stRampa->bindValue(":idusuario", isset($datos['idusuario']) ? 1 : 0);
        
        $stRampa->execute();
        
        if($stRampa){
            return true;
        } else {
            return false;
        }
        
    }

}
