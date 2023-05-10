-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-05-10 12:10:05
-- 伺服器版本： 10.4.27-MariaDB
-- PHP 版本： 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `car_marketing_company`
--

-- --------------------------------------------------------

--
-- 資料表結構 `customer`
--

CREATE TABLE `customer` (
  `id` smallint(6) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `sex_id` tinyint(1) NOT NULL,
  `birth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`, `sex_id`, `birth`) VALUES
(1, 'Alice', 'No. 8, Section 5, Xinyi Road, Xinyi District, Taipei City, Taiwan.                                                            ', 1, '2004-05-19'),
(2, 'Bob', 'No. 221, Sec 2, Zhishan Rd, Shilin District, Taipei City, Taiwan', 0, '1994-09-05'),
(3, 'John', 'No. 21, Zhongshan South Road, Zhongzheng District, Taipei City, Taiwan                    ', 0, '1987-02-19'),
(4, 'Mary', 'No. 211, Guangzhou Street, Wanhua District, Taipei City, Taiwan', 1, '1985-06-18'),
(5, 'Leo', 'No. 505, Section 4, Ren\'ai Road, Xinyi District, Taipei City, Taiwan', 0, '2007-05-10'),
(6, 'Andy', 'taipei city 12 street', 0, '2023-05-03'),
(7, 'Shelly', 'taipei city 12 street, apple Road, 12 F', 1, '1999-07-26'),
(8, 'Ben', 'Taipei City, Banana Street, NO.1 Road, 3F', 1, '1988-03-23'),
(9, 'Harry', 'New Taipei City, 123 street, No.2, 4F', 0, '2023-05-04'),
(11, 'Lily', 'asdfas oasjodf asdiofjoa', 1, '2023-05-18'),
(12, 'Jacob', '123city, 456 road, 789 area', 0, '2023-05-02'),
(14, 'Lucy', '123 City, 456 Road, 789 st.', 1, '2023-05-15');

-- --------------------------------------------------------

--
-- 資料表結構 `department`
--

CREATE TABLE `department` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `department`
--

INSERT INTO `department` (`id`, `name`) VALUES
(1, 'Sales'),
(2, 'Marketing'),
(3, 'Finance'),
(4, 'HR'),
(5, 'Design'),
(6, 'Administration');

-- --------------------------------------------------------

--
-- 資料表結構 `employee`
--

CREATE TABLE `employee` (
  `id` smallint(6) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dept_id` tinyint(4) NOT NULL,
  `salary` int(11) NOT NULL,
  `birth` date NOT NULL,
  `sex_id` tinyint(1) NOT NULL,
  `position_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `employee`
--

INSERT INTO `employee` (`id`, `name`, `dept_id`, `salary`, `birth`, `sex_id`, `position_id`) VALUES
(1, 'John Smith', 1, 3800, '1989-06-19', 0, 5),
(2, 'Emily Johnson', 2, 2500, '1990-09-03', 1, 3),
(3, 'Michael Davis', 3, 2800, '1988-04-10', 0, 4),
(4, 'Sarah Tompson', 4, 6000, '1992-01-25', 1, 1),
(5, 'David Lee', 1, 4000, '2003-05-10', 0, 3),
(6, 'Jessica Chen', 5, 4800, '1991-10-07', 1, 4);

-- --------------------------------------------------------

--
-- 資料表結構 `position`
--

CREATE TABLE `position` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `position`
--

INSERT INTO `position` (`id`, `name`) VALUES
(1, 'Manager'),
(2, 'Supervisor'),
(3, 'Staff'),
(4, 'Assistant'),
(5, 'Representative');

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `inventory` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `inventory`) VALUES
(1, 'Escape', 23940, 11),
(2, 'CR-V', 24250, 17),
(3, 'RAV4', 24660, 22),
(4, 'Rogue', 24800, 24),
(5, 'Equinox', 23580, 34),
(6, 'Wrangler', 27495, 45);

-- --------------------------------------------------------

--
-- 資料表結構 `sales_order`
--

CREATE TABLE `sales_order` (
  `id` mediumint(9) NOT NULL,
  `product_id` tinyint(4) NOT NULL,
  `buyer_id` mediumint(9) NOT NULL,
  `salesperson_id` smallint(6) NOT NULL,
  `amount` tinyint(4) NOT NULL,
  `sales_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `sales_order`
--

INSERT INTO `sales_order` (`id`, `product_id`, `buyer_id`, `salesperson_id`, `amount`, `sales_date`) VALUES
(4, 5, 3, 1, 2, '2023-04-05'),
(5, 3, 2, 2, 1, '2023-03-21');

-- --------------------------------------------------------

--
-- 資料表結構 `sex`
--

CREATE TABLE `sex` (
  `id` tinyint(1) NOT NULL,
  `type` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `sex`
--

INSERT INTO `sex` (`id`, `type`) VALUES
(0, 'male'),
(1, 'female');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `sex`
--
ALTER TABLE `sex`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `customer`
--
ALTER TABLE `customer`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `department`
--
ALTER TABLE `department`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `employee`
--
ALTER TABLE `employee`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `position`
--
ALTER TABLE `position`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product`
--
ALTER TABLE `product`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
