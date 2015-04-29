<?php session_start();
if($_SESSION["id_usuario"] == "2" || (!isset($_SESSION["id_usuario"]))) {header("Location: login.php");}?>
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
        <h3><i class="glyphicon glyphicon-dashboard"></i> Ingresar personajes de peliculas</h3>  
            
        <hr>
        <section class="estilos_form" id="i_personajes">
          <form action="" method="POST" class="form-horizontal">
          	<fieldset>
                   <div class="filas">
                       <label for="peliculas_id_pelicula">Pelicula: </label>
                       <!--<input type="text" name="id_pelicula"> -->
                       <select name="id_pelicula" id="id_pelicula">
                         <option disabled="true" checked="true" value="0">Seleccione una Pelicula</option>
                       </select>
                   </div>
                   <div class="filas">
                       <label for="roles_id_rol">Seleccione un rol:</label>
                        <select name="roles_id_rol" id="roles_id_rol">
                          <option disabled="true" checked="true" value="0">Roles</option>
                        </select>

                   </div>
                   <div class="filas">
                       <label for="actores_id_actor">Seleccione un actor:</label>
                        <select name="actores_id_actor" id="actores_id_actor">
                          <option disabled="true" checked="true" value="0">Actores</option>
                        </select>

                   </div>
                   <div class="filas">
                        <input type="button" class="button" value="Insertar" id="insertar_personajes">
                   </div>
                </fieldset>
            </form>
        </section>
      </div>
    </div>
  </div>   

</body>
</html>