<?php

class roles{


	function insertar_roles($nombre, $conexion, $id_user){
		try{
			$insert = "INSERT INTO roles (nombre, usuario_creacion)
						VALUES ('{$nombre}', '{$id_user}')";
	

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

	function modificar_roles($id_rol, $nombre, $conexion, $id_user){
		try{
			$update = "UPDATE roles SET nombre='{$nombre}', usuario_modificacion='{$id_user}' WHERE id_rol = {$id_rol}";
	

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

	function llenar_dropdown_roles($conexion){
		try{
			$query = "SELECT * FROM roles";
			$resultado = mysqli_query($conexion, $query);
			//$row = mysqli_fetch_assoc($resultado);
			$array = array();
			while($row=mysqli_fetch_assoc($resultado)){
				$array[] = $row;
			}
			echo '{"roles_dropdown":'.json_encode($array).'}';

		}catch (Exception $e){
			$this->mensaje = $e->GetMessage();
		}		
	}


}



?>