<?php

class clientes{


	function insertar_cliente($nombre, $apellidos, $email, $fec_nacimiento, $tel_casa, $tel_celular, $observaciones,$conexion, $id_user){
		try{
			$insert = "INSERT INTO clientes (nombre, apellidos, fecha_nacimiento, tel_casa, tel_celular, email, activo_web, estado, observaciones, 
						fecha_afiliacion, usuario_creacion)
						VALUES ('{$nombre}', '{$apellidos}', '{$fec_nacimiento}', '{$tel_casa}', '{$tel_celular}', '{$email}', 0 , 'pendiente', '{$observaciones}',  
							CURDATE(),'{$id_user}')";
	

			$resultado = mysqli_query($conexion, $insert);

			if(!$resultado){
				throw new Exception(mysqli_error($conexion));

			}else{
				$last_id = mysqli_insert_id($conexion);
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

	function verificar_estado_cliente($id_cliente, $conexion){
		try{
			$query = "SELECT * FROM clientes WHERE id_cliente = ${id_cliente}";
			//echo $query;
			$resultado = mysqli_query($conexion, $query);

			if(!$resultado){

				throw new Exception(mysqli_error($resultado));	
			}elseif(mysqli_num_rows($resultado) == 0){

				throw new Exception("No se encontro ese cliente", 1);
				
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

	function modificar_cliente($nombre, $apellidos, $email, $fec_nacimiento, $tel_casa, $tel_celular, $observaciones, $id_cliente, $activo_web, $estado, $conexion, $id_user){
		try{
			$update = "UPDATE clientes SET nombre='{$nombre}', apellidos='{$apellidos}', fecha_nacimiento='{$fec_nacimiento}', tel_casa='{$tel_casa}', 
								tel_celular='{$tel_celular}', email='{$email}', activo_web='{$activo_web}', estado='{$estado}', observaciones='{$observaciones}', 
								usuario_modificacion='{$id_user}'
						WHERE id_cliente=$id_cliente";

			$resultado = mysqli_query($conexion, $update);

			if(!$resultado){
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

	function buscar_cliente($id_cliente, $conexion){

		try{
			$query = "SELECT * FROM clientes WHERE id_cliente = {$id_cliente}";
			$resultado = mysqli_query($conexion, $query);
			$clientes = array();

			if(!$resultado){

				throw new Exception(mysqli_error($resultado));	
			}elseif(mysqli_num_rows($resultado) == 0){

				throw new Exception("No se encontro ningún cliente con el id {$id_cliente}", 1);
				
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

	function clientes_acceso_web($conexion, $opcion){
		try{
			$query = "SELECT * FROM clientes WHERE activo_web = {$opcion}";
			$resultado = mysqli_query($conexion, $query);
			$clientes = array();

			if(!$resultado){

				throw new Exception(mysqli_error($resultado));	
			}elseif(mysqli_num_rows($resultado) == 0){

				throw new Exception("No se encontraron registros", 1);
				
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

	

}



?>