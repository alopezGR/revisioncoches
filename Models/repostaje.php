<?php

include_once 'vehiculo.php';
class Repostaje extends Vehiculo
{

    public static function insertDatos($datos)
    {
        $conn = Db::getConector();

        $datetime = date_create();

        $fecha = date_format($datetime, 'Y-m-d');
        $hora = date_format($datetime, 'H:i:s');

        $queryFlota = " INSERT INTO `repostajes` (`id`, `idempresa`, `idvehiculo`, codigo_vehiculo, `idusuario`, `fecha`, `hora`, `gasoleo`, 
        `urea`, `km`, `codigorepostador`, `traspasado`, usuario) 
        VALUES (NULL, :IDEMPRESA, :IDVEHICULO, :CODIGO_VEHICULO, :IDUSUARIO, :FECHA, :HORA, :GASOLEO, :UREA, :KM, :CODIGOREPOSTADOR, '0', :USUARIO)";

        $stFlota = $conn->prepare($queryFlota);

        $stFlota->bindParam(":IDEMPRESA", $datos['EMPRESA']);
        $stFlota->bindParam(":IDVEHICULO", $datos['IDVEHICULO']);
        $stFlota->bindParam(":CODIGO_VEHICULO", $datos['CODIGO_VEHICULO']);
        $stFlota->bindValue(":IDUSUARIO", isset($datos['IDUSUARIO']) ? $datos['IDUSUARIO'] : 0);
        $stFlota->bindParam(":FECHA", $fecha);
        $stFlota->bindValue(":HORA", $hora);
        $stFlota->bindValue(":GASOLEO", $datos['GASOLEO']);
        $stFlota->bindValue(":UREA", $datos['UREA']);
        $stFlota->bindValue(":KM", $datos['KM']);
        $stFlota->bindValue(":CODIGOREPOSTADOR", $datos['CODIGOREPOSTADOR']);
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

        $query = "SELECT * FROM repostajes WHERE fecha between '$fechaInicio' and '$fechaFin' and idempresa = $empresa ORDER BY fecha, hora ";

        $st = $conn->prepare($query);

        $st->execute();

        if ($st) {
            return $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public static function generarHoja($spreadsheet, $fechaInicio, $fechaFin, $empresa)
    {

        $revisiones = Repostaje::obtenerRevisionesPorFecha($fechaInicio, $fechaFin, $empresa);

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

        $sheet->setTitle("Repostajes");

        $sheet->getStyle('A:E')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A:E')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setWidth(50);


        $sheet->setCellValue("A1", "Fecha Revisión");
        $sheet->setCellValue("B1", "Vehículo");
        $sheet->setCellValue("C1", "Revisor");
        $sheet->setCellValue("D1", "Campo");
        $sheet->setCellValue("E1", "Valor");
        $sheet->getStyle("A1:E1")->applyFromArray($estiloCabeceraTabla);

        $fila = 2;

        foreach ($revisiones as $revision) {
            $filaInicio = $fila;


            $sheet->setCellValue("A$fila", $revision['fecha'] . ' ' . $revision['hora']);
            $sheet->setCellValue("B$fila", $revision['codigo_vehiculo']);
            $sheet->setCellValue("C$fila", $revision['usuario']);
            $sheet->setCellValue("D$fila", "GASOLEO");
            $sheet->setCellValue("E$fila", $revision['gasoleo']);


            $fila++;
            $sheet->setCellValue("A$fila", $revision['fecha'] . ' ' . $revision['hora']);
            $sheet->setCellValue("B$fila", $revision['codigo_vehiculo']);
            $sheet->setCellValue("C$fila", $revision['usuario']);
            $sheet->setCellValue("D$fila", "UREA");
            $sheet->setCellValue("E$fila", $revision['urea']);

            $fila++;
            $sheet->setCellValue("A$fila", $revision['fecha'] . ' ' . $revision['hora']);
            $sheet->setCellValue("B$fila", $revision['codigo_vehiculo']);
            $sheet->setCellValue("C$fila", $revision['usuario']);
            $sheet->setCellValue("D$fila", "KM");
            $sheet->setCellValue("E$fila", $revision['km']);

            $fila++;
            $sheet->setCellValue("A$fila", $revision['fecha'] . ' ' . $revision['hora']);
            $sheet->setCellValue("B$fila", $revision['codigo_vehiculo']);
            $sheet->setCellValue("C$fila", $revision['usuario']);
            $sheet->setCellValue("D$fila", "CODIGO REPOSTADOR");
            $sheet->setCellValue("E$fila", $revision['codigorepostador']);


            $fila += 2;
        }
    }
}
