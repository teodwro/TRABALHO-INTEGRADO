-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Nov-2024 às 16:19
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
-- Banco de dados: `estagio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidades`
--

CREATE TABLE `cidades` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE `cursos` (
  `id_curso` int(11) NOT NULL,
  `nome_curso` varchar(255) NOT NULL,
  `professor_curso` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id_curso`, `nome_curso`, `professor_curso`) VALUES
(10, 'INFORMATICAiiis', '2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresas`
--

CREATE TABLE `empresas` (
  `id_empresa` int(11) NOT NULL,
  `nome_empresa` varchar(255) NOT NULL,
  `endereco_empresa` varchar(255) DEFAULT NULL,
  `telefone_empresa` varchar(20) DEFAULT NULL,
  `email_empresa` varchar(255) DEFAULT NULL,
  `cnpj_empresa` varchar(18) NOT NULL,
  `representante_empresa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estagios`
--

CREATE TABLE `estagios` (
  `id_estagio` int(11) NOT NULL,
  `id_estudante` int(11) DEFAULT NULL,
  `id_curso_estagio` int(11) NOT NULL,
  `id_professor_orientador` int(11) DEFAULT NULL,
  `id_professor_coorientador` int(11) DEFAULT NULL,
  `encaminhamentos_secoes_estagio` text DEFAULT NULL,
  `plano_atividades` varchar(255) DEFAULT NULL,
  `relatorio_final` varchar(255) DEFAULT NULL,
  `ficha_autoavaliacao` varchar(255) DEFAULT NULL,
  `ficha_avaliacao_empresa` varchar(255) DEFAULT NULL,
  `termo_compromisso` varchar(255) DEFAULT NULL,
  `supervisor_empresa` varchar(255) DEFAULT NULL,
  `cargo_formacao_supervisor` varchar(255) DEFAULT NULL,
  `telefone_supervisor_empresa` varchar(15) DEFAULT NULL,
  `email_supervisor_empresa` varchar(255) DEFAULT NULL,
  `numero_convenio` varchar(50) DEFAULT NULL,
  `tipo_processo` varchar(100) DEFAULT NULL,
  `status_processo` varchar(50) DEFAULT NULL,
  `periodo_estagio_inicio` date DEFAULT NULL,
  `periodo_estagio_fim` date DEFAULT NULL,
  `carga_horaria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estudantes`
--

CREATE TABLE `estudantes` (
  `id` int(11) NOT NULL,
  `nome_estudante` varchar(255) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `rg` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `endereco` text NOT NULL,
  `cidade_id` int(11) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `matricula` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

CREATE TABLE `professores` (
  `id_professor` int(11) NOT NULL,
  `nome_professor` varchar(255) NOT NULL,
  `email_professor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `professores`
--

INSERT INTO `professores` (`id_professor`, `nome_professor`, `email_professor`) VALUES
(2, 'RAFAEL JAQUES', 'RAFAELJAQUES@GMAIL.COM');

-- --------------------------------------------------------

--
-- Estrutura da tabela `representantes`
--

CREATE TABLE `representantes` (
  `id_representante` int(11) NOT NULL,
  `nome_representante` varchar(255) NOT NULL,
  `funcao_representante` varchar(255) DEFAULT NULL,
  `cpf_representante` varchar(11) NOT NULL,
  `rg_representante` varchar(20) DEFAULT NULL,
  `email_representante` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nivel` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `senha`, `nivel`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 2),
(5, 'professor', '202cb962ac59075b964b07152d234b70', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cidades`
--
ALTER TABLE `cidades`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`);

--
-- Índices para tabela `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id_empresa`),
  ADD KEY `representante_empresa` (`representante_empresa`);

--
-- Índices para tabela `estagios`
--
ALTER TABLE `estagios`
  ADD PRIMARY KEY (`id_estagio`),
  ADD KEY `estagios_ibfk_2` (`id_estudante`),
  ADD KEY `estagios_ibfk_3` (`id_curso_estagio`),
  ADD KEY `estagios_ibfk_4` (`id_professor_orientador`),
  ADD KEY `estagios_ibfk_5` (`id_professor_coorientador`);

--
-- Índices para tabela `estudantes`
--
ALTER TABLE `estudantes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `matricula` (`matricula`),
  ADD KEY `cidade_id` (`cidade_id`);

--
-- Índices para tabela `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`id_professor`);

--
-- Índices para tabela `representantes`
--
ALTER TABLE `representantes`
  ADD PRIMARY KEY (`id_representante`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cidades`
--
ALTER TABLE `cidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `estagios`
--
ALTER TABLE `estagios`
  MODIFY `id_estagio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `estudantes`
--
ALTER TABLE `estudantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `professores`
--
ALTER TABLE `professores`
  MODIFY `id_professor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `representantes`
--
ALTER TABLE `representantes`
  MODIFY `id_representante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `empresas`
--
ALTER TABLE `empresas`
  ADD CONSTRAINT `empresas_ibfk_1` FOREIGN KEY (`representante_empresa`) REFERENCES `representantes` (`id_representante`);

--
-- Limitadores para a tabela `estagios`
--
ALTER TABLE `estagios`
  ADD CONSTRAINT `estagios_ibfk_2` FOREIGN KEY (`id_estudante`) REFERENCES `estudantes` (`id`),
  ADD CONSTRAINT `estagios_ibfk_3` FOREIGN KEY (`id_curso_estagio`) REFERENCES `cursos` (`id_curso`),
  ADD CONSTRAINT `estagios_ibfk_4` FOREIGN KEY (`id_professor_orientador`) REFERENCES `professores` (`id_professor`),
  ADD CONSTRAINT `estagios_ibfk_5` FOREIGN KEY (`id_professor_coorientador`) REFERENCES `professores` (`id_professor`);

--
-- Limitadores para a tabela `estudantes`
--
ALTER TABLE `estudantes`
  ADD CONSTRAINT `estudantes_ibfk_1` FOREIGN KEY (`cidade_id`) REFERENCES `cidades` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
