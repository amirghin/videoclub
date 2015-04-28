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