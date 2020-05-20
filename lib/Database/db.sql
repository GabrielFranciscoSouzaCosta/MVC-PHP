-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 19/05/2020 às 23:33
-- Versão do servidor: 5.7.30-0ubuntu0.18.04.1
-- Versão do PHP: 7.2.24-0ubuntu0.18.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `serie-criando-site`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentario`
--

CREATE TABLE `comentario` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `mensagem` text,
  `id_postagem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `comentario`
--

INSERT INTO `comentario` (`id`, `nome`, `mensagem`, `id_postagem`) VALUES
(1, 'Ronaldinho Gaúcho', 'Quer namorar comigo?', 1),
(2, 'Leonardo Da Vinci', 'simplicity is the ultimate sophistication', 1),
(3, 'Seu Madruga', 'As pessoas boas devem amar seus inimigos', 2),
(4, 'Seu Madruga', 'Não existe trabalho ruim. O ruim é ter que trabalhar.', 2),
(37, 'asdf', 'asdf', 7),
(38, 'gabriel', 'meu comentario', 7),
(39, 'asdf', 'asdf', 7),
(40, 'outro cara', 'outro comentario', 2),
(41, 'asdfasdf', 'asdfasdf', 7),
(42, 'outro cara', 'asdfasdf', 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `postagem`
--

CREATE TABLE `postagem` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `conteudo` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `postagem`
--

INSERT INTO `postagem` (`id`, `titulo`, `conteudo`) VALUES
(1, 'Primeira postagem', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit dolorem minus est, dolorum voluptatem necessitatibus, eaque earum atque animi blanditiis debitis perferendis consequuntur nobis. Ullam ipsam minus nisi quaerat deleniti!'),
(2, 'Segunda Postagem', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit dolorem minus est, dolorum voluptatem necessitatibus, eaque earum atque animi blanditiis debitis perferendis consequuntur nobis. Ullam ipsam minus nisi quaerat deleniti!'),
(3, 'Terceira Postagem', 'Conteúdo da Terceira Postagem');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `postagem`
--
ALTER TABLE `postagem`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT de tabela `postagem`
--
ALTER TABLE `postagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;