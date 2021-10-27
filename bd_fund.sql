-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-06-2021 a las 21:11:23
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
-- Base de datos: `bd_fund`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL,
  `nombre_cur` varchar(255) NOT NULL,
  `descrip_cur` text NOT NULL,
  `inicio_cur` date NOT NULL,
  `duracion_cur` varchar(255) NOT NULL,
  `horario_cur` varchar(255) NOT NULL,
  `img_cur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id_curso`, `nombre_cur`, `descrip_cur`, `inicio_cur`, `duracion_cur`, `horario_cur`, `img_cur`) VALUES
(1, 'Curso de Canto', 'Aquella noche andaba con Andreina y una chica que recién conocía, nos dirigíamos a una fiesta y aunque ese fuera el plan yo andaba vestida como siempre, tenía el cabello ondulado suelto un poco desordenado, unos yeans oscuros y una camisa con un escote redondo muy bonito.', '2021-07-02', '5-6 meses', '4:20 hasta 8:20', 'banner-karaoke.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

CREATE TABLE `galeria` (
  `id_galeria` int(11) NOT NULL,
  `img_gal` varchar(255) NOT NULL,
  `tit_img_gal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `galeria`
--

INSERT INTO `galeria` (`id_galeria`, `img_gal`, `tit_img_gal`) VALUES
(2, 'foto-3.jpg', 'Logo'),
(3, 'foto-9.jpg', 'segunda imagen de galeria'),
(4, 'foto-6.jpg', 'tercera imagen'),
(5, 'foto-11.jpg', 'cuarta imagen'),
(6, 'foto-13.jpg', 'quinta imagen'),
(7, 'foto-12.jpg', 'sexta imagen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE `noticia` (
  `id_noticia` int(11) NOT NULL,
  `titulo_not` varchar(255) NOT NULL,
  `contenido_not` text NOT NULL,
  `fecha_not` varchar(50) NOT NULL,
  `img_not` varchar(255) NOT NULL,
  `descrip_not` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `noticia`
--

INSERT INTO `noticia` (`id_noticia`, `titulo_not`, `contenido_not`, `fecha_not`, `img_not`, `descrip_not`) VALUES
(1, 'Mi primera noticia Editada', 'Aquella noche andaba con Andreina y una chica que recién conocía, nos dirigíamos a una fiesta y aunque ese fuera el plan yo andaba vestida como siempre, tenía el cabello ondulado suelto un poco desordenado, unos yeans oscuros y una camisa con un escote redondo muy bonito. Al entrar en aquella casa de paredes blancas, techo alto y luz tenue en seguida me envolvió el ambiente, podía escuchar la música ligándose con las voces de los grupos que parloteaban, algunos reían, otros pocos bailaban y muchos solo escuchaban mientras bebían. \nCaminé un poco a través del espacio teniendo cerca a Andreina que venía muy entretenida hablando con su amiga y fue entonces cuando en un claro entre la gente lo vi al otro lado de la habitación. Hablaba moviendo las manos, y esa sonrisa que ya conocía tan bien estaba presente en sus comisuras que no dejaban de moverse pronunciando palabras que no alcanzaba a escuchar. Por un instante me invadieron unas intensas ganas de saludarle, pero en seguida me abofeteo el hecho de que estuviéramos separados. De todas formas, seguía mirándolo, apreciando lo bien que seguramente la estaba pasando, se le notaba, podía percibir su energía desde allí donde me encontraba parada y supuse que el sintió la mía porque aquellos ojos que me miraron juguetones desde el primer día en aquella ocasión se pasearon por mi posición y tan rápido como me apreciaron me arrebataron su atención. Casi pude escuchar el << ah, allí esta ella >>, o al menos eso quise pensar.', '29-06-2021', 'foto-9.jpg', 'Aquí se encuentra la pequeña descripción de esta noticia, espero sea mas que suficiente.'),
(2, 'Mi segunda noticia', 'Aquella noche andaba con Andreina y una chica que recién conocía, nos dirigíamos a una fiesta y aunque ese fuera el plan yo andaba vestida como siempre, tenía el cabello ondulado suelto un poco desordenado, unos yeans oscuros y una camisa con un escote redondo muy bonito. Al entrar en aquella casa de paredes blancas, techo alto y luz tenue en seguida me envolvió el ambiente, podía escuchar la música ligándose con las voces de los grupos que parloteaban, algunos reían, otros pocos bailaban y muchos solo escuchaban mientras bebían. \nCaminé un poco a través del espacio teniendo cerca a Andreina que venía muy entretenida hablando con su amiga y fue entonces cuando en un claro entre la gente lo vi al otro lado de la habitación. Hablaba moviendo las manos, y esa sonrisa que ya conocía tan bien estaba presente en sus comisuras que no dejaban de moverse pronunciando palabras que no alcanzaba a escuchar. Por un instante me invadieron unas intensas ganas de saludarle, pero en seguida me abofeteo el hecho de que estuviéramos separados. De todas formas, seguía mirándolo, apreciando lo bien que seguramente la estaba pasando, se le notaba, podía percibir su energía desde allí donde me encontraba parada y supuse que el sintió la mía porque aquellos ojos que me miraron juguetones desde el primer día en aquella ocasión se pasearon por mi posición y tan rápido como me apreciaron me arrebataron su atención. Casi pude escuchar el << ah, allí esta ella >>, o al menos eso quise pensar.', '29-06-2021', 'logo gobierno de caracas.png', 'Aquí esta la otra descripción de la otra noticia, también debería observarse.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slider`
--

CREATE TABLE `slider` (
  `id_slider` int(11) NOT NULL,
  `img_sld` varchar(255) NOT NULL,
  `titulo_sld` varchar(255) NOT NULL,
  `descrip_sld` varchar(255) NOT NULL,
  `enlace_sld` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `slider`
--

INSERT INTO `slider` (`id_slider`, `img_sld`, `titulo_sld`, `descrip_sld`, `enlace_sld`) VALUES
(1, 'foto-6.jpg', 'Mi primer Slider', 'Descripción del primer slider', 'https://goo.gl/maps/xEq8YFx4wzqwppjY9'),
(2, 'foto-10.jpg', 'Mi segundo Slider', 'Descripción de mi segundo slider', 'http://localhost/PaginaFundacion-cms/index.php?action=servicios'),
(3, 'foto-8.jpg', 'Mi tercer Slider', 'Descripción de mi tercer slider.', 'http://localhost/PaginaFundacion-cms/index.php?action=noticias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taller`
--

CREATE TABLE `taller` (
  `id_taller` int(11) NOT NULL,
  `nombre_tal` varchar(255) NOT NULL,
  `descrip_tal` text NOT NULL,
  `inicio_tal` date NOT NULL,
  `duracion_tal` varchar(255) NOT NULL,
  `horario_tal` varchar(255) NOT NULL,
  `img_tal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `taller`
--

INSERT INTO `taller` (`id_taller`, `nombre_tal`, `descrip_tal`, `inicio_tal`, `duracion_tal`, `horario_tal`, `img_tal`) VALUES
(1, 'Taller de Pintura', 'Aquella noche andaba con Andreina y una chica que recién conocía, nos dirigíamos a una fiesta y aunque ese fuera el plan yo andaba vestida como siempre, tenía el cabello ondulado suelto un poco desordenado, unos yeans oscuros y una camisa con un escote redondo muy bonito.', '2021-07-08', '2 horas', 'Lunes 8:20am', 'foto-1.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indices de la tabla `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id_galeria`);

--
-- Indices de la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`id_noticia`);

--
-- Indices de la tabla `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indices de la tabla `taller`
--
ALTER TABLE `taller`
  ADD PRIMARY KEY (`id_taller`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id_galeria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `noticia`
--
ALTER TABLE `noticia`
  MODIFY `id_noticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `taller`
--
ALTER TABLE `taller`
  MODIFY `id_taller` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
