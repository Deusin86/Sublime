-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10-Nov-2018 às 22:54
-- Versão do servidor: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id_carrinho` int(11) NOT NULL,
  `id_sessao` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `portes` int(11) NOT NULL,
  `compra` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `data` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE `cidade` (
  `id_cidade` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `numero_pais` int(11) NOT NULL,
  `numero_cidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contacto`
--

CREATE TABLE `contacto` (
  `id_contacto` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `apelido` varchar(30) NOT NULL,
  `assunto` varchar(60) NOT NULL,
  `email` varchar(40) NOT NULL,
  `mensagem` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pais`
--

CREATE TABLE `pais` (
  `id_pais` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pais`
--

INSERT INTO `pais` (`id_pais`, `nome`) VALUES
(1, 'Portugal'),
(2, 'Espanha');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `preco_mercado` double NOT NULL,
  `desconto` double NOT NULL,
  `quantidade` int(11) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `img_frente` varchar(200) NOT NULL,
  `img_direita` varchar(200) NOT NULL,
  `img_esquerda` varchar(200) NOT NULL,
  `img_tras` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `categoria`, `nome`, `preco_mercado`, `desconto`, `quantidade`, `descricao`, `img_frente`, `img_direita`, `img_esquerda`, `img_tras`) VALUES
(11, 'Tecnologia', 'caixa', 566, 0, 3, 'grande', '', '', '', ''),
(12, 'Tecnologia', 'fonte', 80, 0, 1, 'consome muito', '', '', '', ''),
(13, 'tec', '645', 54654, 45654, 54645, '4564', 'images/uploads/8KEEe8ptYrrCG6HgCFwUoLYZWq5HqWD99AS4blHvQjgmh2F0MdCcekLr70QWrPoYyI5nYJ1To3TUjdqyhullODa7yOy7VMaGJRPY.png', 'images/uploads/PkhANIhWsA0Y4gt9cva2r7tqY5UgmwxXzVJ3AlQATu8UnLqubIGMXMgR1RedgLIpgdE4IX970RtnNIMn2dCVCBYKRS1N5y52dytx.jpg', 'images/uploads/kGYdQOpCPyHSz7dufkbXGBpRt0FYB06UhvGuwoD8t8KYHtoG9WT0UklwHwuP4BIHvH1Dd9hGMx4TIyYK17G54P0INm4Z5sFZb8Wm.jpg', 'images/uploads/abgSUa438OiM39UrkLVLygaEiF6tqJM9hXevLWMCjl3xTV0PyMQchK3W7kFVa8UWfHUs7H0DzKZ9cvcTIc2U5eJPYVNgzmoyY2KM.jpg'),
(14, '324234', '234324234', 234, 2342, 2342, '234', 'images/uploads/LhMco551NXta6phhWYJGLm6h1HtK61ovVwR8fhoSdCsd1mmm6LYmku0bsQg72TEjc27L0PEObKeh1qPpSoV48XX91Hf9ow7JHmAJ.jpg', 'images/uploads/w6ukPHQPZ1KcOKhCiuILtZQsusf5VMppDxuIOe7lHJQE01lhgSwnMHm1BkqmzISMhWIIWqy1YalBwaNiZ4Qg9h1co2tzQL13cUAM.jpg', 'images/uploads/1pSOKib33rgmLDDdwW9JsJn1F7kJUDT2KolOK98VkN5XSQelrGFMNIBULNdzNgo9Cp3cYkgECp8Rhu4DxzrJWyb2mmOWzu0l5fsL.jpg', 'images/uploads/Ning3uoOQLPxIJL71u7DTEFIY4Mxt8z4akn1HGRmVwQmoJVkl3AxsgOitSOrQqBcX4Al1krDePIZk3HV7KWSeuUQtQ9umgSlN8Cz.jpg'),
(15, 'Hugo', '123', 1224, 1232, 32432, '345345', 'images/uploads/JCV7xsz37Rf4Qmi4JsKWClyrA3Jzmoqlj2Pk9f5kXviffg77GE8BbhLpOaex6gknZrZvkDqmoCR7sNoj5amZ0cI6ADSdKPg2C3SU.png', 'images/uploads/jvLyFC7CYlj5zCDVDJxUh6zkkn9tyzRaDMhu80rjz2PDono3ZTNB9AAHr1x6RF7itGQVdlJceSo02CYourp7vxvVE3lcf341CAtk.jpg', 'images/uploads/vVyyIzmeCC0Ne1V9UIBbLhvGM5MANXN7djs6xEGjpRd8vt1Kn4RMUp89KCsyPgw9rkhzFHg21uIEBhgV4hCg2PIfwocr79GPaBGt.jpg', 'images/uploads/vIu2C37IwRNjPfIStUlhi1WVFt4Gv50zEa52G0DcCVkXULbdkhcWwHxBEjoOrgdROtXjaCvO9CYMUpjpWVFGO8SeSso2PHlFcRjq.png'),
(16, 'Hugo', '123', 1224, 1232, 32432, '345345', 'images/uploads/StB6y7FIlCBJiXpHTRsUA7FezwnWSfMWw8sXAFdobGvPf5l7BUa1NdbaPP7OWUG5evUGVENF2WO4sCq5aIMbfRZjfLvetJkI6O3i.png', 'images/uploads/3vYEtHsAIm8Vz7y1A9ul8oRh7VRP6Fnt9zvzUleNtU3qSJb4uohw83ywNxUAklqKm9Zp2kEZyn6ychz3HsHTTUOxPZde6xLBHn0T.jpg', 'images/uploads/ObfXLtHiu19LXJtDSFMdIXwy0Li7rWRKNmDvtbTA4uMvbRfpVUlitgWBXaUg1eUfXWe4PJ66rATXjzREbfJQubiMc95lxZBmRaDP.jpg', 'images/uploads/RCeXuTCOCTO9jIA8ee7PfNboZhNliu1zQgtVRd1MGu3mzQ4FdBSexUpN6sodbIsSexgj9ymjIui4NuvN3I57WOWy0ZRayAMDemAS.png'),
(17, 'Tecnologia', 'mmmmm', 45, 12, 4, 'jujuj', 'images/uploads/Qrm39LeWUosCkwEPod3nIGmgfJgUrOK8GB83dNzcsMPx6trs3JPuZCkplrlveTFxq0KPuGMPF4MSbvnzIFrRHerCPTX6VAUZYB9U.png', 'images/uploads/nDYf6Dklf2khf9AInu6O1ueR8zZvDn6cDfwoSWGLV7t71ATxXaJ3x3jSHlripM28qQOtYkCbGB78Rr6DFhHWm41sKzwtXY4Q4mlf.jpg', 'images/uploads/4oQQJR843dfano1ucu3cPHPf49jZxPtARAzCPWXytmyRi1ooyzZsIxy3Fo1L5D2KwgCqfEbssSJ8CB9pVNQv9miY5KSDwtv945Zm.png', 'images/uploads/w5RKzboNVMYSjJMBG3m7HZ4hpkGBmypvJqb4DYvzfdUrtHhdoCtvax0qKyHrgdVtTeQS5zvmoIipLgWzk7LAyEAIr9RUHZPff285.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `registo`
--

CREATE TABLE `registo` (
  `id_registo` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `apelido` varchar(40) NOT NULL,
  `empresa` varchar(50) NOT NULL,
  `pais` int(11) NOT NULL,
  `morada` varchar(60) NOT NULL,
  `codigo_postal` varchar(15) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `telefone` int(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `tipo` int(11) NOT NULL,
  `tipo_pagamento` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `registo`
--

INSERT INTO `registo` (`id_registo`, `nome`, `apelido`, `empresa`, `pais`, `morada`, `codigo_postal`, `cidade`, `telefone`, `email`, `password`, `tipo`, `tipo_pagamento`) VALUES
(1, 'admin', 'admin', 'Sublime', 1, 'rua 45', '2813-344', 'Lisboa', 212324238, 'admin@hotmail.com', '123', 1, 'sei la'),
(2, 'joana', 'sousa', 'joana company', 2, 'avenida joana 24', '2813-222', 'Sevilla', 934454355, 'joana@hotmail.com', '123', 2, 'sei la');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id_carrinho`);

--
-- Indexes for table `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`id_cidade`);

--
-- Indexes for table `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id_contacto`);

--
-- Indexes for table `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id_pais`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`);

--
-- Indexes for table `registo`
--
ALTER TABLE `registo`
  ADD PRIMARY KEY (`id_registo`),
  ADD KEY `pais` (`pais`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id_carrinho` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cidade`
--
ALTER TABLE `cidade`
  MODIFY `id_cidade` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id_contacto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pais`
--
ALTER TABLE `pais`
  MODIFY `id_pais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `registo`
--
ALTER TABLE `registo`
  MODIFY `id_registo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `registo`
--
ALTER TABLE `registo`
  ADD CONSTRAINT `registo_ibfk_1` FOREIGN KEY (`pais`) REFERENCES `pais` (`id_pais`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
