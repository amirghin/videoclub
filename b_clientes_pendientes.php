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
        <h3><i class="glyphicon glyphicon-dashboard"></i> Ver Clientes pendientes de aprobacion</h3>  
            
        <hr>
        <section class="estilos_form" id="estado_clientes">
        	<p id="no-resultados"></p>
			<table id="result" class="table"></table>
        </section>
      </div>
    </div>
  </div>
</body>