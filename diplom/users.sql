-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 10 2022 г., 09:15
-- Версия сервера: 5.7.33-log
-- Версия PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `users`
--

-- --------------------------------------------------------

--
-- Структура таблицы `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `user_id` int(6) UNSIGNED NOT NULL,
  `test_id` int(6) UNSIGNED NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `userlist`
--

CREATE TABLE `userlist` (
  `id` int(6) UNSIGNED NOT NULL,
  `login` varchar(64) NOT NULL,
  `name` varchar(64) DEFAULT NULL,
  `surname` varchar(64) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `password` varchar(256) NOT NULL,
  `score` int(11) NOT NULL DEFAULT '0',
  `avatar` varchar(256) DEFAULT NULL,
  `role` int(3) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `userlist`
--

INSERT INTO `userlist` (`id`, `login`, `name`, `surname`, `birthday`, `password`, `score`, `avatar`, `role`) VALUES
(1, 'First', 'Пользователь', 'Первый', '2001-01-01', '$2y$13$1NivAVA4KBhfU56slB5tBO29bPuHOmRsp9vlZA.29CVRKc/XRgZxS', 0, 'png', 1),
(2, 'Second', 'Пользователь', 'Второй', '1994-12-02', '$2y$13$2.cwCE8q7mu2QxKVUkM99Or8z1EEhPhz3Dg2HznKaYdZPCbsxSVe2', 0, 'png', 1),
(3, 'User3', '', '', '2022-02-22', '$2y$13$2fqieqwa12XAVosqEsIwCu91UHIVXdgKr0.wxCFW5/0HILnMcNya2', 0, NULL, 1),
(4, 'UserNew', '', '', '2012-12-12', '$2y$13$Wf.SkyBGv6OdJa3EyWmWo.ZM.WAdQ46uDwN7qO7FJVWJOO3b.JZyK', 0, NULL, 1),
(5, 'werwerwer', '', '', '2011-11-20', '$2y$13$sjEvv3HMceKkqvPkq5lbmesiJiJZ6Lm4Kis8beB6hKLwMhQfvs0Ru', 0, 'jpg', 1),
(6, 'RRRRRR', '', '', '2011-11-11', '$2y$13$OjdVchO2DceFuSKZE5p2cu0rQVu04y7kufpl.bkcWMZnk0a4cd2xm', 0, 'jpg', 1),
(7, 'First_two', '', '', '2012-12-12', '$2y$13$cDJypLo6o0vy8xET0c3dXetONYO85c4tGaeeLVyM8CxsdyAD5pV/m', 0, 'bmp', 1),
(8, 'GGGG', '', '', '2032-02-23', '$2y$13$K6TnWEaIpu9mgbG/yZgcHuedbkDn8NQTMMt9XovBOMt8N3vnD/BbO', 0, NULL, 1),
(9, 'DSSFDFSvsv', '', '', '2044-04-04', '$2y$13$MiTrI/gDp6zq2lWmVMYMSORTiYMnacebC1NBAkNQ5wVY1ZXJAv5G6', 0, NULL, 1),
(10, 'admin', '', '', '2000-01-01', '$2y$13$usRkzk/XswSREbZRBnrkuOekMzIwmg4fNXwdOf56kimbrGcSPjbpy', 0, 'png', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user_id`),
  ADD KEY `test` (`test_id`);

--
-- Индексы таблицы `userlist`
--
ALTER TABLE `userlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `userlist`
--
ALTER TABLE `userlist`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `userlist` (`id`),
  ADD CONSTRAINT `results_ibfk_2` FOREIGN KEY (`test_id`) REFERENCES `questions`.`tests` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
