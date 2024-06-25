-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25/06/2024 às 03:02
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bilio`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `autores`
--

CREATE TABLE `autores` (
  `id_autor` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `autores`
--

INSERT INTO `autores` (`id_autor`, `nome`) VALUES
(1, 'Sêneca'),
(5, 'Napoleon Hill');

-- --------------------------------------------------------

--
-- Estrutura para tabela `autores_livros`
--

CREATE TABLE `autores_livros` (
  `id` int(11) NOT NULL,
  `autor_id` int(11) NOT NULL,
  `livro_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `autores_livros`
--

INSERT INTO `autores_livros` (`id`, `autor_id`, `livro_id`) VALUES
(9, 1, 9),
(10, 5, 10);

-- --------------------------------------------------------

--
-- Estrutura para tabela `generos`
--

CREATE TABLE `generos` (
  `id_genero` int(11) NOT NULL,
  `descritivo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `generos`
--

INSERT INTO `generos` (`id_genero`, `descritivo`) VALUES
(1, 'Filosofia'),
(3, 'Marketing');

-- --------------------------------------------------------

--
-- Estrutura para tabela `generos_livros`
--

CREATE TABLE `generos_livros` (
  `id` int(11) NOT NULL,
  `genero_id` int(11) NOT NULL,
  `livro_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `generos_livros`
--

INSERT INTO `generos_livros` (`id`, `genero_id`, `livro_id`) VALUES
(9, 1, 9),
(10, 3, 10);

-- --------------------------------------------------------

--
-- Estrutura para tabela `livros`
--

CREATE TABLE `livros` (
  `id_livro` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descritivo` text DEFAULT NULL,
  `imagem` varchar(9999) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `livros`
--

INSERT INTO `livros` (`id_livro`, `titulo`, `descritivo`, `imagem`) VALUES
(9, 'Cartas de um Estoico Vol.1', 'Sêneca forjou nestas cartas sua obra-prima, o seu testamento vital, no qual inumeráveis preocupações e experiências são abordadas. As cartas constituem uma pedagogia em ação, nas quais o mestre se dedica ao progresso do discípulo, Lucílio. Nelas Sêneca apresenta uma síntese dos seus princípios de sabedoria, virtude e liberdade. Sêneca aborda a busca da felicidade, o medo da morte, a desilusão, a amizade, a velhice e a equanimidade perante as vicissitudes além de levantar uma das principais questões dos nossos dias: como conjugar qualidade de vida e tempo escasso. Os conselhos do filósofo podem nos ajudar, assim, a desenvolver a coragem necessária para encarar a realidade e para lidar com ela da melhor maneira possível.', './assets/img/21f16165ef33ad14a4ad1c2aeb6bcd.jpg'),
(10, 'Mais esperto que o diabo.', 'Neste livro, inédito no Brasil, você vai descobrir, após 75 anos de segredo, por meio dessa entrevista exclusiva que Napoleon Hill fez, quebrando o código secreto da mente do Diabo: Quem é o Diabo? Onde ele habita? Quais suas principais armas mentais? Quem são os alienados e de que forma eles ou elas se alienam? De que forma o Diabo influencia a nossa vida do dia a dia? Como a sua dominação influencia nossas atitudes? O que é o medo? Como nossos líderes religiosos e nossos professores são afetados pelo Diabo? Quais as armas que nós, seres humanos, possuímos para combater a dominação do Diabo? Qual a visão do Diabo sobre a energia sexual? Como buscar uma vida cheia de realizações, valorizando a felicidade e a liberdade? Essas perguntas e muitas outras são respondidas pelo próprio Diabo, que se autodenomina \"Sua Majestade\", de acordo com Napoleon Hill. O seu propósito, escrito com suas próprias palavras, é ajudar o ser humano a descobrir o seu real potencial, desvendando as armadilhas mentais que os homens e as mulheres deste mundo criam para si mesmos, sabotando a sua própria liberdade e o seu próprio direito de viver uma vida cheia de desafios, alegria e liberdade. Escrito em 1938, após uma das maiores crises econômicas, e precedendo a Segunda Guerra Mundial, este livro não somente é uma fonte de inspiração e coragem, mas deve ser considerado um manual para todas aquelas pessoas que desejam', './assets/img/c23f3c09f0318df354bcb0b99ee1ad.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `livros_reservados`
--

CREATE TABLE `livros_reservados` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_livro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `livros_reservados`
--

INSERT INTO `livros_reservados` (`id`, `id_usuario`, `id_livro`) VALUES
(1, 1, 6),
(3, 1, 6),
(4, 1, 7),
(5, 2, 6),
(6, 1, 7),
(7, 3, 7),
(8, 3, 8),
(9, 2, 9),
(10, 1, 10),
(11, 1, 9);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `adm` varchar(256) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `email`, `senha`, `adm`, `nome`) VALUES
(1, 'adm@luannzin.com', '680bab21b7cd06cb5d452b85922a680a', 'true', 'luannzin'),
(2, 'vania@vania.com', '081c2ce8528c443cc4be69d4096c9778', 'false', 'Vânia'),
(3, 'geleia@email.com', '064666e44217ed32762188ba76020034', 'false', 'geleia'),
(4, 'vania2@vania.com', '081c2ce8528c443cc4be69d4096c9778', 'false', 'Vania 2');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`id_autor`);

--
-- Índices de tabela `autores_livros`
--
ALTER TABLE `autores_livros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `autor_id` (`autor_id`),
  ADD KEY `livro_id` (`livro_id`);

--
-- Índices de tabela `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id_genero`);

--
-- Índices de tabela `generos_livros`
--
ALTER TABLE `generos_livros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genero_id` (`genero_id`),
  ADD KEY `livro_id` (`livro_id`);

--
-- Índices de tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id_livro`);

--
-- Índices de tabela `livros_reservados`
--
ALTER TABLE `livros_reservados`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `autores`
--
ALTER TABLE `autores`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `autores_livros`
--
ALTER TABLE `autores_livros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `generos`
--
ALTER TABLE `generos`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `generos_livros`
--
ALTER TABLE `generos_livros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `id_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `livros_reservados`
--
ALTER TABLE `livros_reservados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `autores_livros`
--
ALTER TABLE `autores_livros`
  ADD CONSTRAINT `autores_livros_ibfk_1` FOREIGN KEY (`autor_id`) REFERENCES `autores` (`id_autor`),
  ADD CONSTRAINT `autores_livros_ibfk_2` FOREIGN KEY (`livro_id`) REFERENCES `livros` (`id_livro`);

--
-- Restrições para tabelas `generos_livros`
--
ALTER TABLE `generos_livros`
  ADD CONSTRAINT `generos_livros_ibfk_1` FOREIGN KEY (`genero_id`) REFERENCES `generos` (`id_genero`),
  ADD CONSTRAINT `generos_livros_ibfk_2` FOREIGN KEY (`livro_id`) REFERENCES `livros` (`id_livro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
