<?php

class actores_directores{

	function insertar_actores_directores($nombre, $genero, $conexion, $id_user){
		try{
			$insert = "INSERT INTO actores_directores (nombre, genero, usuario_creacion)
						VALUES ('{$nombre}', '{$genero}', '{$id_user}')";
	

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

	function modificar_actores_directores($id_actor, $nombre, $genero, $conexion, $id_user){
		try{
			$modificar = "UPDATE actores_directores SET
								  nombre = '{$nombre}',
								  genero = '{$genero}',
								  usuario_modificacion = '{$id_user}'
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

	function llenar_dropdown_actores($conexion){
		try{
			$query = "SELECT * FROM actores_directores";
			$resultado = mysqli_query($conexion, $query);
			//$row = mysqli_fetch_assoc($resultado);
			$array = array();
			while($row=mysqli_fetch_assoc($resultado)){
				$array[] = $row;
			}
			echo '{"actores_dropdown":'.json_encode($array).'}';

		}catch (Exception $e){
			$this->mensaje = $e->GetMessage();
		}		
	}

}
?>



	