-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2022 at 10:34 PM
-- Server version: 8.0.28
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movielog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AID` int NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AID`, `Username`, `Password`) VALUES
(1, 'admin', 'b2838185470f7624708d7421e6730eb69a91e91c102f101690369b41cd8c02ed62f0b9eaf3fd4bcc66bce5e2c3b9fb503a2bef93143c067ad5eeb0692c60bea1');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `MID` int NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Genre` varchar(255) NOT NULL,
  `Director` varchar(255) NOT NULL,
  `Summary` varchar(1000) NOT NULL,
  `Date` date NOT NULL,
  `AID` int NOT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `Rating` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`MID`, `Name`, `Genre`, `Director`, `Summary`, `Date`, `AID`, `Image`, `Rating`) VALUES
(1, 'Fences', 'Historical', 'Denzel Washington', 'Troy Maxson (Denzel Washington) makes his living as a sanitation worker in 1950s Pittsburgh. Maxson once dreamed of becoming a professional baseball player, but was deemed too old when the major leagues began admitting black athletes. Bitter over his missed opportunity, Troy creates further tension in his family when he squashes his son (Jovan Adepo) chance to meet a college football recruiter', '2016-12-15', 1, 'https://resizing.flixster.com/m4AVlE_9VB7hD9C5babAcXyWuhw=/206x305/v2/https://flxt.tmsimg.com/assets/p13098062_p_v8_ak.jpg', 0),
(2, 'Home', 'Childrens film', 'Tim Johnson', 'After a hive-minded alien race called the Boov conquer the Earth, they relocate the planet human population -- all except for a little girl named Tip (Rihanna), who managed to hide from the aliens. When Tip meets a fugitive Boov called Oh (Jim Parsons), there is mutual distrust. However, Oh is not like his comrades; he craves friendship and fun.', '2021-08-19', 1, 'https://resizing.flixster.com/Maf_3JMb3a5DDp58xfg3PCL475w=/206x305/v2/https://flxt.tmsimg.com/assets/p10654478_p_v8_ab.jpg', 0),
(3, '21 Bridges', 'Action', 'Brian Kirk', 'After uncovering a massive conspiracy, an embattled NYPD detective joins a citywide manhunt for two young cop killers. As the night unfolds, he soon becomes unsure of who to pursue -- and who in pursuit of him. When the search intensifies, authorities decide to take extreme measures by closing all of Manhattan 21 bridges to prevent the suspects from escaping.', '2019-11-22', 1, 'https://resizing.flixster.com/V7zh37BGe2gFMZ8PehKVg2yg1jc=/206x305/v2/https://resizing.flixster.com/GX336Pe7WOqYjBpp5dsi-Awv4Q0=/ems.ZW1zLXByZC1hc3NldHMvbW92aWVzLzdlNWMwN2UxLWZkNjctNGFjMi1iNmNmLWEyMmQxNDAwY2VhYS53ZWJw', 0),
(4, 'Harry Potter the Sorcerers Stone', 'Fantasy', 'Chris Columbus', 'Adaptation of the first of J.K. Rowling  popular children novels about Harry Potter, a boy who learns on his eleventh birthday that he is the orphaned son of two powerful wizards and possesses unique magical powers of his own. He is summoned from his life as an unwanted child to become a student at Hogwarts, an English boarding school for wizards.', '2001-11-14', 1, 'https://resizing.flixster.com/Q5W7m_i_f24Q_a4zLeRxNvx1WAs=/206x305/v2/https://flxt.tmsimg.com/assets/p28630_p_v8_at.jpg', 0),
(5, 'Mean Girls', 'Comedy', 'Markn Waters', 'Teenage Cady Heron (Lindsay Lohan) was educated in Africa by her scientist parents. When her family moves to the suburbs of Illinois, Cady finally gets to experience public school and gets a quick primer on the cruel, tacit laws of popularity that divide her fellow students into tightly knit cliques. She unwittingly finds herself in the good graces of an elite group of cool students dubbed \"the Plastics,\" but Cady soon realizes how her shallow group of new friends earned this nickname.', '2004-04-30', 1, 'https://resizing.flixster.com/jQyF5X66X6A5iiFyhhz7af07HZk=/206x305/v2/https://flxt.tmsimg.com/NowShowing/37966/37966_aa.jpg', 0),
(6, 'High School Musical', 'Musical', 'Kenny Ortega', 'Troy Bolton (Zac Efron), the star athlete at a small-town high school, falls for nerdy beauty Gabriella Montez (Vanessa Anne Hudgens) at a holiday karaoke party. When they return to campus, Troy and Gabriella audition for the upcoming school musical. Meanwhile, the jealous Sharpay Evans (Ashley Tisdale) conspires to squelch their chances. The two must struggle to make it to auditions while also meeting their existing obligations to the basketball team and the academic decathlon.', '2006-01-20', 1, 'https://resizing.flixster.com/A6qvS7o91Q-UdstPZ3kdsjo9GQc=/206x305/v2/https://flxt.tmsimg.com/assets/p160369_p_v8_ak.jpg', 0),
(7, 'Get Out', 'Horror', 'Jordan Peele', 'Now that Chris and his girlfriend, Rose, have reached the meet-the-parents milestone of dating, she invites him for a weekend getaway upstate with her parents, Missy and Dean. At first, Chris reads the family overly accommodating behaviour as nervous attempts to deal with their daughter interracial relationship, but as the weekend progresses, a series of increasingly disturbing discoveries leads him to a truth that he never could have imagined.', '2017-02-24', 1, 'https://resizing.flixster.com/WQvxDGdZxKzj53GK3fVbkC-2eC8=/206x305/v2/https://resizing.flixster.com/Q2uwvQLSNT5ObCtXKALBjceWDbw=/ems.ZW1zLXByZC1hc3NldHMvbW92aWVzLzNiZGVhNTVmLWQzOGUtNGMwZC1hYmZjLTIxZWE5NThkMTdjNS53ZWJw', 0),
(8, 'The Dark Knight', 'Fantasy/Adventure', 'Christopher Nolan', 'With the help of allies Lt. Jim Gordon (Gary Oldman) and DA Harvey Dent (Aaron Eckhart), Batman (Christian Bale) has been able to keep a tight lid on crime in Gotham City. But when a vile young criminal calling himself the Joker (Heath Ledger) suddenly throws the town into chaos, the caped Crusader begins to tread a fine line between heroism and vigilantism.', '2008-07-18', 1, 'https://resizing.flixster.com/WAHXGKleT3QvhqHUlFGIRgcQAjU=/206x305/v2/https://flxt.tmsimg.com/assets/p173378_p_v8_au.jpg', 0),
(9, 'Star Wars: Episode V -- The Empire Strikes Back', 'Fantasy/Adventure', 'Irvin Kershner', 'The adventure continues in this \"Star Wars\" sequel. Luke Skywalker (Mark Hamill), Han Solo (Harrison Ford), Princess Leia (Carrie Fisher) and Chewbacca (Peter Mayhew) face attack by the Imperial forces and its AT-AT walkers on the ice planet Hoth. While Han and Leia escape in the Millennium Falcon, Luke travels to Dagobah in search of Yoda. Only with the Jedi master\'s help will Luke survive when the dark side of the Force beckons him into the ultimate duel with Darth Vader (David Prowse).', '1980-05-21', 1, 'https://resizing.flixster.com/V_oZJXOwGIr2tZpJzbtv43zdFnk=/206x305/v2/https://flxt.tmsimg.com/assets/p8884_p_v8_ae.jpg', 0),
(10, 'Whiplash', 'Drama/Music', 'Damien Chazelle', 'Andrew Neiman (Miles Teller) is an ambitious young jazz drummer, in pursuit of rising to the top of his elite music conservatory. Terence Fletcher (J.K. Simmons), an instructor known for his terrifying teaching methods, discovers Andrew and transfers the aspiring drummer into the top jazz ensemble, forever changing the young man\'s life. But Andrew\'s passion to achieve perfection quickly spirals into obsession, as his ruthless teacher pushes him to the brink of his ability and his sanity.', '2014-10-10', 1, 'https://resizing.flixster.com/9vHaXzbOKznuRv-w-jOJQAtgjdw=/206x305/v2/https://flxt.tmsimg.com/assets/p10488558_p_v12_ai.jpg', 0),
(11, 'American Psycho', 'Comedy/Horror', 'Mary Harron', 'In New York City in 1987, a handsome, young urban professional, Patrick Bateman (Christian Bale), lives a second life as a gruesome serial killer by night. The cast is filled by the detective (Willem Dafoe), the fiance (Reese Witherspoon), the mistress (Samantha Mathis), the coworker (Jared Leto), and the secretary (Chloë Sevigny). This is a biting, wry comedy examining the elements that make a man a monster.', '2000-04-14', 1, 'https://resizing.flixster.com/VugRiwPMAuksEKklXBz3_nKRtJg=/206x305/v2/https://flxt.tmsimg.com/assets/p24116_p_v12_at.jpg', 0),
(12, 'Frank', 'Drama/Comedy', 'Lenny Abrahamson', 'An aspiring musician (Domhnall Gleeson) finds himself way out of his element after he joins a pop group led by an enigmatic figure (Michael Fassbender) who wears a giant fake head.', '2014-08-15', 1, 'https://resizing.flixster.com/5HR4YF6UymZM_yiKrcimhIqaOcA=/206x305/v2/https://flxt.tmsimg.com/assets/p10688612_p_v8_ad.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `resetpassword`
--

CREATE TABLE `resetpassword` (
  `rpid` int NOT NULL,
  `code` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `RID` int NOT NULL,
  `Text` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `UID` int NOT NULL,
  `MID` int NOT NULL,
  `Rating` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`RID`, `Text`, `UID`, `MID`, `Rating`) VALUES
(1, 'August Wilson’s play Fences premiered on Broadway in 1987 to critical and audience acclaim that’s lasted for almost thirty years. Denzel Washington revived it in 2010. Now, six years later, he’s taken Wilson’s play and turned it into his third feature as director. Already a timely look at the African-American experience in the 80’s, Fences is one of the most prescient movies out now. Powerhouse performances from Washington and (hopefully Academy Award-winner) Viola Davis make this an honest and heartwrenching adaptation of an American masterpiece.\n\nTroy Maxson (Washington) has spent seventeen years of his life working as a garbageman and raising a family. But personal disputes and regrets can’t remain hidden forever, causing Troy to question the nature of his life.\n\nWilson’s play is adapted almost verbatim. It’s packed to bursting with themes on individual identity, the roles of family with regards to gender, and how we mitigate our own dreams for that of a greater good. The Maxsons’ lives are average, not just to the African-American experience of the 1950’s, but to nearly every lower middle-class person today. They don’t have stacks of money, but they’re as content as they’re going to get.', 1, 1, 0),
(2, 'test', 1, 1, 0),
(3, 'test', 1, 1, 0),
(4, 'hello', 1, 1, 0),
(5, 'test', 1, 1, 5),
(6, 'test', 1, 1, 4),
(7, 'test', 1, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uID` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uID`, `username`, `password`, `email`) VALUES
(1, 'CamLahey', '42d3e5c8573c0a0508c39dd6e9641836fc6ab41c03d7e380120f59b20805fc1cb2f43cc930ba31ac89172e57717706d27612e34315f7952746cf282d56f54613', 'camlahey@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AID`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`MID`),
  ADD KEY `admin` (`AID`);

--
-- Indexes for table `resetpassword`
--
ALTER TABLE `resetpassword`
  ADD PRIMARY KEY (`rpid`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`RID`),
  ADD KEY `movie` (`MID`),
  ADD KEY `user` (`UID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `MID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `resetpassword`
--
ALTER TABLE `resetpassword`
  MODIFY `rpid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `RID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `admin` FOREIGN KEY (`AID`) REFERENCES `admin` (`AID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `movie` FOREIGN KEY (`MID`) REFERENCES `movie` (`MID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user` FOREIGN KEY (`UID`) REFERENCES `user` (`uID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
