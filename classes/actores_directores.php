<?php

class actores_directores{

	function insertar_actores_directores($nombre, $genero, $conexion){
		try{
			$insert = "INSERT INTO actores_directores (nombre, genero, usuario_creacion, fecha_creacion, usuario_modificacion, fecha_modificacion)
						VALUES ('{$nombre}', '{$genero}', 1, CURDATE(), 1, CURDATE())";
	

			$resultado = mysqli_query($conexion, $insert);

			if(!$resultado){
				throw new Exception(mysqli_error($conexion));

			}else{
				$last_id = mysqli_insert_id($conexion);
				echo json_encode(array(
					'success' => array(
						'mensaje' => "Se creo un nuevo actor_director con el id {$last_id}"
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

	function modificar_actores_directores($id_actor, $nombre, $genero, $conexion){
		try{
			$modificar = "UPDATE actores_directores SET
								  nombre = '{$nombre}',
								  genero = '{$genero}',
								  fecha_modificacion = CURDATE(),
								  usuario_modificacion = 1
								  WHERE id_actor = {$id_actor}";

			$resultado = mysqli_query($conexion, $modificar);

			if(!$resultado){
				throw new Exception(mysqli_error($conexion));

			}else{
				echo json_encode(array(
					'success' => array(
						'mensaje' => "Se modifico con exito el actor con el ID: {$id_actor}"
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

	function eliminar_actores_directores($id_actor, $conexion){
		try{
			$eliminar = "DELETE FROM actores_directores WHERE id_actor = {$id_actor}";

			$resultado = mysqli_query($conexion, $eliminar);

			if(!$resultado){
				throw new Exception(mysqli_error($conexion));

			}else{
				echo json_encode(array(
					'success' => array(
						'mensaje' => "Se eliminó con exito el actor con el ID: {$id_actor}"
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
}
?>



	