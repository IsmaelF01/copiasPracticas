-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-11-2019 a las 17:25:38
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

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
  `nombre` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `edad` int(3) NOT NULL,
  `nacionalidad` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `actores`
--

INSERT INTO `actores` (`id_actor`, `nombre`, `apellidos`, `edad`, `nacionalidad`) VALUES
(1, 'Liam', 'Neeson', 67, 'británico'),
(3, 'Ralph', 'Fiennes', 56, 'británico'),
(4, 'Marlon', 'Brando', -1, 'estadounidense'),
(7, 'Al', 'Pacino', 79, 'estadounidense'),
(8, 'Robert', 'Duvall', 88, 'estadounidense'),
(11, 'Diane', 'Keaton', 73, 'estadounidense'),
(13, 'Keanu', 'Reeves', 56, 'canadiense'),
(15, 'Halle', 'Berry', 53, 'estadounidense'),
(17, 'Leonardo', 'Wilhelm DiCaprio', 45, 'estadounidense'),
(19, 'Brad', 'Pitt', 55, 'estadounidense'),
(21, 'Kurt', 'Russell', 68, 'estadounidense'),
(22, 'Sharon', 'Stone', 61, 'estadounidense'),
(23, 'Marion', 'Cotillard', 44, 'francesa'),
(24, 'Ryan', 'Gosling', 39, 'canadiense');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actores_peliculas`
--

CREATE TABLE `actores_peliculas` (
  `id_pelicula` int(11) NOT NULL,
  `id_actor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `actores_peliculas`
--

INSERT INTO `actores_peliculas` (`id_pelicula`, `id_actor`) VALUES
(1, 4),
(1, 7),
(1, 8),
(1, 11),
(24, 17),
(24, 19),
(24, 21),
(25, 17),
(26, 17),
(28, 17),
(28, 23),
(30, 19),
(31, 19),
(31, 24),
(32, 24),
(33, 24),
(34, 7),
(35, 7),
(36, 7),
(38, 7),
(40, 7),
(40, 22),
(43, 17),
(44, 4),
(44, 8),
(45, 13),
(45, 15);

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
(24, 'Érase una vez en Hollywood', 'Thriller', 'Quentin Tarantino', 2019, 'Hollywood, años 60. La estrella de un western televisivo, Rick Dalton (DiCaprio), intenta amoldarse a los cambios del medio al mismo tiempo que su doble (Pitt). La vida de Dalton está ligada completamente a Hollywood, y es vecino de la joven y prometedora actriz y modelo Sharon Tate (Robbie) que acaba de casarse con el prestigioso director Roman Polanski', 'http://es.web.img2.acsta.net/pictures/19/06/13/12/35/3349389.jpg'),
(25, 'El Renacido', 'Drama', 'Alejandro González Iñárritu', 2015, 'Año 1823. En las profundidades de la América salvaje, el explorador Hugh Glass (Leonardo DiCaprio) participa junto a su hijo mestizo Hawk en una expedición de tramperos que recolecta pieles. Glass resulta gravemente herido por el ataque de un oso y es abandonado a su suerte por un traicionero miembro de su equipo, John Fitzgerald (Tom Hardy). Con la fuerza de voluntad como su única arma, Glass deberá enfrentarse a un territorio hostil, a un invierno brutal y a la guerra constante entre las tribus de nativos americanos, en una búsqueda implacable para conseguir vengarse.', 'http://es.web.img3.acsta.net/r_640_600/b_1_d6d6d6/pictures/15/12/14/16/38/050093.jpg'),
(26, 'El lobo de Wall Street', 'Comedia', 'Martin Scorsese', 2013, 'Película basada en hechos reales del corredor de bolsa neoyorquino Jordan Belfort (Leonardo DiCaprio). A mediados de los años 80, Belfort era un joven honrado que perseguía el sueño americano, pero pronto en la agencia de valores aprendió que lo más importante no era hacer ganar a sus clientes, sino ser ambicioso y ganar una buena comisión. Su enorme éxito y fortuna le valió el mote de “El lobo de Wall Street”. Dinero. Poder. Mujeres. Drogas. Las tentaciones abundaban y el temor a la ley era irrelevante.', 'http://es.web.img3.acsta.net/pictures/210/615/21061596_20131129121836144.jpg'),
(28, 'Origen', 'Ciencia ficción', 'Christopher Nolan', 2010, 'Dom Cobb (DiCaprio) es un experto en el arte de apropiarse, durante el sueño, de los secretos del subconsciente ajeno. La extraña habilidad de Cobb le ha convertido en un hombre muy cotizado en el mundo del espionaje, pero también lo ha condenado a ser un fugitivo y, por consiguiente, a renunciar a llevar una vida normal. Su única oportunidad para cambiar de vida será hacer exactamente lo contrario de lo que ha hecho siempre: la incepción, que consiste en implantar una idea en el subconsciente en lugar de sustraerla. Sin embargo, su plan se complica debido a la intervención de alguien que parece predecir cada uno de sus movimientos, alguien a quien sólo Cobb podrá descubrir.', 'http://es.web.img3.acsta.net/r_1280_720/medias/nmedia/18/72/34/14/19215572.jpg'),
(30, 'Corazones de acero', 'Drama', 'David Ayer', 2014, 'Abril de 1945, la guerra está a punto de acabar. Al mando del veterano sargento Wardaddy (Brad Pitt), una brigada de cinco soldados americanos a bordo de un tanque -el Fury- ha de luchar contra un ejército nazi al borde de la desesperación, pues los alemanes saben que su derrota estaba ya cantada por aquel entonces.', 'http://es.web.img2.acsta.net/pictures/14/07/01/13/37/581497.jpg'),
(31, 'La gran apuesta', 'Comedia dramática', 'Adam McKay', 2015, 'Tres años antes de la crisis mundial del 2008 originada por las hipotecas subprime que hundió prácticamente el sistema financiero global, cuatro tipos fuera del sistema fueron los únicos que vislumbraron que todo el mercado hipotecario iba a quebrar. Decidieron entonces hacer algo insólito: apostar contra el mercado de la vivienda a la baja, en contra de cualquier criterio lógico en aquella época... Adaptación del libro “La gran apuesta” de Michael Lewis, que reflexiona sobre la quiebra del sector inmobiliario norteamericano que originó la crisis económica mundial en 2008.', 'http://es.web.img3.acsta.net/r_1280_720/pictures/16/01/12/13/47/413398.jpg'),
(32, 'Blade Runner 2049', 'Ciencia Ficción', 'Denis Villeneuve', 2017, 'Treinta años después de los eventos del primer film, un nuevo blade runner, K (Ryan Gosling) descubre un secreto profundamente oculto que podría acabar con el caos que impera en la sociedad. El descubrimiento de K le lleva a iniciar la búsqueda de Rick Deckard (Harrison Ford), un blade runner al que se le perdió la pista hace 30 años.', 'http://es.web.img3.acsta.net/pictures/17/08/25/11/58/463146.jpg'),
(33, 'Drive', 'Drama', 'Nicolas Winding Refn', 2011, 'Durante el día, Driver (Ryan Gosling) trabaja en un taller y es conductor especialista de cine, pero, algunas noches de forma esporádica, trabaja como chófer para delincuentes. Shannon (Brian Cranston), su jefe, que conoce bien su talento al volante, le busca directores de cine y televisión o criminales que necesiten al mejor conductor para sus fugas, llevándose la correspondiente comisión. Pero el mundo de Driver cambia el día en que conoce a Irene (Carey Mulligan), una guapa vecina que tiene un hijo pequeño y a su marido en la cárcel. ', 'http://es.web.img3.acsta.net/pictures/18/05/10/19/13/3442668.jpg'),
(34, 'El irlandés', 'Drama', 'Martin Scorsese', 2019, 'Frank Sheeran fue un veterano de la Segunda Guerra Mundial, estafador y sicario que trabajó con algunas de las figuras más destacadas del s. XX. \'El irlandés\' la crónica de uno de los grandes misterios sin resolver del país: la desaparición del legendario sindicalista Jimmy Hoffa; un gran viaje por los turbios entresijos del crimen organizado: sus mecanismos internos, rivalidades y su conexión con la política. Adaptación del libro \"I Heard You Paint Houses\", de Charles Brandt, a cargo del guionista Steven Zaillian', 'http://es.web.img3.acsta.net/pictures/19/09/16/18/04/3205974.jpg'),
(35, 'El dilema', 'Drama', 'Michael Mann', 1999, 'Jeffrey Wigand, científico y directivo de la famosa tabacalera norteamericana Brown & Williamson, descubre el secreto que la industria del tabaco oculta celosamente: las sustancias que crean adicción en los fumadores. Lowell Bergman, un productor televisivo, arriesga su carrera al invitar a su programa a Wigand, que ve cómo su vida se desmorona tras revelar la verdad a la opinión pública; pero nadie saldrá indemne de esta batalla contra las tabacaleras', 'https://www.ecartelera.com/carteles/5400/5401/001.jpg'),
(36, 'Donni Brasco', 'Drama', 'Mike Newell', 1997, 'El agente del FBI Joe Pistone debe abandonar temporalmente a su familia y hacerse pasar por un gángster: el joyero Donnie Brasco. Sin embargo, para ser aceptado por los mafiosos debe probar su lealtad y su capacidad para cometer crímenes. Su objetivo es investigar las actividades del clan de los Bonnano y, para ello, se gana la confianza de Lefty Ruggiero, un pistolero en decadencia que nunca consiguió acceder a las altas esferas del poder... Basada en una historia real.', 'http://es.web.img2.acsta.net/pictures/14/03/18/13/11/119882.jpg'),
(37, 'Donnie Darko', 'Ciencia Ficción', 'Richard Kelly', 2001, 'Donnie es un chico americano dotado de gran inteligencia e imaginación. Tras escapar milagrosamente de una muerte casi segura, comienza a sufrir alucinaciones que lo llevan a actuar como nunca hubiera imaginado y a descubrir un mundo insólito a su alrededor.', 'http://es.web.img2.acsta.net/medias/nmedia/18/68/79/41/20078179.jpg'),
(38, 'Heat', 'Acción', 'Michael Mann', 1995, 'Neil McCauley (Robert De Niro) es un experto ladrón. Su filosofía consiste en vivir sin ataduras ni vínculos que puedan constituir un obstáculo si las cosas se complican. Su banda la forman criminales profesionales tan cualificados que pueden incluso impresionar al detective Vincent Hanna (Al Pacino), un hombre que vive tan obsesionado con su trabajo que llega a poner en peligro su vida sentimental. Cuando la banda de McCauley prepara el golpe definitivo, y el equipo de Hannah se dispone a evitarlo, cada uno de ellos comprende que tiene que vérselas con la mente más brillante a la que se ha enfrentado en su carrera.', 'http://es.web.img2.acsta.net/medias/nmedia/18/81/86/79/19570836.jpg'),
(39, 'Joker', 'Dram', 'Todd Phillips', 2019, 'Arthur Fleck (Phoenix) vive en Gotham con su madre, y su única motivación en la vida es hacer reír a la gente. Actúa haciendo de payaso en pequeños trabajos, pero tiene problemas mentales que hacen que la gente le vea como un bicho raro. Su gran sueño es actuar como cómico delante del público, pero una serie de trágicos acontecimientos le hará ir incrementando su ira contra una sociedad que le ignora.', 'http://es.web.img2.acsta.net/r_1280_720/pictures/19/09/17/17/03/5442885.jpg'),
(40, 'Casino', 'Drama mafia', 'Martin Scorsese', 1995, 'Las Vegas, 1973. Sam \"Ace\" Rothstein, un profesional de las apuestas, es el eficaz director de un importante casino que pertenece a un grupo de mafiosos. Su misión es controlar el funcionamiento del negocio y garantizar que la corriente de dinero que va a parar a manos de sus jefes siga fluyendo. Las Vegas es un lugar ideal para millonarios y políticos, pero es también lugar de paso de tahúres, prestamistas, traficantes de drogas y matones. Un día el violento Nicky Santoro, al que sus jefes han encargado que cuide de Sam, llega a Las Vegas con la intención de quedarse.', 'http://es.web.img3.acsta.net/r_1280_720/medias/nmedia/18/68/08/92/20139890.jpg'),
(41, 'Una historia del Bronx', 'Drama mafia', 'Robert De Niro', 1993, 'Años 60. El gángster Sonny (Chazz Palminteri) es el rey del barrio del Bronx, donde vive el pequeño Calogero. Un tiroteo, presenciado por el niño, es el punto de partida de una duradera relación entre el gángster y el pequeño. Lorenzo Anello (De Niro), padre del chico y un honrado conductor de autobuses, desaprueba esta relación. A pesar de ello, el muchacho crece bajo la protección de los dos hombres, dividido entre su honradez natural y su fascinación por Sonny. Sin embargo, llegará un momento en el que Calogero (Lillo Brancato) no tendrá más remedio que tomar una decisión sobre el camino que debe seguir.', 'http://es.web.img3.acsta.net/r_1280_720/medias/nmedia/18/68/09/19/20373248.jpg'),
(42, 'Uno de los nuestros (Goodfellas)', 'Drama mafia', 'Martin Scorsese', 1990, 'Henry Hill, hijo de padre irlandés y madre siciliana, vive en Brooklyn y se siente fascinado por la vida que llevan los gángsters de su barrio, donde la mayoría de los vecinos son inmigrantes. Paul Cicero, el patriarca de la familia Pauline, es el protector del barrio. A los trece años, Henry decide abandonar la escuela y entrar a formar parte de la organización mafiosa como chico de los recados; muy pronto se gana la confianza de sus jefes, gracias a lo cual irá subiendo de categoría.', 'http://es.web.img2.acsta.net/medias/nmedia/18/67/70/14/20077949.jpg'),
(43, 'Revolutionary Road', 'Drama', 'Sam Mendes', 2008, 'Años 50. Frank (Leonardo DiCaprio) y April (Kate Winslet) se conocen en una fiesta y se enamoran. Ella quiere ser actriz. Él sueña con viajar para huir de la rutina y experimentar emociones nuevas. Con el tiempo se convierten en un estable matrimonio con dos hijos que vive en las afueras de Connecticut, pero no son felices. Ambos se enfrentan a un difícil dilema: o luchar por los sueños e ideales que siempre han perseguido o conformarse con su gris y mediocre vida cotidiana.', 'http://es.web.img3.acsta.net/r_1280_720/medias/nmedia/18/67/58/87/19024335.jpg'),
(44, 'Apocalypse Now', 'Acción', 'Francis Ford Coppola', 1979, 'Durante la guerra de Vietnam, al joven Capitán Willard, un oficial de los servicios de inteligencia del ejército estadounidense, se le ha encomendado entrar en Camboya con la peligrosa misión de eliminar a Kurtz, un coronel renegado que se ha vuelto loco. El capitán deberá ir navegar por el río hasta el corazón de la selva, donde parece ser que Kurtz reina como un buda despótico sobre los miembros de la tribu Montagnard, que le adoran como a un dios.', 'http://es.web.img3.acsta.net/r_1280_720/medias/nmedia/18/70/36/43/20181663.jpg'),
(45, 'John Wick 3', 'Acción', 'Chad Stahelski', 2019, 'John Wick (Keanu Reeves) regresa a la acción, solo que esta vez con una recompensa de 14 millones de dólares sobre su cabeza y con un ejército de mercenarios intentando darle caza. Tras asesinar a uno de los miembros del gremio de asesinos al que pertenecía, Wick es expulsado de la organización, pasando a convertirse en el centro de atención de multitud de asesinos a sueldo que esperan detrás de cada esquina para tratar de deshacerse de él.', 'https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/john-wick-3-1555403175.jpg?crop=1xw:1xh;center,top&resize=320:*');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellidos`, `email`, `password`) VALUES
(3, 'Javier', 'Guillen', 'jjavierguillen@gmail.com', '58c3193f9f7ebd2516ed270dc4c7fbd6'),
(4, 'Manolo', 'Cabezabolo', 'manolo@gmail.com', '12cdb9b24211557ef1802bf5a875fd2c'),
(6, 'Andrey', 'Kratchenko', 'andrey@gmail.com', '58c3193f9f7ebd2516ed270dc4c7fbd6');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actores`
--
ALTER TABLE `actores`
  ADD PRIMARY KEY (`id_actor`);

--
-- Indices de la tabla `actores_peliculas`
--
ALTER TABLE `actores_peliculas`
  ADD PRIMARY KEY (`id_pelicula`,`id_actor`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id_pelicula`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email_login` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actores`
--
ALTER TABLE `actores`
  MODIFY `id_actor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id_pelicula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actores_peliculas`
--
ALTER TABLE `actores_peliculas`
  ADD CONSTRAINT `actor` FOREIGN KEY (`id_actor`) REFERENCES `actores` (`id_actor`),
  ADD CONSTRAINT `pelicula` FOREIGN KEY (`id_pelicula`) REFERENCES `peliculas` (`id_pelicula`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
