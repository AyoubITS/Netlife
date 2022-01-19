-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: mysql-amine95.alwaysdata.net
-- Generation Time: Jan 09, 2021 at 02:05 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amine95_netlife`
--

-- --------------------------------------------------------

--
-- Table structure for table `aimer`
--

CREATE TABLE `aimer` (
  `aimer_id` int(11) NOT NULL,
  `posts_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nb_like` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aimer`
--

INSERT INTO `aimer` (`aimer_id`, `posts_id`, `user_id`, `nb_like`) VALUES
(1, 102, 29, 1),
(2, 102, 29, 1),
(3, 101, 29, 1),
(4, 99, 29, 1),
(5, 100, 29, 1),
(6, 110, 29, 1),
(7, 113, 29, 1),
(8, 115, 29, 1),
(9, 85, 38, 1),
(10, 118, 29, 1),
(11, 142, 29, 1),
(12, 144, 29, 1),
(13, 143, 29, 1),
(14, 141, 29, 1),
(15, 145, 29, 1),
(16, 138, 29, 1),
(17, 139, 23, 1),
(18, 137, 23, 1),
(19, 149, 23, 1),
(20, 143, 23, 1),
(21, 116, 23, 1),
(22, 149, 29, 1),
(23, 143, 33, 1),
(24, 164, 23, 1),
(25, 167, 29, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Conversation`
--

CREATE TABLE `Conversation` (
  `id_conversation` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `message` varchar(200) NOT NULL,
  `id_user1` int(11) NOT NULL,
  `id_user2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Conversation`
--

INSERT INTO `Conversation` (`id_conversation`, `date`, `message`, `id_user1`, `id_user2`) VALUES
(1, '2021-01-06 19:18:02', 'slt slt', 28, 15);

-- --------------------------------------------------------

--
-- Table structure for table `friend_request`
--

CREATE TABLE `friend_request` (
  `request_id` int(11) NOT NULL,
  `request_from_id` int(11) NOT NULL,
  `request_to_id` int(11) NOT NULL,
  `request_status` enum('Pending','Confirm','Reject') NOT NULL,
  `request_notification_status` enum('No','Yes') NOT NULL,
  `request_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friend_request`
--

INSERT INTO `friend_request` (`request_id`, `request_from_id`, `request_to_id`, `request_status`, `request_notification_status`, `request_datetime`) VALUES
(2, 16, 4, 'Pending', 'No', '2021-01-02 17:22:38'),
(4, 20, 16, 'Confirm', 'Yes', '2021-01-02 22:05:07'),
(5, 16, 6, 'Pending', 'No', '2021-01-02 18:20:49'),
(6, 16, 5, 'Pending', 'No', '2021-01-02 19:34:05'),
(7, 21, 16, 'Confirm', 'Yes', '2021-01-03 17:44:32'),
(8, 23, 3, 'Pending', 'No', '2021-01-03 18:20:39'),
(9, 28, 9, 'Pending', 'No', '2021-01-05 18:22:56'),
(10, 28, 15, 'Confirm', 'Yes', '2021-01-05 18:26:38'),
(12, 29, 16, 'Confirm', 'Yes', '2021-01-05 22:26:57'),
(13, 19, 29, 'Confirm', 'Yes', '2021-01-06 18:13:06'),
(14, 30, 16, 'Pending', 'No', '2021-01-06 20:01:28'),
(15, 30, 29, 'Confirm', 'Yes', '2021-01-06 20:03:31'),
(19, 29, 3, 'Pending', 'No', '2021-01-07 12:57:38'),
(20, 29, 4, 'Pending', 'No', '2021-01-07 12:58:05'),
(22, 31, 29, 'Confirm', 'Yes', '2021-01-07 13:08:03'),
(23, 29, 25, 'Pending', 'No', '2021-01-07 13:15:10'),
(24, 33, 29, 'Confirm', 'Yes', '2021-01-07 14:10:40'),
(25, 33, 30, 'Confirm', 'Yes', '2021-01-07 17:17:53'),
(26, 38, 29, 'Confirm', 'Yes', '2021-01-07 17:24:37'),
(27, 29, 40, 'Confirm', 'Yes', '2021-01-08 14:35:52'),
(29, 43, 23, 'Confirm', 'Yes', '2021-01-08 09:28:13'),
(31, 44, 29, 'Confirm', 'Yes', '2021-01-08 13:02:24'),
(32, 29, 43, 'Confirm', 'Yes', '2021-01-08 13:34:40');

-- --------------------------------------------------------

--
-- Table structure for table `media_table`
--

CREATE TABLE `media_table` (
  `media_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `media_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media_table`
--

INSERT INTO `media_table` (`media_id`, `post_id`, `media_path`) VALUES
(1, 8, 'upload/748483879.jpg'),
(2, 8, 'upload/610585346.jpg'),
(3, 9, 'upload/407573477.png'),
(4, 10, '../upload/496380857.jpg'),
(5, 11, '../upload/424375200.jpg'),
(6, 13, '../upload/660529829.jpg'),
(7, 13, '../upload/596109485.jpg'),
(10, 15, '../upload/566779774.jpg'),
(12, 16, '../upload/631846060.png'),
(13, 17, '../upload/942656786.jpg'),
(14, 19, '../upload/313778519.png'),
(15, 21, '../upload/731812242.png'),
(16, 23, '../upload/705893343.jpg'),
(17, 23, '../upload/228145005.jpg'),
(18, 25, '../upload/998029033.jpg'),
(19, 25, '../upload/352796623.jpg'),
(20, 27, '../upload/340627363.jpg'),
(21, 27, '../upload/381192483.jpg'),
(22, 29, '../upload/796022927.jpg'),
(23, 29, '../upload/824147278.jpg'),
(24, 32, '../upload/770674247.jpg'),
(25, 34, '../upload/166548889.jpg'),
(26, 36, '../upload/495673232.jpg'),
(27, 36, '../upload/787734631.jpg'),
(28, 38, '../upload/458877184.jpg'),
(29, 38, '../upload/891566757.jpg'),
(30, 40, '../upload/316558141.jpg'),
(31, 40, '../upload/876529899.jpg'),
(32, 42, '../upload/605017122.jpg'),
(33, 42, '../upload/205234399.jpg'),
(34, 44, '../upload/827331164.jpg'),
(35, 44, '../upload/579187961.jpg'),
(36, 46, '../upload/136395113.jpg'),
(37, 46, '../upload/722854132.jpg'),
(38, 48, '../upload/818604112.jpg'),
(39, 48, '../upload/173489693.jpg'),
(40, 52, '../upload/923735046.jpg'),
(41, 52, '../upload/372185734.jpg'),
(42, 55, '../upload/742308571.jpg'),
(43, 55, '../upload/564018294.jpg'),
(44, 57, '../upload/262767183.jpg'),
(45, 57, '../upload/161798838.jpg'),
(46, 59, '../upload/696638669.jpg'),
(47, 59, '../upload/462232382.jpg'),
(48, 61, '../upload/506759919.jpg'),
(49, 61, '../upload/970376518.jpg'),
(50, 64, '../upload/464995560.jpg'),
(51, 64, '../upload/954470471.jpg'),
(52, 66, '../upload/473846719.jpg'),
(53, 66, '../upload/784098101.jpg'),
(54, 68, '../upload/125518922.jpg'),
(55, 68, '../upload/368373881.jpg'),
(56, 70, '../upload/252552856.jpg'),
(57, 70, '../upload/408535681.jpg'),
(58, 72, '../upload/940434678.jpg'),
(59, 74, '../upload/638181742.jpg'),
(60, 74, '../upload/986358113.jpg'),
(61, 75, '../upload/451979429.jpg'),
(62, 75, '../upload/397084562.jpg'),
(63, 76, '../upload/792802361.jpg'),
(64, 76, '../upload/874894721.jpg'),
(65, 77, '../upload/147931022.jpg'),
(66, 78, '../upload/231816997.jpg'),
(67, 78, '../upload/738051759.jpg'),
(68, 79, '../upload/188321672.png'),
(69, 80, '../upload/417281034.jpg'),
(70, 81, '../upload/212039080.gif'),
(71, 84, '../upload/728740437.jpg'),
(72, 84, '../upload/646965456.jpg'),
(73, 85, '../upload/698097087.gif'),
(74, 86, '../upload/137768671.gif'),
(75, 88, '../upload/628609100.gif'),
(76, 90, '../upload/432021821.png'),
(82, 99, '../upload/316503216.png'),
(87, 101, '../upload/903399544.jpg'),
(88, 101, '../upload/257831174.png'),
(89, 101, '../upload/518013925.jpg'),
(90, 102, '../upload/303192771.png'),
(91, 102, '../upload/179571823.png'),
(92, 109, '../upload/207298484.png'),
(93, 110, '../upload/522720229.jpg'),
(94, 110, '../upload/679622105.jpg'),
(95, 110, '../upload/487453629.jpg'),
(96, 110, '../upload/399929481.png'),
(97, 110, '../upload/985138919.png'),
(98, 110, '../upload/599520911.png'),
(99, 110, '../upload/572909541.png'),
(100, 112, '../upload/995157154.jpg'),
(101, 116, '../upload/907872377.jpg'),
(102, 117, '../upload/152515681.png'),
(103, 117, '../upload/315478960.png'),
(104, 117, '../upload/889974568.png'),
(105, 118, '../upload/103958215.jpg'),
(106, 139, '../upload/111882447.png'),
(107, 160, '../upload/775016335.png'),
(108, 161, '../upload/639813511.png'),
(109, 162, '../upload/546607907.png'),
(111, 164, '../upload/404596954.png'),
(113, 166, '../upload/386883887.png'),
(114, 170, '../upload/787376689.png'),
(115, 172, '../upload/668292145.jpg'),
(116, 175, '../upload/631912035.png');

-- --------------------------------------------------------

--
-- Table structure for table `posts_table`
--

CREATE TABLE `posts_table` (
  `posts_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_content` text NOT NULL,
  `post_code` varchar(100) NOT NULL,
  `post_datetime` datetime NOT NULL,
  `post_status` enum('Publish','Draft') NOT NULL,
  `post_type` enum('Text','Media') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts_table`
--

INSERT INTO `posts_table` (`posts_id`, `user_id`, `post_content`, `post_code`, `post_datetime`, `post_status`, `post_type`) VALUES
(1, 16, 'Yoooo', 'bba5b639108670879796a178097ebf07', '2021-01-03 18:43:52', 'Publish', 'Text'),
(2, 16, 'test', 'f2a4da49575678f45877fde50ed1af31', '2021-01-03 18:44:56', 'Publish', 'Text'),
(3, 16, 'test', 'e86e17037e1f061eca1e6d8ce4ff472d', '2021-01-03 18:46:24', 'Publish', 'Text'),
(5, 16, 'TEST', 'c70e097822c5dcf06c695534f43a8291', '2021-01-04 01:44:20', 'Publish', 'Text'),
(8, 16, '', '3abeecccce513be71b669feaeeb56556', '2021-01-04 19:42:00', 'Draft', 'Media'),
(9, 16, '', '4c775d3375706d04a173d7f10fdfde34', '2021-01-04 19:43:16', 'Draft', 'Media'),
(10, 16, '', '032d46dcc708356598c8470e231ee6ee', '2021-01-04 20:12:01', 'Draft', 'Media'),
(11, 16, '', '99e2758b5cafda49ab2ce3b60df9da23', '2021-01-04 20:13:01', 'Draft', 'Media'),
(12, 16, '', '84db3250f8166d19c602294d79d4f2a4', '2021-01-04 20:13:10', 'Publish', 'Text'),
(13, 16, '', '8873d9c23678a3c80ca3a04e067bdb9c', '2021-01-04 20:18:16', 'Draft', 'Media'),
(14, 16, '', '03b6901101fc151ff781996aebc37598', '2021-01-04 20:30:17', 'Draft', 'Media'),
(15, 16, '', 'c8dbd5ec1eaeae3e43e3a3bd26f5513e', '2021-01-04 20:44:07', 'Draft', 'Media'),
(16, 16, '', 'da1f762d081e53e2652f2352c6be621e', '2021-01-04 20:44:13', 'Draft', 'Media'),
(17, 16, '', '3d07319142ce947af4749d3cd38ed763', '2021-01-04 20:44:16', 'Draft', 'Media'),
(18, 16, '', 'c468827b16e42f5000e11ad5d0641078', '2021-01-04 20:44:23', 'Publish', 'Text'),
(19, 16, '', 'faab604dba04737e293bad5159af5e42', '2021-01-04 20:44:40', 'Draft', 'Media'),
(20, 16, 'yo', '869875c1660ee58b9ff21773e8edd561', '2021-01-04 20:44:53', 'Publish', 'Text'),
(21, 16, '', 'df72f7e7f9ad735dac0ba1e0fb145e98', '2021-01-04 20:49:15', 'Draft', 'Media'),
(22, 16, '', 'f8619b7630871240d4e775c85d461468', '2021-01-04 20:49:22', 'Publish', 'Text'),
(23, 16, '', '02158cedd39bb946eef18b4cba10764a', '2021-01-04 20:55:07', 'Draft', 'Media'),
(24, 16, '', '9ff40b31c0e889621c9aea0185e5ec07', '2021-01-04 20:55:13', 'Publish', 'Text'),
(25, 16, '', '46e3a0fbb4b709ba5d334b6eb567da4d', '2021-01-04 20:55:56', 'Draft', 'Media'),
(26, 16, 'stp marche pitié&amp;nbsp;', '9e1199857e8a4e3dba1dc858c70c310f', '2021-01-04 20:56:06', 'Publish', 'Text'),
(27, 16, '', '15cbb09e4981f4e8a055e1075da830b6', '2021-01-04 20:58:41', 'Draft', 'Media'),
(28, 16, 'stp marche pitié', '8428a2d5aa78a634aa9c96fa05788287', '2021-01-04 20:58:55', 'Publish', 'Text'),
(29, 16, '', 'cbed16865f3ae06d160cb109927e7053', '2021-01-04 21:06:36', 'Draft', 'Media'),
(30, 16, '', 'ad00954d477ce9bc439ec4c1cbc99962', '2021-01-04 21:06:42', 'Publish', 'Text'),
(31, 16, 'pitié', 'a197a50597a348091337c54443a09361', '2021-01-04 21:15:41', 'Publish', 'Text'),
(32, 16, '', 'ba28857e41241a687150a0d8d4dcf757', '2021-01-04 21:16:32', 'Draft', 'Media'),
(33, 16, 'arrete', '988b4ca9cc82e2955bf14d81883b8fec', '2021-01-04 21:16:43', 'Publish', 'Text'),
(34, 16, '', 'b60f6467fabad21576b86efac33c58fa', '2021-01-04 21:17:08', 'Draft', 'Media'),
(35, 16, '', '85c9c993e2d19088cdf290f5e888e973', '2021-01-04 21:17:15', 'Publish', 'Text'),
(36, 16, '', 'bc671cac8a4df669b19d39e3fb1ae732', '2021-01-04 21:17:41', 'Draft', 'Media'),
(37, 16, 'arrete', '386a8f76591623e051de63d84ad50ccd', '2021-01-04 21:17:50', 'Publish', 'Text'),
(38, 16, '', '94eabcfab04960a7a95b6814333f4f26', '2021-01-04 21:18:11', 'Draft', 'Media'),
(39, 16, '', 'fc2e521fdbb3cabc0c21033e10ef94f3', '2021-01-04 21:18:17', 'Publish', 'Text'),
(40, 16, '', 'ba01febfaa4018e1beb228349f406151', '2021-01-04 21:19:06', 'Draft', 'Media'),
(41, 16, 'stp', '035610242e270a804cd1c6151a8d86b5', '2021-01-04 21:19:15', 'Publish', 'Text'),
(42, 16, '', '9a627846120cf4f9dbd20174ccb7f202', '2021-01-04 21:32:43', 'Draft', 'Media'),
(43, 16, '', 'b6b849e64cb987e03b8a17bb307c0521', '2021-01-04 21:32:50', 'Publish', 'Text'),
(44, 16, '', 'b3f4589af7a230cc0d301785bfe038de', '2021-01-04 21:34:50', 'Draft', 'Media'),
(45, 16, '', 'f52663351b57251114764ad5a2e9a208', '2021-01-04 21:34:57', 'Publish', 'Text'),
(46, 16, '', '48d9fb48525d2b6168a4d822754b45f4', '2021-01-04 21:35:44', 'Draft', 'Media'),
(47, 16, '', '447a282158f42c265878794f982904b0', '2021-01-04 21:35:50', 'Publish', 'Text'),
(48, 16, '', '67207135df6c8854f08e3588ea84a969', '2021-01-04 21:38:51', 'Draft', 'Media'),
(49, 16, '', '91c92beed9f2058a250956ea060a1347', '2021-01-04 21:38:57', 'Publish', 'Text'),
(50, 16, 'ok', 'a4854dd890d1aebbf72c0217ce999503', '2021-01-04 21:40:03', 'Publish', 'Text'),
(51, 16, 'ok', 'eead2cb5c3f1070be55de5ad1f7363db', '2021-01-04 21:40:28', 'Publish', 'Text'),
(52, 16, '', '50cafe9931589ffbfd9372d22f6e04ef', '2021-01-04 21:49:50', 'Draft', 'Media'),
(53, 16, 'stppp', '5028f2bb5b9f737e9b7d46220aa65170', '2021-01-04 21:49:56', 'Publish', 'Text'),
(54, 16, 'https://admin.alwaysdata.com/&lt;div id=&quot;temp_url_content&quot;&gt;\n                        &lt;a href=&quot;https://admin.alwaysdata.com/&quot; target=&quot;_blank&quot;&gt;\n                            &lt;div style=&quot;background-color:#f9f9f9&quot;&gt;\n                                \n			&lt;div align=&quot;center&quot;&gt;&lt;img src=&quot;../images/image-not-found.jpg&quot; class=&quot;img-responsive&quot;&gt;&lt;/div&gt;\n			\n                                &lt;h3 style=&quot;color:#888&quot;&gt;administration | alwaysdata&lt;/h3&gt;\n                                &lt;p class=&quot;text-muted&quot;&gt;&lt;/p&gt;\n                            &lt;/div&gt;\n                        &lt;/a&gt;\n                        &lt;/div&gt;&lt;div id=&quot;temp_url_content&quot;&gt;&lt;/div&gt;', '44fffefffa2733683d068d3b04d95c1d', '2021-01-04 22:02:51', 'Publish', 'Text'),
(55, 16, '', '29cc2b58e15144ade3f4bd218af2c3e2', '2021-01-04 22:11:03', 'Draft', 'Media'),
(56, 16, '', '2f2a51c8e9c9f049f269db0557da9068', '2021-01-04 22:11:09', 'Publish', 'Text'),
(57, 16, '', 'be97e45d4db0088effdf5897a88f9c9d', '2021-01-04 22:37:49', 'Draft', 'Media'),
(58, 16, '', '586fc59a647d4bab0e4ef5057983da83', '2021-01-04 22:37:55', 'Publish', 'Text'),
(59, 16, '', '357f184307fd102ef732e912cde40b35', '2021-01-04 22:39:21', 'Draft', 'Media'),
(60, 16, '', '1e4b528d8418553640b430d8dbf98f14', '2021-01-04 22:39:29', 'Publish', 'Text'),
(61, 16, '', 'c7700a922714d78c3956abcddace2f98', '2021-01-04 22:41:22', 'Draft', 'Media'),
(62, 16, '', 'f79a8ca3e5ce664ac6b9dc7525cb5091', '2021-01-04 22:41:28', 'Publish', 'Text'),
(63, 16, 'ok', '6d79431ded4cff2c1315e3777c0f06e8', '2021-01-04 22:42:44', 'Publish', 'Text'),
(64, 16, '', 'a7ae4a97efbde3bfdae2e6e5345cda99', '2021-01-04 22:43:02', 'Draft', 'Media'),
(65, 16, '', 'cc51657a3496aaf7d8d3cb8727f6b686', '2021-01-04 22:43:08', 'Publish', 'Text'),
(66, 16, '', 'ba93f95544c78f106bd71aeb301e0332', '2021-01-04 22:44:02', 'Draft', 'Media'),
(67, 16, '', '3aa38c5df1aad5aa085ec505a0ec8789', '2021-01-04 22:44:08', 'Publish', 'Text'),
(68, 16, '', 'b3871b9753ffa04bc71b3ffdf30c8e73', '2021-01-04 22:45:48', 'Draft', 'Media'),
(69, 16, '', 'dd3b007e346e4e23386c3399c40989f2', '2021-01-04 22:45:55', 'Publish', 'Text'),
(70, 16, '', '7e4fa276c51f5a946abf0f13e6de84d7', '2021-01-04 22:49:05', 'Draft', 'Media'),
(72, 16, '', '7c7363cacd282836ef9b177c16dc42f5', '2021-01-04 22:50:33', 'Draft', 'Media'),
(79, 19, '', '5bf64a034b76f4716ee76e624f2e90ec', '2021-01-05 18:34:43', 'Draft', 'Media'),
(83, 16, 'ok', '38da3c3b3f548f841770d730c0522d98', '2021-01-05 20:03:29', 'Publish', 'Text'),
(84, 16, 'allo', '645b647684b7e3415cf81fd4393a55ac', '2021-01-05 22:23:42', 'Draft', 'Media'),
(86, 29, 'test n*1000', '07140130aa264bbf5000c546899ebb92', '2021-01-05 23:28:06', 'Draft', 'Media'),
(87, 29, 'yoooo&lt;div&gt;&lt;br&gt;&lt;/div&gt;', 'e6ba225e46a7d4787c88ffa2c7fe161b', '2021-01-05 23:28:42', 'Publish', 'Text'),
(88, 19, 'slt', 'c078438c6558147748952cce8f43fc34', '2021-01-05 23:29:38', 'Draft', 'Media'),
(89, 19, 'yo', 'b6542fc9a7de7eae14cf760f0c316be8', '2021-01-05 23:33:18', 'Publish', 'Text'),
(90, 19, 'ok', '90720958319c328642b1601f9e45a5bb', '2021-01-05 23:38:17', 'Draft', 'Media'),
(91, 29, 'slt ?', 'aefe32aa895dff84c9fceefd7e2a00d3', '2021-01-06 21:04:27', 'Publish', 'Text'),
(92, 30, 'nn je crois pas', '52dcd722a666554eb534e84febcfacf8', '2021-01-06 21:07:04', 'Publish', 'Text'),
(93, 29, 'dsl j\'arrete bg', 'd21af039b3941fe2ff125cad2512f99d', '2021-01-06 21:07:51', 'Publish', 'Text'),
(94, 30, '', 'bbb7a3d508f46ad7f96130f97fea7f4a', '2021-01-06 21:09:01', 'Draft', 'Media'),
(95, 30, '', '5b102e21d16b2784218a8ac4f800e768', '2021-01-06 21:10:17', 'Draft', 'Media'),
(96, 30, '', '29f7c2aaf486be30a9a37972b531b6d9', '2021-01-06 21:10:37', 'Draft', 'Media'),
(97, 30, '', 'ef1adc049da5ffb5cb8b927c95fcb12f', '2021-01-06 21:10:43', 'Draft', 'Media'),
(98, 30, '', '8519c59667c66fd865fe434fc110ad4c', '2021-01-06 21:11:11', 'Draft', 'Media'),
(99, 29, 'avis bannière', 'c87ea9249463ec0240b9ece75a959e07', '2021-01-06 21:11:54', 'Draft', 'Media'),
(100, 29, '', '095ae7883bb7b7b0aae39b3302c5fa21', '2021-01-06 21:12:32', 'Draft', 'Media'),
(102, 30, '', 'bc15e48230aa4617d5012f35efba8f3c', '2021-01-06 21:13:08', 'Draft', 'Media'),
(103, 29, 'https://www.youtube.com/watch?v=uU5C0ZuCi6s&amp;amp;list=PLiDBK5HKu_7gsBblFsV0HPaKgRQxOzZlq&amp;amp;index=430&lt;br&gt;&lt;div id=&quot;temp_url_content&quot;&gt;\n                        &lt;a href=&quot;https://www.youtube.com/watch?v=uU5C0ZuCi6s&amp;amp;list=PLiDBK5HKu_7gsBblFsV0HPaKgRQxOzZlq&amp;amp;index=430&quot; target=&quot;_blank&quot;&gt;\n                            &lt;div style=&quot;background-color:#f9f9f9&quot;&gt;\n                                \n				&lt;div class=&quot;embed-responsive embed-responsive-16by9&quot;&gt;\n					  	&lt;iframe class=&quot;embed-responsive-item&quot; src=&quot;https://www.youtube.com/embed/uU5C0ZuCi6s&quot;&gt;&lt;/iframe&gt;\n					&lt;/div&gt;\n				\n                                &lt;h3 style=&quot;color:#888&quot;&gt;Hunter X Hunter 2011 Ost 3   Riot Extended - YouTube&lt;/h3&gt;\n                                &lt;p class=&quot;text-muted&quot;&gt;I DO NOT OWN OR COMPOSED ANY OF THOSE TRACKS. ALL THE MUSIC BELONGS TO ITS RESPECTFUL OWNERS&lt;/p&gt;\n                            &lt;/div&gt;\n                        &lt;/a&gt;\n                        &lt;/div&gt;&lt;div id=&quot;temp_url_content&quot;&gt;&lt;/div&gt;&lt;div id=&quot;temp_url_content&quot;&gt;&lt;/div&gt;&lt;div id=&quot;temp_url_content&quot;&gt;&lt;/div&gt;&lt;div id=&quot;temp_url_content&quot;&gt;&lt;/div&gt;&lt;div id=&quot;temp_url_content&quot;&gt;&lt;/div&gt;&lt;div id=&quot;temp_url_content&quot;&gt;&lt;/div&gt;&lt;div id=&quot;temp_url_content&quot;&gt;&lt;/div&gt;&lt;div id=&quot;temp_url_content&quot;&gt;&lt;/div&gt;', 'ad4a3b540249643f1b2b96c7f5dfb5ac', '2021-01-07 13:34:20', 'Publish', 'Text'),
(104, 29, 'https://youtu.be/uU5C0ZuCi6s?list=PLiDBK5HKu_7gsBblFsV0HPaKgRQxOzZlq', '8caf77a49d38579d658a0b52611fd276', '2021-01-07 13:51:12', 'Publish', 'Text'),
(105, 29, 'ok', 'd2c5a3b3d628c4c22e810b502035ba72', '2021-01-07 14:04:04', 'Publish', 'Text'),
(106, 29, 'ok', '433aaf054276698132bc4ca51c0c2452', '2021-01-07 14:04:22', 'Publish', 'Text'),
(107, 29, 'ok', '5f120ecacfe2b36094d4c94f125d35e1', '2021-01-07 14:04:54', 'Publish', 'Text'),
(108, 29, 'a', 'afcaf79efc762244d49bcdc26387d0cf', '2021-01-07 14:08:58', 'Publish', 'Text'),
(109, 29, '', '672cf50a1e2196b4670e5b0a718b4c49', '2021-01-07 14:09:05', 'Draft', 'Media'),
(110, 29, '', 'f45b1fec6602ca9a138d369cccb6bbdc', '2021-01-07 14:09:15', 'Draft', 'Media'),
(112, 29, '', 'f5c0a9ef3bf90f1906c907f7df564663', '2021-01-07 15:11:34', 'Draft', 'Media'),
(113, 33, 'bon chance ?', '2b6b504a1da5972d4bae080917f859ac', '2021-01-07 15:14:43', 'Publish', 'Text'),
(114, 29, 'okkkkkkk', '352a006357623fc44137c280907faef4', '2021-01-07 15:38:53', 'Publish', 'Text'),
(115, 38, '1 2 3 viva l\'Algérie', '913c1ce8cd34535a631c8102444db36a', '2021-01-07 18:24:06', 'Publish', 'Text'),
(117, 29, '', '945e30453189e868a0728da3b193e04a', '2021-01-07 18:34:39', 'Draft', 'Media'),
(118, 29, '', '5100d15ab1d0fca2b633bc32c5684ff2', '2021-01-07 18:34:45', 'Draft', 'Media'),
(119, 29, 'Ok', '0ead9f3acf3b1f74ddbe0fa2e3684618', '2021-01-07 19:12:22', 'Publish', 'Text'),
(120, 39, '&lt;div&gt;“ Ce dont j\'ai besoin : mon Stand. Un ami en qui j\'ai confiance. Les âmes de 36 personnes ayant commis des Péchés Capitaux. Les 14 Formules. Du Courage.&lt;/div&gt;&lt;div&gt;Mon Stand rassemblera les 36 pécheurs, les absorbera et donnera vie à quelque chose de nouveau.&lt;/div&gt;&lt;div&gt;La dernière chose dont j\'ai besoin est un endroit...&lt;/div&gt;&lt;div&gt;Rend-toi à la Latitude 28\' 24\' au Nord, Longitude 80\' 36\' à l\'Ouest, et attend la prochaine nouvelle Lune...&lt;/div&gt;&lt;div&gt;L\'Heure du Paradis. ”&lt;/div&gt;', '0adc097c92d71e07513febbf57fba41f', '2021-01-07 19:34:08', 'Publish', 'Text'),
(127, 29, 'aa&lt;div&gt;a&lt;/div&gt;&lt;div&gt;a&lt;/div&gt;&lt;div&gt;a&lt;/div&gt;&lt;div&gt;a&lt;/div&gt;', 'e327aa9d5599eba37e55f03029fb6171', '2021-01-07 20:00:15', 'Publish', 'Text'),
(139, 39, '', '1227cb117dc7c2495560b6d9dc7e560e', '2021-01-07 20:18:12', 'Draft', 'Media'),
(154, 28, 'test', '9929866b04789781a92834a0fc80a404', '2021-01-07 21:19:40', 'Publish', 'Text'),
(155, 29, 'Allo', '655fb2b65833acb8a5bb6d7ebeb1623f', '2021-01-07 22:51:31', 'Publish', 'Text'),
(156, 29, 'https://youtu.be/uH4hnqa_LWw?list=PLiDBK5HKu_7gsBblFsV0HPaKgRQxOzZlq<div id=\"temp_url_content\">\n                        <a href=\"https://youtu.be/uH4hnqa_LWw?list=PLiDBK5HKu_7gsBblFsV0HPaKgRQxOzZlq\" target=\"_blank\">\n                            <div style=\"background-color:#f9f9f9\">\n                                \n				<div class=\"embed-responsive embed-responsive-16by9\">\n					  	<iframe class=\"embed-responsive-item\" src=\"https://www.youtube.com/embed/uH4hnqa_LWw?list=PLiDBK5HKu_7gsBblFsV0HPaKgRQxOzZlq\"></iframe>\n					</div>\n				\n                                <h3 style=\"color:#888\">Undertale - Fallen Down (Slowed + Reverb) - YouTube</h3>\n                                <p class=\"text-muted\">not my song, but it is my editListen with your headphone :)@l.e.ite#slowedreverb #undertale #ost</p>\n                            </div>\n                        </a>\n                        </div><div id=\"temp_url_content\"></div>', 'bd1a523bc53d3131915e4781f832e38d', '2021-01-07 22:51:55', 'Publish', 'Text'),
(157, 29, 'https://youtu.be/rnFRcjzhTzE<br><div id=\"temp_url_content\">\n                        <a href=\"https://youtu.be/rnFRcjzhTzE\" target=\"_blank\">\n                            <div style=\"background-color:#f9f9f9\">\n                                \n				<div class=\"embed-responsive embed-responsive-16by9\">\n					  	<iframe class=\"embed-responsive-item\" src=\"https://www.youtube.com/embed/rnFRcjzhTzE\"></iframe>\n					</div>\n				\n                                <h3 style=\"color:#888\">Season 2021 Opening Day | Full Livestream - League of Legends - YouTube</h3>\n                                <p class=\"text-muted\">New year, new surprises: Welcome to Season 2021. Hereâ??s a first look at the upcoming year across League of Legends, Wild Rift, Teamfight Tactics, Legends of ...</p>\n                            </div>\n                        </a>\n                        </div><div id=\"temp_url_content\"></div><div id=\"temp_url_content\"></div><div id=\"temp_url_content\"></div><div id=\"temp_url_content\"></div><div id=\"temp_url_content\"></div>', 'e4f6553dea86c25a21368902a01d6487', '2021-01-07 22:58:11', 'Publish', 'Text'),
(158, 42, 'ssqs', '7c19320f4b04753563f0058c892a98f0', '2021-01-07 23:48:16', 'Publish', 'Text'),
(159, 43, 'test', '8767aaa012e1bef407223333e7b694b9', '2021-01-08 10:28:23', 'Publish', 'Text'),
(160, 23, '', 'c9609d01e94ebfe3b921160a58d9581c', '2021-01-08 10:29:12', 'Draft', 'Media'),
(161, 23, '', '7ed9ee6a903c1930b72641180b9c9da3', '2021-01-08 10:30:01', 'Draft', 'Media'),
(162, 23, '', 'dd90357bb893746884ae408b9ab2ed24', '2021-01-08 10:30:28', 'Draft', 'Media'),
(163, 23, '', '417365fa10015db66f8b8749275732e3', '2021-01-08 10:31:15', 'Draft', 'Media'),
(164, 43, '', 'ef2d523c690fe581439e6b688f4bfd64', '2021-01-08 10:31:16', 'Draft', 'Media'),
(166, 43, 'https://www.youtube.com/watch?v=rwCJvSKzQkc<div id=\"temp_url_content\">\n                        <a href=\"https://www.youtube.com/watch?v=rwCJvSKzQkc\" target=\"_blank\">\n                            <div style=\"background-color:#f9f9f9\">\n                                \n				<div class=\"embed-responsive embed-responsive-16by9\">\n					  	<iframe class=\"embed-responsive-item\" src=\"https://www.youtube.com/embed/rwCJvSKzQkc\"></iframe>\n					</div>\n				\n                                <h3 style=\"color:#888\">Attack on Titan Season 4 (Final Season) - Opening | My War - YouTube</h3>\n                                <p class=\"text-muted\">Attack on Titan Season 4 (Final Season) - Opening | My War - English LyricsShingeki no Kyojin Final Season Opening 6_______________________________Subscribe ...</p>\n                            </div>\n                        </a>\n                        </div><div id=\"temp_url_content\"></div>', '2ad5b488fe9fd8e3211fee0a0bb10c96', '2021-01-08 10:31:59', 'Draft', 'Media'),
(167, 44, 'J\'espere qu\'il ne pleut pas la semaine pro x)', '4208246fae37da0e39fd9ff74fb3cdbf', '2021-01-08 13:01:36', 'Publish', 'Text'),
(168, 44, 'https://youtu.be/nKP0BQdQZCQ<div>Regarder cette video ahah<br><div id=\"temp_url_content\">\n                        <a href=\"https://youtu.be/nKP0BQdQZCQ\" target=\"_blank\">\n                            <div style=\"background-color:#f9f9f9\">\n                                \n				<div class=\"embed-responsive embed-responsive-16by9\">\n					  	<iframe class=\"embed-responsive-item\" src=\"https://www.youtube.com/embed/nKP0BQdQZCQ\"></iframe>\n					</div>\n				\n                                <h3 style=\"color:#888\">Cristiano Ronaldo Legendary Goals That Would Have Been - YouTube</h3>\n                                <p class=\"text-muted\">â?¶ï¸ Cristiano Ronaldo Goals That Would Have Beenâ?¬â?¬â?¬â?¬â?¬â?¬â?¬â?¬â?¬â?¬â?¬â?¬â?¬â?¬â?¬â?¬â?¬â?¬â?¬â?¬â?¬â?¬â?¬ð???Turn Notifications on and you will never miss a video again.â?¬â?¬â?¬â?¬â?¬â?¬â?¬â?¬â?¬â?¬â?¬â?¬â?¬â?¬â?¬â?¬â?¬â?¬â?¬â?¬â?¬â?¬â?¬SU...</p>\n                            </div>\n                        </a>\n                        </div><div id=\"temp_url_content\"></div></div><div id=\"temp_url_content\"></div><div id=\"temp_url_content\"></div><div id=\"temp_url_content\"></div><div id=\"temp_url_content\"></div><div id=\"temp_url_content\"></div><div id=\"temp_url_content\"></div><div id=\"temp_url_content\"></div><div id=\"temp_url_content\"></div><div id=\"temp_url_content\"></div><div id=\"temp_url_content\"></div><div id=\"temp_url_content\"></div><div id=\"temp_url_content\"></div><div id=\"temp_url_content\"></div><div id=\"temp_url_content\"></div><div id=\"temp_url_content\"></div><div id=\"temp_url_content\"></div><div id=\"temp_url_content\"></div><div id=\"temp_url_content\"></div><div id=\"temp_url_content\"></div><div id=\"temp_url_content\"></div><div id=\"temp_url_content\"></div><div id=\"temp_url_content\"></div><div id=\"temp_url_content\"></div><div id=\"temp_url_content\"></div><div id=\"temp_url_content\"></div><div id=\"temp_url_content\"></div><div id=\"temp_url_content\"></div><div id=\"temp_url_content\"></div><div id=\"temp_url_content\"></div><div id=\"temp_url_content\"></div>', 'b064fc82153ae6fab309a68c4a41dd90', '2021-01-08 13:02:39', 'Publish', 'Text'),
(169, 29, 'Salutations&nbsp;', 'aa85d64f25d19f9486b251c82e49f78f', '2021-01-08 14:02:02', 'Publish', 'Text'),
(171, 44, '??', 'f6ef442cb92a2c5cc6c07e179828654e', '2021-01-08 14:04:19', 'Publish', 'Text'),
(172, 29, '', 'ef5a0bac7ab2bbb387dc7d9d9ca6f430', '2021-01-08 15:49:43', 'Draft', 'Media'),
(173, 23, 'Salut les jeunes', '425be56d283419457dfa1eb0a9d1dffa', '2021-01-08 15:56:07', 'Publish', 'Text'),
(174, 23, 'Salut a tous&nbsp;', 'd448880e846df0b1a762cb5471317a49', '2021-01-08 18:57:11', 'Publish', 'Text'),
(175, 23, '', 'b131a803540a1705ad63002646c097f5', '2021-01-08 18:57:24', 'Draft', 'Media');

-- --------------------------------------------------------

--
-- Table structure for table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `id_user` int(11) NOT NULL,
  `pseudo` varchar(30) DEFAULT NULL,
  `mot_de_passe` varchar(80) NOT NULL,
  `email` varchar(20) NOT NULL,
  `bio` text DEFAULT 'Pas encore de bio',
  `user_birthdate` date NOT NULL,
  `sexe` enum('Male','Female','Inconnu') NOT NULL DEFAULT 'Inconnu',
  `user_city` varchar(250) NOT NULL DEFAULT 'Pays non renseigné',
  `user_country` varchar(250) NOT NULL DEFAULT 'Ville non renseignée',
  `user_avatar` varchar(100) NOT NULL DEFAULT 'https://i.imgur.com/9l5hPnr.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Utilisateur`
--

INSERT INTO `Utilisateur` (`id_user`, `pseudo`, `mot_de_passe`, `email`, `bio`, `user_birthdate`, `sexe`, `user_city`, `user_country`, `user_avatar`) VALUES
(10, 'amineee', '$2y$10$1bqw2OVJBXLbNLSFY2.PluN', 'amine95k@gmail.com', 'Pas encore de bio', '0000-00-00', 'Male', 'Ville non renseignée', '	Pays non renseigné', 'https://i.imgur.com/9l5hPnr.jpg'),
(11, 'Nasri95', '$2y$10$slNqn7zL7WvpZUy6BdF.oewcuxvziswU9ILE4TAnLX9h4yEdai4e6', 'nasri@gmail.com', 'Pas encore de bio', '0000-00-00', 'Male', 'Ville non renseignée', '	Pays non renseigné', 'https://i.imgur.com/9l5hPnr.jpg'),
(12, 'azerty', '$2y$10$qrJbwD42Q.DZujrdKZW3mezal3CHeyfCVVyRubc9ykirPBP5HmS5i', 'azerty@gmai.com', 'ezdzdv', '0000-00-00', 'Male', 'Ville non renseignée', '	Pays non renseigné', 'https://i.imgur.com/9l5hPnr.jpg'),
(13, 'aaaaaaaa', '$2y$10$kSwW.NM/ByNblvy05IRMUuvaeKk.tfFjM7m2Ih8XsyTQR4tl4H06a', 'a@a.a', 'a', '0000-00-00', 'Male', 'Ville non renseignée', '	Pays non renseigné', 'https://i.imgur.com/9l5hPnr.jpg'),
(14, 'Yatsuu', '$2y$10$j8HlkOmJdGopMARdfSG2TuHQ1xyAt7YAREKV3TViCuhlW/rbd6k0.', 'ok@gmail.com', 'yes', '0000-00-00', 'Male', 'Ville non renseignée', '	Pays non renseigné', 'https://i.imgur.com/9l5hPnr.jpg'),
(15, 'Eren95', '$2y$10$Z.zuxsU9jhrvl7eqDun52OIJ9gUxd9pCWpPfsyRWULu4loDaMzCAG', 'snk@gmail.com', 'Pas encore de bio', '0000-00-00', 'Male', 'Ville non renseignée', '	Pays non renseigné', 'https://i.imgur.com/9l5hPnr.jpg'),
(16, 'Yatsu [ADMIN]', '$2y$10$su3urLDt9ncE4IMjFPR.teXyYufE/GCQoLgZu3ufZkmKWtOxCedjW', 'ok@gmail.com', 'ok', '2000-11-21', 'Male', 'gegen', 'Algeria', '../avatar/1609885446.png'),
(17, 'aaaaaa', '$2y$10$LRIdP7fIgv0iUm9gog4r7.NKGZBiAdsc/T8zG0W9olOdoGBDTDd3e', 'a@a.a', 'a', '0000-00-00', 'Male', 'Ville non renseignée', '	Pays non renseigné', 'https://i.imgur.com/9l5hPnr.jpg'),
(18, 'azerty92', '$2y$10$GlJFc33AunHv9YjQ8j/g.utUam4fT566E8kLNE48vJXCNNXpTZOm.', 'azerty92@gmail.com', 'Pas encore de bio', '0000-00-00', 'Male', 'Ville non renseignée', '	Pays non renseigné', 'https://i.imgur.com/9l5hPnr.jpg'),
(19, 'luffyy', '$2y$10$QagHD9u9C1zX4ZeD5.ex9eWe8ZnvJYaVGPSN98Hc/WxZX4SDmt5ou', 'ok@gmail.com', 'Stp ok', '2000-11-13', 'Male', 'asn', 'Andorra', '../avatar/1609885463.png'),
(20, 'gurenn', '$2y$10$hYsQuWmSyqHElvMP97r6.uNgfGA8aAjZNTk.5VUFh/g0rlph19R1C', 'guren@gmail.com', 'ok', '0000-00-00', 'Inconnu', 'Ville non renseignée', '	Pays non renseigné', 'https://i.imgur.com/9l5hPnr.jpg'),
(21, 'stpstp', '$2y$10$T38106.fWxiJpWxJgWY3jOWxXFEqIzeKx33FY9RjAlnT1w9FfcqQ.', 'stp@gmail.com', 'Pas encore de bio', '0000-00-00', 'Inconnu', 'Ville non renseignée', '	Pays non renseigné', 'https://i.imgur.com/9l5hPnr.jpg'),
(22, 'aaaaaaa', '$2y$10$t6LfFPLmMxMetQTYmRJru.MRGSmSK5DCvIXQNxnQcZdKETpl6Lw7G', 'a@a.fr', 'ssa', '0000-00-00', 'Inconnu', 'Ville non renseignée', '	Pays non renseigné', 'https://i.imgur.com/9l5hPnr.jpg'),
(23, 'test92', '$2y$10$D7EPn6hIpN8yBImmwSoqluMAdYM0H1FbTBhOZYm4CwXjUVRp1VQaa', 'test@gmail.com', 'Pas encore de bio', '1999-06-22', 'Male', 'Tlemcen', ' Algérie ', '../avatar/1610053572.png'),
(24, 'chloe1', '$2y$10$JJDPpet4Rcw0OnNddxTR0urJqzYvet/whR6BQlgvFUotQXd3nQmT2', 'chloe.gateau@hotmail', 'ma bio', '0000-00-00', 'Inconnu', 'Ville non renseignée', '	Pays non renseigné', 'https://i.imgur.com/9l5hPnr.jpg'),
(25, 'Abala92', '$2y$10$avcMFXirQYO68fMTgLLBe.oCVz4gr.tp1X/TBgge0osKWScQU10jG', 'hosseininter29@gmail', 'Pas encore de bio', '0000-00-00', 'Inconnu', 'Ville non renseignée', '	Pays non renseigné', 'https://i.imgur.com/9l5hPnr.jpg'),
(26, 'Abala92', '$2y$10$BzoH2rIPxqUNOuwn8goTCuPknytN8rrDP6nmkv65Z5Bh.Eov4NGaG', 'hosseininter29@gmail', 'Pas encore de bio', '0000-00-00', 'Inconnu', 'Ville non renseignée', '	Pays non renseigné', 'https://i.imgur.com/9l5hPnr.jpg'),
(27, 'Yatsui', '$2y$10$fTcVtxXMSqLq3eEf5JEyoe8vX9R3ZzDU9KVbsNnOmqCpTmHNl8Wfa', 'yatsu@gmail.com', 'Stp', '2000-11-30', 'Male', 'Gennevilliers', 'France', '../avatar/1609828872.jpg'),
(28, 'Etudiant', '$2y$10$HLl9gCfjP78oMc/qYPQbTeQjut/jCP/wo9o/.x58GUvqlffXRf/I2', 'Etudiant@gmail.com', 'Pas encore de bio', '0000-00-00', 'Inconnu', 'Ville non renseignée', '	Pays non renseigné', 'https://i.imgur.com/9l5hPnr.jpg'),
(29, 'Mary92', '$2y$10$yhugrWqvX9kpcgPPXxfVseRnp7rkrxzIjTYLq3mXFWvHQITMIE0hi', 'aaaa@gmail.com', 'YO tout le monde', '2000-11-08', 'Female', 'paris', ' France ', '../avatar/1610111068.png'),
(30, 'SaikiStrom', '$2y$10$HyilPs0IppC2Auw1SVbXKe/sYRGttuMkJqWHbuM8q4k1.QeKmTWIe', 'saikistrom@gmail.com', 'nn', '0000-00-00', 'Inconnu', 'Ville non renseignée', '	Pays non renseigné', '../avatar/1609963403.png'),
(31, 'jspsah', '$2y$10$mcWfJTA0hKsZ4m2gWs.AH.h/tLBiUfsYfv3LAeUyjohzBw6gDpYvW', 'ok@gmail.com', 'Pas encore de bio', '0000-00-00', 'Inconnu', 'Ville non renseignée', 'Pays non renseigné', 'https://i.imgur.com/9l5hPnr.jpg'),
(32, 'okaaaaaaaa', '$2y$10$mpxTfoBXtLiYcdZpGb4VaOZh/kRj8T7CrGkKDKoEq.qdiXhhgnKfq', 'ok@gmail.com', 'a', '0000-00-00', '', 'Pays non renseigné', 'Ville non renseignée', 'https://i.imgur.com/9l5hPnr.jpg'),
(33, 'ashlebg', '$2y$10$msp8w4NMcRxGn20Mjm5CW.6uvR.dMNwQj9T3W8.iPUiirlnQ3qPKe', 'yatsulebg@gmail.com', '', '0000-00-00', '', 'Pays non renseigné', 'Ville non renseignée', 'https://i.imgur.com/9l5hPnr.jpg'),
(34, 'alloooo', '$2y$10$sXHX/AbDQA1Q8m0aSTFniuGG/j/OS8BY5AGt7f.2qPEQyRs75GBnO', 'alloooo@gmail.com', '', '0000-00-00', '', 'Pays non renseigné', 'Ville non renseignée', 'https://i.imgur.com/9l5hPnr.jpg'),
(35, 'okkkk', '$2y$10$6.Xix3c4o/jnBZyVvCnHu.lVGr.t6UNMewrvIZA10pnDbFFYbCCWi', 'okkkkkk@gmail.com', 'ok', '0000-00-00', '', 'Pays non renseigné', 'Ville non renseignée', 'https://i.imgur.com/9l5hPnr.jpg'),
(36, 'gggg', '$2y$10$/w8sBOo9//g7FCjhVo5QI.0R.zskGtZp61BeqONHB5YtRJPhEo/rq', 'alorstutetaisstp@gma', '', '0000-00-00', '', 'Pays non renseigné', 'Ville non renseignée', 'https://i.imgur.com/9l5hPnr.jpg'),
(37, 'yatsu', '$2y$10$cRDpk6fUlBK0MqaCzO3BR.X5WUeqHyRt7FTdZ6XAA8TpBQ31N53S.', 'oksigbnri@gmail.com', 'okkkkkk', '0000-00-00', '', 'Pays non renseigné', 'Ville non renseignée', 'https://i.imgur.com/9l5hPnr.jpg'),
(38, 'Abd', '$2y$10$LaiCtmn10ClhewBEa.mAQetpZrvEpRYloRP8c1wbM6wNwvFFrHdBe', 'abdel.saeairashi@outlook.', 'abd', '0000-00-00', '', 'Pays non renseigné', 'Ville non renseignée', 'https://i.imgur.com/9l5hPnr.jpg'),
(39, 'Dio Brando', '$2y$10$Z2ZEZeKay8lLaQnNqS401eZRJbokxscYSQf4Z2gOYp7x7/Z7ga2wS', 'zaksazaeoufi.dz@gmail.co', '', '0000-00-00', '', 'Pays non renseigné', '', '../avatar/1610044766.jpg'),
(40, 'Mahdiy', '$2y$10$ZUJIa9VZjUfXjzipSFDIHuYqKfC/fiyROqwYdtrp.FV8GC4EoEZEG', 'nozerdxes934@gmail.com', 'Salut je suis un dragon', '1998-05-14', 'Male', 'Saint-Ouen-Zoo', ' Algérie ', 'https://i.imgur.com/9l5hPnr.jpg'),
(41, 'Salut', '$2y$10$3N19tHb32fZxSeXMhvMFTuvtrqzKBRZ7svSSOngntwB5nYpWXik4S', 'test@gmail.com', 'yoooooooo', '0000-00-00', '', 'Pays non renseigné', 'Ville non renseignée', 'https://i.imgur.com/9l5hPnr.jpg'),
(42, 'okok', '$2y$10$6avjB5oeITRXAWHYf6K9/egN64Tc5KuOCwLS/HQlCg3eh9FgQffVq', 'hoqsseininarater92@gmail', 'okok', '0000-00-00', '', 'Pays non renseigné', 'Ville non renseignée', 'https://i.imgur.com/9l5hPnr.jpg'),
(43, 'AmineSbh', '$2y$10$1NyoiwoF6lYJNdqUyT7yIumtZWpQNREv68WD9VnjnDUuqN8Eu00/G', 'amineUcp@gmail.com', 'Etudiant informatique', '1998-08-20', 'Male', 'Chambly', ' France ', '../avatar/1610098079.png'),
(44, 'Hossein', '$2y$10$e/vL0lwvEz482BJkdROyLOqFGcNOQI/is0S9.DqyyP7s5h0IKyIqW', 'hzaeoseseiniaaaanter92@gmail', 'Bonjour les amis', '0000-00-00', '', 'Pays non renseigné', '', '../avatar/1610107254.jpg'),
(45, 'Ayoub', '$2y$10$R/PnflUIE59VugtJO94sYOPzlxARwIdR7/ErBosAee2mnW1EumJTi', 'projet20201@gmail.co', 'Salutations', '0000-00-00', '', 'Pays non renseigné', 'Ville non renseignée', 'https://i.imgur.com/9l5hPnr.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aimer`
--
ALTER TABLE `aimer`
  ADD PRIMARY KEY (`aimer_id`);

--
-- Indexes for table `Conversation`
--
ALTER TABLE `Conversation`
  ADD PRIMARY KEY (`id_conversation`),
  ADD KEY `id_user1` (`id_user1`),
  ADD KEY `id_user2` (`id_user2`);

--
-- Indexes for table `friend_request`
--
ALTER TABLE `friend_request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `media_table`
--
ALTER TABLE `media_table`
  ADD PRIMARY KEY (`media_id`);

--
-- Indexes for table `posts_table`
--
ALTER TABLE `posts_table`
  ADD PRIMARY KEY (`posts_id`);

--
-- Indexes for table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aimer`
--
ALTER TABLE `aimer`
  MODIFY `aimer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `Conversation`
--
ALTER TABLE `Conversation`
  MODIFY `id_conversation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `friend_request`
--
ALTER TABLE `friend_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `media_table`
--
ALTER TABLE `media_table`
  MODIFY `media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `posts_table`
--
ALTER TABLE `posts_table`
  MODIFY `posts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Conversation`
--
ALTER TABLE `Conversation`
  ADD CONSTRAINT `Conversation_ibfk_1` FOREIGN KEY (`id_user1`) REFERENCES `Utilisateur` (`id_user`),
  ADD CONSTRAINT `Conversation_ibfk_2` FOREIGN KEY (`id_user2`) REFERENCES `Utilisateur` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
