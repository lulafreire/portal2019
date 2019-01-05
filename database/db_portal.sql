-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 05-Jan-2019 às 17:23
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_portal`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_archives`
--

CREATE TABLE `tb_archives` (
  `id` mediumint(9) NOT NULL,
  `numero` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interessado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `representante` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origem` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caixa` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dt_cadastro` date NOT NULL,
  `dt_atualizacao` date NOT NULL,
  `url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_query` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tb_archives`
--

INSERT INTO `tb_archives` (`id`, `numero`, `nome`, `interessado`, `representante`, `origem`, `caixa`, `dt_cadastro`, `dt_atualizacao`, `url`, `icon_query`) VALUES
(1, '1234567890', 'José da Silva', '', '', 'Digitalizados', '', '0000-00-00', '0000-00-00', '201812291235.pdf', 'far fa-folder-open'),
(2, '35824001002201899', 'Joaquim Neto', '', '', 'CNIS', '2034', '2018-12-05', '2018-12-27', '', 'far fa-folder-open'),
(3, '1809541256', 'Antonio Ferreira da Silva Neto', '', '', 'TBM', '22', '2018-12-28', '2018-12-28', 'anexo20181228160100', ''),
(4, '08001080100271172', 'Eduardo Duarte Filho', '', '', 'CTC', '354', '2018-12-28', '2018-12-28', '201812291248.pdf', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_favoritos`
--

CREATE TABLE `tb_favoritos` (
  `id` mediumint(9) NOT NULL,
  `matricula` int(20) NOT NULL,
  `fav01` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fav02` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fav03` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fav04` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fav05` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fav06` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fav07` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fav08` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fav09` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fav10` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fav11` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fav12` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url01` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url02` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url03` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url04` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url05` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url06` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url07` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url08` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url09` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url10` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url11` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url12` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icone01` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icone02` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icone03` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icone04` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icone05` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icone06` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icone07` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icone08` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icone09` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icone10` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icone11` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icone12` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc01` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc02` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc03` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc04` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc05` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc06` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc07` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc08` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc09` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc10` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc11` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc12` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origem01` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origem02` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origem03` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origem04` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origem05` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origem06` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origem07` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origem08` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origem09` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origem10` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origem11` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origem12` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idFav01` mediumint(9) NOT NULL,
  `idFav02` mediumint(9) NOT NULL,
  `idFav03` mediumint(9) NOT NULL,
  `idFav04` mediumint(9) NOT NULL,
  `idFav05` mediumint(9) NOT NULL,
  `idFav06` mediumint(9) NOT NULL,
  `idFav07` mediumint(9) NOT NULL,
  `idFav08` mediumint(9) NOT NULL,
  `idFav09` mediumint(9) NOT NULL,
  `idFav10` mediumint(9) NOT NULL,
  `idFav11` mediumint(9) NOT NULL,
  `idFav12` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tb_favoritos`
--

INSERT INTO `tb_favoritos` (`id`, `matricula`, `fav01`, `fav02`, `fav03`, `fav04`, `fav05`, `fav06`, `fav07`, `fav08`, `fav09`, `fav10`, `fav11`, `fav12`, `url01`, `url02`, `url03`, `url04`, `url05`, `url06`, `url07`, `url08`, `url09`, `url10`, `url11`, `url12`, `icone01`, `icone02`, `icone03`, `icone04`, `icone05`, `icone06`, `icone07`, `icone08`, `icone09`, `icone10`, `icone11`, `icone12`, `desc01`, `desc02`, `desc03`, `desc04`, `desc05`, `desc06`, `desc07`, `desc08`, `desc09`, `desc10`, `desc11`, `desc12`, `origem01`, `origem02`, `origem03`, `origem04`, `origem05`, `origem06`, `origem07`, `origem08`, `origem09`, `origem10`, `origem11`, `origem12`, `idFav01`, `idFav02`, `idFav03`, `idFav04`, `idFav05`, `idFav06`, `idFav07`, `idFav08`, `idFav09`, `idFav10`, `idFav11`, `idFav12`) VALUES
(1, 1377549, 'Sisref Ponto Eletrônico', 'Sisref Gestores', 'Gerenciador de Tarefas', 'SAG Gestão', 'SAT Atendimento', 'SouWEB Ouvidoria', 'Suibe', 'SDM Dataprev', 'GET Link Externo', 'Ouvidoria-Geral', 'SIGMA', 'DIC-FN', 'http://www-sisref', 'http://www-sisref/chefia', 'http://www-get', 'http://www-saggestao/', 'http://www-sat', 'http://www-souweb', 'http://www-suibe', 'http://www-sdm', 'http://www.tarefas.inss.gov.br', 'http://www.mds/ouvidoria', 'http://www-sigma/', 'http://www-dicfn', 'far fa-clock', 'fas fa-user-clock', 'fas fa-tasks', 'far fa-calendar-alt', 'fas fa-user-friends', 'fas fa-user-circle', 'fa fa-fw fa-cubes', 'fas fa-headset', 'fas fa-clipboard-list', 'fa fa-fw fa-bullhorn', 'fa fa-fw fa-street-view', 'fa fa-fw fa-money', 'Sistema de Registro de Frequencia', 'Sisref Chefias', 'GET - Gerenciador de Tarefas', 'SAG Gestão', 'SAT - Sistema de Atendimento', 'Sistema de Ouvidoria', 'Sistema Único de Informações de Benefícios', 'Chamados Dataprev', 'Gerenciador de Tarefas GET link externo', 'Ouvidoria-Geral do Ministério do Desenvolvimento Social', 'Sistema de Informações do Atendimento', 'Consulta de GPS', 'sistemas', 'sistemas', 'sistemas', 'sistemas', 'sistemas', 'sistemas', 'sistemas', 'sistemas', 'links', 'links', 'sistemas', 'sistemas', 1, 2, 4, 18, 17, 19, 20, 16, 3, 4, 22, 15),
(2, 2019614, 'Sisref Ponto Eletrônico', 'Gerenciador de Tarefas', 'e-Tarefas', 'SAT Atendimento', 'SDC', 'e-Recursos', 'FBR', 'Sibe', 'Consultar', 'SDM Dataprev', 'Correio Expresso', 'Troca Senha', 'http://www-sisref', 'http://www-get', 'http://www-etarefas', 'http://www-sat', 'http://www-sdc', 'http://www-erecursos', 'http://www-fbr', 'http://www-sibe', 'http://www-consultar', 'http://www-sdm', 'http://correio.inss.gov.br', 'http://correio.inss.gov.br/trocasenha', 'far fa-clock', 'fas fa-tasks', 'fas fa-thumbtack', 'fas fa-user-friends', 'far fa-clipboard', 'fas fa-barcode', 'fas fa-hand-holding-usd', 'fab fa-accessible-icon', 'fas fa-question-circle', 'fas fa-headset', 'far fa-envelope', 'fas fa-key', 'Sistema de Registro de Frequencia', 'GET - Gerenciador de Tarefas', 'e-Tarefas', 'SAT - Sistema de Atendimento', 'Sistema de Dados Corporativos', 'Sistema Eletrônico de Recursos Administrativos', 'Análise de Contribuições Facultativo de Baixa Renda', 'SIBE Sistema Integrado de Benefícios', 'Chamados internos INSS', 'Chamados Dataprev', 'Correio Eletrônico', 'Troca Senha do Correio Eletrônico', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 'Sisref Ponto Eletrônico', 'Gerenciador de Tarefas', 'e-Tarefas', 'SAT Atendimento', 'SDC', 'e-Recursos', 'FBR', 'Sibe', 'Consultar', 'SDM Dataprev', 'Correio Expresso', 'Troca Senha', 'http://www-sisref', 'http://www-get', 'http://www-etarefas', 'http://www-sat', 'http://www-sdc', 'http://www-erecursos', 'http://www-fbr', 'http://www-sibe', 'http://www-consultar', 'http://www-sdm', 'http://correio.inss.gov.br', 'http://correio.inss.gov.br/trocasenha', 'far fa-clock', 'fas fa-tasks', 'fas fa-thumbtack', 'fas fa-user-friends', 'far fa-clipboard', 'fas fa-barcode', 'fas fa-hand-holding-usd', 'fab fa-accessible-icon', 'fas fa-question-circle', 'fas fa-headset', 'far fa-envelope', 'fas fa-key', 'Sistema de Registro de Frequencia', 'GET - Gerenciador de Tarefas', 'e-Tarefas', 'SAT - Sistema de Atendimento', 'Sistema de Dados Corporativos', 'Sistema Eletrônico de Recursos Administrativos', 'Análise de Contribuições Facultativo de Baixa Renda', 'SIBE Sistema Integrado de Benefícios', 'Chamados internos INSS', 'Chamados Dataprev', 'Correio Eletrônico', 'Troca Senha do Correio Eletrônico', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 1379020, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, 2020825, 'Sisref Ponto Eletrônico', 'Portal CNIS', 'e-Recursos', 'e-Tarefas', 'Gerenciador de Tarefas', 'SAT Atendimento', 'Sibe', 'Sipps', 'Correio Expresso', 'Troca Senha', 'SDM Dataprev', 'Banco do Brasil', 'http://www-sisref', 'http://www-portalcnis', 'http://www-erecursos', 'http://www-etarefas', 'http://www-get', 'http://www-sat', 'http://www-sibe', 'http://www-sipps', 'http://correio.inss.gov.br', 'http://correio.inss.gov.br/trocasenha', 'http://www-sdm', 'http://www.bb.com.br', 'far fa-clock', 'far fa-id-card', 'fas fa-barcode', 'fas fa-thumbtack', 'fas fa-tasks', 'fas fa-user-friends', 'fab fa-accessible-icon', 'far fa-file-alt', 'far fa-envelope', 'fas fa-key', 'fas fa-headset', 'fas fa-file-invoice-dollar', 'Sistema de Registro de Frequencia', 'Portal CNIS', 'Sistema Eletrônico de Recursos Administrativos', 'e-Tarefas', 'GET - Gerenciador de Tarefas', 'SAT - Sistema de Atendimento', 'SIBE Sistema Integrado de Benefícios', 'Sistema de Protocolo da Previdência Social', 'Correio Eletrônico', 'Troca Senha do Correio Eletrônico', 'Chamados Dataprev', 'Banco do Brasil', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 2377386, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 2377386, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, 2564170, 'Consultar', 'Troca Senha', 'Correio Expresso', 'FBR', 'SDM Dataprev', 'Suibe', 'Receita Federal', 'TRF 1ª Região', 'SAT Atendimento', 'Procuracao particular', 'SouWEB Ouvidoria', 'Solicitar Viatura', 'http://www-consultar', 'http://correio.inss.gov.br/trocasenha', 'http://correio.inss.gov.br', 'http://www-fbr', 'http://www-sdm', 'http://www-suibe', 'http://receita.fazenda.gov.br', 'http://trf1.jus.br', 'http://www-sat', '20190102022451.pdf', 'http://www-souweb', 'http://www-viatura', 'fas fa-question-circle', 'fas fa-key', 'far fa-envelope', 'fas fa-hand-holding-usd', 'fas fa-headset', 'fa fa-fw fa-cubes', 'fas fa-money-check-alt', 'fa fa-fw fa-bank', 'fas fa-user-friends', 'fas fa-file-signature', 'fas fa-user-circle', 'fa fa-fw fa-car', 'Chamados internos INSS', 'Troca Senha do Correio Eletrônico', 'Correio Eletrônico', 'Análise de Contribuições Facultativo de Baixa Renda', 'Chamados Dataprev', 'Sistema Único de Informações de Benefícios', 'Receita Federal do Brasil', 'Tribunal Regional Federal 1ª Região', 'SAT - Sistema de Atendimento', 'Modelo de Procuração Particular', 'Sistema de Ouvidoria', 'Solicitação de viatura à Seção de Logística', 'sistemas', 'sistemas', 'sistemas', 'sistemas', 'sistemas', 'sistemas', 'links', 'links', 'sistemas', 'formularios', 'sistemas', 'sistemas', 12, 10, 9, 14, 16, 20, 2, 10, 17, 1, 19, 21),
(15, 1453641, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16, 1953212, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17, 2019141, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_formularios`
--

CREATE TABLE `tb_formularios` (
  `id` mediumint(9) NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origem` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hits` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tb_formularios`
--

INSERT INTO `tb_formularios` (`id`, `nome`, `url`, `icone`, `descricao`, `origem`, `tags`, `hits`) VALUES
(1, 'Procuracao particular', '20190102022451.pdf', 'fas fa-file-signature', 'Modelo de Procuração Particular', 'Formularios', 'Procuração, procurador, benefício, pagamento, representante legal, banco', 24),
(3, 'Empréstimo Reclamação', '201812291231.pdf', 'fas fa-dollar-sign', 'Anexo XX da Resolução 321', 'Formularios', 'Ouvidoria, reclamação, empréstimo consignado', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_icons`
--

CREATE TABLE `tb_icons` (
  `id` mediumint(9) NOT NULL,
  `class` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tb_icons`
--

INSERT INTO `tb_icons` (`id`, `class`) VALUES
(30, 'fa fa-fw fa-genderless'),
(36, 'fa fa-fw fa-hand-paper-o'),
(47, 'fa fa-fw fa-hourglass-end'),
(53, 'fa fa-fw fa-industry'),
(54, 'fa fa-fw fa-internet-explorer'),
(55, 'fa fa-fw fa-map'),
(56, 'fa fa-fw fa-map-o'),
(57, 'fa fa-fw fa-map-pin'),
(58, 'fa fa-fw fa-map-signs'),
(59, 'fa fa-fw fa-mouse-pointer'),
(60, 'fa fa-fw fa-object-group'),
(61, 'fa fa-fw fa-object-ungroup'),
(62, 'fa fa-fw fa-odnoklassniki'),
(63, 'fa fa-fw fa-odnoklassniki-square'),
(64, 'fa fa-fw fa-opencart'),
(65, 'fa fa-fw fa-opera'),
(66, 'fa fa-fw fa-optin-monster'),
(67, 'fa fa-fw fa-registered'),
(68, 'fa fa-fw fa-safari'),
(69, 'fa fa-fw fa-sticky-note'),
(70, 'fa fa-fw fa-sticky-note-o'),
(71, 'fa fa-fw fa-television'),
(72, 'fa fa-fw fa-trademark'),
(73, 'fa fa-fw fa-tripadvisor'),
(74, 'fa fa-fw fa-tv'),
(75, 'fa fa-fw fa-vimeo'),
(76, 'fa fa-fw fa-wikipedia-w'),
(77, 'fa fa-fw fa-y-combinator'),
(78, 'fa fa-fw fa-yc'),
(79, 'fa fa-fw fa-adjust'),
(80, 'fa fa-fw fa-anchor'),
(81, 'fa fa-fw fa-archive'),
(86, 'fa fa-fw fa-asterisk'),
(87, 'fa fa-fw fa-at'),
(88, 'fa fa-fw fa-automobile'),
(90, 'fa fa-fw fa-ban'),
(91, 'fa fa-fw fa-bank'),
(92, 'fa fa-fw fa-bar-chart'),
(94, 'fa fa-fw fa-barcode'),
(95, 'fa fa-fw fa-bars'),
(101, 'fa fa-fw fa-battery-empty'),
(102, 'fa fa-fw fa-battery-full'),
(103, 'fa fa-fw fa-battery-half'),
(104, 'fa fa-fw fa-battery-quarter'),
(105, 'fa fa-fw fa-battery-three-quarters'),
(106, 'fa fa-fw fa-bed'),
(107, 'fa fa-fw fa-beer'),
(108, 'fa fa-fw fa-bell'),
(110, 'fa fa-fw fa-bell-slash'),
(112, 'fa fa-fw fa-bicycle'),
(113, 'fa fa-fw fa-binoculars'),
(114, 'fa fa-fw fa-birthday-cake'),
(115, 'fa fa-fw fa-bolt'),
(116, 'fa fa-fw fa-bomb'),
(117, 'fa fa-fw fa-book'),
(120, 'fa fa-fw fa-briefcase'),
(121, 'fa fa-fw fa-bug'),
(122, 'fa fa-fw fa-building'),
(124, 'fa fa-fw fa-bullhorn'),
(125, 'fa fa-fw fa-bullseye'),
(126, 'fa fa-fw fa-bus'),
(127, 'fa fa-fw fa-cab'),
(128, 'fa fa-fw fa-calculator'),
(129, 'fa fa-fw fa-calendar'),
(131, 'fa fa-fw fa-calendar-minus-o'),
(133, 'fa fa-fw fa-calendar-plus-o'),
(134, 'fa fa-fw fa-calendar-times-o'),
(135, 'fa fa-fw fa-camera'),
(136, 'fa fa-fw fa-camera-retro'),
(137, 'fa fa-fw fa-car'),
(138, 'fa fa-fw fa-caret-square-o-down'),
(139, 'fa fa-fw fa-caret-square-o-left'),
(140, 'fa fa-fw fa-caret-square-o-right'),
(141, 'fa fa-fw fa-caret-square-o-up'),
(142, 'fa fa-fw fa-cart-arrow-down'),
(143, 'fa fa-fw fa-cart-plus'),
(144, 'fa fa-fw fa-cc'),
(145, 'fa fa-fw fa-certificate'),
(146, 'fa fa-fw fa-check'),
(147, 'fa fa-fw fa-check-circle'),
(151, 'fa fa-fw fa-child'),
(152, 'fa fa-fw fa-circle'),
(154, 'fa fa-fw fa-circle-o-notch'),
(156, 'fa fa-fw fa-clock-o'),
(158, 'fa fa-fw fa-close'),
(159, 'fa fa-fw fa-cloud'),
(162, 'fa fa-fw fa-code'),
(163, 'fa fa-fw fa-code-fork'),
(164, 'fa fa-fw fa-coffee'),
(167, 'fa fa-fw fa-comment'),
(173, 'fa fa-fw fa-compass'),
(174, 'fa fa-fw fa-copyright'),
(176, 'fa fa-fw fa-credit-card'),
(177, 'fa fa-fw fa-crop'),
(178, 'fa fa-fw fa-crosshairs'),
(179, 'fa fa-fw fa-cube'),
(180, 'fa fa-fw fa-cubes'),
(183, 'fa fa-fw fa-database'),
(184, 'fa fa-fw fa-desktop'),
(187, 'fa fa-fw fa-download'),
(188, 'fa fa-fw fa-edit'),
(189, 'fa fa-fw fa-ellipsis-h'),
(190, 'fa fa-fw fa-ellipsis-v'),
(191, 'fa fa-fw fa-envelope'),
(193, 'fa fa-fw fa-envelope-square'),
(194, 'fa fa-fw fa-eraser'),
(196, 'fa fa-fw fa-exclamation'),
(197, 'fa fa-fw fa-exclamation-circle'),
(198, 'fa fa-fw fa-exclamation-triangle'),
(201, 'fa fa-fw fa-eye'),
(202, 'fa fa-fw fa-eye-slash'),
(203, 'fa fa-fw fa-eyedropper'),
(204, 'fa fa-fw fa-fax'),
(205, 'fa fa-fw fa-feed'),
(206, 'fa fa-fw fa-female'),
(207, 'fa fa-fw fa-fighter-jet'),
(208, 'fa fa-fw fa-file-archive-o'),
(210, 'fa fa-fw fa-file-code-o'),
(211, 'fa fa-fw fa-file-excel-o'),
(212, 'fa fa-fw fa-file-image-o'),
(214, 'fa fa-fw fa-file-pdf-o'),
(219, 'fa fa-fw fa-file-video-o'),
(220, 'fa fa-fw fa-file-word-o'),
(222, 'fa fa-fw fa-film'),
(223, 'fa fa-fw fa-filter'),
(224, 'fa fa-fw fa-fire'),
(225, 'fa fa-fw fa-fire-extinguisher'),
(226, 'fa fa-fw fa-flag'),
(227, 'fa fa-fw fa-flag-checkered'),
(229, 'fa fa-fw fa-flash'),
(230, 'fa fa-fw fa-flask'),
(235, 'fa fa-fw fa-frown-o'),
(236, 'fa fa-fw fa-futbol-o'),
(237, 'fa fa-fw fa-gamepad'),
(238, 'fa fa-fw fa-gavel'),
(240, 'fa fa-fw fa-gears'),
(241, 'fa fa-fw fa-gift'),
(242, 'fa fa-fw fa-glass'),
(243, 'fa fa-fw fa-globe'),
(244, 'fa fa-fw fa-graduation-cap'),
(245, 'fa fa-fw fa-group'),
(251, 'fa fa-fw fa-hand-rock-o'),
(252, 'fa fa-fw fa-hand-scissors-o'),
(254, 'fa fa-fw fa-hand-stop-o'),
(255, 'fa fa-fw fa-hdd-o'),
(256, 'fa fa-fw fa-headphones'),
(257, 'fa fa-fw fa-heart'),
(259, 'fa fa-fw fa-heartbeat'),
(260, 'fa fa-fw fa-history'),
(261, 'fa fa-fw fa-home'),
(262, 'fa fa-fw fa-hotel'),
(263, 'fa fa-fw fa-hourglass'),
(268, 'fa fa-fw fa-hourglass-half'),
(270, 'fa fa-fw fa-hourglass-start'),
(272, 'fa fa-fw fa-image'),
(273, 'fa fa-fw fa-inbox'),
(274, 'fa fa-fw fa-industry'),
(275, 'fa fa-fw fa-info'),
(276, 'fa fa-fw fa-info-circle'),
(277, 'fa fa-fw fa-institution'),
(278, 'fa fa-fw fa-key'),
(279, 'fa fa-fw fa-keyboard-o'),
(280, 'fa fa-fw fa-language'),
(281, 'fa fa-fw fa-laptop'),
(282, 'fa fa-fw fa-leaf'),
(283, 'fa fa-fw fa-legal'),
(284, 'fa fa-fw fa-lemon-o'),
(285, 'fa fa-fw fa-level-down'),
(286, 'fa fa-fw fa-level-up'),
(287, 'fa fa-fw fa-life-bouy'),
(288, 'fa fa-fw fa-life-buoy'),
(289, 'fa fa-fw fa-life-ring'),
(290, 'fa fa-fw fa-life-saver'),
(291, 'fa fa-fw fa-lightbulb-o'),
(292, 'fa fa-fw fa-line-chart'),
(293, 'fa fa-fw fa-location-arrow'),
(294, 'fa fa-fw fa-lock'),
(295, 'fa fa-fw fa-magic'),
(296, 'fa fa-fw fa-magnet'),
(297, 'fa fa-fw fa-mail-forward'),
(298, 'fa fa-fw fa-mail-reply'),
(299, 'fa fa-fw fa-mail-reply-all'),
(300, 'fa fa-fw fa-male'),
(301, 'fa fa-fw fa-map'),
(302, 'fa fa-fw fa-map-marker'),
(303, 'fa fa-fw fa-map-o'),
(304, 'fa fa-fw fa-map-pin'),
(305, 'fa fa-fw fa-map-signs'),
(306, 'fa fa-fw fa-meh-o'),
(307, 'fa fa-fw fa-microphone'),
(308, 'fa fa-fw fa-microphone-slash'),
(309, 'fa fa-fw fa-minus'),
(310, 'fa fa-fw fa-minus-circle'),
(311, 'fa fa-fw fa-minus-square'),
(312, 'fa fa-fw fa-minus-square-o'),
(313, 'fa fa-fw fa-mobile'),
(314, 'fa fa-fw fa-mobile-phone'),
(315, 'fa fa-fw fa-money'),
(316, 'fa fa-fw fa-moon-o'),
(317, 'fa fa-fw fa-mortar-board'),
(318, 'fa fa-fw fa-motorcycle'),
(319, 'fa fa-fw fa-mouse-pointer'),
(320, 'fa fa-fw fa-music'),
(321, 'fa fa-fw fa-navicon'),
(322, 'fa fa-fw fa-newspaper-o'),
(323, 'fa fa-fw fa-object-group'),
(324, 'fa fa-fw fa-object-ungroup'),
(325, 'fa fa-fw fa-paint-brush'),
(326, 'fa fa-fw fa-paper-plane'),
(327, 'fa fa-fw fa-paper-plane-o'),
(328, 'fa fa-fw fa-paw'),
(329, 'fa fa-fw fa-pencil'),
(330, 'fa fa-fw fa-pencil-square'),
(331, 'fa fa-fw fa-pencil-square-o'),
(332, 'fa fa-fw fa-phone'),
(333, 'fa fa-fw fa-phone-square'),
(334, 'fa fa-fw fa-photo'),
(335, 'fa fa-fw fa-picture-o'),
(336, 'fa fa-fw fa-pie-chart'),
(337, 'fa fa-fw fa-plane'),
(338, 'fa fa-fw fa-plug'),
(339, 'fa fa-fw fa-plus'),
(340, 'fa fa-fw fa-plus-circle'),
(341, 'fa fa-fw fa-plus-square'),
(342, 'fa fa-fw fa-plus-square-o'),
(343, 'fa fa-fw fa-power-off'),
(344, 'fa fa-fw fa-print'),
(345, 'fa fa-fw fa-puzzle-piece'),
(346, 'fa fa-fw fa-qrcode'),
(347, 'fa fa-fw fa-question'),
(348, 'fa fa-fw fa-question-circle'),
(349, 'fa fa-fw fa-quote-left'),
(350, 'fa fa-fw fa-quote-right'),
(351, 'fa fa-fw fa-random'),
(352, 'fa fa-fw fa-recycle'),
(353, 'fa fa-fw fa-refresh'),
(354, 'fa fa-fw fa-registered'),
(355, 'fa fa-fw fa-remove'),
(356, 'fa fa-fw fa-reorder'),
(357, 'fa fa-fw fa-reply'),
(358, 'fa fa-fw fa-reply-all'),
(359, 'fa fa-fw fa-retweet'),
(360, 'fa fa-fw fa-road'),
(361, 'fa fa-fw fa-rocket'),
(362, 'fa fa-fw fa-rss'),
(363, 'fa fa-fw fa-rss-square'),
(364, 'fa fa-fw fa-search'),
(365, 'fa fa-fw fa-search-minus'),
(366, 'fa fa-fw fa-search-plus'),
(367, 'fa fa-fw fa-send'),
(368, 'fa fa-fw fa-send-o'),
(369, 'fa fa-fw fa-server'),
(370, 'fa fa-fw fa-share'),
(371, 'fa fa-fw fa-share-alt'),
(372, 'fa fa-fw fa-share-alt-square'),
(373, 'fa fa-fw fa-share-square'),
(374, 'fa fa-fw fa-share-square-o'),
(375, 'fa fa-fw fa-shield'),
(376, 'fa fa-fw fa-ship'),
(377, 'fa fa-fw fa-shopping-cart'),
(378, 'fa fa-fw fa-sign-in'),
(379, 'fa fa-fw fa-sign-out'),
(380, 'fa fa-fw fa-signal'),
(381, 'fa fa-fw fa-sitemap'),
(382, 'fa fa-fw fa-sliders'),
(383, 'fa fa-fw fa-smile-o'),
(384, 'fa fa-fw fa-soccer-ball-o'),
(385, 'fa fa-fw fa-sort'),
(386, 'fa fa-fw fa-sort-alpha-asc'),
(387, 'fa fa-fw fa-sort-alpha-desc'),
(388, 'fa fa-fw fa-sort-amount-asc'),
(389, 'fa fa-fw fa-sort-amount-desc'),
(390, 'fa fa-fw fa-sort-asc'),
(391, 'fa fa-fw fa-sort-desc'),
(392, 'fa fa-fw fa-sort-down'),
(393, 'fa fa-fw fa-sort-numeric-asc'),
(394, 'fa fa-fw fa-sort-numeric-desc'),
(395, 'fa fa-fw fa-sort-up'),
(396, 'fa fa-fw fa-space-shuttle'),
(397, 'fa fa-fw fa-spinner'),
(398, 'fa fa-fw fa-spoon'),
(399, 'fa fa-fw fa-square'),
(400, 'fa fa-fw fa-square-o'),
(401, 'fa fa-fw fa-star'),
(402, 'fa fa-fw fa-star-half'),
(403, 'fa fa-fw fa-star-half-empty'),
(404, 'fa fa-fw fa-star-half-full'),
(405, 'fa fa-fw fa-star-half-o'),
(406, 'fa fa-fw fa-star-o'),
(407, 'fa fa-fw fa-sticky-note'),
(408, 'fa fa-fw fa-sticky-note-o'),
(409, 'fa fa-fw fa-street-view'),
(410, 'fa fa-fw fa-suitcase'),
(411, 'fa fa-fw fa-sun-o'),
(412, 'fa fa-fw fa-support'),
(413, 'fa fa-fw fa-tablet'),
(414, 'fa fa-fw fa-tachometer'),
(415, 'fa fa-fw fa-tag'),
(416, 'fa fa-fw fa-tags'),
(417, 'fa fa-fw fa-tasks'),
(418, 'fa fa-fw fa-taxi'),
(419, 'fa fa-fw fa-television'),
(420, 'fa fa-fw fa-terminal'),
(421, 'fa fa-fw fa-thumb-tack'),
(422, 'fa fa-fw fa-thumbs-down'),
(423, 'fa fa-fw fa-thumbs-o-down'),
(424, 'fa fa-fw fa-thumbs-o-up'),
(425, 'fa fa-fw fa-thumbs-up'),
(426, 'fa fa-fw fa-ticket'),
(427, 'fa fa-fw fa-times'),
(428, 'fa fa-fw fa-times-circle'),
(430, 'fa fa-fw fa-tint'),
(431, 'fa fa-fw fa-toggle-down'),
(432, 'fa fa-fw fa-toggle-left'),
(433, 'fa fa-fw fa-toggle-off'),
(434, 'fa fa-fw fa-toggle-on'),
(435, 'fa fa-fw fa-toggle-right'),
(436, 'fa fa-fw fa-toggle-up'),
(437, 'fa fa-fw fa-trademark'),
(438, 'fa fa-fw fa-trash'),
(439, 'fa fa-fw fa-trash-o'),
(440, 'fa fa-fw fa-tree'),
(441, 'fa fa-fw fa-trophy'),
(442, 'fa fa-fw fa-truck'),
(443, 'fa fa-fw fa-tty'),
(444, 'fa fa-fw fa-tv'),
(445, 'fa fa-fw fa-umbrella'),
(446, 'fa fa-fw fa-university'),
(447, 'fa fa-fw fa-unlock'),
(448, 'fa fa-fw fa-unlock-alt'),
(449, 'fa fa-fw fa-unsorted'),
(450, 'fa fa-fw fa-upload'),
(451, 'fa fa-fw fa-user'),
(452, 'fa fa-fw fa-user-plus'),
(453, 'fa fa-fw fa-user-secret'),
(454, 'fa fa-fw fa-user-times'),
(455, 'fa fa-fw fa-users'),
(456, 'fa fa-fw fa-video-camera'),
(457, 'fa fa-fw fa-volume-down'),
(458, 'fa fa-fw fa-volume-off'),
(459, 'fa fa-fw fa-volume-up'),
(460, 'fa fa-fw fa-warning'),
(461, 'fa fa-fw fa-wheelchair'),
(462, 'fa fa-fw fa-wifi'),
(463, 'fa fa-fw fa-wrench'),
(466, 'fa fa-fw fa-hand-o-down'),
(467, 'fa fa-fw fa-hand-o-left'),
(468, 'fa fa-fw fa-hand-o-right'),
(469, 'fa fa-fw fa-hand-o-up'),
(471, 'fa fa-fw fa-hand-peace-o'),
(472, 'fa fa-fw fa-hand-pointer-o'),
(475, 'fa fa-fw fa-hand-spock-o'),
(477, 'fa fa-fw fa-thumbs-down'),
(478, 'fa fa-fw fa-thumbs-o-down'),
(479, 'fa fa-fw fa-thumbs-o-up'),
(480, 'fa fa-fw fa-thumbs-up'),
(484, 'fa fa-fw fa-bus'),
(486, 'fa fa-fw fa-car'),
(488, 'fa fa-fw fa-motorcycle'),
(489, 'fa fa-fw fa-plane'),
(490, 'fa fa-fw fa-rocket'),
(491, 'fa fa-fw fa-ship'),
(492, 'fa fa-fw fa-space-shuttle'),
(493, 'fa fa-fw fa-subway'),
(494, 'fa fa-fw fa-taxi'),
(495, 'fa fa-fw fa-train'),
(496, 'fa fa-fw fa-truck'),
(497, 'fa fa-fw fa-wheelchair'),
(500, 'fa fa-fw fa-file-audio-o'),
(504, 'fa fa-fw fa-file-movie-o'),
(507, 'fa fa-fw fa-file-photo-o'),
(509, 'fa fa-fw fa-file-powerpoint-o'),
(510, 'fa fa-fw fa-file-sound-o'),
(515, 'fa fa-fw fa-file-zip-o'),
(518, 'fa fa-fw fa-gear'),
(519, 'fa fa-fw fa-refresh'),
(520, 'fa fa-fw fa-spinner'),
(526, 'fa fa-fw fa-minus-square'),
(527, 'fa fa-fw fa-minus-square-o'),
(528, 'fa fa-fw fa-plus-square'),
(529, 'fa fa-fw fa-plus-square-o'),
(530, 'fa fa-fw fa-square'),
(531, 'fa fa-fw fa-square-o'),
(532, 'fa fa-fw fa-area-chart'),
(535, 'fa fa-fw fa-line-chart'),
(536, 'fa fa-fw fa-pie-chart'),
(537, 'fa fa-fw fa-align-center'),
(538, 'fa fa-fw fa-align-justify'),
(539, 'fa fa-fw fa-align-left'),
(540, 'fa fa-fw fa-align-right'),
(541, 'fa fa-fw fa-bold'),
(542, 'fa fa-fw fa-chain'),
(543, 'fa fa-fw fa-chain-broken'),
(544, 'fa fa-fw fa-clipboard'),
(545, 'fa fa-fw fa-columns'),
(546, 'fa fa-fw fa-copy'),
(547, 'fa fa-fw fa-cut'),
(548, 'fa fa-fw fa-dedent'),
(550, 'fa fa-fw fa-file'),
(552, 'fa fa-fw fa-file-text'),
(554, 'fa fa-fw fa-files-o'),
(555, 'fa fa-fw fa-floppy-o'),
(556, 'fa fa-fw fa-font'),
(557, 'fa fa-fw fa-header'),
(558, 'fa fa-fw fa-indent'),
(559, 'fa fa-fw fa-italic'),
(560, 'fa fa-fw fa-link'),
(561, 'fa fa-fw fa-list'),
(562, 'fa fa-fw fa-list-alt'),
(563, 'fa fa-fw fa-list-ol'),
(564, 'fa fa-fw fa-list-ul'),
(565, 'fa fa-fw fa-outdent'),
(566, 'fa fa-fw fa-paperclip'),
(567, 'fa fa-fw fa-paragraph'),
(568, 'fa fa-fw fa-paste'),
(569, 'fa fa-fw fa-repeat'),
(570, 'fa fa-fw fa-rotate-left'),
(571, 'fa fa-fw fa-rotate-right'),
(572, 'fa fa-fw fa-save'),
(573, 'fa fa-fw fa-scissors'),
(574, 'fa fa-fw fa-strikethrough'),
(575, 'fa fa-fw fa-subscript'),
(576, 'fa fa-fw fa-superscript'),
(577, 'fa fa-fw fa-table'),
(578, 'fa fa-fw fa-text-height'),
(579, 'fa fa-fw fa-text-width'),
(580, 'fa fa-fw fa-th'),
(581, 'fa fa-fw fa-th-large'),
(582, 'fa fa-fw fa-th-list'),
(583, 'fa fa-fw fa-underline'),
(584, 'fa fa-fw fa-undo'),
(585, 'fa fa-fw fa-unlink'),
(586, 'fa fa-fw fa-arrows-alt'),
(587, 'fa fa-fw fa-backward'),
(588, 'fa fa-fw fa-compress'),
(589, 'fa fa-fw fa-eject'),
(590, 'fa fa-fw fa-expand'),
(591, 'fa fa-fw fa-fast-backward'),
(592, 'fa fa-fw fa-fast-forward'),
(593, 'fa fa-fw fa-forward'),
(594, 'fa fa-fw fa-pause'),
(595, 'fa fa-fw fa-play'),
(596, 'fa fa-fw fa-play-circle'),
(598, 'fa fa-fw fa-random'),
(599, 'fa fa-fw fa-step-backward'),
(600, 'fa fa-fw fa-step-forward'),
(601, 'fa fa-fw fa-stop'),
(602, 'fa fa-fw fa-youtube-play'),
(604, 'fa fa-fw fa-h-square'),
(608, 'fa fa-fw fa-hospital-o'),
(609, 'fa fa-fw fa-medkit'),
(610, 'fa fa-fw fa-plus-square'),
(611, 'fa fa-fw fa-stethoscope'),
(612, 'fa fa-fw fa-user-md'),
(613, 'fa fa-fw fa-wheelchair'),
(614, 'fab fa-accessible-icon'),
(615, 'fas fa-address-book'),
(616, 'far fa-address-book'),
(617, 'fas fa-address-card'),
(618, 'far fa-address-card'),
(619, 'fas fa-ambulance'),
(620, 'fas fa-archive'),
(621, 'fas fa-arrow-alt-circle-down'),
(622, 'fas fa-asterisk'),
(623, 'fas fa-at'),
(624, 'fas fa-atlas'),
(625, 'fas fa-award'),
(626, 'fas fa-balance-scale'),
(627, 'fas fa-ban'),
(628, 'fas fa-barcode'),
(629, 'fas fa-bars'),
(630, 'fas fa-bell'),
(631, 'far fa-bell'),
(633, 'fas fa-bolt'),
(634, 'fas fa-book'),
(635, 'fas fa-book-reader'),
(636, 'far fa-bookmark'),
(637, 'fas fa-box'),
(638, 'fas fa-box-open'),
(639, 'fas fa-briefcase-medical'),
(640, 'fas fa-building'),
(641, 'far fa-building'),
(642, 'fas fa-bulhorn'),
(643, 'fas fa-bullseye'),
(644, 'fas fa-business-time'),
(645, 'fas fa-calculator'),
(646, 'fas fa-calendar-alt'),
(647, 'far fa-calendar-alt'),
(648, 'fas fa-calendar-check'),
(649, 'far fa-calendar-check'),
(650, 'fas fa-camera'),
(651, 'fas fa-chalkboard-teacher'),
(652, 'fas fa-chart-bar'),
(653, 'fas fa-chart-line'),
(654, 'fas fa-check'),
(655, 'fas fa-check-square'),
(656, 'fas fa-child'),
(657, 'fas fa-clipboard'),
(658, 'far fa-clipboard'),
(659, 'fas fa-clipboard-check'),
(660, 'fas fa-clipboard-list'),
(661, 'fas fa-clock'),
(662, 'far fa-clock'),
(663, 'fas fa-clone'),
(664, 'fas fa-cloud-download-alt'),
(665, 'fas fa-cog'),
(666, 'fas fa-cogs'),
(667, 'fas fa-comment-alt'),
(668, 'far fa-comment-alt'),
(669, 'fas fa-copy'),
(670, 'far fa-copy'),
(671, 'fas fa-cubes'),
(672, 'fas fa-desktop'),
(673, 'fas fa-dice-d6'),
(674, 'fas fa-dollar-sign'),
(675, 'fas fa-donate'),
(676, 'fas fa-door-closed'),
(677, 'fas fa-door-open'),
(678, 'fas fa-download'),
(679, 'far fa-edit'),
(680, 'fas fa-envelope'),
(681, 'far fa-envelope'),
(682, 'fas fa-envelope-open-text'),
(683, 'fas fa-file'),
(684, 'far fa-file'),
(685, 'far file-audio'),
(686, 'far-file-contract'),
(687, 'fas fa-file-sinature'),
(688, 'fas fa-first-aid'),
(689, 'far fa-flag'),
(690, 'far fa-folder'),
(691, 'fas fa-folder'),
(692, 'fas fa-folder-open'),
(693, 'far fa-folder-open'),
(694, 'fas fa-globe-americas'),
(695, 'fas fa-hand-holnding-heart'),
(696, 'fas fa-hand-holding'),
(697, 'fas fa-hand-holding-usd'),
(698, 'fas fa-hands'),
(699, 'far fa-handshake'),
(700, 'fas fa-hashtag'),
(701, 'fas fa-headphones'),
(702, 'fas fa-headphones-alt'),
(703, 'fas fa-headset'),
(704, 'fas fa-history'),
(705, 'fas fa-home');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_iib`
--

CREATE TABLE `tb_iib` (
  `id` mediumint(9) NOT NULL,
  `competencia` float NOT NULL,
  `indicador` decimal(3,1) NOT NULL,
  `unidade` int(20) NOT NULL,
  `mes` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tb_iib`
--

INSERT INTO `tb_iib` (`id`, `competencia`, `indicador`, `unidade`, `mes`) VALUES
(1, 201801, '34.5', 4024020, 'JAN/18'),
(2, 201802, '35.5', 4024020, 'FEV/18'),
(3, 201803, '34.0', 4024020, 'MAR/18'),
(4, 201804, '39.0', 4024020, 'ABR/18'),
(5, 201805, '32.0', 4024020, 'MAI/18'),
(6, 201806, '44.0', 4024020, 'JUN/18'),
(7, 201807, '27.0', 4024020, 'JUL/18'),
(8, 201808, '30.0', 4024020, 'AGO/18'),
(9, 201809, '28.0', 4024020, 'SET/18'),
(10, 201810, '33.0', 4024020, 'OUT/18'),
(11, 201811, '40.9', 4024020, 'NOV/18'),
(12, 201812, '44.3', 4024020, 'DEZ/18');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_imagdass`
--

CREATE TABLE `tb_imagdass` (
  `id` mediumint(9) NOT NULL,
  `unidade` int(20) NOT NULL,
  `competencia` float NOT NULL,
  `mes` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `indicador` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tb_imagdass`
--

INSERT INTO `tb_imagdass` (`id`, `unidade`, `competencia`, `mes`, `indicador`) VALUES
(1, 4024020, 201801, 'JAN', 35),
(2, 4024020, 201802, 'FEV', 36),
(3, 4024020, 201803, 'MAR', 47),
(4, 4024020, 201804, 'ABR', 45),
(5, 4024020, 201805, 'MAI', 55),
(6, 4024020, 201806, 'JUN', 36),
(7, 4024020, 201807, 'JUL', 37),
(8, 4024020, 201808, 'AGO', 39),
(9, 4024020, 201809, 'SET', 30),
(10, 4024020, 201810, 'OUT', 36),
(11, 4024020, 201811, 'NOV', 37),
(12, 4024020, 201812, 'DEZ', 33),
(13, 4024020, 201901, 'JAN', 33);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_links`
--

CREATE TABLE `tb_links` (
  `id` mediumint(9) NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origem` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hits` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tb_links`
--

INSERT INTO `tb_links` (`id`, `nome`, `url`, `icone`, `descricao`, `origem`, `tags`, `hits`) VALUES
(1, 'Banco do Brasil', 'http://www.bb.com.br', 'fas fa-file-invoice-dollar', 'Banco do Brasil', 'Links', 'banco bb brasil depósito agência bancária consignado consignação saque dinheiro', 3),
(2, 'Receita Federal', 'http://receita.fazenda.gov.br', 'fas fa-money-check-alt', 'Receita Federal do Brasil', 'Links', 'imposto de renda leão ir cpf cnpj nirf darf itr diac diat', 1),
(3, 'GET Link Externo', 'http://www.tarefas.inss.gov.br', 'fas fa-clipboard-list', 'Gerenciador de Tarefas GET link externo', 'Links', 'tarefas get internet', 9),
(4, 'Ouvidoria-Geral', 'http://www.mds/ouvidoria', 'fa fa-fw fa-bullhorn', 'Ouvidoria-Geral do Ministério do Desenvolvimento Social', 'Links', 'Ouvidoria, MDS, Ministério do Desenvolvimento Social, reclamação, sugestão, elogio, denúncia', 0),
(5, 'Correios', 'http://www.correios.com.br', 'fa fa-fw fa-envelope', 'Empresa Brasileira de Correios e Telégrafos', 'Links', 'correios, cartas, correspondências, malote, ofícios, ', 0),
(10, 'TRF 1ª Região', 'http://trf1.jus.br', 'fa fa-fw fa-bank', 'Tribunal Regional Federal 1ª Região', 'Links', 'Justiça federal, trf, processo judicial', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_recover_password`
--

CREATE TABLE `tb_recover_password` (
  `idRecovery` int(9) NOT NULL,
  `idUser` int(9) NOT NULL,
  `ipUser` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dtRecovery` datetime DEFAULT NULL,
  `dtRegister` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tb_recover_password`
--

INSERT INTO `tb_recover_password` (`idRecovery`, `idUser`, `ipUser`, `dtRecovery`, `dtRegister`) VALUES
(5, 2, '127.0.0.1', NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_represados`
--

CREATE TABLE `tb_represados` (
  `id` mediumint(9) NOT NULL,
  `data` date NOT NULL,
  `indicador` float NOT NULL,
  `unidade` int(20) NOT NULL,
  `adm` float NOT NULL,
  `pm_as` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tb_represados`
--

INSERT INTO `tb_represados` (`id`, `data`, `indicador`, `unidade`, `adm`, `pm_as`) VALUES
(3, '2018-12-03', 1750, 4024, 750, 1000),
(4, '2018-12-26', 2250, 4024, 2000, 250),
(6, '2018-01-31', 425, 4024020, 325, 100),
(7, '2018-02-28', 380, 4024020, 280, 100),
(8, '2018-03-30', 532, 4024020, 332, 200),
(9, '2018-04-30', 374, 4024020, 254, 20),
(10, '2018-05-31', 580, 4024020, 520, 60),
(12, '2018-07-31', 425, 4024020, 400, 25),
(13, '2018-08-31', 320, 4024020, 300, 20),
(14, '2018-09-30', 227, 4024020, 220, 7),
(15, '2018-10-31', 250, 4024020, 200, 50),
(16, '2018-11-28', 332, 4024020, 290, 42),
(17, '2018-12-31', 270, 4024020, 200, 70),
(23, '2019-01-04', 235, 4024020, 200, 35),
(25, '2018-12-01', 345, 4024020, 313, 32);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_sistemas`
--

CREATE TABLE `tb_sistemas` (
  `id` mediumint(9) NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origem` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hits` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tb_sistemas`
--

INSERT INTO `tb_sistemas` (`id`, `nome`, `url`, `icone`, `descricao`, `origem`, `tags`, `hits`) VALUES
(1, 'Sisref Ponto Eletrônico', 'http://www-sisref', 'far fa-clock', 'Sistema de Registro de Frequencia', 'Sistemas', 'ponto frequencia falta ausencia bater ponto trabalho ', 0),
(2, 'Sisref Gestores', 'http://www-sisref/chefia', 'fas fa-user-clock', 'Sisref Chefias', 'Sistemas', 'homologar ponto equipe servidores estagiários', 3),
(3, 'Portal CNIS', 'http://www-portalcnis', 'far fa-id-card', 'Portal CNIS', 'Sistemas', 'vínculos remunerações extrato cnis microfichas', 0),
(4, 'Gerenciador de Tarefas', 'http://www-get', 'fas fa-tasks', 'GET - Gerenciador de Tarefas', 'Sistemas', 'Tarefas, Processos, Benefícios, GET, Gerenciador', 8),
(5, 'Sipps', 'http://www-sipps', 'far fa-file-alt', 'Sistema de Protocolo da Previdência Social', 'Sistemas', 'Protocolo, Comando, Correspondência, Processo Administrativo, Correios, Malote', 0),
(6, 'e-Tarefas', 'http://www-etarefas', 'fas fa-thumbtack', 'e-Tarefas', 'Sistemas', 'Cópia de Processo, Juizado Federal, APSDJ, SAPD', 0),
(7, 'e-Recursos', 'http://www-erecursos', 'fa fa-fw fa-registered', 'Sistema Eletrônico de Recursos Administrativos', 'Sistemas', 'Junta de Recursos, diligências, pesquisas externas, JA, Benefícios, Recorrer', 0),
(8, 'Hipnet', 'http://www-hipnet', 'fas fa-search-location', 'HIPNET Pesquisas Externas', 'Sistemas', 'Pesquisas externas, JA, diligências, homologar, pesquisar', 0),
(9, 'Correio Expresso', 'http://correio.inss.gov.br', 'far fa-envelope', 'Correio Eletrônico', 'Sistemas', 'Mensagens, e-mail, Mensagem, expresso', 0),
(10, 'Troca Senha', 'http://correio.inss.gov.br/trocasenha', 'fas fa-key', 'Troca Senha do Correio Eletrônico', 'Sistemas', 'Alterar Senha, Trocar Senha, Dataprev', 0),
(11, 'Sibe', 'http://www-sibe', 'fab fa-accessible-icon', 'SIBE Sistema Integrado de Benefícios', 'Sistemas', 'BPC, Benefício de Prestação Continuada, LOAS, Avaliação Social, Perícia Médica, Cálculo', 0),
(12, 'Consultar', 'http://www-consultar', 'fas fa-question-circle', 'Chamados internos INSS', 'Sistemas', 'Chamados, Dúvidas sobre Benefícios, Sislex, Siscon, Críticas, Inconsistências, Abrir Chamado', 0),
(13, 'SDC', 'http://www-sdc', 'far fa-clipboard', 'Sistema de Dados Corporativos', 'Sistemas', 'Tabelas, Dados das Unidades, Código, Bancos, Órgãos Pagadores, Órgão Pagador, Salários, Salário-mínimo, Endereços, Gestores, Agências', 0),
(14, 'FBR', 'http://www-fbr', 'fas fa-hand-holding-usd', 'Análise de Contribuições Facultativo de Baixa Renda', 'Sistemas', 'GPS, contribuição, contribuições, baixa renda, ', 0),
(15, 'DIC-FN', 'http://www-dicfn', 'fa fa-fw fa-money', 'Consulta de GPS', 'Sistemas', 'GPS, Pagamentos', 1),
(16, 'SDM Dataprev', 'http://www-sdm', 'fas fa-headset', 'Chamados Dataprev', 'Sistemas', 'Abrir chamado, Dataprev, sistemas, inconsistência, rede, lentidão, indisponível', 1),
(17, 'SAT Atendimento', 'http://www-sat', 'fas fa-user-friends', 'SAT - Sistema de Atendimento', 'Sistemas', 'Fila, atender, chamar, ', 0),
(18, 'SAG Gestão', 'http://www-saggestao/', 'far fa-calendar-alt', 'SAG Gestão', 'Sistemas', 'Gestão, Servidores, Agenda, Exercícios', 0),
(19, 'SouWEB Ouvidoria', 'http://www-souweb', 'fas fa-user-circle', 'Sistema de Ouvidoria', 'Sistemas', 'Solucionar ouvidoria, pesquisar, reclamação, empréstimo, denúncia, elogio', 0),
(20, 'Suibe', 'http://www-suibe', 'fa fa-fw fa-cubes', 'Sistema Único de Informações de Benefícios', 'Sistemas', 'Estatísticas, informações, dados, tabelas, registros, represamento, concessão, benefícios emitidos, pagamentos', 2),
(21, 'Solicitar Viatura', 'http://www-viatura', 'fa fa-fw fa-car', 'Solicitação de viatura à Seção de Logística', 'Sistemas', 'viatura, pesquisas, carro, logística', 9),
(22, 'SIGMA', 'http://www-sigma/', 'fa fa-fw fa-street-view', 'Sistema de Informações do Atendimento', 'Sistemas', 'estatísticas, atendimento, tabelas, registros', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tarefas`
--

CREATE TABLE `tb_tarefas` (
  `id` mediumint(9) NOT NULL,
  `competencia` float NOT NULL,
  `mes` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unidade` int(20) NOT NULL,
  `concluidas` float NOT NULL,
  `pendentes` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tb_tarefas`
--

INSERT INTO `tb_tarefas` (`id`, `competencia`, `mes`, `unidade`, `concluidas`, `pendentes`) VALUES
(1, 201801, 'JAN', 4024020, 930, 320),
(2, 201802, 'FEV', 4024020, 1000, 100),
(3, 201803, 'MAR', 4024020, 1100, 100),
(4, 201804, 'ABR', 4024020, 850, 150),
(5, 201805, 'MAI', 4024020, 980, 120),
(6, 201806, 'JUN', 4024020, 990, 400),
(7, 201807, 'JUL', 4024020, 1250, 325),
(8, 201808, 'AGO', 4024020, 970, 170),
(9, 201809, 'SET', 4024020, 1250, 250),
(10, 201810, 'OUT', 4024020, 1320, 320),
(11, 201811, 'NOV', 4024020, 870, 420),
(13, 201901, 'JAN', 4024020, 900, 100),
(16, 201812, 'JAN', 4024020, 1125, 425);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_unidades`
--

CREATE TABLE `tb_unidades` (
  `id` mediumint(9) NOT NULL,
  `codigo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tb_unidades`
--

INSERT INTO `tb_unidades` (`id`, `codigo`, `nome`, `endereco`, `telefone`) VALUES
(1, '04024020', 'APS IRECÊ-BA', 'Rua Trinta e Três s/n - Lot. Novo Horizonte - Irecê-BA', '74.3641.3166'),
(2, '04024', 'GEX Juazeiro', 'Juazeiro-BA', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_users`
--

CREATE TABLE `tb_users` (
  `iduser` mediumint(9) NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matricula` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cargo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lotacao` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dt_ingresso` date NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dt_nascimento` date NOT NULL,
  `nit` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  `equipe` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publicTelefone` int(1) NOT NULL,
  `publicDtNascimento` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tb_users`
--

INSERT INTO `tb_users` (`iduser`, `nome`, `matricula`, `cargo`, `lotacao`, `dt_ingresso`, `email`, `telefone`, `endereco`, `cpf`, `dt_nascimento`, `nit`, `password`, `status`, `equipe`, `foto`, `publicTelefone`, `publicDtNascimento`) VALUES
(2, 'LUIZ ALBERTO FREIRE DE OLIVEIRA', '1377549', 'Técnico do Seguro Social', '04024020', '2003-04-14', 'luizalbertofreire@gmail.com', '74.99996-7983', 'R. Rosalvo da Silva Pereira, 219 - Irecê - BA', '688.681.975-53', '1974-09-03', '123466578900', '$2y$10$.XlI4UFn2c71RiVgN2XvSOEgEaRjjyErhzOp2Gipi6cUU8HfNhx3W', 1, 'G-GESTORES', '1377549.jpg', 0, 1),
(4, 'DAIANE SANTOS SOUZA', '2019614', 'TÉCNICO DO SEGURO SOCIAL', '04024020', '0000-00-00', 'daiane.santossouza@inss.gov.br', '(74) 98838-1996', '', '123.456.789-00', '1985-05-13', '', '$2y$10$eZZg1xzX30WS0rlLcZ0gq.k/bRS9iikS5eS6CdQRDzMqPB1WEO0ku', 1, 'G-GESTORES', '2019614.png', 0, 0),
(26, 'NESTOR GOMES DE OLIVEIRA', '1379020', 'Técnico do Seguro Social', '04024', '0000-00-00', '', '', '', '', '0000-00-00', '', '$2y$10$oUTE4V2N4aQGxFThvbPB1OMcq/kncOGfY/OSlLUD2NoFSVi.Sos2a', 1, 'G-GESTORES', '1379020.jpg', 0, 0),
(27, 'ELZA MARIA MATOS DOURADO', '2020825', 'Técnico do Seguro Social', '04024020', '2008-10-13', 'elza.mdourado@inss.gov.br', '74.99696-9696', 'RUA DAS FLORES, 90 - CENTRO - IRECê-BA', '141.524.125-14', '1981-10-15', '147852369852', '$2y$10$.XlI4UFn2c71RiVgN2XvSOEgEaRjjyErhzOp2Gipi6cUU8HfNhx3W', 3, 'T-TAREFAS', '2020825.jpg', 0, 1),
(29, 'VITOR GOMES DE OLIVEIRA', '2377386', 'Analista do Seguro Social', '04024020', '2001-01-01', 'luizalbertofreire@gmail.com', '7436411869', 'R. ROSALVO DA SILVA PEREIRA', '897.456.987-45', '1970-01-01', '', '$2y$10$/i3aN3xQvSXdE6WAoYx/j.KRV6oXxJGZ1uk91mb6SxtcXc6e22nUK', 2, 'T-Tarefas', '2377386.jpg', 0, 0),
(30, 'IANE ROSAS CASAIS E SILVA', '2564170', 'Técnico do Seguro Social', '04024020', '2003-01-01', 'luizalbertofreire@gmail.com', '74.99999-9999', 'RUA DO INSS', '586.547.897-84', '1970-10-10', '', '$2y$10$.XlI4UFn2c71RiVgN2XvSOEgEaRjjyErhzOp2Gipi6cUU8HfNhx3W', 2, 'O-OI/Manutenção', '2564170.jpg', 0, 1),
(31, 'THIAGO JOSé VIEIRA DA SILVA', '1453641', 'Técnico do Seguro Social', '04024020', '2001-01-01', 'thiagojose.silva@inss.gov.br', '74.99999-9999', '', '654.789.654-78', '1974-01-01', '', '$2y$10$.XlI4UFn2c71RiVgN2XvSOEgEaRjjyErhzOp2Gipi6cUU8HfNhx3W', 2, 'R-Retaguarda', '1453641.jpg', 0, 0),
(32, 'EDUARDO MACHADO BATISTA', '1953212', 'Técnico do Seguro Social', '04024020', '2001-01-01', 'eduardo.mbatista@inss.gov.br', '74.98855-8855', '', '254.564.588-79', '1985-01-01', '', '$2y$10$VOn2GJw6V0l1meIpV/jFwOqeqB.RkPuxL.dN8SHb7UeZpnmos5HVu', 2, 'T-Tarefas', '1953212.jpg', 1, 0),
(33, 'LEONARDO SAMPAIO DOS SANTOS', '2019141', 'Técnico do Seguro Social', '04024020', '2001-01-01', 'leonardo.ssantos@inss.gov.br', '74.99989-8989', '', '369.854.587-97', '1985-01-01', '', '$2y$10$2u9mt8/a7N2v/rSCaJb16.0Tzu7T4/urgk2as2ZZ6ufS0IPYnv7gi', 2, 'G-Gestores', '2019141.jpg', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_archives`
--
ALTER TABLE `tb_archives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_favoritos`
--
ALTER TABLE `tb_favoritos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_formularios`
--
ALTER TABLE `tb_formularios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_icons`
--
ALTER TABLE `tb_icons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_iib`
--
ALTER TABLE `tb_iib`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_imagdass`
--
ALTER TABLE `tb_imagdass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_links`
--
ALTER TABLE `tb_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_recover_password`
--
ALTER TABLE `tb_recover_password`
  ADD PRIMARY KEY (`idRecovery`);

--
-- Indexes for table `tb_represados`
--
ALTER TABLE `tb_represados`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_sistemas`
--
ALTER TABLE `tb_sistemas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tarefas`
--
ALTER TABLE `tb_tarefas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_unidades`
--
ALTER TABLE `tb_unidades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`iduser`),
  ADD UNIQUE KEY `matricula` (`matricula`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_archives`
--
ALTER TABLE `tb_archives`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_favoritos`
--
ALTER TABLE `tb_favoritos`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_formularios`
--
ALTER TABLE `tb_formularios`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_icons`
--
ALTER TABLE `tb_icons`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=706;

--
-- AUTO_INCREMENT for table `tb_iib`
--
ALTER TABLE `tb_iib`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_imagdass`
--
ALTER TABLE `tb_imagdass`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_links`
--
ALTER TABLE `tb_links`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_recover_password`
--
ALTER TABLE `tb_recover_password`
  MODIFY `idRecovery` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_represados`
--
ALTER TABLE `tb_represados`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_sistemas`
--
ALTER TABLE `tb_sistemas`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_tarefas`
--
ALTER TABLE `tb_tarefas`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_unidades`
--
ALTER TABLE `tb_unidades`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `iduser` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
