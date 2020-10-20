-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2020 at 05:55 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `isbn` bigint(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `description`, `quantity`, `isbn`) VALUES
(1, 'clean code ', 'Robert C. Martin', 16, 9780132350884),
(2, 'The Legend of Zelda', 'Shigeru Miyamoto ', 23, 9781616550417),
(3, 'Don\'t Make Me Think, Revisited', 'Steve Krug', 11, 9780321965516),
(4, 'Godel, Escher, Bach', 'Douglas R. Hofstadter', 22, 9780465026562),
(5, 'Superintelligence', 'Nick Bostrom', 21, 9780198739838),
(6, 'Web Design with HTML, CSS, JavaScript and jQuery Set', 'Jon Duckett', 12, 9781118907443),
(7, 'Cracking the Coding Interview', 'Gayle Laakmann McDowell', 5, 9780984782857),
(8, 'The Internet is a Playground', 'David Thorne', 7, 9781585428816),
(9, 'DanTDM: Trayaurus and the Enchanted Crystal', 'DanTDM', 27, 9781409168393),
(10, 'Life 3.0', 'Max Tegmark', 50, 9780141981802),
(11, 'Alan Turing: The Enigma', 'Andrew Hodges', 33, 9781784700089),
(12, 'The Pragmatic Programmer', 'Andrew Hunt', 23, 9780201616224),
(13, 'Weapons of Math Destruction', 'Cathy O\'neil', 56, 9780141985411),
(14, 'Digital Minimalism', 'Cal Newport', 12, 9780241341131),
(15, 'HTML and CSS', 'Jon Duckett', 22, 9781118008188),
(16, 'Clean Architecture', 'Robert C. Martin', 41, 9780134494166),
(17, 'Design Patterns', 'Erich Gamma', 23, 9780201633610),
(18, 'The Clean Coder', 'Robert C. Martin', 21, 9780137081073),
(19, 'World Of Warcraft: Chronicle Volume 1', 'Blizzard', 12, 9781616558451),
(20, 'Hands-On Machine Learning with Scikit-Learn and TensorFlow', 'Aurelien Geron', 5, 9781491962299),
(21, 'Code Complete', 'Steve McConnell', 7, 9780735619678),
(22, 'Head First Design Patterns', 'Eric Freeman', 27, 9780596007126),
(23, 'Never Eat Alone', 'Keith Ferrazzi', 51, 9780241004951),
(24, 'The Shallows', 'Nicholas Carr', 33, 9780393339758),
(25, 'Discovering Statistics Using IBM SPSS Statistics', 'Andy Field', 23, 9781526419521),
(26, 'Designing Data-Intensive Applications', 'Martin Kleppmann', 56, 9781449373320),
(27, 'SPSS Survival Manual', 'Julie Pallant', 11, 9781760291952),
(28, 'Code', 'Charles Petzold', 23, 9780735611313),
(29, 'JavaScript: The Good Parts', 'Douglas Crockford', 12, 9780596517748),
(30, 'Automate The Boring Stuff With Python', 'Al Sweigart', 31, 9781593275990),
(31, 'R for Data Science', 'Garrett Grolemund', 21, 9781491910399),
(32, 'World Of Warcraft Chronicle Volume 2', 'Blizzard Entertainment', 34, 9781616558468),
(33, 'The Mythical Man-Month', 'Frederick P. Brooks Jr.', 26, 9780201835953),
(34, 'Algorithms to Live By', 'Brian Christian', 27, 9780007547999),
(35, 'This is Service Design Doing', 'Adam Lawrence', 18, 9781491927182),
(36, 'All Marketers are Liars', 'Seth Godin', 29, 9781591845331),
(37, 'Blood, Sweat, and Pixels', 'Jason Schreier', 36, 9780062651235),
(38, 'The Master Algorithm', 'Pedro Domingos', 76, 9780141979243),
(39, 'Head First Java', 'Kathy Sierra', 26, 9780596009205),
(40, 'Deep Learning', 'Yoshua Bengio', 44, 9780262035613),
(41, 'C Programming Language', 'Brian W. Kernighan', 43, 9780131103627),
(42, '100 Things Every Designer Needs to Know About People', 'Susan Weinschenk', 62, 9780321767530),
(43, 'Refactoring', 'Martin Fowler', 25, 9780134757599),
(44, 'Effective Java', 'Joshua Bloch', 2, 9780134685991),
(45, 'Python Pocket Reference', 'Mark Lutz', 35, 9781449357016),
(46, 'The Brand Gap', 'Marty Neumeier', 55, 9780321348104),
(47, 'Permanent Record', 'Edward Snowden', 21, 9781529035667),
(48, 'An Introduction to Statistical Learning', 'Gareth James', 9, 9781461471370),
(49, 'Hacking: The Art Of Exploitation, 2nd Edition', 'Jon Erickson', 3, 9781593271442),
(50, 'World Of Warcraft Chronicle Volume 3', 'Blizzard Entertainment', 26, 9781616558475),
(51, 'Python Crash Course (2nd Edition)', 'Eric Matthes', 4, 9781593279288),
(52, 'Mastering Bitcoin 2e', 'Andreas Antonopoulos', 12, 9781491954386),
(53, 'Data Science for Business', 'Foster Provost', 45, 9781449361327),
(54, 'Crushing It!', 'Gary Vaynerchuk', 21, 9780062674678),
(55, 'Capture Your Style:Transform Your Instagram Photos, Showcase Your', 'Aimee Song', 2, 9781419722158),
(56, 'Domain-Driven Design', 'Eric Evans', 12, 9780321125217),
(57, 'Building Microservices', 'Sam Newman', 5, 9781491950357),
(58, 'Accelerate', 'Nicole Forsgren', 34, 9781942788331),
(59, 'Running Lean', 'Ash Maurya', 21, 9781449305178),
(60, 'Legend Of Zelda, The: Art & Artifacts', 'Nintendo USA', 37, 9781506703350),
(61, 'The Art of Horizon', 'Paul Davies', 25, 9781785653636),
(62, 'slide:ology', 'Nancy Duarte', 2, 9780596522346),
(63, 'The Singularity is Near', 'Ray Kurzweil', 28, 9780143037880),
(64, 'User Story Mapping', 'Jeff Patton', 25, 9781491904909),
(65, 'Trust Me, I\'m Lying', 'Ryan Holiday', 38, 9781591846284),
(66, 'The Book of Why', 'Judea Pearl', 29, 9780141982410),
(67, 'Sekiro Shadows Die Twice, Official Game Guide', 'Future Press', 1, 9783869930947),
(68, 'Sidemen: The Book', 'The Sidemen', 18, 9781473648166),
(69, 'The World Of The Witcher', 'CD Projekt Red', 14, 9781616554828),
(70, 'Kill All Normies', 'Angela Nagle', 24, 9781785355431),
(71, 'Effective Modern C++', 'Scott Meyers', 21, 9781491903995),
(72, 'The Animator\'s Survival Kit', 'Richard E. Williams', 9, 9780571238347),
(73, 'Ghost In The Wires', 'Kevin D. Mitnick', 3, 9780316212182),
(74, 'Python for Data Analysis, 2e', 'Wes McKinney', 26, 9781491957660),
(75, 'Lean UX, 2e', 'Jeff Gothelf', 4, 9781491953600),
(76, 'The Mood Cure', 'Julia Ross', 12, 9780142003640),
(77, 'Logo Design Love', 'David Airey', 45, 9780321985200),
(78, 'The Art Of The Mass Effect Universe', 'Casey Hudson', 21, 9781595827685),
(79, 'Masters Of Doom', 'David Kushner', 2, 9780749924898),
(80, 'Hold Me Tight', 'Sue Johnson', 12, 9780316113007),
(81, 'Fluent Python', 'Luciano Ramalho', 5, 9781491946008),
(82, 'Everybody Lies', 'Seth Stephens-davidowitz', 34, 9780062390851),
(83, 'Storm King\'s Thunder', 'Wizards RPG Team', 21, 9780786966004),
(84, 'The Manager`s Path', 'Camille Fournier', 37, 9781491973899),
(85, 'The Art of Deception', 'Kevin D. Mitnick', 25, 9780764542800),
(86, 'Tales from the Yawning Portal', 'Wizards RPG Team', 2, 9780786966097),
(87, 'Get Coding! Learn HTML, CSS, and JavaScript and Build a Website, App, and Game', 'Young Rewired State', 28, 9781406366846),
(88, 'The Elements of Statistical Learning', 'Trevor Hastie', 25, 9780387848570),
(89, 'AI Superpowers', 'Kai-Fu Lee', 38, 9781328546395),
(90, 'Alibaba', 'Duncan Clark', 29, 9780062413413),
(91, 'The Digital Photography Book, Part 3', 'Scott Kelby', 1, 9780321617651),
(92, 'Discovering Statistics Using R', 'Andy Field', 18, 9781446200469),
(93, 'Learning Python', 'Mark Lutz', 14, 9781449355739),
(94, 'The Rise of the Robots', 'Martin Ford', 24, 9781780748481),
(95, 'C++ Primer', 'Stanley B. Lippman', 18, 9780321714114),
(96, 'Superintelligence', 'Nick Bostrom', 16, 9780199678112),
(97, 'Learn Python 3 the Hard Way', 'Zed A. Shaw', 25, 9780134692883),
(98, 'Coaching Agile Teams', 'Lyssa Adkins', 20, 9780321637703),
(99, 'Effective Java', 'Joshua Bloch', 10, 9780321356680),
(100, 'The Go Programming Language ', 'Alan Donovan', 17, 9780134190440);

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

CREATE TABLE `issue` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `bookID` int(11) NOT NULL,
  `tag` int(2) NOT NULL,
  `issueDate` date DEFAULT NULL,
  `returnDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issue`
--

INSERT INTO `issue` (`id`, `userID`, `bookID`, `tag`, `issueDate`, `returnDate`) VALUES
(8, 31, 3, -1, '2020-10-17', NULL),
(9, 31, 6, 2, '2020-10-17', '2020-10-20'),
(10, 31, 19, 2, '2020-10-17', '2020-10-18'),
(11, 31, 2, 2, '2020-10-17', '2020-10-18'),
(12, 32, 11, -1, '2020-10-17', NULL),
(13, 32, 41, 1, '2020-10-17', NULL),
(14, 32, 23, 2, '2020-10-17', '2020-10-18'),
(15, 32, 38, -1, '2020-10-17', NULL),
(18, 31, 4, 1, '2020-10-20', NULL),
(19, 33, 3, 1, '2020-10-20', NULL),
(20, 33, 19, 2, '2020-10-18', '2020-10-18'),
(21, 33, 2, -1, '2020-10-20', NULL),
(22, 33, 7, 2, '2020-10-20', '2020-10-20'),
(23, 33, 1, 0, NULL, NULL),
(24, 31, 10, -1, '2020-10-20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `paths`
--

CREATE TABLE `paths` (
  `id` int(11) NOT NULL,
  `file_name` text NOT NULL,
  `isbn` bigint(15) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paths`
--

INSERT INTO `paths` (`id`, `file_name`, `isbn`) VALUES
(1, '../dataset/0000001.jpg', 9780132350884),
(2, '../dataset/0000002.jpg', 9781616550417),
(3, '../dataset/0000003.jpg', 9780321965516),
(4, '../dataset/0000004.jpg', 9780465026562),
(5, '../dataset/0000005.jpg', 9780198739838),
(6, '../dataset/0000006.jpg', 9781118907443),
(7, '../dataset/0000007.jpg', 9780984782857),
(8, '../dataset/0000008.jpg', 9781585428816),
(9, '../dataset/0000009.jpg', 9781409168393),
(10, '../dataset/0000010.jpg', 9780141981802),
(11, '../dataset/0000011.jpg', 9781784700089),
(12, '../dataset/0000012.jpg', 9780201616224),
(13, '../dataset/0000013.jpg', 9780141985411),
(14, '../dataset/0000014.jpg', 9780241341131),
(15, '../dataset/0000015.jpg', 9781118008188),
(16, '../dataset/0000016.jpg', 9780134494166),
(17, '../dataset/0000017.jpg', 9780201633610),
(18, '../dataset/0000018.jpg', 9780137081073),
(19, '../dataset/0000019.jpg', 9781616558451),
(20, '../dataset/0000020.jpg', 9781491962299),
(21, '../dataset/0000021.jpg', 9780735619678),
(22, '../dataset/0000022.jpg', 9780596007126),
(23, '../dataset/0000023.jpg', 9780241004951),
(24, '../dataset/0000024.jpg', 9780393339758),
(25, '../dataset/0000025.jpg', 9781526419521),
(26, '../dataset/0000026.jpg', 9781449373320),
(27, '../dataset/0000027.jpg', 9781760291952),
(28, '../dataset/0000028.jpg', 9780735611313),
(29, '../dataset/0000029.jpg', 9780596517748),
(30, '../dataset/0000030.jpg', 9781593275990),
(31, '../dataset/0000031.jpg', 9781491910399),
(32, '../dataset/0000032.jpg', 9781616558468),
(33, '../dataset/0000033.jpg', 9780201835953),
(34, '../dataset/0000034.jpg', 9780007547999),
(35, '../dataset/0000035.jpg', 9781491927182),
(36, '../dataset/0000036.jpg', 9781591845331),
(37, '../dataset/0000037.jpg', 9780062651235),
(38, '../dataset/0000038.jpg', 9780141979243),
(39, '../dataset/0000039.jpg', 9780596009205),
(40, '../dataset/0000040.jpg', 9780262035613),
(41, '../dataset/0000041.jpg', 9780131103627),
(42, '../dataset/0000042.jpg', 9780321767530),
(43, '../dataset/0000043.jpg', 9780134757599),
(44, '../dataset/0000044.jpg', 9780134685991),
(45, '../dataset/0000045.jpg', 9781449357016),
(46, '../dataset/0000046.jpg', 9780321348104),
(47, '../dataset/0000047.jpg', 9781529035667),
(48, '../dataset/0000048.jpg', 9781461471370),
(49, '../dataset/0000049.jpg', 9781593271442),
(50, '../dataset/0000050.jpg', 9781616558475),
(51, '../dataset/0000051.jpg', 9781593279288),
(52, '../dataset/0000052.jpg', 9781491954386),
(53, '../dataset/0000053.jpg', 9781449361327),
(54, '../dataset/0000054.jpg', 9780062674678),
(55, '../dataset/0000055.jpg', 9781419722158),
(56, '../dataset/0000056.jpg', 9780321125217),
(57, '../dataset/0000057.jpg', 9781491950357),
(58, '../dataset/0000058.jpg', 9781942788331),
(59, '../dataset/0000059.jpg', 9781449305178),
(60, '../dataset/0000060.jpg', 9781506703350),
(61, '../dataset/0000061.jpg', 9781785653636),
(62, '../dataset/0000062.jpg', 9780596522346),
(63, '../dataset/0000063.jpg', 9780143037880),
(64, '../dataset/0000064.jpg', 9781491904909),
(65, '../dataset/0000065.jpg', 9781591846284),
(66, '../dataset/0000066.jpg', 9780141982410),
(67, '../dataset/0000067.jpg', 9783869930947),
(68, '../dataset/0000068.jpg', 9781473648166),
(69, '../dataset/0000069.jpg', 9781616554828),
(70, '../dataset/0000070.jpg', 9781785355431),
(71, '../dataset/0000071.jpg', 9781491903995),
(72, '../dataset/0000072.jpg', 9780571238347),
(73, '../dataset/0000073.jpg', 9780316212182),
(74, '../dataset/0000074.jpg', 9781491957660),
(75, '../dataset/0000075.jpg', 9781491953600),
(76, '../dataset/0000076.jpg', 9780142003640),
(77, '../dataset/0000077.jpg', 9780321985200),
(78, '../dataset/0000078.jpg', 9781595827685),
(79, '../dataset/0000079.jpg', 9780749924898),
(80, '../dataset/0000080.jpg', 9780316113007),
(81, '../dataset/0000081.jpg', 9781491946008),
(82, '../dataset/0000082.jpg', 9780062390851),
(83, '../dataset/0000083.jpg', 9780786966004),
(84, '../dataset/0000084.jpg', 9781491973899),
(85, '../dataset/0000085.jpg', 9780764542800),
(86, '../dataset/0000086.jpg', 9780786966097),
(87, '../dataset/0000087.jpg', 9781406366846),
(88, '../dataset/0000088.jpg', 9780387848570),
(89, '../dataset/0000089.jpg', 9781328546395),
(90, '../dataset/0000090.jpg', 9780062413413),
(91, '../dataset/0000091.jpg', 9780321617651),
(92, '../dataset/0000092.jpg', 9781446200469),
(93, '../dataset/0000093.jpg', 9781449355739),
(94, '../dataset/0000094.jpg', 9781780748481),
(95, '../dataset/0000095.jpg', 9780321714114),
(96, '../dataset/0000096.jpg', 9780199678112),
(97, '../dataset/0000097.jpg', 9780134692883),
(98, '../dataset/0000098.jpg', 9780321637703),
(99, '../dataset/0000099.jpg', 9780321356680),
(101, '../dataset/0000101.jpg', 9780132350884),
(102, '../dataset/0000102.jpg', 9781616550417),
(103, '../dataset/0000103.jpg', 9780321965516),
(104, '../dataset/0000104.jpg', 9780465026562),
(105, '../dataset/0000105.jpg', 9780198739838),
(106, '../dataset/0000106.jpg', 9781118907443),
(107, '../dataset/0000107.jpg', 9780984782857),
(108, '../dataset/0000108.jpg', 9781585428816),
(109, '../dataset/0000109.jpg', 9781409168393),
(110, '../dataset/0000110.jpg', 9780141981802),
(111, '../dataset/0000111.jpg', 9781784700089),
(112, '../dataset/0000112.jpg', 9780201616224),
(113, '../dataset/0000113.jpg', 9780141985411),
(114, '../dataset/0000114.jpg', 9780241341131),
(115, '../dataset/0000115.jpg', 9781118008188),
(116, '../dataset/0000116.jpg', 9780134494166),
(117, '../dataset/0000117.jpg', 9780201633610),
(118, '../dataset/0000118.jpg', 9780137081073),
(119, '../dataset/0000119.jpg', 9781616558451),
(120, '../dataset/0000120.jpg', 9781491962299),
(121, '../dataset/0000121.jpg', 9780735619678),
(122, '../dataset/0000122.jpg', 9780596007126),
(123, '../dataset/0000123.jpg', 9780241004951),
(124, '../dataset/0000124.jpg', 9780393339758),
(125, '../dataset/0000125.jpg', 9781526419521),
(126, '../dataset/0000126.jpg', 9781449373320),
(127, '../dataset/0000127.jpg', 9781760291952),
(128, '../dataset/0000128.jpg', 9780735611313),
(129, '../dataset/0000129.jpg', 9780596517748),
(130, '../dataset/0000130.jpg', 9781593275990),
(131, '../dataset/0000131.jpg', 9781491910399),
(132, '../dataset/0000132.jpg', 9781616558468),
(133, '../dataset/0000133.jpg', 9780201835953),
(134, '../dataset/0000134.jpg', 9780007547999),
(135, '../dataset/0000135.jpg', 9781491927182),
(136, '../dataset/0000136.jpg', 9781591845331),
(137, '../dataset/0000137.jpg', 9780062651235),
(138, '../dataset/0000138.jpg', 9780141979243),
(139, '../dataset/0000139.jpg', 9780596009205),
(140, '../dataset/0000140.jpg', 9780262035613),
(141, '../dataset/0000141.jpg', 9780131103627),
(142, '../dataset/0000142.jpg', 9780321767530),
(143, '../dataset/0000143.jpg', 9780134757599),
(144, '../dataset/0000144.jpg', 9780134685991),
(145, '../dataset/0000145.jpg', 9781449357016),
(146, '../dataset/0000146.jpg', 9780321348104),
(147, '../dataset/0000147.jpg', 9781529035667),
(148, '../dataset/0000148.jpg', 9781461471370),
(149, '../dataset/0000149.jpg', 9781593271442),
(150, '../dataset/0000150.jpg', 9781616558475),
(151, '../dataset/0000151.jpg', 9781593279288),
(152, '../dataset/0000152.jpg', 9781491954386),
(153, '../dataset/0000153.jpg', 9781449361327),
(154, '../dataset/0000154.jpg', 9780062674678),
(155, '../dataset/0000155.jpg', 9781419722158),
(156, '../dataset/0000156.jpg', 9780321125217),
(157, '../dataset/0000157.jpg', 9781491950357),
(158, '../dataset/0000158.jpg', 9781942788331),
(159, '../dataset/0000159.jpg', 9781449305178),
(160, '../dataset/0000160.jpg', 9781506703350),
(161, '../dataset/0000161.jpg', 9781785653636),
(162, '../dataset/0000162.jpg', 9780596522346),
(163, '../dataset/0000163.jpg', 9780143037880),
(164, '../dataset/0000164.jpg', 9781491904909),
(165, '../dataset/0000165.jpg', 9781591846284),
(166, '../dataset/0000166.jpg', 9780141982410),
(167, '../dataset/0000167.jpg', 9783869930947),
(168, '../dataset/0000168.jpg', 9781473648166),
(169, '../dataset/0000169.jpg', 9781616554828),
(170, '../dataset/0000170.jpg', 9781785355431),
(171, '../dataset/0000171.jpg', 9781491903995),
(172, '../dataset/0000172.jpg', 9780571238347),
(173, '../dataset/0000173.jpg', 9780316212182),
(174, '../dataset/0000174.jpg', 9781491957660),
(175, '../dataset/0000175.jpg', 9781491953600),
(176, '../dataset/0000176.jpg', 9780142003640),
(177, '../dataset/0000177.jpg', 9780321985200),
(178, '../dataset/0000178.jpg', 9781595827685),
(179, '../dataset/0000179.jpg', 9780749924898),
(180, '../dataset/0000180.jpg', 9780316113007),
(181, '../dataset/0000181.jpg', 9781491946008),
(182, '../dataset/0000182.jpg', 9780062390851),
(183, '../dataset/0000183.jpg', 9780786966004),
(184, '../dataset/0000184.jpg', 9781491973899),
(185, '../dataset/0000185.jpg', 9780764542800),
(186, '../dataset/0000186.jpg', 9780786966097),
(187, '../dataset/0000187.jpg', 9781406366846),
(188, '../dataset/0000188.jpg', 9780387848570),
(189, '../dataset/0000189.jpg', 9781328546395),
(190, '../dataset/0000190.jpg', 9780062413413),
(191, '../dataset/0000191.jpg', 9780321617651),
(192, '../dataset/0000192.jpg', 9781446200469),
(193, '../dataset/0000193.jpg', 9781449355739),
(194, '../dataset/0000194.jpg', 9781780748481),
(195, '../dataset/0000195.jpg', 9780321714114),
(196, '../dataset/0000196.jpg', 9780199678112),
(197, '../dataset/0000197.jpg', 9780134692883),
(198, '../dataset/0000198.jpg', 9780321637703),
(199, '../dataset/0000199.jpg', 9780321356680),
(201, '../dataset/0000201.jpg', 9780132350884),
(202, '../dataset/0000202.jpg', 9781616550417),
(203, '../dataset/0000203.jpg', 9780321965516),
(204, '../dataset/0000204.jpg', 9780465026562),
(205, '../dataset/0000205.jpg', 9780198739838),
(206, '../dataset/0000206.jpg', 9781118907443),
(207, '../dataset/0000207.jpg', 9780984782857),
(208, '../dataset/0000208.jpg', 9781585428816),
(209, '../dataset/0000209.jpg', 9781409168393),
(210, '../dataset/0000210.jpg', 9780141981802),
(211, '../dataset/0000211.jpg', 9781784700089),
(212, '../dataset/0000212.jpg', 9780201616224),
(213, '../dataset/0000213.jpg', 9780141985411),
(214, '../dataset/0000214.jpg', 9780241341131),
(215, '../dataset/0000215.jpg', 9781118008188),
(216, '../dataset/0000216.jpg', 9780134494166),
(217, '../dataset/0000217.jpg', 9780201633610),
(218, '../dataset/0000218.jpg', 9780137081073),
(219, '../dataset/0000219.jpg', 9781616558451),
(220, '../dataset/0000220.jpg', 9781491962299),
(221, '../dataset/0000221.jpg', 9780735619678),
(222, '../dataset/0000222.jpg', 9780596007126),
(223, '../dataset/0000223.jpg', 9780241004951),
(224, '../dataset/0000224.jpg', 9780393339758),
(225, '../dataset/0000225.jpg', 9781526419521),
(226, '../dataset/0000226.jpg', 9781449373320),
(227, '../dataset/0000227.jpg', 9781760291952),
(228, '../dataset/0000228.jpg', 9780735611313),
(229, '../dataset/0000229.jpg', 9780596517748),
(230, '../dataset/0000230.jpg', 9781593275990),
(231, '../dataset/0000231.jpg', 9781491910399),
(232, '../dataset/0000232.jpg', 9781616558468),
(233, '../dataset/0000233.jpg', 9780201835953),
(234, '../dataset/0000234.jpg', 9780007547999),
(235, '../dataset/0000235.jpg', 9781491927182),
(236, '../dataset/0000236.jpg', 9781591845331),
(237, '../dataset/0000237.jpg', 9780062651235),
(238, '../dataset/0000238.jpg', 9780141979243),
(239, '../dataset/0000239.jpg', 9780596009205),
(240, '../dataset/0000240.jpg', 9780262035613),
(241, '../dataset/0000241.jpg', 9780131103627),
(242, '../dataset/0000242.jpg', 9780321767530),
(243, '../dataset/0000243.jpg', 9780134757599),
(244, '../dataset/0000244.jpg', 9780134685991),
(245, '../dataset/0000245.jpg', 9781449357016),
(246, '../dataset/0000246.jpg', 9780321348104),
(247, '../dataset/0000247.jpg', 9781529035667),
(248, '../dataset/0000248.jpg', 9781461471370),
(249, '../dataset/0000249.jpg', 9781593271442),
(250, '../dataset/0000250.jpg', 9781616558475),
(251, '../dataset/0000251.jpg', 9781593279288),
(252, '../dataset/0000252.jpg', 9781491954386),
(253, '../dataset/0000253.jpg', 9781449361327),
(254, '../dataset/0000254.jpg', 9780062674678),
(255, '../dataset/0000255.jpg', 9781419722158),
(256, '../dataset/0000256.jpg', 9780321125217),
(257, '../dataset/0000257.jpg', 9781491950357),
(258, '../dataset/0000258.jpg', 9781942788331),
(259, '../dataset/0000259.jpg', 9781449305178),
(260, '../dataset/0000260.jpg', 9781506703350),
(261, '../dataset/0000261.jpg', 9781785653636),
(262, '../dataset/0000262.jpg', 9780596522346),
(263, '../dataset/0000263.jpg', 9780143037880),
(264, '../dataset/0000264.jpg', 9781491904909),
(265, '../dataset/0000265.jpg', 9781591846284),
(266, '../dataset/0000266.jpg', 9780141982410),
(267, '../dataset/0000267.jpg', 9783869930947),
(268, '../dataset/0000268.jpg', 9781473648166),
(269, '../dataset/0000269.jpg', 9781616554828),
(270, '../dataset/0000270.jpg', 9781785355431),
(271, '../dataset/0000271.jpg', 9781491903995),
(272, '../dataset/0000272.jpg', 9780571238347),
(273, '../dataset/0000273.jpg', 9780316212182),
(274, '../dataset/0000274.jpg', 9781491957660),
(275, '../dataset/0000275.jpg', 9781491953600),
(276, '../dataset/0000276.jpg', 9780142003640),
(277, '../dataset/0000277.jpg', 9780321985200),
(278, '../dataset/0000278.jpg', 9781595827685),
(279, '../dataset/0000279.jpg', 9780749924898),
(280, '../dataset/0000280.jpg', 9780316113007),
(281, '../dataset/0000281.jpg', 9781491946008),
(282, '../dataset/0000282.jpg', 9780062390851),
(283, '../dataset/0000283.jpg', 9780786966004),
(284, '../dataset/0000284.jpg', 9781491973899),
(285, '../dataset/0000285.jpg', 9780764542800),
(286, '../dataset/0000286.jpg', 9780786966097),
(287, '../dataset/0000287.jpg', 9781406366846),
(288, '../dataset/0000288.jpg', 9780387848570),
(289, '../dataset/0000289.jpg', 9781328546395),
(290, '../dataset/0000290.jpg', 9780062413413),
(291, '../dataset/0000291.jpg', 9780321617651),
(292, '../dataset/0000292.jpg', 9781446200469),
(293, '../dataset/0000293.jpg', 9781449355739),
(294, '../dataset/0000294.jpg', 9781780748481),
(295, '../dataset/0000295.jpg', 9780321714114),
(296, '../dataset/0000296.jpg', 9780199678112),
(297, '../dataset/0000297.jpg', 9780134692883),
(298, '../dataset/0000298.jpg', 9780321637703),
(299, '../dataset/0000299.jpg', 9780321356680),
(306, '../dataset/0000343.jpg', 9780131177055),
(307, '../dataset/0000344.jpg', 9780131177055),
(308, '../dataset/0000345.jpg', 9780131177055),
(309, '../dataset/0000397.jpg', 9780988263406),
(310, '../dataset/0000401.jpg', 9780988263406),
(311, '../dataset/0000402.jpg', 9780988263406),
(312, '../dataset/0000403.jpg', 9780988263406),
(313, '../dataset/0000404.jpg', 9780988263406),
(314, '../dataset/0000405 - Copy.jpg', 9780988263406),
(315, '../dataset/0000397.jpg', 9780988263406),
(316, '../dataset/0000401.jpg', 9780988263406),
(317, '../dataset/0000402.jpg', 9780988263406),
(318, '../dataset/0000403.jpg', 9780988263406),
(319, '../dataset/0000404.jpg', 9780988263406),
(320, '../dataset/0000405 - Copy.jpg', 9780988263406),
(321, '../dataset/0000007.jpg', 9780988263406),
(322, '../dataset/0000008.jpg', 9780988263406),
(323, '../dataset/0000009.jpg', 9780988263406),
(324, '../dataset/0000001.jpg', 9780988263406),
(325, '../dataset/0000002.jpg', 9780988263406),
(326, '../dataset/0000007.jpg', 9780988263406),
(327, '../dataset/0000008.jpg', 9780988263406),
(328, '../dataset/0000009.jpg', 9780988263406),
(329, '../dataset/0000001.jpg', 9780988263406),
(330, '../dataset/0000002.jpg', 9780988263406),
(331, '../dataset/0000007.jpg', 9780988263406),
(332, '../dataset/0000008.jpg', 9780988263406),
(333, '../dataset/0000009.jpg', 9780988263406),
(358, '../dataset/0000405 - Copy.jpg', 9780134190440),
(359, '../dataset/0000647.jpg', 9780134190440),
(360, '../dataset/0000651.jpg', 9780134190440),
(361, '../dataset/0000652.jpg', 9780134190440);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `collegeID` varchar(8) DEFAULT NULL,
  `passward` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `collegeID`, `passward`) VALUES
(30, 'admin', 'admin', '0bc28d47c0a615547b4435b389a5b7f3'),
(31, 'Prasad M', '181ME147', 'b0df6552c1047e880c9b9af23bdb9e04'),
(32, 'Ketan B', '181ME137', '77df540066bcd47d758cba8a1628b4cc'),
(33, 'yogesh B', '181ME181', '38a0e8dd18c093f7d758b904ac4f8352');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue`
--
ALTER TABLE `issue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paths`
--
ALTER TABLE `paths`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `issue`
--
ALTER TABLE `issue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `paths`
--
ALTER TABLE `paths`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=362;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
