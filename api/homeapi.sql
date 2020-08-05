-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Počítač: innodb.endora.cz:3306
-- Vytvořeno: Stř 05. srp 2020, 08:05
-- Verze serveru: 5.6.45-86.1
-- Verze PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `homeapi`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `homeapi`
--

CREATE TABLE `homeapi` (
  `ID` int(255) NOT NULL COMMENT 'id',
  `red` int(16) NOT NULL COMMENT 'Red value',
  `green` int(16) NOT NULL COMMENT 'Green value',
  `blue` int(16) NOT NULL COMMENT 'Blue value',
  `a` int(16) NOT NULL COMMENT 'A value (brightness)',
  `delay` int(16) NOT NULL COMMENT 'Pause value (delay)',
  `ngrokid` varchar(128) CHARACTER SET utf8 NOT NULL COMMENT 'Ngrok id',
  `apikey` varchar(1024) CHARACTER SET utf8 NOT NULL COMMENT 'Home API access key'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Vypisuji data pro tabulku `homeapi`
--

INSERT INTO `homeapi` (`ID`, `red`, `green`, `blue`, `a`, `delay`, `ngrokid`, `apikey`) VALUES
(1, 255, 255, 255, 255, 0, 'abcdef345678', 'daef4953b9783365cad6615223720506cc46c5167cd16ab500fa597aa08ff964eb24fb19687f34d7665f778fcb6c5358fc0a5b81e1662cf90f73a2671c53f991');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `homeapi`
--
ALTER TABLE `homeapi`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `homeapi`
--
ALTER TABLE `homeapi`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
