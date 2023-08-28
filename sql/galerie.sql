-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 15, 2022 at 04:20 PM
-- Server version: 5.7.11
-- PHP Version: 7.0.3


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
DROP DATABASE galerie;
CREATE DATABASE galerie DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE galerie;

CREATE TABLE `administrateur` (
    `idAdmin` int(8) NOT NULL,
    `nom` varchar(255),
    `prenom` varchar(255),
    `username` varchar(255),
    `mdPasse` varchar(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `categorie` (
    `idCategorie` int(8) NOT NULL,
    `descCategorie` varchar(50)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `client` (
    `idClient` int(8) NOT NULL,
    `nom` varchar(255),
    `prenom` varchar(255),
    `courriel` varchar(255),
    `adresse` varchar(255),
    `carteCredit` varchar(255),
    `dateInscription` date,
    `username` varchar(255),
    `mdPasse` varchar(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `commande` (
    `idCommande` int(8) NOT NULL,
    `dateCommande` date DEFAULT NULL,
    `idClient` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `oeuvre` (
    `idOeuvre` int(8) NOT NULL,
    `titre` varchar(255),
    `description` varchar(255),
    `prix` float(8,2),
    `dateCreation` date,
    `url_photo` varchar(255),
    `url_photo_mini` varchar(255),
    `idCommande` int(8) DEFAULT NULL,
    `idCategorie` int(8),
    `disponible` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `administrateur`
    ADD PRIMARY KEY (`idAdmin`);

ALTER TABLE `categorie`
    ADD PRIMARY KEY (`idCategorie`);

ALTER TABLE `client`
    ADD PRIMARY KEY (`idClient`);

ALTER TABLE `commande`
    ADD PRIMARY KEY (`idCommande`),
    ADD KEY `clientCommande_fk` (`idClient`);

ALTER TABLE `oeuvre`
    ADD PRIMARY KEY (`idOeuvre`),
    ADD KEY `commande_oeuvre_fk` (`idCommande`),
    ADD KEY `categorie_oeuvre_fk` (`idCategorie`);

ALTER TABLE `administrateur`
    MODIFY `idAdmin` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3001;

ALTER TABLE `categorie`
    MODIFY `idCategorie` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4005;

ALTER TABLE `client`
    MODIFY `idClient` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;

ALTER TABLE `commande`
    MODIFY `idCommande` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6000;

ALTER TABLE `oeuvre`
    MODIFY `idOeuvre` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2000;

ALTER TABLE `commande`
    ADD CONSTRAINT `clientCommande_fk` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`);

ALTER TABLE `oeuvre`
    ADD CONSTRAINT `categorie_oeuvre_fk` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`),
    ADD CONSTRAINT `commande_oeuvre_fk` FOREIGN KEY (`idCommande`) REFERENCES `commande` (`idCommande`) ON DELETE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
