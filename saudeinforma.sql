-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Nov-2023 às 15:54
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `saudeinforma`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendimento`
--

CREATE TABLE `atendimento` (
  `id` int(11) NOT NULL,
  `posto_id` int(11) NOT NULL,
  `horario_inicio` varchar(5) NOT NULL,
  `horario_fim` varchar(5) NOT NULL,
  `medico_id` int(11) DEFAULT NULL,
  `tipo` varchar(255) NOT NULL,
  `limite` int(11) NOT NULL,
  `dias_atendimento` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `campanha`
--

CREATE TABLE `campanha` (
  `id` int(11) NOT NULL,
  `identificacao` varchar(100) NOT NULL,
  `data_inicial` date NOT NULL,
  `data_final` date NOT NULL,
  `descricao` text NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `local` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `campanha`
--

INSERT INTO `campanha` (`id`, `identificacao`, `data_inicial`, `data_final`, `descricao`, `imagem`, `local`, `created_at`, `updated_at`) VALUES
(2, 'mudando', '2023-11-09', '2023-12-01', 'mundança', '80bee5604d58cd777256a1554f095542.png', 'Bomdia a todos', '2023-11-02 02:40:54', '2023-11-02 08:52:53'),
(3, 'sacas sdcsacascsc', '2023-11-01', '2023-11-30', 'ascascdcvdfsvfsdvfdvsdv', 'ff7e969e5ee9789ecfa80850a5674032.jpg', 'asdascsacsacsacsacsac', '2023-11-02 03:18:25', '2023-11-02 03:33:54'),
(4, 'add', '2023-11-18', '2023-11-20', 'adicionando', '6d1f9f7c456ab304e17159b6783741dd.png', 'testando adicionar', '2023-11-02 09:08:59', '2023-11-02 09:08:59');

-- --------------------------------------------------------

--
-- Estrutura da tabela `consulta`
--

CREATE TABLE `consulta` (
  `id` int(11) NOT NULL,
  `identificacao` varchar(100) NOT NULL,
  `data_inicial` date NOT NULL,
  `data_final` date NOT NULL,
  `descricao` text NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `local` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `consulta`
--

INSERT INTO `consulta` (`id`, `identificacao`, `data_inicial`, `data_final`, `descricao`, `imagem`, `local`, `created_at`, `updated_at`) VALUES
(4, 'testando', '2023-11-17', '2023-11-30', 'somente tenstando', NULL, 'somente testando', '2023-11-02 09:16:57', '2023-11-02 09:16:57'),
(5, 'alterando', '2023-11-16', '2023-11-05', 'alterando', 'abb6135c384890722752dcfce2f41285.png', 'mudando', '2023-11-02 11:40:17', '2023-11-02 11:42:29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dentista`
--

CREATE TABLE `dentista` (
  `id` int(11) NOT NULL,
  `identificacao` varchar(100) NOT NULL,
  `data_inicial` date NOT NULL,
  `data_final` date NOT NULL,
  `descricao` text NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `local` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `dentista`
--

INSERT INTO `dentista` (`id`, `identificacao`, `data_inicial`, `data_final`, `descricao`, `imagem`, `local`, `created_at`, `updated_at`) VALUES
(4, 'Bom dia', '2023-11-30', '2023-10-30', 'finalmente', '218b5ad9dd2bb77f4083214c072adaf2.png', 'so pra comfirmar', '2023-11-02 11:04:17', '2023-11-02 11:05:36');

-- --------------------------------------------------------

--
-- Estrutura da tabela `gestante`
--

CREATE TABLE `gestante` (
  `id` int(11) NOT NULL,
  `identificacao` varchar(100) NOT NULL,
  `data_inicial` date NOT NULL,
  `data_final` date NOT NULL,
  `descricao` text NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `local` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `gestante`
--

INSERT INTO `gestante` (`id`, `identificacao`, `data_inicial`, `data_final`, `descricao`, `imagem`, `local`, `created_at`, `updated_at`) VALUES
(4, 'as', '2023-11-10', '2023-11-19', 'asdasda', '0828f15f25387f087a3533d6172d5dad.png', '', '2023-11-02 11:25:15', '2023-11-02 11:25:15');

-- --------------------------------------------------------

--
-- Estrutura da tabela `medico`
--

CREATE TABLE `medico` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `area_atuacao` varchar(80) NOT NULL,
  `especializacao` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `medico`
--

INSERT INTO `medico` (`id`, `nome`, `area_atuacao`, `especializacao`, `created_at`, `update_at`) VALUES
(1, 'joão ', 'urologia', 'geriatria', '2023-10-04 22:42:40', '2023-10-04 22:42:40'),
(2, 'joão ', 'urologia', 'geriatria', '2023-10-04 22:42:43', '2023-10-04 22:42:43');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posto_saude`
--

CREATE TABLE `posto_saude` (
  `id` int(11) NOT NULL,
  `identificacao` varchar(150) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `hora_abertura` varchar(5) NOT NULL,
  `hora_fechamento` varchar(5) NOT NULL,
  `dias_funcionamento` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `localizacao` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `posto_saude`
--

INSERT INTO `posto_saude` (`id`, `identificacao`, `endereco`, `telefone`, `hora_abertura`, `hora_fechamento`, `dias_funcionamento`, `localizacao`, `created_at`, `updated_at`) VALUES
(1, 'Posto Caldas do Jorro', 'caldas do jorro', '(75) 99999-9999', '08:00', '17:00', 'segunda,terça, quarta,quinta, sexta', 'sjahdjsahdjhsajdkhsajdhjsahjhjsdfhjdhsdvds', '2023-07-21 20:20:07', '2023-07-21 20:20:07');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `acesso` varchar(75) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `acesso`, `status`) VALUES
(1, 'Administrador Sistema', 'admin@saudeinforma.com.br', '123456', 'administrador', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `atendimento`
--
ALTER TABLE `atendimento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `relacao_posto_atendimento` (`posto_id`),
  ADD KEY `relacao_poosto_medico` (`medico_id`);

--
-- Índices para tabela `campanha`
--
ALTER TABLE `campanha`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `dentista`
--
ALTER TABLE `dentista`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `gestante`
--
ALTER TABLE `gestante`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `posto_saude`
--
ALTER TABLE `posto_saude`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `atendimento`
--
ALTER TABLE `atendimento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `campanha`
--
ALTER TABLE `campanha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `consulta`
--
ALTER TABLE `consulta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `dentista`
--
ALTER TABLE `dentista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `gestante`
--
ALTER TABLE `gestante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `medico`
--
ALTER TABLE `medico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `posto_saude`
--
ALTER TABLE `posto_saude`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `atendimento`
--
ALTER TABLE `atendimento`
  ADD CONSTRAINT `relacao_poosto_medico` FOREIGN KEY (`medico_id`) REFERENCES `medico` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `relacao_posto_atendimento` FOREIGN KEY (`posto_id`) REFERENCES `posto_saude` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
