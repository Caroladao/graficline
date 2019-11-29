-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 03-Jun-2017 às 22:25
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `seguranca`
--
CREATE DATABASE IF NOT EXISTS `seguranca` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `seguranca`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm`
--

CREATE TABLE IF NOT EXISTS `adm` (
  `cd_adm` int(11) NOT NULL AUTO_INCREMENT,
  `nm_adm` varchar(60) NOT NULL,
  `user_adm` varchar(45) NOT NULL,
  `senha_adm` varchar(45) NOT NULL,
  PRIMARY KEY (`cd_adm`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `adm`
--

INSERT INTO `adm` (`cd_adm`, `nm_adm`, `user_adm`, `senha_adm`) VALUES
(1, 'Admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `upload`
--

CREATE TABLE IF NOT EXISTS `upload` (
  `cd_upload` int(11) NOT NULL AUTO_INCREMENT,
  `nm_upload` varchar(45) NOT NULL,
  `desc_upload` varchar(255) NOT NULL,
  `cd_adm` int(11) DEFAULT NULL,
  `cd_usuario` int(11) NOT NULL,
  `os_upload` varchar(80) DEFAULT NULL,
  `arte` varchar(80) NOT NULL,
  `status` int(1) NOT NULL,
  `erro` varchar(500) NOT NULL,
  PRIMARY KEY (`cd_upload`),
  KEY `cd_adm_idx` (`cd_adm`),
  KEY `cd_usuario_idx` (`cd_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1000 ;

--
-- Extraindo dados da tabela `upload`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `cd_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(80) NOT NULL,
  `nasc_usuario` varchar(10) NOT NULL,
  `cpf_usuario` varchar(14) NOT NULL,
  `cnpj_usuario` varchar(14) NOT NULL,
  `nm_usuario` varchar(45) NOT NULL,
  `user_usuario` varchar(45) NOT NULL,
  `senha_usuario` varchar(45) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  PRIMARY KEY (`cd_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`cd_usuario`, `email`, `nasc_usuario`, `cpf_usuario`, `cnpj_usuario`, `nm_usuario`, `user_usuario`, `senha_usuario`, `telefone`) VALUES
(1, 'usuario@usuario.com', '1999-12-12', '1212', 'null', 'UsuÃ¡rio', 'user', '1234', '1234');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `upload`
--
ALTER TABLE `upload`
  ADD CONSTRAINT `cd_adm` FOREIGN KEY (`cd_adm`) REFERENCES `adm` (`cd_adm`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cd_usuario` FOREIGN KEY (`cd_usuario`) REFERENCES `usuario` (`cd_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
