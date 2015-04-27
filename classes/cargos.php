<?php

class cargos{

public $id_cargo = "";
public $detalle = "";
public $tipo = "";
public $monto = "";
public $usuario_creacion = "";
public $fecha_creacion = "";
public $usuario_modificacion = "";
public $fecha_modificacion = "";
public $mensaje = "";

	function insertar_cargos($detalle, $tipo, $monto, $conexion){
		$mensaje = "";
		try{
			$insertar = "INSERT INTO cargos (detalle, tipo, monto, usuario_creacion,fecha_creacion, usuario_modificacion, fecha_modificacion) 
					  VALUES ('{$detalle}', '{$tipo}', {$monto}, 1, NOW(),1, NOW())";
			
			$resultado = mysqli_query($conexion, $insertar);

			if(!$resultado){
				echo mysqli_error($conexion);
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