-- phpMyAdmin SQL Dump
-- version 4.0.10.20
-- https://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2022-08-23 16:33:59
-- 服务器版本: 5.6.50-log
-- PHP 版本: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `jzapp_qingyunjia`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text,
  `nickname` text,
  `password` text NOT NULL,
  `email` text,
  `description` text,
  `state` int(11) DEFAULT '1',
  `CreatTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `username`, `nickname`, `password`, `email`, `description`, `state`, `CreatTime`) VALUES
(1, 'admin', '超级管理员', '123456', '123456@qq.com', '拥有所有权限', 1, '2022-04-16 21:28:07');

-- --------------------------------------------------------

--
-- 表的结构 `jz_record`
--

CREATE TABLE IF NOT EXISTS `jz_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(100) NOT NULL,
  `username` text,
  `title` text NOT NULL,
  `time` date NOT NULL,
  `account` text NOT NULL,
  `type` int(1) NOT NULL COMMENT '1是支出，2是收入',
  `icon` text NOT NULL COMMENT '图标',
  `remarks` text NOT NULL COMMENT '备注',
  `money` int(11) NOT NULL,
  `CreatTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

-- --------------------------------------------------------

--
-- 表的结构 `jz_user`
--

CREATE TABLE IF NOT EXISTS `jz_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(100) NOT NULL,
  `username` text,
  `password` text NOT NULL,
  `email` text,
  `mobile` text NOT NULL,
  `state` int(11) DEFAULT '1',
  `CreatTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
