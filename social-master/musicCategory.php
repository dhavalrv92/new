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
		$query = $dbo->getUserDetails($username);

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
<?php

$successMessage = '';
$errorMessage = '';
 if(isset($_POST['submit'])){
	if(!empty($_POST['musicCat'])) {
			$dbo->deleteMusicCategoryByUser($_SESSION['userId']);
		foreach((array)$_POST['musicCat'] as $catId) {
            $dbo->saveMusicCategoryByUser($catId,$_SESSION['userId']);
		}
		$successMessage = $successMessage . 'Updated Music Choice ' ;
	}
	if($successMessage == '' && $errorMessage == '' && isset($_POST['submit']))
        $blueMessage = 'Nothing was updated';
	if(isset($_POST['submit']) && $_POST['submit'] == 'next'){
	   if($_SESSION['userType'] == 'USER')
			header('Location: ./bandMayLike');
		else{
			$query = $dbo->activateUser($userId);
			header('Location: ./home');
		}
	}
 }

?>

<html>
<head>
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
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script type="text/javascript"
            src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
    <link rel="stylesheet" type="text/css"
          href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css"/>
    <script type="text/javascript" src="src/js/jquery.tree.js"></script>
    <link rel="stylesheet" type="text/css" href="src/css/jquery.tree.css"/>

    <script type="text/javascript">
        //<!--
        $(document).ready(function() {
            $( "#accordion" ).accordion({
                'collapsible': true,
                'active': null
            });
            $('.jquery').each(function() {
                eval($(this).html());
            });
            $('.button').button();
        });
        //-->
    </script>
</head>
<body>
		<div class="container" style="margin-top: 40px;">
		<?php if($_SESSION['userType']=='USER') { ?>
		<ul class="nav nav-tabs">
			<li><a href="settings">General</a></li>
			<li class="active"><a href="musicCategory">Music Category</a></li>
			<li><a href="userBands">Bands</a></li>
		</ul>
		<?php }else if($_SESSION['userType']=='BAND') { ?>
		 <ul class="nav nav-tabs">
			<li><a href="bandSetting">General</a></li>
			<li><a href="addArtist">Artist</a></li>
			<li class="active"><a href="musicCategory">Music Category</a></li>
			<li><a href="bandConcert">Concerts</a></li>
		</ul>
		<?php } ?>
            <form method="post" action="">
            <div class="row-fluid">
                <div class="span4">
                    <h3>Your Music Choice</h3>
                </div>
            </div>
            <div class="row-fluid" >
			<div id="example-7">
            <script class="jquery" lang="text/javascript" >
                $('#example-7 div').tree({
                    onCheck: {
                        ancestors: 'checkIfFull',
                        descendants: 'check'
                    },
                    onUncheck: {
                        ancestors: 'uncheck'
                    }
                });
            </script>
            <!--<div style="background-color: #f5f5f5;border: 1px solid #e3e3e3;"> -->
			<div style="border:2px solid #a1a1a1;
                  margin-top:20px;
				  margin-left:250px;
                  font-size:15px;
                  padding:10px 40px; 
                  box-shadow: 0px 0px 20px 3px #d3d3d3;
                  border-radius: 4px;
                  background-color: #ffffff;width:350px;">
                <ul>
				 <?php
					$query = $dbo->getAllParentCategory();
					while ($row = $query->fetch(PDO::FETCH_ASSOC))
				{?>
                    <li><input type="checkbox" id="<?php echo $row['catId'] ?>" title="<?php echo $row['catDesc'] ?>" name=musicCat[] value="<?php echo $row['catId'] ?>"><span><?php echo $row['catName'] ?></span>
                        <ul>
							<?php
								$query1 = $dbo->getAllChildCategory($row['catId']);
								while ($row1 = $query1->fetch(PDO::FETCH_ASSOC)){
							?>
                            <li><input type="checkbox" id="<?php echo $row1['catId'] ?>" title="<?php echo $row1['catDesc'] ?>" name=musicCat[] value="<?php echo $row1['catId'] ?>"><span><?php echo $row1['catName'] ?></span>
								<?php } ?>
                        </ul>
						<?php 
						}
						?>
                </ul>
            </div>
        </div>
		<script>
		   <?php
				$query3 = $dbo->getAllCategoryByUser($userId);
				while ($row3 = $query3->fetch(PDO::FETCH_ASSOC)){
			?>
				document.getElementById("<?php echo $row3['catId'] ?>").checked=true;
			<?php } ?>
		</script>
		<div class="span4 offset4">
                    <div class="control-group" >
                        <div class="controls" >
                            <br/><button type="submit" class="btn btn-primary btn-large" value="save" name="submit">Save</button>
							<!--<button type="submit" class="btn btn-primary btn-large" value="next" name="submit">Next >></button> -->
                        </div>
                    </div>
            </div>
		</form>
		</div>
<?php include 'footer.php'; ?>
</body>
</html>
