-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2025 at 09:33 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webi`
--

-- --------------------------------------------------------

--
-- Table structure for table `dbav`
--

CREATE TABLE `dbav` (
  `ID` int(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `episode` int(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dbav`
--

INSERT INTO `dbav` (`ID`, `judul`, `genre`, `episode`, `gambar`) VALUES
(1, 'Naruto', 'Action', 220, '1.png'),
(2, 'One Piece', 'Adventure', 1000, '2.png'),
(3, 'Bleach', 'Action', 366, '3.png'),
(4, 'Attack on Titan', 'Action', 87, '4.png'),
(5, 'Death Note', 'Thriller', 37, '5.png'),
(6, 'Fullmetal Alchemist: Brotherhood', 'Adventure', 64, '6.png'),
(7, 'My Hero Academia', 'Action', 138, '7.png'),
(8, 'Demon Slayer', 'Action', 44, '8.png'),
(9, 'Jujutsu Kaisen', 'Action', 48, '9.png'),
(10, 'Hunter x Hunter', 'Adventure', 148, '10.png'),
(11, 'Tokyo Ghoul', 'Horror', 48, '11.png'),
(12, 'Sword Art Online', 'Fantasy', 96, '12.png'),
(13, 'Re:Zero', 'Fantasy', 50, '13.png'),
(14, 'One Punch Man', 'Action', 24, '14.png'),
(15, 'Steins;Gate', 'Sci-Fi', 24, '15.png'),
(16, 'Code Geass', 'Sci-Fi', 50, '16.png'),
(17, 'Black Clover', 'Action', 170, '17.png'),
(18, 'Fairy Tail', 'Adventure', 328, '18.png'),
(19, 'Gintama', 'Comedy', 367, '19.png'),
(20, 'Haikyuu!!', 'Sports', 85, '20.png'),
(21, 'Your Lie in April', 'Drama', 22, '21.png'),
(22, 'Toradora!', 'Romance', 25, '22.png'),
(23, 'The Rising of the Shield Hero', 'Fantasy', 38, '23.png'),
(24, 'No Game No Life', 'Fantasy', 12, '24.png'),
(25, 'Erased', 'Thriller', 12, '25.png'),
(26, 'Vinland Saga', 'Adventure', 48, '26.png'),
(27, 'Mob Psycho 100', 'Action', 37, '27.png'),
(28, 'The Promised Neverland', 'Thriller', 23, '28.png'),
(29, 'Made in Abyss', 'Adventure', 25, '29.png'),
(30, 'KonoSuba', 'Comedy', 20, '30.png'),
(31, 'Overlord', 'Fantasy', 52, '31.png'),
(32, 'Dr. Stone', 'Adventure', 35, '32.png'),
(33, 'Akame ga Kill!', 'Action', 24, '33.png'),
(34, 'Claymore', 'Action', 26, '34.png'),
(35, 'Fate/Stay Night: Unlimited Blade Works', 'Fantasy', 25, '35.png'),
(36, 'Fate/Zero', 'Fantasy', 25, '36.png'),
(37, 'Kill la Kill', 'Action', 24, '37.png'),
(38, 'Angel Beats!', 'Drama', 13, '38.png'),
(39, 'Clannad', 'Drama', 47, '39.png'),
(40, 'Hellsing Ultimate', 'Action', 10, '40.png'),
(41, 'Neon Genesis Evangelion', 'Sci-Fi', 26, '41.png'),
(42, 'Trigun', 'Action', 26, '42.png'),
(43, 'Berserk', 'Action', 25, '43.png'),
(44, 'Cowboy Bebop', 'Sci-Fi', 26, '44.png'),
(45, 'Samurai Champloo', 'Action', 26, '45.png'),
(46, 'Spirited Away', 'Fantasy', 1, '46.png'),
(47, 'Howl`s Moving Castle', 'Fantasy', 1, '47.png'),
(48, 'Princess Mononoke', 'Fantasy', 1, '48.png'),
(49, 'The Wind Rises', 'Drama', 1, '49.png'),
(50, 'Grave of the Fireflies', 'Drama', 1, '50.png'),
(51, 'Your Name', 'Romance', 1, '51.png'),
(52, 'Weathering With You', 'Romance', 1, '52.png'),
(53, 'A Silent Voice', 'Drama', 1, '53.png'),
(54, '5 Centimeters per Second', 'Romance', 1, '54.png'),
(55, 'The Garden of Words', 'Romance', 1, '55.png'),
(56, 'Perfect Blue', 'Thriller', 1, '56.png'),
(57, 'Paprika', 'Sci-Fi', 1, '57.png'),
(58, 'Summer Wars', 'Sci-Fi', 1, '58.png'),
(59, 'Wolf Children', 'Drama', 1, '59.png'),
(60, 'The Boy and the Beast', 'Adventure', 1, '60.png'),
(61, 'Kiki`s Delivery Service', 'Fantasy', 1, '61.png'),
(62, 'My Neighbor Totoro', 'Fantasy', 1, '62.png'),
(63, 'Castle in the Sky', 'Fantasy', 1, '63.png'),
(64, 'Ponyo', 'Fantasy', 1, '64.png'),
(65, 'Oshi No Ko', 'Misteri', 24, '65.png'),
(66, 'Porco Rosso', 'Adventure', 1, '66.png'),
(67, 'When Marnie Was There', 'Drama', 1, '67.png'),
(68, 'From Up on Poppy Hill', 'Drama', 1, '68.png'),
(69, 'Whisper of the Heart', 'Romance', 1, '69.png'),
(70, 'Only Yesterday', 'Drama', 1, '70.png'),
(71, 'Ocean Waves', 'Romance', 1, '71.png'),
(72, 'Shiranai Uchi ni Level Max ni Nattemashita', 'Fantasy', 24, '72.png'),
(73, 'Big Fish & Begonia', 'Fantasy', 1, '73.png'),
(74, 'That Time I Got Reincarnated as a Slime', 'isekai', 72, '74.png'),
(75, 'Mushoku Tensei: Jobless Reincarnation', 'isekai', 72, '75.png'),
(76, 'KonoSuba: God’s Blessing on This Wonderful World!', 'isekai', 54, '76.png'),
(77, 'Fireworks', 'Romance', 1, '77.png'),
(78, 'Redline', 'Action', 1, '78.png'),
(79, 'The Girl Who Leapt Through Time', 'Sci-Fi', 1, '79.png'),
(80, 'Maquia: When the Promised Flower Blooms', 'Drama', 1, '80.png'),
(81, 'Grimgar: Ashes and Illusions', 'isekai', 12, '81.png'),
(82, 'The Devil is a Part-Timer!', 'Fantasy', 24, '82.png'),
(83, 'Arifureta: From Commonplace to Worlds Strongest', 'Fantasy', 24, '83.png'),
(84, 'Cautious Hero: The Hero Is Overpowered but Overly Cautious', 'Romance', 12, '84.png'),
(85, 'Ride Your Wave', 'Romance', 1, '85.png'),
(86, 'Villainess: All Routes Lead to Doom!', 'Adventure', 12, '86.png'),
(87, 'Mirai', 'Fantasy', 1, '87.png'),
(88, 'The Vision of Escaflowne', 'isekai', 12, '88.png'),
(89, 'Nanatsu no Maken wo Ryuu to Suru', 'Fantasy', 12, '89.png'),
(90, 'The Anthem of the Heart', 'Drama', 1, '90.png'),
(91, 'Patema Inverted', 'Sci-Fi', 1, '91.png'),
(92, 'Reincarnated to Master the Magic of the World', 'Fantasy', 12, '92.png'),
(93, 'Hyouka', 'Misteri', 25, '93.png'),
(94, 'Another', 'Misteri', 12, '94.png'),
(95, 'Arrietty', 'Fantasy', 1, '95.png'),
(96, 'One Piece Film: Gold', 'Adventure', 1, '96.png'),
(97, ' The Perfect Insider (Subete ga F ni Naru)', 'Misteri', 12, '97.png'),
(98, 'Naruto: The Last', 'Action', 1, '98.png'),
(99, 'Bleach: Memories of Nobody', 'Action', 1, '99.png'),
(100, 'Zankyou no Terror (Terror in Resonance)', 'Misteri', 11, '100.png'),
(101, 'rtgterg', 'adventure', 12, 'Screenshot 2025-04-09 101416.png');

-- --------------------------------------------------------

--
-- Table structure for table `userav`
--

CREATE TABLE `userav` (
  `ID` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userav`
--

INSERT INTO `userav` (`ID`, `username`, `password`, `picture`) VALUES
(0, 'Kevin', '123', 'kev.gif'),
(1, 'test', '123123', 'default.png'),
(2, 'rill', '123', 'rillYapping.gif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dbav`
--
ALTER TABLE `dbav`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `userav`
--
ALTER TABLE `userav`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
