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

    public static function insertFlota($datos) {
        $conn = Db::getConector();

        $datetime = date_create();

        $fecha = date_format($datetime, 'Y-m-d');
        $hora = date_format($datetime, 'H:i:s');

        $queryFlota = " INSERT INTO estadoflota (id, idempresa, idvehiculo, fecha, estadook, asientos, lunas, barras, puesto, carroceria, lucesint, lucesext, grafitis,
         nolimpieza, limpiezaprof, limpiezasuelo, litros, kilometros, limpiezaext, limpiezaint, idusuario, hora) VALUES (NULL, :idempresa, :idvehiculo, 
         :fecha, :estadook, :asientos, :lunas, :barras, :puesto, :carroceria, :lucesint, :lucesext, :grafitis,
         :nolimpieza, :limpiezaprof, :limpiezasuelo, :litros, :kilometros, :limpiezaext, :limpiezaint, :idusuario, :hora)        
                    ";

        $stFlota = $conn->prepare($queryFlota);

        $stFlota->bindParam(":idempresa", $datos['empresa']);
        $stFlota->bindParam(":idvehiculo", $datos['idvehiculo']);
        $stFlota->bindParam(":fecha", $fecha);
        $stFlota->bindParam(":estadook", $datos['flotaok']);
        $stFlota->bindValue(":asientos", isset($datos['asientos']) ? 1 : 0);
        $stFlota->bindValue(":lunas", isset($datos['lunas']) ? 1 : 0);
        $stFlota->bindValue(":barras", isset($datos['barras']) ? 1 : 0);
        $stFlota->bindValue(":puesto", isset($datos['puesto']) ? 1 : 0);
        $stFlota->bindValue(":carroceria", isset($datos['carroceria']) ? 1 : 0);
        $stFlota->bindValue(":lucesint", isset($datos['lucesint']) ? 1 : 0);
        $stFlota->bindValue(":lucesext", isset($datos['lucesext']) ? 1 : 0);
        $stFlota->bindValue(":grafitis", isset($datos['grafitis']) ? 1 : 0);
        $stFlota->bindValue(":nolimpieza", isset($datos['nolimpieza']) ? 1 : 0);
        $stFlota->bindValue(":limpiezaprof", isset($datos['limpiezaprof']) ? 1 : 0);
        $stFlota->bindValue(":limpiezasuelo", isset($datos['limpiezasuelo']) ? 1 : 0);
        $stFlota->bindValue(":litros", isset($datos['litros']) ? 1 : 0);
        $stFlota->bindValue(":kilometros", isset($datos['kilometros']) ? 1 : 0);
        $stFlota->bindValue(":limpiezaext", isset($datos['limpiezaext']) ? 1 : 0);
        $stFlota->bindValue(":limpiezaint", isset($datos['limpiezaint']) ? 1 : 0);
        $stFlota->bindValue(":idusuario", isset($datos['idusario']) ? 1 : 0);
        $stFlota->bindValue(":hora", $hora);
        
        $stFlota->execute();
        
        if($stFlota){
            return true;
        } else {
            return false;
        }
    }

    public static function insertarInforma($datos) {

        $conn = Db::getConector();

        $queryInforma = " INSERT INTO estadoinforma (id, idempresa, idvehiculo, fecha, informaok, cartel, medios, senial, tarifas, video, fumar, emergencia, 
        libro, reglamento, cambio, ddd, idusuario, hora) VALUES (NULL, :idempresa, :idvehiculo, :fecha, :informaok, :cartel, :medios, :senial, :tarifas, :video, :fumar, :emergencia, 
         :libro, :reglamento, :cambio, :ddd, :idusuario, :hora)";

        $stInforma = $conn->prepare($queryInforma);

        
        $datetime = date_create();

        $fecha = date_format($datetime, 'Y-m-d');
        $hora = date_format($datetime, 'H:i:s');

        $stInforma->bindParam(":idempresa", $datos['empresa']);
        $stInforma->bindParam(":idvehiculo", $datos['idvehiculo']);
        $stInforma->bindParam(":fecha", $fecha);
        $stInforma->bindParam(":informaok", $datos['okinfo']);
        $stInforma->bindValue(":cartel", isset($datos['cartel']) ? 1 : 0);
        $stInforma->bindValue(":medios", isset($datos['medios']) ? 1 : 0);
        $stInforma->bindValue(":senial", isset($datos['senial']) ? 1 : 0);
        $stInforma->bindValue(":tarifas", isset($datos['tarifas']) ? 1 : 0);
        $stInforma->bindValue(":video", isset($datos['video']) ? 1 : 0);
        $stInforma->bindValue(":fumar", isset($datos['fumar']) ? 1 : 0);
        $stInforma->bindValue(":emergencia", isset($datos['emergencia']) ? 1 : 0);
        $stInforma->bindValue(":libro", isset($datos['libro']) ? 1 : 0);
        $stInforma->bindValue(":reglamento", isset($datos['reglamento']) ? 1 : 0);
        $stInforma->bindValue(":cambio", isset($datos['cambio']) ? 1 : 0);
        $stInforma->bindValue(":ddd", isset($datos['ddd']) ? 1 : 0);
        $stInforma->bindValue(":idusuario", isset($datos['idusuario']) ? 1 : 0);
        $stInforma->bindParam(":hora", $hora);
        
        $stInforma->execute();
        
        if($stInforma){
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
