<?php
   //TODO: make this visible to only logged in users
       session_start();
       require 'dbHelper.php';
       $dbo = new db();
           if (! isset($_SESSION['username']))
           {
               $dbo->close();
               unset($dbo);
               header('Location: ./logout');
           }
           else
           {
               $user = $_SESSION['username'];
   			$userId = $_SESSION['userId'];
   			$query = $dbo->getUserDetails($user);
   
   			if ($row = $query->fetch(PDO::FETCH_ASSOC))
   			{
   				$fullName = $row['fName'] . ' ' . $row['lName'];
   				$about = $row['about'];
   				$profilePic = $dbo->getProfilePhoto($userId);
   				$country = $row['originCountry'];
   				$state = $row['originCity'];
   				$gender = $row['sex'];
   			}
           }
   	?>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
      <title><?php echo "$fullName"; ?></title>
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
	  button.innerHTML = '-';
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
	  button.innerHTML = '+';
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
function recoConcert(value) {
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
  xmlhttp.open("GET","recoBandConcert?recoToId="+value+"&type=CONCERT",true);
  xmlhttp.send();
}
function followUser(button) {
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
	  button.innerHTML = '-';
	  button.disabled='disabled';
    }
  }
  xmlhttp.open("GET","followBandUser?ftoId="+button.value,true);
  xmlhttp.send();
  }
function unfollowUser(button) {
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
	  button.innerHTML = '+';
	  button.disabled='disabled';
    }
  }
  xmlhttp.open("GET","unfollowBandUser?ftoId="+button.value,true);
  xmlhttp.send();
}
function rsvpConcert(button) {
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
	  //this.onClick = "";
	  button.innerHTML = '-';
	  button.disabled='disabled';
	  alert('Thank you for RSVP !');
    }
  }
  xmlhttp.open("GET","rsvpConcert?conId="+button.value,true);
  xmlhttp.send();
  }
  function cnclRsvpConcert(button) {
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
	  button.innerHTML = '+';
	  button.disabled='disabled';
	  alert('RSVP Cancelled!');
    }
  }
  xmlhttp.open("GET","cnclRsvpConcert?conId="+button.value,true);
  xmlhttp.send();
  }
  function rateConcert(button) {
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
  xmlhttp.open("GET","rateBandConcert?rateRtoId="+button.value+"&type=CONCERT",true);
  xmlhttp.send();
}
function conAppr(conId,vote){
 if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	  alert('Thank you for Vote !');
	  document.getElementById('div_'+conId).innerHTML="Vote Saved";
    }
  }
  xmlhttp.open("GET","concertAppr?conId="+conId+"&vote="+vote,true);
  xmlhttp.send();
}
</script>
   </head>
   <body style="background-color: #f1f1f1;">
      <?php include 'header.php'; ?>
	  <link rel="stylesheet" type="text/css" href="stylesheet.css">
      <div style="width:1100px;position: relative;">
      <table >
         <tr>
            <td>
               <div style="border:2px solid #a1a1a1;
                  margin-top:20px;
				  margin-left:5px;
                  font-size:15px;
                  padding:10px 40px; 
                  box-shadow: 0px 0px 20px 3px #d3d3d3;
                  border-radius: 4px;
                  background-color: #ffffff;
                  width:315px;
                  height : 1000px">
               <div>
				  <table>
                  <tr><td><img src="<?php echo "$profilePic"; ?>"  height="60" width="60"><td>
                  <td>
				    <table>
					    <tr><td>
							<b><a href="profile?user=<?php echo "$user"; ?>"><?php echo "$fullName"; ?></a></b>
						</td></tr>
						<tr><td>
							<a href="settings">Edit Profile</a>
						</td></tr>
					</table>
				  </td>
				  </tr>
				  </table>
               </div>
               <hr>
			   <table>
			   <tr>
			   <td>
					<h3><a href="#" style="color: #8AC007;background-color: transparent;">Bands </a></h3>
				</td>
				<td>
					<a href="bandSearch"><img src="search.jpg" height="25" width="25"></a>
				<td>
				</tr>
			   </table>
               <div>
                  <b><a href="#" style="color: #0088cc;background-color: transparent;" >Bands You are Following</a></b>
				  <?php 
					$query = $dbo->getBandByUser($userId);
					$count = $query->rowCount();
					if($count>0){
				  ?>
                  <div style="margin-top:5px;width:350px;height:100px;overflow:auto;">
                     <table>
                        <?php
                           
                           while ($row = $query->fetch(PDO::FETCH_ASSOC))
                           {?>
                        <tr>
                           <td>
                              <table>
                                 <tr>
                                    <td><img src="<?php echo $dbo->getProfilePhoto($row['bandId']); ?>"  height="40" width="40"></td>
                                 </tr>
                                 <tr>
                                    <td><button class="btn btn-primary" style="width:40px; border-radius: 40px;" value="<?php echo $row['bandId'] ?>" name="unfollow" onclick="unfollowBand(this)"><b>-</b></button></td>
                                 </tr>
                              </table>
                           </td>
                           <td>
                              <table>
                                 <tr>
                                    <td><font size="3"><b><a href="bandProfile?user=<?php echo $row['userName']; ?>"><?php echo $row['bandName'] ?></a></b></font></td>
                                 </tr>
                                 <tr>
                                    <td><font size="2" color="grey"><?php echo $row['bandDesc'] ?></font></td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <div class="starRating" id="<?php echo $row['bandId'] ?>_star">
                                          <div>
                                             <div>
                                                <div>
                                                   <div>
                                                      <input style="width:24px;" id="rating1<?php echo $row['bandId'] ?>" type="radio" name="rating_<?php echo $row['bandId'] ?>" value="1:<?php echo $row['bandId'] ?>" onChange="rateBand(this)">
                                                      <label for="rating1"><span>1</span></label>
                                                   </div>
                                                   <input style="width:24px;" id="rating2<?php echo $row['bandId'] ?>" type="radio" name="rating_<?php echo $row['bandId'] ?>" value="2:<?php echo $row['bandId'] ?>" onChange="rateBand(this)">
                                                   <label for="rating2"><span>2</span></label>
                                                </div>
                                                <input style="width:24px;" id="rating3<?php echo $row['bandId'] ?>" type="radio" name="rating_<?php echo $row['bandId'] ?>" value="3:<?php echo $row['bandId'] ?>" onChange="rateBand(this)">
                                                <label for="rating3"><span>3</span></label>
                                             </div>
                                             <input style="width:24px;" id="rating4<?php echo $row['bandId'] ?>" type="radio" name="rating_<?php echo $row['bandId'] ?>" value="4:<?php echo $row['bandId'] ?>" onChange="rateBand(this)">
                                             <label for="rating4"><span>4</span></label>
                                          </div>
                                          <input style="width:24px;" id="rating5<?php echo $row['bandId'] ?>" type="radio" name="rating_<?php echo $row['bandId'] ?>" value="5:<?php echo $row['bandId'] ?>" onChange="rateBand(this)">
                                          <label for="rating5"><span>5</span></label>
                                       </div>
									   <?php $rate=$dbo->getBandRating($userId,$row['bandId']);
												if($rate>0){
									   ?>
											<script>
												document.getElementById('rating'+<?php echo $rate.''.$row['bandId']?>).checked =true;
											</script>
									   <?php } 
											if(!($dbo->isBandRecoDone($userId,$row['bandId']))){
									   ?>
										<img style="margin-left:5px;" src="share-icon-128x128.png" height="25" width="25" onClick="recoBand('<?php echo $row['bandId'] ?>')">
									   <?php } ?>	
                                    </td>
                                 </tr>
                              </table>
                        </tr>
                        <?php
                           }
                           ?>
                     </table>
                  </div>
				  <?php } else echo "<br/>You are not following any Band." ?>
               </div>
               <hr>
               <div>
                  <b><a href="#" style="color: #0088cc;background-color: transparent;" >Bands You May Like</a></b>
				  <?php
                           $query = $dbo->getSuggestedBandsForUser($userId);
						   $count = $query->rowCount();
							if($count>0){
				  ?>
				  <div style="margin-top:5px;width:350px;height:100px;overflow:auto;">
                     <table>
                        <?php
                           
                           while ($row = $query->fetch(PDO::FETCH_ASSOC))
                           {?>
                        <tr>
                           <td>
                              <table>
                                 <tr>
                                    <td><img src="<?php echo $dbo->getProfilePhoto($row['bandId']); ?>"  height="40" width="40"></td>
                                 </tr>
                                 <tr>
                                    <td><button class="btn btn-primary" style="width:40px; border-radius: 40px;" value="<?php echo $row['bandId'] ?>" name="follow" onclick="followBand(this)"><b>+</b></button></td>
                                 </tr>
                              </table>
                           </td>
                           <td>
                              <table>
                                 <tr>
                                    <td><font size="3"><b><a href="bandProfile?user=<?php echo $row['userName']; ?>"><?php echo $row['bandName'] ?></a></b></font></td>
                                 </tr>
                                 <tr>
                                    <td><font size="2" color="grey"><?php echo $row['bandDesc'] ?></font></td>
                                 </tr>
                                 <tr>
                                    <td>
										Rating: <font size="3" color="#8AC007"><b><?php echo $row['avgRating'] ?> </b></font>| Followers: <font size="3" color="#8AC007"><b><?php echo $row['cnt'] ?> </b></font>
                                    </td>
                                 </tr>
                              </table>
                        </tr>
                        <?php
                           }
                           ?>
                     </table>
                  </div>
				   <?php } else echo "<br/>No Band Suggestion" ?>
               </div>
               <div>
                  <hr>
                  <div>
                     <b><a href="#" style="color: #0088cc;background-color: transparent;" >Bands Recommended By Friend</a></b>
					 <?php
                           $query = $dbo->getRecoBand($userId);
						   $count = $query->rowCount();
							if($count>0){
					?>
					 <div style="margin-top:5px;width:350px;height:100px;overflow:auto;">
                     <table>
                        <?php
                           $query = $dbo->getRecoBand($userId);
                           while ($row = $query->fetch(PDO::FETCH_ASSOC))
                           {?>
                        <tr>
                           <td>
                              <table>
                                 <tr>
                                    <td><img src="<?php echo $dbo->getProfilePhoto($row['bandId']); ?>"  height="40" width="40"></td>
                                 </tr>
                                 <tr>
                                    <td><button class="btn btn-primary" style="width:40px; border-radius: 40px;" value="<?php echo $row['bandId'] ?>" name="follow" onclick="followBand(this)"><b>+</b></button></td>
                                 </tr>
                              </table>
                           </td>
                           <td>
                              <table>
                                 <tr>
                                    <td><font size="3"><b><a href="bandProfile?user=<?php echo $row['userName']; ?>"><?php echo $row['bandName'] ?></a></b></font></td>
                                 </tr>
                                 <tr>
                                    <td><font size="2" color="grey"><?php echo $row['bandDesc'] ?></font></td>
                                 </tr>
                                 <tr>
                                    <td>
									Rating: <font size="3" color="#8AC007"><b><?php echo $row['avgRating'] ?> </b></font>| Followers: <font size="3" color="#8AC007"><b><?php echo $row['cnt'] ?> </b></font>
                                    </td>
                                 </tr>
                              </table>
                        </tr>
                        <?php
                           }
                           ?>
                     </table>
					</div>
					<?php } else echo "<br/>No Band Recommendation" ?>
                  </div>
			  <table>
			   <tr>
			   <td>
					 <h3><a href="#" style="color: #8AC007;background-color: transparent;">Friends </a></h3>
				</td>
				<td>
					<a href="search?term="><img src="search.jpg" height="25" width="25"></a>
				<td>
				</tr>
			   </table>
                 
                  <div>
                     <b><a href="#" style="color: #0088cc;background-color: transparent;" >Friends </a></b>
					 <?php
                           $query = $dbo->getFriendByUser($userId);
						    $count = $query->rowCount();
							if($count>0){
					  ?>
					 <div style="margin-top:5px;width:350px;height:100px;overflow:auto;">
                     <table>
                        <?php
                           
                           while ($row = $query->fetch(PDO::FETCH_ASSOC))
                           {?>
                        <tr>
                           <td>
                              <table>
                                 <tr>
                                    <td><img src="<?php echo $dbo->getProfilePhoto($row['userId']); ?>"  height="40" width="40"></td>
                                 </tr>
                                 <tr>
                                    <td><button class="btn btn-primary" style="width:40px; border-radius: 40px;" value="<?php echo $row['userId'] ?>" name="unfollow" onclick="unfollowUser(this)"><b>-</b></button></td>
                                 </tr>
                              </table>
                           </td>
                           <td>
                              <table>
                                 <tr>
                                    <td><font size="3"><b><a href="profile?user=<?php echo $row['userName']; ?>"><?php echo $row['fName'] . ' ' . $row['lName'] ?></a></b></font></td>
                                 </tr>
                                 <tr>
                                    <td><font size="2" color="grey"><?php echo $row['about']; ?></font></td>
                                 </tr>
                                 <tr>
                                    <td>
										Trust Score: <font size="3" color="#8AC007"><b><?php echo $row['trustScore'] ?> </b></font> | Followers: <font size="3" color="#8AC007"><b><?php echo $row['cnt'] ?> </b></font>
                                    </td>
                                 </tr>
                              </table>
                        </tr>
                        <?php
                           }
                           ?>
                     </table>
                  </div>
				  <?php } else echo "<br/>You are not following any Friend" ?>
                  </div>
				  <hr>
				  <div>
                     <b><a href="#" style="color: #0088cc;background-color: transparent;" >Friends You may Like </a></b>
					 <?php
                           $query = $dbo->getSuggestedFriend($userId);
						   $count = $query->rowCount();
							if($count>0){
					 ?>
					 <div style="margin-top:5px;width:350px;height:100px;overflow:auto;">
                     <table>
                        <?php
                           
                           while ($row = $query->fetch(PDO::FETCH_ASSOC))
                           {?>
                        <tr>
                           <td>
                              <table>
                                 <tr>
                                    <td><img src="<?php echo $dbo->getProfilePhoto($row['userId']); ?>"  height="40" width="40"></td>
                                 </tr>
                                 <tr>
                                    <td><button class="btn btn-primary" style="width:40px; border-radius: 40px;" value="<?php echo $row['userId'] ?>" name="follow" onclick="followUser(this)"><b>+</b></button></td>
                                 </tr>
                              </table>
                           </td>
                           <td>
                              <table>
                                 <tr>
                                    <td><font size="3"><b><a href="profile?user=<?php echo $row['userName']; ?>"><?php echo $row['fName'] . ' ' . $row['lName'] ?></a></b></font></td>
                                 </tr>
                                 <tr>
                                    <td><font size="2" color="grey"><?php echo $row['about']; ?></font></td>
                                 </tr>
                                 <tr>
                                    <td>
										Trust Score: <font size="3" color="#8AC007"><b><?php echo $row['trustScore'] ?> </b></font> | Followers: <font size="3" color="#8AC007"><b><?php echo $row['cnt'] ?> </b></font>
                                    </td>
                                 </tr>
                              </table>
                        </tr>
                        <?php
                           }
                           ?>
                     </table>
                  </div>
				  <?php } else echo "<br/>No Friend Suggestion" ?>
                  </div>
               </div>
            </td>
            <td colspan=4>
               <div style="
                  border:2px solid #a1a1a1;
                  margin-top:20px;
				  margin-left:2px;
                  font-size:15px;
                  padding:10px 40px; 
                  box-shadow: 0px 0px 20px 3px #d3d3d3;
                  border-radius: 4px;
                  background-color: #ffffff;
                  width:450px;
                  height : 1000px;">
                  <h2>Live Feeds</h2>
				  <div style="margin-top:5px;width:530px;height:900px;overflow:auto;">
				  <?php
                           $query = $dbo->getLiveFeeds($userId);
                           while ($row = $query->fetch(PDO::FETCH_ASSOC))
                    {?>
						<hr>
						<div>
							<?php $query1 = $dbo->getUserById($row['actByUserId']); 
								if($row1 = $query1->fetch(PDO::FETCH_ASSOC)){
									if($row1['role']=='USER') {
							?>
								<font size="3"><b><a href="profile?user=<?php echo $row1['userName']; ?>"><?php echo $row1['fName'] . ' ' . $row1['lName'] ?></a></font>
							<?php } else if($row1['role']=='BAND') { ?>
								<font size="3"><b><a href="bandProfile?user=<?php echo $row1['userName']; ?>"><?php echo $row1['bandName'] ?></a></font>
							<?php }} ?>
							<b><?php echo ' '.$row['actDesc'].' '?></b>
							<?php if($row['actToType']=='CONCERT'){
								$query3=$dbo->getConcertDetails($row['actToUserId']);
								 if ($row3 = $query3->fetch(PDO::FETCH_ASSOC))
								 {
									echo "<font size='3'><b><a href=concertDetails?conId=".$row['actToUserId'].">".$row3['conName']."</a></b></font>";
								 }
							}else{?>
							<?php $query1 = $dbo->getUserById($row['actToUserId']); 
								if($row1 = $query1->fetch(PDO::FETCH_ASSOC)){
									if($row1['role']=='USER') {
							?>
								<font size="3"><b><a href="profile?user=<?php echo $row1['userName']; ?>"><?php echo $row1['fName'] . ' ' . $row1['lName'] ?></a></font>
							<?php } else if($row1['role']=='BAND') { ?>
								<font size="3"><b><a href="bandProfile?user=<?php echo $row1['userName']; ?>"><?php echo $row1['bandName'] ?></a></font>
							<?php }}} ?>
							<br/><font size="1" color=grey><?php echo $row['actTime'] ?></font>
						</div>
						
					<?php } ?>
					</div>
               </div>
            </td>
            <td>
               <div style="
                  border:2px solid #a1a1a1;
                  margin-top:20px;
				  margin-left:2px;
                  font-size:15px;
                  padding:10px 40px; 
                  box-shadow: 0px 0px 20px 3px #d3d3d3;
                  border-radius: 4px;
                  background-color: #ffffff;
                  width:316px;
                  height : 1000px">
				<table>
			   <tr>
			   <td>
					<h3><a href="#" style="color: #8AC007;background-color: transparent;">Concerts </a></h3>
				</td>
				<td>
					<a href="concertSearch"><img src="search.jpg" height="25" width="25"></a>
				<td>
				</tr>
			   </table>
				  <a href="addConcert" style="color: #0088cc;background-color: transparent;" ><button class="btn btn-primary" style="width:40px; border-radius: 40px;" ><b>+</button> Add Concert</b></a>
				  <hr>
                  <div>
                     <b><a href="#" style="color: #0088cc;background-color: transparent;">Upcoming Concerts</a></b>
					  
					  <?php
                            $query = $dbo->getUpcomingConcert($userId);
						    $count = $query->rowCount();
							if($count>0){
					  ?>
					 <div style="margin-top:5px;width:350px;height:100px;overflow:auto;">
					 <table>
                        <?php
                         while($row = $query->fetch(PDO::FETCH_ASSOC))
                           {?>
                        <tr>
                           <td>
                              <table>
                                 <tr>
                                    <td><img src="<?php echo $dbo->getProfilePhoto($row['bandId']); ?>"  height="40" width="40"></td>
                                 </tr>
                                 <tr>
                                    <td><button class="btn btn-primary" style="width:40px; border-radius: 40px;" value="<?php echo $row['conId'] ?>" name="cnclrsvp" onclick="cnclRsvpConcert(this)"><b>-</b></button></td>
                                 </tr>
								 <tr>
									<td>
										<?php
											if(!($dbo->isConRecoDone($userId,$row['conId']))){
									   ?>
										<img style="margin-left:5px;" src="share-icon-128x128.png" height="25" width="25" onClick="recoConcert('<?php echo $row['conId'] ?>')">
										<?php } ?>
									</td>
								 </tr>
                              </table>
                           </td>
                           <td>
                              <table>
                                 <tr>
                                    <td><font size="3"><b><a href="concertDetails?conId=<?php echo $row['conId'] ?>"><?php echo $row['conName'] ?></a> by <a href="bandProfile?user=<?php echo $row['userName'] ?>"><?php echo $row['bandName'] ?></a></b></font></td>
                                 </tr>
                                 <tr>
                                    <td><font size="2" color="grey"><?php echo $row['conDesc'] ?></font></td>
                                 </tr>
								 <tr>
								    <td><a href="http://maps.google.com/?q=<?php echo $row['vAddr'] ?>" target="_blank" ><img style="margin-right:5px;" src="bln.jpg" height="15" width="15"></a><font size="2" color="black"><?php echo $row['vAddr'] ?></font></td>
								 </tr>
								 <tr>
								    <td><font size="2" color="black"><?php echo $row['conTime'] ?></font></td>
								 </tr>
								  <tr>
                                    <td>
                                       RSVP'd By : <font size="3" color="#8AC007"><b><?php echo $row['rsvpCnt'] ?></b></font> 
                                    </td>
                                 </tr>
                              </table>
                        </tr>
                        <?php
                           }
                           ?>
                     </table>
                  </div>
				  <?php } else echo "<br/>No upcoming Concerts." ?>
				  </div>
                  <hr>
                  <div>
                     <b><a href="#" style="color: #0088cc;background-color: transparent;">Concerts Attended</a></b>
					 
					 <?php
                            $query = $dbo->getAttendedConcert($userId);
						    $count = $query->rowCount();
							if($count>0){
					  ?>
					 <div style="margin-top:5px;width:350px;height:100px;overflow:auto;">
					 <table>
                        <?php
                         while ( $row = $query->fetch(PDO::FETCH_ASSOC) )
                           {?>
                        <tr>
                           <td>
                              <table>
                                 <tr>
                                    <td><img src="<?php echo $dbo->getProfilePhoto($row['bandId']); ?>"  height="40" width="40"></td>
                                 </tr>
                              </table>
                           </td>
                           <td>
                              <table>
                                 <tr>
                                    <td><font size="3"><b><a href="concertDetails?conId=<?php echo $row['conId'] ?>"><?php echo $row['conName'] ?></a> by <a href="bandProfile?user=<?php echo $row['userName'] ?>"><?php echo $row['bandName'] ?></a></b></font></td>
                                 </tr>
								  <tr>
                                    <td><font size="2" color="grey"><?php echo $row['conDesc'] ?></font></td>
                                 </tr>
                                 <tr>
                                    <td><font size="2" color="black"><?php echo $row['conTime'] ?></font></td>
                                 </tr>
								 <tr>
                                    <td>
                                       RSVP'd By : <font size="3" color="#8AC007"><b><?php echo $row['rsvpCnt'] ?></b></font> 
                                    </td>
                                 </tr>
								  <tr>
                                    <td>
                                       <div class="starRating" id="<?php echo $row['conId'] ?>_star">
                                          <div>
                                             <div>
                                                <div>
                                                   <div>
                                                      <input style="width:24px;" id="crating1_<?php echo $row['conId'] ?>" type="radio" name="crating_<?php echo $row['conId'] ?>" value="1:<?php echo $row['conId'] ?>" onChange="rateConcert(this)">
                                                      <label for="rating1"><span>1</span></label>
                                                   </div>
                                                   <input style="width:24px;" id="crating2_<?php echo $row['conId'] ?>" type="radio" name="crating_<?php echo $row['conId'] ?>" value="2:<?php echo $row['conId'] ?>" onChange="rateConcert(this)">
                                                   <label for="rating2"><span>2</span></label>
                                                </div>
                                                <input style="width:24px;" id="crating3_<?php echo $row['conId'] ?>" type="radio" name="crating_<?php echo $row['conId'] ?>" value="3:<?php echo $row['conId'] ?>" onChange="rateConcert(this)">
                                                <label for="rating3"><span>3</span></label>
                                             </div>
                                             <input style="width:24px;" id="crating4_<?php echo $row['conId'] ?>" type="radio" name="crating_<?php echo $row['conId'] ?>" value="4:<?php echo $row['conId'] ?>" onChange="rateConcert(this)">
                                             <label for="rating4"><span>4</span></label>
                                          </div>
                                          <input style="width:24px;" id="crating5_<?php echo $row['conId'] ?>" type="radio" name="crating_<?php echo $row['conId'] ?>" value="5:<?php echo $row['conId'] ?>" onChange="rateConcert(this)">
                                          <label for="rating5"><span>5</span></label>
                                       </div>
									    <?php $rate=$dbo->getConRating($userId,$row['conId']);
												if($rate>0){
									   ?>
											<script>
												document.getElementById('crating'+'<?php echo $rate.'_'.$row['conId']?>').checked =true;
											</script>
									   <?php } ?>
                                    </td>
                                 </tr>
                              </table>
                        </tr>
                        <?php
                           }
                           ?>
                     </table>
					 </div>
					 <?php } else echo "<br/>Not Attended any Concerts." ?>
                  </div>
                  <hr>
                  <div>
                     <b><a href="#" style="color: #0088cc;background-color: transparent;">Concerts You may Like</a></b>
					 <?php
                            $query = $dbo->getConcertSuggestion($userId);
						    $count = $query->rowCount();
							if($count>0){
					  ?>
					 <div style="margin-top:5px;width:350px;height:100px;overflow:auto;">
					 <table>
                        <?php
                         while ($row = $query->fetch(PDO::FETCH_ASSOC))
                           {?>
						   <tr>
                           <td>
                              <table>
                                 <tr>
                                    <td><img src="<?php echo $dbo->getProfilePhoto($row['bandId']); ?>"  height="40" width="40"></td>
                                 </tr>
                                 <tr>
                                    <td>
											<button class="btn btn-primary" style="width:40px; border-radius: 40px;" value="<?php echo $row['conId'] ?>" name="follow" onclick="rsvpConcert(this)"><b>+</b></button>
									</td>
                                 </tr>
								 <tr>
									<td>
										<?php
											if(!($dbo->isConRecoDone($userId,$row['conId']))){
									   ?>
											<img style="margin-left:5px;" src="share-icon-128x128.png" height="25" width="25" onClick="recoConcert('<?php echo $row['conId'] ?>')">
										<?php } ?>
									</td>
								 </tr>
                              </table>
                           </td>
                           <td>
                              <table>
                                 <tr>
                                    <td><font size="3"><b><a href="concertDetails?conId=<?php echo $row['conId'] ?>"><?php echo $row['conName'] ?></a> by <a href="bandProfile?user=<?php echo $dbo->getUserName($row['bandId']) ?>"><?php echo $row['bandName'] ?></a></b></font></td>
                                 </tr>
                                 <tr>
                                    <td><font size="2" color="grey"><?php echo $row['conDesc'] ?></font></td>
                                 </tr>
								 <tr>
								    <td><a href="http://maps.google.com/?q=<?php echo $row['vAddr'] ?>" target="_blank" ><img style="margin-right:5px;" src="bln.jpg" height="15" width="15"></a><font size="2" color="black"><?php echo $row['vAddr'] ?></font></td>
								 </tr>
								 <tr>
								    <td><font size="2" color="black"><?php echo $row['conTime'] ?></font></td>
								 </tr>
								  <tr>
                                    <td>
                                       RSVP'd By : <font size="3" color="#8AC007"><b><?php echo $row['rsvpCnt'] ?></b></font> 
                                    </td>
                                 </tr>
                              </table>
                        </tr>
                       
                        <?php
                           }
                           ?>
                     </table>
					 </div>
					 <?php } else echo "<br/>No Concert Suggestion." ?>
                  </div>
                  <div>
                     <hr>
                     <div>
                        <b><a href="#" style="color: #0088cc;background-color: transparent;">Concerts Recommended By Friend</a></b>
						 <?php
                            $query = $dbo->getRecoConcert($userId);
						    $count = $query->rowCount();
							if($count>0){
						?>
						 <div style="margin-top:5px;width:350px;height:100px;overflow:auto;">
						 <table>
                        <?php
						 
                         while ($row = $query->fetch(PDO::FETCH_ASSOC))
                           {?>
                        <tr>
                           <td>
                              <table>
                                 <tr>
                                    <td><img src="<?php echo $dbo->getProfilePhoto($row['bandId']); ?>"  height="40" width="40"></td>
                                 </tr>
                                 <tr>
                                    <td>
										<button class="btn btn-primary" style="width:40px; border-radius: 40px;" value="<?php echo $row['conId'] ?>" name="follow" onclick="rsvpConcert(this)"><b>+</b></button>
									</td>
                                 </tr>
								 <tr>
									<td>
										<?php
											if(!($dbo->isConRecoDone($userId,$row['conId']))){
									   ?>
										<img style="margin-left:5px;" src="share-icon-128x128.png" height="25" width="25" onClick="recoConcert('<?php echo $row['conId'] ?>')">
										<?php } ?>
									</td>
								 </tr>
                              </table>
                           </td>
                           <td>
                              <table>
                                 <tr>
                                    <td><font size="3"><b><a href="concertDetails?conId=<?php echo $row['conId'] ?>"><?php echo $row['conName'] ?></a> by <a href="bandProfile?user=<?php echo $row['userName'] ?>"><?php echo $row['bandName'] ?></a></b></font></td>
                                 </tr>
                                 <tr>
                                    <td><font size="2" color="grey"><?php echo $row['conDesc'] ?></font></td>
                                 </tr>
								 <tr>
								    <td><a href="http://maps.google.com/?q=<?php echo $row['vAddr'] ?>" target="_blank"><img style="margin-right:5px;" src="bln.jpg" height="15" width="15"></a><font size="2" color="black"><?php echo $row['vAddr'] ?></font></td>
								 </tr>
								 <tr>
								    <td><font size="2" color="black"><?php echo $row['conTime'] ?></font></td>
								 </tr>
								  <tr>
                                    <td>
                                       RSVP'd By : <font size="3" color="#8AC007"><b><?php echo $row['rsvpCnt'] ?></b></font> 
                                    </td>
                                 </tr>
                              </table>
							</td>
                        </tr>
                        <?php
                           }
                           ?>
                     </table>
					 </div>
					 <?php } else echo "<br/>No Concert Recommendation." ?>
                     </div>
                  </div>
				  <?php if($_SESSION['isPrime']=='Y') { 
					$query = $dbo->getConcertsForAppoval($userId);
					$count = $query->rowCount();
					if($count>0){
				  ?>
				  <hr>
                  <div>
                     <b><a href="#" style="color: #0088cc;background-color: transparent;" >Do you Know about Concert ?</a></b>
					 <div style="margin-top:5px;width:350px;height:130px;overflow:auto;">
                     <table>
                        <?php
                           
                           while ($row = $query->fetch(PDO::FETCH_ASSOC))
                           {?>
                        <tr>
                           <td>
                              <table>
                                 <tr>
                                    <td><img src="<?php echo $dbo->getProfilePhoto($row['bandId']); ?>"  height="40" width="40"></td>
                                 </tr>
                                 <!--<tr>
                                    <td><button class="btn btn-primary" style="width:40px; border-radius: 40px;" value="<?php echo $row['userId'] ?>" name="follow" onclick="followUser(this)"><b>+</b></button></td>
                                 </tr> -->
                              </table>
                           </td>
                           <td>
                              <table>
                                 <tr>
                                    <td><font size="3"><b><a href="concertDetails?conId=<?php echo $row['conId'] ?>"><?php echo $row['conName'] ?></a> by <a href="bandProfile?user=<?php echo $row['bandUserName'] ?>"><?php echo $row['bandName'] ?></a></b></font></td>
                                 </tr>
								 <tr>
                                    <td>Added By <a href="profile?user=<?php echo $row['cbUserName'] ?>"><?php echo $row['cbName'] ?></a></td>
                                 </tr>
                                 <tr>
                                    <td><font size="2" color="grey"><?php echo $row['conDesc'] ?></font></td>
                                 </tr>
								 <tr>
								    <td><a href="http://maps.google.com/?q=<?php echo $row['vAddr'] ?>" target="_blank"><img style="margin-right:5px;" src="bln.jpg" height="15" width="15"></a><font size="2" color="black"><?php echo $row['vAddr'] ?></font></td>
								 </tr>
								 <tr>
								    <td><font size="2" color="black"><?php echo $row['conTime'] ?></font></td>
								 </tr>
								 <tr>
								    <td>
									<?php if(!$dbo->isVotedConcert($userId,$row['conId'])) { ?>
									<div id="div_<?php echo $row['conId'] ?>">
										<img style="margin-left:5px;" src="yes.jpg" height="25" width="25" onClick="conAppr('<?php echo $row['conId'] ?>','Y')">
										<img style="margin-left:15px;" src="no.png" height="25" width="25" onClick="conAppr('<?php echo $row['conId'] ?>','N')">
									<div>
									<?php } else echo "Vote Saved"?>
									</td>
								 </tr>
                              </table>
							</td>  
                        </tr>
                        <?php
                           }
                           ?>
                     </table>
                  </div>
                  </div>
				  <?php }} ?>
            </td>
         </tr>
      </table>
      </div>
	  </div>
   </body>