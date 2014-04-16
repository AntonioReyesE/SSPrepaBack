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
  `Institucion_idInstitucion` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  `fechaInicio` DATE NULL,
  `fechaFin` DATE NULL,
  `cupo` INT NULL,
  `contacto` VARCHAR(45) NULL,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`idProyectos`),
  INDEX `fk_Proyectos_Institucion_idx` (`Institucion_idInstitucion` ASC),
  CONSTRAINT `fk_Proyectos_Institucion`
    FOREIGN KEY (`Institucion_idInstitucion`)
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
  `Proyectos_idProyectos` INT NOT NULL,
  `Alumno_matricula` INT NOT NULL,
  `estatus` VARCHAR(45) NULL,
  PRIMARY KEY (`Proyectos_idProyectos`, `Alumno_matricula`),
  INDEX `fk_Proyectos_has_Alumno_Alumno1_idx` (`Alumno_matricula` ASC),
  INDEX `fk_Proyectos_has_Alumno_Proyectos1_idx` (`Proyectos_idProyectos` ASC),
  CONSTRAINT `fk_Proyectos_has_Alumno_Proyectos1`
    FOREIGN KEY (`Proyectos_idProyectos`)
    REFERENCES `SSPrepa`.`Proyectos` (`idProyectos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Proyectos_has_Alumno_Alumno1`
    FOREIGN KEY (`Alumno_matricula`)
    REFERENCES `SSPrepa`.`Alumno` (`matricula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SSPrepa`.`Bitacora`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SSPrepa`.`Bitacora` (
  `idBitacora` INT NOT NULL,
  `Alumno_matricula` INT NOT NULL,
  PRIMARY KEY (`idBitacora`, `Alumno_matricula`),
  INDEX `fk_Bitacora_Alumno1_idx` (`Alumno_matricula` ASC),
  CONSTRAINT `fk_Bitacora_Alumno1`
    FOREIGN KEY (`Alumno_matricula`)
    REFERENCES `SSPrepa`.`Alumno` (`matricula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SSPrepa`.`Profesor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SSPrepa`.`Profesor` (
  `nomina` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  `Proyectos_idProyectos` INT NOT NULL,
  PRIMARY KEY (`nomina`, `Proyectos_idProyectos`),
  INDEX `fk_Profesor_Proyectos1_idx` (`Proyectos_idProyectos` ASC),
  CONSTRAINT `fk_Profesor_Proyectos1`
    FOREIGN KEY (`Proyectos_idProyectos`)
    REFERENCES `SSPrepa`.`Proyectos` (`idProyectos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SSPrepa`.`Profesor_has_Horario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SSPrepa`.`Profesor_has_Horario` (
  `Profesor_nomina` INT NOT NULL,
  `Profesor_Proyectos_idProyectos` INT NOT NULL,
  `Horario_idHorario` INT NOT NULL,
  PRIMARY KEY (`Profesor_nomina`, `Profesor_Proyectos_idProyectos`, `Horario_idHorario`),
  INDEX `fk_Profesor_has_Horario_Profesor1_idx` (`Profesor_nomina` ASC, `Profesor_Proyectos_idProyectos` ASC),
  CONSTRAINT `fk_Profesor_has_Horario_Profesor1`
    FOREIGN KEY (`Profesor_nomina`)
    REFERENCES `SSPrepa`.`Profesor` (`nomina`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SSPrepa`.`Horario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SSPrepa`.`Horario` (
  `Profesor_nomina` INT NOT NULL,
  `dias` VARCHAR(45) NULL,
  PRIMARY KEY (`Profesor_nomina`),
  INDEX `fk_Horario_Profesor1_idx` (`Profesor_nomina` ASC),
  CONSTRAINT `fk_Horario_Profesor1`
    FOREIGN KEY (`Profesor_nomina`)
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
  `Bitacora_idBitacora` INT NOT NULL,
  `Bitacora_Alumno_matricula` INT NOT NULL,
  PRIMARY KEY (`idVideos`),
  INDEX `fk_Videos_Bitacora1_idx` (`Bitacora_idBitacora` ASC, `Bitacora_Alumno_matricula` ASC),
  CONSTRAINT `fk_Videos_Bitacora1`
    FOREIGN KEY (`Bitacora_idBitacora` , `Bitacora_Alumno_matricula`)
    REFERENCES `SSPrepa`.`Bitacora` (`idBitacora` , `Alumno_matricula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SSPrepa`.`Documentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SSPrepa`.`Documentos` (
  `idDocumentos` INT NOT NULL,
  `Bitacora_idBitacora` INT NOT NULL,
  `Bitacora_Alumno_matricula` INT NOT NULL,
  PRIMARY KEY (`idDocumentos`),
  INDEX `fk_Documentos_Bitacora1_idx` (`Bitacora_idBitacora` ASC, `Bitacora_Alumno_matricula` ASC),
  CONSTRAINT `fk_Documentos_Bitacora1`
    FOREIGN KEY (`Bitacora_idBitacora` , `Bitacora_Alumno_matricula`)
    REFERENCES `SSPrepa`.`Bitacora` (`idBitacora` , `Alumno_matricula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SSPrepa`.`Videos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SSPrepa`.`Videos` (
  `idVideos` INT NOT NULL,
  `Bitacora_idBitacora` INT NOT NULL,
  `Bitacora_Alumno_matricula` INT NOT NULL,
  PRIMARY KEY (`idVideos`),
  INDEX `fk_Videos_Bitacora1_idx` (`Bitacora_idBitacora` ASC, `Bitacora_Alumno_matricula` ASC),
  CONSTRAINT `fk_Videos_Bitacora1`
    FOREIGN KEY (`Bitacora_idBitacora` , `Bitacora_Alumno_matricula`)
    REFERENCES `SSPrepa`.`Bitacora` (`idBitacora` , `Alumno_matricula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SSPrepa`.`Documentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SSPrepa`.`Documentos` (
  `idDocumentos` INT NOT NULL,
  `Bitacora_idBitacora` INT NOT NULL,
  `Bitacora_Alumno_matricula` INT NOT NULL,
  PRIMARY KEY (`idDocumentos`),
  INDEX `fk_Documentos_Bitacora1_idx` (`Bitacora_idBitacora` ASC, `Bitacora_Alumno_matricula` ASC),
  CONSTRAINT `fk_Documentos_Bitacora1`
    FOREIGN KEY (`Bitacora_idBitacora` , `Bitacora_Alumno_matricula`)
    REFERENCES `SSPrepa`.`Bitacora` (`idBitacora` , `Alumno_matricula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SSPrepa`.`Imagenes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SSPrepa`.`Imagenes` (
  `idImagenes` INT NOT NULL,
  `Bitacora_idBitacora` INT NOT NULL,
  `Bitacora_Alumno_matricula` INT NOT NULL,
  PRIMARY KEY (`idImagenes`),
  INDEX `fk_Imagenes_Bitacora1_idx` (`Bitacora_idBitacora` ASC, `Bitacora_Alumno_matricula` ASC),
  CONSTRAINT `fk_Imagenes_Bitacora1`
    FOREIGN KEY (`Bitacora_idBitacora` , `Bitacora_Alumno_matricula`)
    REFERENCES `SSPrepa`.`Bitacora` (`idBitacora` , `Alumno_matricula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
