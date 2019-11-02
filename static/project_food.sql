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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
