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

        } else {
            require_once 'Views/Usuario/login.php';
        }
    }
}
