<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Insertar copias</title>
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
                   <label for="id_pelicula">ID Pelicula: </label>
                   <input type="text" name="id_pelicula"> 
               </div>
               <div class="filas">
                   <input type="hidden" name="disponibilidad" value="disponible" readonly>
               </div>
               <div class="filas">
                   <label for="ubicaciones_cod">Codigo ubicacion:</label>
                   <input type="text" name="ubicaciones_cod_ubicacion"> <!-- TODO Creo que esto puede ser un dropdown-->
               </div>
               <div class="filas">
                    <input type="button" class="button" value="Insertar" id="insertar_copias">
               </div>
            </fieldset>
        </form>
    </section>
    

</body>
</html>