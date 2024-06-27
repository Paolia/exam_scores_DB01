-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2024-06-27 15:05:58
-- サーバのバージョン： 10.4.32-MariaDB
-- PHP のバージョン: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_copout2`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_copout2_main`
--

CREATE TABLE `gs_copout2_main` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `grade` varchar(3) NOT NULL,
  `class` varchar(3) NOT NULL,
  `email` varchar(256) NOT NULL,
  `exam` varchar(15) NOT NULL,
  `japanese` int(3) NOT NULL,
  `math` int(3) NOT NULL,
  `science` int(3) NOT NULL,
  `social` int(3) NOT NULL,
  `english` int(3) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `gs_copout2_main`
--

INSERT INTO `gs_copout2_main` (`id`, `name`, `grade`, `class`, `email`, `exam`, `japanese`, `math`, `science`, `social`, `english`, `date_added`) VALUES
(2, '倉冨民夫', '２年', '１組', 'tamio.kuratomi@gmail.com', '1学期中間試験', 85, 80, 76, 92, 88, '2024-06-27 13:07:16'),
(3, '倉冨民夫', '１年', '３組', 'tamio.kuratomi@gmail', '２学期期末試験', 100, 98, 25, 89, 89, '2024-06-27 13:39:53'),
(4, '倉冨まりや', '１年', '５組', 'mishakuratomi@gmail.com', '１学期中間試験', 23, 34, 48, 26, 12, '2024-06-27 16:11:48'),
(5, '倉冨まりや', '１年', '５組', 'mishakuratomi@gmail.com', '１学期期末試験', 47, 52, 68, 49, 53, '2024-06-27 16:12:10'),
(6, '倉冨まりや', '１年', '５組', 'mishakuratomi@gmail.com', '２学期中間試験', 68, 72, 75, 87, 67, '2024-06-27 16:12:31'),
(7, '倉冨まりや', '１年', '５組', 'mishakuratomi@gmail.com', '２学期期末試験', 53, 62, 76, 68, 49, '2024-06-27 16:13:16'),
(8, '倉冨まりや', '１年', '５組', 'mishakuratomi@gmail.com', '３学期中間試験', 72, 61, 58, 65, 69, '2024-06-27 16:13:43'),
(9, '倉冨まりや', '１年', '５組', 'mishakuratomi@gmail.com', '３学期期末試験', 72, 78, 69, 73, 75, '2024-06-27 16:14:17'),
(10, '倉冨民夫', '１年', '３組', 'tamio.kuratomi@gmail', '１学期期末試験', 89, 78, 91, 86, 90, '2024-06-27 16:14:53'),
(11, '倉冨民夫', '１年', '３組', 'tamio.kuratomi@gmail', '２学期中間試験', 89, 87, 85, 76, 92, '2024-06-27 16:15:55'),
(12, '倉冨民夫', '１年', '３組', 'tamio.kuratomi@gmail', '１学期中間試験', 76, 82, 79, 81, 86, '2024-06-27 16:17:52'),
(13, '倉冨民夫', '１年', '３組', 'tamio.kuratomi@gmail', '３学期中間試験', 82, 83, 76, 81, 92, '2024-06-27 16:18:22'),
(14, '倉冨民夫', '１年', '３組', 'tamio.kuratomi@gmail', '３学期期末試験', 96, 89, 88, 92, 98, '2024-06-27 16:18:51'),
(15, '倉冨民夫', '２年', '１組', 'tamio.kuratomi@gmail', '１学期期末試験', 86, 73, 89, 93, 86, '2024-06-27 16:19:24'),
(16, '倉冨民夫', '２年', '１組', 'tamio.kuratomi@gmail', '２学期中間試験', 86, 83, 72, 98, 89, '2024-06-27 16:21:18'),
(17, '倉冨民夫', '２年', '１組', 'tamio.kuratomi@gmail', '２学期期末試験', 88, 76, 78, 86, 83, '2024-06-27 16:21:44'),
(18, '倉冨民夫', '２年', '１組', 'tamio.kuratomi@gmail', '３学期中間試験', 92, 76, 75, 83, 86, '2024-06-27 16:25:59'),
(19, '倉冨民夫', '２年', '１組', 'tamio.kuratomi@gmail', '３学期期末試験', 79, 68, 72, 81, 90, '2024-06-27 16:31:42'),
(20, '倉冨まりや', '２年', '６組', 'mishakuratomi@gmail.com', '１学期中間試験', 62, 58, 56, 67, 72, '2024-06-27 16:32:27'),
(21, '倉冨まりや', '２年', '６組', 'mishakuratomi@gmail.com', '１学期期末試験', 72, 75, 69, 72, 70, '2024-06-27 16:32:55'),
(22, '倉冨まりや', '２年', '６組', 'mishakuratomi@gmail.com', '２学期中間試験', 71, 73, 67, 78, 79, '2024-06-27 16:34:09'),
(23, '倉冨まりや', '２年', '６組', 'mishakuratomi@gmail.com', '２学期期末試験', 73, 69, 74, 82, 79, '2024-06-27 16:58:59'),
(24, '倉冨まりや', '２年', '６組', 'mishakuratomi@gmail.com', '３学期中間試験', 83, 81, 78, 82, 90, '2024-06-27 16:59:55'),
(25, '倉冨まりや', '３年', '３組', 'mishakuratomi@gmail.com', '１学期中間試験', 89, 78, 82, 91, 86, '2024-06-27 17:05:39'),
(26, '倉冨まりや', '３年', '３組', 'mishakuratomi@gmail.com', '１学期期末試験', 92, 86, 78, 91, 86, '2024-06-27 17:06:58'),
(27, '倉冨まりや', '３年', '３組', 'mishakuratomi@gmail.com', '２学期中間試験', 89, 78, 67, 82, 92, '2024-06-27 19:09:35'),
(28, '倉冨まりや', '３年', '３組', 'mishakuratomi@gmail.com', '２学期期末試験', 78, 82, 67, 85, 90, '2024-06-27 19:09:58'),
(29, '倉冨まりや', '３年', '３組', 'mishakuratomi@gmail.com', '３学期中間試験', 91, 78, 82, 67, 95, '2024-06-27 19:10:23'),
(30, '倉冨まりや', '３年', '３組', 'mishakuratomi@gmail.com', '３学期期末試験', 98, 87, 79, 88, 92, '2024-06-27 19:11:16'),
(31, '倉冨民夫', '３年', '８組', 'tamio.kuratomi@gmail', '１学期中間試験', 76, 62, 77, 81, 67, '2024-06-27 19:12:42'),
(32, '倉冨民夫', '３年', '８組', 'tamio.kuratomi@gmail', '１学期期末試験', 76, 67, 78, 85, 82, '2024-06-27 19:13:09'),
(33, '倉冨民夫', '３年', '８組', 'tamio.kuratomi@gmail', '２学期中間試験', 78, 69, 72, 82, 77, '2024-06-27 19:13:38'),
(34, '倉冨民夫', '３年', '８組', 'tamio.kuratomi@gmail', '２学期期末試験', 90, 81, 76, 67, 92, '2024-06-27 19:14:02'),
(35, '倉冨民夫', '３年', '８組', 'tamio.kuratomi@gmail', '３学期中間試験', 89, 91, 76, 87, 92, '2024-06-27 19:14:43'),
(36, '倉冨民夫', '３年', '８組', 'tamio.kuratomi@gmail', '３学期期末試験', 91, 87, 76, 83, 97, '2024-06-27 19:15:09');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_copout2_main`
--
ALTER TABLE `gs_copout2_main`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_copout2_main`
--
ALTER TABLE `gs_copout2_main`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
