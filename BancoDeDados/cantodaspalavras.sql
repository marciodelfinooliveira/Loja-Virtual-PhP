-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Dez-2023 às 23:41
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
-- Banco de dados: `cantodaspalavras`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `idcarrinho` int(11) NOT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `idlivro` int(11) DEFAULT NULL,
  `quantidade` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `carrinho`
--

INSERT INTO `carrinho` (`idcarrinho`, `idusuario`, `idlivro`, `quantidade`) VALUES
(50, NULL, 24, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contatos`
--

CREATE TABLE `contatos` (
  `idcontato` int(11) NOT NULL,
  `nomecontato` varchar(255) NOT NULL,
  `emailcontato` varchar(255) NOT NULL,
  `mensagem` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `contatos`
--

INSERT INTO `contatos` (`idcontato`, `nomecontato`, `emailcontato`, `mensagem`) VALUES
(6, 'Márcio Delfino', 'marcio@user.com', 'Bom dia !! Adorei o Site !!');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `idlivro` int(11) NOT NULL,
  `nomelivro` varchar(255) NOT NULL,
  `nomeautor` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `preco` decimal(7,2) NOT NULL,
  `tema` varchar(255) NOT NULL,
  `imagem` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`idlivro`, `nomelivro`, `nomeautor`, `descricao`, `preco`, `tema`, `imagem`) VALUES
(22, 'Opinião não se Discute', 'Edyr Proença', ' Este livro reúne algumas das “coisas do futebol” que Edyr recorda como se estivesse numa roda de amigos, descontraído, abrindo-se ao leitor no desfiar divagações ao correr das horas. Do ponto de vista da exatidão, são conversas de ruo preciso, num vocabulário cheio de cadências da linguagem coloquial. ', 49.99, 'Crônicas', 'assets/img/opiniao-nao-se-discute1-244f67c086e32ffdaa16892560851073-480-0.webp'),
(23, 'O Rei e o Jardineiro', 'João de Jesus Paes Loureiro', 'Os jardins, os perfumes e as cores são importantes para nos alegrar. O rei mau tentou acabar com as flores do País do Sol. Encarcerou o jardineiro. Os pássaros morreram, e, da terra onde eles caíram, nasceram rosas. Para nós fica a mensagem: não se pode impedir que uma lei que nos ultrapassa seja cumprida, e nem que a alegria seja apagada.', 59.99, 'Infantil', 'assets/img/loureiro-o-rei-e-o-jardineiro1-6ef0fc8e4e597183b316856304411798-1024-1024.webp'),
(24, 'Entre Panelas e Sentidos', 'Auda Piani Tavares', 'Reconhecer-se através do que se come e como coletar e produzir o que se come estão expostos no livro por meio das lembranças, encontros, referências ancestrais, do lugar e dos sentidos. É um seguir permanente do saber fazer com o que está disponível na diversidade local, resguardadas as dicotomias entre saberes tradicionais, populares e acadêmicos, organizados dentro de um sistema hierarquizante.', 69.99, 'Culinária, Memórias', 'assets/img/auda-piani1-9ac1af9d3da4273fdb16856302743740-480-0.webp'),
(25, 'Pequeno Manual de Defesa Pessoal', 'Helô D\'Ângelo', 'Como trabalhar a autodefesa e priorizar nossa segurança quando somos treinadas desde a infância a aceitar uma série de violências cotidianas?\r\nDurante a pandemia, a quadrinista Helô D\'Angelo desenvolveu muito medo de andar na rua sozinha. Então, decidiu fazer a oficina de defesa pessoal focada na população LGBTQIAP+ e em mulheres com o professor Gabriel Guarino, organizada pelo Piranhas Team e o Shàoshèng Centro de Cultura Oriental.', 43.99, 'Hq', 'assets/img/pequeno-manual-de-defesa1-b014cf9b9c31d3560316709434273334-640-0.webp'),
(26, 'Barrela', 'Plínio Marcos', 'arrela em quadrinhos é uma adaptação do texto teatral homônimo do dramaturgo brasileiro Plínio Marcos em formato de graphic novel (história em quadrinhos) desenhada por João Pinheiro, que é também coautor do quadrinho Carolina, juntamente com Sirlene Barbosa e do quadrinho depois que o Brasil Acabou, lançado pela editora Veneta.', 69.99, 'Hq', 'assets/img/barrela1-c3cf7cda84ae56b47916699933924780-480-0.webp'),
(27, 'Labirintos da Palavra', 'Vasco Cavalcante', '“Tenho uma lembrança de quando era bem criança, em que eu deitava de costas em uma calçada que tinha próximo à minha casa, e ficava olhando os urubus sobrevoando os céus azuis em volta das nuvens. Talvez tivessem sido esses os meus primeiros poemas”', 77.99, 'Poesia', 'assets/img/vasco-cavalcante-labirintos-da-palavra1-f8e7cb92174503d99216856278029598-480-0.webp'),
(28, 'Ramo de Baños', 'Pere Petit', 'Este livro é a última etapa de uma longa viagem. A primeira se inicia em 1911 com a chegada de Ramon de Baños, técnico de laboratório e  ajudante de câmara, a Belém do Pará como operador e sócio de Joaquim Llopis, proprietário do Cinema Odeón. Nos dois anos seguintes criaram uma produtora para fazer documentários, reportagens e a revista cinematográfica Pará Films Jornal.', 69.99, 'Biografia', 'assets/img/pere-petit-ramon-de-banos1-9977bec3b70a11552816856286960452-480-0.webp'),
(29, 'Andurá', 'João de Jesus', 'Onde tudo é e não é, segundo romance de João de Jesus Paes Loureiro. Por meio da literatura, Paes Loureiro constrói uma cidade do presente, habitada por qualquer um de nós e que se pode situar em qualquer lugar do planeta. Nela, tudo é e não é.', 59.99, 'Prosa', 'assets/img/loureiro-adura1-f1725f579a483082ac16856288912926-480-0.webp'),
(30, 'Diário de uma Mãeconheira', 'Maíra Castanho', 'Mães também trepam, chapam e gozam a vida. Erram, se decepcionam, sacodem a poeira e dão a volta por cima. Passam perrengue, choram, riem, desistem e insistem. Mães não são santas. Mães são mulheres e continuam sendo mulheres depois de parir. Reveja seus conceitos sobre as mães, abra sua mente e entre de cabeça nas crônicas no maior estilo beat da vida de Maíra Castanheiro', 79.99, 'Prosa', 'assets/img/diario-de-uma-mae1-ddba6a3e2d36966aa616699926075608-1024-1024.webp'),
(31, 'Amazônia, Lendas e Mitos', 'Ararê Marrocos', 'Este livro reúne uma pequena descrição de 20 lendas amazônicas ilustradas por belas xilogravuras. As lendas aqui reunidas resultam de pesquisas de campo realizadas de 1995. Ararê visitou diversas localidades no interior da Amazônia para ouvir de seus habitantes as histórias fantásticas que se perpetuaram no imaginário popular e integram a cultura popular da região', 34.99, 'Folclore', 'assets/img/amazonia-lendas-e-mitos-xilogravuras1-58c7e271e65fb8165416523006565760-1024-1024.webp'),
(33, 'Trama das Águas', 'Vários', 'Este livro-trama traz o trabalho de 57 mulheres que expõem em prosa e verso atravessamentos entre gênero, classe, raça, violência, território e afetos. São contos, crônicas e poemas de autoras contemporâneas que mostram a pluralidade e a riqueza da produção literária do estado do Pará', 49.99, 'Contos, Mulheres', 'assets/img/img0491-93cb57ea6bb1c25fc516439007571660-480-0.jpg'),
(34, 'Livro de Marena', 'Vicente Salles', 'Acompanho-o desde 4 de janeiro de 1964, quando me pediu em namoro. A 15 de fevereiro de 1964 me pediu em noivado, quando me ofertou \"Livro de Marena\". Nossas vidas se uniram num ideal de amor e respeito, lutando pela igualdade social através da pesquisa da história e outros assuntos do nosso país, que dentro dos meus limites o ajudo. Decidi acrescentar ao Livro de Marena o poema \"15 cartas menores para Beatriz\". ', 29.99, 'Poesia', 'assets/img/livro-de-marena1-baa36a4fd0ac481d2716162634297295-480-0.webp');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `nomeusuario` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `gerente` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nomeusuario`, `email`, `senha`, `gerente`) VALUES
(1, 'Admin', 'super@admin.com', '21232f297a57a5a743894a0e4a801fc3', 1),
(16, 'Márcio Delfino', 'marcio@user.com', '1b150854805cbe12194c8dbc55c900cd', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`idcarrinho`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `idlivro` (`idlivro`);

--
-- Índices para tabela `contatos`
--
ALTER TABLE `contatos`
  ADD PRIMARY KEY (`idcontato`);

--
-- Índices para tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`idlivro`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `idcarrinho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de tabela `contatos`
--
ALTER TABLE `contatos`
  MODIFY `idcontato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `idlivro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD CONSTRAINT `carrinho_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`),
  ADD CONSTRAINT `carrinho_ibfk_2` FOREIGN KEY (`idlivro`) REFERENCES `livros` (`idlivro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
