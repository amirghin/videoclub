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
			$insert = "INSERT INTO peliculas (id_pelicula, nombre, precio_alquiler, generos_id_genero, ruta_imagenes, duracion, usuario_creacion, fecha_creacion, usuario_modificacion, fecha_modificacion)VALUES ({$id_pelicula}, '{$nombre_pelicula}', {$precio_alquiler}, {$genero}, '{$ruta_imagenes}', {$duracion},1, CURDATE(), 1, CURDATE())";

			$resultado = mysqli_query($conexion, $insert);

			if(!$resultado){
				echo mysqli_error($conexion);
				throw new Exception(mysqli_error($conexion));

			}else{
				$this->mensaje = "Se inserto con exito la pelicula";
				echo json_encode(array(
					'success' => array(
						'mensaje' => "Se inserto con exito la pelicula"
						)
					));
		}
				
		}catch(Exception $e){
		   echo json_encode(array(
		        'error' => array(
		            'code' => $e->getCode(),
		            'message' => $e->getMessage()
		        )
		    ));

		}
	}

	function modificar_peliculas($id_pelicula,$nombre_pelicula,$precio_alquiler,$genero,$ruta_imagenes,$duracion,$conexion){
		try{
			echo "hola";
			$modificar = "UPDATE peliculas set
								  nombre = '{$nombre_pelicula}',
								  precio_alquiler = {$precio_alquiler},
								  generos_id_genero = {$genero},
								  ruta_imagenes = '{$ruta_imagenes}',
								  duracion = {$duracion}
								  where id_pelicula = {$id_pelicula}"
								  ;	

			echo $modificar;
			$resultado = mysqli_query($conexion, $modificar);

			if(!$resultado){
				echo mysqli_error($conexion);
				throw new Exception(mysqli_error($conexion));

			}else{
				$this->mensaje = "Se modifico con exito la pelicula";
				echo json_encode(array(
					'success' => array(
						'mensaje' => "Se modifico con exito la pelicula"
						)
					));
			}

		}catch(Exception $e){
		   echo json_encode(array(
		        'error' => array(
		            'code' => $e->getCode(),
		            'message' => $e->getMessage()
		        )
		    ));

		}

	}


	function eliminar_peliculas(){

	}



	function buscar_pelicula($id_pelicula, $conexion){
		try{
			$query = "SELECT * FROM peliculas WHERE id_pelicula = {$id_pelicula}";
			$resultado = mysqli_query($conexion, $query);

			if(!$resultado){

				throw new Exception(mysqli_error($resultado));	
			}elseif(mysqli_num_rows($resultado) == 0){

				throw new Exception("No se encontro ninguna pelicula con ese ID", 1);
				
			}else{
				$row=mysqli_fetch_assoc($resultado);
				echo '{"peliculas":'.json_encode($row).'}';
			}

		}catch (Exception $e){
			  echo json_encode(array(
			  'error' => array(	
			  	'msg' => $e->GetMessage(),
			  	'error' => $e->GetCode(),
			  	)
			  ));
		}
	}	
	
}
?>