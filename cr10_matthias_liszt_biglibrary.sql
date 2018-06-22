-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 22, 2018 at 06:53 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr10_matthias_liszt_biglibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `authorId` int(11) NOT NULL,
  `name` varchar(16) COLLATE utf8mb4_bin DEFAULT NULL,
  `surname` varchar(32) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`authorId`, `name`, `surname`) VALUES
(1, 'Bob', 'Dylan'),
(2, 'Charlie', 'Chaplin'),
(3, 'Theo', 'Lawrence'),
(4, 'Ella', 'Sade'),
(5, 'Katja', 'Brandis'),
(6, 'Isaac', 'Asimov'),
(7, 'Neil', 'Gaiman'),
(8, 'Peter', 'O\'Donnell'),
(9, 'Jeff', 'Kinney'),
(10, 'Guy', 'Kawasaki'),
(11, 'Dima', 'Vorobev');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `mediaId` int(11) NOT NULL,
  `isbn` int(11) DEFAULT NULL,
  `title` varchar(128) COLLATE utf8mb4_bin DEFAULT NULL,
  `publisherDate` date DEFAULT NULL,
  `publisherId` int(11) DEFAULT NULL,
  `mediaType` varchar(8) COLLATE utf8mb4_bin DEFAULT NULL,
  `image` varchar(128) COLLATE utf8mb4_bin DEFAULT NULL,
  `authorId` int(11) DEFAULT NULL,
  `description` varchar(1024) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`mediaId`, `isbn`, `title`, `publisherDate`, `publisherId`, `mediaType`, `image`, `authorId`, `description`) VALUES
(1, 12345678, 'Dylan', '1981-11-11', 1, 'CD', 'Bob_Dylan_1973.jpg', 1, 'Dylan is the 13th studio album by American singer-songwriter Bob Dylan, released on November 19, 1973 by Columbia Records. Compiled and issued by the label with no input from Dylan himself, it contains no original Dylan songs, the material consisting of two outtakes from Self Portrait and another seven from New Morning. It followed the artist\'s departure from Columbia for Asylum Records, and the announcement of his first major tour since 1966.'),
(2, 23456781, 'City Lights', '1982-11-11', 2, 'Book', 'citylights_image.jpg', 2, 'City Lights is a 1931 American pre-Code silent romantic comedy film written, produced, directed by and starring Charlie Chaplin. The story follows the misadventures of Chaplin\'s Tramp as he falls in love with a blind girl (Virginia Cherrill) and develops a turbulent friendship with an alcoholic millionaire (Harry Myers).'),
(3, 34567821, 'Lawrence Of Arabia', '1983-11-11', 3, 'DVD', 'Lawrence_of_arabia.jpg', 3, 'Lawrence of Arabia is a 1962 epic historical drama film based on the life of T. E. Lawrence. It was directed by David Lean and produced by Sam Spiegel through his British company Horizon Pictures, with the screenplay by Robert Bolt and Michael Wilson. The film stars Peter O\'Toole in the title role. It is widely considered one of the greatest and most influential films in the history of cinema.'),
(4, 45678321, 'Diamond Life', '1984-11-11', 4, 'CD', 'sade-diamond-life.jpg', 4, 'Diamond Life is the debut studio album by English band Sade. It was first released in the United Kingdom on 16 July 1984 by Epic Records and in the United States on 27 February 1985 by Portrait Records. Diamond Life went on to sell over six million copies worldwide, becoming one of the top-selling debut recordings of the \'80s and the best-selling debut by a British female vocalist'),
(5, 56784321, 'Woodwalkers', '1985-11-11', 5, 'Book', 'woodwalkers.jpg', 5, 'Auf den ersten Blick sieht Carag aus wie ein normaler Junge. Doch hinter seinen leuchtenden Augen verbirgt sich ein Geheimnis: Carag ist ein Gestaltwandler. Aufgewachsen als Berglöwe in den Wäldern lebt er erst seit Kurzem in der Menschenwelt. Das neue Leben ist für ihn so fremd wie faszinierend. '),
(6, 67812345, 'Foundation', '1986-11-11', 6, 'Book', 'fondation-asimov.jpg', 6, 'Foundation is a science fiction novel by American writer Isaac Asimov. It is the first published in his Foundation Trilogy (later expanded into the Foundation Series). Foundation is a cycle of five interrelated short stories, first published as a single book by Gnome Press in 1951. Collectively they tell the story of the Foundation, an institute to preserve the best of galactic civilization after the collapse of the Galactic Empire.'),
(7, 78654321, 'The Sandman', '1987-11-11', 7, 'Book', 'Sandman.jpg', 7, 'The Sandman is a comic book series written by Neil Gaiman and published by DC Comics.   It tells the story of Dream of the Endless, who rules over the world of dreams. The original series ran for 75 issues from January 1989 to March 1996. The series is famous for Gaiman\'s trademark use of anthropomorphic personification of various metaphysical entities, while also blending mythology and history in its horror setting within the DC Universe.'),
(8, 87651234, 'Modesty Blaise', '1988-11-11', 8, 'Book', 'modesty1.jpg', 8, 'Modesty Blaise is a British comic strip featuring a fictional character of the same name, created by author Peter O\'Donnell and illustrator Jim Holdaway in 1963. The strip follows Modesty Blaise, an exceptional young woman with many talents and a criminal past, and her trusty sidekick Willie Garvin.'),
(9, 98765123, 'Diary Of A Wimpy Kid', '1989-11-11', 9, 'Book', 'wimpykid.jpg', 8, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(10, 10876543, 'Enchantment', '1991-11-11', 10, 'Book', 'enchantment.jpg', 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(11, 11345678, 'Otpor', '1997-11-11', 11, 'Book', 'otpor.jpg', 11, 'Dima Vorobev rakontas pri sia laboro kaj sperto pri propagando dum la sovjeta epoko.');

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `publisherId` int(11) NOT NULL,
  `publisherName` varchar(32) COLLATE utf8mb4_bin DEFAULT NULL,
  `address` varchar(64) COLLATE utf8mb4_bin DEFAULT NULL,
  `size` varchar(8) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`publisherId`, `publisherName`, `address`, `size`) VALUES
(1, 'Columbia Records', 'Oxford Street 1, 11333 Washington', 'big'),
(2, 'United Artists', 'Oxford Street 3, 11333 Washington', 'big'),
(3, 'Columbia Pictures', 'Oxford Street 21, 11333 Washington', 'big'),
(4, 'Epic', 'Oxford Street 23, 11333 Washington', 'big'),
(5, 'Bild', 'Bonygasse 27, 1120 Wien', 'small'),
(6, 'Heyne', 'Main Street 1, 90210 Beverly Hills', 'medium'),
(7, 'Vertigo', 'Main Street 23, 90210 Beverly Hills', 'medium'),
(8, 'Titan Books', 'Main Street 101, 90210 Beverly Hills', 'big'),
(9, 'Krauthappelverlag', 'Hauptstrasse 3, 1136 Wien', 'small'),
(10, 'Nasenbohrverlag', 'Klostergasse 3, 1230 Wien', 'small'),
(11, 'Am Sand Verlag', 'Beschaeftigungsstrasse 8, 1220 Wien', 'small'),
(12, 'Kotverlag', 'Kettengasse 33, 1040 Wien', 'small');

-- --------------------------------------------------------

--
-- Table structure for table `transactiondata`
--

CREATE TABLE `transactiondata` (
  `transactionId` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `mediaId` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `userId` int(11) NOT NULL,
  `userName` varchar(16) COLLATE utf8mb4_bin DEFAULT NULL,
  `name` varchar(16) COLLATE utf8mb4_bin DEFAULT NULL,
  `surname` varchar(32) COLLATE utf8mb4_bin DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`userId`, `userName`, `name`, `surname`, `password`) VALUES
(1, 'Hauskatze', 'Ivan', 'Repkov', 'e3e327cadce54ab9da6b05db42d2c985aefb74775f823937e90cb7adfde25b7a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`authorId`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`mediaId`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`publisherId`);

--
-- Indexes for table `transactiondata`
--
ALTER TABLE `transactiondata`
  ADD PRIMARY KEY (`transactionId`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `authorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `mediaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `publisherId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transactiondata`
--
ALTER TABLE `transactiondata`
  MODIFY `transactionId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
