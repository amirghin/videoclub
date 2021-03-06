<?php session_start();?>
<?php include 'includes/header.php';?>
<?php if(!isset($_SESSION["id_usuario"])){$_SESSION["id_usuario"] = "2";}?>

<body>
	<nav id="top-nav" class="navbar navbar-inverse navbar-static-top">

		<div class="container-fluid">
			<div class="navbar-header">
	          <a class="navbar-brand" href="#">Video Club</a>
	        </div>
			<?php


			if(isset($_SESSION["nombre_usuario"])){

			    include "includes/nombre_user.php";
			}else{
			    include "includes/form_login.php";
			   
			}


			?>
		</div>
	</nav>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3 ">
				<?php include 'includes/menu.php';?>
			</div>
			<div class="col-sm-9 ">
				<h3><i class="glyphicon glyphicon-dashboard"></i> Busqueda de peliculas</h3>  
						
				<hr>
				<section class="estilos_form" id="b_peliculas_id">
					<!--<form action="" method="POST">-->
						<div class="filas">
							<label for="nombre_pelicula">Ingrese nombre o genero de pelicula que desea buscar</label>
							<input type="text" name="texto_busqueda" id="texto_busqueda" class="requerido" >
						</div>
						<div class="filas form-group">
							<label for="">Busqueda por genero</label>
							<input type="radio" name="busqueda" value="genero" class="filtros">
						<div class="filas form-group">
							<label for="">Busqueda por nombre</label>
							<input type="radio" name="busqueda" value="nombre" class="filtros">
						</div>

						<div class="filas form-group">
							<input type="button" value="Enviar" id="buscar_peliculas" class="button">
						</div>

						<table id="result" class="table"></table>
					<!--</form>-->
				</section>

				<section class="estilos_form hidden" id="f_reservar_peliculas">
					<h3><i class="glyphicon glyphicon-dashboard"></i> Formulario de reservacion</h3>  
							
					<hr>
					<div class="filas">
						<label for="">ID Cliente:</label>
						<input type="text" name="id_cliente" id="id_cliente" class="requerido">
					</div>
					<div class="filas">
						<input type="hidden" name="estado_aprobacion" id="estado_aprobacion" value="pendiente">
						<input type="hidden" name="id_copia" id="id_copia" >
					</div>

					<div class="filas">
						<label for="">Fecha reservacion</label>
						<input type="date" name="fecha_reservacion" id="fecha_reservacion" class="requerido" disabled>
					</div>
					<div class="filas">
						<label for="">Fecha entrega</label>
						<input type="date" name="fecha_entrega" id="fecha_entrega" class="requerido" disabled>
					</div>
					<div class="filas">
						<label for="">Fecha retiro</label>
						<input type="date" name="fecha_retiro" id="fecha_retiro" class="requerido" disabled>
					</div>
					<div class="filas">
						<label for="">Hora retiro</label>
						<input type="time" name="hora_retiro" id="hora_retiro" class="requerido" disabled>
					</div>
					<div class="filas">
						<input type="button" value="reservar" id="insertar_reserva" class="button">
					</div>
				</section>
			</div>
		</div>
	</div>


</body>
</html>