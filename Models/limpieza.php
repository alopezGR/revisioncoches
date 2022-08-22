<?php

include_once 'vehiculo.php';
class Limpieza extends Vehiculo
{

    public static function actualizarDatos($datos)
    {
        $resultado = Limpieza::actualizarLimpiezaExterior($datos);
        $resultado &= Limpieza::actualizarLimpiezaInterior($datos);
        $resultado = Limpieza::actualizarConservacionExterior($datos);
        $resultado &= Limpieza::actualizarConservacionInterior($datos);

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    public static function insertDatos($datos)
    {
        $resultado = Limpieza::insertarLimpiezaExterior($datos);
        $resultado &= Limpieza::insertarLimpiezaInterior($datos);
        $resultado = Limpieza::insertarConservacionExterior($datos);
        $resultado &= Limpieza::insertarConservacionInterior($datos);

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    private static function insertarLimpiezaExterior($datos)
    {
        $conn = Db::getConector();

        $datetime = date_create();

        $fecha = date_format($datetime, 'Y-m-d');
        $hora = date_format($datetime, 'H:i:s');

        $queryFlota = " INSERT INTO `estado_limpieza_exterior` (`ID`, `ID_EMPRESA`, `ID_VEHICULO`, CODIGO_VEHICULO, `ID_USUARIO`, `FECHA`, `HORA`, `CARROCERIA`, 
        `VENTANAS_LATERALES`, `PUERTAS`, `LUNAS`, `ESPEJOS_RETROVISORES`, `LUCES`, `INDICADORES`, `CARROCERIA_OBS`, `VENTANAS_LATERALES_OBS`, 
        `PUERTAS_OBS`, `LUNAS_OBS`, `ESPEJOS_RETROVISORES_OBS`, `LUCES_OBS`, `INDICADORES_OBS`, `TRASPASADO`, `USUARIO`) 
        VALUES (NULL, :ID_EMPRESA, :ID_VEHICULO, :CODIGO_VEHICULO, :ID_USUARIO, :FECHA, :HORA, :CARROCERIA, :VENTANAS_LATERALES, :PUERTAS, :LUNAS, :ESPEJOS_RETROVISORES, :LUCES, 
        :INDICADORES, :CARROCERIA_OBS, :VENTANAS_LATERALES_OBS, :PUERTAS_OBS, :LUNAS_OBS, :ESPEJOS_RETROVISORES_OBS, :LUCES_OBS, :INDICADORES_OBS, '0', :USUARIO)";

        $stFlota = $conn->prepare($queryFlota);

        $stFlota->bindParam(":ID_EMPRESA", $datos['EMPRESA']);
        $stFlota->bindParam(":ID_VEHICULO", $datos['IDVEHICULO']);
        $stFlota->bindParam(":CODIGO_VEHICULO", $datos['CODIGO_VEHICULO']);
        $stFlota->bindValue(":ID_USUARIO", isset($datos['IDUSUARIO']) ? $datos['IDUSUARIO'] : 0);
        $stFlota->bindParam(":FECHA", $fecha);
        $stFlota->bindValue(":HORA", $hora);
        $stFlota->bindValue(":CARROCERIA", isset($datos['LIM_CARROCERIA_LE']) ? $datos['LIM_CARROCERIA_LE'] : NULL);
        $stFlota->bindValue(":VENTANAS_LATERALES", isset($datos['LIM_VENTANAS_LATERALES_LE']) ? $datos['LIM_VENTANAS_LATERALES_LE'] : NULL);
        $stFlota->bindValue(":PUERTAS", isset($datos['LIM_PUERTAS_LE']) ? $datos['LIM_PUERTAS_LE'] : NULL);
        $stFlota->bindValue(":LUNAS", isset($datos['LIM_LUNAS_LE']) ? $datos['LIM_LUNAS_LE'] : NULL);
        $stFlota->bindValue(":ESPEJOS_RETROVISORES", isset($datos['LIM_ESPEJOS_RETROVISORES_LE']) ? $datos['LIM_ESPEJOS_RETROVISORES_LE'] : NULL);
        $stFlota->bindValue(":LUCES", isset($datos['LIM_LUCES_LE']) ? $datos['LIM_LUCES_LE'] : NULL);
        $stFlota->bindValue(":INDICADORES", isset($datos['LIM_INDICADORES_LE']) ? $datos['LIM_INDICADORES_LE'] : NULL);

        $stFlota->bindValue(":CARROCERIA_OBS", !empty($datos['CARROCERIA_LE_OBS']) ? $datos['CARROCERIA_LE_OBS'] : NULL);
        $stFlota->bindValue(":VENTANAS_LATERALES_OBS", !empty($datos['VENTANAS_LATERALES_LE_OBS']) ? $datos['VENTANAS_LATERALES_LE_OBS'] : NULL);
        $stFlota->bindValue(":PUERTAS_OBS", !empty($datos['PUERTAS_LE_OBS']) ? $datos['PUERTAS_LE_OBS'] : NULL);
        $stFlota->bindValue(":LUNAS_OBS", !empty($datos['LUNAS_LE_OBS']) ? $datos['LUNAS_LE_OBS'] : NULL);
        $stFlota->bindValue(":ESPEJOS_RETROVISORES_OBS", (!empty($datos['ESPEJOS_RETROVISORES_LE_OBS'])) ? $datos['ESPEJOS_RETROVISORES_LE_OBS'] : NULL);
        $stFlota->bindValue(":LUCES_OBS", (!empty($datos['LUCES_LE_OBS'])) ? $datos['LUCES_LE_OBS'] : NULL);
        $stFlota->bindValue(":INDICADORES_OBS", (!empty($datos['INDICADORES_LE_OBS'])) ? $datos['INDICADORES_LE_OBS'] : NULL);
        $stFlota->bindValue(":USUARIO", !empty($datos['USUARIO']) ? $datos['USUARIO'] : NULL);

        $stFlota->execute();

        if ($stFlota) {
            return true;
        } else {
            return false;
        }
    }

    private static function insertarLimpiezaInterior($datos)
    {
        $conn = Db::getConector();

        $datetime = date_create();

        $fecha = date_format($datetime, 'Y-m-d');
        $hora = date_format($datetime, 'H:i:s');

        $queryFlota = " INSERT INTO `estado_limpieza_interior` (`ID`, `ID_EMPRESA`, `ID_VEHICULO`, CODIGO_VEHICULO, `ID_USUARIO`, `FECHA`, `HORA`, `SUELO`, `ROTULOS_LUMINOSOS`, 
        `PAREDES`, `PUERTAS`, `VENTANAS_LATERALES`, `ASIENTOS`, `LUMINARIAS`, `ASIDEROS_BARRAS`, `CABINA_CONDUCTOR`, `PULSADORES_PARADA`, `SALPICADERO`, 
        `SUELO_OBS`, `ROTULOS_LUMINOSOS_OBS`, `PAREDES_OBS`, `PUERTAS_OBS`, `VENTANAS_LATERALES_OBS`, `ASIENTOS_OBS`, `LUMINARIAS_OBS`, `ASIDEROS_BARRAS_OBS`, 
        `CABINA_CONDUCTOR_OBS`, `PULSADORES_PARADA_OBS`, `SALPICADERO_OBS`, `TRASPASADO`, `USUARIO`) 
        VALUES (NULL, :ID_EMPRESA, :ID_VEHICULO, :CODIGO_VEHICULO, :ID_USUARIO, :FECHA, :HORA, :SUELO, :ROTULOS_LUMINOSOS, :PAREDES, :PUERTAS, 
        :VENTANAS_LATERALES, :ASIENTOS, :LUMINARIAS, :ASIDEROS_BARRAS, :CABINA_CONDUCTOR, :PULSADORES_RAMPA, :SALPICADERO, 
        :SUELO_OBS, :ROTULOS_LUMINOSOS_OBS, :PAREDES_OBS, :PUERTAS_OBS, :VENTANAS_LATERALES_OBS, :ASIENTOS_OBS, :LUMINARIAS_OBS, :ASIDEROS_BARRAS_OBS, 
        :CABINA_CONDUCTOR_OBS, :PULSADORES_RAMPA_OBS, :SALPICADERO_OBS, '0', :USUARIO)";

        $stFlota = $conn->prepare($queryFlota);

        $stFlota->bindParam(":ID_EMPRESA", $datos['EMPRESA']);
        $stFlota->bindParam(":ID_VEHICULO", $datos['IDVEHICULO']);
        $stFlota->bindParam(":CODIGO_VEHICULO", $datos['CODIGO_VEHICULO']);
        $stFlota->bindValue(":ID_USUARIO", isset($datos['IDUSUARIO']) ? $datos['IDUSUARIO'] : 0);
        $stFlota->bindParam(":FECHA", $fecha);
        $stFlota->bindValue(":HORA", $hora);
        $stFlota->bindValue(":SUELO", isset($datos['LIM_SUELO_LI']) ? $datos['LIM_SUELO_LI'] : NULL);
        $stFlota->bindValue(":ROTULOS_LUMINOSOS", isset($datos['LIM_ROTULOS_LUMINOSOS_LI']) ? $datos['LIM_ROTULOS_LUMINOSOS_LI'] : NULL);
        $stFlota->bindValue(":PAREDES", isset($datos['LIM_PAREDES_LI']) ? $datos['LIM_PAREDES_LI'] : NULL);
        $stFlota->bindValue(":PUERTAS", isset($datos['LIM_PUERTAS_LI']) ? $datos['LIM_PUERTAS_LI'] : NULL);
        $stFlota->bindValue(":VENTANAS_LATERALES", isset($datos['LIM_VENTANAS_LATERALES_LI']) ? $datos['LIM_VENTANAS_LATERALES_LI'] : NULL);
        $stFlota->bindValue(":ASIENTOS", isset($datos['LIM_ASIENTOS_LI']) ? $datos['LIM_ASIENTOS_LI'] : NULL);
        $stFlota->bindValue(":LUMINARIAS", isset($datos['LIM_LUMINARIAS_LI']) ? $datos['LIM_LUMINARIAS_LI'] : NULL);
        $stFlota->bindValue(":ASIDEROS_BARRAS", isset($datos['LIM_ASIDEROS_BARRAS_LI']) ? $datos['LIM_ASIDEROS_BARRAS_LI'] : NULL);
        $stFlota->bindValue(":CABINA_CONDUCTOR", isset($datos['LIM_CABINA_CONDUCTOR_LI']) ? $datos['LIM_CABINA_CONDUCTOR_LI'] : NULL);
        $stFlota->bindValue(":PULSADORES_RAMPA", isset($datos['LIM_PULSADORES_RAMPA_LI']) ? $datos['LIM_PULSADORES_RAMPA_LI'] : NULL);
        $stFlota->bindValue(":SALPICADERO", isset($datos['LIM_SALPICADERO_LI']) ? $datos['LIM_SALPICADERO_LI'] : NULL);

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

        if ($stFlota) {
            return true;
        } else {
            return false;
        }
    }

    private static function insertarConservacionExterior($datos)
    {
        $conn = Db::getConector();

        $datetime = date_create();

        $fecha = date_format($datetime, 'Y-m-d');
        $hora = date_format($datetime, 'H:i:s');

        $queryFlota = " INSERT INTO `estado_conservacion_exterior` (`ID`, `ID_EMPRESA`, `ID_VEHICULO`, CODIGO_VEHICULO, `ID_USUARIO`, `FECHA`, `HORA`, `CARROCERIA`, 
        `VENTANAS_LATERALES`, `PUERTAS`, `LUNAS`, `ESPEJOS_RETROVISORES`, `LUCES`, `INDICADORES`, `CARROCERIA_OBS`, `VENTANAS_LATERALES_OBS`, 
        `PUERTAS_OBS`, `LUNAS_OBS`, `ESPEJOS_RETROVISORES_OBS`, `LUCES_OBS`, `INDICADORES_OBS`, `TRASPASADO`, `USUARIO`) 
        VALUES (NULL, :ID_EMPRESA, :ID_VEHICULO, :CODIGO_VEHICULO, :ID_USUARIO, :FECHA, :HORA, :CARROCERIA, :VENTANAS_LATERALES, :PUERTAS, :LUNAS, :ESPEJOS_RETROVISORES, :LUCES, 
        :INDICADORES, :CARROCERIA_OBS, :VENTANAS_LATERALES_OBS, :PUERTAS_OBS, :LUNAS_OBS, :ESPEJOS_RETROVISORES_OBS, :LUCES_OBS, :INDICADORES_OBS, '0', :USUARIO)";

        $stFlota = $conn->prepare($queryFlota);

        $stFlota->bindParam(":ID_EMPRESA", $datos['EMPRESA']);
        $stFlota->bindParam(":ID_VEHICULO", $datos['IDVEHICULO']);
        $stFlota->bindParam(":CODIGO_VEHICULO", $datos['CODIGO_VEHICULO']);
        $stFlota->bindValue(":ID_USUARIO", isset($datos['IDUSUARIO']) ? $datos['IDUSUARIO'] : 0);
        $stFlota->bindParam(":FECHA", $fecha);
        $stFlota->bindValue(":HORA", $hora);
        $stFlota->bindValue(":CARROCERIA", isset($datos['CON_CARROCERIA_LE']) ? $datos['CON_CARROCERIA_LE'] : NULL);
        $stFlota->bindValue(":VENTANAS_LATERALES", isset($datos['CON_VENTANAS_LATERALES_LE']) ? $datos['CON_VENTANAS_LATERALES_LE'] : NULL);
        $stFlota->bindValue(":PUERTAS", isset($datos['CON_PUERTAS_LE']) ? $datos['CON_PUERTAS_LE'] : NULL);
        $stFlota->bindValue(":LUNAS", isset($datos['CON_LUNAS_LE']) ? $datos['CON_LUNAS_LE'] : NULL);
        $stFlota->bindValue(":ESPEJOS_RETROVISORES", isset($datos['CON_ESPEJOS_RETROVISORES_LE']) ? $datos['CON_ESPEJOS_RETROVISORES_LE'] : NULL);
        $stFlota->bindValue(":LUCES", isset($datos['CON_LUCES_LE']) ? $datos['CON_LUCES_LE'] : NULL);
        $stFlota->bindValue(":INDICADORES", isset($datos['CON_INDICADORES_LE']) ? $datos['CON_INDICADORES_LE'] : NULL);

        $stFlota->bindValue(":CARROCERIA_OBS", !empty($datos['CARROCERIA_LE_OBS']) ? $datos['CARROCERIA_LE_OBS'] : NULL);
        $stFlota->bindValue(":VENTANAS_LATERALES_OBS", !empty($datos['VENTANAS_LATERALES_LE_OBS']) ? $datos['VENTANAS_LATERALES_LE_OBS'] : NULL);
        $stFlota->bindValue(":PUERTAS_OBS", !empty($datos['PUERTAS_LE_OBS']) ? $datos['PUERTAS_LE_OBS'] : NULL);
        $stFlota->bindValue(":LUNAS_OBS", !empty($datos['LUNAS_LE_OBS']) ? $datos['LUNAS_LE_OBS'] : NULL);
        $stFlota->bindValue(":ESPEJOS_RETROVISORES_OBS", (!empty($datos['ESPEJOS_RETROVISORES_LE_OBS'])) ? $datos['ESPEJOS_RETROVISORES_LE_OBS'] : NULL);
        $stFlota->bindValue(":LUCES_OBS", (!empty($datos['LUCES_LE_OBS'])) ? $datos['LUCES_LE_OBS'] : NULL);
        $stFlota->bindValue(":INDICADORES_OBS", (!empty($datos['INDICADORES_LE_OBS'])) ? $datos['INDICADORES_LE_OBS'] : NULL);
        $stFlota->bindValue(":USUARIO", !empty($datos['USUARIO']) ? $datos['USUARIO'] : NULL);

        $stFlota->execute();

        if ($stFlota) {
            return true;
        } else {
            return false;
        }
    }

    private static function insertarConservacionInterior($datos)
    {
        $conn = Db::getConector();

        $datetime = date_create();

        $fecha = date_format($datetime, 'Y-m-d');
        $hora = date_format($datetime, 'H:i:s');

        $queryFlota = " INSERT INTO `estado_conservacion_interior` (`ID`, `ID_EMPRESA`, `ID_VEHICULO`, CODIGO_VEHICULO, `ID_USUARIO`, `FECHA`, `HORA`, `SUELO`, `ROTULOS_LUMINOSOS`, 
        `PAREDES`, `PUERTAS`, `VENTANAS_LATERALES`, `ASIENTOS`, `LUMINARIAS`, `ASIDEROS_BARRAS`, `CABINA_CONDUCTOR`, `PULSADORES_PARADA`, `SALPICADERO`, 
        `SUELO_OBS`, `ROTULOS_LUMINOSOS_OBS`, `PAREDES_OBS`, `PUERTAS_OBS`, `VENTANAS_LATERALES_OBS`, `ASIENTOS_OBS`, `LUMINARIAS_OBS`, `ASIDEROS_BARRAS_OBS`, 
        `CABINA_CONDUCTOR_OBS`, `PULSADORES_PARADA_OBS`, `SALPICADERO_OBS`, `TRASPASADO`, `USUARIO`) 
        VALUES (NULL, :ID_EMPRESA, :ID_VEHICULO, :CODIGO_VEHICULO, :ID_USUARIO, :FECHA, :HORA, :SUELO, :ROTULOS_LUMINOSOS, :PAREDES, :PUERTAS, 
        :VENTANAS_LATERALES, :ASIENTOS, :LUMINARIAS, :ASIDEROS_BARRAS, :CABINA_CONDUCTOR, :PULSADORES_RAMPA, :SALPICADERO, 
        :SUELO_OBS, :ROTULOS_LUMINOSOS_OBS, :PAREDES_OBS, :PUERTAS_OBS, :VENTANAS_LATERALES_OBS, :ASIENTOS_OBS, :LUMINARIAS_OBS, :ASIDEROS_BARRAS_OBS, 
        :CABINA_CONDUCTOR_OBS, :PULSADORES_RAMPA_OBS, :SALPICADERO_OBS, '0', :USUARIO)";

        $stFlota = $conn->prepare($queryFlota);

        $stFlota->bindParam(":ID_EMPRESA", $datos['EMPRESA']);
        $stFlota->bindParam(":ID_VEHICULO", $datos['IDVEHICULO']);
        $stFlota->bindParam(":CODIGO_VEHICULO", $datos['CODIGO_VEHICULO']);
        $stFlota->bindValue(":ID_USUARIO", isset($datos['IDUSUARIO']) ? $datos['IDUSUARIO'] : 0);
        $stFlota->bindParam(":FECHA", $fecha);
        $stFlota->bindValue(":HORA", $hora);
        $stFlota->bindValue(":SUELO", isset($datos['CON_SUELO_LI']) ? $datos['CON_SUELO_LI'] : NULL);
        $stFlota->bindValue(":ROTULOS_LUMINOSOS", isset($datos['CON_ROTULOS_LUMINOSOS_LI']) ? $datos['CON_ROTULOS_LUMINOSOS_LI'] : NULL);
        $stFlota->bindValue(":PAREDES", isset($datos['CON_PAREDES_LI']) ? $datos['CON_PAREDES_LI'] : NULL);
        $stFlota->bindValue(":PUERTAS", isset($datos['CON_PUERTAS_LI']) ? $datos['CON_PUERTAS_LI'] : NULL);
        $stFlota->bindValue(":VENTANAS_LATERALES", isset($datos['CON_VENTANAS_LATERALES_LI']) ? $datos['CON_VENTANAS_LATERALES_LI'] : NULL);
        $stFlota->bindValue(":ASIENTOS", isset($datos['CON_ASIENTOS_LI']) ? $datos['CON_ASIENTOS_LI'] : NULL);
        $stFlota->bindValue(":LUMINARIAS", isset($datos['CON_LUMINARIAS_LI']) ? $datos['CON_LUMINARIAS_LI'] : NULL);
        $stFlota->bindValue(":ASIDEROS_BARRAS", isset($datos['CON_ASIDEROS_BARRAS_LI']) ? $datos['CON_ASIDEROS_BARRAS_LI'] : NULL);
        $stFlota->bindValue(":CABINA_CONDUCTOR", isset($datos['CON_CABINA_CONDUCTOR_LI']) ? $datos['CON_CABINA_CONDUCTOR_LI'] : NULL);
        $stFlota->bindValue(":PULSADORES_RAMPA", isset($datos['CON_PULSADORES_RAMPA_LI']) ? $datos['CON_PULSADORES_RAMPA_LI'] : NULL);
        $stFlota->bindValue(":SALPICADERO", isset($datos['CON_SALPICADERO_LI']) ? $datos['CON_SALPICADERO_LI'] : NULL);

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

        if ($stFlota) {
            return true;
        } else {
            return false;
        }
    }

    private static function actualizarLimpiezaExterior($datos)
    {
        $conn = Db::getConector();

        $datetime = date_create();

        $fecha = date_format($datetime, 'Y-m-d');
        $hora = date_format($datetime, 'H:i:s');

        $queryFlota = "UPDATE `estado_limpieza_exterior` SET `FECHA` = :FECHA, `HORA` = :HORA, `CARROCERIA` = :CARROCERIA, 
        `VENTANAS_LATERALES` = :VENTANAS_LATERALES, `PUERTAS` = :PUERTAS, `LUNAS` = :LUNAS, `ESPEJOS_RETROVISORES` = :ESPEJOS_RETROVISORES, `LUCES` = :LUCES, 
        `INDICADORES` = :INDICADORES, `CARROCERIA_OBS` = :CARROCERIA_OBS, `VENTANAS_LATERALES_OBS` = :VENTANAS_LATERALES_OBS, `PUERTAS_OBS` = :PUERTAS_OBS, 
        `LUNAS_OBS` = :LUNAS_OBS, `ESPEJOS_RETROVISORES_OBS` = :ESPEJOS_RETROVISORES_OBS, `LUCES_OBS` = :LUCES_OBS, `INDICADORES_OBS` = :INDICADORES_OBS, 
        `TRASPASADO` = 0, `USUARIO` = :USUARIO WHERE ID = {$datos['IDRLE']}";

        $stFlota = $conn->prepare($queryFlota);

        $stFlota->bindValue(":FECHA", $fecha);
        $stFlota->bindValue(":HORA", $hora);
        $stFlota->bindValue(":CARROCERIA", isset($datos['LIM_CARROCERIA_LE']) ? $datos['LIM_CARROCERIA_LE'] : NULL);
        $stFlota->bindValue(":VENTANAS_LATERALES", isset($datos['LIM_VENTANAS_LATERALES_LE']) ? $datos['LIM_VENTANAS_LATERALES_LE'] : NULL);
        $stFlota->bindValue(":PUERTAS", isset($datos['LIM_PUERTAS_LE']) ? $datos['LIM_PUERTAS_LE'] : NULL);
        $stFlota->bindValue(":LUNAS", isset($datos['LIM_LUNAS_LE']) ? $datos['LIM_LUNAS_LE'] : NULL);
        $stFlota->bindValue(":ESPEJOS_RETROVISORES", isset($datos['LIM_ESPEJOS_RETROVISORES_LE']) ? $datos['LIM_ESPEJOS_RETROVISORES_LE'] : NULL);
        $stFlota->bindValue(":LUCES", isset($datos['LIM_LUCES_LE']) ? $datos['LIM_LUCES_LE'] : NULL);
        $stFlota->bindValue(":INDICADORES", isset($datos['LIM_INDICADORES_LE']) ? $datos['LIM_INDICADORES_LE'] : NULL);

        $stFlota->bindValue(":CARROCERIA_OBS", !empty($datos['CARROCERIA_LE_OBS']) ? $datos['CARROCERIA_LE_OBS'] : NULL);
        $stFlota->bindValue(":VENTANAS_LATERALES_OBS", !empty($datos['VENTANAS_LATERALES_LE_OBS']) ? $datos['VENTANAS_LATERALES_LE_OBS'] : NULL);
        $stFlota->bindValue(":PUERTAS_OBS", !empty($datos['PUERTAS_LE_OBS']) ? $datos['PUERTAS_LE_OBS'] : NULL);
        $stFlota->bindValue(":LUNAS_OBS", !empty($datos['LUNAS_LE_OBS']) ? $datos['LUNAS_LE_OBS'] : NULL);
        $stFlota->bindValue(":ESPEJOS_RETROVISORES_OBS", (!empty($datos['ESPEJOS_RETROVISORES_LE_OBS'])) ? $datos['ESPEJOS_RETROVISORES_LE_OBS'] : NULL);
        $stFlota->bindValue(":LUCES_OBS", (!empty($datos['LUCES_LE_OBS'])) ? $datos['LUCES_LE_OBS'] : NULL);
        $stFlota->bindValue(":INDICADORES_OBS", (!empty($datos['INDICADORES_LE_OBS'])) ? $datos['INDICADORES_LE_OBS'] : NULL);
        $stFlota->bindValue(":USUARIO", !empty($datos['USUARIO']) ? $datos['USUARIO'] : NULL);

        $stFlota->execute();

        if ($stFlota) {
            return true;
        } else {
            return false;
        }
    }

    private static function actualizarLimpiezaInterior($datos)
    {
        $conn = Db::getConector();

        $datetime = date_create();

        $fecha = date_format($datetime, 'Y-m-d');
        $hora = date_format($datetime, 'H:i:s');

        $queryFlota = "UPDATE `estado_limpieza_interior` SET `FECHA` = :FECHA, `HORA` = :HORA, `SUELO` = :SUELO, `ROTULOS_LUMINOSOS` = :ROTULOS_LUMINOSOS, 
        `PAREDES` = :PAREDES, `PUERTAS` = :PUERTAS, `VENTANAS_LATERALES` = :VENTANAS_LATERALES, `ASIENTOS` = :ASIENTOS, `LUMINARIAS` = :LUMINARIAS, 
        `ASIDEROS_BARRAS` = :ASIDEROS_BARRAS, `CABINA_CONDUCTOR` = :CABINA_CONDUCTOR, `PULSADORES_PARADA` = :PULSADORES_PARADA, `SALPICADERO` = :SALPICADERO, 
        `SUELO_OBS` = :SUELO_OBS, `ROTULOS_LUMINOSOS_OBS` = :ROTULOS_LUMINOSOS_OBS, `PAREDES_OBS` = :PAREDES_OBS, `PUERTAS_OBS` = :PUERTAS_OBS, 
        `VENTANAS_LATERALES_OBS` = :VENTANAS_LATERALES_OBS, `ASIENTOS_OBS` = :ASIENTOS_OBS, `LUMINARIAS_OBS` = :LUMINARIAS_OBS, `ASIDEROS_BARRAS_OBS` = :ASIDEROS_BARRAS_OBS, 
        `CABINA_CONDUCTOR_OBS` = :CABINA_CONDUCTOR_OBS, `PULSADORES_PARADA_OBS` = :PULSADORES_PARADA_OBS, `SALPICADERO_OBS` = :SALPICADERO_OBS, 
        `TRASPASADO` = 0, `USUARIO` = :USUARIO WHERE ID = {$datos['IDRLI']}";

        $stFlota = $conn->prepare($queryFlota);

        $stFlota->bindValue(":FECHA", $fecha);
        $stFlota->bindValue(":HORA", $hora);
        $stFlota->bindValue(":SUELO", isset($datos['LIM_SUELO_LI']) ? $datos['LIM_SUELO_LI'] : NULL);
        $stFlota->bindValue(":ROTULOS_LUMINOSOS", isset($datos['LIM_ROTULOS_LUMINOSOS_LI']) ? $datos['LIM_ROTULOS_LUMINOSOS_LI'] : NULL);
        $stFlota->bindValue(":PAREDES", isset($datos['LIM_PAREDES_LI']) ? $datos['LIM_PAREDES_LI'] : NULL);
        $stFlota->bindValue(":PUERTAS", isset($datos['LIM_PUERTAS_LI']) ? $datos['LIM_PUERTAS_LI'] : NULL);
        $stFlota->bindValue(":VENTANAS_LATERALES", isset($datos['LIM_VENTANAS_LATERALES_LI']) ? $datos['LIM_VENTANAS_LATERALES_LI'] : NULL);
        $stFlota->bindValue(":ASIENTOS", isset($datos['LIM_ASIENTOS_LI']) ? $datos['LIM_ASIENTOS_LI'] : NULL);
        $stFlota->bindValue(":LUMINARIAS", isset($datos['LIM_LUMINARIAS_LI']) ? $datos['LIM_LUMINARIAS_LI'] : NULL);
        $stFlota->bindValue(":ASIDEROS_BARRAS", isset($datos['LIM_ASIDEROS_BARRAS_LI']) ? $datos['LIM_ASIDEROS_BARRAS_LI'] : NULL);
        $stFlota->bindValue(":CABINA_CONDUCTOR", isset($datos['LIM_CABINA_CONDUCTOR_LI']) ? $datos['LIM_CABINA_CONDUCTOR_LI'] : NULL);
        $stFlota->bindValue(":PULSADORES_PARADA", isset($datos['LIM_PULSADORES_RAMPA_LI']) ? $datos['LIM_PULSADORES_RAMPA_LI'] : NULL);
        $stFlota->bindValue(":SALPICADERO", isset($datos['LIM_SALPICADERO_LI']) ? $datos['LIM_SALPICADERO_LI'] : NULL);

        $stFlota->bindValue(":SUELO_OBS", !empty($datos['SUELO_LI_OBS']) ? $datos['SUELO_LI_OBS'] : NULL);
        $stFlota->bindValue(":ROTULOS_LUMINOSOS_OBS", !empty($datos['ROTULOS_LUMINOSOS_LI_OBS']) ? $datos['ROTULOS_LUMINOSOS_LI_OBS'] : NULL);
        $stFlota->bindValue(":PAREDES_OBS", !empty($datos['PAREDES_LI_OBS']) ? $datos['PAREDES_LI_OBS'] : NULL);
        $stFlota->bindValue(":PUERTAS_OBS", !empty($datos['PUERTAS_LI_OBS']) ? $datos['PUERTAS_LI_OBS'] : NULL);
        $stFlota->bindValue(":VENTANAS_LATERALES_OBS", (!empty($datos['VENTANAS_LATERALES_LI_OBS'])) ? $datos['VENTANAS_LATERALES_LI_OBS'] : NULL);
        $stFlota->bindValue(":ASIENTOS_OBS", (!empty($datos['ASIENTOS_LI_OBS'])) ? $datos['ASIENTOS_LI_OBS'] : NULL);
        $stFlota->bindValue(":LUMINARIAS_OBS", (!empty($datos['LUMINARIAS_LI_OBS'])) ? $datos['LUMINARIAS_LI_OBS'] : NULL);
        $stFlota->bindValue(":ASIDEROS_BARRAS_OBS", (!empty($datos['ASIDEROS_BARRAS_LI_OBS'])) ? $datos['ASIDEROS_BARRAS_LI_OBS'] : NULL);
        $stFlota->bindValue(":CABINA_CONDUCTOR_OBS", (!empty($datos['CABINA_CONDUCTOR_LI_OBS'])) ? $datos['CABINA_CONDUCTOR_LI_OBS'] : NULL);
        $stFlota->bindValue(":PULSADORES_PARADA_OBS", (!empty($datos['PULSADORES_RAMPA_LI_OBS'])) ? $datos['PULSADORES_RAMPA_LI_OBS'] : NULL);
        $stFlota->bindValue(":SALPICADERO_OBS", (!empty($datos['SALPICADERO_LI_OBS'])) ? $datos['SALPICADERO_LI_OBS'] : NULL);
        $stFlota->bindValue(":USUARIO", !empty($datos['USUARIO']) ? $datos['USUARIO'] : NULL);

        $stFlota->execute();

        if ($stFlota) {
            return true;
        } else {
            return false;
        }
    }

    private static function actualizarConservacionExterior($datos)
    {
        $conn = Db::getConector();

        $datetime = date_create();

        $fecha = date_format($datetime, 'Y-m-d');
        $hora = date_format($datetime, 'H:i:s');

        $queryFlota = "UPDATE `estado_conservacion_exterior`SET `FECHA` = :FECHA, `HORA` = :HORA, `CARROCERIA` = :CARROCERIA, 
        `VENTANAS_LATERALES` = :VENTANAS_LATERALES, `PUERTAS` = :PUERTAS, `LUNAS` = :LUNAS, `ESPEJOS_RETROVISORES` = :ESPEJOS_RETROVISORES, `LUCES` = :LUCES, 
        `INDICADORES` = :INDICADORES, `CARROCERIA_OBS` = :CARROCERIA_OBS, `VENTANAS_LATERALES_OBS` = :VENTANAS_LATERALES_OBS, 
        `PUERTAS_OBS` = :PUERTAS_OBS, `LUNAS_OBS` = :LUNAS_OBS, `ESPEJOS_RETROVISORES_OBS` = :ESPEJOS_RETROVISORES_OBS, `LUCES_OBS` = :LUCES_OBS, 
        `INDICADORES_OBS` = :INDICADORES_OBS, `TRASPASADO` = 0, `USUARIO` = :USUARIO WHERE ID = {$datos['IDRCE']}";

        $stFlota = $conn->prepare($queryFlota);

        $stFlota->bindValue(":FECHA", $fecha);
        $stFlota->bindValue(":HORA", $hora);
        $stFlota->bindValue(":CARROCERIA", isset($datos['CON_CARROCERIA_LE']) ? $datos['CON_CARROCERIA_LE'] : NULL);
        $stFlota->bindValue(":VENTANAS_LATERALES", isset($datos['CON_VENTANAS_LATERALES_LE']) ? $datos['CON_VENTANAS_LATERALES_LE'] : NULL);
        $stFlota->bindValue(":PUERTAS", isset($datos['CON_PUERTAS_LE']) ? $datos['CON_PUERTAS_LE'] : NULL);
        $stFlota->bindValue(":LUNAS", isset($datos['CON_LUNAS_LE']) ? $datos['CON_LUNAS_LE'] : NULL);
        $stFlota->bindValue(":ESPEJOS_RETROVISORES", isset($datos['CON_ESPEJOS_RETROVISORES_LE']) ? $datos['CON_ESPEJOS_RETROVISORES_LE'] : NULL);
        $stFlota->bindValue(":LUCES", isset($datos['CON_LUCES_LE']) ? $datos['CON_LUCES_LE'] : NULL);
        $stFlota->bindValue(":INDICADORES", isset($datos['CON_INDICADORES_LE']) ? $datos['CON_INDICADORES_LE'] : NULL);

        $stFlota->bindValue(":CARROCERIA_OBS", !empty($datos['CARROCERIA_LE_OBS']) ? $datos['CARROCERIA_LE_OBS'] : NULL);
        $stFlota->bindValue(":VENTANAS_LATERALES_OBS", !empty($datos['VENTANAS_LATERALES_LE_OBS']) ? $datos['VENTANAS_LATERALES_LE_OBS'] : NULL);
        $stFlota->bindValue(":PUERTAS_OBS", !empty($datos['PUERTAS_LE_OBS']) ? $datos['PUERTAS_LE_OBS'] : NULL);
        $stFlota->bindValue(":LUNAS_OBS", !empty($datos['LUNAS_LE_OBS']) ? $datos['LUNAS_LE_OBS'] : NULL);
        $stFlota->bindValue(":ESPEJOS_RETROVISORES_OBS", (!empty($datos['ESPEJOS_RETROVISORES_LE_OBS'])) ? $datos['ESPEJOS_RETROVISORES_LE_OBS'] : NULL);
        $stFlota->bindValue(":LUCES_OBS", (!empty($datos['LUCES_LE_OBS'])) ? $datos['LUCES_LE_OBS'] : NULL);
        $stFlota->bindValue(":INDICADORES_OBS", (!empty($datos['INDICADORES_LE_OBS'])) ? $datos['INDICADORES_LE_OBS'] : NULL);
        $stFlota->bindValue(":USUARIO", !empty($datos['USUARIO']) ? $datos['USUARIO'] : NULL);

        $stFlota->execute();

        if ($stFlota) {
            return true;
        } else {
            return false;
        }
    }

    private static function actualizarConservacionInterior($datos)
    {
        $conn = Db::getConector();

        $datetime = date_create();

        $fecha = date_format($datetime, 'Y-m-d');
        $hora = date_format($datetime, 'H:i:s');

        $queryFlota = "UPDATE `estado_conservacion_interior`SET `FECHA` = :FECHA, `HORA` = :HORA, `SUELO` = :SUELO, `ROTULOS_LUMINOSOS` = :ROTULOS_LUMINOSOS, 
        `PAREDES` = :PAREDES, `PUERTAS` = :PUERTAS, `VENTANAS_LATERALES` = :VENTANAS_LATERALES, `ASIENTOS` = :ASIENTOS, `LUMINARIAS` = :LUMINARIAS, 
        `ASIDEROS_BARRAS` = :ASIDEROS_BARRAS, `CABINA_CONDUCTOR` = :CABINA_CONDUCTOR, `PULSADORES_PARADA` = :PULSADORES_PARADA, `SALPICADERO` = :SALPICADERO, 
        `SUELO_OBS` = :SUELO_OBS, `ROTULOS_LUMINOSOS_OBS` = :ROTULOS_LUMINOSOS_OBS, `PAREDES_OBS` = :PAREDES_OBS, `PUERTAS_OBS` = :PUERTAS_OBS, 
        `VENTANAS_LATERALES_OBS` = :VENTANAS_LATERALES_OBS, `ASIENTOS_OBS` = :ASIENTOS_OBS, `LUMINARIAS_OBS` = :LUMINARIAS_OBS, `ASIDEROS_BARRAS_OBS` = :ASIDEROS_BARRAS_OBS, 
        `CABINA_CONDUCTOR_OBS` = :CABINA_CONDUCTOR_OBS, `PULSADORES_PARADA_OBS` = :PULSADORES_PARADA_OBS, `SALPICADERO_OBS` = :SALPICADERO_OBS, 
        `TRASPASADO` = 0, `USUARIO` = :USUARIO WHERE ID = {$datos['IDRCI']}";

        $stFlota = $conn->prepare($queryFlota);

        $stFlota->bindValue(":FECHA", $fecha);
        $stFlota->bindValue(":HORA", $hora);
        $stFlota->bindValue(":SUELO", isset($datos['CON_SUELO_LI']) ? $datos['CON_SUELO_LI'] : NULL);
        $stFlota->bindValue(":ROTULOS_LUMINOSOS", isset($datos['CON_ROTULOS_LUMINOSOS_LI']) ? $datos['CON_ROTULOS_LUMINOSOS_LI'] : NULL);
        $stFlota->bindValue(":PAREDES", isset($datos['CON_PAREDES_LI']) ? $datos['CON_PAREDES_LI'] : NULL);
        $stFlota->bindValue(":PUERTAS", isset($datos['CON_PUERTAS_LI']) ? $datos['CON_PUERTAS_LI'] : NULL);
        $stFlota->bindValue(":VENTANAS_LATERALES", isset($datos['CON_VENTANAS_LATERALES_LI']) ? $datos['CON_VENTANAS_LATERALES_LI'] : NULL);
        $stFlota->bindValue(":ASIENTOS", isset($datos['CON_ASIENTOS_LI']) ? $datos['CON_ASIENTOS_LI'] : NULL);
        $stFlota->bindValue(":LUMINARIAS", isset($datos['CON_LUMINARIAS_LI']) ? $datos['CON_LUMINARIAS_LI'] : NULL);
        $stFlota->bindValue(":ASIDEROS_BARRAS", isset($datos['CON_ASIDEROS_BARRAS_LI']) ? $datos['CON_ASIDEROS_BARRAS_LI'] : NULL);
        $stFlota->bindValue(":CABINA_CONDUCTOR", isset($datos['CON_CABINA_CONDUCTOR_LI']) ? $datos['CON_CABINA_CONDUCTOR_LI'] : NULL);
        $stFlota->bindValue(":PULSADORES_PARADA", isset($datos['CON_PULSADORES_RAMPA_LI']) ? $datos['CON_PULSADORES_RAMPA_LI'] : NULL);
        $stFlota->bindValue(":SALPICADERO", isset($datos['CON_SALPICADERO_LI']) ? $datos['CON_SALPICADERO_LI'] : NULL);

        $stFlota->bindValue(":SUELO_OBS", !empty($datos['SUELO_LI_OBS']) ? $datos['SUELO_LI_OBS'] : NULL);
        $stFlota->bindValue(":ROTULOS_LUMINOSOS_OBS", !empty($datos['ROTULOS_LUMINOSOS_LI_OBS']) ? $datos['ROTULOS_LUMINOSOS_LI_OBS'] : NULL);
        $stFlota->bindValue(":PAREDES_OBS", !empty($datos['PAREDES_LI_OBS']) ? $datos['PAREDES_LI_OBS'] : NULL);
        $stFlota->bindValue(":PUERTAS_OBS", !empty($datos['PUERTAS_LI_OBS']) ? $datos['PUERTAS_LI_OBS'] : NULL);
        $stFlota->bindValue(":VENTANAS_LATERALES_OBS", (!empty($datos['VENTANAS_LATERALES_LI_OBS'])) ? $datos['VENTANAS_LATERALES_LI_OBS'] : NULL);
        $stFlota->bindValue(":ASIENTOS_OBS", (!empty($datos['ASIENTOS_LI_OBS'])) ? $datos['ASIENTOS_LI_OBS'] : NULL);
        $stFlota->bindValue(":LUMINARIAS_OBS", (!empty($datos['LUMINARIAS_LI_OBS'])) ? $datos['LUMINARIAS_LI_OBS'] : NULL);
        $stFlota->bindValue(":ASIDEROS_BARRAS_OBS", (!empty($datos['ASIDEROS_BARRAS_LI_OBS'])) ? $datos['ASIDEROS_BARRAS_LI_OBS'] : NULL);
        $stFlota->bindValue(":CABINA_CONDUCTOR_OBS", (!empty($datos['CABINA_CONDUCTOR_LI_OBS'])) ? $datos['CABINA_CONDUCTOR_LI_OBS'] : NULL);
        $stFlota->bindValue(":PULSADORES_PARADA_OBS", (!empty($datos['PULSADORES_RAMPA_LI_OBS'])) ? $datos['PULSADORES_RAMPA_LI_OBS'] : NULL);
        $stFlota->bindValue(":SALPICADERO_OBS", (!empty($datos['SALPICADERO_LI_OBS'])) ? $datos['SALPICADERO_LI_OBS'] : NULL);
        $stFlota->bindValue(":USUARIO", !empty($datos['USUARIO']) ? $datos['USUARIO'] : NULL);

        $stFlota->execute();

        if ($stFlota) {
            return true;
        } else {
            return false;
        }
    }

    public static function obtenerLimpiezaExteriorFecha($fechaInicio, $fechaFin, $empresa)
    {
        $conn = Db::getConector();

        $query = "SELECT * FROM estado_limpieza_exterior WHERE fecha between '$fechaInicio' and '$fechaFin' and ID_EMPRESA = $empresa ORDER BY fecha, hora";

        $st = $conn->prepare($query);

        $st->execute();

        if ($st) {
            return $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public static function obtenerLimpiezaInteriorFecha($fechaInicio, $fechaFin, $empresa)
    {
        $conn = Db::getConector();

        $query = "SELECT * FROM estado_limpieza_interior WHERE fecha between '$fechaInicio' and '$fechaFin' and ID_EMPRESA = $empresa ORDER BY fecha, hora";

        $st = $conn->prepare($query);

        $st->execute();

        if ($st) {
            return $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public static function obtenerConservacionExteriorFecha($fechaInicio, $fechaFin, $empresa)
    {
        $conn = Db::getConector();

        $query = "SELECT * FROM estado_limpieza_exterior WHERE fecha between '$fechaInicio' and '$fechaFin' and ID_EMPRESA = $empresa ORDER BY fecha, hora";

        $st = $conn->prepare($query);

        $st->execute();

        if ($st) {
            return $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public static function obtenerConservacionInteriorFecha($fechaInicio, $fechaFin, $empresa)
    {
        $conn = Db::getConector();

        $query = "SELECT * FROM estado_limpieza_interior WHERE fecha between '$fechaInicio' and '$fechaFin' and ID_EMPRESA = $empresa ORDER BY fecha, hora";

        $st = $conn->prepare($query);

        $st->execute();

        if ($st) {
            return $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    
    public static function obtenerUltimaRevisionLI()
    {
        $conn = Db::getConector();

        $query = "SELECT * FROM estado_limpieza_interior order by fecha desc limit 1";

        $st = $conn->prepare($query);

        $st->execute();

        if ($st) {
            return $st->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
    
    public static function obtenerUltimaRevisionLE()
    {
        $conn = Db::getConector();

        $query = "SELECT * FROM estado_limpieza_exterior order by fecha desc limit 1";

        $st = $conn->prepare($query);

        $st->execute();

        if ($st) {
            return $st->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
    
    public static function obtenerUltimaRevisionCI()
    {
        $conn = Db::getConector();

        $query = "SELECT * FROM estado_conservacion_interior order by fecha desc limit 1";

        $st = $conn->prepare($query);

        $st->execute();

        if ($st) {
            return $st->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
    
    public static function obtenerUltimaRevisionCE()
    {
        $conn = Db::getConector();

        $query = "SELECT * FROM estado_conservacion_exterior order by fecha desc limit 1";

        $st = $conn->prepare($query);

        $st->execute();

        if ($st) {
            return $st->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public static function comprobarRevisionLI($idRevision)
    {
        $conn = Db::getConector();

        $query = "SELECT `SUELO`, `ROTULOS_LUMINOSOS`, `PAREDES`, `PUERTAS`, `VENTANAS_LATERALES`, `ASIENTOS`, `LUMINARIAS`, `ASIDEROS_BARRAS`, 
        `CABINA_CONDUCTOR`, `PULSADORES_PARADA`, `SALPICADERO` FROM estado_limpieza_interior WHERE id = $idRevision";

        $st = $conn->prepare($query);

        $st->execute();

        if ($st) {
            $revision = $st->fetch(PDO::FETCH_ASSOC);

            $correcto = true;

            foreach ($revision as $value) {
                if ($value != 1) {
                    $correcto = false;
                }
            }
            return $correcto;
        } else {
            return false;
        }
    }

    public static function comprobarRevisionLE($idRevision)
    {
        $conn = Db::getConector();

        $query = "SELECT `CARROCERIA`, `VENTANAS_LATERALES`, `PUERTAS`, `LUNAS`, `ESPEJOS_RETROVISORES`, `LUCES`, `INDICADORES` 
        FROM estado_limpieza_exterior WHERE id = $idRevision";

        $st = $conn->prepare($query);

        $st->execute();

        if ($st) {
            $revision = $st->fetch(PDO::FETCH_ASSOC);

            $correcto = true;

            foreach ($revision as $value) {
                if ($value != 1) {
                    $correcto = false;
                }
            }
            return $correcto;
        } else {
            return false;
        }
    }

    public static function comprobarRevisionCI($idRevision)
    {
        $conn = Db::getConector();

        $query = "SELECT `SUELO`, `ROTULOS_LUMINOSOS`, `PAREDES`, `PUERTAS`, `VENTANAS_LATERALES`, `ASIENTOS`, `LUMINARIAS`, `ASIDEROS_BARRAS`, 
        `CABINA_CONDUCTOR`, `PULSADORES_PARADA`, `SALPICADERO` FROM estado_conservacion_interior WHERE id = $idRevision";

        $st = $conn->prepare($query);

        $st->execute();

        if ($st) {
            $revision = $st->fetch(PDO::FETCH_ASSOC);

            $correcto = true;

            foreach ($revision as $value) {
                if ($value != 1) {
                    $correcto = false;
                }
            }
            return $correcto;
        } else {
            return false;
        }
    }

    public static function comprobarRevisionCE($idRevision)
    {
        $conn = Db::getConector();

        $query = "SELECT `CARROCERIA`, `VENTANAS_LATERALES`, `PUERTAS`, `LUNAS`, `ESPEJOS_RETROVISORES`, `LUCES`, `INDICADORES` 
        FROM estado_conservacion_exterior WHERE id = $idRevision";

        $st = $conn->prepare($query);

        $st->execute();

        if ($st) {
            $revision = $st->fetch(PDO::FETCH_ASSOC);

            $correcto = true;

            foreach ($revision as $value) {
                if ($value != 1) {
                    $correcto = false;
                }
            }
            return $correcto;
        } else {
            return false;
        }
    }

    public static function generarHoja($spreadsheet, $fechaInicio, $fechaFin, $empresa)
    {

        $revisionesLimpiezaExterior = Limpieza::obtenerLimpiezaExteriorFecha($fechaInicio, $fechaFin, $empresa);
        $revisionesLimpiezaInterior = Limpieza::obtenerLimpiezaInteriorFecha($fechaInicio, $fechaFin, $empresa);
        $revisionesConservacionExterior = Limpieza::obtenerConservacionExteriorFecha($fechaInicio, $fechaFin, $empresa);
        $revisionesConservacionInterior = Limpieza::obtenerConservacionInteriorFecha($fechaInicio, $fechaFin, $empresa);

        $sheet = $spreadsheet->createSheet();

        $estiloNegrita = [
            'font' => [
                'bold' => true,
            ]
        ];

        $estiloCabeceraTabla = [
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => 'FFC5D9F1'
                ]
            ],
            'font' => [
                'bold' => true,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
                ]
            ]
        ];

        $sheet->setTitle("Revisiones Estado Limpieza");

        $sheet->getStyle('A:K')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A:K')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setWidth(10);
        $sheet->getColumnDimension('G')->setWidth(10);
        $sheet->getColumnDimension('H')->setWidth(70);
        $sheet->getColumnDimension('I')->setWidth(10);
        $sheet->getColumnDimension('J')->setWidth(10);
        $sheet->getColumnDimension('K')->setWidth(70);

        $sheet->getStyle('H')->getAlignment()->setWrapText(true);
        $sheet->getStyle('K')->getAlignment()->setWrapText(true);

        $sheet->setCellValue("A1", "Fecha Revisión");
        $sheet->setCellValue("B1", "Vehículo");
        $sheet->setCellValue("C1", "Revisor");
        $sheet->setCellValue("D1", "Zona");
        $sheet->setCellValue("E1", "Campo");
        $sheet->setCellValue("F1", "OK");
        $sheet->setCellValue("G1", "NO OK");
        $sheet->setCellValue("H1", "Observaciones");
        $sheet->setCellValue("I1", "OK");
        $sheet->setCellValue("J1", "NO OK");
        $sheet->setCellValue("K1", "Observaciones");
        $sheet->getStyle("A1:K1")->applyFromArray($estiloCabeceraTabla);

        $fila = 2;

        for ($i = 0; $i < count($revisionesLimpiezaExterior); $i++) {
            $filaInicio = $fila;
            
            $sheet->setCellValue("A$fila", $revisionesLimpiezaExterior[$i]['FECHA'] . ' ' . $revisionesLimpiezaExterior[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesLimpiezaExterior[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesLimpiezaExterior[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Exterior');
            $sheet->setCellValue("E$fila", "CARROCERÍA");
            if ($revisionesLimpiezaExterior[$i]['CARROCERIA'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesLimpiezaExterior[$i]['CARROCERIA_OBS']}");
            if ($revisionesConservacionExterior[$i]['CARROCERIA'] == 1) {
                $sheet->setCellValue("I$fila", "X");
            } else {
                $sheet->setCellValue("J$fila", "X");
            }
            $sheet->setCellValue("K$fila", "{$revisionesConservacionExterior[$i]['CARROCERIA_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesLimpiezaExterior[$i]['FECHA'] . ' ' . $revisionesLimpiezaExterior[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesLimpiezaExterior[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesLimpiezaExterior[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Exterior');
            $sheet->setCellValue("E$fila", "VENTANAS LATERALES");
            if ($revisionesLimpiezaExterior[$i]['VENTANAS_LATERALES'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesLimpiezaExterior[$i]['VENTANAS_LATERALES_OBS']}");
            if ($revisionesConservacionExterior[$i]['VENTANAS_LATERALES'] == 1) {
                $sheet->setCellValue("I$fila", "X");
            } else {
                $sheet->setCellValue("J$fila", "X");
            }
            $sheet->setCellValue("K$fila", "{$revisionesConservacionExterior[$i]['VENTANAS_LATERALES_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesLimpiezaExterior[$i]['FECHA'] . ' ' . $revisionesLimpiezaExterior[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesLimpiezaExterior[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesLimpiezaExterior[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Exterior');
            $sheet->setCellValue("E$fila", "PUERTAS");
            if ($revisionesLimpiezaExterior[$i]['PUERTAS'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesLimpiezaExterior[$i]['PUERTAS_OBS']}");
            if ($revisionesConservacionExterior[$i]['PUERTAS'] == 1) {
                $sheet->setCellValue("I$fila", "X");
            } else {
                $sheet->setCellValue("J$fila", "X");
            }
            $sheet->setCellValue("K$fila", "{$revisionesConservacionExterior[$i]['PUERTAS_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesLimpiezaExterior[$i]['FECHA'] . ' ' . $revisionesLimpiezaExterior[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesLimpiezaExterior[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesLimpiezaExterior[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Exterior');
            $sheet->setCellValue("E$fila", "LUNAS");
            if ($revisionesLimpiezaExterior[$i]['LUNAS'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesLimpiezaExterior[$i]['LUNAS_OBS']}");
            if ($revisionesConservacionExterior[$i]['LUNAS'] == 1) {
                $sheet->setCellValue("I$fila", "X");
            } else {
                $sheet->setCellValue("J$fila", "X");
            }
            $sheet->setCellValue("K$fila", "{$revisionesConservacionExterior[$i]['LUNAS_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesLimpiezaExterior[$i]['FECHA'] . ' ' . $revisionesLimpiezaExterior[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesLimpiezaExterior[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesLimpiezaExterior[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Exterior');
            $sheet->setCellValue("E$fila", "ESPEJOS RETROVISORES");
            if ($revisionesLimpiezaExterior[$i]['ESPEJOS_RETROVISORES'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesLimpiezaExterior[$i]['ESPEJOS_RETROVISORES_OBS']}");
            if ($revisionesConservacionExterior[$i]['ESPEJOS_RETROVISORES'] == 1) {
                $sheet->setCellValue("I$fila", "X");
            } else {
                $sheet->setCellValue("J$fila", "X");
            }
            $sheet->setCellValue("K$fila", "{$revisionesConservacionExterior[$i]['ESPEJOS_RETROVISORES_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesLimpiezaExterior[$i]['FECHA'] . ' ' . $revisionesLimpiezaExterior[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesLimpiezaExterior[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesLimpiezaExterior[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Exterior');
            $sheet->setCellValue("E$fila", "LUCES");
            if ($revisionesLimpiezaExterior[$i]['LUCES'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesLimpiezaExterior[$i]['LUCES_OBS']}");
            if ($revisionesConservacionExterior[$i]['LUCES'] == 1) {
                $sheet->setCellValue("I$fila", "X");
            } else {
                $sheet->setCellValue("J$fila", "X");
            }
            $sheet->setCellValue("K$fila", "{$revisionesConservacionExterior[$i]['LUCES_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesLimpiezaExterior[$i]['FECHA'] . ' ' . $revisionesLimpiezaExterior[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesLimpiezaExterior[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesLimpiezaExterior[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Exterior');
            $sheet->setCellValue("E$fila", "INDICADORES");
            if ($revisionesLimpiezaExterior[$i]['INDICADORES'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesLimpiezaExterior[$i]['INDICADORES_OBS']}");
            if ($revisionesConservacionExterior[$i]['INDICADORES'] == 1) {
                $sheet->setCellValue("I$fila", "X");
            } else {
                $sheet->setCellValue("J$fila", "X");
            }
            $sheet->setCellValue("K$fila", "{$revisionesConservacionExterior[$i]['INDICADORES_OBS']}");
            $fila++;

            //Limpieza Interior

            $sheet->setCellValue("A$fila", $revisionesLimpiezaInterior[$i]['FECHA'] . ' ' . $revisionesLimpiezaInterior[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesLimpiezaInterior[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesLimpiezaInterior[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Interior');
            $sheet->setCellValue("E$fila", "SUELO");
            if ($revisionesLimpiezaInterior[$i]['SUELO'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesLimpiezaInterior[$i]['SUELO_OBS']}");
            if ($revisionesConservacionInterior[$i]['SUELO'] == 1) {
                $sheet->setCellValue("I$fila", "X");
            } else {
                $sheet->setCellValue("J$fila", "X");
            }
            $sheet->setCellValue("K$fila", "{$revisionesConservacionInterior[$i]['SUELO_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesLimpiezaInterior[$i]['FECHA'] . ' ' . $revisionesLimpiezaInterior[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesLimpiezaInterior[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesLimpiezaInterior[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Interior');
            $sheet->setCellValue("E$fila", "ROTULOS LUMINOSOS");
            if ($revisionesLimpiezaInterior[$i]['ROTULOS_LUMINOSOS'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesLimpiezaInterior[$i]['ROTULOS_LUMINOSOS_OBS']}");
            if ($revisionesConservacionInterior[$i]['ROTULOS_LUMINOSOS'] == 1) {
                $sheet->setCellValue("I$fila", "X");
            } else {
                $sheet->setCellValue("J$fila", "X");
            }
            $sheet->setCellValue("K$fila", "{$revisionesConservacionInterior[$i]['ROTULOS_LUMINOSOS_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesLimpiezaInterior[$i]['FECHA'] . ' ' . $revisionesLimpiezaInterior[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesLimpiezaInterior[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesLimpiezaInterior[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Interior');
            $sheet->setCellValue("E$fila", "PUERTAS");
            if ($revisionesLimpiezaInterior[$i]['PUERTAS'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesLimpiezaInterior[$i]['PUERTAS_OBS']}");
            if ($revisionesConservacionInterior[$i]['PUERTAS'] == 1) {
                $sheet->setCellValue("I$fila", "X");
            } else {
                $sheet->setCellValue("J$fila", "X");
            }
            $sheet->setCellValue("K$fila", "{$revisionesConservacionInterior[$i]['PUERTAS_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesLimpiezaInterior[$i]['FECHA'] . ' ' . $revisionesLimpiezaInterior[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesLimpiezaInterior[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesLimpiezaInterior[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Interior');
            $sheet->setCellValue("E$fila", "PAREDES");
            if ($revisionesLimpiezaInterior[$i]['PAREDES'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesLimpiezaInterior[$i]['PAREDES_OBS']}");
            if ($revisionesConservacionInterior[$i]['PAREDES'] == 1) {
                $sheet->setCellValue("I$fila", "X");
            } else {
                $sheet->setCellValue("J$fila", "X");
            }
            $sheet->setCellValue("K$fila", "{$revisionesConservacionInterior[$i]['PAREDES_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesLimpiezaInterior[$i]['FECHA'] . ' ' . $revisionesLimpiezaInterior[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesLimpiezaInterior[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesLimpiezaInterior[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Interior');
            $sheet->setCellValue("E$fila", "VENTANAS_LATERALES");
            if ($revisionesLimpiezaInterior[$i]['VENTANAS_LATERALES'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesLimpiezaInterior[$i]['VENTANAS_LATERALES_OBS']}");
            if ($revisionesConservacionInterior[$i]['VENTANAS_LATERALES'] == 1) {
                $sheet->setCellValue("I$fila", "X");
            } else {
                $sheet->setCellValue("J$fila", "X");
            }
            $sheet->setCellValue("K$fila", "{$revisionesConservacionInterior[$i]['VENTANAS_LATERALES_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesLimpiezaInterior[$i]['FECHA'] . ' ' . $revisionesLimpiezaInterior[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesLimpiezaInterior[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesLimpiezaInterior[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Interior');
            $sheet->setCellValue("E$fila", "ASIENTOS");
            if ($revisionesLimpiezaInterior[$i]['ASIENTOS'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesLimpiezaInterior[$i]['ASIENTOS_OBS']}");
            if ($revisionesConservacionInterior[$i]['ASIENTOS'] == 1) {
                $sheet->setCellValue("I$fila", "X");
            } else {
                $sheet->setCellValue("J$fila", "X");
            }
            $sheet->setCellValue("K$fila", "{$revisionesConservacionInterior[$i]['ASIENTOS_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesLimpiezaInterior[$i]['FECHA'] . ' ' . $revisionesLimpiezaInterior[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesLimpiezaInterior[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesLimpiezaInterior[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Interior');
            $sheet->setCellValue("E$fila", "LUMINARIAS");
            if ($revisionesLimpiezaInterior[$i]['LUMINARIAS'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesLimpiezaInterior[$i]['LUMINARIAS_OBS']}");
            if ($revisionesConservacionInterior[$i]['LUMINARIAS'] == 1) {
                $sheet->setCellValue("I$fila", "X");
            } else {
                $sheet->setCellValue("J$fila", "X");
            }
            $sheet->setCellValue("K$fila", "{$revisionesConservacionInterior[$i]['LUMINARIAS_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesLimpiezaInterior[$i]['FECHA'] . ' ' . $revisionesLimpiezaInterior[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesLimpiezaInterior[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesLimpiezaInterior[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Interior');
            $sheet->setCellValue("E$fila", "ASIDEROS/BARRAS");
            if ($revisionesLimpiezaInterior[$i]['ASIDEROS_BARRAS'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesLimpiezaInterior[$i]['ASIDEROS_BARRAS_OBS']}");
            if ($revisionesConservacionInterior[$i]['ASIDEROS_BARRAS'] == 1) {
                $sheet->setCellValue("I$fila", "X");
            } else {
                $sheet->setCellValue("J$fila", "X");
            }
            $sheet->setCellValue("K$fila", "{$revisionesConservacionInterior[$i]['ASIDEROS_BARRAS_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesLimpiezaInterior[$i]['FECHA'] . ' ' . $revisionesLimpiezaInterior[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesLimpiezaInterior[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesLimpiezaInterior[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Interior');
            $sheet->setCellValue("E$fila", "CABINA DEL CONDUCTOR");
            if ($revisionesLimpiezaInterior[$i]['CABINA_CONDUCTOR'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesLimpiezaInterior[$i]['CABINA_CONDUCTOR_OBS']}");
            if ($revisionesConservacionInterior[$i]['CABINA_CONDUCTOR'] == 1) {
                $sheet->setCellValue("I$fila", "X");
            } else {
                $sheet->setCellValue("J$fila", "X");
            }
            $sheet->setCellValue("K$fila", "{$revisionesConservacionInterior[$i]['CABINA_CONDUCTOR_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesLimpiezaInterior[$i]['FECHA'] . ' ' . $revisionesLimpiezaInterior[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesLimpiezaInterior[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesLimpiezaInterior[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Interior');
            $sheet->setCellValue("E$fila", "PULSADORES PARADA");
            if ($revisionesLimpiezaInterior[$i]['PULSADORES_PARADA'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesLimpiezaInterior[$i]['PULSADORES_PARADA_OBS']}");
            if ($revisionesConservacionInterior[$i]['PULSADORES_PARADA'] == 1) {
                $sheet->setCellValue("I$fila", "X");
            } else {
                $sheet->setCellValue("J$fila", "X");
            }
            $sheet->setCellValue("K$fila", "{$revisionesConservacionInterior[$i]['PULSADORES_PARADA_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesLimpiezaInterior[$i]['FECHA'] . ' ' . $revisionesLimpiezaInterior[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesLimpiezaInterior[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesLimpiezaInterior[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Interior');
            $sheet->setCellValue("E$fila", "SALPICADERO");
            if ($revisionesLimpiezaInterior[$i]['SALPICADERO'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesLimpiezaInterior[$i]['SALPICADERO_OBS']}");
            if ($revisionesConservacionInterior[$i]['SALPICADERO'] == 1) {
                $sheet->setCellValue("I$fila", "X");
            } else {
                $sheet->setCellValue("J$fila", "X");
            }
            $sheet->setCellValue("K$fila", "{$revisionesConservacionInterior[$i]['SALPICADERO_OBS']}");

            $fila += 2;
        }
    }
}
