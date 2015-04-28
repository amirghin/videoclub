<?php
session_start();
unset($_SESSION["usuario"]);
unset($_SESSION["id_usuario"]); 
unset($_SESSION["nombre_usuario"]); 
header ("Location: login.php");
?>