-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 01 月 27 日 04:48
-- 服务器版本: 5.5.20
-- PHP 版本: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `idaydaybuy`
--

-- --------------------------------------------------------

--
-- 表的结构 `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL DEFAULT '0' COMMENT '用户',
  `pw` varchar(50) NOT NULL DEFAULT '0' COMMENT '密码',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='登陆用户' AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `login`
--

INSERT INTO `login` (`id`, `user`, `pw`) VALUES
(5, 'qaz', 'acef344ac0d691ff41bba93ac4369193');

-- --------------------------------------------------------

--
-- 表的结构 `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL DEFAULT '0' COMMENT '标题',
  `price` decimal(10,2) NOT NULL COMMENT '价格',
  `store` varchar(200) NOT NULL DEFAULT '0' COMMENT '商家',
  `img` text NOT NULL COMMENT '图片',
  `links` text NOT NULL COMMENT '链接',
  `content` text NOT NULL COMMENT '内容',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`),
  KEY `title` (`title`),
  KEY `price` (`price`),
  KEY `store` (`store`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='商品信息' AUTO_INCREMENT=34 ;

--
-- 转存表中的数据 `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `store`, `img`, `links`, `content`, `sort`) VALUES
(25, '33333333333333333333', '3333333.00', '333333', 'img/20150126035410_2015.jpg', '333', '33', 3),
(24, '11111111111111111111', '5.00', '55', 'img/20150113054427_20150112023955_未标题-2.png', '884', '555', 1),
(26, '444444444444444444444444444444', '444.00', '4444', 'img/20150126035410_2015.jpg', '444', '444', 4),
(27, '5555555555555555555555555', '555.00', '55', 'img/20150126035410_2015.jpg', '55', '55', 5),
(28, '6666666666666666666', '66.00', '6', 'img/20150126035410_2015.jpg', '6', '666', 6),
(29, '777777777777777777777777777', '77.00', '7', 'img/20150126035410_2015.jpg', '7', '77', 7),
(30, '8888888888888888888', '888.00', '88', 'img/20150126035410_2015.jpg', '88', '88', 8),
(23, '2222222222222222222222', '5.00', '55', 'img/20150113054440_20150113023242_20150112023627_未标题-2.png', '88', '555', 2),
(31, '9999999999999999999', '99.00', '9', 'img/20150126035410_2015.jpg', '9', '99', 9),
(32, '1010101010101010101011', '10.00', '12341234', 'img/20150126064730_OA_new_year.jpg', '213412', 'rqwerqwr', 10),
(33, '11 11 11 1111111111111111111111', '11.00', '11111', 'img/20150126064919_羊年2015.jpg', '11', '11', 11);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
