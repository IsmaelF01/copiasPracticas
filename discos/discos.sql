-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-12-2019 a las 19:09:02
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

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
-- Estructura de tabla para la tabla `discos`
--

CREATE TABLE `discos` (
  `id_disco` int(11) NOT NULL,
  `titulo` varchar(150) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `estilo` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `autor` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `year` int(4) NOT NULL,
  `ncanciones` int(2) NOT NULL,
  `portada` varchar(250) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `discos`
--

INSERT INTO `discos` (`id_disco`, `titulo`, `estilo`, `autor`, `year`, `ncanciones`, `portada`) VALUES
(1, 'El Milagro', 'Pop', 'Viva Suecia', 2019, 11, 'https://resources.tidal.com/images/edbdc307/a485/44f8/b332/e53de79e961e/640x640.jpg'),
(2, 'Rewind, Replay, Rebound', 'Metal', 'Volbeat', 2019, 12, 'https://m.media-amazon.com/images/I/81nUlyIdo6L._SS500_.jpg'),
(3, 'How did we get so dark?', 'Rock', 'Royal Blood', 2018, 10, 'http://jenesaispop.com/wp-content/uploads/2017/07/royalblood.jpg'),
(4, 'Help Us Stranger', 'Rock', 'The Raconteurs', 2019, 12, 'http://jenesaispop.com/wp-content/uploads/2019/07/the-raconteurs_help-us-stranger.jpg'),
(5, 'Concrete and Gold', 'Rock', 'Foo Fighters', 2017, 11, 'https://images-na.ssl-images-amazon.com/images/I/51U7lT0wSUL.jpg'),
(6, 'Amo', 'Metal', 'Bring me the horizon', 2019, 13, 'https://fanart.tv/fanart/music/074e3847-f67f-49f9-81f1-8c8cea147e8e/albumcover/amo-5c4b135bf2250.jpg'),
(7, 'The Stage', 'Metal', 'Avenged Sevenfold ', 2016, 11, 'https://images.hhv.de/catalog/shop_entry_popup_big/00508/508143.jpg'),
(8, 'Carolina Durante, por Carolina Durante', 'Pop', 'Carolina Durante', 2019, 10, 'https://e.snmc.io/i/300/w/938c5d6af4aa7a8012aa7c53e3c7a9f2/7410826'),
(9, 'Música Para El Amor y La Guerra', 'Pop', 'Los Nastys', 2019, 10, 'https://f4.bcbits.com/img/a1636594043_16.jpg'),
(10, 'Gypsy', 'Pop', 'Eilen Jewell', 2019, 12, 'https://www.dirtyrock.info/wp-content/uploads/2019/06/Eilen-Jewell-tiene-nuevo-disco-y-se-llama-Gypsy-2019.jpg'),
(11, 'La síntesis O\'konnor', 'Electro', 'El mató a un policía motorizado', 2019, 10, 'https://www.elquintobeatle.com/wp-content/uploads/2017/07/el-mato-a-un-policia-motorizado-la-sintesis-okonor-1-1068x1068.jpg'),
(12, 'Dirty Computer', 'Electro', 'Janielle Monae', 2018, 14, 'https://www.totemtanz.com/image/cache//data/Musica3/7567-86579-3-590x590.jpg'),
(13, 'Channels', 'Electro', 'Daniel Brandt', 2018, 7, 'https://assets.boomkat.com/spree/products/576113/large/4050486115527.jpg'),
(14, 'Elaenla', 'Electro', 'Floating Points', 2019, 8, 'https://muzikalia.com/wp-content/uploads/2016/10/floatingpointselaeniacover.jpg'),
(15, 'Who Else ', 'Electro', 'Modeselektor', 2019, 8, 'https://www.comolasgrecas.com/wp-content/uploads/2019/02/Modeselektor.jpg'),
(16, 'When We All Fall Asleep, Where Do We Go?', 'Mamandurrias', 'Billie Eilish', 2019, 14, 'https://images-na.ssl-images-amazon.com/images/I/61e23dfEOBL._SY355_.jpg'),
(17, 'Hollywood\'s Bleeding', 'Mamandurrias', 'Post Malone', 2019, 17, 'http://jenesaispop.com/wp-content/uploads/2019/09/hollywoods-bleeding.jpg'),
(18, 'Shawn Mendes', 'Mamandurrias', 'Shawn Mendes', 2019, 14, 'https://lastfm.freetls.fastly.net/i/u/770x0/7fc1d5f109ade40ac913ff7b3466bdc9.jpg'),
(19, 'No. 6 Collaborations Project', 'Mamandurrias', 'Ed Sheeran', 2019, 16, 'https://tangodiario.com.ar/wp-content/uploads/2019/06/ed_sheeran_no_6_collaborations_project-portada.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `discos`
--
ALTER TABLE `discos`
  ADD PRIMARY KEY (`id_disco`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `discos`
--
ALTER TABLE `discos`
  MODIFY `id_disco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
