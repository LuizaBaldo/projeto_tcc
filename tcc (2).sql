-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Out-2022 às 20:54
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tcc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `animal`
--

CREATE TABLE `animal` (
  `id` bigint(20) NOT NULL,
  `id_usuario` bigint(20) NOT NULL,
  `tipo_animal` varchar(100) NOT NULL,
  `nome_animal` varchar(100) DEFAULT NULL,
  `idade` varchar(30) DEFAULT NULL,
  `sexo` varchar(20) DEFAULT NULL,
  `raca` varchar(100) DEFAULT NULL,
  `descricao` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `animal`
--

INSERT INTO `animal` (`id`, `id_usuario`, `tipo_animal`, `nome_animal`, `idade`, `sexo`, `raca`, `descricao`) VALUES
(79, 45, 'cachorro', 'bob', '10', 'Macho', 'vira lata', 'cão amavel, docil e gentil'),
(80, 45, 'cachorro', 'craque', '20', 'Femea', 'buldogue', 'cansado'),
(81, 41, 'gato', 'felix', '1', 'Femea', 'persa', 'raivoso, porém amável'),
(82, 41, 'cachorro', '\"\"', '0', 'Femea', '\"\"', '\"\"');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

CREATE TABLE `comentario` (
  `id` int(10) NOT NULL,
  `email` varchar(26) NOT NULL,
  `conteudo` text NOT NULL,
  `resposta` text DEFAULT NULL,
  `id_animal` bigint(10) NOT NULL,
  `nome` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `comentario`
--

INSERT INTO `comentario` (`id`, `email`, `conteudo`, `resposta`, `id_animal`, `nome`) VALUES
(4, 'ao@gmail.com', 'meu deus do ceu\r\n based', NULL, 81, 'Rodrigo'),
(5, 'ramon.dantas@gmail.com', 'precisa reservar o gato?', NULL, 81, 'ramon'),
(6, 'felipe@gmail.com', 'O animal possui os registros de vacina?', NULL, 80, 'felipe'),
(8, 'teste@.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, 81, 'teste'),
(9, 'danilo@gmail.com', 'o cachorro é dócil?\r\n', NULL, 80, 'danilo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `telefone` varchar(25) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `tipo` enum('USUARIO','INSTITUICAO') NOT NULL DEFAULT 'USUARIO',
  `cnpj` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `endereco`, `telefone`, `email`, `senha`, `tipo`, `cnpj`) VALUES
(39, 'felipe', 'rua das dores 122', '111111111114', 'felipelol@gmail.com', 'teste123', 'USUARIO', NULL),
(41, 'adotdogs', 'rua das dores 10', '119897788331', 'adog@dogs.org', 'teste123', 'INSTITUICAO', '12345678912349'),
(45, 'catchme', 'rua dos gatos 10', '11969996663', 'cat@catchme.org', 'teste123', 'INSTITUICAO', '12345678912345'),
(46, 'rodrigo \'\'\'', 'Rua das rosas 100 \"', '0199992994114', 'teste@gmail.com', 'teste123', 'USUARIO', NULL),
(47, 'RODRIGO K NAKATSU', 'Rua das rosas 100', '11969996663', 'rknakatsu@gmail.com', 'teste123', 'USUARIO', NULL),
(48, 'RODRIGO K NAKATSU', 'Rua das rosas 100', '11969996663', '; truncate comentario;', 'teste123', 'USUARIO', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_animal` (`id_animal`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `animal`
--
ALTER TABLE `animal`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT de tabela `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `animal_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`ID`);

--
-- Limitadores para a tabela `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `fk_id_animal` FOREIGN KEY (`id_animal`) REFERENCES `animal` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
