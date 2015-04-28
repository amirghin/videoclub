<?php
require "../conexion.php";
require "../classes/cargos.php";
$cargo = new cargos;
session_start();
$cargo->llenar_dropdown_cargos($conexion);


?>