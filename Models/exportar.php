<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Exportar
{


    public static function generarExcel($fechaInicio, $empresa)
    {

        $spreadsheet = new Spreadsheet();
        $empresas = array(8 => "Empresa_Martin", 21 => "Autoperiferia", 10 => 'Empresa_Ruiz');

        $nombreFichero = "Revisiones_{$fechaInicio}_{$empresas[$empresa]}.xlsx";

        Accesibilidad::generarHoja($spreadsheet, $fechaInicio, $empresa);
        Documentacion::generarHoja($spreadsheet, $fechaInicio, $empresa);
        Seguridad::generarHoja($spreadsheet, $fechaInicio, $empresa);
        Limpieza::generarHoja($spreadsheet, $fechaInicio, $empresa);
        Pegatinas::generarHoja($spreadsheet, $fechaInicio, $empresa);

        $spreadsheet->removeSheetByIndex(0);
        $spreadsheet->setActiveSheetIndex(0);
        $writer = new Xlsx($spreadsheet);
        $writer->save("ficheros/$nombreFichero");

        $_SESSION['nombre_fichero_descarga'] = $nombreFichero;
    }
}
