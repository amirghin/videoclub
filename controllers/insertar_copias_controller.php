<?php
require "../conexion.php";
require "../classes/copias.php";
$copias = new copias;

if(isset($_POST["id_pelicula"],$_POST["disponibilidad"], $_POST["ubicaciones_cod_ubicacion"])){	
	$copias->insertar_copia($_POST["id_pelicula"],$_POST["disponibilidad"],$_POST["ubicaciones_cod_ubicacion"],$conexion);
}


?>