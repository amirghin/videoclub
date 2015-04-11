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

function existencia_usuario($nom_usuario, $conexion){

	try{
			$query = "SELECT * FROM usuarios_administradores WHERE nom_usuario='{$nom_usuario}'";
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


function validar_contrasena($nom_usuario, $password, $conexion){
	try{
		$query = "SELECT contrasena FROM usuarios_administradores WHERE nom_usuario='{$nom_usuario}'";
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


function encriptar_contrasena($contrasena){

$cost = array('cost' => 11);
$encrypted = password_hash($contrasena, PASSWORD_BCRYPT, $cost);

return $encrypted;

}

function insertar_usuario($nom_usuario, $nombre, $apellido, $contrasena, $habilitado, $conexion){


try{
	
	$contrasena_encriptada = $this->encriptar_contrasena($contrasena);
	if ($this->existencia_usuario($nom_usuario, $conexion)){

		throw new Exception("El usuario {$nom_usuario} ya existe");
	}

	$insert = "INSERT INTO usuarios_administradores (nom_usuario, nombre, apellido, contrasena, habilitado, usuario_creacion, fecha_creacion, usuario_modificacion, fecha_modificacion)
			VALUES ('{$nom_usuario}', '{$nombre}', '{$apellido}', '{$contrasena_encriptada}', '{$habilitado}','system', CURDATE(), 'system', CURDATE())";

	$resultado = mysqli_query($conexion, $insert);

	if(!$resultado){

		throw new Exception("Error al insertar usuario");
	}else{

		$this->mensaje = "Se inserto con exito el usuario";
	}
			
	}catch(Exception $e){
		$this->mensaje = $e->GetMessage();

	}

}



function buscar_usuarios($nom_usuario, $conexion){

try{
	$query = "SELECT * FROM usuarios_administradores WHERE nom_usuario LIKE '%{$nom_usuario}%'";
	$resultado = mysqli_query($conexion, $query);

	while($row=mysqli_fetch_assoc($resultado)){

	$array[] = ['id_usuario' => $row['id_usuario'], 
				'nom_usuario' => $row['nom_usuario'],  
				'nombre' => $row['nombre'],
				'apellido' => $row[''],
				'contrasena' => $row['contrasena'],
				'usuario_creacion' => $row['usuario_creacion'],
				'fecha_creacion' => $row['fecha_creacion'],
				'usuario_modificacion' => $row['usuario_modificacion'],
				'fecha_modificacion' => $row['fecha_modificacion'],
				'habilitado' => $row['habilitado']
				];
	}

	echo json_encode($array);
			


}catch (Exception $e){
	$this->mensaje = $e->GetMessage();
}

}

}



?>