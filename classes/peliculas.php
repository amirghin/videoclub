<?php


class peliculas{

public $mensaje = "";


	function ruta_imagenes($id_pelicula, $conexion){

		$update = "UPDATE peliculas SET ruta_imagenes=CONCAT('/', {$id_pelicula}) WHERE id_pelicula = {$id_pelicula}";
		$resultado = mysqli_query($conexion, $update);



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

	function insertar_peliculas($nombre_pelicula,$precio_alquiler,$genero,$duracion,$conexion){
		try{

			$insert = "INSERT INTO peliculas (nombre, precio_alquiler, generos_id_genero, duracion, usuario_creacion, fecha_creacion, usuario_modificacion, fecha_modificacion)
				VALUES ('{$nombre_pelicula}', {$precio_alquiler}, {$genero}, {$duracion},1, CURDATE(), 1, CURDATE())";

			$resultado = mysqli_query($conexion, $insert);

			if(!$resultado){
				throw new Exception(mysqli_error($conexion));

			}else{
				$this->ruta_imagenes(mysqli_insert_id($conexion),$conexion);
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
			$modificar = "UPDATE peliculas SET
								  nombre = '{$nombre_pelicula}',
								  precio_alquiler = {$precio_alquiler},
								  generos_id_genero = {$genero},
								  ruta_imagenes = '{$ruta_imagenes}',
								  duracion = {$duracion}
								  where id_pelicula = {$id_pelicula}"
								  ;	

			$resultado = mysqli_query($conexion, $modificar);

			if(!$resultado){
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


	function eliminar_peliculas($id_pelicula, $conexion){
		try{
			$eliminar = "DELETE FROM peliculas 
						WHERE id_pelicula = {$id_pelicula}";

			$resultado = mysqli_query($conexion, $eliminar);

			if(!$resultado){
				throw new Exception(mysqli_error($conexion));

			}else{
				$this->mensaje = "Se elimino con exito la pelicula";
				echo json_encode(array(
					'success' => array(
						'mensaje' => "Se elimino con exito la pelicula"
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



	function buscar_pelicula($id_pelicula, $conexion){
		try{
			$query = "SELECT * FROM peliculas WHERE id_pelicula = {$id_pelicula}";
			$resultado = mysqli_query($conexion, $query);

			if(!$resultado){

				throw new Exception(mysqli_error($conexion));	
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


	function buscar_pelicula_genero($genero_pelicula, $conexion){
		try{
			//echo "hola";
			$query = "SELECT 
					 pel.id_pelicula, 
					 pel.nombre, 
					 pel.duracion, 
					 pel.generos_id_genero, 
					 gen.nombre genero, pel.precio_alquiler FROM peliculas pel
					 JOIN generos gen ON pel.generos_id_genero = gen.id_genero 
					 WHERE gen.nombre LIKE '%{$genero_pelicula}%'";

			

			$resultado = mysqli_query($conexion, $query);
			$array = array();
			if(!$resultado){
				throw new Exception(mysqli_error($conexion));	
			}elseif(mysqli_num_rows($resultado) == 0){
				throw new Exception("No se encontro ninguna pelicula con ese genero", 1);
			}else {
				while($row=mysqli_fetch_assoc($resultado)){
					$array[] = $row;
				}
				//$row = mysqli_fetch_assoc($resultado);
				echo '{"peliculas":'.json_encode($array).'}';
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


	function buscar_pelicula_nombre($nombre_pelicula, $conexion){
		try{
			$query = "SELECT * FROM disponibilidad_peliculas
						WHERE nombre LIKE '%{$nombre_pelicula}%' GROUP BY nombre ORDER BY nombre ASC";

			$peliculas = array();

			$resultado = mysqli_query($conexion, $query);

			if(!$resultado){
				throw new Exception(mysqli_error($conexion));	
			}elseif(mysqli_num_rows($resultado) == 0){
				throw new Exception("No se encontro ninguna pelicula con ese Nombre", 1);
			}else{
				while($row=mysqli_fetch_assoc($resultado)){
					$peliculas[] = $row;
				}
				echo '{"peliculas":'.json_encode($peliculas).'}';

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