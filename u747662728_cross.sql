-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 18-Dez-2023 às 14:08
-- Versão do servidor: 10.6.14-MariaDB-cll-lve
-- versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `u747662728_cross`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(80) DEFAULT NULL,
  `senha` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`id`, `email`, `senha`) VALUES
(1, 'atendimento@greenewgroup.com', '356a192b7913b04c54574d18c28d46e6395428ab'),
(3, 'patricia.a.dreosso@pfizer.com', 'da4b9237bacccdf19c0760cab7aec4a8359010b0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `email_responsavel` varchar(500) DEFAULT NULL,
  `area_atuacao` varchar(500) DEFAULT NULL,
  `pergunta_1` longtext NOT NULL,
  `pergunta_2` longtext NOT NULL,
  `pergunta_3` longtext NOT NULL,
  `pergunta_4` longtext NOT NULL,
  `pergunta_5` longtext NOT NULL,
  `arquivo` varchar(100) NOT NULL,
  `data_insert` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `email_responsavel`, `area_atuacao`, `pergunta_1`, `pergunta_2`, `pergunta_3`, `pergunta_4`, `pergunta_5`, `arquivo`, `data_insert`) VALUES
(5, 'marystella', 'marystella.massuminishizaki@pfizer.com', 'marystella.massuminishizaki@pfizer.com ,  ,  ,  , ', '', '..', '..', '..', '..', '..', '8210-OKRs no Omnichannel de Pediatria.pptx', '2023-10-05 21:36:15'),
(12, 'tiago', 'tiago.santaella@pfizer.com', ' , leticia.c.barros@pfizer.com ,  , gabriel.cunhapaschoal@pfizer.com , brunarafaela.bozelli@pfizer.com', '', '..', '..', '..', '..', '..', '6173-Symptom TRacker & Doc Finder.pptx', '2023-10-05 21:36:07'),
(13, 'valesca', 'valesca.henrique@gmail.com', 'patricia.a.dreosso@pfizer.com ,  ,  ,  , ', '', '..', '..', '..', '..', '..', '8814-Arquivo-de-Inscrição_SANTA MARCELINA.pptx', '2023-10-05 21:35:41'),
(14, 'VitorHugo', 'VitorHugo.VieiradeLima@pfizer.com', 'VitorHugo.VieiradeLima@pfizer.com , lucas.silvanoanselmodorsa@pfizer.com , vitoria.zanardo@pfizer.com , milena.andrade@pfizer.com , ', '', '..', '..', '..', '..', '..', '8791-Crosspolination_NEXT.pptx', '2023-10-05 21:35:26'),
(16, 'Vitoria Zanardo', 'vitoria.zanardo@pfizer.com', 'vitoria.zanardo@pfizer.com , juliana.moratta@pfizer.com , malena.ribeirodeoliveira@pfizer.com , fabio.conde@pfizer.com , camila.papoy@pfizer.com', '', '..', '..', '..', '..', '..', '1835-Cross Pollination_Webinars.pptx', '2023-10-06 01:48:02'),
(17, 'Talita Belandrino Bordon', 'talita.belandrinobordon@pfizer.com', 'talita.belandrinobordon@pfizer.com , LuizPaulo.Mattos@pfizer.com , Flavia.M.Oliveira@pfizer.com , Ilana.Osmo@pfizer.com , Marcelo.Santos@pfizer.com', '', '..', '..', '..', '..', '..', '6694-20231006_Arquivo-de-Inscrição_Segmentação Clínicas Prevenar.pptx', '2023-10-06 12:00:40'),
(18, 'Marcos Castro', 'marcos.castro3@pfizer.com', ' ,  ,  ,  , ', '', '..', '..', '..', '..', '..', '5320-Cross-Polination Life Care.pptx', '2023-10-06 13:26:07'),
(19, 'Gabriela Diccini e Revisores COE Brasil', 'gabriela.diccini@pfizer.com', 'gabriela.diccini@pfizer.com ,  ,  ,  , ', '', '..', '..', '..', '..', '..', '184-Gabriela Diccini_Arquivo-de-Inscrição.pptx', '2023-10-06 19:53:00'),
(20, 'Fernanda Espinoza de Farias', 'fernanda.farias@pfizer.com', ' , eduardo.miyake@pfizer.com , valesca.henrique@pfizer.com , fernanda.farias@pfizer.com , ', '', '..', '..', '..', '..', '..', '3316-061023_CrossPolination_LíderançaÁgil_HospitalNipoBrasileiro.pptx', '2023-10-06 21:23:57'),
(21, 'Camila Papoy Taddone', 'camila.papoy@pfizer.com', 'milena.andrade@pfizer.com ,  ,  ,  , ', '', '..', '..', '..', '..', '..', '356-Arquivo-de-Inscrição_vascularpro.pptx', '2023-10-06 21:40:28'),
(22, 'Juliana Moratta', 'juliana.moratta@pfizer.com', 'Juliana.Moratta@pfizer.com , Fabio.Conde@pfizer.com , Vitoria.Zanardo@pfizer.com , camila.papoy@pfizer.com , Malena.RibeirodeOliveira@pfizer.com', '', '..', '..', '..', '..', '..', '6479-Arquivo-de-Inscrição.pptx  -  Entrega Amostras Eliquis.pptx', '2023-10-07 01:20:57'),
(23, 'André Zansávio', 'andre.zansavio@pfizer.com', 'Marcos.Barbosa@pfizer.com ,  ,  ,  , ', '', '..', '..', '..', '..', '..', '4048-Arquivo-de-Inscrição_Análise Lançamento de Bosulif.pptx', '2023-10-09 17:22:13'),
(24, 'Edneia Gomes', 'edneia.p.gomes@pfizer.com', 'edneia.p.gomes@pfizer.com , emerson.silva@pfizer.com ,  ,  , ', '', '..', '..', '..', '..', '..', '1513-Melhorias interaçoes digitais.pptx', '2023-10-10 11:55:18'),
(25, 'David Campos Silva', 'david.silva2@pfizer.com', ' , david.silva2@pfizer.com , leonardo.dasilva@pfizer.com , luizpaulo.mattos@pfizer.com , ', '', '..', '..', '..', '..', '..', '58-Arquivo-de-Inscrição.pptx', '2023-10-10 13:27:28'),
(26, 'Vitor Hugo Vieira de Lima', 'vitorhugo.vieiradelima@pfizer.com', 'vitorhugo.vieiradelima@pfizer.com , lucas.silvanoanselmodorsa@pfizer.com , bianca.almeida@pfizer.com , priscila.guarizzo@pfizer.com , ', '', '..', '..', '..', '..', '..', '3201-Crosspolination_Samples2.pptx', '2023-10-10 17:37:54'),
(27, 'Carolinne dos Santos e Sousa.', 'carolinne.dossantosesousa@pfizer.com', ' , Redson.Silva@pfizer.com , monica.pereira@pfizer.com , rafaela.delourdeslopessoares@pfizer.com , ', '', '..', '..', '..', '..', '..', '3679-Cross Pollination.pptx', '2023-10-10 18:36:59'),
(28, 'Amanda Domingues', 'amanda.m.domingues@pfizer.com', 'Monica.Olivieri@pfizer.com , Thieny.KaliliBaffi@pfizer.com ,  ,  , ', '', '..', '..', '..', '..', '..', '5596-Segmentação_Reuma&Gastro.pptx', '2023-10-10 19:40:59'),
(29, 'Dimitre Lima', 'dimitre.lima@pfizer.com', 'dimitre.lima@pfizer.com  , artur.rodrigues@pfizer.com ,  ,  , ', '', '..', '..', '..', '..', '..', '3371-Cross-Polination-Anemia.pptx', '2023-10-10 20:11:26'),
(30, 'LILIS AUGUTA RORIGUES', 'lilis.rodrigues@pfizer.com', 'patricia.a.dreosso@pfizer.com ,  ,  ,  , ', '', '..', '..', '..', '..', '..', '5171-Arquivo-de-Inscrição.pptx', '2023-10-10 20:21:23'),
(31, 'Vitor Hugo Vieira de Lima', 'vitorhugo.vieiradeliam@pfizer.com', 'vitorhugo.vieiradeliam@pfizer.com , joao.moreno@pfizer.com , lucas.silvanoanselmodorsa@pfizer.com ,  , ', '', '..', '..', '..', '..', '..', '6658-CrossPolination_RX.pptx', '2023-10-10 20:32:33'),
(32, 'Karina Franzolini Barile', 'karina.franzolini@pfizer.com', 'patricia.a.dreosso@pfizer.com ,  ,  ,  , ', '', '..', '..', '..', '..', '..', '2342-Arquivo-de-Inscrição_ Senior Heroes_Karina Barile.pptx', '2023-10-10 21:47:10'),
(33, 'Fábio Carmo', 'fabio.carmo@pfizer.com', 'andre.zansavio@pfizer.com , mayara.pinter@pfizer.com ,  ,  , ', '', '..', '..', '..', '..', '..', '8511-Arquivo-de-Inscrição_FabioCarmo.pptx', '2023-10-10 23:43:36');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
