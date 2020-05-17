-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 17 2020 г., 19:33
-- Версия сервера: 8.0.19
-- Версия PHP: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int NOT NULL,
  `user_name` varchar(150) NOT NULL,
  `text` text NOT NULL COMMENT 'комментарий пользователя',
  `id_product` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `user_name`, `text`, `id_product`) VALUES
(1, 'Катя', 'Неплохая недорогая камера. Объектив стандартный и на все дела пойдет. Можно и по портретам сработать и по пейзажам. Снимки делает четкие, с приличной резкостью. Фокусирует по 9 точкам поэтому делает это очень быстро. Корпус ухватистый. В руках держать удобно. Сбрасывает фото по вай-фай плюс по НФЦ можно. Матрица крупная 22.3 x 14.9 миллиметров. Стабилизатор очень эффективный. Снимаю с рук и никакой дрожи в кадре.', 1),
(2, 'Андрей', 'Пользуюсь уже неделю, заряд держит отлично, заряжается очень быстро. Звук отличный, даже в наушниках. А дисплей просто сказка, очень сочный, без бликов, камера которая «врезана» в дисплей смотрится рамного лучше, чем каплевидный вырез. В игры не играю, тем кому нужен идеальным смартфон, с отличным соотношением и балансом, однозначно стоит рассмотреть данную модель к покупке.', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int NOT NULL COMMENT 'id users',
  `phone` int NOT NULL COMMENT 'номер телефона покупателя',
  `address` varchar(250) NOT NULL COMMENT 'адрес доставки',
  `status` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'не оплачен' COMMENT 'статус заказа'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `phone`, `address`, `status`) VALUES
(1, 1, 123465789, 'c.Аскарово', 'не оплачен');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(64) NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT 'nophoto.jpg',
  `price` varchar(100) NOT NULL,
  `description` text NOT NULL COMMENT 'описание товара'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `description`) VALUES
(1, 'Фотоаппарат зеркальный Canon EOS 2000D EF-S 18-55 III Kit', '10021029b.jpg', '24990', '9 точек фокусировки – вы можете быть уверены, что все важные детали на снимке получатся чёткими. При этом лица камера распознает автоматически.'),
(2, 'Смартфон Samsung Galaxy A71 Black(SM-A715F/DSM)', '30047907b.jpg', '29990', 'Вам не понадобится большой фотоаппарат. Эта модель снабжена четырьмя камерами, которые позволяют делать потрясающие селфи, насыщенные пейзажи, фиксировать красивые ночные сцены и яркие моменты спортивных состязаний. Дополнительные фильтры дадут возможность сразу обработать кадры, чтобы поделиться ими с друзьями.'),
(3, 'Ноутбук ASUS F540UB-DM1514T', '30046825b.jpg', '34990', 'Вы можете купить Ноутбук ASUS F540UB-DM1514T в магазинах М.Видео по доступной цене. Ноутбук ASUS F540UB-DM1514T: описание, фото, характеристики, отзывы покупателей, инструкция и аксессуары.');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `user_name` varchar(150) NOT NULL,
  `user_login` varchar(64) NOT NULL,
  `user_password` varchar(64) NOT NULL,
  `role` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_login`, `user_password`, `role`) VALUES
(1, 'Камиль', 'admin', '$2y$10$ihYMblUYwt1iEPRdMtnrZeQnBso7DAOZw91FDHzuiaoF4W0TQYWZi', 'admin'),
(2, 'Гость', 'Guest', '$2y$10$PwljfiBx9RvCIj87E0kpwukMAPx2F6yzVk8c42Bl2RjLgiqtPGTnu', '0'),
(3, 'ТЕСТ', 'test', '123', '0'),
(4, 'Майк', 'm', '$2y$10$CNLjTvNFyHujaQJoOHM2dOM6c1L8u6ddo7y.HB2b23oaXH5lbci4S', '0'),
(5, 'Майк', 'mike', '$2y$10$ByUP8I9DMpHHgMGEgnT0oeMrQVLpdbPZmD61kgqpWMc2E6Q0AnbNu', '0'),
(6, 'ТЕСТ', 'cqvqv', '$2y$10$usSbszSP.w4fGWpaAzq2XOpkF9RF/2keBQYGJy6vq42B0c2BFJbSG', '0');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_login` (`user_login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
