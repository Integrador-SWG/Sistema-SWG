-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-08-2014 a las 20:42:03
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `swg`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `altaproductos`
--

CREATE TABLE IF NOT EXISTS `altaproductos` (
  `idaltaproductos` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Número identificador unico e irrepetible que se le asignará a cada alta de producto que se registre en la base de datos del sistema (SWG).',
  `fecha` datetime NOT NULL COMMENT 'Fecha en la que se efectuo el registro dentro de la base de datos del sistema.',
  `estatus` tinyint(1) NOT NULL COMMENT 'Estado visible de las altas realizadas',
  `idempleados` int(11) NOT NULL COMMENT 'Personal de la empresa responsable del registro efectuado en la base de datops del sistema.',
  `idproductos` int(11) NOT NULL COMMENT 'Nombre del producto registrado en la base de datos.',
  PRIMARY KEY (`idaltaproductos`),
  KEY `fk_altapro_empleados` (`idempleados`),
  KEY `fk_altapro_productos` (`idproductos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Número identificador único e irrepetible que se le asignará a cada cliente que se registre en la base de datos del sistema (SWG).',
  `nombre` varchar(45) NOT NULL COMMENT 'Nombre del cliente objeto de registro en la base de datos del sistema.\n',
  `apellido` varchar(45) NOT NULL COMMENT 'Apellidos del cliente objeto de registro en la base de datos del sistema.',
  `telefono` varchar(45) NOT NULL COMMENT 'Número telefonico de contacto del cliente registrado en la base de datos del sistema.',
  `correo` varchar(45) NOT NULL COMMENT 'Correo electrónico para notificaciones y contacto de cada cliente que se registre en la base de datos del sistema (SWG).',
  `estatus` tinyint(1) NOT NULL COMMENT 'Situación o estad oque guardara cada cliente dentro de la base de datos del sisitema.',
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idcliente`),
  KEY `fk_cliente_usuario` (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE IF NOT EXISTS `compra` (
  `idcompra` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Número identificador único e irrepetible que se le asignará a cada registro de compra ingresado en la base de datos del sistema (SWG).',
  `numeroventa` int(11) NOT NULL COMMENT 'Fecha y hora en la que se realizo dicho registro en la base de datos del sistema.',
  `nombre` varchar(60) NOT NULL COMMENT 'Impuesto al valor agregado de la compra registrada.',
  `imagen` varchar(100) NOT NULL COMMENT 'Importe de la compra registrada.',
  `precio` double NOT NULL COMMENT 'Importe neto de la compra registrada despues de impuestos y descuentos.',
  `cantidad` double NOT NULL COMMENT 'Estado en el que se encuentra la compra registrada.',
  `subtotal` double NOT NULL COMMENT 'Nombre del cliente que realizo la compra.',
  PRIMARY KEY (`idcompra`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `confvista`
--

CREATE TABLE IF NOT EXISTS `confvista` (
  `idconfvista` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Número identificador unico e irrepetible que se le asignará a cada configuración de la vista de cada empresa que se registre en la base de datos del sistema (SWG).',
  `nombre` varchar(45) NOT NULL COMMENT 'Diseño(s) con el nombre comercial de cada empresa registrada en la base de datos del sistema (SWG) para su personalización.',
  `slide1` varchar(200) DEFAULT NULL COMMENT 'Campo para almacenar la url de la imagenes del Slide 1',
  `info1` varchar(50) DEFAULT NULL COMMENT 'Proporciona informacion rapida acerca de la imagen del slide1',
  `slide2` varchar(200) DEFAULT NULL COMMENT 'Campo para almacenar la url de la imagenes del Slide 2',
  `info2` varchar(50) DEFAULT NULL COMMENT 'Proporciona informacion rapida acerca de la imagen del slide2',
  `slide3` varchar(200) DEFAULT NULL COMMENT 'Campo para almacenar la url de la imagenes del Slide 3',
  `info3` varchar(50) DEFAULT NULL COMMENT 'Proporciona informacion rapida acerca de la imagen del slide 3',
  `estatus` tinyint(1) NOT NULL COMMENT 'Estado de cada diseño registrado en la base de datos del sistema para cada una de las empresas registradas en la base de datos puede ser activo o inactivo.\n\n',
  PRIMARY KEY (`idconfvista`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE IF NOT EXISTS `cuentas` (
  `idcuentas` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Número identificador unico e irrepetible que se le asignará a cada registro de las cuentas de cada empresa que se ingrese en la base de datos del sistema (SWG).',
  `banco` varchar(45) NOT NULL COMMENT 'Nombre de la institución bancaria donde aperturto la cuenta la empresa registrada en la base de datos.',
  `nombre` varchar(45) NOT NULL COMMENT 'Nombre con el que se encuentra registrada en la institución bancaria la cuenta registrada en la base de datos.',
  `cuenta` varchar(45) NOT NULL COMMENT 'Número de cuenta proporcionado por la institución financiera.',
  `estatus` tinyint(1) NOT NULL COMMENT 'Situación de la cuenta registrada dentro de la base de datos del sistema.',
  `idempresa` int(11) NOT NULL COMMENT 'Nombre de la empresa a la que pertenece el registro de la cuenta en la base de datos del sistema.',
  PRIMARY KEY (`idcuentas`),
  KEY `fk_cuentas_empresa` (`idempresa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccioncliente`
--

CREATE TABLE IF NOT EXISTS `direccioncliente` (
  `iddireccioncliente` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Número identificador único e irrepetible que se le asignará a cada dirección que se registre en la base de datos del sistema (SWG).',
  `direccion` varchar(60) NOT NULL COMMENT 'Direccion general del domiciolio del cliente.',
  `cp` varchar(45) NOT NULL COMMENT 'Codigo Postal pertenceciente al domicilio del cliente que se registre en la base de datos del sistema.',
  `estado` varchar(45) NOT NULL COMMENT 'Estado pertenceciente al domicilio del cliente que se registre en la base de datos del sistema.',
  `referencia` text COMMENT 'Rasgo identificador del domicilio del cliente a registrar en la base de datos del sistema.',
  `estatus` tinyint(1) NOT NULL COMMENT 'Estado o situación que guarda el registro del domicilio existente en la base de datos del sisitema.',
  `idcliente` int(11) NOT NULL COMMENT 'Nombre del cliente al que pertenece el domicilio registrado.',
  PRIMARY KEY (`iddireccioncliente`),
  KEY `fk_dircliente_cliente` (`idcliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE IF NOT EXISTS `empleados` (
  `idempleados` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Número identificador unico e irrepetible que se le asignará a cada empleado que se registre en la base de datos del sistema (SWG).',
  `nombre` varchar(45) NOT NULL COMMENT 'Nombre(s) del empleado que se registre en la base de datos del sistema (SWG).',
  `apellido` varchar(45) NOT NULL COMMENT 'Apellidos del empleado que se registre en la base de datos del sistema (SWG).',
  `telefono` varchar(45) NOT NULL COMMENT 'Número telefonico personal del empleado que se registre en la base de datos del sistema (SWG).',
  `estatus` tinyint(1) NOT NULL COMMENT 'Situación o estado en el que se podra encontrar el empleado para poder accesar al sistema SWG.',
  `idempresa` int(11) NOT NULL COMMENT 'Empresa a la que pertenece el empleado que se registra en la base de datos del sistema.',
  `idusuario` int(11) NOT NULL COMMENT 'identificador de usuario al que pertenece cada empleado',
  PRIMARY KEY (`idempleados`),
  KEY `fk_empleado_empresa` (`idempresa`),
  KEY `fk_empleado_usuario` (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `idempresa` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Número identificador único e irrepetible que se le asignará a cada empresa que se registre en la base de datos del sistema (SWG).',
  `direccion` varchar(45) NOT NULL COMMENT 'Dirección fiscal y/o de ubicación de la empresa que se registre en la base de datos del sistema (SWG).',
  `correo` varchar(45) NOT NULL COMMENT 'Correo electrónico para notificaciones y contacto de cada empresa que se registre en la base de datos del sistema (SWG).',
  `idconfvista` int(11) NOT NULL COMMENT 'Llave foránea que se relaciona con la tabla confvista de la base de datos, para mostrar la configuración personalizada de las vistas de cada empresa registrada en la base de datos del sistema (SWG).',
  PRIMARY KEY (`idempresa`),
  KEY `fk_empresa_confvista` (`idconfvista`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

CREATE TABLE IF NOT EXISTS `nivel` (
  `idnivel` varchar(20) NOT NULL COMMENT 'Número identificador unico e irrepetible que se le asignará a cada nivel de usuario que se registre en la base de datos del sistema (SWG).',
  `estatus` tinyint(1) NOT NULL COMMENT 'Situación que guardara el registro del nivel cread oen la base de datos.',
  PRIMARY KEY (`idnivel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `idproductos` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Número identificador único e irrepetible que se le asignará a cada producto que se registre en la base de datos del sistema (SWG).',
  `nombre` varchar(25) NOT NULL COMMENT 'Nombre del producto registrado en la base de datos del sisitema.',
  `descripcion` text NOT NULL COMMENT 'Breve descripción de cada producto registrado en la base de datos del sistema.',
  `cantidad` int(11) NOT NULL COMMENT 'Número de piezas de cada producto registradas en la base de datos del sisitema.',
  `precio` double NOT NULL COMMENT 'Precio unitario de venta de cada producto registrado en la base de datos del sisitema.',
  `imagen` varchar(200) NOT NULL COMMENT 'Almacena la url de la imagen del producto',
  `estatus` tinyint(1) NOT NULL COMMENT 'Estado o situación que guarda cada registro de producto en la base de datos del sistema.',
  `idproveedor` int(11) NOT NULL COMMENT 'Nombre del proveedor que distribuye cada producto registrado en la base de datos del sisitema.',
  PRIMARY KEY (`idproductos`),
  KEY `idproveedor` (`idproveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE IF NOT EXISTS `proveedor` (
  `idproveedor` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Número identificador unico e irrepetible que se le asignará a cada proveedor que se registre en la base de datos del sistema (SWG).',
  `nombre` varchar(45) NOT NULL COMMENT 'Nombre o razon social del proveedor que se registre en la base de datos del sistema (SWG).',
  `direccion` varchar(80) NOT NULL COMMENT 'Dirección fiscal y/o de ubicación del proveedor que se registre en la base de datos del sistema (SWG).',
  `telefono` varchar(45) NOT NULL COMMENT 'Número telefonico de contacto del proveedor que se registre en la base de datos del sistema (SWG).',
  `telefono1` varchar(45) DEFAULT NULL COMMENT 'Número telefonico opcional para contactar al proveedor que se registre en la base de datos del sistema (SWG).',
  `correo` varchar(45) NOT NULL COMMENT 'Correo electrónico para notificaciones y contacto de cada proveedor que se registre en la base de datos del sistema (SWG).',
  `estatus` tinyint(1) NOT NULL COMMENT 'Estado que guarda el registro de cada proveedor dentro de la base de datos del sistema.',
  PRIMARY KEY (`idproveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Numero identificador unico e irrepetible que se le asignara cada usuario',
  `user` varchar(45) NOT NULL COMMENT 'Nombres de usuario para poder ingresar al sistema.',
  `pass` varchar(45) NOT NULL COMMENT 'Contraseña de autentificación para ingreso del sistema.',
  `estatus` tinyint(1) NOT NULL COMMENT 'Estado los usuarios.',
  `idnivel` varchar(20) NOT NULL COMMENT 'Clave foranea del nivel que tiene cada usuario.',
  PRIMARY KEY (`idusuario`),
  KEY `fk_usuario_nivel` (`idnivel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `altaproductos`
--
ALTER TABLE `altaproductos`
  ADD CONSTRAINT `fk_altapro_empleados` FOREIGN KEY (`idempleados`) REFERENCES `empleados` (`idempleados`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_altapro_productos` FOREIGN KEY (`idproductos`) REFERENCES `productos` (`idproductos`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_cliente_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD CONSTRAINT `fk_cuentas_empresa` FOREIGN KEY (`idempresa`) REFERENCES `empresa` (`idempresa`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `direccioncliente`
--
ALTER TABLE `direccioncliente`
  ADD CONSTRAINT `fk_dircliente_cliente` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `fk_empleado_empresa` FOREIGN KEY (`idempresa`) REFERENCES `empresa` (`idempresa`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_empleado_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `fk_empresa_confvista` FOREIGN KEY (`idconfvista`) REFERENCES `confvista` (`idconfvista`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_productos_proveedor` FOREIGN KEY (`idproveedor`) REFERENCES `proveedor` (`idproveedor`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_nivel` FOREIGN KEY (`idnivel`) REFERENCES `nivel` (`idnivel`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
