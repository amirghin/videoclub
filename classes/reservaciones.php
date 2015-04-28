<?php



class reservaciones{

	function insertar_reservacion($id_cliente, $id_copia, $estado_aprobacion,$fecha_entrega, $fecha_reservacion, $fecha_retiro, $hora_retiro, $conexion, $id_user){
		try{
			$insert = "INSERT INTO reservaciones (clientes_id_cliente, copias_id_copia, estado_aprobacion, fecha_entrega, fecha_reservacion, fecha_retiro, hora_retiro, usuario_creacion)
				VALUES ({$id_cliente}, {$id_copia}, '${estado_aprobacion}','{$fecha_entrega}', '{$fecha_reservacion}', '{$fecha_retiro}', '{$hora_retiro}', '{$id_user}')";
			
			//echo $insert;
			if (mysqli_query($conexion, $insert)) {	
				$this->mensaje = "Se inserto con exito la reservacion";
				echo json_encode(array(
					'success' => array(
						'mensaje' => "Se inserto con exito la reservacion"
						)
					));
			} else {
				throw new Exception(mysqli_error($conexion));
			}

			$resultado = mysqli_query($conexion, $insert);

			if(!$resultado){
				throw new Exception(mysqli_error($conexion));

			}else{
				//$this->ruta_imagenes(mysqli_insert_id($conexion),$conexion);

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