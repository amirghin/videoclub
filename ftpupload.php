<?php

require "classes/ftp_session.php";


$ftp = new ftp_session;



if(isset($_POST["upload_image"], $_POST["id_pelicula"])) {

    echo $_POST["ruta"];
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $source_file = $_FILES["fileToUpload"]["tmp_name"];
    $destination_file = "/{$_FILES["fileToUpload"]["name"]}"; 

        $ftp->subir_imagen($source_file, $destination_file);
    } else {
        echo "File is not an image.";
    }
}
?>