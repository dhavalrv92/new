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
			<li><a href="userConcerts?user=<?php echo $user; ?>">Concerts</a></li>
			<li class="active"><a href="userBandFrnd?user=<?php echo $user; ?>">Bands & Friends</a></li>
		</ul>
		<div class="row-fluid" style="margin-top: 20px;">
		<div class="span4 well" style="height:500px;overflow:auto;">
			<h2> Bands </h2>
				<table class="table">
				<tr><th>Band Name</th><th>Band Desc</th></tr>
				 <?php
					$query = $dbo->getBandByUser($userId); 
					while ($row = $query->fetch(PDO::FETCH_ASSOC))
				{?>
                  <tr>
				  <td><font size="3"><b><a href="bandProfile?user=<?php echo $row['userName']; ?>"><?php echo $row['bandName'] ?></a></b></font></td>
					<td><?php echo $row['bandDesc'] ?></td>
				  </tr>
				<?php } ?>
				</table>
        </div>
		<div class="span4 well" style="height:500px;overflow:auto;">
			<h2> Following </h2>
				<table class="table">
				<tr><th>Name</th><th>About</th></tr>
				 <?php
					$query = $dbo->getFriendByUser($userId); 
					while ($row = $query->fetch(PDO::FETCH_ASSOC))
				{?>
                  <tr>
				  <td><font size="3"><b><a href="profile?user=<?php echo $row['userName']; ?>"><?php echo $row['fName'] . ' ' . $row['lName'] ?></a></b></font></td>
					<td><?php echo $row['about'] ?></td>
				  </tr>
				<?php } ?>
				</table>
        </div>
		<div class="span4 well" style="height:500px;overflow:auto;">
		    <h2> Followers </h2>
				<table class="table">
				<tr><th>Name</th><th>About</th></tr>
				 <?php
					$query = $dbo->getUserFollowers($userId); 
					while ($row = $query->fetch(PDO::FETCH_ASSOC))
				{?>
                  <tr>
				  <td><font size="3"><b><a href="profile?user=<?php echo $row['userName']; ?>"><?php echo $row['fName'] . ' ' . $row['lName'] ?></a></b></font></td>
					<td><?php echo $row['about'] ?></td>
				  </tr>
				<?php } ?>
				</table>
        </div>
    </div>
	</div>
    <?php //include 'footer.php'; ?>
    </body>
</html>