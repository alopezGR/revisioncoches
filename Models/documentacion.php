<?php

include_once 'vehiculo.php';
class Documentacion Extends Vehiculo{

    public static function insertDatos($datos) {
        $conn = Db::getConector();

        $datetime = date_create();

        $fecha = date_format($datetime, 'Y-m-d');
        $hora = date_format($datetime, 'H:i:s');

        $queryFlota = " INSERT INTO `estado_documentacion` (`ID`, `ID_EMPRESA`, `ID_VEHICULO`, CODIGO_VEHICULO, `ID_USUARIO`, `FECHA`, `HORA`, `LIBRO_RECLAMACIONES`, 
        `SEGURO_VEHICULO`, `ITV`, `FICHA_TECNICA`, `TACOGRAFO`, `LIBRO_RECLAMACIONES_OBS`, `SEGURO_VEHICULO_OBS`, `ITV_OBS`, `FICHA_TECNICA_OBS`, 
        `TACOGRAFO_OBS`, `TRASPASADO`, `USUARIO`) VALUES (NULL, :ID_EMPRESA, :ID_VEHICULO, :CODIGO_VEHICULO, :ID_USUARIO, :FECHA, :HORA, :LIBRO_RECLAMACIONES, 
        :SEGURO_VEHICULO, :ITV, :FICHA_TECNICA, :TACOGRAFO, :LIBRO_RECLAMACIONES_OBS, :SEGURO_VEHICULO_OBS, :ITV_OBS, :FICHA_TECNICA_OBS, :TACOGRAFO_OBS, '0', :USUARIO)";

        $stFlota = $conn->prepare($queryFlota);

        $stFlota->bindParam(":ID_EMPRESA", $datos['EMPRESA']);
        $stFlota->bindParam(":ID_VEHICULO", $datos['IDVEHICULO']);
        $stFlota->bindParam(":CODIGO_VEHICULO", $datos['CODIGO_VEHICULO']);
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

    public static function obtenerRevisionesPorFecha($fecha, $empresa){
        $conn = Db::getConector();

        $query = "SELECT * FROM estado_documentacion WHERE fecha = '$fecha' and ID_EMPRESA = $empresa ORDER BY hora DESC";

        $st = $conn->prepare($query);

        $st->execute();

        if($st){
            return $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public static function generarHoja($spreadsheet, $fechaInicio, $empresa)
    {

        $revisiones = Documentacion::obtenerRevisionesPorFecha($fechaInicio, $empresa);

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

        $sheet->setTitle("Revisiones Estado Documentación");

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

            $sheet->setCellValue("A$fila", $revision['FECHA']);
            $sheet->setCellValue("B$fila", $revision['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revision['USUARIO']);
            $sheet->setCellValue("D$fila", "LIBRO DE RECLAMACIONES");
            if ($revision['LIBRO_RECLAMACIONES'] == 1) {
                $sheet->setCellValue("E$fila", "X");
            } else {
                $sheet->setCellValue("F$fila", "X");
            }
            $sheet->setCellValue("G$fila", "{$revision['LIBRO_RECLAMACIONES_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revision['FECHA']);
            $sheet->setCellValue("B$fila", $revision['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revision['USUARIO']);
            $sheet->setCellValue("D$fila", "SEGURO VEHÍCULO");
            if ($revision['SEGURO_VEHICULO'] == 1) {
                $sheet->setCellValue("E$fila", "X");
            } else {
                $sheet->setCellValue("F$fila", "X");
            }
            $sheet->setCellValue("G$fila", "{$revision['SEGURO_VEHICULO_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revision['FECHA']);
            $sheet->setCellValue("B$fila", $revision['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revision['USUARIO']);
            $sheet->setCellValue("D$fila", "ITV");
            if ($revision['ITV'] == 1) {
                $sheet->setCellValue("E$fila", "X");
            } else {
                $sheet->setCellValue("F$fila", "X");
            }
            $sheet->setCellValue("G$fila", "{$revision['ITV_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revision['FECHA']);
            $sheet->setCellValue("B$fila", $revision['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revision['USUARIO']);
            $sheet->setCellValue("D$fila", "FICHA TÉNICA");
            if ($revision['FICHA_TECNICA'] == 1) {
                $sheet->setCellValue("E$fila", "X");
            } else {
                $sheet->setCellValue("F$fila", "X");
            }
            $sheet->setCellValue("G$fila", "{$revision['FICHA_TECNICA_OBS']}");
            $fila++;
            $sheet->setCellValue("A$fila", $revision['FECHA']);
            $sheet->setCellValue("B$fila", $revision['CODIGO_VEHICULO']);
            $sheet->setCellValue("C$fila", $revision['USUARIO']);
            $sheet->setCellValue("D$fila", "TACÓGRAFO");
            if ($revision['TACOGRAFO'] == 1) {
                $sheet->setCellValue("E$fila", "X");
            } else {
                $sheet->setCellValue("F$fila", "X");
            }
            $sheet->setCellValue("G$fila", "{$revision['TACOGRAFO_OBS']}");

            $fila += 2;
        }
    }

}
