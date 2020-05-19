-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 27, 2020 at 09:44 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Sport'),
(2, 'Politics'),
(3, 'Entertainment'),
(4, 'Health');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_date` datetime NOT NULL,
  `comment_post_id` int(11) NOT NULL,
  `comment_user_id` int(11) NOT NULL,
  `comment_user_name` varchar(255) DEFAULT NULL,
  `comment_status` varchar(20) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `comment_date`, `comment_post_id`, `comment_user_id`, `comment_user_name`, `comment_status`) VALUES
(5, 'comment 2 post 2', '2020-03-13 21:46:22', 2, 3, 'thomas', 'draft'),
(17, 'bla', '2020-03-14 20:53:32', 3, 4, 'jordan', 'draft'),
(22, 'commentar', '2020-03-14 23:05:58', 2, 2, 'tom', 'approved'),
(34, 'some comment post 1', '2020-03-16 13:30:33', 1, 2, 'tom', 'approved'),
(43, 'another comment post 1', '2020-03-17 09:22:53', 1, 3, 'thomas', 'approved'),
(59, 'comment 6 post 2', '2020-03-17 15:22:02', 2, 4, 'jordan', 'approved'),
(87, 'something....', '2020-03-25 22:30:03', 7, 1, 'vuk', 'approved'),
(88, 'the very last comment', '2020-03-25 22:31:59', 7, 1, 'vuk', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_content` text NOT NULL,
  `post_date` date NOT NULL,
  `post_status` varchar(20) NOT NULL DEFAULT 'draft',
  `post_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_author`, `post_title`, `post_content`, `post_date`, `post_status`, `post_category_id`) VALUES
(1, 'Vuk Tripunovic', 'DONETA ODLUKA: Utakmice Superlige Srbije BEZ NAVIJAČA!', 'Iz Vlade Srbije donesena je zvanična odluka da se sve utakmice Superlige Srbije igraju bez prisustva navijača zbog suzbijanja širenja koronavirusa.Podsećanja radi posle 26. kola, na prvom mestu na tabeli nalazi se beogradska Crvena zvezda sa osvojenih 66. bodova. Dok se na drugoj poziciji nalazi Partizan sa 55. osvojenih bodova. Crno-belima za vrat diše ekipa Vojvodine sa osvojenih 54. boda.                                                                                                                                                                                                                ', '2020-03-13', 'draft', 1),
(2, 'Blic', 'ŠOK ZA ĐOKOVIĆA: Nema Vimbldona ove godine?!', ' Iako je do njegovog početka još oko 3,5 meseca, na Vimbldonu se već razmišlja o mogućim posledicama epidemije virusa korona. Kako tvrdi Dejli Mejl, jedan od najtiražnijih britanskih listova, čelnici najčuvenijeg teniskog turnira nisu radi kompromisu.\r\n- Pre ćemo otkazati turnir nego igrati pred praznim tribinama - citira Dejli Mejl neimenovanog službenika Vimbldona. \r\n\r\nS druge strane, Vimbldon je obezbeđen osiguranjem dok pomenuta takmičenja nisu pa je i to jak razlog. Odluku o održavanju sportskih događaja na Ostrvu donosi vlada.\r\n\r\nOtkazivanje legendarnog britanskog turnira bio bi veliki udarac za prvog reketa sveta Novaka Đokovića koji, pored publike koja baš i nije oduševljena srpskim teniserom, ipak obožava da igra na londonskoj travnatoj podlozi.                                                                                                                                             ', '2020-03-13', 'published', 1),
(3, 'Russia today', 'Trump declares national emergency over coronavirus pandemic, unlocking $50bn in funding', 'US President Donald Trump has declared a national emergency over the COVID-19 coronavirus pandemic, unlocking additional powers and funding for disaster response and getting FEMA involved in the efforts to curb the disease.\r\n“To unleash the full power of the federal government,” Trump said in an address from the White House Rose Garden on Friday, “I am officially declaring a national emergency.” Trump said that the declaration will free up $50 billion in funding to tackle the spread of the illness.\r\n\r\nTrump added that he is “asking every hospital in the country” to activate their emergency preparation plans, and ordering every state to set up emergency operations centers.\r\n\r\nThe Trump administration has been criticized in recent days for failing to roll out Covid-19 tests quickly enough. \r\n\r\nThough Trump stressed that mass testing is likely unnecessary, he said on Friday that “we want to make sure that those who need a test can get a test very safely, quickly, and conveniently.” To that end, Trump announced that the Food and Drug Administration (FDA) has approved a new test for the virus, within hours of receiving application from the company responsible, Roche Diagnostics. \r\n\r\n                                                                                ', '2020-03-13', 'published', 2),
(4, 'Russia today', 'Corbyn and Johnson launch into explosive argument over who hates women more', ' The gloves were off in the British Parliament this morning, as Prime Minister Boris Johnson and Labour leader Jeremy Corbyn traded verbal blows after Corbyn accused the PM of misogyny and “discriminatory” policies.\r\nCorbyn’s seething verbal assault began moments after he called on the Conservative government to pledge over £100 million ($128.1 million) in additional funding for the new Domestic Abuse Bill. Without warning and to the clear surprise of the chamber, Corbyn then began dredging up a series of disturbing old quotes from Johnson that depicted him as sexist and chauvinistic.', '2020-03-13', 'draft', 2),
(5, 'Health news', 'Y7 Yoga Founder Sarah Levey Demonstrates 3 Gentle Yoga Modifications for Pregnant Women', ' Is there any workout as perfect for new moms as yoga? With strength-building sequences and poses that improve flexibility, this low-impact activity is a safe way to feel strong and energized through all the body changes pregnancy brings. Plus, poses can be modified to accommodate extra weight around the middle and protect tender joints and swollen body areas from injury. Y7 Studio founder Sarah Levey shows Health three gentle yoga modifications for expecting moms who want the mind-body benefits of yoga without overextending themselves.                                                            ', '2020-03-13', 'published', 1),
(6, 'Health.com', 'How to Do a Romanian Deadlift, According to Trainers', 'Whether you’re a runner or a powerlifter, anyone can benefit from incorporating Romanian deadlifts into a regular workout routine. The strength exercise—also known as RDLs or stiff-leg deadlifts—helps to build muscle along the posterior chain, or the back of the body, which includes the hamstrings and glutes. \"By strengthening the muscles in your posterior chain, explosive movements, such as sprints and jumps, benefit from the Romanian deadlift by maximizing hip extension,\" Sherry Ward, a NSCA-certified personal trainer and CrossFit Level 1 coach at Brick New York, tells Health.                                        ', '2020-03-13', 'published', 4),
(7, 'msn', '13 Celebrities You Didnt Realize Wrote Novels', 'Celebrities these days are rarely just one thing. You have actors-turned-musicians and musicians-turned-actors. You have stars releasing everything from cookware to homeware, and adding talents on top of their already lengthy résumés. But did you know that there are also plenty of celebrities who double as writers? And we are not talking the standard celebrity memoir. Here are some of the A-listers who have turned into celebrity authors, delving into the world of fiction with fully original (or sometimes semi-autobiographical) stories. And for more surprising intel on your favorite stars, here are 20 Celebrities You Didnt Know Have a Twin.                                        ', '2020-03-13', 'published', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_type` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_email`, `user_type`) VALUES
(1, 'vuk', '123', 'vuk@gmail.com', 'admin'),
(2, 'tom', '222', 'tom@gmail.com', 'user'),
(3, 'thomas', '111', 'thomas@gmail.com', 'user'),
(4, 'jordan', '222', 'jordan@gmail.com', 'user'),
(5, 'ksena', '333', 'ksena@gmail.com', 'user'),
(32, 'sara', '$2y$10$fc8Lt/rLpsVl10pFWlis/ujBSSjH7THD72e0qatfNZs6zVONsZio.', 'sara@mail.com', 'user'),
(38, 'biljana', '550a141f12de6341fba65b0ad0433500', 'biljana@gmail.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `fk_comment_post_id` (`comment_post_id`),
  ADD KEY `fk_comment_user_id` (`comment_user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `fk_category_id` (`post_category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comment_post_id` FOREIGN KEY (`comment_post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_comment_user_id` FOREIGN KEY (`comment_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_post_category_id` FOREIGN KEY (`post_category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
