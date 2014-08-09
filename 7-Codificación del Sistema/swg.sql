-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-08-2014 a las 06:29:38
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

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
  `empleados_idempleados` int(11) NOT NULL COMMENT 'Personal de la empresa responsable del registro efectuado en la base de datops del sistema.',
  `productos_idproductos` int(11) NOT NULL COMMENT 'Nombre del producto registrado en la base de datos.',
  PRIMARY KEY (`idaltaproductos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Número identificador único e irrepetible que se le asignará a cada cliente que se registre en la base de datos del sistema (SWG).',
  `nombre` varchar(45) NOT NULL COMMENT 'Nombre del cliente objeto de registro en la base de datos del sistema.',
  `apellido` varchar(45) NOT NULL COMMENT 'Apellidos del cliente objeto de registro en la base de datos del sistema.',
  `telefono` varchar(45) NOT NULL COMMENT 'Número telefonico de contacto del cliente registrado en la base de datos del sistema.',
  `correo` varchar(45) NOT NULL COMMENT 'Correo electrónico para notificaciones y contacto de cada cliente que se registre en la base de datos del sistema (SWG).',
  `estatus` tinyint(1) NOT NULL COMMENT 'Situación o estad oque guardara cada cliente dentro de la base de datos del sisitema.',
  `usuario_idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`idcompra`, `numeroventa`, `nombre`, `imagen`, `precio`, `cantidad`, `subtotal`) VALUES
(1, 1, 'Superman', 'superman.jpg', 600, 1, 600),
(2, 1, 'Short Dama', '583893_shortDama.jpg', 560, 1, 560),
(3, 2, 'Gorra Wilson', 'gorrawill.jpg', 249, 1, 249),
(4, 3, 'Short Dama', '583893_shortDama.jpg', 560, 1, 560),
(5, 3, 'Gorra Wilson', 'gorrawill.jpg', 249, 1, 249),
(6, 4, 'Superman', 'superman.jpg', 600, 1, 600);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `confvista`
--

CREATE TABLE IF NOT EXISTS `confvista` (
  `idconfvista` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Número identificador unico e irrepetible que se le asignará a cada configuración de la vista de cada empresa que se registre en la base de datos del sistema (SWG).',
  `nombre` varchar(45) NOT NULL COMMENT 'Diseño(s) con el nombre comercial de cada empresa registrada en la base de datos del sistema (SWG) para su personalización.',
  `slide1` varchar(200) DEFAULT NULL COMMENT 'Campo para almacenar la url de la imagenes del Slide 1',
  `slide2` varchar(200) DEFAULT NULL COMMENT 'Campo para almacenar la url de la imagenes del Slide 2',
  `slide3` varchar(200) DEFAULT NULL COMMENT 'Campo para almacenar la url de la imagenes del Slide 3',
  `estatus` tinyint(1) NOT NULL COMMENT 'Estado de cada diseño registrado en la base de datos del sistema para cada una de las empresas registradas en la base de datos puede ser activo o inactivo',
  PRIMARY KEY (`idconfvista`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `empresa_idempresa` int(11) NOT NULL COMMENT 'Nombre de la empresa a la que pertenece el registro de la cuenta en la base de datos del sistema.',
  PRIMARY KEY (`idcuentas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `cliente_idcliente` int(11) NOT NULL COMMENT 'Nombre del cliente al que pertenece el domicilio registrado.',
  PRIMARY KEY (`iddireccioncliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `empresa_idempresa` int(11) NOT NULL COMMENT 'Empresa a la que pertenece el empleado que se registra en la base de datos del sistema.',
  `usuario_idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idempleados`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`idempleados`, `nombre`, `apellido`, `telefono`, `estatus`, `empresa_idempresa`, `usuario_idusuario`) VALUES
(1, 'Armando', 'Gonzalez Moreno', '9841356860', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `idempresa` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Número identificador único e irrepetible que se le asignará a cada empresa que se registre en la base de datos del sistema (SWG).',
  `direccion` varchar(45) NOT NULL COMMENT 'Dirección fiscal y/o de ubicación de la empresa que se registre en la base de datos del sistema (SWG).',
  `correo` varchar(45) NOT NULL COMMENT 'Correo electrónico para notificaciones y contacto de cada empresa que se registre en la base de datos del sistema (SWG).',
  `confvista_idconfvista` int(11) NOT NULL COMMENT 'Llave foránea que se relaciona con la tabla confvista de la base de datos, para mostrar la configuración personalizada de las vistas de cada empresa registrada en la base de datos del sistema (SWG).',
  PRIMARY KEY (`idempresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

CREATE TABLE IF NOT EXISTS `nivel` (
  `nivel` varchar(15) NOT NULL COMMENT 'nivel de cada usuario',
  `estatus` tinyint(1) NOT NULL COMMENT 'contrala el estado de los datos',
  PRIMARY KEY (`nivel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Número identificador único e irrepetible que se le asignará a cada producto que se registre en la base de datos del sistema (SWG).',
  `nombre` varchar(25) NOT NULL COMMENT 'Nombre del producto registrado en la base de datos del sisitema.',
  `descripcion` text NOT NULL COMMENT 'Breve descripción de cada producto registrado en la base de datos del sistema.',
  `cantidad` int(11) NOT NULL COMMENT 'Número de piezas de cada producto registradas en la base de datos del sisitema.',
  `imagen` varchar(45) NOT NULL,
  `precio` double NOT NULL COMMENT 'Precio unitario de venta de cada producto registrado en la base de datos del sisitema.',
  `estatus` tinyint(1) NOT NULL COMMENT 'Estado o situación que guarda cada registro de producto en la base de datos del sistema.',
  `proveedor` int(11) NOT NULL COMMENT 'Nombre del proveedor que distribuye cada producto registrado en la base de datos del sisitema.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `cantidad`, `imagen`, `precio`, `estatus`, `proveedor`) VALUES
(1, 'Superman', 'Playera con logotipo de super', 60, 'superman.jpg', 600, 1, 1),
(2, 'Gorra Wilson', 'Gorra con logotipo marca Willson varios colores unitalla', 95, 'gorrawill.jpg', 249, 1, 2),
(4, 'Short Dama', 'Short deportivo para dama varios colores Tallas: S, M, L, XL', 0, '583893_shortDama.jpg', 560, 0, 0),
(6, 'Short Dama', 'Short deportivo para dama varios colores Tallas: S, M, L, XL', 30, '669525_short2.jpg', 300, 1, 1),
(7, 'Camiseta Ironman', 'Camiseta para ejercicio estampado de Ironman uni talla color naranja', 30, '84351_super.jpg', 280, 1, 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`idproveedor`, `nombre`, `direccion`, `telefono`, `telefono1`, `correo`, `estatus`) VALUES
(1, 'Grupo Marti S.A. de C.V.', 'Av Juarez Numero 4567 Col. Centro Mexico D.F. C.P. 08300', '5556546096', '5556789032', 'ventas@grupomarti.com', 1),
(2, 'Comercializadora de Deportes S.A. de C.V.', 'Av Tulum numero 34 Mza 5 SM 17 Cancun Q roo.', '9988456789', '9988234567', 'ventas@comercancun.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(45) NOT NULL COMMENT 'Nombres de usuario para poder ingresar al sistema.',
  `pass` varchar(45) NOT NULL COMMENT 'Contraseña de autentificación para ingreso del sistema.',
  `estatus` tinyint(1) NOT NULL COMMENT 'Estado los usuarios.',
  `nivel_nivel` varchar(15) NOT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `user`, `pass`, `estatus`, `nivel_nivel`) VALUES
(1, 'armando', '1234', 1, '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
