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
    $query = $dbo->getBandDetails($user);

    if ($row = $query->fetch(PDO::FETCH_ASSOC))
    {
        $bandName = $row['bandName'];
		$bandId = $row['bandId'];
	}

 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Artist</title>
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
        <li><a href="artists?user=<?php echo $user; ?>">Artist</a></li>
		<li><a href="concerts?user=<?php echo $user; ?>">Concerts</a></li>
		<li><a href="bandReview?user=<?php echo $user; ?>">Review</a></li>
		<li class="active"><a href="bandFollower?user=<?php echo $user; ?>">Followers</a></li>
      </ul>
            <div class="row-fluid">
                <div class="span4">
                    <h3>Our Fans !</h3>
                </div>
            </div>
			<div class="span8 well" style="height:450px;overflow:auto;">
				<table class="table">
				<tr><th>Name</th><th>About</th><th>Origin</th></tr>
				 <?php
					$query = $dbo->getUserFollowers($bandId); 
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

        <?php //include 'footer.php'; ?>
    </body>
</html>