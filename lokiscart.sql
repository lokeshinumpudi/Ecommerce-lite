-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2016 at 01:39 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lokiscart`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `slogan` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `category` varchar(30) NOT NULL,
  `img_url` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`_id`),
  UNIQUE KEY `_id` (`_id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`_id`, `title`, `slogan`, `description`, `category`, `img_url`, `price`) VALUES
(23, 'WiredTiger T-shirt', 'Unleash the tiger', 'Crafted from ultra-soft combed cotton, this essential t-shirt features sporty contrast tipping and MongoDB s signature leaf.', 'Apparel', '/img/products/wt-shirt.jpg', 22),
(22, 'Water Bottle', 'Glass water bottle', 'High quality glass bottle provides a healthier way to drink.  Silicone sleeve provides a good grip, a see-through window, and protects the glass vessel.  Eliminates toxic leaching that plastic can cause.  Innovative design holds 22-1/2 ounces.  Dishwasher safe', 'Kitchen', '/img/products/water-bottle.jpg', 23),
(20, 'MongoDB University T-shirt', 'Show Your MDBU Alumni Status', 'Crafted from ultra-soft combed cotton, this essential t-shirt features sporty contrast tipping and MongoDB s signature leaf.', 'Apparel', '/img/products/univ-tshirt.jpg', 45),
(21, 'USB Stick', '5GB of space', 'MongoDB s Turbo USB 3.0 features lightning fast transfer speeds of up to 10X faster than standard MongoDB USB 2.0 drives. This ultra-fast USB allows for fast transfer of larger files such as movies and videos.', 'Electronics', '/img/products/leaf-usb.jpg', 40),
(19, 'MongoDB University Book', 'A concise summary of MongoDB commands', 'Keep the MongoDB commands you ll need at your fingertips with this concise book.', 'Books', '/img/products/univ-book.jpg', 4),
(18, 'MongoDB Umbrella (Gray)', 'Premium Umbrella', 'Our crook handle stick umbrella opens automatically with the push of a button. A traditional umbrella with classic appeal.', 'Umbrellas', '/img/products/umbrella.jpg', 21),
(17, 'MongoDB Umbrella (Brown)', 'Premium Umbrella', 'Our crook handle stick umbrella opens automatically with the push of a button. A traditional umbrella with classic appeal.', 'Umbrellas', '/img/products/umbrella-brown.jpg', 21),
(15, 'Scaling MongoDB', '2nd Edition', 'Create a MongoDB cluster that will grow to meet the needs of your application. With this short and concise book, you ll get guidelines for setting up and using clusters to store a large volume of data, and learn how to access the data efficiently. In the process, you ll understand how to make your application work with a distributed database system.', 'Books', '/img/products/scaling-book.jpg', 29),
(16, 'Powered by MongoDB Sticker', 'Add to your sticker collection', 'Waterproof vinyl, will last 18 months outdoors.  Ideal for smooth flat surfaces like laptops, journals, windows etc.  Easy to remove.  50% discounts on all orders of any 6+', 'Stickers', '/img/products/sticker.jpg', 1),
(14, 'USB Stick (Leaf)', '1GB of space', 'MongoDB s Turbo USB 3.0 features lightning fast transfer speeds of up to 10X faster than standard MongoDB USB 2.0 drives. This ultra-fast USB allows for fast transfer of larger files such as movies and videos.', 'Electronics', '/img/products/leaf-usb.jpg', 20),
(13, 'USB Stick (Green)', '1GB of space', 'MongoDB s Turbo USB 3.0 features lightning fast transfer speeds of up to 10X faster than standard MongoDB USB 2.0 drives. This ultra-fast USB allows for fast transfer of larger files such as movies and videos.', 'Electronics', '/img/products/greenusb.jpg', 20),
(12, 'Leaf Sticker', 'Add to your sticker collection', 'Waterproof vinyl, will last 18 months outdoors.  Ideal for smooth flat surfaces like laptops, journals, windows etc.  Easy to remove.  50% discounts on all orders of any 6+', 'Stickers', '/img/products/leaf-sticker.jpg', 1),
(11, 'MongoDB The Definitive Guide', '2nd Edition', 'Manage the huMONGOus amount of data collected through your web application with MongoDB. This authoritative introductionâ€”written by a core contributor to the projectâ€”shows you the many advantages of using document-oriented databases, and demonstrates how this reliable, high-performance system allows for almost infinite horizontal scalability.', 'Books', '/img/products/guide-book.jpg', 20),
(10, 'Green T-shirt', 'MongoDB community shirt', 'Crafted from ultra-soft combed cotton, this essential t-shirt features sporty contrast tipping and MongoDB s signature leaf.', 'Apparel', '/img/products/green-tshirt.jpg', 20),
(9, 'Pen (Black)', 'The only pen you/ ll ever need', 'Erase and rewrite repeatedly without damaging documents. The needlepoint tip creates clear precise lines and the thermo-sensitive gel ink formula disappears with erasing friction.', 'Office', '/img/products/pen.jpg', 2),
(8, 'Pen (Green)', 'The only pen you/ ll ever need', 'Erase and rewrite repeatedly without damaging documents. The needlepoint tip creates clear precise lines and the thermo-sensitive gel ink formula disappears with erasing friction.', 'Office', '/img/products/green-pen.jpg', 2),
(7, 'Brown Tumbler', 'Bring your coffee to go', 'The MongoDB Insulated Travel Tumbler is smartly designed to maintain temperatures and go anywhere. Dual wall construction will keep your beverages hot or cold for hours and a slide lock lid helps minimize spills.', 'Kitchen', '/img/products/brown-tumbler.jpg', 9),
(6, 'Brown Carry-all Bag', 'Keep extra items here', 'Let your style speak for itself with this chic brown carry-all bag. Featuring a nylon exterior with solid contrast trim, brown in color, and MongoDB logo', 'Swag', '/img/products/brown-bag.jpg', 5),
(5, 'Women/ s T-shirt', 'MongoDB shirt in-style', 'Crafted from ultra-soft combed cotton, this essential t-shirt features sporty contrast tipping and MongoDB s signature leaf.', 'Apparel', '/img/products/white-mongo.jpg', 45),
(4, 'Track Jacket', 'Go to the track in style!', 'Crafted from ultra-soft combed cotton, this essential jacket features sporty contrast tipping and MongoDB/ s signature embroidered leaf.', 'Apparel', '/img/products/track-jacket.jpg', 45),
(3, 'Stress Ball', 'Squeeze your stress away', 'The moment life piles more onto your already heaping plate and you start feeling hopelessly overwhelmed, take a stress ball in hand and squeeze as hard as you can. Take a deep breath and just let that tension go. Repeat as needed. It will all be OK! Having something small, portable and close at hand is a must for stress management.', 'Swag', '/img/products/stress-ball.jpg', 5),
(2, 'Coffee Mug', 'Keep your coffee hot!', 'A mug is a type of cup used for drinking hot beverages, such as coffee, tea, hot chocolate or soup. Mugs usually have handles, and hold a larger amount of fluid than other types of cup. Usually a mug holds approximately 12 US fluid ounces (350 ml) of liquid; double a tea cup. A mug is a less formal style of drink container and is not usually used in formal place settings, where a teacup or coffee cup is preferred.', 'Kitchen', '/img/products/mug.jpg', 13),
(1, 'Gray Hooded Sweatshirt', 'The top hooded sweatshirt we offer', 'Unless you live in a nudist colony, there are moments when the chill you feel demands that you put on something warm, and for those times, there s nothing better than this sharp MongoDB hoodie. Made of 100% cotton, this machine washable, mid-weight hoodie is all you need to stay comfortable when the temperature drops. And, since being able to keep your vital stuff with you is important, the hoodie features two roomy kangaroo pockets to ensure nothing you need ever gets lost.', 'Apparel', '/img/products/hoodie.jpg', 30);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
