<?php

class cargos{
public $mensaje = "";

	function insertar_cargos($detalle, $tipo, $monto, $conexion, $id_user){
		$mensaje = "";
		try{
			$insertar = "INSERT INTO cargos (detalle, tipo, monto, usuario_creacion) 
					  VALUES ('{$detalle}', '{$tipo}', {$monto}, '{$id_user}')";
			
			$resultado = mysqli_query($conexion, $insertar);

			if(!$resultado){
				throw new Exception(mysqli_error($conexion));
			}else{
				//$this->mensaje = "Se inserto con exito la copia";
				echo json_encode(array(
					'success' => array(
						'mensaje' => "Se inserto con exito el cargo"
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