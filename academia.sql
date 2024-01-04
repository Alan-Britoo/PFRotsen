-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-01-2024 a las 18:07:42
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `academia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

CREATE TABLE `asignaturas` (
  `id` int(11) NOT NULL,
  `asignatura` varchar(50) DEFAULT NULL,
  `profesor_id` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asignaturas`
--

INSERT INTO `asignaturas` (`id`, `asignatura`, `profesor_id`) VALUES
(69, 'Fisica', NULL),
(70, 'Quimica', NULL),
(71, 'Matematicas', NULL),
(72, 'Ingles', NULL),
(74, 'Musica', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id` int(11) NOT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id`, `estado`) VALUES
(1, 'activo'),
(2, 'inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'administrador'),
(2, 'profesor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `direccion` varchar(150) NOT NULL,
  `nacimiento` date NOT NULL,
  `rol_id` int(11) NOT NULL,
  `asignatura_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `password`, `estado`, `direccion`, `nacimiento`, `rol_id`, `asignatura_id`) VALUES
(100, 'Rotsen', 'xxx', 'a@gmail.com  ', '$2y$10$kbOELCqle/pzHNA4GAV7Ue5kCsid7IHCqAyDJ1t7qb3a2uH7.ZlT.', 1, 'prueba', '2023-12-13', 1, NULL),
(107, 'David Andres', 'Ortega Pajaro', 'david.ortega.pajaro1@gmail.com', '$2y$10$jfalu5XOEQO8smNGqiuHe.D4lcHuINkY5pR8x3OL5DB836T8gAJey', 1, 'prueba', '2023-12-27', 1, NULL),
(127, 'Rotsen', 'admin', 'admin@admin  ', '$2y$10$klSKy4tm0/ivfUzDNYn5KOSAnjavSwPJ8.4Rs.amMMpYj3wsOCq0a', 1, 'asdasd', '2024-01-03', 1, NULL),
(131, 'Ullam numquam expedi', 'Qui ad tempore nihi', 'zuha@mailinator.com  ', '$2y$10$jwI.EVP.eu0PZcK0ABUWP.Bbih82ddQXIQn7xc5j1HJeI7XrILX6u', 1, 'Quidem aut consequat', '1978-03-22', 2, NULL),
(133, 'profesor ', '1', 'zakacy@mailinator.com', '$2y$10$QmJCQNYo9v2r0gJ9JUlqd.9/EaPFwzNdJR6s3vvhgs2MjUdf2YjXG', 0, 'prueba', '2024-01-03', 2, 74),
(134, 'profesor ', '2', 'prueba@prueba', '$2y$10$BUYgYefpNERQxzFGBGz.2u63py5XlsqlxydSC02N1k5DwxsinjsFq', 1, 'prueba', '2023-12-31', 2, 69),
(135, 'jairo', 'jairo', 'jairo@jairo', '$2y$10$T62jhD8v9SvSbcC1ssrqpeCx21sXtJkSeiY3LGHVwVXOxX.Mf5f1G', 1, 'prueba', '2024-01-15', 2, 72),
(136, '', '', 'maestro@maestro', '$2y$10$vNLqFr09DPYE2Jr9xWA2yuYEDE4mghhFJLDY4pqlJeOUwfSQJr0Vu', 1, 'mestro', '2024-01-04', 2, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `asignatura` (`asignatura`),
  ADD UNIQUE KEY `asignatura_2` (`asignatura`),
  ADD UNIQUE KEY `asignatura_3` (`asignatura`),
  ADD UNIQUE KEY `asignatura_4` (`asignatura`),
  ADD KEY `profesor_id` (`profesor_id`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estado` (`estado`),
  ADD KEY `estado_2` (`estado`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `usuario_roles_fk` (`rol_id`),
  ADD KEY `usuario_asignatura_fk` (`asignatura_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuario_asignatura_fk` FOREIGN KEY (`asignatura_id`) REFERENCES `asignaturas` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_roles_fk` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
