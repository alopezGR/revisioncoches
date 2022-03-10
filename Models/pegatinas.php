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

        $queryFlota = " INSERT INTO `peg_ext_frontal` (`ID`, ID_EMPRESA, ID_VEHICULO, CODIGO_VEHICULO, ID_USUARIO, FECHA, HORA, `CRTM_LOGO`, `LOGO_EMPRESA`, `MINUSVALIDO`, `NUMERO_VEHICULO`, `CRTM_LOGO_OBS`, 
        `LOGO_EMPRESA_OBS`, `MINUSVALIDO_OBS`, `NUMERO_VEHICULO_OBS`, TRASPASADO, USUARIO) 
        VALUES (NULL, :ID_EMPRESA, :ID_VEHICULO, :CODIGO_VEHICULO, :ID_USUARIO, :FECHA, :HORA, :CRTM_LOGO, :LOGO_EMPRESA, :MINUSVALIDO, :NUMERO_VEHICULO, :CRTM_LOGO_OBS, 
        :LOGO_EMPRESA_OBS, :MINUSVALIDO_OBS, :NUMERO_VEHICULO_OBS, '0', :USUARIO)";

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
        $stFlota->bindValue(":CRTM_LOGO_OBS", (!empty($datos['CRTM_LOGO_EF_OBS'])) ? $datos['CRTM_LOGO_EF_OBS'] : NULL);
        $stFlota->bindValue(":LOGO_EMPRESA_OBS", (!empty($datos['LOGO_EMPRESA_EF_OBS'])) ? $datos['LOGO_EMPRESA_EF_OBS'] : NULL);
        $stFlota->bindValue(":MINUSVALIDO_OBS", (!empty($datos['MINUSVALIDO_EF_OBS'])) ? $datos['MINUSVALIDO_EF_OBS'] : NULL);
        $stFlota->bindValue(":NUMERO_VEHICULO_OBS", (!empty($datos['NUMERO_VEHICULO_EF_OBS'])) ? $datos['NUMERO_VEHICULO_EF_OBS'] : NULL);
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
        `SOLICITUD_RAMPA`, `LOGO_EMPRESA_OBS`, `WEB_CRTM_OBS`, `PMR_OBS`, `STOP_COVID_OBS`, `SALIDA_OBS`, `ENTRADA_OBS`, `MINUSVALIDO_OBS`, 
        `CAMARA_COMERCIO_OBS`, `SALIDA_EMERGENCIA_OBS`, `GRUPO_RUIZ_OBS`, `NUMERO_VEHICULO_OBS`, `APERTURA_EMERGENCIA_OBS`, `SOLICITUD_RAMPA_OBS`, TRASPASADO, USUARIO) 
        VALUES (NULL, :ID_EMPRESA, :ID_VEHICULO, :CODIGO_VEHICULO, :ID_USUARIO, :FECHA, :HORA, :LOGO_EMPRESA, :WEB_CRTM, :PMR, :STOP_COVID, :SALIDA, :ENTRADA, :MINUSVALIDO, :CAMARA_COMERCIO, :SALIDA_EMERGENCIA, :GRUPO_RUIZ, 
         :NUMERO_VEHICULO, :APERTURA_EMERGENCIA, :SOLICITUD_RAMPA, :LOGO_EMPRESA_OBS, :WEB_CRTM_OBS, :PMR_OBS, :STOP_COVID_OBS, :SALIDA_OBS, :ENTRADA_OBS, :MINUSVALIDO_OBS, 
         :CAMARA_COMERCIO_OBS, :SALIDA_EMERGENCIA_OBS, :GRUPO_RUIZ_OBS, :NUMERO_VEHICULO_OBS, :APERTURA_EMERGENCIA_OBS, :SOLICITUD_RAMPA_OBS, '0', :USUARIO)";


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

    public static function obtenerPegatinasExteriorFrontalFecha($fecha, $empresa)
    {
        $conn = Db::getConector();

        $query = "SELECT * FROM peg_ext_frontal WHERE fecha = '$fecha' and ID_EMPRESA = $empresa ORDER BY hora DESC";

        $st = $conn->prepare($query);

        $st->execute();

        if ($st) {
            return $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public static function obtenerPegatinasExteriorLateralDerechoFecha($fecha, $empresa)
    {
        $conn = Db::getConector();

        $query = "SELECT * FROM peg_ext_lateral_derecho WHERE fecha = '$fecha' and ID_EMPRESA = $empresa ORDER BY hora DESC";

        $st = $conn->prepare($query);

        $st->execute();

        if ($st) {
            return $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public static function obtenerPegatinasExteriorLateralIzquierdoFecha($fecha, $empresa)
    {
        $conn = Db::getConector();

        $query = "SELECT * FROM peg_ext_lateral_izq WHERE fecha = '$fecha' and ID_EMPRESA = $empresa ORDER BY hora DESC";

        $st = $conn->prepare($query);

        $st->execute();

        if ($st) {
            return $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public static function obtenerPegatinasExteriorLunaFecha($fecha, $empresa)
    {
        $conn = Db::getConector();

        $query = "SELECT * FROM peg_ext_lunas WHERE fecha = '$fecha' and ID_EMPRESA = $empresa ORDER BY hora DESC";

        $st = $conn->prepare($query);

        $st->execute();

        if ($st) {
            return $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public static function obtenerPegatinasExteriorTraseraFecha($fecha, $empresa)
    {
        $conn = Db::getConector();

        $query = "SELECT * FROM peg_ext_trasera WHERE fecha = '$fecha' and ID_EMPRESA = $empresa ORDER BY hora DESC";

        $st = $conn->prepare($query);

        $st->execute();

        if ($st) {
            return $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public static function obtenerPegatinasInteriorCentralFecha($fecha, $empresa)
    {
        $conn = Db::getConector();

        $query = "SELECT * FROM peg_int_central WHERE fecha = '$fecha' and ID_EMPRESA = $empresa ORDER BY hora DESC";

        $st = $conn->prepare($query);

        $st->execute();

        if ($st) {
            return $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public static function obtenerPegatinasInteriorDelanteroFecha($fecha, $empresa)
    {
        $conn = Db::getConector();

        $query = "SELECT * FROM peg_int_del WHERE fecha = '$fecha' and ID_EMPRESA = $empresa ORDER BY hora DESC";

        $st = $conn->prepare($query);

        $st->execute();

        if ($st) {
            return $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public static function obtenerPegatinasInteriorLunaFecha($fecha, $empresa)
    {
        $conn = Db::getConector();

        $query = "SELECT * FROM peg_int_luna WHERE fecha = '$fecha' and ID_EMPRESA = $empresa ORDER BY hora DESC";

        $st = $conn->prepare($query);

        $st->execute();

        if ($st) {
            return $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public static function obtenerPegatinasInteriorMamparaFecha($fecha, $empresa)
    {
        $conn = Db::getConector();

        $query = "SELECT * FROM peg_int_mampara WHERE fecha = '$fecha' and ID_EMPRESA = $empresa ORDER BY hora DESC";

        $st = $conn->prepare($query);

        $st->execute();

        if ($st) {
            return $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public static function obtenerPegatinasInteriorTraseraFecha($fecha, $empresa)
    {
        $conn = Db::getConector();

        $query = "SELECT * FROM peg_int_trasera WHERE fecha = '$fecha' and ID_EMPRESA = $empresa ORDER BY hora DESC";

        $st = $conn->prepare($query);

        $st->execute();

        if ($st) {
            return $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public static function generarHoja($spreadsheet, $fechaInicio, $empresa)
    {

        $revisionesPegatinasExteriorFrontal = Pegatinas::obtenerPegatinasExteriorFrontalFecha($fechaInicio, $empresa);
        $revisionesPegatinasExteriorLateralDerecho = Pegatinas::obtenerPegatinasExteriorLateralDerechoFecha($fechaInicio, $empresa);
        $revisionesPegatinasExteriorLateralIzquierdo = Pegatinas::obtenerPegatinasExteriorLateralIzquierdoFecha($fechaInicio, $empresa);
        $revisionesPegatinasExteriorLuna = Pegatinas::obtenerPegatinasExteriorLunaFecha($fechaInicio, $empresa);
        $revisionesPegatinasExteriorTrasera = Pegatinas::obtenerPegatinasExteriorTraseraFecha($fechaInicio, $empresa);
        $revisionesPegatinasInteriorCentral = Pegatinas::obtenerPegatinasInteriorCentralFecha($fechaInicio, $empresa);
        $revisionesPegatinasInteriorDelantero = Pegatinas::obtenerPegatinasInteriorDelanteroFecha($fechaInicio, $empresa);
        $revisionesPegatinasInteriorLuna = Pegatinas::obtenerPegatinasInteriorLunaFecha($fechaInicio, $empresa);
        $revisionesPegatinasInteriorMampara = Pegatinas::obtenerPegatinasInteriorMamparaFecha($fechaInicio, $empresa);
        $revisionesPegatinasInteriorTrasera = Pegatinas::obtenerPegatinasInteriorTraseraFecha($fechaInicio, $empresa);

        $sheet = $spreadsheet->createSheet();

        $sheet->setTitle("Revisiones Estado Pegatinas");

        $sheet->getStyle('A:E')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A:E')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setWidth(100);
        $sheet->getStyle('D')->getAlignment()->setWrapText(true);

        $sheet->getColumnDimension('E')->setAutoSize(true);

        $fila = 1;

        for ($i = 0; $i < count($revisionesPegatinasExteriorFrontal); $i++) {
            $filaInicio = $fila;

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
                ]
            ];

            $sheet->setCellValue("A$fila", "REVISIÓN VEHÍCULO:  {$revisionesPegatinasExteriorFrontal[$i]['CODIGO_VEHICULO']}");
            $sheet->getStyle("A$fila")->applyFromArray($estiloNegrita);

            $fila += 2;
            $sheet->setCellValue("A$fila", "FECHA REVISIÓN");
            $sheet->getStyle("A$fila")->applyFromArray($estiloNegrita);
            $sheet->setCellValue("B$fila", "$fechaInicio {$revisionesPegatinasExteriorFrontal[$i]['HORA']}");

            $sheet->setCellValue("C$fila", "REVISOR");
            $sheet->getStyle("C$fila")->applyFromArray($estiloNegrita);
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasExteriorFrontal[$i]['USUARIO']}");
            $fila += 2;

            $sheet->setCellValue("A$fila", "LIMPIEZA EXTERIOR");
            $sheet->getStyle("A$fila")->applyFromArray($estiloNegrita);

            $fila++;
            $sheet->setCellValue("B$fila", "OK");
            $sheet->setCellValue("C$fila", "NO OK");
            $sheet->setCellValue("D$fila", "OBSERVACIONES");
            $sheet->getStyle("B$fila:D$fila")->applyFromArray($estiloCabeceraTabla);

            $fila++;
            $sheet->setCellValue("A$fila", "LOGO CRTM");
            if ($revisionesPegatinasExteriorFrontal[$i]['CRTM_LOGO'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasExteriorFrontal[$i]['CRTM_LOGO_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "LOGO EMPRESA");
            if ($revisionesPegatinasExteriorFrontal[$i]['LOGO_EMPRESA'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasExteriorFrontal[$i]['LOGO_EMPRESA_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "MINUSVÁLIDO");
            if ($revisionesPegatinasExteriorFrontal[$i]['MINUSVALIDO'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasExteriorFrontal[$i]['MINUSVALIDO_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "NÚMERO VEHÍCULO");
            if ($revisionesPegatinasExteriorFrontal[$i]['NUMERO_VEHICULO'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasExteriorFrontal[$i]['NUMERO_VEHICULO_OBS']}");

            $fila += 3;

            //Pegatina exterior lateral derecho
            $sheet->setCellValue("A$fila", "PEGATINAS EXTERIOR LATERAL DERECHO");
            $sheet->getStyle("A$fila")->applyFromArray($estiloNegrita);

            $fila++;
            $sheet->setCellValue("B$fila", "OK");
            $sheet->setCellValue("C$fila", "NO OK");
            $sheet->setCellValue("D$fila", "OBSERVACIONES");
            $sheet->getStyle("B$fila:D$fila")->applyFromArray($estiloCabeceraTabla);

            $fila++;
            $sheet->setCellValue("A$fila", "LOGO EMPRESA");
            if ($revisionesPegatinasExteriorLateralDerecho[$i]['LOGO_EMPRESA'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasExteriorLateralDerecho[$i]['LOGO_EMPRESA_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "WEB CRTM");
            if ($revisionesPegatinasExteriorLateralDerecho[$i]['WEB_CRTM'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasExteriorLateralDerecho[$i]['WEB_CRTM_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "PMR");
            if ($revisionesPegatinasExteriorLateralDerecho[$i]['PMR'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasExteriorLateralDerecho[$i]['PMR_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "STOP COVID");
            if ($revisionesPegatinasExteriorLateralDerecho[$i]['STOP_COVID'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasExteriorLateralDerecho[$i]['STOP_COVID_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "SALIDA");
            if ($revisionesPegatinasExteriorLateralDerecho[$i]['SALIDA'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasExteriorLateralDerecho[$i]['SALIDA_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "ENTRADA");
            if ($revisionesPegatinasExteriorLateralDerecho[$i]['ENTRADA'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasExteriorLateralDerecho[$i]['ENTRADA_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "MINUSVALIDO");
            if ($revisionesPegatinasExteriorLateralDerecho[$i]['MINUSVALIDO'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasExteriorLateralDerecho[$i]['MINUSVALIDO_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "CÁMARA DE COMERCIO");
            if ($revisionesPegatinasExteriorLateralDerecho[$i]['CAMARA_COMERCIO'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasExteriorLateralDerecho[$i]['CAMARA_COMERCIO_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "SALIDA DE EMERGENCIA");
            if ($revisionesPegatinasExteriorLateralDerecho[$i]['SALIDA_EMERGENCIA'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasExteriorLateralDerecho[$i]['SALIDA_EMERGENCIA_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "GRUPO RUIZ");
            if ($revisionesPegatinasExteriorLateralDerecho[$i]['GRUPO_RUIZ'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasExteriorLateralDerecho[$i]['GRUPO_RUIZ_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "NÚMERO VEHÍCULO");
            if ($revisionesPegatinasExteriorLateralDerecho[$i]['NUMERO_VEHICULO'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasExteriorLateralDerecho[$i]['NUMERO_VEHICULO_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "APERTURA EMERGENCIA");
            if ($revisionesPegatinasExteriorLateralDerecho[$i]['APERTURA_EMERGENCIA'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasExteriorLateralDerecho[$i]['APERTURA_EMERGENCIA_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "SOLICITUD RAMPA");
            if ($revisionesPegatinasExteriorLateralDerecho[$i]['SOLICITUD_RAMPA'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasExteriorLateralDerecho[$i]['SOLICITUD_RAMPA_OBS']}");
            $fila += 3;
            //Pegatinas exterior lateral izquierdo
            $sheet->setCellValue("A$fila", "PEGATINAS EXTERIOR LATERAL IZQUIERDO");
            $sheet->getStyle("A$fila")->applyFromArray($estiloNegrita);

            $fila++;
            $sheet->setCellValue("B$fila", "OK");
            $sheet->setCellValue("C$fila", "NO OK");
            $sheet->setCellValue("D$fila", "OBSERVACIONES");
            $sheet->getStyle("B$fila:D$fila")->applyFromArray($estiloCabeceraTabla);

            $fila++;
            $sheet->setCellValue("A$fila", "LOGO CRTM");
            if ($revisionesPegatinasExteriorLateralIzquierdo[$i]['CRTM_LOGO'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasExteriorLateralIzquierdo[$i]['CRTM_LOGO_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "LOGO EMPRESA");
            if ($revisionesPegatinasExteriorLateralIzquierdo[$i]['LOGO_EMPRESA'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasExteriorLateralIzquierdo[$i]['LOGO_EMPRESA_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "WEB CRTM");
            if ($revisionesPegatinasExteriorLateralIzquierdo[$i]['WEB_CRTM'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasExteriorLateralIzquierdo[$i]['WEB_CRTM_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "CÁMARA DE COMERCIO");
            if ($revisionesPegatinasExteriorLateralIzquierdo[$i]['CAMARA_COMERCIO'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasExteriorLateralIzquierdo[$i]['CAMARA_COMERCIO_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "SALIDA DE EMERGENCIA");
            if ($revisionesPegatinasExteriorLateralIzquierdo[$i]['SALIDA_EMERGENCIA'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasExteriorLateralIzquierdo[$i]['SALIDA_EMERGENCIA_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "GRUPO RUIZ");
            if ($revisionesPegatinasExteriorLateralIzquierdo[$i]['GRUPO_RUIZ'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasExteriorLateralIzquierdo[$i]['GRUPO_RUIZ_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "NÚMERO VEHÍCULO");
            if ($revisionesPegatinasExteriorLateralIzquierdo[$i]['NUMERO_VEHICULO'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasExteriorLateralIzquierdo[$i]['NUMERO_VEHICULO_OBS']}");
            $fila += 3;

            //Pegatinas exterior luna
            $sheet->setCellValue("A$fila", "PEGATINAS EXTERIOR LUNAS");
            $sheet->getStyle("A$fila")->applyFromArray($estiloNegrita);

            $fila++;
            $sheet->setCellValue("B$fila", "OK");
            $sheet->setCellValue("C$fila", "NO OK");
            $sheet->setCellValue("D$fila", "OBSERVACIONES");
            $sheet->getStyle("B$fila:D$fila")->applyFromArray($estiloCabeceraTabla);

            $fila++;
            $sheet->setCellValue("A$fila", "SALIDA EMERGENCIA");
            if ($revisionesPegatinasExteriorLuna[$i]['SALIDA_EMERGENCIA'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasExteriorLuna[$i]['SALIDA_EMERGENCIA_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "GRUPO RUIZ");
            if ($revisionesPegatinasExteriorLuna[$i]['GRUPO_RUIZ'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasExteriorLuna[$i]['GRUPO_RUIZ_OBS']}");
            $fila += 3;

            //Pegatinas Exterior Trasera
            $sheet->setCellValue("A$fila", "PEGATINAS EXTERIOR TRASERA");
            $sheet->getStyle("A$fila")->applyFromArray($estiloNegrita);

            $fila++;
            $sheet->setCellValue("B$fila", "OK");
            $sheet->setCellValue("C$fila", "NO OK");
            $sheet->setCellValue("D$fila", "OBSERVACIONES");
            $sheet->getStyle("B$fila:D$fila")->applyFromArray($estiloCabeceraTabla);

            $fila++;
            $sheet->setCellValue("A$fila", "LOGO CRTM");
            if ($revisionesPegatinasExteriorTrasera[$i]['CRTM_LOGO'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasExteriorTrasera[$i]['CRTM_LOGO_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "WEB CRTM");
            if ($revisionesPegatinasExteriorTrasera[$i]['WEB_CRTM'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasExteriorTrasera[$i]['WEB_CRTM_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "WEB EMPRESA");
            if ($revisionesPegatinasExteriorTrasera[$i]['WEB_EMPRESA'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasExteriorTrasera[$i]['WEB_EMPRESA_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "NÚMERO VEHÍCULO");
            if ($revisionesPegatinasExteriorTrasera[$i]['NUMERO_VEHICULO'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasExteriorTrasera[$i]['NUMERO_VEHICULO_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "SALIDA EMERGENCIA");
            if ($revisionesPegatinasExteriorTrasera[$i]['SALIDA_EMERGENCIA'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasExteriorTrasera[$i]['SALIDA_EMERGENCIA_OBS']}");
            $fila += 3;


            //Pegatinas Interior Central
            $sheet->setCellValue("A$fila", "PEGATINAS INTERIOR CENTRAL");
            $sheet->getStyle("A$fila")->applyFromArray($estiloNegrita);

            $fila++;
            $sheet->setCellValue("B$fila", "OK");
            $sheet->setCellValue("C$fila", "NO OK");
            $sheet->setCellValue("D$fila", "OBSERVACIONES");
            $sheet->getStyle("B$fila:D$fila")->applyFromArray($estiloCabeceraTabla);

            $fila++;
            $sheet->setCellValue("A$fila", "TARIFAS");
            if ($revisionesPegatinasInteriorCentral[$i]['TARIFAS'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasInteriorCentral[$i]['TARIFAS_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "PLAN EVACUACIÓN");
            if ($revisionesPegatinasInteriorCentral[$i]['PLAN_EVACUACION'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasInteriorCentral[$i]['PLAN_EVACUACION_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "COVID");
            if ($revisionesPegatinasInteriorCentral[$i]['COVID'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasInteriorCentral[$i]['COVID_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "QR ENCUESTA");
            if ($revisionesPegatinasInteriorCentral[$i]['QR_ENCUESTA'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasInteriorCentral[$i]['QR_ENCUESTA_OBS']}");
            $fila += 3;


            //Pegatinas Interior Delantero
            $sheet->setCellValue("A$fila", "PEGATINAS INTERIOR DELANTERO");
            $sheet->getStyle("A$fila")->applyFromArray($estiloNegrita);

            $fila++;
            $sheet->setCellValue("B$fila", "OK");
            $sheet->setCellValue("C$fila", "NO OK");
            $sheet->setCellValue("D$fila", "OBSERVACIONES");
            $sheet->getStyle("B$fila:D$fila")->applyFromArray($estiloCabeceraTabla);

            $fila++;
            $sheet->setCellValue("A$fila", "VIDEOVIGILANCIA");
            if ($revisionesPegatinasInteriorDelantero[$i]['VIDEOVIGILANCIA'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasInteriorDelantero[$i]['VIDEOVIGILANCIA_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "PROHÍBIDO FUMAR");
            if ($revisionesPegatinasInteriorDelantero[$i]['PROHIBIDO_FUMAR'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasInteriorDelantero[$i]['PROHIBIDO_FUMAR_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "PTM");
            if ($revisionesPegatinasInteriorDelantero[$i]['PTM'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasInteriorDelantero[$i]['PTM_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "CAMBIO MÁXIMO");
            if ($revisionesPegatinasInteriorDelantero[$i]['CAMBIO_MAXIMO'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasInteriorDelantero[$i]['CAMBIO_MAXIMO_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "TARIFAS");
            if ($revisionesPegatinasInteriorDelantero[$i]['TARIFAS'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasInteriorDelantero[$i]['TARIFAS_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "OCUPACIÓN MÁXIMA");
            if ($revisionesPegatinasInteriorDelantero[$i]['OCUPACION_MAXIMA'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasInteriorDelantero[$i]['OCUPACION_MAXIMA_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "BOTIQUÍN");
            if ($revisionesPegatinasInteriorDelantero[$i]['BOTIQUIN'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasInteriorDelantero[$i]['BOTIQUIN_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "SALIDA EMERGENCIA");
            if ($revisionesPegatinasInteriorDelantero[$i]['SALIDA_EMERGENCIA'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasInteriorDelantero[$i]['SALIDA_EMERGENCIA_OBS']}");
            $fila += 3;


            //Pegatinas Lunas Interiores
            $sheet->setCellValue("A$fila", "PEGATINAS LUNAS INTERIORES");
            $sheet->getStyle("A$fila")->applyFromArray($estiloNegrita);

            $fila++;
            $sheet->setCellValue("B$fila", "OK");
            $sheet->setCellValue("C$fila", "NO OK");
            $sheet->setCellValue("D$fila", "OBSERVACIONES");
            $sheet->getStyle("B$fila:D$fila")->applyFromArray($estiloCabeceraTabla);

            $fila++;
            $sheet->setCellValue("A$fila", "CINTURONES DE SEGURIDAD");
            if ($revisionesPegatinasInteriorLuna[$i]['CINTURON_SEGURIDAD'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasInteriorLuna[$i]['CINTURON_SEGURIDAD_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "MARTILLOS");
            if ($revisionesPegatinasInteriorLuna[$i]['MARTILLOS'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasInteriorLuna[$i]['MARTILLOS_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "EXTINTORES");
            if ($revisionesPegatinasInteriorLuna[$i]['EXTINTORES'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasInteriorLuna[$i]['EXTINTORES_OBS']}");
            $fila += 3;


            //Pegatinas Interior Mampara
            $sheet->setCellValue("A$fila", "PEGATINAS MAMPARA INTERIOR");
            $sheet->getStyle("A$fila")->applyFromArray($estiloNegrita);

            $fila++;
            $sheet->setCellValue("B$fila", "OK");
            $sheet->setCellValue("C$fila", "NO OK");
            $sheet->setCellValue("D$fila", "OBSERVACIONES");
            $sheet->getStyle("B$fila:D$fila")->applyFromArray($estiloCabeceraTabla);

            $fila++;
            $sheet->setCellValue("A$fila", "TARIFAS");
            if ($revisionesPegatinasInteriorMampara[$i]['TARIFAS'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasInteriorMampara[$i]['TARIFAS_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "PERRO GUIA");
            if ($revisionesPegatinasInteriorMampara[$i]['PERRO_GUIA'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasInteriorMampara[$i]['PERRO_GUIA_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "ZONA RESERVADA PMR");
            if ($revisionesPegatinasInteriorMampara[$i]['ZONA_RESERVADA_PMR'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasInteriorMampara[$i]['ZONA_RESERVADA_PMR_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "TELÉFONO OPERADOR");
            if ($revisionesPegatinasInteriorMampara[$i]['TELEFONO_OPERADOR'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasInteriorMampara[$i]['TELEFONO_OPERADOR_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "WEB CRTM");
            if ($revisionesPegatinasInteriorMampara[$i]['WEB_CRTM'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasInteriorMampara[$i]['WEB_CRTM_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "WEB EMPRESA");
            if ($revisionesPegatinasInteriorMampara[$i]['WEB_EMPRESA'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasInteriorMampara[$i]['WEB_EMPRESA_OBS']}");
            $fila += 3;

            //Pegatinas Interior Mampara
            $sheet->setCellValue("A$fila", "PEGATINAS INTERIOR TRASERO");
            $sheet->getStyle("A$fila")->applyFromArray($estiloNegrita);

            $fila++;
            $sheet->setCellValue("B$fila", "OK");
            $sheet->setCellValue("C$fila", "NO OK");
            $sheet->setCellValue("D$fila", "OBSERVACIONES");
            $sheet->getStyle("B$fila:D$fila")->applyFromArray($estiloCabeceraTabla);

            $fila++;
            $sheet->setCellValue("A$fila", "MARTILLO");
            if ($revisionesPegatinasInteriorTrasera[$i]['MARTILLO'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasInteriorTrasera[$i]['MARTILLO_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "PROHÍBIDO FUMAR");
            if ($revisionesPegatinasInteriorTrasera[$i]['PROHIBIDO_FUMAR'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasInteriorTrasera[$i]['PROHIBIDO_FUMAR_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "PMR");
            if ($revisionesPegatinasInteriorTrasera[$i]['PMR'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasInteriorTrasera[$i]['PMR_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "VIDEOVIGILANCIA");
            if ($revisionesPegatinasInteriorTrasera[$i]['VIDEOVIGILANCIA'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revisionesPegatinasInteriorTrasera[$i]['VIDEOVIGILANCIA_OBS']}");



            $sheet->getStyle("A{$filaInicio}:D$fila")->applyFromArray(array('borders' => [
                'outline' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],));

            $fila += 3;
        }
    }
}
