<?php

class copias{

public $mensaje = "";

	function insertar_copia($id_pelicula,$disponibilidad, $cod_ubicacion, $conexion, $id_user){
		$mensaje = "";
		try{
			$insertar = "INSERT INTO copias (peliculas_id_pelicula, ubicaciones_cod_ubicacion, disponibilidad, usuario_creacion) 
					  VALUES ({$id_pelicula}, {$cod_ubicacion}, '{$disponibilidad}', '{$id_user}')";
			
			$resultado = mysqli_query($conexion, $insertar);

			if(!$resultado){
				throw new Exception(mysqli_error($conexion));
			}else{
				$this->mensaje = "Se inserto con exito la copia";
				echo json_encode(array(
					'success' => array(
						'mensaje' => "Se inserto con exito la copia"
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