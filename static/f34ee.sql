-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 02, 2019 at 12:51 AM
-- Server version: 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `f34ee`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `isbn` char(13) NOT NULL,
  `author` char(50) DEFAULT NULL,
  `title` char(100) DEFAULT NULL,
  `price` float(4,2) DEFAULT NULL,
  PRIMARY KEY (`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`isbn`, `author`, `title`, `price`) VALUES
('0-672-31509-2', 'Pruitt, et al.', 'Teach Yourself GIMP in 24 Hours', 24.99),
('0-672-31697-8', 'Michael Morgan', 'Java 2 for Professional Developers', 34.99),
('0-672-31745-1', 'Thomas Down', 'Installing Debian GNU/Linux', 24.99),
('0-672-31769-9', 'Thomas Schenk', 'Caldera OpenLinux System Administration Unleashed', 49.99);

-- --------------------------------------------------------

--
-- Table structure for table `book_reviews`
--

CREATE TABLE IF NOT EXISTS `book_reviews` (
  `isbn` char(13) NOT NULL,
  `review` text,
  PRIMARY KEY (`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_reviews`
--

INSERT INTO `book_reviews` (`isbn`, `review`) VALUES
('0-672-31697-8', 'Morgan''s book is clearly written and goes well beyond most of the basic Java books out there.');

-- --------------------------------------------------------

--
-- Table structure for table `classf34`
--

CREATE TABLE IF NOT EXISTS `classf34` (
  `ID` int(40) NOT NULL AUTO_INCREMENT,
  `Username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `classf34`
--

INSERT INTO `classf34` (`ID`, `Username`, `password`) VALUES
(2, 'Sam', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `coffee_order`
--

CREATE TABLE IF NOT EXISTS `coffee_order` (
  `ID` int(40) NOT NULL,
  `coffee_id` int(40) NOT NULL,
  `qty` int(40) NOT NULL,
  PRIMARY KEY (`ID`,`coffee_id`),
  KEY `coffee_id` (`coffee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coffee_order`
--

INSERT INTO `coffee_order` (`ID`, `coffee_id`, `qty`) VALUES
(1, 1, 1),
(1, 2, 1),
(1, 3, 2),
(2, 4, 5),
(3, 5, 2),
(4, 1, 1),
(4, 4, 2),
(5, 2, 3),
(5, 3, 1),
(5, 4, 10),
(6, 2, 4),
(6, 3, 2),
(6, 4, 1),
(7, 1, 1),
(7, 5, 3),
(8, 2, 4),
(8, 3, 10),
(9, 3, 40);

-- --------------------------------------------------------

--
-- Table structure for table `coffee_price`
--

CREATE TABLE IF NOT EXISTS `coffee_price` (
  `ID` int(40) NOT NULL AUTO_INCREMENT,
  `coffee` varchar(40) NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `coffee_price`
--

INSERT INTO `coffee_price` (`ID`, `coffee`, `price`) VALUES
(1, 'java', 1.21),
(2, 'lait_single', 2.35),
(3, 'lait_double', 3.67),
(4, 'cap_single', 4.82),
(5, 'cap_double', 5.73);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customerid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL,
  `address` char(100) NOT NULL,
  `city` char(30) NOT NULL,
  PRIMARY KEY (`customerid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerid`, `name`, `address`, `city`) VALUES
(3, 'Julie Smith', '25 Oak Street', 'Airport West'),
(4, 'Alan Wong', '1/47 Haines Avenue', 'Box Hill'),
(5, 'Michelle Arthur', '357 North Road', 'Yarraville');

-- --------------------------------------------------------

--
-- Table structure for table `MyGuests`
--

CREATE TABLE IF NOT EXISTS `MyGuests` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `MyGuests`
--

INSERT INTO `MyGuests` (`id`, `firstname`, `lastname`, `email`, `reg_date`) VALUES
(1, 'John', 'Doe', 'john@example.com', '2019-10-09 02:23:29'),
(2, 'John', 'Sam', 'john@example.com', '2019-10-09 02:40:09'),
(4, 'Julie', 'Dooley', 'julie@example.com', '2019-10-09 02:27:36'),
(5, 'John', 'Doe', 'john@example.com', '2019-10-09 02:28:45');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `orderid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customerid` int(10) unsigned NOT NULL,
  `amount` float(6,2) DEFAULT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`orderid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `customerid`, `amount`, `date`) VALUES
(1, 3, 69.98, '2007-04-02'),
(2, 1, 49.99, '2007-04-15'),
(3, 2, 74.98, '2007-04-19'),
(4, 3, 24.99, '2007-05-01');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE IF NOT EXISTS `order_items` (
  `orderid` int(10) unsigned NOT NULL,
  `isbn` char(13) NOT NULL,
  `quantity` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`orderid`,`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`orderid`, `isbn`, `quantity`) VALUES
(1, '0-672-31697-8', 2),
(2, '0-672-31769-9', 1),
(3, '0-672-31509-2', 1),
(3, '0-672-31769-9', 1),
(4, '0-672-31745-1', 3);

-- --------------------------------------------------------

--
-- Table structure for table `project_food`
--

CREATE TABLE IF NOT EXISTS `project_food` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `price` float NOT NULL,
  `description` varchar(300) NOT NULL,
  `photo` varchar(60) NOT NULL,
  `category` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `project_food`
--

INSERT INTO `project_food` (`ID`, `name`, `price`, `description`, `photo`, `category`) VALUES
(21, 'Hawaiian', 10.8, 'An all-time favourite. Tender chicken ham combined with sweet and succulent pineapple chunks for a taste of the good ol'' days.', '../static/img/food/pizza/hawaiian.jpg', 'pizza'),
(22, 'Chicken Supreme', 9.5, 'Sink your teeth into a generous spread of savoury chicken ham, spicy chicken chunks, roasted chicken, topped with onions, capsicums and mushrooms.', '../static/img/food/pizza/chicken_supreme.jpg', 'pizza'),
(23, 'Curry Chicken', 11.5, 'Italian classic meets local favourite. Spicy chicken chunks, potatoes, onions and diced tomatoes come together for an authentic flavour of rich spices.', '../static/img/food/pizza/curry_chicken.jpg', 'pizza'),
(24, 'Meat Galore', 12.8, 'The perfect meat-lover''s choice. Chicken ham, pepperoni, minced beef and cabanossi sausages, with tomato mozzarella melt.', '../static/img/food/pizza/meat_galore.jpg', 'pizza'),
(25, 'Ocean Delight', 9.2, 'Taste the freshness in this combination of succulent squid and tasty tuna, topped with a mix of mushrooms, onions and capsicums.', '../static/img/food/pizza/ocean_delight.jpg', 'pizza'),
(26, 'Pepperoni', 10.8, 'Combining the aromatic flavour of beef pepperoni and 100% mozzarella cheese. Classic treat that’s always a great choice.', '../static/img/food/pizza/pepperoni.jpg', 'pizza'),
(27, 'Seafood Deluxe', 11.2, 'Taste the freshness of the ocean in this combination of juicy prawns marinated in spices, succulent squid and tasty tuna.', '../static/img/food/pizza/seafood_deluxe.jpg', 'pizza'),
(28, 'Super Supreme', 15, 'Always a house favourite, combining juicy ground beef, smoky cabanossi sausages, beef pepperoni, chicken ham, and a luscious mix of capsicums, onions, olives, mushrooms and pineapple chunks.', '../static/img/food/pizza/super_supreme.jpg', 'pizza'),
(29, 'The Four Cheese', 13.2, 'Send your tastebuds into a cheesy frenzy with a divine combination of 4 cheeses - mozzarella, parmesan, cheddar and cream cheese.', '../static/img/food/pizza/the_four_cheese.jpg', 'pizza'),
(30, 'Veggie Lover', 8.8, 'Delightful combination of garden fresh mushrooms, onions, olives and capsicums, sweetened with pineapple chunks and diced tomatoes.', '../static/img/food/pizza/veggie_lovers.jpg', 'pizza'),
(31, 'Very Beefy', 10.2, 'A marriage of cabanossi sausages and ground beef with a hint of onion.', '../static/img/food/pizza/very_beefy.jpg', 'pizza'),
(32, 'Chicken Pop', 4.9, 'Savoury and juicy chicken chunks, deep fried to perfection.', '../static/img/food/sides/chicken_pop.jpg', 'sides'),
(33, 'Chicken Tenders', 5.2, 'Breaded chicken fillets fried to a golden brown perfection.', '../static/img/food/sides/chicken_tenders.jpg', 'sides'),
(34, 'Buffalo Wings', 5.9, 'Tangy and juicy buffalo wings that complement every meal.', '../static/img/food/sides/buffalo_wings.jpg', 'sides'),
(35, 'Spicy Drumlets', 12.2, 'Juicy, tender drumlets marinated in New Orleans spices.', '../static/img/food/sides/spicy_drumlets.jpg', 'sides'),
(36, 'Honey Roasted Wings', 8.9, 'Juicy mid-joint wings coated with sweet honey and roasted to golden brown perfection.', '../static/img/food/sides/honey_roasted_wings.jpg', 'sides'),
(37, 'Wingstreet Snack Box', 16.2, '6pcs each of Spicy Drumlets and Honey Roasted Wings.', '../static/img/food/sides/wingstreet_snack_box.jpg', 'sides'),
(38, 'Garlic Bread', 4.2, 'Oven-baked sesame seed bun with hot buttery garlic spread.', '../static/img/food/sides/garlic_bread.jpg', 'sides'),
(39, 'Cheesy Fries', 5.9, 'Fries that are crispy on the outside and soft on the inside. Served with cheese dip.', '../static/img/food/sides/cheese_fries.jpg', 'sides'),
(40, 'Coca-cola', 1.5, 'A carbonated soft drink with original taste.', '../static/img/food/beverage/coca_cola.jpg', 'beverage'),
(41, 'Sprite', 1.5, 'A colorless, caffeine-free, lemon and lime-flavored soft drink.', '../static/img/food/beverage/sprite.jpg', 'beverage'),
(42, 'Pure Water', 1, 'A bottle of pure water.', '../static/img/food/beverage/pure_water.jpg', 'beverage'),
(43, 'Iced Lemon Tea', 2, 'Green tea liquor to which lemon juice has been added to impart a unique flavour.', '../static/img/food/beverage/iced_lemon_tea.jpg', 'beverage'),
(44, 'Hot Milo', 2, 'A chocolate and malt powder typically mixed with hot water and milk.', '../static/img/food/beverage/hot_milo.jpg', 'beverage'),
(45, 'Iced Milo', 2, 'Milo with ice.', '../static/img/food/beverage/iced_milo.jpg', 'beverage'),
(46, 'Caramel Frappe', 3, 'Made with rich caramel flavor and a hint of coffee, blended with ice, and topped with whipped topping and caramel drizzle.', '../static/img/food/beverage/caramel_frappe.jpg', 'beverage'),
(47, 'Iced Latte', 3, 'Espresso and chilled milk poured over ice.', '../static/img/food/beverage/iced_latte.jpg', 'beverage');

-- --------------------------------------------------------

--
-- Table structure for table `project_order`
--

CREATE TABLE IF NOT EXISTS `project_order` (
  `user_id` int(10) NOT NULL,
  `food_id` int(10) NOT NULL,
  `order_time` datetime NOT NULL,
  `qty` int(10) NOT NULL,
  `status` varchar(30) NOT NULL,
  `option_1` tinyint(1) NOT NULL,
  `option_2` tinyint(1) NOT NULL,
  PRIMARY KEY (`user_id`,`food_id`,`order_time`),
  KEY `fk_order_food` (`food_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_order`
--

INSERT INTO `project_order` (`user_id`, `food_id`, `order_time`, `qty`, `status`, `option_1`, `option_2`) VALUES
(13, 21, '2019-11-01 18:55:13', 1, 'processing', 1, 1),
(13, 25, '2019-11-01 18:55:13', 1, 'processing', 1, 0),
(13, 25, '2019-11-01 22:59:37', 1, 'processing', 0, 0),
(13, 29, '2019-11-01 22:59:37', 5, 'processing', 0, 1),
(13, 33, '2019-11-01 18:55:13', 2, 'processing', 0, 0),
(13, 34, '2019-11-01 22:59:37', 1, 'processing', 0, 0),
(13, 41, '2019-11-01 18:55:13', 3, 'processing', 0, 0),
(13, 45, '2019-11-01 22:59:37', 1, 'processing', 0, 0),
(15, 21, '2019-11-02 00:46:46', 1, 'processing', 1, 0),
(15, 28, '2019-11-02 00:46:46', 2, 'processing', 0, 1),
(15, 30, '2019-11-02 00:46:46', 3, 'processing', 1, 1),
(15, 32, '2019-11-02 00:46:46', 1, 'processing', 0, 0),
(15, 38, '2019-11-02 00:46:46', 2, 'processing', 0, 0),
(15, 46, '2019-11-02 00:46:46', 3, 'processing', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `project_user`
--

CREATE TABLE IF NOT EXISTS `project_user` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` int(30) NOT NULL,
  `addr` varchar(60) NOT NULL,
  `postal` int(10) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `project_user`
--

INSERT INTO `project_user` (`ID`, `email`, `password`, `name`, `phone`, `addr`, `postal`) VALUES
(13, 'user1@test.com', 'e10adc3949ba59abbe56e057f20f883e', 'user1', 12345678, 'address line 1\r\naddress line 2\r\naddress line 3', 123456),
(15, 'pang@test.com', '6b1d24d57fc43f3a5bb8570a56afbc0c', 'Pang_Yujin', 12341234, 'NTU Hall 2\r\nBlock 1-1-1\r\n41 Student Walk\r\n', 639549);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('user1', '24c9e15e52afc47c225b757e7bee1f9d');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `coffee_order`
--
ALTER TABLE `coffee_order`
  ADD CONSTRAINT `fk_coffee_constraint` FOREIGN KEY (`coffee_id`) REFERENCES `coffee_price` (`ID`);

--
-- Constraints for table `project_order`
--
ALTER TABLE `project_order`
  ADD CONSTRAINT `fk_order_food` FOREIGN KEY (`food_id`) REFERENCES `project_food` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_order_user` FOREIGN KEY (`user_id`) REFERENCES `project_user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
