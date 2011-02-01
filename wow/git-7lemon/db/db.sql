-- phpMyAdmin SQL Dump
-- version 3.3.2deb1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2011 年 01 月 30 日 19:02
-- 服务器版本: 5.1.41
-- PHP 版本: 5.3.2-1ubuntu4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `web_test`
--

-- --------------------------------------------------------

--
-- 表的结构 `boss_sheet`
--

CREATE TABLE IF NOT EXISTS `boss_sheet` (
  `boss_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `underground_id` int(10) unsigned NOT NULL,
  `boss_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `boss_power` int(10) unsigned NOT NULL,
  PRIMARY KEY (`boss_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `boss_sheet`
--

INSERT INTO `boss_sheet` (`boss_id`, `underground_id`, `boss_name`, `boss_power`) VALUES
(1, 3, '阵营冠军', 4000),
(2, 3, '忏悔者', 6000),
(3, 3, '黑骑士', 8000),
(4, 1, '塑血者沙尔拉姆', 3212),
(5, 1, '时光领主埃博克', 3212),
(6, 1, '永恒腐蚀者', 3179),
(7, 1, '玛尔加尼斯', 3055),
(8, 1, '肉钩', 3212);

-- --------------------------------------------------------

--
-- 表的结构 `equipment_sheet`
--

CREATE TABLE IF NOT EXISTS `equipment_sheet` (
  `equipment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` int(10) unsigned NOT NULL,
  `power` int(10) unsigned NOT NULL,
  `equipment_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`equipment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- 转存表中的数据 `equipment_sheet`
--

INSERT INTO `equipment_sheet` (`equipment_id`, `type`, `power`, `equipment_name`) VALUES
(1, 0, 0, '征服纹章'),
(2, 0, 0, '岩石守卫者的碎片'),
(3, 1, 300, '憎恶肩甲'),
(4, 1, 220, '魔毒手套'),
(5, 1, 250, '沙尔拉姆之书'),
(6, 1, 200, '图萨丁束腰'),
(7, 1, 350, '命令之流线披风'),
(8, 1, 150, '尖刺金属腰带'),
(9, 1, 500, '贪婪'),
(10, 1, 430, '狡诈指环'),
(11, 1, 100, '青铜幼龙的缰绳'),
(12, 1, 460, '憔悴门徒护腿'),
(13, 1, 500, '炽焰升腾腰带'),
(14, 1, 480, '圣洁徽记'),
(15, 1, 560, '深渊符文'),
(16, 1, 600, '和平守护者之刃'),
(17, 1, 600, '灵魂短刀'),
(18, 1, 500, '大漩涡之怒');

-- --------------------------------------------------------

--
-- 表的结构 `eq_relate`
--

CREATE TABLE IF NOT EXISTS `eq_relate` (
  `boss_id` int(11) NOT NULL,
  `equipment_id` int(11) NOT NULL,
  `rate1` float unsigned NOT NULL,
  `rate2` float unsigned NOT NULL,
  PRIMARY KEY (`boss_id`,`equipment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `eq_relate`
--

INSERT INTO `eq_relate` (`boss_id`, `equipment_id`, `rate1`, `rate2`) VALUES
(8, 1, 0, 0.5),
(8, 2, 0.5, 0.7),
(8, 3, 0.7, 0.9),
(8, 4, 0.9, 1),
(4, 1, 0, 0.5),
(4, 2, 0.5, 0.7),
(4, 5, 0.7, 0.8),
(4, 6, 0.8, 1),
(5, 7, 0.8, 0.85),
(5, 8, 0.85, 1),
(5, 1, 0, 0.5),
(5, 2, 0.5, 0.8),
(7, 1, 0, 0.5),
(7, 2, 0.5, 0.75),
(7, 9, 0.75, 0.8),
(7, 10, 0.8, 1),
(6, 1, 0, 0.5),
(6, 2, 0.5, 0.9),
(6, 11, 0.9, 1),
(1, 1, 0, 0.5),
(1, 2, 0.5, 0.7),
(1, 12, 0.7, 0.8),
(1, 13, 0.8, 1),
(2, 1, 0, 0.6),
(2, 2, 0.6, 0.8),
(2, 13, 0.8, 0.9),
(2, 14, 0.9, 1),
(3, 1, 0, 0.5),
(3, 2, 0.5, 0.7),
(3, 16, 0.7, 1),
(3, 17, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `underground_sheet`
--

CREATE TABLE IF NOT EXISTS `underground_sheet` (
  `underground_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `mode` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`underground_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `underground_sheet`
--

INSERT INTO `underground_sheet` (`underground_id`, `name`, `mode`, `description`) VALUES
(1, '净化斯坦索姆', 1, '等级: 78 - 80\r\n阵营: 双方'),
(3, '冠军的试炼', 2, '等级: 80 - 80\r\n阵营: 双方');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `user_power` int(11) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`userid`, `username`, `name`, `password`, `email`, `user_power`) VALUES
(1, 'abc', '溪风小流氓', 'a9993e364706816aba3e25717850c26c9cd0d89d', 'abc@gmail.com', 2000);
