<?php

require "../conexion.php";
require "../classes/clientes.php";
session_start();
$cliente = new clientes;
$cliente->buscar_pendientes_aprobacion($conexion);
?>