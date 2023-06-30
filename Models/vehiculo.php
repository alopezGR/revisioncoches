<?php

class Vehiculo{
    public static function getInfoVehiculo($vehiculo, $empresa) {

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
        if($empresa == 14){
            $conn = DBMurcia::getConector();
            $query = "SELECT id, IDEMPRESA, kilometros as klm, matricula FROM vehiculos WHERE NUMERO = :vehiculo and idempresa = :empresa";
        } else if ($empresa = 22){
            $conn = DBCascaisMallorca::getConector();
            $query = "SELECT * FROM vehiculo WHERE codbus = :vehiculo and idempresa = :empresa";
        }else {
            $conn = Db::getConector();
            $query = "SELECT * FROM vehiculo WHERE codbus = :vehiculo and idempresa = :empresa";
        }


        $st = $conn->prepare($query);

        $st->bindParam(":vehiculo", $vehiculo);
        $st->bindParam(":empresa", $empresa);

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

}