-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 04, 2013 at 03:58 AM
-- Server version: 5.6.12
-- PHP Version: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

DROP database `lamp_final_project`;
--
-- Database: `lamp_final_project`
--
CREATE DATABASE IF NOT EXISTS `lamp_final_project` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `lamp_final_project`;

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--

CREATE TABLE IF NOT EXISTS `Category` (
  `Category_ID` int(8) NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`Category_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=21 ;

--
-- Dumping data for table `Category`
--

INSERT INTO `Category` (`Category_ID`, `CategoryName`) VALUES
(1, 'Services'),
(2, 'Jobs'),
(3, 'For Sale');

-- --------------------------------------------------------

--
-- Table structure for table `Location`
--

CREATE TABLE IF NOT EXISTS `Location` (
  `Location_ID` int(8) NOT NULL AUTO_INCREMENT,
  `Region_ID` int(8) NOT NULL,
  `LocationName` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`Location_ID`),
  KEY `Region_foreign` (`Region_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Dumping data for table `Location`
--

INSERT INTO `Location` (`Location_ID`, `Region_ID`, `LocationName`) VALUES
(1, 1, 'Cupertino'),
(2, 2, 'Mumbai'),
(3, 3, 'Stockholm');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(65) COLLATE utf8_bin NOT NULL DEFAULT '',
  `password` varchar(65) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=11 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'saim', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `Posts`
--

CREATE TABLE IF NOT EXISTS `Posts` (
  `Post_ID` int(8) NOT NULL AUTO_INCREMENT,
  `Title` varchar(100) COLLATE utf8_bin NOT NULL,
  `Price` varchar(100) COLLATE utf8_bin NOT NULL,
  `Description` text COLLATE utf8_bin NOT NULL,
  `Email` varchar(100) COLLATE utf8_bin NOT NULL,
  `Agreement` varchar(8) COLLATE utf8_bin NOT NULL,
  `TimeStamp` date NOT NULL,
  `Image_1` blob,
  `Image_2` blob,
  `Image_3` blob,
  `Image_4` blob,
  `SubCategory_ID` int(8) DEFAULT NULL,
  `Location_ID` int(8) DEFAULT NULL,
  `Uid` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`Post_ID`),
  KEY `Sub_Cat_foreign` (`SubCategory_ID`),
  KEY `Loc_foreign` (`Location_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=43 ;

--
-- Dumping data for table `Posts`
--

INSERT INTO `Posts` (`Post_ID`, `Title`, `Price`, `Description`, `Email`, `Agreement`, `TimeStamp`, `Image_1`, `Image_2`, `Image_3`, `Image_4`, `SubCategory_ID`, `Location_ID`, `Uid`) VALUES
(8, 'Software Dev', 'Competative Salary', 'We are hiring new graduate computer scientists from all over the world. ', 'company@company.com', 'agree', '2013-10-31', 0x696d616765732f313338333235373538395f312e6a706567, '', '', '', 7, 2, 'c8c52d32231fb7822ce9860035b314a1'),
(14, '3 large plastic bins $5 each', '15$', '3 large plastic bins $5 each', 'post1@post1.com', 'agree', '2013-11-01', 0x696d616765732f313338333337323436395f312e6a706567, 0x696d616765732f313338333337323436395f322e6a706567, '', '', 5, 1, '22b9a2ef1f9e56026eae35a0925a4282'),
(15, 'Oriental Large 24"h Chinese Porcelain Vase', '200$', 'Beautiful Oriental Vase to add to your decor with a lovely intricate design', 'post2@post2.com', 'agree', '2013-11-01', 0x696d616765732f313338333337323637365f312e6a706567, 0x696d616765732f313338333337323637375f322e6a706567, 0x696d616765732f313338333337323637375f332e6a706567, '', 5, 2, 'a7f699e31190a9cc923d7be9396bb813'),
(16, 'Natural Light Ottlight lamp', '40 Euro', 'OttLite OLFX18TC Flex Arm Plus Craft Lamp\r\nJust like it left the factory, except for worn box. Comes with base and with table clamp. \r\n\r\nplus\r\n\r\ntwo light level (dim/ bright) halogen desk lamp \r\n\r\nsold together only', 'post3@post3.com', 'agree', '2013-11-01', 0x696d616765732f313338333337323835365f312e6a706567, 0x696d616765732f313338333337323835365f322e6a706567, 0x696d616765732f313338333337323835365f332e6a706567, '', 5, 3, 'e80a47e809ffd0ea8dfa6b7d6ddcadf2'),
(17, 'Missing Out- by Adam Phillips- NEW!', '20$', 'I have one new copy ($10) and one used copy ($5)\r\n\r\nTake your pick!', 'post4@post4.com', 'agree', '2013-11-01', 0x696d616765732f313338333337333432375f312e6a706567, '', '', '', 4, 1, '6ae9ba3b953f99ef492a30c5818985d2'),
(18, 'Art of Indian Asia by Heinrich Zimmer', '$76', 'Art of Indian Asia Heinrich Zimmer 2 Vols.\r\n\r\nVol.1 Mythology and Transformations\r\n\r\nVol. 2 Plates\r\n\r\nPrinceton, Bollingen Series, ed. Unstated.\r\n\r\nBoth are: Softcovers and in good condition.\r\n\r\n\r\nVol. 1 Text: ISNB0691018464 Text completed and edited by Joseph Campbell, 465 pages, B & W Photos, Index. Covers all aspects of India Asia.\r\n\r\n\r\nVol. 1 Shows wear on corners, underlining and note taking. Other wise strong and sturdy book. \r\n\r\nVol. 2 Plates: ISBN 0691018464 614 pages most with plates B &W, short text associated with photos. List of art and photo information. \r\n\r\nVol. 2 Shows wear on corners of book and crease in front cover. Soft spine.\r\n\r\nCash only. Email if interested.', 'post5@post5.com', 'agree', '2013-11-01', 0x696d616765732f313338333337333732345f312e6a706567, 0x696d616765732f313338333337333732345f322e6a706567, 0x696d616765732f313338333337333732345f332e6a706567, 0x696d616765732f313338333337333732345f342e6a706567, 4, 2, 'f865a67fcf338b53fae85ccef62608db'),
(19, 'Childcraft Encyelopedia set', '$40', 'Complete Childcraft "The How and Why Library" set including volumes 1-14 plus the Guide for Parents volume 15. The Guide for Parents includes a comprehensive Medical Guide. \r\n\r\nAlso included are 14 of the Supplement volumes that were published one a year titled: The Magic of Words, Prehistoric Animals, About Dogs, Story of the Sea, The Indian Book, Conquest of the Sky, Mysteries and Fantasies, Dinosaurs!, Stories of Freedom, People to Know, How We Get Things, I Was Wondering, Pets and Other Animals, and Inventors and Inventions.\r\n\r\n29 volumes in all. Excellent condition. Treated with respect by all three of my children!', 'post6@post6.com', 'agree', '2013-11-01', 0x696d616765732f313338333337333837395f312e6a706567, 0x696d616765732f313338333337333837395f322e6a706567, 0x696d616765732f313338333337333837395f332e6a706567, '', 4, 3, '7d852cb508590e114cb840311ec08832'),
(20, 'Component Cables', '$8', '6&#039; component cable 3 wire $8\r\n6&#039; component cable 5 wire $10\r\nALL THREE FOR $15\r\nLive in Antioch work in Concord for easier pickup\r\n\r\nLeave phone # on replys\r\n\r\nIf you see this on Craigslist it is still avail:)', 'post7@post7.com', 'agree', '2013-11-01', 0x696d616765732f313338333337343937345f312e6a706567, 0x696d616765732f313338333337343937345f322e6a706567, '', '', 6, 1, '42519082e3a701072bb8c629986c9a83'),
(21, 'Rarely used Canon Powershot G10  ', '$200', 'Rarely used Canon Powershot G10 in great condition. Includes camera, battery, charger, 4GB SD card, and Lowepro carrying case with strap. I am selling this camera to fund the purchase of a new dSLR.', 'post8@post8.com', 'agree', '2013-11-01', 0x696d616765732f313338333337353136395f312e6a706567, '', '', '', 6, 2, '4b05dd9db2930737f4d8b0da6d7879c0'),
(22, 'Microsoft Digital 80 Sound System (DSS80).', '$119', 'Microsoft Digital 80 Sound System (DSS80). Here is high end 3 piece sound system by Microsoft in collaboration with Philips. Subwoofer plus 2 satellites.\r\n\r\nBrand new and rare. This speaker (used one) sold for $116 plus $20 shipping very popular auction site in April.\r\n\r\nThe DSS80 featured technological innovations in comparison with contemporary systems. For instance, it didn&#039;t require a sound card installed but actually featured its own integrated sound hardware which could be connected via USB and allowed digital quality playback, synchronized hardware and software volume controls, the use of a 10-band graphic equalizer and Microsoft Surround Sound.\r\n\r\nTo support computers without USB, and to enable users to take advantage of present high-end sound hardware, it additionally featured 3.5mm analog line-in. It was possible to connect the system both ways to ensure highest compatibility with both analog and digital audio content.\r\n\r\nlogitech creative altec lansing jbl bose sony', 'post9@post9.com', 'agree', '2013-11-02', 0x696d616765732f313338333337353835335f312e6a706567, 0x696d616765732f313338333337353835335f322e6a706567, 0x696d616765732f313338333337353835335f332e6a706567, '', 6, 3, '418ef59e16289791fa6435273d4d4ada'),
(23, 'Award.com full time employee', '$12-$15/hr', 'About Award.com\r\nAward.com is a leading online retailer of recognition products and personalized gifts. We distinguished ourselves with our excellent customer service, high quality craftsmanship, and our industry leading online design tools. \r\n\r\nResponsibilities\r\nâ—	Fulfill orders by creating customer layouts using graphics software\r\nâ—	Operate printers, engravers to create the designs on different media\r\nâ—	Directly communicate with customers via email and phone\r\nâ—	Updating product catalog and inventory\r\nâ—	General administrative tasks\r\n\r\nJob Requirements:\r\nâ—	Experience with Corel Draw a plus. Intermediate Experience with Illustrator and Photoshop\r\nâ—	Applicants should have a knack for layout and typography\r\nâ—	Ability to multi-task between order fulfillment and customer service\r\nâ—	At least one year customer service experience\r\nâ—	Excellent verbal and written communication skills\r\nâ—	Creative, detail oriented, hard-working, flexible and organized\r\nâ—	Ability to work independently and perform well in a fast pace environment\r\nâ—	Professional demeanor and pleasant under pressure\r\nâ—	Background check required\r\n\r\nAdditional Job Information\r\nâ—	Office located in Fremont CA\r\nâ—	Occasionally be required to lift up to 20 pounds\r\nâ—	This position is in a well-lighted, heated and air conditioned indoor office setting\r\nâ—	The noise level exposure is moderate in that it functions in a business office setting with printers and machinery\r\nâ—	There is no travel required for this position\r\n', 'post10@post10.com', 'agree', '2013-11-02', 0x696d616765732f313338333337363230345f312e6a706567, 0x696d616765732f313338333337363230345f322e6a706567, '', '', 7, 1, '63b6e87b2588dc3f201423cf8dd64dd5'),
(24, 'Yahoo hiring big data expers', '120000$ annual', 'Yahoo hiring bid data experts.\r\nRequired knowlade\r\n-Hadoop\r\n-Big Data\r\n-Pig\r\n-MapReduce', 'post11@post11.com', 'agree', '2013-11-02', 0x696d616765732f313338333337363438365f312e6a706567, '', '', '', 7, 2, 'de5db523a19d62fdc6740cb7082fe193'),
(25, 'Google Software Engineer', '$68k/year', 'Google looking for sofware engineer who will be responsible for software architecture and design.\r\n\r\nRequired skills\r\n+3 year software architect experience\r\n\r\nProgramming language:\r\n-java\r\n-C#\r\n-Scripting languages as Phyton, Pearl, Pjp', 'post12@post12.com', 'agree', '2013-11-02', 0x696d616765732f313338333337363638365f312e6a706567, '', '', '', 7, 3, '1cf7e13ef06ce6544cae31ed95d97b4b'),
(26, 'globial inc', '14$/hour', 'Globial Inc is looking for a web developers to work as part-time employee.\r\n\r\nrequired skills;\r\n-html\r\n-css\r\n-js\r\n-ajax\r\n-php\r\n\r\n\r\n', 'post13@post13.com', 'agree', '2013-11-02', 0x696d616765732f313338333337363832315f312e6a706567, '', '', '', 8, 1, '81661393c9aa0bcfb02522b24ba3be06'),
(27, 'Art-Tech Hiring HR part-time assistant', '$17/hour', 'Responsibilities:\r\nEnters employee information into Human Capital Management system for new hires, change of status, terminations, etc, ensuring that the data is correct and consistent â€¨\r\nProvides employee information and resolves issues regarding  the full range of benefits including retirement eligibility; payroll questions; leaves and accruals; and other general and more complex employee issues and concerns â€¨\r\nMay collaborate with the Payroll Office to resolve complex department payroll issues â€¨\r\nProvides employees with standard information regarding department and organizational HR practices and procedures â€¨\r\nRuns reports on department staff for department managers and supervisors â€¨\r\nManages sensitive and confidential information', 'post14@post14.com', 'agree', '2013-11-02', '', '', '', '', 8, 2, 'e94c7c5949bf22ce8cf940811a155fa9'),
(28, 'Office Boy', '$8/hour', 'we need and office boy to help cleaning and daily office needs.', 'post15@post15.com', 'agree', '2013-11-02', 0x696d616765732f313338333337373332315f312e6a706567, '', '', '', 8, 3, '30f4eae25992e772a7a5a96f5c31fb32'),
(29, 'Need volunteer intern', 'N/A', 'Looking for volunteer students for several positions. Please contact with email.\r\n', 'post16@post16.com', 'agree', '2013-11-02', 0x696d616765732f313338333337373435395f312e6a706567, '', '', '', 9, 1, '23d81dfcf2392a8653557574700a1472'),
(30, 'Church Charity', 'N/A', 'Mumbai central church looking for volunteer people will help us with distributing charity clothes and food.', 'post17@post17.com', 'agree', '2013-11-02', 0x696d616765732f313338333337373632395f312e6a706567, '', '', '', 9, 2, 'f25298f195f014e3035ab9e7b2be410b'),
(31, 'Volunteering Engineers for shalter system implementation', 'N/A', 'We are looking for volunteering Engineers for shelter system implementation.\r\n\r\nYou can help us to track homeless people and make our world more peacefull\r\n', 'post18@post18.com', 'agree', '2013-11-02', 0x696d616765732f313338333337373739385f312e6a706567, '', '', '', 9, 3, '9178da3b157cdb97fa6cf3d0018fc52d'),
(32, 'Slow Laptop? Desktop?? Viruses? ', 'Contact for Price', 'Slow Laptop? Desktop?? Viruses? Hardware/Software Problems? \r\n\r\nWe will Tune-Up your computers for FREE!\r\n\r\nProfessional Technicians and Services. Call for Appointment or Walk-In Welcome :)\r\n', 'post19@post19.com', 'agree', '2013-11-02', 0x696d616765732f313338333337373939365f312e6a706567, '', '', '', 1, 1, '9db6be255866935933fa56a22ca1b622'),
(33, 'Professional Innovative Website Master', 'N/A', 'Cause long such me take year. Boy same call learn keep go close like found an real. Page know over part stand even time school late more all your city start real three. Canada From For other uses, see Canada disambiguation. Page semi-protected Canada Vertical triband red, white, red with a red maple leaf in the centre A shield of four rectangles over a triangle. The first rectangle contains three lions passant guardant in gold on red the second, a red lion rampant on gold the third, a gold harp on blue the fourth, three gold fleurs-de-lis on blue. The triangle contains three red maple leaves on a white background. A gold helmet sits on top of the shield, upon which is a crowned lion holding a red maple leaf. On the right is a lion rampant flying the British flag. On the left is a unicorn flying the fleurs-de-lis. A red ribbon around the shield says desiderantes meliorem patriam. Below it is a blue scroll inscribed A mari usque ad mare on a wreath of flowers. Flag Coat of Arms Motto: A Mari Usque Ad Mare Latin From Sea to Sea Anthem: O Canada Royal anthem: God Save the Queen12 Projection of North America with Canada in green Capital Ottawa 4524N 7540W Largest city Toronto Official languages English French Recognised regional languages3 Chipewyan Cree Gwichin Inuinnaqtun Inuktitut Inuvialuktun Slavey North South Tlicho Demonym Canadian Government Federal parliamentary democracy under constitutional monarchy4 - Monarch Elizabeth II 5 html5 programmer software designer application development engineer html css design developer web website -', 'post20@post20.com', 'agree', '2013-11-02', 0x696d616765732f313338333337383132305f312e6a706567, '', '', '', 1, 2, '9b0f050ea02b63973b71c9442169e0ab'),
(34, 'Computer Help - I Come To You ', '$50', 'computer computers laptop desktop malware virus viruses spyware data recover Windows XP 7 Vista tech support technical IT hard drive drives help repair repairs network networks wifi wi-fi networking router routers phone phones telephone telephones DSL cable comcast att at&amp;t Alameda Albany Berkeley Castro Valley Concord Danville Dublin El Cerrito Emeryville Kensington Lafayette Martinez Moraga Oakland Montclair Rockridge Orinda Piedmont Richmond Rossmoor San Leandro San Ramon Walnut Creek.', 'post21@post21.com', 'agree', '2013-11-02', 0x696d616765732f313338333337383233375f312e6a706567, 0x696d616765732f313338333337383233375f322e6a706567, '', '', 1, 3, '1767597dfca7ab0dd5cee3cb99f4a453'),
(35, 'IS YOUR BOOKKEEPING OUT OF CONTROL? (Virtual Office - We)', 'N/A', 'late never call self more number know now father only build did life also with other may cross father last even food food end study me name', 'post22@post22.com', 'agree', '2013-11-02', 0x696d616765732f313338333337383430305f312e6a706567, '', '', '', 2, 1, '424eab8e52e38e74b209d830d4ce1237'),
(36, 'Financial Help', 'N/A', 'We help you to stabilize your financial problems.\r\n\r\n', 'post23@post23.com', 'agree', '2013-11-02', '', '', '', '', 2, 2, '9b3327d4ced219577d44559908825750'),
(37, 'Home Loan? Chill out!', 'N/A', 'A HARD MONEY HOME LOAN COULD BE YOUR ANSWER\r\n\r\nPURCHASE OR REFINANCE WITHOUT HAVING TO HASSLE WITH A BANK.\r\nEVEN IF YOU HAVE:\r\nA recent bankruptcy\r\nA recent foreclosure\r\nAre in or threatened with foreclosure by a bank\r\nLow credit score due to credit problems.\r\n\r\nI HAVE ACCESS TO OVER 150 INVESTORS WHO WANT TO LOAN!\r\n\r\nCall Dennis Negley at Loans By The Bay\r\n(415) 876-6216\r\nor email me via the Craigslist reply system \r\n\r\nCall evenings and weekends too! I&#039;ll either be available or call you back within 24 hours.\r\n\r\nBRE # 01343736\r\nNMLS # 1035936', 'post24@post24.com', 'agree', '2013-11-02', 0x696d616765732f313338333337383536395f312e6a706567, '', '', '', 2, 3, '6cbda2067938fa6fc776974197b52ce2'),
(38, 'â™« Voice, Violin, and Piano Lessons â™«', '40$/hour', '\r\nInterval Music and Drama School, located in Menlo Park, offers a variety of music lessons and drama coaching. Music styles include classical, musical theatre, broadway, standards, church, choral, and more.\r\n\r\nPiano\r\nVoice\r\nViolin\r\nMusic Theory\r\nSongwriting\r\nSinging/Vocal Coaching\r\nActing/Drama Coaching\r\nMonologue and Audition Preparation\r\n\r\nPlease phone or txt (650) 281-3339 for inquiries. â™«\r\n', 'post25@post25.com', 'agree', '2013-11-02', 0x696d616765732f313338333337383638305f312e6a706567, 0x696d616765732f313338333337383638305f322e6a706567, '', '', 3, 1, '04c60514192c9ba641d3cddceea33b7f'),
(39, 'Flying Lessons/Flight Training With A Former Commercial Airline Pilot', '200$/hour', 'My name is Jeff and I was born and raised in the San Francisco Bay Area and have over 20 years of flight experience. I know all the best locations to train and have a fun and an easy time doing it. My style of instruction is to create a relaxed and stress free experience. Best of all, once you have attained your private pilot&#039;s license with my instruction you will be able to take your family and friends to all the wonderful scenic spots throughout California. Some great places you will experience flying to; Las Vegas, Tahoe, Clear Lake or just taking a quick jaunt over to half moon bay for lunch. ', 'post26@post26.com', 'agree', '2013-11-02', 0x696d616765732f313338333337383739395f312e6a706567, '', '', '', 3, 2, 'eae7cb294a6ce9c52f3e7d5d65d02f06'),
(40, 'Math, Stats, Physics, SAT Tutor', '$20/hour', 'Hi, my name is Steven and I am a UC Irvine college graduate with a double major in Mechanical Engineering and Sociology; I also minored in management. Math has always been my natural subject and comes real easy to me. I had a 750 on math for my SATs and a 5 on AP Calculus BC. I got a 4.05 GPA at Lowell High School. I am currently a teacher/tutor for Think Tank Learning. I would like to use my skills to make math more manageable for others. If you or someone you know could use some extra help in math, either for classes or for Sat preparation, go ahead and shoot me an email so we can setup a time. I can meetup with you at anywhere of your choice, either a public library, coffee shop, on campus, or at your house. I can also work with you over skype and gchat if that is more convenient. ', 'post27@post27.com', 'agree', '2013-11-02', 0x696d616765732f313338333337383937315f312e6a706567, '', '', '', 3, 3, 'a1dc92ab38521af847a16de2a2368f23');

-- --------------------------------------------------------

--
-- Table structure for table `Region`
--

CREATE TABLE IF NOT EXISTS `Region` (
  `Region_ID` int(8) NOT NULL AUTO_INCREMENT,
  `RegionName` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`Region_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=8 ;

--
-- Dumping data for table `Region`
--

INSERT INTO `Region` (`Region_ID`, `RegionName`) VALUES
(1, 'USA'),
(2, 'India'),
(3, 'Sweden');

-- --------------------------------------------------------

--
-- Table structure for table `SubCategory`
--

CREATE TABLE IF NOT EXISTS `SubCategory` (
  `SubCategory_ID` int(8) NOT NULL AUTO_INCREMENT,
  `Category_ID` int(8) NOT NULL,
  `SubCategoryName` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`SubCategory_ID`),
  KEY `Cat_foreign` (`Category_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=15 ;

--
-- Dumping data for table `SubCategory`
--

INSERT INTO `SubCategory` (`SubCategory_ID`, `Category_ID`, `SubCategoryName`) VALUES
(1, 1, 'Computer'),
(2, 1, 'Financial'),
(3, 1, 'Lessons'),
(4, 3, 'Books'),
(5, 3, 'Household'),
(6, 3, 'Electronics'),
(7, 2, 'Full-Time'),
(8, 2, 'Part-Time'),
(9, 2, 'Volunteering');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Location`
--
ALTER TABLE `Location`
  ADD CONSTRAINT `Region_foreign` FOREIGN KEY (`Region_ID`) REFERENCES `Region` (`Region_ID`);

--
-- Constraints for table `Posts`
--
ALTER TABLE `Posts`
  ADD CONSTRAINT `Loc_foreign` FOREIGN KEY (`Location_ID`) REFERENCES `Location` (`Location_ID`),
  ADD CONSTRAINT `Sub_Cat_foreign` FOREIGN KEY (`SubCategory_ID`) REFERENCES `SubCategory` (`SubCategory_ID`);

--
-- Constraints for table `SubCategory`
--
ALTER TABLE `SubCategory`
  ADD CONSTRAINT `Cat_foreign` FOREIGN KEY (`Category_ID`) REFERENCES `Category` (`Category_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
