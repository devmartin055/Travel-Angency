-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2021 at 02:57 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lakbay`
--

-- --------------------------------------------------------

--
-- Table structure for table `accomodation`
--

CREATE TABLE `accomodation` (
  `acc_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `acc_hotel_name` varchar(100) NOT NULL,
  `acc_hotel_address` varchar(100) NOT NULL,
  `acc_hotel_contact` varchar(20) NOT NULL,
  `acc_hotel_description` varchar(1000) NOT NULL,
  `acc_hotel_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accomodation`
--

INSERT INTO `accomodation` (`acc_id`, `package_id`, `acc_hotel_name`, `acc_hotel_address`, `acc_hotel_contact`, `acc_hotel_description`, `acc_hotel_image`) VALUES
(27, 55, 'Stanford Hotel Seoul', '15, World Cup buk-ro 58-gil, Mapo-gu, Seoul, Republic of Korea ', '912 345 6890', 'asdasd', 'lakbay_10252021025121_981785148.png');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(100) NOT NULL,
  `cover` varchar(100) NOT NULL,
  `content` varchar(3000) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `title`, `author`, `cover`, `content`, `date`) VALUES
(2, 'The Classic Mexican Margarita', 'LT Globetrotter', 'lakbay_10252021092706_1588641080.jpg', 'Basically the quintessential cocktail of any Mexico vacation, the sweet and sour margarita is a refreshing alcoholic option that will instantly whisk you away to a warm sandy beach and brilliant Cancun sunset. \r\n\r\nBut who should we be toasting for this popular libation? It turns out, like many recipes throughout history, figuring out who actually invented the margarita isn’t so simple. There are\r\nmultiple claims to creating the drink, including one of the most popular versions out of Mexico’s Tijuana area. \r\n\r\nIn this version, Carlos Herrera invented the drink around 1938 at his restaurant in order to please a favorite customer named Marjorie King. This aspiring actress was apparently allergic to every alcohol except for tequila, but also wanted something more fun and refreshing than a typical shot. He then called it a margarita after her name.\r\n\r\nAnother claim is by a Dallas socialite named Margarita Sames, who is said to have created the concoction in Acapulco on a Mexican vacation with friends in 1948. ', 'October 25, 2021'),
(3, 'The Benefits of Booking Vacations Early', 'LT Globetrotter', 'lakbay_10212021031957_1626247497.jpg', 'Sometimes last-minute vacations are exactly what you need to find relaxation after a particularly stressful time\r\nor get a thrill from throwing caution to the wind and just going. However, there is so much to be gained from\r\nplanning early—these days more than ever. From saving money to picking the ideal itinerary, booking your\r\ntravel plans early can pay off in a big way. Here’s exactly what we’re talking about:\r\n\r\n1. More Availability Equals More Savings\r\n\r\nContrary to what you may think, more availability can actually be great for your bank account. As airline seats\r\nand hotel rooms book up, their demand rises along with their price. They know your options are limited, so\r\nthey’re banking on you wanting that flight bad enough to pay the higher price. Planning early means you still\r\nhave plenty of options to choose from, so the airlines and hotels compete for your business with the\r\npossibility of offering a better rate than their competitors. Another value to booking early is guaranteeing\r\nspace at the hotel or resort you want at high-travel times when inventory sells out quick. For example, 2022\r\ntravel is already selling out fast, which is a perfect incentive to book early!\r\n\r\n2. More Time for a Better Vacation\r\n\r\nPicture your ideal trip for next year’s vacation. Does it involve a cold margarita on the beach in Cancun with\r\ntours to the Mayan ruins and a snorkeling adventure? Or will you be driving through the Tuscan countryside\r\ntouring wineries before spending a few nights in Florence to explore the birthplace of the Renaissance?\r\nBooking early means you’ll have more time with your travel consultant to research, plan, and save for all of\r\nthose in-destination wish list items, such as visiting an iconic attraction, eating at that famous restaurant, and\r\nexperiencing hidden gems.\r\n\r\n3. Planning Ahead for\r\n\r\nAnticipation is one of the driving forces of life. The thought of that sushi-dinner date you have later tonight\r\ndefinitely helps you get through work, and the same can be said for travel. Booking your getaway ahead of\r\ntime generates a sense of excitement. There’s nothing better than the anticipation of a vacation, the build up\r\naround escaping the day to day, and the positive expectations around the fact that your perfect getaway is\r\njust around the corner. Not only that, you can help prevent vacation uncertainty and book with confidence\r\nthanks to our partners that participate in our Peace of Mind plan, which offers no penalties on cancellation\r\nand/or booking changes up to 72-hours prior to the check-in date at select resorts.\r\n\r\nWhen it comes to planning your vacation, sit back and let the experts take care of everything. Your Liberty\r\nTravel consultant’s experience and knowledge are the best value for booking your travel plans early.', 'October 21, 2021');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `book_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `number_of_person` int(11) NOT NULL,
  `contact_person` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `country_origin` varchar(50) NOT NULL,
  `instruction` varchar(200) NOT NULL,
  `booked_date` varchar(50) NOT NULL,
  `date_departure` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inclusion`
--

CREATE TABLE `inclusion` (
  `inclusion_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `inclusion_flight` varchar(1000) NOT NULL,
  `inclusion_meal` varchar(1000) NOT NULL,
  `inclusion_tours` varchar(3000) NOT NULL,
  `inclusion_guide` varchar(100) NOT NULL,
  `inclusion_insurance` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inclusion`
--

INSERT INTO `inclusion` (`inclusion_id`, `package_id`, `inclusion_flight`, `inclusion_meal`, `inclusion_tours`, `inclusion_guide`, `inclusion_insurance`) VALUES
(27, 55, 'asd', 'asd', 'asd', 'asd', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `itenary`
--

CREATE TABLE `itenary` (
  `itenary_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `description` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `itenary`
--

INSERT INTO `itenary` (`itenary_id`, `package_id`, `destination`, `description`) VALUES
(27, 55, 'asd', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `login_user`
--

CREATE TABLE `login_user` (
  `user_id` int(11) NOT NULL,
  `user_type` int(1) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_user`
--

INSERT INTO `login_user` (`user_id`, `user_type`, `email`, `password`) VALUES
(1, 0, 'martindeguzman@gmail.com', 'IamMartinDeGuzman'),
(2, 1, 'deguzmanmartin@gmail.com', 'IamMartinDeGuzman'),
(3, 0, 'admin@lakbay.com.ph', 'IamAdmin'),
(4, 0, 'admin@gmail.com', 'IamAdmin'),
(5, 1, 'public@gmail.com', 'IamPublic'),
(6, 0, 'admin', 'admin'),
(9, 1, 'user', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `package_id` int(11) NOT NULL,
  `package_name` varchar(50) NOT NULL,
  `no_of_days` int(11) NOT NULL,
  `no_of_nights` int(11) NOT NULL,
  `package_image` varchar(100) NOT NULL,
  `destination` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`package_id`, `package_name`, `no_of_days`, `no_of_nights`, `package_image`, `destination`) VALUES
(55, 'asdasd', 1, 1, 'lakbay_10252021025121_238317790.png', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `package_type`
--

CREATE TABLE `package_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(50) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package_type`
--

INSERT INTO `package_type` (`type_id`, `type_name`, `price`) VALUES
(1, 'Two Beds', 10000),
(2, 'Three Beds', 15000),
(8, 'Hello bed', 30000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accomodation`
--
ALTER TABLE `accomodation`
  ADD PRIMARY KEY (`acc_id`),
  ADD KEY `package_accomodation` (`package_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `package` (`package_id`),
  ADD KEY `package_type` (`type_id`);

--
-- Indexes for table `inclusion`
--
ALTER TABLE `inclusion`
  ADD PRIMARY KEY (`inclusion_id`),
  ADD KEY `package_inclusion` (`package_id`);

--
-- Indexes for table `itenary`
--
ALTER TABLE `itenary`
  ADD PRIMARY KEY (`itenary_id`),
  ADD KEY `package_itenary` (`package_id`);

--
-- Indexes for table `login_user`
--
ALTER TABLE `login_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `package_type`
--
ALTER TABLE `package_type`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accomodation`
--
ALTER TABLE `accomodation`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `inclusion`
--
ALTER TABLE `inclusion`
  MODIFY `inclusion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `itenary`
--
ALTER TABLE `itenary`
  MODIFY `itenary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `login_user`
--
ALTER TABLE `login_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `package_type`
--
ALTER TABLE `package_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accomodation`
--
ALTER TABLE `accomodation`
  ADD CONSTRAINT `package_accomodation` FOREIGN KEY (`package_id`) REFERENCES `package` (`package_id`);

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `package` FOREIGN KEY (`package_id`) REFERENCES `package` (`package_id`),
  ADD CONSTRAINT `package_type` FOREIGN KEY (`type_id`) REFERENCES `package_type` (`type_id`);

--
-- Constraints for table `inclusion`
--
ALTER TABLE `inclusion`
  ADD CONSTRAINT `package_inclusion` FOREIGN KEY (`package_id`) REFERENCES `package` (`package_id`);

--
-- Constraints for table `itenary`
--
ALTER TABLE `itenary`
  ADD CONSTRAINT `package_itenary` FOREIGN KEY (`package_id`) REFERENCES `package` (`package_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
