<?php

require "../conexion.php";
require "../classes/clientes.php";
$cliente = new clientes;

if(isset($_POST["id_cliente"])){		
		$cliente->verificar_estado_cliente($_POST["id_cliente"], $conexion);	
}

?>