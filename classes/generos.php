<?php

class generos{

public $id_genero = "";
public $nombre = "";
public $usuario_creacion = "";
public $fecha_creacion = "";
public $usuario_modificacion = "";
public $fecha_modificacion = "";
public $mensaje = "";


function insertar_genero($id_genero, $nombre, $conexion){
	$mensaje = "";
	try{
		$query = "INSERT INTO generos (id_genero, nombre, usuario_creacion, fecha_creacion, usuario_modificacion, fecha_modificacion) VALUES ({$id_genero}, '${nombre}', 1, NOW(),1, NOW())";
		if(mysqli_query($conexion,$query)){
			$this->mensaje = "Genero insertado correctamente";
		}else{
			throw new Exception(mysqli_error($conexion)); 
		}
		mysqli_close($conexion); 
		return $query;
	}catch(Exception $e){
	     throw new Exception($e->getMessage());	 
	}

}


	function llenar_dropdown($conexion){
		try{
			$query = "SELECT * FROM generos";
			$resultado = mysqli_query($conexion, $query);
			//$row = mysqli_fetch_assoc($resultado);
			$array = array();
			while($row=mysqli_fetch_assoc($resultado)){
				$array[] = $row;
			}
			echo '{"generos":'.json_encode($array).'}';

		}catch (Exception $e){
			$this->mensaje = $e->GetMessage();
		}
	}


}


?>