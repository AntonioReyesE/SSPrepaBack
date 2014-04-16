SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `SSPrepa` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `SSPrepa` ;

-- -----------------------------------------------------
-- Table `SSPrepa`.`Institucion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SSPrepa`.`Institucion` (
  `idInstitucion` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  `contacto` VARCHAR(45) NULL,
  `telefono` INT NULL,
  `direccion` VARCHAR(45) NULL,
  `correo` VARCHAR(45) NULL,
  `mapa` VARCHAR(45) NULL,
  `pagina` VARCHAR(45) NULL,
  `facebook` VARCHAR(45) NULL,
  PRIMARY KEY (`idInstitucion`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SSPrepa`.`Proyectos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SSPrepa`.`Proyectos` (
  `idProyectos` INT NOT NULL,
  `idInstitucionfk` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  `fechaInicio` DATE NULL,
  `fechaFin` DATE NULL,
  `cupo` INT NULL,
  `contacto` VARCHAR(45) NULL,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`idProyectos`),
  INDEX `fk_Proyectos_Institucion_idx` (`idInstitucionfk` ASC),
  CONSTRAINT `fk_Proyectos_Institucion`
    FOREIGN KEY (`idInstitucionfk`)
    REFERENCES `SSPrepa`.`Institucion` (`idInstitucion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SSPrepa`.`Alumno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SSPrepa`.`Alumno` (
  `matricula` VARCHAR(9) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `nombre` VARCHAR(45) NULL,
  `semestre` VARCHAR(45) NULL,
  `correo` VARCHAR(45) NULL,
  PRIMARY KEY (`matricula`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SSPrepa`.`ProyectosAlumno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SSPrepa`.`ProyectosAlumno` (
  `idproyectosfk` INT NOT NULL,
  `matriculaAlumnofk` VARCHAR(9) NOT NULL,
  `estatus` VARCHAR(45) NULL,
  PRIMARY KEY (`idproyectosfk`, `matriculaAlumnofk`),
  INDEX `fk_Proyectos_has_Alumno_Alumno1_idx` (`matriculaAlumnofk` ASC),
  INDEX `fk_Proyectos_has_Alumno_Proyectos1_idx` (`idproyectosfk` ASC),
  CONSTRAINT `fk_Proyectos_has_Alumno_Proyectos1`
    FOREIGN KEY (`idproyectosfk`)
    REFERENCES `SSPrepa`.`Proyectos` (`idProyectos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Proyectos_has_Alumno_Alumno1`
    FOREIGN KEY (`matriculaAlumnofk`)
    REFERENCES `SSPrepa`.`Alumno` (`matricula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SSPrepa`.`Bitacora`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SSPrepa`.`Bitacora` (
  `idBitacora` INT NOT NULL,
  `matriculaAlumnofk` VARCHAR(9) NOT NULL,
  PRIMARY KEY (`idBitacora`, `matriculaAlumnofk`),
  INDEX `fk_Bitacora_Alumno1_idx` (`matriculaAlumnofk` ASC),
  CONSTRAINT `fk_Bitacora_Alumno1`
    FOREIGN KEY (`matriculaAlumnofk`)
    REFERENCES `SSPrepa`.`Alumno` (`matricula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SSPrepa`.`Profesor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SSPrepa`.`Profesor` (
  `nomina` VARCHAR(9) NOT NULL,
  `idProyectosfk` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`nomina`, `idProyectosfk`),
  INDEX `fk_Profesor_Proyectos1_idx` (`idProyectosfk` ASC),
  CONSTRAINT `fk_Profesor_Proyectos1`
    FOREIGN KEY (`idProyectosfk`)
    REFERENCES `SSPrepa`.`Proyectos` (`idProyectos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SSPrepa`.`Horario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SSPrepa`.`Horario` (
  `nominaProfesorfk` VARCHAR(9) NOT NULL,
  `dias` VARCHAR(45) NULL,
  PRIMARY KEY (`nominaProfesorfk`),
  INDEX `fk_Horario_Profesor1_idx` (`nominaProfesorfk` ASC),
  CONSTRAINT `fk_Horario_Profesor1`
    FOREIGN KEY (`nominaProfesorfk`)
    REFERENCES `SSPrepa`.`Profesor` (`nomina`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SSPrepa`.`Fotos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SSPrepa`.`Fotos` (
  `direccion` INT NOT NULL,
  PRIMARY KEY (`direccion`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SSPrepa`.`Videos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SSPrepa`.`Videos` (
  `idVideos` INT NOT NULL,
  `idBitacorafk` INT NOT NULL,
  `bitacoraMatricolafk` VARCHAR(9) NOT NULL,
  `video` VARCHAR(70) NULL,
  PRIMARY KEY (`idVideos`),
  INDEX `fk_Videos_Bitacora1_idx` (`idBitacorafk` ASC, `bitacoraMatricolafk` ASC),
  CONSTRAINT `fk_Videos_Bitacora1`
    FOREIGN KEY (`idBitacorafk` , `bitacoraMatricolafk`)
    REFERENCES `SSPrepa`.`Bitacora` (`idBitacora` , `matriculaAlumnofk`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SSPrepa`.`Documentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SSPrepa`.`Documentos` (
  `idDocumentos` INT NOT NULL,
  `idBitacorafk` INT NOT NULL,
  `idBitacoraAlumnofk` VARCHAR(9) NOT NULL,
  `Documento` VARCHAR(70) NULL,
  PRIMARY KEY (`idDocumentos`),
  INDEX `fk_Documentos_Bitacora1_idx` (`idBitacorafk` ASC, `idBitacoraAlumnofk` ASC),
  CONSTRAINT `fk_Documentos_Bitacora1`
    FOREIGN KEY (`idBitacorafk` , `idBitacoraAlumnofk`)
    REFERENCES `SSPrepa`.`Bitacora` (`idBitacora` , `matriculaAlumnofk`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SSPrepa`.`Videos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SSPrepa`.`Videos` (
  `idVideos` INT NOT NULL,
  `idBitacorafk` INT NOT NULL,
  `bitacoraMatricolafk` VARCHAR(9) NOT NULL,
  `video` VARCHAR(70) NULL,
  PRIMARY KEY (`idVideos`),
  INDEX `fk_Videos_Bitacora1_idx` (`idBitacorafk` ASC, `bitacoraMatricolafk` ASC),
  CONSTRAINT `fk_Videos_Bitacora1`
    FOREIGN KEY (`idBitacorafk` , `bitacoraMatricolafk`)
    REFERENCES `SSPrepa`.`Bitacora` (`idBitacora` , `matriculaAlumnofk`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SSPrepa`.`Documentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SSPrepa`.`Documentos` (
  `idDocumentos` INT NOT NULL,
  `idBitacorafk` INT NOT NULL,
  `idBitacoraAlumnofk` VARCHAR(9) NOT NULL,
  `Documento` VARCHAR(70) NULL,
  PRIMARY KEY (`idDocumentos`),
  INDEX `fk_Documentos_Bitacora1_idx` (`idBitacorafk` ASC, `idBitacoraAlumnofk` ASC),
  CONSTRAINT `fk_Documentos_Bitacora1`
    FOREIGN KEY (`idBitacorafk` , `idBitacoraAlumnofk`)
    REFERENCES `SSPrepa`.`Bitacora` (`idBitacora` , `matriculaAlumnofk`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SSPrepa`.`Imagenes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SSPrepa`.`Imagenes` (
  `idImagenes` INT NOT NULL,
  `idBitacorafk` INT NOT NULL,
  `idBitacoraAlumnofk` VARCHAR(9) NOT NULL,
  `imagen` VARCHAR(70) NULL,
  PRIMARY KEY (`idImagenes`),
  INDEX `fk_Imagenes_Bitacora1_idx` (`idBitacorafk` ASC, `idBitacoraAlumnofk` ASC),
  CONSTRAINT `fk_Imagenes_Bitacora1`
    FOREIGN KEY (`idBitacorafk` , `idBitacoraAlumnofk`)
    REFERENCES `SSPrepa`.`Bitacora` (`idBitacora` , `matriculaAlumnofk`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
