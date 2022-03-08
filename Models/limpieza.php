<?php

include 'vehiculo.php';
class Limpieza Extends Vehiculo{

    public static function insertDatos($datos){
        $resultado = Limpieza::insertarLimpiezaExterior($datos);
        $resultado &= Limpieza::insertarLimpiezaInterior($datos);

        if($resultado){
            return true;
        } else {
            return false;
        }
    }

    private static function insertarLimpiezaExterior($datos) {
        $conn = Db::getConector();

        $datetime = date_create();

        $fecha = date_format($datetime, 'Y-m-d');
        $hora = date_format($datetime, 'H:i:s');

        $queryFlota = " INSERT INTO `estado_limpieza_exterior` (`ID`, `ID_EMPRESA`, `ID_VEHICULO`, `ID_USUARIO`, `FECHA`, `HORA`, `CARROCERIA`, 
        `VENTANAS_LATERALES`, `PUERTAS`, `LUNAS`, `ESPEJOS_RETROVISORES`, `LUCES`, `INDICADORES`, `CARROCERIA_OBS`, `VENTANAS_LATERALES_OBS`, 
        `PUERTAS_OBS`, `LUNAS_OBS`, `ESPEJOS_RETROVISORES_OBS`, `LUCES_OBS`, `INDICADORES_OBS`, `TRASPASADO`, `USUARIO`) 
        VALUES (NULL, :ID_EMPRESA, :ID_VEHICULO, :ID_USUARIO, :FECHA, :HORA, :CARROCERIA, :VENTANAS_LATERALES, :PUERTAS, :LUNAS, :ESPEJOS_RETROVISORES, :LUCES, 
        :INDICADORES_OBS, :CARROCERIA_OBS, :VENTANAS_LATERALES_OBS, :PUERTAS_OBS, :LUNAS_OBS, :ESPEJOS_RETROVISORES_OBS, :LUCES_OBS, :INDICADORES_OBS, '0', :USUARIO)";

        $stFlota = $conn->prepare($queryFlota);

        $stFlota->bindParam(":ID_EMPRESA", $datos['EMPRESA']);
        $stFlota->bindParam(":ID_VEHICULO", $datos['IDVEHICULO']);
        $stFlota->bindValue(":ID_USUARIO", isset($datos['IDUSUARIO']) ? $datos['IDUSUARIO'] : 0);
        $stFlota->bindParam(":FECHA", $fecha);
        $stFlota->bindValue(":HORA", $hora);
        $stFlota->bindValue(":CARROCERIA", isset($datos['CARROCERIA_LE']) ? $datos['CARROCERIA_LE'] : NULL);
        $stFlota->bindValue(":VENTANAS_LATERALES", isset($datos['VENTANAS_LATERALES_LE']) ? $datos['VENTANAS_LATERALES_LE'] : NULL);
        $stFlota->bindValue(":PUERTAS", isset($datos['PUERTAS_LE']) ? $datos['PUERTAS_LE'] : NULL);
        $stFlota->bindValue(":LUNAS", isset($datos['LUNAS_LE']) ? $datos['LUNAS_LE'] : NULL);
        $stFlota->bindValue(":ESPEJOS_RETROVISORES", (!empty($datos['ESPEJOS_RETROVISORES_LE'])) ? $datos['ESPEJOS_RETROVISORES_LE'] : NULL);
        $stFlota->bindValue(":LUCES", (!empty($datos['LUCES_LE'])) ? $datos['LUCES_LE'] : NULL);
        $stFlota->bindValue(":INDICADORES", (!empty($datos['INDICADORES_LE'])) ? $datos['INDICADORES_LE'] : NULL);

        $stFlota->bindValue(":CARROCERIA_OBS", !empty($datos['CARROCERIA_LE_OBS']) ? $datos['CARROCERIA_LE_OBS'] : NULL);
        $stFlota->bindValue(":VENTANAS_LATERALES_OBS", !empty($datos['VENTANAS_LATERALES_LE_OBS']) ? $datos['VENTANAS_LATERALES_LE_OBS'] : NULL);
        $stFlota->bindValue(":PUERTAS_OBS", !empty($datos['PUERTAS_LE_OBS']) ? $datos['PUERTAS_LE_OBS'] : NULL);
        $stFlota->bindValue(":LUNAS_OBS", !empty($datos['LUNAS_LE_OBS']) ? $datos['LUNAS_LE_OBS'] : NULL);
        $stFlota->bindValue(":ESPEJOS_RETROVISORES_OBS", (!empty($datos['ESPEJOS_RETROVISORES_LE_OBS'])) ? $datos['ESPEJOS_RETROVISORES_LE_OBS'] : NULL);
        $stFlota->bindValue(":LUCES_OBS", (!empty($datos['LUCES_LE_OBS'])) ? $datos['LUCES_LE_OBS'] : NULL);
        $stFlota->bindValue(":INDICADORES_OBS", (!empty($datos['INDICADORES_LE_OBS'])) ? $datos['INDICADORES_LE_OBS'] : NULL);
        $stFlota->bindValue(":USUARIO", !empty($datos['USUARIO']) ? $datos['USUARIO'] : NULL);
        
        $stFlota->execute();
        
        if($stFlota){
            return true;
        } else {
            return false;
        }
    }

    private static function insertarLimpiezaInterior($datos) {
        $conn = Db::getConector();

        $datetime = date_create();

        $fecha = date_format($datetime, 'Y-m-d');
        $hora = date_format($datetime, 'H:i:s');

        $queryFlota = " INSERT INTO `estado_limpieza_interior` (`ID`, `ID_EMPRESA`, `ID_VEHICULO`, `ID_USUARIO`, `FECHA`, `HORA`, `SUELO`, `ROTULOS_LUMINOSOS`, 
        `PAREDES`, `PUERTAS`, `VENTANAS_LATERALES`, `ASIENTOS`, `LUMINARIAS`, `ASIDEROS_BARRAS`, `CABINA_CONDUCTOR`, `PULSADORES_PARADA`, `SALPICADERO`, 
        `SUELO_OBS`, `ROTULOS_LUMINOSOS_OBS`, `PAREDES_OBS`, `PUERTAS_OBS`, `VENTANAS_LATERALES_OBS`, `ASIENTOS_OBS`, `LUMINARIAS_OBS`, `ASIDEROS_BARRAS_OBS`, 
        `CABINA_CONDUCTOR_OBS`, `PULSADORES_PARADA_OBS`, `SALPICADERO_OBS`, `TRASPASADO`, `USUARIO`) 
        VALUES (NULL, :ID_EMPRESA, :ID_VEHICULO, :ID_USUARIO, :FECHA, :HORA, :SUELO, :ROTULOS_LUMINOSOS, :PAREDES, :PUERTAS, 
        :VENTANAS_LATERALES, :ASIENTOS, :LUMINARIAS, :ASIDEROS_BARRAS, :CABINA_CONDUCTOR, :PULSADORES_RAMPA, :SALPICADERO, 
        :SUELO_OBS, :ROTULOS_LUMINOSOS_OBS, :PAREDES_OBS, :PUERTAS_OBS, :VENTANAS_LATERALES_OBS, :ASIENTOS_OBS, :LUMINARIAS_OBS, :ASIDEROS_BARRAS_OBS, 
        :CABINA_CONDUCTOR_OBS, :PULSADORES_RAMPA_OBS, :SALPICADERO_OBS, '0', :USUARIO)";

        $stFlota = $conn->prepare($queryFlota);

        $stFlota->bindParam(":ID_EMPRESA", $datos['EMPRESA']);
        $stFlota->bindParam(":ID_VEHICULO", $datos['IDVEHICULO']);
        $stFlota->bindValue(":ID_USUARIO", isset($datos['IDUSUARIO']) ? $datos['IDUSUARIO'] : 0);
        $stFlota->bindParam(":FECHA", $fecha);
        $stFlota->bindValue(":HORA", $hora);
        $stFlota->bindValue(":SUELO", isset($datos['SUELO_LI']) ? $datos['SUELO_LI'] : NULL);
        $stFlota->bindValue(":ROTULOS_LUMINOSOS", isset($datos['ROTULOS_LUMINOSOS_LI']) ? $datos['ROTULOS_LUMINOSOS_LI'] : NULL);
        $stFlota->bindValue(":PAREDES", isset($datos['PAREDES_LI']) ? $datos['PAREDES_LI'] : NULL);
        $stFlota->bindValue(":PUERTAS", isset($datos['PUERTAS_LI']) ? $datos['PUERTAS_LI'] : NULL);
        $stFlota->bindValue(":VENTANAS_LATERALES", isset($datos['VENTANAS_LATERALES_LI']) ? $datos['VENTANAS_LATERALES_LI'] : NULL);
        $stFlota->bindValue(":ASIENTOS", isset($datos['ASIENTOS_LI']) ? $datos['ASIENTOS_LI'] : NULL);
        $stFlota->bindValue(":LUMINARIAS", isset($datos['LUMINARIAS_LI']) ? $datos['LUMINARIAS_LI'] : NULL);
        $stFlota->bindValue(":ASIDEROS_BARRAS", isset($datos['ASIDEROS_BARRAS_LI']) ? $datos['ASIDEROS_BARRAS_LI'] : NULL);
        $stFlota->bindValue(":CABINA_CONDUCTOR", isset($datos['CABINA_CONDUCTOR_LI']) ? $datos['CABINA_CONDUCTOR_LI'] : NULL);
        $stFlota->bindValue(":PULSADORES_RAMPA", isset($datos['PULSADORES_RAMPA_LI']) ? $datos['PULSADORES_RAMPA_LI'] : NULL);
        $stFlota->bindValue(":SALPICADERO", isset($datos['SALPICADERO_LI']) ? $datos['SALPICADERO_LI'] : NULL);

        $stFlota->bindValue(":SUELO_OBS", !empty($datos['SUELO_LI_OBS']) ? $datos['SUELO_LI_OBS'] : NULL);
        $stFlota->bindValue(":ROTULOS_LUMINOSOS_OBS", !empty($datos['ROTULOS_LUMINOSOS_LI_OBS']) ? $datos['ROTULOS_LUMINOSOS_LI_OBS'] : NULL);
        $stFlota->bindValue(":PAREDES_OBS", !empty($datos['PAREDES_LI_OBS']) ? $datos['PAREDES_LI_OBS'] : NULL);
        $stFlota->bindValue(":PUERTAS_OBS", !empty($datos['PUERTAS_LI_OBS']) ? $datos['PUERTAS_LI_OBS'] : NULL);
        $stFlota->bindValue(":VENTANAS_LATERALES_OBS", (!empty($datos['VENTANAS_LATERALES_LI_OBS'])) ? $datos['VENTANAS_LATERALES_LI_OBS'] : NULL);
        $stFlota->bindValue(":ASIENTOS_OBS", (!empty($datos['ASIENTOS_LI_OBS'])) ? $datos['ASIENTOS_LI_OBS'] : NULL);
        $stFlota->bindValue(":LUMINARIAS_OBS", (!empty($datos['LUMINARIAS_LI_OBS'])) ? $datos['LUMINARIAS_LI_OBS'] : NULL);
        $stFlota->bindValue(":ASIDEROS_BARRAS_OBS", (!empty($datos['ASIDEROS_BARRAS_LI_OBS'])) ? $datos['ASIDEROS_BARRAS_LI_OBS'] : NULL);
        $stFlota->bindValue(":CABINA_CONDUCTOR_OBS", (!empty($datos['CABINA_CONDUCTOR_LI_OBS'])) ? $datos['CABINA_CONDUCTOR_LI_OBS'] : NULL);
        $stFlota->bindValue(":PULSADORES_RAMPA_OBS", (!empty($datos['PULSADORES_RAMPA_LI_OBS'])) ? $datos['PULSADORES_RAMPA_LI_OBS'] : NULL);
        $stFlota->bindValue(":SALPICADERO_OBS", (!empty($datos['SALPICADERO_LI_OBS'])) ? $datos['SALPICADERO_LI_OBS'] : NULL);
        $stFlota->bindValue(":USUARIO", !empty($datos['USUARIO']) ? $datos['USUARIO'] : NULL);
        
        $stFlota->execute();
        
        if($stFlota){
            return true;
        } else {
            return false;
        }
    }

}
