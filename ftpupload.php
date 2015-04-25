
<?php
  /*if ($_POST["action"] == "upload")
  {//1
  $rpta = "";
    $tmpfile = $_FILES['ruta_imagenes']['tmp_name'];
    $tmpname = $_FILES['ruta_imagenes']['name'];
  
  $mime_types = array(
      "image/gif",
      "image/jpg",
      "image/jpeg",
      "image/pjpeg",
      "image/bmp",
  );
  
  if (in_array($_FILES['ruta_imagenes']['type'],$mime_types)) { //hay q poner q lo q se matchee es el type
    //subir el ruta_imagenes  2
    $ftpuser = "daemon";
    $ftppass = "";
    $ftppath = "127.0.0.1";
    if ($tmpname != "") {//3  
      $myFileName = basename($_FILES['ruta_imagenes']['name']);
      $destination_file = $myFileName;  //Full path from root login on FTP server
      $conn_id = ftp_connect($ftppath);
      $login_result = ftp_login($conn_id, $ftpuser, $ftppass) or die("<h2>You do not have access to this ftp server!</h2>");
  if ((!$conn_id) || (!$login_result)) {  
    echo "FTP connection has failed! <br />";
    echo "Attempted to connect to $ftp_server for user $ftp_user_name";
    exit;
  }
$upload = ftp_put($conn_id, $destination_file, $tmpfile, FTP_BINARY);
if (!$upload){
  echo "<h2>FTP upload of $myFileName has failed!</h2> <br />";
  print $destination_file ."<br>";
  print $file ."<br>";
  die();
}
ftp_close($conn_id);    
echo "Upload of $myFileName successful<br />";
}
}
} //-1*/

echo "entre";
$target_dir = "imagenes/";
$target_file = $target_dir . basename($_FILES["ruta_imagenes"]["name"]);

echo $target_file;
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["ruta_imagenes"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["ruta_imagenes"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["ruta_imagenes"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["ruta_imagenes"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

?>