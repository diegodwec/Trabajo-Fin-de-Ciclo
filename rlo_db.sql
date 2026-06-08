-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-06-2026 a las 18:43:12
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rlo_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'coches'),
(2, 'ruedas'),
(3, 'explosiones'),
(4, 'calcomanías'),
(5, 'adorno'),
(6, 'turbos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `objeto_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id`, `usuario_id`, `objeto_id`) VALUES
(1, 1, 8),
(2, 1, 9),
(3, 1, 10),
(4, 1, 11),
(5, 1, 12),
(6, 1, 13),
(15, 1, 3),
(16, 1, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objetos`
--

CREATE TABLE `objetos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `rareza` varchar(50) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `objetos`
--

INSERT INTO `objetos` (`id`, `nombre`, `rareza`, `imagen`, `id_categoria`, `precio`) VALUES
(1, 'Octane ZSR', 'Importado', 'imagenes/octanezsr.png', 1, 800),
(2, 'Cristiano', 'muy raro', 'imagenes/RuedasCristiano.png', 2, 200),
(3, 'Explosión Nuclear', 'Mercado Negro', 'imagenes/ExplosionNuclear.png', 3, 500),
(4, 'Animusgp (Morado)', 'Importado', 'imagenes/animusgp-Purple.png', 1, 700),
(5, '20XX', 'Mercado Negro', 'imagenes/20XX_decal_icon.webp', 4, 900),
(6, 'Sombrero Mariachi', 'inusual', 'imagenes/SombreroMariachi.png', 5, 50),
(7, 'Standard (Negro)', 'Importado', 'imagenes/TurboEstandar.png', 6, 1200),
(8, 'Fennec', 'importado', 'imagenes/fennec.png', 1, 700),
(9, 'Zomba', 'exótico', 'imagenes/Zomba.png', 2, 900),
(10, 'Cosmosis', 'mercado negro', 'imagenes/cosmosis.png', 3, 2000),
(11, 'Masamune', 'común', 'imagenes/masamune.png', 1, 100),
(12, 'Dominus', 'importado', 'imagenes/dominus.png', 1, 500),
(13, 'Draco', 'exótico', 'imagenes/draco.png', 2, 1000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `pais` varchar(50) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto_perfil` varchar(255) DEFAULT NULL,
  `creditos` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `pais`, `email`, `password`, `foto_perfil`, `creditos`) VALUES
(1, 'Diego', 'González', 'España', 'admin@admin.com', '$2y$10$tmSzIxyBoffM.lLq5Ca52eD2sd9XXHnDQ2cAVHwjJ80iq/7dWjfsm', NULL, 2100),
(2, 'ad', 'aaa', 'España', 'admin@2.com', '$2y$10$uWMSfo52tsiGPfTP4.gjmu9Xi2twH499ofgGb8n/XmQja8KKwCDIq', NULL, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `objeto_id` (`objeto_id`);

--
-- Indices de la tabla `objetos`
--
ALTER TABLE `objetos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `objetos`
--
ALTER TABLE `objetos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `inventario_ibfk_2` FOREIGN KEY (`objeto_id`) REFERENCES `objetos` (`id`);

--
-- Filtros para la tabla `objetos`
--
ALTER TABLE `objetos`
  ADD CONSTRAINT `objetos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
