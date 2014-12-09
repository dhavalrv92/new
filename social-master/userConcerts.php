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
    </head>
    <body>

    <?php include 'header.php'; ?>

    <div class="container" style="position: relative; top: 40px;">
        <ul class="nav nav-tabs">
			<li><a href="profile?user=<?php echo $user; ?>">Profile</a></li>
			<li><a href="userMusicBandView?user=<?php echo $user; ?>">Music Category & Bands</a></li>
			<li class="active"><a href="userConcerts?user=<?php echo $user; ?>">Concerts</a></li>
			<li><a href="userBandFrnd?user=<?php echo $user; ?>">Bands & Friends</a></li>
		</ul>
		<div class="span9 well">
				<table class="table">
				<tr><th>Concert Name</th><th>Concert Time</th><th>Concert Venue</th><th>Price</th><th>RSVP'd By</th></tr>
				 <?php
					$query = $dbo->getConcertByUser($userId); 
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
    </div>

    <?php //include 'footer.php'; ?>
    </body>
</html>
