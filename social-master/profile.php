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
    $query = $dbo->getUserDetails($user);

    if ($row = $query->fetch(PDO::FETCH_ASSOC))
    {
        $fullName = $row['fName'] . ' ' . $row['lName'];
        $about = $row['about'];
		$userId = $row['userId'];
        $profilePic = $dbo->getProfilePhoto($userId);
        $country = $row['originCountry'];
		$state = $row['originCity'];
        $gender = $row['sex'];
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo "$fullName"; ?></title>
		<script> 
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
	  button.innerHTML = 'Following';
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
	  button.innerHTML = 'Unfollwed';
	  button.disabled='disabled';
    }
  }
  xmlhttp.open("GET","unfollowBandUser?ftoId="+button.value,true);
  xmlhttp.send();
}
		</script>
    </head>
    <body>

    <?php include 'header.php'; ?>

    <div class="container" style="position: relative; top: 40px;">
        <ul class="nav nav-tabs">
			<li class="active"><a href="profile?user=<?php echo $user; ?>">Profile</a></li>
			<li><a href="userMusicBandView?user=<?php echo $user; ?>">Music Category & Bands</a></li>
			<li><a href="userConcerts?user=<?php echo $user; ?>">Concerts</a></li>
			<li><a href="userBandFrnd?user=<?php echo $user; ?>">Bands & Friends</a></li>
		</ul>
        <?php echo "<h1 style=\"font-size: 60px;\">$fullName</h1>";
		echo "<p> $gender | From: $state, $country "; ?>
		<a href="http://maps.google.com/?q=<?php echo $state.', '. $country ?>" target="_blank"><img style="margin-right:5px;" src="bln.jpg" height="15" width="15"></a>
		</p>
		<?php
            if($_SESSION['userId']!= $userId && $_SESSION['userType']=='USER'){
			if($dbo->isUserFollowingUser($_SESSION['userId'],$userId)){
            ?>
				<button type="button" class="btn btn-primary" value="<?php echo $userId ?>" name="unfollow" onclick="unfollowUser(this)">UnFollow</button>
			<?php } else  { ?>
				<button type="button" class="btn btn-primary" value="<?php echo $userId ?>" name="follow" onclick="followUser(this)">Follow</button>
			<?php } } ?>
        <div class="row-fluid" style="margin-top: 20px;">
            <div class="span4 well">
                <img src="<?php echo"$profilePic" ?>">
            </div>
            <div class="span8">
                <div class="row-fluid">
				    <table>
					<tr>
					<td colspan=3>
					<div class="span8 well">
						<h2>About Me</h2>
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
						<h3>TrustScore</h3>
                        <div class="control-group">
                            <div style="border:2px solid #a1a1a1;
										margin-top:20px;
										font-size:15px;
										padding:10px 40px; 
										box-shadow: 0px 0px 20px 3px #d3d3d3;
										border-radius: 4px;
										width : 50px;
										background-color: #ffffff;" align="center">
                              <center><font size="5" color="#8AC007"><b><?php echo $row['trustScore'] ?> </b></font> </center>
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
                              <font size="5" color="#8AC007"><b><?php echo $row['userConCnt'] ?> </b></font>
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
