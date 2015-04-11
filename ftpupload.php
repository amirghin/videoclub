
<?php
  if ($_POST["action"] == "upload")
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
    $ftpuser = "anonymous";
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
} //-1
?>