-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 13, 2024 at 04:50 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin', '111'),
(8, 'admin1', '123');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int NOT NULL,
  `qty` int NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `name`, `price`, `qty`, `image`) VALUES
(1, 1, 'tomato & pesto spaghetti', 2200, 1, 'dish-2.png'),
(2, 1, 'pizzetta', 2000, 1, 'pizza-1.png'),
(3, 1, 'Taco spaghetti', 2200, 1, 'dish-1.png'),
(4, 1, 'Herbal Limeade', 750, 1, 'drink-3.png');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(1, 0, 'user1', 'user1@gmail.com', '0719694571', 'very good food.deliver fast');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `name` varchar(20) NOT NULL,
  `number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int NOT NULL,
  `placed_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` int NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `price`, `image`, `description`) VALUES
(1, 'cheezy burger', 'fast food', 1200, 'burger-1.png', '\"Delight in our Cheesy Burger crafted with premium beef, topped with gooey melted cheese, crisp lettuce, juicy tomatoes, and tangy pickles, all embraced by a fluffy bun. Experience savory perfection a'),
(2, 'Taco spaghetti', 'main dish', 2200, 'dish-1.png', 'Discover our tantalizing Taco Spaghetti, a fusion delight crafted with the finest ingredients. Succulent ground beef, zesty tomato sauce, aromatic spices, and al dente spaghetti harmonize to create a '),
(3, 'pizzetta', 'fast food', 2000, 'pizza-1.png', 'A Pizzetta is a small, thin-crust pizza, typically made with simple ingredients such as tomato sauce, cheese, and toppings like pepperoni, mushrooms, or vegetables. Itis a delightful snack or appetize'),
(4, 'tomato & pesto spaghetti', 'main dish', 2200, 'dish-2.png', 'Tomato & Pesto Spaghetti: A savory delight featuring al dente spaghetti tossed in a vibrant blend of sun-ripened tomatoes and aromatic pesto sauce. Crafted with fresh basil, garlic, pine nuts, and Par'),
(5, 'Fudgy Oreo Brownies', 'desserts', 700, 'dessert-2.png', 'Fudgy Oreo Brownies are rich, indulgent treats made with a decadent combination of chocolatey brownie batter and crushed Oreo cookies, resulting in a delightful contrast of textures and flavors. They '),
(6, 'Strawberry Mojito', 'drinks', 600, 'drink-5.png', 'Refreshing Strawberry Mojito made with fresh strawberries, mint leaves, lime juice, simple syrup, and soda water. Perfect for a burst of flavor on a hot day. Enjoy this delightful twist on the classic'),
(7, 'Ground beef & speghetti', 'main dish', 2550, 'dish-4.png', 'Ground beef & spaghetti, a classic combination, feature ground beef cooked with onions, garlic, and tomato sauce, served over al dente spaghetti. Enjoy this savory dish, enriched with herbs and spices'),
(8, 'Herbal Limeade', 'drinks', 750, 'drink-3.png', 'Herbal Limeade is a refreshing drink made of fresh lime juice, herbal infusions, and a touch of sweetness. It is a perfect blend of tangy and herbal flavors, creating a revitalizing beverage.'),
(9, ' Strawberry Cheesecake Pie', 'desserts', 980, 'dessert-6.png', 'Strawberry Cheesecake Pie is a delectable dessert made with a buttery graham cracker crust, creamy cheesecake filling, and topped with fresh strawberries. It is a delightful combination of sweet and t'),
(10, 'Bacon &mushroom pizza', 'fast food', 2600, 'pizza-5.png', 'Indulge in our savory Bacon & Mushroom Pizza, expertly crafted with a crispy crust, rich tomato sauce, generous portions of smoky bacon, earthy mushrooms, and melted cheese. A delectable delight for y'),
(11, 'creamy mushroom  pizza', 'fast food', 2450, 'pizza-4.png', 'Creamy Mushroom Pizza is a delectable pizza variant made with a creamy sauce base, topped with savory mushrooms and other delicious ingredients. It offers a rich and indulgent flavor profile, perfect '),
(12, 'Italian sausages pizza', 'fast food', 2200, 'pizza-3.png', 'Italian Sausage Pizza is a savory delight, featuring a crispy crust topped with zesty tomato sauce, melted mozzarella cheese, and flavorful Italian sausage. Other ingredients like onions, peppers, and'),
(13, 'Nepolitan pizza', 'fast food', 2300, 'pizza-2.png', 'Neapolitan pizza is a traditional Italian pizza made with simple ingredients: dough, San Marzano tomatoes, mozzarella cheese, fresh basil, salt, and olive oil. Its key features are a thin crust and mi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `number`, `password`, `address`) VALUES
(1, 'user1', 'user1@gmail.com', '0704066931', '1234', '08, wasana road, wadduw, kaluthara, eastern'),
(2, 'vishwanthi saubagya', 'vishubaghya@gmail.com', '0729697571', '123456', ''),
(3, 'user2', 'user2@gmail.com', '0382284400', 'user2', ''),
(4, 'user3', 'user3@gmail.com', '0704066934', 'user3', ''),
(8, 'warangana', 'waranagana@gmail.com', '0234567891', '1234', ''),
(10, 'user4', 'user4@gmail.com', '0374005623', 'user4', ''),
(13, 'user5', 'user5@gmail.com', '0789654322', 'user5', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
