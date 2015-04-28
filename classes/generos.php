<?php

class generos{

public $mensaje = "";


	function insertar_genero($nombre, $conexion, $id_user){
		try{
			$insertar = "INSERT INTO generos (nombre, usuario_creacion) VALUES ('${nombre}', '{$id_user}')";
			$resultado = mysqli_query($conexion, $insertar);

			if(!$resultado){
				throw new Exception(mysqli_error($conexion));

			}else{
			echo json_encode(array(
					'success' => array(
						'mensaje' => "Se insertó con exito el genero {$nombre}"
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

	function modificar_genero($id_genero, $nombre, $conexion, $id_user){
		try{
			$modificar = "UPDATE generos set
								  nombre = '{$nombre}', 
								  usuario_modificacion = '{$id_user}'
								  where id_genero= {$id_genero}"
								  ;	

			$resultado = mysqli_query($conexion, $modificar);

			if(!$resultado){
				throw new Exception(mysqli_error($conexion));

			}else{
				echo json_encode(array(
					'success' => array(
						'mensaje' => "Se modifico con exito el genero {$nombre}"
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

	function eliminar_genero($id_genero, $conexion){
		try{
			$eliminar = "DELETE FROM generos 
						WHERE id_genero = {$id_genero}";

			$resultado = mysqli_query($conexion, $eliminar);

			if(!$resultado){
				throw new Exception(mysqli_error($conexion));

			}else{
				echo json_encode(array(
					'success' => array(
						'mensaje' => "Se elimino con exito el genero"
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


	function llenar_dropdown($conexion){
		try{
			$query = "SELECT * FROM generos";
			$resultado = mysqli_query($conexion, $query);
			//$row = mysqli_fetch_assoc($resultado);
			$array = array();
			while($row=mysqli_fetch_assoc($resultado)){
				$array[] = $row;
			}
			echo '{"generos":'.json_encode($array).'}';

		}catch (Exception $e){
			$this->mensaje = $e->GetMessage();
		}
	}


}


?>