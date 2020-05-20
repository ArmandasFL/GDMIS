-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2020 m. Geg 20 d. 04:57
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gdmismain`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `NAME`, `created_at`) VALUES
(8, 2, 'abu', '2020-05-19 13:40:42'),
(9, 2, 'hi', '2020-05-19 13:42:26'),
(10, 3, 'name2', '2020-05-19 15:29:21'),
(11, 2, 'hihi', '2020-05-20 02:16:12');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `NAME`, `email`, `body`, `created_at`) VALUES
(1, 5, 'fasfa', 'qfaw@gmail.com', 'agagasgagasgasgasga', '2020-05-19 12:46:58'),
(2, 6, 'safdas', 'asf@gmail.com', 'gagasg', '2020-05-19 12:55:10'),
(3, 6, 'hi', 'hi@gmail.com', 'sheshsrhhsshshh', '2020-05-19 13:05:03'),
(4, 8, 'hi', 'hi@gmail.com', 'sveiki', '2020-05-19 13:20:33'),
(5, 9, 'asfaf', 'fasfas@gmail.com', 'kas cia?', '2020-05-19 13:27:40'),
(6, 9, 'ahu', 'nezinomas@gmail.com', 'sveiki', '2020-05-19 13:32:46'),
(7, 9, 'saf', 'asf', 'asf', '2020-05-19 13:35:43'),
(8, 9, 'af', 'asf', 'hs', '2020-05-19 13:35:49'),
(9, 9, 'as', 'as', 'as', '2020-05-19 13:35:55'),
(10, 9, 'as', 'as', 'as', '2020-05-19 13:35:59'),
(11, 6, 'sdf', 'fs', 'sdf', '2020-05-19 13:55:19'),
(12, 6, 'as', 'as', 'as', '2020-05-19 13:55:27');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `user_id`, `title`, `slug`, `body`, `post_image`, `created_at`) VALUES
(1, 0, 0, 'Post One', 'post-one', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In finibus massa eu magna vulputate, suscipit mollis velit lobortis. Quisque velit eros, vehicula eget turpis in, vulputate sollicitudin mi. Praesent volutpat, ex at tempor aliquam, massa nisl faucibus dolor, a luctus ipsum lectus a nisl. Nulla tincidunt hendrerit lorem quis posuere. Integer sem quam, sodales eu velit in, tempus laoreet arcu. Etiam orci mi, consequat sed elementum at, cursus eu turpis. Sed vehicula porta nulla. In sit amet maximus risus. Etiam at arcu est. Aliquam diam eros, placerat eget tortor in, molestie pharetra eros. Nullam eu gravida sapien, ut faucibus nunc. Proin eget velit sodales, tincidunt quam et, porttitor velit.', '', '2020-05-19 12:06:49'),
(2, 0, 0, 'Post Two', 'post-two', 'Curabitur ut sodales velit. Nam imperdiet ex vel risus pretium, ac scelerisque dolor consectetur. Pellentesque at tortor neque. Quisque et orci finibus quam tempor efficitur. Nunc fermentum felis vitae enim elementum, in mollis arcu vulputate. Nunc vel nisi euismod, sollicitudin diam in, finibus ex. Nullam vitae facilisis dolor. Nullam volutpat, tellus sed lobortis lacinia, augue ipsum fermentum dui, vel sollicitudin massa lorem nec leo.\r\n\r\nInteger vulputate, dolor sit amet lacinia feugiat, magna mauris blandit mauris, non vehicula elit arcu in est. Aenean non urna ut tortor dictum auctor eget a nulla. Ut vulputate ex in interdum euismod. Vestibulum pellentesque dignissim sem, quis molestie massa iaculis id. Pellentesque placerat, orci ac auctor luctus, ex enim blandit risus, ut fermentum libero metus at justo. Aliquam cursus mauris ac purus efficitur tristique. Nullam sed odio et sapien sollicitudin eleifend. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum porttitor fringilla tortor, sit amet pharetra quam condimentum sed. Nam aliquet convallis quam sit amet consectetur.\r\n\r\nInteger finibus porta feugiat. Cras convallis sem eget nisl feugiat, egestas congue orci gravida. Nunc ornare sed velit non scelerisque. Aliquam erat volutpat. Nullam laoreet commodo nisl sit amet tempus. Nulla eget convallis libero. Aliquam vel malesuada leo, vitae tincidunt eros. Donec a consectetur nisi. Suspendisse ac metus placerat lacus ullamcorper gravida vel eu tortor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Ut mollis in dolor egestas faucibus. Nulla nulla erat, laoreet ut dignissim nec, venenatis id lacus. Vestibulum vel arcu elit. Praesent a sagittis enim. Aliquam scelerisque leo non urna ornare, et sodales libero lacinia. Donec nec dolor sed libero elementum mattis vel sed erat.', '', '2020-05-19 12:06:49'),
(3, 0, 0, 'Post One', 'post-one', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In finibus massa eu magna vulputate, suscipit mollis velit lobortis. Quisque velit eros, vehicula eget turpis in, vulputate sollicitudin mi. Praesent volutpat, ex at tempor aliquam, massa nisl faucibus dolor, a luctus ipsum lectus a nisl. Nulla tincidunt hendrerit lorem quis posuere. Integer sem quam, sodales eu velit in, tempus laoreet arcu. Etiam orci mi, consequat sed elementum at, cursus eu turpis. Sed vehicula porta nulla. In sit amet maximus risus. Etiam at arcu est. Aliquam diam eros, placerat eget tortor in, molestie pharetra eros. Nullam eu gravida sapien, ut faucibus nunc. Proin eget velit sodales, tincidunt quam et, porttitor velit.', '', '2020-05-19 12:08:13'),
(4, 0, 0, 'Post Two', 'post-two', 'Curabitur ut sodales velit. Nam imperdiet ex vel risus pretium, ac scelerisque dolor consectetur. Pellentesque at tortor neque. Quisque et orci finibus quam tempor efficitur. Nunc fermentum felis vitae enim elementum, in mollis arcu vulputate. Nunc vel nisi euismod, sollicitudin diam in, finibus ex. Nullam vitae facilisis dolor. Nullam volutpat, tellus sed lobortis lacinia, augue ipsum fermentum dui, vel sollicitudin massa lorem nec leo.\r\n\r\nInteger vulputate, dolor sit amet lacinia feugiat, magna mauris blandit mauris, non vehicula elit arcu in est. Aenean non urna ut tortor dictum auctor eget a nulla. Ut vulputate ex in interdum euismod. Vestibulum pellentesque dignissim sem, quis molestie massa iaculis id. Pellentesque placerat, orci ac auctor luctus, ex enim blandit risus, ut fermentum libero metus at justo. Aliquam cursus mauris ac purus efficitur tristique. Nullam sed odio et sapien sollicitudin eleifend. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum porttitor fringilla tortor, sit amet pharetra quam condimentum sed. Nam aliquet convallis quam sit amet consectetur.\r\n\r\nInteger finibus porta feugiat. Cras convallis sem eget nisl feugiat, egestas congue orci gravida. Nunc ornare sed velit non scelerisque. Aliquam erat volutpat. Nullam laoreet commodo nisl sit amet tempus. Nulla eget convallis libero. Aliquam vel malesuada leo, vitae tincidunt eros. Donec a consectetur nisi. Suspendisse ac metus placerat lacus ullamcorper gravida vel eu tortor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Ut mollis in dolor egestas faucibus. Nulla nulla erat, laoreet ut dignissim nec, venenatis id lacus. Vestibulum vel arcu elit. Praesent a sagittis enim. Aliquam scelerisque leo non urna ornare, et sodales libero lacinia. Donec nec dolor sed libero elementum mattis vel sed erat.', '', '2020-05-19 12:08:13'),
(6, 8, 2, 'hi', 'hi', '<p>agasg</p>\r\n', 'aa55583049ed97ca22fa142d838be2208517597b1b6b79a9a80eefce31d49ddd.jpg', '2020-05-19 12:48:47'),
(7, 1, 2, 'dsghsdhs', 'dsghsdhs', '<p>dbhsdhsh</p>\r\n', '2454e7173426ee6f92217844c0736ad319aa97965da2178e8c52f6a1a9b4fd0c.jpg', '2020-05-19 12:55:36'),
(9, 1, 2, 'halu', 'halu', '<p>cia aprasyta mano nuotrauka</p>\r\n', 'black_hole_on_earth-wallpaper-1920x1080.jpg', '2020-05-19 13:25:55'),
(10, 8, 2, 'hi', 'hi', '<p>fasa</p>\r\n', '2454e7173426ee6f92217844c0736ad319aa97965da2178e8c52f6a1a9b4fd0c.jpg', '2020-05-19 13:42:59'),
(11, 9, 2, 'wet', 'wet', '<p>wet</p>\r\n', 'black_hole_on_earth-wallpaper-1920x1080.jpg', '2020-05-19 14:38:49'),
(12, 9, 2, 'lkljl', 'lkljl', '<p>jkljk</p>\r\n', 'world_manipulation_by_pacolix-wallpaper-1920x1080.jpg', '2020-05-19 14:49:43'),
(13, 8, 3, 'dagagga', 'dagagga', '<p>dfhddh</p>\r\n', 'moscow_international_business_center_russia-wallpaper-1920x1080.jpg', '2020-05-19 15:29:35'),
(14, 10, 2, 'sdf', 'sdf', '<p>sdf</p>\r\n', 'bavarian_alps_mountains_lake_berchtesgaden_germany-wallpaper-1920x1080.jpg', '2020-05-19 19:45:06'),
(17, 8, 2, 'asfsa', 'asfsa', '<p>asfasf</p>\r\n', 'aa55583049ed97ca22fa142d838be2208517597b1b6b79a9a80eefce31d49ddd.jpg', '2020-05-20 01:10:23'),
(21, 9, 2, 'gasgasg', 'gasgasg', '<p>sagasgasga</p>\r\n', 'aa55583049ed97ca22fa142d838be2208517597b1b6b79a9a80eefce31d49ddd.jpg', '2020-05-20 01:48:07'),
(22, 9, 2, 'asfasf', 'asfasf', '<p>asfasfa</p>\r\n', 'black_hole_on_earth-wallpaper-1920x1080.jpg', '2020-05-20 01:48:19'),
(23, 8, 2, 'dasda', 'dasda', '<p>asdas</p>\r\n', 'world_manipulation_by_pacolix-wallpaper-1920x1080.jpg', '2020-05-20 02:16:06'),
(24, 10, 2, 'shdhsd', 'shdhsd', '<p>shdg</p>\r\n', 'bavarian_alps_mountains_lake_berchtesgaden_germany-wallpaper-1920x1080.jpg', '2020-05-20 02:16:26'),
(25, 8, 2, 'wetwetw', 'wetwetw', '<p>wetwt&nbsp;<a href=\"https://www.youtube.com/\">https://www.youtube.com/</a></p>\r\n', 'bavarian_alps_mountains_lake_berchtesgaden_germany-wallpaper-1920x1080.jpg', '2020-05-20 02:37:41');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `users`
--

INSERT INTO `users` (`id`, `NAME`, `zipcode`, `email`, `username`, `PASSWORD`, `register_date`) VALUES
(1, 'admin', '97513', 'pkmotedmoted12@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2020-05-17 14:23:40'),
(2, 'hi', '97135', 'hi@gmail.com', 'hi', '30c2138619045a1dd4b1f6cb888f0d67', '2020-05-19 12:41:13'),
(3, 'name2', '78945', 'name2@gmail.com', 'name2', '5f25b6a0b984f370afd14aebc3140226', '2020-05-19 15:29:06'),
(4, 'sfas', '97153', 'asfas@gmail.com', 'hdsggds', '7b064dad507c266a161ffc73c53dcdc5', '2020-05-19 16:01:52'),
(5, 'safaf', 'sagasgg', 'af@gmail.com', 'afgas', '202cb962ac59075b964b07152d234b70', '2020-05-19 19:44:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
