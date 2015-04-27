-- Crear Roles
INSERT INTO `videoclub`.`roles` (`id_rol`, `nombre`, `usuario_creacion`, `fecha_creacion`, `usuario_modificacion`, `fecha_modificacion`) VALUES ('1', 'Actor Principal', '1', '2015-01-01', '1', '2015-01-01');
INSERT INTO `videoclub`.`roles` (`id_rol`, `nombre`, `usuario_creacion`, `fecha_creacion`, `usuario_modificacion`, `fecha_modificacion`) VALUES ('2', 'Actor Secundario', '1', '2015-01-01', '1', '2015-01-01');
INSERT INTO `videoclub`.`roles` (`id_rol`, `nombre`, `usuario_creacion`, `fecha_creacion`, `usuario_modificacion`, `fecha_modificacion`) VALUES ('3', 'Director', '1', '2015-01-01', '1', '2015-01-01');
-- Crear Generos
INSERT INTO `videoclub`.`generos` (`id_genero`, `nombre`, `usuario_creacion`, `fecha_creacion`, `usuario_modificacion`, `fecha_modificacion`) VALUES ('1', 'Accion', '1', '2015-02-02', '1', '2015-02-02');
INSERT INTO `videoclub`.`generos` (`id_genero`, `nombre`, `usuario_creacion`, `fecha_creacion`, `usuario_modificacion`, `fecha_modificacion`) VALUES ('2', 'Romance', '1', '2015-02-02', '1', '2015-02-02');
INSERT INTO `videoclub`.`generos` (`id_genero`, `nombre`, `usuario_creacion`, `fecha_creacion`, `usuario_modificacion`, `fecha_modificacion`) VALUES ('3', 'Drama', '1', '2015-02-02', '1', '2015-02-02');
INSERT INTO `videoclub`.`generos` (`id_genero`, `nombre`, `usuario_creacion`, `fecha_creacion`, `usuario_modificacion`, `fecha_modificacion`) VALUES ('4', 'Comedia', '1', '2015-02-02', '1', '2015-02-02');



-- Crear Actores / Directores

--  Kill Bill
INSERT INTO videoclub.actores_directores VALUES(1, 'Uma Thurman', 'f', 1, '2015-01-01', 1, '2015-01-01');
INSERT INTO videoclub.actores_directores VALUES(2, 'Quentin Tarantino', 'm', 1, '2015-01-01', 1, '2015-01-01');
INSERT INTO videoclub.actores_directores VALUES(3, 'David Carradine', 'm', 1, '2015-01-01', 1, '2015-01-01');
INSERT INTO videoclub.actores_directores VALUES(4, 'Michael Bowen', 'm', 1, '2015-01-01', 1, '2015-01-01');

-- El Descanso
INSERT INTO videoclub.actores_directores VALUES(5, 'Nancy Meyers', 'f', 1, '2015-01-01', 1, '2015-01-01');
INSERT INTO videoclub.actores_directores VALUES(6, 'Cameron Diaz', 'f', 1, '2015-01-01', 1, '2015-01-01');
INSERT INTO videoclub.actores_directores VALUES(7, 'Jude Law', 'm', 1, '2015-01-01', 1, '2015-01-01');

-- Forrest Gump
INSERT INTO videoclub.actores_directores VALUES(8, 'Robert Zemeckis', 'm', 1, '2015-01-01', 1, '2015-01-01');
INSERT INTO videoclub.actores_directores VALUES(9, 'Tom Hanks', 'm', 1, '2015-01-01', 1, '2015-01-01');
INSERT INTO videoclub.actores_directores VALUES(10, 'Robin Wright', 'f', 1, '2015-01-01', 1, '2015-01-01');
INSERT INTO videoclub.actores_directores VALUES(11, 'Haley Joel Osment', 'm', 1, '2015-01-01', 1, '2015-01-01');

-- Billy Madison
INSERT INTO videoclub.actores_directores VALUES(12, 'Tamra Davis', 'f', 1, '2015-01-01', 1, '2015-01-01');
INSERT INTO videoclub.actores_directores VALUES(13, 'Adam Sandler', 'm', 1, '2015-01-01', 1, '2015-01-01');
INSERT INTO videoclub.actores_directores VALUES(14, 'Bridgette Wilson-Sampras', 'f', 1, '2015-01-01', 1, '2015-01-01');
INSERT INTO videoclub.actores_directores VALUES(15, 'Steve Buscemi', 'm', 1, '2015-01-01', 1, '2015-01-01');

-- Peliculas

INSERT INTO videoclub.peliculas VALUES ('1', 'Kill Bill', '90', '2000', '1', '/kill_bill', '1', '2015-01-01', '1', '2015-01-01');
INSERT INTO videoclub.peliculas VALUES ('2', 'El Descanso', '90', '2000', '2', '/descanso', '1', '2015-01-01', '1', '2015-01-01');
INSERT INTO videoclub.peliculas VALUES ('3', 'Forrest Gump', '90', '2000', '3', '/forrest_gump', '1', '2015-01-01', '1', '2015-01-01');
INSERT INTO videoclub.peliculas VALUES ('4', 'Billy Madison', '90', '2000', '4', '/billy_madison', '1', '2015-01-01', '1', '2015-01-01');

-- Ubicaciones 

INSERT INTO videoclub.ubicaciones VALUES ('A01', 'Primera Fila, Seccion Uno', 1, '2015-01-01', 1, '2015-01-01');
INSERT INTO videoclub.ubicaciones VALUES ('A02', 'Primera Fila, Seccion Dos', 1, '2015-01-01', 1, '2015-01-01');
INSERT INTO videoclub.ubicaciones VALUES ('A03', 'Primera Fila, Seccion Tres', 1, '2015-01-01', 1, '2015-01-01');
INSERT INTO videoclub.ubicaciones VALUES ('A04', 'Primera Fila, Seccion Cuatro', 1, '2015-01-01', 1, '2015-01-01');

-- Copias

INSERT INTO videoclub.copias VALUES (1, 1, 'A01', 'disponible', 1, '2015-01-01', 1, '2015-01-01');
INSERT INTO videoclub.copias VALUES (2, 1, 'A01', 'disponible', 1, '2015-01-01', 1, '2015-01-01');
INSERT INTO videoclub.copias VALUES (3, 1, 'A01', 'disponible', 1, '2015-01-01', 1, '2015-01-01');

INSERT INTO videoclub.copias VALUES (4, 2, 'A02', 'disponible', 1, '2015-01-01', 1, '2015-01-01');
INSERT INTO videoclub.copias VALUES (5, 2, 'A02', 'disponible', 1, '2015-01-01', 1, '2015-01-01');
INSERT INTO videoclub.copias VALUES (6, 2, 'A02', 'disponible', 1, '2015-01-01', 1, '2015-01-01');

INSERT INTO videoclub.copias VALUES (7, 3, 'A03', 'disponible', 1, '2015-01-01', 1, '2015-01-01');
INSERT INTO videoclub.copias VALUES (8, 3, 'A03', 'disponible', 1, '2015-01-01', 1, '2015-01-01');
INSERT INTO videoclub.copias VALUES (9, 3, 'A03', 'disponible', 1, '2015-01-01', 1, '2015-01-01');

INSERT INTO videoclub.copias VALUES (10, 4, 'A04', 'disponible', 1, '2015-01-01', 1, '2015-01-01');
INSERT INTO videoclub.copias VALUES (11, 4, 'A04', 'disponible', 1, '2015-01-01', 1, '2015-01-01');
INSERT INTO videoclub.copias VALUES (12, 4, 'A04', 'disponible', 1, '2015-01-01', 1, '2015-01-01');