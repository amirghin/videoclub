
-- Este view es para buscar peliculas disponibles, para el form reservaciones
CREATE VIEW disponibilidad_peliculas AS
SELECT pel.id_pelicula, pel.nombre, pel.duracion, gen.nombre genero, pel.precio_alquiler, 
(SELECT COUNT(id_copia) FROM copias WHERE copias.peliculas_id_pelicula = pel.id_pelicula AND copias.disponibilidad = 'disponible') num_copia 
FROM peliculas pel
JOIN generos gen ON pel.generos_id_genero = gen.id_genero 
JOIN copias cop on pel.id_pelicula = cop.peliculas_id_pelicula;


-- Nuevo View - Nuevo Modelo

CREATE VIEW disponibilidad_peliculas AS
SELECT (SELECT  id_copia FROM copias WHERE copias.peliculas_id_pelicula = pel.id_pelicula AND copias.disponibilidad = 'disponible' LIMIT 1) id_copia, pel.id_pelicula, pel.nombre, pel.duracion, gen.nombre genero, cop.disponibilidad, pel.precio_alquiler, 
(SELECT  COUNT(id_copia) FROM copias WHERE copias.peliculas_id_pelicula = pel.id_pelicula AND copias.disponibilidad = 'disponible') num_copia 
FROM peliculas pel
JOIN generos gen ON pel.generos_id_genero = gen.id_genero 
JOIN copias cop on pel.id_pelicula = cop.peliculas_id_pelicula
WHERE pel.nombre LIKE '%kill%' GROUP BY id_pelicula ORDER BY disponibilidad ASC;