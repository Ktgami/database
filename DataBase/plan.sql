-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 30 2020 г., 13:48
-- Версия сервера: 5.5.62
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `plan`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `idcategory` int(11) NOT NULL,
  `category` varchar(40) COLLATE cp1251_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251 COLLATE=cp1251_bin;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`idcategory`, `category`) VALUES
(1, 'Лекция'),
(2, 'Практика'),
(3, 'Лабораторная работа');

-- --------------------------------------------------------

--
-- Структура таблицы `chair`
--

CREATE TABLE `chair` (
  `idchair` int(11) NOT NULL,
  `chair` varchar(40) COLLATE cp1251_bin DEFAULT NULL,
  `idspec` int(11) NOT NULL,
  `idfaculty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251 COLLATE=cp1251_bin;

--
-- Дамп данных таблицы `chair`
--

INSERT INTO `chair` (`idchair`, `chair`, `idspec`, `idfaculty`) VALUES
(1, 'ИТ', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `faculty`
--

CREATE TABLE `faculty` (
  `idfaculty` int(11) NOT NULL,
  `faculty` varchar(40) COLLATE cp1251_bin DEFAULT NULL,
  `discr` varchar(40) COLLATE cp1251_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251 COLLATE=cp1251_bin;

--
-- Дамп данных таблицы `faculty`
--

INSERT INTO `faculty` (`idfaculty`, `faculty`, `discr`) VALUES
(1, 'ЭТФ', '-'),
(2, 'ФПММ', '-');

-- --------------------------------------------------------

--
-- Структура таблицы `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `action` varchar(20) COLLATE cp1250_bin NOT NULL,
  `datetime` datetime NOT NULL,
  `atname` varchar(20) COLLATE cp1250_bin NOT NULL,
  `OLDValue` varchar(20) COLLATE cp1250_bin NOT NULL,
  `Value` varchar(20) COLLATE cp1250_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_bin;

--
-- Дамп данных таблицы `logs`
--

INSERT INTO `logs` (`id`, `action`, `datetime`, `atname`, `OLDValue`, `Value`) VALUES
(11, 'updated', '2020-05-30 14:40:36', 'Subject name', 'C sharp', 'Pascal'),
(12, 'Deleted', '2020-05-30 14:41:38', 'Subject name', 'Basic', ''),
(14, 'Deleted', '2020-05-30 14:43:19', 'Subject name', 'Web', ''),
(15, 'inserted', '2020-05-30 14:43:26', 'Subject name', '', 'Web');

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `logs_action`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `logs_action` (
`action` varchar(20)
);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `logs_id`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `logs_id` (
`id` int(11)
,`OLDvalue` varchar(20)
);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `logs_value`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `logs_value` (
`action` varchar(20)
,`Value` varchar(20)
);

-- --------------------------------------------------------

--
-- Структура таблицы `plan`
--

CREATE TABLE `plan` (
  `idplan` int(11) NOT NULL,
  `plan` int(11) DEFAULT '0',
  `iduser` int(11) DEFAULT NULL,
  `idcategory` int(11) NOT NULL,
  `idsubject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251 COLLATE=cp1251_bin;

--
-- Дамп данных таблицы `plan`
--

INSERT INTO `plan` (`idplan`, `plan`, `iduser`, `idcategory`, `idsubject`) VALUES
(55, 0, NULL, 1, 1),
(56, 0, NULL, 2, 1),
(57, 100, 12, 3, 1),
(58, 0, NULL, 1, 2),
(59, 0, NULL, 2, 2),
(60, 55, 6, 3, 2),
(61, 0, NULL, 1, 3),
(62, 0, NULL, 2, 3),
(63, 0, NULL, 3, 3),
(64, 0, NULL, 1, 4),
(65, 0, NULL, 2, 4),
(66, 100, 6, 3, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `spec`
--

CREATE TABLE `spec` (
  `idspec` int(11) NOT NULL,
  `spec` varchar(40) COLLATE cp1251_bin DEFAULT NULL,
  `discr` varchar(40) COLLATE cp1251_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251 COLLATE=cp1251_bin;

--
-- Дамп данных таблицы `spec`
--

INSERT INTO `spec` (`idspec`, `spec`, `discr`) VALUES
(1, 'Программирование', '-'),
(2, 'Экономика', '-');

-- --------------------------------------------------------

--
-- Структура таблицы `subject`
--

CREATE TABLE `subject` (
  `idsubject` int(11) NOT NULL,
  `subject` varchar(40) COLLATE cp1251_bin DEFAULT NULL,
  `idform` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251 COLLATE=cp1251_bin;

--
-- Дамп данных таблицы `subject`
--

INSERT INTO `subject` (`idsubject`, `subject`, `idform`) VALUES
(1, 'Программирование C++', 1),
(2, 'Программирование PHP', 1),
(3, 'Программирование на Pascal', 1),
(4, 'Программирование на C#', 2),
(5, 'Программирование', 2),
(6, 'Программирование на Javascript', 2),
(11, 'Программирование +', 2),
(13, 'C++', 2),
(15, 'Pascal', 0),
(17, 'PASCAL', 0),
(20, 'Web', 0),
(21, 'Web', 2),
(22, 'Web', 2);

--
-- Триггеры `subject`
--
DELIMITER $$
CREATE TRIGGER `deletelog` BEFORE DELETE ON `subject` FOR EACH ROW INSERT INTO logs values(null,'Deleted',NOW(),'Subject name',OLD.subject,'')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertlog` AFTER INSERT ON `subject` FOR EACH ROW INSERT INTO logs values(null,'inserted',NOW(),'Subject name','',NEW.subject)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updatelog` AFTER UPDATE ON `subject` FOR EACH ROW INSERT INTO logs values(null,'updated',NOW(),'Subject name',OLD.subject,NEW.subject)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `subject_backup`
--

CREATE TABLE `subject_backup` (
  `idsubject` int(11) NOT NULL,
  `subject` varchar(40) COLLATE cp1251_bin DEFAULT NULL,
  `idform` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251 COLLATE=cp1251_bin;

--
-- Дамп данных таблицы `subject_backup`
--

INSERT INTO `subject_backup` (`idsubject`, `subject`, `idform`) VALUES
(1, 'Программирование C++', 1),
(2, 'Программирование PHP', 1),
(3, 'Программирование на Pascal', 1),
(4, 'Программирование на C#', 2),
(5, 'Программирование', 2),
(6, 'Программирование на Javascript', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `login` varchar(40) COLLATE cp1251_bin DEFAULT NULL,
  `parol` varchar(40) COLLATE cp1251_bin DEFAULT NULL,
  `permission` varchar(40) COLLATE cp1251_bin DEFAULT NULL,
  `user` varchar(40) COLLATE cp1251_bin DEFAULT NULL,
  `degree` varchar(40) COLLATE cp1251_bin DEFAULT NULL,
  `post` varchar(40) COLLATE cp1251_bin DEFAULT NULL,
  `experience` varchar(40) COLLATE cp1251_bin DEFAULT NULL,
  `datebirth` date DEFAULT NULL,
  `file` varchar(40) COLLATE cp1251_bin DEFAULT NULL,
  `address` varchar(40) COLLATE cp1251_bin DEFAULT NULL,
  `family` varchar(40) COLLATE cp1251_bin DEFAULT NULL,
  `phone` varchar(40) COLLATE cp1251_bin DEFAULT NULL,
  `mail` varchar(40) COLLATE cp1251_bin DEFAULT NULL,
  `idchair` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251 COLLATE=cp1251_bin;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`iduser`, `login`, `parol`, `permission`, `user`, `degree`, `post`, `experience`, `datebirth`, `file`, `address`, `family`, `phone`, `mail`, `idchair`) VALUES
(1, '', '', 'Администратор', 'Борисов КC', '-', 'Администратор', '', '1990-01-01', 'page2_img6.jpg', '-', '', '', 'qwer@we.ru', 1),
(6, 'qwerty', 'qwerty', 'Преподаватель', 'Сергеев ИВ', '-', 'Старший научный сотрудник', 'с 1990 года', '1980-12-27', 'page2_img4.jpg', '-', 'Холост', '5534585', 'ertert@ya.ru', 1),
(12, 'dfg', 'cvb', 'Преподаватель', 'Максимов ВА', '-', 'Старший научный сотрудник', 'c 2000', '1988-01-21', 'page2_img2.jpg', '-', 'Холост', '23123123', 'rtye@.ya.ru', 1),
(13, 'rty', 'dfg', 'Преподаватель', 'Мамина АВ', 'Кандидат наук', 'Старший научный сотрудник', 'с 1990 года', '1982-01-16', 'page2_img1.jpg', 'Совхозная 2-21', 'Замужем', '34728349123', 'wer@ya.ru', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `usersubject`
--

CREATE TABLE `usersubject` (
  `idusersubject` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idsubject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251 COLLATE=cp1251_bin;

--
-- Дамп данных таблицы `usersubject`
--

INSERT INTO `usersubject` (`idusersubject`, `iduser`, `idsubject`) VALUES
(4, 6, 1),
(6, 6, 2),
(7, 12, 1),
(8, 6, 3),
(9, 6, 4),
(10, 12, 3),
(11, 13, 3),
(12, 13, 3),
(13, 6, 2),
(14, 6, 3);

-- --------------------------------------------------------

--
-- Структура для представления `logs_action`
--
DROP TABLE IF EXISTS `logs_action`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `logs_action`  AS  select `logs`.`action` AS `action` from `logs` ;

-- --------------------------------------------------------

--
-- Структура для представления `logs_id`
--
DROP TABLE IF EXISTS `logs_id`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `logs_id`  AS  select `logs`.`id` AS `id`,`logs`.`OLDValue` AS `OLDvalue` from `logs` ;

-- --------------------------------------------------------

--
-- Структура для представления `logs_value`
--
DROP TABLE IF EXISTS `logs_value`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `logs_value`  AS  select `logs`.`action` AS `action`,`logs`.`Value` AS `Value` from `logs` ;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idcategory`);

--
-- Индексы таблицы `chair`
--
ALTER TABLE `chair`
  ADD PRIMARY KEY (`idchair`),
  ADD KEY `R_14` (`idspec`),
  ADD KEY `R_15` (`idfaculty`);

--
-- Индексы таблицы `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`idfaculty`);

--
-- Индексы таблицы `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`idplan`),
  ADD KEY `R_20` (`iduser`),
  ADD KEY `R_21` (`idcategory`),
  ADD KEY `R_22` (`idsubject`);

--
-- Индексы таблицы `spec`
--
ALTER TABLE `spec`
  ADD PRIMARY KEY (`idspec`);

--
-- Индексы таблицы `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`idsubject`),
  ADD KEY `R_10` (`idform`);

--
-- Индексы таблицы `subject_backup`
--
ALTER TABLE `subject_backup`
  ADD PRIMARY KEY (`idsubject`),
  ADD KEY `R_10` (`idform`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`),
  ADD KEY `R_12` (`idchair`);

--
-- Индексы таблицы `usersubject`
--
ALTER TABLE `usersubject`
  ADD PRIMARY KEY (`idusersubject`),
  ADD KEY `R_26` (`iduser`),
  ADD KEY `R_25` (`idsubject`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `idcategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `chair`
--
ALTER TABLE `chair`
  MODIFY `idchair` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `faculty`
--
ALTER TABLE `faculty`
  MODIFY `idfaculty` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `plan`
--
ALTER TABLE `plan`
  MODIFY `idplan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT для таблицы `spec`
--
ALTER TABLE `spec`
  MODIFY `idspec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `subject`
--
ALTER TABLE `subject`
  MODIFY `idsubject` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `subject_backup`
--
ALTER TABLE `subject_backup`
  MODIFY `idsubject` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `usersubject`
--
ALTER TABLE `usersubject`
  MODIFY `idusersubject` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `chair`
--
ALTER TABLE `chair`
  ADD CONSTRAINT `R_14` FOREIGN KEY (`idspec`) REFERENCES `spec` (`idspec`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `R_15` FOREIGN KEY (`idfaculty`) REFERENCES `faculty` (`idfaculty`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `plan`
--
ALTER TABLE `plan`
  ADD CONSTRAINT `R_20` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `R_21` FOREIGN KEY (`idcategory`) REFERENCES `category` (`idcategory`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `R_22` FOREIGN KEY (`idsubject`) REFERENCES `subject` (`idsubject`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `R_12` FOREIGN KEY (`idchair`) REFERENCES `chair` (`idchair`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `usersubject`
--
ALTER TABLE `usersubject`
  ADD CONSTRAINT `R_25` FOREIGN KEY (`idsubject`) REFERENCES `subject` (`idsubject`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `R_26` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
