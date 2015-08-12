-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04-Maio-2015 às 02:22
-- Versão do servidor: 5.6.15-log
-- PHP Version: 5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbdidatico`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administradores`
--

CREATE TABLE IF NOT EXISTS `administradores` (
  `administrador` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `situacao` char(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `administradores`
--

INSERT INTO `administradores` (`administrador`, `nome`, `email`, `senha`, `situacao`) VALUES
(630941, 'carlos augusto ADM', 'cah.augusto-mg@hotmail.com', '26e4f0aec6ab6290f1538840149e1ceed84ec59793a290ea05b999ec736cf94828e0c7b15f2c1a3888548a64bc7eaecf5edc574a5a5d130f80fe77c74ccf3aad', 'P');

-- --------------------------------------------------------

--
-- Estrutura da tabela `alternativas`
--

CREATE TABLE IF NOT EXISTS `alternativas` (
  `questao` int(11) NOT NULL,
  `subquestao` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `alternativa` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `descricao_alternativa` text COLLATE utf8_unicode_ci NOT NULL,
  `data_criacao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `alternativas`
--

INSERT INTO `alternativas` (`questao`, `subquestao`, `alternativa`, `descricao_alternativa`, `data_criacao`) VALUES
(1, '', '1', 'Pós-doutorado', '2015-05-02'),
(1, '', '2', 'Doutor(a)', '2015-05-02'),
(1, '', '3', 'Mestre(a)', '2015-05-02'),
(1, '', '4', 'Especialista', '2015-05-02'),
(1, '', '5', 'Graduado', '2015-05-02'),
(2, '', '1', '1', '2015-05-02'),
(2, '', '2', '2', '2015-05-02'),
(2, '', '3', '3', '2015-05-02'),
(3, '', '1', 'Sim', '2015-05-02'),
(3, '', '2', 'Não', '2015-05-02'),
(4, '', '1', 'Muito importante', '2015-05-02'),
(4, '', '2', 'De regular importância', '2015-05-02'),
(4, '', '3', 'Pouco importante', '2015-05-02'),
(4, '', '4', 'De nenhuma importância', '2015-05-02'),
(4, '', '5', 'Não sei', '2015-05-02'),
(5, '', '1', 'Muito importante', '2015-05-02'),
(5, '', '2', 'De regular importância', '2015-05-02'),
(5, '', '3', 'Pouco importante', '2015-05-02'),
(5, '', '4', 'De nenhuma importância', '2015-05-02'),
(5, '', '5', 'Não sei', '2015-05-02'),
(6, '', '1', 'contextualização', '2015-05-02'),
(6, '', '2', 'interdisciplinaridade', '2015-05-02'),
(6, '', '3', 'valorização dos conhecimentos prévios dos alunos', '2015-05-02'),
(6, '', '4', 'participação concernente ao exercício pleno da cidadania', '2015-05-02'),
(6, '', '5', 'nenhum', '2015-05-02'),
(6, '', '6', 'todos', '2015-05-02'),
(7, '', '1', 'Muito importante', '2015-05-02'),
(7, '', '2', 'De regular importância', '2015-05-02'),
(7, '', '3', 'Pouco importante', '2015-05-02'),
(7, '', '4', 'De nenhuma importância', '2015-05-02'),
(7, '', '5', 'Não sei', '2015-05-02'),
(6, '6.1', '1', 'BLOCO 1 ESTRUTURA EDITORIAL E PROJETO GRÁFICO', '2015-05-02'),
(6, '6.1', '2', 'BLOCO 2	LEGISLAÇÃO E CIDADANIA', '2015-05-02'),
(6, '6.1', '3', 'BLOCO 3	ABORDAGEM TEÓRICO-METODOLÓGICA E PROPOSTA DIDÁTICOPEDAGÓGICA', '2015-05-02'),
(6, '6.1', '4', 'BLOCO 4	CORREÇÃO E ATUALIZAÇÃO DE CONCEITOS, INFORMAÇÕES E PROCEDIMENTOS', '2015-05-02'),
(6, '6.1', '5', 'BLOCO 5	MANUAL DO PROFESSOR', '2015-05-02'),
(8, '', '3.1', 'A obra organiza seus volumes de forma a garantir uma progressão no processo de ensino-aprendizagem?', '2015-05-02'),
(8, '', '3.3', 'A obra propõe atividades que articulem diferentes disciplinas, aprofundando as possibilidades de abordagem e compreensão de questões relevantes para o alunado do Ensino Médio?', '2015-05-02'),
(8, '', '3.4', 'A obra oportuniza o contato com diferentes linguagens e formas de expressão?', '2015-05-02'),
(8, '', '3.5', 'A obra evita a compartimentalização dos conceitos centrais da Química, abordando-os em diferentes contextos e/ou situações do cotidiano?', '2015-05-02'),
(8, '', '3.6', 'A obra considera, para a aprendizagem, a linguagem como constitutiva do pensamento científico por meio de códigos próprios (símbolos, nomes científicos, diagramas e imagens)?', '2015-05-02'),
(8, '', '3.7', 'A obra estimula o aluno para que desenvolva habilidades de comunicação científica, inclusive na forma oral, propiciando leitura e produção de textos diversificados, bem como, gráficos, tabelas, mapas, cartazes etc.?', '2015-05-02'),
(8, '', '3.8', 'A obra apresenta a Química na dimensão ambiental dos problemas contemporâneos, levando em conta não somente situações e conceitos que envolvem as transformações da matéria e os artefatos tecnológicos em si, mas também os processos humanos subjacentes aos modos de produção do mundo do trabalho?', '2015-05-02'),
(8, '', '3.9', 'A obra evita discursos maniqueístas a respeito da Química, calcados em crenças de que essa ciência é permanentemente responsável pelas catástrofes ambientais, pelos fenômenos de poluição, bem como pela artificialidade de produtos, principalmente aqueles relacionados com alimentação e saúde?', '2015-05-02'),
(8, '', '3.10', 'A obra apresenta uma visão de ciência de natureza humana marcada pelo seu caráter provisório, enfatizando as limitações de cada modelo explicativo, por meio da exposição de suas diferentes possibilidades de aplicação?', '2015-05-02'),
(8, '', '3.11', 'A obra propõe atividades que evitam promover, principalmente, aprendizagem mecânica com mera memorização de fórmulas, nomes e regras?', '2015-05-02'),
(8, '', '3.12', 'A obra apresenta experimentos adequados à realidade escolar, com periculosidade controlada, alertando acerca dos cuidados específicos para os procedimentos experimentais, bem como para o descarte adequado dos resíduos?', '2015-05-02'),
(8, '', '3.13', 'A obra apresenta, em suas atividades, uma visão de experimentação que se alinha com uma perspectiva investigativa, favorecendo a apresentação de situações-problema que fomentem a compreensão dos fenômenos, bem como a construção de argumentações?', '2015-05-02');

-- --------------------------------------------------------

--
-- Estrutura da tabela `questoes`
--

CREATE TABLE IF NOT EXISTS `questoes` (
  `questao` int(11) NOT NULL,
  `subquestao` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `descricao_questao` text COLLATE utf8_unicode_ci NOT NULL,
  `data_criacao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `questoes`
--

INSERT INTO `questoes` (`questao`, `subquestao`, `descricao_questao`, `data_criacao`) VALUES
(1, '', 'Titulação acadêmica:', '2015-05-02'),
(2, '', 'Quantas vezes participou da Equipe Técnica que avalia os livros de Química para o PNLD?', '2015-05-02'),
(3, '', 'Você é autor, ou é participante de grupo de autores de livro didático?', '2015-05-02'),
(4, '', 'Avalie a importância do livro didático como material de ensino de Química em aula.', '2015-05-02'),
(5, '', 'Avalie a importância da avaliação do  livro didático pelo PNLD.', '2015-05-02'),
(6, '', 'Os critérios norteadores na elaboração dos livros didáticos aprovados visam desenvolver competências e habilidades, dentro de uma visão crítica, dinâmica, contextualizada e interdisciplinar. Qual deles exerce maior peso no processo de avaliação do Livro Didático para o ensino de Química?', '2015-05-02'),
(6, '6.1', 'No bloco B de critérios usados para avaliar as obras, qual você julga o mais importante?', '2015-05-02'),
(7, '', 'Avalie a importância de conhecer a Matriz de Referência de Ciências da Natureza do ENEM, e os Objetos de Conhecimentos associados à essa Matriz de Referência, na análise do Livro Didático para o ensino de Química.', '2015-05-02'),
(8, '', 'Assinale os critérios que você acredita aproximar o livro didático para o ensino de Química como material de ensino do ENEM, a partir da FICHA PARA AVALIAÇÃO DA OBRA- PNLD – QUÍMICA 2015/Bloco 3 - Coerência e adequação da abordagem teórico-metodológica em relação ao conhecimento químico escolar destinado ao Ensino Médio:', '2015-05-02'),
(9, '', 'Qual é a sua opinião em relação ao ENEM, desde sua origem, suas características e suas mudanças?', '2015-05-02'),
(10, '', 'Em sua opinião, qual é o peso do ENEM no momento da avaliação dos Livros Didáticos para o ensino de Química?', '2015-05-02');

-- --------------------------------------------------------

--
-- Estrutura da tabela `respostas_usuario`
--

CREATE TABLE IF NOT EXISTS `respostas_usuario` (
  `usuario` int(11) NOT NULL,
  `questao` int(11) NOT NULL,
  `subquestao` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `alternativa` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `resposta_descricao` text COLLATE utf8_unicode_ci NOT NULL,
  `data_resposta` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuario` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `situacao` char(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `usuarios_respostas`
--
CREATE TABLE IF NOT EXISTS `usuarios_respostas` (
`usuario` int(11)
,`nome` varchar(100)
,`data_resposta` date
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `usuarios_respostas_alternativas`
--
CREATE TABLE IF NOT EXISTS `usuarios_respostas_alternativas` (
`usuario` int(11)
,`nome` varchar(100)
,`questao` int(11)
,`subquestao` varchar(4)
,`descricao_questao` text
,`alternativa` varchar(4)
,`resposta_descricao` text
,`data_resposta` date
);
-- --------------------------------------------------------

--
-- Structure for view `usuarios_respostas`
--
DROP TABLE IF EXISTS `usuarios_respostas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `usuarios_respostas` AS select distinct `ru`.`usuario` AS `usuario`,`u`.`nome` AS `nome`,`ru`.`data_resposta` AS `data_resposta` from (`respostas_usuario` `ru` join `usuarios` `u`) where (`ru`.`usuario` = `u`.`usuario`);

-- --------------------------------------------------------

--
-- Structure for view `usuarios_respostas_alternativas`
--
DROP TABLE IF EXISTS `usuarios_respostas_alternativas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `usuarios_respostas_alternativas` AS select distinct `ru`.`usuario` AS `usuario`,`u`.`nome` AS `nome`,`q`.`questao` AS `questao`,`q`.`subquestao` AS `subquestao`,`q`.`descricao_questao` AS `descricao_questao`,`ru`.`alternativa` AS `alternativa`,`ru`.`resposta_descricao` AS `resposta_descricao`,`ru`.`data_resposta` AS `data_resposta` from ((`usuarios` `u` join `questoes` `q`) join `respostas_usuario` `ru`) where ((`ru`.`usuario` = `u`.`usuario`) and (`ru`.`questao` = `q`.`questao`) and (`ru`.`subquestao` = `q`.`subquestao`)) order by `u`.`nome`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
