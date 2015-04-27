DELIMITER //
CREATE TRIGGER reservar_copias
BEFORE INSERT ON peliculas_reservacion
FOR EACH ROW
BEGIN
	
    UPDATE videoclub.copias SET disponibilidad= 'reservado' WHERE id_copia = NEW.copias_id_copia;

END; //

DELIMITER ;