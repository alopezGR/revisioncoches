<?php

class Informe {

    public static function getInfoVehiculo($vehiculo) {

        if (!empty($vehiculo)) {
            if ($vehiculo[0] == 'A' || $vehiculo[0] == 'a') {
                $vehiculo = substr($vehiculo, 1);
            } else if ($vehiculo[0] == 'B' || $vehiculo[0] == 'b') {
                $vehiculo = "2" . substr($vehiculo, 1);
            } else if ($vehiculo[0] == 'R' || $vehiculo[0] == 'r') {
                $vehiculo = "3" . substr($vehiculo, 1);
            }
        } else {
            return false;
        }

        $conn = Db::getConector();

        $query = "SELECT * FROM vehiculo WHERE codbus = :vehiculo";

        $st = $conn->prepare($query);

        $st->bindParam(":vehiculo", $vehiculo);

        $st->execute();

        if ($st) {
            return $st->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public static function getRampasVehiculo($vehiculo) {

        $conn = Db::getConector();

        $query = "SELECT * FROM rampas WHERE codbus = :vehiculo";

        $st = $conn->prepare($query);

        $st->bindParam(":vehiculo", $vehiculo);

        $st->execute();

        if ($st) {
            return $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public static function insertDatos($datos) {
        $conn = Db::getConector();

        $datetime = date_create();

        $fecha = date_format($datetime, 'Y-m-d');
        $hora = date_format($datetime, 'H:i:s');

        $queryFlota = " INSERT INTO `estadoaccesibilidad` (`id`, `idempresa`, `idvehiculo`, `idusuario`, `fecha`, `hora`, `kneeling`, 
        `cinturonespmr`, `barras`, `rampa`, `pulsadoresrampa`, `senlumrampa`, `acusticarampa`, `traspasado`) 
        VALUES (NULL, :idempresa, :idvehiculo, :idusuario, :fecha, :hora, :kneeling, :cinturonespmr, :barras, :rampa, :pulsadoresrampa, :senlumrampa, :acusticarampa, '0')";

        $stFlota = $conn->prepare($queryFlota);

        $stFlota->bindParam(":idempresa", $datos['empresa']);
        $stFlota->bindParam(":idvehiculo", $datos['idvehiculo']);
        $stFlota->bindParam(":fecha", $fecha);
        $stFlota->bindValue(":hora", $hora);
        $stFlota->bindValue(":kneeling", $datos['kneeling']);
        $stFlota->bindValue(":cinturonespmr", $datos['cinturonespmr']);
        $stFlota->bindValue(":barras", $datos['barras']);
        $stFlota->bindValue(":rampa", $datos['rampa']);
        $stFlota->bindValue(":pulsadoresrampa", $datos['pulsadoresrampa']);
        $stFlota->bindValue(":senlumrampa", $datos['senlumrampa']);
        $stFlota->bindValue(":acusticarampa", $datos['acusticarampa']);
        $stFlota->bindValue(":idusuario", isset($datos['idusuario']) ? $datos['idusuario'] : 0);
        
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
