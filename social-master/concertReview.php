<?php
    session_start();	
	require 'dbHelper.php';
    $dbo = new db();
	if (!isset($_SESSION['username']))
    {
            $dbo->close();
            unset($dbo);
            header('Location: ./logout');
    }
   
	if (! isset($_GET['conId']))
    {
        echo "Concert does not exist.";
    }
    else
    {
        $conId = $_GET['conId'];
    
		$query = $dbo->getConcertDetails($conId);

    if ($row = $query->fetch(PDO::FETCH_ASSOC))
    {
		$conId = $row['conId'];
		$bandId = $row['bandId'];
		$conDateTime = new DateTime($row['time']);
		if(isset($_POST['save'])){
			$review = $_POST['about'];
			$reviewToId= $conId;
			$reviewByUserId= $_SESSION['userId'];
			$reviewType='CONCERT';
			$dbo->saveReview($reviewToId,$reviewByUserId,$reviewType,$review);
		}
	}
	}
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Review</title>
		
    </head>

    <body>
	
        <?php include 'header.php'; ?>
        <div class="container" style="position: relative; top: 40px;">
        <ul class="nav nav-tabs">
        <li>
          <a href="concertDetails?conId=<?php echo $conId ?>">General</a>
        </li>
        <li><a href="concertAttendees?conId=<?php echo $conId ?>">Attendees</a></li>
		<li class="active"><a href="concertReview?conId=<?php echo $conId ?>">Review</a></li>
      </ul>
            <div class="row-fluid">
                <div class="span9">
                    <h3>What people say about our Concert?</h3>
                </div>
            </div>
			<div class="span9 well" style="border:2px solid #a1a1a1;
                  margin-top:20px;
				  margin-left:150px;
                  font-size:15px;
                  padding:10px 40px; 
                  box-shadow: 0px 0px 20px 3px #d3d3d3;
                  border-radius: 4px;
				  height:300px;
                  background-color: #ffffff;width:650px;overflow : auto">
				<table class="table">
				 <?php
					$query = $dbo->getReviewByConcert($conId); 
					while ($row = $query->fetch(PDO::FETCH_ASSOC))
				{?>
                  <tr><td><a href="profile?user=<?php echo $row['userName'] ?>" ?><b><?php echo $row['fName'].' '.$row['lName'] ?></b></a><br/><?php echo $row['reviewTime'] ?></td><td><?php echo $row['review'] ?></td></tr>
				<?php } ?>
				</table>
        </div>
		<?php if($bandId!=$_SESSION['userId'] && $dbo->isRSVPDConcert($_SESSION['userId'],$conId) && $_SESSION['userType']=='USER' && $conDateTime< new DateTime()){ ?>
		<form method="post" action="" >
		<div class="span4 well" style="margin-left:300px">
              <div class="control-group">
                  <label class="control-label" for="textAreaAbout">Say about our Concert</label>
                  <div class="controls" >
                      <textarea maxlength="500" rows="3" class="input-xlarge" id="textAreaAbout" name="about" placeholder="What best describe our concert?"></textarea>
				      <button type="submit" style="margin-left:120px" class="btn btn-primary btn-large" value="save" name="save">Submit</button>
				   </div>
               </div>
        </div>
		</form>
		<?php } ?>
    </body>
</html>