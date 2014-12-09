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
    else
    {
            $username = $_SESSION['username'];
			$bandId = $_SESSION['userId'];
    }
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Concerts</title>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script type="text/javascript" src="http://bdhacker.sourceforge.net/javascript/countries/countries-2.0-min.js"></script>
		<script>
		function delConcert(button) {
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
	  button.innerHTML = 'Deleted';
	  button.disabled='disabled';
    }
  }
  xmlhttp.open("GET","delConcert?conId="+button.value,true);
  xmlhttp.send();
  }
		</script>
    </head>

    <body>
	
        <?php include 'header.php'; ?>
        <div class="container" style="position: relative; top: 40px;">
        <ul class="nav nav-tabs">
			<li><a href="bandSetting">General</a></li>
			<li><a href="addArtist">Artist</a></li>
			<li><a href="musicCategory">Music Category</a></li>
			<li class="active"><a href="bandConcert">Concerts</a></li>
		</ul>
            <div class="row-fluid">
                <div class="span4">
                    <h3>Upcoming Concerts!</h3>
                </div>
            </div>
			<div><a href="addConcert" style="color: #0088cc;background-color: transparent;" ><button class="btn btn-primary" style="width:40px; border-radius: 40px;" ><b>+</button> Add Concert</b></a></div>
			<br/>
			<div class="span9 well">
			
				<table class="table">
				<tr><th></th><th>Concert Name</th><th>Concert Time</th><th>Concert Venue</th><th>Price</th><th>RSVP'd By</th></tr>
				 <?php
					$query = $dbo->getBandUpComingConcertDetails($bandId); 
					while ($row = $query->fetch(PDO::FETCH_ASSOC))
				{?>
                  <tr>
				    <td>
						<button class="btn btn-primary" style="width:100px; border-radius: 40px;" value="<?php echo $row['conId'] ?>" name="delCon" onclick="delConcert(this)"><b>Delete</b></button>
						<?php if($row['createdBy'] != $bandId){ ?>
							<br/> added by : 
							<?php $query1=$dbo->getUserById($row['createdBy']);
								  if($row1 = $query1->fetch(PDO::FETCH_ASSOC)){
										$cbusername = $row1['userName'];
										$cbName = $row1['fName'].' '.$row1['lName'];
								  }
							?>
							<br/><a href="profile?user=<?php echo $cbusername ?>"><b><?php echo $cbName ?></b></a>
						<?php } ?>
					</td>
					<td><font size="3"><b><a href="concertDetails?conId=<?php echo $row['conId']; ?>"><?php echo $row['conName'] ?></a></b></font></td>
					<td><?php echo $row['conTime'] ?></td>
					<td><b><?php echo $row['vName'] ?></b><br/>
						<?php echo $row['vAddr'] ?><a href="http://maps.google.com/?q=<?php echo $row['vAddr'] ?>" target="_blank" ><img style="margin-right:5px;" src="bln.jpg" height="15" width="15"></a>
					</td>
					<td><?php echo $row['price'] ?></td>
					<td><?php echo $row['rsvpCnt'] ?></td>
				  </tr>
				<?php } ?>
				</table>
        </div>

        <?php //include 'footer.php'; ?>
    </body>
</html>