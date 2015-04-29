<?php
session_start();
$_SESSION["usuario"] = "aadrian";
$_SESSION["nombre_usuario"] = "Adrian";
$_SESSION["id_usuario"] = "1";

echo $_SESSION["usuario"];
echo $_SESSION["id_usuario"];
echo $_SESSION["nombre_usuario"] ;
?>