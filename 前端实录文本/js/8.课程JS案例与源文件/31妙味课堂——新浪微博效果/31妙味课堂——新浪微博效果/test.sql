-- phpMyAdmin SQL Dump
-- version 2.11.2.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2010 年 10 月 11 日 07:13
-- 服务器版本: 5.0.45
-- PHP 版本: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- 数据库: `test`
--

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE `message` (
  `ID` int(11) unsigned NOT NULL auto_increment,
  `msg` text NOT NULL,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=67 ;

--
-- 导出表中的数据 `message`
--

INSERT INTO `message` (`ID`, `msg`, `name`) VALUES
(27, 'asdf', 'asdf'),
(28, 'asdf', 'asdf'),
(29, '12341234', '41234'),
(30, 'asdf', 'asdf'),
(31, 'asdf', 'sadf'),
(32, 'asdf', 'asdf'),
(33, '341234', '122312'),
(34, '', 'Blue'),
(35, 'asdf', 'blue'),
(36, '2', '1'),
(37, '2', '1'),
(38, 'ԭ', 'blue'),
(39, '领导因为在我临行时不经然冒出了三个类母亲字句，为此付出了些许', '石川'),
(40, 'asfd', 'asdd'),
(41, '位领导因为在我临行时不经然冒出了三个类母亲字句，为此付出了些许代价。我始终认为该同学智商很高，希望他可以把原单位带好~他应', 'blue'),
(42, 'werwer', 'asdf'),
(43, '试一下哈', 'Blue'),
(44, '单位领导因为在我临行时不经然冒出了三个类母亲字句，为此付出了些许代价。我始终认为该同学智商很高，希望他可以把原单位带好~他应该也会带', 'test'),
(45, '123', 'test'),
(46, '我想学习JS内容～', '刘伟'),
(47, '我想学习JS内容～', '刘伟'),
(48, '这个好像不错～', '李星星'),
(49, '新浪微博效果', 'Blue'),
(50, '新浪这个效果还不错～', '刘遵强'),
(51, '新浪这个效果还不错～', '刘遵强'),
(52, 'xcvzxcv', 'asdfasd'),
(53, 'werqw', 'asdf'),
(54, 'asdf', 'asdf'),
(55, 'asdf', 'asdf'),
(56, 'asdf', 'asdf'),
(57, 'asdf', 'asdf'),
(58, 'asdf', 'asdf'),
(59, 'asdf', 'asdf'),
(60, 'asdf', 'asdf'),
(61, 'asdf', 'sadf'),
(62, 'dsafs', 'ssadf'),
(63, 'sddfas', 'dfgs'),
(64, 'asdgsdg', 'dfsg'),
(65, 'dvda\nrg\ne\nrsg\ne\ng\nr\ngs\ner\ngvr\nd\nd\n\nvzd\n', 'sf'),
(66, 'asaaaaaaaaaaaaaaaaaaa\naf\n\n\n\n\n\n\n\n\n\naw\nf\nawf\nwe\nf\nwaeaaaaaaaaaaaaa\nawefffffffffffffffffffffffffffffffffff\nqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', 'qqq');
