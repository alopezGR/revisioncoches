<?php

include_once 'vehiculo.php';
class Pegatinas extends Vehiculo
{
    /**
     * Método para insertar las revisiones realizadas a la pegatinas del vehículo revisado.
     * 
     * @access public
     * 
     * @param array $datos Array con los datos de las revisiones realizadas
     * 
     * @return bool resultado de la operación 
     */
    public static function insertDatos($datos)
    {

        $stFlota = Pegatinas::insertarPegatinasExteriorFrontal($datos);
        $stFlota &= Pegatinas::insertarPegatinasExteriorLateralDerecho($datos);
        $stFlota &= Pegatinas::insertarPegatinasExteriorLateralIzquierdo($datos);
        $stFlota &= Pegatinas::insertarPegatinasLunaExteriorTrasera($datos);
        $stFlota &= Pegatinas::insertarPegatinasExteriorTrasero($datos);

        $stFlota &= Pegatinas::insertarPegatinasInteriorCentral($datos);
        $stFlota &= Pegatinas::insertarPegatinasInteriorDelantero($datos);
        $stFlota &= Pegatinas::insertarPegatinasLunaInterior($datos);
        $stFlota &= Pegatinas::insertarPegatinasInteriorMampara($datos);
        $stFlota &= Pegatinas::insertarPegatinasInteriorTrasera($datos);

        if ($stFlota) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Método para actulizar las revisiones realizadas a la pegatinas del vehículo revisado.
     * 
     * @access public
     * 
     * @param array $datos Array con los datos de las revisiones realizadas
     * 
     * @return bool resultado de la operación 
     */
    public static function actualizarDatos($datos)
    {

        $stFlota = Pegatinas::actualizarPegatinasExteriorFrontal($datos);
        $stFlota &= Pegatinas::actualizarPegatinasExteriorLateralDerecho($datos);
        $stFlota &= Pegatinas::actualizarPegatinasExteriorLateralIzquierdo($datos);
        $stFlota &= Pegatinas::actualizarPegatinasLunaExteriorTrasera($datos);
        $stFlota &= Pegatinas::actualizarPegatinasExteriorTrasero($datos);

        $stFlota &= Pegatinas::actualizarPegatinasInteriorCentral($datos);
        $stFlota &= Pegatinas::actualizarPegatinasInteriorDelantero($datos);
        $stFlota &= Pegatinas::actualizarPegatinasLunaInterior($datos);
        $stFlota &= Pegatinas::actualizarPegatinasInteriorMampara($datos);
        $stFlota &= Pegatinas::actualizarPegatinasInteriorTrasera($datos);

        if ($stFlota) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Método para insertar las revision de las pegatinas del exterior frontal del vehículo.
     * 
     * @access private
     * 
     * @param array $datos Array con los datos de las revisiones realizadas
     * 
     * @return bool resultado de la operación 
     */
    private static function insertarPegatinasExteriorFrontal($datos)
    {
        $conn = Db::getConector();

        $queryFlota = " INSERT INTO `peg_ext_frontal` (`ID`, ID_EMPRESA, ID_VEHICULO, CODIGO_VEHICULO, ID_USUARIO, FECHA, HORA, `CRTM_LOGO`, `LOGO_EMPRESA`, `MINUSVALIDO`, 
        `NUMERO_VEHICULO`, OTROS, `CRTM_LOGO_OBS`, `LOGO_EMPRESA_OBS`, `MINUSVALIDO_OBS`, `NUMERO_VEHICULO_OBS`, OTROS_OBS, TRASPASADO, USUARIO) 
        VALUES (NULL, :ID_EMPRESA, :ID_VEHICULO, :CODIGO_VEHICULO, :ID_USUARIO, :FECHA, :HORA, :CRTM_LOGO, :LOGO_EMPRESA, :MINUSVALIDO, :NUMERO_VEHICULO, :OTROS, :CRTM_LOGO_OBS, 
        :LOGO_EMPRESA_OBS, :MINUSVALIDO_OBS, :NUMERO_VEHICULO_OBS, :OTROS_OBS, '0', :USUARIO)";

        $stFlota = $conn->prepare($queryFlota);

        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        $stFlota->bindParam(":ID_EMPRESA", $datos['EMPRESA']);
        $stFlota->bindParam(":ID_VEHICULO", $datos['IDVEHICULO']);
        $stFlota->bindParam(":CODIGO_VEHICULO", $datos['CODIGO_VEHICULO']);
        $stFlota->bindValue(":ID_USUARIO", isset($datos['IDUSUARIO']) ? $datos['IDUSUARIO'] : 0);
        $stFlota->bindParam(":FECHA", $fecha);
        $stFlota->bindValue(":HORA", $hora);
        $stFlota->bindValue(":CRTM_LOGO", isset($datos['CRTM_LOGO_EF']) ? $datos['CRTM_LOGO_EF'] : NULL);
        $stFlota->bindValue(":LOGO_EMPRESA", isset($datos['LOGO_EMPRESA_EF']) ? $datos['LOGO_EMPRESA_EF'] : NULL);
        $stFlota->bindValue(":MINUSVALIDO", isset($datos['MINUSVALIDO_EF']) ? $datos['MINUSVALIDO_EF'] : NULL);
        $stFlota->bindValue(":NUMERO_VEHICULO", isset($datos['NUMERO_VEHICULO_EF']) ? $datos['NUMERO_VEHICULO_EF'] : NULL);
        $stFlota->bindValue(":OTROS", isset($datos['OTROS_EF']) ? $datos['OTROS_EF'] : NULL);
        $stFlota->bindValue(":CRTM_LOGO_OBS", (!empty($datos['CRTM_LOGO_EF_OBS'])) ? $datos['CRTM_LOGO_EF_OBS'] : NULL);
        $stFlota->bindValue(":LOGO_EMPRESA_OBS", (!empty($datos['LOGO_EMPRESA_EF_OBS'])) ? $datos['LOGO_EMPRESA_EF_OBS'] : NULL);
        $stFlota->bindValue(":MINUSVALIDO_OBS", (!empty($datos['MINUSVALIDO_EF_OBS'])) ? $datos['MINUSVALIDO_EF_OBS'] : NULL);
        $stFlota->bindValue(":NUMERO_VEHICULO_OBS", (!empty($datos['NUMERO_VEHICULO_EF_OBS'])) ? $datos['NUMERO_VEHICULO_EF_OBS'] : NULL);
        $stFlota->bindValue(":OTROS_OBS", (!empty($datos['OTROS_EF_OBS'])) ? $datos['OTROS_EF_OBS'] : NULL);
        $stFlota->bindValue(":USUARIO", !empty($datos['USUARIO']) ? $datos['USUARIO'] : NULL);

        $stFlota->execute();

        if ($stFlota) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Método para insertar las revision de las pegatinas del exterior frontal del vehículo.
     * 
     * @access private
     * 
     * @param array $datos Array con los datos de las revisiones realizadas
     * 
     * @return bool resultado de la operación 
     */
    private static function actualizarPegatinasExteriorFrontal($datos)
    {
        $conn = Db::getConector();

        $queryFlota = " UPDATE `peg_ext_frontal` SET FECHA = :FECHA, HORA = :HORA, `CRTM_LOGO` = :CRTM_LOGO, `LOGO_EMPRESA` = :LOGO_EMPRESA, `MINUSVALIDO` = :MINUSVALIDO, 
        `NUMERO_VEHICULO` = :NUMERO_VEHICULO, OTROS = :OTROS, `CRTM_LOGO_OBS` = :CRTM_LOGO_OBS, `LOGO_EMPRESA_OBS` = :LOGO_EMPRESA_OBS, `MINUSVALIDO_OBS` = :MINUSVALIDO_OBS, 
        `NUMERO_VEHICULO_OBS` = :NUMERO_VEHICULO_OBS, OTROS_OBS = :OTROS_OBS, TRASPASADO = 0, USUARIO = :USUARIO WHERE ID = {$datos['IDEF']}";

        $stFlota = $conn->prepare($queryFlota);

        $fecha = date('Y-m-d');
        $hora = date('H:i:s');

        $stFlota->bindParam(":FECHA", $fecha);
        $stFlota->bindValue(":HORA", $hora);
        $stFlota->bindValue(":CRTM_LOGO", isset($datos['CRTM_LOGO_EF']) ? $datos['CRTM_LOGO_EF'] : NULL);
        $stFlota->bindValue(":LOGO_EMPRESA", isset($datos['LOGO_EMPRESA_EF']) ? $datos['LOGO_EMPRESA_EF'] : NULL);
        $stFlota->bindValue(":MINUSVALIDO", isset($datos['MINUSVALIDO_EF']) ? $datos['MINUSVALIDO_EF'] : NULL);
        $stFlota->bindValue(":NUMERO_VEHICULO", isset($datos['NUMERO_VEHICULO_EF']) ? $datos['NUMERO_VEHICULO_EF'] : NULL);
        $stFlota->bindValue(":OTROS", isset($datos['OTROS_EF']) ? $datos['OTROS_EF'] : NULL);
        $stFlota->bindValue(":CRTM_LOGO_OBS", (!empty($datos['CRTM_LOGO_EF_OBS'])) ? $datos['CRTM_LOGO_EF_OBS'] : NULL);
        $stFlota->bindValue(":LOGO_EMPRESA_OBS", (!empty($datos['LOGO_EMPRESA_EF_OBS'])) ? $datos['LOGO_EMPRESA_EF_OBS'] : NULL);
        $stFlota->bindValue(":MINUSVALIDO_OBS", (!empty($datos['MINUSVALIDO_EF_OBS'])) ? $datos['MINUSVALIDO_EF_OBS'] : NULL);
        $stFlota->bindValue(":NUMERO_VEHICULO_OBS", (!empty($datos['NUMERO_VEHICULO_EF_OBS'])) ? $datos['NUMERO_VEHICULO_EF_OBS'] : NULL);
        $stFlota->bindValue(":OTROS_OBS", (!empty($datos['OTROS_EF_OBS'])) ? $datos['OTROS_EF_OBS'] : NULL);
        $stFlota->bindValue(":USUARIO", !empty($datos['USUARIO']) ? $datos['USUARIO'] : NULL);

        $stFlota->execute();

        if ($stFlota) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Método para insertar las revision de las pegatinas del exterior lateral derecho del vehículo.
     * 
     * @access private
     * 
     * @param array $datos Array con los datos de las revisiones realizadas
     * 
     * @return bool resultado de la operación 
     */
    private static function insertarPegatinasExteriorLateralDerecho($datos)
    {
        $conn = Db::getConector();


        $queryFlota = " INSERT INTO `peg_ext_lateral_derecho` (`ID`, ID_EMPRESA, ID_VEHICULO, CODIGO_VEHICULO, ID_USUARIO, FECHA, HORA, `LOGO_EMPRESA`, `WEB_CRTM`, `PMR`, `STOP_COVID`, `SALIDA`, 
        `ENTRADA`, `MINUSVALIDO`, `CAMARA_COMERCIO`, `SALIDA_EMERGENCIA`, `GRUPO_RUIZ`, `NUMERO_VEHICULO`, `APERTURA_EMERGENCIA`, 
        `SOLICITUD_RAMPA`, ACCESO_PMR, LOGO_CRTM, SALIDA_PUERTAS, SILLA_RUEDAS, CARRITO, PUBLICIDAD, OTROS, `LOGO_EMPRESA_OBS`, `WEB_CRTM_OBS`, `PMR_OBS`, 
        `STOP_COVID_OBS`, `SALIDA_OBS`, `ENTRADA_OBS`, `MINUSVALIDO_OBS`, `CAMARA_COMERCIO_OBS`, `SALIDA_EMERGENCIA_OBS`, `GRUPO_RUIZ_OBS`, `NUMERO_VEHICULO_OBS`, 
        `APERTURA_EMERGENCIA_OBS`, `SOLICITUD_RAMPA_OBS`, ACCESO_PMR_OBS, LOGO_CRTM_OBS, SALIDA_PUERTAS_OBS, SILLA_RUEDAS_OBS, CARRITO_OBS, PUBLICIDAD_OBS, OTROS_OBS, 
        TRASPASADO, USUARIO) 
        VALUES (NULL, :ID_EMPRESA, :ID_VEHICULO, :CODIGO_VEHICULO, :ID_USUARIO, :FECHA, :HORA, :LOGO_EMPRESA, :WEB_CRTM, :PMR, :STOP_COVID, :SALIDA, :ENTRADA, 
        :MINUSVALIDO, :CAMARA_COMERCIO, :SALIDA_EMERGENCIA, :GRUPO_RUIZ, :NUMERO_VEHICULO, :APERTURA_EMERGENCIA, :SOLICITUD_RAMPA, :ACCESO_PMR, :LOGO_CRTM, 
        :SALIDA_PUERTAS, :SILLA_RUEDAS, :CARRITO, :PUBLICIDAD, :OTROS, :LOGO_EMPRESA_OBS, :WEB_CRTM_OBS, :PMR_OBS, :STOP_COVID_OBS, :SALIDA_OBS, :ENTRADA_OBS, 
        :MINUSVALIDO_OBS, :CAMARA_COMERCIO_OBS, :SALIDA_EMERGENCIA_OBS, :GRUPO_RUIZ_OBS, :NUMERO_VEHICULO_OBS, :APERTURA_EMERGENCIA_OBS, :SOLICITUD_RAMPA_OBS, 
        :ACCESO_PMR_OBS, :LOGO_CRTM_OBS, :SALIDA_PUERTAS_OBS, :SILLA_RUEDAS_OBS, :CARRITO_OBS, :PUBLICIDAD_OBS, :OTROS_OBS, '0', :USUARIO)";


        $stFlota = $conn->prepare($queryFlota);

        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        $stFlota->bindParam(":ID_EMPRESA", $datos['EMPRESA']);
        $stFlota->bindParam(":ID_VEHICULO", $datos['IDVEHICULO']);
        $stFlota->bindParam(":CODIGO_VEHICULO", $datos['CODIGO_VEHICULO']);
        $stFlota->bindValue(":ID_USUARIO", isset($datos['IDUSUARIO']) ? $datos['IDUSUARIO'] : 0);
        $stFlota->bindParam(":FECHA", $fecha);
        $stFlota->bindValue(":HORA", $hora);
        $stFlota->bindValue(":LOGO_EMPRESA", isset($datos['LOGO_EMPRESA_ELD']) ? $datos['LOGO_EMPRESA_ELD'] : NULL);
        $stFlota->bindValue(":WEB_CRTM", isset($datos['WEB_CRTM_ELD']) ? $datos['WEB_CRTM_ELD'] : NULL);
        $stFlota->bindValue(":PMR", isset($datos['PMR_ELD']) ? $datos['PMR_ELD'] : NULL);
        $stFlota->bindValue(":STOP_COVID", isset($datos['STOP_COVID_ELD']) ? $datos['STOP_COVID_ELD'] : NULL);
        $stFlota->bindValue(":SALIDA", isset($datos['SALIDA_ELD']) ? $datos['SALIDA_ELD'] : NULL);
        $stFlota->bindValue(":ENTRADA", isset($datos['ENTRADA_ELD']) ? $datos['ENTRADA_ELD'] : NULL);
        $stFlota->bindValue(":MINUSVALIDO", isset($datos['MINUSVALIDO_ELD']) ? $datos['MINUSVALIDO_ELD'] : NULL);
        $stFlota->bindValue(":CAMARA_COMERCIO", isset($datos['CAMARA_COMERCIO_ELD']) ? $datos['CAMARA_COMERCIO_ELD'] : NULL);
        $stFlota->bindValue(":SALIDA_EMERGENCIA", isset($datos['SALIDA_EMERGENCIA_ELD']) ? $datos['SALIDA_EMERGENCIA_ELD'] : NULL);
        $stFlota->bindValue(":GRUPO_RUIZ", isset($datos['GRUPO_RUIZ_ELD']) ? $datos['GRUPO_RUIZ_ELD'] : NULL);
        $stFlota->bindValue(":NUMERO_VEHICULO", isset($datos['NUMERO_VEHICULO_ELD']) ? $datos['NUMERO_VEHICULO_ELD'] : NULL);
        $stFlota->bindValue(":APERTURA_EMERGENCIA", isset($datos['APERTURA_EMERGENCIA_ELD']) ? $datos['APERTURA_EMERGENCIA_ELD'] : NULL);
        $stFlota->bindValue(":SOLICITUD_RAMPA", isset($datos['SOLICITUD_RAMPA_ELD']) ? $datos['SOLICITUD_RAMPA_ELD'] : NULL);
        $stFlota->bindValue(":ACCESO_PMR", isset($datos['ACCESO_PMR_ELD']) ? $datos['ACCESO_PMR_ELD'] : NULL);
        $stFlota->bindValue(":LOGO_CRTM", isset($datos['LOGO_CRTM_ELD']) ? $datos['LOGO_CRTM_ELD'] : NULL);
        $stFlota->bindValue(":SALIDA_PUERTAS", isset($datos['SALIDA_PUERTAS_ELD']) ? $datos['SALIDA_PUERTAS_ELD'] : NULL);
        $stFlota->bindValue(":SILLA_RUEDAS", isset($datos['SILLA_RUEDAS_ELD']) ? $datos['SILLA_RUEDAS_ELD'] : NULL);
        $stFlota->bindValue(":CARRITO", isset($datos['CARRITO_ELD']) ? $datos['CARRITO_ELD'] : NULL);
        $stFlota->bindValue(":PUBLICIDAD", isset($datos['PUBLICIDAD_ELD']) ? $datos['PUBLICIDAD_ELD'] : NULL);
        $stFlota->bindValue(":OTROS", isset($datos['OTROS_ELD']) ? $datos['OTROS_ELD'] : NULL);
        $stFlota->bindValue(":LOGO_EMPRESA_OBS", (!empty($datos['LOGO_EMPRESA_ELD_OBS'])) ? $datos['LOGO_EMPRESA_ELD_OBS'] : NULL);
        $stFlota->bindValue(":WEB_CRTM_OBS", (!empty($datos['WEB_CRTM_ELD_OBS'])) ? $datos['WEB_CRTM_ELD_OBS'] : NULL);
        $stFlota->bindValue(":PMR_OBS", (!empty($datos['PMR_ELD_OBS'])) ? $datos['PMR_ELD_OBS'] : NULL);
        $stFlota->bindValue(":STOP_COVID_OBS", (!empty($datos['STOP_COVID_ELD_OBS'])) ? $datos['STOP_COVID_ELD_OBS'] : NULL);
        $stFlota->bindValue(":SALIDA_OBS", (!empty($datos['SALIDA_ELD_OBS'])) ? $datos['SALIDA_ELD_OBS'] : NULL);
        $stFlota->bindValue(":ENTRADA_OBS", (!empty($datos['ENTRADA_ELD_OBS'])) ? $datos['ENTRADA_ELD_OBS'] : NULL);
        $stFlota->bindValue(":MINUSVALIDO_OBS", (!empty($datos['MINUSVALIDO_ELD_OBS'])) ? $datos['MINUSVALIDO_ELD_OBS'] : NULL);
        $stFlota->bindValue(":CAMARA_COMERCIO_OBS", (!empty($datos['CAMARA_COMERCIO_ELD_OBS'])) ? $datos['CAMARA_COMERCIO_ELD_OBS'] : NULL);
        $stFlota->bindValue(":SALIDA_EMERGENCIA_OBS", (!empty($datos['SALIDA_EMERGENCIA_ELD_OBS'])) ? $datos['SALIDA_EMERGENCIA_ELD_OBS'] : NULL);
        $stFlota->bindValue(":GRUPO_RUIZ_OBS", (!empty($datos['GRUPO_RUIZ_ELD_OBS'])) ? $datos['GRUPO_RUIZ_ELD_OBS'] : NULL);
        $stFlota->bindValue(":NUMERO_VEHICULO_OBS", (!empty($datos['NUMERO_VEHICULO_ELD_OBS'])) ? $datos['NUMERO_VEHICULO_ELD_OBS'] : NULL);
        $stFlota->bindValue(":APERTURA_EMERGENCIA_OBS", (!empty($datos['APERTURA_EMERGENCIA_ELD_OBS'])) ? $datos['APERTURA_EMERGENCIA_ELD_OBS'] : NULL);
        $stFlota->bindValue(":SOLICITUD_RAMPA_OBS", (!empty($datos['SOLICITUD_RAMPA_ELD_OBS'])) ? $datos['SOLICITUD_RAMPA_ELD_OBS'] : NULL);
        $stFlota->bindValue(":ACCESO_PMR_OBS", (!empty($datos['ACCESO_PMR_ELD_OBS'])) ? $datos['ACCESO_PMR_ELD_OBS'] : NULL);
        $stFlota->bindValue(":LOGO_CRTM_OBS", (!empty($datos['LOGO_CRTM_ELD_OBS'])) ? $datos['LOGO_CRTM_ELD_OBS'] : NULL);
        $stFlota->bindValue(":SALIDA_PUERTOS_OBS", (!empty($datos['SALIDA_PUERTOS_ELD_OBS'])) ? $datos['SALIDA_PUERTOS_ELD_OBS'] : NULL);
        $stFlota->bindValue(":SILLA_RUEDAS_OBS", (!empty($datos['SILLA_RUEDAS_ELD_OBS'])) ? $datos['SILLA_RUEDAS_ELD_OBS'] : NULL);
        $stFlota->bindValue(":CARRITO_OBS", (!empty($datos['CARRITO_ELD_OBS'])) ? $datos['CARRITO_ELD_OBS'] : NULL);
        $stFlota->bindValue(":PUBLICIDAD_OBS", (!empty($datos['PUBLICIDAD_ELD_OBS'])) ? $datos['PUBLICIDAD_ELD_OBS'] : NULL);
        $stFlota->bindValue(":OTROS_OBS", (!empty($datos['OTROS_ELD_OBS'])) ? $datos['OTROS_ELD_OBS'] : NULL);
        $stFlota->bindValue(":USUARIO", !empty($datos['USUARIO']) ? $datos['USUARIO'] : NULL);

        $stFlota->execute();

        if ($stFlota) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Método para insertar las revision de las pegatinas del exterior lateral derecho del vehículo.
     * 
     * @access private
     * 
     * @param array $datos Array con los datos de las revisiones realizadas
     * 
     * @return bool resultado de la operación 
     */
    private static function actualizarPegatinasExteriorLateralDerecho($datos)
    {
        $conn = Db::getConector();


        $queryFlota = "UPDATE `peg_ext_lateral_derecho` SET FECHA = :FECHA, HORA = :HORA, `LOGO_EMPRESA` = :LOGO_EMPRESA, `WEB_CRTM` = :WEB_CRTM, `PMR` = :PMR, 
        `STOP_COVID` = :STOP_COVID, `SALIDA` = :SALIDA, `ENTRADA` = :ENTRADA, `MINUSVALIDO` = :MINUSVALIDO, `CAMARA_COMERCIO` = :CAMARA_COMERCIO, 
        `SALIDA_EMERGENCIA` = :SALIDA_EMERGENCIA, `GRUPO_RUIZ` = :GRUPO_RUIZ, `NUMERO_VEHICULO` = :NUMERO_VEHICULO, `APERTURA_EMERGENCIA` = :APERTURA_EMERGENCIA, 
        `SOLICITUD_RAMPA` = :SOLICITUD_RAMPA, ACCESO_PMR = :ACCESO_PMR, LOGO_CRTM = :LOGO_CRTM, SALIDA_PUERTAS = :SALIDA_PUERTAS, SILLA_RUEDAS = :SILLA_RUEDAS, 
        CARRITO = :CARRITO, PUBLICIDAD = :PUBLICIDAD, OTROS = :OTROS, `LOGO_EMPRESA_OBS` = :LOGO_EMPRESA_OBS, `WEB_CRTM_OBS` = :WEB_CRTM_OBS, `PMR_OBS` = :PMR_OBS, 
        `STOP_COVID_OBS` = :STOP_COVID_OBS, `SALIDA_OBS` = :SALIDA_OBS, `ENTRADA_OBS` = :ENTRADA_OBS, `MINUSVALIDO_OBS` = :MINUSVALIDO_OBS, 
        `CAMARA_COMERCIO_OBS` = :CAMARA_COMERCIO_OBS, `SALIDA_EMERGENCIA_OBS` = :SALIDA_EMERGENCIA_OBS, `GRUPO_RUIZ_OBS` = :GRUPO_RUIZ_OBS, 
        `NUMERO_VEHICULO_OBS` = :NUMERO_VEHICULO_OBS, `APERTURA_EMERGENCIA_OBS` = :APERTURA_EMERGENCIA_OBS, `SOLICITUD_RAMPA_OBS` = :SOLICITUD_RAMPA_OBS, 
        ACCESO_PMR_OBS = :ACCESO_PMR_OBS, LOGO_CRTM_OBS = :LOGO_CRTM_OBS, SALIDA_PUERTAS_OBS = :SALIDA_PUERTAS_OBS, SILLA_RUEDAS_OBS = :SILLA_RUEDAS_OBS, 
        CARRITO_OBS = :CARRITO_OBS, PUBLICIDAD_OBS = :PUBLICIDAD_OBS, OTROS_OBS = :OTROS_OBS, 
        TRASPASADO = 0, USUARIO = :USUARIO WHERE ID = {$datos['IDELD']}";


        $stFlota = $conn->prepare($queryFlota);

        $fecha = date('Y-m-d');
        $hora = date('H:i:s');

        $stFlota->bindParam(":FECHA", $fecha);
        $stFlota->bindValue(":HORA", $hora);
        $stFlota->bindValue(":LOGO_EMPRESA", isset($datos['LOGO_EMPRESA_ELD']) ? $datos['LOGO_EMPRESA_ELD'] : NULL);
        $stFlota->bindValue(":WEB_CRTM", isset($datos['WEB_CRTM_ELD']) ? $datos['WEB_CRTM_ELD'] : NULL);
        $stFlota->bindValue(":PMR", isset($datos['PMR_ELD']) ? $datos['PMR_ELD'] : NULL);
        $stFlota->bindValue(":STOP_COVID", isset($datos['STOP_COVID_ELD']) ? $datos['STOP_COVID_ELD'] : NULL);
        $stFlota->bindValue(":SALIDA", isset($datos['SALIDA_ELD']) ? $datos['SALIDA_ELD'] : NULL);
        $stFlota->bindValue(":ENTRADA", isset($datos['ENTRADA_ELD']) ? $datos['ENTRADA_ELD'] : NULL);
        $stFlota->bindValue(":MINUSVALIDO", isset($datos['MINUSVALIDO_ELD']) ? $datos['MINUSVALIDO_ELD'] : NULL);
        $stFlota->bindValue(":CAMARA_COMERCIO", isset($datos['CAMARA_COMERCIO_ELD']) ? $datos['CAMARA_COMERCIO_ELD'] : NULL);
        $stFlota->bindValue(":SALIDA_EMERGENCIA", isset($datos['SALIDA_EMERGENCIA_ELD']) ? $datos['SALIDA_EMERGENCIA_ELD'] : NULL);
        $stFlota->bindValue(":GRUPO_RUIZ", isset($datos['GRUPO_RUIZ_ELD']) ? $datos['GRUPO_RUIZ_ELD'] : NULL);
        $stFlota->bindValue(":NUMERO_VEHICULO", isset($datos['NUMERO_VEHICULO_ELD']) ? $datos['NUMERO_VEHICULO_ELD'] : NULL);
        $stFlota->bindValue(":APERTURA_EMERGENCIA", isset($datos['APERTURA_EMERGENCIA_ELD']) ? $datos['APERTURA_EMERGENCIA_ELD'] : NULL);
        $stFlota->bindValue(":SOLICITUD_RAMPA", isset($datos['SOLICITUD_RAMPA_ELD']) ? $datos['SOLICITUD_RAMPA_ELD'] : NULL);
        $stFlota->bindValue(":ACCESO_PMR", isset($datos['ACCESO_PMR_ELD']) ? $datos['ACCESO_PMR_ELD'] : NULL);
        $stFlota->bindValue(":LOGO_CRTM", isset($datos['LOGO_CRTM_ELD']) ? $datos['LOGO_CRTM_ELD'] : NULL);
        $stFlota->bindValue(":SALIDA_PUERTAS", isset($datos['SALIDA_PUERTAS_ELD']) ? $datos['SALIDA_PUERTAS_ELD'] : NULL);
        $stFlota->bindValue(":SILLA_RUEDAS", isset($datos['SILLA_RUEDAS_ELD']) ? $datos['SILLA_RUEDAS_ELD'] : NULL);
        $stFlota->bindValue(":CARRITO", isset($datos['CARRITO_ELD']) ? $datos['CARRITO_ELD'] : NULL);
        $stFlota->bindValue(":PUBLICIDAD", isset($datos['PUBLICIDAD_ELD']) ? $datos['PUBLICIDAD_ELD'] : NULL);
        $stFlota->bindValue(":OTROS", isset($datos['OTROS_ELD']) ? $datos['OTROS_ELD'] : NULL);
        $stFlota->bindValue(":LOGO_EMPRESA_OBS", (!empty($datos['LOGO_EMPRESA_ELD_OBS'])) ? $datos['LOGO_EMPRESA_ELD_OBS'] : NULL);
        $stFlota->bindValue(":WEB_CRTM_OBS", (!empty($datos['WEB_CRTM_ELD_OBS'])) ? $datos['WEB_CRTM_ELD_OBS'] : NULL);
        $stFlota->bindValue(":PMR_OBS", (!empty($datos['PMR_ELD_OBS'])) ? $datos['PMR_ELD_OBS'] : NULL);
        $stFlota->bindValue(":STOP_COVID_OBS", (!empty($datos['STOP_COVID_ELD_OBS'])) ? $datos['STOP_COVID_ELD_OBS'] : NULL);
        $stFlota->bindValue(":SALIDA_OBS", (!empty($datos['SALIDA_ELD_OBS'])) ? $datos['SALIDA_ELD_OBS'] : NULL);
        $stFlota->bindValue(":ENTRADA_OBS", (!empty($datos['ENTRADA_ELD_OBS'])) ? $datos['ENTRADA_ELD_OBS'] : NULL);
        $stFlota->bindValue(":MINUSVALIDO_OBS", (!empty($datos['MINUSVALIDO_ELD_OBS'])) ? $datos['MINUSVALIDO_ELD_OBS'] : NULL);
        $stFlota->bindValue(":CAMARA_COMERCIO_OBS", (!empty($datos['CAMARA_COMERCIO_ELD_OBS'])) ? $datos['CAMARA_COMERCIO_ELD_OBS'] : NULL);
        $stFlota->bindValue(":SALIDA_EMERGENCIA_OBS", (!empty($datos['SALIDA_EMERGENCIA_ELD_OBS'])) ? $datos['SALIDA_EMERGENCIA_ELD_OBS'] : NULL);
        $stFlota->bindValue(":GRUPO_RUIZ_OBS", (!empty($datos['GRUPO_RUIZ_ELD_OBS'])) ? $datos['GRUPO_RUIZ_ELD_OBS'] : NULL);
        $stFlota->bindValue(":NUMERO_VEHICULO_OBS", (!empty($datos['NUMERO_VEHICULO_ELD_OBS'])) ? $datos['NUMERO_VEHICULO_ELD_OBS'] : NULL);
        $stFlota->bindValue(":APERTURA_EMERGENCIA_OBS", (!empty($datos['APERTURA_EMERGENCIA_ELD_OBS'])) ? $datos['APERTURA_EMERGENCIA_ELD_OBS'] : NULL);
        $stFlota->bindValue(":SOLICITUD_RAMPA_OBS", (!empty($datos['SOLICITUD_RAMPA_ELD_OBS'])) ? $datos['SOLICITUD_RAMPA_ELD_OBS'] : NULL);
        $stFlota->bindValue(":ACCESO_PMR_OBS", (!empty($datos['ACCESO_PMR_ELD_OBS'])) ? $datos['ACCESO_PMR_ELD_OBS'] : NULL);
        $stFlota->bindValue(":LOGO_CRTM_OBS", (!empty($datos['LOGO_CRTM_ELD_OBS'])) ? $datos['LOGO_CRTM_ELD_OBS'] : NULL);
        $stFlota->bindValue(":SALIDA_PUERTOS_OBS", (!empty($datos['SALIDA_PUERTOS_ELD_OBS'])) ? $datos['SALIDA_PUERTOS_ELD_OBS'] : NULL);
        $stFlota->bindValue(":SILLA_RUEDAS_OBS", (!empty($datos['SILLA_RUEDAS_ELD_OBS'])) ? $datos['SILLA_RUEDAS_ELD_OBS'] : NULL);
        $stFlota->bindValue(":CARRITO_OBS", (!empty($datos['CARRITO_ELD_OBS'])) ? $datos['CARRITO_ELD_OBS'] : NULL);
        $stFlota->bindValue(":PUBLICIDAD_OBS", (!empty($datos['PUBLICIDAD_ELD_OBS'])) ? $datos['PUBLICIDAD_ELD_OBS'] : NULL);
        $stFlota->bindValue(":OTROS_OBS", (!empty($datos['OTROS_ELD_OBS'])) ? $datos['OTROS_ELD_OBS'] : NULL);
        $stFlota->bindValue(":USUARIO", !empty($datos['USUARIO']) ? $datos['USUARIO'] : NULL);

        $stFlota->execute();

        if ($stFlota) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Método para insertar las revision de las pegatinas del lateral exterior izquierdo del vehículo.
     * 
     * @access private
     * 
     * @param array $datos Array con los datos de las revisiones realizadas
     * 
     * @return bool resultado de la operación 
     */
    private static function insertarPegatinasExteriorLateralIzquierdo($datos)
    {
        $conn = Db::getConector();

        $queryFlota = " INSERT INTO `peg_ext_lateral_izq` (`ID`, ID_EMPRESA, ID_VEHICULO, CODIGO_VEHICULO, ID_USUARIO, FECHA, HORA, `CRTM_LOGO`, `LOGO_EMPRESA`, `WEB_CRTM`, `CAMARA_COMERCIO`, 
        `SALIDA_EMERGENCIA`, `GRUPO_RUIZ`, `NUMERO_VEHICULO`, `CRTM_LOGO_OBS`, `LOGO_EMPRESA_OBS`, `WEB_CRTM_OBS`, 
        `CAMARA_COMERCIO_OBS`, `SALIDA_EMERGENCIA_OBS`, `GRUPO_RUIZ_OBS`, `NUMERO_VEHICULO_OBS`, TRASPASADO, USUARIO) 
        VALUES (NULL, :ID_EMPRESA, :ID_VEHICULO, :CODIGO_VEHICULO, :ID_USUARIO, :FECHA, :HORA, :CRTM_LOGO, :LOGO_EMPRESA, :WEB_CRTM, :CAMARA_COMERCIO, :SALIDA_EMERGENCIA, 
        :GRUPO_RUIZ, :NUMERO_VEHICULO, :CRTM_LOGO_OBS, :LOGO_EMPRESA_OBS, :WEB_CRTM_OBS, :CAMARA_COMERCIO_OBS, :SALIDA_EMERGENCIA_OBS, :GRUPO_RUIZ_OBS, 
        :NUMERO_VEHICULO_OBS, '0', :USUARIO)";

        $stFlota = $conn->prepare($queryFlota);

        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        $stFlota->bindParam(":ID_EMPRESA", $datos['EMPRESA']);
        $stFlota->bindParam(":ID_VEHICULO", $datos['IDVEHICULO']);
        $stFlota->bindParam(":CODIGO_VEHICULO", $datos['CODIGO_VEHICULO']);
        $stFlota->bindValue(":ID_USUARIO", isset($datos['IDUSUARIO']) ? $datos['IDUSUARIO'] : 0);
        $stFlota->bindParam(":FECHA", $fecha);
        $stFlota->bindValue(":HORA", $hora);
        $stFlota->bindValue(":CRTM_LOGO", isset($datos['CRTM_LOGO_ELI']) ? $datos['CRTM_LOGO_ELI'] : NULL);
        $stFlota->bindValue(":LOGO_EMPRESA", isset($datos['LOGO_EMPRESA_ELI']) ? $datos['LOGO_EMPRESA_ELI'] : NULL);
        $stFlota->bindValue(":WEB_CRTM", isset($datos['WEB_CRTM_ELI']) ? $datos['WEB_CRTM_ELI'] : NULL);
        $stFlota->bindValue(":CAMARA_COMERCIO", isset($datos['CAMARA_COMERCIO_ELI']) ? $datos['CAMARA_COMERCIO_ELI'] : NULL);
        $stFlota->bindValue(":SALIDA_EMERGENCIA", isset($datos['SALIDA_EMERGENCIA_ELI']) ? $datos['SALIDA_EMERGENCIA_ELI'] : NULL);
        $stFlota->bindValue(":GRUPO_RUIZ", isset($datos['GRUPO_RUIZ_ELI']) ? $datos['GRUPO_RUIZ_ELI'] : NULL);
        $stFlota->bindValue(":NUMERO_VEHICULO", isset($datos['NUMERO_VEHICULO_ELI']) ? $datos['NUMERO_VEHICULO_ELI'] : NULL);
        $stFlota->bindValue(":CRTM_LOGO_OBS", (!empty($datos['CRTM_LOGO_ELI_OBS'])) ? $datos['CRTM_LOGO_ELI_OBS'] : NULL);
        $stFlota->bindValue(":LOGO_EMPRESA_OBS", (!empty($datos['LOGO_EMPRESA_ELI_OBS'])) ? $datos['LOGO_EMPRESA_ELI_OBS'] : NULL);
        $stFlota->bindValue(":WEB_CRTM_OBS", (!empty($datos['WEB_CRTM_ELI_OBS'])) ? $datos['WEB_CRTM_ELI_OBS'] : NULL);
        $stFlota->bindValue(":CAMARA_COMERCIO_OBS", (!empty($datos['CAMARA_COMERCIO_ELI_OBS'])) ? $datos['CAMARA_COMERCIO_ELI_OBS'] : NULL);
        $stFlota->bindValue(":SALIDA_EMERGENCIA_OBS", (!empty($datos['SALIDA_EMERGENCIA_ELI_OBS'])) ? $datos['SALIDA_EMERGENCIA_ELI_OBS'] : NULL);
        $stFlota->bindValue(":GRUPO_RUIZ_OBS", (!empty($datos['GRUPO_RUIZ_ELI_OBS'])) ? $datos['GRUPO_RUIZ_ELI_OBS'] : NULL);
        $stFlota->bindValue(":NUMERO_VEHICULO_OBS", (!empty($datos['NUMERO_VEHICULO_ELI_OBS'])) ? $datos['NUMERO_VEHICULO_ELI_OBS'] : NULL);
        $stFlota->bindValue(":USUARIO", !empty($datos['USUARIO']) ? $datos['USUARIO'] : NULL);

        $stFlota->execute();

        if ($stFlota) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Método para insertar las revision de las pegatinas del lateral exterior izquierdo del vehículo.
     * 
     * @access private
     * 
     * @param array $datos Array con los datos de las revisiones realizadas
     * 
     * @return bool resultado de la operación 
     */
    private static function actualizarPegatinasExteriorLateralIzquierdo($datos)
    {
        $conn = Db::getConector();

        $queryFlota = "UPDATE `peg_ext_lateral_izq` SET FECHA = :FECHA, HORA = :HORA, `CRTM_LOGO` = :CRTM_LOGO, `LOGO_EMPRESA` = :LOGO_EMPRESA, `WEB_CRTM` = :WEB_CRTM, 
        `CAMARA_COMERCIO` = :CAMARA_COMERCIO, `SALIDA_EMERGENCIA` = :SALIDA_EMERGENCIA, `GRUPO_RUIZ` = :GRUPO_RUIZ, `NUMERO_VEHICULO` = :NUMERO_VEHICULO, 
        `CRTM_LOGO_OBS` = :CRTM_LOGO_OBS, `LOGO_EMPRESA_OBS` = :LOGO_EMPRESA_OBS, `WEB_CRTM_OBS` = :WEB_CRTM_OBS, `CAMARA_COMERCIO_OBS` = :CAMARA_COMERCIO_OBS, 
        `SALIDA_EMERGENCIA_OBS` = :SALIDA_EMERGENCIA_OBS, `GRUPO_RUIZ_OBS` = :GRUPO_RUIZ_OBS, `NUMERO_VEHICULO_OBS` = :NUMERO_VEHICULO_OBS, TRASPASADO = 0, USUARIO = :USUARIO
        WHERE id = {$datos['IDELI']}";

        $stFlota = $conn->prepare($queryFlota);

        $fecha = date('Y-m-d');
        $hora = date('H:i:s');

        $stFlota->bindParam(":FECHA", $fecha);
        $stFlota->bindValue(":HORA", $hora);
        $stFlota->bindValue(":CRTM_LOGO", isset($datos['CRTM_LOGO_ELI']) ? $datos['CRTM_LOGO_ELI'] : NULL);
        $stFlota->bindValue(":LOGO_EMPRESA", isset($datos['LOGO_EMPRESA_ELI']) ? $datos['LOGO_EMPRESA_ELI'] : NULL);
        $stFlota->bindValue(":WEB_CRTM", isset($datos['WEB_CRTM_ELI']) ? $datos['WEB_CRTM_ELI'] : NULL);
        $stFlota->bindValue(":CAMARA_COMERCIO", isset($datos['CAMARA_COMERCIO_ELI']) ? $datos['CAMARA_COMERCIO_ELI'] : NULL);
        $stFlota->bindValue(":SALIDA_EMERGENCIA", isset($datos['SALIDA_EMERGENCIA_ELI']) ? $datos['SALIDA_EMERGENCIA_ELI'] : NULL);
        $stFlota->bindValue(":GRUPO_RUIZ", isset($datos['GRUPO_RUIZ_ELI']) ? $datos['GRUPO_RUIZ_ELI'] : NULL);
        $stFlota->bindValue(":NUMERO_VEHICULO", isset($datos['NUMERO_VEHICULO_ELI']) ? $datos['NUMERO_VEHICULO_ELI'] : NULL);
        $stFlota->bindValue(":CRTM_LOGO_OBS", (!empty($datos['CRTM_LOGO_ELI_OBS'])) ? $datos['CRTM_LOGO_ELI_OBS'] : NULL);
        $stFlota->bindValue(":LOGO_EMPRESA_OBS", (!empty($datos['LOGO_EMPRESA_ELI_OBS'])) ? $datos['LOGO_EMPRESA_ELI_OBS'] : NULL);
        $stFlota->bindValue(":WEB_CRTM_OBS", (!empty($datos['WEB_CRTM_ELI_OBS'])) ? $datos['WEB_CRTM_ELI_OBS'] : NULL);
        $stFlota->bindValue(":CAMARA_COMERCIO_OBS", (!empty($datos['CAMARA_COMERCIO_ELI_OBS'])) ? $datos['CAMARA_COMERCIO_ELI_OBS'] : NULL);
        $stFlota->bindValue(":SALIDA_EMERGENCIA_OBS", (!empty($datos['SALIDA_EMERGENCIA_ELI_OBS'])) ? $datos['SALIDA_EMERGENCIA_ELI_OBS'] : NULL);
        $stFlota->bindValue(":GRUPO_RUIZ_OBS", (!empty($datos['GRUPO_RUIZ_ELI_OBS'])) ? $datos['GRUPO_RUIZ_ELI_OBS'] : NULL);
        $stFlota->bindValue(":NUMERO_VEHICULO_OBS", (!empty($datos['NUMERO_VEHICULO_ELI_OBS'])) ? $datos['NUMERO_VEHICULO_ELI_OBS'] : NULL);
        $stFlota->bindValue(":USUARIO", !empty($datos['USUARIO']) ? $datos['USUARIO'] : NULL);

        $stFlota->execute();

        if ($stFlota) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Método para insertar las revision de las pegatinas de la luna trasera del vehículo.
     * 
     * @access private
     * 
     * @param array $datos Array con los datos de las revisiones realizadas
     * 
     * @return bool resultado de la operación 
     */
    private static function insertarPegatinasLunaExteriorTrasera($datos)
    {
        $conn = Db::getConector();

        $queryFlota = " INSERT INTO `peg_ext_lunas` (`ID`, ID_EMPRESA, ID_VEHICULO, CODIGO_VEHICULO, ID_USUARIO, FECHA, HORA, `SALIDA_EMERGENCIA`, `GRUPO_RUIZ`, `SALIDA_EMERGENCIA_OBS`, 
        `GRUPO_RUIZ_OBS`, TRASPASADO, USUARIO) VALUES (NULL, :ID_EMPRESA, :ID_VEHICULO, :CODIGO_VEHICULO, :ID_USUARIO, :FECHA, :HORA, :SALIDA_EMERGENCIA, :GRUPO_RUIZ, :SALIDA_EMERGENCIA_OBS, 
        :GRUPO_RUIZ_OBS, '0', :USUARIO)";

        $stFlota = $conn->prepare($queryFlota);

        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        $stFlota->bindParam(":ID_EMPRESA", $datos['EMPRESA']);
        $stFlota->bindParam(":ID_VEHICULO", $datos['IDVEHICULO']);
        $stFlota->bindParam(":CODIGO_VEHICULO", $datos['CODIGO_VEHICULO']);
        $stFlota->bindValue(":ID_USUARIO", isset($datos['IDUSUARIO']) ? $datos['IDUSUARIO'] : 0);
        $stFlota->bindParam(":FECHA", $fecha);
        $stFlota->bindValue(":HORA", $hora);
        $stFlota->bindValue(":SALIDA_EMERGENCIA", isset($datos['SALIDA_EMERGENCIA_EL']) ? $datos['SALIDA_EMERGENCIA_EL'] : NULL);
        $stFlota->bindValue(":GRUPO_RUIZ", isset($datos['GRUPO_RUIZ_EL']) ? $datos['GRUPO_RUIZ_EL'] : NULL);
        $stFlota->bindValue(":SALIDA_EMERGENCIA_OBS", isset($datos['SALIDA_EMERGENCIA_EL_OBS']) ? $datos['SALIDA_EMERGENCIA_EL_OBS'] : NULL);
        $stFlota->bindValue(":GRUPO_RUIZ_OBS", isset($datos['GRUPO_RUIZ_EL_OBS']) ? $datos['GRUPO_RUIZ_EL_OBS'] : NULL);
        $stFlota->bindValue(":USUARIO", !empty($datos['USUARIO']) ? $datos['USUARIO'] : NULL);

        $stFlota->execute();

        if ($stFlota) {
            return true;
        } else {
            return false;
        }
    }

        /**
     * Método para insertar las revision de las pegatinas de la luna trasera del vehículo.
     * 
     * @access private
     * 
     * @param array $datos Array con los datos de las revisiones realizadas
     * 
     * @return bool resultado de la operación 
     */
    private static function actualizarPegatinasLunaExteriorTrasera($datos)
    {
        $conn = Db::getConector();

        $queryFlota = "UPDATE `peg_ext_lunas` SET FECHA = :FECHA, HORA = :HORA, `SALIDA_EMERGENCIA` = :SALIDA_EMERGENCIA, `GRUPO_RUIZ` = :GRUPO_RUIZ, 
        `SALIDA_EMERGENCIA_OBS` = :SALIDA_EMERGENCIA_OBS, `GRUPO_RUIZ_OBS` = :GRUPO_RUIZ_OBS, TRASPASADO = 0, USUARIO = :USUARIO WHERE id = {$datos['IDELuna']}";

        $stFlota = $conn->prepare($queryFlota);

        $fecha = date('Y-m-d');
        $hora = date('H:i:s');

        $stFlota->bindParam(":FECHA", $fecha);
        $stFlota->bindValue(":HORA", $hora);
        $stFlota->bindValue(":SALIDA_EMERGENCIA", isset($datos['SALIDA_EMERGENCIA_EL']) ? $datos['SALIDA_EMERGENCIA_EL'] : NULL);
        $stFlota->bindValue(":GRUPO_RUIZ", isset($datos['GRUPO_RUIZ_EL']) ? $datos['GRUPO_RUIZ_EL'] : NULL);
        $stFlota->bindValue(":SALIDA_EMERGENCIA_OBS", isset($datos['SALIDA_EMERGENCIA_EL_OBS']) ? $datos['SALIDA_EMERGENCIA_EL_OBS'] : NULL);
        $stFlota->bindValue(":GRUPO_RUIZ_OBS", isset($datos['GRUPO_RUIZ_EL_OBS']) ? $datos['GRUPO_RUIZ_EL_OBS'] : NULL);
        $stFlota->bindValue(":USUARIO", !empty($datos['USUARIO']) ? $datos['USUARIO'] : NULL);

        $stFlota->execute();

        if ($stFlota) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Método para insertar las revision de las pegatinas del exterior trasero del vehículo.
     * 
     * @access private
     * 
     * @param array $datos Array con los datos de las revisiones realizadas
     * 
     * @return bool resultado de la operación 
     */
    private static function insertarPegatinasExteriorTrasero($datos)
    {
        $conn = Db::getConector();

        $queryFlota = " INSERT INTO `peg_ext_trasera` (`ID`, ID_EMPRESA, ID_VEHICULO, CODIGO_VEHICULO, ID_USUARIO, FECHA, HORA, `CRTM_LOGO`, `LOGO_EMPRESA`, `WEB_CRTM`, `WEB_EMPRESA`, `NUMERO_VEHICULO`, 
        `SALIDA_EMERGENCIA`, `CRTM_LOGO_OBS`, `LOGO_EMPRESA_OBS`, `WEB_CRTM_OBS`, `WEB_EMPRESA_OBS`, `NUMERO_VEHICULO_OBS`, `SALIDA_EMERGENCIA_OBS`, TRASPASADO, USUARIO) 
        VALUES (NULL, :ID_EMPRESA, :ID_VEHICULO, :CODIGO_VEHICULO, :ID_USUARIO, :FECHA, :HORA, :CRTM_LOGO, :LOGO_EMPRESA, :WEB_CRTM, :WEB_EMPRESA, :NUMERO_VEHICULO, :SALIDA_EMERGENCIA, 
        :CRTM_LOGO_OBS, :LOGO_EMPRESA_OBS, :WEB_CRTM_OBS, :WEB_EMPRESA_OBS, :NUMERO_VEHICULO_OBS, :SALIDA_EMERGENCIA_OBS, '0', :USUARIO)";

        $stFlota = $conn->prepare($queryFlota);

        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        $stFlota->bindParam(":ID_EMPRESA", $datos['EMPRESA']);
        $stFlota->bindParam(":ID_VEHICULO", $datos['IDVEHICULO']);
        $stFlota->bindParam(":CODIGO_VEHICULO", $datos['CODIGO_VEHICULO']);
        $stFlota->bindValue(":ID_USUARIO", isset($datos['IDUSUARIO']) ? $datos['IDUSUARIO'] : 0);
        $stFlota->bindParam(":FECHA", $fecha);
        $stFlota->bindValue(":HORA", $hora);
        $stFlota->bindValue(":CRTM_LOGO", isset($datos['CRTM_LOGO_ET']) ? $datos['CRTM_LOGO_ET'] : NULL);
        $stFlota->bindValue(":LOGO_EMPRESA", isset($datos['LOGO_EMPRESA_ET']) ? $datos['LOGO_EMPRESA_ET'] : NULL);
        $stFlota->bindValue(":WEB_CRTM", isset($datos['WEB_CRTM_ET']) ? $datos['WEB_CRTM_ET'] : NULL);
        $stFlota->bindValue(":WEB_EMPRESA", isset($datos['WEB_EMPRESA_ET']) ? $datos['WEB_EMPRESA_ET'] : NULL);
        $stFlota->bindValue(":NUMERO_VEHICULO", isset($datos['NUMERO_VEHICULO_ET']) ? $datos['NUMERO_VEHICULO_ET'] : NULL);
        $stFlota->bindValue(":SALIDA_EMERGENCIA", isset($datos['SALIDA_EMERGENCIA_ET']) ? $datos['SALIDA_EMERGENCIA_ET'] : NULL);
        $stFlota->bindValue(":CRTM_LOGO_OBS", isset($datos['CRTM_LOGO_ET_OBS']) ? $datos['CRTM_LOGO_ET_OBS'] : NULL);
        $stFlota->bindValue(":LOGO_EMPRESA_OBS", isset($datos['LOGO_EMPRESA_ET_OBS']) ? $datos['LOGO_EMPRESA_ET_OBS'] : NULL);
        $stFlota->bindValue(":WEB_CRTM_OBS", isset($datos['WEB_CRTM_ET_OBS']) ? $datos['WEB_CRTM_ET_OBS'] : NULL);
        $stFlota->bindValue(":WEB_EMPRESA_OBS", isset($datos['WEB_EMPRESA_ET_OBS']) ? $datos['WEB_EMPRESA_ET_OBS'] : NULL);
        $stFlota->bindValue(":NUMERO_VEHICULO_OBS", isset($datos['NUMERO_VEHICULO_ET_OBS']) ? $datos['NUMERO_VEHICULO_ET_OBS'] : NULL);
        $stFlota->bindValue(":SALIDA_EMERGENCIA_OBS", isset($datos['SALIDA_EMERGENCIA_ET_OBS']) ? $datos['SALIDA_EMERGENCIA_ET_OBS'] : NULL);
        $stFlota->bindValue(":USUARIO", !empty($datos['USUARIO']) ? $datos['USUARIO'] : NULL);
        $stFlota->execute();

        if ($stFlota) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Método para insertar las revision de las pegatinas del exterior trasero del vehículo.
     * 
     * @access private
     * 
     * @param array $datos Array con los datos de las revisiones realizadas
     * 
     * @return bool resultado de la operación 
     */
    private static function actualizarPegatinasExteriorTrasero($datos)
    {
        $conn = Db::getConector();

        $queryFlota = "UPDATE `peg_ext_trasera` SET FECHA = :FECHA, HORA = :HORA, `CRTM_LOGO` = :CRTM_LOGO, `LOGO_EMPRESA` = :LOGO_EMPRESA, `WEB_CRTM` = :WEB_CRTM, 
        `WEB_EMPRESA` = :WEB_EMPRESA, `NUMERO_VEHICULO` = :NUMERO_VEHICULO, `SALIDA_EMERGENCIA` = :SALIDA_EMERGENCIA, `CRTM_LOGO_OBS` = :CRTM_LOGO_OBS, 
        `LOGO_EMPRESA_OBS` = :LOGO_EMPRESA_OBS, `WEB_CRTM_OBS` = :WEB_CRTM_OBS, `WEB_EMPRESA_OBS` = :WEB_EMPRESA_OBS, `NUMERO_VEHICULO_OBS` = :NUMERO_VEHICULO_OBS, 
        `SALIDA_EMERGENCIA_OBS` = :SALIDA_EMERGENCIA_OBS, TRASPASADO = 0, USUARIO = :USUARIO WHERE id = {$datos['IDET']}";

        $stFlota = $conn->prepare($queryFlota);

        $fecha = date('Y-m-d');
        $hora = date('H:i:s');

        $stFlota->bindParam(":FECHA", $fecha);
        $stFlota->bindValue(":HORA", $hora);
        $stFlota->bindValue(":CRTM_LOGO", isset($datos['CRTM_LOGO_ET']) ? $datos['CRTM_LOGO_ET'] : NULL);
        $stFlota->bindValue(":LOGO_EMPRESA", isset($datos['LOGO_EMPRESA_ET']) ? $datos['LOGO_EMPRESA_ET'] : NULL);
        $stFlota->bindValue(":WEB_CRTM", isset($datos['WEB_CRTM_ET']) ? $datos['WEB_CRTM_ET'] : NULL);
        $stFlota->bindValue(":WEB_EMPRESA", isset($datos['WEB_EMPRESA_ET']) ? $datos['WEB_EMPRESA_ET'] : NULL);
        $stFlota->bindValue(":NUMERO_VEHICULO", isset($datos['NUMERO_VEHICULO_ET']) ? $datos['NUMERO_VEHICULO_ET'] : NULL);
        $stFlota->bindValue(":SALIDA_EMERGENCIA", isset($datos['SALIDA_EMERGENCIA_ET']) ? $datos['SALIDA_EMERGENCIA_ET'] : NULL);
        $stFlota->bindValue(":CRTM_LOGO_OBS", isset($datos['CRTM_LOGO_ET_OBS']) ? $datos['CRTM_LOGO_ET_OBS'] : NULL);
        $stFlota->bindValue(":LOGO_EMPRESA_OBS", isset($datos['LOGO_EMPRESA_ET_OBS']) ? $datos['LOGO_EMPRESA_ET_OBS'] : NULL);
        $stFlota->bindValue(":WEB_CRTM_OBS", isset($datos['WEB_CRTM_ET_OBS']) ? $datos['WEB_CRTM_ET_OBS'] : NULL);
        $stFlota->bindValue(":WEB_EMPRESA_OBS", isset($datos['WEB_EMPRESA_ET_OBS']) ? $datos['WEB_EMPRESA_ET_OBS'] : NULL);
        $stFlota->bindValue(":NUMERO_VEHICULO_OBS", isset($datos['NUMERO_VEHICULO_ET_OBS']) ? $datos['NUMERO_VEHICULO_ET_OBS'] : NULL);
        $stFlota->bindValue(":SALIDA_EMERGENCIA_OBS", isset($datos['SALIDA_EMERGENCIA_ET_OBS']) ? $datos['SALIDA_EMERGENCIA_ET_OBS'] : NULL);
        $stFlota->bindValue(":USUARIO", !empty($datos['USUARIO']) ? $datos['USUARIO'] : NULL);
        $stFlota->execute();

        if ($stFlota) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Método para insertar las revision de las pegatinas del interior delantero del vehículo.
     * 
     * @access private
     * 
     * @param array $datos Array con los datos de las revisiones realizadas
     * 
     * @return bool resultado de la operación 
     */
    private static function insertarPegatinasInteriorDelantero($datos)
    {
        $conn = Db::getConector();

        $queryFlota = " INSERT INTO `peg_int_del` (`ID`, ID_EMPRESA, ID_VEHICULO, CODIGO_VEHICULO, ID_USUARIO, FECHA, HORA, `VIDEOVIGILANCIA`, `PROHIBIDO_FUMAR`, `PTM`, `CAMBIO_MAXIMO`, 
        `TARIFAS`, `OCUPACION_MAXIMA`, `BOTIQUIN`, `SALIDA_EMERGENCIA`, `VIDEOVIGILANCIA_OBS`, `PROHIBIDO_FUMAR_OBS`, 
        `PTM_OBS`, `CAMBIO_MAXIMO_OBS`, `TARIFAS_OBS`, `OCUPACION_MAXIMA_OBS`, `BOTIQUIN_OBS`, `SALIDA_EMERGENCIA_OBS`, TRASPASADO, USUARIO) 
        VALUES (NULL, :ID_EMPRESA, :ID_VEHICULO, :CODIGO_VEHICULO, :ID_USUARIO, :FECHA, :HORA,  :VIDEOVIGILANCIA, :PROHIBIDO_FUMAR, :PTM, :CAMBIO_MAXIMO, :TARIFAS, 
        :OCUPACION_MAXIMA, :BOTIQUIN, :SALIDA_EMERGENCIA, :VIDEOVIGILANCIA_OBS, :PROHIBIDO_FUMAR_OBS, :PTM_OBS, :CAMBIO_MAXIMO_OBS, :TARIFAS_OBS, 
        :OCUPACION_MAXIMA_OBS, :BOTIQUIN_OBS, :SALIDA_EMERGENCIA_OBS, '0', :USUARIO)";

        $stFlota = $conn->prepare($queryFlota);

        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        $stFlota->bindParam(":ID_EMPRESA", $datos['EMPRESA']);
        $stFlota->bindParam(":ID_VEHICULO", $datos['IDVEHICULO']);
        $stFlota->bindParam(":CODIGO_VEHICULO", $datos['CODIGO_VEHICULO']);
        $stFlota->bindValue(":ID_USUARIO", isset($datos['IDUSUARIO']) ? $datos['IDUSUARIO'] : 0);
        $stFlota->bindParam(":FECHA", $fecha);
        $stFlota->bindValue(":HORA", $hora);
        $stFlota->bindValue(":VIDEOVIGILANCIA", isset($datos['VIDEOVIGILANCIA_ID']) ? $datos['VIDEOVIGILANCIA_ID'] : NULL);
        $stFlota->bindValue(":PROHIBIDO_FUMAR", isset($datos['PROHIBIDO_FUMAR_ID']) ? $datos['PROHIBIDO_FUMAR_ID'] : NULL);
        $stFlota->bindValue(":PTM", isset($datos['PTM_ID']) ? $datos['PTM_ID'] : NULL);
        $stFlota->bindValue(":CAMBIO_MAXIMO", isset($datos['CAMBIO_MAXIMO_ID']) ? $datos['CAMBIO_MAXIMO_ID'] : NULL);
        $stFlota->bindValue(":TARIFAS", isset($datos['TARIFAS_ID']) ? $datos['TARIFAS_ID'] : NULL);
        $stFlota->bindValue(":OCUPACION_MAXIMA", isset($datos['OCUPACION_MAXIMA_ID']) ? $datos['OCUPACION_MAXIMA_ID'] : NULL);
        $stFlota->bindValue(":BOTIQUIN", isset($datos['BOTIQUIN_ID']) ? $datos['BOTIQUIN_ID'] : NULL);
        $stFlota->bindValue(":SALIDA_EMERGENCIA", isset($datos['SALIDA_EMERGENCIA_ID']) ? $datos['SALIDA_EMERGENCIA_ID'] : NULL);
        $stFlota->bindValue(":VIDEOVIGILANCIA_OBS", isset($datos['VIDEOVIGILANCIA_ID_OBS']) ? $datos['VIDEOVIGILANCIA_ID_OBS'] : NULL);
        $stFlota->bindValue(":PROHIBIDO_FUMAR_OBS", isset($datos['PROHIBIDO_FUMAR_ID_OBS']) ? $datos['PROHIBIDO_FUMAR_ID_OBS'] : NULL);
        $stFlota->bindValue(":PTM_OBS", isset($datos['PTM_ID_OBS']) ? $datos['PTM_ID_OBS'] : NULL);
        $stFlota->bindValue(":CAMBIO_MAXIMO_OBS", isset($datos['CAMBIO_MAXIMO_ID_OBS']) ? $datos['CAMBIO_MAXIMO_ID_OBS'] : NULL);
        $stFlota->bindValue(":TARIFAS_OBS", isset($datos['TARIFAS_ID_OBS']) ? $datos['TARIFAS_ID_OBS'] : NULL);
        $stFlota->bindValue(":OCUPACION_MAXIMA_OBS", isset($datos['OCUPACION_MAXIMA_ID_OBS']) ? $datos['OCUPACION_MAXIMA_ID_OBS'] : NULL);
        $stFlota->bindValue(":BOTIQUIN_OBS", isset($datos['BOTIQUIN_ID_OBS']) ? $datos['BOTIQUIN_ID_OBS'] : NULL);
        $stFlota->bindValue(":SALIDA_EMERGENCIA_OBS", isset($datos['SALIDA_EMERGENCIA_ID_OBS']) ? $datos['SALIDA_EMERGENCIA_ID_OBS'] : NULL);
        $stFlota->bindValue(":USUARIO", !empty($datos['USUARIO']) ? $datos['USUARIO'] : NULL);

        $stFlota->execute();

        if ($stFlota) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Método para insertar las revision de las pegatinas del interior delantero del vehículo.
     * 
     * @access private
     * 
     * @param array $datos Array con los datos de las revisiones realizadas
     * 
     * @return bool resultado de la operación 
     */
    private static function actualizarPegatinasInteriorDelantero($datos)
    {
        $conn = Db::getConector();

        $queryFlota = "UPDATE `peg_int_del` SET FECHA = :FECHA, HORA = :HORA, `VIDEOVIGILANCIA` = :VIDEOVIGILANCIA, `PROHIBIDO_FUMAR` = :PROHIBIDO_FUMAR, `PTM` = :PTM, `CAMBIO_MAXIMO` = :CAMBIO_MAXIMO, 
        `TARIFAS` = :TARIFAS, `OCUPACION_MAXIMA` = :OCUPACION_MAXIMA, `BOTIQUIN` = :BOTIQUIN, `SALIDA_EMERGENCIA` = :SALIDA_EMERGENCIA, `VIDEOVIGILANCIA_OBS` = :VIDEOVIGILANCIA_OBS, 
        `PROHIBIDO_FUMAR_OBS` = :PROHIBIDO_FUMAR_OBS, `PTM_OBS` = :PTM_OBS, `CAMBIO_MAXIMO_OBS` = :CAMBIO_MAXIMO_OBS, `TARIFAS_OBS` = :TARIFAS_OBS, 
        `OCUPACION_MAXIMA_OBS` = :OCUPACION_MAXIMA_OBS, `BOTIQUIN_OBS` = :BOTIQUIN_OBS, `SALIDA_EMERGENCIA_OBS` = :SALIDA_EMERGENCIA_OBS, TRASPASADO = 0, 
        USUARIO = :USUARIO WHERE id = {$datos['IDID']}";

        $stFlota = $conn->prepare($queryFlota);

        $fecha = date('Y-m-d');
        $hora = date('H:i:s');

        $stFlota->bindParam(":FECHA", $fecha);
        $stFlota->bindValue(":HORA", $hora);
        $stFlota->bindValue(":VIDEOVIGILANCIA", isset($datos['VIDEOVIGILANCIA_ID']) ? $datos['VIDEOVIGILANCIA_ID'] : NULL);
        $stFlota->bindValue(":PROHIBIDO_FUMAR", isset($datos['PROHIBIDO_FUMAR_ID']) ? $datos['PROHIBIDO_FUMAR_ID'] : NULL);
        $stFlota->bindValue(":PTM", isset($datos['PTM_ID']) ? $datos['PTM_ID'] : NULL);
        $stFlota->bindValue(":CAMBIO_MAXIMO", isset($datos['CAMBIO_MAXIMO_ID']) ? $datos['CAMBIO_MAXIMO_ID'] : NULL);
        $stFlota->bindValue(":TARIFAS", isset($datos['TARIFAS_ID']) ? $datos['TARIFAS_ID'] : NULL);
        $stFlota->bindValue(":OCUPACION_MAXIMA", isset($datos['OCUPACION_MAXIMA_ID']) ? $datos['OCUPACION_MAXIMA_ID'] : NULL);
        $stFlota->bindValue(":BOTIQUIN", isset($datos['BOTIQUIN_ID']) ? $datos['BOTIQUIN_ID'] : NULL);
        $stFlota->bindValue(":SALIDA_EMERGENCIA", isset($datos['SALIDA_EMERGENCIA_ID']) ? $datos['SALIDA_EMERGENCIA_ID'] : NULL);
        $stFlota->bindValue(":VIDEOVIGILANCIA_OBS", isset($datos['VIDEOVIGILANCIA_ID_OBS']) ? $datos['VIDEOVIGILANCIA_ID_OBS'] : NULL);
        $stFlota->bindValue(":PROHIBIDO_FUMAR_OBS", isset($datos['PROHIBIDO_FUMAR_ID_OBS']) ? $datos['PROHIBIDO_FUMAR_ID_OBS'] : NULL);
        $stFlota->bindValue(":PTM_OBS", isset($datos['PTM_ID_OBS']) ? $datos['PTM_ID_OBS'] : NULL);
        $stFlota->bindValue(":CAMBIO_MAXIMO_OBS", isset($datos['CAMBIO_MAXIMO_ID_OBS']) ? $datos['CAMBIO_MAXIMO_ID_OBS'] : NULL);
        $stFlota->bindValue(":TARIFAS_OBS", isset($datos['TARIFAS_ID_OBS']) ? $datos['TARIFAS_ID_OBS'] : NULL);
        $stFlota->bindValue(":OCUPACION_MAXIMA_OBS", isset($datos['OCUPACION_MAXIMA_ID_OBS']) ? $datos['OCUPACION_MAXIMA_ID_OBS'] : NULL);
        $stFlota->bindValue(":BOTIQUIN_OBS", isset($datos['BOTIQUIN_ID_OBS']) ? $datos['BOTIQUIN_ID_OBS'] : NULL);
        $stFlota->bindValue(":SALIDA_EMERGENCIA_OBS", isset($datos['SALIDA_EMERGENCIA_ID_OBS']) ? $datos['SALIDA_EMERGENCIA_ID_OBS'] : NULL);
        $stFlota->bindValue(":USUARIO", !empty($datos['USUARIO']) ? $datos['USUARIO'] : NULL);

        $stFlota->execute();

        if ($stFlota) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Método para insertar las revision de las pegatinas del interior central del vehículo.
     * 
     * @access private
     * 
     * @param array $datos Array con los datos de las revisiones realizadas
     * 
     * @return bool resultado de la operación 
     */
    private static function insertarPegatinasInteriorCentral($datos)
    {
        $conn = Db::getConector();

        $queryFlota = " INSERT INTO `peg_int_central` (`ID`, ID_EMPRESA, ID_VEHICULO, CODIGO_VEHICULO, ID_USUARIO, FECHA, HORA, `TARIFAS`, `PLAN_EVACUACION`, `COVID`, 
        `QR_ENCUESTA`, `TARIFAS_OBS`, `PLAN_EVACUACION_OBS`, `COVID_OBS`, `QR_ENCUESTA_OBS`, TRASPASADO, USUARIO) 
        VALUES (NULL,  :ID_EMPRESA, :ID_VEHICULO, :CODIGO_VEHICULO, :ID_USUARIO, :FECHA, :HORA, :TARIFAS, :PLAN_EVACUACION, :COVID, :QR_ENCUESTA, 
        :TARIFAS_OBS, :PLAN_EVACUACION_OBS, :COVID_OBS, :QR_ENCUESTA_OBS, '0', :USUARIO)";

        $stFlota = $conn->prepare($queryFlota);

        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        $stFlota->bindParam(":ID_EMPRESA", $datos['EMPRESA']);
        $stFlota->bindParam(":ID_VEHICULO", $datos['IDVEHICULO']);
        $stFlota->bindParam(":CODIGO_VEHICULO", $datos['CODIGO_VEHICULO']);
        $stFlota->bindValue(":ID_USUARIO", isset($datos['IDUSUARIO']) ? $datos['IDUSUARIO'] : 0);
        $stFlota->bindParam(":FECHA", $fecha);
        $stFlota->bindValue(":HORA", $hora);
        $stFlota->bindValue(":TARIFAS", isset($datos['TARIFAS_IC']) ? $datos['TARIFAS_IC'] : NULL);
        $stFlota->bindValue(":PLAN_EVACUACION", isset($datos['PLAN_EVACUACION_IC']) ? $datos['PLAN_EVACUACION_IC'] : NULL);
        $stFlota->bindValue(":COVID", isset($datos['COVID_IC']) ? $datos['COVID_IC'] : NULL);
        $stFlota->bindValue(":QR_ENCUESTA", isset($datos['QR_ENCUESTA_IC']) ? $datos['QR_ENCUESTA_IC'] : NULL);
        $stFlota->bindValue(":TARIFAS_OBS", isset($datos['TARIFAS_IC_OBS']) ? $datos['TARIFAS_IC_OBS'] : NULL);
        $stFlota->bindValue(":PLAN_EVACUACION_OBS", isset($datos['PLAN_EVACUACION_IC_OBS']) ? $datos['PLAN_EVACUACION_IC_OBS'] : NULL);
        $stFlota->bindValue(":COVID_OBS", isset($datos['COVID_IC_OBS']) ? $datos['COVID_IC_OBS'] : NULL);
        $stFlota->bindValue(":QR_ENCUESTA_OBS", isset($datos['QR_ENCUESTA_IC_OBS']) ? $datos['QR_ENCUESTA_IC_OBS'] : NULL);
        $stFlota->bindValue(":USUARIO", !empty($datos['USUARIO']) ? $datos['USUARIO'] : NULL);
        $stFlota->execute();

        if ($stFlota) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Método para insertar las revision de las pegatinas del interior central del vehículo.
     * 
     * @access private
     * 
     * @param array $datos Array con los datos de las revisiones realizadas
     * 
     * @return bool resultado de la operación 
     */
    private static function actualizarPegatinasInteriorCentral($datos)
    {
        $conn = Db::getConector();

        $queryFlota = "UPDATE `peg_int_central` SET FECHA = :FECHA, HORA = :HORA, `TARIFAS` = :TARIFAS, `PLAN_EVACUACION` = :PLAN_EVACUACION, `COVID` = :COVID, 
        `QR_ENCUESTA` = :QR_ENCUESTA, `TARIFAS_OBS` = :TARIFAS_OBS, `PLAN_EVACUACION_OBS` = :PLAN_EVACUACION_OBS, `COVID_OBS` = :COVID_OBS, 
        `QR_ENCUESTA_OBS` = :QR_ENCUESTA_OBS, TRASPASADO = 0, USUARIO = :USUARIO";

        $stFlota = $conn->prepare($queryFlota);

        $fecha = date('Y-m-d');
        $hora = date('H:i:s');

        $stFlota->bindParam(":FECHA", $fecha);
        $stFlota->bindValue(":HORA", $hora);
        $stFlota->bindValue(":TARIFAS", isset($datos['TARIFAS_IC']) ? $datos['TARIFAS_IC'] : NULL);
        $stFlota->bindValue(":PLAN_EVACUACION", isset($datos['PLAN_EVACUACION_IC']) ? $datos['PLAN_EVACUACION_IC'] : NULL);
        $stFlota->bindValue(":COVID", isset($datos['COVID_IC']) ? $datos['COVID_IC'] : NULL);
        $stFlota->bindValue(":QR_ENCUESTA", isset($datos['QR_ENCUESTA_IC']) ? $datos['QR_ENCUESTA_IC'] : NULL);
        $stFlota->bindValue(":TARIFAS_OBS", isset($datos['TARIFAS_IC_OBS']) ? $datos['TARIFAS_IC_OBS'] : NULL);
        $stFlota->bindValue(":PLAN_EVACUACION_OBS", isset($datos['PLAN_EVACUACION_IC_OBS']) ? $datos['PLAN_EVACUACION_IC_OBS'] : NULL);
        $stFlota->bindValue(":COVID_OBS", isset($datos['COVID_IC_OBS']) ? $datos['COVID_IC_OBS'] : NULL);
        $stFlota->bindValue(":QR_ENCUESTA_OBS", isset($datos['QR_ENCUESTA_IC_OBS']) ? $datos['QR_ENCUESTA_IC_OBS'] : NULL);
        $stFlota->bindValue(":USUARIO", !empty($datos['USUARIO']) ? $datos['USUARIO'] : NULL);
        $stFlota->execute();

        if ($stFlota) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Método para insertar las revision de las pegatinas de la luna interior del vehículo.
     * 
     * @access private
     * 
     * @param array $datos Array con los datos de las revisiones realizadas
     * 
     * @return bool resultado de la operación 
     */
    private static function insertarPegatinasLunaInterior($datos)
    {
        $conn = Db::getConector();

        $queryFlota = " INSERT INTO `peg_int_luna` (`ID`, ID_EMPRESA, ID_VEHICULO, CODIGO_VEHICULO, ID_USUARIO, FECHA, HORA, `CINTURON_SEGURIDAD`, `MARTILLOS`, `EXTINTORES`, 
        `CINTURON_SEGURIDAD_OBS`, `MARTILLOS_OBS`, `EXTINTORES_OBS`, TRASPASADO, USUARIO) 
        VALUES (NULL, :ID_EMPRESA, :ID_VEHICULO, :CODIGO_VEHICULO, :ID_USUARIO, :FECHA, :HORA, :CINTURON_SEGURIDAD, :MARTILLOS, :EXTINTORES, :CINTURON_SEGURIDAD_OBS, 
        :MARTILLOS_OBS, :EXTINTORES_OBS, '0', :USUARIO)";

        $stFlota = $conn->prepare($queryFlota);

        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        $stFlota->bindParam(":ID_EMPRESA", $datos['EMPRESA']);
        $stFlota->bindParam(":ID_VEHICULO", $datos['IDVEHICULO']);
        $stFlota->bindParam(":CODIGO_VEHICULO", $datos['CODIGO_VEHICULO']);
        $stFlota->bindValue(":ID_USUARIO", isset($datos['IDUSUARIO']) ? $datos['IDUSUARIO'] : 0);
        $stFlota->bindParam(":FECHA", $fecha);
        $stFlota->bindValue(":HORA", $hora);
        $stFlota->bindValue(":CINTURON_SEGURIDAD", isset($datos['CINTURON_SEGURIDAD_IL']) ? $datos['CINTURON_SEGURIDAD_IL'] : NULL);
        $stFlota->bindValue(":MARTILLOS", isset($datos['MARTILLOS_IL']) ? $datos['MARTILLOS_IL'] : NULL);
        $stFlota->bindValue(":EXTINTORES", isset($datos['EXTINTORES_IL']) ? $datos['EXTINTORES_IL'] : NULL);
        $stFlota->bindValue(":CINTURON_SEGURIDAD_OBS", isset($datos['CINTURON_SEGURIDAD_IL_OBS']) ? $datos['CINTURON_SEGURIDAD_IL_OBS'] : NULL);
        $stFlota->bindValue(":MARTILLOS_OBS", isset($datos['MARTILLOS_IL_OBS']) ? $datos['MARTILLOS_IL_OBS'] : NULL);
        $stFlota->bindValue(":EXTINTORES_OBS", isset($datos['EXTINTORES_IL_OBS']) ? $datos['EXTINTORES_IL_OBS'] : NULL);
        $stFlota->bindValue(":USUARIO", !empty($datos['USUARIO']) ? $datos['USUARIO'] : NULL);

        $stFlota->execute();

        if ($stFlota) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Método para insertar las revision de las pegatinas de la luna interior del vehículo.
     * 
     * @access private
     * 
     * @param array $datos Array con los datos de las revisiones realizadas
     * 
     * @return bool resultado de la operación 
     */
    private static function actualizarPegatinasLunaInterior($datos)
    {
        $conn = Db::getConector();

        $queryFlota = "UPDATE `peg_int_luna` SET FECHA = :FECHA, HORA = :HORA, `CINTURON_SEGURIDAD` = :CINTURON_SEGURIDAD, `MARTILLOS` = :MARTILLOS, `EXTINTORES` = :EXTINTORES, 
        `CINTURON_SEGURIDAD_OBS` = :CINTURON_SEGURIDAD_OBS, `MARTILLOS_OBS` = :MARTILLOS_OBS, `EXTINTORES_OBS` = :EXTINTORES_OBS, TRASPASADO = 0, USUARIO = :USUARIO  
        WHERE id = {$datos['IDILuna']}";

        $stFlota = $conn->prepare($queryFlota);

        $fecha = date('Y-m-d');
        $hora = date('H:i:s');

        $stFlota->bindParam(":FECHA", $fecha);
        $stFlota->bindValue(":HORA", $hora);
        $stFlota->bindValue(":CINTURON_SEGURIDAD", isset($datos['CINTURON_SEGURIDAD_IL']) ? $datos['CINTURON_SEGURIDAD_IL'] : NULL);
        $stFlota->bindValue(":MARTILLOS", isset($datos['MARTILLOS_IL']) ? $datos['MARTILLOS_IL'] : NULL);
        $stFlota->bindValue(":EXTINTORES", isset($datos['EXTINTORES_IL']) ? $datos['EXTINTORES_IL'] : NULL);
        $stFlota->bindValue(":CINTURON_SEGURIDAD_OBS", isset($datos['CINTURON_SEGURIDAD_IL_OBS']) ? $datos['CINTURON_SEGURIDAD_IL_OBS'] : NULL);
        $stFlota->bindValue(":MARTILLOS_OBS", isset($datos['MARTILLOS_IL_OBS']) ? $datos['MARTILLOS_IL_OBS'] : NULL);
        $stFlota->bindValue(":EXTINTORES_OBS", isset($datos['EXTINTORES_IL_OBS']) ? $datos['EXTINTORES_IL_OBS'] : NULL);
        $stFlota->bindValue(":USUARIO", !empty($datos['USUARIO']) ? $datos['USUARIO'] : NULL);

        $stFlota->execute();

        if ($stFlota) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Método para insertar las revision de las pegatinas de la luna interior del vehículo.
     * 
     * @access private
     * 
     * @param array $datos Array con los datos de las revisiones realizadas
     * 
     * @return bool resultado de la operación 
     */
    private static function insertarPegatinasInteriorMampara($datos)
    {
        $conn = Db::getConector();

        $queryFlota = " INSERT INTO `peg_int_mampara` (`ID`, ID_EMPRESA, ID_VEHICULO, CODIGO_VEHICULO, ID_USUARIO, FECHA, HORA, `TARIFAS`, `PERRO_GUIA`, `ZONA_RESERVADA_PMR`, `TELEFONO_OPERADOR`, `WEB_CRTM`, 
        `WEB_EMPRESA`, `TARIFAS_OBS`, `PERRO_GUIA_OBS`, `ZONA_RESERVADA_PMR_OBS`, `TELEFONO_OPERADOR_OBS`, `WEB_CRTM_OBS`, `WEB_EMPRESA_OBS`, TRASPASADO, USUARIO) 
        VALUES (NULL, :ID_EMPRESA, :ID_VEHICULO, :CODIGO_VEHICULO, :ID_USUARIO, :FECHA, :HORA, :TARIFAS, :PERRO_GUIA, :ZONA_RESERVADA_PMR, :TELEFONO_OPERADOR, :WEB_CRTM, 
        :WEB_EMPRESA, :TARIFAS_OBS, :PERRO_GUIA_OBS, :ZONA_RESERVADA_PMR_OBS, :TELEFONO_OPERADOR_OBS, :WEB_CRTM_OBS, :WEB_EMPRESA_OBS, '0', :USUARIO)";

        $stFlota = $conn->prepare($queryFlota);

        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        $stFlota->bindParam(":ID_EMPRESA", $datos['EMPRESA']);
        $stFlota->bindParam(":ID_VEHICULO", $datos['IDVEHICULO']);
        $stFlota->bindParam(":CODIGO_VEHICULO", $datos['CODIGO_VEHICULO']);
        $stFlota->bindValue(":ID_USUARIO", isset($datos['IDUSUARIO']) ? $datos['IDUSUARIO'] : 0);
        $stFlota->bindParam(":FECHA", $fecha);
        $stFlota->bindValue(":HORA", $hora);
        $stFlota->bindValue(":TARIFAS", isset($datos['TARIFAS_IM']) ? $datos['TARIFAS_IM'] : NULL);
        $stFlota->bindValue(":PERRO_GUIA", isset($datos['PERRO_GUIA_IM']) ? $datos['PERRO_GUIA_IM'] : NULL);
        $stFlota->bindValue(":ZONA_RESERVADA_PMR", isset($datos['ZONA_RESERVADA_PMR_IM']) ? $datos['ZONA_RESERVADA_PMR_IM'] : NULL);
        $stFlota->bindValue(":TELEFONO_OPERADOR", isset($datos['TELEFONO_OPERADOR_IM']) ? $datos['TELEFONO_OPERADOR_IM'] : NULL);
        $stFlota->bindValue(":WEB_CRTM", isset($datos['WEB_CRTM_IM']) ? $datos['WEB_CRTM_IM'] : NULL);
        $stFlota->bindValue(":WEB_EMPRESA", isset($datos['WEB_EMPRESA_IM']) ? $datos['WEB_EMPRESA_IM'] : NULL);
        $stFlota->bindValue(":TARIFAS_OBS", isset($datos['TARIFAS_IM_OBS']) ? $datos['TARIFAS_IM_OBS'] : NULL);
        $stFlota->bindValue(":PERRO_GUIA_OBS", isset($datos['PERRO_GUIA_IM_OBS']) ? $datos['PERRO_GUIA_IM_OBS'] : NULL);
        $stFlota->bindValue(":ZONA_RESERVADA_PMR_OBS", isset($datos['ZONA_RESERVADA_PMR_IM_OBS']) ? $datos['ZONA_RESERVADA_PMR_IM_OBS'] : NULL);
        $stFlota->bindValue(":TELEFONO_OPERADOR_OBS", isset($datos['TELEFONO_OPERADOR_IM_OBS']) ? $datos['TELEFONO_OPERADOR_IM_OBS'] : NULL);
        $stFlota->bindValue(":WEB_CRTM_OBS", isset($datos['WEB_CRTM_IM_OBS']) ? $datos['WEB_CRTM_IM_OBS'] : NULL);
        $stFlota->bindValue(":WEB_EMPRESA_OBS", isset($datos['WEB_EMPRESA_IM_OBS']) ? $datos['WEB_EMPRESA_IM_OBS'] : NULL);
        $stFlota->bindValue(":USUARIO", !empty($datos['USUARIO']) ? $datos['USUARIO'] : NULL);

        $stFlota->execute();

        if ($stFlota) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Método para insertar las revision de las pegatinas de la luna interior del vehículo.
     * 
     * @access private
     * 
     * @param array $datos Array con los datos de las revisiones realizadas
     * 
     * @return bool resultado de la operación 
     */
    private static function actualizarPegatinasInteriorMampara($datos)
    {
        $conn = Db::getConector();

        $queryFlota = "UPDATE `peg_int_mampara` SET FECHA = :FECHA, HORA = :HORA, `TARIFAS` = :TARIFAS, `PERRO_GUIA` = :PERRO_GUIA, `ZONA_RESERVADA_PMR` = :ZONA_RESERVADA_PMR, 
        `TELEFONO_OPERADOR` = :TELEFONO_OPERADOR, `WEB_CRTM` = :WEB_CRTM, `WEB_EMPRESA` = :WEB_EMPRESA, `TARIFAS_OBS` = :TARIFAS_OBS, `PERRO_GUIA_OBS` = :PERRO_GUIA_OBS, 
        `ZONA_RESERVADA_PMR_OBS` = :ZONA_RESERVADA_PMR_OBS, `TELEFONO_OPERADOR_OBS` = :TELEFONO_OPERADOR_OBS, `WEB_CRTM_OBS` = :WEB_CRTM_OBS, 
        `WEB_EMPRESA_OBS` = :WEB_EMPRESA_OBS, TRASPASADO = 0, USUARIO = :USUARIO WHERE id = {$datos['IDMI']}";

        $stFlota = $conn->prepare($queryFlota);

        $fecha = date('Y-m-d');
        $hora = date('H:i:s');

        $stFlota->bindParam(":FECHA", $fecha);
        $stFlota->bindValue(":HORA", $hora);
        $stFlota->bindValue(":TARIFAS", isset($datos['TARIFAS_IM']) ? $datos['TARIFAS_IM'] : NULL);
        $stFlota->bindValue(":PERRO_GUIA", isset($datos['PERRO_GUIA_IM']) ? $datos['PERRO_GUIA_IM'] : NULL);
        $stFlota->bindValue(":ZONA_RESERVADA_PMR", isset($datos['ZONA_RESERVADA_PMR_IM']) ? $datos['ZONA_RESERVADA_PMR_IM'] : NULL);
        $stFlota->bindValue(":TELEFONO_OPERADOR", isset($datos['TELEFONO_OPERADOR_IM']) ? $datos['TELEFONO_OPERADOR_IM'] : NULL);
        $stFlota->bindValue(":WEB_CRTM", isset($datos['WEB_CRTM_IM']) ? $datos['WEB_CRTM_IM'] : NULL);
        $stFlota->bindValue(":WEB_EMPRESA", isset($datos['WEB_EMPRESA_IM']) ? $datos['WEB_EMPRESA_IM'] : NULL);
        $stFlota->bindValue(":TARIFAS_OBS", isset($datos['TARIFAS_IM_OBS']) ? $datos['TARIFAS_IM_OBS'] : NULL);
        $stFlota->bindValue(":PERRO_GUIA_OBS", isset($datos['PERRO_GUIA_IM_OBS']) ? $datos['PERRO_GUIA_IM_OBS'] : NULL);
        $stFlota->bindValue(":ZONA_RESERVADA_PMR_OBS", isset($datos['ZONA_RESERVADA_PMR_IM_OBS']) ? $datos['ZONA_RESERVADA_PMR_IM_OBS'] : NULL);
        $stFlota->bindValue(":TELEFONO_OPERADOR_OBS", isset($datos['TELEFONO_OPERADOR_IM_OBS']) ? $datos['TELEFONO_OPERADOR_IM_OBS'] : NULL);
        $stFlota->bindValue(":WEB_CRTM_OBS", isset($datos['WEB_CRTM_IM_OBS']) ? $datos['WEB_CRTM_IM_OBS'] : NULL);
        $stFlota->bindValue(":WEB_EMPRESA_OBS", isset($datos['WEB_EMPRESA_IM_OBS']) ? $datos['WEB_EMPRESA_IM_OBS'] : NULL);
        $stFlota->bindValue(":USUARIO", !empty($datos['USUARIO']) ? $datos['USUARIO'] : NULL);

        $stFlota->execute();

        if ($stFlota) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Método para insertar las revision de las pegatinas del interior trasero del vehículo.
     * 
     * @access private
     * 
     * @param array $datos Array con los datos de las revisiones realizadas
     * 
     * @return bool resultado de la operación 
     */
    private static function insertarPegatinasInteriorTrasera($datos)
    {
        $conn = Db::getConector();

        $queryFlota = " INSERT INTO `peg_int_trasera` (`ID`, ID_EMPRESA, ID_VEHICULO, CODIGO_VEHICULO, ID_USUARIO, FECHA, HORA, `MARTILLO`, `PROHIBIDO_FUMAR`, `PMR`, `VIDEOVIGILANCIA`, 
        `MARTILLO_OBS`, `PROHIBIDO_FUMAR_OBS`, `PMR_OBS`, `VIDEOVIGILANCIA_OBS`, TRASPASADO, USUARIO) VALUES (NULL, :ID_EMPRESA, :ID_VEHICULO, :CODIGO_VEHICULO, 
        :ID_USUARIO, :FECHA, :HORA, :MARTILLO, :PROHIBIDO_FUMAR, :PMR, :VIDEOVIGILANCIA, :MARTILLO_OBS, :PROHIBIDO_FUMAR_OBS, :PMR_OBS, :VIDEOVIGILANCIA_OBS, '0', :USUARIO)";

        $stFlota = $conn->prepare($queryFlota);

        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        $stFlota->bindParam(":ID_EMPRESA", $datos['EMPRESA']);
        $stFlota->bindParam(":ID_VEHICULO", $datos['IDVEHICULO']);
        $stFlota->bindParam(":CODIGO_VEHICULO", $datos['CODIGO_VEHICULO']);
        $stFlota->bindValue(":ID_USUARIO", isset($datos['IDUSUARIO']) ? $datos['IDUSUARIO'] : 0);
        $stFlota->bindParam(":FECHA", $fecha);
        $stFlota->bindValue(":HORA", $hora);
        $stFlota->bindValue(":MARTILLO", isset($datos['MARTILLO_IT']) ? $datos['MARTILLO_IT'] : NULL);
        $stFlota->bindValue(":PROHIBIDO_FUMAR", isset($datos['PROHIBIDO_FUMAR_IT']) ? $datos['PROHIBIDO_FUMAR_IT'] : NULL);
        $stFlota->bindValue(":PMR", isset($datos['PMR_IT']) ? $datos['PMR_IT'] : NULL);
        $stFlota->bindValue(":VIDEOVIGILANCIA", isset($datos['VIDEOVIGILANCIA_IT']) ? $datos['VIDEOVIGILANCIA_IT'] : NULL);

        $stFlota->bindValue(":MARTILLO_OBS", isset($datos['MARTILLO_IT_OBS']) ? $datos['MARTILLO_IT_OBS'] : NULL);
        $stFlota->bindValue(":PROHIBIDO_FUMAR_OBS", isset($datos['PROHIBIDO_FUMAR_IT_OBS']) ? $datos['PROHIBIDO_FUMAR_IT_OBS'] : NULL);
        $stFlota->bindValue(":PMR_OBS", isset($datos['PMR_IT_OBS']) ? $datos['PMR_IT_OBS'] : NULL);
        $stFlota->bindValue(":VIDEOVIGILANCIA_OBS", isset($datos['VIDEOVIGILANCIA_IT_OBS']) ? $datos['VIDEOVIGILANCIA_IT_OBS'] : NULL);
        $stFlota->bindValue(":USUARIO", !empty($datos['USUARIO']) ? $datos['USUARIO'] : NULL);

        $stFlota->execute();

        if ($stFlota) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Método para insertar las revision de las pegatinas del interior trasero del vehículo.
     * 
     * @access private
     * 
     * @param array $datos Array con los datos de las revisiones realizadas
     * 
     * @return bool resultado de la operación 
     */
    private static function actualizarPegatinasInteriorTrasera($datos)
    {
        $conn = Db::getConector();

        $queryFlota = "UPDATE `peg_int_trasera` SET FECHA = :FECHA, HORA = :FECHA, `MARTILLO` = :MARTILLO, `PROHIBIDO_FUMAR` = :PROHIBIDO_FUMAR, `PMR` = :PMR, 
        `VIDEOVIGILANCIA` = :VIDEOVIGILANCIA, `MARTILLO_OBS` = :MARTILLO_OBS, `PROHIBIDO_FUMAR_OBS` = :PROHIBIDO_FUMAR_OBS, `PMR_OBS` = :PMR_OBS, 
        `VIDEOVIGILANCIA_OBS` = :VIDEOVIGILANCIA_OBS, TRASPASADO = 0, USUARIO = :USUARIO WHERE id = {$datos['IDIT']}";

        $stFlota = $conn->prepare($queryFlota);

        $fecha = date('Y-m-d');
        $hora = date('H:i:s');

        $stFlota->bindParam(":FECHA", $fecha);
        $stFlota->bindValue(":HORA", $hora);
        $stFlota->bindValue(":MARTILLO", isset($datos['MARTILLO_IT']) ? $datos['MARTILLO_IT'] : NULL);
        $stFlota->bindValue(":PROHIBIDO_FUMAR", isset($datos['PROHIBIDO_FUMAR_IT']) ? $datos['PROHIBIDO_FUMAR_IT'] : NULL);
        $stFlota->bindValue(":PMR", isset($datos['PMR_IT']) ? $datos['PMR_IT'] : NULL);
        $stFlota->bindValue(":VIDEOVIGILANCIA", isset($datos['VIDEOVIGILANCIA_IT']) ? $datos['VIDEOVIGILANCIA_IT'] : NULL);

        $stFlota->bindValue(":MARTILLO_OBS", isset($datos['MARTILLO_IT_OBS']) ? $datos['MARTILLO_IT_OBS'] : NULL);
        $stFlota->bindValue(":PROHIBIDO_FUMAR_OBS", isset($datos['PROHIBIDO_FUMAR_IT_OBS']) ? $datos['PROHIBIDO_FUMAR_IT_OBS'] : NULL);
        $stFlota->bindValue(":PMR_OBS", isset($datos['PMR_IT_OBS']) ? $datos['PMR_IT_OBS'] : NULL);
        $stFlota->bindValue(":VIDEOVIGILANCIA_OBS", isset($datos['VIDEOVIGILANCIA_IT_OBS']) ? $datos['VIDEOVIGILANCIA_IT_OBS'] : NULL);
        $stFlota->bindValue(":USUARIO", !empty($datos['USUARIO']) ? $datos['USUARIO'] : NULL);

        $stFlota->execute();

        if ($stFlota) {
            return true;
        } else {
            return false;
        }
    }

    public static function obtenerPegatinasExteriorFrontalFecha($fechaInicio, $fechaFin, $empresa)
    {
        $conn = Db::getConector();

        $query = "SELECT * FROM peg_ext_frontal WHERE fecha between '$fechaInicio' and '$fechaFin' and ID_EMPRESA = $empresa ORDER BY fecha, hora ";

        $st = $conn->prepare($query);

        $st->execute();

        if ($st) {
            return $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public static function obtenerPegatinasExteriorLateralDerechoFecha($fechaInicio, $fechaFin, $empresa)
    {
        $conn = Db::getConector();

        $query = "SELECT * FROM peg_ext_lateral_derecho WHERE fecha between '$fechaInicio' and '$fechaFin' and ID_EMPRESA = $empresa ORDER BY fecha, hora ";

        $st = $conn->prepare($query);

        $st->execute();

        if ($st) {
            return $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public static function obtenerPegatinasExteriorLateralIzquierdoFecha($fechaInicio, $fechaFin, $empresa)
    {
        $conn = Db::getConector();

        $query = "SELECT * FROM peg_ext_lateral_izq WHERE fecha between '$fechaInicio' and '$fechaFin' and ID_EMPRESA = $empresa ORDER BY fecha, hora ";

        $st = $conn->prepare($query);

        $st->execute();

        if ($st) {
            return $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public static function obtenerPegatinasExteriorLunaFecha($fechaInicio, $fechaFin, $empresa)
    {
        $conn = Db::getConector();

        $query = "SELECT * FROM peg_ext_lunas WHERE fecha between '$fechaInicio' and '$fechaFin' and ID_EMPRESA = $empresa ORDER BY fecha, hora ";

        $st = $conn->prepare($query);

        $st->execute();

        if ($st) {
            return $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public static function obtenerPegatinasExteriorTraseraFecha($fechaInicio, $fechaFin, $empresa)
    {
        $conn = Db::getConector();

        $query = "SELECT * FROM peg_ext_trasera WHERE fecha between '$fechaInicio' and '$fechaFin' and ID_EMPRESA = $empresa ORDER BY fecha, hora ";

        $st = $conn->prepare($query);

        $st->execute();

        if ($st) {
            return $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public static function obtenerPegatinasInteriorCentralFecha($fechaInicio, $fechaFin, $empresa)
    {
        $conn = Db::getConector();

        $query = "SELECT * FROM peg_int_central WHERE fecha between '$fechaInicio' and '$fechaFin' and ID_EMPRESA = $empresa ORDER BY fecha, hora ";

        $st = $conn->prepare($query);

        $st->execute();

        if ($st) {
            return $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public static function obtenerPegatinasInteriorDelanteroFecha($fechaInicio, $fechaFin, $empresa)
    {
        $conn = Db::getConector();

        $query = "SELECT * FROM peg_int_del WHERE fecha between '$fechaInicio' and '$fechaFin' and ID_EMPRESA = $empresa ORDER BY fecha, hora ";

        $st = $conn->prepare($query);

        $st->execute();

        if ($st) {
            return $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public static function obtenerPegatinasInteriorLunaFecha($fechaInicio, $fechaFin, $empresa)
    {
        $conn = Db::getConector();

        $query = "SELECT * FROM peg_int_luna WHERE fecha between '$fechaInicio' and '$fechaFin' and ID_EMPRESA = $empresa ORDER BY fecha, hora ";

        $st = $conn->prepare($query);

        $st->execute();

        if ($st) {
            return $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public static function obtenerPegatinasInteriorMamparaFecha($fechaInicio, $fechaFin, $empresa)
    {
        $conn = Db::getConector();

        $query = "SELECT * FROM peg_int_mampara WHERE fecha between '$fechaInicio' and '$fechaFin' and ID_EMPRESA = $empresa ORDER BY fecha, hora ";

        $st = $conn->prepare($query);

        $st->execute();

        if ($st) {
            return $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public static function obtenerPegatinasInteriorTraseraFecha($fechaInicio, $fechaFin, $empresa)
    {
        $conn = Db::getConector();

        $query = "SELECT * FROM peg_int_trasera WHERE fecha between '$fechaInicio' and '$fechaFin' and ID_EMPRESA = $empresa ORDER BY fecha, hora ";

        $st = $conn->prepare($query);

        $st->execute();

        if ($st) {
            return $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public static function obtenerUltimaRevisionEF()
    {
        $conn = Db::getConector();

        $query = "SELECT * FROM peg_ext_frontal order by fecha desc limit 1";

        $st = $conn->prepare($query);

        $st->execute();

        if ($st) {
            return $st->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public static function obtenerUltimaRevisionET()
    {
        $conn = Db::getConector();

        $query = "SELECT * FROM peg_ext_trasera order by fecha desc limit 1";

        $st = $conn->prepare($query);

        $st->execute();

        if ($st) {
            return $st->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public static function obtenerUltimaRevisionELD()
    {
        $conn = Db::getConector();

        $query = "SELECT * FROM peg_ext_lateral_derecho order by fecha desc limit 1";

        $st = $conn->prepare($query);

        $st->execute();

        if ($st) {
            return $st->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public static function obtenerUltimaRevisionELI()
    {
        $conn = Db::getConector();

        $query = "SELECT * FROM peg_ext_lateral_izq order by fecha desc limit 1";

        $st = $conn->prepare($query);

        $st->execute();

        if ($st) {
            return $st->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public static function obtenerUltimaRevisionELuna()
    {
        $conn = Db::getConector();

        $query = "SELECT * FROM peg_ext_lunas order by fecha desc limit 1";

        $st = $conn->prepare($query);

        $st->execute();

        if ($st) {
            return $st->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public static function obtenerUltimaRevisionIC()
    {
        $conn = Db::getConector();

        $query = "SELECT * FROM peg_int_central order by fecha desc limit 1";

        $st = $conn->prepare($query);

        $st->execute();

        if ($st) {
            return $st->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public static function obtenerUltimaRevisionID()
    {
        $conn = Db::getConector();

        $query = "SELECT * FROM peg_int_del order by fecha desc limit 1";

        $st = $conn->prepare($query);

        $st->execute();

        if ($st) {
            return $st->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public static function obtenerUltimaRevisionIT()
    {
        $conn = Db::getConector();

        $query = "SELECT * FROM peg_int_trasera order by fecha desc limit 1";

        $st = $conn->prepare($query);

        $st->execute();

        if ($st) {
            return $st->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public static function obtenerUltimaRevisionMI()
    {
        $conn = Db::getConector();

        $query = "SELECT * FROM peg_int_mampara order by fecha desc limit 1";

        $st = $conn->prepare($query);

        $st->execute();

        if ($st) {
            return $st->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public static function obtenerUltimaRevisionILuna()
    {
        $conn = Db::getConector();

        $query = "SELECT * FROM peg_int_luna order by fecha desc limit 1";

        $st = $conn->prepare($query);

        $st->execute();

        if ($st) {
            return $st->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public static function comprobarRevisionEF($idRevision)
    {
        $conn = Db::getConector();

        $query = "SELECT `CRTM_LOGO`, `LOGO_EMPRESA`, `MINUSVALIDO`, `NUMERO_VEHICULO` FROM peg_ext_frontal WHERE id = $idRevision";

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

    public static function comprobarRevisionET($idRevision)
    {
        $conn = Db::getConector();

        $query = "SELECT `CRTM_LOGO`, `LOGO_EMPRESA`, `WEB_CRTM`, `WEB_EMPRESA`, `NUMERO_VEHICULO`, `SALIDA_EMERGENCIA` FROM peg_ext_trasera WHERE id = $idRevision";

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

    public static function comprobarRevisionELD($idRevision)
    {
        $conn = Db::getConector();

        $query = "SELECT `LOGO_EMPRESA`, `WEB_CRTM`, `PMR`, `STOP_COVID`, `SALIDA`, `ENTRADA`, `MINUSVALIDO`, `CAMARA_COMERCIO`, `SALIDA_EMERGENCIA`, 
        `GRUPO_RUIZ`, `NUMERO_VEHICULO`, `APERTURA_EMERGENCIA`, `SOLICITUD_RAMPA` FROM peg_ext_lateral_derecho WHERE id = $idRevision";

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

    public static function comprobarRevisionELI($idRevision)
    {
        $conn = Db::getConector();

        $query = "SELECT `CRTM_LOGO`, `LOGO_EMPRESA`, `WEB_CRTM`, `CAMARA_COMERCIO`, `SALIDA_EMERGENCIA`, `GRUPO_RUIZ`, `NUMERO_VEHICULO` 
        FROM peg_ext_lateral_izq WHERE id = $idRevision";

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

    public static function comprobarRevisionELuna($idRevision)
    {
        $conn = Db::getConector();

        $query = "SELECT `SALIDA_EMERGENCIA`, `GRUPO_RUIZ` FROM peg_ext_lunas WHERE id = $idRevision";

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

    public static function comprobarRevisionIC($idRevision)
    {
        $conn = Db::getConector();

        $query = "SELECT `TARIFAS`, `PLAN_EVACUACION`, `COVID`, `QR_ENCUESTA` FROM peg_int_central WHERE id = $idRevision";

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

    public static function comprobarRevisionID($idRevision)
    {
        $conn = Db::getConector();

        $query = "SELECT `VIDEOVIGILANCIA`, `PROHIBIDO_FUMAR`, `PTM`, `CAMBIO_MAXIMO`, `TARIFAS`, `OCUPACION_MAXIMA`, `BOTIQUIN`, `SALIDA_EMERGENCIA` 
        FROM peg_int_del WHERE id = $idRevision";

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

    public static function comprobarRevisionIT($idRevision)
    {
        $conn = Db::getConector();

        $query = "SELECT `MARTILLO`, `PROHIBIDO_FUMAR`, `PMR`, `VIDEOVIGILANCIA` FROM peg_int_trasera WHERE id = $idRevision";

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

    public static function comprobarRevisionMI($idRevision)
    {
        $conn = Db::getConector();

        $query = "SELECT `TARIFAS`, `PERRO_GUIA`, `ZONA_RESERVADA_PMR`, `TELEFONO_OPERADOR`, `WEB_CRTM`, `WEB_EMPRESA` FROM peg_int_mampara WHERE id = $idRevision";

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

    public static function comprobarRevisionILuna($idRevision)
    {
        $conn = Db::getConector();

        $query = "SELECT `CINTURON_SEGURIDAD`, `MARTILLOS`, `EXTINTORES` FROM peg_int_luna WHERE id = $idRevision";

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

        $revisionesPegatinasExteriorFrontal = Pegatinas::obtenerPegatinasExteriorFrontalFecha($fechaInicio, $fechaFin, $empresa);
        $revisionesPegatinasExteriorLateralDerecho = Pegatinas::obtenerPegatinasExteriorLateralDerechoFecha($fechaInicio, $fechaFin, $empresa);
        $revisionesPegatinasExteriorLateralIzquierdo = Pegatinas::obtenerPegatinasExteriorLateralIzquierdoFecha($fechaInicio, $fechaFin, $empresa);
        $revisionesPegatinasExteriorLuna = Pegatinas::obtenerPegatinasExteriorLunaFecha($fechaInicio, $fechaFin, $empresa);
        $revisionesPegatinasExteriorTrasera = Pegatinas::obtenerPegatinasExteriorTraseraFecha($fechaInicio, $fechaFin, $empresa);
        $revisionesPegatinasInteriorCentral = Pegatinas::obtenerPegatinasInteriorCentralFecha($fechaInicio, $fechaFin, $empresa);
        $revisionesPegatinasInteriorDelantero = Pegatinas::obtenerPegatinasInteriorDelanteroFecha($fechaInicio, $fechaFin, $empresa);
        $revisionesPegatinasInteriorLuna = Pegatinas::obtenerPegatinasInteriorLunaFecha($fechaInicio, $fechaFin, $empresa);
        $revisionesPegatinasInteriorMampara = Pegatinas::obtenerPegatinasInteriorMamparaFecha($fechaInicio, $fechaFin, $empresa);
        $revisionesPegatinasInteriorTrasera = Pegatinas::obtenerPegatinasInteriorTraseraFecha($fechaInicio, $fechaFin, $empresa);

        $sheet = $spreadsheet->createSheet();

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

        $sheet->setTitle("Revisiones Estado Pegatianas");

        $sheet->getStyle('A:H')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A:H')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setWidth(10);
        $sheet->getColumnDimension('G')->setWidth(10);
        $sheet->getColumnDimension('H')->setWidth(70);
        $sheet->getStyle('H')->getAlignment()->setWrapText(true);

        $sheet->setCellValue("A1", "Fecha Revisión");
        $sheet->setCellValue("B1", "Vehículo");
        $sheet->setCellValue("C1", "Revisor");
        $sheet->setCellValue("D1", "Zona");
        $sheet->setCellValue("E1", "Campo");
        $sheet->setCellValue("F1", "OK");
        $sheet->setCellValue("G1", "NO OK");
        $sheet->setCellValue("H1", "Observaciones");
        $sheet->getStyle("A1:H1")->applyFromArray($estiloCabeceraTabla);

        $fila = 2;

        for ($i = 0; $i < count($revisionesPegatinasExteriorFrontal); $i++) {
            $filaInicio = $fila;

            $sheet->setCellValue("A$fila", $revisionesPegatinasExteriorFrontal[$i]['FECHA'] . ' ' . $revisionesPegatinasExteriorFrontal[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasExteriorFrontal[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasExteriorFrontal[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Exterior Frontal');
            $sheet->setCellValue("E$fila", "LOGO CRTM");
            if ($revisionesPegatinasExteriorFrontal[$i]['CRTM_LOGO'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasExteriorFrontal[$i]['CRTM_LOGO_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasExteriorFrontal[$i]['FECHA'] . ' ' . $revisionesPegatinasExteriorFrontal[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasExteriorFrontal[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasExteriorFrontal[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Exterior Frontal');
            $sheet->setCellValue("E$fila", "LOGO EMPRESA");
            if ($revisionesPegatinasExteriorFrontal[$i]['LOGO_EMPRESA'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasExteriorFrontal[$i]['LOGO_EMPRESA_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasExteriorFrontal[$i]['FECHA'] . ' ' . $revisionesPegatinasExteriorFrontal[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasExteriorFrontal[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasExteriorFrontal[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Exterior Frontal');
            $sheet->setCellValue("E$fila", "MINUSVÁLIDO");
            if ($revisionesPegatinasExteriorFrontal[$i]['MINUSVALIDO'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasExteriorFrontal[$i]['MINUSVALIDO_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasExteriorFrontal[$i]['FECHA'] . ' ' . $revisionesPegatinasExteriorFrontal[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasExteriorFrontal[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasExteriorFrontal[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Exterior Frontal');
            $sheet->setCellValue("E$fila", "NÚMERO VEHÍCULO");
            if ($revisionesPegatinasExteriorFrontal[$i]['NUMERO_VEHICULO'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasExteriorFrontal[$i]['NUMERO_VEHICULO_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasExteriorFrontal[$i]['FECHA'] . ' ' . $revisionesPegatinasExteriorFrontal[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasExteriorFrontal[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasExteriorFrontal[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Exterior Frontal');
            $sheet->setCellValue("E$fila", "OTROS");
            if ($revisionesPegatinasExteriorFrontal[$i]['OTROS'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasExteriorFrontal[$i]['OTROS_OBS']}");
            $fila++;

            //Pegatina exterior lateral derecho
            $sheet->setCellValue("A$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['FECHA'] . ' ' . $revisionesPegatinasExteriorLateralDerecho[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Exterior Lateral Derecho');
            $sheet->setCellValue("E$fila", "LOGO EMPRESA");
            if ($revisionesPegatinasExteriorLateralDerecho[$i]['LOGO_EMPRESA'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasExteriorLateralDerecho[$i]['LOGO_EMPRESA_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['FECHA'] . ' ' . $revisionesPegatinasExteriorLateralDerecho[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Exterior Lateral Derecho');
            $sheet->setCellValue("E$fila", "WEB CRTM");
            if ($revisionesPegatinasExteriorLateralDerecho[$i]['WEB_CRTM'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasExteriorLateralDerecho[$i]['WEB_CRTM_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['FECHA'] . ' ' . $revisionesPegatinasExteriorLateralDerecho[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Exterior Lateral Derecho');
            $sheet->setCellValue("E$fila", "PMR");
            if ($revisionesPegatinasExteriorLateralDerecho[$i]['PMR'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasExteriorLateralDerecho[$i]['PMR_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['FECHA'] . ' ' . $revisionesPegatinasExteriorLateralDerecho[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Exterior Lateral Derecho');
            $sheet->setCellValue("E$fila", "STOP COVID");
            if ($revisionesPegatinasExteriorLateralDerecho[$i]['STOP_COVID'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasExteriorLateralDerecho[$i]['STOP_COVID_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['FECHA'] . ' ' . $revisionesPegatinasExteriorLateralDerecho[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Exterior Lateral Derecho');
            $sheet->setCellValue("E$fila", "SALIDA");
            if ($revisionesPegatinasExteriorLateralDerecho[$i]['SALIDA'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasExteriorLateralDerecho[$i]['SALIDA_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['FECHA'] . ' ' . $revisionesPegatinasExteriorLateralDerecho[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Exterior Lateral Derecho');
            $sheet->setCellValue("E$fila", "ENTRADA");
            if ($revisionesPegatinasExteriorLateralDerecho[$i]['ENTRADA'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasExteriorLateralDerecho[$i]['ENTRADA_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['FECHA'] . ' ' . $revisionesPegatinasExteriorLateralDerecho[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Exterior Lateral Derecho');
            $sheet->setCellValue("E$fila", "MINUSVALIDO");
            if ($revisionesPegatinasExteriorLateralDerecho[$i]['MINUSVALIDO'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasExteriorLateralDerecho[$i]['MINUSVALIDO_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['FECHA'] . ' ' . $revisionesPegatinasExteriorLateralDerecho[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Exterior Lateral Derecho');
            $sheet->setCellValue("E$fila", "CÁMARA DE COMERCIO");
            if ($revisionesPegatinasExteriorLateralDerecho[$i]['CAMARA_COMERCIO'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasExteriorLateralDerecho[$i]['CAMARA_COMERCIO_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['FECHA'] . ' ' . $revisionesPegatinasExteriorLateralDerecho[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Exterior Lateral Derecho');
            $sheet->setCellValue("E$fila", "SALIDA DE EMERGENCIA");
            if ($revisionesPegatinasExteriorLateralDerecho[$i]['SALIDA_EMERGENCIA'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasExteriorLateralDerecho[$i]['SALIDA_EMERGENCIA_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['FECHA'] . ' ' . $revisionesPegatinasExteriorLateralDerecho[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Exterior Lateral Derecho');
            $sheet->setCellValue("E$fila", "GRUPO RUIZ");
            if ($revisionesPegatinasExteriorLateralDerecho[$i]['GRUPO_RUIZ'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasExteriorLateralDerecho[$i]['GRUPO_RUIZ_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['FECHA'] . ' ' . $revisionesPegatinasExteriorLateralDerecho[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Exterior Lateral Derecho');
            $sheet->setCellValue("E$fila", "NÚMERO VEHÍCULO");
            if ($revisionesPegatinasExteriorLateralDerecho[$i]['NUMERO_VEHICULO'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasExteriorLateralDerecho[$i]['NUMERO_VEHICULO_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['FECHA'] . ' ' . $revisionesPegatinasExteriorLateralDerecho[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Exterior Lateral Derecho');
            $sheet->setCellValue("E$fila", "APERTURA EMERGENCIA");
            if ($revisionesPegatinasExteriorLateralDerecho[$i]['APERTURA_EMERGENCIA'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasExteriorLateralDerecho[$i]['APERTURA_EMERGENCIA_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['FECHA'] . ' ' . $revisionesPegatinasExteriorLateralDerecho[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Exterior Lateral Derecho');
            $sheet->setCellValue("E$fila", "SOLICITUD RAMPA");
            if ($revisionesPegatinasExteriorLateralDerecho[$i]['SOLICITUD_RAMPA'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasExteriorLateralDerecho[$i]['SOLICITUD_RAMPA_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['FECHA'] . ' ' . $revisionesPegatinasExteriorLateralDerecho[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Exterior Lateral Derecho');
            $sheet->setCellValue("E$fila", "ACCESO PMR");
            if ($revisionesPegatinasExteriorLateralDerecho[$i]['ACCESO_PMR'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasExteriorLateralDerecho[$i]['ACCESO_PMR_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['FECHA'] . ' ' . $revisionesPegatinasExteriorLateralDerecho[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Exterior Lateral Derecho');
            $sheet->setCellValue("E$fila", "LOGO CRTM");
            if ($revisionesPegatinasExteriorLateralDerecho[$i]['LOGO_CRTM'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasExteriorLateralDerecho[$i]['LOGO_CRTM_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['FECHA'] . ' ' . $revisionesPegatinasExteriorLateralDerecho[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Exterior Lateral Derecho');
            $sheet->setCellValue("E$fila", "SALIDA PUERTAS");
            if ($revisionesPegatinasExteriorLateralDerecho[$i]['SALIDA_PUERTAS'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasExteriorLateralDerecho[$i]['SALIDA_PUERTAS_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['FECHA'] . ' ' . $revisionesPegatinasExteriorLateralDerecho[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Exterior Lateral Derecho');
            $sheet->setCellValue("E$fila", "SILLA RUEDAS");
            if ($revisionesPegatinasExteriorLateralDerecho[$i]['SILLA_RUEDAS'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasExteriorLateralDerecho[$i]['SILLA_RUEDAS_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['FECHA'] . ' ' . $revisionesPegatinasExteriorLateralDerecho[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Exterior Lateral Derecho');
            $sheet->setCellValue("E$fila", "CARRITO");
            if ($revisionesPegatinasExteriorLateralDerecho[$i]['CARRITO'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasExteriorLateralDerecho[$i]['CARRITO_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['FECHA'] . ' ' . $revisionesPegatinasExteriorLateralDerecho[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Exterior Lateral Derecho');
            $sheet->setCellValue("E$fila", "PUBLICIDAD");
            if ($revisionesPegatinasExteriorLateralDerecho[$i]['PUBLICIDAD'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasExteriorLateralDerecho[$i]['PUBLICIDAD_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['FECHA'] . ' ' . $revisionesPegatinasExteriorLateralDerecho[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasExteriorLateralDerecho[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Exterior Lateral Derecho');
            $sheet->setCellValue("E$fila", "OTROS");
            if ($revisionesPegatinasExteriorLateralDerecho[$i]['OTROS'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasExteriorLateralDerecho[$i]['OTROS_OBS']}");
            $fila++;

            //Pegatinas exterior lateral izquierdo

            $sheet->setCellValue("A$fila", $revisionesPegatinasExteriorLateralIzquierdo[$i]['FECHA'] . ' ' . $revisionesPegatinasExteriorLateralIzquierdo[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasExteriorLateralIzquierdo[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasExteriorLateralIzquierdo[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Exterior Lateral Izquierdo');
            $sheet->setCellValue("E$fila", "LOGO CRTM");
            if ($revisionesPegatinasExteriorLateralIzquierdo[$i]['CRTM_LOGO'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasExteriorLateralIzquierdo[$i]['CRTM_LOGO_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasExteriorLateralIzquierdo[$i]['FECHA'] . ' ' . $revisionesPegatinasExteriorLateralIzquierdo[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasExteriorLateralIzquierdo[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasExteriorLateralIzquierdo[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Exterior Lateral Izquierdo');
            $sheet->setCellValue("E$fila", "LOGO EMPRESA");
            if ($revisionesPegatinasExteriorLateralIzquierdo[$i]['LOGO_EMPRESA'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasExteriorLateralIzquierdo[$i]['LOGO_EMPRESA_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasExteriorLateralIzquierdo[$i]['FECHA'] . ' ' . $revisionesPegatinasExteriorLateralIzquierdo[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasExteriorLateralIzquierdo[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasExteriorLateralIzquierdo[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Exterior Lateral Izquierdo');
            $sheet->setCellValue("E$fila", "WEB CRTM");
            if ($revisionesPegatinasExteriorLateralIzquierdo[$i]['WEB_CRTM'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasExteriorLateralIzquierdo[$i]['WEB_CRTM_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasExteriorLateralIzquierdo[$i]['FECHA'] . ' ' . $revisionesPegatinasExteriorLateralIzquierdo[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasExteriorLateralIzquierdo[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasExteriorLateralIzquierdo[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Exterior Lateral Izquierdo');
            $sheet->setCellValue("E$fila", "CÁMARA DE COMERCIO");
            if ($revisionesPegatinasExteriorLateralIzquierdo[$i]['CAMARA_COMERCIO'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasExteriorLateralIzquierdo[$i]['CAMARA_COMERCIO_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasExteriorLateralIzquierdo[$i]['FECHA'] . ' ' . $revisionesPegatinasExteriorLateralIzquierdo[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasExteriorLateralIzquierdo[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasExteriorLateralIzquierdo[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Exterior Lateral Izquierdo');
            $sheet->setCellValue("E$fila", "SALIDA DE EMERGENCIA");
            if ($revisionesPegatinasExteriorLateralIzquierdo[$i]['SALIDA_EMERGENCIA'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasExteriorLateralIzquierdo[$i]['SALIDA_EMERGENCIA_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasExteriorLateralIzquierdo[$i]['FECHA'] . ' ' . $revisionesPegatinasExteriorLateralIzquierdo[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasExteriorLateralIzquierdo[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasExteriorLateralIzquierdo[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Exterior Lateral Izquierdo');
            $sheet->setCellValue("E$fila", "GRUPO RUIZ");
            if ($revisionesPegatinasExteriorLateralIzquierdo[$i]['GRUPO_RUIZ'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasExteriorLateralIzquierdo[$i]['GRUPO_RUIZ_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasExteriorLateralIzquierdo[$i]['FECHA'] . ' ' . $revisionesPegatinasExteriorLateralIzquierdo[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasExteriorLateralIzquierdo[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasExteriorLateralIzquierdo[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Exterior Lateral Izquierdo');
            $sheet->setCellValue("E$fila", "NÚMERO VEHÍCULO");
            if ($revisionesPegatinasExteriorLateralIzquierdo[$i]['NUMERO_VEHICULO'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasExteriorLateralIzquierdo[$i]['NUMERO_VEHICULO_OBS']}");
            $fila++;

            //Pegatinas exterior luna

            $sheet->setCellValue("A$fila", $revisionesPegatinasExteriorLuna[$i]['FECHA'] . ' ' . $revisionesPegatinasExteriorLuna[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasExteriorLuna[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasExteriorLuna[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Luna Exterior');
            $sheet->setCellValue("E$fila", "SALIDA EMERGENCIA");
            if ($revisionesPegatinasExteriorLuna[$i]['SALIDA_EMERGENCIA'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasExteriorLuna[$i]['SALIDA_EMERGENCIA_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasExteriorLuna[$i]['FECHA'] . ' ' . $revisionesPegatinasExteriorLuna[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasExteriorLuna[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasExteriorLuna[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Luna Exterior');
            $sheet->setCellValue("E$fila", "GRUPO RUIZ");
            if ($revisionesPegatinasExteriorLuna[$i]['GRUPO_RUIZ'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasExteriorLuna[$i]['GRUPO_RUIZ_OBS']}");
            $fila++;

            //Pegatinas Exterior Trasera

            $sheet->setCellValue("A$fila", $revisionesPegatinasExteriorTrasera[$i]['FECHA'] . ' ' . $revisionesPegatinasExteriorTrasera[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasExteriorTrasera[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasExteriorTrasera[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Exterior Trasero');
            $sheet->setCellValue("E$fila", "LOGO CRTM");
            if ($revisionesPegatinasExteriorTrasera[$i]['CRTM_LOGO'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasExteriorTrasera[$i]['CRTM_LOGO_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasExteriorTrasera[$i]['FECHA'] . ' ' . $revisionesPegatinasExteriorTrasera[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasExteriorTrasera[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasExteriorTrasera[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Exterior Trasero');
            $sheet->setCellValue("E$fila", "WEB CRTM");
            if ($revisionesPegatinasExteriorTrasera[$i]['WEB_CRTM'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasExteriorTrasera[$i]['WEB_CRTM_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasExteriorTrasera[$i]['FECHA'] . ' ' . $revisionesPegatinasExteriorTrasera[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasExteriorTrasera[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasExteriorTrasera[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Exterior Trasero');
            $sheet->setCellValue("E$fila", "WEB EMPRESA");
            if ($revisionesPegatinasExteriorTrasera[$i]['WEB_EMPRESA'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasExteriorTrasera[$i]['WEB_EMPRESA_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasExteriorTrasera[$i]['FECHA'] . ' ' . $revisionesPegatinasExteriorTrasera[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasExteriorTrasera[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasExteriorTrasera[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Exterior Trasero');
            $sheet->setCellValue("E$fila", "NÚMERO VEHÍCULO");
            if ($revisionesPegatinasExteriorTrasera[$i]['NUMERO_VEHICULO'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasExteriorTrasera[$i]['NUMERO_VEHICULO_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasExteriorTrasera[$i]['FECHA'] . ' ' . $revisionesPegatinasExteriorTrasera[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasExteriorTrasera[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasExteriorTrasera[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Exterior Trasero');
            $sheet->setCellValue("E$fila", "SALIDA EMERGENCIA");
            if ($revisionesPegatinasExteriorTrasera[$i]['SALIDA_EMERGENCIA'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasExteriorTrasera[$i]['SALIDA_EMERGENCIA_OBS']}");
            $fila++;

            //Pegatinas Interior Central

            $sheet->setCellValue("A$fila", $revisionesPegatinasInteriorCentral[$i]['FECHA'] . ' ' . $revisionesPegatinasInteriorCentral[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasInteriorCentral[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasInteriorCentral[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Interior Central');
            $sheet->setCellValue("E$fila", "TARIFAS");
            if ($revisionesPegatinasInteriorCentral[$i]['TARIFAS'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasInteriorCentral[$i]['TARIFAS_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasInteriorCentral[$i]['FECHA'] . ' ' . $revisionesPegatinasInteriorCentral[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasInteriorCentral[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasInteriorCentral[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Interior Central');
            $sheet->setCellValue("E$fila", "PLAN EVACUACIÓN");
            if ($revisionesPegatinasInteriorCentral[$i]['PLAN_EVACUACION'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasInteriorCentral[$i]['PLAN_EVACUACION_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasInteriorCentral[$i]['FECHA'] . ' ' . $revisionesPegatinasInteriorCentral[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasInteriorCentral[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasInteriorCentral[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Interior Central');
            $sheet->setCellValue("E$fila", "COVID");
            if ($revisionesPegatinasInteriorCentral[$i]['COVID'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasInteriorCentral[$i]['COVID_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasInteriorCentral[$i]['FECHA'] . ' ' . $revisionesPegatinasInteriorCentral[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasInteriorCentral[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasInteriorCentral[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Interior Central');
            $sheet->setCellValue("E$fila", "QR ENCUESTA");
            if ($revisionesPegatinasInteriorCentral[$i]['QR_ENCUESTA'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasInteriorCentral[$i]['QR_ENCUESTA_OBS']}");
            $fila++;

            //Pegatinas Interior Delantero

            $sheet->setCellValue("A$fila", $revisionesPegatinasInteriorDelantero[$i]['FECHA'] . ' ' . $revisionesPegatinasInteriorDelantero[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasInteriorDelantero[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasInteriorDelantero[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Interior Delantero');
            $sheet->setCellValue("E$fila", "VIDEOVIGILANCIA");
            if ($revisionesPegatinasInteriorDelantero[$i]['VIDEOVIGILANCIA'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasInteriorDelantero[$i]['VIDEOVIGILANCIA_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasInteriorDelantero[$i]['FECHA'] . ' ' . $revisionesPegatinasInteriorDelantero[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasInteriorDelantero[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasInteriorDelantero[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Interior Delantero');
            $sheet->setCellValue("E$fila", "PROHÍBIDO FUMAR");
            if ($revisionesPegatinasInteriorDelantero[$i]['PROHIBIDO_FUMAR'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasInteriorDelantero[$i]['PROHIBIDO_FUMAR_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasInteriorDelantero[$i]['FECHA'] . ' ' . $revisionesPegatinasInteriorDelantero[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasInteriorDelantero[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasInteriorDelantero[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Interior Delantero');
            $sheet->setCellValue("E$fila", "PTM");
            if ($revisionesPegatinasInteriorDelantero[$i]['PTM'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasInteriorDelantero[$i]['PTM_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasInteriorDelantero[$i]['FECHA'] . ' ' . $revisionesPegatinasInteriorDelantero[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasInteriorDelantero[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasInteriorDelantero[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Interior Delantero');
            $sheet->setCellValue("E$fila", "CAMBIO MÁXIMO");
            if ($revisionesPegatinasInteriorDelantero[$i]['CAMBIO_MAXIMO'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasInteriorDelantero[$i]['CAMBIO_MAXIMO_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasInteriorDelantero[$i]['FECHA'] . ' ' . $revisionesPegatinasInteriorDelantero[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasInteriorDelantero[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasInteriorDelantero[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Interior Delantero');
            $sheet->setCellValue("E$fila", "TARIFAS");
            if ($revisionesPegatinasInteriorDelantero[$i]['TARIFAS'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasInteriorDelantero[$i]['TARIFAS_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasInteriorDelantero[$i]['FECHA'] . ' ' . $revisionesPegatinasInteriorDelantero[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasInteriorDelantero[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasInteriorDelantero[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Interior Delantero');
            $sheet->setCellValue("E$fila", "OCUPACIÓN MÁXIMA");
            if ($revisionesPegatinasInteriorDelantero[$i]['OCUPACION_MAXIMA'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasInteriorDelantero[$i]['OCUPACION_MAXIMA_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasInteriorDelantero[$i]['FECHA'] . ' ' . $revisionesPegatinasInteriorDelantero[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasInteriorDelantero[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasInteriorDelantero[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Interior Delantero');
            $sheet->setCellValue("E$fila", "BOTIQUÍN");
            if ($revisionesPegatinasInteriorDelantero[$i]['BOTIQUIN'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasInteriorDelantero[$i]['BOTIQUIN_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasInteriorDelantero[$i]['FECHA'] . ' ' . $revisionesPegatinasInteriorDelantero[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasInteriorDelantero[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasInteriorDelantero[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Interior Delantero');
            $sheet->setCellValue("E$fila", "SALIDA EMERGENCIA");
            if ($revisionesPegatinasInteriorDelantero[$i]['SALIDA_EMERGENCIA'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasInteriorDelantero[$i]['SALIDA_EMERGENCIA_OBS']}");
            $fila++;


            //Pegatinas Lunas Interiores
            $sheet->setCellValue("A$fila", $revisionesPegatinasInteriorLuna[$i]['FECHA'] . ' ' . $revisionesPegatinasInteriorLuna[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasInteriorLuna[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasInteriorLuna[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Luna Interior');
            $sheet->setCellValue("E$fila", "CINTURONES DE SEGURIDAD");
            if ($revisionesPegatinasInteriorLuna[$i]['CINTURON_SEGURIDAD'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasInteriorLuna[$i]['CINTURON_SEGURIDAD_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasInteriorLuna[$i]['FECHA'] . ' ' . $revisionesPegatinasInteriorLuna[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasInteriorLuna[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasInteriorLuna[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Luna Interior');
            $sheet->setCellValue("E$fila", "MARTILLOS");
            if ($revisionesPegatinasInteriorLuna[$i]['MARTILLOS'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasInteriorLuna[$i]['MARTILLOS_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasInteriorLuna[$i]['FECHA'] . ' ' . $revisionesPegatinasInteriorLuna[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasInteriorLuna[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasInteriorLuna[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Luna Interior');
            $sheet->setCellValue("E$fila", "EXTINTORES");
            if ($revisionesPegatinasInteriorLuna[$i]['EXTINTORES'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasInteriorLuna[$i]['EXTINTORES_OBS']}");
            $fila++;


            //Pegatinas Interior Mampara
            $sheet->setCellValue("A$fila", $revisionesPegatinasInteriorMampara[$i]['FECHA'] . ' ' . $revisionesPegatinasInteriorMampara[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasInteriorMampara[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasInteriorMampara[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Interior Mampara');
            $sheet->setCellValue("E$fila", "TARIFAS");
            if ($revisionesPegatinasInteriorMampara[$i]['TARIFAS'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasInteriorMampara[$i]['TARIFAS_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasInteriorMampara[$i]['FECHA'] . ' ' . $revisionesPegatinasInteriorMampara[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasInteriorMampara[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasInteriorMampara[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Interior Mampara');
            $sheet->setCellValue("E$fila", "PERRO GUIA");
            if ($revisionesPegatinasInteriorMampara[$i]['PERRO_GUIA'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasInteriorMampara[$i]['PERRO_GUIA_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasInteriorMampara[$i]['FECHA'] . ' ' . $revisionesPegatinasInteriorMampara[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasInteriorMampara[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasInteriorMampara[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Interior Mampara');
            $sheet->setCellValue("E$fila", "ZONA RESERVADA PMR");
            if ($revisionesPegatinasInteriorMampara[$i]['ZONA_RESERVADA_PMR'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasInteriorMampara[$i]['ZONA_RESERVADA_PMR_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasInteriorMampara[$i]['FECHA'] . ' ' . $revisionesPegatinasInteriorMampara[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasInteriorMampara[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasInteriorMampara[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Interior Mampara');
            $sheet->setCellValue("E$fila", "TELÉFONO OPERADOR");
            if ($revisionesPegatinasInteriorMampara[$i]['TELEFONO_OPERADOR'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasInteriorMampara[$i]['TELEFONO_OPERADOR_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasInteriorMampara[$i]['FECHA'] . ' ' . $revisionesPegatinasInteriorMampara[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasInteriorMampara[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasInteriorMampara[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Interior Mampara');
            $sheet->setCellValue("E$fila", "WEB CRTM");
            if ($revisionesPegatinasInteriorMampara[$i]['WEB_CRTM'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasInteriorMampara[$i]['WEB_CRTM_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasInteriorMampara[$i]['FECHA'] . ' ' . $revisionesPegatinasInteriorMampara[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasInteriorMampara[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasInteriorMampara[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Interior Mampara');
            $sheet->setCellValue("E$fila", "WEB EMPRESA");
            if ($revisionesPegatinasInteriorMampara[$i]['WEB_EMPRESA'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasInteriorMampara[$i]['WEB_EMPRESA_OBS']}");
            $fila++;

            //Pegatinas Interior Trasera
            $sheet->setCellValue("A$fila", $revisionesPegatinasInteriorTrasera[$i]['FECHA'] . ' ' . $revisionesPegatinasInteriorTrasera[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasInteriorTrasera[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasInteriorTrasera[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Interior Trasera');
            $sheet->setCellValue("E$fila", "MARTILLO");
            if ($revisionesPegatinasInteriorTrasera[$i]['MARTILLO'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasInteriorTrasera[$i]['MARTILLO_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasInteriorTrasera[$i]['FECHA'] . ' ' . $revisionesPegatinasInteriorTrasera[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasInteriorTrasera[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasInteriorTrasera[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Interior Trasera');
            $sheet->setCellValue("E$fila", "PROHÍBIDO FUMAR");
            if ($revisionesPegatinasInteriorTrasera[$i]['PROHIBIDO_FUMAR'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasInteriorTrasera[$i]['PROHIBIDO_FUMAR_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasInteriorTrasera[$i]['FECHA'] . ' ' . $revisionesPegatinasInteriorTrasera[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasInteriorTrasera[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasInteriorTrasera[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Interior Trasera');
            $sheet->setCellValue("E$fila", "PMR");
            if ($revisionesPegatinasInteriorTrasera[$i]['PMR'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasInteriorTrasera[$i]['PMR_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revisionesPegatinasInteriorTrasera[$i]['FECHA'] . ' ' . $revisionesPegatinasInteriorTrasera[$i]['HORA']);
            $sheet->setCellValue("B$fila", $revisionesPegatinasInteriorTrasera[$i]['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revisionesPegatinasInteriorTrasera[$i]['USUARIO']);
            $sheet->setCellValue("D$fila", 'Interior Trasera');
            $sheet->setCellValue("E$fila", "VIDEOVIGILANCIA");
            if ($revisionesPegatinasInteriorTrasera[$i]['VIDEOVIGILANCIA'] == 1) {
                $sheet->setCellValue("F$fila", "X");
            } else {
                $sheet->setCellValue("G$fila", "X");
            }
            $sheet->setCellValue("H$fila", "{$revisionesPegatinasInteriorTrasera[$i]['VIDEOVIGILANCIA_OBS']}");

            $fila += 2;
        }
    }
}
