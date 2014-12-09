<?php
   //TODO: make this visible to only logged in users
       session_start();
       require 'dbHelper.php';
       $dbo = new db();
   
       if (! isset($_GET['user']))
       {
           if (! isset($_SESSION['username']))
           {
               $dbo->close();
               unset($dbo);
               header('Location: ./logout');
           }
           else
           {
               $user = $_SESSION['username'];
           }
       }
       else
       {
           $user = $_GET['user'];
       }
       $query = $dbo->getBandDetails($user);
   
       if ($row = $query->fetch(PDO::FETCH_ASSOC))
       {
           $bandName = $row['bandName'];
   		$bandId = $row['bandId'];
           $about = $row['bandDesc'];
           $profilePic = $dbo->getProfilePhoto($bandId);
           $country = $row['originCountry'];
   		$state = $row['originCity'];
       }
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title><?php echo "$bandName"; ?></title>
	  <script>
	  function followBand(button) {
  if (button.value=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      //document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
	  button.innerHTML = 'Following';
	  button.disabled='disabled';
    }
  }
  xmlhttp.open("GET","followBandUser?ftoId="+button.value,true);
  xmlhttp.send();
  }
function unfollowBand(button) {
  if (button.value=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      //document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
	  button.innerHTML = 'UnFollowed';
	  button.disabled='disabled';
    }
  }
  xmlhttp.open("GET","unfollowBandUser?ftoId="+button.value,true);
  xmlhttp.send();
}
function rateBand(button) {
  if (button.value=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      //document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
	  alert('Thank you for Rating !');
	  button.disabled='disabled';
    }
  }
  xmlhttp.open("GET","rateBandConcert?rateRtoId="+button.value+"&type=BAND",true);
  xmlhttp.send();
}
function recoBand(value) {
  if (value=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      //document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
	  alert('Thank you for Recommendation !');
    }
  }
  xmlhttp.open("GET","recoBandConcert?recoToId="+value+"&type=BAND",true);
  xmlhttp.send();
}
	  </script>
   </head>
   <body>
      <?php include 'header.php'; ?>
	  <link rel="stylesheet" type="text/css" href="stylesheet.css">
      <div class="container" style="position: relative; top: 40px;">
         <ul class="nav nav-tabs">
            <li class="active">
               <a href="bandProfile?user=<?php echo $user; ?>">Profile</a>
            </li>
            <li><a href="artists?user=<?php echo $user; ?>">Artist</a></li>
            <li><a href="concerts?user=<?php echo $user; ?>">Concerts</a></li>
			<li><a href="bandReview?user=<?php echo $user; ?>">Review</a></li>
			<li><a href="bandFollower?user=<?php echo $user; ?>">Followers</a></li>
         </ul>
         <?php echo "<h1 style=\"font-size: 60px;\">$bandName</h1>";
            echo "<p>From: $state, $country "; ?>
			<a href="http://maps.google.com/?q=<?php echo $state.', '. $country ?>" target="_blank"><img style="margin-right:5px;" src="bln.jpg" height="15" width="15"></a>
			</p>
			<?php
            if($_SESSION['userId']!= $bandId && $_SESSION['userType']=='USER'){
			if($dbo->isUserFollowingUser($_SESSION['userId'],$bandId)){
            ?>
         <div class="starRating" id="<?php echo $bandId ?>_star">
            <div>
               <div>
                  <div>
                     <div>
                        <input style="width:24px;" id="rating1<?php echo $bandId ?>" type="radio" name="rating_<?php echo $bandId ?>" value="1:<?php echo $bandId ?>" onChange="rateBand(this)">
                        <label for="rating1"><span>1</span></label>
                     </div>
                     <input style="width:24px;" id="rating2<?php echo $bandId ?>" type="radio" name="rating_<?php echo $bandId ?>" value="2:<?php echo $bandId ?>" onChange="rateBand(this)">
                     <label for="rating2"><span>2</span></label>
                  </div>
                  <input style="width:24px;" id="rating3<?php echo $bandId ?>" type="radio" name="rating_<?php echo $bandId ?>" value="3:<?php echo $bandId ?>" onChange="rateBand(this)">
                  <label for="rating3"><span>3</span></label>
               </div>
               <input style="width:24px;" id="rating4<?php echo $bandId ?>" type="radio" name="rating_<?php echo $bandId ?>" value="4:<?php echo $bandId ?>" onChange="rateBand(this)">
               <label for="rating4"><span>4</span></label>
            </div>
            <input style="width:24px;" id="rating5<?php echo $bandId ?>" type="radio" name="rating_<?php echo $bandId ?>" value="5:<?php echo $bandId ?>" onChange="rateBand(this)">
            <label for="rating5"><span>5</span></label>
         </div>
         <?php $rate=$dbo->getBandRating($_SESSION['userId'],$bandId);
            if($rate>0){
            ?>
         <script>
            document.getElementById('rating'+<?php echo $rate.''.$bandId?>).checked =true;
         </script>
         <?php } 
            if(!($dbo->isBandRecoDone($_SESSION['userId'],$bandId))){
             ?>
         <img style="margin-left:5px;" src="share-icon-128x128.png" height="25" width="25" onClick="recoBand('<?php echo $bandId ?>')">
         <?php } ?>	
			<button type="button" class="btn btn-primary" value="<?php echo $bandId ?>" name="unfollow" onclick="unfollowBand(this)">UnFollow</button>
         <?php }
		 else{ ?>
			<button type="button" class="btn btn-primary" value="<?php echo $bandId ?>" name="follow" onclick="followBand(this)">Follow</button>
		<?php }}
            ?>
         <div class="row-fluid" style="margin-top: 20px;">
            <div class="span4 well">
               <img src="<?php echo"$profilePic" ?>" height="800px" width="300px">
            </div>
            <div class="span8">
               <div class="row-fluid">
                  <table>
                  <tr>
                     <td colspan=3>
                        <div class="span8 well">
                           <h2>About Us</h2>
                           <div class="control-group">
                              <div style="border:2px solid #a1a1a1;
                                 margin-top:20px;
                                 font-size:15px;
                                 padding:10px 40px; 
                                 box-shadow: 0px 0px 20px 3px #d3d3d3;
                                 border-radius: 4px;
                                 background-color: #ffffff;">
                                 <?php echo "<p>$about</p>"; ?>
                              </div>
                           </div>
                        </div>
                     </td>
                  <tr>
                     <td>
                        <div class="span3 well">
                           <h3>Avg.Rating</h3>
                           <div class="control-group">
                              <div style="border:2px solid #a1a1a1;
										margin-top:20px;
										font-size:15px;
										padding:10px 40px; 
										box-shadow: 0px 0px 20px 3px #d3d3d3;
										border-radius: 4px;
										width : 50px;
										background-color: #ffffff;" align="center">
                                 <font size="5" color="#8AC007"><b><?php echo $row['avgRating'] ?> </b></font> 
                              </div>
                           </div>
                        </div>
                     </td>
                     <td>
                        <div class="span3 well">
                           <h3>Followers</h3>
                           <div class="control-group">
                              <div style="border:2px solid #a1a1a1;
										margin-top:20px;
										font-size:15px;
										padding:10px 40px; 
										box-shadow: 0px 0px 20px 3px #d3d3d3;
										border-radius: 4px;
										width : 50px;
										background-color: #ffffff;" align="center">
                                 <font size="5" color="#8AC007"><b><?php echo $row['cnt'] ?> </b></font>
                              </div>
                           </div>
                        </div>
                     </td>
                     <td>
                        <div class="span3 well">
                           <h3>Concerts</h3>
                           <div class="control-group">
                              <div style="border:2px solid #a1a1a1;
										margin-top:20px;
										font-size:15px;
										padding:10px 40px; 
										box-shadow: 0px 0px 20px 3px #d3d3d3;
										border-radius: 4px;
										width : 50px;
										background-color: #ffffff;" align="center">
                                 <font size="5" color="#8AC007"><b><?php echo $row['concertCnt'] ?> </b></font>
                              </div>
                           </div>
                        </div>
                     <td>
                  </tr>
               </div>
            </div>
         </div>
      </div>
      <?php //include 'footer.php'; ?>
   </body>
</html>