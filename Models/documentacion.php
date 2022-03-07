<?php

include 'vehiculo.php';
class Documentacion Extends Vehiculo{

    public static function insertDatos($datos) {
        $conn = Db::getConector();

        $datetime = date_create();

        $fecha = date_format($datetime, 'Y-m-d');
        $hora = date_format($datetime, 'H:i:s');

        $queryFlota = " INSERT INTO `estado_documentacion` (`ID`, `ID_EMPRESA`, `ID_VEHICULO`, `ID_USUARIO`, `FECHA`, `HORA`, `LIBRO_RECLAMACIONES`, 
        `SEGURO_VEHICULO`, `ITV`, `FICHA_TECNICA`, `TACOGRAFO`, `LIBRO_RECLAMACIONES_OBS`, `SEGURO_VEHICULO_OBS`, `ITV_OBS`, `FICHA_TECNICA_OBS`, 
        `TACOGRAFO_OBS`, `TRASPASADO`, `USUARIO`) VALUES (NULL, :ID_EMPRESA, :ID_VEHICULO, :ID_USUARIO, :FECHA, :HORA, :LIBRO_RECLAMACIONES, 
        :SEGURO_VEHICULO, :ITV, :FICHA_TECNICA, :TACOGRAFO, :LIBRO_RECLAMACIONES_OBS, :SEGURO_VEHICULO_OBS, :ITV_OBS, :FICHA_TECNICA_OBS, :TACOGRAFO_OBS, '0', :USUARIO)";

        $stFlota = $conn->prepare($queryFlota);

        $stFlota->bindParam(":ID_EMPRESA", $datos['EMPRESA']);
        $stFlota->bindParam(":ID_VEHICULO", $datos['IDVEHICULO']);
        $stFlota->bindValue(":ID_USUARIO", isset($datos['IDUSUARIO']) ? $datos['IDUSUARIO'] : 0);
        $stFlota->bindParam(":FECHA", $fecha);
        $stFlota->bindValue(":HORA", $hora);
        $stFlota->bindValue(":LIBRO_RECLAMACIONES", isset($datos['LIBRO_RECLAMACIONES']) ? $datos['LIBRO_RECLAMACIONES'] : NULL);
        $stFlota->bindValue(":SEGURO_VEHICULO", isset($datos['SEGURO_VEHICULO']) ? $datos['SEGURO_VEHICULO'] : NULL);
        $stFlota->bindValue(":ITV", isset($datos['ITV']) ? $datos['ITV'] : NULL);
        $stFlota->bindValue(":FICHA_TECNICA", isset($datos['FICHA_TECNICA']) ? $datos['FICHA_TECNICA'] : NULL);
        $stFlota->bindValue(":TACOGRAFO", (!empty($datos['TACOGRAFO'])) ? $datos['TACOGRAFO'] : NULL);
        $stFlota->bindValue(":LIBRO_RECLAMACIONES_OBS", !empty($datos['LIBRO_RECLAMACIONES_OBS']) ? $datos['LIBRO_RECLAMACIONES_OBS'] : NULL);
        $stFlota->bindValue(":SEGURO_VEHICULO_OBS", !empty($datos['SEGURO_VEHICULO_OBS']) ? $datos['SEGURO_VEHICULO_OBS'] : NULL);
        $stFlota->bindValue(":ITV_OBS", !empty($datos['ITV_OBS']) ? $datos['ITV_OBS'] : NULL);
        $stFlota->bindValue(":FICHA_TECNICA_OBS", !empty($datos['FICHA_TECNICA_OBS']) ? $datos['FICHA_TECNICA_OBS'] : NULL);
        $stFlota->bindValue(":TACOGRAFO_OBS", (!empty($datos['TACOGRAFO_OBS'])) ? $datos['TACOGRAFO_OBS'] : NULL);
        $stFlota->bindValue(":USUARIO", !empty($datos['USUARIO']) ? $datos['USUARIO'] : NULL);
        
        $stFlota->execute();
        
        if($stFlota){
            return true;
        } else {
            return false;
        }
    }

}
