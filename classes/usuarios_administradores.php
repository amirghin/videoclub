<?php

class usuarios_administradores{

public $mensaje = "";

	function existencia_usuario($nom_usuario, $conexion){
		try{
				$query = "SELECT * FROM usuarios_administradores WHERE nom_usuario='{$nom_usuario}'";
				$resultado = mysqli_query($conexion, $query);
				$existe = mysqli_num_rows($resultado);
				
				if ($existe == 1){

					$row = mysqli_fetch_assoc($resultado);
					$this->nom_usuario = $row['nom_usuario'];
					$this->id_usuario = $row['id_usuario'];
					$this->nombre = $row['nombre'];
					$this->habilitado = $row['habilitado'];
					return True;
				} else {

					return False;

				}


		}catch (Exception $e){
			$this->mensaje = $e->GetMessage();
		}
	}
	function validar_contrasena($nom_usuario, $password, $conexion){
		try{
			$query = "SELECT contrasena FROM usuarios_administradores WHERE nom_usuario='{$nom_usuario}'";
			$resultado = mysqli_query($conexion, $query);
			$row = mysqli_fetch_assoc($resultado);
			
			if (password_verify($password, $row['contrasena'])){

				return True;

			} else {

				return False;
			}


		} catch (Exception $e){
			$this->mensaje = $e->GetMessage();
		}
	}
	function encriptar_contrasena($contrasena){

		$cost = array('cost' => 11);
		$encrypted = password_hash($contrasena, PASSWORD_BCRYPT, $cost);

		return $encrypted;
	}
	function insertar_usuario($nom_usuario, $nombre, $apellido, $contrasena, $habilitado, $conexion){
		try{
			
			$contrasena_encriptada = $this->encriptar_contrasena($contrasena);
			if ($this->existencia_usuario($nom_usuario, $conexion)){

				throw new Exception("El usuario {$nom_usuario} ya existe");
			}

			$insert = "INSERT INTO usuarios_administradores (nom_usuario, nombre, apellido, contrasena, habilitado, usuario_creacion, fecha_creacion, usuario_modificacion, fecha_modificacion)
					VALUES ('{$nom_usuario}', '{$nombre}', '{$apellido}', '{$contrasena_encriptada}', '{$habilitado}','system', CURDATE(), 'system', CURDATE())";

			$resultado = mysqli_query($conexion, $insert);

			if(!$resultado){

				throw new Exception("Error al insertar usuario");
			}else{

				$this->mensaje = "Se inserto con exito el usuario";
			}
					
			}catch(Exception $e){
				$this->mensaje = $e->GetMessage();

			}
	}
	function buscar_usuarios($nom_usuario, $conexion){

		try{
			$query = "SELECT * FROM usuarios_administradores WHERE nom_usuario LIKE '%{$nom_usuario}%'";
			$resultado = mysqli_query($conexion, $query);

			$array = array();


			while($row=mysqli_fetch_assoc($resultado)){
				$array[] = $row;

			}

			echo '{"usuarios":'.json_encode($array).'}';


		}catch (Exception $e){
			$this->mensaje = $e->GetMessage();
		}
	}
	function eliminar_usuarios($id_usuario, $conexion){
		try{
			$eliminar = "DELETE FROM usuarios_administradores 
						WHERE id_usuario = {$id_usuario}";

			$resultado = mysqli_query($conexion, $eliminar);

			if(!$resultado){
				echo mysqli_error($conexion);
				throw new Exception(mysqli_error($conexion));

			}else{
				$this->mensaje = "Se elimino con exito el usuario";
				echo json_encode(array(
					'success' => array(
						'message' => "Se elimino con exito el usuario"
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
	function modificar_usuario($id_usuario, $nombre, $apellido, $contrasena, $habilitado, $encriptar, $conexion){
		try{
			if($encriptar){

				$contrasena = $this->encriptar_contrasena($contrasena);
			}
			$update = "UPDATE usuarios_administradores 
						SET nombre = '{$nombre}', apellido = '{$apellido}', contrasena = '{$contrasena}', habilitado = {$habilitado},
						usuario_modificacion = 1, fecha_modificacion = CURDATE()
						WHERE id_usuario = {$id_usuario}";

			$resultado = mysqli_query($conexion, $update);

			if(!$resultado){
				echo mysqli_error($conexion);
				throw new Exception(mysqli_error($conexion));

			}else{
				echo json_encode(array(
					'success' => array(
						'message' => "Se modifico con éxito el usuario con ID: {$id_usuario}"
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