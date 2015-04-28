<?php

class reservaciones{

	function insertar_reservacion($id_cliente, $estado_aprobacion,$fecha_entrega, $fecha_reservacion, $fecha_retiro, $hora_retiro, $conexion){
		try{
			$insert = "INSERT INTO reservaciones (clientes_id_cliente, estado_aprobacion, fecha_entrega, fecha_reservacion, fecha_retiro, hora_retiro, usuario_creacion, fecha_creacion, usuario_modificacion, fecha_modificacion)
				VALUES ({$id_cliente}, '${estado_aprobacion}', '{$fecha_entrega}', '{$fecha_reservacion}', '{$fecha_retiro}', '{$hora_retiro}',1, CURDATE(), 1, CURDATE())";
			
			//echo $insert;
			$resultado = mysqli_query($conexion, $insert);

			if(!$resultado){
				throw new Exception(mysqli_error($conexion));

			}else{
				//$this->ruta_imagenes(mysqli_insert_id($conexion),$conexion);
				$this->mensaje = "Se inserto con exito la reservacion";
				echo json_encode(array(
					'success' => array(
						'mensaje' => "Se inserto con exito la reservacion"
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