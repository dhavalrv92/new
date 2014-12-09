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

	$query = $dbo->getUserDetails($username);

    if ($row = $query->fetch(PDO::FETCH_ASSOC))
    {
        $fName = $row['fName'];
		$lName = $row['lName'];
        $about = $row['about'];
		$userId = $row['userId'];
        $profilePic = $dbo->getProfilePhoto($userId);
        $country = $row['originCountry'];
		$state = $row['originCity'];
        $gender = $row['sex'];
    }
    $successMessage = '';
    $errorMessage = '';

    if (isset($_POST['about']) && $_POST['about'] != '')
    {
        $about = $_POST['about'];
        $dbo->updateProfileInfo($userId, $about, 'about');
        $successMessage = $successMessage . 'Updated About Me ' ;
    }
    if (isset($_POST['firstName']) && $_POST['firstName'] != '')
    {
        $firstName = $_POST['firstName'];
        $dbo->updateProfileInfo($userId, $firstName, 'fName');
        $successMessage = $successMessage . '- Updated First Name ';
    }
    if (isset($_POST['surname']) && $_POST['surname'] != '')
    {
        $surname = $_POST['surname'];
        $dbo->updateProfileInfo($userId, $surname, 'lName');
        $successMessage = $successMessage . '- Updated Surname ';
    }
    if (isset($_POST['gender']) && $_POST['gender'] != '')
    {
        $gender = $_POST['gender'];
        $dbo->updateProfileInfo($userId, $gender, 'sex');
        $successMessage = $successMessage . '- Updated Gender ';
    }
	if (isset($_POST['country']) && $_POST['country'] != '')
    {
        $country = $_POST['country'];
        $dbo->updateProfileInfo($userId, $country, 'originCountry');
        $successMessage = $successMessage . '- Updated Country ';
    }
	if (isset($_POST['state']) && $_POST['state'] != '')
    {
        $state = $_POST['state'];
        $dbo->updateProfileInfo($userId, $state, 'originCity');
        $successMessage = $successMessage . '- Updated State ';
    }
    if (isset($_POST['password']) && isset($_POST['confirmPassword']))
    {
        $password =$_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];

        if ($password != $confirmPassword)
            $errorMessage = $errorMessage ." - Passwords must match. ";
        elseif (strlen($password) < 6 && strlen($password) > 0) {
            $errorMessage = $errorMessage ." - Passwords must be 6 characters or more. ";
        }
        elseif(strlen($password) > 0)
        {
			$password =md5(strip_tags($_POST['password']));
			$confirmPassword = md5(strip_tags($_POST['confirmPassword']));
            $dbo->updateUserInfo($userId, $password, 'password');
            $successMessage = $successMessage . '- Updated Password ';
        }
    }
	
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"]) && $_FILES["fileToUpload"]["tmp_name"]!='') {
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			$target_dir = "img/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			$dbo->updateProfilePhoto($userId,$target_file);
			$profilePic = $dbo->getProfilePhoto($userId);
			$successMessage = $successMessage . "- Uploaded Profile Photo." ;
			$uploadOk = 1;
			}
		} else {
			//$errorMessage = $errorMessage . "File is not an image.";
			$uploadOk = 0;
		}
	}
    if($successMessage == '' && $errorMessage == '' && isset($_POST['submit']))
        $blueMessage = 'Nothing was updated';
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
        <div class="container" style="position: relative; top: 40px;">
		<ul class="nav nav-tabs">
			<li class="active"><a href="settings">General</a></li>
			<li><a href="musicCategory">Music Category</a></li>
			<li><a href="userBands">Bands</a></li>
		</ul>
            <form method="post" action="" enctype="multipart/form-data">
            <div class="row-fluid">
                <div class="span4">
                    <h3>Update your details</h3>
                </div>
            </div>
            </div>
            <div class="row-fluid" style="margin-top: 20px;margin-left: 40px">
                <div class="span4 well">
                    <h2>About Me</h2>
                        <div class="control-group">
                            <label class="control-label" for="textAreaAbout">About</label>
                            <div class="controls">
                              <textarea maxlength="15000" rows="12" class="input-xlarge" id="textAreaAbout" name="about" placeholder="About Me"><?php echo $about ?></textarea>
                            </div>
                        </div>
						<div class="control-group">
                            <label class="control-label" for="photo">Profile Photo</label>
							<img src="<?php echo "$profilePic"; ?>"  height="60" width="60">
                            <div class="controls">
                              <input type="file" name="fileToUpload" id="fileToUpload">
                            </div>
                        </div>
						
                </div>

                <div class="span4 well">
                    <h2>Details</h2>
                    <h4>Not all fields required</h4>

                        <div class="control-group">
                            <label class="control-label" for="inputFirstName">First Name</label>
                            <div class="controls">
                              <input id="inputFirstName" type="text" class="input-xlarge" name="firstName" placeholder="First Name" value="<?php echo $fName ?>"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputSurname">Surname</label>
                            <div class="controls">
                              <input id="inputSurname" type="text" class="input-xlarge" name="surname" placeholder="Surname" value="<?php echo $lName ?>"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputGender">Gender&nbsp&nbsp</label>
                            <div class="controls">
								<script>
								</script>
                              &nbsp&nbsp&nbsp&nbsp<input type="radio" id="m" name="gender" value="MALE">Male &nbsp&nbsp<input type="radio" id="f" name="gender" value="FEMALE">Female
							 <script>
							     <?php if($gender == 'MALE'){ ?>
									document.getElementById('m').checked=true;	
								  <?php } else {?>
								   document.getElementById('f').checked=true;
								  <?php } ?> 
							 </script>
                            </div>
                        </div>
						<div class="control-group">
							<label class="control-label" for="inputCountry">Country</label>
							<div class="controls">
								<select onchange="print_state('state',this.selectedIndex);" id="country" name = "country" ></select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputState">City/State:</label>
							<div class="controls">
								<select name ="state" id = "state" value="<?php echo $state ?>"></select>
							</div>
						</div>
						<script type="text/javascript">
							print_country("country");
							$('#country').val('<?php echo $country ?>');
							print_state('state',$('#country')[0].selectedIndex);
							$('#state').val('<?php echo $state ?>');
						</script>						
                </div>
                <div class="span3 well">
                    <h2>Login Details</h2>
                    <h4>Not all fields required</h4>
                        <div class="control-group">
                            <label class="control-label" for="inputPassword">New Password</label>
                            <div class="controls">
                              <input id="inputPassword" type="password" class="input-xlarge" name="password" placeholder="New Password"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputConfirmPassword">Confirm Password</label>
                            <div class="controls">
                              <input id="inputConfirmPassword"class="input-xlarge" type="password" name="confirmPassword" placeholder="Confirm Password"/>
                            </div>
                        </div>
                </div>
            </div>
			<div class="span4 offset4" align="center">
                    <div class="control-group" >
                        <div class="controls">
                            <button type="submit" class="btn btn-primary btn-large" value="save" name="submit">Save</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<!--<button type="submit" class="btn btn-primary btn-large" value="next" name="submit">Next >></button>-->
                        </div>
                    </div>
            </div>
        </form>
        </div>

        <?php include 'footer.php'; ?>
    </body>
</html>
