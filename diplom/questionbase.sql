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
-- База данных: `questions`
--

-- --------------------------------------------------------

--
-- Структура таблицы `questionbase`
--

CREATE TABLE `questionbase` (
  `id` int(11) UNSIGNED NOT NULL,
  `subject` int(3) UNSIGNED NOT NULL COMMENT 'Предмет',
  `theme1` int(8) UNSIGNED DEFAULT NULL COMMENT 'Тема 1',
  `theme2` int(8) UNSIGNED DEFAULT NULL COMMENT 'Тема 2',
  `class` int(3) UNSIGNED NOT NULL COMMENT '1-11',
  `type` int(3) UNSIGNED NOT NULL COMMENT 'Тип',
  `text` varchar(255) DEFAULT NULL COMMENT 'Формулировка',
  `var1` varchar(128) DEFAULT NULL COMMENT 'Вариант 1',
  `var2` varchar(128) DEFAULT NULL COMMENT 'Вариант 2',
  `var3` varchar(128) DEFAULT NULL COMMENT 'Вариант 3',
  `var4` varchar(128) DEFAULT NULL COMMENT 'Вариант 4',
  `answer` varchar(64) NOT NULL COMMENT 'Правильный ответ',
  `media` varchar(128) DEFAULT NULL COMMENT 'Путь к файлу',
  `hint` varchar(128) DEFAULT NULL COMMENT 'Подсказка'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `questionbase`
--

INSERT INTO `questionbase` (`id`, `subject`, `theme1`, `theme2`, `class`, `type`, `text`, `var1`, `var2`, `var3`, `var4`, `answer`, `media`, `hint`) VALUES
(1, 1, 6, NULL, 1, 2, 'Найди слова-действия:', 'зелёный', 'бояться', 'столб', 'читать', '2,4', NULL, 'Что делать? Что делает?'),
(2, 1, 5, NULL, 1, 1, 'Сколько слогов в слове <b>ЯБЛОКО</b>?', '1', '2', '3', '4', '3', NULL, NULL),
(3, 1, 2, NULL, 1, 1, 'Сколько звуков в слове <b>ЯБЛОКО</b>?', '6', '7', '8', '9', '1', NULL, NULL),
(4, 1, 2, 4, 1, 3, 'Сколько гласных букв в слове <b>ПЫЛЬ</b>?', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(5, 1, 1, 4, 1, 1, 'Сколько гласных букв в русском языке?', '6', '8', '10', '11', '3', NULL, NULL),
(6, 1, 1, 4, 1, 1, 'Сколько гласных звуков в русском языке?', '6', '8', '10', '11', '1', NULL, 'Меньше чем гласных букв'),
(7, 1, 2, 3, 1, 1, 'Сколько твёрдых согласных звуков в слове <b>ПОЛЯНКА</b>?', '1', '2', '3', '4', '1', NULL, NULL),
(8, 1, 2, 3, 1, 1, 'Сколько глухих согласных звуков в слове <b>ПОДУШКА</b>?', '1', '2', '3', '4', '3', NULL, NULL),
(9, 1, 5, NULL, 1, 3, 'Сколько слогов в слове <b>ПЛАНШЕТ</b>?', NULL, NULL, NULL, NULL, '2', NULL, NULL),
(10, 1, 2, 3, 1, 2, 'В каких словах два глухих согласных звука?', 'учебник', 'чаща', 'нитка', 'путь', '1,2,3,4', NULL, NULL),
(11, 1, 11, NULL, 2, 1, 'Подбери проверочное слово к слову <b>ЛЕСНИК</b>', 'лес', 'лесной', 'лесами', NULL, '1', NULL, NULL),
(12, 1, 11, NULL, 2, 1, 'Какую букву необходимо вставить в слово <b>Г...РА</b>?', 'о', 'а', NULL, NULL, '1', NULL, NULL),
(13, 1, 11, NULL, 2, 1, 'Нужна ли буква Т в слове <b>ЧУДЕС...НЫЙ</b>? ', 'нужна', 'не нужна', NULL, NULL, '2', NULL, NULL),
(14, 1, 11, NULL, 2, 1, 'Какую букву необходимо вставить в слово <b>ГР...БОК</b>?', 'и', 'е', NULL, NULL, '1', NULL, NULL),
(15, 1, 11, NULL, 2, 1, 'Какую букву необходимо вставить в слово <b>НО...</b>?', 'ш', 'ж', NULL, NULL, '2', NULL, NULL),
(16, 1, 11, NULL, 2, 1, 'Нужна ли буква Т в слове <b>ЯРОС...НЫЙ</b>?', 'нужна', 'не нужна', NULL, NULL, '1', NULL, NULL),
(17, 1, 11, NULL, 2, 1, 'Какую букву необходимо вставить в слово <b>ГОЛОЛЁ...</b>?', 'д', 'т', NULL, NULL, '1', NULL, NULL),
(18, 1, 11, NULL, 2, 1, 'Какую букву необходимо вставить в слово <b>РЫ...КА</b>?', 'п', 'б', NULL, NULL, '2', NULL, NULL),
(19, 1, 11, NULL, 2, 1, 'Какую букву необходимо вставить в слово <b>К...ЗА</b> ?', 'о', 'а', NULL, NULL, '1', NULL, NULL),
(20, 1, 11, NULL, 2, 1, 'Какую букву необходимо вставить в слово <b>МОРО...</b> ?', 'с', 'з', NULL, NULL, '2', NULL, NULL),
(21, 2, NULL, NULL, 3, 3, 'Запиши пропущенное слово:\r\n\r\nСквозь волнистые туманы\r\nПробирается луна,\r\nНа печальные поляны\r\nЛьёт печально ... она.', NULL, NULL, NULL, NULL, 'свет', NULL, NULL),
(22, 3, 30, NULL, 1, 1, '<b>5 + 6 = ?</b>', '1', '9', '11', '14', '3', NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `questionbase`
--
ALTER TABLE `questionbase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Предмет` (`subject`),
  ADD KEY `Тип` (`type`),
  ADD KEY `theme` (`theme1`),
  ADD KEY `Тема 2` (`theme2`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `questionbase`
--
ALTER TABLE `questionbase`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `questionbase`
--
ALTER TABLE `questionbase`
  ADD CONSTRAINT `Предмет` FOREIGN KEY (`subject`) REFERENCES `subjects` (`id`),
  ADD CONSTRAINT `Тема 1` FOREIGN KEY (`theme1`) REFERENCES `subthemes` (`id`),
  ADD CONSTRAINT `Тема 2` FOREIGN KEY (`theme2`) REFERENCES `subthemes` (`id`),
  ADD CONSTRAINT `Тип` FOREIGN KEY (`type`) REFERENCES `types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
