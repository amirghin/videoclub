<?php
require "../conexion.php";
require "../classes/roles.php";
$roles = new roles;
session_start();
$roles->llenar_dropdown_roles($conexion);


?>