<?php

include_once 'vehiculo.php';
class Accesibilidad extends Vehiculo
{

    public static function insertDatos($datos)
    {
        $conn = Db::getConector();

        $datetime = date_create();

        $fecha = date_format($datetime, 'Y-m-d');
        $hora = date_format($datetime, 'H:i:s');

        $queryFlota = " INSERT INTO `estado_accesibilidad` (`id`, `idempresa`, `idvehiculo`, codigo_vehiculo, `idusuario`, `fecha`, `hora`, `kneeling`, 
        `cinturonespmr`, `barras`, `rampa`, rampaauto, `pulsadoresrampa`, `senlumrampa`, `acusticarampa`, `kneeling_obs`, 
        `cinturonespmr_obs`, `barras_obs`, `rampa_obs`, rampaauto_obs, `pulsadoresrampa_obs`, `senlumrampa_obs`, `acusticarampa_obs`, `traspasado`, usuario) 
        VALUES (NULL, :IDEMPRESA, :IDVEHICULO, :CODIGO_VEHICULO, :IDUSUARIO, :FECHA, :HORA, :KNEELING, :CINTURONESPMR, :BARRAS, :RAMPA, 
        :RAMPAAUTO, :PULSADORESRAMPA, :SENLUMRAMPA, :ACUSTICARAMPA, :KNEELING_OBS, :CINTURONESPMR_OBS, :BARRAS_OBS, :RAMPA_OBS, 
        :RAMPAAUTO_OBS, :PULSADORESRAMPA_OBS, :SENLUMRAMPA_OBS, :ACUSTICARAMPA_OBS, '0', :USUARIO)";

        $stFlota = $conn->prepare($queryFlota);

        $stFlota->bindParam(":IDEMPRESA", $datos['EMPRESA']);
        $stFlota->bindParam(":IDVEHICULO", $datos['IDVEHICULO']);
        $stFlota->bindParam(":CODIGO_VEHICULO", $datos['CODIGO_VEHICULO']);
        $stFlota->bindValue(":IDUSUARIO", isset($datos['IDUSUARIO']) ? $datos['IDUSUARIO'] : 0);
        $stFlota->bindParam(":FECHA", $fecha);
        $stFlota->bindValue(":HORA", $hora);
        $stFlota->bindValue(":KNEELING", $datos['KNEELING']);
        $stFlota->bindValue(":CINTURONESPMR", $datos['CINTURONESPMR']);
        $stFlota->bindValue(":BARRAS", $datos['BARRAS']);
        $stFlota->bindValue(":RAMPA", $datos['RAMPA']);
        $stFlota->bindValue(":RAMPAAUTO", $datos['RAMPAAUTO']);
        $stFlota->bindValue(":PULSADORESRAMPA", $datos['PULSADORESRAMPA']);
        $stFlota->bindValue(":SENLUMRAMPA", $datos['SENLUMRAMPA']);
        $stFlota->bindValue(":ACUSTICARAMPA", !empty($datos['ACUSTICARAMPA']) ? $datos['ACUSTICARAMPA'] : NULL);
        $stFlota->bindValue(":KNEELING_OBS", !empty($datos['KNEELING_OBS']) ? $datos['KNEELING_OBS'] : NULL);
        $stFlota->bindValue(":CINTURONESPMR_OBS", !empty($datos['CINTURONESPMR_OBS']) ? $datos['CINTURONESPMR_OBS'] : NULL);
        $stFlota->bindValue(":BARRAS_OBS", !empty($datos['BARRAS_OBS']) ? $datos['BARRAS_OBS'] : NULL);
        $stFlota->bindValue(":RAMPA_OBS", !empty($datos['RAMPA_OBS']) ? $datos['RAMPA_OBS'] : NULL);
        $stFlota->bindValue(":RAMPAAUTO_OBS", !empty($datos['RAMPAAUTO_OBS']) ? $datos['RAMPAAUTO_OBS'] : NULL);
        $stFlota->bindValue(":PULSADORESRAMPA_OBS", !empty($datos['PULSADORESRAMPA_OBS']) ? $datos['PULSADORESRAMPA_OBS'] : NULL);
        $stFlota->bindValue(":SENLUMRAMPA_OBS", !empty($datos['SENLUMRAMPA_OBS']) ? $datos['SENLUMRAMPA_OBS'] : NULL);
        $stFlota->bindValue(":ACUSTICARAMPA_OBS", !empty($datos['ACUSTICARAMPA_OBS']) ? $datos['ACUSTICARAMPA_OBS'] : NULL);
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

        $query = "SELECT * FROM estado_accesibilidad WHERE fecha = '$fecha' and idempresa = $empresa ORDER BY hora DESC";

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

        $revisiones = Accesibilidad::obtenerRevisionesPorFecha($fechaInicio, $empresa);

        $sheet = $spreadsheet->createSheet();

        $sheet->setTitle("Revisiones Estado Accesibilidad");

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

            $sheet->setCellValue("A$fila", "REVISIÓN VEHÍCULO:  {$revision['codigo_vehiculo']}");
            $sheet->getStyle("A$fila")->applyFromArray($estiloNegrita);

            $fila += 2;
            $sheet->setCellValue("A$fila", "FECHA REVISIÓN");
            $sheet->getStyle("A$fila")->applyFromArray($estiloNegrita);
            $sheet->setCellValue("B$fila", "$fechaInicio {$revision['hora']}");

            $sheet->setCellValue("C$fila", "REVISOR");
            $sheet->getStyle("C$fila")->applyFromArray($estiloNegrita);
            $sheet->setCellValue("D$fila", "{$revision['usuario']}");
            $fila += 2;
            $sheet->setCellValue("B$fila", "OK");
            $sheet->setCellValue("C$fila", "NO OK");
            $sheet->setCellValue("D$fila", "OBSERVACIONES");
            $sheet->getStyle("B$fila:D$fila")->applyFromArray($estiloCabeceraTabla);

            $fila++;
            $sheet->setCellValue("A$fila", "KNEELING");
            if ($revision['kneeling'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revision['kneeling_obs']}");
            $fila++;
            $sheet->setCellValue("A$fila", "CINTURONES PMR");
            if ($revision['cinturonespmr'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revision['cinturonespmr_obs']}");
            $fila++;
            $sheet->setCellValue("A$fila", "ASIDEROS/BARRAS");
            if ($revision['barras'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revision['barras_obs']}");
            $fila++;
            $sheet->setCellValue("A$fila", "RAMPA");
            if ($revision['rampa'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revision['rampa_obs']}");
            $fila++;
            $sheet->setCellValue("A$fila", "RAMPA AUTOMÁTICA");
            if ($revision['rampaauto'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revision['rampaauto_obs']}");
            $fila++;
            $sheet->setCellValue("A$fila", "PULSADORES RAMPA");
            if ($revision['pulsadoresrampa'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revision['pulsadoresrampa_obs']}");
            $fila++;
            $sheet->setCellValue("A$fila", "SEÑALIZACIÓN LUMINOSA RAMPA");
            if ($revision['senlumrampa'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revision['senlumrampa_obs']}");
            $fila++;
            $sheet->setCellValue("A$fila", "ACÚSTICA RAMPA");
            if ($revision['acusticarampa'] == 1) {
                $sheet->setCellValue("B$fila", "X");
            } else {
                $sheet->setCellValue("C$fila", "X");
            }
            $sheet->setCellValue("D$fila", "{$revision['acusticarampa_obs']}");

            $sheet->getStyle("A{$filaInicio}:D$fila")->applyFromArray(array('borders' => [
                'outline' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],));

            $fila += 3;
        }
    }
}
