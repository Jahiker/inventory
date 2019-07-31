-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 05-09-2018 a las 18:44:01
-- Versión del servidor: 5.7.21
-- Versión de PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventory`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

DROP TABLE IF EXISTS `almacen`;
CREATE TABLE IF NOT EXISTS `almacen` (
  `id_almacen` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_almacen`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`id_almacen`, `nombre`, `direccion`) VALUES
(00001, 'ALMACEN VALENCIA', 'Zona industrial Carabobo'),
(00002, 'ALMACEN LOS GUAYOS', 'Centro de Los Guayos'),
(00003, 'ALMACEN SAN DIEGO', 'Zona Industrial Castillito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `categoria` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `categoria`, `descripcion`) VALUES
(00004, 'Mesas plasticas', 'Mesas de material plastico de distintas formas y capacidades.'),
(00003, 'Sillas plasticas', 'Sillas de material plastico para multiples usos.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `rif` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `contacto` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `rif`, `direccion`, `telefono`, `contacto`) VALUES
(00002, 'Ferreteria San Diego, C.A.', 'J548691275', 'Av. Don Julio Centeno, C.C. San Diego', '0241-8325986', 'Pedro Perez'),
(00003, 'Ferreteria EPA, C.A.', 'j781124336', 'La Michelena, frente a hermanos Fridegoto', '08418327795', 'Luis Hernandez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mercancia`
--

DROP TABLE IF EXISTS `mercancia`;
CREATE TABLE IF NOT EXISTS `mercancia` (
  `id_mercancia` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `id_orden` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `id_producto` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `almacen` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_mercancia`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mercancia`
--

INSERT INTO `mercancia` (`id_mercancia`, `id_orden`, `id_producto`, `cantidad`, `nombre`, `descripcion`, `almacen`) VALUES
(00007, '00002', '00004', 2, 'Mesa plastica rectangular', 'Mesa rectangular, material plastico, color azul marino, 6 puestos', 'ALMACEN SAN DIEGO'),
(00008, '00001', '00004', 1, 'Mesa plastica rectangular', 'Mesa rectangular, material plastico, color azul marino, 6 puestos', 'ALMACEN VALENCIA'),
(00009, '00002', '00002', 1, 'Silla plastica verde', 'Silla de material plastico con apoya brazos, color verde.', 'ALMACEN SAN DIEGO'),
(00010, '00003', '00003', 1, 'Mesa plastica cuadrada', 'Mesa cuadrada, material plastico, color verde, 4 puestos.', 'ALMACEN LOS GUAYOS'),
(00011, '00003', '00001', 1, 'Mesa plastica redonda', 'Mesa redonda, material plastico, color azul marino, 4 puestos.', 'ALMACEN LOS GUAYOS'),
(00012, '00005', '00009', 2, 'Mesa plastica rectangular', 'Mesa rectangular, material plastico, color azul marino, 6 puestos', 'ALMACEN SAN DIEGO'),
(00013, '00006', '00010', 1, 'Mesa plastica rectangular', 'Mesa rectangular, material plastico, color azul marino, 6 puestos', 'ALMACEN VALENCIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

DROP TABLE IF EXISTS `orden`;
CREATE TABLE IF NOT EXISTS `orden` (
  `id_orden` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `tipo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `cliente_proveedor` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `rif` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `almacen` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `entrega` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `recibe` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `estatus` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_orden`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `orden`
--

INSERT INTO `orden` (`id_orden`, `tipo`, `fecha`, `cliente_proveedor`, `rif`, `direccion`, `almacen`, `entrega`, `recibe`, `estatus`) VALUES
(00001, 'entrada', '2018-09-03', 'Suplidora Monchi, C.A.', 'J89625744', 'Av. Bolivar de Flor Amarillo, C.C. El Alboral', 'ALMACEN VALENCIA', 'Monchi Rojas', 'Jahiker Rojas', 'En Proceso'),
(00002, 'entrada', '2018-09-03', 'Plasticos Venezuela, C.A.', 'j36659934', 'Zona Industrial Los Cortijos, Caracas', 'ALMACEN SAN DIEGO', 'Pedro Perez', 'Maria Fernanda Guevara', 'En Proceso'),
(00003, 'entrada', '2018-09-03', 'Suplidora Monchi, C.A.', 'J89625744', 'Av. Bolivar de Flor Amarillo, C.C. El Alboral', 'ALMACEN LOS GUAYOS', 'Monchi Rojas', 'Maria Fernanda Guevara', 'En Proceso'),
(00004, 'salida', '2018-09-03', 'Ferreteria San Diego, C.A.', 'J548691275', 'Av. Don Julio Centeno, C.C. San Diego', 'ALMACEN LOS GUAYOS', 'Maria Fernanda Guevara', 'Pedro Perez', 'En Proceso'),
(00005, 'salida', '2018-09-03', 'Ferreteria EPA, C.A.', 'j781124336', 'La Michelena, frente a hermanos Fridegoto', 'ALMACEN SAN DIEGO', 'Pili Rojas', 'Jose Rodriguez', 'Procesada'),
(00006, 'salida', '2018-09-03', 'Ferreteria EPA, C.A.', 'j781124336', 'La Michelena, frente a hermanos Fridegoto', 'ALMACEN VALENCIA', 'Jahiker Rojas', 'Juan Lopez', 'En Proceso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `id_producto` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `categoria` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `almacen` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `descripcion`, `categoria`, `cantidad`, `precio`, `almacen`, `imagen`) VALUES
(00001, 'Mesa plastica redonda', 'Mesa redonda, material plastico, color azul marino, 4 puestos.', 'Mesas plasticas', 0, 800, '', '250-9001-2.jpg'),
(00002, 'Silla plastica verde', 'Silla de material plastico con apoya brazos, color verde.', 'Sillas plasticas', 0, 400, '', '30727.jpg'),
(00003, 'Mesa plastica cuadrada', 'Mesa cuadrada, material plastico, color verde, 4 puestos.', 'Mesas plasticas', 0, 800, '', 'D_Q_NP_732881-MLV26891382460_022018-X.jpg'),
(00004, 'Mesa plastica rectangular', 'Mesa rectangular, material plastico, color azul marino, 6 puestos', 'Mesas plasticas', 0, 1000, '', 'mesa-plastica-lotus-azul-rimax-plasticstore-500x500.jpg'),
(00010, 'Mesa plastica rectangular', 'Mesa rectangular, material plastico, color azul marino, 6 puestos', 'Mesas plasticas', 0, 1000, 'ALMACEN VALENCIA', 'mesa-plastica-lotus-azul-rimax-plasticstore-500x500.jpg'),
(00009, 'Mesa plastica rectangular', 'Mesa rectangular, material plastico, color azul marino, 6 puestos', 'Mesas plasticas', 0, 1000, 'ALMACEN SAN DIEGO', 'mesa-plastica-lotus-azul-rimax-plasticstore-500x500.jpg'),
(00011, 'Silla plastica verde', 'Silla de material plastico con apoya brazos, color verde.', 'Sillas plasticas', 1, 400, 'ALMACEN SAN DIEGO', '30727.jpg'),
(00012, 'Mesa plastica cuadrada', 'Mesa cuadrada, material plastico, color verde, 4 puestos.', 'Mesas plasticas', 1, 800, 'ALMACEN LOS GUAYOS', 'D_Q_NP_732881-MLV26891382460_022018-X.jpg'),
(00013, 'Mesa plastica redonda', 'Mesa redonda, material plastico, color azul marino, 4 puestos.', 'Mesas plasticas', 1, 800, 'ALMACEN LOS GUAYOS', '250-9001-2.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE IF NOT EXISTS `proveedor` (
  `id_proveedor` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `rif` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `contacto` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `nombre`, `rif`, `direccion`, `telefono`, `contacto`) VALUES
(00001, 'Suplidora Monchi, C.A.', 'J89625744', 'Av. Bolivar de Flor Amarillo, C.C. El Alboral', '0241-8785469', 'Ramon Maestre'),
(00004, 'Plasticos Venezuela, C.A.', 'j36659934', 'Zona Industrial Los Cortijos, Caracas', '0212-8554712', 'Maria Rodriguez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `sexo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `usuario`, `clave`, `sexo`) VALUES
(00013, 'Jahiker Robert', 'Rojas Zuniga', 'jahiker', 'e10adc3949ba59abbe56e057f20f883e', 'masculino'),
(00014, 'Maria Fernanda', 'Guevara Araujo', 'mafer', '9d02acc8483b4ec5380e294db1f5665a', 'femenino'),
(00016, 'Pili Lili', 'Rojas Guevara', 'Pili', '52c537b3b3b6dbad849a8aac4d4802bf', 'femenino'),
(00017, 'Leidy', 'Rojas', 'Kela', '5eefc3c511dfcdf141d56678074b87a9', 'femenino');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
