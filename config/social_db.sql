-- phpMyAdmin SQL Dump
-- version 4.6.6deb1+deb.cihar.com~xenial.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 16 Maj 2017, 00:51
-- Wersja serwera: 5.7.18-0ubuntu0.16.04.1
-- Wersja PHP: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `social_db`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Messages`
--

CREATE TABLE `Messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `form_user` int(10) DEFAULT NULL,
  `msg_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Posts`
--

CREATE TABLE `Posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_tittle` varchar(25) COLLATE utf8_polish_ci DEFAULT NULL,
  `post_text` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `post_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `Posts`
--

INSERT INTO `Posts` (`id`, `user_id`, `post_tittle`, `post_text`, `post_date`) VALUES
(1, 4, 'Test tittle', 'Test text', '2017-05-14'),
(2, 4, 'New post', 'New post text', '2017-05-14'),
(3, 4, 'Test tittle Lorem', 'Lorem Lorem', '2017-05-15'),
(4, 4, 'Test tittle', 'Test text', '2017-05-15'),
(5, 4, 'Test tittle', 'Lorem ipsum', '2017-05-15'),
(7, 3, 'Lorem tekst two', 'Lorem lorem lorem lorem x2000', '2017-05-15');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `hashed_password` varchar(60) CHARACTER SET utf8 COLLATE utf8_roman_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Zrzut danych tabeli `Users`
--

INSERT INTO `Users` (`id`, `email`, `username`, `hashed_password`) VALUES
(2, 'new.andrzej@gmail.com', 'andrzej', '$2y$11$O.2loXjRC9BQVbn6RUX6kew6FJWIijFrmi.Zs8SvBMfrYrqc8lCxS'),
(3, 'kowal@kowal.pl', 'MichaÅ‚ Kowal', '$2y$11$OXzelFJSPqhvlmYonLtQy.e.xKPUkT.YOvm1DNjVFW0W8JGbjSjjq'),
(4, 'nowak@test.pl', 'Ania Nowak', '$2y$11$JBTLwlgHkrGIG7Z6imAy.OGiIW2lvRkUW2Jjd89vBvZQVQk0Bjt7G');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `Posts`
--
ALTER TABLE `Posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `Posts`
--
ALTER TABLE `Posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT dla tabeli `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `Posts`
--
ALTER TABLE `Posts`
  ADD CONSTRAINT `Posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
