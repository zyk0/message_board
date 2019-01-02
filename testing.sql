-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Янв 02 2019 г., 14:38
-- Версия сервера: 10.1.36-MariaDB
-- Версия PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `testing`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `intro` text NOT NULL,
  `text` text NOT NULL,
  `date` int(11) UNSIGNED NOT NULL,
  `avtor` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `title`, `intro`, `text`, `date`, `avtor`) VALUES
(1, 'Near Algodones', 'A young cowboy robs an isolated bank', ' the sheriff orders him to hang.  the cowboy stands upon the gallows with three other men awaiting execution.', 1544369928, 'gosha'),
(2, 'Green Day - Basket Case', 'Do you have the time to listen to me whine', 'Sometimes I give myself the creeps', 1544423789, 'gosha'),
(4, 'The Gal Who Got Rattled', 'Alice Longabaugh and her older brother Gilbert', 'Alice shot herself as he had instructed. Mr. Arthur sadly walks back to the wagon train with President Pierce, unsure of what to say to Billy Knapp.', 1544423881, 'gosha'),
(5, 'Green Day', 'Ordinary World (feat. Miranda Lambert)', 'Greatest Hits: God&#39;s Favorite Band', 1544425144, 'gosha'),
(6, 'SprÃ¥kmyndigheter', 'bÃ¶rjar Laurentius och brÃ¶', 'Ã¤ven En vokallÃ¤ngd ordeskÃ¶tsel&#34; frÃ¥n 1680.\n Ã¶verkalixmÃ¥l dalmÃ¥l Ã¤r frÃ¥nvarande', 1544425248, 'gosha'),
(7, 'PHP-Entwickler', 'Country	Germany State	Bavaria', 'Kenntnisse in PHP 7.2\nErfahrung mit MySQL', 1544429144, 'gosha'),
(8, 'fisher fisher fisher', 'fisher fisher fisher', 'fisher fisher fisher', 1544430455, 'fisher'),
(9, 'ivan turgenev', 'novell mumu i gerasim', 'story about poor little goddy and his no-spiking owner', 1544432514, 'mumu');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(25) NOT NULL,
  `mess` text NOT NULL,
  `article_id` int(11) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `name`, `mess`, `article_id`) VALUES
(1, 'fortsÃ¤ttningen', 'ommer vi att ha experter pÃ¥ teckensprÃ¥k och romani anstÃ¤llda, och kan dÃ¥ erbjuda sprÃ¥kvÃ¥rd fÃ¶r dessa sprÃ¥k. DÃ¤remot vill fÃ¶retrÃ¤dare fÃ¶r samiska att samisk sprÃ¥kvÃ¥rd Ã¤ven i fortsÃ¤ttningen skall ligga pÃ¥ S', 8),
(7, 'Norsk', '!!!!!', 8),
(4, 'Intelligenta klÃ¤der', 'FrÃ¥ga: Vad Ã¤r Ã¤lyvaatteet pÃ¥ svenska?', 8),
(8, 'Norsk', 'Det korrekte tegnet (opp og til hÃ¸yre) bÃ¸r settes inn via Â«sett inn symbolÂ»-funksjonen', 8),
(6, 'Handikapptoalett', 'Jag har sett att man i mÃ¥nga finlandssvenska sammanhang', 8);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(70) NOT NULL,
  `login` varchar(20) NOT NULL,
  `pass` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `login`, `pass`) VALUES
(1, 'gosha', 'gosha@gosha.ru', 'gosha', 'f7e89f4b748bfd391fbbb1ae42eeb3b8'),
(2, 'fisher', 'fisher@fisher.no', 'fisher', '2163c17ca50bb0fcd227460c4f682a40'),
(4, 'lom', 'lom@lom.lom', 'lom', 'e533d780c5a6e92e410aec36517d5cb8'),
(5, 'mord', 'mord', 'mord', '773738990e1e0ce48e3c0a940eca8079'),
(7, 'mumu', 'mumu@mumu.mumu', 'mumu', '23c1622d0f5af8a8a8cd90dd1898f3cb');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
