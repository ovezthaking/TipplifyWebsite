-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2024 at 09:30 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tipplify`
--

-- --------------------------------------------------------

--
-- Table structure for table `detal_przepis`
--

CREATE TABLE `detal_przepis` (
  `idd` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `ilosc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detal_przepis`
--

INSERT INTO `detal_przepis` (`idd`, `s_id`, `p_id`, `ilosc`) VALUES
(1, 3, 1, 1),
(2, 1, 1, 120),
(3, 2, 1, 60),
(4, 7, 2, 8),
(5, 4, 2, 50),
(6, 5, 2, 20),
(7, 6, 2, 40),
(8, 8, 2, 1),
(9, 9, 3, 60),
(10, 10, 3, 4),
(11, 11, 3, 2),
(12, 12, 3, 1),
(13, 13, 4, 90),
(14, 14, 4, 10),
(15, 15, 4, 2),
(16, 16, 4, 1),
(17, 4, 5, 40),
(18, 17, 5, 20),
(19, 18, 5, 15),
(20, 19, 5, 10),
(21, 52, 5, 1),
(22, 21, 6, 50),
(23, 22, 6, 25),
(24, 19, 6, 25),
(25, 7, 6, 7),
(26, 23, 6, 1),
(27, 21, 7, 30),
(28, 24, 7, 30),
(29, 25, 7, 15),
(30, 19, 7, 20),
(31, 7, 7, 6),
(32, 26, 7, 1),
(33, 27, 7, 1),
(34, 28, 8, 60),
(35, 29, 8, 30),
(36, 30, 8, 2),
(37, 7, 8, 6),
(38, 31, 8, 1),
(39, 32, 9, 50),
(40, 17, 9, 30),
(41, 19, 9, 30),
(42, 7, 9, 8),
(43, 23, 9, 1),
(44, 33, 10, 60),
(45, 34, 10, 15),
(46, 35, 10, 1),
(47, 36, 11, 10),
(48, 16, 11, 1),
(49, 28, 11, 60),
(50, 12, 11, 1),
(51, 37, 11, 1),
(52, 21, 19, 40),
(53, 36, 19, 9),
(54, 38, 19, 4),
(55, 11, 19, 2),
(56, 39, 19, 1),
(57, 33, 12, 30),
(58, 29, 12, 30),
(59, 41, 12, 30),
(60, 7, 12, 6),
(61, 43, 12, 1),
(62, 16, 13, 1),
(63, 30, 13, 2),
(64, 28, 13, 60),
(65, 7, 13, 5),
(66, 44, 13, 1),
(67, 21, 14, 60),
(68, 45, 14, 90),
(69, 46, 14, 120),
(70, 48, 14, 1),
(71, 7, 14, 6),
(72, 47, 14, 1),
(73, 7, 15, 2),
(74, 49, 15, 2),
(75, 50, 15, 60),
(76, 16, 15, 1),
(77, 51, 15, 2),
(78, 52, 15, 1),
(79, 53, 16, 40),
(80, 54, 16, 20),
(81, 18, 16, 40),
(82, 56, 16, 40),
(83, 7, 16, 6),
(84, 27, 16, 1),
(85, 33, 17, 40),
(86, 61, 17, 20),
(87, 17, 17, 10),
(88, 59, 17, 20),
(89, 46, 17, 30),
(90, 58, 17, 15),
(91, 7, 17, 5),
(92, 60, 17, 3),
(93, 32, 20, 50),
(94, 56, 20, 120),
(95, 59, 20, 15),
(96, 7, 20, 6),
(97, 33, 18, 60),
(98, 58, 18, 30),
(99, 22, 18, 15),
(100, 7, 18, 5),
(101, 63, 18, 1),
(102, 62, 18, 1),
(103, 28, 21, 45),
(104, 58, 21, 25),
(105, 22, 21, 20),
(106, 64, 21, 20),
(107, 65, 21, 2),
(108, 7, 21, 10);

-- --------------------------------------------------------

--
-- Table structure for table `przepisy`
--

CREATE TABLE `przepisy` (
  `idp` int(11) NOT NULL,
  `nazwa` text NOT NULL,
  `opis` text NOT NULL,
  `zdjecie_path` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `przepisy`
--

INSERT INTO `przepisy` (`idp`, `nazwa`, `opis`, `zdjecie_path`) VALUES
(1, 'Bellini', 'W blenderze połączyć 120 ml prosecco i 60 ml puree z białego brzoskwiniowego. Nalewać do szklanki typu flauta. Udekorować plasterkiem brzoskwini.', 'Assets/bellini.png'),
(2, 'Blue Lagoon', 'W szklance typu highball połączyć 50 ml wódki, 20 ml blue curaçao oraz sok z połowy limonki. Nalewać do szklanki z lodem. Udekorować kawałkiem limonki.', 'Assets/blue_lagoon.png'),
(3, 'Caipirinha', 'Pokroić limonkę na ćwiartki i umieścić je w szkle typu old-fashioned. Posypać cukrem trzcinowym i dokładnie ugnieść. Następnie dodać kruszony lód oraz 60 ml cachacy. Delikatnie zamieszać. Udekorować limonką.', 'Assets/caipirinha.png'),
(4, 'Champagne Cocktail', 'Kostkę cukru nasączamy angosturą i umieszczamy w kieliszku. Wlewamy na nią koniak, następnie powoli dodajemy szampan. Champagne cocktail możemy ozdobić plastrem pomarańczy i wisienką koktajlową.', 'Assets/champagnecocktail.png'),
(5, 'Cosmopolitan', 'W shakerze wymieszać 40 ml wódki, 20 ml likieru triple sec, 15 ml soku z żurawiny oraz 10 ml soku z limonki. Nalewać do szklanki typu martini. Udekorować spiralą skórki pomarańczowej.', 'Assets/cosmopolitan.png'),
(6, 'Daiquiri', 'W shakerze wymieszać 50 ml rumu białego, 25 ml syropu cukrowego oraz 25 ml soku z limonki. Nalewać do schłodzonej szklanki martini. Udekorować plasterkiem limonki.', 'Assets/daiquiri.png'),
(7, 'Mai Tai', 'W shakerze połączyć 30 ml rumu białego, 30 ml rumu ciemnego, 15 ml likieru migdałowego oraz 20 ml soku z limonki. Nalewać mieszankę do szklanki z lodem. Udekorować listkiem mięty i kawałkiem ananasa.', 'Assets/mai_tai.png'),
(8, 'Manhattan', 'W szkle do mieszania połączyć 60 ml bourbonu, 30 ml czerwonego wermutu i 2 krople Angostury Bitters. Nalewać do schłodzonej szklanki typu martini. Udekorować wisienką koktajlową.', 'Assets/manhattan.png'),
(9, 'Margarita', 'W shakerze połączyć 50 ml tequili, 30 ml likieru triple sec oraz 30 ml soku z limonki. Nalewać do szklanki z lodem. Udekorować plasterkiem limonki.', 'Assets/margarita.png'),
(10, 'Martini', 'W shakerze wymieszać 60 ml ginu i 15 ml vermouthu. Nalewać do schłodzonej szklanki typu martini. Udekorować skrópką cytrynową.', 'Assets/martini.png'),
(11, 'Mint Julep', 'W szkle typu julep umieścić 10 liści mięty, 1 kostkę cukru i 60 ml bourbonu. Delikatnie ugnieść miętę. Napełnić szklankę kruszonym lodem. Udekorować świeżą gałązką mięty.', 'Assets/mint_julep.png'),
(12, 'Negroni', 'W szkle typu old-fashioned połączyć 30 ml ginu, 30 ml czerwonego wermutu oraz 30 ml likieru Campari. Nalewać do szklanki z lodem. Udekorować plasterkiem pomarańczy.', 'Assets/negroni.png'),
(13, 'Old Fashioned', 'W szkle typu old-fashioned umieścić kostkę cukru, nasączyć ją 2-3 kroplami Angostury Bitters i delikatnie rozetrzeć. Dodać 60 ml bourbonu i kilka kostek lodu. Udekorować spiralą skórki pomarańczowej.', 'Assets/old_fashioned.png'),
(14, 'Piña Colada', 'W blenderze połączyć 60 ml rumu białego, 90 ml mleka kokosowego oraz 120 ml soku ananasowego. Dodać łyżkę cukru i dużo lodu. Blendować do uzyskania gładkiej konsystencji. Nalewać do szklanki typu hurricane. Udekorować kawałkiem ananasa.', 'Assets/pina_colada.png'),
(15, 'Sazerac', 'W szkle typu old-fashioned zamrozić kawałek lodu. Następnie nasączyć go 2-3 kroplami absyntu. W innym szkle wymieszać 60 ml rye whiskey, 1 kostkę cukru nasączoną wodą i 2-3 krople Peychaud\'s Bitters. Nalewać do przygotowanego szkła. Udekorować skórką cytrynową.', 'Assets/sazerac.png'),
(16, 'Sex on the Beach', 'W shakerze wymieszać 40 ml wódki brzoskwiniowej, 20 ml likieru malibu, 40 ml soku żurawinowego oraz 40 ml soku pomarańczowego. Nalewać do szklanki typu hurricane z lodem. Udekorować kawałkiem ananasa.', 'Assets/sex_on_the_beach.png'),
(17, 'Singapore Sling', 'W shakerze połączyć 40 ml ginu, 20 ml likieru cherry brandy, 10 ml likieru triple sec, 20 ml syropu grenadine, 30 ml soku z ananasa oraz 15 ml soku z cytryny. Nalewać do szklanki z lodem. Udekorować wiórkami ananasa.', 'Assets/singapore_sling.png'),
(18, 'Tom Collins', 'W shakerze wymieszać 60 ml ginu, 30 ml soku z cytryny oraz 15 ml syropu cukrowego. Nalewać do szklanki typu highball z lodem. Udekorować plasterkiem cytryny i wiązką mięty.', 'Assets/tom_collins.png'),
(19, 'Mojito', 'Skruszyć lód, limonkę wyszorować, pokroić na ćwiartki i wrzucić do szklanki typu highball/long drink. Zasypać cukrem i dokładnie ugnieść. Następnie dodać listki mięty i znowu ugnieść. Do połowy wysokości szklanki dodać kruszony lód, a następnie rum i znów lód (kruszony). Zamieszać. Na wierzch dodać wodę gazowaną i delikatnie zmieszać. Szklankę udekorować limonką i listkami mięty.', 'Assets/mojito.png'),
(20, 'Tequila Sunrise', 'W szklance typu highball połączyć 50 ml tequili, 120 ml soku pomarańczowego i 10 ml syropu grenadine. Nalewać do szklanki z lodem. Nie mieszaj, aby uzyskać efekt wschodu słońca. Udekorować plastrem pomarańczy.', 'Assets/tequila_sunrise.png'),
(21, 'Whisky Sour', 'Do shakera wrzuć 5 kostek lodu, a następnie wlej whisky, sok z cytryny, syrop, białko oraz Angosturę. Energicznie wstrząśnij i oddziel lód od reszty składników, wysypując go do zlewu. Następnie zamknij shaker i znowu wstrząśnij w celu uzyskania gęstszej piany. Do szklanki wrzuć 5 kostek lodu, przelej delikatnie zawartość shakera. Koktajl udekoruj słomką do picia oraz skórką z cytryny. I gotowe!', 'Assets/wsour.png');

-- --------------------------------------------------------

--
-- Table structure for table `skladnikii`
--

CREATE TABLE `skladnikii` (
  `ids` int(11) NOT NULL,
  `skladnik` text NOT NULL,
  `jednostka` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skladnikii`
--

INSERT INTO `skladnikii` (`ids`, `skladnik`, `jednostka`) VALUES
(1, 'prosecco 🍾', 'ml'),
(2, 'puree z białego brzoskwiniowego 🍑', 'ml'),
(3, 'plasterek brzoskwini 🍑', 'szt.'),
(4, 'wódka 🥃', 'ml'),
(5, 'blue curaçao 🍹', 'ml'),
(6, 'Sok z limonki 🍋‍🟩', 'ml'),
(7, 'Kostki lodu ❄️', 'szt.'),
(8, 'limonka 🍋‍🟩', 'szt.'),
(9, 'cachaca 🥃', 'ml'),
(10, 'limonki 🍋‍🟩', 'ćwiartki'),
(11, 'cukier trzcinowy 🍬', 'łb.'),
(12, 'kruszony lód ❄️', 'szklanki'),
(13, 'wytrawny szampan 🍾', 'ml'),
(14, 'koniak 🥃', 'ml'),
(15, 'agnostura 🍼', 'kropla'),
(16, 'kostka cukru 🧊', 'szt.'),
(17, 'likier triple sec 🍹', 'ml'),
(18, 'sok z żurawiny 🍇', 'ml'),
(19, 'sok z limonki 🍋‍🟩', 'ml'),
(20, 'Spirala skórki pomarańczowej 🍊', 'szt.'),
(21, 'rum biały 🥃', 'ml'),
(22, 'syrop cukrowy 🍬', 'ml'),
(23, 'plasterek limonki 🍋‍🟩', 'szt.'),
(24, 'rum ciemny 🥃', 'ml'),
(25, 'likier migdałowy 🍹', 'ml'),
(26, 'listek mięty 🌿', 'szt.'),
(27, 'kawałek ananasa 🍍', 'szt.'),
(28, 'bourbon 🥃', 'ml'),
(29, 'czerwony wermut 🍷', 'ml'),
(30, 'angostura bitters 🍹', 'kropla'),
(31, 'Wisienka koktajlowa 🍒', 'szt.'),
(32, 'tequila 🥃', 'ml'),
(33, 'gin 🍸', 'ml'),
(34, 'vermouth 🍹', 'ml'),
(35, 'skrópka cytrynowa 🍋', 'szt.'),
(36, 'liść mięty 🌿', 'szt.'),
(37, 'gałązka mięty 🌿', 'szt.'),
(38, 'ząbek limonki 🍋‍🟩', 'szt.'),
(39, 'woda sodowa 💧✨', 'squirt'),
(40, 'gin 🍸', 'ml'),
(41, 'likier Campari 🍹', 'ml'),
(42, 'czerwony wermut 🍷', 'ml'),
(43, 'plasterek pomarańczy 🍊', 'szt.'),
(44, 'spirala skórki pomarańczowej 🍊', 'szt.'),
(45, 'mleko kokosowe 🥥', 'ml'),
(46, 'sok ananasowy 🍍', 'ml'),
(47, 'kawałek ananasa 🍍', 'szt.'),
(48, 'cukrier trzcinowy 🍬', 'łyżka'),
(49, 'Absynt 🥃', 'ml'),
(50, 'rye whiskey 🥃', 'ml'),
(51, 'Peychaud\'s Bitters 🍹', 'kropla'),
(52, 'spirala skórki cytrynowej 🍋', 'szt.'),
(53, 'wódka brzoskwiniowa 🥃', 'ml'),
(54, 'likier malibu 🍹', 'ml'),
(55, 'sok żurawinowegy 🍇', 'ml'),
(56, 'sok pomarańczowy 🍊', 'ml'),
(57, 'Kawałek ananasa 🍍', 'szt.'),
(58, 'sok z cytryny 🍋', 'ml'),
(59, 'syrop grenadine 🍷', 'ml'),
(60, 'wiórka ananasa 🍍', 'szt.'),
(61, 'likier cherry brandy 🍒', 'ml'),
(62, 'wiązka mięty 🌿', 'szt.'),
(63, 'plasterek cytryny 🍋', 'szt.'),
(64, 'oddzielone białko jaja kurzego 🥚', 'ml'),
(65, 'angostura bitter 🍼', 'dash');

-- --------------------------------------------------------

--
-- Table structure for table `sugerowanie`
--

CREATE TABLE `sugerowanie` (
  `idsu` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `ilosc_wejsc` int(11) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sugerowanie`
--

INSERT INTO `sugerowanie` (`idsu`, `u_id`, `p_id`, `ilosc_wejsc`, `data`) VALUES
(1, 3, 10, 4, '2024-05-22 21:25:11'),
(2, 3, 19, 2, '2024-05-24 21:25:11'),
(3, 5, 13, 1, '2024-05-27 21:25:11'),
(4, 3, 17, 3, '2024-05-27 21:25:11'),
(5, 5, 3, 8, '2024-05-06 21:26:43'),
(6, 4, 2, 1, '2024-05-27 21:25:11'),
(7, 2, 16, 6, '2024-05-15 21:27:06'),
(8, 2, 5, 6, '2024-05-17 21:27:18'),
(9, 1, 18, 2, '2024-05-18 21:27:33'),
(10, 2, 15, 2, '2024-05-09 21:27:47');

-- --------------------------------------------------------

--
-- Table structure for table `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `idu` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `haslo` varchar(30) NOT NULL,
  `imie` text NOT NULL,
  `nazwisko` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`idu`, `login`, `haslo`, `imie`, `nazwisko`) VALUES
(1, 'szybkimarcinek2115', 'marcin1234', 'Marcin', 'Kowalski'),
(2, 'megazord', 'megamega2137', 'Jakub', 'Szajkowski'),
(3, 'akordeon3000', 'jacunia2006', 'Jacek', 'Murański'),
(4, 'kreglowaniejestg', 'amelinum432423', 'Mariusz', 'Pankowski'),
(5, 'ezaeza', 'kenjenjskjsalkna412421', 'Maja', 'Senkowska');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detal_przepis`
--
ALTER TABLE `detal_przepis`
  ADD PRIMARY KEY (`idd`) USING BTREE,
  ADD UNIQUE KEY `idd` (`idd`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `przepisy`
--
ALTER TABLE `przepisy`
  ADD PRIMARY KEY (`idp`),
  ADD UNIQUE KEY `opis` (`opis`) USING HASH;

--
-- Indexes for table `skladnikii`
--
ALTER TABLE `skladnikii`
  ADD PRIMARY KEY (`ids`);

--
-- Indexes for table `sugerowanie`
--
ALTER TABLE `sugerowanie`
  ADD PRIMARY KEY (`idsu`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`idu`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `idu` (`idu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detal_przepis`
--
ALTER TABLE `detal_przepis`
  MODIFY `idd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `przepisy`
--
ALTER TABLE `przepisy`
  MODIFY `idp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `skladnikii`
--
ALTER TABLE `skladnikii`
  MODIFY `ids` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `sugerowanie`
--
ALTER TABLE `sugerowanie`
  MODIFY `idsu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `idu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detal_przepis`
--
ALTER TABLE `detal_przepis`
  ADD CONSTRAINT `detal_przepis_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `przepisy` (`idp`),
  ADD CONSTRAINT `detal_przepis_ibfk_2` FOREIGN KEY (`s_id`) REFERENCES `skladnikii` (`ids`);

--
-- Constraints for table `sugerowanie`
--
ALTER TABLE `sugerowanie`
  ADD CONSTRAINT `sugerowanie_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `przepisy` (`idp`),
  ADD CONSTRAINT `sugerowanie_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `uzytkownicy` (`idu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
