<?php

require "../conexion.php";
require "../classes/clientes.php";
$cliente = new clientes;

if(isset($_POST["id_cliente"])){		
		$cliente->buscar_cliente($_POST["id_cliente"], $conexion);	
}


?>