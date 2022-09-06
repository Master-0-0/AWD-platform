-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2022-09-06 13:42:53
-- 服务器版本： 5.7.26
-- PHP 版本： 5.6.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `awdadmin`
--

-- --------------------------------------------------------

--
-- 表的结构 `attack_user`
--

CREATE TABLE `attack_user` (
  `id` int(11) NOT NULL,
  `user` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `team` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pass` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `token` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `attack_user`
--

INSERT INTO `attack_user` (`id`, `user`, `score`, `team`, `pass`, `token`) VALUES
(1, 'attack1', 3000, '316实验室测试', '123456', 'tk_267do6zhbwo6r0s8s1jh'),
(2, 'attack2', 3000, '吊车尾', '123456', 'tk_4w5iazjqpesdpfb0oye5'),
(3, 'attack3', 3000, '大专狗', '123456', 'tk_0bmpk0d1hcp25ywap394');

-- --------------------------------------------------------

--
-- 表的结构 `flag`
--

CREATE TABLE `flag` (
  `id` int(11) NOT NULL,
  `team` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `flag` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `flag`
--

INSERT INTO `flag` (`id`, `team`, `flag`) VALUES
(1, '316实验室测试', 'flag{c1nf87d*jlx6kfsslm4z}');

-- --------------------------------------------------------

--
-- 表的结构 `log_flag`
--

CREATE TABLE `log_flag` (
  `id` int(11) NOT NULL,
  `flag` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attack_team` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `team` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `log_flag`
--

INSERT INTO `log_flag` (`id`, `flag`, `attack_team`, `team`) VALUES
(1, 'flag{ipa1989gbx8m2dlbwpbd}', '316实验室测试', '吊车尾'),
(2, 'flag{02ndo5x8q6n00choo19z}', '316实验室测试', '吊车尾'),
(3, 'flag{msvxhi*@xjq2y91pnie*}', '316实验室测试', '吊车尾');

--
-- 转储表的索引
--

--
-- 表的索引 `attack_user`
--
ALTER TABLE `attack_user`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `flag`
--
ALTER TABLE `flag`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `log_flag`
--
ALTER TABLE `log_flag`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `flag`
--
ALTER TABLE `flag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `log_flag`
--
ALTER TABLE `log_flag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
