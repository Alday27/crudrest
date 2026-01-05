-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-12-2025 a las 04:48:04
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
-- Base de datos: `restaurante`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platillos`
--

CREATE TABLE `platillos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `categoria` varchar(30) DEFAULT NULL,
  `precio` decimal(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `platillos`
--

INSERT INTO `platillos` (`id`, `nombre`, `categoria`, `precio`) VALUES
(1, 'Pozole', 'Sopas', 55.00),
(2, 'Tacos de Alambre', 'Tacos', 40.00),
(3, 'Tacos de Asada', 'Tacos', 40.00),
(4, 'Tacos de Pollo', 'Tacos', 35.00),
(5, 'Quesadilla de Queso', 'Quesadillas', 30.00),
(6, 'Quesadilla de Champiñones', 'Quesadillas', 50.00),
(7, 'Hamburguesa Clásica', 'Hamburguesas', 75.00),
(8, 'Hamburguesa Doble', 'Hamburguesas', 95.00),
(9, 'Hot Dog ', 'Hot Dogs', 40.00),
(10, 'Papas a la Francesa', 'Complementos', 35.00),
(11, 'Nachos con Queso', 'Complementos', 45.00),
(12, 'Enchiladas Verdes', 'Comida Mexicana', 85.00),
(14, 'Chilaquiles Verdes', 'Desayunos', 70.00),
(15, 'Chilaquiles Rojos', 'Desayunos', 70.00),
(16, 'Molletes', 'Desayunos', 55.00),
(17, 'Sopa Azteca', 'Sopas', 60.00),
(18, 'Caldo de Pollo', 'Sopas', 75.00),
(19, 'Agua de Horchata', 'Bebidas', 20.00),
(20, 'Agua de Jamaica', 'Bebidas', 20.00),
(21, 'Refresco', 'Bebidas', 18.00),
(22, 'Pizza de Sarten', 'Pizzas', 100.00),
(23, 'Tacos de Birria', 'Tacos', 55.00),
(24, 'Spaguetti', 'Sopas', 55.00),
(25, 'Pizza de pepperonni', 'Pizzas', 90.00);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `platillos`
--
ALTER TABLE `platillos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `platillos`
--
ALTER TABLE `platillos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
