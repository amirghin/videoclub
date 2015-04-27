<?php

class copias{

public $id_copia = "";
public $id_pelicula = "";
public $cod_ubicacion = "";
public $disponibilidad = "";
public $usuario_creacion = "";
public $fecha_creacion = "";
public $usuario_modificacion = "";
public $fecha_modificacion = "";
public $mensaje = "";

	function insertar_copia($id_pelicula,$disponibilidad, $cod_ubicacion, $conexion){
		$mensaje = "";
		try{
			$insertar = "INSERT INTO copias (peliculas_id_pelicula, ubicaciones_cod_ubicacion, disponibilidad, usuario_creacion,fecha_creacion, usuario_modificacion, fecha_modificacion) 
					  VALUES ({$id_pelicula}, {$cod_ubicacion}, '{$disponibilidad}', 1, NOW(),1, NOW())";
			
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