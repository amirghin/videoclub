<?php
require "../conexion.php";
require "../classes/ubicaciones.php";
$ubicaciones = new ubicaciones;
session_start();
$ubicaciones->llenar_dropdown_ubicaciones($conexion);


?>