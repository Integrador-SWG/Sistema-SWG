SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `swg` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `swg` ;

-- -----------------------------------------------------
-- Table `swg`.`confvista`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swg`.`confvista` (
  `idconfvista` INT NOT NULL AUTO_INCREMENT COMMENT 'Número identificador unico e irrepetible que se le asignará a cada configuración de la vista de cada empresa que se registre en la base de datos del sistema (SWG).' ,
  `nombre` VARCHAR(45) NOT NULL COMMENT 'Diseño(s) con el nombre comercial de cada empresa registrada en la base de datos del sistema (SWG) para su personalización.' ,
  `slide1` VARCHAR(200) NULL COMMENT 'Campo para almacenar la url de la imagenes del Slide 1' ,
  `info1` VARCHAR(50) NULL COMMENT 'Proporciona informacion rapida acerca de la imagen del slide1' ,
  `slide2` VARCHAR(200) NULL COMMENT 'Campo para almacenar la url de la imagenes del Slide 2' ,
  `info2` VARCHAR(50) NULL COMMENT 'Proporciona informacion rapida acerca de la imagen del slide2' ,
  `slide3` VARCHAR(200) NULL COMMENT 'Campo para almacenar la url de la imagenes del Slide 3' ,
  `info3` VARCHAR(50) NULL COMMENT 'Proporciona informacion rapida acerca de la imagen del slide 3' ,
  `estatus` TINYINT(1) NOT NULL COMMENT 'Estado de cada diseño registrado en la base de datos del sistema para cada una de las empresas registradas en la base de datos puede ser activo o inactivo.\n\n' ,
  PRIMARY KEY (`idconfvista`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `swg`.`empresa`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swg`.`empresa` (
  `idempresa` INT NOT NULL AUTO_INCREMENT COMMENT 'Número identificador único e irrepetible que se le asignará a cada empresa que se registre en la base de datos del sistema (SWG).' ,
  `direccion` VARCHAR(45) NOT NULL COMMENT 'Dirección fiscal y/o de ubicación de la empresa que se registre en la base de datos del sistema (SWG).' ,
  `correo` VARCHAR(45) NOT NULL COMMENT 'Correo electrónico para notificaciones y contacto de cada empresa que se registre en la base de datos del sistema (SWG).' ,
  `idconfvista` INT NOT NULL COMMENT 'Llave foránea que se relaciona con la tabla confvista de la base de datos, para mostrar la configuración personalizada de las vistas de cada empresa registrada en la base de datos del sistema (SWG).' ,
  PRIMARY KEY (`idempresa`) )
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `swg`.`nivel`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swg`.`nivel` (
  `idnivel` INT NOT NULL AUTO_INCREMENT COMMENT 'Número identificador unico e irrepetible que se le asignará a cada nivel de usuario que se registre en la base de datos del sistema (SWG).' ,
  `nombre` VARCHAR(45) NOT NULL COMMENT 'Nombre breve que describa el nivel de acceso con el que se contara en la base de datos para ser asignado a los usuarios del sistema.' ,
  `estatus` TINYINT(1) NOT NULL COMMENT 'Situación que guardara el registro del nivel cread oen la base de datos.' ,
  PRIMARY KEY (`idnivel`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `swg`.`usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swg`.`usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT COMMENT 'Numero identificador unico e irrepetible que se le asignara cada usuario',
  `user` VARCHAR(45) NOT NULL COMMENT 'Nombres de usuario para poder ingresar al sistema.' ,
  `pass` VARCHAR(45) NOT NULL COMMENT 'Contraseña de autentificación para ingreso del sistema.' ,
  `estatus` TINYINT(1) NOT NULL COMMENT 'Estado los usuarios.' ,
  `idnivel` INT NOT NULL COMMENT 'Clave foranea del nivel que tiene cada usuario.' ,
  PRIMARY KEY (`idusuario`) )
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `swg`.`empleados`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swg`.`empleados` (
  `idempleados` INT NOT NULL AUTO_INCREMENT COMMENT 'Número identificador unico e irrepetible que se le asignará a cada empleado que se registre en la base de datos del sistema (SWG).' ,
  `nombre` VARCHAR(45) NOT NULL COMMENT 'Nombre(s) del empleado que se registre en la base de datos del sistema (SWG).' ,
  `apellido` VARCHAR(45) NOT NULL COMMENT 'Apellidos del empleado que se registre en la base de datos del sistema (SWG).' ,
  `telefono` VARCHAR(45) NOT NULL COMMENT 'Número telefonico personal del empleado que se registre en la base de datos del sistema (SWG).' ,
  `estatus` TINYINT(1) NOT NULL COMMENT 'Situación o estado en el que se podra encontrar el empleado para poder accesar al sistema SWG.' ,
  `idempresa` INT NOT NULL COMMENT 'Empresa a la que pertenece el empleado que se registra en la base de datos del sistema.' ,
  `idusuario` INT NOT NULL COMMENT 'identificador de usuario al que pertenece cada empleado',
  PRIMARY KEY (`idempleados`) )
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `swg`.`datosfacturacion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swg`.`datosfacturacion` (
  `iddatosfacturacion` INT NOT NULL AUTO_INCREMENT COMMENT 'Número identificador unico e irrepetible que se le asignará a cada registro de datos fiscales de cada empresa que se ingrese en la base de datos del sistema (SWG).' ,
  `razon` VARCHAR(45) NOT NULL COMMENT 'Nombre o razón social con la que se encuentras registrada ante la Secretaria de Hacienda y Credito Publico cada empresa que se registre en la base de datos del sistema.' ,
  `rfc` VARCHAR(45) NOT NULL COMMENT 'Registro Federal de Contribullentes asignado por la SHCP a cada empresa que se registre en la base de datos del sistema.' ,
  `direccion` VARCHAR(45) NOT NULL COMMENT 'Domicilio fiscal registrado ante la SHCP de cada empresa que se agrege a la base de datos del sistema.' ,
  `cp` VARCHAR(45) NOT NULL COMMENT 'Codigo Postal de la ubicación de la empresa registrada en la base de datos del sistema.' ,
  `municipio` VARCHAR(45) NOT NULL COMMENT 'Municipo al que pertenece el domicilo fiscal registrado de cada emprtesa en la base de datos del sistema.' ,
  `estado` VARCHAR(45) NOT NULL COMMENT 'Estado al que pertenece el domicilo fiscal registrado de cada emprtesa en la base de datos del sistema.' ,
  `estatus` TINYINT(1) NOT NULL COMMENT 'Estado que guarda el registro de cada empresa dentro de la base de datos del sistema.' ,
  `idempresa` INT NOT NULL COMMENT 'Nombre de la empresa a la que pertenece el domicilio fiscal registrado en la base de datos del sistema.' ,
  PRIMARY KEY (`iddatosfacturacion`) )
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `swg`.`proveedor`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swg`.`proveedor` (
  `idproveedor` INT NOT NULL AUTO_INCREMENT COMMENT 'Número identificador unico e irrepetible que se le asignará a cada proveedor que se registre en la base de datos del sistema (SWG).' ,
  `nombre` VARCHAR(45) NOT NULL COMMENT 'Nombre o razon social del proveedor que se registre en la base de datos del sistema (SWG).' ,
  `direccion` VARCHAR(80) NOT NULL COMMENT 'Dirección fiscal y/o de ubicación del proveedor que se registre en la base de datos del sistema (SWG).' ,
  `telefono` VARCHAR(45) NOT NULL COMMENT 'Número telefonico de contacto del proveedor que se registre en la base de datos del sistema (SWG).' ,
  `telefono1` VARCHAR(45) NULL COMMENT 'Número telefonico opcional para contactar al proveedor que se registre en la base de datos del sistema (SWG).' ,
  `correo` VARCHAR(45) NOT NULL COMMENT 'Correo electrónico para notificaciones y contacto de cada proveedor que se registre en la base de datos del sistema (SWG).' ,
  `estatus` TINYINT(1) NOT NULL COMMENT 'Estado que guarda el registro de cada proveedor dentro de la base de datos del sistema.' ,
  PRIMARY KEY (`idproveedor`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `swg`.`productos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swg`.`productos` (
  `idproductos` INT NOT NULL AUTO_INCREMENT COMMENT 'Número identificador único e irrepetible que se le asignará a cada producto que se registre en la base de datos del sistema (SWG).' ,
  `nombre` VARCHAR(25) NOT NULL COMMENT 'Nombre del producto registrado en la base de datos del sisitema.' ,
  `resumen` VARCHAR(50) NOT NULL COMMENT 'Nombre corto o comercial con el que se identifica a cada producto registrado en la base de datos del sisitema.' ,
  `descripcion` TEXT NOT NULL COMMENT 'Breve descripción de cada producto registrado en la base de datos del sistema.' ,
  `cantidad` INT NOT NULL COMMENT 'Número de piezas de cada producto registradas en la base de datos del sisitema.' ,
  `precio` DOUBLE NOT NULL COMMENT 'Precio unitario de venta de cada producto registrado en la base de datos del sisitema.' ,
  `estatus` TINYINT(1) NOT NULL COMMENT 'Estado o situación que guarda cada registro de producto en la base de datos del sistema.' ,
  `idproveedor` INT NOT NULL COMMENT 'Nombre del proveedor que distribuye cada producto registrado en la base de datos del sisitema.' ,
  PRIMARY KEY (`idproductos`) )
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `swg`.`altaproductos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swg`.`altaproductos` (
  `idaltaproductos` INT NOT NULL AUTO_INCREMENT COMMENT 'Número identificador unico e irrepetible que se le asignará a cada alta de producto que se registre en la base de datos del sistema (SWG).' ,
  `fecha` DATETIME NOT NULL COMMENT 'Fecha en la que se efectuo el registro dentro de la base de datos del sistema.' ,
  `estatus` TINYINT(1) NOT NULL COMMENT 'Estado visible de las altas realizadas' ,
  `idempleados` INT NOT NULL COMMENT 'Personal de la empresa responsable del registro efectuado en la base de datops del sistema.' ,
  `idproductos` INT NOT NULL COMMENT 'Nombre del producto registrado en la base de datos.' ,
  PRIMARY KEY (`idaltaproductos`) )
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `swg`.`confvistapro`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swg`.`confvistapro` (
  `idconfvistapro` INT NOT NULL AUTO_INCREMENT COMMENT 'Número identificador unico e irrepetible que se le asignará a cada configuración de la vista o imagen de un producto que se registre en la base de datos del sistema (SWG).' ,
  `rutaimagen` VARCHAR(200) NOT NULL COMMENT 'Ruta especificada dentro del servidor donde se encuentra alojada la imagen del producto a configurar en el sistema.' ,
  `estatus` TINYINT(1) NOT NULL COMMENT 'Estad oque guarda la imagen del producto registrada en la base de datos del sisitema.' ,
  `idproductos` INT NOT NULL COMMENT 'Nombre del producto al que hace referencia la imagen registrada en la base de datos del sisitema.' ,
  PRIMARY KEY (`idconfvistapro`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `swg`.`cliente`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swg`.`cliente` (
  `idcliente` INT NOT NULL AUTO_INCREMENT COMMENT 'Número identificador único e irrepetible que se le asignará a cada cliente que se registre en la base de datos del sistema (SWG).' ,
  `nombre` VARCHAR(45) NOT NULL COMMENT 'Nombre del cliente objeto de registro en la base de datos del sistema.\n' ,
  `apellido` VARCHAR(45) NOT NULL COMMENT 'Apellidos del cliente objeto de registro en la base de datos del sistema.' ,
  `telefono` VARCHAR(45) NOT NULL COMMENT 'Número telefonico de contacto del cliente registrado en la base de datos del sistema.' ,
  `correo` VARCHAR(45) NOT NULL COMMENT 'Correo electrónico para notificaciones y contacto de cada cliente que se registre en la base de datos del sistema (SWG).' ,
  `estatus` TINYINT(1) NOT NULL COMMENT 'Situación o estad oque guardara cada cliente dentro de la base de datos del sisitema.' ,
  `idusuario` INT NOT NULL ,
  PRIMARY KEY (`idcliente`) )
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `swg`.`direccioncliente`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swg`.`direccioncliente` (
  `iddireccioncliente` INT NOT NULL AUTO_INCREMENT COMMENT 'Número identificador único e irrepetible que se le asignará a cada dirección que se registre en la base de datos del sistema (SWG).' ,
  `direccion` VARCHAR(60) NOT NULL COMMENT 'Direccion general del domiciolio del cliente.' ,
  `cp` VARCHAR(45) NOT NULL COMMENT 'Codigo Postal pertenceciente al domicilio del cliente que se registre en la base de datos del sistema.' ,
  `estado` VARCHAR(45) NOT NULL COMMENT 'Estado pertenceciente al domicilio del cliente que se registre en la base de datos del sistema.' ,
  `referencia` TEXT NULL COMMENT 'Rasgo identificador del domicilio del cliente a registrar en la base de datos del sistema.' ,
  `estatus` TINYINT(1) NOT NULL COMMENT 'Estado o situación que guarda el registro del domicilio existente en la base de datos del sisitema.' ,
  `idcliente` INT NOT NULL COMMENT 'Nombre del cliente al que pertenece el domicilio registrado.' ,
  PRIMARY KEY (`iddireccioncliente`) )
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `swg`.`factcliente`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swg`.`factcliente` (
  `idfactcliente` INT NOT NULL AUTO_INCREMENT COMMENT 'Número identificador único e irrepetible que se le asignará a cada factura emitida y registrada en la base de datos del sistema (SWG).' ,
  `razon` VARCHAR(45) NOT NULL COMMENT 'Nómbre fiscal que se le asignará a la factura registradaen la base de datos del sistema.' ,
  `rfc` VARCHAR(45) NOT NULL COMMENT 'Registro Federal de Contribullentes asignado por la SHCP a cada cliente que se registre en la base de datos del sistema.' ,
  `direccion` VARCHAR(45) NOT NULL COMMENT 'Domicilio fiscal registrado ante la SHCP de cada cliente que se agrege a la base de datos del sistema.' ,
  `municipio` VARCHAR(45) NOT NULL COMMENT 'Municipo al que pertenece el domicilo fiscal registrado de cada cliente en la base de datos del sistema.' ,
  `estado` VARCHAR(45) NOT NULL COMMENT 'Estado al que pertenece el domicilo fiscal registrado de cada cliente en la base de datos del sistema.' ,
  `status` TINYINT(1) NOT NULL COMMENT 'Estado que guarda el registro de cada factura de un cliente dentro de la base de datos del sistema.' ,
  `idcliente` INT NOT NULL COMMENT 'Nombre no necesariamente fiscal de cada cliente al que le pertenece la factura registradaen la base de datos del sisitema.' ,
  PRIMARY KEY (`idfactcliente`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `swg`.`compra`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swg`.`compra` (
  `idcompra` INT NOT NULL AUTO_INCREMENT COMMENT 'Número identificador único e irrepetible que se le asignará a cada registro de compra ingresado en la base de datos del sistema (SWG).' ,
  `fecha` DATETIME NOT NULL COMMENT 'Fecha y hora en la que se realizo dicho registro en la base de datos del sistema.' ,
  `cantidad` DOUBLE NOT NULL COMMENT 'Importe de la compra registrada.' ,
  `iva` DOUBLE NOT NULL COMMENT 'Impuesto al valor agregado de la compra registrada.' ,
  `total` DOUBLE NOT NULL COMMENT 'Importe neto de la compra registrada despues de impuestos y descuentos.' ,
  `estatus` TINYINT(1) NOT NULL COMMENT 'Estado en el que se encuentra la compra registrada.' ,
  `idcliente` INT NOT NULL COMMENT 'Nombre del cliente que realizo la compra.' ,
  `idproductos` INT NOT NULL COMMENT 'Nombre del o los productos objeto de la compra.' ,
  PRIMARY KEY (`idcompra`) )
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `swg`.`cuentas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `swg`.`cuentas` (
  `idcuentas` INT NOT NULL AUTO_INCREMENT COMMENT 'Número identificador unico e irrepetible que se le asignará a cada registro de las cuentas de cada empresa que se ingrese en la base de datos del sistema (SWG).' ,
  `banco` VARCHAR(45) NOT NULL COMMENT 'Nombre de la institución bancaria donde aperturto la cuenta la empresa registrada en la base de datos.' ,
  `nombre` VARCHAR(45) NOT NULL COMMENT 'Nombre con el que se encuentra registrada en la institución bancaria la cuenta registrada en la base de datos.' ,
  `cuenta` VARCHAR(45) NOT NULL COMMENT 'Número de cuenta proporcionado por la institución financiera.' ,
  `estatus` TINYINT(1) NOT NULL COMMENT 'Situación de la cuenta registrada dentro de la base de datos del sistema.' ,
  `idempresa` INT NOT NULL COMMENT 'Nombre de la empresa a la que pertenece el registro de la cuenta en la base de datos del sistema.' ,
  PRIMARY KEY (`idcuentas`) )
ENGINE = InnoDB;

-- ----------------------------------------------------
-- llaves foraneas
-- ----------------------------------------------------
alter table empresa
  add constraint fk_empresa_confvista foreign key (idconfvista) references confvista (idconfvista) 
  ON UPDATE CASCADE;

alter table usuario
  add constraint fk_usuario_nivel foreign key (idnivel) references idnivel (idnivel)
  ON UPDATE CASCADE;

alter table empleados
  add constraint fk_empleado_empresa foreign key (idempresa) references empresa (idempresa)
  ON UPDATE CASCADE,
  add constraint fk_empleado_usuario foreign key (idusuario) references usuario (idusuario)
  ON UPDATE CASCADE;

alter table datosfacturacion
  add constraint fk_datos_empresa foreign key (idempresa) references empresa (idempresa)
  ON UPDATE CASCADE;

alter table productos
 add constraint fk_productos_proveedor foreign key (idproveedor) references proveedor (idproveedor)
 ON UPDATE CASCADE;

alter table altaproductos
  add constraint fk_altapro_empleados foreign key (idempleados) references empleados (idempleados)
  ON UPDATE CASCADE,
  add constraint fk_altapro_productos foreign key (idproductos) references productos (idproductos)
  ON UPDATE CASCADE;

alter table confvistapro
 add constraint fk_confvista_productos foreign key (idproductos) references productos (idproductos)
 ON UPDATE CASCADE;

alter table cliente
  add constraint fk_cliente_usuario foreign key (idusuario) references usuario (idusuario)
  ON UPDATE CASCADE;

alter table direccioncliente
  add constraint fk_dircliente_cliente foreign key (idcliente) references cliente (idcliente)
  ON UPDATE CASCADE;

alter table factcliente
  add constraint fk_facliente_cliente foreign key (idcliente) references cliente (idcliente)
  ON UPDATE CASCADE;

alter table compra
  add constraint fk_compra_cliente foreign key (idcliente) references cliente (idcliente)
  ON UPDATE CASCADE,
  add constraint fk_compra_productos foreign key (idproductos) references productos (idproductos)
  ON UPDATE CASCADE;

alter table cuentas
  add constraint fk_cuentas_empresa foreign key (idempresa) references empresa (idempresa)
  ON UPDATE CASCADE;

USE `swg` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
