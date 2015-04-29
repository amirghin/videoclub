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
        <h3><i class="glyphicon glyphicon-dashboard"></i> Ingresar copias de peliculas</h3>  
            
        <hr>
        <section class="estilos_form" id="i_copias">
          <form action="" method="POST" class="form-horizontal">
          	<fieldset>
                   <div class="filas">
                       <label for="id_pelicula">Pelicula: </label>
                       <!--<input type="text" name="id_pelicula"> -->
                       <select name="id_pelicula" id="id_pelicula">
                         <option disabled="true" checked="true" value="0">Seleccione una Pelicula</option>
                       </select>
                       <input type="hidden" id="h_pelicula" name="h_pelicula">
                   </div>
                   <div class="filas">
                       <input type="hidden" name="disponibilidad" value="disponible" readonly>
                   </div>
                   <div class="filas">
                       <label for="ubicaciones_cod">Codigo ubicacion:</label>
                       <!--<input type="text" name="ubicaciones_cod_ubicacion"> <!-- TODO Creo que esto puede ser un dropdown-->
                        <select name="ubicaciones_cod_ubicacion" id="ubicaciones_cod_ubicacion">
                          <option disabled="true" checked="true" value="0">Seleccione una Ubicacion</option>
                        </select>
                        <input type="hidden" id="h_ubicacion" name="h_ubicacion">

                   </div>
                   <div class="filas">
                        <input type="button" class="button" value="Insertar" id="insertar_copias">
                   </div>
                </fieldset>
            </form>
        </section>
      </div>
    </div>
  </div>   

</body>
</html>