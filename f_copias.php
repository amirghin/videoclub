<!DOCTYPE html>
<html>
<head>
	<title>Insertar copias</title>
		<link rel="stylesheet" type="text/css" href="css/estilos.css">

</head>
<body>
    <section class="estilos_form">
		<form action="" method="POST" >
			<fieldset>
               <div class="filas">
                   <label for="id_pelicula">ID Pelicula: </label>
                   <input type="text" name="id_pelicula"> <!-- TODO Creo que esto puede ser un dropdown-->
               </div>
               <div class="filas">
                   <label for="disponibilidad">Disponibilidad:</label>
                   <input type="checkbox" name="disponibilidad">
               </div>
               <div class="filas">
                   <label for="ubicaciones_cod">Codigo ubicacion:</label>
                   <input type="text" name="ubicaciones_cod"> <!-- TODO Creo que esto puede ser un dropdown-->
               </div>
               <div class="filas">
                    <input type="submit" class="button" value="Insertar">
               </div>
            </fieldset>
        </form>
    </section>
</body>