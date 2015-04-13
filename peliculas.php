<?php

class peliculas{

public $id_pelicula = "";
public $nombre = "";
public $duracion = "";
public $precio_alquiler = "";
public $id_genero = "";
public $ruta_imagenes = "";
public $usuario_creacion = "";
public $fecha_creacion = "";
public $usuario_modificacion = "";
public $fecha_modificacion = "";
public $mensaje = "";

}

function llenar_dropdown(){
	try{
		$query = "SELECT * FROM generos";
		$resultado = mysqli_query($conexion, $query);
		$row = mysqli_fetch_assoc($resultado);
		$array = array();
		while($row=mysqli_fetch_assoc($resultado)){
			$array[] = $row;
		}
		echo '{"generos":'.json_encode($array).'}';

	}catch (Exception $e){
		$this->mensaje = $e->GetMessage();
	}
}

function insertar_peliculas(){}
	

?>