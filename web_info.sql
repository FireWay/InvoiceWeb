-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主机： 120.79.248.172
-- 生成日期： 2019-01-01 17:46:09
-- 服务器版本： 5.5.60-MariaDB
-- PHP 版本： 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `web_info`
--

-- --------------------------------------------------------

--
-- 表的结构 `InvoiceCreateInfo`
--

CREATE TABLE `InvoiceCreateInfo` (
  `UserId` varchar(40) NOT NULL,
  `InvoiceNum` int(8) NOT NULL,
  `InvoiceCreateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `InvoiceCreateInfo`
--

INSERT INTO `InvoiceCreateInfo` (`UserId`, `InvoiceNum`, `InvoiceCreateTime`) VALUES
('12345', 0, '2019-01-01 09:56:41'),
('123456', 2341, '2018-12-31 06:56:47'),
('1234', 2342, '2019-01-01 17:39:10'),
('12345', 2342, '2018-12-31 05:08:54'),
('123456', 2342, '2018-12-31 05:39:05'),
('123456', 23421, '2019-01-01 17:28:57');

-- --------------------------------------------------------

--
-- 表的结构 `InvoiceInfo`
--

CREATE TABLE `InvoiceInfo` (
  `InvoiceNum` int(8) NOT NULL,
  `PurchaserName` varchar(60) NOT NULL,
  `SellerName` varchar(60) NOT NULL,
  `AmountInFiguers` varchar(10) NOT NULL,
  `InvoiceDate` varchar(18) NOT NULL,
  `InvoiceCode` int(10) NOT NULL,
  `UserId` varchar(40) NOT NULL DEFAULT '',
  `SellerRegisterNum` varchar(20) DEFAULT NULL,
  `SellerAddress` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `InvoiceInfo`
--

INSERT INTO `InvoiceInfo` (`InvoiceNum`, `PurchaserName`, `SellerName`, `AmountInFiguers`, `InvoiceDate`, `InvoiceCode`, `UserId`, `SellerRegisterNum`, `SellerAddress`) VALUES
(888888, '456', '789', '250', '', 0, '12345', '', ''),
(888888, '456', '789', '', '', 0, '123456', '', ''),
(25000518, 'shu', 'fgo', '518', '15-4-1', 1452365785, '123456', '11545084', ''),
(25010518, 'shu', 'fgo', '518', '15-4-1', 1452365785, '12345', '11545084', '');

-- --------------------------------------------------------

--
-- 表的结构 `UserInfo`
--

CREATE TABLE `UserInfo` (
  `UserId` varchar(40) NOT NULL,
  `UserName` varchar(40) NOT NULL,
  `UserPasswd` varchar(20) NOT NULL,
  `UserEmail` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `UserInfo`
--

INSERT INTO `UserInfo` (`UserId`, `UserName`, `UserPasswd`, `UserEmail`) VALUES
('1234', 'zhou', '1234', 'zhou@123.com'),
('fuchuanrui', 'fuchuanrui2', '123456', '666@qq.com');

-- --------------------------------------------------------

--
-- 表的结构 `UserLoginInfo`
--

CREATE TABLE `UserLoginInfo` (
  `UserId` varchar(40) NOT NULL,
  `UserPicPath` varchar(40) NOT NULL,
  `UserNotes` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `UserLoginInfo`
--

INSERT INTO `UserLoginInfo` (`UserId`, `UserPicPath`, `UserNotes`) VALUES
('1234', './img/login.ico', '4814');

--
-- 转储表的索引
--

--
-- 表的索引 `InvoiceCreateInfo`
--
ALTER TABLE `InvoiceCreateInfo`
  ADD PRIMARY KEY (`InvoiceNum`,`UserId`) USING BTREE;

--
-- 表的索引 `InvoiceInfo`
--
ALTER TABLE `InvoiceInfo`
  ADD PRIMARY KEY (`InvoiceNum`,`UserId`) USING BTREE;

--
-- 表的索引 `UserInfo`
--
ALTER TABLE `UserInfo`
  ADD PRIMARY KEY (`UserId`);

--
-- 表的索引 `UserLoginInfo`
--
ALTER TABLE `UserLoginInfo`
  ADD PRIMARY KEY (`UserId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
