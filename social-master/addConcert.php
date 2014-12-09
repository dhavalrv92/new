<?php
  //TODO: check emails better
  session_start();
  if (isset($_SESSION['username'])){
        $username = $_SESSION['username'];
		$userId = $_SESSION['userId'];
	}
    else
        header('Location: ./login');
  
  $successMessage = '';
  $errorMessage = '';
 
  if(isset($_POST['submit'])){
  if ($_POST['conName']!=''  && $_POST['vId']!='' && $_POST['time']!='' && $_POST['date']!=''  && $_POST['tsId']!=''){
  
    $concert_dateTime = new DateTime($_POST['date'].' '.$_POST['time']);
	$current_date = new DateTime();

	if ($concert_dateTime > $current_date)
	{
	$username=$_SESSION['username'];
    $conName = htmlentities(mysql_escape_string($_POST['conName']));
	$bandId = $_SESSION['userId'];
	if(isset($_POST['bandId']))
		$bandId = $_POST['bandId'];
	$vId = $_POST['vId'];
	$time = $_POST['time'];
	$price = $_POST['price'];
	$conDesc = htmlentities(mysql_escape_string($_POST['desc']));
	$conName = htmlentities(mysql_escape_string($_POST['conName']));
	$createdBy=$_SESSION['userId'];
	$tsId=$_POST['tsId'];
	$isActive=$_SESSION['isPrime'];
	$strDate= $_POST['date'].' '.$_POST['time'];
	$connect=mysql_connect("localhost","root","")or die(mysql_error());
	if ($connect)
	{
		mysql_select_db("music_socialnetwork") or die(mysql_error());
	}
	else
		$errorMessage ='Connection to Database Failed';
	
	$query= "SELECT * from concert where vId='$vId' and time='$strDate'";
	$result1=mysql_query($query) or die(mysql_error());
	$count=mysql_num_rows($result1);
	//echo $count;
	if ($count>0)
	{
		$errorMessage = "Duplicate Concert Exists.";
	}
	else
	{
	$query1="INSERT INTO concert (conName, bandId,vId,time,conDesc,createdBy,isActive,tsId,price) VALUES ('$conName','$bandId', '$vId', '$strDate', '$conDesc', '$createdBy', '$isActive','$tsId','$price')";
	$result1=mysql_query($query1) or die(mysql_error());
	$successMessage = $successMessage . 'Concert Created. ' ;
 }

	/*$query1="INSERT INTO concert (conName, bandId,vId,time,conDesc,createdBy,isActive,tsId,price) VALUES ('$conName','$bandId', '$vId', '$strDate', '$conDesc', '$createdBy', '$isActive','$tsId','$price')";
	$result1=mysql_query($query1) or die(mysql_error());
	$successMessage = $successMessage . 'Concert Created. ' ;*/
  }else{
	$errorMessage = "Concert Date must be future date.";
  }
  }}
 if($successMessage == '' && $errorMessage == '' && isset($_POST['submit']))
        $blueMessage = 'Failed to create Concert. Provide Proper Information.';
  
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create Concert</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" />
        <style type="text/css">
            body {
              padding-top: 10px;
              padding-bottom: 40px;
              background-color: #f5f5f5;
            }

            .form-createConcert {
              max-width: 300px;
              padding: 19px 29px 29px;
              margin: 0 auto 20px;
              background-color: #fff;
              border: 1px solid #e5e5e5;
              -webkit-border-radius: 5px;
                 -moz-border-radius: 5px;
                      border-radius: 5px;
              -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                 -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                      box-shadow: 0 1px 2px rgba(0,0,0,.05);
            }
            .form-createConcert .form-createConcert-heading,
            .form-createConcert .checkbox {
              margin-bottom: 10px;
            }
            .form-createConcert input[type="text"],
            .form-createConcert input[type="password"] {
              font-size: 16px;
              height: auto;
              margin-bottom: 15px;
              padding: 7px 9px;
            }
    </style>
    </head>
    <body>
	<?php include 'header.php'; ?>
	<div class="container" style="position: relative; top: 40px;">
		
        <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="js/bootstrap.js"></script>
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

       <br/>
	   <br/>
		<form class="form-createConcert" action="" method="post">
        <h2 class="form-createConcert-heading">Create Concert</h2>
        <input type="text" class="input-block-level" placeholder="Concert Name" name="conName">
        <!--input type="text" class="input-block-level" placeholder="Band Id" name="bandId"-->
		<?php
			if($_SESSION['userType']=='USER'){
				require "connect.php";
				$query = mysql_query("SELECT bandId,bandName FROM music_band"); 
				echo '<select name="bandId" id="bandId" required>'; 
				echo '<option name="bandId" value="default">Select Band</option>';
				while ($row = mysql_fetch_array($query))
				{
					echo '<option name="' . $row['bandId'] . '" value="' . $row['bandId'] . '">'. $row['bandName'] . '</option>';
				}
				echo '</select>';
			}
		?>
		
		<?php
			require "connect.php";
			$query = mysql_query("SELECT vId,vName FROM venue"); 
			
			echo '<select name="vId" id="vId" required>'; 
			
			echo '<option name="vId" value="default">Select Venue</option>';
												
			
			while ($row = mysql_fetch_array($query))
			{
				echo '<option name="' . $row['vId'] . '" value="' . $row['vId'] . '">' . $row['vId'] . ' - ' . $row['vName'] . '</option>';
			}
			echo '</select>';
		?>
		
		<!--input type="text" class="input-block-level" placeholder="Venue Id" name="vId"-->
		<input type="date" class="input-block-level" placeholder="Concert Date" name="date">
		<input type="time" class="input-block-level" placeholder="Concert Time" name="time">
		<input type="text" class="input-block-level" placeholder="Concert Description" name="desc">
		<input type="text" class="input-block-level" placeholder="Price in USD" name="price">
		<?php
			require "connect.php";
			$query = mysql_query("SELECT tsId,tsName FROM ticket_shop"); 
			
			echo '<select name="tsId" id="tsId" required>'; 
			
			echo '<option name="tsId" value="default">Ticket Sold At</option>';
												
			
			while ($row = mysql_fetch_array($query))
			{
				echo '<option name="' . $row['tsId'] . '" value="' . $row['tsId'] . '">' . $row['tsName'] . '</option>';
			}
			echo '</select>';
		?>
		
		<!-- <input type="text" class="input-block-level" placeholder="Created By" name="createdBy" id="createdBy" onclick="select()" value="<?php echo $_SESSION['username']?>" > -->
        <center>
        <button type="submit" class="btn btn-primary btn-large" value="create" name="submit">Create</button>
        </center>
      </form>
    </div> <!-- /container -->
    <?php include 'footer.php'; ?>
 </body>
</html>
