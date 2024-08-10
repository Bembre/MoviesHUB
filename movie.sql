-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2024 at 05:49 AM
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
-- Database: `movie`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `img` mediumtext NOT NULL,
  `title` mediumtext NOT NULL,
  `s1` mediumtext NOT NULL,
  `s2` mediumtext NOT NULL,
  `s3` mediumtext NOT NULL,
  `s4` mediumtext NOT NULL,
  `movie` mediumtext NOT NULL,
  `t1` mediumtext NOT NULL,
  `t2` mediumtext NOT NULL,
  `t3` mediumtext NOT NULL,
  `t4` mediumtext NOT NULL,
  `link` varchar(200) NOT NULL,
  `des` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `img`, `title`, `s1`, `s2`, `s3`, `s4`, `movie`, `t1`, `t2`, `t3`, `t4`, `link`, `des`) VALUES
(1, 'img1.jpg', 'Sam Bahadur', 's1.jpg', 's2.jpg', 's3.jpg', 's4.jpg', 'm1.mp4', 'action', 'drama', 'bollywood', 'thriller', 'https://www.youtube.com/watch?v=KLWcgCiGQxc', ''),
(3, 'img3.jpg', 'The Kerla Story', 's9.jpg', 's10.jpg', 's11.jpg', 's12.jpg', 'm3.mkv', 'drama', 'bollywood', 'action', 'hindi', 'https://www.youtube.com/watch?v=6zxN4GNOm8c', ''),
(4, 'img4.jpg', 'Salaar', 's13.jpg', 's14.jpg', 's15.jpg', 's16.jpg', 'm4.mkv', 'action', 'hindi', 'south', 'crime', 'https://www.youtube.com/watch?v=HihakYi5M2I', ''),
(5, 'img5.jpg', 'Guntur Kaaram', 's17.jpg', 's18.png', 's19.png', 's20.png', 'm5.mkv', 'action', 'thriller', 'south', 'hindi', 'https://www.youtube.com/watch?v=q8M6Ybjr2Wc', ''),
(6, 'img6.webp', 'Captain Miller', 's25.jpg', 's26.jpg', 's27.jpg', 's28.jpg', 'm6.mkv', 'action', 'hindi', 'south', 'thriller', 'https://www.youtube.com/watch?v=ujhWbKP1rKA', ''),
(13, 'img7.webp', 'Eagle', '1913268164_eagle-ott-release_202402.jpg', 'CS-images-21.webp', 'eagle-review-1600.jpg', '', 'm7.mkv', 'south', 'hindi', 'bollywood', 'drama', 'https://www.youtube.com/watch?v=lH88CpAJXOE', ''),
(14, 'Saindhav.jpg', 'Saindhav', 'first-look-of-victory-venkateshs-75th-movie-saindhav-out-01.jpg', 'image-126-1024x811.png', 'saindhav (1).jpg', 'venkateshs-saindhav-to-release-on-prime-video-on-february-3-01.jpg', 'Movies4u.Vip.Saindhav 2024 UnCut Dual Audio [Hindi - Telugu] Full Movie HD ESub 480p.mkv', 'south', 'bollywood', 'crime', 'thriller', 'https://www.youtube.com/watch?v=SMmY5TjoEQ0', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `profile` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `profile`) VALUES
(1, 'Prathamesh', 'prathameshbembre01@gmail.com', '123', 'per1.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
