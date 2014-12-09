<?php
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
    $query = $dbo->getBandConcertDetails($user);
	$bandId =-1;
    if ($row = $query->fetch(PDO::FETCH_ASSOC))
    {
        
		$bandId = $row['bandId'];
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
    </head>

    <body>
	
        <?php include 'header.php'; ?>
        <div class="container" style="position: relative; top: 40px;">
        <ul class="nav nav-tabs">
        <li>
          <a href="bandProfile?user=<?php echo $user; ?>">Profile</a>
        </li>
        <li ><a href="artists?user=<?php echo $user; ?>">Artist</a></li>
		<li class="active"><a href="concerts?user=<?php echo $user; ?>">Concerts</a></li>
		<li><a href="bandReview?user=<?php echo $user; ?>">Review</a></li>
		<li><a href="bandFollower?user=<?php echo $user; ?>">Followers</a></li>
      </ul>
            <div class="row-fluid">
                <div class="span4">
                    <h3>Our Performances!</h3>
                </div>
            </div>
			<div class="span9 well">
				<table class="table">
				<tr><th>Concert Name</th><th>Concert Time</th><th>Concert Venue</th><th>Price</th><th>RSVP'd By</th></tr>
				 <?php
					$query = $dbo->getConcert($bandId); 
					while ($row = $query->fetch(PDO::FETCH_ASSOC))
				{?>
                  <tr>
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