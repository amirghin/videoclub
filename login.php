<?php 

require "conexion.php";
require "classes/usuarios_administradores.php";
$message = "";

if (isset($_POST['usuario'], $_POST['password'])){
	
	$usuario = new usuarios_administradores;
	$existencia = $usuario->existencia_usuario($_POST['usuario'], $conexion);
	$contrasenas_iguales = $usuario->validar_contrasena($_POST['usuario'], $_POST['password'], $conexion);
	if($existencia AND $contrasenas_iguales AND $usuario->habilitado==1){
		session_start();
		$_SESSION["usuario"] = $usuario->nom_usuario;
		$_SESSION["id_usuario"] = $usuario->id_usuario;
		$_SESSION["nombre_usuario"] = ucwords($usuario->nombre);
		header ("Location: pagina_inicio.php");

	} elseif($existencia AND $usuario->habilitado != 1) {
		$message = "El usuario se encuentra deshabilitado"; 

	} else {
		$message = "La combinaci&oacute;n de usuario y contrase&ntilde;a es incorrecta";
	}
}

?>

<?php include 'includes/header.php';?>

<body>

	<nav id="top-nav" class="navbar navbar-inverse navbar-static-top">

		<div class="container-fluid">
			<div class="navbar-header">
	          <a class="navbar-brand" href="#">Video Club</a>
	        </div>
			<div class="navbar-collapse collapse">				
				<!--<h1>Iniciar Sesion</h1>	-->

			
				<form method="POST" class="navbar-form navbar-right">	
					<fieldset class="login">
						<div class="form-group">
						   
						    <input type="text" name="usuario" id="usuario" required class="form-control" placeholder="Usuario">
					    </div>
					    <div class="form-group">
					    	<input type="password" name="password" id="password" required class="form-control" placeholder="Contrase&ntilde;a">
						</div>
						<div class="form-group buttons">
					    	<input type="submit" value="Iniciar Sesion" class="button form-control">
					    </div>
					    <p class="error"><?php echo $message?></p>

					</fieldset>
				</form>
			</div>
		</div>
	</nav>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3 ">
				<?php include 'includes/menu.php';?>
			</div>
			<div class="col-sm-9 ">
					<h1>Bienvenido al sistema</h1>
					<p>Seleccione alguna opcion del menu de la izquierda</p>
			</div>
		</div>
	</div>
	<script src="js/bootstrap.js"></script>
</body>

</html>

