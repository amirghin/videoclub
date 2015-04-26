-- MySQL Script generated by MySQL Workbench
-- 03/21/15 22:43:23
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema videoclub
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema videoclub
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `videoclub` DEFAULT CHARACTER SET utf8 ;
USE `videoclub` ;

-- -----------------------------------------------------
-- Table `videoclub`.`usuarios_administradores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `videoclub`.`usuarios_administradores` (
  `id_usuario` INT(11) NOT NULL AUTO_INCREMENT,
  `nom_usuario` VARCHAR(20) NULL DEFAULT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido` VARCHAR(45) NOT NULL,
  `contrasena` VARCHAR(255) NOT NULL,
  `usuario_creacion` VARCHAR(20) NOT NULL,
  `fecha_creacion` DATE NOT NULL,
  `usuario_modificacion` VARCHAR(20) NOT NULL,
  `fecha_modificacion` DATE NOT NULL,
  `habilitado` TINYINT(1) NOT NULL,
  PRIMARY KEY (`id_usuario`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `videoclub`.`actores_directores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `videoclub`.`actores_directores` (
  `id_actor` INT(11) NOT NULL COMMENT 'Llave primaria para cada actor o actriz',
  `nombre` VARCHAR(45) NOT NULL COMMENT 'Nombre del actor',
  `genero` CHAR(1) NOT NULL COMMENT '(F)Femenino o (M)Masculo',
  `usuario_creacion` INT(11) NOT NULL,
  `fecha_creacion` DATE NOT NULL,
  `usuario_modificacion` INT(11) NOT NULL,
  `fecha_modificacion` DATE NOT NULL,
  PRIMARY KEY (`id_actor`),
  INDEX `fk_actores_directores_usuarios_1_idx` (`usuario_creacion` ASC),
  INDEX `fk_actores_directores_usuarios_2_idx` (`usuario_modificacion` ASC),
  CONSTRAINT `fk_actores_directores_usuarios_1`
    FOREIGN KEY (`usuario_creacion`)
    REFERENCES `videoclub`.`usuarios_administradores` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_actores_directores_usuarios_2`
    FOREIGN KEY (`usuario_modificacion`)
    REFERENCES `videoclub`.`usuarios_administradores` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = big5;


-- -----------------------------------------------------
-- Table `videoclub`.`cargos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `videoclub`.`cargos` (
  `id_cargo` INT(11) NOT NULL,
  `detalle` VARCHAR(45) NOT NULL,
  `tipo` VARCHAR(8) NULL DEFAULT NULL,
  `monto` FLOAT NOT NULL,
  `usuario_creacion` INT(11) NOT NULL,
  `fecha_creacion` DATE NOT NULL,
  `usuario_modificacion` INT(11) NOT NULL,
  `fecha_modificacion` DATE NOT NULL,
  PRIMARY KEY (`id_cargo`),
  INDEX `fk_cargos_usuarios_1_idx` (`usuario_creacion` ASC),
  INDEX `fk_cargos_usuarios_2_idx` (`usuario_modificacion` ASC),
  CONSTRAINT `fk_cargos_usuarios_1`
    FOREIGN KEY (`usuario_creacion`)
    REFERENCES `videoclub`.`usuarios_administradores` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cargos_usuarios_2`
    FOREIGN KEY (`usuario_modificacion`)
    REFERENCES `videoclub`.`usuarios_administradores` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `videoclub`.`clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `videoclub`.`clientes` (
  `id_cliente` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Llave Primaria para cada cliente, se conoce como número de afiliado',
  `fecha_afiliacion` DATE NOT NULL COMMENT 'Fecha de afiliación del cliente, en formato DATE',
  `nombre` VARCHAR(45) NOT NULL COMMENT 'Nombre del cliente',
  `apellidos` VARCHAR(45) NOT NULL COMMENT 'Apellidos del cliente',
  `fecha_nacimiento` DATE NOT NULL COMMENT 'Fecha de Nacimiento del cliente, en formato DATE',
  `tel_casa` VARCHAR(8) NOT NULL COMMENT 'Telefono de la casa, solo números',
  `tel_celular` VARCHAR(8) NOT NULL COMMENT 'Telefono del celular, solo números.',
  `email` VARCHAR(45) NOT NULL COMMENT 'Correo Electrónico del cliente',
  `activo_web` TINYINT(1) NOT NULL COMMENT 'Campo de tipo Booleano, permite reservar peliculas desde la web.',
  `estado` VARCHAR(10) NOT NULL COMMENT 'Este campo especifica si el usuario se encuentra activo o no.',
  `observaciones` LONGTEXT NULL DEFAULT NULL COMMENT 'Este campo es utilizado para documentar por que el estado_web no se encuentra activo',
  `usuario_creacion` INT(11) NOT NULL,
  `fecha_creacion` DATE NOT NULL,
  `usuario_modificacion` INT(11) NOT NULL,
  `fecha_modificacion` DATE NOT NULL,
  PRIMARY KEY (`id_cliente`),
  INDEX `fk_clientes_usuarios_1_idx` (`usuario_creacion` ASC),
  INDEX `fk_clientes_usuarios_2_idx` (`usuario_modificacion` ASC),
  CONSTRAINT `fk_clientes_usuarios_1`
    FOREIGN KEY (`usuario_creacion`)
    REFERENCES `videoclub`.`usuarios_administradores` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_clientes_usuarios_2`
    FOREIGN KEY (`usuario_modificacion`)
    REFERENCES `videoclub`.`usuarios_administradores` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `videoclub`.`reservaciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `videoclub`.`reservaciones` (
  `id_reservacion` INT(11) NOT NULL,
  `clientes_id_cliente` INT(11) NOT NULL,
  `estado_aprobacion` VARCHAR(15) NOT NULL,
  `fecha_reservacion` DATE NOT NULL,
  `fecha_retiro` DATE NOT NULL,
  `hora_retiro` TIME NOT NULL,
  `fecha_entrega` DATE NULL DEFAULT NULL,
  `usuario_creacion` INT(11) NOT NULL,
  `fecha_creacion` DATE NOT NULL,
  `usuario_modificacion` INT(11) NOT NULL,
  `fecha_modificacion` DATE NOT NULL,
  PRIMARY KEY (`id_reservacion`),
  INDEX `fk_reservaciones_clientes_idx` (`clientes_id_cliente` ASC),
  INDEX `fk_reservaciones_usuarios_1_idx` (`usuario_creacion` ASC),
  INDEX `fk_reservaciones_usuarios_2_idx` (`usuario_modificacion` ASC),
  CONSTRAINT `fk_reservaciones_clientes`
    FOREIGN KEY (`clientes_id_cliente`)
    REFERENCES `videoclub`.`clientes` (`id_cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reservaciones_usuarios_1`
    FOREIGN KEY (`usuario_creacion`)
    REFERENCES `videoclub`.`usuarios_administradores` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reservaciones_usuarios_2`
    FOREIGN KEY (`usuario_modificacion`)
    REFERENCES `videoclub`.`usuarios_administradores` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `videoclub`.`devoluciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `videoclub`.`devoluciones` (
  `id_devolucion` INT(11) NOT NULL,
  `reservaciones_id_reservacion` INT(11) NOT NULL,
  `observaciones` LONGTEXT NULL DEFAULT NULL,
  `usuario_creacion` INT(11) NOT NULL,
  `fecha_creacion` DATE NOT NULL,
  `usuario_modificacion` INT(11) NOT NULL,
  `fecha_modificacion` DATE NOT NULL,
  PRIMARY KEY (`id_devolucion`),
  INDEX `fk_usuario_creacion_idx` (`usuario_creacion` ASC),
  INDEX `fk_reservaciones_idx` (`reservaciones_id_reservacion` ASC),
  INDEX `fk_devoluciones_usuarios_idx` (`usuario_creacion` ASC, `usuario_modificacion` ASC),
  INDEX `fk_devoluciones_usuario_2_idx` (`usuario_modificacion` ASC),
  CONSTRAINT `fk_devoluciones_reservaciones`
    FOREIGN KEY (`reservaciones_id_reservacion`)
    REFERENCES `videoclub`.`reservaciones` (`id_reservacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_devoluciones_usuario_2`
    FOREIGN KEY (`usuario_modificacion`)
    REFERENCES `videoclub`.`usuarios_administradores` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_devoluciones_usuarios_1`
    FOREIGN KEY (`usuario_creacion`)
    REFERENCES `videoclub`.`usuarios_administradores` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `videoclub`.`cargos_devolucion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `videoclub`.`cargos_devolucion` (
  `devoluciones_id_devolucion` INT(11) NOT NULL,
  `cargos_id_cargo` INT(11) NOT NULL,
  `usuario_creacion` INT(11) NOT NULL,
  `fecha_creacion` DATE NOT NULL,
  `usuario_modificacion` INT(11) NOT NULL,
  `fecha_modificacion` DATE NOT NULL,
  PRIMARY KEY (`devoluciones_id_devolucion`, `cargos_id_cargo`),
  INDEX `fk_cargos_usuarios_1_idx` (`usuario_creacion` ASC),
  INDEX `fk_cargos_usuarios_2_idx` (`usuario_modificacion` ASC),
  INDEX `fk_cargos_devolucion_cargos_idx` (`cargos_id_cargo` ASC),
  CONSTRAINT `fk_cargos_devolucion_cargos`
    FOREIGN KEY (`cargos_id_cargo`)
    REFERENCES `videoclub`.`cargos` (`id_cargo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cargos_devolucion_devoluciones`
    FOREIGN KEY (`devoluciones_id_devolucion`)
    REFERENCES `videoclub`.`devoluciones` (`id_devolucion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cargos_devolucion_usuarios_1`
    FOREIGN KEY (`usuario_creacion`)
    REFERENCES `videoclub`.`usuarios_administradores` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cargos_devolucion_usuarios_2`
    FOREIGN KEY (`usuario_modificacion`)
    REFERENCES `videoclub`.`usuarios_administradores` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `videoclub`.`generos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `videoclub`.`generos` (
  `id_genero` INT(11) NOT NULL,
  `nombre` VARCHAR(20) NOT NULL,
  `usuario_creacion` INT(11) NOT NULL,
  `fecha_creacion` DATE NOT NULL,
  `usuario_modificacion` INT(11) NOT NULL,
  `fecha_modificacion` DATE NOT NULL,
  PRIMARY KEY (`id_genero`),
  INDEX `fk_generos_usuarios_administradores1_idx` (`usuario_creacion` ASC),
  INDEX `fk_generos_usuarios_administradores2_idx` (`usuario_modificacion` ASC),
  CONSTRAINT `fk_generos_usuarios_administradores1`
    FOREIGN KEY (`usuario_creacion`)
    REFERENCES `videoclub`.`usuarios_administradores` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_generos_usuarios_administradores2`
    FOREIGN KEY (`usuario_modificacion`)
    REFERENCES `videoclub`.`usuarios_administradores` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `videoclub`.`peliculas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `videoclub`.`peliculas` (
  `id_pelicula` INT(11) NOT NULL COMMENT 'LLave Primaria de la pelicula',
  `nombre` VARCHAR(45) NOT NULL COMMENT 'Nombre de la Pelicula',
  `duracion` INT(11) NOT NULL COMMENT 'Duración de la película en minutos',
  `precio_alquiler` INT(11) NOT NULL COMMENT 'Precio de Alquiler de la pelicula, tiene que ser un numero entero',
  `generos_id_genero` INT(11) NOT NULL COMMENT 'Llave foranea del género de pelicula al que pertenece',
  `ruta_imagenes` VARCHAR(100) NULL DEFAULT NULL,
  `usuario_creacion` INT(11) NOT NULL,
  `fecha_creacion` DATE NOT NULL,
  `usuario_modificacion` INT(11) NOT NULL,
  `fecha_modificacion` DATE NOT NULL,
  PRIMARY KEY (`id_pelicula`),
  INDEX `fk_peliculas_generos_idx` (`generos_id_genero` ASC),
  INDEX `fk_peliculas_usuarios_1_idx` (`usuario_creacion` ASC),
  INDEX `fk_peliculas_usuarios_2_idx` (`usuario_modificacion` ASC),
  CONSTRAINT `fk_peliculas_generos`
    FOREIGN KEY (`generos_id_genero`)
    REFERENCES `videoclub`.`generos` (`id_genero`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_peliculas_usuarios_1`
    FOREIGN KEY (`usuario_creacion`)
    REFERENCES `videoclub`.`usuarios_administradores` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_peliculas_usuarios_2`
    FOREIGN KEY (`usuario_modificacion`)
    REFERENCES `videoclub`.`usuarios_administradores` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `videoclub`.`ubicaciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `videoclub`.`ubicaciones` (
  `cod_ubicacion` VARCHAR(20) NOT NULL,
  `detalle` VARCHAR(45) NULL DEFAULT NULL,
  `usuario_creacion` INT(11) NOT NULL,
  `fecha_creacion` DATE NOT NULL,
  `usuario_modificacion` INT(11) NOT NULL,
  `fecha_modificacion` DATE NOT NULL,
  PRIMARY KEY (`cod_ubicacion`),
  INDEX `fk_ubicaciones_usuarios_1_idx` (`usuario_creacion` ASC),
  INDEX `fk_ubicaciones_usuarios_2_idx` (`usuario_modificacion` ASC),
  CONSTRAINT `fk_ubicaciones_usuarios_1`
    FOREIGN KEY (`usuario_creacion`)
    REFERENCES `videoclub`.`usuarios_administradores` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ubicaciones_usuarios_2`
    FOREIGN KEY (`usuario_modificacion`)
    REFERENCES `videoclub`.`usuarios_administradores` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `videoclub`.`copias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `videoclub`.`copias` (
  `id_copia` INT(11) NOT NULL,
  `peliculas_id_pelicula` INT(11) NOT NULL,
  `ubicaciones_cod_ubicacion` VARCHAR(20) NOT NULL,
  `disponibilidad` VARCHAR(20) NOT NULL,
  `usuario_creacion` INT(11) NOT NULL,
  `fecha_creacion` DATE NOT NULL,
  `usuario_modificacion` INT(11) NOT NULL,
  `fecha_modificacion` DATE NOT NULL,
  PRIMARY KEY (`id_copia`),
  INDEX `fk_usuario_creacion_idx` (`usuario_creacion` ASC),
  INDEX `fk_usuario_modificacion_idx` (`usuario_modificacion` ASC),
  INDEX `fk_peliculas_id_idx` (`peliculas_id_pelicula` ASC),
  INDEX `fk_ubicaciones_idx` (`ubicaciones_cod_ubicacion` ASC),
  CONSTRAINT `fk_copias_peliculas`
    FOREIGN KEY (`peliculas_id_pelicula`)
    REFERENCES `videoclub`.`peliculas` (`id_pelicula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_copias_ubicaciones`
    FOREIGN KEY (`ubicaciones_cod_ubicacion`)
    REFERENCES `videoclub`.`ubicaciones` (`cod_ubicacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_copias_usuarios_1`
    FOREIGN KEY (`usuario_creacion`)
    REFERENCES `videoclub`.`usuarios_administradores` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_copias_usuarios_2`
    FOREIGN KEY (`usuario_modificacion`)
    REFERENCES `videoclub`.`usuarios_administradores` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `videoclub`.`peliculas_reservacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `videoclub`.`peliculas_reservacion` (
  `reservaciones_id_reservacion` INT(11) NOT NULL,
  `copias_id_copia` INT(11) NOT NULL,
  `usuario_creacion` INT(11) NOT NULL,
  `fecha_creacion` DATE NOT NULL,
  `usuario_modificacion` INT(11) NOT NULL,
  `fecha_modificacion` DATE NOT NULL,
  PRIMARY KEY (`reservaciones_id_reservacion`, `copias_id_copia`),
  INDEX `fk_peliculas_copias_idx` (`copias_id_copia` ASC),
  INDEX `fk_peliculas_reservacion_usuarios_1_idx` (`usuario_creacion` ASC),
  INDEX `fk_peliculas_reservacion_usuarios_2_idx` (`usuario_modificacion` ASC),
  INDEX `fk_peliculas_reservacion_copias_idx` (`copias_id_copia` ASC),
  CONSTRAINT `fk_peliculas_reservacion_copias`
    FOREIGN KEY (`copias_id_copia`)
    REFERENCES `videoclub`.`copias` (`id_copia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_peliculas_reservacion_reservaciones`
    FOREIGN KEY (`reservaciones_id_reservacion`)
    REFERENCES `videoclub`.`reservaciones` (`id_reservacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_peliculas_reservacion_usuarios_1`
    FOREIGN KEY (`usuario_creacion`)
    REFERENCES `videoclub`.`usuarios_administradores` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_peliculas_reservacion_usuarios_2`
    FOREIGN KEY (`usuario_modificacion`)
    REFERENCES `videoclub`.`usuarios_administradores` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `videoclub`.`roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `videoclub`.`roles` (
  `id_rol` INT(11) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `usuario_creacion` INT(11) NOT NULL,
  `fecha_creacion` DATE NOT NULL,
  `usuario_modificacion` INT(11) NOT NULL,
  `fecha_modificacion` DATE NOT NULL,
  PRIMARY KEY (`id_rol`),
  INDEX `fk_roles_usuarios_2_idx` (`usuario_modificacion` ASC),
  INDEX `fk_roles_usuarios_1_idx` (`usuario_creacion` ASC),
  CONSTRAINT `fk_roles_usuarios_1`
    FOREIGN KEY (`usuario_creacion`)
    REFERENCES `videoclub`.`usuarios_administradores` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_roles_usuarios_2`
    FOREIGN KEY (`usuario_modificacion`)
    REFERENCES `videoclub`.`usuarios_administradores` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `videoclub`.`personajes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `videoclub`.`personajes` (
  `actores_id_actor` INT(11) NOT NULL COMMENT 'Llave primaria Compuesta, asocia el actor y la pelicula en que actua',
  `peliculas_id_pelicula` INT(11) NOT NULL COMMENT 'Llave primaria Compuesta, asocia el actor y la pelicula en que actua',
  `roles_id_rol` INT(11) NOT NULL COMMENT 'Rol del actor en la pelicula, puede tener tres opciones, Primario o Secundario o Director',
  `usuario_creacion` INT(11) NOT NULL,
  `fecha_creacion` DATE NOT NULL,
  `usuario_modificacion` INT(11) NOT NULL,
  `fecha_modificacion` DATE NOT NULL,
  PRIMARY KEY (`actores_id_actor`, `peliculas_id_pelicula`, `roles_id_rol`),
  INDEX `fk_personajes_peliculas_idx` (`peliculas_id_pelicula` ASC),
  INDEX `fk_personajes_roles_idx` (`roles_id_rol` ASC),
  INDEX `fk_personajes_usuarios_1_idx` (`usuario_creacion` ASC),
  INDEX `fk_personajes_usuarios_2_idx` (`usuario_modificacion` ASC),
  CONSTRAINT `fk_personajes_actores`
    FOREIGN KEY (`actores_id_actor`)
    REFERENCES `videoclub`.`actores_directores` (`id_actor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_personajes_peliculas`
    FOREIGN KEY (`peliculas_id_pelicula`)
    REFERENCES `videoclub`.`peliculas` (`id_pelicula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_personajes_roles`
    FOREIGN KEY (`roles_id_rol`)
    REFERENCES `videoclub`.`roles` (`id_rol`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_personajes_usuarios_1`
    FOREIGN KEY (`usuario_creacion`)
    REFERENCES `videoclub`.`usuarios_administradores` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_personajes_usuarios_2`
    FOREIGN KEY (`usuario_modificacion`)
    REFERENCES `videoclub`.`usuarios_administradores` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
