CREATE TABLE `customers` (
  `customer_id` int(6) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `customers` (`customer_id`, `first_name`, `last_name`, `address`, `city`, `postcode`, `phone`, `email`, `password`) VALUES
(123456, 'Test', 'Acc', '123 This Road', 'City', 'A12 34B', '07000000000', 'test@gmail.com', '$2y$10$DXiozrwVzj2Zj4HtZi8GdOPb6fiCHWA5apXHjGg29zDFOx37MsEka');

-- --------------------------------------------------------

CREATE TABLE `orderline` (
  `orderline_id` int(7) NOT NULL,
  `order_id` int(5) NOT NULL,
  `product_id` int(4) NOT NULL,
  `price` float(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

CREATE TABLE `orders` (
  `order_id` int(5) NOT NULL,
  `customer_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cost` float(7,2) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Started'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

CREATE TABLE `products` (
  `product_id` int(4) NOT NULL,
  `group_id` varchar(3) NOT NULL,
  `sub_product_id` varchar(3) NOT NULL,
  `stock` int(4) NOT NULL,
  `price` float(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `products` (`product_id`, `group_id`, `sub_product_id`, `stock`, `price`) VALUES
(1, 'G01', 'P04', 35, 45.00),
(2, 'G01', 'P09', 39, 33.00),
(3, 'G02', 'P04', 22, 22.00),
(4, 'G02', 'P09', 55, 27.00),
(5, 'G03', 'P04', 0, 34.50),
(6, 'G03', 'P09', 16, 9.99);

-- --------------------------------------------------------

CREATE TABLE `product_group` (
  `group_id` varchar(3) NOT NULL,
  `group_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `product_group` (`group_id`, `group_name`) VALUES
('G01', 'Threading'),
('G02', 'Milling'),
('G03', 'Turning');

-- --------------------------------------------------------

CREATE TABLE `sub_product` (
  `sub_product_id` varchar(3) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `sub_product` (`sub_product_id`, `name`) VALUES
('P04', 'Gear'),
('P09', 'Insert');

-- --------------------------------------------------------



ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);


ALTER TABLE `orderline`
  ADD PRIMARY KEY (`orderline_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);


ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);


ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `products_ibfk_2` (`sub_product_id`),
  ADD KEY `group_id` (`group_id`);


ALTER TABLE `product_group`
  ADD PRIMARY KEY (`group_id`);


ALTER TABLE `sub_product`
  ADD PRIMARY KEY (`sub_product_id`);


ALTER TABLE `customers`
  MODIFY `customer_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123457;


ALTER TABLE `orderline`
  MODIFY `orderline_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;


ALTER TABLE `orders`
  MODIFY `order_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;


ALTER TABLE `products`
  MODIFY `product_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;


ALTER TABLE `orderline`
  ADD CONSTRAINT `orderline_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `orderline_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);


ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);


ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`sub_product_id`) REFERENCES `sub_product` (`sub_product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`group_id`) REFERENCES `product_group` (`group_id`);