<?php

class clientes{


	public $mensaje = "";


	function last_id($conexion){
		$query = 'SELECT LAST_INSERT_ID() id_cliente';
		$resultado = mysqli_query($conexion, $query);
		$row = mysqli_fetch_assoc($resultado);
		return $row["id_cliente"];
	}


	function insertar_cliente($nombre, $apellidos, $email, $fec_nacimiento, $tel_casa, $tel_celular, $observaciones,$conexion){
		try{
			$insert = "INSERT INTO clientes (nombre, apellidos, fecha_nacimiento, tel_casa, tel_celular, email, activo_web, estado, observaciones, 
						fecha_afiliacion, usuario_creacion, fecha_creacion, usuario_modificacion, fecha_modificacion)
						VALUES ('{$nombre}', '{$apellidos}', '{$fec_nacimiento}', '{$tel_casa}', '{$tel_celular}', '{$email}', 0 , 'pendiente', '{$observaciones}',  
							CURDATE(),1, CURDATE(), 1, CURDATE())";
	

			$resultado = mysqli_query($conexion, $insert);

			if(!$resultado){
				echo mysqli_error($conexion);
				throw new Exception(mysqli_error($conexion));

			}else{
				$last_id = $this->last_id($conexion);
				echo json_encode(array(
					'success' => array(
						'mensaje' => "Se creo un nuevo usuario con el id {$last_id}, todavía necesita ser validado por un administrador"
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


	function buscar_pendientes_aprobacion($conexion){

		try{
			$query = "SELECT * FROM clientes WHERE estado = 'pendiente'";
			$resultado = mysqli_query($conexion, $query);
			$clientes = array();

			if(!$resultado){

				throw new Exception(mysqli_error($resultado));	
			}elseif(mysqli_num_rows($resultado) == 0){

				throw new Exception("No se encontro ningún cliente pendiente de aprobación", 1);
				
			}else{
				while($row=mysqli_fetch_assoc($resultado)){

					$clientes[] = $row;

				}
				echo '{"clientes":'.json_encode($clientes).'}';
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

	function modificar_cliente($nombre, $apellidos, $email, $fec_nacimiento, $tel_casa, $tel_celular, $observaciones, $id_cliente, $activo_web, $estado, $conexion){
		try{
			$update = "UPDATE clientes SET nombre='{$nombre}', apellidos='{$apellidos}', fecha_nacimiento='{$fec_nacimiento}', tel_casa='{$tel_casa}', 
								tel_celular='{$tel_celular}', email='{$email}', activo_web='{$activo_web}', estado='{$estado}', observaciones='{$observaciones}', 
								usuario_modificacion=1, fecha_modificacion=CURDATE()
						WHERE id_cliente=$id_cliente";

			$resultado = mysqli_query($conexion, $update);

			if(!$resultado){
				echo mysqli_error($conexion);
				throw new Exception(mysqli_error($conexion));

			}else{
				echo json_encode(array(
					'success' => array(
						'mensaje' => "Se modifico el cliente {$id_cliente}"
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

	function borrar_cliente($id_cliente, $conexion){
		try{
			$delete = "DELETE FROM clientes WHERE id_cliente=$id_cliente";
			$resultado = mysqli_query($conexion, $delete);

			if(!$resultado){
				echo mysqli_error($conexion);
				throw new Exception(mysqli_error($conexion));

			}else{
				echo json_encode(array(
					'success' => array(
						'mensaje' => "Se eliminó el cliente {$id_cliente}"
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