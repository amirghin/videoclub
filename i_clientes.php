<?php session_start();?>
<?php include 'includes/header.php';?>

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
				<h3><i class="glyphicon glyphicon-dashboard"></i> Formulario de afiliacion</h3>  
						
				<hr>
				<section class="estilos_form">
					<form action="" method="POST" class="form-horizontal">
						<fieldset>
							<div class="filas form-group">
								<label for="nombre_cliente">Nombre:</label>
								<input type="text" name="nombre_cliente" class="requerido">					
							</div>
							<div class="filas form-group">
								<label for="apellidos">Apellidos:</label>
								<input type="text" name="apellidos" class="requerido">
							</div>
							<div class="filas form-group">
							    <label for="email">Email:</label>
							    <input type="email" name="email" class="requerido">
							</div>
							<div class="filas form-group">
							    <label for="fecha_nacimiento">Fecha de nacimiento:</label>
							    <input type="date" name="fecha_nacimiento" class="requerido">
							</div>
							<div class="filas form-group">
							    <label for="tel_casa">Telefono Casa:</label>
							    <input type="text" name="tel_casa" class="requerido">
							</div>
							<div class="filas form-group">
							    <label for="tel_celular">Celular:</label>
							    <input type="text" name="tel_celular" class="requerido">
							</div>
							<div class="filas form-group">
							    <label for="observaciones">Observaciones:</label>
							    <textarea name="observaciones" id="observaciones" cols="30" rows="5"></textarea>
							</div>
							<div class="filas form-group">
							    <input type="button" class="button" value="Enviar" id="i_clientes">
							</div>
						</fieldset>
					</form>
				</section>
			</div>
		</div>
	</div>
</body>
</html>