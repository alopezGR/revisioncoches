<?php

include 'vehiculo.php';
class Seguridad Extends Vehiculo{

    
    public static function insertDatos($datos) {
        $conn = Db::getConector();

        $datetime = date_create();

        $fecha = date_format($datetime, 'Y-m-d');
        $hora = date_format($datetime, 'H:i:s');

        $queryFlota = " INSERT INTO `estado_seguridad` (`ID`, `ID_EMPRESA`, `ID_VEHICULO`, `ID_USUARIO`, `FECHA`, `HORA`, `EXTINTORES`, `TRIANGULOS`, 
        `CALZO`, `CHALECO`, `GUANTES`, `BOTIQUIN`, `MARTILLOS`, `CINTURONES_ASIENTOS`, `EXTINTORES_OBS`, `TRIANGULOS_OBS`, `CALZO_OBS`, `CHALECO_OBS`, 
        `GUANTES_OBS`, `BOTIQUIN_OBS`, `MARTILLOS_OBS`, `CINTURONES_ASIENTOS_OBS`, `TRASPASADO`, `USUARIO`)
         VALUES (NULL, :ID_EMPRESA, :ID_VEHICULO, :ID_USUARIO, :FECHA, :HORA, :EXTINTORES, :TRIANGULOS, :CALZO, :CHALECO, :GUANTES, :BOTIQUIN, :MARTILLOS, 
         :CINTURONES_ASIENTOS, :EXTINTORES_OBS, :TRIANGULOS_OBS, :CALZO_OBS, :CHALECO_OBS, :GUANTES_OBS, :BOTIQUIN_OBS, :MARTILLOS_OBS, :CINTURONES_ASIENTOS_OBS, '0', :USUARIO)";

        $stFlota = $conn->prepare($queryFlota);

        $stFlota->bindParam(":ID_EMPRESA", $datos['EMPRESA']);
        $stFlota->bindParam(":ID_VEHICULO", $datos['IDVEHICULO']);
        $stFlota->bindValue(":ID_USUARIO", isset($datos['IDUSUARIO']) ? $datos['IDUSUARIO'] : 0);
        $stFlota->bindParam(":FECHA", $fecha);
        $stFlota->bindValue(":HORA", $hora);
        $stFlota->bindValue(":EXTINTORES", isset($datos['EXTINTORES']) ? $datos['EXTINTORES'] : NULL);
        $stFlota->bindValue(":TRIANGULOS", isset($datos['TRIANGULOS']) ? $datos['TRIANGULOS'] : NULL);
        $stFlota->bindValue(":CALZO", isset($datos['CALZO']) ? $datos['CALZO'] : NULL);
        $stFlota->bindValue(":CHALECO", isset($datos['CHALECO']) ? $datos['CHALECO'] : NULL);
        $stFlota->bindValue(":GUANTES", (!empty($datos['GUANTES'])) ? $datos['GUANTES'] : NULL);
        $stFlota->bindValue(":BOTIQUIN", (!empty($datos['BOTIQUIN'])) ? $datos['BOTIQUIN'] : NULL);
        $stFlota->bindValue(":MARTILLOS", (!empty($datos['MARTILLOS'])) ? $datos['MARTILLOS'] : NULL);
        $stFlota->bindValue(":CINTURONES_ASIENTOS", (!empty($datos['CINTURONES_ASIENTOS'])) ? $datos['CINTURONES_ASIENTOS'] : NULL);
        $stFlota->bindValue(":EXTINTORES_OBS", !empty($datos['EXTINTORES_OBS']) ? $datos['EXTINTORES_OBS'] : NULL);
        $stFlota->bindValue(":TRIANGULOS_OBS", !empty($datos['TRIANGULOS_OBS']) ? $datos['TRIANGULOS_OBS'] : NULL);
        $stFlota->bindValue(":CALZO_OBS", !empty($datos['CALZO_OBS']) ? $datos['CALZO_OBS'] : NULL);
        $stFlota->bindValue(":CHALECO_OBS", !empty($datos['CHALECO_OBS']) ? $datos['CHALECO_OBS'] : NULL);
        $stFlota->bindValue(":GUANTES_OBS", (!empty($datos['GUANTES_OBS'])) ? $datos['GUANTES_OBS'] : NULL);
        $stFlota->bindValue(":BOTIQUIN_OBS", (!empty($datos['BOTIQUIN_OBS'])) ? $datos['BOTIQUIN_OBS'] : NULL);
        $stFlota->bindValue(":MARTILLOS_OBS", (!empty($datos['MARTILLOS_OBS'])) ? $datos['MARTILLOS_OBS'] : NULL);
        $stFlota->bindValue(":CINTURONES_ASIENTOS_OBS", (!empty($datos['CINTURONES_ASIENTOS_OBS'])) ? $datos['CINTURONES_ASIENTOS_OBS'] : NULL);
        $stFlota->bindValue(":USUARIO", !empty($datos['USUARIO']) ? $datos['USUARIO'] : NULL);
        
        $stFlota->execute();
        
        if($stFlota){
            return true;
        } else {
            return false;
        }
    }

}
