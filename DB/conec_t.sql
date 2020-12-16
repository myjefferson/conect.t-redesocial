-- Banco de dados: `conec.t`
CREATE DATABASE IF NOT EXISTS `conec.t` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `conec.t`;

-- Estrutura da tabela `chat`
CREATE TABLE `chat` (
  `id` int(50) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `id_user_enviou` int(50) NOT NULL,
  `tipo_user_enviou` varchar(50) NOT NULL,
  `id_user_recebeu` int(50) NOT NULL,
  `tipo_user_recebeu` varchar(50) NOT NULL,
  `mensagem` text NOT NULL,
  `hour` date NOT NULL
) CHARACTER SET utf8 COLLATE utf8_general_ci;

-- Estrutura da tabela `cliente`
CREATE TABLE `cliente` (
  `id_cli` int(40) PRIMARY KEY AUTO_INCREMENT NOT NULL,
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
) CHARACTER SET utf8 COLLATE utf8_general_ci;

-- Estrutura da tabela `cod_recpassword`
CREATE TABLE `cod_recpassword` (
  `id` int(30) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `id_user` int (50),
  `type_user` varchar(20),
  `codRandom` text NOT NULL
) CHARACTER SET utf8 COLLATE utf8_general_ci;

-- Estrutura da tabela `comentarios`
CREATE TABLE `comentarios` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `id_dev` int(11) NOT NULL,
  `comentario` text CHARACTER SET latin1 NOT NULL,
  `post` int(11) NOT NULL,
  `data` date NOT NULL
) CHARACTER SET utf8 COLLATE utf8_general_ci;

-- Estrutura da tabela `comentarioscli`
CREATE TABLE `comentarioscli` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `id_cli` int(11) NOT NULL,
  `comentario` text CHARACTER SET latin1 NOT NULL,
  `post` int(11) NOT NULL,
  `data` date NOT NULL
) CHARACTER SET utf8 COLLATE utf8_general_ci;

-- Estrutura da tabela `demandas`
CREATE TABLE `demandas` (
  `id_dmds` int(20) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `id_cli` int(20) NOT NULL,
  `id_working` int(20) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `objetivo` text NOT NULL,
  `observs` text NOT NULL,
  `prazo` varchar(30) NOT NULL,
  `tipo_money` varchar(200) DEFAULT NULL,
  `rec_dinheiro` varchar(40) NOT NULL
) CHARACTER SET utf8 COLLATE utf8_general_ci;

-- Estrutura da tabela `desenvolvedor`
CREATE TABLE `desenvolvedor` (
  `id_dev` int(18) PRIMARY KEY AUTO_INCREMENT NOT NULL,
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
) CHARACTER SET utf8 COLLATE utf8_general_ci;

-- Estrutura da tabela `likes`
CREATE TABLE `likes` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `post` int(11) NOT NULL,
  `id_dev` varchar(200) NOT NULL,
  `id_cli` varchar(200) NOT NULL
) CHARACTER SET utf8 COLLATE utf8_general_ci;

-- Estrutura da tabela `postagens`
CREATE TABLE `postagens` (
  `id_post` int(50) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `id_cli` int(50) NULL,
  `id_dev` int(50) NULL,
  `data` date NOT NULL,
  `texto` text NOT NULL,
  `imagem` text NOT NULL,
  `num_likes` int(50) NOT NULL,
  `num_coments` int(50) NOT NULL
) CHARACTER SET utf8 COLLATE utf8_general_ci;

-- Estrutura da tabela `programas_aval`
CREATE TABLE `programas_aval` (
  `id` int(20) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `id_prog` int(20) NOT NULL,
  `id_dev` int(20) NOT NULL,
  `id_cli` int(20) NOT NULL,
  `qtde_estrela` int(20) NOT NULL,
  `data` date NOT NULL
) CHARACTER SET utf8 COLLATE utf8_general_ci;

-- Estrutura da tabela `software_store`
CREATE TABLE `software_store` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `id_dev` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `site` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `plataforma` varchar(100) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `preco` varchar(100) DEFAULT NULL,
  `icone` varchar(80) DEFAULT NULL,
  `arc_windows` text DEFAULT NULL,
  `rating` varchar(20) DEFAULT NULL,
  `nome_dev` varchar(200) DEFAULT NULL,
  `parentalRating` varchar(20) DEFAULT NULL,
  `smallAbout` varchar(130) DEFAULT NULL
) CHARACTER SET utf8 COLLATE utf8_general_ci;