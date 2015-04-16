<?php

echo "entre";

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

	function insertar_peliculas($id_pelicula,$nombre_pelicula,$precio_alquiler,$genero,$ruta_imagenes,$duracion,$conexion){
		try{
			$insert = "INSERT INTO peliculas 
					(id_pelicula, 
					nombre, 
					precio_alquiler, 
					generos_id_genero, 
					ruta_imagenes, 
					duracion, 
					usuario_creacion, 
					fecha_creacion, 
					usuario_modificacion, 
					fecha_modificacion)
					VALUES (
						{$id_pelicula}, 
						'{$nombre_pelicula}', 
						{$precio_alquiler}, 
						{$genero}, 
						'{$ruta_imagenes}', 
						{$duracion},
						1, 
						CURDATE(), 
						1, 
						CURDATE())";

			$resultado = mysqli_query($conexion, $insert);

			if(!$resultado){
				echo mysqli_error($conexion);
				throw new Exception(mysqli_error($conexion));

			}else{
				echo "success";
				$this->mensaje = "Se inserto con exito la pelicula";
		}
				
		}catch(Exception $e){
			$this->mensaje = $e->GetMessage();
			//echo json_encode($this->mensaje -> "Exception occurred: ".$e->getMessage());

		}
	}
	
}
?>