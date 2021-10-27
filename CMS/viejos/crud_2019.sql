-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-06-2021 a las 21:49:55
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crud_2019`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE `noticia` (
  `ID_noticia` int(11) NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `contenido` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `img_noticia` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pais` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `edad` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `otro` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `nombre`, `pais`, `edad`, `otro`) VALUES
(17, 'María', '0000-00-00', '0000-00-00', 'mi prueba a ver'),
(18, 'voy probando', '0000-00-00', '0000-00-00', 'aqui estra informacion'),
(19, 'voy probando', '0000-00-00', '0000-00-00', 'aqui estra informacion'),
(20, 'Valerie', '0000-00-00', '0000-00-00', 'eres luz'),
(21, 'Jorge Prueba', '0000-00-00', '0000-00-00', 'ufff'),
(28, 'estoy probando DIOS', 'C:fakepathempresario-testimonio.png', '0000-00-00', 'CONTENIDO DE PRUEBAAAA'),
(31, 'titulo noticia FINAL', 'C:fakepathLinea 1.png', 'Por fin todo funciono perfecto, el cms va encaminado.', 'C:fakepathyoung-pretty-woman-holding-notebook-pencil-at-lips-thinking-smiling-curly-hair-pensive-happy-isolated.jpg'),
(32, 'titulo noticia FINAL prueba', 'C:fakepathLinea 2.png', '2021-06-15', 'contenido de prueba por enesima vez.'),
(33, 'Mariana Baez', '', '2021-06-15', 'sdvdgdfghrfjtgjyukj'),
(34, 'Mariana Baez', 'C:fakepathLinea 1.png', '2021-06-15', 'ffffffffffffffffffffffffffffffffffffffffffffffffffffff'),
(36, 'aveerrrrr', 'C:fakepathBANNER-OPCION.png', '2021-06-16', 'tututututututututututututuututututut'),
(37, 'uuuh cambie  el titulo', 'C:fakepath10.jpg', '2021-06-16', 'AGREGUE ESTO AQUIIII. Después de bailar y hablar un rato con Andreina y su amiga me digne a buscar un trago, en una mesa del lado izquierdo de la habitación parecía esperarme el único vaso que quedaba, que estaba lleno de un liquido rojizo. Cuando tomé el primer trago enseguida el sabor fuerte me hizo reconocer el Vodka y cuando me di la vuelta dispuesta a tomarme un segundo sorbo me detuve en seco.'),
(38, 'AGREGUE UNA NUEVA NOTICIA YUJU!', 'C:fakepathmebrete2.png', '2021-06-16', 'Caminé un poco a través del espacio teniendo cerca a Andreina que venía muy entretenida hablando con su amiga y fue entonces cuando en un claro entre la gente lo vi al otro lado de la habitación. Hablaba moviendo las manos, y esa sonrisa que ya conocía tan bien estaba presente en sus comisuras que no dejaban de moverse pronunciando palabras que no alcanzaba a escuchar. Por un instante me invadieron unas intensas ganas de saludarle, pero en seguida me abofeteo el hecho de que estuviéramos separados. De todas formas seguía mirándolo, apreciando lo bien que seguramente la estaba pasando, se le notaba, podía percibir su energía desde allí donde me encontraba parada y supuse que el sintió la mía porque aquellos ojos que me miraron juguetones desde el primer día en aquella ocasión se pasearon por mi posición y tan rápido como me apreciaron me arrebataron su atención. Casi pude escuchar el << ah, allí esta ella >>, o al menos eso quise pensar.'),
(39, '', '', '2021-06-17', ''),
(40, 'probandooo', 'C:fakepathpiel-seca-min.png', '2021-06-17', 'ajooouuuu'),
(41, 'DEDITOS CRUZADOS', 'piel-sensible-min.jpg', '2021-06-17', 'AQUI CONTENIDOOOOO'),
(42, 'TRATANDO 2', 'piel-sensible-min.jpg', '2021-06-17', 'A VEEER'),
(43, 'Mariana Baez', '', '2021-06-17', 'aaaaaaaaaaaaaa'),
(44, 'dddddd', 'C:fakepathpiel-grasa1-min.jpg', '2021-06-17', 'rrrrrrrrrrrrrrrrrrrrrrrrrr'),
(46, 'PRUEBA DE FUEGO cambieee', 'Forma-min.png', '2021-06-17', 'VEAMOOOS yo tambien cambieeee'),
(49, 'Mariana Baez', 'piel-sensible-min.jpg', '2021-06-17', 'uuuuuu nada cambio'),
(53, 'titulo de primera noticia guardada dinamicamente', 'Tienda-2-min.jpg', '2021-06-18', 'ay mi contenido es hermoso.'),
(54, 'TITULO DE PRUEBA', 'manos-test-min.png', '2021-06-18', 'contenido de prueba, honestamente me siento orgullosa de todo el esfuerzo. uff'),
(55, 'ay estamos probando por aqui', 'Banner-2-min.png', '2021-06-18', 'quizas funcione, no se ups'),
(57, 'dddddd', 'Tienda-2-min.jpg', '2021-06-18', 'fffffff'),
(58, 'tttttt', 'manos-test-min.png', '2021-06-18', 'tttttttt'),
(59, 'TITULO DE PRUEBA tambien por aca $', 'Forma-min.png', '2021-06-18', 'ddddddddddddeditando por aqui'),
(60, 'titulo aqui', 'banner-agua-micelar-min.png', '2021-06-18', 'contenido aca'),
(61, 'Mariana Baez', 'Forma-min.png', '2021-06-18', 'ddddd'),
(62, 'cambie este titulo, pa` que tu veas', 'surprised-young-girl-removes-dead-cells-and-bacteria-from-face-with-peeling-natural-sea-salt-mask-covers-mouth-with-palm-looks-aside-gets-facial-treatment-min.jpg', '18-06-2021', 'ttttttttttttttt voy a cambiarlo toodoooooooooooooooooooo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
