-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2023 at 08:54 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `librarymanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_details`
--

CREATE TABLE `book_details` (
  `bookid` int(11) NOT NULL,
  `BookName` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_details`
--

INSERT INTO `book_details` (`bookid`, `BookName`, `author`) VALUES
(40, 'Clean Code', 'Robert C. Martin'),
(41, 'Introduction to Algorithms', 'Ronald L. Rivest'),
(42, 'Design Patterns', 'Erich Gamma'),
(43, ' The Art of Computer Programming', 'Donald E. Knuth'),
(44, 'Fear Not: Be Strong', 'Swami Vivekanand'),
(45, 'The Alchemist', 'Paulo Coelho'),
(46, 'Mindset ', 'Carol Dweck'),
(47, 'The Miracle Morning', 'Hal Elrod'),
(48, 'The Power of Now', 'Eckhart Tolle'),
(49, 'Deep Work', 'Cal Newport'),
(50, 'Expert Secrets ', 'Russell Brunson');

-- --------------------------------------------------------

--
-- Table structure for table `borrow_details`
--

CREATE TABLE `borrow_details` (
  `id` int(250) NOT NULL,
  `borrowerId` int(100) NOT NULL,
  `bookId` int(100) NOT NULL,
  `IssueDate` varchar(50) NOT NULL,
  `returnBy` varchar(100) NOT NULL,
  `securityAmount` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borrow_details`
--

INSERT INTO `borrow_details` (`id`, `borrowerId`, `bookId`, `IssueDate`, `returnBy`, `securityAmount`) VALUES
(17, 11, 46, '2023-03-01', '2023-03-31', '320');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(250) NOT NULL,
  `name` varchar(190) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `address` varchar(500) NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `mobile`, `address`, `email`) VALUES
(11, 'Suryansh', '8549657826', 'Silvassa', 'suryansh371@gmail.com'),
(16, 'Ramesh', '9547856845', 'Bhilad Checkpost', 'ramesh321@gmail.com'),
(17, 'Akshay', '9578546587', 'Mumbai', 'ak35@gmail.com'),
(18, 'Gopal', '854678549', 'Silvassa', 'gopal@gmail.co');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_details`
--
ALTER TABLE `book_details`
  ADD PRIMARY KEY (`bookid`);

--
-- Indexes for table `borrow_details`
--
ALTER TABLE `borrow_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `borrowerId` (`borrowerId`),
  ADD KEY `bookId` (`bookId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_details`
--
ALTER TABLE `book_details`
  MODIFY `bookid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `borrow_details`
--
ALTER TABLE `borrow_details`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrow_details`
--
ALTER TABLE `borrow_details`
  ADD CONSTRAINT `borrow_details_ibfk_1` FOREIGN KEY (`borrowerId`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `borrow_details_ibfk_2` FOREIGN KEY (`bookId`) REFERENCES `book_details` (`bookid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
