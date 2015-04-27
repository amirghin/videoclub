<?php

require "../conexion.php";
require "../classes/clientes.php";

$cliente = new clientes;
$cliente->buscar_pendientes_aprobacion($conexion);
?>