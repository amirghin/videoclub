-------------------------------------------------------------------------------------------
DELIMITER //
CREATE TRIGGER reservar_copias
BEFORE INSERT ON peliculas_reservacion
FOR EACH ROW
BEGIN
	
    UPDATE videoclub.copias SET disponibilidad= 'reservado' WHERE id_copia = NEW.copias_id_copia;

END; //
--------------------------------------------------------------------------------------------

DELIMITER //
CREATE TRIGGER cancelar_reservaciones
BEFORE UPDATE ON reservaciones
FOR EACH ROW
BEGIN
	DECLARE done INT DEFAULT FALSE;
    DECLARE ids INT;
    DECLARE cur CURSOR FOR SELECT copias_id_copia FROM videoclub.peliculas_reservacion WHERE reservaciones_id_reservacion = NEW.id_reservacion;
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

	IF NEW.estado_aprobacion = 'rechazado' THEN
		OPEN cur;
			up_loop: LOOP
				FETCH cur INTO ids;
				IF done THEN
					LEAVE up_loop;
				END IF;
				UPDATE videoclub.copias SET disponibilidad= 'disponible' WHERE id_copia = ids;
			END LOOP;
		CLOSE cur;
	END IF;
        
END; //

DELIMITER ;
----------------------------------------------------------------------------------------------

DELIMITER //
CREATE TRIGGER liberar_copias
BEFORE DELETE ON peliculas_reservacion
FOR EACH ROW
BEGIN
	
    UPDATE videoclub.copias SET disponibilidad= 'disponible' WHERE id_copia = OLD.copias_id_copia;

END; //

DELIMITER ;

-----------------------------------------------------------------------------------------------
DELIMITER //
CREATE TRIGGER insertar_actores_directores
BEFORE INSERT ON actores_directores
FOR EACH ROW
BEGIN
	IF NEW.fecha_creacion IS NULL THEN 
		SET NEW.fecha_creacion = CURDATE();
	END IF;

	IF NEW.fecha_modificacion IS NULL THEN
		SET NEW.fecha_modificacion = CURDATE();
	END IF;

	IF NEW.usuario_modificacion IS NULL THEN
		SET NEW.usuario_modificacion = NEW.usuario_creacion;
	END IF;

END; //

DELIMITER //

DELIMITER //
CREATE TRIGGER modificar_actores_directores
BEFORE UPDATE ON actores_directores
FOR EACH ROW
BEGIN
	 
	SET NEW.fecha_creacion = CURDATE();
	SET NEW.fecha_modificacion = CURDATE();
	
END; //

DELIMITER //
------------------------------------------------------------------------------------------------------------
DELIMITER //
CREATE TRIGGER insertar_cargos
BEFORE INSERT ON cargos
FOR EACH ROW
BEGIN
	IF NEW.fecha_creacion IS NULL THEN 
		SET NEW.fecha_creacion = CURDATE();
	END IF;

	IF NEW.fecha_modificacion IS NULL THEN
		SET NEW.fecha_modificacion = CURDATE();
	END IF;

	IF NEW.usuario_modificacion IS NULL THEN
		SET NEW.usuario_modificacion = NEW.usuario_creacion;
	END IF;

END; //

DELIMITER //

DELIMITER //
CREATE TRIGGER modificar_cargos
BEFORE UPDATE ON cargos
FOR EACH ROW
BEGIN
	 
	SET NEW.fecha_creacion = CURDATE();
	SET NEW.fecha_modificacion = CURDATE();
	
END; //

DELIMITER //
-------------------------------------------------------------------------------------------------------------
DELIMITER //
CREATE TRIGGER insertar_cargos_devolucion
BEFORE INSERT ON cargos_devolucion
FOR EACH ROW
BEGIN
	IF NEW.fecha_creacion IS NULL THEN 
		SET NEW.fecha_creacion = CURDATE();
	END IF;

	IF NEW.fecha_modificacion IS NULL THEN
		SET NEW.fecha_modificacion = CURDATE();
	END IF;

	IF NEW.usuario_modificacion IS NULL THEN
		SET NEW.usuario_modificacion = NEW.usuario_creacion;
	END IF;

END; //

DELIMITER //

DELIMITER //
CREATE TRIGGER modificar_cargos_devolucion
BEFORE UPDATE ON cargos_devolucion
FOR EACH ROW
BEGIN
	 
	SET NEW.fecha_creacion = CURDATE();
	SET NEW.fecha_modificacion = CURDATE();
	
END; //

DELIMITER //
----------------------------------------------------------------------------------------------------------------
DELIMITER //
CREATE TRIGGER insertar_clientes
BEFORE INSERT ON clientes
FOR EACH ROW
BEGIN
	IF NEW.fecha_creacion IS NULL THEN 
		SET NEW.fecha_creacion = CURDATE();
	END IF;

	IF NEW.fecha_modificacion IS NULL THEN
		SET NEW.fecha_modificacion = CURDATE();
	END IF;

	IF NEW.usuario_modificacion IS NULL THEN
		SET NEW.usuario_modificacion = NEW.usuario_creacion;
	END IF;

END; //

DELIMITER //

DELIMITER //
CREATE TRIGGER modificar_clientes
BEFORE UPDATE ON clientes
FOR EACH ROW
BEGIN
	 
	SET NEW.fecha_creacion = CURDATE();
	SET NEW.fecha_modificacion = CURDATE();
	
END; //

DELIMITER //
-----------------------------------------------------------------------------------------------------------------
DELIMITER //
CREATE TRIGGER insertar_copias
BEFORE INSERT ON copias
FOR EACH ROW
BEGIN
	IF NEW.fecha_creacion IS NULL THEN 
		SET NEW.fecha_creacion = CURDATE();
	END IF;

	IF NEW.fecha_modificacion IS NULL THEN
		SET NEW.fecha_modificacion = CURDATE();
	END IF;

	IF NEW.usuario_modificacion IS NULL THEN
		SET NEW.usuario_modificacion = NEW.usuario_creacion;
	END IF;

END; //

DELIMITER //

DELIMITER //
CREATE TRIGGER modificar_copias
BEFORE UPDATE ON copias
FOR EACH ROW
BEGIN
	 
	SET NEW.fecha_creacion = CURDATE();
	SET NEW.fecha_modificacion = CURDATE();
	
END; //

DELIMITER //
-----------------------------------------------------------------------------------------------------------------------


-----------------------------------------------------------------------------------------------------------------------
DELIMITER //
CREATE TRIGGER insertar_devoluciones
BEFORE INSERT ON devoluciones
FOR EACH ROW
BEGIN
	IF NEW.fecha_creacion IS NULL THEN 
		SET NEW.fecha_creacion = CURDATE();
	END IF;

	IF NEW.fecha_modificacion IS NULL THEN
		SET NEW.fecha_modificacion = CURDATE();
	END IF;

	IF NEW.usuario_modificacion IS NULL THEN
		SET NEW.usuario_modificacion = NEW.usuario_creacion;
	END IF;

END; //

DELIMITER //

DELIMITER //
CREATE TRIGGER modificar_devoluciones
BEFORE UPDATE ON devoluciones
FOR EACH ROW
BEGIN
	 
	SET NEW.fecha_creacion = CURDATE();
	SET NEW.fecha_modificacion = CURDATE();
	
END; //

DELIMITER //
-----------------------------------------------------------------------------------------------------------------------
DELIMITER //
CREATE TRIGGER insertar_generos
BEFORE INSERT ON generos
FOR EACH ROW
BEGIN
	IF NEW.fecha_creacion IS NULL THEN 
		SET NEW.fecha_creacion = CURDATE();
	END IF;

	IF NEW.fecha_modificacion IS NULL THEN
		SET NEW.fecha_modificacion = CURDATE();
	END IF;

	IF NEW.usuario_modificacion IS NULL THEN
		SET NEW.usuario_modificacion = NEW.usuario_creacion;
	END IF;

END; //

DELIMITER //

DELIMITER //
CREATE TRIGGER modificar_generos
BEFORE UPDATE ON generos
FOR EACH ROW
BEGIN
	 
	SET NEW.fecha_creacion = CURDATE();
	SET NEW.fecha_modificacion = CURDATE();
	
END; //

DELIMITER //
-----------------------------------------------------------------------------------------------------------------------
DELIMITER //
CREATE TRIGGER insertar_peliculas
BEFORE INSERT ON peliculas
FOR EACH ROW
BEGIN
	IF NEW.fecha_creacion IS NULL THEN 
		SET NEW.fecha_creacion = CURDATE();
	END IF;

	IF NEW.fecha_modificacion IS NULL THEN
		SET NEW.fecha_modificacion = CURDATE();
	END IF;

	IF NEW.usuario_modificacion IS NULL THEN
		SET NEW.usuario_modificacion = NEW.usuario_creacion;
	END IF;

END; //

DELIMITER //

DELIMITER //
CREATE TRIGGER modificar_peliculas
BEFORE UPDATE ON peliculas
FOR EACH ROW
BEGIN
	 
	SET NEW.fecha_creacion = CURDATE();
	SET NEW.fecha_modificacion = CURDATE();
	
END; //

DELIMITER //
-----------------------------------------------------------------------------------------------------------------------
DELIMITER //
CREATE TRIGGER insertar_personajes
BEFORE INSERT ON personajes
FOR EACH ROW
BEGIN
	IF NEW.fecha_creacion IS NULL THEN 
		SET NEW.fecha_creacion = CURDATE();
	END IF;

	IF NEW.fecha_modificacion IS NULL THEN
		SET NEW.fecha_modificacion = CURDATE();
	END IF;

	IF NEW.usuario_modificacion IS NULL THEN
		SET NEW.usuario_modificacion = NEW.usuario_creacion;
	END IF;

END; //

DELIMITER //

DELIMITER //
CREATE TRIGGER modificar_personajes
BEFORE UPDATE ON personajes
FOR EACH ROW
BEGIN
	 
	SET NEW.fecha_creacion = CURDATE();
	SET NEW.fecha_modificacion = CURDATE();
	
END; //

DELIMITER //
-----------------------------------------------------------------------------------------------------------------------
DELIMITER //
CREATE TRIGGER insertar_reservaciones
BEFORE INSERT ON reservaciones
FOR EACH ROW
BEGIN
	IF NEW.fecha_creacion IS NULL THEN 
		SET NEW.fecha_creacion = CURDATE();
	END IF;

	IF NEW.fecha_modificacion IS NULL THEN
		SET NEW.fecha_modificacion = CURDATE();
	END IF;

	IF NEW.usuario_modificacion IS NULL THEN
		SET NEW.usuario_modificacion = NEW.usuario_creacion;
	END IF;

END; //

DELIMITER //

DELIMITER //
CREATE TRIGGER modificar_reservaciones
BEFORE UPDATE ON reservaciones
FOR EACH ROW
BEGIN
	 
	SET NEW.fecha_creacion = CURDATE();
	SET NEW.fecha_modificacion = CURDATE();
	
END; //

DELIMITER //
-----------------------------------------------------------------------------------------------------------------------
DELIMITER //
CREATE TRIGGER insertar_roles
BEFORE INSERT ON roles
FOR EACH ROW
BEGIN
	IF NEW.fecha_creacion IS NULL THEN 
		SET NEW.fecha_creacion = CURDATE();
	END IF;

	IF NEW.fecha_modificacion IS NULL THEN
		SET NEW.fecha_modificacion = CURDATE();
	END IF;

	IF NEW.usuario_modificacion IS NULL THEN
		SET NEW.usuario_modificacion = NEW.usuario_creacion;
	END IF;

END; //

DELIMITER //

DELIMITER //
CREATE TRIGGER modificar_roles
BEFORE UPDATE ON roles
FOR EACH ROW
BEGIN
	 
	SET NEW.fecha_creacion = CURDATE();
	SET NEW.fecha_modificacion = CURDATE();
	
END; //

DELIMITER //

-----------------------------------------------------------------------------------------------------------------------

DELIMITER //
CREATE TRIGGER insertar_ubicaciones
BEFORE INSERT ON ubicaciones
FOR EACH ROW
BEGIN
	IF NEW.fecha_creacion IS NULL THEN 
		SET NEW.fecha_creacion = CURDATE();
	END IF;

	IF NEW.fecha_modificacion IS NULL THEN
		SET NEW.fecha_modificacion = CURDATE();
	END IF;

	IF NEW.usuario_modificacion IS NULL THEN
		SET NEW.usuario_modificacion = NEW.usuario_creacion;
	END IF;

END; //

DELIMITER //

DELIMITER //
CREATE TRIGGER modificar_ubicaciones
BEFORE UPDATE ON ubicaciones
FOR EACH ROW
BEGIN
	 
	SET NEW.fecha_creacion = CURDATE();
	SET NEW.fecha_modificacion = CURDATE();
	
END; //

DELIMITER //
-----------------------------------------------------------------------------------------------------------------------
DELIMITER //
CREATE TRIGGER insertar_usuario_administradores
BEFORE INSERT ON usuarios_administradores
FOR EACH ROW
BEGIN
	IF NEW.fecha_creacion IS NULL THEN 
		SET NEW.fecha_creacion = CURDATE();
	END IF;

	IF NEW.fecha_modificacion IS NULL THEN
		SET NEW.fecha_modificacion = CURDATE();
	END IF;

	IF NEW.usuario_modificacion IS NULL THEN
		SET NEW.usuario_modificacion = NEW.usuario_creacion;
	END IF;

END; //

DELIMITER //

DELIMITER //
CREATE TRIGGER modificar_usuarios_administradores
BEFORE UPDATE ON usuarios_administradores
FOR EACH ROW
BEGIN
	 
	SET NEW.fecha_creacion = CURDATE();
	SET NEW.fecha_modificacion = CURDATE();
	
END; //

DELIMITER //