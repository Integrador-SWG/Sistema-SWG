SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `swg` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `swg` ;

-- -----------------------------------------------------
-- Table `swg`.`confvista`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swg`.`confvista` (
  `idconfvista` INT NOT NULL AUTO_INCREMENT ,
  `logo` VARCHAR(100) NOT NULL ,
  `tittle` VARCHAR(45) NOT NULL ,
  `status` VARCHAR(2) NOT NULL ,
  PRIMARY KEY (`idconfvista`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `swg`.`empresa`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swg`.`empresa` (
  `idempresa` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  `direccion` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(45) NULL ,
  `idconfvista` INT NOT NULL ,
  PRIMARY KEY (`idempresa`) )
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `swg`.`nivel`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swg`.`nivel` (
  `idnivel` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  `status` VARCHAR(2) NOT NULL ,
  PRIMARY KEY (`idnivel`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `swg`.`empleados`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swg`.`empleados` (
  `idempleados` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  `apellido` VARCHAR(45) NOT NULL ,
  `telefono` VARCHAR(45) NOT NULL ,
  `user` VARCHAR(45) NOT NULL ,
  `pass` VARCHAR(45) NOT NULL ,
  `status` VARCHAR(2) NOT NULL ,
  `idnivel` INT NOT NULL ,
  `idempresa` INT NOT NULL ,
  PRIMARY KEY (`idempleados`) )
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `swg`.`datosfacturacion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swg`.`datosfacturacion` (
  `iddatosfacturacion` INT NOT NULL AUTO_INCREMENT ,
  `razon` VARCHAR(45) NOT NULL ,
  `rfc` VARCHAR(45) NOT NULL ,
  `direccion` VARCHAR(45) NOT NULL ,
  `cp` VARCHAR(45) NOT NULL ,
  `municipio` VARCHAR(45) NOT NULL ,
  `estado` VARCHAR(45) NOT NULL ,
  `status` VARCHAR(2) NOT NULL ,
  `idempresa` INT NOT NULL ,
  PRIMARY KEY (`iddatosfacturacion`) )
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `swg`.`proveedor`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swg`.`proveedor` (
  `idproveedor` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  `direccion` VARCHAR(80) NOT NULL ,
  `telefono` VARCHAR(45) NOT NULL ,
  `telefono1` VARCHAR(45) NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `status` VARCHAR(2) NOT NULL ,
  PRIMARY KEY (`idproveedor`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `swg`.`productos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swg`.`productos` (
  `idproductos` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(25) NOT NULL ,
  `resumen` VARCHAR(50) NOT NULL ,
  `descripcion` TEXT NOT NULL ,
  `cantidad` INT NOT NULL ,
  `precio` DOUBLE NOT NULL ,
  `status` VARCHAR(2) NOT NULL ,
  `idproveedor` INT NOT NULL ,
  PRIMARY KEY (`idproductos`) )
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `swg`.`altaproductos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swg`.`altaproductos` (
  `idaltaproductos` INT NOT NULL AUTO_INCREMENT ,
  `fecha` DATETIME NOT NULL ,
  `idempleados` INT NOT NULL ,
  `idproductos` INT NOT NULL ,
  PRIMARY KEY (`idaltaproductos`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `swg`.`confvistapro`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swg`.`confvistapro` (
  `idconfvistapro` INT NOT NULL AUTO_INCREMENT ,
  `rutaimagen` VARCHAR(100) NOT NULL ,
  `status` VARCHAR(2) NOT NULL ,
  `idproductos` INT NOT NULL ,
  PRIMARY KEY (`idconfvistapro`) )
ENGINE = InnoDB;



-- -----------------------------------------------------
-- Table `swg`.`cliente`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swg`.`cliente` (
  `idcliente` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  `apellido` VARCHAR(45) NOT NULL ,
  `telefono` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `titulo` VARCHAR(45) NOT NULL ,
  `user` VARCHAR(45) NOT NULL ,
  `pass` VARCHAR(45) NOT NULL ,
  `status` VARCHAR(2) NOT NULL ,
  PRIMARY KEY (`idcliente`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `swg`.`direccioncliente`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swg`.`direccioncliente` (
  `iddireccioncliente` INT NOT NULL AUTO_INCREMENT ,
  `calle` VARCHAR(45) NOT NULL ,
  `colonia` VARCHAR(45) NULL ,
  `mza` VARCHAR(45) NOT NULL ,
  `num` VARCHAR(45) NOT NULL ,
  `cp` VARCHAR(45) NOT NULL ,
  `estado` VARCHAR(45) NOT NULL ,
  `rasgo` VARCHAR(45) NULL ,
  `status` VARCHAR(2) NOT NULL ,
  `idcliente` INT NOT NULL ,
  PRIMARY KEY (`iddireccioncliente`) )
ENGINE = InnoDB;



-- -----------------------------------------------------
-- Table `swg`.`factcliente`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swg`.`factcliente` (
  `idfactcliente` INT NOT NULL AUTO_INCREMENT ,
  `razon` VARCHAR(45) NOT NULL ,
  `rfc` VARCHAR(45) NOT NULL ,
  `direccion` VARCHAR(45) NOT NULL ,
  `municipio` VARCHAR(45) NOT NULL ,
  `estado` VARCHAR(45) NOT NULL ,
  `status` VARCHAR(2) NOT NULL ,
  `idcliente` INT NOT NULL ,
  PRIMARY KEY (`idfactcliente`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `swg`.`tipocambio`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swg`.`tipocambio` (
  `idtipocambio` INT NOT NULL AUTO_INCREMENT ,
  `moneda` VARCHAR(45) NOT NULL ,
  `cambiopesos` DOUBLE NOT NULL ,
  `fecha` DATETIME NOT NULL ,
  `status` VARCHAR(2) NOT NULL ,
  PRIMARY KEY (`idtipocambio`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `swg`.`compra`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swg`.`compra` (
  `idcompra` INT NOT NULL AUTO_INCREMENT ,
  `fecha` DATETIME NOT NULL ,
  `cantidad` DOUBLE NOT NULL ,
  `iva` DOUBLE NOT NULL ,
  `descuento` VARCHAR(45) NULL ,
  `total` DOUBLE NOT NULL ,
  `status` VARCHAR(45) NOT NULL ,
  `idcliente` INT NOT NULL ,
  `idproductos` INT NOT NULL ,
  `idtipocambio` INT NOT NULL ,
  PRIMARY KEY (`idcompra`) )
ENGINE = InnoDB;

 
-- -----------------------------------------------------
-- Table `swg`.`cuentas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swg`.`cuentas` (
  `idcuentas` INT NOT NULL AUTO_INCREMENT ,
  `banco` VARCHAR(45) NOT NULL ,
  `nombre` VARCHAR(45) NOT NULL ,
  `cuenta` VARCHAR(45) NOT NULL ,
  `status` VARCHAR(2) NOT NULL ,
  `idempresa` INT NOT NULL ,
  PRIMARY KEY (`idcuentas`) )
ENGINE = InnoDB;

--fk

alter Table empresa
  add constraint 'fk_empresa_vista' foreign key ('idconfvista') references confvista('idconfvista'); 

alter Table empleados
  add constraint 'fk_empleados_nivel' foreign key ('idnivel') references nivel ('idnivel'),
  add constraint 'fk_empleados_empresa' foreign key ('idempresa') references empresa ('idempresa');  

alter table datosfacturacion
  add constraint 'fk_facturacion_empresa' foreign key ('idempresa') references empresa ('idempresa');

alter table productos
  add constraint 'fk_productos_proveedor' foreign key ('idproveedor') references proveedor ('idproveedor');

alter table altaproductos
  add constraint 'fk_alta_empleados' foreign key ('idempleados') references empleados ('idempleados'),
  add constraint 'fk_alta_productos' foreign key ('idproductos') references productos ('idproductos');

  alter table confvistapro
  add constraint 'fk_vistapro_productos' foreign key ('idproductos') references productos ('idproductos');

alter table direccioncliente
  add constraint 'fk_direccion_cliente' foreign key ('idcliente') references cliente ('idcliente');

alter table factcliente
  add constraint 'fk_factura_cliente' foreign key ('idcliente') references cliente ('idcliente');

alter table compra
  add constraint 'fk_compra_cliente' foreign key ('idcliente') references cliente ('idcliente'),
  add constraint 'fk_compra_productos' foreign key ('idproductos') references productos ('idproductos'),
  add constraint 'fk_compra_cambio' foreign key ('idtipocambio') references tipocambio ('idtipocambio');

alter table cuenta
  add constraint 'fk_cuentas_empresa' foreign key ('idempresa') references empresa ('idempresa');

--USE `swg` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
