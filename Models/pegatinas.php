<?php

include 'vehiculo.php';
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

        $queryFlota = " INSERT INTO `peg_ext_frontal` (`ID`, ID_EMPRESA, ID_VEHICULO, ID_USUARIO, FECHA, HORA, `CRTM_LOGO`, `LOGO_EMPRESA`, `MINUSVALIDO`, `NUMERO_VEHICULO`, `CRTM_LOGO_OBS`, 
        `LOGO_EMPRESA_OBS`, `MINUSVALIDO_OBS`, `NUMERO_VEHICULO_OBS`, TRASPASADO, USUARIO) 
        VALUES (NULL, :ID_EMPRESA, :ID_VEHICULO, :ID_USUARIO, :FECHA, :HORA, :CRTM_LOGO, :LOGO_EMPRESA, :MINUSVALIDO, :NUMERO_VEHICULO, :CRTM_LOGO_OBS, 
        :LOGO_EMPRESA_OBS, :MINUSVALIDO_OBS, :NUMERO_VEHICULO_OBS, '0', :USUARIO)";

        $stFlota = $conn->prepare($queryFlota);

        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        $stFlota->bindParam(":ID_EMPRESA", $datos['EMPRESA']);
        $stFlota->bindParam(":ID_VEHICULO", $datos['IDVEHICULO']);
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


        $queryFlota = " INSERT INTO `peg_ext_lateral_derecho` (`ID`, ID_EMPRESA, ID_VEHICULO, ID_USUARIO, FECHA, HORA, `LOGO_EMPRESA`, `WEB_CRTM`, `PMR`, `STOP_COVID`, `SALIDA`, 
        `ENTRADA`, `MINUSVALIDO`, `CAMARA_COMERCIO`, `SALIDA_EMERGENCIA`, `GRUPO_RUIZ`, `NUMERO_VEHICULO`, `APERTURA_EMERGENCIA`, 
        `SOLICITUD_RAMPA`, `LOGO_EMPRESA_OBS`, `WEB_CRTM_OBS`, `PMR_OBS`, `STOP_COVID_OBS`, `SALIDA_OBS`, `ENTRADA_OBS`, `MINUSVALIDO_OBS`, 
        `CAMARA_COMERCIO_OBS`, `SALIDA_EMERGENCIA_OBS`, `GRUPO_RUIZ_OBS`, `NUMERO_VEHICULO_OBS`, `APRTURA_EMERGENCIA_OBS`, `SOLICITUD_RAMPA_OBS`, TRASPASADO, USUARIO) 
        VALUES (NULL, :ID_EMPRESA, :ID_VEHICULO, :ID_USUARIO, :FECHA, :HORA, :LOGO_EMPRESA, :WEB_CRTM, :PMR, :STOP_COVID, :SALIDA, :ENTRADA, :MINUSVALIDO, :CAMARA_COMERCIO, :SALIDA_EMERGENCIA, :GRUPO_RUIZ, 
         :NUMERO_VEHICULO, :APERTURA_EMERGENCIA, :SOLICITUD_RAMPA, :LOGO_EMPRESA_OBS, :WEB_CRTM_OBS, :PMR_OBS, :STOP_COVID_OBS, :SALIDA_OBS, :ENTRADA_OBS, :MINUSVALIDO_OBS, 
         :CAMARA_COMERCIO_OBS, :SALIDA_EMERGENCIA_OBS, :GRUPO_RUIZ_OBS, :NUMERO_VEHICULO_OBS, :APERTURA_EMERGENCIA_OBS, :SOLICITUD_RAMPA_OBS, '0', :USUARIO)";


        $stFlota = $conn->prepare($queryFlota);

        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        $stFlota->bindParam(":ID_EMPRESA", $datos['EMPRESA']);
        $stFlota->bindParam(":ID_VEHICULO", $datos['IDVEHICULO']);
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

        $queryFlota = " INSERT INTO `peg_ext_lateral_izq` (`ID`, ID_EMPRESA, ID_VEHICULO, ID_USUARIO, FECHA, HORA, `CRTM_LOGO`, `LOGO_EMPRESA`, `WEB_CRTM`, `CAMARA_COMERCIO`, 
        `SALIDA_EMERGENCIA`, `GRUPO_RUIZ`, `NUMERO_VEHICULO`, `CRTM_LOGO_OBS`, `LOGO_EMPRESA_OBS`, `WEB_CRTM_OBS`, 
        `CAMARA_COMERCIO_OBS`, `SALIDA_EMERGENCIA_OBS`, `GRUPO_RUIZ_OBS`, `NUMERO_VEHICULO_OBS`, TRASPASADO, USUARIO) 
        VALUES (NULL, :ID_EMPRESA, :ID_VEHICULO, :ID_USUARIO, :FECHA, :HORA, :CRTM_LOGO, :LOGO_EMPRESA, :WEB_CRTM, :CAMARA_COMERCIO, :SALIDA_EMERGENCIA, 
        :GRUPO_RUIZ, :NUMERO_VEHICULO, :CRTM_LOGO_OBS, :LOGO_EMPRESA_OBS, :WEB_CRTM_OBS, :CAMARA_COMERCIO_OBS, :SALIDA_EMERGENCIA_OBS, :GRUPO_RUIZ_OBS, 
        :NUMERO_VEHICULO_OBS, '0', :USUARIO)";

        $stFlota = $conn->prepare($queryFlota);

        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        $stFlota->bindParam(":ID_EMPRESA", $datos['EMPRESA']);
        $stFlota->bindParam(":ID_VEHICULO", $datos['IDVEHICULO']);
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

        $queryFlota = " INSERT INTO `peg_ext_lunas` (`ID`, ID_EMPRESA, ID_VEHICULO, ID_USUARIO, FECHA, HORA, `SALIDA_EMERGENCIA`, `GRUPO_RUIZ`, `SALIDA_EMERGENCIA_OBS`, 
        `GRUPO_RUIZ_OBS`, TRASPASADO, USUARIO) VALUES (NULL, :ID_EMPRESA, :ID_VEHICULO, :ID_USUARIO, :FECHA, :HORA, :SALIDA_EMERGENCIA, :GRUPO_RUIZ, :SALIDA_EMERGENCIA_OBS, 
        :GRUPO_RUIZ_OBS, '0', :USUARIO)";

        $stFlota = $conn->prepare($queryFlota);

        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        $stFlota->bindParam(":ID_EMPRESA", $datos['EMPRESA']);
        $stFlota->bindParam(":ID_VEHICULO", $datos['IDVEHICULO']);
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

        $queryFlota = " INSERT INTO `peg_ext_trasera` (`ID`, ID_EMPRESA, ID_VEHICULO, ID_USUARIO, FECHA, HORA, `CRTM_LOGO`, `LOGO_EMPRESA`, `WEB_CRTM`, `WEB_EMPRESA`, `NUMERO_VEHICULO`, 
        `SALIDA_EMERGENCIA`, `CRTM_LOGO_OBS`, `LOGO_EMPRESA_OBS`, `WEB_CRTM_OBS`, `WEB_EMPRESA_OBS`, `NUMERO_VEHICULO_OBS`, `SALIDA_EMERGENCIA_OBS`, TRASPASADO, USUARIO) 
        VALUES (NULL, :ID_EMPRESA, :ID_VEHICULO, :ID_USUARIO, :FECHA, :HORA, :CRTM_LOGO, :LOGO_EMPRESA, :WEB_CRTM, :WEB_EMPRESA, :NUMERO_VEHICULO, :SALIDA_EMERGENCIA, 
        :CRTM_LOGO_OBS, :LOGO_EMPRESA_OBS, :WEB_CRTM_OBS, :WEB_EMPRESA_OBS, :NUMERO_VEHICULO_OBS, :SALIDA_EMERGENCIA_OBS, '0', :USUARIO)";

        $stFlota = $conn->prepare($queryFlota);
        
        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        $stFlota->bindParam(":ID_EMPRESA", $datos['EMPRESA']);
        $stFlota->bindParam(":ID_VEHICULO", $datos['IDVEHICULO']);
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

        $queryFlota = " INSERT INTO `peg_int_del` (`ID`, ID_EMPRESA, ID_VEHICULO, ID_USUARIO, FECHA, HORA, `VIDEOVIGILANCIA`, `PROHIBIDO_FUMAR`, `PTM`, `CAMBIO_MAXIMO`, 
        `TARIFAS`, `OCUPACION_MAXIMA`, `BOTIQUIN`, `SALIDA_EMERGENCIA`, `VIDEOVIGILANCIA_OBS`, `PROHIBIDO_FUMAR_OBS`, 
        `PTM_OBS`, `CAMBIO_MAXIMO_OBS`, `TARIFAS_OBS`, `OCUPACION_MAXIMA_OBS`, `BOTIQUIN_OBS`, `SALIDA_EMERGENCIA_OBS`, TRASPASADO, USUARIO) 
        VALUES (NULL, :ID_EMPRESA, :ID_VEHICULO, :ID_USUARIO, :FECHA, :HORA,  :VIDEOVIGILANCIA, :PROHIBIDO_FUMAR, :PTM, :CAMBIO_MAXIMO, :TARIFAS, 
        :OCUPACION_MAXIMA, :BOTIQUIN, :SALIDA_EMERGENCIA, :VIDEOVIGILANCIA_OBS, :PROHIBIDO_FUMAR_OBS, :PTM_OBS, :CAMBIO_MAXIMO_OBS, :TARIFAS_OBS, 
        :OCUPACION_MAXIMA_OBS, :BOTIQUIN_OBS, :SALIDA_EMERGENCIA_OBS, '0', :USUARIO)";

        $stFlota = $conn->prepare($queryFlota);

        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        $stFlota->bindParam(":ID_EMPRESA", $datos['EMPRESA']);
        $stFlota->bindParam(":ID_VEHICULO", $datos['IDVEHICULO']);
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

        $queryFlota = " INSERT INTO `peg_int_central` (`ID`, ID_EMPRESA, ID_VEHICULO, ID_USUARIO, FECHA, HORA, `TARIFAS`, `PLAN_EVACUACION`, `COVID`, `QR_ENCUESTA`, `TARIFAS_OBS`, 
        `PLAN_EVACUACION_OBS`, `COVID_OBS`, `QR_ENCUESTA_OBS`, TRASPASADO, USUARIO) VALUES (NULL,  :ID_EMPRESA, :ID_VEHICULO, :ID_USUARIO, :FECHA, :HORA, :TARIFAS, :PLAN_EVACUACION, 
        :COVID, :QR_ENCUESTA, :TARIFAS_OBS, :PLAN_EVACUACION_OBS, :COVID_OBS, :QR_ENCUESTA_OBS, '0', :USUARIO)";

        $stFlota = $conn->prepare($queryFlota);

        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        $stFlota->bindParam(":ID_EMPRESA", $datos['EMPRESA']);
        $stFlota->bindParam(":ID_VEHICULO", $datos['IDVEHICULO']);
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

        $queryFlota = " INSERT INTO `peg_int_luna` (`ID`, ID_EMPRESA, ID_VEHICULO, ID_USUARIO, FECHA, HORA, `CINTURON_SEGURIDAD`, `MARTILLOS`, `EXTINTORES`, 
        `CINTURON_SEGURIDAD_OBS`, `MARTILLOS_OBS`, `EXTINTORES_OBS`, TRASPASADO, USUARIO) VALUES (NULL, :ID_EMPRESA, :ID_VEHICULO, :ID_USUARIO, :FECHA, :HORA, :CINTURON_SEGURIDAD, :MARTILLOS, :EXTINTORES, 
        :CINTURON_SEGURIDAD_OBS, :MARTILLOS_OBS, :EXTINTORES_OBS, '0', :USUARIO)";

        $stFlota = $conn->prepare($queryFlota);

        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        $stFlota->bindParam(":ID_EMPRESA", $datos['EMPRESA']);
        $stFlota->bindParam(":ID_VEHICULO", $datos['IDVEHICULO']);
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

        $queryFlota = " INSERT INTO `peg_int_mampara` (`ID`, ID_EMPRESA, ID_VEHICULO, ID_USUARIO, FECHA, HORA, `TARIFAS`, `PERRO_GUIA`, `ZONA_RESERVADA_PMR`, `TELEFONO_OPERADOR`, `WEB_CRTM`, 
        `WEB_EMPRESA`, `TARIFAS_OBS`, `PERRO_GUIA_OBS`, `ZONA_RESERVADA_PMR_OBS`, `TELEFONO_OPERADOR_OBS`, `WEB_CRTM_OBS`, `WEB_EMPRESA_OBS`, TRASPASADO, USUARIO) 
        VALUES (NULL, :ID_EMPRESA, :ID_VEHICULO, :ID_USUARIO, :FECHA, :HORA, :TARIFAS, :PERRO_GUIA, :ZONA_RESERVADA_PMR, :TELEFONO_OPERADOR, :WEB_CRTM, 
        :WEB_EMPRESA, :TARIFAS_OBS, :PERRO_GUIA_OBS, :ZONA_RESERVADA_PMR_OBS, :TELEFONO_OPERADOR_OBS, :WEB_CRTM_OBS, :WEB_EMPRESA_OBS, '0', :USUARIO)";

        $stFlota = $conn->prepare($queryFlota);

        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        $stFlota->bindParam(":ID_EMPRESA", $datos['EMPRESA']);
        $stFlota->bindParam(":ID_VEHICULO", $datos['IDVEHICULO']);
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

        $queryFlota = " INSERT INTO `peg_int_trasera` (`ID`, ID_EMPRESA, ID_VEHICULO, ID_USUARIO, FECHA, HORA, `MARTILLO`, `PROHIBIDO_FUMAR`, `PMR`, `VIDEOVIGILANCIA`, 
        `MARTILLO_OBS`, `PROHIBIDO_FUMAR_OBS`, `PMR_OBS`, `VIDEOVIGILANCIA_OBS`, TRASPASADO, USUARIO) VALUES (NULL, :ID_EMPRESA, :ID_VEHICULO, :ID_USUARIO, :FECHA, :HORA, :MARTILLO, 
        :PROHIBIDO_FUMAR, :PMR, :VIDEOVIGILANCIA, :MARTILLO_OBS, :PROHIBIDO_FUMAR_OBS, :PMR_OBS, :VIDEOVIGILANCIA_OBS, '0', :USUARIO)";

        $stFlota = $conn->prepare($queryFlota);

        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        $stFlota->bindParam(":ID_EMPRESA", $datos['EMPRESA']);
        $stFlota->bindParam(":ID_VEHICULO", $datos['IDVEHICULO']);
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
}
