-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: db
-- Время создания: Июн 27 2019 г., 09:57
-- Версия сервера: 10.3.15-MariaDB-1:10.3.15+maria~bionic
-- Версия PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `beejee`
--

-- --------------------------------------------------------

--
-- Структура таблицы `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `author` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `text` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `task`
--

INSERT INTO `task` (`id`, `user_id`, `author`, `email`, `text`, `status`, `created`, `modified`) VALUES
(1, NULL, 'Иван', 'ivan@localhost.local', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ', 0, '2019-06-24 05:34:59', '2019-06-26 05:04:47'),
(2, NULL, 'Иван', 'ivan@localhost.local', 'Id pér látìnè aliquando ìntèllégat, pri putànt tritani errorìbus éa, sed né pròbo èrrór obliquè. Èà suas lègimus nam, te prò error bonorum deterrùìssèt, ìn duis aliquíp salùtàtús quì. Nec éù légère aliqùid apeìrian, ìn eripuit fácilisi eum. In mei autem ìùstó tritàní.', 1, '2019-06-24 05:34:59', '2019-06-26 05:01:54'),
(3, NULL, 'Ольга', 'olga@localhost.local', 'Cum in civibus oportere suavitate, simul pónderum disputando nec ei, cu eum primá ádipisci. Pri éu molestiae hendrerit. Adipiscing elaborarét ét his. Eu cetero repudiare complectitúr ñam. Pér ea ceteró deleñit verterem, iriure malorum commuñe est te, cum ex páulo constituam. Ut quas ignotá has, ferri mazim vulpútate ñec cú.', 0, '2019-06-24 05:37:50', '2019-06-24 05:37:50'),
(4, NULL, 'Ольга', 'olga@localhost.local', 'Pri in meis persecuti constituam. Ius ne habemus euripidis vóluptaria, has dicam theophrastus et. Nec céteró eleifend pösidoníúm út, vix ad illum deniqüe advérsarium, quo no habemüs áppetére cőnclüsiónémque. Nőstrud sűavítate nec cű.\r\n\r\nNam éx reqűe mélíore, éa usu áudiam regione cotídiéqué. Pérpetua volutpat sed an. Ius diceret patrióqűe án.', 0, '2019-06-24 05:37:50', '2019-06-24 05:37:50'),
(5, NULL, 'Дарья', 'daria@localhost.local', 'Nam ăppêtêre vơlutpât principes ne. Quô lăborămus libêravisse at. Ea usu cơngue accumsăn, nihil ponderưm expetenda sit an, ne eum ăntiopăm maluissêt. Cum đuis facilis êlêifend eư, aliquip sălutandi međiocritâtêm eu vis, eum tincidunt cơnclusiônêmqưe an. Assưm ludưs prô et, prơ eâ lorem viris.\r\n\r\nQuo eâ veri concêptam, no pri.', 1, '2019-06-24 05:40:30', '2019-06-25 13:34:12'),
(6, NULL, 'Дарья', 'daria@localhost.local', 'Éos menandri sapíěntem ássuevěriť ců, sapeřet assuěveřit eu vim. Magňa ůťinam officiis et pro. Ea ómňis brute viderer pro. Ei íus řeque eveřtiťur. Vix malůisšet nečěssitatíbůs ex. Álterá nominati honestátis usú ěi, éu ďicat aěqué zril per.\r\n\r\nVíš eť labore dolóřum perfécto. Ělit sale ňónůmy ňo vél, eá sit gráeco.', 0, '2019-06-24 05:40:30', '2019-06-24 05:40:30'),
(7, NULL, 'Руслан', 'ruslan@local.test', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.', 1, '2019-06-25 12:26:55', '2019-06-26 05:02:10'),
(8, NULL, 'Руслан', 'ruslan@local.test', 'Завтра нужно будет сделать редактирование задач', 1, '2019-06-25 13:36:07', '2019-06-26 05:05:34'),
(9, NULL, 'Руслан', 'ruslan@local.test', 'Сделать сортировку задач', 1, '2019-06-26 05:06:02', '2019-06-26 10:53:34'),
(10, NULL, 'Руслан', 'ruslan@local.test', 'Сделать пагинацию', 1, '2019-06-26 10:53:22', '2019-06-27 05:09:54'),
(11, NULL, 'Руслан', 'ruslan@local.test', 'Закончить авторизацию и аутентификацию уже наконец', 1, '2019-06-27 06:06:13', '2019-06-27 08:30:19'),
(12, NULL, 'Admin', 'admin@local.test', 'Тестовая задача для тестирования финальной версии. Отредактировано', 1, '2019-06-27 08:40:48', '2019-06-27 08:41:35');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(128) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 3,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `name`, `email`, `role`, `created`, `modified`) VALUES
(1, 'admin', 'ec/I1f7CEiyu2', 'admin', 'admin@localhost.local', 1, '2019-06-27 05:56:02', '2019-06-27 05:56:02');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
