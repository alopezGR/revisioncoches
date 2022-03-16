<?php

class ExportarController
{

    public function index()
    {
        if (isset($_SESSION['logged']) && isset($_SESSION['admin'])) {
            require_once 'Views/Exportar/formulario.php';
        } else {
            require_once 'Views/Usuario/login.php';
        }
    }

    public function exportarRevisiones()
    {
        if (isset($_SESSION['logged']) && isset($_SESSION['admin'])) {
            $fecha = isset($_POST['FECHA_INICIO']) ? $_POST['FECHA_INICIO'] : date("Y-m-d");
            $empresa = isset($_POST['EMPRESA']) ? $_POST['EMPRESA'] : date("Y-m-d");
            Exportar::generarExcel($fecha, $empresa);
            header("Location: index.php");
        } else {
            require_once 'Views/Usuario/login.php';
        }
    }
}
