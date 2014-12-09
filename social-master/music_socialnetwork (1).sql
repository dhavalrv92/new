-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2014 at 07:42 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `music_socialnetwork`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getBandSuggetion`(in p_userId int)
BEGIN
select 
    bd . *
from
    banddtlsview bd,
    (select 
        temp1.bandId, max(prority) prority
    from
        ((select 
        refid as bandId, rd.rating as prority
    from
        rate_dtls rd
    where
        rd.ratedBy in (select 
                userId
            from
                user_music_category umc
            where
                userId <> p_userId
                    and umc.catid in (select 
                        catId
                    from
                        user_music_category umc
                    where
                        umc.userid = p_userId)
            group by userId
            having count(*) > 3)
            and rd.rating > 3
            and rd.rType = 'BAND') union (select 
        mb.bandId, 2 as prority
    from
        user_dtls ud, music_band mb
    where
        ud.originCity = mb.originCity
            and ud.userId = p_userId) union (select 
        refid as bandId, 3 as prority
    from
        rate_dtls rd
    where
        rd.ratedBy in (select 
                fToUserid
            from
                fan_follower
            where
                fByUserId = p_userId)
            and rd.rating > 3
            and rd.rType = 'BAND')) as temp1
    group by temp1.bandId) as temp
where
    bd.bandId = temp.bandId
        and bd.bandId not in (select 
            fToUserid
        from
            fan_follower
        where
            fByUserId = p_userId)
order by temp.prority desc;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getConcertSuggetion`(in p_userId int)
BEGIN
select 
    cd.*,DATE_FORMAT(cd.time,'%b %d %Y %h:%i %p') as conTime
from
    concertdtlsview cd,
    (select 
        conId, max(priority) as priority
    from
        ((select 
        con.conId, 8 as priority
    from
        concert con
    where
        con.isActive = 'Y'
            and con.time >= now()
            and con.bandId in (select 
                fTouserId
            from
                fan_follower
            where
                fByUserid = p_userId)) UNION (select 
        conId, 8 as priority
    from
        rsvp_concert rc
    where
        rc.userId in (select 
                fToUserId
            from
                fan_follower
            where
                fByUserId = p_userId)) UNION (select 
        re.refid as conId, count(*) + 5 as priority
    from
        recommendation re
    where
        re.rectype = 'CONCERT'
            and re.refId in (select 
                con.conId
            from
                concert con
            where
                con.bandId in (select 
                        bandId
                    from
                        music_band mb
                    where
                        mb.bandId in (select 
                                userId as bandId
                            from
                                user_music_category umc
                            where
                                umc.catId in (select 
                                        catId
                                    from
                                        user_music_category umc1
                                    where
                                        umc1.userId = 'userId')))
                    and con.time >= NOW()
                    and con.isActive = 'Y')
    group by refid
    order by count(*) desc) union (select 
        conId, 4 as priority
    from
        concert
    where
        bandId in (select 
                refid as bandId
            from
                rate_dtls rd
            where
                rd.ratedBy in (select 
                        fToUserid
                    from
                        fan_follower
                    where
                        fByUserId = p_userId)
                    and rd.rating > 3
                    and rd.rType = 'BAND')) union (select 
        conId, 3 as priority
    from
        concert
    where
        bandId in ((select 
                refid as bandId
            from
                rate_dtls rd
            where
                rd.ratedBy in (select 
                        userId
                    from
                        user_music_category umc
                    where
                        userId <> p_userId
                            and umc.catid in (select 
                                catId
                            from
                                user_music_category umc
                            where
                                umc.userid = p_userId)
                    group by userId
                    having count(*) > 3)
                    and rd.rating > 3
                    and rd.rType = 'BAND')))) as temp1
    group by temp1.conId) as temp
where
    cd.conId = temp.conId
        and cd.isActive = 'Y'
        and cd.time >= now()
        and cd.conId not in (select conId from rsvp_concert where userId=p_userId) order by temp.priority desc;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getFriendSuggetion`(in p_userId int)
BEGIN
select ud.* from userdtlsview ud , 
(select temp1.userId,max(priority) as priority  from ((select 
    distinct(ud1.userId) as userId, 5 as priority
from
    user_dtls ud1,
    user_dtls ud2
where
    ud1.originCity = ud2.originCity
        and ud1.userId =p_userId and ud1.userId <> ud2.userId)
union
(select 
            distinct(userId) as userId, count(*) as priority
        from
            user_music_category umc
        where
            userId <> p_userId
                and umc.catid in (select 
                    catId
                from
                    user_music_category umc
                where
                    umc.userid = p_userId)
        group by userId
        having count(*) >2)
union
(select 
            distinct(fByUserId) as userId, count(*) as priority
        from
            fan_follower ff
        where
            ff.fByUserId <> p_userId
                and ff.fToUserId in (select 
                    ff1.fToUserId
                from
                    fan_follower ff1
                where
                    ff1.fByUserId = p_userId)
        group by ff.fByUserId
        having count(*) >5)) as temp1 group by temp1.userId) as temp where temp.userId=ud.userId and ud.userId <> '108' and ud.userId not in (select 
                    ff1.fToUserId
                from
                    fan_follower ff1
                where
                    ff1.fByUserId = p_userId ) order by temp.priority desc;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE IF NOT EXISTS `activity` (
`actId` int(11) NOT NULL,
  `actByUserId` int(11) DEFAULT NULL,
  `createdDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `actDesc` varchar(500) DEFAULT NULL,
  `actToUserId` int(11) DEFAULT NULL,
  `actToType` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`actId`, `actByUserId`, `createdDate`, `actDesc`, `actToUserId`, `actToType`) VALUES
(1, 108, '2014-12-05 15:12:26', 'is Following', 117, NULL),
(4, 108, '2014-12-05 15:35:55', 'has rated with 3 to', 115, NULL),
(5, 120, '2014-12-05 17:32:05', 'has given rating 4 to', 111, 'BAND'),
(6, 108, '2014-12-05 17:32:25', 'is Following', 120, 'USER/BAND'),
(8, 108, '2014-12-05 18:17:14', 'has RSVP''d', 9, 'CONCERT'),
(9, 108, '2014-12-05 18:49:24', 'has sent you a Recommendation for', 9, 'CONCERT'),
(10, 108, '2014-12-05 18:56:48', 'has RSVP''d', 9, 'CONCERT'),
(11, 108, '2014-12-05 19:07:12', 'has Created Concert', 12, 'CONCERT'),
(12, 108, '2014-12-05 19:09:05', 'has RSVP''d', 11, 'CONCERT'),
(13, 108, '2014-12-05 19:22:08', 'has given rating 4 to', 11, 'CONCERT'),
(16, 108, '2014-12-05 19:37:52', 'has RSVP''d', 12, 'CONCERT'),
(29, 108, '2014-12-05 19:54:10', 'has RSVP''d', 9, 'CONCERT'),
(30, 108, '2014-12-05 19:54:12', 'has RSVP''d', 9, 'CONCERT'),
(31, 108, '2014-12-05 19:59:33', 'has RSVP''d', 9, 'CONCERT'),
(36, 118, '2014-12-06 15:17:05', 'is Following', 119, 'USER/BAND'),
(37, 118, '2014-12-06 15:17:21', 'is Following', 120, 'USER/BAND'),
(38, 108, '2014-12-06 15:18:34', 'is Following', 118, 'USER/BAND'),
(39, 108, '2014-12-06 15:18:34', 'is Following', 119, 'USER/BAND'),
(40, 108, '2014-12-06 16:57:24', 'has given rating 4 to', 111, 'BAND'),
(41, 108, '2014-12-06 16:57:57', 'has given rating 2 to', 111, 'BAND'),
(42, 108, '2014-12-06 16:59:13', 'has given rating 1 to', 111, 'BAND'),
(44, 112, '2014-12-06 18:59:55', 'has Created Concert', 13, 'CONCERT'),
(45, 112, '2014-12-06 19:25:50', 'has given rating 3 to', 113, 'BAND'),
(46, 108, '2014-12-06 19:27:57', 'has given rating 4 to', 113, 'BAND'),
(47, 108, '2014-12-06 19:34:26', 'has sent you a Recommendation for', 111, 'BAND'),
(48, 108, '2014-12-06 19:34:47', 'has given rating 4 to', 117, 'BAND'),
(49, 108, '2014-12-06 19:56:20', 'has given rating 3 to', 111, 'BAND'),
(50, 108, '2014-12-06 20:03:25', 'is Following', 113, 'USER/BAND'),
(51, 108, '2014-12-06 20:07:35', 'has sent you a Recommendation for', 113, 'BAND'),
(52, 118, '2014-12-06 21:17:20', 'is Following', 114, 'USER/BAND'),
(53, 118, '2014-12-06 21:26:17', 'is Following', 111, 'USER/BAND'),
(54, 118, '2014-12-06 21:26:18', 'is Following', 113, 'USER/BAND'),
(55, 118, '2014-12-06 21:26:20', 'is Following', 117, 'USER/BAND'),
(56, 118, '2014-12-06 21:26:44', 'has sent you a Recommendation for', 111, 'BAND'),
(57, 118, '2014-12-06 21:26:53', 'has given rating 4 to', 111, 'BAND'),
(58, 118, '2014-12-06 21:30:41', 'is Following', 115, 'USER/BAND'),
(59, 118, '2014-12-06 21:31:23', 'is Following', 111, 'USER/BAND'),
(60, 108, '2014-12-06 22:05:58', 'is Following', 120, 'USER/BAND'),
(61, 108, '2014-12-06 22:06:00', 'is Following', 118, 'USER/BAND'),
(62, 108, '2014-12-06 22:06:02', 'is Following', 119, 'USER/BAND'),
(63, 108, '2014-12-06 22:06:03', 'is Following', 112, 'USER/BAND'),
(64, 108, '2014-12-06 22:07:20', 'has RSVP''d', 9, 'CONCERT'),
(65, 108, '2014-12-06 22:19:29', 'has Cancelled RSVP', 9, 'CONCERT'),
(66, 108, '2014-12-06 22:19:48', 'has RSVP''d', 9, 'CONCERT'),
(67, 108, '2014-12-06 22:23:53', 'has sent you a Recommendation for', 9, 'CONCERT'),
(68, 108, '2014-12-06 22:36:28', 'has given rating 3 to', 11, 'CONCERT'),
(69, 108, '2014-12-06 22:40:03', 'has given rating 3 to', 113, 'BAND'),
(70, 108, '2014-12-06 22:40:09', 'has given rating 4 to', 11, 'CONCERT'),
(71, 108, '2014-12-06 22:40:14', 'has given rating 3 to', 117, 'BAND'),
(72, 108, '2014-12-06 22:40:24', 'has given rating 2 to', 11, 'CONCERT'),
(73, 118, '2014-12-06 23:18:17', 'has sent you a Recommendation for', 9, 'CONCERT'),
(74, 118, '2014-12-06 23:18:33', 'has RSVP''d', 9, 'CONCERT'),
(75, 108, '2014-12-07 00:48:12', 'has given review about', 111, 'BAND'),
(76, 108, '2014-12-07 00:56:35', 'has given review about', 111, 'BAND'),
(77, 108, '2014-12-07 01:33:09', 'has given review about', 9, 'CONCERT'),
(78, 108, '2014-12-07 01:33:30', 'has given review about', 9, 'CONCERT'),
(79, 108, '2014-12-07 01:33:38', 'has given review about', 9, 'CONCERT'),
(80, 108, '2014-12-07 01:40:35', 'has given review about', 9, 'CONCERT'),
(81, 108, '2014-12-07 02:55:42', 'has Cancelled RSVP', 9, 'CONCERT'),
(82, 108, '2014-12-07 02:55:52', 'has RSVP''d', 9, 'CONCERT'),
(83, 108, '2014-12-07 02:57:58', 'has given rating 4 to', 11, 'CONCERT'),
(84, 108, '2014-12-07 03:00:08', 'has sent you a Recommendation for', 9, 'CONCERT'),
(85, 108, '2014-12-07 03:02:19', 'has sent you a Recommendation for', 9, 'CONCERT'),
(86, 108, '2014-12-07 03:02:27', 'has Cancelled RSVP', 9, 'CONCERT'),
(87, 108, '2014-12-07 03:02:34', 'has RSVP''d', 9, 'CONCERT'),
(88, 108, '2014-12-07 03:03:12', 'has given review about', 11, 'CONCERT'),
(89, 108, '2014-12-07 03:03:23', 'has given review about', 11, 'CONCERT'),
(90, 120, '2014-12-07 11:39:41', 'is Following', 118, 'USER/BAND'),
(91, 120, '2014-12-07 11:39:44', 'is Following', 119, 'USER/BAND'),
(92, 120, '2014-12-07 11:39:45', 'is Following', 112, 'USER/BAND'),
(93, 120, '2014-12-07 11:43:18', 'has Created Concert', 14, 'CONCERT'),
(94, 121, '2014-12-07 12:21:26', 'is Following', 111, 'USER/BAND'),
(95, 121, '2014-12-07 12:25:08', 'is Following', 118, 'USER/BAND'),
(96, 121, '2014-12-07 12:25:14', 'is Following', 119, 'USER/BAND'),
(97, 118, '2014-12-07 13:42:56', 'has Cancelled RSVP', 9, 'CONCERT'),
(98, 111, '2014-12-07 13:46:17', 'has Created Concert', 15, 'CONCERT'),
(99, 112, '2014-12-07 14:18:59', 'has Cancelled Concert  cname', 13, 'CONCERT'),
(100, 108, '2014-12-07 15:10:24', 'is Following', 120, 'USER/BAND'),
(101, 124, '2014-12-07 20:36:56', 'is Following', 111, 'USER/BAND'),
(102, 125, '2014-12-07 21:21:54', 'has Created Concert', 16, 'CONCERT'),
(103, 125, '2014-12-07 21:22:02', 'has Created Concert', 17, 'CONCERT'),
(104, 125, '2014-12-07 21:22:25', 'has Cancelled Concert  Davids First', 17, 'CONCERT'),
(105, 125, '2014-12-07 21:25:11', 'has Created Concert', 18, 'CONCERT'),
(106, 125, '2014-12-07 21:30:12', 'has Cancelled Concert  Davids First', 18, 'CONCERT'),
(107, 126, '2014-12-07 21:44:04', 'is Following', 111, 'USER/BAND'),
(108, 126, '2014-12-07 22:13:07', 'is Following', 108, 'USER/BAND'),
(109, 126, '2014-12-07 22:28:29', 'has RSVPd', 15, 'CONCERT'),
(110, 126, '2014-12-07 23:01:24', 'has RSVPd', 9, 'CONCERT'),
(111, 126, '2014-12-07 23:06:15', 'is Following', 125, 'USER/BAND'),
(112, 126, '2014-12-07 23:06:20', 'has RSVPd', 16, 'CONCERT'),
(113, 126, '2014-12-07 23:07:15', 'is Following', 124, 'USER/BAND'),
(114, 126, '2014-12-07 23:07:17', 'is Following', 120, 'USER/BAND'),
(115, 126, '2014-12-07 23:07:18', 'is Following', 118, 'USER/BAND'),
(116, 126, '2014-12-07 23:07:19', 'is Following', 121, 'USER/BAND'),
(117, 127, '2014-12-08 10:24:07', 'has Created Concert', 17, 'CONCERT'),
(118, 127, '2014-12-08 10:25:58', 'has Created Concert', 18, 'CONCERT'),
(119, 126, '2014-12-08 10:36:15', 'has sent you a Recommendation for', 9, 'CONCERT'),
(120, 127, '2014-12-08 10:41:17', 'has Created Concert', 19, 'CONCERT');

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE IF NOT EXISTS `artist` (
`aId` int(11) NOT NULL,
  `aName` varchar(100) DEFAULT NULL,
  `originCountry` varchar(100) NOT NULL,
  `originCity` varchar(100) DEFAULT NULL,
  `catId` int(11) DEFAULT NULL,
  `artistDesc` varchar(150) DEFAULT NULL,
  `tags` varchar(200) DEFAULT NULL,
  `bandId` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`aId`, `aName`, `originCountry`, `originCity`, `catId`, `artistDesc`, `tags`, `bandId`) VALUES
(3, 'A2', 'USA', 'Alabama', NULL, 'A2', NULL, 111),
(4, 'name', 'USA', 'Alabama', NULL, 'desc', NULL, 113),
(5, 'fssfd', 'USA', 'Alabama', NULL, 'sdfs', NULL, 113),
(6, 'ar1', 'India', 'Gujarat', NULL, 'ar', NULL, 115),
(7, 'dsfds', 'USA', 'Alabama', NULL, 'fsdf', NULL, 116),
(8, 'fsdfdsfs', 'USA', 'California', NULL, 'dfsdf', NULL, 111),
(9, 'Kamaljit', 'India', 'Maharashtra', NULL, 'Kamaljit Singh Jhooti (born 26 March 1979), better known by his stage name Jay Sean, is a British singer-songwriter and rapper.', NULL, 127);

-- --------------------------------------------------------

--
-- Stand-in structure for view `avgbandratingview`
--
CREATE TABLE IF NOT EXISTS `avgbandratingview` (
`bandId` int(11)
,`avgRating` varchar(14)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `avgconcertratingview`
--
CREATE TABLE IF NOT EXISTS `avgconcertratingview` (
`conId` int(11)
,`avgRating` varchar(14)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `banddtlsview`
--
CREATE TABLE IF NOT EXISTS `banddtlsview` (
`bandId` int(11)
,`bandName` varchar(100)
,`originCity` varchar(45)
,`originCountry` varchar(100)
,`bandDesc` varchar(150)
,`tags` varchar(200)
,`userName` varchar(100)
,`password` varchar(100)
,`role` enum('BAND','USER','ADMIN')
,`lastLoginTime` datetime
,`email` varchar(100)
,`phoneno` varchar(45)
,`createdDate` datetime
,`isActive` varchar(1)
,`avgRating` varchar(14)
,`cnt` bigint(21)
,`concertCnt` bigint(21)
);
-- --------------------------------------------------------

--
-- Table structure for table `concert`
--

CREATE TABLE IF NOT EXISTS `concert` (
`conId` int(11) NOT NULL,
  `conName` varchar(100) DEFAULT NULL,
  `bandId` int(11) DEFAULT NULL,
  `vId` int(11) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `conDesc` varchar(100) DEFAULT NULL,
  `createdBy` int(11) DEFAULT NULL,
  `isActive` enum('N','Y') DEFAULT NULL,
  `createdDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `tsId` int(11) DEFAULT NULL,
  `price` float(5,2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `concert`
--

INSERT INTO `concert` (`conId`, `conName`, `bandId`, `vId`, `time`, `conDesc`, `createdBy`, `isActive`, `createdDate`, `tsId`, `price`) VALUES
(9, 'after', 111, 1, '2014-12-30 00:00:00', 'desc', 111, 'Y', '2014-11-30 22:15:40', NULL, 20.00),
(11, 'before', 111, 1, '2014-12-01 00:00:00', 'desc', 108, 'Y', '2014-12-01 00:04:15', NULL, 10.00),
(14, 'Rock Concert', 115, 1, '2015-01-01 10:00:00', 'superb rock nice concert', 120, 'N', '2014-12-07 11:43:18', 2, 10.00),
(15, 'Hit NYU', 111, 1, '2015-01-11 11:11:00', 'super hit', 111, 'Y', '2014-12-07 13:46:17', 1, 15.00),
(16, 'Davids First', 125, 2, '2014-12-22 22:10:00', '..Header Banner Made with MyBannerMaker.com! Click here to make your ...', 125, 'Y', '2014-12-07 21:21:54', 1, 50.00),
(17, 'PUNJABI BEATS', 127, 3, '2014-12-12 23:11:00', 'Jay Seans hit album All or Nothin', 127, 'Y', '2014-12-08 10:24:07', 2, 15.00),
(18, 'PUNJABI BEATS 22', 127, 3, '2014-12-30 12:12:00', ' Jay Sean''s hit album &quot;All or Nothing&quot; didn''t happen magically -- so say the music produce', 127, 'Y', '2014-12-08 10:25:58', 1, 7.00),
(19, 'JAY 2014', 127, 2, '2014-12-13 12:12:00', '', 127, 'Y', '2014-12-08 10:41:17', 2, 1.00);

--
-- Triggers `concert`
--
DELIMITER //
CREATE TRIGGER `concert_ADEL` AFTER DELETE ON `concert`
 FOR EACH ROW begin
if old.isActive = 'Y'
then
INSERT INTO `music_socialnetwork`.`activity`
(
`actByUserId`,
`actDesc`,
`actToUserId`,`actToType`)
VALUES
(old.bandId,
CONCAT_WS(' ','has Cancelled Concert ',old.conName),
old.conId,'CONCERT');
end if;
end
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `concert_AINS` AFTER INSERT ON `concert`
 FOR EACH ROW begin
update user_dtls set trustScore = trustScore+1 where userId=new.createdBy;

INSERT INTO `music_socialnetwork`.`activity`
(
`actByUserId`,
`actDesc`,
`actToUserId`,`actToType`)
VALUES
(new.createdBy,
'has Created Concert',
new.conId,'CONCERT');

end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `concertcntview`
--
CREATE TABLE IF NOT EXISTS `concertcntview` (
`bandId` int(11)
,`concertCnt` bigint(21)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `concertdtlsview`
--
CREATE TABLE IF NOT EXISTS `concertdtlsview` (
`conId` int(11)
,`conName` varchar(100)
,`bandId` int(11)
,`vId` int(11)
,`time` datetime
,`conDesc` varchar(100)
,`createdBy` int(11)
,`isActive` enum('N','Y')
,`createdDate` datetime
,`tsId` int(11)
,`price` float(5,2)
,`rsvpCnt` bigint(21)
,`bandDesc` varchar(150)
,`bandName` varchar(100)
,`originCity` varchar(45)
,`originCountry` varchar(100)
,`tags` varchar(200)
,`capacity` int(11)
,`vCreatedDate` datetime
,`vDesc` varchar(100)
,`latitude` double
,`longitude` double
,`url` varchar(150)
,`vAddr` varchar(150)
,`vCity` varchar(100)
,`vCountry` varchar(150)
,`vName` varchar(100)
,`avgRating` varchar(14)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `concertrsvpview`
--
CREATE TABLE IF NOT EXISTS `concertrsvpview` (
`conId` int(11)
,`rsvpCnt` bigint(21)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `concertuserrsvpcntview`
--
CREATE TABLE IF NOT EXISTS `concertuserrsvpcntview` (
`userId` int(11)
,`userConCnt` bigint(21)
);
-- --------------------------------------------------------

--
-- Table structure for table `concert_approval`
--

CREATE TABLE IF NOT EXISTS `concert_approval` (
  `conId` int(11) NOT NULL,
  `apprBy` int(11) NOT NULL,
  `appDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `vote` varchar(3) DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `concert_approval`
--

INSERT INTO `concert_approval` (`conId`, `apprBy`, `appDate`, `vote`) VALUES
(13, 118, '2014-12-06 23:17:00', 'Y');

--
-- Triggers `concert_approval`
--
DELIMITER //
CREATE TRIGGER `concert_approval_AINS` AFTER INSERT ON `concert_approval`
 FOR EACH ROW begin
DECLARE cnt INT;
declare userId int;
declare conId int;
set conId=new.conId;

select count(*) into cnt from concert_approval ca where ca.conId=new.conId and vote='Y';
select createdBy into userId from concert where concert.conId= new.conId;
if cnt > 1
then
	update concert set isActive='Y' where concert.conId=new.conId;
	update user_dtls ud set ud.trustScore = ud.trustScore+3 where ud.userId=userId;
else 
	select count(*) into cnt from concert_approval ca where ca.conId=new.conId and vote='N';
if cnt > 1
then
	delete from concert  where concert.conId=conId;
	update user_dtls ud set ud.trustScore = ud.trustScore/2 where ud.userId=userId;
end if;
end if;
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `fan_follower`
--

CREATE TABLE IF NOT EXISTS `fan_follower` (
  `fByUserid` int(11) NOT NULL,
  `fToUserid` int(11) NOT NULL,
  `createdDate` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fan_follower`
--

INSERT INTO `fan_follower` (`fByUserid`, `fToUserid`, `createdDate`) VALUES
(108, 112, '2014-12-06 22:06:03'),
(108, 113, '2014-12-06 20:03:25'),
(108, 115, '2014-12-04 01:43:56'),
(108, 117, '2014-12-05 15:12:26'),
(108, 118, '2014-12-06 22:06:00'),
(108, 119, '2014-12-06 22:06:02'),
(108, 120, '2014-12-07 15:10:24'),
(112, 108, '2014-12-03 00:08:01'),
(112, 113, '2014-12-03 00:07:50'),
(112, 115, '2014-12-03 00:09:35'),
(118, 108, '2014-12-04 18:52:41'),
(118, 111, '2014-12-06 21:31:23'),
(118, 114, '2014-12-06 21:17:20'),
(118, 119, '2014-12-06 15:17:05'),
(118, 120, '2014-12-06 15:17:21'),
(120, 108, '2014-12-05 14:36:12'),
(120, 111, '2014-12-05 14:35:40'),
(120, 112, '2014-12-07 11:39:45'),
(120, 113, '2014-12-05 14:35:41'),
(120, 115, '2014-12-05 14:35:43'),
(120, 118, '2014-12-07 11:39:41'),
(120, 119, '2014-12-07 11:39:44'),
(121, 111, '2014-12-07 12:21:26'),
(121, 118, '2014-12-07 12:25:08'),
(121, 119, '2014-12-07 12:25:14'),
(124, 111, '2014-12-07 20:36:56'),
(126, 108, '2014-12-07 22:13:07'),
(126, 111, '2014-12-07 21:44:04'),
(126, 118, '2014-12-07 23:07:18'),
(126, 120, '2014-12-07 23:07:17'),
(126, 121, '2014-12-07 23:07:19'),
(126, 124, '2014-12-07 23:07:15'),
(126, 125, '2014-12-07 23:06:15');

--
-- Triggers `fan_follower`
--
DELIMITER //
CREATE TRIGGER `fan_follower_ADEL` AFTER DELETE ON `fan_follower`
 FOR EACH ROW begin
update user_dtls set trustScore = trustScore-0.5 where userId=old.fToUserId;
end
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `fan_follower_AINS` AFTER INSERT ON `fan_follower`
 FOR EACH ROW begin
update user_dtls set trustScore = trustScore+0.3 where userId=new.fByUserId;
update user_dtls set trustScore = trustScore+1 where userId=new.fToUserId;
INSERT INTO `music_socialnetwork`.`activity`
(
`actByUserId`,
`actDesc`,
`actToUserId`,`actToType`)
VALUES
(new.fByUserId,
'is Following',
new.fToUserId,'USER/BAND');

end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
`imageId` int(11) NOT NULL,
  `imageName` varchar(100) DEFAULT NULL,
  `imagePath` varchar(500) DEFAULT NULL,
  `createdDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `isActive` enum('N','Y') DEFAULT 'Y',
  `imageType` enum('CONCERT','PROFILE') DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `desc` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imageId`, `imageName`, `imagePath`, `createdDate`, `isActive`, `imageType`, `userId`, `desc`) VALUES
(1, 'img/64131_597407223620019_362775537_n (2).jpg', 'img/64131_597407223620019_362775537_n (2).jpg', '2014-12-02 19:17:44', 'Y', NULL, 108, NULL),
(2, NULL, NULL, '2014-12-02 23:28:47', 'Y', NULL, 115, NULL),
(3, NULL, NULL, '2014-12-03 20:59:26', 'Y', NULL, 116, NULL),
(4, NULL, NULL, '2014-12-03 21:00:41', 'Y', NULL, 117, NULL),
(5, 'img/kerala.jpg', 'img/kerala.jpg', '2014-12-04 18:47:38', 'Y', NULL, 118, NULL),
(6, NULL, NULL, '2014-12-04 18:50:46', 'Y', NULL, 119, NULL),
(7, 'img/Penguins.jpg', 'img/Penguins.jpg', '2014-12-05 14:34:10', 'Y', NULL, 120, NULL),
(8, NULL, NULL, '2014-12-06 18:03:46', 'Y', NULL, 110, NULL),
(10, NULL, NULL, '2014-12-06 18:05:16', 'Y', NULL, 111, NULL),
(12, NULL, NULL, '2014-12-06 18:06:15', 'Y', NULL, 112, NULL),
(13, NULL, NULL, '2014-12-06 18:06:15', 'Y', NULL, 113, NULL),
(16, NULL, NULL, '2014-12-06 18:06:31', 'Y', NULL, 114, NULL),
(17, NULL, NULL, '2014-12-07 12:19:53', 'Y', NULL, 121, NULL),
(18, NULL, NULL, '2014-12-07 20:28:37', 'Y', NULL, 122, NULL),
(19, NULL, NULL, '2014-12-07 20:32:54', 'Y', NULL, 123, NULL),
(20, NULL, NULL, '2014-12-07 20:36:01', 'Y', NULL, 124, NULL),
(21, NULL, NULL, '2014-12-07 20:58:29', 'Y', NULL, 125, NULL),
(22, 'img/download44.jpg', 'img/download44.jpg', '2014-12-07 21:40:15', 'Y', NULL, 126, NULL),
(23, 'img/jay.jpg', 'img/jay.jpg', '2014-12-08 10:17:12', 'Y', NULL, 127, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `musiccategorybandview`
--
CREATE TABLE IF NOT EXISTS `musiccategorybandview` (
`catId` int(11)
,`bandId` int(11)
,`bandName` varchar(100)
,`originCity` varchar(45)
,`originCountry` varchar(100)
,`bandDesc` varchar(150)
,`tags` varchar(200)
,`url` varchar(150)
);
-- --------------------------------------------------------

--
-- Table structure for table `music_band`
--

CREATE TABLE IF NOT EXISTS `music_band` (
  `bandId` int(11) NOT NULL,
  `bandName` varchar(100) DEFAULT NULL,
  `originCity` varchar(45) DEFAULT NULL,
  `originCountry` varchar(100) NOT NULL,
  `bandDesc` varchar(150) DEFAULT NULL,
  `tags` varchar(200) DEFAULT NULL,
  `url` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `music_band`
--

INSERT INTO `music_band` (`bandId`, `bandName`, `originCity`, `originCountry`, `bandDesc`, `tags`, `url`) VALUES
(111, 'band name', 'Alabama', 'USA', 'About Band About BandAbout BandAbout BandAbout BandAbout BandAbout Band', NULL, NULL),
(113, 'B Name', 'Alabama', 'USA', 'band dexc', NULL, NULL),
(115, 'Rock Band', 'Alabama', 'USA', 'desc', NULL, NULL),
(116, 'Indian Ocean', 'Delhi', 'India', 'Indian Ocean is a contemporary rock band from the capital city of India, Delhi. The rock band has so far compiled music from different genres, includi', NULL, NULL),
(117, 'dfs', 'Alabama', 'USA', 'asfsdf', NULL, NULL),
(125, 'Davids', 'Eastern', 'American Samoa', NULL, NULL, NULL),
(127, 'JAYYYYYYY', 'Maharashtra', 'India', 'Kamaljit Singh Jhooti (born 26 March 1979), better known by his stage name Jay Sean, is a British singer-songwriter and rapper.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `music_category`
--

CREATE TABLE IF NOT EXISTS `music_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(100) DEFAULT NULL,
  `originCity` varchar(100) DEFAULT NULL,
  `parentCatId` int(11) DEFAULT NULL,
  `catDesc` varchar(500) DEFAULT NULL,
  `tags` varchar(200) DEFAULT NULL,
  `instruments` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `music_category`
--

INSERT INTO `music_category` (`catId`, `catName`, `originCity`, `parentCatId`, `catDesc`, `tags`, `instruments`) VALUES
(1, 'FILMI', 'MUMBAI', 10, 'Filmi (Hindi: फ़िल्मी संगीत, "of films") is Indian popular music as written and performed for Indian cinema (though "filmi" may refer to other uses such as ''filmi actor'' or ''filmi attitude'').', 'INDIAN BOLLYWOOD HINDI', NULL),
(2, 'GARBA', 'GUJARAT', 10, '', 'INDIA GUJARATI', NULL),
(3, 'JAZZ', 'NEW YORK CITY', NULL, '', 'US JAZZ NEWYORK AMERICA African-American', NULL),
(4, 'HIP HOP', 'SOUTH BRONX', 11, '', 'US AMERICA AFRICAN BROOKLYN', NULL),
(5, 'AMERICANA', 'AMERICA', 11, '', ' folk country blues rhythm blues rock-and-roll US', NULL),
(6, 'FREE JAZZ', 'NEW YORK CITY', 3, '', 'US JAZZ NEWYORK AMERICA African-American', NULL),
(7, 'BEBOB', 'NEW YORK CITY', 3, '', 'US JAZZ NEWYORK AMERICA African-American', NULL),
(8, 'COOL JAZZ', 'NEW YORK CITY', 3, '', 'US JAZZ NEWYORK AMERICA African-American', NULL),
(9, 'BHAJAN', NULL, 10, 'A Bhajan is any type of Hindu devotional song. It has no fixed form: it may be as simple as a mantra or kirtan or as sophisticated as the dhrupad or kriti with music based on classical ragas and talas', 'HINDU TRADITIONAL INDIA TEMPLE RELIGIOUS HOLY', NULL),
(10, 'INDIAN MUSIC', 'INDIA', NULL, 'The music of India includes multiple varieties of folk music, pop, and Indian classical music. India''s classical music tradition, including Hindustani music and Carnatic, has a history spanning millennia and developed over several eras.', 'INDIA DESI BOLLYWOOD BHAJAN TRADITIONAL', NULL),
(11, 'AFRICAN-AMERICAN', NULL, NULL, 'African-American music is an umbrella term covering a diverse range of musics and musical genres largely developed by African Americans. Negro spirituals, ragtime, jazz, blues, house, doo-wop, rhythm and blues, rock and roll, funk, hip hop, soul, disco and techno constitute the principal modern genres of African-American music.', 'US AMERICA AFRICAN BROOKLYN JAZZ', 'banjo');

-- --------------------------------------------------------

--
-- Table structure for table `rate_dtls`
--

CREATE TABLE IF NOT EXISTS `rate_dtls` (
`rId` int(11) NOT NULL,
  `rType` enum('CONCERT','BAND') DEFAULT NULL,
  `refId` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `review` varchar(150) DEFAULT NULL,
  `ratedBy` int(11) DEFAULT NULL,
  `ratedDate` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rate_dtls`
--

INSERT INTO `rate_dtls` (`rId`, `rType`, `refId`, `rating`, `review`, `ratedBy`, `ratedDate`) VALUES
(12, 'BAND', 115, 3, NULL, 126, '2014-12-05 15:35:55'),
(13, 'BAND', 111, 4, NULL, 120, '2014-12-05 17:32:05'),
(18, 'BAND', 113, 3, NULL, 112, '2014-12-06 19:25:50'),
(21, 'BAND', 111, 3, NULL, 108, '2014-12-06 19:56:20'),
(22, 'BAND', 111, 4, NULL, 118, '2014-12-06 21:26:53'),
(24, 'BAND', 113, 3, NULL, 108, '2014-12-06 22:40:03'),
(26, 'BAND', 117, 3, NULL, 126, '2014-12-06 22:40:14'),
(28, 'CONCERT', 11, 4, NULL, 108, '2014-12-07 02:57:58');

--
-- Triggers `rate_dtls`
--
DELIMITER //
CREATE TRIGGER `rate_dtls_ADEL` AFTER DELETE ON `rate_dtls`
 FOR EACH ROW begin
update user_dtls set trustScore = trustScore-0.3 where userId=old.ratedBy;
end
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `rate_dtls_AINS` AFTER INSERT ON `rate_dtls`
 FOR EACH ROW begin
update user_dtls set trustScore = trustScore+0.3 where userId=new.ratedBy;

INSERT INTO `music_socialnetwork`.`activity`
(
`actByUserId`,
`actDesc`,
`actToUserId`,`actToType`)
VALUES
(new.ratedBy,
CONCAT('has given rating ',new.rating,' to'),
new.refId,new.rType);

end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `recommendation`
--

CREATE TABLE IF NOT EXISTS `recommendation` (
  `recFromUserId` int(11) NOT NULL,
  `refId` int(11) NOT NULL,
  `recType` enum('CONCERT','BAND') DEFAULT NULL,
  `cratedDate` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recommendation`
--

INSERT INTO `recommendation` (`recFromUserId`, `refId`, `recType`, `cratedDate`) VALUES
(108, 113, 'BAND', '2014-12-06 20:07:35'),
(112, 115, 'BAND', '2014-12-03 00:09:40'),
(118, 111, 'BAND', '2014-12-06 21:26:44'),
(126, 9, 'CONCERT', '2014-12-08 10:36:15');

--
-- Triggers `recommendation`
--
DELIMITER //
CREATE TRIGGER `recommendation_AINS` AFTER INSERT ON `recommendation`
 FOR EACH ROW begin
update user_dtls set trustScore = trustScore+1 where userId=new.recFromUserId;

INSERT INTO `music_socialnetwork`.`activity`
(
`actByUserId`,
`actDesc`,
`actToUserId`,`actToType`)
VALUES
(new.recFromUserId,
'has sent you a Recommendation for',
new.refId,new.recType);

end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `review_dtls`
--

CREATE TABLE IF NOT EXISTS `review_dtls` (
`reviewId` int(11) NOT NULL,
  `reviewByUserId` int(11) DEFAULT NULL,
  `reviewToId` int(11) DEFAULT NULL,
  `review` varchar(500) DEFAULT NULL,
  `createdDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `reviewType` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `review_dtls`
--

INSERT INTO `review_dtls` (`reviewId`, `reviewByUserId`, `reviewToId`, `review`, `createdDate`, `reviewType`) VALUES
(1, 126, 111, 'nice !', '2014-12-07 00:48:12', 'BAND'),
(2, 126, 111, 'Great', '2014-12-07 00:56:35', 'BAND'),
(3, 126, 9, 'nice !', '2014-12-07 01:33:09', 'CONCERT'),
(4, 126, 9, 'nice !', '2014-12-07 01:33:30', 'CONCERT'),
(5, 126, 9, 'wow !', '2014-12-07 01:33:38', 'CONCERT'),
(6, 108, 9, '', '2014-12-07 01:40:35', 'CONCERT'),
(7, 108, 11, 'wow nice good ', '2014-12-07 03:03:12', 'CONCERT'),
(8, 108, 11, 'superb !', '2014-12-07 03:03:23', 'CONCERT');

--
-- Triggers `review_dtls`
--
DELIMITER //
CREATE TRIGGER `review_dtls_AINS` AFTER INSERT ON `review_dtls`
 FOR EACH ROW begin
update user_dtls set trustScore = trustScore+0.3 where userId=new.reviewByUserId;

INSERT INTO `music_socialnetwork`.`activity`
(
`actByUserId`,
`actDesc`,
`actToUserId`,`actToType`)
VALUES
(new.reviewByUserId,
'has given review about',
new.reviewToId,new.reviewType);
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `rsvp_concert`
--

CREATE TABLE IF NOT EXISTS `rsvp_concert` (
`rsvpId` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `conId` int(11) DEFAULT NULL,
  `createddate` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rsvp_concert`
--

INSERT INTO `rsvp_concert` (`rsvpId`, `userId`, `conId`, `createddate`) VALUES
(4, 108, 11, '2014-12-05 19:09:05'),
(12, 108, 9, '2014-12-07 03:02:34'),
(13, 126, 15, '2014-12-07 22:28:29'),
(14, 126, 9, '2014-12-07 23:01:24'),
(15, 126, 16, '2014-12-07 23:06:20');

--
-- Triggers `rsvp_concert`
--
DELIMITER //
CREATE TRIGGER `rsvp_concert_ADEL` AFTER DELETE ON `rsvp_concert`
 FOR EACH ROW begin
update user_dtls set trustScore = trustScore-0.5 where userId=old.userId;

INSERT INTO `music_socialnetwork`.`activity`
(
`actByUserId`,
`actDesc`,
`actToUserId`,`actToType`)
VALUES
(old.userId,
'has Cancelled RSVP',
old.conId,'CONCERT');
end
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `rsvp_concert_AINS` AFTER INSERT ON `rsvp_concert`
 FOR EACH ROW begin
update user_dtls set trustScore = trustScore+0.5 where userId=new.userId;

INSERT INTO `music_socialnetwork`.`activity`
(
`actByUserId`,
`actDesc`,
`actToUserId`,`actToType`)
VALUES
(new.userId,
'has RSVPd',
new.conId,'CONCERT');

end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `tempavgbandratingview`
--
CREATE TABLE IF NOT EXISTS `tempavgbandratingview` (
`bandId` int(11)
,`avgRating` decimal(12,1)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `tempavgconcertratingview`
--
CREATE TABLE IF NOT EXISTS `tempavgconcertratingview` (
`avgRating` decimal(12,1)
,`conId` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `tempconcertcntview`
--
CREATE TABLE IF NOT EXISTS `tempconcertcntview` (
`bandId` int(11)
,`conCnt` bigint(21)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `tempconcertrsvpview`
--
CREATE TABLE IF NOT EXISTS `tempconcertrsvpview` (
`conId` int(11)
,`rsvpCnt` bigint(21)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `tempconcertuserrsvpcntview`
--
CREATE TABLE IF NOT EXISTS `tempconcertuserrsvpcntview` (
`userId` int(11)
,`userConCnt` bigint(21)
);
-- --------------------------------------------------------

--
-- Table structure for table `tempuser`
--

CREATE TABLE IF NOT EXISTS `tempuser` (
`id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tempuser`
--

INSERT INTO `tempuser` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(27);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tempuserfollowercountview`
--
CREATE TABLE IF NOT EXISTS `tempuserfollowercountview` (
`cnt` bigint(21)
,`fToUserid` int(11)
);
-- --------------------------------------------------------

--
-- Table structure for table `ticket_shop`
--

CREATE TABLE IF NOT EXISTS `ticket_shop` (
`tsId` int(11) NOT NULL,
  `tsName` varchar(100) DEFAULT NULL,
  `tsLocation` varchar(150) DEFAULT NULL,
  `desc` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ticket_shop`
--

INSERT INTO `ticket_shop` (`tsId`, `tsName`, `tsLocation`, `desc`) VALUES
(1, 'NYU Poly', ' 6 Metrotech Center, Brooklyn, NY 11201', 'For 1 only'),
(2, 'NYU Main', '70 Washington Square S, New York, NY 10012', 'Open Bar');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userId` int(11) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('BAND','USER','ADMIN') DEFAULT NULL,
  `lastLoginTime` datetime DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phoneno` varchar(45) DEFAULT NULL,
  `createdDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `isActive` varchar(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `userName`, `password`, `role`, `lastLoginTime`, `email`, `phoneno`, `createdDate`, `isActive`) VALUES
(1, 'theFronts', 'e10adc3949ba59abbe56e057f20f883e', 'ADMIN', '2014-10-09 00:00:00', 'front@gmail.com', '1908725345', '2014-11-24 09:07:56', 'N'),
(108, 'test3', 'e10adc3949ba59abbe56e057f20f883e', 'USER', '2014-12-07 20:09:20', '3@abc.com', NULL, '2014-11-29 20:45:27', 'Y'),
(110, 'user', 'e10adc3949ba59abbe56e057f20f883e', 'USER', NULL, 'u@mail.com', NULL, '2014-11-30 20:45:13', 'N'),
(111, 'band', 'e10adc3949ba59abbe56e057f20f883e', 'BAND', '2014-12-07 14:20:03', 'b@mail.com', NULL, '2014-11-30 20:47:09', 'N'),
(112, 'priyam', 'e10adc3949ba59abbe56e057f20f883e', 'USER', '2014-12-06 19:27:37', 'p@mail.com', NULL, '2014-12-01 13:08:54', 'Y'),
(113, 'band1', 'e10adc3949ba59abbe56e057f20f883e', 'BAND', NULL, 'b@mail.com', NULL, '2014-12-01 13:16:51', 'N'),
(114, 'test11', 'e10adc3949ba59abbe56e057f20f883e', 'USER', NULL, 't@mail1.com', NULL, '2014-12-02 11:12:06', 'N'),
(115, 'rockband', 'e10adc3949ba59abbe56e057f20f883e', 'BAND', NULL, 'rb@mail.com', NULL, '2014-12-02 23:28:47', 'Y'),
(116, 'bandp', 'e10adc3949ba59abbe56e057f20f883e', 'BAND', NULL, 'p@mail.com', NULL, '2014-12-03 20:59:26', 'Y'),
(117, 'bandb', 'e10adc3949ba59abbe56e057f20f883e', 'BAND', NULL, 'b@mail.com', NULL, '2014-12-03 21:00:41', 'Y'),
(118, 'chirag', 'e10adc3949ba59abbe56e057f20f883e', 'USER', '2014-12-07 13:47:05', 'g@mail.com', NULL, '2014-12-04 18:47:38', 'Y'),
(119, 'kartik', 'e10adc3949ba59abbe56e057f20f883e', 'USER', '2014-12-04 18:52:21', 'k@mail.com', NULL, '2014-12-04 18:50:46', 'Y'),
(120, 'dhaval', 'e10adc3949ba59abbe56e057f20f883e', 'USER', '2014-12-07 11:43:30', 'd@mail.com', NULL, '2014-12-05 14:34:10', 'Y'),
(121, 'jag907', 'e10adc3949ba59abbe56e057f20f883e', 'USER', '2014-12-07 12:26:31', 'jen@mail.com', NULL, '2014-12-07 12:19:53', 'Y'),
(122, 'dev', 'e10adc3949ba59abbe56e057f20f883e', 'USER', '2014-12-07 20:32:35', 'd@mail.com', NULL, '2014-12-07 20:28:37', 'N'),
(123, 'anup', 'e10adc3949ba59abbe56e057f20f883e', 'USER', '2014-12-07 20:35:38', 'a@mail.com', NULL, '2014-12-07 20:32:54', 'N'),
(124, 'ankit', 'e10adc3949ba59abbe56e057f20f883e', 'USER', '2014-12-07 20:37:39', 'an@mail.com', NULL, '2014-12-07 20:36:01', 'Y'),
(125, 'david', 'fde74a8125aa04a1319c4f330bd765f4', 'BAND', '2014-12-07 21:39:37', 'david@nyu.edu', NULL, '2014-12-07 20:58:29', 'N'),
(126, 'DhavalV', 'fde74a8125aa04a1319c4f330bd765f4', 'USER', NULL, 'dhaval@yahoo.com', NULL, '2014-12-07 21:40:15', 'Y'),
(127, 'JAY', 'fde74a8125aa04a1319c4f330bd765f4', 'BAND', NULL, 'sean@music.com', NULL, '2014-12-08 10:17:12', 'N');

-- --------------------------------------------------------

--
-- Stand-in structure for view `userdtlsview`
--
CREATE TABLE IF NOT EXISTS `userdtlsview` (
`userId` int(11)
,`originCity` varchar(100)
,`originCountry` varchar(100)
,`trustScore` float(3,1)
,`about` varchar(100)
,`fName` varchar(150)
,`lName` varchar(150)
,`sex` enum('MALE','FEMALE')
,`userName` varchar(100)
,`password` varchar(100)
,`role` enum('BAND','USER','ADMIN')
,`lastLoginTime` datetime
,`email` varchar(100)
,`phoneno` varchar(45)
,`createdDate` datetime
,`isActive` varchar(1)
,`cnt` bigint(21)
,`userConCnt` bigint(21)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `userfollowercountview`
--
CREATE TABLE IF NOT EXISTS `userfollowercountview` (
`userId` int(11)
,`cnt` bigint(21)
);
-- --------------------------------------------------------

--
-- Table structure for table `user_dtls`
--

CREATE TABLE IF NOT EXISTS `user_dtls` (
  `userId` int(11) NOT NULL,
  `originCity` varchar(100) DEFAULT NULL,
  `originCountry` varchar(100) NOT NULL,
  `trustScore` float(3,1) DEFAULT '0.0',
  `about` varchar(100) DEFAULT NULL,
  `fName` varchar(150) DEFAULT NULL,
  `lName` varchar(150) DEFAULT NULL,
  `sex` enum('MALE','FEMALE') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_dtls`
--

INSERT INTO `user_dtls` (`userId`, `originCity`, `originCountry`, `trustScore`, `about`, `fName`, `lName`, `sex`) VALUES
(108, 'Kansas', 'USA', 21.4, 'Music is an art form whose medium is sound. Its common elements are pitch (which governs melody and ', 'Jenil', 'Gandhi', 'MALE'),
(110, 'Gujarat', 'India', 3.5, 'Music is an art form whose medium is sound. Its common elements are pitch (which governs melody and ', 'Tapan', 'Parekh', 'MALE'),
(112, 'Gujarat', 'India', 3.8, 'Music is an art form whose medium is sound. Its common elements are pitch (which governs melody and ', 'Priyam', 'Gandhi', 'MALE'),
(114, 'Alabama', 'USA', 1.5, 'Music is an art form whose medium is sound. Its common elements are pitch (which governs melody and ', 'Dhwanil', 'Shah', 'MALE'),
(118, 'Virginia', 'USA', 17.6, 'Music is an art form whose medium is sound. Its common elements are pitch (which governs melody and ', 'Chirag', 'Gajjar', 'MALE'),
(119, 'Gujarat', 'India', 5.5, 'Music is an art form whose medium is sound. Its common elements are pitch (which governs melody and ', 'Kartik', 'Gandhi', 'MALE'),
(120, 'New York', 'USA', 7.2, 'Music is an art form whose medium is sound. Its common elements are pitch (which governs melody and ', 'Dhaval', 'Valotia', 'MALE'),
(121, 'California', 'USA', 1.9, 'The creation, performance, significance, and even the definition of music vary according to culture ', 'Jainam', 'Modi', 'MALE'),
(122, NULL, '', 0.0, 'The creation, performance, significance, and even the definition of music vary according to culture ', 'Ankit', 'Patel', 'MALE'),
(123, NULL, '', 0.0, 'The creation, performance, significance, and even the definition of music vary according to culture ', 'Anup', 'Shah', 'MALE'),
(124, NULL, '', 1.3, 'The creation, performance, significance, and even the definition of music vary according to culture ', 'Amul', 'Gandhi', 'MALE'),
(126, 'Maharashtra', 'India', 4.6, NULL, 'Dhaval', 'Valotia', 'MALE');

-- --------------------------------------------------------

--
-- Table structure for table `user_music_category`
--

CREATE TABLE IF NOT EXISTS `user_music_category` (
  `userId` int(11) NOT NULL,
  `catId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_music_category`
--

INSERT INTO `user_music_category` (`userId`, `catId`) VALUES
(108, 1),
(115, 1),
(118, 1),
(119, 1),
(120, 1),
(121, 1),
(124, 1),
(126, 1),
(127, 1),
(108, 2),
(111, 2),
(115, 2),
(118, 2),
(119, 2),
(120, 2),
(121, 2),
(124, 2),
(126, 2),
(108, 3),
(111, 3),
(112, 3),
(116, 3),
(118, 3),
(120, 3),
(121, 3),
(124, 3),
(119, 4),
(124, 4),
(126, 4),
(119, 5),
(124, 5),
(126, 5),
(108, 6),
(111, 6),
(112, 6),
(116, 6),
(118, 6),
(120, 6),
(121, 6),
(124, 6),
(125, 6),
(126, 6),
(108, 7),
(111, 7),
(112, 7),
(116, 7),
(118, 7),
(120, 7),
(121, 7),
(124, 7),
(108, 8),
(111, 8),
(112, 8),
(116, 8),
(118, 8),
(120, 8),
(121, 8),
(124, 8),
(125, 8),
(108, 9),
(115, 9),
(118, 9),
(119, 9),
(120, 9),
(121, 9),
(124, 9),
(126, 9),
(108, 10),
(115, 10),
(118, 10),
(119, 10),
(120, 10),
(121, 10),
(124, 10),
(126, 10),
(119, 11),
(124, 11),
(126, 11);

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE IF NOT EXISTS `venue` (
`vId` int(11) NOT NULL,
  `vName` varchar(100) DEFAULT NULL,
  `vCity` varchar(100) DEFAULT NULL,
  `vDesc` varchar(100) DEFAULT NULL,
  `vAddr` varchar(150) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `createdBy` int(11) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `url` varchar(150) DEFAULT NULL,
  `vCountry` varchar(150) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`vId`, `vName`, `vCity`, `vDesc`, `vAddr`, `capacity`, `createdBy`, `createdDate`, `latitude`, `longitude`, `url`, `vCountry`) VALUES
(1, 'Pier 92', 'City', 'Open up the mad concerts', '6 Metrotech Center, Brooklyn, NY 11201', 200, 1, '2014-09-02 00:00:00', NULL, NULL, NULL, NULL),
(2, 'Brooklyn', 'New York', 'Brooklyn is the most populous of New York City''s five boroughs, with about 2.6 million people, as we', 'NY 11201', 565478, 1, '2014-03-01 12:14:00', NULL, NULL, 'http://en.wikipedia.org/wiki/Brooklyn', 'USA'),
(3, 'BKC', 'Mumbai', 'The Bandra Kurla Complex is a planned commercial complex in the suburbs of the Indian city of Mumbai', 'Mumbai 400050', 1000, 1, '2013-05-15 08:00:00', NULL, NULL, 'http://en.wikipedia.org/wiki/Bandra_Kurla_Complex', 'India');

-- --------------------------------------------------------

--
-- Structure for view `avgbandratingview`
--
DROP TABLE IF EXISTS `avgbandratingview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `avgbandratingview` AS (select `mb`.`bandId` AS `bandId`,ifnull(`temp`.`avgRating`,'-') AS `avgRating` from (`music_band` `mb` left join `tempavgbandratingview` `temp` on((`mb`.`bandId` = `temp`.`bandId`))));

-- --------------------------------------------------------

--
-- Structure for view `avgconcertratingview`
--
DROP TABLE IF EXISTS `avgconcertratingview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `avgconcertratingview` AS (select `c`.`conId` AS `conId`,ifnull(`ac`.`avgRating`,'-') AS `avgRating` from (`concert` `c` left join `tempavgconcertratingview` `ac` on((`ac`.`conId` = `c`.`conId`))));

-- --------------------------------------------------------

--
-- Structure for view `banddtlsview`
--
DROP TABLE IF EXISTS `banddtlsview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `banddtlsview` AS (select `mb`.`bandId` AS `bandId`,`mb`.`bandName` AS `bandName`,`mb`.`originCity` AS `originCity`,`mb`.`originCountry` AS `originCountry`,`mb`.`bandDesc` AS `bandDesc`,`mb`.`tags` AS `tags`,`u`.`userName` AS `userName`,`u`.`password` AS `password`,`u`.`role` AS `role`,`u`.`lastLoginTime` AS `lastLoginTime`,`u`.`email` AS `email`,`u`.`phoneno` AS `phoneno`,`u`.`createdDate` AS `createdDate`,`u`.`isActive` AS `isActive`,`ab`.`avgRating` AS `avgRating`,`uf`.`cnt` AS `cnt`,`cc`.`concertCnt` AS `concertCnt` from ((((`music_band` `mb` join `user` `u`) join `avgbandratingview` `ab`) join `userfollowercountview` `uf`) join `concertcntview` `cc`) where ((`mb`.`bandId` = `u`.`userId`) and (`u`.`role` = 'BAND') and (`mb`.`bandId` = `uf`.`userId`) and (`mb`.`bandId` = `ab`.`bandId`) and (`mb`.`bandId` = `cc`.`bandId`)));

-- --------------------------------------------------------

--
-- Structure for view `concertcntview`
--
DROP TABLE IF EXISTS `concertcntview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `concertcntview` AS (select `mb`.`bandId` AS `bandId`,ifnull(`tc`.`conCnt`,0) AS `concertCnt` from (`music_band` `mb` left join `tempconcertcntview` `tc` on((`mb`.`bandId` = `tc`.`bandId`))));

-- --------------------------------------------------------

--
-- Structure for view `concertdtlsview`
--
DROP TABLE IF EXISTS `concertdtlsview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `concertdtlsview` AS (select `c`.`conId` AS `conId`,`c`.`conName` AS `conName`,`c`.`bandId` AS `bandId`,`c`.`vId` AS `vId`,`c`.`time` AS `time`,`c`.`conDesc` AS `conDesc`,`c`.`createdBy` AS `createdBy`,`c`.`isActive` AS `isActive`,`c`.`createdDate` AS `createdDate`,`c`.`tsId` AS `tsId`,`c`.`price` AS `price`,`cc`.`rsvpCnt` AS `rsvpCnt`,`mb`.`bandDesc` AS `bandDesc`,`mb`.`bandName` AS `bandName`,`mb`.`originCity` AS `originCity`,`mb`.`originCountry` AS `originCountry`,`mb`.`tags` AS `tags`,`ve`.`capacity` AS `capacity`,`ve`.`createdDate` AS `vCreatedDate`,`ve`.`vDesc` AS `vDesc`,`ve`.`latitude` AS `latitude`,`ve`.`longitude` AS `longitude`,`ve`.`url` AS `url`,`ve`.`vAddr` AS `vAddr`,`ve`.`vCity` AS `vCity`,`ve`.`vCountry` AS `vCountry`,`ve`.`vName` AS `vName`,`ac`.`avgRating` AS `avgRating` from ((((`concert` `c` join `concertrsvpview` `cc`) join `music_band` `mb`) join `venue` `ve`) join `avgconcertratingview` `ac`) where ((`c`.`conId` = `cc`.`conId`) and (`c`.`bandId` = `mb`.`bandId`) and (`c`.`vId` = `ve`.`vId`) and (`c`.`conId` = `ac`.`conId`)));

-- --------------------------------------------------------

--
-- Structure for view `concertrsvpview`
--
DROP TABLE IF EXISTS `concertrsvpview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `concertrsvpview` AS (select `c`.`conId` AS `conId`,ifnull(`cc`.`rsvpCnt`,0) AS `rsvpCnt` from (`concert` `c` left join `tempconcertrsvpview` `cc` on((`c`.`conId` = `cc`.`conId`))));

-- --------------------------------------------------------

--
-- Structure for view `concertuserrsvpcntview`
--
DROP TABLE IF EXISTS `concertuserrsvpcntview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `concertuserrsvpcntview` AS (select `ud`.`userId` AS `userId`,ifnull(`tc`.`userConCnt`,0) AS `userConCnt` from (`user_dtls` `ud` left join `tempconcertuserrsvpcntview` `tc` on((`ud`.`userId` = `tc`.`userId`))));

-- --------------------------------------------------------

--
-- Structure for view `musiccategorybandview`
--
DROP TABLE IF EXISTS `musiccategorybandview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `musiccategorybandview` AS (select `umc`.`catId` AS `catId`,`mb`.`bandId` AS `bandId`,`mb`.`bandName` AS `bandName`,`mb`.`originCity` AS `originCity`,`mb`.`originCountry` AS `originCountry`,`mb`.`bandDesc` AS `bandDesc`,`mb`.`tags` AS `tags`,`mb`.`url` AS `url` from (`user_music_category` `umc` join `music_band` `mb`) where (`umc`.`userId` = `mb`.`bandId`) group by `umc`.`catId`,`umc`.`userId`);

-- --------------------------------------------------------

--
-- Structure for view `tempavgbandratingview`
--
DROP TABLE IF EXISTS `tempavgbandratingview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tempavgbandratingview` AS (select `rd`.`refId` AS `bandId`,round(avg(`rd`.`rating`),1) AS `avgRating` from `rate_dtls` `rd` where (`rd`.`rType` = 'BAND') group by `rd`.`refId`);

-- --------------------------------------------------------

--
-- Structure for view `tempavgconcertratingview`
--
DROP TABLE IF EXISTS `tempavgconcertratingview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tempavgconcertratingview` AS (select round(avg(`rate_dtls`.`rating`),1) AS `avgRating`,`rate_dtls`.`refId` AS `conId` from `rate_dtls` where (`rate_dtls`.`rType` = 'CONCERT') group by `rate_dtls`.`refId`);

-- --------------------------------------------------------

--
-- Structure for view `tempconcertcntview`
--
DROP TABLE IF EXISTS `tempconcertcntview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tempconcertcntview` AS (select `con`.`bandId` AS `bandId`,count(0) AS `conCnt` from `concert` `con` where (`con`.`isActive` = 'Y') group by `con`.`bandId`);

-- --------------------------------------------------------

--
-- Structure for view `tempconcertrsvpview`
--
DROP TABLE IF EXISTS `tempconcertrsvpview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tempconcertrsvpview` AS (select `rc`.`conId` AS `conId`,count(0) AS `rsvpCnt` from `rsvp_concert` `rc` group by `rc`.`conId`);

-- --------------------------------------------------------

--
-- Structure for view `tempconcertuserrsvpcntview`
--
DROP TABLE IF EXISTS `tempconcertuserrsvpcntview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tempconcertuserrsvpcntview` AS (select `rc`.`userId` AS `userId`,count(0) AS `userConCnt` from `rsvp_concert` `rc` group by `rc`.`userId`);

-- --------------------------------------------------------

--
-- Structure for view `tempuserfollowercountview`
--
DROP TABLE IF EXISTS `tempuserfollowercountview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tempuserfollowercountview` AS (select count(0) AS `cnt`,`fan_follower`.`fToUserid` AS `fToUserid` from `fan_follower` group by `fan_follower`.`fToUserid`);

-- --------------------------------------------------------

--
-- Structure for view `userdtlsview`
--
DROP TABLE IF EXISTS `userdtlsview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `userdtlsview` AS (select `ud`.`userId` AS `userId`,`ud`.`originCity` AS `originCity`,`ud`.`originCountry` AS `originCountry`,`ud`.`trustScore` AS `trustScore`,`ud`.`about` AS `about`,`ud`.`fName` AS `fName`,`ud`.`lName` AS `lName`,`ud`.`sex` AS `sex`,`u`.`userName` AS `userName`,`u`.`password` AS `password`,`u`.`role` AS `role`,`u`.`lastLoginTime` AS `lastLoginTime`,`u`.`email` AS `email`,`u`.`phoneno` AS `phoneno`,`u`.`createdDate` AS `createdDate`,`u`.`isActive` AS `isActive`,`uf`.`cnt` AS `cnt`,`cu`.`userConCnt` AS `userConCnt` from (((`user_dtls` `ud` join `user` `u`) join `userfollowercountview` `uf`) join `concertuserrsvpcntview` `cu`) where ((`ud`.`userId` = `u`.`userId`) and (`uf`.`userId` = `ud`.`userId`) and (`ud`.`userId` = `cu`.`userId`)));

-- --------------------------------------------------------

--
-- Structure for view `userfollowercountview`
--
DROP TABLE IF EXISTS `userfollowercountview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `userfollowercountview` AS (select `u`.`userId` AS `userId`,ifnull(`uf`.`cnt`,0) AS `cnt` from (`user` `u` left join `tempuserfollowercountview` `uf` on((`u`.`userId` = `uf`.`fToUserid`))));

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
 ADD PRIMARY KEY (`actId`), ADD KEY `actByUserId_idx` (`actByUserId`);

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
 ADD PRIMARY KEY (`aId`), ADD KEY `music_cat_id_idx` (`catId`), ADD KEY `bandId_artist_idx` (`bandId`);

--
-- Indexes for table `concert`
--
ALTER TABLE `concert`
 ADD PRIMARY KEY (`conId`), ADD KEY `bandid_idx` (`bandId`), ADD KEY `vid_idx` (`vId`), ADD KEY `created_uid_idx` (`createdBy`);

--
-- Indexes for table `concert_approval`
--
ALTER TABLE `concert_approval`
 ADD PRIMARY KEY (`conId`,`apprBy`), ADD KEY `uid_appr1_idx` (`apprBy`), ADD KEY `conId_appr_idx` (`conId`);

--
-- Indexes for table `fan_follower`
--
ALTER TABLE `fan_follower`
 ADD PRIMARY KEY (`fByUserid`,`fToUserid`), ADD KEY `uid_ft_idx` (`fToUserid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
 ADD PRIMARY KEY (`imageId`), ADD KEY `image)uid_idx` (`userId`);

--
-- Indexes for table `music_band`
--
ALTER TABLE `music_band`
 ADD PRIMARY KEY (`bandId`);

--
-- Indexes for table `music_category`
--
ALTER TABLE `music_category`
 ADD PRIMARY KEY (`catId`), ADD KEY `parent_cat_id_idx` (`parentCatId`);

--
-- Indexes for table `rate_dtls`
--
ALTER TABLE `rate_dtls`
 ADD PRIMARY KEY (`rId`), ADD KEY `userId_rate_idx` (`ratedBy`);

--
-- Indexes for table `recommendation`
--
ALTER TABLE `recommendation`
 ADD PRIMARY KEY (`recFromUserId`,`refId`);

--
-- Indexes for table `review_dtls`
--
ALTER TABLE `review_dtls`
 ADD PRIMARY KEY (`reviewId`), ADD KEY `reviewById_idx` (`reviewByUserId`);

--
-- Indexes for table `rsvp_concert`
--
ALTER TABLE `rsvp_concert`
 ADD PRIMARY KEY (`rsvpId`), ADD KEY `uid_rsvp_idx` (`userId`), ADD KEY `conid_rsvp_idx` (`conId`);

--
-- Indexes for table `tempuser`
--
ALTER TABLE `tempuser`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_shop`
--
ALTER TABLE `ticket_shop`
 ADD PRIMARY KEY (`tsId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `user_dtls`
--
ALTER TABLE `user_dtls`
 ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `user_music_category`
--
ALTER TABLE `user_music_category`
 ADD PRIMARY KEY (`userId`,`catId`), ADD KEY `music_catid_idx` (`catId`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
 ADD PRIMARY KEY (`vId`), ADD KEY `createdByUser_idx` (`createdBy`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
MODIFY `actId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=121;
--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
MODIFY `aId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `concert`
--
ALTER TABLE `concert`
MODIFY `conId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
MODIFY `imageId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `rate_dtls`
--
ALTER TABLE `rate_dtls`
MODIFY `rId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `review_dtls`
--
ALTER TABLE `review_dtls`
MODIFY `reviewId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `rsvp_concert`
--
ALTER TABLE `rsvp_concert`
MODIFY `rsvpId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tempuser`
--
ALTER TABLE `tempuser`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `ticket_shop`
--
ALTER TABLE `ticket_shop`
MODIFY `tsId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
MODIFY `vId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity`
--
ALTER TABLE `activity`
ADD CONSTRAINT `actByUserId` FOREIGN KEY (`actByUserId`) REFERENCES `user` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `artist`
--
ALTER TABLE `artist`
ADD CONSTRAINT `bandId_artist` FOREIGN KEY (`bandId`) REFERENCES `music_band` (`bandId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `music_cat_id` FOREIGN KEY (`catId`) REFERENCES `music_category` (`catId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `concert`
--
ALTER TABLE `concert`
ADD CONSTRAINT `bandid` FOREIGN KEY (`bandId`) REFERENCES `music_band` (`bandId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `created_uid` FOREIGN KEY (`createdBy`) REFERENCES `user` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `vid` FOREIGN KEY (`vId`) REFERENCES `venue` (`vId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `concert_approval`
--
ALTER TABLE `concert_approval`
ADD CONSTRAINT `uid_appr` FOREIGN KEY (`apprBy`) REFERENCES `user` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `fan_follower`
--
ALTER TABLE `fan_follower`
ADD CONSTRAINT `uid_fb` FOREIGN KEY (`fByUserid`) REFERENCES `user` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `uid_ft` FOREIGN KEY (`fToUserid`) REFERENCES `user` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
ADD CONSTRAINT `image_uid` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `music_category`
--
ALTER TABLE `music_category`
ADD CONSTRAINT `parent_cat_id` FOREIGN KEY (`parentCatId`) REFERENCES `music_category` (`catId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rate_dtls`
--
ALTER TABLE `rate_dtls`
ADD CONSTRAINT `userId_rate` FOREIGN KEY (`ratedBy`) REFERENCES `user` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `recommendation`
--
ALTER TABLE `recommendation`
ADD CONSTRAINT `userId_reco` FOREIGN KEY (`recFromUserId`) REFERENCES `user` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `review_dtls`
--
ALTER TABLE `review_dtls`
ADD CONSTRAINT `reviewById` FOREIGN KEY (`reviewByUserId`) REFERENCES `user_dtls` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rsvp_concert`
--
ALTER TABLE `rsvp_concert`
ADD CONSTRAINT `conid_rsvp` FOREIGN KEY (`conId`) REFERENCES `concert` (`conId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `uid_rsvp` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_dtls`
--
ALTER TABLE `user_dtls`
ADD CONSTRAINT `userId_dtls` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_music_category`
--
ALTER TABLE `user_music_category`
ADD CONSTRAINT `catId_mc` FOREIGN KEY (`catId`) REFERENCES `music_category` (`catId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `userId_mc` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `venue`
--
ALTER TABLE `venue`
ADD CONSTRAINT `createdByUser` FOREIGN KEY (`createdBy`) REFERENCES `user` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
