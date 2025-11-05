-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 04, 2025 at 06:29 PM
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
-- Database: `movies`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'prathameshbembre01@gmail.com', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id` int(11) NOT NULL,
  `cover` varchar(100) NOT NULL,
  `dp` varchar(100) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(340) NOT NULL,
  `genre1` varchar(20) NOT NULL,
  `genre2` varchar(20) NOT NULL,
  `genre3` varchar(20) NOT NULL,
  `genre4` varchar(20) NOT NULL,
  `lang` varchar(100) NOT NULL,
  `movie` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `s1` varchar(100) NOT NULL,
  `s2` varchar(100) NOT NULL,
  `s3` varchar(100) NOT NULL,
  `s4` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `cover`, `dp`, `title`, `description`, `genre1`, `genre2`, `genre3`, `genre4`, `lang`, `movie`, `link`, `s1`, `s2`, `s3`, `s4`) VALUES
(3, 'Kantara-Chapter-1_banner.webp', 'Kantara.JPG', 'Kantara: Chapter 1 (2025)', 'Exploring the origins of Kaadubettu Shiva during the Kadamba dynasty era, it delves into the untamed', 'Action', 'Thriller', 'Adventure', 'Drama', '', 'https://youtu.be/6oKFao0aISA?si=Dn9gmR4sH5s2RnTa', 'https://youtu.be/6oKFao0aISA?si=Dn9gmR4sH5s2RnTa', 'kantara_s1.png', 'kantara_s2.png', 'kantara_s3.png', 'kantara_s4.png'),
(4, 'og_banner.webp', 'OG.JPG', 'They Call Him OG', 'After vanishing from Mumbai’s underworld for a decade, mob boss Ojas Gambheera resurfaces—feared, un', 'Action', 'Crime', 'Drama', 'Thriller ', '', 'https://youtu.be/5DUjDPQ_0K0?si=e8YkuOxDrA6A-aP4', 'https://youtu.be/5DUjDPQ_0K0?si=e8YkuOxDrA6A-aP4', 'og_s1.png', 'og_s2.png', 'og_s4.png', 'og_s3.png'),
(5, 'war2_banner.jpg', 'war2.webp', 'War 2 (2025)', 'The story follows Kabir, a former RAW agent who went rogue five years after eliminating Saurabh and ', 'Action', 'Thriller', 'Mystery', 'Drama', '', 'https://youtu.be/mjBym9uKth4?si=TryCKjBsCiNMo3A7', 'https://youtu.be/mjBym9uKth4?si=TryCKjBsCiNMo3A7', 'war2_s1.jpg', 'war2_s2.jpg', 'war2_s3.jpg', 'war2_s4.jpg'),
(6, 'lokah_cover.png', 'lokah.webp', 'Lokah Chapter 1: Chandra (2025)', 'The film follows Chandra, a mysterious, goth-influenced woman who arrives in Bengaluru with a missio', 'Action', 'Fantasy', 'Comedy', 'Drama', '', 'https://youtu.be/8tyDDnJ5F_c?si=RxBlS7X55QUsFtq2', 'https://youtu.be/8tyDDnJ5F_c?si=RxBlS7X55QUsFtq2', 'lokah_s1.png', 'lokah_s2.png', 'lokah_s3.png', 'lokah_s4.png'),
(7, 'jolly_cover.png', 'jolly.webp', 'Jolly LLB 3 (2025)', 'The story centers on a courtroom drama rooted in social injustice, beginning with the suicide of Sum', 'Comedy', 'Drama', 'Mystery', 'Thriller ', '', 'https://youtu.be/eSgJ8PfSUSk?si=nvbcTmTc6Px4maCt', 'https://youtu.be/eSgJ8PfSUSk?si=nvbcTmTc6Px4maCt', 'jolly_s1.png', 'jolly_s2.png', 'jolly_s3.png', 'jolly_s4.png'),
(8, 'iron_man1_cover.png', 'Iron_Man_1.jpg', 'Iron Man (2008)', 'Tony Stark, a billionaire industrialist and genius inventor, is captured by the terrorist group the ', 'Action', 'Adventure', 'Sci-Fi', 'Fantasy', '', 'https://youtu.be/8ugaeA-nMTc?si=_FY0yp9JoyN2evIL', 'https://youtu.be/8ugaeA-nMTc?si=_FY0yp9JoyN2evIL', 'iron_man1_s1.jpg', 'iron_man1_s2.png', 'iron_man1_s1.jpg', 'iron_man1_s2.png'),
(11, 'robinhood_cover.webp', 'robinhood_db.jpg', 'Robinhood (2025)', 'Ram, an orphan inspired by a school pledge, grows up believing the entire country is his family. As ', 'Action', 'Comedy', 'Crime', 'Romance', 'Hindi', 'https://youtu.be/LWnvgqVZpa4?si=BwDFaopp5g6PDzIa', 'https://youtu.be/NfsTxYtBiWg?si=rIBDljeGwL3f4VkE', 'robinhood_s1.webp', 'robinhood_s2.webp', 'robinhood_s3.webp', 'robinhood_s4.webp'),
(12, 'warrior_cover.png', 'warrior_db.jpg', 'The Warriorr', 'Satya, an MBBS graduate, relocates to Kurnool with his mother and sister Nithya after receiving a job as a doctor in a government hospital. Satya also learns about Gururaj \"Guru\", a ruthless gangster, whose company has been manufacturing poisonous saline and is involved in the medical mafia. This results in the deaths of three children in', 'Action', 'Crime', 'Drama', 'Romance', 'Hindi', 'https://youtu.be/RFA3ruwfLYI?si=HoYWGkVWp058eUcG', 'https://youtu.be/WWnoWAk9gMU?si=fD8oi-h_FXeWIysb', 'warrior_s1.png', 'warrior_s2.png', 'warrior_s3.png', 'warrior_s4.png'),
(14, 'Sarrainodu_cover.webp', 'Sarrainodu_dp.jpg', 'Sarrainodu', 'Gana, an ex-Indian Army Major, is raised by his paternal uncle Sripathi and is berated by his father Umapathi for leaving the army and not having an aim in life. Gana is sent to a neighboring village to meet his prospective bride Mahalakshmi Jaanu, the daughter of Umapathi\'s friend Jaya Prakash, an ex-IAS officer. However, Gana meets MLA ', 'Action', 'Drama', 'Romance', 'Comedy', 'Hindi', 'https://youtu.be/B6h-kQLQqec?si=9j94r7u_3T5XGuld', 'https://youtu.be/m_ghk3lhIg0?si=WZnnBjEOfHvbLyrN', 'Sarrainodu_s1.webp', 'Sarrainodu_s2.webp', 'Sarrainodu_s3.webp', 'Sarrainodu_s4.webp'),
(15, 'DJ_cover.webp', 'DJ_dp.jpg', 'DJ', 'Duvvada Jagannadham Sastri, a chef working as a caterer from Vijayawada along with his Brahmin family, masquerades as DJ, an altruistic vigilante who kills wrongdoers with the help of his mentor CI Puroshottam. At his friend Vignesh\'s wedding, Jagannadhan meets Pooja, the daughter of Home Minister Pushpam, and falls in love with her.', 'Action', 'Comedy', 'Crime', 'Drama', 'Hindi', 'https://youtu.be/EJMzac_LgRY?si=JTdAkG5BhuaYrUW2', 'https://youtu.be/fy-kooz9se4?si=6r84RGtnUVOGi7DI', 'DJ_s1.webp', 'DJ_s2.webp', 'DJ_s3.webp', 'DJ_s4.webp'),
(16, 'Screenshot 2025-11-02 181736.png', 'Jogwa_dp.jpg', 'Jogwa', 'The story of Jogwa is about Tayappa (Upendra Limaye) and Suli (Mukta Barve), who are forced by their families to become jogtins, a practice where they have to dress as women, beg for alms, and serve a deity. Suli becomes a jogtin because her hair has a knot, and Tayappa is compelled to act like a girl because he has blood in his urine. Th', 'Drama', 'Romance', 'Social Realism', 'Musical', 'Marathi', 'https://youtu.be/0lsPUiawM6U?si=SIFezIVp4q0mC9ud', 'https://youtu.be/0lsPUiawM6U?si=pg_zrTW96juDqn0e', 'Screenshot 2025-11-02 181736.png', 'Jogwa_s1.png', 'Screenshot 2025-11-02 181528.png', 'Screenshot 2025-11-02 181528.png'),
(17, 'Screenshot 2025-11-02 183731.png', 'Deool_Band.jpeg', 'Deool Band', 'Dr. Raghav Shastri (Gashmeer Mahajani), Indian by origin, is NASA\'s youngest scientist. He returns to his motherland, only to find out that his country is full of God worshippers. However, Raghav is not one of them. He has been specially invited by the PM to work on a radio frequency project, which will strengthen the coastal security of ', 'Drama', 'Devotional', 'Fantasy', 'Thriller ', 'Marathi', 'https://youtu.be/0WST5mM-ug4?si=-g76QsHL6m4cGFSU', 'https://youtu.be/zsQmvJmM5ZA?si=_4129EZ3ejtFYQan', 'Screenshot 2025-11-02 183803.png', 'Screenshot 2025-11-02 183731.png', 'Screenshot 2025-11-02 183748.png', 'Screenshot 2025-11-02 183821.png');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `plan_type` varchar(50) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `screenshot` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `plan_type`, `transaction_id`, `screenshot`, `created_at`) VALUES
(11, 3, 'Paid', 'saasdsd', '1760286281_fantastic_4.webp', '2025-10-12 21:54:41'),
(12, 4, 'Paid', 'fdsfds', '1760323213_DJ_s3.webp', '2025-10-13 08:10:13'),
(36, 6, 'Paid', '12345678901', '1762277320_Screenshot 2025-05-13 135209.png', '2025-11-04 22:58:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `account_type` text NOT NULL DEFAULT 'free',
  `subscription_start` datetime DEFAULT NULL,
  `subscription_end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `account_type`, `subscription_start`, `subscription_end`) VALUES
(4, 'Rushikesh Dase', 'rdase@gmail.com', '12345678', 'Paid', '2025-11-04 14:09:42', '2025-12-04 14:09:42'),
(6, 'Shivam Dharmale', 'sd@gmail.com', '12345678', 'Paid', '2025-11-04 18:28:40', '2025-12-04 18:28:40');

-- --------------------------------------------------------

--
-- Table structure for table `wish`
--

CREATE TABLE `wish` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wish`
--

INSERT INTO `wish` (`id`, `user_id`, `movie_id`) VALUES
(1, 3, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wish`
--
ALTER TABLE `wish`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wish`
--
ALTER TABLE `wish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
