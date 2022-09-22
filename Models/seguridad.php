<?php

include_once 'vehiculo.php';
class Seguridad extends Vehiculo
{


    public static function insertDatos($datos)
    {
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
        $stFlota->bindValue(":GUANTES", (isset($datos['GUANTES'])) ? $datos['GUANTES'] : NULL);
        $stFlota->bindValue(":BOTIQUIN", (isset($datos['BOTIQUIN'])) ? $datos['BOTIQUIN'] : NULL);
        $stFlota->bindValue(":MARTILLOS", (isset($datos['MARTILLOS'])) ? $datos['MARTILLOS'] : NULL);
        $stFlota->bindValue(":CINTURONES_ASIENTOS", (isset($datos['CINTURONES_ASIENTOS'])) ? $datos['CINTURONES_ASIENTOS'] : NULL);
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

        if ($stFlota) {
            return true;
        } else {
            return false;
        }
    }

    public static function actualizarDatos($datos, $idRevision)
    {
        $conn = Db::getConector();

        $datetime = date_create();

        $fecha = date_format($datetime, 'Y-m-d');
        $hora = date_format($datetime, 'H:i:s');

        $queryFlota = "UPDATE `estado_seguridad` SET `FECHA` = :FECHA, `HORA` = :HORA, `EXTINTORES` = :EXTINTORES, `TRIANGULOS` = :TRIANGULOS, 
         `CALZO` = :CALZO, `CHALECO` = :CHALECO, `GUANTES` = :GUANTES, `BOTIQUIN` = :BOTIQUIN, `MARTILLOS` = :MARTILLOS, `CINTURONES_ASIENTOS` = :CINTURONES_ASIENTOS, 
         `EXTINTORES_OBS` = :EXTINTORES_OBS, `TRIANGULOS_OBS` = :TRIANGULOS_OBS, `CALZO_OBS` = :CALZO_OBS, `CHALECO_OBS` = :CHALECO_OBS, 
         `GUANTES_OBS` = :GUANTES_OBS, `BOTIQUIN_OBS` = :BOTIQUIN_OBS, `MARTILLOS_OBS` = :MARTILLOS_OBS, `CINTURONES_ASIENTOS_OBS` = :CINTURONES_ASIENTOS_OBS, 
         `TRASPASADO` = 0, `USUARIO` = :USUARIO WHERE ID = $idRevision";

        $stFlota = $conn->prepare($queryFlota);

        $stFlota->bindParam(":FECHA", $fecha);
        $stFlota->bindValue(":HORA", $hora);
        $stFlota->bindValue(":EXTINTORES", isset($datos['EXTINTORES']) ? $datos['EXTINTORES'] : NULL);
        $stFlota->bindValue(":TRIANGULOS", isset($datos['TRIANGULOS']) ? $datos['TRIANGULOS'] : NULL);
        $stFlota->bindValue(":CALZO", isset($datos['CALZO']) ? $datos['CALZO'] : NULL);
        $stFlota->bindValue(":CHALECO", isset($datos['CHALECO']) ? $datos['CHALECO'] : NULL);
        $stFlota->bindValue(":GUANTES", (isset($datos['GUANTES'])) ? $datos['GUANTES'] : NULL);
        $stFlota->bindValue(":BOTIQUIN", (isset($datos['BOTIQUIN'])) ? $datos['BOTIQUIN'] : NULL);
        $stFlota->bindValue(":MARTILLOS", (isset($datos['MARTILLOS'])) ? $datos['MARTILLOS'] : NULL);
        $stFlota->bindValue(":CINTURONES_ASIENTOS", (isset($datos['CINTURONES_ASIENTOS'])) ? $datos['CINTURONES_ASIENTOS'] : NULL);
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

        if ($stFlota) {
            return true;
        } else {
            return false;
        }
    }

    public static function obtenerRevisionesPorFecha($fechaInicio, $fechaFin, $empresa)
    {
        $conn = Db::getConector();

        $query = "SELECT * FROM estado_seguridad WHERE fecha between '$fechaInicio' and '$fechaFin' and ID_EMPRESA = $empresa ORDER BY fecha, hora";

        $st = $conn->prepare($query);

        $st->execute();

        if ($st) {
            return $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }


    public static function obtenerUltimaRevision($idVehiculo)
    {
        $conn = Db::getConector();

        $query = "SELECT * FROM estado_seguridad where ID_VEHICULO = $idVehiculo order by fecha desc limit 1";

        $st = $conn->prepare($query);

        $st->execute();

        if ($st) {
            return $st->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }


    public static function comprobarRevision($idRevision)
    {
        $conn = Db::getConector();

        $query = "SELECT `EXTINTORES`, `TRIANGULOS`, `CALZO`, `CHALECO`, `GUANTES`, `BOTIQUIN`, `MARTILLOS`, `CINTURONES_ASIENTOS` FROM estado_seguridad WHERE id = $idRevision";

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

        $revisiones = Seguridad::obtenerRevisionesPorFecha($fechaInicio, $fechaFin, $empresa);

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

        $sheet->setTitle("Revisiones Estado Seguridad");

        $sheet->getStyle('A:G')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A:G')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setWidth(10);
        $sheet->getColumnDimension('F')->setWidth(10);
        $sheet->getColumnDimension('G')->setWidth(100);

        $sheet->getStyle('G')->getAlignment()->setWrapText(true);

        $sheet->setCellValue("A1", "Fecha Revisión");
        $sheet->setCellValue("B1", "Vehículo");
        $sheet->setCellValue("C1", "Revisor");
        $sheet->setCellValue("D1", "Campo");
        $sheet->setCellValue("E1", "OK");
        $sheet->setCellValue("F1", "NO OK");
        $sheet->setCellValue("G1", "Observaciones");
        $sheet->getStyle("A1:G1")->applyFromArray($estiloCabeceraTabla);

        $fila = 2;

        foreach ($revisiones as $revision) {
            $filaInicio = $fila;

            $sheet->setCellValue("A$fila", $revision['FECHA'] . ' ' . $revision['HORA']);
            $sheet->setCellValue("B$fila", $revision['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revision['USUARIO']);
            $sheet->setCellValue("D$fila", "EXTINTORES");
            if ($revision['EXTINTORES'] == 1) {
                $sheet->setCellValue("E$fila", "X");
            } else {
                $sheet->setCellValue("F$fila", "X");
            }
            $sheet->setCellValue("G$fila", "{$revision['EXTINTORES_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revision['FECHA'] . ' ' . $revision['HORA']);
            $sheet->setCellValue("B$fila", $revision['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revision['USUARIO']);
            $sheet->setCellValue("D$fila", "TRIÁNGULOS");
            if ($revision['TRIANGULOS'] == 1) {
                $sheet->setCellValue("E$fila", "X");
            } else {
                $sheet->setCellValue("F$fila", "X");
            }
            $sheet->setCellValue("G$fila", "{$revision['TRIANGULOS_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revision['FECHA'] . ' ' . $revision['HORA']);
            $sheet->setCellValue("B$fila", $revision['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revision['USUARIO']);
            $sheet->setCellValue("D$fila", "CALZO");
            if ($revision['CALZO'] == 1) {
                $sheet->setCellValue("E$fila", "X");
            } else {
                $sheet->setCellValue("F$fila", "X");
            }
            $sheet->setCellValue("G$fila", "{$revision['CALZO_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revision['FECHA'] . ' ' . $revision['HORA']);
            $sheet->setCellValue("B$fila", $revision['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revision['USUARIO']);
            $sheet->setCellValue("D$fila", "CHALECO");
            if ($revision['CHALECO'] == 1) {
                $sheet->setCellValue("E$fila", "X");
            } else {
                $sheet->setCellValue("F$fila", "X");
            }
            $sheet->setCellValue("G$fila", "{$revision['CHALECO_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revision['FECHA'] . ' ' . $revision['HORA']);
            $sheet->setCellValue("B$fila", $revision['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revision['USUARIO']);
            $sheet->setCellValue("D$fila", "GUANTES");
            if ($revision['GUANTES'] == 1) {
                $sheet->setCellValue("E$fila", "X");
            } else {
                $sheet->setCellValue("F$fila", "X");
            }
            $sheet->setCellValue("G$fila", "{$revision['GUANTES_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revision['FECHA'] . ' ' . $revision['HORA']);
            $sheet->setCellValue("B$fila", $revision['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revision['USUARIO']);
            $sheet->setCellValue("D$fila", "BOTIQUÍN");
            if ($revision['BOTIQUIN'] == 1) {
                $sheet->setCellValue("E$fila", "X");
            } else {
                $sheet->setCellValue("F$fila", "X");
            }
            $sheet->setCellValue("G$fila", "{$revision['BOTIQUIN_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revision['FECHA'] . ' ' . $revision['HORA']);
            $sheet->setCellValue("B$fila", $revision['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revision['USUARIO']);
            $sheet->setCellValue("D$fila", "MARTILLOS");
            if ($revision['MARTILLOS'] == 1) {
                $sheet->setCellValue("E$fila", "X");
            } else {
                $sheet->setCellValue("F$fila", "X");
            }
            $sheet->setCellValue("G$fila", "{$revision['MARTILLOS_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revision['FECHA'] . ' ' . $revision['HORA']);
            $sheet->setCellValue("B$fila", $revision['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revision['USUARIO']);
            $sheet->setCellValue("D$fila", "CINTURONES ASIENTOS");
            if ($revision['CINTURONES_ASIENTOS'] == 1) {
                $sheet->setCellValue("E$fila", "X");
            } else {
                $sheet->setCellValue("F$fila", "X");
            }
            $sheet->setCellValue("G$fila", "{$revision['CINTURONES_ASIENTOS_OBS']}");

            $fila += 2;
        }
    }
}
