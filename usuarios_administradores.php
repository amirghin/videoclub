<?php

class usuarios_administradores{

public $id_usuario = "";
public $nom_usuario = "";
public $nombre = "";
public $apellido = "";
public $contrasena = "";
public $habilitado = "";
public $usuario_creacion = "";
public $fecha_creacion = "";
public $usuario_modificacion = "";
public $fecha_modificacion = "";
public $mensaje = "";

function existencia_usuario($usuario, $conexion){

	try{
			$query = "SELECT * FROM usuarios_administradores WHERE nom_usuario='{$usuario}'";
			$resultado = mysqli_query($conexion, $query);
			$existe = mysqli_num_rows($resultado);
			
			if ($existe == 1){

				return True;
			} else {

				return False;

			}


	}catch (Exception $e){
		$this->mensaje = $e->GetMessage();
	}
}


function validar_contrasena($usuario, $password, $conexion){
	try{
		$query = "SELECT contrasena FROM usuarios_administradores WHERE nom_usuario='{$usuario}'";
		$resultado = mysqli_query($conexion, $query);
		$row = mysqli_fetch_assoc($resultado);
		
		if (password_verify($password, $row['contrasena'])){

			return True;

		} else {

			return False;
		}


	} catch (Exception $e){
		$this->mensaje = $e->GetMessage();
	}


}

function insertar(){}



function encriptar_contrasena($contrasena){

$cost = array('cost' => 11);
$encrypted = password_hash($contrasena, PASSWORD_BCRYPT, $cost);

return $encrypted;

}





}



?>