<?php
class ftp_session{

	public $ftp_server = "localhost";
	public $ftp_user_name = "sys_videoclub";
	public $ftp_user_pass = "v1d30c!ub$";
	public $conn_id = "";
	public $mensaje = "";

	function crear_session($ftp_server, $ftp_user_name, $ftp_user_pass){
		$conn_id = ftp_connect($ftp_server); 
		$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass); 
			if ((!$conn_id) || (!$login_result)) { 
		    	$this->mensaje = "FTP connection has failed!\nAttempted to connect to $ftp_server for user $ftp_user_name\n"; 
		    	exit; 
			}else{
				$this->conn_id = $conn_id;
			} 
	}

	function crear_folder($dir){
		if(ftp_mkdir($this->conn_id, $dir)){
 			return true;
		}else{
 			return false;
		}
	}

	function subir_ftp($destination_file, $source_file){
		$upload = ftp_put($this->conn_id, $destination_file, $source_file, FTP_BINARY); 
		if (!$upload) { 
	    	$this->mensaje = "FTP upload has failed!";
		} else {
			$archivo = basename($destination_file);
	    	$this->mensaje =  "Se subió el archivo al servidor FTP";
		}

		ftp_close($this->conn_id); 
	}

	function subir_imagen($source_file, $destination_file){

		$dir = dirname($destination_file);
		$this->crear_session($this->ftp_server, $this->ftp_user_name, $this->ftp_user_pass);

		if(!is_dir("ftp://{$this->ftp_user_name}:{$this->ftp_user_pass}@{$this->ftp_server}{$dir}")){
			$this->crear_folder($dir);
		}

		if(!is_file("ftp://{$this->ftp_user_name}:{$this->ftp_user_pass}@{$this->ftp_server}{$destination_file}")){
			$this->subir_ftp($destination_file, $source_file);
		}else{
			$archivo = basename($destination_file);
			$this->mensaje = "El archivo {$archivo} ya existe";
		}



	}

}
?>