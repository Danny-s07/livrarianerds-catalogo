-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Jun-2022 às 15:55
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `livraria_db`
--
CREATE DATABASE IF NOT EXISTS `livraria_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `livraria_db`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias_tb`
--

CREATE TABLE `categorias_tb` (
  `id_categoria` int(11) NOT NULL,
  `value` char(4) NOT NULL,
  `label` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categorias_tb`
--

INSERT INTO `categorias_tb` (`id_categoria`, `value`, `label`) VALUES
(1, 'ficp', 'Ficção Policial'),
(4, 'fic', 'Ficção '),
(5, 'roma', 'Romance'),
(6, 'clas', 'Classico');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios_tb`
--

CREATE TABLE `comentarios_tb` (
  `id_comentario` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `data` date NOT NULL,
  `comentario` tinytext NOT NULL,
  `status` enum('in','ap','rp') NOT NULL,
  `id_liv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `comentarios_tb`
--

INSERT INTO `comentarios_tb` (`id_comentario`, `nome`, `email`, `data`, `comentario`, `status`, `id_liv`) VALUES
(1, 'nome', 'email@email', '2022-04-13', 'comentario', 'ap', 11),
(2, 'Aleatorio', 'aleatorio@aleatorio', '2022-04-13', 'Melhor Livro !!!!!!!!!!!!!!!!!!!!!!!!!', 'ap', 9),
(3, 'nome', 'email@email', '2022-04-13', 'comentario ..............', 'rp', 9),
(4, 'nome2', 'email2@email34', '2022-04-13', 'comentario dois ponto zero', 'ap', 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros_tb`
--

CREATE TABLE `livros_tb` (
  `id_livro` int(11) NOT NULL,
  `data` date NOT NULL,
  `categoria` char(4) NOT NULL,
  `titulo` tinytext NOT NULL,
  `resumo` text NOT NULL,
  `autor` varchar(100) NOT NULL,
  `pagina` int(11) NOT NULL,
  `preco` decimal(7,2) NOT NULL,
  `imagem` varchar(48) NOT NULL,
  `alt` varchar(100) NOT NULL,
  `destaque` enum('sim','nao') NOT NULL,
  `editora` varchar(50) NOT NULL,
  `texto` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `livros_tb`
--

INSERT INTO `livros_tb` (`id_livro`, `data`, `categoria`, `titulo`, `resumo`, `autor`, `pagina`, `preco`, `imagem`, `alt`, `destaque`, `editora`, `texto`) VALUES
(9, '2022-04-13', 'ficp', 'Box Sherlock Holmes', 'Em 1887, o escritor escocês sir Arthur Conan Doyle criou Sherlock Holmes, o infalível detetive a quem os agentes da Scotland Yard recorriam para solucionar os mistérios mais intrigantes da Inglaterra vitoriana.', 'Arthur Conan Doyle ', 1808, '70.00', 'sherlock.jpg', '', 'sim', 'Harpercollins', 'Em 1887, o escritor escocês sir Arthur Conan Doyle criou Sherlock Holmes, o infalível detetive a quem os agentes da Scotland Yard recorriam para solucionar os mistérios mais intrigantes da Inglaterra vitoriana. Desde então, as aventuras do mestre da investigação atraem leitores ávidos por chegar à última página e ver o enigma desvendado. Esta obra completa reúne os quatro romances e os 56 contos sobre as aventuras do detetive mais famoso do mundo e de seu fiel companheiro, o dr. Watson. Para desvendar mistérios, o faro e a astúcia de Sherlock Holmes levam às fontes menos óbvias, às informações mais precisas. Um modelo que influencia até hoje a literatura policial e revela fôlego para impressionar gerações de leitores através dos tempos.'),
(10, '2022-04-13', 'roma', 'A cinco passos de Você', 'Stella Grant gosta de estar no controle. Ela parece ser uma adolescente típica, mas em sua rotina há listas de tarefas e inúmeros remédios que ela deve tomar para controlar a fibrose cística.', 'Rachael Lippincott', 288, '27.00', 'cincopassos.jpeg', '', 'sim', 'Alt', 'Stella Grant gosta de estar no controle. Ela parece ser uma adolescente típica, mas em sua rotina há listas de tarefas e inúmeros remédios que ela deve tomar para controlar a fibrose cística, uma doença crônica que impede que seus pulmões funcionem como deveriam. Suas prioridades são manter seus pais felizes e conseguir um transplante – e uma coisa não existe sem a outra. Mas para ganhar pulmões novos, Stella precisa seguir seu tratamento à risca e eliminar qualquer chance de infecção, o que significa que ela não pode ficar a menos que dois metros de distância – ou seis passos – de outros pacientes com a doença. O primeiro item é fácil para ela, mas o segundo pode se provar mais difícil do que ela esperava.'),
(11, '2022-04-13', 'clas', 'Auto da Compadecida', 'O \"Auto da Compadecida\" consegue o equilíbrio perfeito entre a tradição popular e a elaboração literária ao recriar para o teatro episódios registrados na tradição popular do cordel.', 'Ariano Suassuna', 208, '25.00', 'capaautoda compadecida.jpg', '', 'sim', 'Nova Fronteira', 'O \"Auto da Compadecida\" consegue o equilíbrio perfeito entre a tradição popular e a elaboração literária ao recriar para o teatro episódios registrados na tradição popular do cordel. É uma peça teatral em forma de Auto em 3 atos, escrita em 1955 pelo autor paraibano Ariano Suassuna. Sendo um drama do Nordeste brasileiro, mescla elementos como a tradição da literatura de cordel, a comédia, traços do barroco católico brasileiro e, ainda, cultura popular e tradições religiosas. Apresenta na escrita traços de linguagem oral [demonstrando, na fala do personagem, sua classe social] e apresenta também regionalismos relativos ao Nordeste. Esta peça projetou Suassuna em todo o país e foi considerada, em 1962, por Sábato Magaldi \"o texto mais popular do moderno teatro brasileiro\".'),
(12, '2022-04-13', 'clas', 'Memorias Postumas de Bras Cubas', 'Brás Cubas está morto. Mas isso não o impede de relatar em seu livro os acontecimentos de sua existência e de sua grande ideia fixa: lançar o Emplasto Brás Cubas.', 'Machado de Assis', 480, '70.00', 'memoriasdebrascubas.jpg', '', 'nao', 'Antofagica', 'Brás Cubas está morto. Mas isso não o impede de relatar em seu livro os acontecimentos de sua existência e de sua grande ideia fixa: lançar o Emplasto Brás Cubas. Deus te livre, leitor, de uma ideia fixa. O medicamento anti-hipocondríaco torna-se o estopim de uma série de lembranças, reminiscências e digressões da vida do defunto autor.\r\n\r\nPublicado em 1881, escrito com a pena da galhofa e a tinta da melancolia, Memórias Póstumas de Brás Cubas é, possivelmente, o mais importante romance brasileiro de todos os tempos. Inovador, irônico, rebelde, toca no que há de mais profundo no ser humano. Mas vale avisar: há na alma desse livro, por mais risonho que pareça, um sentimento amargo e áspero.\r\n\r\nA edição da Antofágica conta com 88 ilustrações de um dos expoentes da arte no Brasil, Candido Portinari, que chegam pela primeira vez ao grande público e dão uma nova camada de interpretação ao clássico.\r\n\r\nO livro traz ainda com notas inéditas e posfácio de Rogério Fernandes dos Santos, especialista na obra machadiana, um perfil do autor escrito por Ale Santos (@savagefiction), além de uma introdução de Isabela Lubrano, do canal Ler Antes de Morrer.'),
(13, '2022-04-13', 'clas', 'A teus pés', 'Uma das vozes femininas mais marcantes e festejadas da poesia brasileira, Ana Cristina Cesar estreia a coleção “Poesia de bolso” com o clássico A teus pés. Leitura obrigatória do vestibular da Unicamp.', 'Ana Cristina Cesar', 144, '18.00', 'ateuspes.jpg', '', 'nao', 'Companhia das Letras', 'A teus pés é o primeiro e único livro de poemas que Ana Cristina Cesar lançou em vida por uma editora, em 1982. Além de material inédito, a obra reunia os três breves volumes que a autora havia publicado entre 1979 e 1980 em edições caseiras: Cenas de abril, Correspondência completa e Luvas de pelica. Desafiando o conceito de “literatura feminina” e dissolvendo as fronteiras entre prosa, poesia e ensaio, o eu lírico e o eu biográfico, Ana logo chamou a atenção de críticos como Heloisa Buarque de Hollanda e Silviano Santiago. Incluindo uma cronologia da autora, este clássico contemporâneo que integra Poética, a reunião de sua poesia completa, volta agora em forma avulsa às mãos do leitor, como foi idealizado pela autora.'),
(14, '2022-04-13', 'clas', 'Quarto de Despejo', 'O diário da catadora de papel Carolina Maria de Jesus deu origem à este livro, que relata o cotidiano triste e cruel da vida na favela. ', 'Carolina Maria de Jesus', 200, '39.00', 'quartodedespejo.jpg', '', 'nao', 'Atica', 'O diário da catadora de papel Carolina Maria de Jesus deu origem à este livro, que relata o cotidiano triste e cruel da vida na favela. A linguagem simples, mas contundente, comove o leitor pelo realismo e pelo olhar sensível na hora de contar o que viu, viveu e sentiu nos anos em que morou na comunidade do Canindé, em São Paulo, com três filhos.'),
(15, '2022-04-13', 'clas', 'A Hora da Estrela', 'Último livro escrito por Clarice Lispector, A hora da estrela é também uma despedida. Lançada pouco antes de sua morte em 1977, a obra conta os momentos de criação do escritor Rodrigo S. M. (a própria Clarice) narrando a história de Macabéa, uma alagoana órfã, virgem e solitária, criada por uma tia tirana, que a leva para o Rio de Janeiro, onde trabalha como datilógrafa. ', 'Clarice Lispector', 88, '15.00', 'horadaestrela.jpg', '', 'nao', 'Rocco', 'Último livro escrito por Clarice Lispector, A hora da estrela é também uma despedida. Lançada pouco antes de sua morte em 1977, a obra conta os momentos de criação do escritor Rodrigo S. M. (a própria Clarice) narrando a história de Macabéa, uma alagoana órfã, virgem e solitária, criada por uma tia tirana, que a leva para o Rio de Janeiro, onde trabalha como datilógrafa. Em A hora da estrela Clarice escreve sabendo que a morte está próxima e põe um pouco de si nas personagens Rodrigo e Macabéa. Ele, um escritor à espera da morte; ela, uma solitária que gosta de ouvir a Rádio Relógio e que passou a infância no Nordeste, como Clarice. A despedida de Clarice é uma obra instigante e inovadora. Como diz o personagem Rodrigo, \"estou escrevendo na hora mesma em que sou lido\". É Clarice contando uma história e, ao mesmo tempo, revelando ao leitor seu processo de criação e sua angústia diante da vida e da morte. Macabéa, a nordestina, cumpre seu destino sem reclamar. Feia, magra, sem entender muito bem o que se passa à sua volta, é maltratada pelo namorado Olímpico e pela colega Glória. Os dois são o seu oposto: o metalúrgico Olímpico sonha alto e quer ser deputado, e Glória, carioca da gema e gorda, tem família e hora certa para comer. Os dois acabam juntos, enquanto Macabéa, sozinha, continua a viver sem saber por que está vivendo, sem pensar no futuro nem sonhar com uma vida melhor. Até que um dia, seguindo uma recomendação de Glória, procura a cartomante Carlota, uma ex-prostituta do Mangue, que revela a Macabéa toda a inutilidade de sua vida. Mas também enche-a de esperança, prevendo a paixão por um estrangeiro rico, com quem ela iria se casar.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios_tb`
--

CREATE TABLE `usuarios_tb` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(24) NOT NULL,
  `senha` varchar(8) NOT NULL,
  `senha_md5` varchar(32) NOT NULL,
  `nome` tinytext NOT NULL,
  `tipo` enum('sup','com') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios_tb`
--

INSERT INTO `usuarios_tb` (`id_usuario`, `usuario`, `senha`, `senha_md5`, `nome`, `tipo`) VALUES
(1, 'amanda', '4321', 'd93591bdf7860e1e4ee2fca799911215', 'Amanda  Lopes', 'sup'),
(2, 'lucia', '1234', '81dc9bdb52d04dc20036dbd8313ed055', 'Lucia Rodrigues de Souza', 'com'),
(3, 'bruna', '23456', 'adcaec3805aa912c0d0b14a81bedb6ff', 'Bruna Rodrigues Oliveira', 'com');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias_tb`
--
ALTER TABLE `categorias_tb`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices para tabela `comentarios_tb`
--
ALTER TABLE `comentarios_tb`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_liv` (`id_liv`);

--
-- Índices para tabela `livros_tb`
--
ALTER TABLE `livros_tb`
  ADD PRIMARY KEY (`id_livro`);

--
-- Índices para tabela `usuarios_tb`
--
ALTER TABLE `usuarios_tb`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias_tb`
--
ALTER TABLE `categorias_tb`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `comentarios_tb`
--
ALTER TABLE `comentarios_tb`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `livros_tb`
--
ALTER TABLE `livros_tb`
  MODIFY `id_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `usuarios_tb`
--
ALTER TABLE `usuarios_tb`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `comentarios_tb`
--
ALTER TABLE `comentarios_tb`
  ADD CONSTRAINT `comentarios_tb_ibfk_1` FOREIGN KEY (`id_liv`) REFERENCES `livros_tb` (`id_livro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
