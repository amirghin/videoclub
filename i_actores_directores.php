<?php session_start();?>
<?php include 'includes/header.php';?>

<body>
  <nav id="top-nav" class="navbar navbar-inverse navbar-static-top">

    <div class="container-fluid">
      <div class="navbar-header">
            <a class="navbar-brand" href="#">Video Club</a>
          </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
        
        <li class="dropdown">
          <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#">
            <i class="glyphicon glyphicon-user"></i> <?php echo $_SESSION["nombre_usuario"]; ?>
            <span class="caret"></span>
          </a>
          <ul id="g-account-menu" class="dropdown-menu" role="menu">
            <li><a href="logout.php"><i class="glyphicon glyphicon-lock"></i> Logout</a></li>
          </ul>
        </li>

        </ul>

      </div>
    </div>
  </nav>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3 ">
        <?php include 'includes/menu.php';?>
      </div>
      <div class="col-sm-9 ">
        <h3><i class="glyphicon glyphicon-dashboard"></i> Ingresar un actor</h3>  
            
        <hr>
        <section class="estilos_form">
    		<form action="" method="POST" class="form-horizontal">
    			<fieldset>
                   <div class="filas form-group">
                       <label for="nombre">Nombre</label>
                       <input type="text" name="nombre" id="nombre" class="requerido">
                   </div>
                   <div class="filas form-group">
                       <label for="genero">Genero</label>
                       <select id="actor_genero" name="actor_genero">
                        <option value="0" disabled selected="true">Seleccione un Genero</option>
                        <option value="m">Masculino</option>
                        <option value="f">Femenino</option>
                       </select>
                       <input type="hidden" id="h_genero">
                   </div>
                   <div class="filas form-group">
                        <input type="submit" class="button" value="Insertar" id="insertar_actor_director">
                   </div>
                </fieldset>
            </form>
        </section>
      </div>
    </div>
  </div>
</body>