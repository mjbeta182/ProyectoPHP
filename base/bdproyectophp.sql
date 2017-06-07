-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-06-2017 a las 04:12:37
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bdproyectophp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblautor`
--

CREATE TABLE IF NOT EXISTS `tblautor` (
  `idAutor` int(11) NOT NULL AUTO_INCREMENT,
  `idNacionalidad` int(11) NOT NULL,
  `nombreAutor` varchar(50) NOT NULL,
  PRIMARY KEY (`idAutor`),
  KEY `idNacionalidad` (`idNacionalidad`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tblautor`
--

INSERT INTO `tblautor` (`idAutor`, `idNacionalidad`, `nombreAutor`) VALUES
(1, 1, 'J.K Rowling'),
(2, 2, 'Claudia Lars'),
(3, 3, 'Alberto Masferer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcategoria`
--

CREATE TABLE IF NOT EXISTS `tblcategoria` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCategoria` varchar(50) NOT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tblcategoria`
--

INSERT INTO `tblcategoria` (`idCategoria`, `nombreCategoria`) VALUES
(1, 'Tecnologia'),
(2, 'Drama'),
(3, 'Lirica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldetlibroautor`
--

CREATE TABLE IF NOT EXISTS `tbldetlibroautor` (
  `idLibro` int(11) NOT NULL,
  `idAutor` int(11) NOT NULL,
  KEY `idLibro` (`idLibro`),
  KEY `idAutor` (`idAutor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbldetlibroautor`
--

INSERT INTO `tbldetlibroautor` (`idLibro`, `idAutor`) VALUES
(1, 1),
(3, 3),
(2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldetpedido`
--

CREATE TABLE IF NOT EXISTS `tbldetpedido` (
  `idPedido` int(11) NOT NULL,
  `idLibro` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` float NOT NULL,
  `eliminado` tinyint(1) NOT NULL,
  `estado` varchar(20) NOT NULL,
  KEY `idPedido` (`idPedido`),
  KEY `idLibro` (`idLibro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbleditorial`
--

CREATE TABLE IF NOT EXISTS `tbleditorial` (
  `idEditorial` int(11) NOT NULL AUTO_INCREMENT,
  `nombreEditorial` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`idEditorial`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tbleditorial`
--

INSERT INTO `tbleditorial` (`idEditorial`, `nombreEditorial`, `direccion`, `telefono`, `email`) VALUES
(1, 'Santillana', '87 Avenida Norte #311, Colonia Escalon, San Salvador', '2505-8920', 'santillana@gmail.com'),
(2, 'Oceano', 'San Salvador', '2525-6000', 'oceano@hotmail.com'),
(3, 'Edisal S.A de C.V', 'Colonia Flor Blanca Prol Cl Arce y 37 Av Nte No 206 San Salvador', '2502-4000', 'edisal@yahoo.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbllibro`
--

CREATE TABLE IF NOT EXISTS `tbllibro` (
  `idLibro` int(11) NOT NULL AUTO_INCREMENT,
  `idEditorial` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `precioCosto` float NOT NULL,
  `palabrasClave` varchar(50) NOT NULL,
  `imagen` varchar(1024) NOT NULL,
  PRIMARY KEY (`idLibro`),
  KEY `idEditorial` (`idEditorial`),
  KEY `idCategoria` (`idCategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tbllibro`
--

INSERT INTO `tbllibro` (`idLibro`, `idEditorial`, `idCategoria`, `titulo`, `stock`, `descripcion`, `precioCosto`, `palabrasClave`, `imagen`) VALUES
(1, 1, 1, 'Harry Potter y las reliquias de la muerte', 5, 'Encuentro de Harry con el señor tenebroso', 15.5, 'RELIQUIAS DE LA MUERTE', ' ../imagenes/portadas/3.jpg'),
(2, 3, 3, 'Luz Negra', 5, 'transforma la búsqueda de Dios en la búsqueda del ser humano', 2, 'LUZ', ' ../imagenes/portadas/1.jpg'),
(3, 2, 2, 'El principito', 6, 'Cuento poético que viene acompañado de ilustraciones hechas con acuarelas', 1.5, 'PRINCIPITO', ' ../imagenes/portadas/2.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblnacionalidad`
--

CREATE TABLE IF NOT EXISTS `tblnacionalidad` (
  `idNacionalidad` int(11) NOT NULL AUTO_INCREMENT,
  `nombreNacionalidad` varchar(50) NOT NULL,
  PRIMARY KEY (`idNacionalidad`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tblnacionalidad`
--

INSERT INTO `tblnacionalidad` (`idNacionalidad`, `nombreNacionalidad`) VALUES
(1, 'Europa'),
(2, 'E.E U.U'),
(3, 'Inglaterra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblpedido`
--

CREATE TABLE IF NOT EXISTS `tblpedido` (
  `idPedido` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `fechaPedido` date NOT NULL,
  `fechaEntrega` date NOT NULL,
  `horaPedido` time NOT NULL,
  `total` float NOT NULL,
  PRIMARY KEY (`idPedido`),
  KEY `idUsuario` (`idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tblpedido`
--

INSERT INTO `tblpedido` (`idPedido`, `idUsuario`, `fechaPedido`, `fechaEntrega`, `horaPedido`, `total`) VALUES
(1, 1, '2017-05-18', '2017-05-20', '05:30:00', 40.5),
(2, 3, '2017-05-19', '2017-05-21', '04:17:00', 35),
(3, 2, '2017-05-20', '2017-05-23', '02:30:00', 65.3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblpersona`
--

CREATE TABLE IF NOT EXISTS `tblpersona` (
  `idPersona` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  PRIMARY KEY (`idPersona`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `tblpersona`
--

INSERT INTO `tblpersona` (`idPersona`, `nombre`, `telefono`, `direccion`) VALUES
(1, 'Luis Guillermo Abrego', '7777-7777', 'San Salvador'),
(2, 'Maria Jose Betancourt', '7171-7171', 'San Miguel'),
(3, 'Alexis Alvarado Rojas', '7272-7272', 'Apopa City');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltipousuario`
--

CREATE TABLE IF NOT EXISTS `tbltipousuario` (
  `idTipoUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombreUsuario` varchar(30) NOT NULL,
  PRIMARY KEY (`idTipoUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tbltipousuario`
--

INSERT INTO `tbltipousuario` (`idTipoUsuario`, `nombreUsuario`) VALUES
(1, 'Administrador'),
(2, 'Empleado'),
(3, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblusuario`
--

CREATE TABLE IF NOT EXISTS `tblusuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `idTipoUsuario` int(11) NOT NULL,
  `idPersona` int(11) NOT NULL,
  `contrasena` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `idTipoUsuario` (`idTipoUsuario`),
  KEY `idPersona` (`idPersona`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `tblusuario`
--

INSERT INTO `tblusuario` (`idUsuario`, `idTipoUsuario`, `idPersona`, `contrasena`, `email`) VALUES
(1, 1, 1, 'Itca123', 'luis@hotmail.com'),
(2, 2, 2, 'gato12', 'mjbetancourt@gmail.es'),
(3, 3, 3, 'perro123', 'alexisar@hotmail.com');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tblautor`
--
ALTER TABLE `tblautor`
  ADD CONSTRAINT `tblautor_ibfk_1` FOREIGN KEY (`idNacionalidad`) REFERENCES `tblnacionalidad` (`idNacionalidad`);

--
-- Filtros para la tabla `tbldetlibroautor`
--
ALTER TABLE `tbldetlibroautor`
  ADD CONSTRAINT `tbldetlibroautor_ibfk_1` FOREIGN KEY (`idAutor`) REFERENCES `tblautor` (`idAutor`),
  ADD CONSTRAINT `tbldetlibroautor_ibfk_2` FOREIGN KEY (`idLibro`) REFERENCES `tbllibro` (`idLibro`);

--
-- Filtros para la tabla `tbldetpedido`
--
ALTER TABLE `tbldetpedido`
  ADD CONSTRAINT `tbldetpedido_ibfk_1` FOREIGN KEY (`idLibro`) REFERENCES `tbllibro` (`idLibro`),
  ADD CONSTRAINT `tbldetpedido_ibfk_2` FOREIGN KEY (`idPedido`) REFERENCES `tblpedido` (`idPedido`);

--
-- Filtros para la tabla `tbllibro`
--
ALTER TABLE `tbllibro`
  ADD CONSTRAINT `tbllibro_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `tblcategoria` (`idCategoria`),
  ADD CONSTRAINT `tbllibro_ibfk_2` FOREIGN KEY (`idEditorial`) REFERENCES `tbleditorial` (`idEditorial`);

--
-- Filtros para la tabla `tblpedido`
--
ALTER TABLE `tblpedido`
  ADD CONSTRAINT `tblpedido_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `tblusuario` (`idUsuario`);

--
-- Filtros para la tabla `tblusuario`
--
ALTER TABLE `tblusuario`
  ADD CONSTRAINT `tblusuario_ibfk_1` FOREIGN KEY (`idPersona`) REFERENCES `tblpersona` (`idPersona`),
  ADD CONSTRAINT `tblusuario_ibfk_2` FOREIGN KEY (`idTipoUsuario`) REFERENCES `tbltipousuario` (`idTipoUsuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
