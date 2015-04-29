<?php session_start();
if($_SESSION["id_usuario"] == "2" || (!isset($_SESSION["id_usuario"]))) {header("Location: login.php");}?>
<!DOCTYPE html>
<html>
<head>
	<title>Insertar cargos de devolucion</title>
		<link rel="stylesheet" type="text/css" href="css/estilos.css">
        <script src="js/jquery-2.1.3.min.js"></script>
        <script src="js/dropdown-menu.js"></script>
        <script src="js/videoclub.js"></script>

</head>
<body>
    <?php include 'menu.html';?>
    <section class="estilos_form">
        <form action="" method="POST" class="form-horizontal">
            <div class="filas">
                <label for="id_devolucion">ID Devolucion</label>
                <input type="text" name="id_devolucion">
            </div>
            <div class="filas">
                <input type="submit" class="button" value="Insertar">
            </div>
            
        </form>
    </section>
           
    

</body>