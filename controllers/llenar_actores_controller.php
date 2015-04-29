<?php
require "../conexion.php";
require "../classes/actores_directores.php";
$actores = new actores_directores;
session_start();
$actores->llenar_dropdown_actores($conexion);


?>