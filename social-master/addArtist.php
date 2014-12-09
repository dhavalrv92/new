<?php
    session_start();
    require 'dbHelper.php';

    $dbo = new db();

    if (isset($_SESSION['username'])){
        $username = $_SESSION['username'];
		$userId = $_SESSION['userId'];
	}
    else
        header('Location: ./login');

    $successMessage = '';
    $errorMessage = '';

    if (isset($_POST['firstName']) && $_POST['firstName'] != '')
    {
        $firstName = htmlentities(mysql_escape_string($_POST['firstName']));
		$about = htmlentities(mysql_escape_string($_POST['about']));
		$country = htmlentities(mysql_escape_string($_POST['country']));
		$state = htmlentities(mysql_escape_string($_POST['state']));
        $dbo->addArtist($userId, $firstName, $about,$country,$state);
        $successMessage = $successMessage . 'Artist Added. Have more Artist? Add here. ';
    }
    if($successMessage == '' && $errorMessage == '' && isset($_POST['submit']))
        $blueMessage = 'Nothing was updated. Have more Artist? Add here.';
    if(isset($_POST['submit']) && $_POST['submit'] == 'next')
	  header('Location: ./musicCategory'); 	
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile Settings</title>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script type="text/javascript" src="http://bdhacker.sourceforge.net/javascript/countries/countries-2.0-min.js"></script>
		<script type="text/javascript">
		function deleteArtist(button) {
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
  xmlhttp.open("GET","deleteArtist?aId="+button.value,true);
  xmlhttp.send();
}
</script>
    </head>

    <body>
	
        <?php include 'header.php'; ?>
        <?php
         if (isset($errorMessage) && $errorMessage != '')
            echo "<div class=\"alert alert-error\" id=\"formError\">
                   <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
                   <strong>ERROR! </strong> $errorMessage
                 </div>";
         if (isset($successMessage) && $successMessage != '')
            echo "<div class=\"alert alert-success\" id=\"formSuccess\">
                   <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
                   <strong>Success! </strong> $successMessage
                 </div>";
        if (isset($blueMessage) && $blueMessage != '')
            echo "<div class=\"alert alert-info\" id=\"formError\">
                   <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
                   $blueMessage
                 </div>";
       ?>
        <div class="container" style="margin-top: 40px;">
		<ul class="nav nav-tabs">
			<li><a href="bandSetting">General</a></li>
			<li class="active"><a href="addArtist">Artist</a></li>
			<li><a href="musicCategory">Music Category</a></li>
			<li><a href="bandConcert">Concerts</a></li>
		</ul>
            <form method="post" action="">
            <div class="row-fluid">
                <div class="span4">
                    <h3>Who Rocks Your Band?</h3>
                </div>
            </div>
            <div class="row-fluid" style="margin-top: 20px;">
                <div class="span4 well">
                    <h2>About Artist</h2>
                        <div class="control-group">
                            <label class="control-label" for="textAreaAbout">About</label>
                            <div class="controls">
                              <textarea maxlength="15000" rows="12" class="input-xlarge" id="textAreaAbout" name="about" placeholder="About Artist"></textarea>
                            </div>
                        </div>
                </div>

                <div class="span4 well">
                    <h2>Artist Details</h2>
                    <h4>Not all fields required</h4>

                        <div class="control-group">
                            <label class="control-label" for="inputFirstName"> Name</label>
                            <div class="controls">
                              <input id="inputFirstName" type="text" class="input-xlarge" name="firstName" placeholder="Artist Name"/>
                            </div>
                        </div>
						<div class="control-group">
							<label class="control-label" for="inputCountry">Country</label>
							<div class="controls">
								<select onchange="print_state('state',this.selectedIndex);" id="country" name = "country"></select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputState">City/State:</label>
							<div class="controls">
								<select name ="state" id = "state"></select>
							</div>
						</div>
						<script type="text/javascript">
							print_country("country");
							$('#country').val('USA');
							print_state('state',$('#country')[0].selectedIndex);
						</script>						
                        
                </div>
            
			<div class="span4 well">
				<table class="table">
				<tr><th>Delete</th><th>Artist Name</th><th>About Artist</th><th>Origin</th></tr>
				 <?php
					$query = $dbo->getAllArtistByBand($userId); 
					while ($row = $query->fetch(PDO::FETCH_ASSOC))
				{?>
                  <tr>
					<td><button type="button" class="btn btn-primary" value="<?php echo $row['aId'] ?>" name="delete" onclick="deleteArtist(this)">Delete</button></td>
					<td><?php echo $row['aName'] ?></td>
					<td><?php echo $row['artistDesc'] ?></td>
					<td><?php echo $row['originCity'].', '.$row['originCountry'] ?></td>
				  </tr>
				<?php } ?>
				</table>
			</div>
			</div>
			<div class="span4 offset4">
                    <div class="control-group" >
                        <div class="controls">
                            <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-primary btn-large" value="save" name="submit">Save</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<!--<button type="submit" class="btn btn-primary btn-large" value="next" name="submit">Next >></button>-->
                        </div>
                    </div>
            </div>
        </form>
        </div>

        <?php include 'footer.php'; ?>
    </body>
</html>