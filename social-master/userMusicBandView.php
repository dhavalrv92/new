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
            $dbo->close();
            unset($dbo);
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
<html>
<head>
   
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script type="text/javascript"
            src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
    <link rel="stylesheet" type="text/css"
          href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css"/>
    <script type="text/javascript" src="src/js/jquery.tree.js"></script>
    <link rel="stylesheet" type="text/css" href="src/css/jquery.tree.css"/>
</head>
<body>
		 <?php include 'header.php'; ?>
		<div class="container" style="position: relative; top: 40px;">
		<ul class="nav nav-tabs">
			<li><a href="profile?user=<?php echo $user; ?>">Profile</a></li>
			<li class="active"><a href="userMusicBandView?user=<?php echo $user; ?>">Music Category & Bands</a></li>
			<li><a href="userConcerts?user=<?php echo $user; ?>">Concerts</a></li>
			<li><a href="userBandFrnd?user=<?php echo $user; ?>">Bands & Friends</a></li>
		</ul>
				<div class="span10 well">
				<table class="table">
				<tr><th>Music Category</th><th>Band Names</th></tr>
				 <?php
					$query2 = $dbo->getAllCategoryByUser($userId); 
					while ($row2 = $query2->fetch(PDO::FETCH_ASSOC))
				{?>
                  <tr>
				    <td><span><?php echo $row2['catName'] ?></span></td>
					<td>
					 <?php 	$catId =$row2['catId'];
							$query1 = $dbo->getBandsByMusicCategoryAndUser($catId,$userId); 
							while ($row1 = $query1->fetch(PDO::FETCH_ASSOC)){
							
					  ?>
					   <a href="bandProfile?user=<?php echo $row1['userName'] ?>"><b><?php echo $row1['bandName'] ?></b></a><br/>
					  <?php } ?>
					</td>
				  </tr>
				<?php 
				}
				?>
				</div>
        </div>
<?php //include 'footer.php'; ?>
</body>
</html>