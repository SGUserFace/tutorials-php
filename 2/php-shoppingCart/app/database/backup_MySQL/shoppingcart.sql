-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19-Dez-2016 às 20:45
-- Versão do servidor: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoppingcart`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `accounts`
--

INSERT INTO `accounts` (`id`, `user_id`) VALUES
(12, 17),
(14, 19);

-- --------------------------------------------------------

--
-- Estrutura da tabela `orders`
--

CREATE TABLE `orders` (
  `id` int(11) UNSIGNED NOT NULL,
  `account_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `order_lines`
--

CREATE TABLE `order_lines` (
  `id` int(11) NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `name`, `price`) VALUES
(1, 'book', 12.5),
(2, 'magazine', 5.85);

-- --------------------------------------------------------

--
-- Estrutura da tabela `shopping_carts`
--

CREATE TABLE `shopping_carts` (
  `id` int(11) UNSIGNED NOT NULL,
  `account_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `shopping_carts`
--

INSERT INTO `shopping_carts` (`id`, `account_id`) VALUES
(3, 12),
(5, 14);

-- --------------------------------------------------------

--
-- Estrutura da tabela `shopping_carts_lines`
--

CREATE TABLE `shopping_carts_lines` (
  `id` int(10) UNSIGNED NOT NULL,
  `shopping_cart_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `shopping_carts_lines`
--

INSERT INTO `shopping_carts_lines` (`id`, `shopping_cart_id`, `product_id`, `quantity`) VALUES
(5, 5, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(17, 'henriquebroculo@gmail.com', '$2y$10$/Do3iq26vo9K1vTAUnYOHOei9hHuvqkz6ineV7umDABZSuJu1rUYG'),
(19, 'henrique.perosinho@gmail.com', '$2y$10$MPFfmH/.RCI7kfEb3yDefuo04fkM231mlaLXM/DiX/lliAGMCqTAC');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v1`
--
CREATE TABLE `v1` (
`id` int(11) unsigned
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v2`
--
CREATE TABLE `v2` (
`product_id` int(10) unsigned
,`quantity` int(10) unsigned
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v3`
--
CREATE TABLE `v3` (
`product_id` int(10) unsigned
,`quantity` int(10) unsigned
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v4`
--
CREATE TABLE `v4` (
`product_id` int(10) unsigned
,`quantity` int(10) unsigned
,`id` int(11) unsigned
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v5`
--
CREATE TABLE `v5` (
`product_id` int(10) unsigned
,`quantity` int(10) unsigned
,`price` float
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v6`
--
CREATE TABLE `v6` (
`product_id` int(10) unsigned
,`quantity` int(10) unsigned
,`price` float
,`total` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v7`
--
CREATE TABLE `v7` (
`product_id` int(10) unsigned
,`quantity` int(10) unsigned
,`price` float
,`total` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v8`
--
CREATE TABLE `v8` (
`product_id` int(10) unsigned
,`quantity` int(10) unsigned
,`price` float
,`total` double
);

-- --------------------------------------------------------

--
-- Structure for view `v1`
--
DROP TABLE IF EXISTS `v1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v1`  AS  select `users`.`id` AS `id` from `users` ;

-- --------------------------------------------------------

--
-- Structure for view `v2`
--
DROP TABLE IF EXISTS `v2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v2`  AS  select `shopping_carts_lines`.`product_id` AS `product_id`,`shopping_carts_lines`.`quantity` AS `quantity` from `shopping_carts_lines` ;

-- --------------------------------------------------------

--
-- Structure for view `v3`
--
DROP TABLE IF EXISTS `v3`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v3`  AS  select `scl`.`product_id` AS `product_id`,`scl`.`quantity` AS `quantity` from `shopping_carts_lines` `scl` ;

-- --------------------------------------------------------

--
-- Structure for view `v4`
--
DROP TABLE IF EXISTS `v4`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v4`  AS  select `scl`.`product_id` AS `product_id`,`scl`.`quantity` AS `quantity`,`p`.`id` AS `id` from (`shopping_carts_lines` `scl` join `products` `p`) ;

-- --------------------------------------------------------

--
-- Structure for view `v5`
--
DROP TABLE IF EXISTS `v5`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v5`  AS  select `scl`.`product_id` AS `product_id`,`scl`.`quantity` AS `quantity`,`p`.`price` AS `price` from (`shopping_carts_lines` `scl` join `products` `p`) where (`scl`.`product_id` = `p`.`id`) ;

-- --------------------------------------------------------

--
-- Structure for view `v6`
--
DROP TABLE IF EXISTS `v6`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v6`  AS  select `scl`.`product_id` AS `product_id`,`scl`.`quantity` AS `quantity`,`p`.`price` AS `price`,(`scl`.`quantity` * `p`.`price`) AS `total` from (`shopping_carts_lines` `scl` join `products` `p`) where (`scl`.`product_id` = `p`.`id`) ;

-- --------------------------------------------------------

--
-- Structure for view `v7`
--
DROP TABLE IF EXISTS `v7`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v7`  AS  select `scl`.`product_id` AS `product_id`,`scl`.`quantity` AS `quantity`,`p`.`price` AS `price`,(`scl`.`quantity` * `p`.`price`) AS `total` from (`shopping_carts_lines` `scl` join `products` `p`) where (`scl`.`product_id` = `p`.`id`) ;

-- --------------------------------------------------------

--
-- Structure for view `v8`
--
DROP TABLE IF EXISTS `v8`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v8`  AS  select `scl`.`product_id` AS `product_id`,`scl`.`quantity` AS `quantity`,`p`.`price` AS `price`,(`scl`.`quantity` * `p`.`price`) AS `total` from (`shopping_carts_lines` `scl` join `products` `p`) where (`scl`.`product_id` = `p`.`id`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accounts_ibfk_1` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_ibfk_1` (`account_id`);

--
-- Indexes for table `order_lines`
--
ALTER TABLE `order_lines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_lines_ibfk1` (`order_id`),
  ADD KEY `order_lines_ibfk2` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopping_carts`
--
ALTER TABLE `shopping_carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shopping_carts_ibfk_1` (`account_id`);

--
-- Indexes for table `shopping_carts_lines`
--
ALTER TABLE `shopping_carts_lines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shopping_carts_lines_ibfk_1` (`shopping_cart_id`),
  ADD KEY `shopping_carts_lines_ibfk_2` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_lines`
--
ALTER TABLE `order_lines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `shopping_carts`
--
ALTER TABLE `shopping_carts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `shopping_carts_lines`
--
ALTER TABLE `shopping_carts_lines`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `order_lines`
--
ALTER TABLE `order_lines`
  ADD CONSTRAINT `order_lines_ibfk1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_lines_ibfk2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `shopping_carts`
--
ALTER TABLE `shopping_carts`
  ADD CONSTRAINT `shopping_carts_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `shopping_carts_lines`
--
ALTER TABLE `shopping_carts_lines`
  ADD CONSTRAINT `shopping_carts_lines_ibfk_1` FOREIGN KEY (`shopping_cart_id`) REFERENCES `shopping_carts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `shopping_carts_lines_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
