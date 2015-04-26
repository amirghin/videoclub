<?php

require "classes/ftp_session.php";

$ftp = new ftp_session;


if(isset($_POST["upload_image"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $source_file = $_FILES["fileToUpload"]["tmp_name"];
		$destination_file = "/300/{$_FILES["fileToUpload"]["name"]}";	

        $ftp->subir_imagen($source_file, $destination_file);
    } else {
        echo "File is not an image.";
    }
}
?>

<!DOCTYPE html>
<html>
<body>

<form action="" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="upload_image" id="upload_image">
    <p><?php echo $ftp->mensaje?></p>
</form>

</body>
</html>