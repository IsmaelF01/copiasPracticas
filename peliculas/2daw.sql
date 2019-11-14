-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2019 a las 21:33:55
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `2daw`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actores`
--

CREATE TABLE `actores` (
  `id_actor` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `edad` int(3) NOT NULL,
  `nacionalidad` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `actores`
--

INSERT INTO `actores` (`id_actor`, `nombre`, `apellidos`, `edad`, `nacionalidad`) VALUES
(1, 'Robert', 'De Niro', 76, 'estadounidense'),
(2, 'Brad', 'Pitt', 55, 'es'),
(3, 'Marlon', 'Brando', -1, 'estadounidense'),
(4, 'Leonardo', 'DiCaprio', 45, 'canadiense');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actorespeliculas`
--

CREATE TABLE `actorespeliculas` (
  `id_actor` int(11) NOT NULL,
  `id_pelicula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `actorespeliculas`
--

INSERT INTO `actorespeliculas` (`id_actor`, `id_pelicula`) VALUES
(2, 22),
(3, 1),
(4, 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `criticas`
--

CREATE TABLE `criticas` (
  `id_critica` int(11) NOT NULL,
  `id_pelicula` int(11) NOT NULL,
  `autor` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `texto` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `nota` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `criticas`
--

INSERT INTO `criticas` (`id_critica`, `id_pelicula`, `autor`, `texto`, `nota`) VALUES
(1, 1, 'Javi', 'La mejor de la histora', 5),
(3, 22, 'YO', 'Esta bien', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id_pelicula` int(11) NOT NULL,
  `titulo` varchar(120) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `genero` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `director` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecha` int(4) NOT NULL,
  `sinopsis` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `cartel` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id_pelicula`, `titulo`, `genero`, `director`, `fecha`, `sinopsis`, `cartel`) VALUES
(1, 'El Padrino', 'Drama', 'Francis Ford Coppola', 1972, 'América, años 40. Don Vito Corleone (Marlon Brando) es el respetado y temido jefe de una de las cinco familias de la mafia de Nueva York. Tiene cuatro hijos: Connie (Talia Shire), el impulsivo Sonny (James Caan), el pusilánime Fredo (John Cazale) y Michael (Al Pacino), que no quiere saber nada de los negocios de su padre. Cuando Corleone, en contra de los consejos de \'Il consigliere\' Tom Hagen (Robert Duvall), se niega a participar en el negocio de las drogas, el jefe de otra banda ordena su asesinato', 'https://i.ebayimg.com/images/g/JUAAAOxy0zhTPAT2/s-l300.jpg'),
(22, 'Erase una vez en Hollywood', 'Drama', 'Tarantino', 2019, 'Muy bonica', 'http://es.web.img2.acsta.net/r_1920_1080/pictures/19/06/13/12/35/3349389.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actores`
--
ALTER TABLE `actores`
  ADD PRIMARY KEY (`id_actor`);

--
-- Indices de la tabla `actorespeliculas`
--
ALTER TABLE `actorespeliculas`
  ADD PRIMARY KEY (`id_actor`,`id_pelicula`);

--
-- Indices de la tabla `criticas`
--
ALTER TABLE `criticas`
  ADD PRIMARY KEY (`id_critica`),
  ADD KEY `pelicula` (`id_pelicula`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id_pelicula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actores`
--
ALTER TABLE `actores`
  MODIFY `id_actor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `criticas`
--
ALTER TABLE `criticas`
  MODIFY `id_critica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id_pelicula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actorespeliculas`
--
ALTER TABLE `actorespeliculas`
  ADD CONSTRAINT `actores` FOREIGN KEY (`id_actor`) REFERENCES `actores` (`id_actor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peliculas` FOREIGN KEY (`id_pelicula`) REFERENCES `peliculas` (`id_pelicula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `criticas`
--
ALTER TABLE `criticas`
  ADD CONSTRAINT `pelicula` FOREIGN KEY (`id_pelicula`) REFERENCES `peliculas` (`id_pelicula`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
