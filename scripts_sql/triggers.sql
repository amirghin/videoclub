DELIMITER //
CREATE TRIGGER reservar_copias
BEFORE INSERT ON peliculas_reservacion
FOR EACH ROW
BEGIN
	
    UPDATE videoclub.copias SET disponibilidad= 'reservado' WHERE id_copia = NEW.copias_id_copia;

END; //

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


DELIMITER //
CREATE TRIGGER liberar_copias
BEFORE DELETE ON peliculas_reservacion
FOR EACH ROW
BEGIN
	
    UPDATE videoclub.copias SET disponibilidad= 'disponible' WHERE id_copia = OLD.copias_id_copia;

END; //

DELIMITER ;