<?php

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
<!DOCTYPE html>
<html>
<body>
<head>
<script src="js/jquery-2.1.3.min.js"></script>
<script>
$(function(){

        function buscar_ruta(){
            var id_pelicula = $("#id_pelicula").val();

            if (id_pelicula!=""){
                var busqueda = $.ajax({
                    url: "controllers/peliculas_controller.php",
                    type: "POST",
                    data: {id_pelicula:id_pelicula},
                });
                busqueda.done(function(response){
                    var object = jQuery.parseJSON(response);
                    if(!object.error){
                        $("#ruta").val(object.peliculas.ruta_imagenes);
                        $("#nombre").val(object.peliculas.nombre);
                        $("#ready").val("true");
                    }else{
                        console.log("aca");
                        $("p").text = object.error.msg;
                    }

                });
                busqueda.error(function(error){
                    alert("error");
                });

            }

        }

$('#buscar').click(function(){  
        
        buscar_ruta();
    });  

$( "#f_subir_imagen" ).submit(function( event ) {
  if ( $( "#ready" ).val() != "false" ) {
    return;
  }
 
  event.preventDefault();
} );
 });
</script>
   
</head>
<form action="" method="post" enctype="multipart/form-data" id="f_subir_imagen">
    ID Pelicula:
    <input type="text" name="id_pelicula" id="id_pelicula" required>
    Nombre:
    <input type="text" name="nombre" id="nombre" readonly="true">
    Ruta:
    <input type="text" name="ruta" id="ruta" readonly="true">
    <input type="button" name="buscar" id="buscar" value="Buscar">

    <br>
    <input type="file" name="fileToUpload" id="fileToUpload" required>
    <br>
    <input type="submit" value="Upload Image" name="upload_image" id="upload_image">
    <input  type="hidden" value="false" id="ready">
    <p></p>
    
</form>

</body>
</html>