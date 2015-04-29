<?php session_start();
if($_SESSION["id_usuario"] == "2" || (!isset($_SESSION["id_usuario"]))) {header("Location: login.php");}
require "classes/ftp_session.php";
require "classes/peliculas.php";
$ftp = new ftp_session;

if(isset($_POST["upload_image"], $_POST["id_pelicula"], $_POST["ruta"])) {

    
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $source_file = $_FILES["fileToUpload"]["tmp_name"];
    $destination_file = "{$_POST["ruta"]}/{$_FILES["fileToUpload"]["name"]}"; 

        $ftp->subir_imagen($source_file, $destination_file);
    } else {
        echo "File is not an image.";
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
                <h3><i class="glyphicon glyphicon-dashboard"></i> Subir Imagen al FTP</h3>  
                        
                <hr>
                <section class="estilos_form" id="i_upload">
                    <form action="" method="post" enctype="multipart/form-data" id="f_subir_imagen">
                        <div class="filas form-group">
                            <label for="">ID Pelicula:</label>
                            <!--<input type="text" name="id_pelicula" id="id_pelicula" required>-->
                           <select name="id_pelicula" id="id_pelicula">
                             <option disabled="true" checked="true" value="0">Seleccione una Pelicula</option>
                           </select>
                        </div>
                        <div class="filas form-group">
                            <label for="">Ruta:</label>
                            <input type="text" name="ruta" id="ruta" readonly="true">
                        </div>
                        <div class="filas form-group">
                            <input type="file" name="fileToUpload" id="fileToUpload" required style="float:right; width:60%"> 
                        </div>
                        <div class="filas form-group" style="width: 37%; margin: 0 auto;">
                            <input type="button" name="buscar" id="buscar" value="Buscar" class="button col-12"  style="float: left;margin-right: 16px;">
                            <input type="submit" value="Upload Image" name="upload_image" id="upload_image" class="button col-12" style="float:left">
                        </div>


                        <input  type="hidden" value="false" id="ready">
                        <p></p>
                        
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>
</html>