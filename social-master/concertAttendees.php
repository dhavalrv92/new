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
    </head>
    <body>

    <?php include 'header.php'; ?>
	 <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <div class="container" style="position: relative; top: 40px;">
	 <ul class="nav nav-tabs">
        <li>
          <a href="concertDetails?conId=<?php echo $conId ?>">General</a>
        </li>
        <li class="active"><a href="concertAttendees?conId=<?php echo $conId ?>">Attendees</a></li>
		<li><a href="concertReview?conId=<?php echo $conId ?>">Review</a></li>
      </ul>
       <div class="row-fluid">
                <div class="span4">
                    <h3>Wanna Join them?</h3>
                </div>
            </div>
			<div class="span8 well" style="height:450px;overflow:auto;">
				<table class="table">
				<tr><th>Name</th><th>About</th><th>Origin</th></tr>
				 <?php
					$query = $dbo->getConcertUsers($conId);
					while ($row = $query->fetch(PDO::FETCH_ASSOC))
				{?>
                  <tr>
				  <td><font size="3"><b><a href="profile?user=<?php echo $row['userName']; ?>"><?php echo $row['fName'] . ' ' . $row['lName'] ?></a></b></font></td>
					<td><?php echo $row['about'] ?></td>
					<td><?php echo $row['originCity'].', '.$row['originCountry'] ?></td>
				  </tr>
				<?php } ?>
				</table>
        </div>
      
    </div>

    <?php //include 'footer.php'; ?>
    </body>
</html>
