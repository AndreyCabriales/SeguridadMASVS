-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-08-2024 a las 05:22:45
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gotaxi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `drivers`
--

CREATE TABLE `drivers` (
  `id_driver` int(5) NOT NULL,
  `name_d` varchar(40) NOT NULL,
  `lastname_d` varchar(40) NOT NULL,
  `age` int(3) NOT NULL,
  `email_d` varchar(50) NOT NULL,
  `password_d` varchar(50) NOT NULL,
  `phone_d` varchar(20) NOT NULL,
  `license` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `drivers`
--

INSERT INTO `drivers` (`id_driver`, `name_d`, `lastname_d`, `age`, `email_d`, `password_d`, `phone_d`, `license`) VALUES
(1, 'Jose', 'Hernandez', 32, 'jose@gmail.com', '123', '7649252013', ''),
(2, 'Pepe', 'Dominguez', 34, 'pepe@gmail.com', '123', '8654205492', ''),
(3, 'Laura', 'Gomez', 23, 'laura@gmail.com', '234', '86252045', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `histories`
--

CREATE TABLE `histories` (
  `id_history` int(5) NOT NULL,
  `id_taxi` int(5) NOT NULL,
  `id_reservation` int(5) NOT NULL,
  `date_h` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `histories`
--

INSERT INTO `histories` (`id_history`, `id_taxi`, `id_reservation`, `date_h`) VALUES
(1, 4, 4, '2024-08-09'),
(2, 3, 3, '2024-08-01'),
(3, 2, 2, '2024-08-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pays`
--

CREATE TABLE `pays` (
  `id_pay` int(5) NOT NULL,
  `id_taxi` int(5) NOT NULL,
  `cant` int(5) NOT NULL,
  `date_p` date NOT NULL,
  `type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pays`
--

INSERT INTO `pays` (`id_pay`, `id_taxi`, `cant`, `date_p`, `type`) VALUES
(1, 2, 50, '2024-08-07', 1),
(2, 3, 35, '2024-08-06', 1),
(3, 4, 20, '2024-08-09', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rankings`
--

CREATE TABLE `rankings` (
  `id_ranking` int(5) NOT NULL,
  `id_taxi` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `number_ran` int(5) NOT NULL,
  `date_ran` date NOT NULL,
  `description_ran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rankings`
--

INSERT INTO `rankings` (`id_ranking`, `id_taxi`, `id_user`, `number_ran`, `date_ran`, `description_ran`) VALUES
(1, 3, 5, 5, '2024-08-07', 'Muy buena experiencia he tenido'),
(2, 4, 5, 3, '2024-08-06', 'Fue un poco molesto con su musica'),
(3, 4, 7, 1, '2024-08-17', 'Pesimo servicio, el conductor es muy grosero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservations`
--

CREATE TABLE `reservations` (
  `id_reservation` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `description_reser` varchar(250) NOT NULL,
  `date_reser` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reservations`
--

INSERT INTO `reservations` (`id_reservation`, `id_user`, `description_reser`, `date_reser`) VALUES
(1, 6, 'Me podria llevar al parque de los maestro estoy en el centro a lado de la terminal', '2024-08-08'),
(2, 6, 'Me podria llevar a mi casa en la calle los pinos, estoy en el parque de Zamora', '2024-08-09'),
(3, 7, 'Voy al malecon estoy en la unidad deportiva', '2024-08-06'),
(4, 5, 'Me podria llevar a coppel estoy en el parque de los maestros', '2024-08-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taxis`
--

CREATE TABLE `taxis` (
  `id_taxi` int(5) NOT NULL,
  `id_driver` int(5) NOT NULL,
  `number_t` int(3) NOT NULL,
  `plate` varchar(20) NOT NULL,
  `state` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `taxis`
--

INSERT INTO `taxis` (`id_taxi`, `id_driver`, `number_t`, `plate`, `state`) VALUES
(2, 3, 234, 'WSF-32S-5DS', 0),
(3, 3, 234, 'WSF-32S-5DS', 0),
(4, 3, 234, 'WSF-32S-5DS', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(5) NOT NULL,
  `name_u` varchar(40) NOT NULL,
  `lastname_u` varchar(40) NOT NULL,
  `email_u` varchar(50) NOT NULL,
  `password_u` varchar(50) NOT NULL,
  `phone_u` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `name_u`, `lastname_u`, `email_u`, `password_u`, `phone_u`) VALUES
(5, 'Andrey', 'Cabriales', 'andrey@gmail.com', '123', 1350250),
(6, 'Alondra', 'Jimenez', 'alondra@gmail.com', '123', 8642052),
(7, 'Sofia', 'Ramírez', 'sofia@gmail.com', '234', 96532234),
(8, 'David', '', 'andrey@gmail.com', '123', 0),
(10, 'Baldito', '', 'balditotonto@gmail.com', 'sonsobaldito', 0),
(11, 'David', '', 'davidatzin25@gmail.com', '202cb962ac59075b964b07152d234b70', 0),
(12, 'David', '', 'david@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', 0),
(13, 'David', '', 'david@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', 0),
(14, 'David', '', 'david@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', 0),
(16, 'Adriana', 'Garcia', 'andrey@gmail.com', '202cb962ac59075b964b07152d234b70', 41413123),
(17, 'Andrey', 'Cabriales', 'andrey1@gmail.com', '202cb962ac59075b964b07152d234b70', 2147483647);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id_driver`);

--
-- Indices de la tabla `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `history_taxis` (`id_taxi`),
  ADD KEY `history_reservations` (`id_reservation`);

--
-- Indices de la tabla `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id_pay`),
  ADD KEY `pays_taxis` (`id_taxi`);

--
-- Indices de la tabla `rankings`
--
ALTER TABLE `rankings`
  ADD PRIMARY KEY (`id_ranking`),
  ADD KEY `rankings_taxis` (`id_taxi`),
  ADD KEY `rankings_users` (`id_user`);

--
-- Indices de la tabla `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `reservations_users` (`id_user`);

--
-- Indices de la tabla `taxis`
--
ALTER TABLE `taxis`
  ADD PRIMARY KEY (`id_taxi`),
  ADD KEY `taxis_driver` (`id_driver`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id_driver` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `histories`
--
ALTER TABLE `histories`
  MODIFY `id_history` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pays`
--
ALTER TABLE `pays`
  MODIFY `id_pay` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `rankings`
--
ALTER TABLE `rankings`
  MODIFY `id_ranking` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id_reservation` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `taxis`
--
ALTER TABLE `taxis`
  MODIFY `id_taxi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `histories`
--
ALTER TABLE `histories`
  ADD CONSTRAINT `history_reservations` FOREIGN KEY (`id_reservation`) REFERENCES `reservations` (`id_reservation`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `history_taxis` FOREIGN KEY (`id_taxi`) REFERENCES `taxis` (`id_taxi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pays`
--
ALTER TABLE `pays`
  ADD CONSTRAINT `pays_taxis` FOREIGN KEY (`id_taxi`) REFERENCES `taxis` (`id_taxi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rankings`
--
ALTER TABLE `rankings`
  ADD CONSTRAINT `rankings_taxis` FOREIGN KEY (`id_taxi`) REFERENCES `taxis` (`id_taxi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rankings_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `taxis`
--
ALTER TABLE `taxis`
  ADD CONSTRAINT `taxis_driver` FOREIGN KEY (`id_driver`) REFERENCES `drivers` (`id_driver`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
