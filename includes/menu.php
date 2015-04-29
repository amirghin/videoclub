
<?php

if(isset($_SESSION["nombre_usuario"])){

    include "menu_loggeado.php";
}else{
    include "menu_no_logueado.php";
   
}

?>

