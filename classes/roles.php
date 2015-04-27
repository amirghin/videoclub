<?php

class roles{


	function insertar_roles($nombre, $conexion){
		try{
			$insert = "INSERT INTO roles (nombre, usuario_creacion, fecha_creacion, usuario_modificacion, fecha_modificacion)
						VALUES ('{$nombre}', 1, CURDATE(), 1, CURDATE())";
	

			$resultado = mysqli_query($conexion, $insert);

			if(!$resultado){
				throw new Exception(mysqli_error($conexion));

			}else{
				$last_id = mysqli_insert_id($conexion);
				echo json_encode(array(
					'success' => array(
						'mensaje' => "Se creo el nuevo rol {$nombre} con el ID: {$last_id}"
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

	function modificar_roles($id_rol, $nombre, $conexion){
		try{
			$update = "UPDATE roles SET nombre='{$nombre}', usuario_modificacion=1, fecha_modificacion=CURDATE() WHERE id_rol = {$id_rol}";
	

			$resultado = mysqli_query($conexion, $update);

			if(!$resultado){
				throw new Exception(mysqli_error($conexion));

			}else{
				echo json_encode(array(
					'success' => array(
						'mensaje' => "Se modificó el rol con el ID: {$id_rol}"
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

	function eliminar_roles($id_rol, $conexion){
		try{
			$delete = "DELETE FROM roles WHERE id_rol = {$id_rol}";
			$resultado = mysqli_query($conexion, $delete);

			if(!$resultado){
				throw new Exception(mysqli_error($conexion));

			}else{
				echo json_encode(array(
					'success' => array(
						'mensaje' => "Se eliminó el rol con el ID: {$id_rol}"
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