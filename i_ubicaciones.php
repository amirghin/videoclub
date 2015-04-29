<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Insertar copias</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/videoclub.js"></script>
    <script src="js/dropdown-menu.js"></script>

</head>
<body>
    <?php include 'menu.html';?>
    <section class="estilos_form">
		<form action="" method="POST" >
			<fieldset>
               <div class="filas">
                   <label for="cod_ubicacion" class="requerido">Codigo de ubicacion: </label>
                   <input type="text" name="cod_ubicacion"> 
               </div>
               <div class="filas">
                   <label for="detalle">Detalle:</label>
                   <input type="text" name="detalle" class="requerido">
               </div>
               <div class="filas">
                    <input type="button" class="button" value="Insertar" id="insertar_ubicacion">
               </div>
            </fieldset>
        </form>
    </section>

</body>
</html>