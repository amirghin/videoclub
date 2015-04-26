--Crear Roles
INSERT INTO `videoclub`.`roles` (`id_rol`, `nombre`, `usuario_creacion`, `fecha_creacion`, `usuario_modificacion`, `fecha_modificacion`) VALUES ('1', 'Actor Principal', '1', '2015-01-01', '1', '2015-01-01');
INSERT INTO `videoclub`.`roles` (`id_rol`, `nombre`, `usuario_creacion`, `fecha_creacion`, `usuario_modificacion`, `fecha_modificacion`) VALUES ('2', 'Actor Secundario', '1', '2015-01-01', '1', '2015-01-01');
INSERT INTO `videoclub`.`roles` (`id_rol`, `nombre`, `usuario_creacion`, `fecha_creacion`, `usuario_modificacion`, `fecha_modificacion`) VALUES ('3', 'Director', '1', '2015-01-01', '1', '2015-01-01');
--Crear Generos
INSERT INTO `videoclub`.`generos` (`id_genero`, `nombre`, `usuario_creacion`, `fecha_creacion`, `usuario_modificacion`, `fecha_modificacion`) VALUES ('1', 'Accion', '1', '2015-02-02', '1', '2015-02-02');
INSERT INTO `videoclub`.`generos` (`id_genero`, `nombre`, `usuario_creacion`, `fecha_creacion`, `usuario_modificacion`, `fecha_modificacion`) VALUES ('2', 'Romance', '1', '2015-02-02', '1', '2015-02-02');
INSERT INTO `videoclub`.`generos` (`id_genero`, `nombre`, `usuario_creacion`, `fecha_creacion`, `usuario_modificacion`, `fecha_modificacion`) VALUES ('3', 'Drama', '1', '2015-02-02', '1', '2015-02-02');
INSERT INTO `videoclub`.`generos` (`id_genero`, `nombre`, `usuario_creacion`, `fecha_creacion`, `usuario_modificacion`, `fecha_modificacion`) VALUES ('4', 'Comedia', '1', '2015-02-02', '1', '2015-02-02');



--Crear Actores / Directores

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
INSERT INTO videoclub.actores_directores VALUES(12 'Tamra Davis', 'f', 1, '2015-01-01', 1, '2015-01-01');
INSERT INTO videoclub.actores_directores VALUES(13, 'Adam Sandler', 'm', 1, '2015-01-01', 1, '2015-01-01');
INSERT INTO videoclub.actores_directores VALUES(14 'Bridgette Wilson-Sampras', 'f', 1, '2015-01-01', 1, '2015-01-01');
INSERT INTO videoclub.actores_directores VALUES(15, 'Steve Buscemi', 'm', 1, '2015-01-01', 1, '2015-01-01');