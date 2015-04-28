<?php session_start();?>

<!DOCTYPE html>
<html>
<head>
	<title>Insertar actores directos</title>
		<link rel="stylesheet" type="text/css" href="css/estilos.css">
    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/dropdown-menu.js"></script>
    <script src="js/videoclub.js"></script>
  
</head>
<body>
    <?php include 'menu.html';?>
    <section class="estilos_form">
		<form action="" method="POST" >
			<fieldset>
               <div class="filas">
                   <label for="nombre">Nombre</label>
                   <input type="text" name="nombre">
               </div>
               <div class="filas">
                   <label for="genero">Genero</label>
                   <input type="text" name="genero">
               </div>
               <div class="filas">
                    <input type="submit" class="button" value="Insertar">
               </div>
            </fieldset>
        </form>
    </section>
</body>