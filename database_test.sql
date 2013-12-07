-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 07, 2013 at 03:17 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ci_easy_crud_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_name`) VALUES
(1, 'Group 1'),
(2, 'Group 2'),
(3, 'Group 3'),
(4, 'Group 4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `group_id` tinyint(2) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=201 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `group_id`, `active`) VALUES
(1, 'User 1', 'user1', 'b3daa77b4c04a9551b8781d03191fe098f325e67', 'user1@sample.com', 4, 1),
(2, 'User 2', 'user2', 'a1881c06eec96db9901c7bbfe41c42a3f08e9cb4', 'user2@sample.com', 1, 1),
(3, 'User 3', 'user3', '0b7f849446d3383546d15a480966084442cd2193', 'user3@sample.com', 2, 1),
(4, 'User 4', 'user4', '06e6eef6adf2e5f54ea6c43c376d6d36605f810e', 'user4@sample.com', 1, 1),
(5, 'User 5', 'user5', '7d112681b8dd80723871a87ff506286613fa9cf6', 'user5@sample.com', 1, 1),
(6, 'User 6', 'user6', '312a46dc52117efa4e3096eda510370f01c83b27', 'user6@sample.com', 3, 1),
(7, 'User 7', 'user7', '7bdeecc97cf8f9b9188ba2751aa1755dad9ff819', 'user7@sample.com', 4, 1),
(8, 'User 8', 'user8', 'a14c955bda572b817deccc3a2135cc5f2518c1d3', 'user8@sample.com', 3, 1),
(9, 'User 9', 'user9', '86f28434210631fa6bda6db990aba7391f512774', 'user9@sample.com', 3, 1),
(10, 'User 10', 'user10', 'd089da97b9e447158a0466d15fe291f2c43b982e', 'user10@sample.com', 3, 1),
(11, 'User 11', 'user11', '3d5cbfed48ce23d2f0dc0a0baa3ec2ee93867b2b', 'user11@sample.com', 4, 1),
(12, 'User 12', 'user12', 'e45ed40f34005e1636649ab18bbd16ada02cb251', 'user12@sample.com', 3, 1),
(13, 'User 13', 'user13', 'd6fa2beb1c302491b40f447d8784fc0bcce1ca8e', 'user13@sample.com', 1, 1),
(14, 'User 14', 'user14', 'be17881e010a71c3fa3f4e9650242341c764b39a', 'user14@sample.com', 1, 1),
(15, 'User 15', 'user15', '5de2a2a23e0b3beee08b75a6b0c0cd3847f0d7be', 'user15@sample.com', 3, 1),
(16, 'User 16', 'user16', 'bbe2aeb4e25b2b007eb4b63d59bdf4ad6be2378b', 'user16@sample.com', 3, 1),
(17, 'User 17', 'user17', 'd47e69ada060f488a539a1383dac8275b76d9dd5', 'user17@sample.com', 4, 1),
(18, 'User 18', 'user18', '5484904228e84abd75e235c359d3dcffc222583c', 'user18@sample.com', 2, 1),
(19, 'User 19', 'user19', '95bb0330ffec243b47d3916e7ccf507e27fd5c2d', 'user19@sample.com', 2, 1),
(20, 'User 20', 'user20', '6571420001ed3ab44b515e25ccd5877195a5da6b', 'user20@sample.com', 3, 1),
(21, 'User 21', 'user21', '163314f09e8aaf4472274c78bd520d915a7a4711', 'user21@sample.com', 1, 1),
(22, 'User 22', 'user22', '1ded2e3c92caf7b7082534acbd3aa63ba729d53f', 'user22@sample.com', 1, 1),
(23, 'User 23', 'user23', '7b11d0e5c4e8a2a089111d86b36a2ffa8409e2e2', 'user23@sample.com', 2, 1),
(24, 'User 24', 'user24', '18727a62524792efc6f1d6c77825901e00bbcc26', 'user24@sample.com', 1, 1),
(25, 'User 25', 'user25', '8b7c6961ad485cbd1bb703cc716778ffba5796d3', 'user25@sample.com', 4, 1),
(26, 'User 26', 'user26', '231beaba6c347708daf2d19e5f257a1557114d11', 'user26@sample.com', 4, 1),
(27, 'User 27', 'user27', '4126622a7e5047020c093ee88e686d7107e68476', 'user27@sample.com', 3, 1),
(28, 'User 28', 'user28', '2985f7a35e87e4ab65e12e2089a4d5a0ca7a95b1', 'user28@sample.com', 1, 1),
(29, 'User 29', 'user29', 'b65dd2ee27376a9d4d6ab4d038424ea15c9cb92b', 'user29@sample.com', 2, 1),
(30, 'User 30', 'user30', 'e9ffd54866e79ef837b8f376c44e7325d65f6969', 'user30@sample.com', 3, 1),
(31, 'User 31', 'user31', '075146c5e014723717539ed022b8515cd4903be2', 'user31@sample.com', 3, 1),
(32, 'User 32', 'user32', 'f3c41043ce753ede3017f8b21dbac8d34af8eb7d', 'user32@sample.com', 3, 1),
(33, 'User 33', 'user33', '440689149348083e442edbc25f3227650c346c27', 'user33@sample.com', 4, 1),
(34, 'User 34', 'user34', '48f4e1d4d2d201b0608cf032c48066842135aa6c', 'user34@sample.com', 2, 1),
(35, 'User 35', 'user35', '8cb8a308c404a31e3bac28fb29c79e3894e7d965', 'user35@sample.com', 2, 1),
(36, 'User 36', 'user36', '95ac1c4f9ef194240ee5e40ea6c4f50f9285b08e', 'user36@sample.com', 3, 1),
(37, 'User 37', 'user37', '5753c716035f48ce59d56c66d0ba03984ee017d8', 'user37@sample.com', 1, 1),
(38, 'User 38', 'user38', 'cb3b0cce14ebf6bdf2f045be1477d39c60285532', 'user38@sample.com', 1, 1),
(39, 'User 39', 'user39', '4b059de04dc00b947648cf75b4fdcccb9f6ad880', 'user39@sample.com', 1, 1),
(40, 'User 40', 'user40', '2d2e938d65234672e2a66f88c2bc1eccafa8ffad', 'user40@sample.com', 2, 1),
(41, 'User 41', 'user41', 'f2401778850e52d64a6bc3b51886f6983c44d810', 'user41@sample.com', 3, 1),
(42, 'User 42', 'user42', 'fa2d1c9a22c9fbbe8e357a37d15e2505cb47733a', 'user42@sample.com', 1, 1),
(43, 'User 43', 'user43', '4b2f84529047da089ff00aec0e6bd3bf2e8e6d92', 'user43@sample.com', 2, 1),
(44, 'User 44', 'user44', '3a289e987993f35bd56100cf693d879491710bbf', 'user44@sample.com', 2, 1),
(45, 'User 45', 'user45', '3e86f0b5ee42d9e8ac874a82c89733ef9b1fb9c1', 'user45@sample.com', 2, 1),
(46, 'User 46', 'user46', 'c0c973ff32ec66865f4ca5ea4792f083e3db86ba', 'user46@sample.com', 2, 1),
(47, 'User 47', 'user47', 'f9fea5da153cfbb54021cdb5bc1a2d1ee9d9e710', 'user47@sample.com', 4, 1),
(48, 'User 48', 'user48', '25396d3ae6192ed05d588c5356016479b12ffb2f', 'user48@sample.com', 4, 1),
(49, 'User 49', 'user49', '18c078f39d42ccad5e6983899612c67d150ad8d8', 'user49@sample.com', 2, 1),
(50, 'User 50', 'user50', 'dc1ed9f43eb025bd2d161ca69877ef9ded793471', 'user50@sample.com', 2, 1),
(51, 'User 51', 'user51', 'e00cd671b88e5a475964c73597e2e1fa18506847', 'user51@sample.com', 2, 1),
(52, 'User 52', 'user52', 'f1f74a6a5e58fd07302ecccf27582e102729ca6f', 'user52@sample.com', 2, 1),
(53, 'User 53', 'user53', '9456aa70855f9c328bc8f462e1c0393a7a8b7ed5', 'user53@sample.com', 4, 1),
(54, 'User 54', 'user54', '096335f4933bd419029961cb391cf3d250853f00', 'user54@sample.com', 2, 1),
(55, 'User 55', 'user55', '17569bed06956c36ed067c32380c82d25a82e2a2', 'user55@sample.com', 2, 1),
(56, 'User 56', 'user56', 'edaf30fe2718d273da043562ef22b7f0954b64e7', 'user56@sample.com', 1, 1),
(57, 'User 57', 'user57', '38073b033a1811e6c37497c0408734e00ea22853', 'user57@sample.com', 2, 1),
(58, 'User 58', 'user58', '0151b09d30fece47a252d95e609fb21bb6d1d6bf', 'user58@sample.com', 2, 1),
(59, 'User 59', 'user59', 'd529e587642d4c61720531526aa44c299acfbbf9', 'user59@sample.com', 4, 1),
(60, 'User 60', 'user60', '069f27ccdb9dab4b93aa6cc8a6b34fd429015a4b', 'user60@sample.com', 1, 1),
(61, 'User 61', 'user61', '123eb19eb2d06df14a43edf0cc9371d5065d1828', 'user61@sample.com', 1, 1),
(62, 'User 62', 'user62', 'ae62edeb88f78489d5836236d1037f6cd481675c', 'user62@sample.com', 3, 1),
(63, 'User 63', 'user63', '4de7935cf3a38ab6d94fe14048103977dfb2651e', 'user63@sample.com', 3, 1),
(64, 'User 64', 'user64', '0ab402f20814d5ded5e70926ee11f5bcc070b196', 'user64@sample.com', 2, 1),
(65, 'User 65', 'user65', '14cdbb5b1c6529f8985a0dfdb4009ae796e4fbea', 'user65@sample.com', 4, 1),
(66, 'User 66', 'user66', '80d11b8d3c22ce7e0ebc064ab71d9a2de48478e6', 'user66@sample.com', 1, 1),
(67, 'User 67', 'user67', '170672d3e88f930f725d03fac4f23f56050d024f', 'user67@sample.com', 1, 1),
(68, 'User 68', 'user68', '84bac8425efa9a77bc552220f5af126c1d41afe2', 'user68@sample.com', 3, 1),
(69, 'User 69', 'user69', '13d5f43726da853c07caf78371d9106c4c27d1d2', 'user69@sample.com', 1, 1),
(70, 'User 70', 'user70', '988b8b7647ee7aba87deb60391ea8173f4389f83', 'user70@sample.com', 1, 1),
(71, 'User 71', 'user71', '25f6a9c9380180bf7faed131ef8b5ab7784d0e0b', 'user71@sample.com', 2, 1),
(72, 'User 72', 'user72', '8a76b1f84a587ba69d9e3c2de4327899f0df49c0', 'user72@sample.com', 3, 1),
(73, 'User 73', 'user73', 'a9916afa423ea098360f42dc19eeafbba7a13bad', 'user73@sample.com', 1, 1),
(74, 'User 74', 'user74', '6285b916e80f8272ef19ebe02aab68e74afdd149', 'user74@sample.com', 1, 1),
(75, 'User 75', 'user75', '8a0fa0895bbae83ddbdb2686c9b27ab8ffbc8c0b', 'user75@sample.com', 3, 1),
(76, 'User 76', 'user76', 'b349642c4438f9f36d43c157aee7b4f055c38273', 'user76@sample.com', 2, 1),
(77, 'User 77', 'user77', '4aece224ee11661ac90f9dbd3558117ad188348c', 'user77@sample.com', 3, 1),
(78, 'User 78', 'user78', '9c04aa02d37da547cc826779f87c83f04e35a33b', 'user78@sample.com', 2, 1),
(79, 'User 79', 'user79', '02db86e74520d8d8f7947305d26a69467123da16', 'user79@sample.com', 4, 1),
(80, 'User 80', 'user80', '3eed41378da8f4d07a80bf49d5ac247fb8ca77d4', 'user80@sample.com', 3, 1),
(81, 'User 81', 'user81', '57c561c52372a2485ce648fd4b40ff24418cfecf', 'user81@sample.com', 4, 1),
(82, 'User 82', 'user82', 'a79fad99d5f6e11a6263b3cb2076383be8372634', 'user82@sample.com', 3, 1),
(83, 'User 83', 'user83', '9ab9a759a57e41b929d967d1194c65c786103440', 'user83@sample.com', 4, 1),
(84, 'User 84', 'user84', '1c9ff7f0014fc0f8483c504c7943fdc9c12f582f', 'user84@sample.com', 3, 1),
(85, 'User 85', 'user85', '56226d47220ac033f3fa0c217e7d5fad17b65d22', 'user85@sample.com', 1, 1),
(86, 'User 86', 'user86', 'a481e75ad6fa974d0be5dea2b0e038bad7a0d0f6', 'user86@sample.com', 1, 1),
(87, 'User 87', 'user87', 'e359e345f710129c9f18253b7dc5e65b3a5fc1a2', 'user87@sample.com', 3, 1),
(88, 'User 88', 'user88', '12d9b9b1f2dc6d48249eb8bd4a094f2eb0e3a88a', 'user88@sample.com', 2, 1),
(89, 'User 89', 'user89', '2605811cab817a0c4565d3a96b895afa3f09ec9c', 'user89@sample.com', 2, 1),
(90, 'User 90', 'user90', 'cf60d19e237041c6bd43a181f51f5b8b9b66fa67', 'user90@sample.com', 1, 1),
(91, 'User 91', 'user91', 'a8ccf87e2db5a7fd9af38373caf30432eab7cfd8', 'user91@sample.com', 1, 1),
(92, 'User 92', 'user92', '6b1439b1dc38cafdb9cf4796022847b5ed7a4a27', 'user92@sample.com', 2, 1),
(93, 'User 93', 'user93', '44978ef49697f8706e58923026451caa0e9bc169', 'user93@sample.com', 3, 1),
(94, 'User 94', 'user94', 'f49ff7a9a74f8d2e172d417d35f09852c72c405d', 'user94@sample.com', 1, 1),
(95, 'User 95', 'user95', '755ffa66297c333175dc6f4723a3968ed47937f5', 'user95@sample.com', 3, 1),
(96, 'User 96', 'user96', '9a9974cf41da57b0b09953346312e723591ce1fa', 'user96@sample.com', 2, 1),
(97, 'User 97', 'user97', 'f2c145bace703602b679ffe7f41199b7b813765c', 'user97@sample.com', 4, 1),
(98, 'User 98', 'user98', '3b017089619874b7572e6bc436906ed9385f05e2', 'user98@sample.com', 1, 1),
(99, 'User 99', 'user99', 'b96aed26c6b8ecd64a450ce4ba2cd00f3b66b53c', 'user99@sample.com', 4, 1),
(100, 'User 100', 'user100', '2ec3148066ef19b14fdb83e9d19ef8951b6c79be', 'user100@sample.com', 4, 1),
(101, 'User 101', 'user101', 'dd35efc6dc79cfc5620b8d480f45d8abbb907299', 'user101@sample.com', 4, 1),
(102, 'User 102', 'user102', 'bc30d61b61733e7ef6159b745081eac40dc3ab6e', 'user102@sample.com', 2, 1),
(103, 'User 103', 'user103', '7265ffdc8bcf923b15a96438807b47d00336036f', 'user103@sample.com', 2, 1),
(104, 'User 104', 'user104', '663efd436c85c6ef0e4dd730b18c5a087f512742', 'user104@sample.com', 1, 1),
(105, 'User 105', 'user105', '15117d9819eddfa4633bc287c57b3e4499a2fd6e', 'user105@sample.com', 4, 1),
(106, 'User 106', 'user106', '7b900f2658ad4a2c1beddb3e86bb85f441b1b033', 'user106@sample.com', 3, 1),
(107, 'User 107', 'user107', '89a94c2f5c1a2b17beff1531b0ef0434a4aa1e14', 'user107@sample.com', 3, 1),
(108, 'User 108', 'user108', 'ce01050bcb691889e2f557eadc71c99d8452eb41', 'user108@sample.com', 4, 1),
(109, 'User 109', 'user109', '47a8368f03d125a0cb347cd1229d5653b0761e9d', 'user109@sample.com', 3, 1),
(110, 'User 110', 'user110', '0134af17eb46d50588a82b9b4e8b215286e37e55', 'user110@sample.com', 3, 1),
(111, 'User 111', 'user111', 'f8781c346613322d157b5f9a26cc85591f5cc96d', 'user111@sample.com', 4, 1),
(112, 'User 112', 'user112', '77505c8a4218a33d0f213d0da2444b201bacc7f9', 'user112@sample.com', 4, 1),
(113, 'User 113', 'user113', 'a5aa3b2ec72a162ff55bafcb154f8d14b53d09af', 'user113@sample.com', 1, 1),
(114, 'User 114', 'user114', '8c4301ecd64dbd41057d7e60338d19dd69dcb8c5', 'user114@sample.com', 2, 1),
(115, 'User 115', 'user115', '0721a1e4218b02f9d9a09ca7be8d59264d948481', 'user115@sample.com', 3, 1),
(116, 'User 116', 'user116', 'bfbad12a0f001f952e7948442f3ff97ef575f3cc', 'user116@sample.com', 1, 1),
(117, 'User 117', 'user117', '962fc0298596644fa5523bd0e881e242be8f2c40', 'user117@sample.com', 2, 1),
(118, 'User 118', 'user118', 'fcdb63eb93159e418b4f48c2dbb161e0eccc93d3', 'user118@sample.com', 1, 1),
(119, 'User 119', 'user119', '805f3bff383d37f5ac5ec4ebb6233e3867051c4a', 'user119@sample.com', 2, 1),
(120, 'User 120', 'user120', '61b485afc0cc55776690cfa7898321ffb77c94d1', 'user120@sample.com', 1, 1),
(121, 'User 121', 'user121', 'a52136f907566a7450de4973db480d158987d3fb', 'user121@sample.com', 2, 1),
(122, 'User 122', 'user122', '0823ae15e3832704258e67573b531185576514a1', 'user122@sample.com', 1, 1),
(123, 'User 123', 'user123', '95c946bf622ef93b0a211cd0fd028dfdfcf7e39e', 'user123@sample.com', 1, 1),
(124, 'User 124', 'user124', '21e43f6e8d88f4d8fd3148c3359b1b15dafb2497', 'user124@sample.com', 1, 1),
(125, 'User 125', 'user125', '09a7976f564134bcfe55a0c43d59bc3514ac1119', 'user125@sample.com', 1, 1),
(126, 'User 126', 'user126', '9d66d8303bae7ce011a82ae77171510aa55244fc', 'user126@sample.com', 1, 1),
(127, 'User 127', 'user127', 'd26380f3ffe71681192a6f19d67e65d6987e0cc2', 'user127@sample.com', 3, 1),
(128, 'User 128', 'user128', 'f653c65d68961a925060e1425c808df5908b4b7e', 'user128@sample.com', 3, 1),
(129, 'User 129', 'user129', 'c28784f7a43340748ba4ab5819b9d2b7f3989d4f', 'user129@sample.com', 3, 1),
(130, 'User 130', 'user130', '195b58d1a9c123e0884ff72b182d15b93fd99274', 'user130@sample.com', 3, 1),
(131, 'User 131', 'user131', 'eae43f71b5b4a285e6469d3d0324e4cc05f4ae5c', 'user131@sample.com', 2, 1),
(132, 'User 132', 'user132', '609c5e0bc4588ff1a82ae4ec0c876bdc79fc1a07', 'user132@sample.com', 3, 1),
(133, 'User 133', 'user133', 'c4802d2442d79189e261cf114a2ebd781f126279', 'user133@sample.com', 3, 1),
(134, 'User 134', 'user134', '4fe9ed8149955e9c1f3aafe53c075cb5ede26de0', 'user134@sample.com', 1, 1),
(135, 'User 135', 'user135', '73c4a9993f6463c3c61f7af9d14de860fb0da9b2', 'user135@sample.com', 1, 1),
(136, 'User 136', 'user136', 'f7491c92d32cf311c65214e9edc9e985ff8a70cb', 'user136@sample.com', 1, 1),
(137, 'User 137', 'user137', 'b81e389ef28b0c65f012e1bfa4ea65b35bc5e18e', 'user137@sample.com', 2, 1),
(138, 'User 138', 'user138', '92f9d0d7991ca84c79c1b8cca933afd1ec4eec9e', 'user138@sample.com', 2, 1),
(139, 'User 139', 'user139', '465ba84a5b82f86bca27bd50b8f540893843c637', 'user139@sample.com', 3, 1),
(140, 'User 140', 'user140', 'c2e33096bf6f2faa7a62fa4019b85b93d8968932', 'user140@sample.com', 4, 1),
(141, 'User 141', 'user141', '032943c8b4f4e68ca497483f5fd1265c6b77beca', 'user141@sample.com', 3, 1),
(142, 'User 142', 'user142', '45d793320c8f9aaa7a58c4714699e4ed01cff100', 'user142@sample.com', 1, 1),
(143, 'User 143', 'user143', 'e500bf5bc573c4addb6508d0c8e038d0dec571de', 'user143@sample.com', 4, 1),
(144, 'User 144', 'user144', 'a43943a30eee1682b13fc92115847b3e7106d7f0', 'user144@sample.com', 2, 1),
(145, 'User 145', 'user145', '1d5ebde083061efa6fb5b69eed8a50cc3626a501', 'user145@sample.com', 2, 1),
(146, 'User 146', 'user146', 'ff6dfd594100920c4a9ee23d2aadfd061e6840cf', 'user146@sample.com', 3, 1),
(147, 'User 147', 'user147', 'fa8dc850ff9fbf16f7bb7793c55aa671744b3946', 'user147@sample.com', 4, 1),
(148, 'User 148', 'user148', '7bcf8c2ab208fab709d3c4743dbb4a280007c44e', 'user148@sample.com', 1, 1),
(149, 'User 149', 'user149', 'bdeb6509923462fb9361ae4115eb4c51ba3fda6c', 'user149@sample.com', 3, 1),
(150, 'User 150', 'user150', '5363960e3640f765075fa9332d0712ed14045abe', 'user150@sample.com', 3, 1),
(151, 'User 151', 'user151', '9bd68ab34775d500aec47a4b6cf07fc48b8cff8b', 'user151@sample.com', 2, 1),
(152, 'User 152', 'user152', '0ad6f579615e24bf5490c0c6f2b732148b69c1e5', 'user152@sample.com', 1, 1),
(153, 'User 153', 'user153', 'c1b567cd3e217eaabb7d2030aadfd87d071f8f79', 'user153@sample.com', 2, 1),
(154, 'User 154', 'user154', 'c386f7e1014e7543ee34849f59cc22ed5cd0baa5', 'user154@sample.com', 3, 1),
(155, 'User 155', 'user155', 'a9bea1172d503e6542e53f7a8102480e15e96b40', 'user155@sample.com', 1, 1),
(156, 'User 156', 'user156', 'dbbe690983a90ea788ea2d3b9a213d00270d82d0', 'user156@sample.com', 1, 1),
(157, 'User 157', 'user157', '130e09dec2a0d1824544266e369f223939096a2c', 'user157@sample.com', 3, 1),
(158, 'User 158', 'user158', '9757aa889725e5c60a79d54e113c6f2bc345fb04', 'user158@sample.com', 2, 1),
(159, 'User 159', 'user159', 'd9065f06661c14cbb96db8d396ae8def023fcc81', 'user159@sample.com', 2, 1),
(160, 'User 160', 'user160', 'f53f737729b8289487c9d6858f1979c813ab40c9', 'user160@sample.com', 2, 1),
(161, 'User 161', 'user161', '9f557e6e0864a9831039b06f3bba13ce926851ee', 'user161@sample.com', 1, 1),
(162, 'User 162', 'user162', 'f5bebc3839707e0905a5eded2868b0a68c483f7e', 'user162@sample.com', 2, 1),
(163, 'User 163', 'user163', '31968ee6fd6264ad0838b9f4492a17c273d531ad', 'user163@sample.com', 3, 1),
(164, 'User 164', 'user164', '64836572679c879de9bec6e21338d6fc52c3f52e', 'user164@sample.com', 4, 1),
(165, 'User 165', 'user165', '6bab0970b98e5bf32f5412635cfa7c2bee95b7b7', 'user165@sample.com', 2, 1),
(166, 'User 166', 'user166', '432b47ff394bed65cd3d66c89248be50441d24b0', 'user166@sample.com', 2, 1),
(167, 'User 167', 'user167', 'a58ea25cc9282b7e99e8639ea1527d7466ad1b75', 'user167@sample.com', 4, 1),
(168, 'User 168', 'user168', '3ba1d4b38c63e1d0b07dd60e3ebc35f34034a990', 'user168@sample.com', 2, 1),
(169, 'User 169', 'user169', '634ecd9094cfd6cf8cd929652839c3394033418f', 'user169@sample.com', 3, 1),
(170, 'User 170', 'user170', 'f325faa07e1980635b9e6a2b906d4e7b61904238', 'user170@sample.com', 3, 1),
(171, 'User 171', 'user171', '635b3b57216f2fc31ce85ef7037db04c2fe6fc91', 'user171@sample.com', 2, 1),
(172, 'User 172', 'user172', 'af0619fd2904f4d8289e127768d6ea63467072cd', 'user172@sample.com', 1, 1),
(173, 'User 173', 'user173', '392fe4249ab5308447a86f678f22aa160adf8f7f', 'user173@sample.com', 2, 1),
(174, 'User 174', 'user174', '3b435336d9d61f51fe4020555df7c932ec0bb2fe', 'user174@sample.com', 1, 1),
(175, 'User 175', 'user175', '9d13075666ebfce2d955e9389de895233dd135d8', 'user175@sample.com', 2, 1),
(176, 'User 176', 'user176', '9ec932e420332896d1cf15aed6e042cb943a5850', 'user176@sample.com', 2, 1),
(177, 'User 177', 'user177', 'd5f25349e1c62f172b604cf5ad3e6edf7e6157ce', 'user177@sample.com', 2, 1),
(178, 'User 178', 'user178', 'abfb12a01573a966ca7c4e8ba36820825ca53afc', 'user178@sample.com', 1, 1),
(179, 'User 179', 'user179', '613d3d839809762f44a9a416ac8a22b3d5a129b0', 'user179@sample.com', 2, 1),
(180, 'User 180', 'user180', '1f6bfbe0333bcf5569f3ba2b6317c63dd2829a46', 'user180@sample.com', 2, 1),
(181, 'User 181', 'user181', 'bc6a733a43607affefbe15e3890448b76adc6bd6', 'user181@sample.com', 3, 1),
(182, 'User 182', 'user182', 'd1195b3db4d259dcb5786a6bdd989080fd47ae7b', 'user182@sample.com', 2, 1),
(183, 'User 183', 'user183', '5b79a68510cb3975444fe610d4700dae8bfe9173', 'user183@sample.com', 4, 1),
(184, 'User 184', 'user184', 'd9f5e4b59ef715da38f9e5b34cfa78667333215e', 'user184@sample.com', 3, 1),
(185, 'User 185', 'user185', 'b53f6b71ae86ac0a4f5eec1c12454b5ef33af465', 'user185@sample.com', 1, 1),
(186, 'User 186', 'user186', '36f8fdb1931c62b841d65e85d88447d8aa8b165f', 'user186@sample.com', 2, 1),
(187, 'User 187', 'user187', '4fb3e99e03c1e5247b3671b6a42b7b2781280568', 'user187@sample.com', 4, 1),
(188, 'User 188', 'user188', '883c2e7dba4b64f4266128b388d22a8758a522fc', 'user188@sample.com', 3, 1),
(189, 'User 189', 'user189', '272a904adb81514016d7cababf0f2e84a1a2a22c', 'user189@sample.com', 4, 1),
(190, 'User 190', 'user190', '29f3be9f95e0b06bb0bbddaac66361aad5d17412', 'user190@sample.com', 1, 1),
(191, 'User 191', 'user191', 'abdd7238081a62cc308485654770cd0f5f1b2ee8', 'user191@sample.com', 1, 1),
(192, 'User 192', 'user192', '40456a947f3f9aa5e1952474943f9cc6b8e28385', 'user192@sample.com', 2, 1),
(193, 'User 193', 'user193', '5465c4434c3aafc51101fd130cdd245baf1aa805', 'user193@sample.com', 3, 1),
(194, 'User 194', 'user194', '284233c18d342e2876fe3e5219f744dbf245e61d', 'user194@sample.com', 3, 1),
(195, 'User 195', 'user195', 'a9d4cff9f24c5f8d9bb88aba39d2831457f76320', 'user195@sample.com', 4, 1),
(196, 'User 196', 'user196', '96c451f0d16d0383313304cbcf9de36285b80ef1', 'user196@sample.com', 2, 1),
(197, 'User 197', 'user197', 'fa0fe0f7289c7e8be707589529c5227e8277f37c', 'user197@sample.com', 3, 1),
(198, 'User 198', 'user198', 'fd65348c0eaa035d4001e04ca71b30d7a182038f', 'user198@sample.com', 4, 1),
(199, 'User 199', 'user199', '3a252d2b9e6ff95cabb9fe5bb2c447f481088fbf', 'user199@sample.com', 2, 1),
(200, 'User 200', 'user200', 'cb9bba873ca89b52ae703799d787368e53771727', 'user200@sample.com', 1, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
