<?php
session_start();
$file = "ficheros/{$_SESSION['nombre_fichero_descarga']}"; //ruta al fichero en los directorios locales
$nombre_fichero = $_SESSION['nombre_fichero_descarga']; //nombre del fichero que se descargará el usuario
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="'.basename($file).'"');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($file));
readfile($file);
unset($_SESSION['nombre_fichero_descarga']);
exit;
