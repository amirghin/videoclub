<?php

class generos{

public $id_genero = "";
public $nombre = "";
public $usuario_creacion = "";
public $fecha_creacion = "";
public $usuario_modificacion = "";
public $fecha_modificacion = "";
public $mensaje = "";


	function insertar_genero($id_genero, $nombre, $conexion){
		$mensaje = "";
		try{
			$query = "INSERT INTO generos (id_genero, nombre, usuario_creacion, fecha_creacion, usuario_modificacion, fecha_modificacion) VALUES ({$id_genero}, '${nombre}', 1, NOW(),1, NOW())";
			if(mysqli_query($conexion,$query)){
				$this->mensaje = "Genero insertado correctamente";
			}else{
				throw new Exception(mysqli_error($conexion)); 
			}
			mysqli_close($conexion); 
			return $query;
		}catch(Exception $e){
		     throw new Exception($e->getMessage());	 
		}

	}

	function modificar_genero($id_genero, $nombre, $conexion){
		try{
			$modificar = "UPDATE generos set
								  nombre = '{$nombre}'
								  where id_genero= {$id_genero}"
								  ;	
			//echo $modificar;

			$resultado = mysqli_query($conexion, $modificar);

			if(!$resultado){
				echo mysqli_error($conexion);
				throw new Exception(mysqli_error($conexion));

			}else{
				$this->mensaje = "Se modifico con exito el genero";
				echo json_encode(array(
					'success' => array(
						'mensaje' => "Se modifico con exito el genero"
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
				echo mysqli_error($conexion);
				throw new Exception(mysqli_error($conexion));

			}else{
				$this->mensaje = "Se elimino con exito el genero";
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