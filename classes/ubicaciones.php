<?php

class ubicaciones{

public $mensaje = "";


	function insertar_ubicacion($cod_ubicacion,$detalle, $conexion, $id_user){
		$mensaje = "";
		try{
			$insertar = "INSERT INTO ubicaciones (cod_ubicacion, detalle, usuario_creacion) 
					  VALUES ('{$cod_ubicacion}', '{$detalle}','{$id_user}')";
			
			$resultado = mysqli_query($conexion, $insertar);

			if(!$resultado){
				echo mysqli_error($conexion);
				throw new Exception(mysqli_error($conexion));
			}else{
				//$this->mensaje = "Se inserto con exito la copia";
				echo json_encode(array(
					'success' => array(
						'mensaje' => "Se inserto con exito la ubicacion"
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

	function llenar_dropdown_ubicaciones($conexion){
		try{
			$query = "SELECT * FROM ubicaciones";
			$resultado = mysqli_query($conexion, $query);
			//$row = mysqli_fetch_assoc($resultado);
			$array = array();
			while($row=mysqli_fetch_assoc($resultado)){
				$array[] = $row;
			}
			echo '{"ubicaciones_dropdown":'.json_encode($array).'}';

		}catch (Exception $e){
			$this->mensaje = $e->GetMessage();
		}		
	}

}



?>