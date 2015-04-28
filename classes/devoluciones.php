<?php

class devoluciones{

public $mensaje = "";

	function insertar_devolucion($id_reservacion,$observaciones,$conexion, $id_user){
		try{
			$insert = "INSERT INTO devoluciones (reservaciones_id_reservacion, observaciones, usuario_creacion)
				VALUES ({$id_reservacion}, '{$observaciones}','{$id_user}')";

			$resultado = mysqli_query($conexion, $insert);

			if(!$resultado){
				throw new Exception(mysqli_error($conexion));

			}else{
				$this->id_devolucion = mysqli_insert_id($conexion);
				$this->mensaje = "Se inserto con exito la devolucion";
				echo json_encode(array(
					'success' => array(
						'mensaje' => "Devolucion creada"
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