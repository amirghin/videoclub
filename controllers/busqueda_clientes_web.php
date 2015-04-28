<?php

require "../conexion.php";
require "../classes/clientes.php";
session_start();
$cliente = new clientes;
$cliente->clientes_acceso_web($conexion, $_POST["opcion"]);
?>