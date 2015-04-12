<?php
 
 require "conexion.php";



 	$nom_usuario=$_POST["nombre_usuario"];

	$query = "SELECT * FROM usuarios_administradores WHERE nom_usuario LIKE '%{$nom_usuario}%'";
	$resultado = mysqli_query($conexion, $query);

	$array = array();

	while($row=mysqli_fetch_assoc($resultado)){
	$array[] = $row;

	}

	echo '{"usuarios":'.json_encode($array).'}';






?>