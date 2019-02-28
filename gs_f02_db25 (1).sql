-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 2019 年 2 月 27 日 13:17
-- サーバのバージョン： 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gs_f02_db25`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table`
--

CREATE TABLE `gs_bm_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `indate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `name`, `url`, `comment`, `indate`) VALUES
(12, '２回目のキャンプ', 'https', '２回目らしいおもしろ荘。', '2019-02-26'),
(13, 'オートキャンプ場', 'https', 'ぴぽぽぽぽ', '2019-02-26'),
(14, '３回目のキャンプ', 'amazon.jp', 'おもろー', '2019-02-27'),
(15, '辞典', 'あまぞん', 'おもしろい', '2019-02-27');

-- --------------------------------------------------------

--
-- テーブルの構造 `jumanji_table`
--

CREATE TABLE `jumanji_table` (
  `id` int(12) NOT NULL,
  `country` int(11) NOT NULL,
  `question` text COLLATE utf8_unicode_ci NOT NULL,
  `answer1` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `answer2` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `jumanji_table`
--

INSERT INTO `jumanji_table` (`id`, `country`, `question`, `answer1`, `answer2`, `indate`) VALUES
(11, 1, '主食は？米である！', '◯', '×', '2019-02-11 13:45:13'),
(12, 1, '人口は２億万にである！', NULL, NULL, '2019-02-11 14:24:01'),
(13, 3, 'カナダの国旗の葉っぱはカエデである', NULL, NULL, '2019-02-11 14:24:27'),
(14, 4, '大統領はトランプである', NULL, NULL, '2019-02-11 14:25:00'),
(15, 5, '今冬である', NULL, NULL, '2019-02-11 14:25:15'),
(16, 6, 'インドネシアは飛行機で行かなければならない', NULL, NULL, '2019-02-11 14:25:50'),
(17, 7, 'ワインが豊富である', NULL, NULL, '2019-02-11 14:26:01'),
(18, 8, '首都はキャンベラである', NULL, NULL, '2019-02-11 14:26:24'),
(19, 9, 'あまり知られていない国である', NULL, NULL, '2019-02-11 14:26:47'),
(20, 10, '休み明けである', NULL, NULL, '2019-02-11 14:27:10'),
(21, 2, '人口は２億万にである！', NULL, NULL, '2019-02-11 15:12:02'),
(22, 13, '民主主義国家である', NULL, NULL, '2019-02-12 18:30:08'),
(24, 2, '人口は２億万にである！', NULL, NULL, '2019-02-16 14:34:28');

-- --------------------------------------------------------

--
-- テーブルの構造 `php_02table`
--

CREATE TABLE `php_02table` (
  `id` int(12) NOT NULL,
  `task` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `deadline` date NOT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `php_02table`
--

INSERT INTO `php_02table` (`id`, `task`, `deadline`, `comment`, `indate`) VALUES
(2, '課題', '2019-02-27', 'むずかしい', '2019-02-26 19:32:29'),
(3, 'php08', '2019-02-28', '大変でした', '2019-02-26 19:33:00');

-- --------------------------------------------------------

--
-- テーブルの構造 `user_table`
--

CREATE TABLE `user_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lid` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `kanri_flg` int(1) DEFAULT NULL,
  `life_flg` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `user_table`
--

INSERT INTO `user_table` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(17, 'かに', 'かに', '1234', 0, 0),
(18, 'きききりん', 'kiki', 'kirin', 1, 0),
(19, 'gs', 'gs', 'gs', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jumanji_table`
--
ALTER TABLE `jumanji_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `php_02table`
--
ALTER TABLE `php_02table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `jumanji_table`
--
ALTER TABLE `jumanji_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `php_02table`
--
ALTER TABLE `php_02table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
