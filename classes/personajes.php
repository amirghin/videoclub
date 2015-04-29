<?php

class personajes{

public $id_actor = "";
public $id_pelicula = "";
public $id_rol = "";
public $usuario_creacion = "";
public $fecha_creacion = "";
public $usuario_modificacion = "";
public $fecha_modificacion = "";
public $mensaje = "";


	function insertar_personajes($id_pelicula, $id_rol, $id_actor, $conexion, $id_user){
		try{

			$insert = "INSERT INTO personajes (peliculas_id_pelicula, roles_id_rol, actores_id_actor, usuario_creacion)
				VALUES ({$id_pelicula}, {$id_rol}, {$id_actor},'{$id_user}')";

			$resultado = mysqli_query($conexion, $insert);

			if(!$resultado){
				throw new Exception(mysqli_error($conexion));

			}else{
				echo json_encode(array(
					'success' => array(
						'mensaje' => "Se inserto con exito el personaje"
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