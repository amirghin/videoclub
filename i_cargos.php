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
        <h3><i class="glyphicon glyphicon-dashboard"></i> Ingresar cargos</h3>  
            
        <hr>
        <section class="estilos_form">
          <form action="" method="POST"class="form-horizontal" >
            <fieldset>
                   <div class="filas form-group">
                       <label for="detalle">Detalle: </label>
                       <input type="text" name="detalle" class="requerido">
                   </div>
                   <div class="filas form-group">
                       <label for="monto">Monto</label>
                       <input type="text" name="monto" class="requerido">
                   </div>
                   <div class="filas form-group">
                       <label for="tipo">Tipo</label>
                       <select id="tipo" name="tipo">
                        <option value="0" disabled="true" selected="true">Seleccione un Tipo</option>
                        <option value="fijo">Fijo</option>
                        <option value="variable">Variable</option>
                       </select>
                        <input type="hidden" id="h_tipo">     
                   </div>
                   <div class="filas form-group">
                        <input type="button" class="button" value="Insertar" id="insertar_cargo">
                   </div>
                </fieldset>
            </form>
        </section>
      </div>
    </div>
  </div>   
</body>
</html>