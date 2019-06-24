-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: db
-- Время создания: Июн 24 2019 г., 05:41
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
(1, NULL, 'Иван', 'ivan@localhost.local', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, '2019-06-24 05:34:59', '2019-06-24 05:34:59'),
(2, NULL, 'Иван', 'ivan@localhost.local', 'Id pér látìnè aliquando ìntèllégat, pri putànt tritani errorìbus éa, sed né pròbo èrrór obliquè. Èà suas lègimus nam, te prò error bonorum deterrùìssèt, ìn duis aliquíp salùtàtús quì. Nec éù légère aliqùid apeìrian, ìn eripuit fácilisi eum. In mei autem ìùstó tritàní.\r\n\r\nMea íllum dìcat te, sít ímpedìt adolescèns.', 0, '2019-06-24 05:34:59', '2019-06-24 05:34:59'),
(3, NULL, 'Ольга', 'olga@localhost.local', 'Cum in civibus oportere suavitate, simul pónderum disputando nec ei, cu eum primá ádipisci. Pri éu molestiae hendrerit. Adipiscing elaborarét ét his. Eu cetero repudiare complectitúr ñam. Pér ea ceteró deleñit verterem, iriure malorum commuñe est te, cum ex páulo constituam. Ut quas ignotá has, ferri mazim vulpútate ñec cú.', 0, '2019-06-24 05:37:50', '2019-06-24 05:37:50'),
(4, NULL, 'Ольга', 'olga@localhost.local', 'Pri in meis persecuti constituam. Ius ne habemus euripidis vóluptaria, has dicam theophrastus et. Nec céteró eleifend pösidoníúm út, vix ad illum deniqüe advérsarium, quo no habemüs áppetére cőnclüsiónémque. Nőstrud sűavítate nec cű.\r\n\r\nNam éx reqűe mélíore, éa usu áudiam regione cotídiéqué. Pérpetua volutpat sed an. Ius diceret patrióqűe án.', 0, '2019-06-24 05:37:50', '2019-06-24 05:37:50'),
(5, NULL, 'Дарья', 'daria@localhost.local', 'Nam ăppêtêre vơlutpât principes ne. Quô lăborămus libêravisse at. Ea usu cơngue accumsăn, nihil ponderưm expetenda sit an, ne eum ăntiopăm maluissêt. Cum đuis facilis êlêifend eư, aliquip sălutandi međiocritâtêm eu vis, eum tincidunt cơnclusiônêmqưe an. Assưm ludưs prô et, prơ eâ lorem viris.\r\n\r\nQuo eâ veri concêptam, no pri.', 0, '2019-06-24 05:40:30', '2019-06-24 05:40:30'),
(6, NULL, 'Дарья', 'daria@localhost.local', 'Éos menandri sapíěntem ássuevěriť ců, sapeřet assuěveřit eu vim. Magňa ůťinam officiis et pro. Ea ómňis brute viderer pro. Ei íus řeque eveřtiťur. Vix malůisšet nečěssitatíbůs ex. Álterá nominati honestátis usú ěi, éu ďicat aěqué zril per.\r\n\r\nVíš eť labore dolóřum perfécto. Ělit sale ňónůmy ňo vél, eá sit gráeco.', 0, '2019-06-24 05:40:30', '2019-06-24 05:40:30');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
