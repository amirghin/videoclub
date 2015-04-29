<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Insertar Cargos</title>
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
                   <label for="detalle">Detalle: </label>
                   <input type="text" name="detalle" >
               </div>
               <div class="filas">
                   <label for="monto">Monto</label>
                   <input type="text" name="monto">
               </div>
               <div class="filas">
                   <label for="tipo">Tipo</label>
                   <input type="text" name="tipo">                  
               </div>
               <div class="filas">
                    <input type="button" class="button" value="Insertar" id="insertar_cargo">
               </div>
            </fieldset>
        </form>
    </section>

</body>