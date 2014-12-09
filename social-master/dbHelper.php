<?php

    // ini_set('error_reporting', E_ALL);
    // ini_set( 'display_errors', 1 );
    //
    /**
    * provides a dbHelper object with methods we'll need in the app
    */
    class db
    {
        private $dbo = null;

        //private
        /***********************************************/

        public function __construct()
        {
            //require_once 'database_connect';
            //$this->dbo = new PDO("$databaseEngine:host=$databaseHost;dbname=$databaseName",$databaseUsername, $databasePassword);
			$this->dbo = new PDO("mysql:host=localhost;dbname=music_socialnetwork", "root", "");
        }

        public function verifyLogin($username, $password)
        {
            /**
            *   Returns false if can't log in else returns the user data
            */
            $queryString = sprintf("SELECT * FROM user WHERE userName='%s'", $username);

            $query = $this->dbo->query($queryString);
            $row = $query->fetch(PDO::FETCH_ASSOC);

            if ($row && $row['password'] == $password)
                return $row;
            else
                return false;
        }
        public function close()
        {
            $link =null;
        }
        public function userExists($username)
        {
            $queryString ="SELECT * FROM `user` WHERE username = '$username'";
            $query = $this->dbo->query($queryString);

            return ($query->rowCount() > 0) ? true : false;
        }
        public function getUserDetails($username)
        {
            $queryString = "SELECT * FROM userdtlsview WHERE userdtlsview.username LIKE '$username'";
            $query = $this->dbo->query($queryString);

            return $query;
        }

        public function searchUsers($searchTerm, $start, $goFor)
        {
            //TODO: better search
            $start = (int)$start;
            $goFor = (int)$goFor;

            //base search:
            $queryString = "SELECT * FROM userdtlsview ud";

            if (str_replace(' ', '', $searchTerm) != '')
                $queryString = $queryString . " WHERE  LOWER(ud.userName) LIKE  LOWER('%$searchTerm%') or  LOWER(CONCAT_WS(' ',fName,lName)) like  LOWER('%$searchTerm%')";

            if ($goFor != -1 && $start == -1)
                $queryString = $queryString .  " LIMIT 0, $goFor";

            elseif ($start != -1 && $goFor == -1)
                $queryString = $queryString .  " LIMIT $start, 2372662636281763";

            elseif($start != -1 && $goFor != -1)
                $queryString = $queryString .  " LIMIT $start, $goFor";

            $query = $this->dbo->query($queryString);

            return $query;
        }
        public function changePassword($username, $newPassword)
        {
            $queryString = "UPDATE user SET password='$newPassword' WHERE username = '$username'";
            $query = $this->dbo->query($queryString);
        }

        public function deleteUser($username)
        {
            if ($this->userExists($username))
            {
                $queryString = "DELETE FROM user WHERE username = '$username'";
                $query = $this->dbo->query($queryString);
            }
            else
                return false;
        }

        public function updateProfileInfo($userId, $newValue, $type)
        {
            $queryString = "UPDATE user_dtls SET $type='$newValue' WHERE userId='$userId'";
            $query = $this->dbo->query($queryString);
        }
		public function updateUserInfo($userId, $newValue, $type){
			$queryString = "UPDATE user SET $type='$newValue' WHERE userId='$userId'";
            $query = $this->dbo->query($queryString);
		}
        public function createUser($username, $password, $email,$userType)
        {
            if (! $this->userExists($username))
            {
				$userId=0;
				$queryString = "INSERT INTO tempuser values ()";
				$query = $this->dbo->query($queryString);
				$queryString = "SELECT LAST_INSERT_ID() as id";
				$query = $this->dbo->query($queryString);
				if ($row = $query->fetch(PDO::FETCH_ASSOC))
				{
					$userId = $row['id']+100;
				}
                $queryString = "INSERT INTO user (userId,username, password, role,email) VALUES
                ('$userId','$username', '$password', '$userType','$email')";
                $query = $this->dbo->query($queryString);
				if($userType=='USER')
					$queryString = "INSERT INTO user_dtls (userId,trustScore) VALUES('$userId','0')";
				else if ($userType=='BAND')
					$queryString = "INSERT INTO music_band (bandId) VALUES('$userId')";
					
                $query = $this->dbo->query($queryString);
				$queryString = "INSERT INTO images (userId) VALUES('$userId')";
                $query = $this->dbo->query($queryString);

                return $userId;
            }
            else
                return -1;
        }
		public function getAllParentCategory()
        {
            $queryString = "SELECT * FROM music_category mc where mc.catId in (select distinct(parentCatId) from music_category)";
            $query = $this->dbo->query($queryString);

            return $query;
        }
		public function getAllChildCategory($parCatId){
			$queryString = "SELECT * FROM music_category mc where mc.parentCatId = '$parCatId'";
            $query = $this->dbo->query($queryString);

            return $query;
		}
		public function deleteMusicCategoryByUser($userId)
        {
            $queryString = sprintf("DELETE FROM `user_music_category` WHERE userId = '%s'",$userId);
            $query = $this->dbo->query($queryString);
        }
		public function saveMusicCategoryByUser($catId, $userId)
        {
            $queryString = sprintf("INSERT INTO `user_music_category`(`userId`, `catId`) VALUES ('%s','%s')",$userId, $catId);
            $query = $this->dbo->query($queryString);
        }
		public function getAllBand(){
			$queryString = "SELECT * FROM banddtlsview";
            $query = $this->dbo->query($queryString);

            return $query;
		}
		public function getSuggestedBandsForUser($userId){
			$queryString = "CALL getBandSuggetion('$userId')";
			$query = $this->dbo->query($queryString);
		   return $query;
		}
		public function followBandUser($fbyId,$ftoId){
			$queryString = sprintf("INSERT INTO `fan_follower`(`fByUserid`, `fToUserid`) VALUES ('%s','%s')",$fbyId, $ftoId);
            $query = $this->dbo->query($queryString);
		}
		public function unfollowBandUser($fbyId,$ftoId){
			$queryString = sprintf("DELETE FROM `fan_follower` WHERE fByUserid = '%s' and fToUserid = '%s'",$fbyId,$ftoId);
            $query = $this->dbo->query($queryString);
		}
		public function addArtist($userId, $firstName, $about,$country,$state){
			$queryString = sprintf("INSERT INTO `artist` (`aName`, `originCountry`, `originCity`, `artistDesc`, `bandId`) VALUES ('%s','%s','%s','%s','%s')",$firstName,$country,$state,$about,$userId);
			$query = $this->dbo->query($queryString);
		}
		public function updateBandInfo($userId, $newValue, $type)
        {
            $queryString = "UPDATE music_band SET $type='$newValue' WHERE bandId='$userId'";
            $query = $this->dbo->query($queryString);
        }
		public function activateUser($userId)
        {
            $queryString = "UPDATE user SET isActive='Y' WHERE userId='$userId'";
            $query = $this->dbo->query($queryString);
        }
		public function getBandByUser($userId){
			$queryString = "SELECT * FROM banddtlsview mb where mb.bandId in (select fToUserId from fan_follower ff where ff.fByUserId='$userId')";
            $query = $this->dbo->query($queryString);

            return $query;
		}
		public function getFriendByUser($userId){
			$queryString = "SELECT * FROM userdtlsview ud where ud.userId in (select fToUserId from fan_follower ff where ff.fByUserId='$userId')";
            $query = $this->dbo->query($queryString);
            return $query;
		}
		public function rateBandConcert($rtoId,$rbyId,$type,$rate){
			$queryString = sprintf("INSERT INTO `rate_dtls`(`rType`,`refId`,`rating`,`ratedBy`) VALUES ('%s','%s','%s','%s')",$type,$rtoId,$rate,$rbyId);
			$query = $this->dbo->query($queryString);
		}
		public function recoBandConcert($recoToId,$recoById,$type){
			$queryString = sprintf("INSERT INTO `recommendation`(`recFromUserId`, `refId`, `recType`) VALUES ('%s','%s','%s')",$recoById,$recoToId,$type);
			$query = $this->dbo->query($queryString);
		}
		public function getRecoBand($userId){
			$queryString = "SELECT * FROM banddtlsview mb where mb.bandId in (select refId from recommendation re where re.recFromUserId in (Select fToUserId from fan_follower ff where ff.fByUserId in( select 
            fToUserid
        from
            fan_follower
        where
            fByUserId = '$userId'))) and bandId not in (SELECT bandId FROM music_band mb where mb.bandId in (select fToUserId from fan_follower ff where ff.fByUserId='$userId'))";
            $query = $this->dbo->query($queryString);
            return $query;
		}
		public function getAllUser(){
			$queryString = "SELECT * FROM userdtlsview";
            $query = $this->dbo->query($queryString);

            return $query;
		}
		public function getSuggestedFriend($userId){
			$queryString = "CALL getFriendSuggetion('$userId')";
			$query = $this->dbo->query($queryString);
		   return $query;
		}
		public function updateProfilePhoto($userId,$target_file){
			$queryString = "UPDATE images SET `imageName`='$target_file', `imagePath`='$target_file' WHERE userId='$userId'";
            $query = $this->dbo->query($queryString);
		}
		public function getProfilePhoto($userId){
			$queryString = "SELECT * FROM images where userId='$userId'";
            $query = $this->dbo->query($queryString);
			if($row = $query->fetch(PDO::FETCH_ASSOC)){
			 $imagePath = $row['imagePath'];
			 if ($imagePath!=null)
				return $row['imagePath'];
			 else
				return 'img/noImage.png';
			}
			else
			  return 'img/noImage.png';
		}
		public function getAllCategoryByUser($userId){
			$queryString = "select mc.*,umc.userId from music_category mc, user_music_category umc where mc.catId=umc.catId and umc.userId='$userId'";
            $query = $this->dbo->query($queryString);
			return $query;
		}
		public function getBandsByMusicCategory($catId){
			$queryString = "select * from musiccategorybandview mc,user u where catId='$catId' and u.userId=mc.bandId";
            $query = $this->dbo->query($queryString);
			return $query;
		}
		public function getBandsByMusicCategoryAndUser($catId,$userId){
			$queryString = "select * from musiccategorybandview mc,user u where catId='$catId' and u.userId=mc.bandId and mc.bandId in (select fToUserId from fan_follower where fByUserId='$userId')";
            $query = $this->dbo->query($queryString);
			return $query;
		}
		public function getBandDetails($userName){
			$queryString = "select * from banddtlsview where userName='$userName'";
            $query = $this->dbo->query($queryString);
			return $query;
		}
		public function getAllArtistByBand($bandId){
			$queryString = "select * from artist where bandId='$bandId'";
            $query = $this->dbo->query($queryString);
			return $query;
		}
		public function updateLastLoginTime($userId){
			$queryString = "UPDATE user SET lastLoginTime=Now() WHERE userId='$userId'";
			$query = $this->dbo->query($queryString);
		}
		public function deleteArtist($aId){
			$queryString = "delete from artist where aId='$aId'";
			$query = $this->dbo->query($queryString);
		}
		public function getLiveFeeds($userId){
		 $queryString = "SELECT *,DATE_FORMAT(act.createdDate,'%b %d %Y %h:%i %p') as actTime FROM music_socialnetwork.activity act where act.actByUserId in (select fToUserid from fan_follower ff where ff.fByUserId='$userId') order by createdDate desc";
		 $query = $this->dbo->query($queryString);
		 return $query;
		}
		public function getUserById($userId){
			$queryString = "select * from user where userId='$userId'";
			$query = $this->dbo->query($queryString);
			if($row1 = $query->fetch(PDO::FETCH_ASSOC)){
			  if($row1['role']=='USER'){
				$queryString = "select * from userdtlsview where userId='$userId'";
			  }
			  else if($row1['role']=='BAND'){
				$queryString = "select * from banddtlsview where bandId='$userId'";
			  }
			}
			$query = $this->dbo->query($queryString);
			return $query;
		}
		public function getBandConcertDetails($userName){
			$queryString = "select cd.*,DATE_FORMAT(cd.time,'%b %d %Y %h:%i %p') as conTime from concertdtlsview cd,user u where cd.bandId=u.userId and u.userName='$userName' and cd.isActive='Y' order by cd.time desc";
            $query = $this->dbo->query($queryString);
			return $query;
		}
		public function getConcertDetails($conId){
			$queryString = "select *,DATE_FORMAT(time,'%b %d %Y %h:%i %p') as conTime,cd.isActive as active from concertdtlsview cd, user u where conId='$conId' and u.userId=bandId";
            $query = $this->dbo->query($queryString);
			return $query;
		}
		public function getConcert($bandId){
			$queryString = "SELECT *,DATE_FORMAT(time,'%b %d %Y %h:%i %p') as conTime from concertdtlsview,user u where u.userId=bandId and conId in(select C.conId from concert C, venue V where bandId='$bandId' and C.vId=V.vId) order by time desc";
            $query = $this->dbo->query($queryString);
			return $query;
		}
		public function rsvpConcert($userId,$conId){
			$queryString = sprintf("INSERT INTO `rsvp_concert`(`userId`, `conId`) VALUES ('%s','%s')",$userId, $conId);
            $query = $this->dbo->query($queryString);
		}
		public function cnclRsvpConcert($userId,$conId){
			$queryString = "delete from `rsvp_concert` where userId='$userId' and conId='$conId'";
            $query = $this->dbo->query($queryString);
		}
		public function isPrimeUser($userId){
			$queryString = "Select count(*) as cnt from user where userId='$userId' and (role='BAND' or floor(datediff(curdate(),createdDate) / 365)>=2)";
			$query = $this->dbo->query($queryString);
			if($row = $query->fetch(PDO::FETCH_ASSOC)){
			  if($row['cnt']==1){
			    return 'Y';
			  }
			  else{
				$queryString = "Select count(*) as cnt from user_Dtls where userId='$userId' and trustScore>=10";
				$query = $this->dbo->query($queryString);
				if($row = $query->fetch(PDO::FETCH_ASSOC)){
					if($row['cnt']==1){
						return 'Y';
					}
				}
			  }
			}
			return 'N';
		}
		public function getConcertsForAppoval($userId){
			$queryString = "select DATE_FORMAT(cd.time,'%b %d %Y %h:%i %p') as conTime,
    bu.username as bandUserName,cu.userName as cbUserName,concat_ws(' ',cud.fName,cud.lName) as cbName, cd . *
from
    concertdtlsview cd,
    user bu,
    user cu,
    user_dtls cud
where
    cu.userId = cd.createdBy
        and cu.userId = cud.userId
        and bu.userId = cd.bandId
        and cd.isActive = 'N'
        and cd.bandId in (select 
            mb.bandId
        from
            music_band mb
        where
            mb.bandId in (select 
                    fToUserId
                from
                    fan_follower ff
                where
                    ff.fByUserId = '$userId'))";
			$query = $this->dbo->query($queryString);
			return $query;
		}
		public function delRateBandConcert($rtoId,$rbyId,$type){
			$queryString = "delete from rate_dtls where refId='$rtoId' and ratedBy='$rbyId' and rType='$type'";
			$query = $this->dbo->query($queryString);
		}
		public function concertAppr($conId,$apprBy,$vote){
			$queryString = "insert into concert_approval(conId,apprBy,vote) values ('$conId','$apprBy','$vote')";
			$query = $this->dbo->query($queryString);
		}
	
	public function getBandRating($userId,$bandId){
	  $queryString = "select rating from rate_dtls where rType='BAND' and refId='$bandId' and ratedBy='$userId'";
	  $query = $this->dbo->query($queryString);
	  if($row = $query->fetch(PDO::FETCH_ASSOC)){
	     return $row['rating'];
	  }
	  else
	   return -1;
	}
	public function getConRating($userId,$conId){
	  $queryString = "select rating from rate_dtls where rType='CONCERT' and refId='$conId' and ratedBy='$userId'";
	  $query = $this->dbo->query($queryString);
	  if($row = $query->fetch(PDO::FETCH_ASSOC)){
	     return $row['rating'];
	  }
	  else
	   return -1;
	}
	public function isBandRecoDone($userId,$bandId){
	   $queryString = "select count(*) cnt from recommendation where recType='BAND' and refId='$bandId' and recFromUserId='$userId'";
	   $query = $this->dbo->query($queryString);
	  if($row = $query->fetch(PDO::FETCH_ASSOC)){
	     return $row['cnt']>0;
	  }
	  else
	   return false;
	}
	public function isConRecoDone($userId,$conId){
	   $queryString = "select count(*) cnt from recommendation where recType='CONCERT' and refId='$conId' and recFromUserId='$userId'";
	   $query = $this->dbo->query($queryString);
	  if($row = $query->fetch(PDO::FETCH_ASSOC)){
	     return $row['cnt']>0;
	  }
	  else
	   return false;
	}
	public function isUserFollowingUser($fByUserId,$fToUserId){
	   $queryString = "select count(*) cnt from fan_follower where fByUserid='$fByUserId' and fToUserid='$fToUserId'";
	   $query = $this->dbo->query($queryString);
	  if($row = $query->fetch(PDO::FETCH_ASSOC)){
	     return $row['cnt']>0;
	  }
	  else
	   return false;
	}
	public function getUpcomingConcert($userId){
		$queryString = "SELECT *,DATE_FORMAT(time,'%b %d %Y %h:%i %p') as conTime from concertdtlsview cd,user u where u.userId=bandId and cd.isActive='Y' and conId in( select C.conId FROM rsvp_concert R, concert C where C.conId=R.conId and R.userId=$userId and C.time>=now())";
		$query = $this->dbo->query($queryString);
		return $query;
	}
	public function getAttendedConcert($userId){
		$queryString = "SELECT *,DATE_FORMAT(time,'%b %d %Y %h:%i %p') as conTime from concertdtlsview cd,user u where u.userId=bandId and cd.isActive='Y' and conId in(SELECT C.conId FROM rsvp_concert R, concert C where C.conId=R.conId and R.userId=$userId and C.time<now())";
		$query = $this->dbo->query($queryString);
		return $query;
	}
	public function getConcertSuggestion($userId){
		$queryString = "CALL getConcertSuggetion('$userId')";
		$query = $this->dbo->query($queryString);
		return $query;
	}
	public function getRecoConcert($userId){
		 
						  $queryString ="SELECT *,DATE_FORMAT(time,'%b %d %Y %h:%i %p') as conTime from concertdtlsview,user u where u.userId=bandId and conId in(select
									con.conId
									from
									concert con
									where
									con.conId in (select
									re.refid as conId
									from
									recommendation re
									where
									re.recFromUserId in (select
									ftoUserId
									from
									fan_follower
									where
									fbyUserId =$userId)
									and re.recType = 'CONCERT')
									and con.time >=now()
									and con.isActive = 'Y')
									and conId not in (select conId from rsvp_concert where userId='$userId')";
		$query = $this->dbo->query($queryString);
		return $query;
						  
	}
	public function isVotedConcert($userId,$conId){
		$queryString ="SELECT count(*) as cnt FROM music_socialnetwork.concert_approval where conId='$conId' and apprBy='$userId'";
		$query = $this->dbo->query($queryString);
		if($row = $query->fetch(PDO::FETCH_ASSOC)){
	       return $row['cnt']>0;
		}
		else
		  return false;
	}
	public function getReviewByBand($bandId){
		$queryString = "select *,DATE_FORMAT(rd.createdDate,'%b %d %Y %h:%i %p') as reviewTime from review_dtls rd, user_dtls ud, user u where ud.userId=rd.reviewByUserId and u.userId=ud.userId and reviewToId='$bandId' and reviewType='BAND' order by rd.createdDate desc";
		$query = $this->dbo->query($queryString);
		return $query;
	}
	public function getReviewByConcert($conId){
		$queryString = "select *,DATE_FORMAT(rd.createdDate,'%b %d %Y %h:%i %p') as reviewTime from review_dtls rd, user_dtls ud,user u where ud.userId=rd.reviewByUserId and u.userId=ud.userId and reviewToId='$conId' and reviewType='CONCERT' order by rd.createdDate desc";
		$query = $this->dbo->query($queryString);
		return $query;
	}
	public function saveReview($reviewToId,$reviewByUserId,$reviewType,$review){
		$queryString = "insert into review_dtls (reviewToId,reviewByUserId,reviewType,review) values ('$reviewToId','$reviewByUserId','$reviewType','$review')";
		$query = $this->dbo->query($queryString);
	}
	public function isRSVPDConcert($userId,$conId){
		$queryString ="SELECT count(*) as cnt FROM music_socialnetwork.rsvp_concert where conId='$conId' and userId='$userId'";
		$query = $this->dbo->query($queryString);
		if($row = $query->fetch(PDO::FETCH_ASSOC)){
	       return $row['cnt']>0;
		}
		else
		  return false;
	}
	public function searchBand($searchTerm,$catId ,$start, $goFor)
    {
            //TODO: better search
            $start = (int)$start;
            $goFor = (int)$goFor;

            //base search:
            $queryString = "SELECT * FROM banddtlsview ud where ud.bandId<>-1";

            if (str_replace(' ', '', $searchTerm) != '')
                $queryString = $queryString . " and  (LOWER(ud.bandName) LIKE  LOWER('%$searchTerm%') or  LOWER(bandDesc) like  LOWER('%$searchTerm%'))";
			
			if (str_replace(' ', '', $catId) != '')
				$queryString =$queryString ." and ud.bandId in (SELECT distinct(mb.bandId) FROM music_band mb, user_music_category umc
where mb.bandId=umc.userId and (umc.catId = '$catId' or umc.catId in (select catId from music_category mc where mc.parentCatId='$catId')))";


            if ($goFor != -1 && $start == -1)
                $queryString = $queryString .  " LIMIT 0, $goFor";

            elseif ($start != -1 && $goFor == -1)
                $queryString = $queryString .  " LIMIT $start, 2372662636281763";

            elseif($start != -1 && $goFor != -1)
                $queryString = $queryString .  " LIMIT $start, $goFor";

            $query = $this->dbo->query($queryString);

            return $query;
    }
    public function searchConcert($searchTerm,$musicCat,$bandId,$fromDate,$toDate, $start, $goFor)
    {
            //TODO: better search
            $start = (int)$start;
            $goFor = (int)$goFor;

            //base search:
            $queryString = "SELECT * FROM concertdtlsview ud where ud.isActive='Y'";

            if (str_replace(' ', '', $searchTerm) != '')
                $queryString = $queryString . " and  (LOWER(ud.conName) LIKE  LOWER('%$searchTerm%') or  LOWER(conDesc) like  LOWER('%$searchTerm%'))";
			
			if (str_replace(' ', '', $musicCat) != '')
				$queryString = $queryString . " and ud.bandId in (SELECT distinct(mb.bandId) FROM music_band mb, user_music_category umc
where mb.bandId=umc.userId and (umc.catId = '$musicCat' or umc.catId in (select catId from music_category mc where mc.parentCatId='$musicCat')))";
				
			if (str_replace(' ', '', $bandId) != '')
                $queryString = $queryString . " and ud.bandId='$bandId'";
				
			if (str_replace(' ', '', $fromDate) != '')
                $queryString = $queryString . " and ud.time>='$fromDate'";
			
			if (str_replace(' ', '', $toDate) != '')
                $queryString = $queryString . " and ud.time<='$toDate'";
			
            if ($goFor != -1 && $start == -1)
                $queryString = $queryString .  " LIMIT 0, $goFor";

            elseif ($start != -1 && $goFor == -1)
                $queryString = $queryString .  " LIMIT $start, 2372662636281763";

            elseif($start != -1 && $goFor != -1)
                $queryString = $queryString .  " LIMIT $start, $goFor";

            $query = $this->dbo->query($queryString);

            return $query;
    }
	public function getBandUpComingConcertDetails($bandId){
			$queryString = "select cd.*,DATE_FORMAT(cd.time,'%b %d %Y %h:%i %p') as conTime from concertdtlsview cd,user u where cd.bandId=u.userId and u.userId='$bandId' and cd.time>=now() order by cd.time desc";
            $query = $this->dbo->query($queryString);
			return $query;
	}
	public function delConcert($conId){
		$queryString = "Delete From rsvp_concert where conId='$conId'";
		$query = $this->dbo->query($queryString);
		$queryString = "Delete From recommendation where refId='$conId' and recType='CONCERT'";
		$query = $this->dbo->query($queryString);
		$queryString = "Delete From concert where conId='$conId'";
		$query = $this->dbo->query($queryString);
	}
	public function getAllMusicCategory(){
		$queryString ="SELECT * FROM music_socialnetwork.music_category";
		$query = $this->dbo->query($queryString);
		return $query;
	}
	public function getConcertByUser($userId){
		$queryString = "SELECT *,DATE_FORMAT(time,'%b %d %Y %h:%i %p') as conTime from concertdtlsview where conId in(select C.conId from rsvp_concert C where userId='$userId' ) order by time desc";
		$query = $this->dbo->query($queryString);
		return $query;
	}
	public function getUserName($userId){
		$queryString = "SELECT userName from user where userId='$userId'";
		$query = $this->dbo->query($queryString);
		if($row = $query->fetch(PDO::FETCH_ASSOC)){
	       return $row['userName'];
		}
		else
		   return "";
	}
	public function getUserFollowers($userId){
		$queryString = "SELECT * from userdtlsview where userId in (select fByUserId from fan_follower where fToUserId='$userId')";
		$query = $this->dbo->query($queryString);
		return $query;
	}
	public function getConcertUsers($conId){
		$queryString = "SELECT * from userdtlsview where userId in (select userId from rsvp_concert where conId='$conId')";
		$query = $this->dbo->query($queryString);
		return $query;
	}
}
?>