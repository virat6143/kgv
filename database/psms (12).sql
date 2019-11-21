-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2019 at 08:10 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psms`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlog`
--

CREATE TABLE `adminlog` (
  `id` int(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) CHARACTER SET latin1 NOT NULL,
  `email` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adminlog`
--

INSERT INTO `adminlog` (`id`, `username`, `password`, `email`) VALUES
(1, 'વિરાટ ', '123456', 'virat@aau.in');

-- --------------------------------------------------------

--
-- Table structure for table `adversitment`
--

CREATE TABLE `adversitment` (
  `a_id` int(11) NOT NULL,
  `txtFDt` varchar(50) CHARACTER SET utf8 NOT NULL,
  `cashad` varchar(30) CHARACTER SET utf8 NOT NULL,
  `pname` varchar(100) CHARACTER SET utf8 NOT NULL,
  `adinfo` varchar(100) CHARACTER SET utf8 NOT NULL,
  `adprice` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adversitment`
--

INSERT INTO `adversitment` (`a_id`, `txtFDt`, `cashad`, `pname`, `adinfo`, `adprice`) VALUES
(22, '2019-10-24', '1', 'વિરાટ ', 'પોસ્ટર ૧૦૦૦', '7000');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `b_id` int(11) NOT NULL,
  `bname` varchar(255) NOT NULL,
  `bsr` varchar(100) NOT NULL,
  `bno` varchar(100) NOT NULL,
  `bbh` varchar(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `bstatus` varchar(20) NOT NULL,
  `printing` varchar(100) NOT NULL,
  `p_date` varchar(20) NOT NULL,
  `total_bookno` varchar(60) NOT NULL,
  `total_kharch` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`b_id`, `bname`, `bsr`, `bno`, `bbh`, `date`, `bstatus`, `printing`, `p_date`, `total_bookno`, `total_kharch`, `status`) VALUES
(47, 'સજીવ ખેતી ', '1', '100', '60', '24/10/2019', '1', 'Anand Agricultural Printing', '2019-10-24', '1000', '6600', 0);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `d_id` int(10) NOT NULL,
  `district_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`d_id`, `district_name`) VALUES
(1, 'અમદાવાદ'),
(2, 'અમરેલી'),
(3, 'આણંદ'),
(4, 'અરવલ્લી'),
(5, 'બનાસકાંઠા'),
(6, 'ભરૂચ'),
(7, 'ભાવનગર'),
(8, 'બોટાદ'),
(9, 'છોટાઉદેપુર'),
(10, 'દાહોદ'),
(11, 'ડાંગ'),
(12, 'દેવભૂમિ દ્વારકા'),
(13, 'ગાંધીનગર'),
(14, 'ગીર સોમનાથ'),
(15, 'જામનગર'),
(16, 'જુનાગઢ'),
(17, 'કચ્છ'),
(18, 'ખેડા'),
(19, 'મહીસાગર'),
(20, 'મહેસાણા'),
(21, 'મોરબી'),
(22, 'નર્મદા'),
(23, 'નવસારી'),
(24, 'પંચમહાલ'),
(25, 'પાટણ'),
(26, 'પોરબંદર'),
(27, 'રાજકોટ'),
(28, 'સાબરકાંઠા'),
(29, 'સુરત'),
(30, 'સુરેન્દ્રનગર'),
(31, 'તાપી'),
(32, 'વડોદરા'),
(33, 'વલસાડ');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `r_id` int(11) NOT NULL,
  `r_date` date NOT NULL,
  `memo_type` varchar(100) NOT NULL,
  `memo_no` varchar(100) NOT NULL,
  `cust_name` varchar(100) NOT NULL,
  `cust_village` varchar(30) NOT NULL,
  `cust_addr` varchar(255) NOT NULL,
  `cust_mob` varchar(10) NOT NULL,
  `total_amount` varchar(10) NOT NULL,
  `cust_dist` varchar(30) NOT NULL,
  `cust_tal` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`r_id`, `r_date`, `memo_type`, `memo_no`, `cust_name`, `cust_village`, `cust_addr`, `cust_mob`, `total_amount`, `cust_dist`, `cust_tal`) VALUES
(3, '2019-10-22', 'રોકડ', '1', 'રમન ', 'અમદાવાદ ', 'અમદાવાદ ', '8744555555', '430', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `receipt_details`
--

CREATE TABLE `receipt_details` (
  `rd_id` int(11) NOT NULL,
  `r_id` int(11) DEFAULT NULL,
  `b_id` int(11) DEFAULT NULL,
  `book_qut` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `sub_to` int(11) NOT NULL,
  `postal_charge` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `receipt_details`
--

INSERT INTO `receipt_details` (`rd_id`, `r_id`, `b_id`, `book_qut`, `price`, `sub_to`, `postal_charge`) VALUES
(5, 3, 45, '5', '60', 300, 0),
(6, 3, 46, '2', '60', 130, 10);

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE `subscriber` (
  `sub_id` int(11) NOT NULL,
  `sub_rec` varchar(100) NOT NULL,
  `sub_no` varchar(100) NOT NULL,
  `sub_name` varchar(100) NOT NULL,
  `sub_type` varchar(50) NOT NULL,
  `sub_start` varchar(50) CHARACTER SET latin1 NOT NULL,
  `sub_end` varchar(50) CHARACTER SET latin1 NOT NULL,
  `sub_addr` varchar(200) NOT NULL,
  `sub_mob` varchar(10) NOT NULL,
  `sub_district` varchar(50) NOT NULL,
  `sub_taluka` varchar(30) NOT NULL,
  `sub_village` varchar(50) NOT NULL,
  `sub_pincode` varchar(6) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `sdatee` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscriber`
--

INSERT INTO `subscriber` (`sub_id`, `sub_rec`, `sub_no`, `sub_name`, `sub_type`, `sub_start`, `sub_end`, `sub_addr`, `sub_mob`, `sub_district`, `sub_taluka`, `sub_village`, `sub_pincode`, `status`, `sdatee`) VALUES
(1, '1', '1234', 'વિરાટ ', '૧ વર્ષ', '2019/10', '2020/9', 'સાયરા ', '8141036462', '4', '29', 'સાયરા ', '383315', 0, '2019-10-24');

-- --------------------------------------------------------

--
-- Table structure for table `taluka`
--

CREATE TABLE `taluka` (
  `t_id` int(10) NOT NULL,
  `t_name` varchar(50) NOT NULL,
  `d_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taluka`
--

INSERT INTO `taluka` (`t_id`, `t_name`, `d_id`) VALUES
(1, ' અમદાવાદ શહેર તાલુકો', 1),
(2, 'દસ્ક્રોઇ', 1),
(3, 'દેત્રોજ-રામપુરા', 1),
(4, 'ધોલેરા', 1),
(5, 'ધોળકા', 1),
(6, 'ધંધુકા', 1),
(7, 'બાવળા', 1),
(8, 'માંડલ', 1),
(9, 'વિરમગામ', 1),
(10, 'સાણંદ', 1),
(11, 'અમરેલી', 2),
(12, 'રાજુલા', 2),
(13, 'બાબરા', 2),
(14, 'બગસરા', 2),
(15, 'ઘારી', 2),
(16, 'જાફરાબાદ', 2),
(17, 'ખાંભા', 2),
(18, 'કુંકાવાવ', 2),
(19, 'લાઠી', 2),
(20, 'લીલીયા', 2),
(21, 'આણંદ', 3),
(22, 'આંકલાવ', 3),
(23, 'ઉમરેઠ', 3),
(24, 'ખંભાત', 3),
(25, 'તારાપુર', 3),
(26, 'પેટલાદ', 3),
(27, 'બોરસદ', 3),
(28, 'સોજિત્રા', 3),
(29, 'મોડાસા તાલુકો', 4),
(30, 'માલપુર તાલુકો', 4),
(31, 'ધનસુરા તાલુકો', 4),
(32, 'ભિલોડા તાલુકો', 4),
(33, 'બાયડ તાલુકો', 4),
(34, 'મેઘરજ તાલુકો', 4),
(35, 'અમીરગઢ', 5),
(36, 'કાંકરેજ', 5),
(37, 'ડીસા', 5),
(38, 'થરાદ', 5),
(39, 'દાંતા', 5),
(40, 'દાંતીવાડા', 5),
(41, 'દિયોદર', 5),
(42, 'ધાનેરા', 5),
(43, 'પાલનપુર', 5),
(44, 'ભાભર', 5),
(45, 'વડગામ', 5),
(46, 'વાવ', 5),
(47, 'લાખણી', 5),
(48, 'સુઈગામ', 5),
(49, 'આમોદ', 6),
(50, 'અંકલેશ્વર', 6),
(51, 'ભરૂચ', 6),
(52, 'હાંસોટ', 6),
(53, 'જંબુસર', 6),
(54, 'ઝધડીયા', 6),
(55, 'વાગરા', 6),
(56, 'વાલીયા', 6),
(57, 'નેત્રંગ​', 6),
(58, 'ભાવનગર', 7),
(59, 'ધોધા', 7),
(60, 'વલ્લભીપુર', 7),
(61, 'શિહોર', 7),
(62, 'ઉમરાળા', 7),
(63, 'ગારિયાધાર', 7),
(64, 'પાલીતાણા', 7),
(65, 'મહૂવા', 7),
(66, 'તળાજા', 7),
(67, 'જેશર', 7),
(68, 'ગઢડા', 8),
(69, 'બરવાળા', 8),
(70, 'બોટાદ', 8),
(71, 'રાણપુર', 8),
(72, 'છોટાઉદેપુર', 9),
(73, 'પાવી જેતપુર​', 9),
(74, 'કવાંટ​', 9),
(75, 'નસવાડી', 9),
(76, 'સંખેડા', 9),
(77, 'બોડેલી', 9),
(78, 'દાહોદ', 10),
(79, 'ઝાલોદ', 10),
(80, 'ધાનપુર', 10),
(81, 'દેવગઢ બારીયા', 10),
(82, 'ગરબાડા', 10),
(83, 'લીમખેડા', 10),
(84, 'ફતેપુરા', 10),
(85, 'સંજેલી', 10),
(86, 'આહવા', 11),
(87, 'સુબીર', 11),
(88, 'વઘાઈ', 11),
(89, 'દ્વારકા', 12),
(90, 'ભાણવડ', 12),
(91, 'ક્લ્યણપુર', 12),
(92, 'ખંભાળિયા', 12),
(93, 'ગાંધીનગર', 13),
(94, 'દહેગામ', 13),
(95, 'માણસા', 13),
(96, 'કલોલ', 13),
(97, 'ગીર-ગઢડા', 14),
(98, 'ઉના', 14),
(99, 'કોડિનાર', 14),
(100, 'તલાલા', 14),
(101, 'વેરાવળ', 14),
(102, 'સુત્રાપાડા', 14),
(103, 'લાલપુર', 15),
(104, 'ધ્રોલ', 15),
(105, 'જામજોધપુર', 15),
(106, 'જામનગર', 15),
(107, 'જોડીયા', 15),
(108, 'કાલાવાડ', 15),
(109, 'જૂનાગઢ', 16),
(110, 'વિસાવદર', 16),
(111, 'ભેંસાણ', 16),
(112, 'મેંદરડા', 16),
(113, 'કેશોદ', 16),
(114, 'માંગરોળ', 16),
(115, 'માણાવદર', 16),
(116, 'વંથલી', 16),
(117, 'માળીયા હાટીના', 16),
(118, 'લખપત', 17),
(119, 'રાપર', 17),
(120, 'ભચાઉ', 17),
(121, 'ભુજ', 17),
(122, 'નખત્રાણા', 17),
(123, 'અબડાસા', 17),
(124, 'માંડવી', 17),
(125, 'અંજાર', 17),
(126, 'ગાંધીધામ', 17),
(127, 'મુન્‍દ્રા', 17),
(128, 'બાલાસિનોર ', 19),
(129, 'લુણાવાડા', 19),
(130, 'કડાણા', 19),
(131, 'વિરપુર ', 19),
(132, 'સંતરામપુર ', 19),
(133, 'ખાનપુર ', 19),
(134, ' ઊંઝા', 20),
(135, ' કડી', 20),
(136, 'ખેરાલુ', 20),
(137, 'બેચરાજી', 20),
(138, 'મહેસાણા', 20),
(139, 'વડનગર', 20),
(140, ' વિજાપુર', 20),
(141, ' વિસનગર', 20),
(142, 'સતલાસણા', 20),
(143, ' જોટાણા', 20),
(144, 'મોરબી', 21),
(145, 'ટંકારા', 21),
(146, 'વાંકાનેર', 21),
(147, 'હળવદ', 21),
(148, 'માળિયા (મિયાણા)', 21),
(149, 'નડીઆદ', 18),
(150, 'કપડવંજ', 18),
(151, 'કઠલાલ', 18),
(152, 'ખેડા', 18),
(153, 'મહુધા', 18),
(154, 'માતર', 18),
(155, 'મહેમદાવાદ', 18),
(156, 'ઠાસરા', 18),
(157, 'વસો', 18),
(158, 'ગલતેશ્વર', 18),
(159, 'ડેડીયાપાડા', 22),
(160, 'નાંદોદ', 22),
(161, 'સાગબારા', 22),
(162, 'તીલકવાડા', 22),
(163, 'ગરૂડેશ્વર', 22),
(164, 'પાટણ', 25),
(165, 'સિદ્ધપુર', 25),
(166, 'ચાણસ્મા', 25),
(167, 'હારીજ', 25),
(168, 'સમી', 25),
(169, 'રાધનપુર', 25),
(170, 'સાંતલપુર', 25),
(171, 'શંખેશ્વર', 25),
(172, 'સરસ્વતિ', 25),
(173, 'હિંમતનગર', 28),
(174, 'ખેડબ્રહમાં', 28),
(175, 'પ્રાંતિજ', 28),
(176, 'તલોદ', 28),
(177, 'ઇડર', 28),
(178, 'વડાલી', 28),
(179, 'વિજયનગર', 28),
(180, 'પોશીના', 28),
(181, 'વ્યારા', 31),
(182, 'સોનગઢ', 31),
(183, 'વાલોડ', 31),
(184, 'ઉચ્છલ', 31),
(185, 'નિઝર', 31),
(186, 'સોનગઢ', 31),
(187, 'ડોલવણ', 31),
(188, 'કુકરમુંડા', 31),
(189, 'નવસારી', 23),
(190, 'વાંસદા', 23),
(191, 'ચીખલી', 23),
(192, 'ગણદેવી', 23),
(193, 'જલાલપોર', 23),
(194, 'ખેરગામ', 23),
(195, 'ઘોઘંબા', 24),
(196, 'ગોધરા', 24),
(197, 'હાલોલ', 24),
(198, 'જાંબુધોડા', 24),
(199, 'કાલોલ', 24),
(200, 'મોરવા(હડફ)', 24),
(201, 'પોરબંદર', 26),
(202, 'કુતીયાણા', 26),
(203, 'રાણાવાવ', 26),
(204, 'રાજકોટ', 27),
(205, 'ધોરાજી', 27),
(206, 'ગોંડલ', 27),
(207, 'જસદણ', 27),
(208, 'જેતપુર', 27),
(209, 'જામકંડોણા', 27),
(210, 'કોટડાસાંગાણી', 27),
(211, 'લોધીકા', 27),
(212, 'ઉપલેટા', 27),
(213, 'વીંછિયા', 27),
(214, 'પડધરી', 27),
(215, 'ચોર્યાસી', 29),
(216, 'પલસાણા', 29),
(217, 'મહુવા', 29),
(218, 'માંગરોલ', 29),
(219, 'કામરેજ', 29),
(220, 'માંડવી', 29),
(221, 'ઓલપાડ', 29),
(222, 'ઉમરપાડા', 29),
(223, 'બારડોલી', 29),
(224, 'ચોટીલા', 30),
(225, 'ચુડા', 30),
(226, 'દસાડા', 30),
(227, 'ધાંગધ્રા', 30),
(228, 'લખતર', 30),
(229, 'લીંબડી', 30),
(230, 'મુળી', 30),
(231, 'સાયલા', 30),
(232, 'વઢવાણ', 30),
(233, 'થાનગઢ', 30),
(234, 'કરજણ', 32),
(235, 'ડભોઇ', 32),
(236, 'વાઘોડીયા', 32),
(237, 'પાદરા', 32),
(238, 'વડોદરા', 32),
(239, 'સાવલી', 32),
(240, 'શિનોર', 32),
(241, 'દેસર', 32),
(242, 'વલસાડ', 33),
(243, 'ધરમપુર', 33),
(244, 'કપરાડા', 33),
(245, 'પારડી', 33),
(246, 'ઉમરગામ', 33),
(247, 'વાપી', 33);

-- --------------------------------------------------------

--
-- Table structure for table `userreg`
--

CREATE TABLE `userreg` (
  `u_id` int(10) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `uadd` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `t_name` varchar(50) NOT NULL,
  `v_name` varchar(50) NOT NULL,
  `pin` varchar(10) NOT NULL,
  `umob` varchar(20) NOT NULL,
  `upassword` varchar(30) CHARACTER SET latin1 NOT NULL,
  `uem` varchar(30) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userreg`
--

INSERT INTO `userreg` (`u_id`, `uname`, `uadd`, `district`, `t_name`, `v_name`, `pin`, `umob`, `upassword`, `uem`, `status`) VALUES
(57, 'રવિ રામની ', 'જસદણ ', '27', '207', 'જસદણ ', '366666', '9016625517', '123456', 'raviramani406@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `village`
--

CREATE TABLE `village` (
  `v_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `t_id` int(11) NOT NULL,
  `d_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlog`
--
ALTER TABLE `adminlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adversitment`
--
ALTER TABLE `adversitment`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `receipt_details`
--
ALTER TABLE `receipt_details`
  ADD PRIMARY KEY (`rd_id`),
  ADD KEY `r_id` (`r_id`),
  ADD KEY `b_id` (`b_id`),
  ADD KEY `b_id_2` (`b_id`);

--
-- Indexes for table `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`sub_id`),
  ADD UNIQUE KEY `sub_mob` (`sub_mob`);

--
-- Indexes for table `taluka`
--
ALTER TABLE `taluka`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `district` (`d_id`),
  ADD KEY `d_id` (`d_id`);

--
-- Indexes for table `userreg`
--
ALTER TABLE `userreg`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `umob` (`umob`),
  ADD UNIQUE KEY `userreg` (`uem`);

--
-- Indexes for table `village`
--
ALTER TABLE `village`
  ADD PRIMARY KEY (`v_id`),
  ADD KEY `t_id` (`t_id`),
  ADD KEY `t_id_2` (`t_id`),
  ADD KEY `d_id` (`d_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlog`
--
ALTER TABLE `adminlog`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `adversitment`
--
ALTER TABLE `adversitment`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `d_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `receipt_details`
--
ALTER TABLE `receipt_details`
  MODIFY `rd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `taluka`
--
ALTER TABLE `taluka`
  MODIFY `t_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;
--
-- AUTO_INCREMENT for table `userreg`
--
ALTER TABLE `userreg`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `village`
--
ALTER TABLE `village`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `village`
--
ALTER TABLE `village`
  ADD CONSTRAINT `village_ibfk_1` FOREIGN KEY (`t_id`) REFERENCES `taluka` (`t_id`),
  ADD CONSTRAINT `village_ibfk_2` FOREIGN KEY (`d_id`) REFERENCES `taluka` (`t_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
