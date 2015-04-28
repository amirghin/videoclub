<?php

class cargos_devolucion{

public $id_devolucion = "";
public $id_cargo = "";
public $usuario_creacion = "";
public $fecha_creacion = "";
public $usuario_modificacion = "";
public $fecha_modificacion = "";
public $mensaje = "";

	function insertar_cargos_devolucion($id_devolucion, $id_cargos, $conexion){
		try{
			$insert = "INSERT INTO cargos_devolucion (cargos_id_cargo, devoluciones_id_devolucion, usuario_creacion, fecha_creacion, usuario_modificacion, fecha_modificacion)
				VALUES ({$id_cargos}, '{$id_devolucion}',1, CURDATE(), 1, CURDATE())";

			$resultado = mysqli_query($conexion, $insert);

			if(!$resultado){
				throw new Exception(mysqli_error($conexion));

			}else{
				$this->id_devolucion = mysqli_insert_id($conexion);
				//$this->mensaje = "Se inserto con exito la devolucion";
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