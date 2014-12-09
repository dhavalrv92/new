<?php
    session_start();	
	require 'dbHelper.php';
    $dbo = new db();
	
        if (! isset($_SESSION['username']))
        {
            $dbo->close();
            unset($dbo);
            header('Location: ./logout');
        }

   
        $conId = $_GET['conId'];
     
    $query = $dbo->getConcertDetails($conId);

    if ($row = $query->fetch(PDO::FETCH_ASSOC))
    {
        $bandId = $row['bandId'];
		$bandName = $row['bandName'];
		$isActive= $row['active'];
		$conDateTime = new DateTime($row['time']);
		$rsvpCnt = $row['rsvpCnt'];
		$originCity = $row['originCity'];
		$bandDesc = $row['bandDesc'];
		$profilePic = $dbo->getProfilePhoto($bandId);
		$conId = $row['conId'];
		
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $row['conName']; ?></title>
		<script>
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
	  button.innerHTML = "RSVP'd";
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
	  button.innerHTML = 'Cancelled RSVP';
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
		</script>
		
    </head>
    <body>

    <?php include 'header.php'; ?>
	 <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <div class="container" style="position: relative; top: 40px;">
	 <ul class="nav nav-tabs">
        <li class="active">
          <a href="concertDetails?conId=<?php echo $conId ?>">General</a>
        </li>
        <li><a href="concertAttendees?conId=<?php echo $conId ?>">Attendees</a></li>
		<li><a href="concertReview?conId=<?php echo $conId ?>">Review</a></li>
      </ul>
       
       <?php echo "<h1 style=\"font-size: 60px;\">".$row['conName']."</h1>";
	   ?>
	   <b>&nbsp; By <a href="bandProfile?user=<?php echo $row['userName']; ?>"><?php echo $row['bandName']; ?></a></b><br/>
	   <?php
		echo "<p>Venue:".$row['vAddr']."</p>"; 
		echo "<p>Time:". $row['conTime']."</p>";
		?>
		<?php
		    
			if($row['active']=='N'){
			  echo "<font color=red>Not Verified.</font>";
			}
            else if($_SESSION['userId']!= $bandId && $_SESSION['userType']=='USER' && $row['active']=='Y'){ 
				if($dbo->isRSVPDConcert($_SESSION['userId'],$conId) && $conDateTime< new DateTime()){
            ?>
         <div class="starRating" id="<?php echo $conId ?>_star">
            <div>
               <div>
                  <div>
                     <div>
                        <input style="width:24px;" id="rating1<?php echo $conId ?>" type="radio" name="rating_<?php echo $conId ?>" value="1:<?php echo $conId ?>" onChange="rateConcert(this)">
                        <label for="rating1"><span>1</span></label>
                     </div>
                     <input style="width:24px;" id="rating2<?php echo $conId ?>" type="radio" name="rating_<?php echo $conId ?>" value="2:<?php echo $conId ?>" onChange="rateConcert(this)">
                     <label for="rating2"><span>2</span></label>
                  </div>
                  <input style="width:24px;" id="rating3<?php echo $conId ?>" type="radio" name="rating_<?php echo $conId ?>" value="3:<?php echo $conId ?>" onChange="rateConcert(this)">
                  <label for="rating3"><span>3</span></label>
               </div>
               <input style="width:24px;" id="rating4<?php echo $conId ?>" type="radio" name="rating_<?php echo $conId ?>" value="4:<?php echo $conId ?>" onChange="rateConcert(this)">
               <label for="rating4"><span>4</span></label>
            </div>
            <input style="width:24px;" id="rating5<?php echo $conId ?>" type="radio" name="rating_<?php echo $conId ?>" value="5:<?php echo $conId ?>" onChange="rateConcert(this)">
            <label for="rating5"><span>5</span></label>
         </div>
         <?php $rate=$dbo->getConRating($_SESSION['userId'],$conId);
            if($rate>0){
            ?>
         <script>
            document.getElementById('rating'+<?php echo $rate.''.$conId?>).checked =true;
         </script>
         <?php }} 
            if(!($dbo->isConRecoDone($_SESSION['userId'],$conId)) && $conDateTime>= new DateTime()){
             ?>
         <img style="margin-left:5px;" src="share-icon-128x128.png" height="25" width="25" onClick="recoConcert('<?php echo $conId ?>')">
         <?php } if($dbo->isRSVPDConcert($_SESSION['userId'],$conId) && $conDateTime>= new DateTime()){ ?>	
			<button type="button" class="btn btn-primary" value="<?php echo $conId ?>" name="cnclrsvp" onclick="cnclRsvpConcert(this)">Cancel RSVP</button>
         <?php 
		 }else if(!($dbo->isRSVPDConcert($_SESSION['userId'],$conId)) && $conDateTime>= new DateTime()){ ?>
			<button type="button" class="btn btn-primary" value="<?php echo $conId ?>" name="rsvp" onclick="rsvpConcert(this)">RSVP</button>
		<?php }}
            ?>
        <div class="row-fluid" style="margin-top: 20px;">
            <div class="span4 well">
                <iframe width="270" height="240" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.it/maps?q=<?php echo $row['vAddr']; ?>&output=embed"></iframe>
            </div>
            <div class="span8">
                <div class="row-fluid">
				    <table>
					<tr>
					<td colspan=3>
					<div class="span8 well">
						<h2>Concert Description</h2>
                        <div class="control-group">
                            <div style="border:2px solid #a1a1a1;
										margin-top:20px;
										font-size:15px;
										padding:10px 40px; 
										box-shadow: 0px 0px 20px 3px #d3d3d3;
										border-radius: 4px;
										background-color: #ffffff;">
                              <?php echo "<p>".$row['conDesc']."</p>"; ?>
                            </div>
                        </div>
					</div>
					</td>
					<tr>
					<td>
					<div class="span3 well">
						<h3>Price</h3>
                        <div class="control-group">
                            <div style="border:2px solid #a1a1a1;
										margin-top:20px;
										font-size:15px;
										padding:10px 40px; 
										box-shadow: 0px 0px 20px 3px #d3d3d3;
										border-radius: 4px;
										width : 50px;
										background-color: #ffffff;" align="center">
                              <font size="5" color="#8AC007"><b><?php echo $row['price']; ?> </b></font> 
                            </div>
                        </div>
					</div>
					</td>
					<td>
					<div class="span3 well">
						<h3>RSVP'dBy</h3>
                        <div class="control-group">
                            <div style="border:2px solid #a1a1a1;
										margin-top:20px;
										font-size:15px;
										padding:10px 40px; 
										box-shadow: 0px 0px 20px 3px #d3d3d3;
										border-radius: 4px;
										width : 50px;
										background-color: #ffffff;" align="center">
                              <font size="5" color="#8AC007"><b><?php echo $row['rsvpCnt']; ?> </b></font> 
                            </div>
                        </div>
					</div>
					</td>
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
                              <font size="5" color="#8AC007"><b><?php echo $row['avgRating']; ?> </b></font> 
                            </div>
                        </div>
					</div>
					</td>
					</tr>
                </div>
            </div>
        </div>
    </div>

    <?php //include 'footer.php'; ?>
    </body>
</html>
