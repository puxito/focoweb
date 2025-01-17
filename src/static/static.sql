-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 17-01-2025 a las 15:54:37
-- Versión del servidor: 8.0.40
-- Versión de PHP: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `foco`
--
CREATE DATABASE IF NOT EXISTS `foco` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `foco`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Ads`
--

CREATE TABLE `Ads` (
  `idAd` int NOT NULL,
  `idEntertainerFK` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `adDescription` text,
  `price` decimal(10,2) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `creationDate` datetime DEFAULT NULL,
  `publicRatings` decimal(3,2) DEFAULT NULL,
  `photos` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Entertainers`
--

CREATE TABLE `Entertainers` (
  `idEntertainer` int NOT NULL,
  `idUserFK` int NOT NULL,
  `isVerified` tinyint(1) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `yearsOfExperience` int DEFAULT NULL,
  `isGroup` tinyint(1) DEFAULT NULL,
  `description` text,
  `publicOpinions` decimal(3,2) DEFAULT NULL,
  `barOpinions` decimal(3,2) DEFAULT NULL,
  `musicianOpinions` decimal(3,2) DEFAULT NULL,
  `idInstrumentFK` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Instruments`
--

CREATE TABLE `Instruments` (
  `idInstrument` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Orders`
--

CREATE TABLE `Orders` (
  `idOrder` int NOT NULL,
  `idAdFK` int NOT NULL,
  `isCompleted` tinyint(1) NOT NULL,
  `date` datetime DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `description` text,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Payments`
--

CREATE TABLE `Payments` (
  `idPayment` int NOT NULL,
  `idUserFK` int NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `paymentMethod` varchar(255) DEFAULT NULL,
  `paymentDate` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `transactionId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Roles`
--

CREATE TABLE `Roles` (
  `idRole` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Subscriptions`
--

CREATE TABLE `Subscriptions` (
  `idSubscription` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `duration` int NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Users`
--

CREATE TABLE `Users` (
  `idUser` int NOT NULL,
  `idRoleFK` int DEFAULT '2',
  `nickname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `pronouns` enum('he/him','she/her','they/them','') NOT NULL DEFAULT '',
  `entryDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `leavingDate` date DEFAULT NULL,
  `lastLogin` datetime DEFAULT NULL,
  `pfp` varchar(255) DEFAULT 'assets/images/defaults/profile.png',
  `bday` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `UserSubscriptions`
--

CREATE TABLE `UserSubscriptions` (
  `idUserSubscription` int NOT NULL,
  `idUserFK` int NOT NULL,
  `idSubscriptionFK` int NOT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL,
  `paymentStatus` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Ads`
--
ALTER TABLE `Ads`
  ADD PRIMARY KEY (`idAd`),
  ADD KEY `idEntertainerFK` (`idEntertainerFK`);

--
-- Indices de la tabla `Entertainers`
--
ALTER TABLE `Entertainers`
  ADD PRIMARY KEY (`idEntertainer`),
  ADD KEY `idUserFK` (`idUserFK`),
  ADD KEY `idInstrumentFK` (`idInstrumentFK`);

--
-- Indices de la tabla `Instruments`
--
ALTER TABLE `Instruments`
  ADD PRIMARY KEY (`idInstrument`);

--
-- Indices de la tabla `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`idOrder`),
  ADD KEY `idAdFK` (`idAdFK`);

--
-- Indices de la tabla `Payments`
--
ALTER TABLE `Payments`
  ADD PRIMARY KEY (`idPayment`),
  ADD KEY `idUserFK` (`idUserFK`);

--
-- Indices de la tabla `Roles`
--
ALTER TABLE `Roles`
  ADD PRIMARY KEY (`idRole`);

--
-- Indices de la tabla `Subscriptions`
--
ALTER TABLE `Subscriptions`
  ADD PRIMARY KEY (`idSubscription`);

--
-- Indices de la tabla `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `idRoleFK` (`idRoleFK`);

--
-- Indices de la tabla `UserSubscriptions`
--
ALTER TABLE `UserSubscriptions`
  ADD PRIMARY KEY (`idUserSubscription`),
  ADD KEY `idUserFK` (`idUserFK`),
  ADD KEY `idSubscriptionFK` (`idSubscriptionFK`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Ads`
--
ALTER TABLE `Ads`
  MODIFY `idAd` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Entertainers`
--
ALTER TABLE `Entertainers`
  MODIFY `idEntertainer` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Instruments`
--
ALTER TABLE `Instruments`
  MODIFY `idInstrument` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Orders`
--
ALTER TABLE `Orders`
  MODIFY `idOrder` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Payments`
--
ALTER TABLE `Payments`
  MODIFY `idPayment` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Roles`
--
ALTER TABLE `Roles`
  MODIFY `idRole` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Subscriptions`
--
ALTER TABLE `Subscriptions`
  MODIFY `idSubscription` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Users`
--
ALTER TABLE `Users`
  MODIFY `idUser` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `UserSubscriptions`
--
ALTER TABLE `UserSubscriptions`
  MODIFY `idUserSubscription` int NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Ads`
--
ALTER TABLE `Ads`
  ADD CONSTRAINT `Ads_ibfk_1` FOREIGN KEY (`idEntertainerFK`) REFERENCES `Entertainers` (`idEntertainer`);

--
-- Filtros para la tabla `Entertainers`
--
ALTER TABLE `Entertainers`
  ADD CONSTRAINT `Entertainers_ibfk_1` FOREIGN KEY (`idUserFK`) REFERENCES `Users` (`idUser`),
  ADD CONSTRAINT `Entertainers_ibfk_2` FOREIGN KEY (`idInstrumentFK`) REFERENCES `Instruments` (`idInstrument`);

--
-- Filtros para la tabla `Orders`
--
ALTER TABLE `Orders`
  ADD CONSTRAINT `Orders_ibfk_1` FOREIGN KEY (`idAdFK`) REFERENCES `Ads` (`idAd`);

--
-- Filtros para la tabla `Payments`
--
ALTER TABLE `Payments`
  ADD CONSTRAINT `Payments_ibfk_1` FOREIGN KEY (`idUserFK`) REFERENCES `Users` (`idUser`);

--
-- Filtros para la tabla `Users`
--
ALTER TABLE `Users`
  ADD CONSTRAINT `Users_ibfk_1` FOREIGN KEY (`idRoleFK`) REFERENCES `Roles` (`idRole`);

--
-- Filtros para la tabla `UserSubscriptions`
--
ALTER TABLE `UserSubscriptions`
  ADD CONSTRAINT `UserSubscriptions_ibfk_1` FOREIGN KEY (`idUserFK`) REFERENCES `Users` (`idUser`),
  ADD CONSTRAINT `UserSubscriptions_ibfk_2` FOREIGN KEY (`idSubscriptionFK`) REFERENCES `Subscriptions` (`idSubscription`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
