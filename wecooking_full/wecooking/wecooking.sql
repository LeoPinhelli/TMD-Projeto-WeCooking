-- phpMyAdmin SQL Dump
-- version 4.3.7
-- http://www.phpmyadmin.net
--
-- Host: mysql32-farm10.kinghost.net
-- Tempo de geração: 22/11/2023 às 14:15
-- Versão do servidor: 10.6.14-MariaDB-log
-- Versão do PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `wecooking`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `receipt_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Fazendo dump de dados para tabela `comments`
--

INSERT INTO `comments` (`comment_id`, `comment`, `user_id`, `receipt_id`) VALUES
(23, 'Mt bom slk', 28, 250),
(24, 'lindo', 26, 260);

-- --------------------------------------------------------

--
-- Estrutura para tabela `favorites`
--

CREATE TABLE IF NOT EXISTS `favorites` (
  `favorite_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `receipt_id` int(11) DEFAULT NULL,
  `favorite_date_added` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

--
-- Fazendo dump de dados para tabela `favorites`
--

INSERT INTO `favorites` (`favorite_id`, `user_id`, `receipt_id`, `favorite_date_added`) VALUES
(64, 26, 254, '2023-11-17 00:25:58'),
(65, 26, 252, '2023-11-17 00:26:02'),
(66, 26, 251, '2023-11-17 00:26:06'),
(67, 26, 253, '2023-11-17 00:26:12'),
(68, 26, 250, '2023-11-17 00:32:44'),
(69, 26, 260, '2023-11-17 09:25:08');

-- --------------------------------------------------------

--
-- Estrutura para tabela `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `rating_id` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `receipt_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

--
-- Fazendo dump de dados para tabela `ratings`
--

INSERT INTO `ratings` (`rating_id`, `rating`, `user_id`, `receipt_id`) VALUES
(38, 3, 1, 250),
(39, 3, 1, 251),
(40, 4, 1, 252),
(41, 1, 1, 253),
(42, 5, 1, 254),
(43, 3, 1, 255),
(44, 3, 1, 256),
(45, 5, 1, 257),
(46, 2, 1, 258),
(47, 2, 25, 250),
(48, 4, 25, 251),
(49, 2, 25, 252),
(50, 5, 25, 253),
(51, 4, 25, 255),
(52, 4, 25, 258),
(53, 4, 25, 257),
(54, 5, 26, 252),
(55, 4, 26, 250),
(56, 3, 26, 254),
(57, 5, 30, 258),
(58, 4, 26, 260);

-- --------------------------------------------------------

--
-- Estrutura para tabela `receipts`
--

CREATE TABLE IF NOT EXISTS `receipts` (
  `receipt_id` int(11) NOT NULL,
  `receipt_name` varchar(255) DEFAULT NULL,
  `receipt_time` int(11) DEFAULT NULL,
  `receipt_ingredients` text DEFAULT NULL,
  `receipt_difficulty` varchar(255) DEFAULT NULL,
  `receipt_images` text DEFAULT NULL,
  `receipt_date_added` datetime DEFAULT NULL,
  `receipt_status` int(11) DEFAULT NULL,
  `receipt_tags` text NOT NULL,
  `receipt_preparation` text NOT NULL,
  `receipt_entries` int(255) DEFAULT NULL,
  `receipt_ingredients_coverage` text NOT NULL,
  `receipt_ingredients_filling` text NOT NULL,
  `receipt_coverage_preparation` text NOT NULL,
  `receipt_filling_preparation` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=261 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

--
-- Fazendo dump de dados para tabela `receipts`
--

INSERT INTO `receipts` (`receipt_id`, `receipt_name`, `receipt_time`, `receipt_ingredients`, `receipt_difficulty`, `receipt_images`, `receipt_date_added`, `receipt_status`, `receipt_tags`, `receipt_preparation`, `receipt_entries`, `receipt_ingredients_coverage`, `receipt_ingredients_filling`, `receipt_coverage_preparation`, `receipt_filling_preparation`) VALUES
(241, 'Brownie(user)', 40, '6 colheres (sopa) bem cheias, de margarina sem sal,3/4 xÃ­cara (chÃ¡) achocolatado,1/2 xÃ­cara (chÃ¡) chocolate em pÃ³,1 e 1/4 xÃ­cara (chÃ¡) farinha de trigo,2 xÃ­caras (chÃ¡) aÃ§Ãºcar,4 ovos,2 pitadas de sal,1 colher (chÃ¡) de extrato ou essÃªncia de baunilha,1 tablete de chocolate meio amargo picado em cubinhos,1/2 xÃ­cara (chÃ¡) de nozes picadas ou castanhas de caju granuladas', 'fÃ¡cil', ',imagem_2023-11-16_224718236.png', '2023-11-16 22:46:48', 0, '', 'Misture os ovos e o aÃ§Ãºcar.,Em seguida, agregue todos os outros ingredientes atÃ© formar um creme uniforme. Despeje em uma assadeira, forrada com papel-manteiga e leve ao forno mÃ©dio por 40 minutos.,O brownie estarÃ¡ pronto quando a parte de cima estiver levemente corada e, ao se espetar um palito, ele esteja levemente Ãºmido (devido ao chocolate derretido).,Corte em quadrados ainda quente e sirva com uma bola de sorvete de creme, ou congele num saquinho para freezer.,Para descongelar, coloque o brownie num prato de sobremesa e aqueÃ§a no micro-ondas, potÃªncia alta, por 1 minuto.', 0, '', '', '', ''),
(242, 'Cupcake(user)', 35, '3 ovos,1 xÃ­cara (chÃ¡) de olÃ©o,1/2 xÃ­cara (chÃ¡) de leite,1 1/2 xÃ­caras (chÃ¡) de aÃ§Ãºcar,2 xÃ­cara (chÃ¡) farinha de trigo,1/2 xÃ­cara (chÃ¡) de chocolate,1 colher (sopa) de fermento em pÃ³', 'fÃ¡cil', ',imagem_2023-11-16_224806735.png,imagem_2023-11-16_224810796.png', '2023-11-16 22:47:31', 0, '', 'Bater os ovos, olÃ©o, o leite e o aÃ§Ãºcar no liquidificador por 5 minutos.,Em uma vasilha misturar a farinha, o chocolate e o fermento, misturar bem e adicionar o lÃ­quido do liquidificador, mexer bem e colocar em forminhas.', 0, '', '', '', ''),
(243, 'Petit Gateau(user)', 30, '200 g de chocolate meio amargo,2 colheres de manteiga sem sal,1/4 xÃ­cara (chÃ¡) de aÃ§Ãºcar,2 colheres (sopa) rasas de farinha de trigo,2 ovos inteiros (tire a pele da gema),2 gemas', 'fÃ¡cil', ',imagem_2023-11-16_224914873.png,imagem_2023-11-16_224919081.png', '2023-11-16 22:48:34', 0, '', 'Derreta a manteiga e o chocolate em banho-maria.,Bata os ovos e as gemas com aÃ§Ãºcar na batedeira, atÃ© ficar bem claro.,Junte o chocolate derretido e a farinha de trigo, misturando com uma espÃ¡tula.,Depois, unte as forminhas de empadinha, passe farinha de trigo e coloque a massa.,PreaqueÃ§a o forno e leve para assar de 6 a 10 minutos (em fogo alto) atÃ© os bolinhos crescerem, mas o meio deve ficar molinho.,Deve-se desenformar ainda quente.,Sirva diretamente no prato, acompanhado com sorvete de creme.', 0, '', '', '', ''),
(244, 'Pudim de Leite Condensado(user)', 60, 'Massa: 1 lata de leite condensado,1 lata de leite (medida da lata de leite condensado),3 ovos inteiros,Calda: 1 xÃ­cara (chÃ¡) de aÃ§Ãºcar,1/2 xÃ­cara de Ã¡gua', 'fÃ¡cil', ',imagem_2023-11-16_224947379.png,imagem_2023-11-16_224953043.png', '2023-11-16 22:49:44', 0, '', 'Massa: Primeiro, bata bem os ovos no liquidificador.,Acrescente o leite condensado e o leite, e bata novamente.,Calda: Derreta o aÃ§Ãºcar na panela atÃ© ficar moreno, acrescente a Ã¡gua e deixe engrossar.,Coloque em uma forma redonda e despeje a massa do pudim por cima.,Asse em forno mÃ©dio por 45 minutos, com a assadeira redonda dentro de uma maior com Ã¡gua.,Espete um garfo para ver se estÃ¡ bem assado.,Deixe esfriar e desenforme.', 0, '', '', '', ''),
(245, 'Palha italiana(user)', 30, '1 lata de leite condensado,8 colheres (sopa) de chocolate em pÃ³,1/2 colher (sopa) de margarina,1 pacote de biscoito maisena', 'fÃ¡cil', ',imagem_2023-11-16_225101801.png,imagem_2023-11-16_225106198.png', '2023-11-16 22:50:27', 0, '', 'Pique o biscoito em pedacinhos pequenos e reserve.,Com o leite condensado, a margarina e o chocolate em pÃ³, faÃ§a um brigadeiro.,Assim que o brigadeiro comeÃ§ar a soltar do fundo da panela, misture o biscoito picado atÃ© formar uma massa, retire do fogo. ', 0, '', '', '', ''),
(246, 'PÃ£o de lÃ³(user)', 30, '1 xÃ­cara de leite quente,3 xÃ­caras de farinha de trigo,2 xÃ­caras de aÃ§Ãºcar,3 gemas,3 claras em neve,1 colher de fermento em pÃ³ quÃ­mico', 'fÃ¡cil', ',imagem_2023-11-16_225149385.png,imagem_2023-11-16_225153254.png', '2023-11-16 22:51:11', 0, '', 'Bata as claras em neve atÃ© ficar bem consistente.,Acrescente o aÃ§Ãºcar e as gemas, bata bem.,Juntamente coloque a farinha de trigo e o fermento continue batendo.,Aos poucos acrescente o leite quente atÃ© ficar uma massa homogÃªnea.', 0, '', '', '', ''),
(247, 'Broa de fubÃ¡(user)', 45, '3 ovos inteiros,1/2 copo (americano) de Ã³leo,1 copo (tipo requeijÃ£o) de aÃ§Ãºcar,2 copos (tipo requeijÃ£o) de fubÃ¡,1 copo (tipo requeijÃ£o) de leite,1 colher (sopa) de fermento em pÃ³,1 pitada de sal,Queijo a gosto (ou coco ralado)', 'fÃ¡cil', ',imagem_2023-11-16_225226258.png', '2023-11-16 22:51:46', 0, '', 'Bater todos os ingredientes no liquidificador.,Levar ao forno prÃ© - aquecido por 30 a 40 minutos, em forma untada e enfarinhada', 0, '', '', '', ''),
(250, 'Bolo de Laranja', 40, ',4 ovos,2 xÃ­caras (chÃ¡) de aÃ§Ãºcar,1 xÃ­cara (chÃ¡) de Ã³leo,suco de 2 laranjas,casca de 1 laranja,2 xÃ­caras (chÃ¡) de farinha de trigo,1 colher (sopa) de fermento', 'fÃ¡cil', ',bolo_laranja(1).png,bolo_laranja.png', '2023-11-16 23:53:42', 1, 'bolo,laranja', '/Bata no liquidificador os ovos, o aÃ§Ãºcar, o Ã³leo, o suco e a casca da laranja./Passe para uma tigela e acrescente a farinha de trigo e o fermento./Leve para assar em uma forma com furo central, untada e enfarinhada, por mais ou menos 30 minutos./Desenforme o bolo e molhe com suco de laranja.', 19, '', '', '', ''),
(251, 'Torta de Morango', 60, ',2 colheres (sopa) de margarina,2 colheres (sopa) de Ã³leo,1 ovo inteiro,2 colheres rasas (sopa) de aÃ§Ãºcar,1 pitada de sal,1 colher rasa (sopa) de fermento em pÃ³,farinha de trigo atÃ© a massa desgrudar da mÃ£o', 'mÃ©dio', ',torta.png,torta1.png', '2023-11-16 23:56:47', 1, 'torta,morango', '/Misture todos os ingredientes, e quando ela estiver no ponto, forre um pirex de mÃ©dio a grande (os mais fundos sÃ£o melhores)./Fure a massa com um garfo e asse em fogo mÃ©dio entre 10 a 15 minutos. /Quando dourar, estÃ¡ pronta (a massa fica fina, entÃ£o cuidado para nÃ£o deixar queimar). /Disponha a massa assada em um pirex e deixe esfriar um pouco. /Adicione o creme e, sobre ele, os morangos cortados na transversal. /Em seguida, adicione a gelatina jÃ¡ em ponto de clara (pois assim ela ficarÃ¡ na superfÃ­cie). /Leve Ã  geladeira por no mÃ­nimo 4 horas.', 11, '', ',1 lata de leite condensado,1 lata de creme de leite,3 gemas,3 copos de leite,1 colher (sopa) de maisena,2 caixinhas de morangos,1 gelatina de morango', '', '/Misture todos os ingredientes e mexa atÃ© levantar fervura. /Quando vocÃª perceber que ele estÃ¡ bem cremoso, mexa bastante sem parar (cuidado para nÃ£o deixar empelotar ou grudar no fundo da panela)./Na hora do uso, ele deve estar jÃ¡ frio ou levemente morno. '),
(252, 'Torta de Banana (Banoffe)', 30, ',400 g de doce de leite,10 bananas cortadas em rodelas,400 g de nata (chantilly se preferir),1 pacote de biscoito maizena triturado (tipo farinha bem fininho),200 g de margarina culinÃ¡ria,1 colher de chÃ¡ de canela em pÃ³ para polvilhar', 'mÃ©dio', ',torta_banana(1).png,torta_banana.png', '2023-11-17 00:00:19', 1, 'torta,banana', '/Misture o biscoito triturado com a margarina culinÃ¡ria, com a ponta dos dedos, atÃ© formar uma massa lisa./Forre o fundo de uma forma de abrir (fundo falso), e asse por apenas 10 minutos, em forno preaquecido a 180Â°C./Retire e deixe a massa esfriar./Coloque o doce de leite sobre a massa jÃ¡ fria e alise para ficar plano./Pique as bananas em rodelas, e distribua-as sobre o doce de leite. /Coloque a nata por cima (se preferir, pode batÃª-la para deixar em ponto de chantilly), e alise. /Pegue uma peneira pequena, e espalhe a canela por cima passando-a pela peneira, para que pulverize melhor por toda a torta. /Deixe na geladeira por 3 horas antes de desenformar', 16, '', '', '', ''),
(253, 'Bolo de Cenoura', 40, ',1/2 xÃ­cara (chÃ¡) de Ã³leo,3 cenouras mÃ©dias raladas,4 ovos,2 xÃ­caras (chÃ¡) de aÃ§Ãºcar,2 e 1/2 xÃ­caras (chÃ¡) de farinha de trigo,1 colher (sopa) de fermento em pÃ³', 'mÃ©dio', ',bolo_cenoura(1).png,bolo_cenoura(2).png,bolo_cenoura.png', '2023-11-17 00:03:14', 1, 'bolo,chocolate,cenoura', '/Em um liquidificador, adicione a cenoura, os ovos e o Ã³leo, depois misture./Acrescente o aÃ§Ãºcar e bata novamente por 5 minutos./Em uma tigela ou na batedeira, adicione a farinha de trigo e depois misture novamente. /Acrescente o fermento e misture lentamente com uma colher./Asse em um forno preaquecido a 180Â° C por aproximadamente 40 minutos.', 7, ',1 colher (sopa) de manteiga,3 colheres (sopa) de chocolate em pÃ³,1 xÃ­cara (chÃ¡) de aÃ§Ãºcar,1 xÃ­cara (chÃ¡) de leite', '', '/Despeje em uma tigela a manteiga, o chocolate em pÃ³, o aÃ§Ãºcar e o leite, depois misture. /Leve a mistura ao fogo e continue misturando atÃ© obter uma consistÃªncia cremosa, depois despeje a calda por cima do bolo./', ''),
(254, 'Torta AlemÃ£ de MaÃ§Ã£', 90, ',300 gr de farinha,200 gr de manteiga,100 gr de aÃ§Ãºcar,1 gema,1 colher (sopa) de vinho tinto', 'difÃ­cil', ',torta_maca(1).png,torta_maca.png', '2023-11-17 00:07:18', 0, 'torta,maca', '/Misture bem a manteiga com o aÃ§Ãºcar, junte a gema e acrescente o vinho. /Adicione a farinha e amasse atÃ© obter uma massa homogÃªnea, mas gordurosa e pegajosa. /Divida a massa em duas porÃ§Ãµes na proporÃ§Ã£o 2/3 e 1/3./Leve Ã  geladeira, por 1/2 hora. ', 6, '', ',6 maÃ§Ã£s vermelhas Ã¡cidas (1kg),1 colher (sopa) de vinho tinto,100 gr de uva passa branca sem semente', '', '/Descasque as maÃ§Ã£s e corte em fatias mÃ©dias. /Misture as maÃ§Ã£s, o vinho e a uva-passa./Cozinhe no vapor atÃ© amolecer./Forre o fundo e as laterais de uma forma desmontÃ¡vel com os 2/3 da massa./Coloque o recheio./Com o restante da massa, faÃ§a rolinhos bem finos e monte uma grade sobre o recheio./Asse, em forno mÃ©dio, atÃ© a massa estar dourada.'),
(255, 'Torta AlemÃ£', 20, ',200 g de manteiga sem sal,1 xÃ­cara (chÃ¡) de aÃ§Ãºcar,1 lata de creme de leite sem soro,1 pacote de bolacha maisena,leite o bastante para molhar a bolacha,1 lata de leite condensado sabor chocolate (ou cobertura de sorvete)', 'fÃ¡cil', ',torta_alema(1).png,torta_alema.png', '2023-11-17 00:10:35', 1, 'torta,chocolate', '/Coloque a manteiga e o aÃ§Ãºcar na batedeira e bata atÃ© obter um creme bem fofo e liso. /Acrescente o creme de leite e bata rapidamente apenas para misturar. /Desligue a batedeira e reserve. /Separe um recipiente mÃ©dio para montar o doce. /Acrescente um pouco de leite num prato fundo e molhe rapidamente algumas bolachas maisena no leite. /Forre o fundo do recipiente escolhido com uma camada de bolachas. /Acrescente uma camada do creme reservado sobre as bolachas. /Acrescente mais uma camada de bolachas molhadas no leite e repita o procedimento finalizando com a bolacha. /Cubra a Ãºltima camada de bolachas com o leite condensado sabor chocolate (comprado pronto ou a cobertura). /Leve Ã  geladeira por no mÃ­nimo 3 horas ou atÃ© que o doce fique bem gelado. /Retire o doce da geladeira e sirva a seguir.', 8, '', '', '', ''),
(256, 'Bolo de Milho', 50, ',1 lata de milho (sem o lÃ­quido),1 lata de leite (medida da lata de milho),1 lata de aÃ§Ãºcar (medida da lata de milho),1 lata de flocÃ£o de milho,1/2 lata de Ã³leo de soja,3 ovos inteiros,1 colher (sopa) de fermento em pÃ³,margarina para untar,farinha de trigo para untar', 'fÃ¡cil', ',bolo_milho(1).png,bolo_milho.png', '2023-11-17 00:12:41', 1, 'bolo,milho', '/Escorra o milho e use a prÃ³pria lata para as medidas. /Unte e enfarinhe uma forma de bolo com furo. /PreaqueÃ§a o forno. /Coloque no liquidificador o milho (jÃ¡ escorrido), o leite, aÃ§Ãºcar, flocÃ£o de milho, Ã³leo, ovos e bata bem atÃ© que o milho fique bem moÃ­do. /Se quiser, pode acrescentar duas colheres de sopa de coco ralado. /Acrescente o fermento em pÃ³ e pulse o liquidificador 3 vezes. /Despeje essa massa na forma e leve ao forno mÃ©dio. /Deixe assar por, aproximadamente, 40 minutos. /FaÃ§a o teste do palito e observe um tom dourado mÃ©dio, para saber que o bolo estÃ¡ pronto. /Espere esfriar totalmente para desenformar.', 2, '', '', '', ''),
(257, 'Bolo de Chocolate', 40, ',1 xÃ­cara (chÃ¡) de achocolatado ou chocolate em pÃ³,1 xÃ­cara (chÃ¡) de aÃ§Ãºcar,2 xÃ­caras (chÃ¡) de trigo peneirado,1 xÃ­cara (chÃ¡) de Ã³leo,1 xÃ­cara (chÃ¡) de leite,2 ovos,1 colher (sopa) de fermento em pÃ³', 'fÃ¡cil', ',bolo(1).png,bolo.png', '2023-11-17 00:14:43', 1, 'bolo,chocolate', '/Unte uma forma de buraco pequena com margarina e trigo/Reserve. /Bata no liquidificador, o Ã³leo, o leite e o ovo. /Acrescente o trigo, o aÃ§Ãºcar e o achocolatado. /Bata novamente. /Em seguida acrescente o fermento e bata. /Despeje na forma e leve ao forno em temperatura mÃ©dia por cerca de 35 minutos. ', 6, ',1 colher (sopa) de margarina,3 colheres (sopa) de achocolatado ou chocolate em pÃ³,3 colheres de aÃ§Ãºcar,1 xÃ­cara (chÃ¡) de leite', '', '/Em uma panela coloque no fogo mÃ©dio a margarina para derreter. /Assim que derreter coloque o aÃ§Ãºcar e em seguida o achocolatado, por Ãºltimo acrescente o leite. /Mexa de vez em quando para nÃ£o gastar, espere engrossar um pouco e despeje ainda quente no bolo.', ''),
(258, 'Torta de Chocolate', 90, ',4 ovos,2 xÃ­caras (chÃ¡) de leite,100 g de manteiga em temperatura ambiente,2 xÃ­caras (chÃ¡) de aÃ§Ãºcar,1 xÃ­cara (chÃ¡) de chocolate em pÃ³ solÃºvel,2 xÃ­caras (chÃ¡) de farinha de trigo,1/2 colher (sopa) de fermento em pÃ³,1 pote de sorvete de chocolate (2 litros),1 lata de creme de leite,1 tablete de chocolate meio amargo picado', 'mÃ©dio', ',torta_chocolate(1).png,torta_chocolate.png', '2023-11-17 00:17:01', 1, 'torta,chocolate', '/Bata no liquidificador os ovos com a metade do leite, a manteiga, o aÃ§Ãºcar, o chocolate em pÃ³ e a farinha peneirada com o fermento. /Despeje esta mistura numa assadeira retangular untada. /Leve ao forno mÃ©dio por cerca de 25 minutos. /Forre uma forma redonda (25 cm de diÃ¢metro) com papel-alumÃ­nio. /FaÃ§a uma camada com metade do bolo esfarelado e umedeÃ§a com uma parte do leite restante. /Espalhe o sorvete e faÃ§a outra camada de bolo esfarelado e umedecido. /Cubra e leve ao freezer para endurecer. /AqueÃ§a o creme de leite em banho-maria. /Desligue o fogo, junte o chocolate picado e mexa atÃ© derretÃª-lo. /Desenforme o bolo e cubra-o com o creme de chocolate. /Decore com chocolate em raspas ou granulado e sirva.', 16, '', '', '', ''),
(259, 'Bolo de limÃ£o(user)', 40, 'Massa,4 ovos,1/2 copo de Ã³leo,2 copos de aÃ§Ãºcar nÃ£o muito cheios,1 copo de leite,1 caixa de gelatina de limÃ£o,2 xÃ­caras de farinha de trigo,1 colher de sopa de Fermento em pÃ³,Cobertura e Recheio,1 lata de leite condensado,Suco de 3 limÃµes', 'mÃ©dio', ',BOLOlimao1.jpg,BOLOlimao2.jpeg', '2023-11-17 09:21:34', 0, '', 'Massa:Bata no liquidificador os ovos inteiros, o Ã³leo e o aÃ§Ãºcar (bem batidos).,Coloque a gelatina e continue batendo atÃ© dissolver.,Despeje em uma tigela e acrescente a farinha e o fermento em pÃ³ mexendo sempre colocando o leite.,Coloque em assadeira untada e polvilhada com farinha.,Depois de assado e ainda quente fure com o garfo.,Cobertura:Bata no liquidificador ou na mÃ£o o leite condensado com suco de 3 limÃµes atÃ© formar uma cobertura homogÃªnea.,Cubra o bolo quando o mesmo estiver frio.', 0, '', '', '', ''),
(260, 'Bolo de limÃ£o', 40, ',4 ovos,1/2 copo de Ã³leo,', 'mÃ©dio', ',BOLOlimao2.jpeg,BOLOlimao1.jpg', '2023-11-17 09:24:40', 1, 'bolo,limao', '/Bata no liquidificador os ovos inteiros, o Ã³leo e o aÃ§Ãºcar (bem batidos). /Coloque a gelatina e continue batendo atÃ© dissolver. /', 9, '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_photo` text DEFAULT NULL,
  `user_status` varchar(255) DEFAULT NULL,
  `user_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

--
-- Fazendo dump de dados para tabela `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_photo`, `user_status`, `user_admin`) VALUES
(1, 'Tiago Budziak', 'tiago.budziak@escola.pr.gov.br', 'srMpbg==', 'undefined', '1', 1),
(25, 'Gregory', 'gregorykolbe05@gmail.com', 'srMobKKR', 'blz.jpeg', '1', 0),
(26, 'WeCooking ADM', 'we.cooking.emails@gmail.com', 'srgjaKY=', 'BOLOlimao2.jpeg', '1', 1),
(27, 'gregoryk', 'gregorykolbe10@gmail.com', 'srMpbg==', NULL, '1', 0),
(28, 'Leo', 'leonardo.pinhelli@escola.pr.gov.br', 'srMobKKR', NULL, '1', 0),
(29, 'Herick Gustavo Da Silva ', 'gustavo.silva.herick@escola.pr.gov.br', 'y+QrbqCWcT4=', NULL, '1', 0),
(30, 'victor', 'victor.roseno@escola.pr.gov.br', '8OR1N/HUJHtjXg==', 'IMG_20231116_224411_585.jpg', '1', 0),
(31, 'Gregory', 'gregorykolbe@escola.pr.gov.br', 'srMobKKR', NULL, '1', 0),
(32, 'alvaro', 'alvarobarriga8765@gmail.com', '6e56MPzVImt2WM0Ckw7a', NULL, '0', 0);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`), ADD KEY `user_id` (`user_id`), ADD KEY `receipt_id` (`receipt_id`);

--
-- Índices de tabela `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`favorite_id`), ADD KEY `id_usuario` (`user_id`), ADD KEY `id_receita` (`receipt_id`);

--
-- Índices de tabela `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rating_id`), ADD KEY `id_usuario` (`user_id`), ADD KEY `id_receita` (`receipt_id`);

--
-- Índices de tabela `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`receipt_id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de tabela `favorites`
--
ALTER TABLE `favorites`
  MODIFY `favorite_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT de tabela `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT de tabela `receipts`
--
ALTER TABLE `receipts`
  MODIFY `receipt_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=261;
--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `comments`
--
ALTER TABLE `comments`
ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`receipt_id`) REFERENCES `receipts` (`receipt_id`);

--
-- Restrições para tabelas `favorites`
--
ALTER TABLE `favorites`
ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`receipt_id`) REFERENCES `receipts` (`receipt_id`);

--
-- Restrições para tabelas `ratings`
--
ALTER TABLE `ratings`
ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`receipt_id`) REFERENCES `receipts` (`receipt_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
