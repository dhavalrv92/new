<?php
	session_start();
    if (isset($_SESSION['username'])){
        $username = $_SESSION['username'];
		$userId = $_SESSION['userId'];
	}
    else
        header('Location: ./login');
 
		require 'dbHelper.php';
		$dbo = new db();
 ?>
<?php
	if(isset($_POST['submit']) && $_POST['submit'] == 'done'){
		$query = $dbo->activateUser($userId);
		header('Location: ./home');
	}
?>

<html>
<head>
    <?php include 'header.php'; ?>
</head>
<body>
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
	  button.innerHTML = 'Unfollowed';
	  button.disabled='disabled';
    }
  }
  xmlhttp.open("GET","unfollowBandUser?ftoId="+button.value,true);
  xmlhttp.send();
}
</script>
		<div class="container" style="margin-top: 40px;">
		<ul class="nav nav-tabs">
			<li><a href="settings">General</a></li>
			<li><a href="musicCategory">Music Category</a></li>
			<li class="active"><a href="userBands">Bands</a></li>
		</ul>
            <form method="post" action="">
            <div class="row-fluid">
                <div class="span4">
                    <h3>Wanna be a fan of Band?</h3>
                </div>
            </div>
            <div class="row-fluid" style="margin-top: 20px;margin-left: 200px">
			<div class="span4 well" style="margin-top:5px;width:400px;height:400px;overflow:auto;">
			<h4> Band You are Following <h4>
			<table class="table span12">
			<tr><th>Follow</th><th>Band Name</th><th>Description</th></tr>
			 <?php
					$query = $dbo->getBandByUser($userId);
					while ($row = $query->fetch(PDO::FETCH_ASSOC))
				{?>
			<tr>
				<td align='center'><button type="button" class="btn btn-primary" value="<?php echo $row['bandId'] ?>" name="unfollow" onclick="unfollowBand(this)">Unfollow</button></td>
				<td align='center'><?php echo $row['bandName'] ?></td>
				<td align='center'><?php echo $row['bandDesc'] ?></td>
			</tr>
		 <?php
			}
			?>
			</table>
			</div>
			<div class="span4 well" style="margin-top:5px;width:400px;height:400px;overflow:auto;">
			<h4> Band You may Like <h4>
			<table class="table span12">
			<tr><th>Follow</th><th>Band Name</th><th>Description</th></tr>
			 <?php
					$query = $dbo->getSuggestedBandsForUser($userId);
					while ($row = $query->fetch(PDO::FETCH_ASSOC))
				{?>
			<tr>
				<td align='center'><button type="button" class="btn btn-primary" value="<?php echo $row['bandId'] ?>" name="follow" onclick="followBand(this)">Follow</button></td>
				<td align='center'><?php echo $row['bandName'] ?></td>
				<td align='center'><?php echo $row['bandDesc'] ?></td>
			</tr>
		 <?php
			}
			?>
			</table>
			</div>
			<?php if($_SESSION['isActive'] == 'N') { ?>
			<div class="span4 offset4" style="margin-left:250px">
                    <div class="control-group" >
                        <div class="controls" >
                            <br/>
							<button type="submit" class="btn btn-primary btn-large" value="done" name="submit">Done !</button>
                        </div>
                    </div>
            </div>
			<?php } ?>
		</form>
		</div>
<?php include 'footer.php'; ?>
</body>
</html>