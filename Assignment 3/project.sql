-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 10, 2022 at 09:38 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `jeopardy_games`
--

CREATE TABLE `jeopardy_games` (
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jeopardy_games`
--

INSERT INTO `jeopardy_games` (`title`, `author`, `category`, `description`) VALUES
('test', 'wentao chen', 'math', 'this is a test'),
('test', 'wentao chen', 'math', 'this is a test'),
('hahaha@virginia.edu', 'hahaha@virginia.edu', '', 'hahaha@virginia.edu'),
('hahaha@virginia.edu', 'hahaha@virginia.edu', '', 'hahaha@virginia.edu'),
('test', 'wentao', '', 'ahahah'),
('test', 'wentao', '', 'ahahah'),
('testing', 'wentao', '', 'this is a test'),
('empty', 'empty', '', 'empty'),
('wwww', 'www', '', 'www'),
('123123', '123123', '', '123'),
('first game', 'wentao chen', 'physics', 'this is a modern physics jeopardy game'),
('asdf', 'wentao chen', 'asdfasdf', 'asdfasdf'),
('asdf', 'wentao chen', 'asdfasdf', 'asdfasdf'),
('123123', 'wentao chen', '123', '13213'),
('123123', 'wentao chen', '123123', '123123'),
('hhh', 'wentao chen', '123123', '232323'),
('chinese ', 'wentao chen', 'chinese', 'asdfasdf'),
('hw', 'wentao chen', 'w', 'w'),
('w', 'wentao chen', 'wf', 'wef');

-- --------------------------------------------------------

--
-- Table structure for table `jeopardy_game_questions`
--

CREATE TABLE `jeopardy_game_questions` (
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `points` int(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jeopardy_game_questions`
--

INSERT INTO `jeopardy_game_questions` (`title`, `author`, `question`, `points`, `category`) VALUES
('test', 'wentao chen', 'teste', 20, 'math'),
('test', 'wentao chen', 'hahah', 30, 'math');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`email`, `password`, `first_name`, `last_name`) VALUES
('tony', '123456', 'wentao', 'chen'),
('alex', '1234', 'alex', 'h'),
('wc3pka@virginia.edu', '123456', 'wentao', 'chen'),
('wc3pka@virginia.edu', '123456', 'alex', 'perra'),
('chenwentao2001@gmail.com', '123123123', 'yifan', 'zhang'),
('wc3pka@virginia.edu', '123456', 'wentao', 'chen'),
('wc3pka@virginia.edu', '1321132', 'wentao', 'chen');
COMMIT;

CREATE TABLE jeopardy_games (
	`title` varchar(255),
	`author` varchar(255),
  `category` varchar(255),
	`description` varchar(255)
);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
