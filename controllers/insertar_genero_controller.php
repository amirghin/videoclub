<?php
session_start();

require "../conexion.php";
require "../classes/generos.php";

$genero = new generos;


if(isset($_POST["nombre"], $_SESSION["id_usuario"])){   

  $genero->insertar_genero($_POST["nombre"], $conexion, $_SESSION["id_usuario"]); 
}
?>