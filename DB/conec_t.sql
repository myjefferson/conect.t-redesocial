SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Banco de dados: `conect`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `chat`
--

CREATE DATABASE `conec.t`;

CREATE TABLE `chat` (
  `id` int(50) NOT NULL,
  `id_user_enviou` int(50) NOT NULL,
  `tipo_user_enviou` varchar(50) NOT NULL,
  `id_user_recebeu` int(50) NOT NULL,
  `tipo_user_recebeu` varchar(50) NOT NULL,
  `mensagem` text NOT NULL,
  `hour` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `chat`
--

INSERT INTO `chat` (`id`, `id_user_enviou`, `tipo_user_enviou`, `id_user_recebeu`, `tipo_user_recebeu`, `mensagem`, `hour`) VALUES
(24, 5, 'dev', 6, 'dev', 'ola tudo', '2020-07-15'),
(25, 5, 'dev', 6, 'dev', 'Funciona ainda?', '2020-08-28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cli` int(40) NOT NULL,
  `type_user` varchar(20) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `dataNascimento` date NOT NULL,
  `celular` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `senha` text NOT NULL,
  `foto` text NOT NULL,
  `ft_capa` text NOT NULL,
  `descricao` text NOT NULL,
  `forKey` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cod_recpassword`
--

CREATE TABLE `cod_recpassword` (
  `id` int(30) NOT NULL,
  `codRandom` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `id_dev` int(11) NOT NULL,
  `comentario` text CHARACTER SET latin1 NOT NULL,
  `post` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarioscli`
--

CREATE TABLE `comentarioscli` (
  `id` int(11) NOT NULL,
  `id_cli` int(11) NOT NULL,
  `comentario` text CHARACTER SET latin1 NOT NULL,
  `post` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `demandas`
--

CREATE TABLE `demandas` (
  `id_dmds` int(20) NOT NULL,
  `id_cli` int(20) NOT NULL,
  `id_working` int(20) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `objetivo` text NOT NULL,
  `observs` text NOT NULL,
  `prazo` varchar(30) NOT NULL,
  `tipo_money` varchar(200) DEFAULT NULL,
  `rec_dinheiro` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `desenvolvedor`
--

CREATE TABLE `desenvolvedor` (
  `id_dev` int(18) NOT NULL,
  `type_user` varchar(20) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `dataNascimento` datetime NOT NULL,
  `genero` varchar(10) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `foto` text NOT NULL,
  `ft_capa` text NOT NULL,
  `descricao` text NOT NULL,
  `termos` tinyint(1) NOT NULL,
  `forKey` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `post` int(11) NOT NULL,
  `id_dev` varchar(200) NOT NULL,
  `id_cli` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `postagens`
--

CREATE TABLE `postagens` (
  `id_post` int(100) NOT NULL,
  `id_cli` int(100) NOT NULL,
  `id_dev` int(100) NOT NULL,
  `data` date NOT NULL,
  `texto` text NOT NULL,
  `imagem` text NOT NULL,
  `num_likes` int(100) NOT NULL,
  `num_coments` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `programas_aval`
--

CREATE TABLE `programas_aval` (
  `id` int(20) NOT NULL,
  `id_prog` int(20) NOT NULL,
  `id_dev` int(20) NOT NULL,
  `id_cli` int(20) NOT NULL,
  `qtde_estrela` int(20) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `programas_loja`
--

CREATE TABLE `programas_loja` (
  `id` int(11) NOT NULL,
  `id_dev` int(11) NOT NULL,
  `titulo` varchar(120) NOT NULL,
  `site` text NOT NULL,
  `email` text NOT NULL,
  `plataforma` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `preco` varchar(100) NOT NULL,
  `icone` varchar(80) NOT NULL,
  `arc_windows` text DEFAULT NULL,
  `aval_1` int(50) DEFAULT NULL,
  `aval_2` int(50) DEFAULT NULL,
  `aval_3` int(50) DEFAULT NULL,
  `aval_4` int(50) DEFAULT NULL,
  `aval_5` int(50) DEFAULT NULL,
  `nome_dev` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cli`);

--
-- Índices para tabela `cod_recpassword`
--
ALTER TABLE `cod_recpassword`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `comentarioscli`
--
ALTER TABLE `comentarioscli`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `demandas`
--
ALTER TABLE `demandas`
  ADD PRIMARY KEY (`id_dmds`);

--
-- Índices para tabela `desenvolvedor`
--
ALTER TABLE `desenvolvedor`
  ADD PRIMARY KEY (`id_dev`);

--
-- Índices para tabela `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `postagens`
--
ALTER TABLE `postagens`
  ADD PRIMARY KEY (`id_post`);

--
-- Índices para tabela `programas_aval`
--
ALTER TABLE `programas_aval`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `programas_loja`
--
ALTER TABLE `programas_loja`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cli` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cod_recpassword`
--
ALTER TABLE `cod_recpassword`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `comentarioscli`
--
ALTER TABLE `comentarioscli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `demandas`
--
ALTER TABLE `demandas`
  MODIFY `id_dmds` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `desenvolvedor`
--
ALTER TABLE `desenvolvedor`
  MODIFY `id_dev` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `postagens`
--
ALTER TABLE `postagens`
  MODIFY `id_post` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `programas_aval`
--
ALTER TABLE `programas_aval`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `programas_loja`
--
ALTER TABLE `programas_loja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
