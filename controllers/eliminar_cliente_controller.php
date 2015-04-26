<?php

require "../classes/clientes.php";
require "../conexion.php";

$cliente = new clientes;

if(isset($_POST["id_cliente"])){
	$cliente->borrar_cliente($_POST["id_cliente"], $conexion);
}
?>