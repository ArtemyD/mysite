-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Сен 29 2017 г., 06:25
-- Версия сервера: 5.7.15
-- Версия PHP: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `facemash`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `likes` int(11) DEFAULT '0',
  `credits` int(11) DEFAULT '0',
  `Photo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`Id`, `firstname`, `lastname`, `likes`, `credits`, `Photo`) VALUES
(1, 'Artem', 'Dyachenko', 103, 1000, 'https://pp.userapi.com/c638517/v638517732/64883/b52auk9oW2s.jpg'),
(2, 'Pavel', 'Tol', 3, 10, 'https://pp.userapi.com/c639216/v639216668/3e626/ihiUPiUmJOE.jpg'),
(3, 'Nataly', 'Aiz', 8, 10, 'https://pp.userapi.com/c836424/v836424042/53000/7Pge3hDRUGw.jpghttps://pp.userapi.com/c837632/v837632042/250b/IsVswtW95NY.jpg'),
(4, 'Ivan', 'Smol', 3, 0, 'https://pp.userapi.com/c841024/v841024605/13d94/6NPrCbkATp8.jpg'),
(5, 'Den', 'Chud', 3, 0, 'https://pp.userapi.com/c604330/v604330484/1538d/pJrmu_NYYSg.jpg'),
(6, 'Uriy', 'Maks', 2, 0, 'https://pp.userapi.com/c629129/v629129114/31f5a/f8V98QH9g4Y.jpg'),
(7, 'George', 'Malg', 9, 0, 'https://pp.userapi.com/c625123/v625123341/4d409/jpmC-g_8Axo.jpg'),
(8, 'Petr', 'Ivanov', 8, 0, 'https://pp.userapi.com/c627426/v627426202/33186/d7fkwwcPeL8.jpg'),
(9, 'Alex', 'Navalny', 5, 0, 'https://im0-tub-ru.yandex.net/i?id=30964a0b4cec5b46ab2d555207dfc8ff&n=13'),
(10, 'Irina', 'Shish', 4, 0, 'https://pp.userapi.com/c629306/v629306852/114b2/Jya_EREtpAs.jpg'),
(11, 'Dmitr', 'Danilov', 3, 0, 'https://pp.userapi.com/c636324/v636324244/46cd0/57gTjiweWZY.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
