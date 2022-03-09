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

        if ($stFlota) {
            return true;
        } else {
            return false;
        }
    }

    public static function obtenerRevisionesPorFecha($fecha, $empresa)
    {
        $conn = Db::getConector();

        $query = "SELECT * FROM estado_seguridad WHERE fecha = '$fecha' and ID_EMPRESA = $empresa ORDER BY hora DESC";

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

        $revisiones = Seguridad::obtenerRevisionesPorFecha($fechaInicio, $empresa);

        $sheet = $spreadsheet->createSheet();

        $sheet->setTitle("Revisiones Seguridad");

        $sheet->getStyle('A:E')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A:E')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setWidth(100);
        $sheet->getStyle('D')->getAlignment()->setWrapText(true);

        $sheet->getColumnDimension('E')->setAutoSize(true);

        $fila = 1;

        foreach ($revisiones as $revision) {
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

            $sheet->setCellValue("A$fila", "REVISIÓN VEHÍCULO:  {$revision['CODIGO_VEHICULO']}");
            $sheet->getStyle("A$fila")->applyFromArray($estiloNegrita);

            $fila += 2;
            $sheet->setCellValue("A$fila", "FECHA REVISIÓN");
            $sheet->getStyle("A$fila")->applyFromArray($estiloNegrita);
            $sheet->setCellValue("B$fila", "$fechaInicio {$revision['HORA']}");

            $sheet->setCellValue("C$fila", "REVISOR");
            $sheet->getStyle("C$fila")->applyFromArray($estiloNegrita);
            $sheet->setCellValue("D$fila", "{$revision['USUARIO']}");
            $fila += 2;
            $sheet->setCellValue("B$fila", "OK");
            $sheet->setCellValue("C$fila", "NO OK");
            $sheet->setCellValue("D$fila", "OBSERVACIONES");
            $sheet->getStyle("B$fila:D$fila")->applyFromArray($estiloCabeceraTabla);

            $fila++;
            $sheet->setCellValue("A$fila", "EXTINTORES");
            if ($revision['EXTINTORES'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revision['EXTINTORES_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "TRIÁNGULOS");
            if ($revision['TRIANGULOS'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revision['TRIANGULOS_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "CALZO");
            if ($revision['CALZO'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revision['CALZO_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "CHALECO");
            if ($revision['CHALECO'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revision['CHALECO_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "GUANTES");
            if ($revision['GUANTES'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revision['GUANTES_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "BOTIQUÍN");
            if ($revision['BOTIQUIN'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revision['BOTIQUIN_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "MARTILLOS");
            if ($revision['MARTILLOS'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revision['MARTILLOS_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", "CINTURONES ASIENTOS");
            if ($revision['CINTURONES_ASIENTOS'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revision['CINTURONES_ASIENTOS_OBS']}");
            $sheet->getStyle("A{$filaInicio}:D$fila")->applyFromArray(array('borders' => [
                'outline' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],));

            $fila += 3;
        }
    }
}
